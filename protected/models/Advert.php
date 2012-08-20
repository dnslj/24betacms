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

}

