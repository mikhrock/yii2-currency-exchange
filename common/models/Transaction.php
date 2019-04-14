<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property int $id_sender
 * @property int $wallet_sender
 * @property string $amount_sender
 * @property int $id_recipient
 * @property int $wallet_recipient
 * @property string $amount_recipient
 * @property int $date_performed
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wallet_sender', 'amount_sender', 'id_recipient'], 'required'],
            [['id_sender', 'wallet_sender', 'id_recipient', 'wallet_recipient', 'date_performed'], 'integer'],
            [['amount_sender', 'amount_recipient'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sender' => 'Id Sender',
            'wallet_sender' => 'Wallet Sender',
            'amount_sender' => 'Amount Sender',
            'id_recipient' => 'Recipient Email',
            'wallet_recipient' => 'Wallet Recipient',
            'amount_recipient' => 'Amount Recipient',
            'date_performed' => 'Date Performed',
        ];
    }
}
