<?php
$this->pageTitle=Yii::app()->name . ' - Contattaci';
$this->breadcrumbs=array(
	'Contattaci',
);
?>

<h1><?php echo Yii::t('contacts','Contact Us')?></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: echo Yii::t('contacts','contact_info') ?>

<?php endif; ?>