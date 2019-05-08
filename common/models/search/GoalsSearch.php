<?php

namespace common\models\search;

use common\models\Departments;
use common\models\Goals;
use common\models\User;
use common\models\Years;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GoalsSearch represents the model behind the search form of `common\models\Goals`.
 */
class GoalsSearch extends Goals
{
   public function behaviors()
   {
      return [
         [
            'class' => \backend\behaviors\AdminAccess::class
         ]
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['id', 'user_id', 'year', 'status', 'department_id'], 'integer'],
         [['description', 'my_comment', 'measure_success', 'timeframe', 'support_needed', 'manager_comments', 'date'], 'safe'],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function scenarios()
   {
      // bypass scenarios() implementation in the parent class
      return Model::scenarios();
   }

   /**
    * Creates data provider instance with search query applied
    *
    * @param array $params
    * @param $count
    *
    * @return ActiveDataProvider
    */
   public function search($params, $count)
   {
      $query = Goals::find()
         ->from(Goals::tableName() . ' g')
         ->select([
            'g.id',
            'g.user_id' ,
            'g.description',
            'g.my_comment',
            'g.measure_success',
            'g.timeframe' ,
            'g.support_needed' ,
            'g.manager_comments',
            'g.date',
            'g.status',
            'u.first_name',
            'u.last_name',
            'y.year as year',
            'd.title as department_title',
         ])
         ->leftJoin(User::tableName() . ' u', 'u.id = g.user_id')
         ->leftJoin(Departments::tableName() . ' d', 'd.id = u.department_id')
         ->leftJoin(Years::tableName() . ' y', 'y.id = g.year')
         ->orderBy(['y.year' => SORT_ASC, 'g.user_id' => SORT_ASC]);

      // add conditions that should always apply here

      $dataProvider = new ActiveDataProvider([
         'query' => $query,
      ]);

      $this->load($params);

      if (!$this->validate()) {
         return $dataProvider;
      }

      // grid filtering conditions
      $query->andFilterWhere([
         'id' => $this->id,
         'user_id' => $this->user_id,
         'g.year' => $this->year,
         'd.id' => $this->department_id,
      ]);

      $query->andFilterWhere(['like', 'description', $this->description])
         ->andFilterWhere(['like', 'my_comment', $this->my_comment])
         ->andFilterWhere(['like', 'measure_success', $this->measure_success])
         ->andFilterWhere(['like', 'timeframe', $this->timeframe])
         ->andFilterWhere(['like', 'support_needed', $this->support_needed])
         ->andFilterWhere(['like', 'manager_comments', $this->manager_comments]);

      if ($count) {
         return $query->groupBy(['g.user_id'])
            ->count();
      }
      return $dataProvider;
   }
}
