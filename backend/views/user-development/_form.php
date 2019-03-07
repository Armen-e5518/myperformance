<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserDevelopment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-development-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_comment')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
