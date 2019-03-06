<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Conversations */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conversations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conversations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Conversations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'manager_id',
            'notes:ntext',
            'attachment',
            //'date',
            //'status',
            //'year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
