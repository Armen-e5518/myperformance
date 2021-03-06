<?php

use yii\grid\GridView;
use yii\helpers\Html;

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
   <h4><?= $user_count ?> employees from <?= $all_users ?></h4>
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
               'data' => \backend\models\User::GetAllUsersByDepartmentIdIndex($searchModel->department_id),
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
            'attribute' => 'department_id',
//                'format' => 'html',
            'value' => function ($data) {
               return $data->department_title;
            },
            'filter' => \kartik\select2\Select2::widget([
               'model' => $searchModel,
               'attribute' => 'department_id',
               'data' => \common\models\Departments::GetAll(),
               'options' => [
                  'placeholder' => 'Departments...',
               ]
            ]),
         ],
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
