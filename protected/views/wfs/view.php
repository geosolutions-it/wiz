<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest','Wfs')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('waterrequest','List Wfs'), 'url'=>array('index')),
	array('label'=>Yii::t('waterrequest','Create Wfs'), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('waterrequest','View Wfs'); ?> #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'title',
		'url',
		'projection',
	),
)); ?>