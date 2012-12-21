<?php
define('BETA_WEBROOT', dirname(__FILE__));
defined('BETA_PRODUCT') or define('BETA_PRODUCT', false);
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
YII_DEBUG or error_reporting(0);

$bootstrap = extension_loaded('apc') ? 'yiilite.php' : 'yii.php';
$yii = BETA_WEBROOT . '/../library/framework/' . $bootstrap;
$config = BETA_WEBROOT . '/../protected/config/main.php';
$short = BETA_WEBROOT . '/../library/shortcut.php';

require_once($yii);
require_once($short);

$app = Yii::createWebApplication($config);
$app->run();
