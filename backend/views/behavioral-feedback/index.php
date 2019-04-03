<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BehavioralFeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Behavioral Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behavioral-feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Behavioral Feedback', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'behavioral_id',
            'manager_id',
            'status',
            //'comment:ntext',
            //'date',

           ['class' => 'yii\grid\ActionColumn', 'template' => $searchModel->getTemplate(),],
        ],
    ]); ?>
</div>
