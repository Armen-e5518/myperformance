<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user_rules
 * /* @var $select_countries
 * /* @var $countries
 * /* @var $companies
 * /* @var $select_countries
 * /* @var $model
 * /* @var $model backend\models\User
 */
/* @var $form yii\widgets\ActiveForm */
$model->password_hash = null;
?>
<div class="user-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => 'f55'
        ]
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'disabled' => 'disabled', 'title' => $model->getAttributeLabel('username'), 'placeholder' => $model->getAttributeLabel('username')]) ?>
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('first_name'), 'placeholder' => $model->getAttributeLabel('first_name')]) ?>
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('last_name'), 'placeholder' => $model->getAttributeLabel('last_name')]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('email'), 'placeholder' => $model->getAttributeLabel('email')]) ?>
            <?= $form->field($model, 'position')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('position'), 'placeholder' => $model->getAttributeLabel('position')]) ?>
            <?= $form->field($model, 'password_hash')
                ->passwordInput(['maxlength' => true,
                    'title' => $model->getAttributeLabel('password_hash'),
                    'placeholder' => $model->getAttributeLabel('password_hash')]) ?>
            <?= $form->field($model, 'password_repeat')
                ->passwordInput(['maxlength' => true,
                    'title' => $model->getAttributeLabel('password_repeat'),
                    'placeholder' => $model->getAttributeLabel('password_repeat')]) ?>

        </div>
        <div class="col-md-6">
            <?php if (!empty($model->avatar)): ?>
                <div class="field-user-imagefile attachment gray-bg padding-5 margin-btn-5">
                    <div class="attachment-img">
                        <img width="25%" src="/users/<?= $model->avatar ?>" alt="">
                    </div>
                </div>
            <?php endif; ?>
            <?= $form->field($model, 'imageFile')->fileInput()->label('Avatar') ?>
            <div class="form-group add-Departments">
                <label class="control-label" for="documents-category">Department</label>
                <?= \kartik\select2\Select2::widget([
                    'model' => $model,
                    'name' => 'department_id',
                    'attribute' => 'department_id',
                    'data' => \common\models\Departments::GetAll(),
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Departments ...', 'id' => 'add-Departments', 'multiple' => false],
                    'pluginOptions' => [
                        'tags' => true,
                        'allowClear' => true,
                    ],
                ]);
                ?>
            </div>
            <div class="form-group add-Manager">
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
            <div>
                <ul>
                    <?php if (!empty($managers)): ?>
                        <?php foreach ($managers as $manager): ?>
                            <li>
                                <?= \common\models\Years::GetYearById($manager['year']) . ' ' . $manager['first_name'] . ' ' . $manager['last_name'] ?>
                            </li>
                        <? endforeach; ?>
                    <? endif; ?>
                </ul>
                <br>
                <?= Html::a('+ Add new manager for year', ['change-manager', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
