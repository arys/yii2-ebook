<?php

use yii\db\Migration;

/**
 * Handles the creation of table `author`.
 */
class m181109_062415_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('author', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'surname' => $this->text(),
            'patronymic' => $this->text(),
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
