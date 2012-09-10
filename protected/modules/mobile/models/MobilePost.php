<?php
/**
 * MobilePost
 * @author chendong
 * @property string $url
 */
class MobilePost extends Post
{
    /**
     * Returns the static model of the specified AR class.
     * @return MobilePost the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function getUrl()
    {
        return aurl('mobile/post/show', array('id'=>$this->id));
    }
    
    public function getFilterSummary()
    {
        $tags = param('mobileSummaryHtmlTags');
        $html = strip_tags($this->summary, $tags);
         
        return $html;
    }
}