<?php

use yii\db\Migration;

/**
 * Class m211006_211653_create_tb_tarifs
 */
class m211006_211653_create_tb_tarifs extends Migration
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
        $this->createTable('{{%tarifs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'price' => $this->decimal(18,2)->notNull(),
            'duration_days' => $this->integer()->null(),
            'speed' => $this->integer()->notNull(),
            'limit' => $this->integer()->null(),
            'connection_technology_id' => $this->integer()->notNull(),
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
