<?php
class LinkController extends AdminController
{
    public function filters()
    {
        return array(
            'postOnly + updateOrderID',
        );
    }
    

	public function actionCreate($id = 0)
	{
	    $id = (int)$id;
	    
	    if ($id > 0) {
	        $model = AdminLink::model()->findByPk($id);
	        $this->adminTitle = t('edit_link', 'admin');
	    }
	    else {
	        $model = new AdminLink();
	        $this->adminTitle = t('create_link', 'admin');
	    }
	    
	    if (request()->getIsPostRequest() && isset($_POST['AdminLink'])) {
	        $model->attributes = $_POST['AdminLink'];
	        if ($model->save()) {
	            self::clearLinksCache();
	            user()->setFlash('save_link_result', t('save_link_success', 'admin', array('{name}'=>$model->name)));
	            $this->redirect(request()->getUrl());
	        }
	    }
	    
	    $this->render('create', array(
	        'model' => $model,
	    ));
	}
	

	public function actionUpdateOrderID()
	{
	    try {
	        $rows = (array)$_POST['itemid'];
	        foreach ($rows as $id => $orderid) {
	            AdminLink::model()->updateByPk((int)$id, array('orderid'=>(int)$orderid));
	        }
	        self::clearLinksCache();
	        user()->setFlash('order_id_save_result_success', t('order_id_save_success', 'admin'));
	    }
	    catch (Exception $e) {
	        user()->setFlash('order_id_save_result_error', t('order_id_save_error', 'admin', array('{error}'=>$e->getMessage())));
	    }
	    request()->redirect(url('admin/Link/list'));
	}
	
	public function actionList()
	{
	    $criteria = new CDbCriteria();
	    $criteria->limit = param('adminLinkCountOfPage');
	    
	    $sort = new CSort('Link');
	    $sort->defaultOrder = 'orderid asc, id asc';
	    $sort->applyOrder($criteria);
	    
	    $pages = new CPagination(AdminLink::model()->count($criteria));
	    $pages->pageSize = $criteria->limit;
	    $pages->applyLimit($criteria);
	    
	    $models = AdminLink::model()->findAll($criteria);
	    
	    $data = array(
	        'models' => $models,
	        'sort' => $sort,
	        'pages' => $pages,
	    );
	    
	    $this->render('list', $data);
	}
	
	private static function clearLinksCache()
	{
	    if (app()->getCache()) {
	        $result = app()->getCache()->delete('cache_friend_links');
	        return $result;
	    }
	    return true;
	}
}

