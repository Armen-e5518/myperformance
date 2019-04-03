<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\GoalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goals-index">

    <p>
        <?= Html::a('Reset filter', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'user_id',
//                'format' => 'html',
                'value' => function ($data) {
                    return $data->first_name . ' ' . $data->last_name;
                },
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'user_id',
                    'data' => \backend\models\User::GetAllUsersIndex(),
                    'options' => [
                        'placeholder' => 'Users...',
                    ]
                ]),
            ],
            [
                'attribute' => 'description',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<textarea readonly style="width: 100%" >' . $data->description . '</textarea>';
                },

            ],
            [
                'attribute' => 'manager_comments',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<textarea readonly style="width: 100%" >' . $data->manager_comments . '</textarea>';
                },

            ],
//            'my_comment:ntext',
//            'measure_success:ntext',
            //'timeframe:ntext',
            //'support_needed:ntext',
            //'manager_comments:ntext',
//            'year',
            [
                'attribute' => 'year',
//
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'year',
                    'data' => \common\models\Years::GetAll(),
                    'options' => [
                        'placeholder' => 'Yeas...',
                    ]
                ]),
            ],
            //'date',
            //'status',

           ['class' => 'yii\grid\ActionColumn', 'template' => $searchModel->getTemplate(),],
        ],
    ]); ?>
</div>
