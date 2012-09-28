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
<script type="text/javascript">
$(function(){
	var interval = window.setInterval(slideScreen, 5000);
	$(document).on('mouseenter', '.page-nav a', function(event){
		window.clearInterval(interval);
	});
	$(document).on('mouseleave', '.page-nav a', function(event){
		interval = window.setInterval(slideScreen, 5000);
	});
	$(document).on('click', '.page-nav a', function(event){
		event.preventDefault();
		var container = $(this).parents('.beta-hottest-posts');
		var index = container.find('.page-nav a').index($(this));
		if (index < 0) return;

		var active = container.find('.beta-hottest-items.active');
		var activeIndex = container.find('.beta-hottest-items').index(active);
		if (index == activeIndex) return false;

		var clicked = container.find('.beta-hottest-items').eq(index);
		active.fadeOut('slow', function(){
		    $(this).removeClass('active');
		});
		clicked.fadeIn('slow', function(){
		    $(this).addClass('active');
		});
	});
});

function slideScreen()
{
	var container = $('#<?php echo $this->id;?>');
	var active = container.find('.beta-hottest-items.active');
	var next = active.next('.beta-hottest-items');
	if (next.length == 0)
		next = container.find('.beta-hottest-items').first();

	var nextIndex = container.find('.beta-hottest-items').index(next);
	container.find('.page-nav a.active').removeClass('active');
	container.find('.page-nav a').eq(nextIndex).addClass('active');
	
	active.fadeOut('slow', function(){
	    $(this).removeClass('active');
	});
	next.fadeIn('slow', function(){
	    $(this).addClass('active');
	});
}

function switchToScreen(index)
{
	var container = $('#<?php echo $this->id;?>');
	var active = container.find('.beta-hottest-items.active');
	var next = active.next('.beta-hottest-items');
	if (next.length == 0)
		next = container.find('.beta-hottest-items').first();

	var nextIndex = container.find('.beta-hottest-items').index(next);
	container.find('.page-nav a.active').removeClass('active');
	container.find('.page-nav a').eq(nextIndex).addClass('active');
	
	active.fadeOut('slow', function(){
	    $(this).removeClass('active');
	});
	next.fadeIn('slow', function(){
	    $(this).addClass('active');
	});
}

</script>

