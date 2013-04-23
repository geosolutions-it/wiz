<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest','Wms')=>array('index'),
	Yii::t('waterrequest','Create Zone'),
);

$this->menu=array(
	array('label'=>Yii::t('waterrequest','List Wms'), 'url'=>array('index')),
);
?>

<h1>Create Wms Layer Connection</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>