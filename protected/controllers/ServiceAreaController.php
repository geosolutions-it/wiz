<?php

class ServiceAreaController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('query'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays Geoserver-like table.
	 * @param string $desc_macro the desc_macro of the models to be displayed
	 */
	public function actionQuery($id_area)
	{
		$connection=Yii::app()->db;
		$sql = '
		SELECT desc_area
		FROM service_areas
		WHERE area =\''.$id_area.'\' LIMIT 1;';
		$command=$connection->createCommand($sql);
		$dataReader=$command->query();
		$rows=$dataReader->readAll();
		$sa=$rows[0]['desc_area'];
		
		$model=SAOperativeMargin::model()->findAllByAttributes(
								array(),
						        $condition  = 'lower(area) = lower(:id_area)',
						        $params     = array(
						                ':id_area' => $id_area
						        		)
								);
		//echo count($model);
		if($model==null)
			throw new CHttpException(404,'The requested page does not exist.');
		echo '  <style type="text/css">
        table.featureInfo, table.featureInfo td, table.featureInfo th {
                border:1px solid #ddd;
                border-collapse:collapse;
                margin:0;
                padding:0;
                font-size: 90%;
                padding:.2em .1em;
        }
        table.featureInfo th{
            padding:.2em .2em;
                text-transform:uppercase;
                font-weight:bold;
                background:#eee;
        }
        table.featureInfo td{
                background:#fff;
        }
        table.featureInfo tr.odd td{
                background:#eee;
        }
  </style>
  		'.$sa.'
		<table class="featureInfo">
  <tr>
';
foreach ($model[0]->attributeNames() as $n)
				if($n != 'id')
					echo '<th >'.$n.'</th>';
echo '  </tr>';
$odd = false;
foreach ($model as $i)
	{
	echo $odd?'<tr class="odd">':'<tr>';
	$odd = !$odd;

	foreach ($i->attributeNames() as $n)
		if($n != 'id')
			echo '<td>'.$i->getAttribute($n).'</td>';
		echo '</tr>';
	}		
	echo '</table>';

/*
 * 		echo '<div>';
		foreach ($model as $i)
		{
			$p = 0;
			foreach ($i->attributeNames() as $n)
				//echo $i->cespite.' - '.$i->descrizione.'<br/>';
				if($n != 'id')
					echo ($p++>0?' - ':'').$i->getAttribute($n);
			echo'<br/>';
		}
		echo '</div>';
		
*/
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=SAOperativeMargin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
