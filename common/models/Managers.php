<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "managers".
 *
 * @property int $id
 * @property int $user_id
 * @property int $manager_id
 * @property int $year
 */
class Managers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'manager_id', 'year'], 'integer'],
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
            'year' => 'Year',
        ];
    }

    public static function GetManagersByUserId($id)
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'm.*',
                    'u.first_name',
                    'u.last_name',
                ])
            ->from(self::tableName() . ' as m')
            ->leftJoin(User::tableName() . ' u', 'u.id = m.manager_id')
            ->where(['m.user_id' => $id])
            ->all();
    }
}
