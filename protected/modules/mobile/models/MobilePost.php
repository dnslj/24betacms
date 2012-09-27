<?php
/**
 * MobilePost
 * @author chendong
 * @property string $url
 * @property string $filterSummary
 * @property string $titleLink
 * @property string $commentsUrl
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
    
    public function getTitleLink($len = 0)
    {
       return parent::getTitleLink($len, '_self');
    }

    public function getCommentsUrl()
    {
        return aurl('mobile/comment/list', array('pid'=>$this->id));
    }
}