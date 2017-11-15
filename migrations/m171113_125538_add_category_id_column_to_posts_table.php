<?php

use yii\db\Migration;

/**
 * Handles adding category_id to table `posts`.
 */
class m171113_125538_add_category_id_column_to_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('posts', 'category_id', $this->integer());

        $this->addForeignKey('fk_posts_category', 'posts', 'category_id', 'category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('posts', 'category_id');
    }
}
