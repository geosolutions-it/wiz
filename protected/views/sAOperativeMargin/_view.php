<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('city_state')); ?>:</b>
	<?php echo CHtml::encode($data->city_state->desc_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('margin')); ?>:</b>
	<?php echo CHtml::encode($data->margin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scenario')); ?>:</b>
	<?php echo CHtml::encode($data->scenario); ?>
	<br />


</div>