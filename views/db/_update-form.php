<?php
/**
 * @var $this \yii\web\View
 * @var $allData \app\models\interfaces\DbRecordInterface|\yii\db\ActiveRecord
 */

$selector = $allData->formName() .'-' . $allData->getPrimaryKey();

$this->registerJs(<<<JS


$('#{$selector}-editor').click(function() {
    var targetId = $(this).data('target-id');
    var targetEditorId = targetId + '-edit';
    var target = $(targetId);
    var targetEditor = $(targetEditorId);
    
    target.toggleClass('hidden');
    targetEditor.toggleClass('hidden');
    
    $(targetId + '-saver').toggleClass('hidden');
    $(this).toggleClass('hidden');
});

$('#{$selector}-form').on('submit', function(event) {
    event.preventDefault();
    var form = $(this);
    
    $.post({
        url: form.attr('action'),
        data: form.serialize(),
        success: function (result) {
            $(form.data('row-id')).html(result);
        }
    });
    
    return false;
});

$('#{$selector}-saver').click(function() {
    $($(this).data('form-id')).submit();
});
JS
)


?>

<td>
    <?php $form = \yii\widgets\ActiveForm::begin([
        'action' => ['update', 'id' => $allData->getPrimaryKey()],
        'id' => $selector . '-form',
        'options' => [
            'class' => 'db-update-form',
            'data-row-id' => '#' . $selector . '-row'
        ]
    ]) ?>

    <?= \yii\helpers\Html::hiddenInput('instanceClass', $allData::className()) ?>

    <div  id="<?= $selector ?>">
        <?= $allData->title ?>
    </div>

    <?= $form->field($allData, 'title', [
        'options' => [
            'id' => $selector . '-edit',
            'class' => 'hidden',
        ]
    ])->textInput()->label(false) ?>

    <?php \yii\widgets\ActiveForm::end() ?>
</td>
<td>
    <a href="#" class="editor"
       id="<?= $selector ?>-editor"
       data-target-id="#<?= $selector ?>">
        <i class="glyphicon glyphicon-pencil"></i>
    </a>

    <a href="#" class="hidden"
       id="<?= $selector ?>-saver"
       data-form-id="#<?= $selector ?>-form"
    >
        <i class="glyphicon glyphicon-floppy-disk"></i>
    </a>
</td>
