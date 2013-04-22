<?php

class StatisticsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index','view'
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if (!Yii::app()->user->checkAccess('viewStatistics'))
			throw new CHttpException(403,Yii::t('http_status', '403'));
		$this->render('index');
	}
	
	
	/**
	 * Displays statistics about waterrequests.
	 */
	public function actionWr()
	{
		if (!Yii::app()->user->checkAccess('viewStatistics'))
			throw new CHttpException(403,Yii::t('http_status', '403'));
		
		if (isset($_POST['city']))
			$selection = $_POST['city'];
		else 
			$selection = null; 
		$wrs = WaterRequests::model()->findAll('status!=:temp AND status!=:saved AND username!=:username ORDER BY timestamp',array(':temp'=>WaterRequests::SW_NODE(WaterRequests::TEMP_STATUS),':saved'=>WaterRequests::SW_NODE(WaterRequests::SAVED_STATUS),':username'=>'planner'));
		//$wrs = WaterRequests::model()->findAll('status!=:temp AND status!=:saved ORDER BY timestamp',array(':temp'=>WaterRequests::SW_NODE(WaterRequests::TEMP_STATUS),':saved'=>WaterRequests::SW_NODE(WaterRequests::SAVED_STATUS)));
		if ($wrs !=null) {
			$total_wrs = 0;
			$stat = array();
			$city = array();
			foreach ($wrs as $wr) {
				$city_states = $wr->cityStates;
				
				
				if ($city_states) {
					if (!isset($city[$city_states[0]])) 
						$city[$city_states[0]] = ucfirst(strtolower($city_states[0]));
					if ($selection) {
						if ($selection!==$city_states[0])
							continue;
					}
				}
				else {
					if ($selection)
						continue;
				}
				
				$y = $wr->year;
				$m = $wr->month;
				$total_wrs++;
				
				$pe = 0;
				foreach ($wr->geometries() as $geom)
					foreach ($geom->zones() as $zone)
						$pe += $zone->pe;
					
				if (isset($stat[$y])) {
					$stat[$y]['total']++;
					$stat[$y]['pe'] += $pe;
				}
				else {
					$stat[$y]['total'] = 1;
					$stat[$y]['pe'] = $pe;
				}
				
				
				if (isset($stat[$y][$m])) {
					$stat[$y][$m]['total']++;
					$stat[$y][$m]['pe'] += $pe;
				}
				else {
					$stat[$y][$m]['total']= 1;
					$stat[$y][$m]['pe']= $pe;
				}
				
				
					
					
			}
			$this->render('wr',array(
				'total_wrs'=>$total_wrs,
				'stat'=>$stat,
				'city'=>array_unique($city),
				'selection'=>$selection
			));
			Yii::app()->end();
		}
		
		$this->render('wr',array(
			'total_wrs'=>null,
		));
		
		
		
	}

	/**
	 * Displays statistics about access (awstats).
	 */
	public function actionAwstats() {
		if (!Yii::app()->user->checkAccess('viewStatistics'))
			throw new CHttpException(403,Yii::t('http_status', '403'));
		
		$this->render('awstats',array());
	}


	
	

}