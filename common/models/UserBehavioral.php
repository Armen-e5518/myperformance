<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_behavioral".
 *
 * @property int $id
 * @property int $behavioral_id
 * @property int $user_id
 * @property int $manager_id
 * @property string $user_comment
 * @property string $date
 * @property string $manager_comment
 * @property string $year
 */
class UserBehavioral extends \yii\db\ActiveRecord
{
    public $last_name;
    public $first_name;
    public $title;
    public $year;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_behavioral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['behavioral_id', 'user_id', 'manager_id'], 'integer'],
            [['user_comment', 'manager_comment'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'behavioral_id' => 'Behavioral',
            'user_id' => 'User ',
            'manager_id' => 'Manager ',
            'user_comment' => 'User Comment',
            'date' => 'Date',
            'manager_comment' => 'Manager comment',
        ];
    }

    public static function GetCommentByBehId($id)
    {
        return self::findOne(['user_id' => Yii::$app->user->getId(), 'behavioral_id' => $id]);
    }

    public static function GetCommentByBehIdByUserId($id, $user_id)
    {
        return self::findOne(['user_id' => $user_id, 'behavioral_id' => $id]);
    }

    public static function SaveUserComment($id, $comment)
    {
        $model = self::GetCommentByBehId($id);
        if (empty($model)) {
            $m = new self();
            $m->user_id = Yii::$app->user->getId();
            $m->behavioral_id = $id;
            $m->user_comment = $comment;
            return $m->save();
        }
        $model->user_comment = $comment;
        return $model->save();
    }

    public static function GetBehavioralByUserId($behavioral_id, $user_id)
    {
        $model = self::findOne(['behavioral_id' => $behavioral_id, 'user_id' => $user_id]);
        if (empty($model)) {
            $m = new self();
            $m->user_id = $user_id;
            $m->behavioral_id = $behavioral_id;
            $m->save();
        }
        return (new \yii\db\Query())
            ->select(
                [
                    'ub.*',
                    'b.description',
                    'b.title',
                    'u.*',
                ])
            ->from('user_behavioral as ub')
            ->leftJoin(Behavioral::tableName() . ' b', 'b.id = ub.behavioral_id')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = ub.user_id')
            ->where(['behavioral_id' => $behavioral_id, 'user_id' => $user_id])
            ->one();
    }


}
