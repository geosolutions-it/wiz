<div class="wide form">

<?php $form=$this->beginWidget('UniActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projection'); ?>
		<?php echo $form->textField($model,'projection',array('size'=>40,'maxlength'=>10)); ?>
	</div>

	<div class="advanced_search">
		<?php echo CHtml::submitButton(Yii::t('waterrequest', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->