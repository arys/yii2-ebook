<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document_author`.
 * Has foreign keys to the tables:
 *
 * - `document`
 * - `author`
 */
class m181112_150112_create_document_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('document_author', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `document_id`
        $this->createIndex(
            'idx-document_author-document_id',
            'document_author',
            'document_id'
        );

        // add foreign key for table `document`
        $this->addForeignKey(
            'fk-document_author-document_id',
            'document_author',
            'document_id',
            'document',
            'id',
            'CASCADE'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-document_author-author_id',
            'document_author',
            'author_id'
        );

        // add foreign key for table `author`
        $this->addForeignKey(
            'fk-document_author-author_id',
            'document_author',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `document`
        $this->dropForeignKey(
            'fk-document_author-document_id',
            'document_author'
        );

        // drops index for column `document_id`
        $this->dropIndex(
            'idx-document_author-document_id',
            'document_author'
        );

        // drops foreign key for table `author`
        $this->dropForeignKey(
            'fk-document_author-author_id',
            'document_author'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-document_author-author_id',
            'document_author'
        );

        $this->dropTable('document_author');
    }
}
