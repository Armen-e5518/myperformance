<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserDevelopmentState */

$this->title = 'Update User Development State: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Development States', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-development-state-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
