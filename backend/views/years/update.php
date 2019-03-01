<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Years */

$this->title = 'Update year';
$this->params['breadcrumbs'][] = ['label' => 'Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="years-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
