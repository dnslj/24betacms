<div class="alert beta-alert hide" id="beta-create-message" data-dismiss="alert"><a class="close" href="javascript:void(0);">&times;</a><span class="text"></span></div>
<?php echo CHtml::form(aurl('mobile/post/comment'),  'post', array('class'=>'form-horizontal beta-comment-form', 'id'=>'comment-form'));?>
    <?php echo CHtml::activeHiddenField($comment, 'post_id');?>
    <p class="beta-help-info beta-help-block"><?php echo t('comment_content_min_length', 'main', array('{minlength}'=>param('commentMinLength')));?></p>
    <?php echo CHtml::activeTextArea($comment, 'content', array('class'=>'comment-content', 'minlen'=>param('commentMinLength')));?>
    <button class="btn btn-block btn-primary"><?php echo t('submit');?></button>
<?php echo CHtml::endForm();?>

<script type="text/javascript">
$(function(){
	$(document).on('submit', '.beta-comment-form', BetaComment.create);
	$(document).on('blur', '.beta-comment-form .comment-content', BetaComment.contentValidate);
});
</script>


