<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserBehavioral */

$this->title = 'Update User Behavioral: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User behavioral', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-behavioral-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
