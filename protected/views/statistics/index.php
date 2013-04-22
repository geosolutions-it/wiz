<?php
$this->breadcrumbs=array(
	Yii::t('statistics', 'Statistics'),
);

$this->menu=array(
	
);
?>

<h1><?php  echo Yii::t('statistics', 'Statistics');?></h1>

<p>
	<?php  echo CHtml::link(Yii::t('statistics', 'View WaterRequest Statistics'),array('wr'));?>
	<br/><br/>
	<?php  echo CHtml::link(Yii::t('statistics', 'View access Statistics'),array('awstats'));?>
</p>

