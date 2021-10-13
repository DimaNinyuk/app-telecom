<?php

use yii\db\Migration;

/**
 * Class m211006_213929_add_foreign_key_for_table_clients
 */
class m211006_213929_add_foreign_key_for_table_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'requests_fk0',
            'requests',
            'client_id',
            'clients',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('requests_fk0','requests');
    }
}
