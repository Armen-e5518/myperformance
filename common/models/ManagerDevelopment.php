<?php

namespace common\models;

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
    public $first_name;
    public $last_name;
    public $m_first_name;
    public $m_last_name;
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
            'user_id' => 'User ',
            'manager_id' => 'Manager ',
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

    public static function GetOneByUserIdByManagerIdForCheck($user_id, $manager_id, $year)
    {
        return self::findOne(['user_id' => $user_id, 'manager_id' => $manager_id, 'year' => Years::GetYearIdByYear($year)]);
    }
}
