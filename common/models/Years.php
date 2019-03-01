<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "years".
 *
 * @property int $id
 * @property int $year
 * @property int $status
 */
class Years extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'years';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'status' => 'Status',
        ];
    }

    public static function GetAll()
    {
        return self::find()->select(['year', 'id'])->indexBy('id')->column();
    }

    public static function GetYearIdByYear($year)
    {
        return self::findOne(['year' => $year])->id;
    }

    public static function GetYearById($id)
    {
        return self::findOne($id)->year;
    }
}
