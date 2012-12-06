<?php

class AdminModule extends CWebModule
{
	public function init()
	{
	    app()->urlManager->setUrlFormat('get');
	    app()->setTheme(null);
	    
	    self::checkUserAccess();
		self::mergeParams();

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
		
		app()->errorHandler->errorAction = 'admin/default/error';
	}

	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action)) {
			return true;
		}
		else
			return false;
	}
	
	private static function mergeParams()
	{
	    $params = require(dirname(__FILE__) . DS . 'config' . DS . 'params.php');
	    app()->params->mergeWith($params);
	}
	
	private function checkUserAccess()
	{
	    if (user()->getIsGuest()) {
		    $url = url('site/login', array('url'=>request()->getUrl()));
			request()->redirect($url);
			exit(0);
		}
		elseif (user()->checkAccess('enter_admin_system'))
			return true;
		else {
		    echo 'you are not allowed enter admin system.';
		    exit(0);
		}
	}
}
