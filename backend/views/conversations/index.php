<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ConversationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conversations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conversations-index">


    <p>
        <?= Html::a('Reset filter', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'user_id',
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
                'attribute' => 'manager_id',
//                'format' => 'html',
                'value' => function ($data) {
                    return $data->m_first_name . ' ' . $data->m_last_name;
                },
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'manager_id',
                    'data' => \backend\models\User::GetAllUsersIndex(),
                    'options' => [
                        'placeholder' => 'Managers...',
                    ]
                ]),
            ],
//            'manager_id',
//            'notes:ntext',
            [
                'attribute' => 'notes',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<textarea readonly style="width: 100%" >' . $data->notes . '</textarea>';
                },

            ],
//            'attachment',
            [
                'attribute' => 'attachment',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->attachment ? '<a href="/attachments/' . $data->attachment . '" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Document</a>' : '';
                },

            ],
//            'date',
            //'status',
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

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}',]
        ],
    ]); ?>
</div>

