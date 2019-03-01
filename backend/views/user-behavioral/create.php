<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserBehavioral */

$this->title = 'Create User Behavioral';
$this->params['breadcrumbs'][] = ['label' => 'User Behaviorals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-behavioral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
