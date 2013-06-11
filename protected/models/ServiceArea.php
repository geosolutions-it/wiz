<?php

/**
 * This is the model class for table "service_areas".
 *
 * The followings are the available columns in table 'service_areas':
 * @property integer $gid
 * @property string $area
 * @property string $desc_area
 * @property boolean $virtuale
 * @property double $area_mq
 * @property string $the_geom
 */
class ServiceArea extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServiceArea the static model class
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
		return 'service_areas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area_mq', 'numerical'),
			array('area, desc_area', 'length', 'max'=>254),
			array('virtuale, the_geom', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, area, desc_area, virtuale, area_mq, the_geom', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'operative_margin'=>array(self::HAS_MANY, 'SAOperativeMargin', array('area'=>'area')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'area' => 'Area',
			'desc_area' => 'Desc Area',
			'virtuale' => 'Virtuale',
			'area_mq' => 'Area Mq',
			'the_geom' => 'The Geom',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('gid',$this->gid);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('desc_area',$this->desc_area,true);
		$criteria->compare('virtuale',$this->virtuale);
		$criteria->compare('area_mq',$this->area_mq);
		$criteria->compare('the_geom',$this->the_geom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
