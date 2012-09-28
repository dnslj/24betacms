<div class="beta-hottest-posts" id="<?php echo $this->id;?>">
<?php foreach ($posts as $index => $post):?>
    <?php if ($index % 4 == 0):?>
    <div class="beta-hottest-items<?php if ($index == 0) echo ' active';?>">
    <?php else:?>
    <span class="separate">&nbsp;</span>
    <?php endif;?>
    <a href="<?php echo $post->absoluteUrl?>" target="_blank">
        <strong><?php echo $post->title;?></strong>
        <img src="<?php echo $post->thumbnailUrl?>" alt="<?php echo $post->title;?>" />
    </a>
    <?php if ($index > 0 and ($index+1) % 4 == 0):?>
    <div class="clear"></div>
    </div>
    <?php endif;?>
<?php endforeach;?>
    <div class="page-nav">
        <?php for ($i=0; $i<$this->pageCount; $i++):?>
        <a <?php if ($i==0) echo 'class="active"';?> href="javascript:void(0);" title="<?php echo t('click_switch_page');?>"></a>
        <?php endfor;?>
    </div>
</div>

<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(sbu('libs/jquery.pagecontrol.js'), CClientScript::POS_END);?>
<script type="text/javascript">
$(function(){
	$('#<?php echo $this->id;?>').pagecontrol();
});

function slideScreen()
{
	var container = $('#<?php echo $this->id;?>');
	var active = container.find('.beta-hottest-items.active');
	var next = active.next('.beta-hottest-items');
	if (next.length == 0)
		next = container.find('.beta-hottest-items').first();

	var nextIndex = container.find('.beta-hottest-items').index(next);
	switchToScreen(nextIndex);
}

function switchToScreen(index)
{
	var container = $('#<?php echo $this->id;?>');
	var activeItem = container.find('.beta-hottest-items.active');
	var nextItem = container.find('.beta-hottest-items').eq(index);

	activeItem.fadeOut('slow', function(){
	    $(this).removeClass('active');
	});
	nextItem.fadeIn('slow', function(){
	    $(this).addClass('active');
	});
	
	container.find('.page-nav a.active').removeClass('active');
	container.find('.page-nav a').eq(index).addClass('active');
}

</script>

