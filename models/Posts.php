<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $category_id
 * @property string $image_file
 *
 * @property Category $category
 *
 * @method string|null getUploadPath($attribute, $old = false) Returns file path for the attribute.
 * @method string|null getUploadUrl($attribute) Returns file url for the attribute.
 * @method bool sanitize($filename) Replaces characters in strings that are illegal/unsafe for filename.
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    // DB
    public $createdAt;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            ['createdAt', 'string'],
            [['image_file'], 'file', 'on' => ['create', 'update'], 'extensions' => null],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'category_id' => 'Category ID',
            'image_file' => 'Image File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'image_fileFile' => [
                'class' => 'mongosoft\file\UploadBehavior',
                'attribute' => 'image_file',
                'path' => '@webroot/media/posts/{id}',
                'url' => '@web/media/posts/{id}',
                'scenarios' => ['create', 'update'],
            ],
        ];
    }
}
