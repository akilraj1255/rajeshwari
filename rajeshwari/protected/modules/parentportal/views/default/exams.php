 <script>
	function getstudent() // Function to see student profile
	{
		var studentid = document.getElementById('studentid').value;
		if(studentid!='')
		{
			window.location= 'index.php?r=parentportal/default/exams&id='+studentid;	
		}
		else
		{
			window.location= 'index.php?r=parentportal/default/exams';
		}
	}
</script>
<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?> 
    <?php
    $user=User::model()->findByAttributes(array('id'=>Yii::app()->user->id));
    $guardian = Guardians::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
	$students = Students::model()->findAllByAttributes(array('parent_id'=>$guardian->id));
	if(count($students)==1) // Single Student 
	{
		$student = Students::model()->findByAttributes(array('id'=>$students[0]->id));
	}
	elseif(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL) // If Student ID is set
	{
		$student = Students::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		
	}
	elseif(count($students)>1) // Multiple Student
	{
		$student = Students::model()->findByAttributes(array('id'=>$students[0]->id));
	}
    $exam = ExamScores::model()->findAll("student_id=:x", array(':x'=>$student->id));
    ?>
    <div id="parent_rightSect">
        <div class="parentright_innercon">
            <h1><?php echo Yii::t('parentportal','Exams');?></h1>
            <div class="profile_top">
                <div class="prof_img">
                	<?php
                     if($student->photo_data!=NULL)
                     { 
                        echo '<img  src="'.$this->createUrl('/students/Students/DisplaySavedImage&id='.$student->primaryKey).'" alt="'.$student->photo_file_name.'" width="100" height="103" />';
                    }
                    elseif($student->gender=='M')
                    {
                        echo '<img  src="images/portal/prof-img_male.png" alt='.$student->first_name.' width="100" height="103" />'; 
                    }
                    elseif($student->gender=='F')
                    {
                        echo '<img  src="images/portal/prof-img_female.png" alt='.$student->first_name.' width="100" height="103" />';
                    }
                    ?>
                </div> <!-- END div class="prof_img" -->
                
                <?php
                if(count($students)>1) // Show drop down only if more than 1 student present
				{
					$student_list = CHtml::listData($students,'id','studentname');
				?>
                    <div class="student_dropdown" style="top:15px;">
                        <?php
                        echo CHtml::dropDownList('sid','',$student_list,array('id'=>'studentid','style'=>'width:auto;','options'=>array($_REQUEST['id']=>array('selected'=>true)),'onchange'=>'getstudent();'));
                        ?>
                    </div> <!-- END div class="student_dropdown" -->
            	<?php
				}
				?>
                
                
                <h2><?php echo $student->first_name.' '.$student->middle_name.' '.$student->last_name;?></h2>
                <ul>
                    <li class="rleft"><?php echo Yii::t('parentportal','Course :');?></li>
                    <li class="rright">
						<?php 
                        $batch = Batches::model()->findByPk($student->batch_id);
                        echo $batch->course123->course_name;
                        ?>
                    </li>
                    <li class="rleft"><?php echo Yii::t('parentportal','Batch :');?></li>
                    <li class="rright"><?php echo $batch->name;?></li>
                    <li class="rleft"><?php echo Yii::t('parentportal','Admission No :');?></li>
                    <li class="rright"><?php echo $student->admission_no; ?></li>
                </ul>
            </div> <!-- END div class="profile_top" -->
            <div class="profile_details">
                <h3><?php echo Yii::t('parentportal','Assessment');?></h3>
                <br />  
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo Yii::t('parentportal','Exam Group Name');?></th>
                        <th><?php echo Yii::t('parentportal','Subject');?></th>
                        <th><?php echo Yii::t('parentportal','Score');?></th>
                        <th><?php echo Yii::t('parentportal','Remarks');?></th>
                        <th><?php echo Yii::t('parentportal','Result');?></th>
                    </tr>
                    <?php
                    if($exam==NULL)
                    {
                    	echo '<tr><td align="center" colspan="4"><i>'.Yii::t('parentportal','No Assessments').'</i></td></tr>';	
                    } // END if($exam==NULL)
                    else
                    {
						$displayed_flag = '';
						foreach($exam as $exams)
						{
							$exm=Exams::model()->findByAttributes(array('id'=>$exams->exam_id));
							$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id,'result_published'=>1));
							$grades = GradingLevels::model()->findAllByAttributes(array('batch_id'=>$exams->grading_level_id));
			                  $t = count($grades); 
							if($group!=NULL and count($group) > 0)
							{
							
								echo '<tr>';
								if($exm!=NULL)
								{
									$displayed_flag = 1;
									//$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id));
									echo '<td>'.$group->name.'</td>';
									$sub=Subjects::model()->findByAttributes(array('id'=>$exm->subject_id));
									if($sub->elective_group_id!=0 and $sub->elective_group_id!=NULL)
									{
										
										$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
										if($student_elective!=NULL)
										{
											$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$sub->elective_group_id));
											if($electname!=NULL)
											{
												echo '<td>'.$electname->name.'</td>';
											}
										}
									
										
									}
									else
									{
										echo '<td>'.$sub->name.'</td>';
									}
										if($group->exam_type == 'Marks') {  
				  echo "<td>".$exams->marks."</td>"; } 
				  else if($group->exam_type == 'Grades') {
				   echo "<td>";
				        
				   foreach($grades as $grade)
						{
							
						 if($grade->min_score <= $exams->marks)
							{	
								$grade_value =  $grade->name;
							}
							else
							{
								$t--;
								
								continue;
								
							}
						echo $grade_value ;
						break;
						
						}
						if($t<=0) 
							{
								echo $glevel = " No Grades" ;
							} 
						echo "</td>"; 
						} 
				   else if($group->exam_type == 'Marks And Grades'){
					echo "<td>"; foreach($grades as $grade)
						{
							
						 if($grade->min_score <= $exams->marks)
							{	
								$grade_value =  $grade->name;
							}
							else
							{
								$t--;
								
								continue;
								
							}
						echo $exams->marks . " & ".$grade_value ;
						break;
						
							
						} 
						if($t<=0) 
							{
								echo $exams->marks." & No Grades" ;
							}
						echo "</td>"; } 
									echo '<td>';
									if($exams->remarks!=NULL)
									{
										echo $exams->remarks;
									}
									else
									{
										echo '-';
									}
									echo '</td>';
									if($exams->is_failed==NULL)
										echo '<td>'.Yii::t('parentportal','Passed').'</td>';
									else
										echo '<td>'.Yii::t('parentportal','Failed').'</td>';
								}
								echo '</tr>';
								
							}
							/*else{
							continue;
							}*/	
						} // END foreach($exam as $exams)
						if($displayed_flag==NULL)
						{	
							echo '<tr><td align="center" colspan="4"><i>'.Yii::t('parentportal','No Result Published').'</i></td></tr>';
						}
                    }
                    ?>    
                </table>
            </div> <!-- END div class="profile_details" -->
        </div> <!-- END div class="parentright_innercon" -->
    </div> <!-- END div id="parent_rightSect" -->
    <div class="clear"></div>
</div> <!-- END div id="parent_Sect" -->

