<?php

namespace backend\components;


use backend\models\Roles;
use yii\base\Component;

class UserRoles extends Component
{
    public $user_roles;
    public $roles;
    public $item = [];

    public function __construct(array $config = [])
    {
        $this->roles = Roles::find()->select(['id', 'kay'])->indexBy('kay')->column();
        $this->user_roles = \backend\models\UserRoles::find()->where(['user_id' => \Yii::$app->user->getId()])->asArray()->all();
        parent::__construct($config);
    }

    /**
     * @param $kay
     * @return bool
     */
    public function GetCurrentUserRoleByKay($kay)
    {
        foreach ($this->user_roles as $role) {
            if ($role['role_id'] == $this->roles[$kay]) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $items
     * @return array
     */
    public function GetMenuItem($items)
    {
        foreach ($items as $item) {
            if ($item[1]) {
                if ($this->GetCurrentUserRoleByKay($item[2])) {
                    array_push($this->item, $item[0]);
                }
            } else {
                array_push($this->item, $item[0]);
            }
        }
        return $this->item;
    }

}
