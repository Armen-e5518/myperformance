<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserDevelopmentState */

$this->title = 'Create User Development State';
$this->params['breadcrumbs'][] = ['label' => 'User Development States', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-development-state-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
