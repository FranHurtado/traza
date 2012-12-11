<?php

class RecipeController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete', 'addraw', 'deleteraw'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Recipe;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Recipe']))
		{
			$model->attributes=$_POST['Recipe'];
			$model->UserID = $_POST['Recipe']['UserID'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelRaws=Raw::model()->findAll();
		$modelRecipeRaw=new RecipeRaw();
		$modelIngredients=RecipeRaw::model()->findAllByAttributes(array("RecipeID"=>$model->ID));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Recipe']))
		{
			$model->attributes=$_POST['Recipe'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'modelRaws'=>$modelRaws,
			'modelRecipeRaw'=>$modelRecipeRaw,
			'modelIngredients'=>$modelIngredients,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Recipe("search");
		//$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Recipe']))
			$model->attributes=$_GET['Recipe'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Recipe::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='recipe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionAddRaw()
	{
		Yii::app()->clientScript->registerCoreScript('jquery.ui');
		
		if(isset($_POST['rawID'])):
		
			if(!RecipeRaw::model()->findByAttributes(array("RawID"=>$_POST['rawID'], "RecipeID"=>$_POST['recipeID']))):
				$model = new RecipeRaw;
				$model->RawID = $_POST['rawID'];
				$model->RecipeID = $_POST['recipeID'];
				$model->Quantity = $_POST['quantity'];
				$model->Type = $_POST['type'];
				
				if($model->save()):
					$modelIngredients=RecipeRaw::model()->findAllByAttributes(array("RecipeID"=>$model->RecipeID));
					echo $this->renderPartial("_ingredients", array('modelIngredients'=>$modelIngredients));
				else:
					echo "<span id='error'>Error a&ntilde;adiendo el ingrediente. Vuelve a intentarlo. <span style='display:none;'>";
					echo print_r($model->Errors) ."</span></span>";
				endif;
			else:
				$modelIngredients=RecipeRaw::model()->findAllByAttributes(array("RecipeID"=>$model->RecipeID));
				echo $this->renderPartial("_ingredients", array('modelIngredients'=>$modelIngredients)); 
				echo "<span id='error'>Esta materia prima ya existe en la receta</span>";
			endif;
		
		else:
			
			echo "<span id='error'>No se ha enviado ninguna materia prima</span>";
		
		endif;
	}
	
	
	public function actionDeleteRaw()
	{	
		if(isset($_POST['ID'])):
		
			$RecipeRaw = RecipeRaw::model()->findByPK($_POST["ID"]);
			$RecipeRaw->delete();
			echo $RecipeID;
			
			$modelIngredients=RecipeRaw::model()->findAllByAttributes(array("RecipeID"=>$RecipeRaw->recipe->ID));
			
			echo $this->renderPartial("_ingredients", array('modelIngredients'=>$modelIngredients));
		
		else:
			
			echo "<span id='error'>No se ha enviado ninguna materia prima</span>";
		
		endif;
	}
}
