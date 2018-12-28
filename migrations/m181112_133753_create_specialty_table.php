<?php

use yii\db\Migration;

/**
 * Handles the creation of table `specialty`.
 * Has foreign keys to the tables:
 *
 * - `kafedra`
 */
class m181112_133753_create_specialty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('specialty', [
            'id' => $this->primaryKey(),
            'kafedra_id' => $this->integer()->notNull(),
            'name' => $this->text(),
            'code' => $this->string(33)->notNull()->unique(),
        ]);

        // creates index for column `kafedra_id`
        $this->createIndex(
            'idx-specialty-kafedra_id',
            'specialty',
            'kafedra_id'
        );

        // add foreign key for table `kafedra`
        $this->addForeignKey(
            'fk-specialty-kafedra_id',
            'specialty',
            'kafedra_id',
            'kafedra',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `kafedra`
        $this->dropForeignKey(
            'fk-specialty-kafedra_id',
            'specialty'
        );

        // drops index for column `kafedra_id`
        $this->dropIndex(
            'idx-specialty-kafedra_id',
            'specialty'
        );

        $this->dropTable('specialty');
    }
}
