<?php

namespace dungphanxuan\yii2reveal;

use yii\web\AssetBundle;

class RevealAsset extends AssetBundle
{
    public $sourcePath = '@dungphanxuan/yii2revealjs/assets';
    public $js = [
        'js/reveal.min.js',
        'js/lib/js/head.min.js',
    ];
    public $css = [
        'css/reveal.min.css',
        'css/ionic.min.css',
        'css/lib/css/zenburn.css',
    ];
}
