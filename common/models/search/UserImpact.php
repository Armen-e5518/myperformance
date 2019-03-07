<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserImpact as UserImpactModel;

/**
 * UserImpact represents the model behind the search form of `common\models\UserImpact`.
 */
class UserImpact extends UserImpactModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'impact_id', 'user_id'], 'integer'],
            [['user_comment', 'date', 'manager_comment'], 'safe'],
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
        $query = UserImpactModel::find()
            ->from(UserBehavioral::tableName() . ' ub')
            ->select([
                'ub.*',
                'u.first_name',
                'u.last_name',
                'y.year as year',
                'b.title as title',
            ])
            ->leftJoin(User::tableName() . ' u', 'u.id = ub.user_id')
            ->leftJoin(Behavioral::tableName() . ' b', 'b.id = ub.behavioral_id')
            ->leftJoin(Years::tableName() . ' y', 'y.id = b.year');

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
            'impact_id' => $this->impact_id,
            'user_id' => $this->user_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'user_comment', $this->user_comment])
            ->andFilterWhere(['like', 'manager_comment', $this->manager_comment]);

        return $dataProvider;
    }
}
