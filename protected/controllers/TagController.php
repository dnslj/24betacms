<?php
class TagController extends Controller
{
    public function actionPosts($name)
    {
        $tag = urldecode($name);
        
        $this->setSiteTitle(t('tag_posts', 'main', array('{name}'=>$tag)));
        // @todo 关键字的描述没有指定
        $this->setPageKeyWords($tag);
        $this->setPageDescription(t('tag_posts_page_description', 'main', array('{name}' => $tag)));
        cs()->registerMetaTag('all', 'robots');
        
        $cmd = app()->getDb()->createCommand()
            ->select('p.id')
            ->from(TABLE_TAG . ' t')
            ->where('t.name = :tagname', array(':tagname' => $tag))
            ->join(TABLE_POST_TAG . ' pt', 'pt.tag_id = t.id')
            ->join(TABLE_POST . ' p', 'p.id = pt.post_id');
        
        $ids = $cmd->queryColumn();
        
        if (count($ids) > 0) {
            $criteria = new CDbCriteria();
            if (param('post_list_type') == POST_LIST_TYPE_TITLE)
                $criteria->select = array('t.id', 't.title', 't.visit_nums', 't.comment_nums', 't.create_time');
            $criteria->order = 't.istop, t.create_time desc, t.id desc';
            $criteria->addInCondition('t.id', $ids)
                ->addCondition('t.state = :state');
            $criteria->params += array(':state'=>POST_STATE_ENABLED);
            
            $count = Post::model()->count($criteria);
            $pages = new CPagination($count);
            $pages->setPageSize(param('postCountOfTitleListPage'));
            $pages->applyLimit($criteria);
            $posts = Post::model()->findAll($criteria);
        }
        $listType = param('post_list_type');
        $view = ($listType == POST_LIST_TYPE_SUMMARY) ? '/post/_summary_list' : '/post/_title_list';
        $blockTitle = t('tag_posts', 'main', array('{name}'=>h($tag)));
        $data = array(
            'blockTitle' => $blockTitle,
            'posts' => $posts,
            'pages' => $pages,
        );
        $postListHtml = $this->renderPartial($view, $data, true);
        
        $this->render('posts', array(
            'postListHtml' => $postListHtml,
        ));
    }
}