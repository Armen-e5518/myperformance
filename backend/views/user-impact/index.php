<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserImpactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User impacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-impact-index">

    <p>
        <?= Html::a('Reset filter', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'impact_id',
//            'user_id',
//            'user_comment:ntext',
//            'date',
            //'manager_comment:ntext',

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
                'attribute' => 'impact_id',
                'format' => 'raw',
                'value' => function ($data) {
                    return  $data->title ;
                },
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'impact_id',
                    'data' => \common\models\Impact::GetAllIndex(),
                    'options' => [
                        'placeholder' => 'Impacts...',
                    ]
                ]),

            ],
//            'user_comment:ntext',
            [
                'attribute' => 'user_comment',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<textarea readonly style="width: 100%" >' . $data->user_comment . '</textarea>';
                },

            ],
            [
                'attribute' => 'manager_comment',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<textarea readonly style="width: 100%" >' . $data->manager_comment . '</textarea>';
                },

            ],
            [
                'attribute' => 'year',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'year',
                    'data' => \common\models\Years::GetAll(),
                    'options' => [
                        'placeholder' => 'Yeas...',
                    ]
                ]),
            ],
           ['class' => 'yii\grid\ActionColumn', 'template' => $searchModel->getTemplate(),],
        ],
    ]); ?>
</div>
