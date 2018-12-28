<?php

use yii\db\Migration;

/**
 * Handles the creation of table `author`.
 */
class m181112_142306_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('author', [
            'id' => $this->primaryKey(),
            'name' => $this->string(33),
            'surname' => $this->string(33),
            'patronymic' => $this->string(33),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('author');
    }
}
