<?php
/**
 * @var $this \yii\web\View
 * @var $dbClasses string[]
 */
?>

<div class="row">

    <div class="col-md-3">
        <!-- Nav tabs -->
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <?php $i = 0; ?>
            <?php foreach($dbClasses as $key => $dbClass): ?>
                <?php $i ++; ?>
            <li role="presentation" class="<?= $i === 1 ? 'active' : '' ?>">
                <a href="#tab-<?= $i ?>" aria-controls="tab-<?= $i ?>" role="tab" data-toggle="tab"><?= $key ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="col-md-9">
        <!-- Tab panes -->
        <div class="tab-content">
            <?php $i = 0; ?>
            <?php foreach($dbClasses as $key => $dbClass): ?>
                <?php $i ++; ?>
                <div role="tabpanel" class="tab-pane <?= $i === 1 ? 'active' : '' ?>" id="tab-<?= $i ?>">
                    <h1><?= $key ?></h1>
                    <?php
                    $instance = new $dbClass();
                    /** @var $instance \yii\db\ActiveRecord|\app\models\interfaces\DbRecordInterface */
                    ?>

                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'action' => ['create', 'id' => 1],
                    ]) ?>
                    <?= \yii\helpers\Html::hiddenInput('instanceClass', $instance::className()) ?>
                    <?= \yii\helpers\Html::hiddenInput('id', $instance->getPrimaryKey()) ?>
                    <?php foreach($instance->renderForm($form) as $formField): ?>
                        <?= $formField ?>
                    <?php endforeach ?>

                    <?php \yii\widgets\ActiveForm::end() ?>

                    <table class="table">
                        <tr>
                            <th>Название</th>
                            <th></th>
                        </tr>
                        <?php $instanceAllData = $dbClass::find()->all(); ?>
                        <?php foreach($instanceAllData as $allData): ?>
                            <tr>
                                <td><?= $allData->title ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach ?>
                    </table>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
