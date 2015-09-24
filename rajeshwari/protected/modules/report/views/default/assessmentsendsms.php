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
						echo "SMS sent to ". count($students)." students. Please note that the SMS will be sent only for the students who have their parent's or guardian's mobile number resgistered.";
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
			$final_message = "";	
			foreach($students as $student) // Creating row corresponding to each student.
			{
			$guardian = Guardians::model()->findByAttributes(array('id'=>$student->parent_id));
            $to = "";
            $grd = 0;
            		
							if(count($guardian)!=0 && $guardian->mobile_phone && $guardian->mobile_phone!="")
							{
								$to = $guardian->mobile_phone;
							}else if($student->phone1){
								$to = $student->phone1;	
							}
							else if($student->phone2){
								$to = $student->phone2;
							}
							
                $message = "";
                $student_name = ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name);
                	
                    	// $message .= "Adm. no. ". $student->admission_no .": " ; 
                    
                	   // $message .= ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name) . "\r\n";
						// echo ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name); ?>
					
                    <?php
					$total = 0;
					$total_of_max_marks =0;
					$result = "PASS";
					$result_r = "";
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
                                    						    $result_r .= $subject->name . ': '.round($score->marks).'/'.round($exam->maximum_marks). ";" ;
                                    						    $total += round($score->marks);
                                    						    $total_of_max_marks+=round($exam->maximum_marks);
                                    						    // if($score->is_failed == 1){ $result = 'FAIL'; }
                                    						} else {
                                    							$result_r .= "-";
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
																$result_r .= $subject->name.' :'. $grade_value;
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
																	$result_r .= $subject->name.' :'. $grade_value;
																$total = '-';
																 } 


										

								
									
									
									// if($score->remarks!=NULL)
									// 	echo $score->remarks;
									// else
									// 	echo '-';
									//Sppend message here
					}
					
					
					}



                    	// $message .= "\r\n Total: ". $total."\r\nResult: ". $result ;
                    	// $message = "$examname \r\n". $message;
                        // SmsSettings::model()->sendSms($to,$from,$message);
                        		
					if($to!=""){
						if($result_r == "")
						{
							$result_r = "-";
						}
						$total=$total.'/'.$total_of_max_marks;
						$final_message .= "$to,$student_name,$examname,$result_r,$total".PHP_EOL;
						
						
						
					}
				
					
			
			
			
			}
			//Send sms here
				$sms_settings = SmsSettings::model()->findAll();
						
				if($sms_settings[0]->is_enabled=='1' && $sms_settings[6]->is_enabled=='1'){
					//echo "$final_message";
					SmsSettings::model()->sendSmsExamresult($final_message);
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