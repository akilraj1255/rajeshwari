<?php
class UsersController extends RController
{
	public function filters(){
		return array(
			'rights'
		);
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionStudent()
	{
		if(isset($_POST['studentuser']))
		{
			$students = Students::model()->findAll(array('condition'=>'uid=:x and is_deleted=:y','params'=>array(':x'=>0,':y'=>0),'limit'=>'1000','order'=>'id ASC'));
			if($students!=NULL)
			{
				 foreach($students as $student)
				 {
					
					    $user=new User;
		        		$profile=new Profile;
						if($student->email!=NULL)
						{
							$user->username = substr(md5(uniqid(mt_rand(), true)), 0, 10);
					   		 $user->email = $student->email;
				       		 $user->activkey=UserModule::encrypting(microtime().$student->first_name);
					   		 $password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
							$user->password=UserModule::encrypting($password);
							$user->superuser=0;
							$user->status=1;
								if($user->save())
								{
						
									//assign role
									$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
                       	 			$authorizer->authManager->assign('student', $user->id); 
						
									//profile
									$profile->firstname = $student->first_name;
									$profile->lastname = $student->last_name;
									$profile->user_id=$user->id;
									$profile->save();
						
									//saving user id to students table.
									$student->saveAttributes(array('uid'=>$user->id));
						
							
						
						
						UserModule::sendMail($student->email,UserModule::t("You are registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please login to your account with your email id as username and password {password}",array('{password}'=>$password)));
							$flash	=	"User created successfully";
							$type	=	'success';
							}
						}
						else
						{
							$flash	=	"No email id given";
							$type	=	'error';
						}
				 }
			}
			Yii::app()->user->setFlash($type,$flash);
			$this->redirect(array('/importcsv'));
			 
		}
		else
		{
			$this->render('/default/student');
		}
	}
	public function actionParent()
	{
		
		if(isset($_POST['parentuser']))
		{
			$parents = Guardians::model()->findAll(array('condition'=>'uid=:x','params'=>array(':x'=>0),'limit'=>'1000','order'=>'id ASC'));
			if($parents!=NULL)
			{
				 foreach($parents as $parent)
				 {
					    $user=new User;
		        		$profile=new Profile;
						if($parent->email!=NULL)
						{
								//adding user for current guardian
							$user=new User;
							$profile=new Profile;
							$user->username = substr(md5(uniqid(mt_rand(), true)), 0, 10);
							$user->email = $parent->email;
							$user->activkey=UserModule::encrypting(microtime().$parent->first_name);
							$password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
							$user->password=UserModule::encrypting($password);
							$user->superuser=0;
							$user->status=1;
						
							if($user->save())
							{
						
								//assign role
								$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
								$authorizer->authManager->assign('parent', $user->id);
					
								//profile
								$profile->firstname = $parent->first_name;
								$profile->lastname = $parent->last_name;
								$profile->user_id=$user->id;
								$profile->save();
					
								//saving user id to guardian table.
								$parent->saveAttributes(array('uid'=>$user->id));
					
					
					
					UserModule::sendMail($parent->email,UserModule::t("You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please login to your account with your email id as username and password {password}",array('{password}'=>$password)));	$flash	=	"User created successfully";
							$type	=	'success';
							}
						}
						else
						{
							$flash	=	"No email id given";
							$type	=	'error';
						}
				 }
			}
			Yii::app()->user->setFlash($type,$flash);
			 $this->redirect(array('/importcsv'));
		}
		else
		{
			$this->render('/default/parent');
		}
		
		
	}
	public function actionEmployee()
	{
		if(isset($_POST['employeeuser']))
		{
			$employees = Employees::model()->findAll(array('condition'=>'uid=:x and is_deleted=:y','params'=>array(':x'=>0,':y'=>0),'limit'=>'1000','order'=>'id ASC'));
			if($employees!=NULL)
			{
				 foreach($employees as $employee)
				 {
					    $user=new User;
		        		$profile=new Profile;
						if($employee->email!=NULL)
						{
							//adding user for current student
						$user=new User;
						$profile=new Profile;
				 	    $user->username = substr(md5(uniqid(mt_rand(), true)), 0, 10);
					    $user->email = $employee->email;
				        $user->activkey=UserModule::encrypting(microtime().$employee->first_name);
						$password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
						$user->password=UserModule::encrypting($password);
						$user->superuser=0;
						$user->status=1;
						
						if($user->save())
						{
							//assign role
							$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
							$authorizer->authManager->assign('teacher', $user->id); 
							
							//profile
							$profile->firstname = $employee->first_name;
							$profile->lastname = $employee->last_name;
							$profile->user_id=$user->id;
							$profile->save();
							
							//saving user id to students table.
							$employee->saveAttributes(array('uid'=>$user->id));
						
							
							
							UserModule::sendMail($employee->email,UserModule::t("You are registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please login to your account with your email id as username and password {password}",array('{password}'=>$password)));	$flash	=	"User created successfully";
							$type	=	'success';
							}
						}
						else
						{
							$flash	=	"No email id given";
							$type	=	'error';
						}
				 }
			}
			Yii::app()->user->setFlash($type,$flash);
			$this->redirect(array('/importcsv'));
			 
		}
		else
		{
			$this->render('/default/employee');
		}
		
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}