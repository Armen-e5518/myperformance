<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $members
 * */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="user-behavioral-index">
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Reset filter', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'first_name',
            'last_name',
            'email:email',
            'username',
            [
                'attribute' => 'manager_id',
//                'format' => 'html',
                'value' => function ($data) {
                    return \backend\models\User::GetUserNameById($data->manager_id);
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
            [
                'attribute' => 'department_id',
//                'format' => 'html',
                'value' => function ($data) {
                    return \common\models\Departments::GetTitleById($data->department_id);
                },
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'department_id',
                    'data' => \common\models\Departments::GetAll(),
                    'options' => [
                        'placeholder' => 'Managers...',
                    ]
                ]),
            ],
            [
                'attribute' => 'Avatar',
                'format' => 'html',
                'value' => function ($data) {
                    $img = !empty($data->avatar) ? $data->avatar : 'no-user.png';
                    return Html::img('/users/' . $img,
                        ['width' => '50px']);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => '{update}{delete}',
                'buttons' => [
                    'change-manager' => function ($url, $model) {
                        return Html::a('<span class = "glyphicon glyphicon-cog"></span>', $url, [
                            'title' => Yii::t('app', 'Change manager'),
                        ]);
                    },


                ],
            ],
        ],
    ]); ?>


</div>
