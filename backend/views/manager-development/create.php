<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ManagerDevelopment */

$this->title = 'Create Manager Development';
$this->params['breadcrumbs'][] = ['label' => 'Manager Developments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-development-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
