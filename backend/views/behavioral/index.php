<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BehavioralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Behavioral';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behavioral-index">

   <p>
      <?= Html::a('Create behavioral', ['create'], ['class' => 'btn btn-success']) ?>
      <?= Html::a('Reset filter', ['index'], ['class' => 'btn btn-success']) ?>
   </p>

   <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
         ['class' => 'yii\grid\SerialColumn'],

//            'id',
         'title',
//            'description:ntext',
//            'color',
//            'icon',
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
//            'date',

         ['class' => 'yii\grid\ActionColumn', 'template' => $searchModel->getTemplate(),],
      ],
   ]); ?>
</div>
