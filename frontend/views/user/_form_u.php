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
 * /* @var $model frontend\models\User
 */
/* @var $form yii\widgets\ActiveForm */
$manager = \backend\models\User::findOne($model->manager_id);
$model->password_hash = null;
?>

<div class="main-content">
    <div class="container">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-check"></i> Saved...</h4>
            </div>
        <?php endif; ?>
        <h1 class="content-title">User profile</h1>
        <div class="user-form">
            <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'f55'
                ]
            ]); ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'username')
                        ->textInput(['maxlength' => true,
                            'disabled' => 'disabled',
                            'title' => $model->getAttributeLabel('username'),
                            'placeholder' => $model->getAttributeLabel('username')]) ?>
                    <?= $form->field($model, 'first_name')
                        ->textInput(['maxlength' => true,
                            'title' => $model->getAttributeLabel('first_name'),
                            'placeholder' => $model->getAttributeLabel('first_name')]) ?>
                    <?= $form->field($model, 'last_name')
                        ->textInput(['maxlength' => true,
                            'title' => $model->getAttributeLabel('last_name'),
                            'placeholder' => $model->getAttributeLabel('last_name')]) ?>
                    <?= $form->field($model, 'email')
                        ->textInput(['maxlength' => true,
                            'title' => $model->getAttributeLabel('email'),
                            'placeholder' => $model->getAttributeLabel('email')]) ?>
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
                                <img width="20%" src="/users/<?= $model->avatar ?>" alt="">
                            </div>
                        </div>
                    <?php endif; ?>
                    <?= $form->field($model, 'imageFile')->fileInput()->label('Avatar') ?>
                    <div class="form-group add-Departments">
                        <label class="control-label" for="documents-category">Department</label>
                        <span class="form-control">
                             <?= \common\models\Departments::findOne($model->department_id)['title']; ?>
                        </span>
                    </div>
                    <div class="form-group add-Manager">
                        <label class="control-label" for="documents-category">Manager</label>
                        <span class="form-control">
                            <?= $manager['first_name'] ?> <?= $manager['last_name'] ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton('Update', ['class' => 'submit-btn transition']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>



