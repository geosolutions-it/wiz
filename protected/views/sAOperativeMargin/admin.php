<?php
$this->breadcrumbs=array(
	'Saoperative Margins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('operativemargin','List SAOperativeMargin'), 'url'=>array('index')),
	//array('label'=>'Create SAOperativeMargin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('saoperative-margin-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('operativemargin','Manage SAOperativeMargin')?></h1>

<p>

<?php echo Yii::t('operativemargin','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?>

</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'saoperative-margin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'area',
		array(
					'header'=>Yii::t('waterrequest', 'City State'),
					'name'=>'area',
					'filter' => CHtml::listData(ServiceArea::model()->findAll(), 'area', 'desc_area'),
					'value'=>'$data->city_state->desc_area'
/*
						'name'=>'city_state',            
            'value'=>'$data->city_state->desc_area'
*/
					),
		'margin',
		'scenario',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
