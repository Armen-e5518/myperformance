<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GoalsFeedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goals-feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'goal_id')->textInput() ?>

    <?= $form->field($model, 'menager_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
