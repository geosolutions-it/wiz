<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest', 'Water Requests')=>array('index'),
	Yii::t('waterrequest', 'Choose Phase'),
);

/*
$this->menu=array(
	array('label'=>'Create WaterRequest Phase 1', 'url'=>array('create', 'phase'=>1)),
	array('label'=>'Create WaterRequest Phase 2', 'url'=>array('create', 'phase'=>2)),
);
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
*/
?>

<a class="div_link" href="<?php echo CController::createUrl('waterRequests/create',array('phase'=>1))?>">
<div id="phase_one" >
	<h3><?php echo Yii::t('waterrequest', 'Preliminary Phase'); ?></h3>
	<?php echo Yii::t('waterrequest', 'phase_1_info'); ?>
</div>
</a>

<br/>

<a class="div_link" href="javascript:void(0);" onclick="$('#parent_wr_phase_one').show()">
	<div id="phase_two" >
		<h3><?php  echo Yii::t('waterrequest', 'Implementation Phase');?></h3>
		<?php echo Yii::t('waterrequest', 'phase_2_info'); ?>
	</div>
</a>
	<div id="parent_wr_phase_one" style="display:none;">
		<?php
			if ($dataProvider_phase_two) {
				
				$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'parent-wr1-grid',
					'dataProvider'=>$dataProvider_phase_two,
					
					'columns'=>array(
						'id',
						'project',
						'timestampHR',
						array(
							'name'=>'rounded_water_demand',
							'value'=>'$data->rounded_water_demand." ".Yii::app()->params[\'water_demand_unit\']'
						),
						array(
	     					'name'=>'',
	     					'type'=>'raw',
	     					'value' => 'CHtml::link(Yii::t(\'waterrequest\', \'select\'),Yii::app()->urlManager->createUrl("waterRequests/create",array("phase"=>2,"parent"=>$data->id)))'
	    				)
					)
				));
			};
			echo CHtml::link(Yii::t('waterrequest', 'Create New Water Request'),CController::createUrl('waterRequests/create',array('phase'=>2)));		
		?>
	</div>


<br/>

<a class="div_link" href="javascript:void(0);" onclick="$('#parent_wr_phase_two').show()">
	<div id="phase_three">
		<h3><?php  echo Yii::t('waterrequest', 'Executive Phase');?></h3>
        <?php echo Yii::t('waterrequest', 'phase_3_info'); ?>
	</div>	
</a>
	<div id="parent_wr_phase_two" style="display:none;">
		<?php
			if ($dataProvider_phase_three) {
				
				$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'parent-wr2-grid',
					'dataProvider'=>$dataProvider_phase_three,
					
					'columns'=>array(
						'id',
						'project',
						'timestampHR',
						array(
							'name'=>'rounded_water_demand',
							'value'=>'$data->rounded_water_demand." ".Yii::app()->params[\'water_demand_unit\']'
						),
						array(
	     					'name'=>'',
	     					'type'=>'raw',
	     					'value' => 'CHtml::link(Yii::t(\'waterrequest\', \'select\'),Yii::app()->urlManager->createUrl("waterRequests/create",array("phase"=>3,"parent"=>$data->id)))'
	    				)
					)
				));
			};
			echo CHtml::link(Yii::t('waterrequest', 'Create New Water Request'),CController::createUrl('waterRequests/create',array('phase'=>3)));		
		?>
	</div>




