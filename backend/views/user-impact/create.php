<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserImpact */

$this->title = 'Create User Impact';
$this->params['breadcrumbs'][] = ['label' => 'User Impacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-impact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
