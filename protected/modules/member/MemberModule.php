<?php

class MemberModule extends CWebModule
{
	public function init()
	{
	    self::checkUserAccess();
	    self::mergeParams();
	    
		$this->setImport(array(
			'member.models.*',
			'member.components.*',
		));
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
	
	private static function checkUserAccess()
	{
	    if (user()->getIsGuest()) {
	        $url = url('site/login', array('url'=>abu(request()->getUrl())));
	        request()->redirect($url);
	        exit(0);
	    }
	}
}
