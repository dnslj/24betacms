<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    public $channel;
    public $breadcrumbs = array();
    
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'application.extensions.BetaCaptchaAction.BetaCaptchaAction',
				'backColor' => 0xFFFFFF,
				'height' => 30,
				'width' => 100,
				'maxLength' => 4,
				'minLength' => 4,
		        'foreColor' => 0xFF0000,
		        'padding' => 5,
		        'testLimit' => 3,
			),
		);
	}
	
	public function getHomeUrl()
	{
	    return aurl('site/index');
	}
	
	protected function setPageKeyWords($value)
	{
	    if (empty($value)) return false;
	    
	    $value = (array)$value;
	    array_push($value, param('sitename'));
	    $text = strip_tags(trim(join(',', $value)));
	    cs()->registerMetaTag($text, 'keywords');
	}
	
    protected function setPageDescription($value)
	{
	    if (empty($value)) return false;
	    
	    $value = (array)$value;
	    $sitename = param('sitename');
	    if (param('shortdesc'))
	        $sitename = $sitename . ' - ' . param('shortdesc');
	    array_push($value, $sitename);
	    $text = strip_tags(trim(join(',', $value)));
	    cs()->registerMetaTag($text, 'description');
	}

	public function setSiteTitle($value)
	{
        $titleArray = array(param('sitename'));
        if (param('shortdesc'))
            array_push($titleArray, param('shortdesc'));
        if (!empty($value))
    	    array_unshift($titleArray, $value);

        $text = strip_tags(trim(join(' - ', $titleArray)));
	    $this->pageTitle = $text;
	}

	public function userMiniToolbar()
	{
	    if (user()->getIsGuest()) {
	        $html = '<li>' . l(t('user_login'), url('site/login')) . '</li>';
	        $html .= '<li>' . l(t('user_signup'), url('site/signup')) . '</li>';
	    }
	    else {
	        $html = '<li>' . l(user()->name, url('member/default/index')) . '</li>';
	        if (user()->checkAccess('enter_admin_system'))
    	        $html .= '<li>' . l(t('management'), url('admin/default/index'), array('target'=>'_blank')) . '</li>';
	        $html .= '<li>' . l(t('user_logout'), url('site/logout')) . '</li>';
	    }
	    
	    return $html;
	}
	
	protected function autoSwitchMobile($url = null)
	{
	    $mark = strip_tags(trim($_GET['f']));
	    if (empty($mark) and BetaBase::userIsMobileBrower()) {
	        if (empty($url)) {
    	        $route = 'mobile/' . $this->id . '/' . $this->action->id;
    	        $url = url($route, $this->actionParams);
	        }
	        $this->redirect($url);
	        exit(0);
	    }
	}

	public function getUserID()
	{
	    return (int)user()->id;
	}
	
	public function getUsername()
	{
	    return $this->user->email;
	}
	
	public function getNickname()
	{
	    return user()->name;
	}
	
	public function getUser()
	{
	    $user = User::model()->findByPk($this->getUserID());
	    if ($user === null)
	        throw new CHttpException(500, '未找到用户');
	
	    return $user;
	}
	
	/**
	 * 获取用户资料
	 * @return UserProfile
	 */
	public function getProfile()
	{
	    return $this->user->profile;
	}


	public function beforeRender($view)
	{
	    cs()->registerLinkTag('alternate', 'application/rss+xml', aurl('feed'), null, array('title'=>app()->name . ' » Feed'));
	    return true;
	}
}


