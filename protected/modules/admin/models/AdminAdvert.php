<?php
class AdminAdvert extends Advert
{
    /**
     * Returns the static model of the specified AR class.
     * @return AdminAdvert the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * 清除当前广告位的广告代码缓存
     * @return boolean 执行结果
     */
    public function clearCache()
    {
        return self::clearSoltCache($this->solt);
    }
    
    /**
     * 根据solt清除单个广告位的广告代码缓存
     * @param string $solt
     * @return boolean 清除结果
     */
    public static function clearSoltCache($solt)
    {
        $cacheID = sprintf(param('cache_adcodes_id') ,$solt);
        if (app()->getCache()) {
            $result = app()->getCache()->delete($cacheID);
            return $result;
        }
        else
            return true;
    }
    
    /**
     * 清除所有广告代码的缓存
     * @throws CException 如果清除失败，抛出错误
     * @return boolean 清除结果，成功true, 失败false
     */
    public static function clearAllCache()
    {
        $solts = app()->getDb()->createCommand()
        ->select('solt')
        ->from(TABLE_ADVERT)
        ->queryColumn();
         
        foreach ((array)$solts as $solt) {
            $result = self::clearSoltCache($solt);
            if (!$result)
                throw new CException('clear cache error, solt: ' .$solt);
        }
         
        return true;
    }
    
}