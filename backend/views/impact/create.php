<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Impact */

$this->title = 'Create Impact';
$this->params['breadcrumbs'][] = ['label' => 'Impacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Impact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
