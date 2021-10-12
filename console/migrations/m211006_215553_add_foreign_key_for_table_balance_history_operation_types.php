<?php

use yii\db\Migration;

/**
 * Class m211006_215553_add_foreign_key_for_table_balance_history_operation_types
 */
class m211006_215553_add_foreign_key_for_table_balance_history_operation_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'balance_history_fk1',
            'balance_history',
            'operation_type_id',
            'operation_types',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('balance_history_fk1','balance_history');
    }
}
