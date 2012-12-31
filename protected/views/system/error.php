<div class="beta-error">
    <div class="error-icon fleft">囧</div>
    <div class="error-detail fleft">
        <p><?php echo t('site_page_error_tip');?></p>
        <div class="alert alert-block alert-danger"><?php echo $message;?></div>
    </div>
    <div class="clear"></div>
</div>


<?php if (YII_DEBUG): // 以下内容为调试信息?>
<div><?php echo $code . ' - ' . $message;?></div>
<div><?php echo $file . ' - ' . $line;?></div>
<div><?php echo $trace;?></div>
<?php endif;?>