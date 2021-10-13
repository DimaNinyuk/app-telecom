<?php

use yii\db\Migration;

/**
 * Class m211006_214436_add_foreign_key_for_table_clients_connections
 */
class m211006_214436_add_foreign_key_for_table_clients_connections extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'connections_fk0',
            'connections',
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
        $this->dropForeignKey('connections_fk0','connections');
    }
}
