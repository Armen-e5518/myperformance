<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Years */

$this->title = 'Create year';
$this->params['breadcrumbs'][] = ['label' => 'Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="years-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
