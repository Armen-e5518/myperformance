<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * html frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        "/html/assets/css/reset.css",
        "/html/assets/css/style.css",
        "/html/assets/css/custom.css",
        "//use.fontawesome.com/releases/v5.3.1/css/all.css",
        "//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900",
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
