<?php

use yii\db\Migration;

/**
 * Handles the creation of table `specialty`.
 */
class m181109_063547_create_specialty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('specialty', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'kafedra_id' => $this->integer(),
            'code' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('specialty');
    }
}
