<style>
.assessment_table{
	margin:30px 0px;
	font-size:8px;
	text-align:center;
	width:auto;
	/*max-width:600px;*/
	border-top:1px #CCC solid;
	border-right:1px #CCC solid;
}
.assessment_table td{
	border-left:1px #CCC solid;
	padding-top:10px; 
	padding-bottom:10px;
	border-bottom:1px #CCC solid;
	width:auto;
	font-size:13px;
	
}

.assessment_table th{
	font-size:14px;
	padding:10px;
	border-left:1px #CCC solid;
	border-bottom:1px #CCC solid;
}

</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">
<?php
if(isset($_REQUEST['exam_group_id']))
{ 
?>

	<!-- Header -->
    <div style="border-bottom:#666 1px; width:700px; padding-bottom:20px;">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="first">
                           <?php $logo=Logo::model()->findAll();?>
                            <?php
                            if($logo!=NULL)
                            {
                                //Yii::app()->runController('Configurations/displayLogoImage/id/'.$logo[0]->primaryKey);
                                echo '<img src="uploadedfiles/school_logo/'.$logo[0]->photo_file_name.'" alt="'.$logo[0]->photo_file_name.'" class="imgbrder" width="100%" />';
                            }
                            ?>
                </td>
                <td align="center" valign="middle" class="first" style="width:300px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:22px; width:300px;  padding-left:10px;">
                                <?php $college=Configurations::model()->findAll(); ?>
                                <?php echo $college[0]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo $college[1]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo 'Phone: '.$college[2]->config_value; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
	<!-- End Header -->

	<?php
    if(isset($_REQUEST['id']))
    {  
   ?>
   
    <br /><br />
    <span align="center"><h4>STUDENT ASSESSMENT REPORT</h4></span>
    <?php $student=Students::model()->findByAttributes(array('id'=>$_REQUEST['id'],'is_deleted'=>0,'is_active'=>1)); ?>
    <!-- Batch details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
        	<tr>
            	<td style="width:100px;"><b><?php echo Yii::t('report','Student Name');?></b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;"><?php echo ucfirst($student->first_name).' '.ucfirst($student->last_name);?></td>
                
                <td><b><?php echo Yii::t('report','Admission Number');?></b></td>
                <td style="width:10px;">:</td>
                <td><?php echo $student->admission_no;?></td>
            </tr>
            <tr>
            	<?php 
				$batch = Batches::model()->findByAttributes(array('id'=>$student->batch_id));
				$course = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
				?>
                <td><b><?php echo Yii::t('report','Course');?></b></td>
                <td>:</td>
                <td>
					<?php 
					if($course->course_name!=NULL)
						echo ucfirst($course->course_name);
					else
						echo '-';
					?>
				</td>
                
                <td><b><?php echo Yii::t('report','Batch');?></b></td>
                <td>:</td>
                <td>
					<?php 
					if($batch->name!=NULL)
						echo ucfirst($batch->name);
					else
						echo '-';
					?>
				</td>
            
            </tr>
            <tr>
            	<td><b><?php echo Yii::t('report','Examination');?></b></td>
                <td>:</td>
                <td>
                	<?php
					$exam = ExamGroups::model()->findByAttributes(array('id'=>$_REQUEST['exam_group_id']));
					if($exam->name!=NULL)
						echo ucfirst($exam->name);
					else
						echo '-';
					?>
				</td>
            	<td><b><?php echo Yii::t('report','Exam Date');?></b></td>
                <td>:</td>
                <td>
                	<?php
					if($exam->name!=NULL)
					{
						$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
						if($settings!=NULL)
						{	
							$exam->exam_date=date($settings->displaydate,strtotime($exam->exam_date));	
						}
						echo $exam->exam_date;
					}
					else
						echo '-';
					?>
				</td>
            </tr>
        </table>
    </div>
    <!-- END Batch details -->
    
    <!-- Single Exam Table -->
    <div class="tablebx" style="clear:both"> 
         <table width="100%" cellspacing="0" cellpadding="0" class="assessment_table">
            <tr class="tablebx_topbg" style="background-color:#E1EAEF;">
                <th style="width:150px;"><?php echo Yii::t('report','Subject');?></th>
                <th style="width:100px;"><?php echo Yii::t('report','Mark');?></th>
                <th style="width:100px;"><?php echo Yii::t('report','Grade');?></th>
                <th style="width:200px;"><?php echo Yii::t('report','Remarks');?></th>
            </tr>
            <?php
			$exams = Exams::model()->findAll('exam_group_id=:x',array(':x'=>$_REQUEST['exam_group_id'])); // Selecting exams(subjects) in an exam group
			if($exams!=NULL)
			{
				foreach($exams as $exam)
				{
					$subject = Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
					if($subject!=NULL) // Checking if exam for atleast subject is created.
					{ 
			?>
						<tr>
							<td>
							<?php
								if($subject->name!=NULL)
									echo ucfirst($subject->name);
								else
									continue;
							?>
							</td>
                            
							<td style="padding-top:10px; padding-bottom:10px;">
							<?php
								$score = ExamScores::model()->findByAttributes(array('exam_id'=>$exam->id,'student_id'=>$student->id));
								if($score->marks!=NULL)
								{
									echo $score->marks;
								}
								else
								{
									echo '-';
								}
							?>
							</td>
                            
							<td>
							<?php
								if($score->marks!=NULL) // Calculate grade only if mark is present
								{
									$grade = GradingLevels::model()->findByAttributes(array('id'=>$exam->grading_level_id)); //Calculating Grade
									if($grade->name!=NULL)
									{
										echo $grade->name;
									}
									else //No grading levels for $exam
									{
										$grades = GradingLevels::model()->findAllByAttributes(array('batch_id'=>NULL));
										$i = count($grades);
										foreach($grades as $grade)
										{
											if($grade->min_score <= $score->marks)
											{
												echo $grade->name;
												break;
											}
											else
											{
												$i--;
												continue;
											}
										}
										if($i<=0){
											echo 'No Grades';
										}
										
									}
								} // END $score->marks!=NULL
								else // If no marks is present, grade is nil
								{
									echo '-';
								}
							?>
							</td>
                            
							<td>
							   <?php
							   if($score->remarks!=NULL)
							   {
								   echo $score->remarks;
							   }
							   else
							   {
								   echo '-';
							   }
							   ?>
							</td>
                            
						</tr>
			<?php
					}
					else // If no exam (subject) details are present
					{
						
						echo '<tr><td colspan="4" style="text-align:center; "><strong>No exam created for any subject in this batch!</strong></td></tr>';
					}
				} // END foreach($exams as $exam)
			}
			else //If no exam created
			{
				echo '<tr><td colspan="4" style="text-align:center;"><strong>No exam created for any subject in this batch!</strong></td></tr>';
			}
		?>
        </table>
    </div>
    <!-- END Single Exam Table -->
   
   <?php
    }
    ?>
    
    
    
<?php
}
else
{
	echo '<td align="center" colspan="5"><strong>'.'No Data Available!'.'</td>';
}
?>
</div>