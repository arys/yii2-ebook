<?php

use yii\db\Migration;

/**
 * Handles the creation of table `language`.
 */
class m181112_131650_create_language_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('language', [
            'id' => $this->primaryKey(),
            'name' => $this->string(33)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('language');
    }
}
