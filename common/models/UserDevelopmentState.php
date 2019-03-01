<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_development_state".
 *
 * @property int $id
 * @property int $user_id
 * @property int $year
 * @property int $status
 * @property int $manager_id
 */
class UserDevelopmentState extends \yii\db\ActiveRecord
{
    const STATUS_SUBMIT = 1;
    const STATUS_MANAGER = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_development_state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'year', 'manager_id', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'year' => 'Year',
            'status' => 'Status',
            'manager_id' => 'manager_id',
        ];
    }

    public static function Submit($user_id, $year)
    {
        $model = new self();
        $model->year = $year;
        $model->user_id = $user_id;
        $model->status = self::STATUS_SUBMIT;
        $model->manager_id = Yii::$app->user->identity->manager_id;
        return $model->save();
    }

    public static function SubmitManager($user_id, $year)
    {
        $model = self::findOne(['user_id' => $user_id, 'year' => $year]);
        $model->status = self::STATUS_MANAGER;
        return $model->save();
    }

}
