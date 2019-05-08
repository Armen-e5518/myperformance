<?php

namespace common\models\search;

use common\models\Conversations as ConversationsModel;
use common\models\Departments;
use common\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Conversations represents the model behind the search form of `common\models\Conversations`.
 */
class Conversations extends ConversationsModel
{
   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['id', 'user_id', 'manager_id', 'status', 'year','department_id'], 'integer'],
         [['notes', 'attachment', 'date'], 'safe'],
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
    *
    * @return ActiveDataProvider
    */
   public function search($params)
   {
      $query = ConversationsModel::find()
         ->from(ConversationsModel::tableName() . ' c')
         ->select([
            'c.*'
         ])
         ->leftJoin(User::tableName() . ' u', 'u.id = c.user_id')
         ->leftJoin(Departments::tableName() . ' d', 'd.id = u.department_id');

      // add conditions that should always apply here

      $dataProvider = new ActiveDataProvider([
         'query' => $query,
      ]);

      $this->load($params);

      if (!$this->validate()) {
         // uncomment the following line if you do not want to return any records when validation fails
         // $query->where('0=1');
         return $dataProvider;
      }

      // grid filtering conditions
      $query->andFilterWhere([
         'id' => $this->id,
         'user_id' => $this->user_id,
         'manager_id' => $this->manager_id,
         'date' => $this->date,
         'status' => $this->status,
         'year' => $this->year,
      ]);

      $query->andFilterWhere(['like', 'notes', $this->notes])
         ->andFilterWhere(['like', 'attachment', $this->attachment]);

      return $dataProvider;
   }
}
