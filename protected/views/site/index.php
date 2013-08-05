<?php $this->pageTitle=Yii::app()->name; ?>

<?php if(Yii::app()->user->isPlanner): ?>
<!-- Planner -->
<?php echo Yii::t(
                    'site',
                    'planner_intro',
                    array(
                        '{imgurl}' => Yii::app()->request->baseUrl.'/images/water_request.png',
                        '{link}' => CHtml::link(Yii::t('site', 'Create new water request'),CController::createUrl('waterRequests/create'))
                    )
                );
?>
<?php endif; ?>

<?php if( (Yii::app()->user->isWRUT) || (Yii::app()->user->isWRUA)): ?>
<!-- WRUT -->
<?php echo Yii::t(
                    'site',
                    'wrut_intro',
                    array(
                          '{appname}'=>CHtml::encode(Yii::app()->name),
                          '{water_image}'=> Yii::app()->request->baseUrl.'/images/water_request.png',
                          '{document_epanet_image}'=> Yii::app()->request->baseUrl.'/images/document_epanet.png',
                          '{zones_image}'=> Yii::app()->request->baseUrl.'/images/zones.png',
                          '{parameters_image}'=> Yii::app()->request->baseUrl.'/images/parameters.png',
                          '{formulas_image}'=> Yii::app()->request->baseUrl.'/images/formulas.png'
                    )
                );
?>
<?php endif; ?>

<!-- Citizen -->
<?php if(Yii::app()->user->isCitizen): ?>
<?php echo Yii::t(
                    'site',
                    'citizen_intro',
                    array(
                        '{link_send_opinion}' => CHtml::link(Yii::t('site', 'follow the link'), CController::createUrl('waterQualityOpinions/index',array())),
                        '{link_view_opinion}' => CHtml::link(Yii::t('site', 'View feedback left by other users.'), CController::createUrl('waterQualityOpinions/view',array()))
                    )
                ); ?>

<?php endif; ?>

<?php if(Yii::app()->user->isGuest): ?>
<!-- Guest -->
<?php
$imghtml=array(
                    CHtml::image('images/water_info_box.png', 'Mappa informativa'),
                    CHtml::image('images/quality_view_box.png', 'Valutazioni'),
                    CHtml::image('images/quality_create_box.png', 'Segnala')
                    );
echo Yii::t(
                    'site',
                    'guest_intro',
                    array (
                        '{appname}'=>CHtml::encode(Yii::app()->name),
                        '{link_login}' => $this->createUrl('site/login'),
                        '{link_wiz4all}' => $this->createUrl('site/page',array('view'=>'wiz4all')),
                        '{link_info_index}' => CHtml::link($imghtml[0], array('waterInfo/index'), array('title'=>Yii::t('site','Displays information layers'), 'class'=>'homepage_menu_item')),
                        '{link_quality_view}' => CHtml::link($imghtml[1], array('waterQualityOpinions/view'), array('title'=>Yii::t('site','Displays feedback'), 'class'=>'homepage_menu_item')),
                        '{link_quality_create}' => CHtml::link($imghtml[2], array('waterQualityOpinions/create'), array('title'=>Yii::t('site','Sends feedback and calls for assistance'), 'class'=>'homepage_menu_item')),
                    
                    )
                );
?>

<?php endif; ?>

<?php if(Yii::app()->user->isGuest) { /*
<p>
<!-- Per accedere al sistema, segui il link di <a href=<?php echo $this->createUrl('site/login') ?>>Login</a>. -->
</p>
*/  } else { 
		$user = Users::model()->findByPk(Yii::app()->user->id);
		if(!$user->approved) { ?>
			<div class="flash-notice">
				<?php echo Yii::t('user','Your registration has not yet been approved by the System Administrator.<br/> Your role it\'s the same of a <i>citizen</i> until the approval.'); ?>
			</div>
<?php   }
	  } ?> 