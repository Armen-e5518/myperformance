<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use  common\models\BehavioralFeedback;
use  common\models\GoalsFeedback;
use common\models\ImpactFeedback;


AppAsset::register($this);
if (!Yii::$app->user->isGuest) {
    $beh_count = count(BehavioralFeedback::findAll(['manager_id' => Yii::$app->user->getId(), 'state' => BehavioralFeedback::STATE_UPCOMING]));
    $goals_count = count(GoalsFeedback::findAll(['manager_id' => Yii::$app->user->getId(), 'state' => GoalsFeedback::STATE_UPCOMING]));
    $impact_count = count(ImpactFeedback::findAll(['manager_id' => Yii::$app->user->getId(), 'state' => ImpactFeedback::STATE_UPCOMING]));
    $upcoming_feel = $beh_count + $goals_count + $impact_count;
} else {
    $upcoming_feel = 0;
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="inner-page">
<?php $this->beginBody() ?>

<div class="top-navigation">
    <div class="container flex">
        <a href="/">
            <picture>
                <source media="(max-width: 1080px)" srcset="/main/assets/images/logo-short2.png">
                <img src="/main/assets/images/logo-short.png" alt="" class="logo"/>
            </picture>
        </a>
        <label>
            <input type="checkbox">
            <span class="burger-icon"></span>
            <ul class="nav-menu flex">
                <?php if (!Yii::$app->user->isGuest && 0): ?>
                <li>
                    <a href="/goals/2018" class="transition relative <?= !empty($this->params['goals']) ? 'active' : '' ?>">
                        <i class="fas fa-expand"></i>goals
                    </a>
                </li>
                <li>
                    <a href="/feedback"
                       class="transition relative <?= !empty($this->params['feedback']) ? 'active' : '' ?>">
                        <i class="far fa-check-circle"></i>feedback requests
                        <?php if (!empty($upcoming_feel)): ?>
                            <span class="has-notification"><?= $upcoming_feel ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li>
                    <a href="/conversations" class="transition relative <?= !empty($this->params['conversations']) ? 'active' : '' ?>">
                        <i class="far fa-comment-dots"></i>Coaching conversations
<!--                        <span class="has-notification">1</span>-->
                    </a>
                </li>
            </ul>
            <?php endif; ?>
        </label>
        <div class="user-options">
            <?php if (Yii::$app->user->isGuest): ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/site/login">Log In</span></a>
                        <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                            <div class="col-lg-12">
                                <div class="text-center"><h3><b>Log In</b></h3></div>
                            </div>
                        </ul>
                    </li>
                </ul>
            <?php else: ?>
                <div class="dropdown">
                    <a class="dropdown-toggle flex" type="button" data-toggle="dropdown">
                        <img src="/users/<?= Yii::$app->user->identity->avatar ?>" alt="">
                        <span class="inline-block"><?= \backend\models\User::GetCurrentUserName() ?></span>
                        <i class="fas fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a data-method="post" href="/user">User profile</a></li>
                        <li><a data-method="post" href="/site/logout">Logout</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
