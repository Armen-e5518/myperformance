<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Goals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goals-form">
    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'my_comment')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'measure_success')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'timeframe')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'support_needed')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'manager_comments')->textarea(['rows' => 6]) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
