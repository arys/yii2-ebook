<?php

use yii\db\Migration;

/**
 * Handles the creation of table `plan`.
 */
class m181109_063345_create_plan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('plan', [
            'id' => $this->primaryKey(),
            'kafedra_id' => $this->integer(),
            'date_start' => $this->date(),
            'date_end' => $this->date(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('plan');
    }
}
