<?php

/**
 * This is the model class for table "{{adcode}}".
 *
 * The followings are the available columns in table '{{adcode}}':
 * @property string $id
 * @property string $ad_id
 * @property string $adcode
 * @property string $intro
 * @property integer $state
 */
class Adcode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Adcode the static model class
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
		return TABLE_ADCODE;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_id', 'required'),
			array('state', 'numerical', 'integerOnly'=>true),
			array('ad_id', 'length', 'max'=>10),
			array('intro', 'length', 'max'=>250),
			array('adcode', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ad_id, adcode, intro, state', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		    'advert' => array(self::BELONGS_TO, 'Advert', 'ad_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('adcode_id', 'admin'),
			'ad_id' => t('advert_id', 'admin'),
			'adcode' => t('advert_code', 'admin'),
			'intro' => t('adcode_intro', 'admin'),
			'state' => t('adcode_state', 'admin'),
		);
	}

}

