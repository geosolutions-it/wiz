<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->name)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typename')); ?>:</b>
	<?php echo CHtml::encode($data->typename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typenameurl')); ?>:</b>
	<?php echo CHtml::encode($data->typenameurl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('projection')); ?>:</b>
	<?php echo CHtml::encode($data->projection); ?>
	<br />

</div>