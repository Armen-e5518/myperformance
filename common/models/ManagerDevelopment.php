<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manager_development".
 *
 * @property int $id
 * @property int $user_id
 * @property int $manager_id
 * @property string $manager_comment
 * @property int $year
 */
class ManagerDevelopment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager_development';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'manager_id', 'year'], 'integer'],
            [['manager_comment'], 'string'],
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
            'manager_id' => 'Manager ID',
            'manager_comment' => 'Manager comment',
            'year' => 'Year',
        ];
    }

    public static function GetOneByUserIdByManagerId($user_id, $development_state, $year)
    {
        if (!empty($development_state)) {
            return self::findOne(['user_id' => $user_id, 'manager_id' => $development_state['manager_id'], 'year' => Years::GetYearIdByYear($year)]);
        }
        return null;
    }
}
