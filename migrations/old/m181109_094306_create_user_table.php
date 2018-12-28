<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181109_094306_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->text(),
            'password_hash' => $this->text(),
            'is_Admin' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
