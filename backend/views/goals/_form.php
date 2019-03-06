<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Goals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'my_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'measure_success')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timeframe')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'support_needed')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'manager_comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
