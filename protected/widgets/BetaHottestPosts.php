<?php
class BetaHottestPosts extends CWidget
{
    /**
     * 总共文章数量，需要是$countOfPage的倍数
     * @var integer
     */
    public $count = 12;
    
    /**
     * 每一屏的数量
     * @var integer
     */
    public $countOfPage = 4;
    
    /**
     * 分类ID
     * @var integer
     */
    public $cid;
    
    /**
     * 根容器的ID
     * @var string
     */
    public $id;
    
    protected $pageCount = 0;
    
    public function init()
    {
        if ($this->countOfPage <= 0)
            throw new CException('$countOfPage must be greater than 0.');
        
        if ($this->count % $this->countOfPage == 0) {
            $this->count = ceil($this->count / $this->countOfPage) * $this->countOfPage;
        }
        
        $this->cid = abs((int)$this->cid);
        
        if (empty($this->id))
            $this->id = 'beta-hottest-' . uniqid();
        
    }
    
    public function run()
    {
        if ($this->count < 4) return;
        
        $posts = $this->fetchHottestPosts();
        if (empty($posts)) return;
        
        $this->pageCount = ceil(count($posts) / $this->countOfPage);
        
        $this->render('beta_hottest_posts', array(
            'posts' => $posts,
        ));
    }

    private function fetchHottestPosts()
    {
        $criteria = new CDbCriteria();
        $criteria->select = array('t.id', 't.title', 't.thumbnail', 't.state', 't.hottest');
        $criteria->limit = $this->count;
        $criteria->scopes = array('hottest', 'published');
        
        if ($this->cid > 0)
            $criteria->addColumnCondition(array('t.category_id' => $this->cid));
        
        $models = Post::model()->findAll($criteria);
    
        return (array)$models;
    }
}