<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
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
            <h1>MyPerformance</h1>
            <div class="access-form">
                <?php $form = ActiveForm::begin([
                    'id' => 'reset-password-form',
                ]); ?>
                <div class="welcome-heading">Please choose your new password:</div>
                <div class="access-form-row">

                    <label class="username">
                        <?= $form->field($model, 'password', [
                            'options' => [
                                'class' => 'form-username',
                            ],
                        ])->passwordInput(["placeholder" => "Password", 'class' => ''])->label(false) ?>
                    </label>
                </div>
                <div>
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary uppercase']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
