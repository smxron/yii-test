<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%translators}}`.
 */
class m260323_065825_create_translators_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%translators}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            // Поле для типа занятости:
            // 1 - Будни (weekdays), 2 - Выходные (weekends)
            'work_type' => $this->tinyInteger()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%translators}}');
    }
}
