<?php
class UpgradeController extends Controller
{
    public function init()
    {
        set_time_limit(0);
    }
    
    public function actionVersion140To141()
    {
        header('Content-Type: text/html; charset=UTF-8');
        
        $criteria = new CDbCriteria();
        $criteria->select = 't.id';
        $criteria->order = 't.id asc';
        $users = User::model()->with('profile')->findAll($criteria);
        foreach ($users as $user) {
            if (empty($user->profile)) {
                $profile = new UserProfile();
                $profile->user_id = $user->id;
                $profile->save();
            }
        }
        
        self::afterUpgrade('1.4.1');
    }
    
    private static function afterUpgrade($version)
    {
        echo '<h3>恭喜，已经成功升级到 ' . $version . ' 版，升级完请将升级文件删除：protected/controllers/SiteController.php</h3>';
        exit(0);
    }
}