<?php

class DefaultController extends MobileController
{
	public function actionIndex()
	{
	    $data = self::fetchLatestPosts();
		$this->render('index', $data);
	}
	
	private static function fetchLatestPosts()
	{
	    $criteria = new CDbCriteria();
	    $criteria->order = 't.istop desc, t.create_time desc';
	    $criteria->limit = param('postCountOfPage');
	    $criteria->scopes = array('homeshow', 'published');
	
	    $count = MobilePost::model()->count($criteria);
	    $pages = new CPagination($count);
	    $pages->setPageSize(param('postCountOfPage'));
	    $pages->applyLimit($criteria);
	    $posts = MobilePost::model()->findAll($criteria);
	
	    return array(
	        'models' => $posts,
	        'pages' => $pages,
	    );
	}
}