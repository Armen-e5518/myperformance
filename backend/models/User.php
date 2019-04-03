<?php

namespace backend\models;

use common\models\Departments;
use common\models\Managers;
use common\models\Years;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $avatar
 * @property int $status
 * @property int $department_id
 * @property int $manager_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $position
 * @property int $admin_role
 */
class User extends \yii\db\ActiveRecord
{
    public $year;
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\backend\models\User', 'message' => 'This username has already been.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [
                'username',
                'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_.-]/',
                'message' => 'Invalid characters in username.',
            ],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\backend\models\User', 'message' => 'This email address has already been.'],

//            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],

            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['last_name', 'first_name', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['last_name', 'first_name', 'password_reset_token', 'email', 'avatar', 'position'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password_reset_token'], 'unique'],

            [['department_id', 'manager_id'], 'integer'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password_hash', 'message' => "Passwords don't match"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'last_name' => 'Last name',
            'first_name' => 'First name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'department_id' => 'Department',
            'manager_id' => 'Manager',
            'password_repeat' => 'Confirm password',
            'position' => 'Position',

        ];
    }


    /**
     * @return bool|string
     */
    public function upload()
    {
        if (!empty($this->imageFile)) {
            $img_name = microtime(true) . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAs('../../frontend/web/users/' . $img_name)) {
                return $img_name;
            }
        }
        return false;
    }

    /**
     * @return bool|int|mixed|string
     */
    public function SaveUser()
    {
        if (!$this->validate()) {
//            print_r($this->getErrors());
//            exit;
            return false;
        }
        $user = new \common\models\User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->avatar = $this->avatar;
        $user->status = $this->status;
        $user->manager_id = $this->manager_id;
        $user->department_id = $this->department_id;
        $user->position = $this->position;
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
        return $user->save() ? $user->getId() : false;
    }

    /**
     * @param null $id
     * @return bool|int
     */
    public function UpdateUser($id = null)
    {
        if (!empty($id)) {
            if (!$this->validate()) {
                return false;
            }
            $user = self::findOne(['id' => $id]);
            $user->username = $this->username;
            $user->email = $this->email;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->avatar = $this->avatar;
            $user->status = $this->status;
            $user->manager_id = $this->manager_id;
            $user->department_id = $this->department_id;
            $user->position = $this->position;
            if (!empty($this->password_hash)) {
                $user->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
            }
            return $user->save();
        }
        return false;
    }

    /**
     * @return array
     */
    public static function GetUsers()
    {
        return self::find()
            ->select(["CONCAT(`first_name`,' ',`last_name`) as name", 'id'])
            ->where(['<>', 'id', Yii::$app->user->identity->getId()])
            ->andWhere(['<>', 'id', Yii::$app->user->identity->manager_id])
            ->andWhere(['<>', 'role', 1])
            ->indexBy('id')
            ->column();
    }

    public static function GetCurrentUserName()
    {
        return self::find()->select(["CONCAT(`first_name`,' ',`last_name`) as name"])->asArray()->where(['id' => Yii::$app->user->getId()])->one()['name'];
    }

    public static function GetUserNameById($id)
    {
        $model = self::find()->select(["CONCAT(`first_name`,' ',`last_name`) as name"])->asArray()->where(['id' => $id])->one();
        return !empty($model['name']) ? $model['name'] : '';
    }

    public static function GetSuperUsers()
    {
        return self::find()->select(["CONCAT(`first_name`,' ',`last_name`) as name", 'id'])->indexBy('id')->where(['id' => 1])->column();
    }

    public static function GetAllUsersIndex()
    {
        return self::find()->select(["CONCAT(`first_name`,' ',`last_name`) as name", 'id'])->indexBy('id')->column();
    }

    public static function GetAllUsersNotMe()
    {
        return self::find()
            ->select(["CONCAT(`first_name`,' ',`last_name`) as name", 'id'])
            ->andWhere(['<>', 'id', Yii::$app->user->identity->getId()])
            ->indexBy('id')
            ->column();
    }

    public static function GetUsersWhichManagerI()
    {
        return self::find()
            ->select(["CONCAT(`first_name`,' ',`last_name`) as name", 'id'])
            ->where(['manager_id' => Yii::$app->user->getId()])
            ->andWhere(['<>', 'id', Yii::$app->user->identity->getId()])
            ->indexBy('id')
            ->column();
    }

    public static function GetUsersWhichManagerMyByDepartment($year)
    {
        $year = Years::GetYearIdByYear($year);
        return self::find()
            ->from(self::tableName() . ' u')
            ->select([
                'u.*',
                'd.title',
            ])
            ->leftJoin(Departments::tableName() . ' d', 'd.id = u.department_id')
            ->leftJoin(Managers::tableName() . ' m', 'm.user_id = u.id AND m.manager_id = ' . Yii::$app->user->getId() . ' AND m.year = ' . $year)
            ->where(['u.manager_id' => Yii::$app->user->getId()])
            ->orWhere(['m.manager_id' => Yii::$app->user->getId()])
            ->asArray()
            ->all();
    }

    /**
     * @param $id
     * @return static
     */
    public static function GetUserImage($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * @param $id
     * @return static
     */
    public static function GetUserById($id)
    {
        return self::findOne(['id' => $id]);
    }


    public static function GetAllUsers()
    {
        return self::find()->asArray()->all();
    }

    public static function GetUsersByIds($ids = null)
    {
        if (!empty($ids)) {
            return self::find()->where(['id' => $ids])->asArray()->all();
        }
        return [];
    }


    public static function DeleteUserPhoto($user_id = null)
    {
        if (!empty($user_id)) {
            $model = self::findOne(['id' => $user_id]);
            unlink(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['user_url'] . $model['avatar']);
            $model->avatar = null;
            return $model->save();
        }
        return false;
    }

    public static function GetAll()
    {
        return self::find()->asArray()->where(['not in', 'id', Yii::$app->user->getId()])->all();
    }

    public static function GetManagerName()
    {
        return self::find()
            ->select(["CONCAT(`first_name`,' ',`last_name`) as name"])
            ->asArray()->where(['id' => Yii::$app->user->identity->manager_id])
            ->one()['name'];

    }
}
