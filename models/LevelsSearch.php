<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Levels;

/**
 * LevelsSearch represents the model behind the search form of `app\models\Levels`.
 */
class LevelsSearch extends Levels
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'type_id', 'active'], 'integer'],
            [['name', 'short_name', 'type'], 'safe'],
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
        $query = Levels::find();

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

        switch ($_GET['tid']) {

            case null:
                $tid = 1;
                // grid filtering conditions
                $query->andFilterWhere([
                    'id' => $this->id,
                    'parent_id' => $this->parent_id,
                    'type_id' => $tid,
                    'active' => $this->active,
                ]);

                $query->andFilterWhere(['like', 'name', $this->name])
                    ->andFilterWhere(['like', 'short_name', $this->short_name]);
            break;

            case 1:
                $tid = 1;
                // grid filtering conditions
                $query->andFilterWhere([
                    'id' => $this->id,
                    'parent_id' => $this->parent_id,
                    'type_id' => $tid,
                    'active' => $this->active,
                ]);

                $query->andFilterWhere(['like', 'name', $this->name])
                    ->andFilterWhere(['like', 'short_name', $this->short_name]);
                break;

            case 2:
                $tid = 2;
                // grid filtering conditions
                $query->andFilterWhere([
                    'id' => $this->id,
                    'parent_id' => $this->parent_id,
                    'type_id' => $tid,
                    'active' => $this->active,
                ]);

                $query->andFilterWhere(['like', 'name', $this->name])
                    ->andFilterWhere(['like', 'short_name', $this->short_name]);
            break;

            default:
                $tid = (int)$_GET['tid'];
                // grid filtering conditions
                $query->andFilterWhere([
                    'id' => $tid,
                    'parent_id' => $this->parent_id,
                    'active' => $this->active,
                ]);
                $query->andFilterWhere(['like', 'name', $this->name])
                    ->andFilterWhere(['like', 'short_name', $this->short_name]);
            break;

        }
        return $dataProvider;
    }
}
