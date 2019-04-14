<?php

use yii\db\Migration;

/**
 * Class m190414_202842_top_wallets
 */
class m190414_202842_top_wallets extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('wallet', 
            [
                'balance' => 1000,
            ],
            [
                'id' => [7, 9, 10]    
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->update('wallet', 
            [
                'balance' => 0,
            ],
            [
                'id' => [7, 9, 10]    
            ]
        );
    }
}
