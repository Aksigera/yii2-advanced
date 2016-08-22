<?php

use yii\db\Migration;

class m160811_091831_create_post extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull()
        ]);

    }

    public function down()
    {
        $this->dropTable('post');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
