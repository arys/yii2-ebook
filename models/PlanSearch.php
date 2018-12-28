<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Plan;

/**
 * PlanSearch represents the model behind the search form of `app\models\Plan`.
 */
class PlanSearch extends Plan
{
    public $kafedra;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kafedra_id', 'status'], 'integer'],
            [['date_start', 'date_end', 'kafedra'], 'safe'],
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
        $query = Plan::find();

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

        $query->joinWith('kafedra');

        $dataProvider->sort->attributes['kafedra'] = [
            'asc' => ['levels.name' => SORT_ASC],
            'desc' => ['levels.name' => SORT_DESC],
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kafedra_id' => $this->kafedra_id,
            'status' => $this->status,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ]);

        $query->andFilterWhere(['like', 'levels.name', $this->kafedra]);

        return $dataProvider;
    }
}
