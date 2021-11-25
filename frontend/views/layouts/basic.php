<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<!-- Start Body -->
<body>
<!-- Start Menu -->
<?php $this->beginBody() ?>
<div class="menubar" data-scroll="true">
    <a href="#" class="logo"></a>

</div>
<!-- End Menu -->

<!-- Start Home -->
<a class="scroll" id="home"></a>
<div class="home hero">
    <div class="overlay"></div>
    <div class="herowrapper">
        <h1> ЛУЧШИЕ ПРЕДЛОЖЕНИЯ <b class="rotate color">Заказать смартфон, Интернет и ТВ за городом, Красивые номера</b>.</h1>
    </div>
    <a href="javascript:void(0);" class="scrolldown">
        <h3>Наши услуги</h3>
        <div data-icon="&#xe017;" class="icon"></div>
    </a>
</div>
<!-- End Home -->

<!-- Start BlockQuote -->
<div class="blockquote main">
    <blockquote> Официальный сайт компании ПАО <b>«Таттелеком»</b>. </blockquote>
</div>
<!-- End BlockQuote -->

<?= $content ?>



<footer class="footer">
    <a href="https://vk.com/letairu"><h6>© Таттелеком</h6></a>
</footer>
<?php $this->endBody() ?>
</body>
<!-- End Body -->
</html>
<?php $this->endPage();