<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/html/assets/js/custom.js"></script>
    <?php $this->head() ?>
</head>
<body class="inner-page">
<?php $this->beginBody() ?>
<div class="top-navigation">
    <div class="container flex">
        <div class="logo flex">
            <a href="/annual/2018">
                <picture>
                    <source media="(max-width: 1080px)" srcset="/html/assets/images/logo-short2.png">
                    <img src="/html/assets/images/logo-short.png" alt="">
                </picture>
            </a>
            <span>MyPerformance</span>
        </div>
        <div class="user-options flex">
            <div class="nav-menu">
                <!--                <a href="mailto:name@email.com">Link text</a>-->
                <a href="mailto:gtmyperformance@gmail.com" class="transition relative">Contact us</a>
            </div>
            <div class="menu-block">
                <a href="javascript:void(0);" class="flex drop-down">
                    <img src="/users/<?= Yii::$app->user->identity->avatar ?>" alt="">
                    <span class="inline-block"><?= \frontend\models\User::getCurrentUserName() ?></span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="menu-block-body hide">
                    <a class="profile menu-item" href="/user/index">Profile</a>
                    <a data-method="post" class="logout menu-item" href="/site/logout">Logout</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $content ?>
<div class="footer">
    <div class="container">
        <p>&copy; 2019 Grant Thornton. All rights reserved.</p>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
