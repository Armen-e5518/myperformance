<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Edit user data';

$this->params['breadcrumbs'][] = $this->title;


?>

<div class="main-content">
    <section class="table-list gray-bg annual-appraisal">
        <div class="container">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i> Saved...</h4>
                </div>
            <?php endif; ?>
            <div class="table-block">
                <div class="table-title flex"><img src="/html/assets/images/icons/user-icon.png">User profile</div>
                <?= $this->render('_form_u', [
                    'model' => $model,
                ]) ?>
            </div>

        </div>
    </section>
</div>