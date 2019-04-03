<?php

namespace common\models\search;

use common\models\Development;
use common\models\User;
use common\models\Years;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserDevelopment;

/**
 * UserDevelopmentSearch represents the model behind the search form of `common\models\UserDevelopment`.
 */
class UserDevelopmentSearch extends UserDevelopment
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
            [['id', 'user_id', 'development_id', 'year'], 'integer'],
            [['user_comment'], 'safe'],
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
        $query = UserDevelopment::find()
            ->from(UserDevelopment::tableName() . ' ud')
            ->select([
                'ud.*',
                'u.first_name',
                'u.last_name',
                'y.year as year',
                'd.title as title',
            ])
            ->leftJoin(User::tableName() . ' u', 'u.id = ud.user_id')
            ->leftJoin(Development::tableName() . ' d', 'd.id = ud.development_id')
            ->leftJoin(Years::tableName() . ' y', 'y.id = ud.year');

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
            'development_id' => $this->development_id,
            'ud.year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'user_comment', $this->user_comment]);

        return $dataProvider;
    }
}
