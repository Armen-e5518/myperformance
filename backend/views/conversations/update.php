<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Conversations */

$this->title = 'Update Conversations: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conversations-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
