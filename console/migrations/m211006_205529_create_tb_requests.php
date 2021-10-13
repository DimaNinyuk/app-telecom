<?php

use yii\db\Migration;

/**
 * Class m211006_205529_create_tb_requests
 */
class m211006_205529_create_tb_requests extends Migration
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
        $this->createTable('{{%requests}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->notNull(),
            'name' => $this->string(100)->notNull(),
            'client_id' => $this->integer()->null(),
            'service_id' => $this->integer()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('requests');
    }
}
