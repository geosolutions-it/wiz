<?php
$this->breadcrumbs=array(
	'Saoperative Margins'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('operativemargin','List SAOperativeMargin'), 'url'=>array('index')),
	//array('label'=>'Create SAOperativeMargin', 'url'=>array('create')),
	array('label'=>Yii::t('operativemargin','Update SAOperativeMargin'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('operativemargin','Delete SAOperativeMargin'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('operativemargin','Manage SAOperativeMargin'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('operativemargin','View SAOperativeMargin'). ' #'.$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'area',
		array(               
            'label'=>$model->getAttributeLabel('city_state'),
            'value'=>$model->city_state->desc_area
         ),
		'margin',
		'scenario',
	),
)); ?>
