<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ManagerDevelopmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Managers comment developments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-development-index">

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
//            'manager_id',
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
//            'manager_comment:ntext',
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
