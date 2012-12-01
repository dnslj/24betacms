<div class="beta-hottest-posts" id="<?php echo $this->id;?>">
    <?php for ($i=0; $i<$this->pageCount; $i++):?>
    <div class="beta-hottest-items<?php if ($i == 0) echo ' active';?>">
        <?php for ($j=0; $j<4; $j++):?>
        <?php if ($j > 0):?><span class="separate">&nbsp;</span><?php endif;?>
        <a href="<?php echo $posts[$i*4+$j]->absoluteUrl?>" target="_blank">
            <strong><?php echo $posts[$i*4+$j]->title;?></strong>
            <img src="<?php echo $posts[$i*4+$j]->thumbnailUrl?>" alt="<?php echo $posts[$i*4+$j]->title;?>" />
        </a>
        <?php endfor;?>
        <div class="clear"></div>
    </div>
    <?php endfor;?>
    <div class="page-nav">
        <?php for ($i=0; $i<$this->pageCount; $i++):?>
        <a <?php if ($i==0) echo 'class="active"';?> href="javascript:void(0);" title="<?php echo t('click_switch_page');?>"></a>
        <?php endfor;?>
    </div>
</div>

<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(sbu('libs/jquery.pagecontrol.js'), CClientScript::POS_END);?>
<?php cs()->registerScript($this->id, sprintf('$("#%s").pagecontrol();', $this->id), CClientScript::POS_END);?>

