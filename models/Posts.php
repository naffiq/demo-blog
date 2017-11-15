<?php

namespace app\models;

use app\models\interfaces\DbRecordInterface;
use Yii;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $titleIntl
 * @see Posts::getTitleIntl() получение поля titleIntl
 * @property integer $categoryId
 * @property Category $category
 * @property string $text
 *
 */
class Posts extends \yii\db\ActiveRecord implements DbRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            ['category_id', 'integer'],
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
            'title' => 'Название статьи',
            'text' => 'Содержание',
        ];
    }

    /**
     * Возвращает поля для вывода формы
     *
     * @param ActiveForm $form
     *
     * @return array
     */
    public function renderForm(ActiveForm $form)
    {
        return [
            'title' => $form->field($this, 'title')->textInput(),
            'text' => $form->field($this, 'text')->textarea(),
            'category_id' => $form->field($this, 'category_id')->dropDownList(
                ArrayHelper::map(Category::find()->all(), 'id', 'title')
            ),
        ];
    }

    /**
     * $this->titleIntl
     * @return string
     */
    public function getTitleIntl()
    {
        return 'Hello, world!';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
