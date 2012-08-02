<div class="hero-unit">
    <h2><?php echo t('welcome_text', 'admin', array('{appname}'=>app()->name));?></h2>
    <p><?php echo date('Y-m-d H:i:s');?></p>
    <p>
        <?php echo t('not_veryfiy_post_text', 'admin', array('{count}'=>$postCount));?>
        <a class="btn btn-primary btn-small" href="<?php echo url('admin/post/verify');?>"><?php echo t('view_latest_posts', 'admin');?></a>
    </p>
    <p>
        <?php echo t('not_veryfiy_user_text', 'admin', array('{count}'=>$userCount));?>
        <a class="btn btn-primary btn-small" href="<?php echo url('admin/user/verify');?>"><?php echo t('view_latest_users', 'admin');?></a>
    </p>
    <p>
        <?php echo t('not_veryfiy_comment_text', 'admin', array('{count}'=>$commentCount));?>
        <a class="btn btn-primary btn-small" href="<?php echo url('admin/comment/verify');?>"><?php echo t('view_latest_comments', 'admin');?></a>
    </p>
</div>