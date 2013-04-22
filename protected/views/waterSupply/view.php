<?php
$this->breadcrumbs=array(
	'Water Supplys'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('watersupply','List WaterSupply'), 'url'=>array('index')),
	//array('label'=>'Create WaterSupply', 'url'=>array('create')),
	array('label'=>Yii::t('watersupply','Update WaterSupply'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('watersupply','Delete WaterSupply'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('watersupply','Manage WaterSupply'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('watersupply','View Water Supply').' #'. $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'city_state',
		'daily_maximum_water_supply',
		'yearly_average_water_supply',
	),
)); ?>
