<?php

/**
 * This is the model class for table "wms_personali".
 *
 * The followings are the available columns in table 'zones'
 * @property string $username the owner
 * @property string $name the wms identifier
 * @property string $title the description of wms 
 * @property string $url
 * @property int $projection 
 */
class Wms extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return Zones the static model class
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
		return 'wms_personali';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(

			//primary key
			//array('username'),
			//array('name'),
					
			//max_length
			array('name,username', 'length', 'max'=>255),
			array('title,url', 'length', 'max'=>500),
			
			//required
			array('name, username, projection, url', 'required'),
			
			//safe
			//array('active, searchable', 'safe'),
			
			//The following rule is used by search().
			array('name, projection, username, title, url', 'safe', 'on'=>'search'),
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
			'username'=>'Username',
			'name' => 'Name',
			'projection' => 'Projection',
			'title' => 'Title',
			'url' => 'Url',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
	    $criteria=new CDbCriteria;
		
		$criteria->compare('name',$this->name,true);
		$criteria->compare('projection',$this->projection,true);
		$criteria->compare('username',Yii::app()->user->id);
		$criteria->compare('title',$this->title);
		$criteria->compare('url',$this->url);
	    return new CActiveDataProvider(get_class($this), array(
	        'criteria'=> $criteria,
	        'sort'=>array(
	            'defaultOrder'=>'name ASC',
	        ),
	        'pagination'=>array(
	            'pageSize'=>10
	        ),
	    ));
	}
	

	public static function getLayers()
	{
		$layers = Wms::model()->findAllByAttributes(
				array(
						'username'=>Yii::app()->user->id,
				));
		$return = array();
		foreach($layers as $i => $l)
			$return[]=array(
					'name'=>$l->name,
					'title'=>$l->title,
					'url'=>$l->url,
					'projection'=>$l->projection,
			);
		return $return;
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
	
	
}

?>