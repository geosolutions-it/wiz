<?php
$this->breadcrumbs=array(
	'Saoperative Margins',
);

$this->menu=array(
	array('label'=>Yii::t('operativemargin','Create SAOperativeMargin'), 'url'=>array('create')),
	array('label'=>Yii::t('operativemargin','Manage SAOperativeMargin'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('operativemargin','Saoperative Margins'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
