<?php

use yii\db\Migration;

/**
 * Handles the creation of table `plan`.
 * Has foreign keys to the tables:
 *
 * - `kafedra`
 */
class m181112_134529_create_plan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('plan', [
            'id' => $this->primaryKey(),
            'kafedra_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
            'date_start' => $this->date(),
            'date_end' => $this->date(),
        ]);

        // creates index for column `kafedra_id`
        $this->createIndex(
            'idx-plan-kafedra_id',
            'plan',
            'kafedra_id'
        );

        // add foreign key for table `kafedra`
        $this->addForeignKey(
            'fk-plan-kafedra_id',
            'plan',
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
            'fk-plan-kafedra_id',
            'plan'
        );

        // drops index for column `kafedra_id`
        $this->dropIndex(
            'idx-plan-kafedra_id',
            'plan'
        );

        $this->dropTable('plan');
    }
}
