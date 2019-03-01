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
    <h2>User: <?= $model->first_name . ' ' . $model->last_name ?></h2>
    <div class="row">
        <div class="col-md-6">
            <label class="control-label" for="documents-category">Manager</label>
            <?= \kartik\select2\Select2::widget([
                'model' => $model,
                'name' => 'manager_id',
                'attribute' => 'manager_id',
                'data' => \backend\models\User::GetAllUsersIndex(),
                'maintainOrder' => true,
                'options' => [
                    'placeholder' => 'Managers ...',
                    'id' => 'add-Manager',
                    'multiple' => false
                ],
                'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <label class="control-label" for="documents-category">Years</label>
            <?= \kartik\select2\Select2::widget([
                'model' => $model,
                'name' => 'year',
                'attribute' => 'year',
                'data' => \common\models\Years::GetAll(),
                'maintainOrder' => true,
                'options' => [
                    'placeholder' => 'Years ...',
                    'id' => 'add-year',
                    'multiple' => false
                ],
                'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <br>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
