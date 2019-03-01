<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Departments */

$this->title = 'Create department';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
