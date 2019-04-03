<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserDevelopmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Developments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-development-index">

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
//            'development_id',
//            'user_comment:ntext',
//            'year',

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
                'attribute' => 'development_id',
                'format' => 'raw',
                'value' => function ($data) {
                    return  $data->title ;
                },
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'development_id',
                    'data' => \common\models\Development::GetAllIndex(),
                    'options' => [
                        'placeholder' => 'Development...',
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
//            'date',
            //'manager_comment:ntext',

           ['class' => 'yii\grid\ActionColumn', 'template' => $searchModel->getTemplate(),],
        ],
    ]); ?>
</div>
