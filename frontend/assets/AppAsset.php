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
        'css/site.css',
	    'css/custom.css',
    ];
    public $js = [
    	'js/func.js',
    	'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	    'rmrevin\yii\fontawesome\AssetBundle',

	    'yii\web\JqueryAsset',
    ];
    public $publishOptions = [
    	'forceCopy' => true,
    ];
}
