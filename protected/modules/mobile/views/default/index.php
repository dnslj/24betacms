<?php foreach ($models as $model):?>
<dl class="post-item">
    <dt><h1><?php echo $model->titleLink;?></h1></dt>
    <dt class="create-time"><?php echo $model->shortDate;?></dt>
    <dd class="clearfix">
        <?php echo $model->topicIconHtml;?><?php echo $model->filterSummary;?>
    </dd>
</dl>
<?php endforeach;?>
