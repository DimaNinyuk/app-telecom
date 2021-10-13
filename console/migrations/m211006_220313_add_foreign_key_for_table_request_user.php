<?php

use yii\db\Migration;

/**
 * Class m211006_220313_add_foreign_key_for_table_request_user
 */
class m211006_220313_add_foreign_key_for_table_request_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'user_request_fk1',
            'request_status',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('user_request_fk1','requests_status');
    }
}
