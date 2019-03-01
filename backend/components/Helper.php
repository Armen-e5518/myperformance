<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/21/2018
 * Time: 12:40 PM
 */

namespace backend\components;


class Helper
{

    public static function DDD($x)
    {
        echo '<pre>';
        print_r($x);
        echo '</pre>';

    }

    public static function GetDate($date)
    {
        return date("d-m-Y", strtotime($date));
    }

    public static function GetDateByTime($date)
    {
        return date("d-m-Y H:i:s", strtotime($date));
    }

    public static function GetDateFoSql($date)
    {
        return date("Y-m-d", strtotime($date));
    }

    public static function GetDateFoSqlByTime($date)
    {
        return date("Y-m-d H:i:s", strtotime($date));
    }

    public static function GetFeedbackStatus($feedback, $type)
    {
        if ($type == 'goals') {

            if ($feedback['status'] == 0) {
                $label = 'Objective was achieved';
                $status = 'strongly-agree';
            }
            if ($feedback['status'] == 1) {
                $label = 'Objective was partially achieved';
                $status = 'agree';
            }
            if ($feedback['status'] == 2) {
                $label = 'Objective wasn’t achieved';
                $status = 'disagree';
            }
        } else if ($type == 'behavioral') {

            if ($feedback['status'] == 0) {
                $label = 'Strongly agree';
                $status = 'strongly-agree';
            }
            if ($feedback['status'] == 1) {
                $label = 'Agree';
                $status = 'agree';
            }
            if ($feedback['status'] == 2) {
                $label = 'Disagree';
                $status = 'disagree';
            }
            if ($feedback['status'] == 3) {
                $label = 'Strongly disagree';
                $status = 'disagree';
            }

        } else if ($type == 'impact') {
            if ($feedback['status'] == 0) {
                $label = 'Strongly agree';
                $status = 'strongly-agree';
            }
            if ($feedback['status'] == 1) {
                $label = 'Agree';
                $status = 'agree';
            }
            if ($feedback['status'] == 2) {
                $label = 'Disagree';
                $status = 'disagree';
            }
            if ($feedback['status'] == 3) {
                $label = 'Strongly disagree';
                $status = 'disagree';
            }
        }
        return [
            'class' => $status,
            'label' => $label
        ];
    }
}