<?php
class SiteController extends Controller
{
    public function actionIndex()
    {
        $data = self::fetchLatestPosts();
        $data['hottest'] = self::fetchHottestPosts();
        $data['recommend'] = self::fetchRecommendPosts();
        $data['comments'] = self::fetchRecommendComments();
        
        $this->setSiteTitle(null);
        $this->setPageKeyWords(param('site_keywords'));
        $this->setPageDescription(param('site_description'));
        
        cs()->registerMetaTag('all', 'robots');
        
        
        $this->render('index', $data);
    }
    
    private static function fetchHottestPosts()
    {
        $criteria = new CDbCriteria();
        $criteria->select = array('t.id', 't.title', 't.thumbnail', 't.state', 't.hottest');
        $criteria->limit = 4;
        $criteria->scopes = array('hottest', 'published');
        $models = Post::model()->findAll($criteria);
        
        return (array)$models;
    }
    
    private static function fetchRecommendPosts()
    {
        $criteria = new CDbCriteria();
        $criteria->select = array('t.id', 't.title', 't.thumbnail', 't.state', 't.recommend', 't.summary', 't.content');
        $criteria->limit = param('recommendPostsCount');
        $criteria->scopes = array('recommend', 'published');
        $models = Post::model()->findAll($criteria);
        
        return (array)$models;
    }
    
    private static function fetchRecommendComments()
    {
        $criteria = new CDbCriteria();
        $criteria->select = array('t.id', 't.content', 't.create_time', 't.user_id', 't.user_name', 't.post_id');
        $criteria->limit = param('recommendCommentsCount');
        $criteria->scopes = array('recommend', 'published');
        $criteria->with = array('post'=>array('select'=>'id, title'));
        $models = Comment::model()->findAll($criteria);
        
        return $models;
    }
    
    public function actionLogin($url = '')
    {
        if (!user()->getIsGuest()) {
            $returnUrl = strip_tags(trim($url));
            if (empty($returnUrl)) $returnUrl = aurl('site/index'); // @todo 如果有了用户中心，这里应该跳转到用户中心
            request()->redirect($returnUrl);
            exit(0);
        }
        
        
        $model = new LoginForm('login');
        if (request()->getIsPostRequest() && isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
                ;
            else
                $model->captcha = '';
        }
        else {
            $returnUrl = strip_tags(trim($url));
            if (empty($returnUrl))
                $returnUrl = request()->getUrlReferrer();
            if (empty($returnUrl))
                $returnUrl = aurl('site/index'); // @todo 如果有了用户中心，这里应该跳转到用户中心
            $model->returnUrl = urlencode($returnUrl);
        }
        
        cs()->registerMetaTag('noindex, follow', 'robots');
        $this->setSiteTitle(t('site_login'));
        
        $this->render('login', array('form'=>$model));
    }
    
    public function actionSignup()
    {
        if (!user()->getIsGuest()) {
            // @todo 如果有了用户中心，这里应该跳转到用户中心
//             $this->redirect(aurl('user/default'));
            $this->redirect(aurl('site/index'));
            exit(0);
        }
        
        
        $model = new LoginForm('signup');
        if (request()->getIsPostRequest() && isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->signup())
                ;
            else
                $model->captcha = '';
        }
        
        cs()->registerMetaTag('noindex, follow', 'robots');
        $this->setSiteTitle(t('site_signup'));
        
        $this->render('signup', array('form'=>$model));
    }
    
    public function actionLogout()
    {
        user()->logout();
        user()->clearStates();
        app()->session->clear();
        app()->session->destroy();
        $this->redirect(app()->homeUrl);
    }
    
    private static function fetchLatestPosts()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 't.istop desc, t.create_time desc';
        $criteria->limit = param('postCountOfPage');
        $criteria->scopes = array('homeshow', 'published');

        $count = Post::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->setPageSize(param('postCountOfPage'));
        $pages->applyLimit($criteria);
        $posts = Post::model()->findAll($criteria);

        return array(
            'posts' => $posts,
            'pages' => $pages,
        );
    }
    
    public function actionTest()
    {
        phpinfo();
        exit;
        
        $auth=Yii::app()->authManager;
        $auth->createOperation('create_post','create a post');
        $auth->createOperation('update_post','update a post');
        $auth->createOperation('delete_post','delete a post');
        $auth->createOperation('enter_admin_system','login into admin system');
        $auth->createOperation('upload_file','upload a file');
        $auth->createOperation('create_post_in_home','create post in home page');

        $bizRule='return Yii::app()->user->id==$params["post"]->user_id;';
        $task=$auth->createTask('update_own_post','update a post by author himself',$bizRule);
        $task->addChild('update_post');
         
        $role=$auth->createRole('author');
        $role->addChild('create_post');
        $role->addChild('update_own_post');
        $role->addChild('upload_file');
         
        $role=$auth->createRole('editor');
        $role->addChild('update_post');
        $role->addChild('enter_admin_system');
        $role->addChild('author');

        $role=$auth->createRole('chief_editor');
        $role->addChild('editor');
        
        $role=$auth->createRole('admin');
        $role->addChild('chief_editor');
        $role->addChild('delete_post');
         
        $auth->assign('admin','1');
        

    }


    public function actionError()
    {
        $error = app()->errorHandler->error;
        if ($error) {
            $this->setPageTitle('Error ' . $error['code']);
            $this->render('/system/error', $error);
        }
    }

    /**
     * baidu ping test
     */
    public function actionPing()
    {
        $result = BetaBase::ping('贝塔资讯', 'http://www.waduanzi.com/', 'http://www.24beta.com/archives/406', 'http://www.24beta.com/');
        print_r($result);
        
        exit;
        $client = new SoapClient(BAIDU_PING_URL);
        $functions = $client->__getFunctions();
        var_dump($functions);
        exit;
        
        $arguments = array('贝塔IT资讯', 'http://www.24beta.com', 'http://www.24beta.com/archives/406', 'http://www.24beta.com');
        $result = $client->__soapCall('weblogUpdates.extendedPing', $arguments);
        var_dump($result);
    }

    public function actionPics()
    {
        $url = 'http://www.24beta.cn/archives/89';
        
        $curl = new CDCurl();
        $curl->referer($url);
        $curl->user_agent($agent);
        $curl->get($url);
        $errno = $curl->errno();
        $error = $curl->error();
        $html = $curl->rawdata();
        
        $data = CDFileLocal::fetchAndReplaceMultiWithHtml($html);
        echo $data;
    }
}

