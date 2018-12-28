<?php

use yii\db\Migration;

/**
 * Handles the creation of table `remark`.
 */
class m181109_063409_create_remark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('remark', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'reviewer_id' => $this->integer(),
            'date' => $this->date(),
            'status' => $this->integer(),
            'book_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('remark');
    }
}
