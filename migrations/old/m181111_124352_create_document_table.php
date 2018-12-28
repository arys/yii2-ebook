<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document`.
 */
class m181111_124352_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'type_id' => $this->integer(),
            'language_id' => $this->integer(),
            'discipline_id' => $this->integer(),
            'specialty_id' => $this->integer(),
            'plan_id' => $this->integer(),
            'responsible_id' => $this->integer(),
            'reviewer_id' => $this->integer(),
            'finish_date' => $this->date(),
            'token' => $this->text(),
            'status' => $this->integer(),
            'path' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('document');
    }
}
