<?php

use yii\db\Migration;

/**
 * Class m211006_212428_create_tb_balance_history
 */
class m211006_212428_create_tb_balance_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%balance_history}}', [
            'id' => $this->primaryKey(),
            'value' => $this->decimal(19,2)->null(),
            'date' => $this->date()->null(),
            'comment' => $this->string(255)->null(),
            'connection_id' => $this->integer()->notNull(),
            'operation_type_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('balance_history');
    }
}
