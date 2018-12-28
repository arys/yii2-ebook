<?php

use yii\db\Migration;

/**
 * Handles the creation of table `responsible`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `kafedra`
 */
class m181112_135858_create_responsible_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('responsible', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'kafedra_id' => $this->integer(),
            'name' => $this->string(33),
            'suname' => $this->string(33),
            'second_name' => $this->string(33),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-responsible-user_id',
            'responsible',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-responsible-user_id',
            'responsible',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `kafedra_id`
        $this->createIndex(
            'idx-responsible-kafedra_id',
            'responsible',
            'kafedra_id'
        );

        // add foreign key for table `kafedra`
        $this->addForeignKey(
            'fk-responsible-kafedra_id',
            'responsible',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-responsible-user_id',
            'responsible'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-responsible-user_id',
            'responsible'
        );

        // drops foreign key for table `kafedra`
        $this->dropForeignKey(
            'fk-responsible-kafedra_id',
            'responsible'
        );

        // drops index for column `kafedra_id`
        $this->dropIndex(
            'idx-responsible-kafedra_id',
            'responsible'
        );

        $this->dropTable('responsible');
    }
}
