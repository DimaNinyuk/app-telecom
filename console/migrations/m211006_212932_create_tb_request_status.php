<?php

use yii\db\Migration;

/**
 * Class m211006_212932_create_tb_request_status
 */
class m211006_212932_create_tb_request_status extends Migration
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
        $this->createTable('{{%request_status}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'request_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('request_status');
    }
}
