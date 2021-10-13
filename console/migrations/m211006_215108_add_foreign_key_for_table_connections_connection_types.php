<?php

use yii\db\Migration;

/**
 * Class m211006_215108_add_foreign_key_for_table_connections_connection_types
 */
class m211006_215108_add_foreign_key_for_table_connections_connection_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'connections_fk3',
            'connections',
            'connection_type_id',
            'connection_types',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('connections_fk3','connections');
    }
}
