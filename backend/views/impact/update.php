<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Impact */

$this->title = 'Update impact: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Impacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Impact-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
