<?php

/**
 * This is the model class for table "water_fault_opinions".
 *
 * The followings are the available columns in table 'water_fault_opinions':
 * @property int $id the progressive opinion 
 * @property datetime $timestamp the date of registration of the view expressed by the user
 * @property geometric $geom the geometry of the point indicated on the map
 * @property int $fault the fault identifier of water network
 * @property string $username
 */
class WaterFaultOpinions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WaterFaultOpinions the static model class
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
		return 'water_fault_opinions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(

			//primary key
			array('id','unique'),
			
			//required
			array('geom,fault', 'required'),
			
			//max_length
			array('username','length','max'=>255),
			
			//safe
			array('geom','safe'),
			
			//The following rule is used by search().
			array('id,timestamp,geom,fault', 'safe', 'on'=>'search'),
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
			'fault_def'=>array(self::BELONGS_TO,'WaterFaults',array('quality'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'timestamp' => Yii::t('citizen','Date & Time'),
			'geom' => Yii::t('citizen','Geometry'),
			'fault' => Yii::t('citizen','Fault'),
			'username' => Yii::t('citizen','Username'),
			'fault_def.fault' => Yii::t('citizen','Fault Description')
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('geom',$this->geom,true);
		$criteria->compare('fault',$this->fault,true);
		$criteria->compare('username',$this->username,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
	            'defaultOrder'=>'timestamp DESC',
	        ),
		));
	}
}