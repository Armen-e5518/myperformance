<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DevelopmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Developments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="development-index">

    <p>
        <?= Html::a('Create Development', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Reset filter', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            [
                'attribute' => 'year',
//                'format' => 'html',
                'value' => function ($data) {
                    return \common\models\Years::GetYearById($data->year);
                },
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'year',
                    'data' => \common\models\Years::GetAll(),
                    'options' => [
                        'placeholder' => 'Years...',
                    ]
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}',],
        ],
    ]); ?>
</div>
