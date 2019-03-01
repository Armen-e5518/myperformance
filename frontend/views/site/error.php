<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<img src="/main/assets/images/login-page-bg.jpg" alt="" class="body-bg-img">
<div class="container">
    <div class="logo">
        <a href="/site/login"><img src="/main/assets/images/logo.png" alt="Grant Thornton | An instinct for growth&trade;" title="Grant Thornton | An instinct for growth&trade;"></a>
    </div>
    <div class="access-area">
        <div class="site-error">

            <h1><?= Html::encode($this->title) ?></h1>

            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>

            <p>
                The above error occurred while the Web server was processing your request.
            </p>
            <p>
                Please contact us if you think this is a server error. Thank you.
            </p>

        </div>
    </div>
</div>

