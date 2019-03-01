<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BehavioralFeedback */

$this->title = 'Create Behavioral Feedback';
$this->params['breadcrumbs'][] = ['label' => 'Behavioral Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behavioral-feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
