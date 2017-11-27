<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 11/24/17
 * Time: 17:51
 */

namespace app\controllers;


use yii\web\Controller;

class PaymentController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProcess()
    {
        /**
         * @var $kkb \naffiq\kkb\KKBPayment
         */
        $kkb = \Yii::$app->get('kkbPayment');

        $response = \Yii::$app->request->post('response');
        $paymentResponse = $kkb->processResponse($response);

        $data = json_encode([
            'response' => $response,
            'paymentResponse' => $paymentResponse
        ]);

        \Yii::info($data);
    }
}