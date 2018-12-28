<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reviewer`.
 */
class m181109_063520_create_reviewer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('reviewer', [
            'id' => $this->primaryKey(),
            'email' => $this->text(),
            'phone' => $this->text(),
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
