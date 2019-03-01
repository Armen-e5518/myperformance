<?php
/**
 * Created by PhpStorm.
 * User: Armen
 * Date: 11/20/17
 * Time: 12:00 PM
 */

namespace frontend\components;

use backend\components\Helper;
use common\models\Behavioral;
use common\models\Development;
use common\models\Impact;
use common\models\ManagerDevelopment;
use common\models\UserBehavioral;
use common\models\UserDevelopment;
use common\models\UserImpact;
use yii\base\Component;

/**
 * Class CheckRules
 * @package frontend\components
 */
class Check extends Component
{

    public static function IsNotEmpty($year)
    {
        if (self::Behavioral($year) && self::Impact($year) && self::Development($year)) {
            return true;
        }
        return false;
    }

    public static function IsNotEmptyManager($year, $user_id)
    {
        if (self::BehavioralManager($year, $user_id) && self::ImpactManager($year, $user_id) && self::DevelopmentManager($year, $user_id)) {
            return true;
        }
        return false;
    }

    public static function Behavioral($year)
    {
        $behavioral = Behavioral::GetAllCurrentUserByYear($year);
        foreach ($behavioral as $item) {
            if (empty($item['user_comment'])) {
                return false;
            }
        }
        return true;
    }

    public static function BehavioralManager($year, $id)
    {
        $behavioral = Behavioral::GetAllbyUserByYear($year, $id);
        foreach ($behavioral as $item) {
            if (empty($item['manager_comment'])) {
                return false;
            }
        }
        return true;
    }

    public static function Impact($year)
    {
        $date = Impact::GetAllCurrentUserByYear($year);
        foreach ($date as $item) {
            if (empty($item['user_comment'])) {
                return false;
            }
        }
        return true;
    }

    public static function ImpactManager($year, $id)
    {
        $date = Impact::GetAllByUserIdByYear($year, $id);
        foreach ($date as $item) {
            if (empty($item['manager_comment'])) {
                return false;
            }
        }
        return true;
    }

    public static function Development($year)
    {
        $user_id = \Yii::$app->user->getId();
        $date = Development::GetAllByUserIdByYear($year, $user_id);
        foreach ($date as $item) {
            if (empty($item['user_comment'])) {
                return false;
            }
        }
        return true;
    }

    public static function DevelopmentManager($year, $id)
    {
        $date = ManagerDevelopment::GetOneByUserIdByManagerId($id, \Yii::$app->user->getId(), $year);
        if (empty($date['manager_comment'])) {
            return false;
        }
        return true;
    }

}