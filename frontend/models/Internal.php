<?php

namespace frontend\models;

use yii\base\Model;

/**
 * Internal form
 */
class Internal extends Model
{
    public $user_id;
    public $feedback_type;
    public $project_name;


    public function rules()
    {
        return [
            ['user_id', 'required'],
            ['feedback_type', 'required'],
//            ['project_name', 'required'],
            ['project_name', 'string', 'max' => 255],
        ];
    }

    public function toEmpty()
    {
        $this->user_id = null;
        $this->feedback_type = null;
        $this->project_name = null;
    }
}
