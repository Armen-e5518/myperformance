<?php

namespace common\models\search;

use common\models\User;
use common\models\UserDevelopmentState;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserDevelopmentStateSearch represents the model behind the search form of `common\models\UserDevelopmentState`.
 */
class UserDevelopmentStateSearch extends UserDevelopmentState
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
            [['id', 'user_id', 'manager_id', 'year', 'status', 'date_manager', 'date_user'], 'integer'],
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
        $query = UserDevelopmentState::find()
            ->from(UserDevelopmentState::tableName() . ' uds')
            ->select([
                'uds.*',
                'u.first_name',
                'u.last_name',
            ])
            ->leftJoin(User::tableName() . ' u', 'u.id = uds.user_id')
            ->orderBy(['uds.id' => SORT_DESC]);

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
            'uds.user_id' => $this->user_id,
            'uds.manager_id' => $this->manager_id,
            'uds.year' => $this->year,
            'uds.status' => $this->status,
        ]);
        $query->andFilterWhere(['like', 'uds.date_manager', $this->date_manager]);
        $query->andFilterWhere(['like', 'uds.date_user', $this->date_user]);
        return $dataProvider;
    }
}
