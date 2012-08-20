<?php

/**
 * This is the model class for table "{{advert}}".
 *
 * The followings are the available columns in table '{{advert}}':
 * @property string $id
 * @property string $name
 * @property string $solt
 * @property string $intro
 * @property integer $state
 * @property array $adcodes
 */
class Advert extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Advert the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return TABLE_ADVERT;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state', 'numerical', 'integerOnly'=>true),
			array('name, solt', 'length', 'max'=>50),
			array('intro', 'length', 'max'=>250),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		    'adcodes' => array(self::HAS_MANY, 'Adcode', 'ad_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('advert_id', 'admin'),
			'name' => t('advert_name', 'admin'),
			'solt' => t('advert_solt', 'admin'),
			'intro' => t('advert_intro', 'admin'),
			'state' => t('advert_state', 'admin'),
		);
	}

	/**
	 * 获取广告位的广告代码数据，返回的是数组数据
	 * @return array 广告代码数据
	 */
	public function getAdcodes()
	{
	    return Adcode::fetchAdcode($this->solt);
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
	 * 获取某个广告位的广告代码，优先从缓存中读取，如果是直接从数据库中修改的，需要在后台更新一下缓存
	 * @param string $solt
	 * @return array 广告代码数组
	 */
	public static function fetchAdcodesWithSolt($solt)
	{
	    $solt = trim($solt);
	     
	    $cacheID = sprintf(param('cache_adcodes_id') ,$solt);
	    if (app()->getCache()) {
	        $cacheData = app()->getCache()->get($cacheID);
	        if ($cacheData !== false) return $cacheData;
	    }

	    $data = array();
	    $cmd = app()->getDb()->createCommand()
	        ->select('id')
	        ->from(TABLE_ADVERT)
	        ->where(array('and', 'solt = :adsolt', 'state = :enabled'), array(':adsolt'=>$solt, ':enabled'=>BETA_YES));
	    
	    $adid = $cmd->queryScalar();
	    if ($adid !== false) {
    	    $data = Adcode::fetchAdcodes($adid);
    	    if (app()->getCache())
    	        app()->getCache()->set($cacheID, $data);
	    }
	    
	    return $data;
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

