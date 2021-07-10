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
        'build/app.css',
        'css/style.css',
	 /*	'css/bootstrap1.css',
		'css/fasthover.css',
		'css/flexslider.css',
		'css/jquery.countdown.css',
		'css/popuo-box.css'*/
    ];
    public $js = [
      'build/app.js',
      
       /*  'js/script.js',
		
		'js/easyResponsiveTabs.js',
		'js/imagezoom.js',
		'js/jquery.countdown.js',
		'js/jquery.flexisel.js',
		'js/jquery.flexslider.js',
		'js/jquery.magnific-popup.js',
		
		'js/jquery.wmuSlider.js',
		'js/minicart.js',  */
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

