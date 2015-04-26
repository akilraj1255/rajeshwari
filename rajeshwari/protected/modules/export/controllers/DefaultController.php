<?php

class DefaultController extends RController
{
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
		
	public function actionIndex()
	{
		//registering js file
		Yii::app()->clientScript->registerScriptFile(
			Yii::app()->assetManager->publish(
				Yii::getPathOfAlias('application.modules.export.assets') . '/js/jquery-ui.1.10.4.js'
			)
		);
		
		$models			= Yii::app()->controller->module->allowedModels;
		if($models==NULL){
			foreach(glob('./protected/models/*.php') as $filename){
				$modelname			= str_replace(array("./protected/models/", ".php"), "", $filename);
				$models[$modelname]['label']	= $modelname;
			}		
		}
		
		
		$modelsArray	= array();
		foreach($models as $mindex=>$smodel){
			$modelsArray[$mindex]	=	isset($smodel['label'])?$smodel['label']:$mindex;
		}
		if(isset($_POST['export-database'])){
			if(isset($_POST['reqColumns']) and count($_POST['reqColumns'])>0){
				$model	= $_POST['model'];
				$format	= 'csv';
				if(in_array($model, array_keys($modelsArray))){
					$export	=	new Export;
					if(!$export->exportdb($format, $model, $_POST['reqColumns']))
						$this->redirect(array('index'));
				}
				else{
					Yii::app()->user->setFlash('exporterror', 'You are not allowed to access this model !!');
					$this->redirect(array('index'));
				}
			}
			else{
				Yii::app()->user->setFlash('exporterror', 'Choose columns to export !!');
				$this->redirect(array('index'));
			}
		}		
		$this->render('index', array('modelsArray'=>$modelsArray));
	}
	
	public function actionAttributes(){
		if(Yii::app()->request->isAjaxRequest and isset($_GET['model'])){
			$model			= $_GET['model'];
			$allowedColumns	= array();
			$almodels	= Yii::app()->controller->module->allowedModels;
			
			$crmodel	= isset($almodels[$model])?$almodels[$model]:array();
			if($crmodel and isset($crmodel['allowedColumns']) and $crmodel['allowedColumns']!='all'){
				$attributes	= $crmodel['allowedColumns'];
			}
			else{
				$table		= $model::model()->tableSchema->name;
				$attributes	= Yii::app()->getDb()->getSchema()->getTable($table)->getColumnNames();					
			}
			
			foreach($attributes as $attribute){
				$allowedColumns[$attribute]	= $model::model()->getAttributeLabel($attribute);
			}
			
			echo json_encode(array('result'=>'success', 'data'=>$allowedColumns));
			Yii::app()->end();
		}
		else{
			echo json_encode(array('result'=>'failed'));
			Yii::app()->end();
		}
	}
}