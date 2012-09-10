<?php
class PostController extends MobileController
{
    public function actionShow($id)
    {
        $id = (int)$id;
        $post = MobilePost::model()->findByPk($id);
        if ($post === null)
            throw new CHttpException(403, t('post_is_not_found'));
        
        $comments = MobileComment::fetchList($id);

        $this->setSiteTitle($post->title);
        $this->render('show', array(
            'post' => $post,
            'comments' => $comments,
        ));
    }
    
    
}