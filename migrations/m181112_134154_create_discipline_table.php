<?php

use yii\db\Migration;

/**
 * Handles the creation of table `discipline`.
 * Has foreign keys to the tables:
 *
 * - `specialty`
 */
class m181112_134154_create_discipline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('discipline', [
            'id' => $this->primaryKey(),
            'specialty_id' => $this->integer()->notNull(),
            'name' => $this->text(),
        ]);

        // creates index for column `specialty_id`
        $this->createIndex(
            'idx-discipline-specialty_id',
            'discipline',
            'specialty_id'
        );

        // add foreign key for table `specialty`
        $this->addForeignKey(
            'fk-discipline-specialty_id',
            'discipline',
            'specialty_id',
            'specialty',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `specialty`
        $this->dropForeignKey(
            'fk-discipline-specialty_id',
            'discipline'
        );

        // drops index for column `specialty_id`
        $this->dropIndex(
            'idx-discipline-specialty_id',
            'discipline'
        );

        $this->dropTable('discipline');
    }
}
