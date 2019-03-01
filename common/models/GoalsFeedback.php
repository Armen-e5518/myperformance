<?php

namespace common\models;

use frontend\components\Mail;
use Yii;

/**
 * This is the model class for table "goals_feedback".
 *
 * @property int $id
 * @property int $goal_id
 * @property int $manager_id
 * @property int $status
 * @property string $comment
 * @property string $date
 * @property int $user_id
 * @property int $state
 */
class GoalsFeedback extends \yii\db\ActiveRecord
{
    const STATE_UPCOMING = 0;
    const STATE_END = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goals_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'goal_id', 'manager_id', 'status'], 'integer'],
            [['comment'], 'string'],
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
            'goal_id' => 'Goal ID',
            'manager_id' => 'Menager ID',
            'status' => 'Status',
            'comment' => 'Comment',
            'date' => 'Date',
            'user_id' => 'User Id',
            'state' => 'State',
        ];
    }

    public static function goalRequestFeedback($manager_id, $goal_id)
    {
        $m = self::findOne(['user_id' => Yii::$app->user->getId(), 'manager_id' => $manager_id, 'goal_id' => $goal_id]);
        if (empty($m)) {
            Mail::SandFeedbackEmail($manager_id,Yii::$app->user->getId());
            $model = new self();
            $model->user_id = Yii::$app->user->getId();
            $model->manager_id = $manager_id;
            $model->goal_id = $goal_id;
            $model->state = self::STATE_UPCOMING;
            $model->date = date("Y-m-d H:i:s");
            if ($model->save()){
               return  $model;
            }
             return false;
        }
        return true;
    }

    public static function GetCurrentUserFeedback()
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'gol.*',
                    'u.avatar',
                    'u.first_name',
                    'u.last_name',
                ])
            ->from(self::tableName().' gol')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = gol.user_id')
            ->where(['gol.manager_id' => Yii::$app->user->getId(), 'state' => self::STATE_UPCOMING])
            ->all();
    }

    public static function GetCurrentUserFeedbackProvided()
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'gol.*',
                    'u.avatar',
                    'u.first_name',
                    'u.last_name',
                ])
            ->from(self::tableName().' gol')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = gol.user_id')
            ->where(['gol.manager_id' => Yii::$app->user->getId(), 'state' => self::STATE_END])
            ->all();
    }

    public static function SaveFeedback($user_id, $goal_id, $comment, $status)
    {
        $m = self::findOne(['user_id' => $user_id, 'manager_id' => Yii::$app->user->getId(), 'goal_id' => $goal_id]);
        if (!empty($m)) {
            $m->comment = $comment;
            $m->state = self::STATE_END;
            $m->status = $status;
            return $m->save();
        }
        return true;
    }

    public static function goalCurrentUserFellByUserlId($user_id)
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'gf.*',
                    'u.avatar as avatar',
                    'u.first_name as first_name',
                    'u.last_name as last_name',
                ])
            ->from(self::tableName().' gf')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = gf.manager_id')
            ->where(['user_id' => $user_id])
            ->all();
    }
}
