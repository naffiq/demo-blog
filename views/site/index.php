<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$this->registerJs(<<<JS
$('#next-btn').click(function (event) {
    event.preventDefault();
    $('.progress').addClass('progress--active');
    
    setTimeout((function() {
        window.location = $(this).attr('href');        
    }).bind(this), 20);
});
JS
);
$this->registerCss(<<<CSS
    
    .progress {
        display: none;
        position:fixed;
        height: 100%;
        width: 100%;
        align-items: center;
        justify-content: center;
        z-index: 1031;
        background: #FFF;
        top: 0;
        left: 0;
    }
    .progress--active {
        display: flex;
    }

CSS
);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" id="next-btn" href="<?= \yii\helpers\Url::to(['next']) ?>">Next</a></p>
    </div>

    <div class="body-content">

        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $postsProvider,
            'view' => '_post'
        ]) ?>

    </div>
</div>

<div class="progress">
    <h1>Вычисляем</h1>
</div>