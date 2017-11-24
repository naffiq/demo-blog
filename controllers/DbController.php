<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 14.11.2017
 * Time: 14:11
 */

namespace app\controllers;


use app\models\Category;
use app\models\interfaces\DbRecordInterface;
use app\models\Posts;
use app\models\Tag;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\Response;

class DbController extends Controller
{

    /**
     * Списки
     *
     * @return string|\yii\web\Response
     * @throws \Exception
     */
    public function actionIndex()
    {
        $dbClasses = [
            'Категории' => Category::class,
            'Тэги' => Tag::class,
            'Посты' => Posts::class,
        ];

        foreach ($dbClasses as $dbClass) {
            if (! new $dbClass instanceof DbRecordInterface) {
                throw new \Exception('Все классы должны имплементировать DbRecordInterface ' . $dbClass);
            }
        }

        return $this->render('index', [
            'dbClasses' => $dbClasses
        ]);
    }

    /**
     * Создание модели
     *
     * @return \yii\web\Response
     */
    public function actionCreate()
    {
        // Класс отправляется самой формой
        $instanceClass = \Yii::$app->request->post('instanceClass');

        $instance = new $instanceClass;
        /** @var $instance ActiveRecord */
        $instance->load(\Yii::$app->request->post());
        $instance->save();
        return $this->redirect('index');
    }

    public function actionUpdate($id)
    {
        $instanceClass = \Yii::$app->request->post('instanceClass');
        $instance = $instanceClass::findOne(['id' => $id]);
        /** @var $instance ActiveRecord */
        $instance->load(\Yii::$app->request->post());
        $instance->save();

        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax('_update-form', ['allData' => $instance]);
        }

        return $this->redirect('index');
    }
}