<?php

use yii\db\Migration;

/**
 * Handles adding image_file to table `posts`.
 */
class m171127_125301_add_image_file_column_to_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('posts', 'image_file', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('posts', 'image_file');
    }
}
