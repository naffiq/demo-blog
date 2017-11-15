<?php

namespace app\models;

use app\models\interfaces\DbRecordInterface;
use Yii;
use yii\widgets\ActiveForm;

/**
 * This is the model class for table "category".
 *
 * @property Posts[] $posts
 * @property integer $id
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord implements DbRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название категории',
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['category_id' => 'id']);
    }

    /**
     * @param ActiveForm $form
     * @return array
     */
    public function renderForm(ActiveForm $form)
    {
        return [
            'title' => $form->field($this, 'title')->textInput()
        ];
    }
}
