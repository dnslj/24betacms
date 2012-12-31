<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=<?php echo app()->charset?>" />
    <title><?php echo $this->pageTitle;?></title>
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="author" content="24beta.com" />
    <meta name="generator" content="<?php echo BetaBase::powered();?>" />
    <meta name="copyright" content="Copyright (c) 2009-2012 24beta.com All Rights Reserved." />
    <link media="screen" rel="stylesheet" type="text/css" href="<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>" />
    <link media="screen" rel="stylesheet" type="text/css" href="<?php echo sbu('styles/beta-common.css');?>" />
    <link media="screen" rel="stylesheet" type="text/css" href="<?php echo sbu('styles/beta-member.css');?>" />
</head>
<body>
<div class="beta-container">
    <div class="beta-header">
        <div class="beta-logo"><a href="<?php echo abu();?>"><?php echo app()->name;?></a></div>
    </div>
    <div class="beta-nav">
        <ul class="channel-nav fleft">
            <li><a <?php if (empty($this->channel)) echo 'class="active"';?> href="<?php echo app()->homeUrl;?>"><?php echo t('site_home');?></a></li>
            <?php $this->widget('BetaCategoryMenu', array('channel'=>$this->channel));?>
            <li class="separator"></li>
            <li><?php echo l(t('nav_topic'), aurl('topic/list'), array('class'=>($this->channel == 'topic') ? 'active' : 'gray'));?></li>
        </ul>
        <ul class="user-mini-bar fright">
            <li><?php echo l(t('nav_contribute'), aurl('post/create'), array('class'=>($this->channel == 'contribute') ? 'active' : 'green'));?></li>
            <?php $this->renderDynamic('userMiniToolbar');?>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="beta-entry beta-member">
        <div class="member-sidebar fleft sidebar-nav">
            <div class="user-avatar">
                <a href="<?php echo aurl('member/profile/avatar');?>"><?php echo $this->profile->largeAvatar;?></a>
                <h5><?php echo $this->nickname;?></h5>
            </div>
            <ul class="member-nav">
                <li><?php echo l(t('my_favorite', 'member'), aurl('member/post/favorite'), array('class'=>$this->menu == 'favorite' ? 'active' : ''));?></li>
                <li><?php echo l(t('my_posts', 'member'), aurl('member/post/index'), array('class'=>$this->menu == 'post' ? 'active' : ''));?></li>
                <li><?php echo l(t('my_comments', 'member'), aurl('member/comment/index'), array('class'=>$this->menu == 'comment' ? 'active' : ''));?></li>
                <li><div class="space10px"></div></li>
                <li><?php echo l(t('edit_basic_profile', 'member'), aurl('member/profile/index'), array('class'=>$this->menu == 'profile' ? 'active' : ''));?></li>
                <li><?php echo l(t('edit_avatar', 'member'), aurl('member/profile/avatar'), array('class'=>$this->menu == 'avatar' ? 'active' : ''));?></li>
                <li><?php echo l(t('edit_nickname', 'member'), aurl('member/profile/nickname'), array('class'=>$this->menu == 'nickname' ? 'active' : ''));?></li>
                <li><?php echo l(t('edit_password', 'member'), aurl('member/profile/passwd'), array('class'=>$this->menu == 'passwd' ? 'active' : ''));?></li>
                <li><?php echo l(t('user_logout', 'member'), BetaBase::logoutUrl());?></li>
            </ul>
        </div>
        <div class="member-content fright">
            <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs, 'skin'=>'member'));?>
            <?php echo $content;?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="beta-footer">
    <div class="beta-container">
        <p><?php echo t('site_announce');?></p>
        <p><?php echo t('site_content_share_announce');?>&nbsp;&copy;2012&nbsp;<?php echo app()->name;?>&nbsp;<?php echo param('beian_code');?></p>
        <p>Powered by <a href="http://www.24beta.com"><?php echo BetaBase::powered();?></a>&nbsp;&nbsp;<a href="http://www.24beta.com/" target="_blank">24beta.com</a></p>
    </div>
</div>
<a class="beta-backtop" href="#top"><?php echo t('return_top');?></a>
<?php echo param('tongji_code');?>
</body>
</html>

<?php
cs()->registerCoreScript('jquery');
cs()->registerScriptFile(sbu('scripts/beta-member.js'), CClientScript::POS_END);
cs()->registerScriptFile(sbu('libs/bootstrap/js/bootstrap.min.js'), CClientScript::POS_END);
?>

