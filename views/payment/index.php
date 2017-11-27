<?php
/**
 * @var $kkbPayment \naffiq\kkb\KKBPayment
 */
$kkbPayment = \Yii::$app->get('kkbPayment');

// В случае ошибки в этом методе могут выбрасываться исключения.
// В этом случае нужно курить доку и смотреть конфиги
try {
    $kkbPaymentBase64 = $kkbPayment->processRequest(400124, 1000);
} catch (\yii\base\Exception $e) {
    $kkbPaymentBase64 = "";
    // TODO: Обработка ошибки
}

// Выставляем адрес сервера платежей в зависимости от окружения
if (YII_ENV_DEV) {
    $paymentUrl = 'https://testpay.kkb.kz/jsp/process/logon.jsp';
} else {
    $paymentUrl = 'https://epay.kkb.kz/jsp/process/logon.jsp';
}

?>

<form action="<?= $paymentUrl ?>" id="kkb-payment-form">
    <input type="text" name="Signed_Order_B64" size="100" value="<?= $kkbPaymentBase64 ?>" />
    <input type="text" id="em" name="email" size="50" maxlength="50" value="abdu.galymzhan@gmail.com" />
    <input type="text" name="Language" size="50" maxlength="3" value="rus" />
    <input type="text" name="BackLink" size="50" maxlength="50" value="<?= \yii\helpers\Url::to(['index'], true) ?>" />
    <input type="text" name="PostLink" size="50" maxlength="50" value="<?= \yii\helpers\Url::to(['process'], true) ?>" />
    <button type="submit">Отправить</button>
</form>
