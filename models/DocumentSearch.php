<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Document;

/**
 * DocumentSearch represents the model behind the search form of `app\models\Document`.
 */
class DocumentSearch extends Document
{
    public $specialty;
    public $discipline;
    public $type;
    public $language;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'language_id', 'discipline_id', 'specialty_id', 'plan_id', 'responsible_id', 'reviewer_id','status'], 'integer'],
            [['name', 'finish_date', 'token', 'path', 'specialty', 'discipline', 'type', 'language'], 'safe'],
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
        $query = Document::find();

        $query->joinWith(['type', 'discipline', 'specialty', 'language']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['specialty'] = [
            'asc' => ['specialty.name' => SORT_ASC],
            'desc' => ['specialty.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['discipline'] = [
            'asc' => ['discipline.name' => SORT_ASC],
            'desc' => ['discipline.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['type'] = [
            'asc' => ['type.name' => SORT_ASC],
            'desc' => ['type.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['language'] = [
            'asc' => ['language.name' => SORT_ASC],
            'desc' => ['language.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        switch ($_GET['planid']) {
            case null:
                $query->andFilterWhere([
                    'id' => $this->id,
                    'type_id' => $this->type_id,
                    'language_id' => $this->language_id,
                    'discipline_id' => $this->discipline_id,
                    'specialty_id' => $this->specialty_id,
                    'plan_id' => $this->plan_id,
                    'responsible_id' => $this->responsible_id,
                    'reviewer_id' => $this->reviewer_id,
                    'finish_date' => $this->finish_date,
                    'status' => $this->status,
                ]);
                $query->andFilterWhere(['like', 'name', $this->name])
                    ->andFilterWhere(['like', 'token', $this->token])
                    ->andFilterWhere(['like', 'path', $this->path])
                    ->andFilterWhere(['like', 'discipline.name', $this->discipline])
                    ->andFilterWhere(['like', 'type.name', $this->type])
                    ->andFilterWhere(['like', 'language.name', $this->language])
                    ->andFilterWhere(['like', 'specialty.name', $this->specialty]);
                break;
            default:
                $planid = (int)$_GET['planid'];
                $query->andFilterWhere([
                    'id' => $this->id,
                    'type_id' => $this->type_id,
                    'language_id' => $this->language_id,
                    'discipline_id' => $this->discipline_id,
                    'specialty_id' => $this->specialty_id,
                    'plan_id' => $planid,
                    'responsible_id' => $this->responsible_id,
                    'reviewer_id' => $this->reviewer_id,
                    'finish_date' => $this->finish_date,
                    'status' => $this->status,
                ]);
                $query->andFilterWhere(['like', 'name', $this->name])
                    ->andFilterWhere(['like', 'token', $this->token])
                    ->andFilterWhere(['like', 'path', $this->path])
                    ->andFilterWhere(['like', 'discipline.name', $this->discipline])
                    ->andFilterWhere(['like', 'type.name', $this->type])
                    ->andFilterWhere(['like', 'language.name', $this->language])
                    ->andFilterWhere(['like', 'specialty.name', $this->specialty]);
                break;
        }

        return $dataProvider;
    }
}
