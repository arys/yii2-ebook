<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document_author`.
 */
class m181109_153533_create_document_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('document_author', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer(),
            'author_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('document_author');
    }
}
