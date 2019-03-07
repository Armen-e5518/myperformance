<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_impact".
 *
 * @property int $id
 * @property int $impact_id
 * @property int $user_id
 * @property int $manager_id
 * @property string $user_comment
 * @property string $date
 * @property string $manager_comment
 * @property string $year
 */
class UserImpact extends \yii\db\ActiveRecord
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
        return 'user_impact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['impact_id', 'user_id','manager_id'], 'integer'],
            [['user_comment','manager_comment'], 'string'],
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
            'impact_id' => 'Impact',
            'user_id' => 'User',
            'user_comment' => 'User comment',
            'date' => 'Date',
            'manager_comment' => 'Manager comment',
            'manager_id' => 'Manager',
        ];
    }

    public static function GetCommentByBehId($id)
    {
        return self::findOne(['user_id' => Yii::$app->user->getId(), 'impact_id' => $id]);
    }

    public static function GetCommentByBehIdByUserId($id, $user_id)
    {
        return self::findOne(['user_id' => $user_id, 'impact_id' => $id]);
    }

    public static function SaveUserComment($id, $comment)
    {
        $model = self::GetCommentByBehId($id);
        if (empty($model)) {
            $m = new self();
            $m->user_id = Yii::$app->user->getId();
            $m->impact_id = $id;
            $m->user_comment = $comment;
            return $m->save();
        }
        $model->user_comment = $comment;
        return $model->save();
    }

    public static function GetImpactByUserId($impact_id, $user_id)
    {
        $model = self::findOne(['impact_id' => $impact_id, 'user_id' => $user_id]);
        if (empty($model)) {
            $m = new self();
            $m->user_id = $user_id;
            $m->impact_id = $impact_id;
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
            ->from('user_impact as ub')
            ->leftJoin(Impact::tableName() . ' b', 'b.id = ub.impact_id')
            ->leftJoin(\backend\models\User::tableName() . ' u', 'u.id = ub.user_id')
            ->where(['impact_id' => $impact_id, 'user_id' => $user_id])
            ->one();
    }
}
