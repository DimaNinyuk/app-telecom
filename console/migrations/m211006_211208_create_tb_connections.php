<?php

use yii\db\Migration;

/**
 * Class m211006_211208_create_tb_connections
 */
class m211006_211208_create_tb_connections extends Migration
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
        $this->createTable('{{%connections}}', [
            'id' => $this->primaryKey(),
            'register_date' => $this->date()->notNull(),
            'personal_account' => $this->integer()->notNull(),
            'current_balance' => $this->decimal(18,2)->null(),
            'client_id' => $this->integer()->notNull(),
            'tarif_id' => $this->integer()->notNull(),
            'connection_status_id' => $this->integer()->notNull(),
            'connection_type_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('connections');
    }
}
