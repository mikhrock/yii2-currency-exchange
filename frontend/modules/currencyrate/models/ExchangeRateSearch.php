<?php

namespace frontend\modules\currencyrate\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\currencyrate\models\ExchangeRate;

/**
 * ExchangeRateSearch represents the model behind the search form of `frontend\modules\currencyrate\models\ExchangeRate`.
 */
class ExchangeRateSearch extends ExchangeRate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['date', 'currency'], 'safe'],
            [['bid', 'ask'], 'number'],
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
        $query = ExchangeRate::find();

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
            'bid' => $this->bid,
            'ask' => $this->ask,
        ]);

        $query->andFilterWhere(['like', 'currency', $this->currency]);

        return $dataProvider;
    }
}
