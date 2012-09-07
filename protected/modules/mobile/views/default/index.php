<?php foreach ($models as $model):?>
<dl class="post-item">
    <dt><h1><?php echo $model->titleLink;?></h1></dt>
    <dd class="clearfix">
        <?php echo $model->filterSummary;?>
    </dd>
    <dd class="extra"><?php echo $model->authorName;?>&nbsp;|&nbsp;<?php echo $model->createTime;?></dd>
    <dd class="btn btn-block">继续越狱犯</dd>
</dl>
<?php endforeach;?>
