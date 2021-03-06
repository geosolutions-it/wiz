<?php

/**
 * This is the model class for table "service_areas_operative_margin".
 *
 * The followings are the available columns in table 'operative_margin':
 * @property integer $id
 * @property string $area
 * @property double $margin
 * @property string $scenario
 */
class SAOperativeMargin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SAOperativeMargin the static model class
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
		return 'service_areas_operative_margin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area, margin', 'required'),
			array('margin', 'numerical'),
			array('area', 'length', 'max'=>255),
			array('scenario', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, area, margin, scenario', 'safe', 'on'=>'search'),
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
			'city_state'=>array(self::BELONGS_TO, 'ServiceArea', array('area'=>'area')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'area' => 'Area',
			'margin' => 'Operative Margin',
			'scenario' => 'Scenario'
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
		$criteria->compare('area',$this->area,true);
		$criteria->compare('margin',$this->margin);
		$criteria->compare('scenario',$this->scenario,true);
		
		$criteria->order = "area ASC";
		

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
		return Yii::t('waterrequest', $baseLabel);
	}


    /**
     * Updates DummyServiceAreaOperativeMargin tables
     */
    public function afterSave(){
        
        // TODO:  Ciclare sulle geometrie, filtrarle in base a Phase e Status, Trovare ServiceArea o CityState relativi, calcolare OperativeMargin e SAOM
        
        return parent::afterSave();
    }


}