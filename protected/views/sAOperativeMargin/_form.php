<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'saoperative-margin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'margin'); ?>
		<?php echo $form->textField($model,'margin'); ?>
		<?php echo $form->error($model,'margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scenario'); ?>
		<?php echo $form->textField($model,'scenario'); ?>
		<?php echo $form->error($model,'scenario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->