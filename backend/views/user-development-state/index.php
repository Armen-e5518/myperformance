<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserDevelopmentStateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Development States';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-development-state-index">


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

//            'status',
         [
            'attribute' => 'status',
//                'format' => 'html',
            'value' => function ($data) {
               if ($data->status == 1) {
                  return 'Submitted by user';
               } elseif ($data->status == 2) {
                  return 'Submitted by Manager';
               } else {
                  return 'Not submit';
               }

            },
            'filter' => \kartik\select2\Select2::widget([
               'model' => $searchModel,
               'attribute' => 'status',
               'data' => [
                  1 => 'Submitted by user',
                  2 => 'Submitted by Manager',

               ],
               'options' => [
                  'placeholder' => 'Status...',
               ]
            ]),
         ],
         'date_user',
         'date_manager',
         'year',
         ['class' => 'yii\grid\ActionColumn', 'template' => $searchModel->getAccess() ? '' : '{delete}',],
      ],
   ]); ?>
</div>
