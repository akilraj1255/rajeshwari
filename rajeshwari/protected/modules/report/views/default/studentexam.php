<style>
.formCon input[type="text"], input[type="password"], textArea, select {padding:6px 3px 6px 3px; width:140px;}
.exp_but { right:-11px; margin:0px 2px !important;}
</style>

<?php
$this->breadcrumbs=array(
	'Report'=>array('/report'),
	'Student Assessment Report',
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
                        <table width="90%" border="0" cellspacing="0" cellpadding="0" class="s_search">
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('report','Name');?></strong></td>
                                <td>&nbsp;</td>
                                <td> 
                                    <div style="position:relative; width:180px" >
                                    <?php  $this->widget('zii.widgets.jui.CJuiAutoComplete',
                                    array(
                                    'name'=>'name',
                                    'id'=>'name_widget',
                                    'source'=>$this->createUrl('/site/autocomplete'),
                                    'htmlOptions'=>array('placeholder'=>'Student Name'),
                                    'options'=>
                                    array(
                                    'showAnim'=>'fold',
                                    'select'=>"js:function(student, ui) {
                                    $('#id_widget').val(ui.item.id);
                                    
                                    }"
                                    ),
                                    
                                    ));
                                    ?>
                                    <?php echo CHtml::hiddenField('student_id','',array('id'=>'id_widget')); ?>
                                    <?php echo CHtml::ajaxLink('',array('/site/explorer','widget'=>'1'),array('update'=>'#explorer_handler'),array('id'=>'explorer_student_name','class'=>'exp_but'));?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    	<div style="margin-top:10px;"><?php echo CHtml::submitButton( Yii::t('report','Search'),array('name'=>'search','class'=>'formbut')); ?></div>
                    </div> <!-- END div class="formConInner" -->
                </div> <!--  END div class="formCon" -->
                <br />
                
                
                <?php
                //if(isset($_REQUEST['flag']) and $_REQUEST['flag']==1)
				if($flag==1)
                {
                	echo '<div class="listhdg" align="center">'.Yii::t('report','Invalid search! Please enter a student name.').'</div>';	
                }
                else
                {
                }
                if(isset($list))
                {
					$details=Students::model()->findByAttributes(array('id'=>$student,'is_deleted'=>0,'is_active'=>1));
					$batch=Batches::model()->findByAttributes(array('id'=>$details->batch_id,'is_deleted'=>0,'is_active'=>1));
					$course=Courses::model()->findByAttributes(array('id'=>$batch->course_id));
					?>
					<h3><?php echo Yii::t('report','Student Information');?></h3>
					<div class="tablebx">  
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr class="tablebx_topbg">
                            	<td><?php echo Yii::t('report','Admission No.');?></td>
                                <td><?php echo Yii::t('report','Student Name');?></td>
                                <td><?php echo Yii::t('report','Course');?></td>
                                <td><?php echo Yii::t('report','Batch');?></td>
                            </tr>
                            <tr>
                            	<td><?php echo $details->admission_no; ?></td>
                                <td style="padding:10px;"><?php echo CHtml::link(ucfirst($details->first_name).'  '.ucfirst($details->middle_name).'  '.ucfirst($details->last_name),array('/students/students/view','id'=>$details->id)); ?></td>
                                <td>
                                	<?php 
									if($course->course_name!=NULL)
										echo $course->course_name;
									else
										echo '-';
									?>
                                </td>
                                <td>
									<?php 
									if($batch->name!=NULL)
										echo $batch->name;
									else
										echo '-';
									?>
								</td>
                            </tr>
                        </table>
					</div> <!-- END div class="tablebx" Student Information -->
                    <br /><br />
					<h3><?php echo Yii::t('report','Assessment Report');?></h3>
                    <?php
					$examgroups = ExamGroups::model()->findAll('batch_id=:x',array(':x'=>$batch->id)); // Selecting exam groups in the batch of the student
					if($examgroups!=NULL) // If exam groups present
					{
						$i = 1;
						foreach($examgroups as $examgroup) 
						{
						?>
                        	<br />
							<span style="float:left;"><h4><?php echo $i.'. '.ucfirst($examgroup->name); $i++;?></h4></span>
                            <span style="margin-left:490px; margin-top:200px;"><?php echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('/report/default/studentexampdf','exam_group_id'=>$examgroup->id,'id'=>$student),array('target'=>"_blank")); ?></span>
                            <!-- Single Exam Table -->
                            <div class="tablebx" style="clear:both"> 
                            	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr class="tablebx_topbg">
                                        <td><?php echo Yii::t('report','Subject');?></td>
                                        <td><?php echo Yii::t('report','Score');?></td>
                                        <td><?php echo Yii::t('report','Remarks');?></td>
                                    </tr>
                                    <?php
										$exams = Exams::model()->findAll('exam_group_id=:x',array(':x'=>$examgroup->id)); // Selecting exams(subjects) in an exam group
										if($exams!=NULL)
										{
											foreach($exams as $exam)
											{
												$subject = Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
												if($subject!=NULL) // Checking if exam for atleast subject is created.
												{ 
										?>
													<tr>
														<td style="padding-top:10px; padding-bottom:10px;">
														<?php
															if($subject->name!=NULL)
																echo ucfirst($subject->name);
															else
																continue;
														?>
														</td>
														<td>
														<?php
														$score = ExamScores::model()->findByAttributes(array('exam_id'=>$exam->id,'student_id'=>$student));
							 							 $grades = GradingLevels::model()->findAllByAttributes(array('batch_id'=>$batch->id));
			                                             $t = count($grades);
														 if($examgroup->exam_type == 'Marks') {  
														 echo $score->marks; } 
														  else if($examgroup->exam_type == 'Grades') {
														  	
														    	$grade_value = 'No Grade';
														  	$current_max = 0;
														   foreach($grades as $grade)
																{
																 if($grade->min_score <= floor(($score->marks/$exam->maximum_marks)*100) )
																	{	if($grade->min_score > $current_max) {
																			$grade_value =  $grade->name;
																			$current_max = $grade->min_score;
																		}
																		
																	}
																	else
																	{
																		$t--;
																		
																		continue;
																		
																	}
																	$grd = 1;
																
																
																}
																echo $grade_value ;
																if($t<=0) 
																	{
																		$glevel = " No Grades" ;
																	}
																
																} 
														   else if($examgroup->exam_type == 'Marks And Grades'){
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
																echo $score->marks . " & ".$grade_value ;
																break;
																
																	
																} 
																if($t<=0) 
																	{
																		echo $score->marks." & No Grades" ;
																	}
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
													echo '<tr><td colspan="4" style="padding-top:10px; padding-bottom:10px; text-align:center; "><strong>No exam created for any subject in this batch!</strong></td></tr>';
												}
											} // END foreach($exams as $exam)
										}
										else //If no exam created
										{
											echo '<tr><td colspan="4" style="padding-top:10px; padding-bottom:10px; text-align:center;"><strong>No exam created for any subject in this batch!</strong></td></tr>';
										}
									?>
								</table>
                            </div>
                            <!-- END Single Exam Table -->	
						<?php
						
						} // END foreach($examgroups as $examgroup)
					}
					else // If no exam groups present in the batch of the student
					{
						echo '<div class="listhdg" align="center">'.Yii::t('report','No exam details available!').'</div>';	
					}
				
                } //END isset($list)
                ?>
                <div class="clear"></div>
            </div> <!-- End div class="cont_right" -->
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>