<?php

use yii\db\Migration;

/**
 * Class m211006_214929_add_foreign_key_for_table_connections_connection_status
 */
class m211006_214929_add_foreign_key_for_table_connections_connection_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'connections_fk2',
            'connections',
            'connection_status_id',
            'connection_status',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('connections_fk2','connections');
    }
}
