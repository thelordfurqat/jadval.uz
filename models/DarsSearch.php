<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dars;

/**
 * DarsSearch represents the model behind the search form of `app\models\Dars`.
 */
class DarsSearch extends Dars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fan_id', 'kun', 'vaqt', 'guruh_id', 'xona_id', 'dars_turi'], 'integer'],
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
        $query = Dars::find();

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
            'fan_id' => $this->fan_id,
            'kun' => $this->kun,
            'vaqt' => $this->vaqt,
            'guruh_id' => $this->guruh_id,
            'xona_id' => $this->xona_id,
            'dars_turi' => $this->dars_turi,
        ]);

        return $dataProvider;
    }
}
