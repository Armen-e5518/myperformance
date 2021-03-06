<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ConversationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conversations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'manager_id') ?>

    <?= $form->field($model, 'notes') ?>

    <?= $form->field($model, 'attachment') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
