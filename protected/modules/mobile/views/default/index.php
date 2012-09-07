<?php foreach ($models as $model):?>
<dl class="post-item">
    <dt><h1><?php echo $model->titleLink;?></h1></dt>
    <dd class="clearfix">
        <?php echo $model->topicIconHtml;?><?php echo $model->filterSummary;?>
    </dd>
    <dt class="extra"><?php echo $model->shortDate;?></dt>
</dl>
<?php endforeach;?>
