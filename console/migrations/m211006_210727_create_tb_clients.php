<?php

use yii\db\Migration;

/**
 * Class m211006_210727_create_tb_clients
 */
class m211006_210727_create_tb_clients extends Migration
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
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'birthday' => $this->date()->null(),
            'passport' => $this->integer()->notNull(),
            'address' => $this->string(100)->notNull(),
            'company' => $this->string(100)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clients');
    }
}
