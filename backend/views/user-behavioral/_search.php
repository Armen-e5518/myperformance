<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\UserBehavioralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-behavioral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'behavioral_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_comment') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'manager_comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
