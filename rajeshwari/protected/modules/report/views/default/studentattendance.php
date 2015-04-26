<script>
function resetall() // Function to reset the search form
{
	document.getElementById("filler").style.display="none";
	document.getElementById("year").style.display="none";
	document.getElementById("month").style.display="none";
	document.getElementById("individual").style.display="none";
	document.getElementById("mode_id").length=1;
}


function updatemode() // Function to update mode dependent dropdown after selecting batch
{
	
	var course_id = document.getElementById('cid').value;
	var batch_id = document.getElementById('batchid').value;
	window.location= 'index.php?r=report/default/studentattendance&cid='+course_id+'&bid='+batch_id;	
}

function getmode() // Function to get the dependent dropdown after selecting mode
{
	var mode_id = document.getElementById('mode_id').value;
	if(mode_id == 1) // Overall
	{
		var course_id = document.getElementById('cid').value;
		var batch_id = document.getElementById('batchid').value;
		document.getElementById("filler").style.display="none";
		document.getElementById("year").style.display="none";
		document.getElementById("month").style.display="none";
		document.getElementById("individual").style.display="none";
		window.location= 'index.php?r=report/default/studentattendance&cid='+course_id+'&bid='+batch_id+'&mode='+mode_id;
	}
	else if(mode_id == 2) // Yearly
	{
		document.getElementById("filler").style.display="table-row";
		document.getElementById("year").style.display="table-row";
		document.getElementById("month").style.display="none";
		document.getElementById("individual").style.display="none";
		
	}
	else if(mode_id == 3) // Monthly
	{
		document.getElementById("filler").style.display="table-row";
		document.getElementById("year").style.display="none";
		document.getElementById("month").style.display="table-row";
		document.getElementById("individual").style.display="none";
	}
	else if(mode_id == 4) // Individual
	{
		document.getElementById("filler").style.display="table-row";
		document.getElementById("year").style.display="none";
		document.getElementById("month").style.display="none";
		document.getElementById("individual").style.display="table-row";
	}
	else
	{
		document.getElementById("filler").style.display="none";
		document.getElementById("year").style.display="none";
		document.getElementById("month").style.display="none";
		document.getElementById("individual").style.display="none";
	}
	
}

function getyearreport() // Function to get yearly report
{
	var course_id = document.getElementById('cid').value;
	var batch_id = document.getElementById('batchid').value;
	var mode_id = document.getElementById('mode_id').value;
	var year_value = document.getElementById('year_value').value;
	window.location= 'index.php?r=report/default/studentattendance&cid='+course_id+'&bid='+batch_id+'&mode='+mode_id+'&year='+year_value;
	
}

function getmonthreport() // Function to get monthly report
{
	var course_id = document.getElementById('cid').value;
	var batch_id = document.getElementById('batchid').value;
	var mode_id = document.getElementById('mode_id').value;
	var month_value = document.getElementById('month_value').value;
	month_value = month_value.replace(/(^\s+|\s+$)/g,'');
	window.location= 'index.php?r=report/default/studentattendance&cid='+course_id+'&bid='+batch_id+'&mode='+mode_id+'&month='+month_value;
	
}
</script>

