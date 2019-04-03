<?php

namespace common\models\search;

use common\models\User;
use common\models\Years;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ManagerDevelopment;

/**
 * ManagerDevelopmentSearch represents the model behind the search form of `common\models\ManagerDevelopment`.
 */
class ManagerDevelopmentSearch extends ManagerDevelopment
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
            [['id', 'user_id', 'manager_id', 'year'], 'integer'],
            [['manager_comment'], 'safe'],
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
        $query = ManagerDevelopment::find()
            ->from(ManagerDevelopment::tableName() . ' md')
            ->select([
                'md.*',
                'u.first_name',
                'u.last_name',
                'y.year as year',
                'm.first_name as m_first_name',
                'm.last_name as m_last_name',
            ])
            ->leftJoin(User::tableName() . ' u', 'u.id = md.user_id')
            ->leftJoin(User::tableName() . ' m', 'm.id = md.manager_id')
            ->leftJoin(Years::tableName() . ' y', 'y.id = md.year');

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
            'md.user_id' => $this->user_id,
            'md.manager_id' => $this->manager_id,
            'md.year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'manager_comment', $this->manager_comment]);

        return $dataProvider;
    }
}
