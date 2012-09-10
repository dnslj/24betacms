<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li><a href="#"><?php echo $models[0]->name;?></a></li>
            <li><a href="#"><?php echo $models[1]->name;?></a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo t('more_categories', 'mobile');?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php foreach ($models as $model):?>
                    <li><?php echo $model->postsLink;?></li>
                <?php endforeach;?>
                </ul>
            </li>
        </ul>
    </div>
</div>