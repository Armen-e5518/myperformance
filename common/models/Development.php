<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "development".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $year
 */
class Development extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'development';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['year'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'year' => 'Year',
        ];
    }

    public static function GetAllByUserIdByYear($year, $id)
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'b.*',
                    'ub.user_comment',
                    'ub.id as user_beh_id',
                ])
            ->from(self::tableName() . ' as b')
            ->leftJoin(UserDevelopment::tableName() . ' ub', 'ub.development_id = b.id AND ub.user_id =' . $id)
            ->where(['b.year' => Years::GetYearIdByYear($year)])
            ->all();


    }
}
