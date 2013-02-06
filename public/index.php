<?php
defined('BETA_PRODUCT') or define('BETA_PRODUCT', false);
defined('YII_DEBUG') or define('YII_DEBUG', true);
define('BETA_WEBROOT', dirname(__FILE__));
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
if (YII_DEBUG)
     error_reporting(E_ALL);
else
    error_reporting(E_ALL ^ E_NOTICE);

$bootstrap = extension_loaded('apc') ? 'yiilite.php' : 'yii.php';
$yii = BETA_WEBROOT . '/../library/framework/' . $bootstrap;
$config = BETA_WEBROOT . '/../protected/config/main.php';
$short = BETA_WEBROOT . '/../library/shortcut.php';

require_once($yii);
require_once($short);

$app = Yii::createWebApplication($config);
$app->run();
