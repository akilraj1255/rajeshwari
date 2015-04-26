<?php
$this->breadcrumbs=array(
	'Student Attentances'=>array('/courses'),
	'Attendance',
);
?>
<style>
/*.score_table{
	border-top:1px #CCC solid;
	margin:30px 0px;
	font-size:15px;
	border-right:1px #CCC solid;
	
}
.score_table td,th{
	border-left:1px #CCC solid;
	padding:5px 6px;
	border-bottom:1px #CCC solid;
	width: 150px;
	text-align:center;
}*/

.score_table{
	border-top:1px #CCC solid;
	margin:30px 0px;
	font-size:15px;
	border-right:1px #CCC solid;
}
.score_table td,th{
	border-left:1px #CCC solid;
	padding:5px 6px;
	border-bottom:1px #CCC solid;
	
}
.heading{
	text-align:center;
	font-size:24px;
	font-weight:bold;
}
</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">

<?php

  if(isset($_REQUEST['id']) && isset($_REQUEST['examid']))
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
   <br /><br />
    <span align="center"><h4>EXAM SCORES</h4></span>
     <?php 
		$students=Students::model()->findAll("batch_id=:x and is_active=:y and is_deleted=:z", array(':x'=>$_REQUEST['id'],':y'=>1,':z'=>0)); 
		$scores = ExamScores::model()->findAllByAttributes(array('exam_id'=>$_REQUEST['examid']));	
		$exam = Exams::model()->findByAttributes(array('id'=>$_REQUEST['examid']));
		$exam_group = ExamGroups::model()->findByAttributes(array('id'=>$exam->exam_group_id));
		$sub_name = Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
		$batch = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
		$course = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
		
		
	?>
    <!-- Course details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
           
            <tr>
                <td style="width:100px;"><b><?php echo Yii::t('examination','Course');?></b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;">
					<?php 
					if($course->course_name!=NULL)
						echo ucfirst($course->course_name);
					else
						echo '-';
					?>
				</td>
                
                <td><b><?php echo Yii::t('examination','Batch');?></b></td>
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
            	<td><b><?php echo Yii::t('examination','Total Students');?></b></td>
                <td>:</td>
                <td>
					<?php 
					if($students!=NULL)
						echo count($students);
					else
						echo '-';
					?>
				</td>
            	<td><b><?php echo Yii::t('examination','Examination');?></b></td>
                <td>:</td>
                <td>
					<?php 
					if($exam_group->name!=NULL)
						echo ucfirst($exam_group->name);
					else
						echo '-';
					?>
				</td>
            </tr>
            
            <tr>
            	<td><b><?php echo Yii::t('examination','Subject');?></b></td>
                <td>:</td>
                <td>
					<?php 
					if($sub_name->name!=NULL)
						echo $sub_name->name;
					else
						echo '-';
					?>
				</td>
            	<td><b><?php echo Yii::t('examination','Date');?></b></td>
                <td>:</td>
                <td>
					<?php 
					if($exam->start_time!=NULL)
					{
						$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
						if($settings!=NULL)
						{	
							$exam->start_time = date($settings->displaydate,strtotime($exam->start_time));
							echo $exam->start_time;
						}
						else
						{
							echo $exam->start_time;
						}
					}
					else
					{
						echo '-';
					}
					?>
				</td>
            </tr>
           
        </table>
    </div>
    <!-- END Course details -->
	 <!-- Score Table -->

    <div style="width:700px;">
    	<table style="font-size:14px;" class="score_table"  width="100%" cellspacing="0" >
        	<tr style="background:#E1EAEF; text-align:center; line-height:10px;">
            	<th style="width:30px; padding-top:10px;"><strong><?php echo Yii::t('examination','Sl No.');?></strong></th>
                <th style="width:170px; padding-top:10px;"><strong><?php echo Yii::t('examination','Name');?></strong></th>
                <?php if($exam_group->exam_type =='Marks' || $exam_group->exam_type =='Marks And Grades'){ ?>
                <th style="width:63px; padding-top:10px;"><strong><?php echo Yii::t('examination','Score');?></strong></th>
                <?php }if($exam_group->exam_type =='Grades' || $exam_group->exam_type =='Marks And Grades'){ ?>
                <th style="width:100px; padding-top:10px;"><strong><?php echo Yii::t('examination','Grades');?></strong></th>
                <?php } ?>
                <th style="width:100px; padding-top:10px;"><strong><?php echo Yii::t('examination','Remarks');?></strong></th>
                <th style="width:100px; padding-top:10px;"><strong><?php echo Yii::t('examination','Result');?></strong></th>
        	</tr>
            <?php 
			$i = 1;
			foreach($scores as $score)
			 {
			 
			 $student  = Students::model()->findByAttributes(array('id'=>$score->student_id));
			 echo "<tr>";
			 	 echo "<td>".$i."</td>";
				 echo "<td>".ucfirst($student->first_name)." ".ucfirst($student->last_name)."</td>";
				 if($exam_group->exam_type =='Marks' || $exam_group->exam_type =='Marks And Grades'){
				 echo "<td>".$score->marks."</td>";
				 }
				 if($exam_group->exam_type =='Grades' || $exam_group->exam_type =='Marks And Grades'){
				 echo "<td>".$score->getgradinglevel($score)."</td>";
				 }
				 echo "<td>".$score->remarks."</td>";
				 echo "<td>";
					if($score->is_failed=='1'){
						echo "Failed";
					}
					else{
						echo "Passed";
					}
				 echo "</td>";
			 echo "</tr>";
			 $i++;
			}
	 		?>
        </table>
	</div>
    
     <!-- END Score Table -->


<?php  }?>

</div>