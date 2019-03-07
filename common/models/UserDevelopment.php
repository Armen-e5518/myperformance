<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_development".
 *
 * @property int $id
 * @property int $user_id
 * @property int $development_id
 * @property string $user_comment
// * @property string $year
 */
class UserDevelopment extends \yii\db\ActiveRecord
{
    public $last_name;
    public $first_name;
    public $title;
//    public $year;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_development';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'development_id', 'year'], 'integer'],
            [['user_comment'], 'string'],
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
            'development_id' => 'Development',
            'user_comment' => 'User comment',
            'year' => 'Year',
        ];
    }

}
