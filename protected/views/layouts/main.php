<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=<?php echo app()->charset?>" />
    <title><?php echo $this->pageTitle;?></title>
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="author" content="24beta.com" />
    <meta name="generator" content="<?php echo BetaBase::powered();?>" />
    <meta name="copyright" content="Copyright (c) 2009-2012 24beta.com All Rights Reserved." />
    <meta name="robots" content="all" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo aurl('feed');?>" />
    <link rel="start" href="<?php echo abu('/');?>" title="Home" />
    <link rel="home" href="<?php echo abu('/');?>" title="Home" />
    <link media="screen" rel="stylesheet" type="text/css" href="<?php echo tbu('styles/beta-all.css');?>" />
    <?php echo param('header_html');?>
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
    <div class="beta-entry">
        <?php echo $content;?>
    </div>
</div>
<?php echo param('footer_before_html');?>
<div class="beta-footer">
    <div class="beta-container">
        <p><?php echo t('site_announce');?></p>
        <p><?php echo t('site_content_share_announce');?>&nbsp;&copy;2012&nbsp;<?php echo app()->name;?>&nbsp;<?php echo param('beian_code');?></p>
        <p>Powered by <a href="http://www.24beta.com"><?php echo BetaBase::powered();?></a>&nbsp;&nbsp;<a href="http://www.24beta.com/" target="_blank">24beta.com</a></p>
    </div>
</div>
<a class="beta-backtop" href="#top"><?php echo t('return_top');?></a>
<?php echo param('footer_after_html');?>
<?php echo param('tongji_code');?>
</body>
</html>

<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(sbu('libs/bootstrap/js/bootstrap.min.js'), CClientScript::POS_END);?>
<?php cs()->registerScriptFile(tbu('scripts/beta-main.js'), CClientScript::POS_END);?>