<?php

class DefaultController extends RController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
	public function actionProfile()
	{
		$this->render('profile');
	}
	public function actionAttendance()
	{
		$this->render('attendance/attendance');
	}
	public function actionEventlist()
	{
		$this->render('eventlist');
	}
	public function actionEmployeeAttendance()
	{
		$this->render('attendance/empattendance');
	}
	public function actionView()
	{
		
		$this->renderPartial('view',array('event_id'=>$_REQUEST['event_id']),false,true);
	}
	public function actionStudentAttendance()
	{
		$this->render('attendance/studattendance');
	}
	public function actionTimetable()
	{
		$this->render('timetable/timetable');
	}
	public function actionEmployeeTimetable()
	{
		$this->render('timetable/emptimetable');
	}
	public function actionStudentTimetable()
	{
		$this->render('timetable/studtimetable');
	}
	public function actionExamination()
	{
		$this->render('examination/examination');
	}
	public function actionAllExam()
	{
		$this->render('examination/examination');
	}
	public function actionClassExam()
	{
		$this->render('examination/examination');
	}

	/* --------Attendance------- */
	public function actionAddnew() 
	{
		$model=new StudentAttentance;
        // Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
        $flag=true;
        if(isset($_POST['StudentAttentance']))
		{       
			$flag=false;
			$model->attributes=$_POST['StudentAttentance'];
			if($model->save()) 
			{
				$student = Students::model()->findByAttributes(array('id'=>$model->student_id));
				$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
				if($settings!=NULL)
				{	
					$date=date($settings->displaydate,strtotime($model->date));
				}
				
				//Adding activity to feed via saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
				ActivityFeed::model()->saveFeed(Yii::app()->user->Id,'8',$model->student_id,ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name),$date,NULL,NULL);
			}
         }
		if($flag) 
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$this->renderPartial('attendance/create',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
		}
	}
	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-attentance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionEditLeave()
	{
		
		$model=StudentAttentance::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		// Ajax Validation enabled
		//$this->performAjaxValidation($model);
		// Flag to know if we will render the form or try to add 
		// new jon.
		$flag=true;
		if(isset($_POST['StudentAttentance']))
		{  
			$old_model = $model->attributes;      
			$flag=false;
			$model->attributes=$_POST['StudentAttentance'];
			  
			if($model->save()) 
			{
				
				$student = Students::model()->findByAttributes(array('id'=>$model->student_id));
				$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
				if($settings!=NULL)
				{	$date=date($settings->displaydate,strtotime($model->date));
			
				}
				
				
				// Saving to activity feed
				$results = array_diff_assoc($_POST['StudentAttentance'],$old_model); // To get the fields that are modified.
				//print_r($old_model);echo '<br/><br/>';print_r($_POST['Students']);echo '<br/><br/>';print_r($results);echo '<br/><br/>'.count($results);echo '<br/><br/>';
				foreach($results as $key => $value)
				{
					if($key != 'date')
					{
						//Adding activity to feed via saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
						ActivityFeed::model()->saveFeed(Yii::app()->user->Id,'9',$model->student_id,ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name),$model->getAttributeLabel($key),$date,$value);
					}
					
				}	
				//END saving to activity feed	

			
			}
		}
		// var_dump($model->geterrors());
		if($flag) 
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		  
		   
			$this->renderPartial('attendance/update',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
		}
	}
	
	public function actionDeleteLeave()
	{
		$flag=true;
		$model=StudentAttentance::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		if($model->delete())
		{
			$flag=false;
			$student = Students::model()->findByAttributes(array('id'=>$model->student_id));
			$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
			if($settings!=NULL)
			{	
				$date=date($settings->displaydate,strtotime($model->date));
			}
		
		//Adding activity to feed via saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
		ActivityFeed::model()->saveFeed(Yii::app()->user->Id,'10',$model->student_id,ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name),$date,NULL,NULL);
		}
		
		 if($flag) {
                   
				Yii::app()->clientScript->scriptMap['jquery.js'] = false;
				$this->renderPartial('update',array('model'=>$model,'day'=>$_GET['day'],'month'=>$_GET['month'],'year'=>$_GET['year'],'emp_id'=>$_GET['emp_id']),false,true);
					
		}			  
	
	}
	
	/* --------Attendance End------- */
	
	/*--------- Scores ------------*/
	
	public function actionAddscores()
	{
		
		$model=new ExamScores;

		if(isset($_POST['ExamScores']))
		{
			
			$list = $_POST['ExamScores'];
			$count = count($list['student_id']);
			
			for($i=0;$i<$count;$i++)
			{
				if($list['marks'][$i]!=NULL or $list['remarks'][$i]!=NULL)
				{
					$exam=Exams::model()->findByAttributes(array('id'=>$list['exam_id']));
					$model=new ExamScores;
						
					$model->exam_id = $list['exam_id']; 
					$model->student_id = $list['student_id'][$i];
					$model->marks = $list['marks'][$i];
					$model->remarks = $list['remarks'][$i];
					$model->grading_level_id = $list['grading_level_id'];
				
					if(($list['marks'][$i])< ($exam->minimum_marks)) 
					{
						$model->is_failed = 1;
					}
					else 
					{
						$model->is_failed = '';
					}
					$model->created_at = $list['created_at'];
					$model->updated_at = $list['updated_at'];
					//$model->save();
					if($model->save())
					{
						$student = Students::model()->findByAttributes(array('id'=>$model->student_id));
						$student_name = ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name);
						$subject_name = Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
						if($subject_name!=NULL)
						{
							$examgroup = ExamGroups::model()->findByAttributes(array('id'=>$exam->exam_group_id));
							$batch = Batches::model()->findByAttributes(array('id'=>$examgroup->batch_id));
							$exam = ucfirst($subject_name->name).' - '.ucfirst($examgroup->name).' ('.ucfirst($batch->name).'-'.ucfirst($batch->course123->course_name).')';
							$goal_name = $student_name.' for the exam '.$exam;
						}
						else
						{
							$goal_name = $student_name;
						}
						
						
						
						//Adding activity to feed via saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
						ActivityFeed::model()->saveFeed(Yii::app()->user->Id,'20',$model->id,$goal_name,NULL,NULL,NULL); 
					}
				}
			}
				
				if($_REQUEST['allexam']==1){
					$url = 'default/allexam';
				}
				else{
					$url = 'default/classexam';
				}
				$this->redirect(array($url,'bid'=>$_REQUEST['bid'],'exam_group_id'=>$_REQUEST['exam_group_id'],'r_flag'=>$_REQUEST['r_flag'],'exam_id'=>$_REQUEST['exam_id']));
		   }
			
		$this->render('examination',array(
			'model'=>$model,
		));
	
	}
	
	public function actionDeleteall()
	{
		
		$delete = ExamScores::model()->findAllByAttributes(array('exam_id'=>$_REQUEST['exam_id']));
		foreach($delete as $delete1)
		{
			$delete1->delete();
		}
		
		if($_REQUEST['allexam']==1){
					$url = 'default/allexam';
		}
		else{
			$url = 'default/classexam';
		}
			$this->redirect(array($url,'bid'=>$_REQUEST['bid'],'exam_group_id'=>$_REQUEST['exam_group_id'],'r_flag'=>$_REQUEST['r_flag'],'exam_id'=>$_REQUEST['exam_id']));
		
	}
	
	public function actionDelete($id)
	{
		$delete = ExamScores::model()->findByAttributes(array('id'=>$id));
		
		
		//$model = ExamScores::model()->findByAttributes(array('id'=>$id));
			
		$student = Students::model()->findByAttributes(array('id'=>$delete->student_id));
		$student_name = ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name);
		
		$exam = Exams::model()->findByAttributes(array('id'=>$delete->exam_id));
		$subject_name = Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
		$examgroup = ExamGroups::model()->findByAttributes(array('id'=>$exam->exam_group_id));
		$batch = Batches::model()->findByAttributes(array('id'=>$examgroup->batch_id));
		$exam_name = ucfirst($subject_name->name).' - '.ucfirst($examgroup->name).' ('.ucfirst($batch->name).'-'.ucfirst($batch->course123->course_name).')';
		$goal_name = $student_name.' for the exam '.$exam_name;
		
		$delete->delete();
		
		//Adding activity to feed via saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
		ActivityFeed::model()->saveFeed(Yii::app()->user->Id,'22',$delete->id,$goal_name,NULL,NULL,NULL); 
		
		
		
		
		
		
		if($_REQUEST['allexam']==1){
			$url = 'default/allexam';
		}
		else{
			$url = 'default/classexam';
		}
		$this->redirect(array($url,'bid'=>$_REQUEST['bid'],'exam_group_id'=>$_REQUEST['exam_group_id'],'r_flag'=>$_REQUEST['r_flag'],'exam_id'=>$_REQUEST['exam_id']));
		
	}
	
	public function actionUpdate($id)
	{
		
		$model=ExamScores::model()->findByAttributes(array('id'=>$id));
		$old_model = $model->attributes; // For activity feed	

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['ExamScores']))
		{
			$model->attributes=$_POST['ExamScores'];
			$exam=Exams::model()->findByAttributes(array('id'=>$_REQUEST['exam_id']));
			if($model->marks < $exam->minimum_marks){
				$model->is_failed = 1;
			}
			else 
			{
					$model->is_failed = '';
			}
			if($model->save())
			{
				// Saving to activity feed
				$results = array_diff_assoc($model->attributes,$old_model); // To get the fields that are modified. 
				foreach($results as $key => $value)
				{
					if($key!='updated_at')
					{
						$student = Students::model()->findByAttributes(array('id'=>$model->student_id));
						$student_name = ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name);
						
						$subject_name = Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
						$examgroup = ExamGroups::model()->findByAttributes(array('id'=>$exam->exam_group_id));
						$batch = Batches::model()->findByAttributes(array('id'=>$examgroup->batch_id));
						$exam_name = ucfirst($subject_name->name).' - '.ucfirst($examgroup->name).' ('.ucfirst($batch->name).'-'.ucfirst($batch->course123->course_name).')';
						$goal_name = $student_name.' for the exam '.$exam_name;
						
						if($key=='is_failed')
						{
							if($value == 1)
							{
								$value = 'Fail';
							}
							else
							{
								$value = 'Pass';
							}
							
							if($old_model[$key] == 1)
							{
								$old_model[$key] = 'Fail';
							}
							else
							{
								$old_model[$key] = 'Pass';
							}
						}
						
						//Adding activity to feed via saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
						ActivityFeed::model()->saveFeed(Yii::app()->user->Id,'21',$model->id,$goal_name,$model->getAttributeLabel($key),$old_model[$key],$value); 
					}
				}
				//END saving to activity feed
				
				if($_REQUEST['allexam']==1){
					$url = 'default/allexam';
				}
				else{
					$url = 'default/classexam';
				}
				
				$this->redirect(array($url,'bid'=>$_REQUEST['bid'],'exam_group_id'=>$_REQUEST['exam_group_id'],'r_flag'=>$_REQUEST['r_flag'],'exam_id'=>$_REQUEST['exam_id']));
			}
		}
		
		$this->render('examination/examination',array(
			'model'=>$model,
		));
	}
	
	/*------- Scores End -------------*/
}