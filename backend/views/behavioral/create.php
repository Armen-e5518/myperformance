<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Behavioral */

$this->title = 'Create behavioral';
$this->params['breadcrumbs'][] = ['label' => 'Behavioral', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behavioral-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
