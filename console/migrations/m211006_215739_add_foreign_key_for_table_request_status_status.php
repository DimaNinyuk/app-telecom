<?php

use yii\db\Migration;

/**
 * Class m211006_215739_add_foreign_key_for_table_request_status_status
 */
class m211006_215739_add_foreign_key_for_table_request_status_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'request_status_fk0',
            'request_status',
            'status_id',
            'status',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('request_status_fk0','request_status');
    }
}
