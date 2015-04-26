<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?> 
    <?php
    $student=Students::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
    $exam = ExamScores::model()->findAll("student_id=:x", array(':x'=>$student->id));
	$electives = ElectiveScores::model()->findAll("student_id=:x", array(':x'=>$student->id));
    ?>
    <div id="parent_rightSect">
        <div class="parentright_innercon">
            <h1>Exams</h1>
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
                </div>
                <h2><?php echo ucfirst($student->last_name).' '.ucfirst($student->first_name);?></h2>
                <ul>
                    <li class="rleft"><?php echo Yii::t('studentportal','Course :');?></li>
                    <li class="rright">
                        <?php 
                        $batch = Batches::model()->findByPk($student->batch_id);
                        echo $batch->course123->course_name;
                        ?>
                    </li>
                    <li class="rleft"><?php echo Yii::t('studentportal','Batch :');?></li>
                    <li class="rright"><?php echo $batch->name;?></li>
                    <li class="rleft"><?php echo Yii::t('studentportal','Admission No :');?></li>
                    <li class="rright"><?php echo $student->admission_no; ?></li>
                </ul>
            </div> <!-- END div class="profile_top" -->
            <div class="profile_details">
                <h3><?php echo Yii::t('studentportal','Assessment');?></h3>
                <br />  
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo Yii::t('parentportal','Exam Group Name');?></th>
                        <th><?php echo Yii::t('parentportal','Subject');?></th>
                        <th><?php echo Yii::t('parentportal','Marks');?></th>
                        <th><?php echo Yii::t('parentportal','Remarks');?></th>
                        <th><?php echo Yii::t('parentportal','Result');?></th>
                    </tr>
                    <?php
                    if($exam==NULL)
                    {
                    	echo '<tr><td align="center" colspan="4"><i>'.Yii::t('studentportal','No Assessments').'</i></td></tr>';	
                    }
                    else
                    {
						$displayed_flag = '';
						foreach($exam as $exams)
						{
							$exm=Exams::model()->findByAttributes(array('id'=>$exams->exam_id));
							$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id,'result_published'=>1));
							if($group!=NULL and count($group) > 0)
							{
								echo '<tr>';
								if($exm!=NULL)
								{
									$displayed_flag = 1;
									//$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id));
									echo '<td>'.$group->name.'</td>';
									$sub=Subjects::model()->findByAttributes(array('id'=>$exm->subject_id));
									echo '<td>'.$sub->name.'</td>';
									echo '<td>'.$exams->marks.'</td>';
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
						}
						if($displayed_flag==NULL)
						{	
							echo '<tr><td align="center" colspan="4"><i>'.Yii::t('parentportal','No Result Published').'</i></td></tr>';
						}
                    }
                    ?>    
                </table>
            </div> 
            <div class="profile_details">
                <h3><?php echo Yii::t('studentportal','Electives');?></h3>
                <br />  
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo Yii::t('parentportal','Exam Group Name');?></th>
                        <th><?php echo Yii::t('parentportal','Subject');?></th>
                        <th><?php echo Yii::t('parentportal','Marks');?></th>
                        <th><?php echo Yii::t('parentportal','Remarks');?></th>
                        <th><?php echo Yii::t('parentportal','Result');?></th>
                    </tr>
                    <?php
                    if($electives==NULL)
                    {
                    	echo '<tr><td align="center" colspan="4"><i>'.Yii::t('studentportal','No Assessments').'</i></td></tr>';	
                    }
                    else
                    {
						$displayed_flag = '';
						foreach($electives as $elective)
						{
							$exm=ElectiveExams::model()->findByAttributes(array('id'=>$elective->exam_id));
							$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id,'result_published'=>1));
							if($group!=NULL and count($group) > 0)
							{
								echo '<tr>';
								if($exm!=NULL)
								{
									$displayed_flag = 1;
									//$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id));
									echo '<td>'.$group->name.'</td>';
									$sub=ElectiveGroups::model()->findByAttributes(array('id'=>$exm->elective_id));
									echo '<td>'.$sub->name.'</td>';
									echo '<td>'.$elective->marks.'</td>';
									echo '<td>';
									if($elective->remarks!=NULL)
									{
										echo $elective->remarks;
									}
									else
									{
										echo '-';
									}
									echo '</td>';
									if($elective->is_failed==NULL)
										echo '<td>'.Yii::t('parentportal','Passed').'</td>';
									else
										echo '<td>'.Yii::t('parentportal','Failed').'</td>';
								}
								echo '</tr>';
							}
							/*else{
							continue;
							}*/	
						}
						if($displayed_flag==NULL)
						{	
							echo '<tr><td align="center" colspan="4"><i>'.Yii::t('parentportal','No Result Published').'</i></td></tr>';
						}
                    }
                    ?>    
                </table>
            </div>
            
            <!-- END div class="profile_details" -->
        </div> <!-- END div class="parentright_innercon" -->
    </div> <!-- END div id="parent_rightSect" -->
    <div class="clear"></div>
</div> <!-- END div id="parent_Sect" -->
