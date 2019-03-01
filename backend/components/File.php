<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/21/2018
 * Time: 12:40 PM
 */

namespace backend\components;


class File
{

    /**
     * @param $file
     * @param $name
     * @return bool|null|string
     */
    public static function Uploads($file, $name)
    {
        if (!empty($file["articles"]["name"][$name]['img'])) {
            $target_file = \Yii::$app->params['uploads'] . basename($file["articles"]["name"][$name]['img']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($file["articles"]["size"][$name]['img'] > 50000000) {
                return false;
            }
            if ($imageFileType != "jpg"
                && $imageFileType != "png"
                && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                return false;
            } else {
                $file_name = md5(microtime(true)) . '.' . $imageFileType;
            }
            if (move_uploaded_file($file["articles"]["tmp_name"][$name]['img'],
                \Yii::$app->params['uploads'] . $file_name)) {
                return $file_name;
            };
            return null;
        }
    }

    public static function FileUpload($file)
    {
        if (!empty($file["file"]["name"])) {
            $target_file = \Yii::$app->params['uploads'] . basename($file["file"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($file["file"]["size"] > 500000) {
                return false;
            }
            if ($imageFileType != "jpg"
                && $imageFileType != "png"
                && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                return false;
            } else {
                $file_name = md5(microtime(true)) . '.' . $imageFileType;
            }
            if (move_uploaded_file($file["file"]["tmp_name"],
                \Yii::$app->params['uploads'] . $file_name)) {
                return $file_name;
            };
            return null;
        }
    }

    public static function OneFileUpload($file,$name)
    {
        if (!empty($file[$name]["name"]['img'])) {
            $target_file = \Yii::$app->params['uploads'] . basename($file[$name]["name"]['img']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($file[$name]["size"]['img'] > 500000) {
                return false;
            }
            if ($imageFileType != "jpg"
                && $imageFileType != "png"
                && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                return false;
            } else {
                $file_name = md5(microtime(true)) . '.' . $imageFileType;
            }
            if (move_uploaded_file($file[$name]["tmp_name"]['img'],
                \Yii::$app->params['uploads'] . $file_name)) {
                return $file_name;
            }
            return null;
        }
    }
}