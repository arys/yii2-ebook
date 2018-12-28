<?php

use yii\db\Migration;

/**
 * Handles the creation of table `kafedra`.
 */
class m181109_062608_create_kafedra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kafedra', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'faculty_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('kafedra');
    }
}
