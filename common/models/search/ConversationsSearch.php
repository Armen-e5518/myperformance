<?php

namespace common\models\search;

use common\models\User;
use common\models\Years;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Conversations;

/**
 * ConversationsSearch represents the model behind the search form of `common\models\Conversations`.
 */
class ConversationsSearch extends Conversations
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
            [['id', 'user_id', 'manager_id', 'status', 'year'], 'integer'],
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
        $query = Conversations::find()
            ->from(Conversations::tableName() . ' c')
            ->select([
                'c.*',
                'u.first_name',
                'u.last_name',
                'm.first_name as m_first_name',
                'y.year as year',
                'm.last_name as m_last_name',
            ])
            ->leftJoin(User::tableName() . ' u', 'u.id = c.user_id')
            ->leftJoin(Years::tableName() . ' y', 'y.id = c.year')
            ->leftJoin(User::tableName() . ' m', 'm.id = c.manager_id');

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
            'c.manager_id' => $this->manager_id,
            'date' => $this->date,
            'status' => $this->status,
            'c.year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'attachment', $this->attachment]);

        return $dataProvider;
    }
}
