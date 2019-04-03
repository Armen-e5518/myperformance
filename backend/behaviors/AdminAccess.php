<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/3/2019
 * Time: 12:01 PM
 */

namespace backend\behaviors;


use common\models\User;
use yii\base\Behavior;

class AdminAccess extends Behavior
{

   /**
    * @return bool
    */
   public function getAccess()
   {
      return \Yii::$app->user->identity->admin_role === User::ADMIN_ROLE_NOT_EDIT;
   }

   public function getTemplate()
   {
      return $this->getAccess() ? '' : '{update}{delete}';
   }
}