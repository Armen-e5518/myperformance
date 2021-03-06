<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\GoalsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'my_comment') ?>

    <?= $form->field($model, 'measure_success') ?>

    <?php // echo $form->field($model, 'timeframe') ?>

    <?php // echo $form->field($model, 'support_needed') ?>

    <?php // echo $form->field($model, 'manager_comments') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
