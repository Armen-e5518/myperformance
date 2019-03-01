<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-block">
    <div class="container">
        <div class="logo">
            <a href="/site/login"><img src="/html/assets/images/logo.png"
                                       alt="Grant Thornton | An instinct for growth&trade;"
                                       title="Grant Thornton | An instinct for growth&trade;"></a>
        </div>
        <div class="access-area">
            <h1>Performance Appraisal System</h1>
            <div class="access-form">
                <?php $form = ActiveForm::begin([
                    'id' => 'request-password-reset-form',
                ]); ?>
                <div class="welcome-heading">Sign-in to access your account</div>
                <div class="access-form-row">

                    <label class="username">
                        <?= $form->field($model, 'email', [
                            'options' => [
                                'class' => 'form-username',
                            ],
                        ])->textInput(["placeholder" => "Email", 'class' => ''])->label(false) ?>
                    </label>
                </div>
                <div>
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary uppercase']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
