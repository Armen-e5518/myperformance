<?php

namespace frontend\models;

use yii\base\Model;

/**
 * Internal form
 */
class MailTo extends Model
{
    public $href;
    public $email;
    public $subject;

    public $body;


    public function rules()
    {
        return [
            ['href', 'required'],
            ['email', 'required'],
            ['email', 'email'],
            ['subject', 'required'],
//            ['project_name', 'required'],
            ['subject', 'string', 'max' => 255],
            ['body', 'string'],
            ['href', 'string', 'max' => 255],
        ];
    }


}
