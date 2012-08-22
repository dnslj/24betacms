<?php
class TopicController extends Controller
{
    public function actionPosts($id)
    {
        $this->channel = 'topic';
        
        $id = (int)$id;
        $topic = Topic::model()->findByPk($id);
        if ($topic === null)
            throw new CHttpException(403, t('topic_is_not_found'));
        
        $data = self::fetchTopicPosts($id);
        
        $this->setSiteTitle(t('topic_posts', 'main', array('{name}'=>$topic->name)));
        $this->setPageKeyWords($topic->name);
        $this->setPageDescription(t('topic_posts_page_description', 'main', array('{name}' => $topic->name)));
        
        cs()->registerMetaTag('all', 'robots');
        
        $feedTitle = $topic->name . t('topic_feed');
        cs()->registerLinkTag('alternate', 'application/rss+xml', aurl('feed/topic', array('id'=>$id)), null, array('title'=>$feedTitle));
        
        $listType = param('post_list_type');
        $view = ($listType == POST_LIST_TYPE_SUMMARY) ? '/post/_summary_list' : '/post/_title_list';
        $data['blockTitle'] = t('topic_posts', 'main', array('{name}'=>$topic->name));
        $postListHtml = $this->renderPartial($view, $data, true);
        
        $this->render('posts', array(
            'topic' => $topic,
            'postListHtml' => $postListHtml,
        ));
    }
    
    private static function fetchTopicPosts($id)
    {
        $criteria = new CDbCriteria();
        if (param('post_list_type') == POST_LIST_TYPE_TITLE)
            $criteria->select = array('t.id', 't.title', 't.visit_nums', 't.comment_nums', 't.create_time');
        $criteria->order = 't.istop desc, t.create_time desc';
        $criteria->addColumnCondition(array('t.topic_id' => $id))
            ->addCondition('t.state = :state');
        $criteria->params += array(':state'=>POST_STATE_ENABLED);
    
        $count = Post::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->setPageSize(param('postCountOfTitleListPage'));
        $pages->applyLimit($criteria);
        $posts = Post::model()->findAll($criteria);
    
        return array(
            'posts' => $posts,
            'pages' => $pages,
        );
    }

    public function actionList()
    {
        $this->channel = 'topic';
        
        $criteria = new CDbCriteria();
        $criteria->order = 'orderid desc, post_nums desc, id asc';
        $topics = Topic::model()->findAll($criteria);
        
        $this->setSiteTitle(t('all_topic_list'));
        $this->setPageKeyWords(null);
        $this->setPageDescription(t('all_topics_description'));
        
        cs()->registerMetaTag('all', 'robots');
        $this->render('list', array(
            'topics' => $topics,
        ));
    }
}