<?php
$this->breadcrumbs=array(
	'Water Supplys',
);

$this->menu=array(
	//array('label'=>'Create WaterSupply', 'url'=>array('create')),
	array('label'=>Yii::t('watersupply','Manage WaterSupply'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('watersupply','Water Supply');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
