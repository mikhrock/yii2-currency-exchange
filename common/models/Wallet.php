<?php

namespace common\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property int $id_user
 * @property string $name
 * @property string $currency
 * @property string $balance
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'currency'], 'required'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['balance'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 64],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_user'], 'default', 'value' => Yii::$app->user->id],
            [['balance'], 'default', 'value' => 0],
            [['created_at, updated_at'], 'default', 'value' => strtotime('now'), 'on'=>'insert'],
            [['updated_at'], 'default', 'value' => strtotime('now'), 'on'=>'update'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'name' => 'Name',
            'currency' => 'Currency',
            'balance' => 'Balance',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
