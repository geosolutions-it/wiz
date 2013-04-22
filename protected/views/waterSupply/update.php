<?php
$this->breadcrumbs=array(
	'Water Supplys'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('watersupply','List WaterSupply'), 'url'=>array('index')),
	//array('label'=>'Create WaterSupply', 'url'=>array('create')),
	//array('label'=>'View WaterSupply', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('watersupply','Manage WaterSupply'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('watersupply','Update WaterSupply').' '. $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>