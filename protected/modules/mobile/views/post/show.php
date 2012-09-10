<div class="post-detail">
    <h1 class="post-title"><?php echo $post->titleLink;?></h1>
    <p class="post-extra"><?php echo $post->authorName;?>&nbsp;|&nbsp;<?php echo $post->shortTime;?></p>
    <div id="beta-post-content"><?php echo $post->filterContent;?></div>
    <?php $this->renderPartial('/comment/list', array('comments'=>$comments));?>
</div>
