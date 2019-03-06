<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserDevelopment */

$this->title = 'Update User Development: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Developments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-development-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
