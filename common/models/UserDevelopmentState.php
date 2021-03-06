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
 * @property int $date_manager
 * @property int $date_user
 */
class UserDevelopmentState extends \yii\db\ActiveRecord
{
    const STATUS_SUBMIT = 1;
    const STATUS_MANAGER = 2;

    public $last_name;
    public $first_name;

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
            [['date_manager', 'date_user'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'year' => 'Year',
            'status' => 'Status',
            'manager_id' => 'manager_id',
            'date_manager' => 'Manager submitted date',
            'date_user' => 'User submitted date',
        ];
    }

    public static function Submit($user_id, $year)
    {
        $model = new self();
        $model->year = $year;
        $model->date_user = date('Y-m-d');
        $model->user_id = $user_id;
        $model->status = self::STATUS_SUBMIT;
        $model->manager_id = Yii::$app->user->identity->manager_id;
        return $model->save();
    }

    public static function SubmitManager($user_id, $year)
    {
        $model = self::findOne(['user_id' => $user_id, 'year' => $year]);
        $model->status = self::STATUS_MANAGER;
        $model->date_manager = date('Y-m-d');
        return $model->save();
    }

}
