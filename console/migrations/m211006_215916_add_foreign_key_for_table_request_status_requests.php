<?php

use yii\db\Migration;

/**
 * Class m211006_215916_add_foreign_key_for_table_request_status_requests
 */
class m211006_215916_add_foreign_key_for_table_request_status_requests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'request_status_fk1',
            'request_status',
            'request_id',
            'requests',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('request_status_fk1','request_status');
    }
}
