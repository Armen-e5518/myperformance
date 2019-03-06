<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Goals */

$this->title = 'Update Goals: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Goals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goals-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
