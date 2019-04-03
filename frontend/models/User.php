<?php

namespace frontend\models;

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
 */
class User extends \yii\db\ActiveRecord
{
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
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This username has already been.'],
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
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been.'],

//            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],

            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['last_name', 'first_name', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['last_name', 'first_name', 'password_reset_token', 'email', 'avatar'], 'string', 'max' => 255],

            [['department_id', 'manager_id'], 'integer'],


//            ['password_repeat', 'required'],
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
            'password_hash' => 'Change password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'department_id' => 'Department',
            'manager_id' => 'Manager',
            'password_repeat' => 'Repeat new password',
            'position' => 'position',


        ];
    }


    public function upload()
    {
        if (!empty($this->imageFile)) {
            $img_name = microtime(true) . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAs('users/' . $img_name)) {
                return $img_name;
            }
        }
        return false;
    }


    public function UpdateUser($id = null)
    {
        if (!empty($id)) {
            if (!$this->validate()) {
                print_r($this->getErrors());
                exit;
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
            if (!empty($user->password_hash)) {
                $user->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
            }
            return $user->save();
        }
        return false;
    }

    public static function getCurrentUserName()
    {
        return Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name;
    }

    public static function GetMyUsers($year)
    {
        $year = Years::GetYearIdByYear($year);
        return (new \yii\db\Query())
            ->select(
                [
                    'u.*',
                    'd.title',
                ])
            ->from(self::tableName() . ' as u')
            ->leftJoin(Departments::tableName() . ' d', 'u.department_id = d.id')
            ->leftJoin(Managers::tableName() . ' m', 'm.user_id = u.id AND m.manager_id = ' . Yii::$app->user->getId() . ' AND m.year = ' . $year)
            ->where(['u.manager_id' => Yii::$app->user->getId()])
            ->orWhere(['m.manager_id' => Yii::$app->user->getId()])
            ->all();
    }
}
