<?php

use yii\db\Migration;

/**
 * Class m211006_215229_add_foreign_key_for_table_tarifs_connection_technologies
 */
class m211006_215229_add_foreign_key_for_table_tarifs_connection_technologies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'tarifs_fk0',
            'tarifs',
            'connection_technology_id',
            'connection_technologies',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('tarifs_fk0','tarifs');
    }
}
