<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reviewer`.
 */
class m181112_141946_create_reviewer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('reviewer', [
            'id' => $this->primaryKey(),
            'email' => $this->string(33),
            'phone' => $this->string(33),
            'level' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('reviewer');
    }
}
