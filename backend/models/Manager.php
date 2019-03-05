<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Manager extends Model
{
    public $manager_id;
    public $year;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['manager_id', 'year'], 'required'],
        ];
    }


}
