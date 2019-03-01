<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Behavioral */

$this->title = 'Update behavioral: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Behaviorals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="behavioral-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
