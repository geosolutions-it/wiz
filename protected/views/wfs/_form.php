<div class="form">

<?php $form=$this->beginWidget('UniActiveForm', array(
	'id'=>'wfs-form',
	'enableAjaxValidation'=>false,
	'focus'=>($model->hasErrors()) ? '.error:first' : array($model, 'name')
)); ?>

	<p class="note"><?php  echo Yii::t('form', 'Fields with ');?><span class="required">*</span><?php  echo Yii::t('form', ' are required.');?></p>
	
	<div class="jFormComponent" id="name">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="jFormComponent" id="title">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div id="title_error"></div>
	
	<div class="jFormComponent" id="typename">
		<?php echo $form->labelEx($model,'typename'); ?>
		<?php echo $form->textField($model,'typename',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'typename'); ?>
	</div>
	<div id="typename_error"></div>
	
	<div class="jFormComponent" id="typenameurl">
		<?php echo $form->labelEx($model,'typenameurl'); ?>
		<?php echo $form->textField($model,'typenameurl',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'typenameurl'); ?>
	</div>
	<div id="typenameurl_error"></div>
	
	<div class="jFormComponent" id="url">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	<div id="url_error"></div>
		
	<div class="jFormComponent" id="projection">
		<?php echo $form->labelEx($model,'projection'); ?>
		<?php echo $form->textField($model,'projection',array('size'=>60,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'projection'); ?>
	</div>
	<div id="projection_error"></div>
	
	
	<div class="jFormComponent button">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->