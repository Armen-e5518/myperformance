<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\YearsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="years-index">

    <p>
        <?= Html::a('Create year', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Reset filter', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'year',
//            'status',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}',],
        ],
    ]); ?>
</div>
