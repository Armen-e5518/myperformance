<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('/js/jq.js');
$this->registerJsFile('/js/user-create.js?v=2');
?>

<div class="user-form ">
    <?php $form = ActiveForm::begin([
        'options' => [
            'autocomplete' => 'off'
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('first_name'), 'placeholder' => $model->getAttributeLabel('first_name')]) ?>
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('last_name'), 'placeholder' => $model->getAttributeLabel('last_name')]) ?>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('username'), 'placeholder' => $model->getAttributeLabel('username')]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'title' => $model->getAttributeLabel('password_hash'), 'autocomplete' => "off", 'placeholder' => $model->getAttributeLabel('password_hash')]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('email'), 'placeholder' => $model->getAttributeLabel('email')]) ?>
            <?= $form->field($model, 'position')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('position'), 'placeholder' => $model->getAttributeLabel('position')]) ?>
        </div>
    </div>

    <div class="form-group">
        <br>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
