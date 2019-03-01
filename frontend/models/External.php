<?php

namespace frontend\models;

use yii\base\Model;

/**
 * External form
 */
class External extends Model
{
    public $user_email;
    public $user_name;
    public $user_position;
    public $feedback_type;
    public $project_name;


    public function rules()
    {
        return [
            ['user_name', 'required'],
            ['user_name', 'string', 'max' => 255],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'string', 'max' => 255],
            ['feedback_type', 'required'],
//            ['project_name', 'required'],
            ['project_name', 'string', 'max' => 255],
        ];
    }

    public function toEmpty()
    {
        $this->user_email = null;
        $this->user_name = null;
        $this->user_position = null;
        $this->feedback_type = null;
        $this->project_name = null;
    }
}
