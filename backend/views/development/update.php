<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Development */

$this->title = 'Update Development: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Developments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="development-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
