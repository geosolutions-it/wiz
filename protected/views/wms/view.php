<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest','Wms')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('waterrequest','List Wms'), 'url'=>array('index')),
	array('label'=>Yii::t('waterrequest','Create Wms'), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('waterrequest','View Wms'); ?> #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'title',
		'url',
		'projection',
	),
)); ?>