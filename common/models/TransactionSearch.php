<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form of `common\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_sender', 'wallet_sender', 'id_recipient', 'wallet_recipient', 'date_performed'], 'integer'],
            [['amount_sender', 'amount_recipient'], 'number'],
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
        $query = Transaction::find();

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
            'id_sender' => $this->id_sender,
            'wallet_sender' => $this->wallet_sender,
            'amount_sender' => $this->amount_sender,
            'id_recipient' => $this->id_recipient,
            'wallet_recipient' => $this->wallet_recipient,
            'amount_recipient' => $this->amount_recipient,
            'date_performed' => $this->date_performed,
        ]);

        return $dataProvider;
    }
}
