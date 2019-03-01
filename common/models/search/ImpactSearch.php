<?php

namespace common\models\search;

use common\models\Impact;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ImpactSearch represents the model behind the search form of `common\models\Impact`.
 */
class ImpactSearch extends Impact
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','year'], 'integer'],
            [['title', 'description', 'color', 'icon', 'date'], 'safe'],
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
        $query = Impact::find();

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
            'date' => $this->date,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
