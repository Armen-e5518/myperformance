<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Departments */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="departments-form">

   <?php $form = ActiveForm::begin(); ?>

   <div class="row">
      <div class="col-md-5">
         <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      </div>

   </div>


   <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
   </div>

   <?php ActiveForm::end(); ?>

</div>
