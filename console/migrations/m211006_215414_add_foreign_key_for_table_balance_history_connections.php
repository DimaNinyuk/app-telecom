<?php

use yii\db\Migration;

/**
 * Class m211006_215414_add_foreign_key_for_table_balance_history_connections
 */
class m211006_215414_add_foreign_key_for_table_balance_history_connections extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'balance_history_fk0',
            'balance_history',
            'connection_id',
            'connections',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('balance_history_fk0','balance_history');
    }
}
