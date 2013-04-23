<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest','Wfs')=>array('index'),
	$model->name=>array('view','name'=>$model->name),
	Yii::t('waterrequest','Edit Wfs'),
);

$this->menu=array(
	array('label'=>Yii::t('waterrequest','List Wfs'), 'url'=>array('index')),
	array('label'=>Yii::t('waterrequest','Create Wfs'), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('waterrequest','Edit Wfs')." ".$model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>