<?php

class WfsController extends Controller
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
			array('allow',  // allow all users to perform 'index','view','create' and 'update' actions
				'actions'=>array('index','view','create','update'),
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Wfs('search');
		$model->unsetAttributes();  // clear any default values
	    if(isset($_GET['Wfs']))
	        $model->attributes =$_GET['Wfs'];
		
		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Wfs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->setScenario('new_wfs');
		if(isset($_POST['Wfs']))
		{
			$model->attributes=$_POST['Wfs'];
			$model->username = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('view','name'=>$model->name));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Displays a particular model.
	 * @param string $id the identifier of the model to be displayed
	 */
	public function actionView($name)
	{
		$model=$this->loadModel($name);
		$this->render('view',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the identifier of the model to be updated
	 */
	public function actionUpdate($name)
	{
		$model=$this->loadModel($name);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Wfs']))
		{
			$model->attributes=$_POST['Wfs'];
			if($model->save())
				$this->redirect(array('view','name'=>$model->name));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param string $id the identifier of the model to be loaded
	 */
	public function loadModel($name)
	{
		$model=Wfs::model()->findByPk(array('username'=>Yii::app()->user->id, 'name'=>$name));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wfs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}