<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

	    './bootstrap/css/bootstrap.min.css',
	    './css/flexslider.css',

        './css/slick.css',
        './css/slick-theme.css',

	    './css/main.css',
	    './css/media.css',
    ];
    public $js = [
    	'./libs/jquery/jquery-2.1.4.min.js',
	    './libs/bootstrap/js/bootstrap.min.js',
	    './libs/jquery-ui-1.12.1.custom/jquery-ui.min.js',
	    './libs/slick/slick.min.js',
	    './js/jquery.flexslider.js',
	    './js/my.js',
	    'https://use.fontawesome.com/063138bc6e.js',
	    './js/sort.js',
	    './js/share.js',
	    './js/select_2.js',
	    './js/ajax.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
