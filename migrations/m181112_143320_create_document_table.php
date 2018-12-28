<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document`.
 * Has foreign keys to the tables:
 *
 * - `type`
 * - `language`
 * - `discipline`
 * - `specialty`
 * - `plan`
 * - `responsible`
 * - `reviewer`
 */
class m181112_143320_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'type_id' => $this->integer()->notNull(),
            'language_id' => $this->integer()->notNull(),
            'discipline_id' => $this->integer()->notNull(),
            'specialty_id' => $this->integer()->notNull(),
            'plan_id' => $this->integer()->notNull(),
            'responsible_id' => $this->integer()->notNull(),
            'reviewer_id' => $this->integer()->notNull(),
            'finish_date' => $this->date(),
            'token' => $this->string(32),
            'status' => $this->integer()->defaultValue(1),
            'path' => $this->string(128),
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            'idx-document-type_id',
            'document',
            'type_id'
        );

        // add foreign key for table `type`
        $this->addForeignKey(
            'fk-document-type_id',
            'document',
            'type_id',
            'type',
            'id',
            'CASCADE'
        );

        // creates index for column `language_id`
        $this->createIndex(
            'idx-document-language_id',
            'document',
            'language_id'
        );

        // add foreign key for table `language`
        $this->addForeignKey(
            'fk-document-language_id',
            'document',
            'language_id',
            'language',
            'id',
            'CASCADE'
        );

        // creates index for column `discipline_id`
        $this->createIndex(
            'idx-document-discipline_id',
            'document',
            'discipline_id'
        );

        // add foreign key for table `discipline`
        $this->addForeignKey(
            'fk-document-discipline_id',
            'document',
            'discipline_id',
            'discipline',
            'id',
            'CASCADE'
        );

        // creates index for column `specialty_id`
        $this->createIndex(
            'idx-document-specialty_id',
            'document',
            'specialty_id'
        );

        // add foreign key for table `specialty`
        $this->addForeignKey(
            'fk-document-specialty_id',
            'document',
            'specialty_id',
            'specialty',
            'id',
            'CASCADE'
        );

        // creates index for column `plan_id`
        $this->createIndex(
            'idx-document-plan_id',
            'document',
            'plan_id'
        );

        // add foreign key for table `plan`
        $this->addForeignKey(
            'fk-document-plan_id',
            'document',
            'plan_id',
            'plan',
            'id',
            'CASCADE'
        );

        // creates index for column `responsible_id`
        $this->createIndex(
            'idx-document-responsible_id',
            'document',
            'responsible_id'
        );

        // add foreign key for table `responsible`
        $this->addForeignKey(
            'fk-document-responsible_id',
            'document',
            'responsible_id',
            'responsible',
            'id',
            'CASCADE'
        );

        // creates index for column `reviewer_id`
        $this->createIndex(
            'idx-document-reviewer_id',
            'document',
            'reviewer_id'
        );

        // add foreign key for table `reviewer`
        $this->addForeignKey(
            'fk-document-reviewer_id',
            'document',
            'reviewer_id',
            'reviewer',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `type`
        $this->dropForeignKey(
            'fk-document-type_id',
            'document'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            'idx-document-type_id',
            'document'
        );

        // drops foreign key for table `language`
        $this->dropForeignKey(
            'fk-document-language_id',
            'document'
        );

        // drops index for column `language_id`
        $this->dropIndex(
            'idx-document-language_id',
            'document'
        );

        // drops foreign key for table `discipline`
        $this->dropForeignKey(
            'fk-document-discipline_id',
            'document'
        );

        // drops index for column `discipline_id`
        $this->dropIndex(
            'idx-document-discipline_id',
            'document'
        );

        // drops foreign key for table `specialty`
        $this->dropForeignKey(
            'fk-document-specialty_id',
            'document'
        );

        // drops index for column `specialty_id`
        $this->dropIndex(
            'idx-document-specialty_id',
            'document'
        );

        // drops foreign key for table `plan`
        $this->dropForeignKey(
            'fk-document-plan_id',
            'document'
        );

        // drops index for column `plan_id`
        $this->dropIndex(
            'idx-document-plan_id',
            'document'
        );

        // drops foreign key for table `responsible`
        $this->dropForeignKey(
            'fk-document-responsible_id',
            'document'
        );

        // drops index for column `responsible_id`
        $this->dropIndex(
            'idx-document-responsible_id',
            'document'
        );

        // drops foreign key for table `reviewer`
        $this->dropForeignKey(
            'fk-document-reviewer_id',
            'document'
        );

        // drops index for column `reviewer_id`
        $this->dropIndex(
            'idx-document-reviewer_id',
            'document'
        );

        $this->dropTable('document');
    }
}
