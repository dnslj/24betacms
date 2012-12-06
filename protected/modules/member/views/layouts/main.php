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
                <li><a href="<?php echo aurl('member/post/favorite');?>" <?php if ($this->menu == 'favorite') echo 'class="active"';?>>我的收藏</a></li>
                <li><a href="<?php echo aurl('member/post/index');?>" <?php if ($this->menu == 'post') echo 'class="active"';?>>我的段子</a></li>
                <li><a href="<?php echo aurl('member/comment/index');?>" <?php if ($this->menu == 'comment') echo 'class="active"';?>>我的评论</a></li>
                <li><div class="space10px"></div></li>
                <li><a href="<?php echo aurl('member/profile/index');?>" <?php if ($this->menu == 'profile') echo 'class="active"';?>>基本资料</a></li>
                <li><a href="<?php echo aurl('member/profile/avatar');?>" <?php if ($this->menu == 'avatar') echo 'class="active"';?>>修改头像</a></li>
                <li><a href="<?php echo aurl('member/profile/nickname');?>" <?php if ($this->menu == 'nickname') echo 'class="active"';?>>修改昵称</a></li>
                <li><a href="<?php echo aurl('member/profile/passwd');?>" <?php if ($this->menu == 'passwd') echo 'class="active"';?>>修改密码</a></li>
                <li><a href="<?php echo BetaBase::logoutUrl();?>">退出登录</a></li>
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

