<style>
.attendance_table{
	margin:30px 0px;
	font-size:8px;
	text-align:center;
	width:auto;
	/*max-width:600px;*/
	border-top:1px #CCC solid;
	border-right:1px #CCC solid;
}
.attendance_table td{
	border-left:1px #CCC solid;
	padding-top:10px; 
	padding-bottom:10px;
	border-bottom:1px #CCC solid;
	width:auto;
	font-size:13px;
	
}

.attendance_table th{
	font-size:14px;
	padding:10px;
	border-left:1px #CCC solid;
	border-bottom:1px #CCC solid;
}

</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">


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
    <span align="center"><h4>STUDENTS OVERALL ATTENDANCE REPORT</h4></span>
    <?php 
	$students = Students::model()->findAll("batch_id=:x AND is_active=:y AND is_deleted=:z", array(':x'=>$_REQUEST['id'],':y'=>1,':z'=>0));
	$batch = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id'],'is_active'=>1,'is_deleted'=>0));
	$course = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
	?>
    <!-- Batch details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
        	<tr>
            	<td style="width:100px;"><b><?php echo Yii::t('report','Course');?></b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;"><?php echo ucfirst($course->course_name);?></td>
                
                <td><b><?php echo Yii::t('report','Batch');?></b></td>
                <td style="width:10px;">:</td>
                <td><?php echo $batch->name;?></td>
            </tr>
            <tr>
            	<td><b><?php echo Yii::t('report','Total Students');?></b></td>
                <td>:</td>
                <td><?php echo count($students);?></td>
			</tr>                
                
        </table>
    </div>
    <!-- END Batch details -->
    
    <!-- Overall Attendance Table -->
    <div class="tablebx" style="clear:both"> 
         <table width="100%" cellspacing="0" cellpadding="0" class="attendance_table">
            <tr class="tablebx_topbg" style="background-color:#E1EAEF;">
               <th><?php echo Yii::t('report','Sl No');?></th>
               <th><?php echo Yii::t('report','Admn No');?></th>
               <th><?php echo Yii::t('report','Admission Date');?></th>
               <th style="width:340px;"><?php echo Yii::t('report','Name');?></th>
               <th><?php echo Yii::t('report','Leaves');?></th>
            </tr>
             <?php
				$overall_sl = 1;
				foreach($students as $student) // Displaying each employee row.
				{
				?>
				<tr>
					<td style="padding-top:10px; padding-bottom:10px;"><?php echo $overall_sl; $overall_sl++;?></td>
					<td><?php echo $student->admission_no; ?></td>
					 <td>
						<?php 
						if($student->admission_date!=NULL)
						{
							$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
							if($settings!=NULL)
							{	
								$student->admission_date = date($settings->displaydate,strtotime($student->admission_date));
							}
							echo $student->admission_date; 
						}
						else
						{
							echo '-';
						}
						?>
					</td>
					<td><?php echo ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name);?></td>
					<!-- Overall Attendance column -->
					<td>
						<?php
						$leaves = StudentAttentance::model()->countByAttributes(array('student_id'=>$student->id));
						echo $leaves;
						?>
					</td>
					<!-- End overall Attendance column -->
				</tr>
				<?php
				}
				?>
            
        </table>
    </div>
    <!-- END Overall Attendance Table -->
   
   <?php
    }
	else
	{
    ?>
    	<br /><br />
    	<div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
    		<strong>No data available!</strong>
        </div>
	<?php
    }
?>
</div>