<?php

use yii\db\Migration;

/**
 * Handles the creation of table `kafedra`.
 * Has foreign keys to the tables:
 *
 * - `faculty`
 */
class m181112_132357_create_kafedra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kafedra', [
            'id' => $this->primaryKey(),
            'faculty_id' => $this->integer()->notNull(),
            'name' => $this->text(),
        ]);

        // creates index for column `faculty_id`
        $this->createIndex(
            'idx-kafedra-faculty_id',
            'kafedra',
            'faculty_id'
        );

        // add foreign key for table `faculty`
        $this->addForeignKey(
            'fk-kafedra-faculty_id',
            'kafedra',
            'faculty_id',
            'faculty',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `faculty`
        $this->dropForeignKey(
            'fk-kafedra-faculty_id',
            'kafedra'
        );

        // drops index for column `faculty_id`
        $this->dropIndex(
            'idx-kafedra-faculty_id',
            'kafedra'
        );

        $this->dropTable('kafedra');
    }
}
