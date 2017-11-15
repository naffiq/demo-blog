<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 14.11.2017
 * Time: 14:39
 */

namespace app\models\interfaces;


use yii\widgets\ActiveForm;

interface DbRecordInterface
{
    /**
     * Возвращает массив с отрендереными полями для универсального CRUD
     *
     * Пример:
     * ```php
     *
     * return [
     *  'title' => $form->field($this, 'title')->textInput()
     * ];
     *
     * ```
     *
     * @param ActiveForm $form инстанс формы из view файла
     *
     * @return array
     */
    public function renderForm(ActiveForm $form);
}