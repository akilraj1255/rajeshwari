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
    <span align="center"><h4>EMPLOYEES YEARLY ATTENDANCE REPORT</h4></span>
    <?php 
	$employees = Employees::model()->findAll("employee_department_id=:x and is_deleted=:y", array(':x'=>$_REQUEST['id'],':y'=>0)); 
	$department_name = EmployeeDepartments::model()->findByAttributes(array('id'=>$_REQUEST['id']));
	?>
    <!-- Department details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
        	<tr>
            	<td style="width:100px;"><b><?php echo Yii::t('report','Department');?></b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;"><?php echo ucfirst($department_name->name);?></td>
                
                <td><b><?php echo Yii::t('report','Department Code');?></b></td>
                <td style="width:10px;">:</td>
                <td><?php echo $department_name->code;?></td>
            </tr>
            <tr>
            	<td><b><?php echo Yii::t('report','Total Employees');?></b></td>
                <td>:</td>
                <td><?php echo count($employees);?></td>
                
                <td><b><?php echo Yii::t('report','Year');?></b></td>
                <td>:</td>
                <td><?php echo $_REQUEST['year'];?></td>
			</tr>                
                
        </table>
    </div>
    <!-- END Department details -->
    
    <!-- Yearly Attendance Table -->
    <div class="tablebx" style="clear:both"> 
         <table width="100%" cellspacing="0" cellpadding="0" class="attendance_table">
            <tr class="tablebx_topbg" style="background-color:#E1EAEF;">
                <th><?php echo Yii::t('report','Sl No');?></th>
                <th><?php echo Yii::t('report','Emp No');?></th>
                <th style="width:240px;"><?php echo Yii::t('report','Name');?></th>
                <th style="width:200px;"><?php echo Yii::t('report','Job Title');?></th>
                <th><?php echo Yii::t('report','Leaves');?></th>
            </tr>
             <?php
			$yearly_sl = 1;
			foreach($employees as $employee) // Displaying each employee row.
			{
			?>
			<tr>
				<td style="padding-top:10px; padding-bottom:10px;"><?php echo $yearly_sl; $yearly_sl++;?></td>
				<td><?php echo $employee->employee_number; ?></td>
				<td><?php echo ucfirst($employee->first_name).'  '.ucfirst($employee->middle_name).'  '.ucfirst($employee->last_name);?></td>
				<td>
					<?php
					if($employee->job_title!=NULL)
					{
						echo ucfirst($employee->job_title);
					}
					else
					{
						echo '-';
					}
					?>
				</td>
				 <!-- Yearly Attendance column -->
				<td>
					<?php
					$attendances = EmployeeAttendances::model()->findAllByAttributes(array('employee_id'=>$employee->id));
					$required_year = $_REQUEST['year'];
					//$joining_year = date('Y',strtotime($employee->joining_date));
					//if($required_year >= $joining_year)
					//{
					$leaves = 0;
					foreach($attendances as $attendance)
					{
						$attendance_year = date('Y',strtotime($attendance->attendance_date));
						if($attendance_year == $required_year)
						{
							if($attendance->is_half_day)
							{
								$leaves = $leaves + 0.5;
							}
							else
							{
								$leaves++;
							}
						}							
					}
					echo $leaves;
					//}
					//else
					//{
					//	echo 'No data';
					//}
					?>
				</td>
				<!-- End Yearly Attendance column -->
			</tr>
			<?php
			}
			?>
            
        </table>
    </div>
    <!-- END Yearly Attendance Table -->
   
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