<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
	    'css/custom.css',
    ];
    public $js = [
    	'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	    'yiister\gentelella\assets\Asset',
	    'yii\web\JqueryAsset',
    ];
    public $publishOptions = [
    	// 'forceCopy' => true,
    ];
}