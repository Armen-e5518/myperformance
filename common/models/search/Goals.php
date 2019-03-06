<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Goals as GoalsModel;

/**
 * Goals represents the model behind the search form of `common\models\Goals`.
 */
class Goals extends GoalsModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'year', 'status'], 'integer'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GoalsModel::find();

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
            'year' => $this->year,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'my_comment', $this->my_comment])
            ->andFilterWhere(['like', 'measure_success', $this->measure_success])
            ->andFilterWhere(['like', 'timeframe', $this->timeframe])
            ->andFilterWhere(['like', 'support_needed', $this->support_needed])
            ->andFilterWhere(['like', 'manager_comments', $this->manager_comments]);

        return $dataProvider;
    }
}
