<?php

use yii\db\Migration;

/**
 * Handles the creation of table `keyword`.
 */
class m171123_125640_create_keyword_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('keyword', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'keyword' => $this->string()->notNull(),
            'points' => $this->integer()->notNull()->defaultValue(20),
        ]);

        $this->addForeignKey('fk_keyword-categories', 'keyword', 'category_id', 'category', 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('idx-keyword-unique-for-category', 'keyword', ['category_id', 'keyword'], true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('keyword');
    }
}
