<?php

/**
 * This is the model class for table "water_supply".
 *
 * The followings are the available columns in table 'water_supply':
 * @property integer $id
 * @property string $city_state
 * @property double $daily_maximum_water_supply
 * @property double $yearly_average_water_supply
 */
class WaterSupply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WaterSupply the static model class
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
		$defaultTblName = 'water_supply';
		if (Yii::app()->user->isDeveloper) {
			$username = Yii::app()->user->id;
			$connection=Yii::app()->db;
			$tablename = $username.'_'.$defaultTblName;
			
			$sql_check = 'select * from information_schema.tables where table_name=\''.$tablename.'\';';
			$ret = $connection->createCommand($sql_check)->query();
			$rows=$ret->readAll();
			if(!count($rows)) {
				$sql_struct = 'CREATE TABLE '.$tablename.' ( LIKE '.$defaultTblName.' INCLUDING DEFAULTS INCLUDING CONSTRAINTS INCLUDING INDEXES );';
				$connection->createCommand($sql_struct)->execute();
				$sql_content = 'INSERT INTO '.$tablename.' SELECT * FROM '.$defaultTblName.';';
				$connection->createCommand($sql_content)->execute();
			}			
			return $tablename;
		}
		else
			return $defaultTblName;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_state, daily_maximum_water_supply, yearly_average_water_supply', 'required'),
			array('daily_maximum_water_supply, yearly_average_water_supply', 'numerical'),
			array('city_state', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, city_state, daily_maximum_water_supply, yearly_average_water_supply', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_state' => 'City State',
			'daily_maximum_water_supply' => 'Daily Maximum Water Supply',
			'yearly_average_water_supply' => 'Yearly Average Water Supply',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('city_state',$this->city_state,true);
		$criteria->compare('daily_maximum_water_supply',$this->daily_maximum_water_supply);
		$criteria->compare('yearly_average_water_supply',$this->yearly_average_water_supply);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * This function internationalize the labels using Yii::t()
	 * @see CActiveRecord::getAttributeLabel()
	 */
	public function getAttributeLabel($attribute)
	{
		$baseLabel = parent::getAttributeLabel($attribute);
		return Yii::t('watersupply', $baseLabel);
	}
}