<?php

use yii\db\Migration;

/**
 * Handles the creation of table `discipline`.
 */
class m181109_062454_create_discipline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('discipline', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'specialty_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('discipline');
    }
}
