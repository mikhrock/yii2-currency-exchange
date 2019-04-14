<?php

namespace frontend\modules\currencyrate\models;

use Yii;

/**
 * This is the model class for table "exchange_rate".
 *
 * @property int $id
 * @property string $date
 * @property string $currency
 * @property string $bid
 * @property string $ask
 */
class ExchangeRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exchange_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'currency', 'bid', 'ask'], 'required'],
            [['date'], 'safe'],
            [['bid', 'ask'], 'number'],
            [['currency'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'currency' => 'Currency',
            'bid' => 'Bid',
            'ask' => 'Ask',
        ];
    }
}
