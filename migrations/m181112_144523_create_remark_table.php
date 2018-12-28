<?php

use yii\db\Migration;

/**
 * Handles the creation of table `remark`.
 * Has foreign keys to the tables:
 *
 * - `reviewer`
 * - `document`
 */
class m181112_144523_create_remark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('remark', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'reviewer_id' => $this->integer()->notNull(),
            'date' => $this->date(),
            'status' => $this->integer()->defaultValue(1),
            'document_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `reviewer_id`
        $this->createIndex(
            'idx-remark-reviewer_id',
            'remark',
            'reviewer_id'
        );

        // add foreign key for table `reviewer`
        $this->addForeignKey(
            'fk-remark-reviewer_id',
            'remark',
            'reviewer_id',
            'reviewer',
            'id',
            'CASCADE'
        );

        // creates index for column `document_id`
        $this->createIndex(
            'idx-remark-document_id',
            'remark',
            'document_id'
        );

        // add foreign key for table `document`
        $this->addForeignKey(
            'fk-remark-document_id',
            'remark',
            'document_id',
            'document',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `reviewer`
        $this->dropForeignKey(
            'fk-remark-reviewer_id',
            'remark'
        );

        // drops index for column `reviewer_id`
        $this->dropIndex(
            'idx-remark-reviewer_id',
            'remark'
        );

        // drops foreign key for table `document`
        $this->dropForeignKey(
            'fk-remark-document_id',
            'remark'
        );

        // drops index for column `document_id`
        $this->dropIndex(
            'idx-remark-document_id',
            'remark'
        );

        $this->dropTable('remark');
    }
}
