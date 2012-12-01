<?php if (user()->hasFlash('user_save_result')):?>
<div class="alert alert-success fade in" data-dismiss="alert">
    <a href="javascript:void(0);" data-dismiss="alert" class="close">&times;</a>
    <?php echo user()->getFlash('user_save_result');?>
</div>
<?php endif;?>

<?php echo CHtml::form('', 'post', array('class'=>'form-horizontal member-form'));?>
<div class="control-group">
    <?php echo CHtml::activeLabel($model, 'email', array('class'=>'control-label'));?>
    <div class="controls">
        <?php echo CHtml::activeTextField($model, 'email', array('readonly'=>'readonly', 'class'=>'uneditable-input'));?>
    </div>
</div>
<div class="control-group <?php if($model->hasErrors('name')) echo 'error';?>">
    <?php echo CHtml::activeLabel($model, 'name', array('class'=>'control-label'));?>
    <div class="controls">
        <?php echo CHtml::activeTextField($model, 'name');?>
        <?php if($model->hasErrors('screen_name')):?><p class="help-block"><?php echo $model->getError('name');?></p><?php endif;?>
    </div>
</div>
<div class="form-actions">
    <input type="submit" value="提交" class="btn btn-primary" />
</div>
<?php echo CHtml::endForm();?>