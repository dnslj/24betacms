<button id="show-category-nav" class="btn btn-block btn-large"><?php echo t('expand_category_list', 'mobile');?></button>
<ul class="nav nav-tabs nav-stacked category-nav hide">
<?php foreach ($models as $model):?>
    <li><?php echo l('<i class="icon-chevron-right"></i>' . $model->name, $model->getPostsUrl());?></li>
<?php endforeach;?>
</ul>

<script type="text/javascript">
$(document).on('click', '#show-category-nav', function(event){
	$('.category-nav').toggle();
});
</script>