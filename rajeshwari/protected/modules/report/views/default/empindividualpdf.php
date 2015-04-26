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
    <span align="center"><h4>INDIVIDUAL EMPLOYEE ATTENDANCE REPORT</h4></span>
    <?php 
	$individual = Employees::model()->findByAttributes(array('id'=>$_REQUEST['employee'],'employee_department_id'=>$_REQUEST['id']));
	$department_name = EmployeeDepartments::model()->findByAttributes(array('id'=>$_REQUEST['id']));
	?>
   
    <!-- Individual Details -->
     <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
            <table style="font-size:14px;">
        		<tr>
                    <td style="width:100px;">
                        <strong><?php echo Yii::t('report','Name'); ?></strong>
                    </td>
                    <td style="width:10px;">
                        <strong>:</strong>
                    </td>
                    <td style="width:250px;">
                        <?php echo ucfirst($individual->first_name).'  '.ucfirst($individual->middle_name).'  '.ucfirst($individual->last_name);?>
                    </td>
                    <td>
                        <strong><?php echo Yii::t('report','Employee Number'); ?></strong>
                    </td>
                   <td style="width:10px;">
                        <strong>:</strong>
                    </td>
                    <td>
                        <?php echo $individual->employee_number; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong><?php echo Yii::t('report','Job Title'); ?></strong>
                    </td>
                   <td>
                        <strong>:</strong>
                    </td>
                    <td>
                        <?php 
                        if($individual->job_title!=NULL)
                        {
                            echo ucfirst($individual->job_title);
                        }
                        else
                        {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td>
                        <strong><?php echo Yii::t('report','Joining Date'); ?></strong>
                    </td>
                   <td>
                        <strong>:</strong>
                    </td>
                    <td>
                        <?php 
                        if($individual->joining_date!=NULL)
                        {
                            $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
                            if($settings!=NULL)
                            {	
                                $individual->joining_date = date($settings->displaydate,strtotime($individual->joining_date));
                            }
                            echo $individual->joining_date; 
                        }
                        else
                        {
                            echo '-';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong><?php echo Yii::t('report','Leaves Taken'); ?></strong>
                    </td>
                   <td>
                        <strong>:</strong>
                    </td>
                    <td>
                        <?php 
                        $leaves = EmployeeAttendances::model()->findAll('employee_id=:x ORDER BY attendance_date ASC',array(':x'=>$individual->id));
                        $emp_leave = 0;
						foreach($leaves as $leave)
						{
							if($leave->is_half_day == 1)
							{
								$emp_leave = $emp_leave + 0.5;
							}
							else
							{
								$emp_leave++;
							}
						}
						echo $emp_leave;
                        ?>
                    </td>
                </tr>
            </table>
    </div>
    <!-- END Individual Details -->                            
    
    <!-- Individual Report Table -->
    <div class="tablebx" style="clear:both"> 
         <table width="100%" cellspacing="0" cellpadding="0" class="attendance_table">
            <tr class="tablebx_topbg" style="background-color:#E1EAEF;">
                <th><?php echo Yii::t('report','Sl No');?></th>
                <th style="width:230px;"><?php echo Yii::t('report','Leave Date');?></th>
                <th style="width:350px;"><?php echo Yii::t('report','Reason');?></th>
            </tr>
             <?php
			if($leaves!=NULL)
			{
				$individual_sl = 1;
				foreach($leaves as $leave) // Displaying each leave row.
				{
				?>
				<tr>
					<td style="padding-top:10px; padding-bottom:10px;"><?php echo $individual_sl; $individual_sl++;?></td>
					 <!-- Individual Attendance row -->
					<td>
						<?php 
						$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
						if($settings!=NULL)
						{	
							$leave->attendance_date=date($settings->displaydate,strtotime($leave->attendance_date));
						}
						echo $leave->attendance_date; 
						?>
					</td>
					<td>
						<?php
						if($leave->reason!=NULL)
						{
							echo $leave->reason;
						}
						else
						{
							echo '-';
						}
						?>
					</td>
					<!-- End Individual Attendance row -->
				</tr>
				<?php
				}
			}
			else
			{
			?>
				<tr>
					<td colspan="3" style="padding-top:10px; padding-bottom:10px;">
						<strong>No leaves taken!</strong>
					</td>
				</tr>
			<?php
			}
			?>
        </table>
    </div>
    <!-- END Individual Report Table -->
    
   
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