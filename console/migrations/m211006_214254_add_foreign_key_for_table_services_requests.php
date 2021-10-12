<?php

use yii\db\Migration;

/**
 * Class m211006_214254_add_foreign_key_for_table_services_requests
 */
class m211006_214254_add_foreign_key_for_table_services_requests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'requests_fk1',
            'requests',
            'service_id',
            'services',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('requests_fk1','requests');
    }
}
