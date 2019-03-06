<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserDevelopment */

$this->title = 'Create User Development';
$this->params['breadcrumbs'][] = ['label' => 'User Developments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-development-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
