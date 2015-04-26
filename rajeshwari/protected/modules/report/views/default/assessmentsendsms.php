<?php
$this->breadcrumbs=array(
	'Report'=>array('/report'),
	'SMS Assessment Report',
);
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('left_side');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('report','Assessment Report');?></h1>
	<div class="formCon">
     <div class="formConInner">
                              
       </div>




<?php
if(isset($_REQUEST['examid']))
{ 
?>

	<!-- Header -->

	<!-- End Header -->

	<?php
    if(isset($_REQUEST['id']))
    {  
        $college=Configurations::model()->findByPk(1);
                            $from = $college->config_value;

    $students=Students::model()->findAll("batch_id=:x and is_active=:y and is_deleted=:z", array(':x'=>$_REQUEST['id'],':y'=>1,':z'=>0)); ?>
    <!-- Batch details -->
   
            	<?php 
				$batch = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
				$course = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
				?>
                
					<!--<?php 
					if($course->course_name!=NULL)
						echo ucfirst($course->course_name);
					else
						echo '-';
					?>
				
					<?php 
					if($batch->name!=NULL)
						echo ucfirst($batch->name);
					else
						echo '-';
					?>-->
				
            	
					<?php 
					if($students!=NULL)
						echo "Sending SMS to ". count($students)." students";
					else
						echo '-';
					?>
				
           
     
   
   <?php
    }
    ?>
    
   <!--<?php echo Yii::t('students','Adm No.');?>-->
                <!--<?php echo Yii::t('students','Name');?>-->
                <?php
				$exams = Exams::model()->findAllByAttributes(array('exam_group_id'=>$_REQUEST['examid']));
				
				// foreach($exams as $exam) // Creating subject column(s)
				// {
    //             	$subject=Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
				// 
    //             	<!--<?php if(count($exams)>7){ echo @$subject->code; } else { echo @$subject->name; }
    //                 $subjectnames[] = $subject->name;
    //             
				// }
				
			foreach($students as $student) // Creating row corresponding to each student.
			{
			
            $to = "";
            $grd = 0;
                if($student->phone1)
                {
                    $to = $student->phone1;
                }
                else{
                    $to = $student->phone2;
                }
                $message = "";
                	
                    	$message .= "Adm. no. ". $student->admission_no .": " ; 
                    
                	   $message .= ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name) . "\r\n";
						echo ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name); ?>
					
                    <?php
					$total = 0;
						$result = "PASS";
                    foreach($exams as $exam) // Creating subject column(s)
					{
						
					$score = ExamScores::model()->findByAttributes(array('student_id'=>$student->id,'exam_id'=>$exam->id));
					$subject=Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
					$examgroup = ExamGroups::model()->findByAttributes(array('id'=>$exam->exam_group_id));
					$examname = $examgroup->name; 
					if($score->marks!=NULL or $score->remarks!=NULL)
					{
					

					
										 $grades = GradingLevels::model()->findAllByAttributes(array('batch_id'=>$_REQUEST['id']));
			                                             $t = count($grades);

														 if($examgroup->exam_type == 'Marks') 
														 {  
														 	if($score->marks!=NULL)
                                    						{
                                    						    // echo $score->marks;
                                    						    $message .= $subject->name.' :'. $score->marks . "\r\n";
                                    						    $total += $score->marks;
                                    						    if($score->is_failed == 1){ $result = 'FAIL'; }
                                    						}
														} 
														  else if($examgroup->exam_type == 'Grades') {
														  	$grd = 1;
														   foreach($grades as $grade)
																{
																	
																 if($grade->min_score <= $score->marks)
																	{	
																		$grade_value =  $grade->name;
																	}
																	else
																	{
																		$t--;
																		
																		continue;
																		
																	}
																$message .= $subject->name.' :'. $grade_value . "\r\n";
																break;
																
																}
																if($t<=0) 
																	{
																		$glevel = " No Grades" ;
																	} 
																
																} 
														   else if($examgroup->exam_type == 'Marks And Grades'){
														   	$grd = 1;
															 foreach($grades as $grade)
																{
																	
																 if($grade->min_score <= $score->marks)
																	{	
																		$grade_value =  $grade->name;
																	}
																	else
																	{
																		$t--;
																		
																		continue;
																		
																	}

																break;
																
																	
																} 


																if($t<=0) 
																	{
																		// echo $score->marks." & No Grades" ;
																	}

																	$message .= $subject->name.' :'. $grade_value . "\r\n";
																$total = '-';
																	if($grade_value == 'F')
																	{
																		$result = 'FAIL';
																	}
																 } 


										

								
									
									
									// if($score->remarks!=NULL)
									// 	echo $score->remarks;
									// else
									// 	echo '-';
									
					}
					
					
					}
                    if($to != "")
                    {

                    		if($grd == 1)
						{
							if($total <600)
							{
								$grde = 'A';
							}
							 if($total<550)
							{
								$grde = 'B';
							}
							if($total<450)
							{
								$grde = 'C';
							}
							$total = $grde;
						}


                    	$message .= "\r\n Total: ". $total."\r\nResult: ". $result ;
                    	$message = "$examname \r\n". $message;
                        SmsSettings::model()->sendSms($to,$from,$message);
                    }
					
			}
			
}
else
{
	echo '<td align="center" colspan="5"><strong>'.'No Data Available!'.'</td>';
}
?>
</div>
       </div>
     <br />
  
   
     <br />
     
    <!-- Batch Assessment Report -->
    <div class="tablebx" style="overflow-x:auto;">
    
    </div>
    <!-- End Batch Assessment Report -->
    <br />
  
   
<div class="clear"></div>
    </div>
</td>
</tr>
</table>
<?php $this->endWidget(); ?>