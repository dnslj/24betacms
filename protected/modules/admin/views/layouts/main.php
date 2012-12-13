<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo app()->charset;?>" />
<title><?php echo app()->name . t('control_center', 'admin');?></title>
<link rel="stylesheet" type="text/css" href="<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo sbu('styles/beta-admin.css');?>" />
<script type="text/javascript">
/*<![CDATA[*/
var BETA_YES = <?php echo BETA_YES;?>;
var BETA_NO = <?php echo BETA_NO;?>;
var confirmAlertText = '<?php echo t('delete_confirm', 'admin');?>';
/*]]>*/
</script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container admin-nav-container">
            <a class="brand" href="<?php echo BetaBase::adminHomeUrl();?>"><?php echo t('control_center', 'admin');?></a>
            <ul class="nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('post_manage', 'admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l(t('create_posts', 'admin'), url('admin/post/create'));?></li>
                        <li><?php echo l(t('verify_posts', 'admin'), url('admin/post/verify'));?></li>
                        <li><?php echo l(t('search_posts', 'admin'), url('admin/post/search'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l(t('latest_posts', 'admin'), url('admin/post/latest'));?></li>
                        <li><?php echo l(t('hottest_posts', 'admin'), url('admin/post/hottest'));?></li>
                        <li><?php echo l(t('editor_recommend_posts', 'admin'), url('admin/post/recommend'));?></li>
                        <li><?php echo l(t('home_show_posts', 'admin'), url('admin/post/homeshow'));?></li>
                        <li><?php echo l(t('istop_posts', 'admin'), url('admin/post/istop'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">附件</li>
                        <li><?php echo l(t('upload_file_search', 'admin'), url('admin/upload/search'));?></li>
                        <li><?php echo l(t('upload_file_list', 'admin'), url('admin/upload/list'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l(t('trash', 'admin'), url('admin/post/trash'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('topic_category', 'admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('post_topic', 'admin');?></li>
                        <li><?php echo l(t('create_topic', 'admin'), url('admin/topic/create'));?></li>
                        <li><?php echo l(t('topic_list_table', 'admin'), url('admin/topic/list'));?></li>
                        <!-- <li><?php echo l(t('topic_statistics', 'admin'), url('admin/topic/statistics'));?></li> -->
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_special', 'admin');?></li>
                        <li><?php echo l(t('create_special', 'admin'), url('admin/special/create'));?></li>
                        <li><?php echo l(t('special_list_table', 'admin'), url('admin/special/list'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_category', 'admin');?></li>
                        <li><?php echo l(t('create_category', 'admin'), url('admin/category/create'));?></li>
                        <li><?php echo l(t('category_list_table', 'admin'), url('admin/category/list'));?></li>
                        <!-- <li><?php echo l(t('category_statistics', 'admin'), url('admin/category/statistics'));?></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('comment_manage', 'admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('comment_manage', 'admin');?></li>
                        <li><?php echo l(t('latest_comment', 'admin'), url('admin/comment/latest'));?></li>
                        <li><?php echo l(t('verify_comment', 'admin'), url('admin/comment/verify'));?></li>
                        <li><?php echo l(t('recommend_comment', 'admin'), url('admin/comment/recommend'));?></li>
                        <li><?php echo l(t('search_comment', 'admin'), url('admin/comment/search'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_tag', 'admin');?></li>
                        <li><?php echo l(t('hottest_tags', 'admin'), url('admin/tag/hottest'));?></li>
                        <li><?php echo l(t('tag_search', 'admin'), url('admin/tag/search'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('user_manage', 'admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l(t('create_user', 'admin'), url('admin/user/create'));?></li>
                        <li><?php echo l(t('verify_user', 'admin'), url('admin/user/verify'));?></li>
                        <li><?php echo l(t('search_user', 'admin'), url('admin/user/search'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('statistics', 'admin');?></li>
                        <li><?php echo l(t('today_signup_user', 'admin'), url('admin/user/today'));?></li>
                        <li><?php echo l(t('user_account_list', 'admin'), url('admin/user/list'));?></li>
                        <li><?php echo l(t('forbidden_user', 'admin'), url('admin/user/forbidden'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('system_tool', 'admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--
                        <li class="nav-header">广告</li>
                        <li><a href="#">广告单元</a></li>
                        <li><a href="#">自建广告</a></li>
                        <li class="divider"></li>
                        <li class="nav-header">数据</li>
                        <li><a href="#">备份</a></li>
                        <li><a href="#">恢复</a></li>
                        <li class="divider"></li>
                        -->
                        <li><?php echo l(t('friend_link', 'admin'), url('admin/link/list'));?></li>
                        <li><?php echo l(t('advert_managent', 'admin'), url('admin/advert/list'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('system_setting', 'admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('system_config_params', 'admin');?></li>
                        <li><?php echo l(t('system_site', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_SITE)));?></li>
                        <li><?php echo l(t('system_cache', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_CACHE)));?></li>
                        <li><?php echo l(t('system_attachments', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_ATTACHMENTS)));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('display_config_params', 'admin');?></li>
                        <li><?php echo l(t('display_template', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_DISPLAY_TEMPLATE)));?></li>
                        <li><?php echo l(t('display_ui', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_DISPLAY_UI)));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('filter_keyword_manage', 'admin');?></li>
                        <li><?php echo l(t('multi_create_filter_keyword', 'admin'), url('admin/keyword/create'));?></li>
                        <li><?php echo l(t('filter_keyword_list', 'admin'), url('admin/keyword/list'));?></li>
                        <!--
                        <li class="nav-header"><?php echo t('sns_config_params', 'admin');?></li>
                        <li><?php echo l(t('sns_interface', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_INTERFACE)));?></li>
                        <li><?php echo l(t('sns_stats', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_STATS)));?></li>
                        <li><?php echo l(t('sns_template', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_TEMPLATE)));?></li>
                         -->
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('custom_config_params', 'admin');?></li>
                        <li><?php echo l(t('custom_config_params', 'admin'), url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_CUSTOM)));?></li>
                        <li><?php echo l(t('create_custom_param', 'admin'), url('admin/config/create'));?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li><?php echo l(user()->name, url('admin/user/current'));?></li>
                <li><?php echo l(t('logout_control_center', 'admin'), url('site/logout'));?></li>
                <li><?php echo l(t('site_home', 'admin'), url('site/index'), array('target'=>'_blank'));?></li>
            </ul>
        </div>
    </div>
</div>
<div class="admin-sidebar">
    <ul class="nav nav-list quick-nav">
        <li class="nav-header"><?php echo t('article', 'admin');?></li>
        <li <?php if ($this->channel == 'create_post') echo 'class="active"';?>><?php echo l(t('create_posts', 'admin'), url('admin/post/create'));?></li>
        <li <?php if ($this->channel == 'verify_post') echo 'class="active"';?>><?php echo l(t('verify_posts', 'admin'), url('admin/post/verify'));?></li>
        <li <?php if ($this->channel == 'latest_post') echo 'class="active"';?>><?php echo l(t('latest_posts', 'admin'), url('admin/post/latest'));?></li>
        <li <?php if ($this->channel == 'search_post') echo 'class="active"';?>><?php echo l(t('search_posts', 'admin'), url('admin/post/search'));?></li>
        <li class="nav-header"><?php echo t('post_comment', 'admin');?></li>
        <li <?php if ($this->channel == 'verify_comment') echo 'class="active"';?>><?php echo l(t('verify_comment', 'admin'), url('admin/comment/verify'));?></li>
        <li <?php if ($this->channel == 'latest_comment') echo 'class="active"';?>><?php echo l(t('latest_comment', 'admin'), url('admin/comment/latest'));?></li>
        <li class="nav-header"><?php echo t('user_manage', 'admin');?></li>
        <li <?php if ($this->channel == 'verify_user') echo 'class="active"';?>><?php echo l(t('verify_user', 'admin'), url('admin/user/verify'));?></li>
        <li <?php if ($this->channel == 'today_user') echo 'class="active"';?>><?php echo l(t('today_signup_user', 'admin'), url('admin/user/today'));?></li>
    </ul>
</div>
<div class="admin-container">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs));?>
    <?php echo $content;?>
</div>

</body>
</html>

<?php
cs()->registerCoreScript('jquery');
cs()->registerScriptFile(sbu('libs/bootstrap/js/bootstrap.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(sbu('scripts/beta-admin.js'), CClientScript::POS_END);
?>


