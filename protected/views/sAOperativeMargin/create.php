<?php
$this->breadcrumbs=array(
	'Saoperative Margins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('operativemargin','List SAOperativeMargin'), 'url'=>array('index')),
	array('label'=>Yii::t('operativemargin','Manage SAOperativeMargin'), 'url'=>array('admin')),
);
?>

<h1>Create SAOperativeMargin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>