<?php
$this->breadcrumbs=array(
	'Saoperative Margins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('operativemargin','List SAOperativeMargin'), 'url'=>array('index')),
	//array('label'=>'Create SAOperativeMargin', 'url'=>array('create')),
	array('label'=>Yii::t('operativemargin','View SAOperativeMargin'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('operativemargin','Manage SAOperativeMargin'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('operativemargin','Update SAOperativeMargin') .' '.$model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>