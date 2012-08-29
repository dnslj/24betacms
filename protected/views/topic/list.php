<div class="beta-block beta-radius3px beta-all-topics">
    <h2><?php echo t('all_topic_list');?></h2>
    <div class="beta-block-content">
        <?php foreach ($topics as $topic):?>
        <dl>
            <dd><?php echo l($topic->iconHtml, $topic->postsUrl, array('title'=>$topic->name));?></dd>
            <dt><?php echo l($topic->name, $topic->postsUrl, array('title'=>$topic->name));?></dt>
        </dl>
        <?php endforeach;?>
        <div class="clear"></div>
    </div>
</div>