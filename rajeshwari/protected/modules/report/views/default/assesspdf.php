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
	padding:5px 6px;
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
if(isset($_REQUEST['examid']))
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
                                <?php echo @$college[0]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo @$college[1]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo 'Phone: '.@$college[2]->config_value; ?>
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
    <span align="center"><h4>BATCH ASSESSMENT REPORT</h4></span>
    <?php $students=Students::model()->findAll("batch_id=:x and is_active=:y and is_deleted=:z", array(':x'=>$_REQUEST['id'],':y'=>1,':z'=>0)); ?>
    <!-- Batch details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
           
            <tr>
            	<?php 
				$batch = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
				$course = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
				?>
                <td style="width:100px;"><b>Course</b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;">
					<?php 
					if($course->course_name!=NULL)
						echo ucfirst($course->course_name);
					else
						echo '-';
					?>
				</td>
                
                <td><b>Batch</b></td>
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
            	<td><b>Total Students</b></td>
                <td>:</td>
                <td>
					<?php 
					if($students!=NULL)
						echo count($students);
					else
						echo '-';
					?>
				</td>
            	<td><b>Examination</b></td>
                <td>:</td>
                <td><?php echo ucfirst($model->name); ?></td>
            </tr>
           
        </table>
    </div>
    <!-- END Batch details -->
   
   <?php
    }
    ?>
    
    <!-- Batch Assessment Report -->
    <div class="tablebx" style="overflow-x:auto;">
    	<!-- Assessment Table -->
    	<table width="100%" cellspacing="0" cellpadding="0" class="assessment_table">
        	<!-- Table Headers -->
        	<tr class="tablebx_topbg" style="background-color:#E1EAEF;">
                <th style="width:8px;"><?php echo Yii::t('students','Adm No.');?></th>
                <th style="width:auto;min-width:80px;"><?php echo Yii::t('students','Name');?></th>
                <?php
				$exams = Exams::model()->findAllByAttributes(array('exam_group_id'=>$_REQUEST['examid']));
				
				foreach($exams as $exam) // Creating subject column(s)
				{
                	$subject=Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
				?>
                	<th style="text-align:center;"><?php if(count($exams)>7){ echo @$subject->code; } else { echo @$subject->name; }?></th>
                <?php
				}
				?>
            </tr>
            <!-- End Table Headers -->
            <?php
			foreach($students as $student) // Creating row corresponding to each student.
			{
			?>
                <tr class=<?php echo $cls;?>>
                	<td style="padding-top:10px; padding-bottom:10px;">
                    	<?php echo $student->admission_no; ?>
                    </td>
                	<td style="padding-top:10px; padding-bottom:10px;">
						<?php echo ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name); ?>
					</td>
                    <?php
					
                    foreach($exams as $exam) // Creating subject column(s)
					{
					$score = ExamScores::model()->findByAttributes(array('student_id'=>$student->id,'exam_id'=>$exam->id));
					?>
                    
                    <td style="width:10px; max-width:10px;">
                    <?php
					if($score->marks!=NULL or $score->remarks!=NULL)
					{
					?>
                    	<!-- Mark and Remarks Column -->
                    	<table align="center" width="60%" style="border:none;">
                        	<tr>
                            	<td style="border:none;<?php if($score->is_failed == 1){?>color:#F00;<?php }?>">
                                	<?php 
									if($score->marks!=NULL)
										echo $score->marks;
									else
										echo '-';
									?>
                                </td>
                            </tr>
                            <tr>
                            	<td style="border:none;<?php if($score->is_failed == 1){?>color:#F00;<?php }?>">
                                	<?php 
									if($score->remarks!=NULL)
										echo $score->remarks;
									else
										echo '-';
									?>
                                </td>
                            </tr>
                        </table>
                        <!-- End Mark and Remarks Column -->
                    <?php
					}
					else
					{
						echo '-';
					}
					?>
                    </td>
                    <?php
					}
					?>
				</tr>
			<?php 
			}
			?>
        	
        </table>
        <!-- End Assessment Table -->
    </div>
    <!-- End Batch Assessment Report -->
    
<?php
}
else
{
	echo '<td align="center" colspan="5"><strong>'.'No Data Available!'.'</td>';
}
?>
</div>