<?php
$this->breadcrumbs=array(
	'Report'=>array('/report'),
	'Student Attendance Report',
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
        	 <!-- div class="cont_right" --> 
            <div class="cont_right">
                <h1><?php echo Yii::t('report','Student Attendance Report');?></h1>
                 <!-- DROP DOWNS -->
                <div class="formCon">
                    <div class="formConInner">
                        <table width="90%" border="0" cellspacing="0" cellpadding="0" class="s_search">
                            <tr>
                                <td>&nbsp;</td>
                                <td style="width:200px;"><strong><?php echo Yii::t('report','Select Course');?></strong></td>
                                <td>&nbsp;</td>  
                                <?php
                                $model=new Courses;
                                $criteria = new CDbCriteria;
                                $criteria->compare('is_deleted',0); ?>
                                <td>
									<?php  
                                    echo CHtml::dropDownList('cid','',CHtml::listData(Courses::model()->findAllByAttributes(array('is_deleted'=>0),array('order'=>'id DESC')),'id','course_name'),array('prompt'=>'Select Course','style'=>'width:190px;',
                                    'ajax' => array(
                                    'type'=>'POST',
                                    'url'=>CController::createUrl('/report/default/batchname'),
                                    'update'=>'#batchid',
                                    'data'=>'js:$(this).serialize()'
                                    ),'options'=>array($_REQUEST['cid']=>array('selected'=>true)),'onchange'=>'resetall()'));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('report','Select Batch');?></strong></td>
                                <td>&nbsp;</td>
                                <td>
                                    <?php  
                                   // echo CHtml::dropDownList('batch_id','',array(),array('prompt'=>'Select Batch','id'=>'batchid','submit'=>array('/report/default/studentattendance')));
								   	if(isset($_REQUEST['bid']) and $_REQUEST['bid']!=NULL)
									{
										$batch_list = CHtml::listData(Batches::model()->findAllByAttributes(array('course_id'=>$_REQUEST['cid'],'is_active'=>1,'is_deleted'=>0)),'id','name');
										echo CHtml::dropDownList('batch_id','',$batch_list,array('prompt'=>'Select Batch','id'=>'batchid','style'=>'width:190px;','options'=>array($_REQUEST['bid']=>array('selected'=>true)),'onchange'=>'updatemode()'));
									}
									else
									{
										echo CHtml::dropDownList('batch_id','',array(),array('prompt'=>'Select Batch','id'=>'batchid','style'=>'width:190px;','onchange'=>'updatemode()'));
									}
                                    ?>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('report','Select Mode');?></strong></td>
                                <td>&nbsp;</td>
                                <td>
									<?php
									if(isset($_REQUEST['bid']) and $_REQUEST['bid']!=NULL)
									{
										echo CHtml::dropDownList('mode_id','',array('1'=>'Overall','2'=>'Yearly','3'=>'Monthly','4'=>'Individual'),array('prompt'=>'Select Mode','style'=>'width:190px;','onchange'=>'getmode()','id'=>'mode_id','options'=>array($_REQUEST['mode']=>array('selected'=>true)))); 
									}
									else
									{
										echo CHtml::dropDownList('mode_id','','',array('prompt'=>'Select Mode','style'=>'width:190px;','id'=>'mode_id')); 
									}
                                   /* echo CHtml::dropDownList('dep_id','',array('1'=>'Overall','2'=>'Yearly','3'=>'Monthly'),array('prompt'=>'Select Mode','style'=>'width:160px;','options'=>array($dep_id=>array('selected'=>true)),'id'=>'mode_id','submit'=>array('/report/default/employeeattendance')));*/
                                    ?>
                                </td>
                            </tr>
                            
                            <?php
							if($_REQUEST['mode']==2)
							{
								$year_style = "display:table-row";
								$month_style = "display:none";
								$individual_style = "display:none";
								$filler_style = "display:table-row";
							}
							elseif($_REQUEST['mode']==3)
							{
								$year_style = "display:none";
								$month_style = "display:table-row";
								$individual_style = "display:none";
								$filler_style = "display:table-row";
							}
							elseif($_REQUEST['mode']==4)
							{
								$year_style = "display:none";
								$month_style = "display:none";
								$individual_style = "display:table-row";
								$filler_style = "display:table-row";
							}
							else
							{
								$year_style = "display:none";
								$month_style = "display:none";
								$individual_style = "display:none";
								$filler_style = "display:none";
							}
							?>
                            
                            <tr id="filler" style=" <?php echo $filler_style; ?> ">
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                           
                            <!-- ROW TO SELECT YEAR -->
                             <tr id="year" style=" <?php echo $year_style; ?> ">
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('report','Select Year');?></strong></td>
                                <td>&nbsp;</td>
                                <td>
                                	<?php
									$yearNow = date("Y");
									$yearFrom = $yearNow - 20;
									$arrYears = array();
									foreach (range($yearFrom, $yearNow) as $number) 
									{
										 $arrYears[$number] = $number; 
									 }
									 
									$arrYears = array_reverse($arrYears, true);
											 
									echo CHtml::dropDownList('year','',$arrYears,array('prompt'=>'Select Year','style'=>'width:190px;','id'=>'year_value','onchange'=>'getyearreport()','options'=>array($_REQUEST['year']=>array('selected'=>true))));
									?>
                                </td>
                            </tr>
                            <!-- END ROW TO SELECT YEAR -->
                            
                            <!-- ROW TO SELECT MONTH -->
                            <tr id="month" style=" <?php echo $month_style; ?> ">
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('report','Select Month');?></strong></td>
                                <td>&nbsp;</td>
                                <td>
                                    <?php 
										$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
										if($settings!=NULL)
										{
											$date=str_ireplace("d","",$settings->dateformat);
											
										}
										else
										{
											$date = 'm-y';
										}
										$this->widget('ext.EJuiMonthPicker.EJuiMonthPicker', array(
											'name' => 'month_year',
											'value'=>$_REQUEST['month'],
											'options'=>array(
												'yearRange'=>'-20:',
												'dateFormat'=>$date,
											),
											'htmlOptions'=>array(
												'onChange'=>'js:getmonthreport()',
												'id' => 'month_value',
												'style' => 'width:180px;'
											),
										));  
									?>
                                </td>
                            </tr>
                             <!-- END ROW TO SELECT MONTH -->
                             
                             <!-- ROW TO SELECT INDIVIDUAL -->
                             <tr id="individual" style=" <?php echo $individual_style; ?> ">
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('report','Select Student');?></strong></td>
                                <td>&nbsp;</td>
                                <td>
                                    <?php  $this->widget('zii.widgets.jui.CJuiAutoComplete',
											array(
											  'name'=>'name',
											  'id'=>'individual_value',
											  'source'=>$this->createUrl('/site/autocomplete'),
											  'htmlOptions'=>array('placeholder'=>'Student Name','style' => 'width:180px;'),
											  'options'=>
												 array(
													   'showAnim'=>'fold',
													   'select'=>"js:function(student,ui){
														   var course_id = document.getElementById('cid').value;
															var batch_id = document.getElementById('batchid').value;
															var mode_id = document.getElementById('mode_id').value;
															var individual_value = ui.item.id;
															individual_value = individual_value.replace(/(^\s+|\s+$)/g,'');
															window.location= 'index.php?r=report/default/studentattendance&cid='+course_id+'&bid='+batch_id+'&mode='+mode_id+'&student='+individual_value;
														 }"
														),
										
											));
									?>
                                </td>
                            </tr>
                             <!-- END ROW TO SELECT INDIVIDUAL -->
                            
                        </table>
                    </div>
                </div>
                 <!-- END DROP DOWNS -->
                 
                 
                 <!-- REPORT SECTION -->
                 
                 <?php
                if(isset($_REQUEST['bid']) and $_REQUEST['bid']!=NULL) // Checking if batch is selected
                {
					$students = Students::model()->findAll("batch_id=:x AND is_active=:y AND is_deleted=:z", array(':x'=>$_REQUEST['bid'],':y'=>1,':z'=>0));
					if($students!=NULL) // If students are present
					{
						if(isset($_REQUEST['mode']) and $_REQUEST['mode']==1) // Checking if mode == 1 (Overall Report)
						{
						?>
							<h3><?php echo Yii::t('report','Overall Student Attendance Report');?></h3>
                            <!-- Overall PDF -->
                            <div class="ea_pdf" style="top:75px;">
								<?php echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('/report/default/studentoverallpdf','id'=>$_REQUEST['bid']),array('target'=>"_blank")); ?>
							</div>
                            <!-- END Overall PDF -->
                            <!-- Overall Report Table -->
                            <div class="tablebx">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr class="tablebx_topbg">
                                        <td><?php echo Yii::t('report','Sl No');?></td>
                                        <td><?php echo Yii::t('report','Admn No');?></td>
                                        <td><?php echo Yii::t('report','Admission Date');?></td>
                                        <td><?php echo Yii::t('report','Name');?></td>
                                        <td><?php echo Yii::t('report','Leaves');?></td>
                                    </tr>
                                     <?php
									$overall_sl = 1;
									foreach($students as $student) // Displaying each student row.
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
                                        <td>
											<?php echo CHtml::link(ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name),array('/students/students/view','id'=>$student->id));?>
										</td>
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
                            <!-- END Overall Report Table -->
                            
						<?php
						} // END Checking if mode == 1 (Overall Report)
						elseif(isset($_REQUEST['mode']) and $_REQUEST['mode']==2) // Checking if mode == 2 (Yearly Report)
						{
						?>
							<h3><?php echo Yii::t('report','Yearly Student Attendance Report').' - '.$_REQUEST['year'];?></h3>
                            <!-- Yearly PDF -->
                            <div class="ea_pdf" style="top:75px;">
								<?php echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('/report/default/studentyearlypdf','id'=>$_REQUEST['bid'],'year'=>$_REQUEST['year']),array('target'=>"_blank")); ?>
							</div>
                            <!-- END Yearly PDF -->
                            <!-- Yearly Report Table -->
                            <div class="tablebx">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr class="tablebx_topbg">
                                        <td><?php echo Yii::t('report','Sl No');?></td>
                                        <td><?php echo Yii::t('report','Admn No');?></td>
                                        <td><?php echo Yii::t('report','Name');?></td>
                                        <td><?php echo Yii::t('report','Leaves');?></td>
                                    </tr>
                                    <?php
									$yearly_sl = 1;
									foreach($students as $student) // Displaying each employee row.
									{
									?>
                                    <tr>
                                    	<td style="padding-top:10px; padding-bottom:10px;"><?php echo $yearly_sl; $yearly_sl++;?></td>
                                        <td><?php echo $student->admission_no; ?></td>
                                        <td>
											<?php echo CHtml::link(ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name),array('/students/students/view','id'=>$student->id));?>
										</td>
                                         <!-- Yearly Attendance column -->
                                        <td>
                                        	<?php
											$attendances = StudentAttentance::model()->findAllByAttributes(array('student_id'=>$student->id));
											$required_year = $_REQUEST['year'];
											//$joining_year = date('Y',strtotime($employee->joining_date));
											//if($required_year >= $joining_year)
											//{
											$leaves = 0;
											foreach($attendances as $attendance)
											{
												$attendance_year = date('Y',strtotime($attendance->date));
												if($attendance_year == $required_year)
												{
													$leaves++;
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
                            <!-- END Yearly Report Table -->
						<?php
						} // END Checking if mode == 2 (Yearly Report)
						elseif(isset($_REQUEST['mode']) and $_REQUEST['mode']==3) // Checking if mode == 3 (Monthly Report)
						{
						?>
							<h3><?php echo Yii::t('report','Monthly Student Attendance Report').' - '.$_REQUEST['month'];?></h3>
                            <!-- Monthly PDF -->
                            <div class="ea_pdf" style="top:75px;">
								<?php echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('/report/default/studentmonthlypdf','id'=>$_REQUEST['bid'],'month'=>$_REQUEST['month']),array('target'=>"_blank")); ?>
							</div>
                            <!-- END Monthly PDF -->
                            <!-- Monthly Report Table -->
                            <div class="tablebx">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr class="tablebx_topbg">
                                        <td><?php echo Yii::t('report','Sl No');?></td>
                                        <td><?php echo Yii::t('report','Admn No');?></td>
                                        <td><?php echo Yii::t('report','Name');?></td>
                                        <td><?php echo Yii::t('report','Leaves');?></td>
                                    </tr>
                                     <?php
									$monthly_sl = 1;
									foreach($students as $student) // Displaying each employee row.
									{
									?>
                                    <tr>
                                    	<td style="padding-top:10px; padding-bottom:10px;"><?php echo $monthly_sl; $monthly_sl++;?></td>
                                        <td><?php echo $student->admission_no; ?></td>
                                        <td>
											<?php echo CHtml::link(ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name),array('/students/students/view','id'=>$student->id));?>
										</td>
                                         <!-- Monthly Attendance column -->
                                        <td>
                                        	<?php
											$attendances = StudentAttentance::model()->findAllByAttributes(array('student_id'=>$student->id));
											$required_month = date('Y-m',strtotime($_REQUEST['month']));
											//$joining_month = date('Y-m',strtotime($employee->joining_date));
											//if($required_month >= $joining_month)
											//{
											$leaves = 0;
											foreach($attendances as $attendance)
											{
												$attendance_month = date('Y-m',strtotime($attendance->date));
												if($attendance_month == $required_month)
												{
													$leaves++;
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
                                        <!-- End Monthly Attendance column -->
                                    </tr>
                                    <?php
									}
									?>
								</table>
                            </div>
                            <!-- END Monthly Report Table -->
						<?php
						} // END Checking if mode == 3 (Monthly Report)
						elseif(isset($_REQUEST['mode']) and $_REQUEST['mode']==4) // Checking if mode == 4 (Individual Report)
						{
                        	$individual = Students::model()->findByAttributes(array('id'=>$_REQUEST['student'],'batch_id'=>$_REQUEST['bid'],'is_active'=>1,'is_deleted'=>0));
						?>
	                        <h3><?php echo Yii::t('report','Individual Student Attendance Report');?></h3>
                        <?php
							if($individual!=NULL) // Checking if employee present in the department selected
							{
						?>
                                
                                <!-- Individual PDF -->
                                <div class="ea_pdf" style="top:75px;">
                                   <?php echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('/report/default/studentindividualpdf','id'=>$_REQUEST['bid'],'student'=>$_REQUEST['student']),array('target'=>"_blank")); ?>
                                </div>
                                <!-- END Individual PDF -->
                                <!-- Individual Details -->
                                <div class="formCon">
                                    <div class="formConInner">
                                        <table>
                                            <tr>
                                                <td style="width:100px;">
                                                    <strong><?php echo Yii::t('report','Name'); ?></strong>
                                                </td>
                                                <td style="width:10px;">
                                                    <strong>:</strong>
                                                </td>
                                                <td style="width:200px;">
                                                    <?php echo CHtml::link(ucfirst($individual->first_name).'  '.ucfirst($individual->middle_name).'  '.ucfirst($individual->last_name),array('/students/students/view','id'=>$individual->id));?>
                                                </td>
                                                <td style="width:110px;">
                                                    <strong><?php echo Yii::t('report','Admission Number'); ?></strong>
                                                </td>
                                               <td style="width:10px;">
                                                    <strong>:</strong>
                                                </td>
                                                <td style="width:200px;">
                                                    <?php echo $individual->admission_no; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong><?php echo Yii::t('report','Admission Date'); ?></strong>
                                                </td>
                                               <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($individual->admission_date!=NULL)
                                                    {
                                                        $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
                                                        if($settings!=NULL)
                                                        {	
                                                            $individual->admission_date=date($settings->displaydate,strtotime($individual->admission_date));
                                                        }
                                                        echo $individual->admission_date; 
                                                    }
                                                    else
                                                    {
                                                        echo '-';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <strong><?php echo Yii::t('report','Leaves Taken'); ?></strong>
                                                </td>
                                               <td>
                                                    <strong>:</strong>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $leaves = StudentAttentance::model()->findAll('student_id=:x ORDER BY date ASC',array(':x'=>$individual->id));
													echo count($leaves);
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- END Individual Details -->                            
                                
                                <!-- Individual Report Table -->
                                <div class="tablebx">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr class="tablebx_topbg">
                                            <td><?php echo Yii::t('report','Sl No');?></td>
                                            <td><?php echo Yii::t('report','Leave Date');?></td>
                                            <td><?php echo Yii::t('report','Reason');?></td>
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
														$leave->date = date($settings->displaydate,strtotime($leave->date));
													}
													echo $leave->date; 
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
							} //END Checking if student present in the department selected
							else
							{
						?>
								<div class="yellow_bx" style="background-image:none;width:90%;padding-bottom:45px;">
									<div class="y_bx_head">
										No such student present in this batch. Try searching other batches.
									</div>      
								</div>
						<?php
							}
						} // END Checking if mode == 3 (Monthly Report)
						else // If no mode is set
						{
						
						} // END If no mode is set
						
					} // END If students is present
					else
					{
					?>
						<div class="yellow_bx" style="background-image:none;width:90%;padding-bottom:45px;">
							<div class="y_bx_head">
								No students present in this batch. Try searching other departments.
							</div>      
						</div>
					<?php
					}
					   
				} // END Checking if batch is selected
                ?>
              
                <!-- END REPORT SECTION -->
               
            </div>
             <!-- END div class="cont_right" -->
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>