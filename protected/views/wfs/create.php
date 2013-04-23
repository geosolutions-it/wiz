<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest','Wfs')=>array('index'),
	Yii::t('waterrequest','Create Zone'),
);

$this->menu=array(
	array('label'=>Yii::t('waterrequest','List Wfs'), 'url'=>array('index')),
);
?>

<h1>Create Wfs Layer Connection</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>