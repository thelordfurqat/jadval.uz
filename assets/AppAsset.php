<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

//        'css/site.css',
        'theme/assets/css/bootstrap.min.css',
        'theme/assets/css/animate.min.css',
        'theme/assets/css/light-bootstrap-dashboard.css?v=1.4.0',
        'theme/assets/css/demo.css',
        'theme/assets/fonts/font-awesome.min.css',
        'theme/assets/fonts/google.css',
        'theme/assets/css/pe-icon-7-stroke.css',
        'theme/assets/css/style.css',
    ];
    public $js = [
        'theme/assets/js/jquery.3.2.1.min.js',
        'theme/assets/js/bootstrap.min.js',
        'theme/assets/js/chartist.min.js',
        'theme/assets/js/bootstrap-notify.js',
        'theme/assets/js/light-bootstrap-dashboard.js?v=1.4.0',
        'theme/assets/js/demo.js'

     ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
