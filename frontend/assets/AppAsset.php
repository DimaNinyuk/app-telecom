<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/webfont.css',
    ];
    public $js = [
        'js/jquery.jcarousel.js',
        'js/jquery.mixitup.js',
        'js/custom.js',
        'js/jquery.min.js',
        'js/responsiveslides.js',
        'js/jquery.jcarousel.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
