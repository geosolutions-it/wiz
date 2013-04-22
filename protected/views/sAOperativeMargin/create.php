<?php
$this->breadcrumbs=array(
	'Saoperative Margins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SAOperativeMargin', 'url'=>array('index')),
	array('label'=>'Manage SAOperativeMargin', 'url'=>array('admin')),
);
?>

<h1>Create SAOperativeMargin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>