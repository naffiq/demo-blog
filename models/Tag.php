<?php

namespace app\models;

use app\models\interfaces\DbRecordInterface;
use Yii;
use yii\widgets\ActiveForm;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $title
 */
class Tag extends \yii\db\ActiveRecord implements DbRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
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
            'title' => 'Title',
        ];
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
