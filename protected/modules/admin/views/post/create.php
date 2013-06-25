<?php if (user()->hasFlash('save_post_result')):?>
<div class="alert alert-success fade in">
    <a href="#" data-dismiss="alert" class="close">&times;</a>
    <?php echo user()->getFlash('save_post_result');?>
</div>
<?php endif;?>

<?php echo CHtml::form('',  'post', array('class'=>'form-horizontal post-form'));?>
<input type="hidden" name="returnurl" value="<?php echo request()->getUrlReferrer();?>" />
<fieldset>
    <legend><?php echo t('create_posts', 'admin');?></legend>
    <div class="control-group bottom10px <?php if ($model->hasErrors('title')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'title', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'title', array('class'=>'span6', 'id'=>'post-title'));?>
            <?php if ($model->hasErrors('title')):?><p class="help-block"><?php echo $model->getError('title');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('source')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'source', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'source', array('class'=>'span6'));?>
            <?php if ($model->hasErrors('source')):?><p class="help-block"><?php echo $model->getError('source');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('tags')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'tags', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'tags', array('class'=>'span5'));?>
            <span class="help-inline"><?php echo t('tags_rules', 'admin');?></span>
            <?php if ($model->hasErrors('tags')):?><p class="help-block"><?php echo $model->getError('tags');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px">
        <label class="control-label"><?php echo t('options', 'admin');?></label>
        <div class="controls">
            <label class="checkbox inline">
                <?php echo CHtml::activeCheckBox($model, 'homeshow');?><?php echo CHtml::activeLabel($model, 'homeshow');?>
            </label>
            <label class="checkbox inline">
                <?php echo CHtml::activeCheckBox($model, 'hottest');?><?php echo t('hottest_show', 'admin');?>
            </label>
            <label class="checkbox inline">
                <?php echo CHtml::activeCheckBox($model, 'recommend');?><?php echo t('recommend_show', 'admin');?>
            </label>
            <label class="checkbox inline">
                <?php echo CHtml::activeCheckBox($model, 'istop');?><?php echo t('settop', 'admin');?>
            </label>
            <label class="checkbox inline">
                <?php echo CHtml::activeCheckBox($model, 'disable_comment');?><?php echo t('disable_comment', 'admin');?>
            </label>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('thumbnail')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'thumbnail', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'thumbnail', array('class'=>'span6'));?>
            <?php if ($model->hasErrors('thumbnail')):?><p class="help-block"><?php echo $model->getError('thumbnail');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('category_id') || $model->hasErrors('topic_id')) echo 'error';?>">
        <label class="control-label"><?php echo t('post_category', 'admin') . '/' . t('post_topic', 'admin');?></label>
        <div class="controls">
            <?php echo CHtml::activeDropDownList($model, 'category_id', AdminCategory::listData(), array('empty'=>t('please_select_category', 'admin'), 'id'=>'post-category'));?>
            <?php echo CHtml::activeDropDownList($model, 'topic_id', AdminTopic::listData(), array('empty'=>t('please_select_topic', 'admin'), 'id'=>'post-topic'));?>
            <?php echo CHtml::submitButton(t('submit_post', 'admin'), array('class'=>'btn btn-primary'));?>
            <?php if (!$model->hasErrors('category_id')):?><span class="help-block"><?php echo $model->getError('category_id');?></span><?php endif;?>
            <?php if ($model->hasErrors('topic_id')):?><span class="help-block"><?php echo $model->getError('topic_id');?></span><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('summary')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'summary', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextArea($model, 'summary', array('id'=>'summary'));?>
            <?php if ($model->hasErrors('summary')):?><p class="help-block"><?php echo $model->getError('summary');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('content')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'content', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextArea($model, 'content', array('id'=>'content'));?>
            <?php if ($model->hasErrors('content')):?><p class="help-block"><?php echo $model->getError('content');?></p><?php endif;?>
        </div>
    </div>
    <?php if (count($tempPictures) > 0):?>
    <div class="control-group bottom10px">
        <label class="control-label"><?php echo t('post_upload_temp_pictures', 'admin');?></label>
        <div class="controls">
            <ul class="unstyled post-pictures">
                <?php foreach ((array)$tempPictures as $picture):?>
                <li><img src="<?php echo $picture->fileUrl;?>" /></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <?php endif;?>
    <!-- 此处是文章图片，以后代替为弹出层的相册界面
    <?php if (count($model->picture) > 0):?>
    <div class="control-group bottom10px">
        <label class="control-label"><?php echo t('post_upload_pictures', 'admin');?></label>
        <div class="controls">
            <ul class="unstyled post-pictures">
                <?php foreach ((array)$model->picture as $pic):?>
                <li><img src="<?php echo $pic->fileUrl;?>" /></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <?php endif;?>
     -->
    <div class="form-actions">
        <?php echo CHtml::submitButton(t('submit_post', 'admin'), array('class'=>'btn btn-primary'));?>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('contributor')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'contributor', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'contributor', array('class'=>'text'));?>
            <?php if ($model->hasErrors('contributor')):?><p class="help-block"><?php echo $model->getError('contributor');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('contributor_site')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'contributor_site', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'contributor_site', array('class'=>'span6'));?>
            <?php if ($model->hasErrors('contributor_site')):?><p class="help-block"><?php echo $model->getError('contributor_site');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('contributor_email')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'contributor_email', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'contributor_email', array('class'=>'span6'));?>
            <?php if ($model->hasErrors('contributor_email')):?><p class="help-block"><?php echo $model->getError('contributor_email');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('visit_nums')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'visit_nums', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'visit_nums', array('class'=>'span6'));?>
            <?php if ($model->hasErrors('visit_nums')):?><p class="help-block"><?php echo $model->getError('visit_nums');?></p><?php endif;?>
        </div>
    </div>
    <div class="control-group bottom10px <?php if ($model->hasErrors('digg_nums')) echo 'error';?>">
        <?php echo CHtml::activeLabel($model, 'digg_nums', array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo CHtml::activeTextField($model, 'digg_nums', array('class'=>'span6'));?>
            <?php if ($model->hasErrors('digg_nums')):?><p class="help-block"><?php echo $model->getError('digg_nums');?></p><?php endif;?>
        </div>
    </div>
    <div class="form-actions">
        <?php echo CHtml::submitButton(t('submit_post', 'admin'), array('class'=>'btn btn-primary'));?>
    </div>
</fieldset>
<?php echo CHtml::endForm();?>


<?php
cs()->registerScriptFile(sbu('libs/chosen/chosen.jquery.min.js'), CClientScript::POS_END);
cs()->registerCssFile(sbu('libs/chosen/chosen.min.css'));
cs()->registerScriptFile(sbu('libs/kindeditor/kindeditor-min.js'), CClientScript::POS_END);
cs()->registerScriptFile(sbu('libs/kindeditor/config.js'), CClientScript::POS_END);
?>

<script type="text/javascript">
$(function(){
	$(':text:first').focus();
	$('#post-category, #post-topic').chosen({
    	'no_results_text': '没有找到匹配的内容'
	});
	
    KindEditor.ready(function(K) {
    	var cssPath = ['<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>', '<?php echo resbu('styles/beta-common.css');?>', '<?php echo resbu('styles/beta-main.css');?>'];
    	var imageUploadUrl = '<?php echo aurl('upload/image');?>';
        KEConfig.adminmini.cssPath = cssPath;
    	KEConfig.adminmini.uploadJson = imageUploadUrl;
        KEConfig.adminfull.cssPath = cssPath;
    	KEConfig.adminfull.uploadJson = imageUploadUrl;
    	var betaContent = K.create('#content', KEConfig.adminfull);
    	var betaSummary = K.create('#summary', KEConfig.adminmini);
    	$(document).on('click', '.post-pictures li', function(event){
            var html = $(this).html();
            betaContent.insertHtml(html);
        });
    });
});
</script>

