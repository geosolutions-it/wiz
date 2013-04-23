<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest','Wms')=>array('index'),
	$model->name=>array('view','name'=>$model->name),
	Yii::t('waterrequest','Edit Wms'),
);

$this->menu=array(
	array('label'=>Yii::t('waterrequest','List Wms'), 'url'=>array('index')),
	array('label'=>Yii::t('waterrequest','Create Wms'), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('waterrequest','Edit Wms')." ".$model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>