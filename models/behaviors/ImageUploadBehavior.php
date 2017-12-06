<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 11/27/17
 * Time: 18:18
 */

namespace app\models\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class ImageUploadBehavior extends Behavior
{
    /**
     * @var string
     */
    public $fieldName;

    public $resizeWidth;
    public $resizeHeight;

    public $keepOriginal;

    /**
     * @var ActiveRecord
     */
    public $owner;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'uploadImage',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'uploadImage',
        ];
    }

    public function uploadImage()
    {
        $uploadFile = UploadedFile::getInstance($this->owner, $this->fieldName);

        if ($uploadFile) {
            $uploadFile->saveAs(\Yii::getAlias('@webroot/uploads/'. \Yii::$app->security->generateRandomString() . '.'.$uploadFile->getExtension()));
        }
//        $this->owner->{$this->fieldName} = ;
    }

    public function getImage()
    {
        return 'ok';
    }
}