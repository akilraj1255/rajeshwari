<?php

class SettingsController extends RController
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
			'rights', // perform access control for CRUD operations
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
				'actions'=>array('index','view','settings','remind'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new Settings;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			$model->attributes=$_POST['Settings'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			$model->attributes=$_POST['Settings'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new BorrowBook;
		
		$dataProvider=new CActiveDataProvider('Settings');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,'model'=>$model,
		));
	}
	public function actionSettings()
	{
		$model=new BorrowBook;
		$this->render('settings',array('model'=>$model));
	}
	public function actionRemind()
	{
		$model=new BorrowBook;
		$id=$_REQUEST['id'];
		$headers='';
		$loggeduser=User::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$student=Students::model()->findByAttributes(array('id'=>$id));
		$to      = $student->email;
		$subject = 'Renewal of book';
		$message = 'Your due date will expire within'.$_REQUEST['due'] .'days. To avoid fine please renew your book';
		$headers .= "From:".$loggeduser->email."\r\n";
		$headers .= "X-Sender-IP: $_SERVER[SERVER_ADDR]\r\n";
		$headers .= 'Date: '.date('n/d/Y g:i A')."\r\n";
            
   		
		mail($to, $subject, $message, $headers);
		$this->render('settings',array('model'=>$model));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Settings('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Settings']))
			$model->attributes=$_GET['Settings'];

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
		$model=Settings::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='settings-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSendsms(){
		$sms_settings=SmsSettings::model()->findAll();
		if($sms_settings[0]->is_enabled=='1' and $sms_settings[8]->is_enabled=='1'){ // Checking if SMS is enabled.
			/*echo "Due Date ID: ".$_REQUEST['due_date_id']."<br/>";
			echo "Target Date: ".$_REQUEST['target_date']."<br/>";*/
			$message_status = $_REQUEST['due_date_id'];
			// Customising the list according to the due date
			if($_REQUEST['due_date_id']==0){ 
				$borrowbook=BorrowBook::model()->findAll('status=:x',array(':x'=>'C'));
			}
			elseif($_REQUEST['due_date_id']==-1){
				$borrowbook=BorrowBook::model()->findAll('due_date < CURRENT_DATE() AND status=:y',array(':y'=>'C'));
			}
			else{
				// Setting the ID for redirecting
				if($_REQUEST['due_date_id']==5){
					$_REQUEST['due_date_id'] = 2;
				}
				elseif($_REQUEST['due_date_id']==10){
					$_REQUEST['due_date_id'] = 3;
				}
				$borrowbook=BorrowBook::model()->findAll('due_date=:x AND status=:y',array(':x'=>$_REQUEST['target_date'],':y'=>'C'));
			}
			
			foreach($borrowbook as $book){ // For each book
				$bookdetails=Book::model()->findByAttributes(array('id'=>$book->book_id));
				$student=Students::model()->findByAttributes(array('id'=>$book->student_id));
				//echo $student->first_name."<br/>";
				$to = '';
				$message = '';
				if($student->phone1){ // Checking if phone number is provided
					$to = $student->phone1;	
				}
				elseif($student->phone2){
					$to = $student->phone2;
				}
				if($to!=''){ // If phone number is provided, send SMS
					$college=Configurations::model()->findByPk(1);
					$from = $college->config_value;
					// Customising messages
					if($message_status==0 or $message_status==5 or $message_status==10){
						$message = 'Due date for returning the book "'.$bookdetails->title.'" : '.$book->due_date;
					}
					elseif($message_status==-1){
						$message = 'Due date for returning the book "'.$bookdetails->title.'" was '.$book->due_date;
					}
					elseif($message_status==1){
						$message = 'Due date for returning the book "'.$bookdetails->title.'" is '.$book->due_date.'. Please return or renew the book by tomorrow.';
					}
					//echo $message."<br/><br/>";
					if($message!=''){ // Send SMS if message is set
						// SmsSettings::model()->sendSms($to,$from,$message);
						Yii::app()->user->setFlash('notification','Library SMS is disabled!');
					}
				} // End check phone number
			} // End for each book 
		} // End check whether SMS is enabled
		$this->redirect(array('settings','id'=>$_REQUEST['due_date_id']));
	} // End send SMS function
}
