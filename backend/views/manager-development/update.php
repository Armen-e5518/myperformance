<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ManagerDevelopment */

$this->title = 'Update Manager Development: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Manager Developments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manager-development-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
