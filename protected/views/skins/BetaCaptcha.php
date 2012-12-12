<?php
return array(
    'default' => array(
	    'captchaAction' => 'captcha',
        'lazy' => false,
        'clickableImage' => true,
        'buttonLabel' => t('refresh_captcha', 'basic'),
        'imageOptions' => array('alt'=>t('captcha', 'basic'), 'align'=>'top', 'class'=>'beta-captcha-img'),
        'buttonOptions' => array('class'=>'refresh-captcha'),
    ),
    'defaultLazy' => array(
        'captchaAction' => 'captcha',
        'lazy' => true,
        'buttonLabel' => t('refresh_captcha', 'basic'),
        'clickableImage' => true,
        'imageOptions' => array('alt'=>t('captcha', 'basic'), 'align'=>'top', 'class'=>'beta-captcha-img'),
        'buttonOptions' => array('class'=>'refresh-captcha'),
    ),
    'comment' => array(
        'captchaAction' => 'captcha',
        'lazy' => true,
        'buttonLabel' => t('refresh_captcha', 'basic'),
        'clickableImage' => false,
        'showRefreshButton' => false,
        'imageOptions' => array('alt'=>t('captcha', 'basic'), 'align'=>'top', 'class'=>'beta-captcha-img'),
        'buttonOptions' => array('class'=>'refresh-captcha'),
    ),
    'big' => array(
	    'captchaAction' => 'bigcaptcha',
        'lazy' => false,
        'clickableImage' => true,
        'buttonLabel' => t('refresh_captcha', 'basic'),
        'imageOptions' => array('alt'=>t('captcha', 'basic'), 'align'=>'top', 'class'=>'beta-captcha-img'),
        'buttonOptions' => array('class'=>'refresh-captcha'),
    ),
);