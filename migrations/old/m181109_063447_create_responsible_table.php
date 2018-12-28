<?php

use yii\db\Migration;

/**
 * Handles the creation of table `responsible`.
 */
class m181109_063447_create_responsible_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('responsible', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'kafedra_id' => $this->integer(),
            'name' => $this->text(),
            'suname' => $this->text(),
            'second_name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('responsible');
    }
}
