<?php

use yii\db\Migration;

/**
 * Handles the creation of table `faculty`.
 */
class m181112_131409_create_faculty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('faculty', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('faculty');
    }
}
