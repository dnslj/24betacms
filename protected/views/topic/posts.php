<div class="beta-content">
    <?php echo $postListHtml;?>
</div>
<div class="beta-sidebar">
    <?php $this->widget('BetaVisitTopPosts', array('allowEmpty'=>true, 'days'=>30, 'tid'=>$topic->id));?>
    <?php $this->widget('BetaAdvert', array('solt'=>'sidebar_ad_01'));?>
</div>
<div class="clear"></div>