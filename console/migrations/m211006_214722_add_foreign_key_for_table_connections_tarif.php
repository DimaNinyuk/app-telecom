<?php

use yii\db\Migration;

/**
 * Class m211006_214722_add_foreign_key_for_table_connections_tarif
 */
class m211006_214722_add_foreign_key_for_table_connections_tarif extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'connections_fk1',
            'connections',
            'tarif_id',
            'tarifs',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('connections_fk1','connections');
    }
}
