<?php Yii::app()->clientScript->registerCoreScript('jquery');?>

<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?> 
	<div class="right_col"  id="req_res123">
    <!--contentArea starts Here--> 
     <div id="parent_rightSect">
        <div class="parentright_innercon">
            <h1><?php echo Yii::t('Attendance','Mark Student Attendance'); ?></h1>
            <?php $this->renderPartial('/default/employee_tab');?>
        	<div>
               <?php 
			   //If $list_flag = 1, table of batches will be displayed. If $list_flag = 0, attendance table will be displayed.
			   if($_REQUEST['id']!=NULL){
						$list_flag=0;   		
				 }
				else{
					 $employee = Employees::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
					 $batch=Batches::model()->findAll("employee_id=:x AND is_active=:y AND is_deleted=:z", array(':x'=>$employee->id,':y'=>1,':z'=>0));
					 if(count($batch)>1){
						 $list_flag = 1;
					 }
					 else{
						  $list_flag = 0;
						  $_REQUEST['id'] = $batch[0]->id;							 
					 }
				}?>	 
				 <?php if($list_flag==1){ ?>
                 		<div class="pdtab_Con">
                        <table width="80%" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                          <!--class="cbtablebx_topbg"  class="sub_act"-->
                          <tr class="pdtab-h">
                            <td align="center"><?php echo Yii::t('Courses','Batch Name');?></td>
                            <td align="center"><?php echo Yii::t('Courses','Class Teacher');?></td>
                            <td align="center"><?php echo Yii::t('Courses','Start Date');?></td>
                            <td align="center"><?php echo Yii::t('Courses','End Date');?></td>
                           
                          </tr>
                          <?php 
                          foreach($batch as $batch_1)
                                {
                                    echo '<tr id="batchrow'.$batch_1->id.'">';
                                    echo '<td style="text-align:left; padding-left:10px; font-weight:bold;">'.CHtml::link($batch_1->name, array('/teachersportal/default/studentattendance','id'=>$batch_1->id)).'</td>';
                                    $settings=UserSettings::model()->findByAttributes(array('id'=>1));
										if($settings!=NULL)
										{	
											$date1=date($settings->displaydate,strtotime($batch_1->start_date));
											$date2=date($settings->displaydate,strtotime($batch_1->end_date));
		
										}
                                    $teacher = Employees::model()->findByAttributes(array('id'=>$batch_1->employee_id));					
                                    echo '<td align="center">';
                                    if($teacher){
                                        echo $teacher->first_name.' '.$teacher->last_name;
                                    }
                                    else{
                                        echo '-';
                                    }
                                    echo '</td>';					
                                    echo '<td align="center">'.$date1.'</td>';
                                    echo '<td align="center">'.$date2.'</td>';
                                    echo '</tr>';
                                }
                               ?>
                         </tbody>
                        </table>
                        </div> 
                         
                <?php }
                if($list_flag==0 or isset($_REQUEST['id'])){ 
					function getweek($date,$month,$year)
					{
						$date = mktime(0, 0, 0,$month,$date,$year); 
						$week = date('w', $date); 
						switch($week) {
							case 0: 
							return 'S<br>';
							break;
							case 1: 
							return 'M<br>';
							break;
							case 2: 
							return 'T<br>';
							break;
							case 3: 
							return 'W<br>';
							break;
							case 4: 
							return 'T<br>';
							break;
							case 5: 
							return 'F<br>';
							break;
							case 6: 
							return 'S<br>';
							break;
						}
					}
					$model = new EmployeeAttendances;
					if(!isset($_REQUEST['mon']))
					{
						$mon = date('F');
						$mon_num = date('n');
						$curr_year = date('Y');
					}
					else
					{
						$mon = $model->getMonthname($_REQUEST['mon']);
						$mon_num = $_REQUEST['mon'];
						$curr_year = $_REQUEST['year'];
					}
					$num = cal_days_in_month(CAL_GREGORIAN, $mon_num, $curr_year);
				?>
                	<div class="atdn_div">
                    	<div class="name_div">
                    	<?php 
						$batch_name = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
						$course_name = Courses::model()->findByAttributes(array('id'=>$batch_name->course_id));
						echo Yii::t('attendance','Course Name').':'.$course_name->course_name.'<br/>'; 	
						echo Yii::t('attendance','Batch Name').':'.$batch_name->name; ?>
                        </div>
                        <div align="center" class="atnd_tnav">
                        <?php 
                        echo CHtml::link('<div class="atnd_arow_l"><img src="images/atnd_arrow-l.png" width="7" border="0"  height="13" /></div>', array('studentattendance', 'mon'=>date("m",strtotime($curr_year."-".$mon_num."-01 -1 months")),'year'=>date("Y",strtotime($curr_year."-".$mon_num."-01 -1 months")),'id'=>$_REQUEST['id'])); 
                        echo $mon.'&nbsp;&nbsp;&nbsp; '.$curr_year; 
                        
                        echo CHtml::link('<div class="atnd_arow_r"><img src="images/atnd_arrow.png" width="7" border="0"  height="13" /></div>', array('studentattendance', 'mon'=>date("m",strtotime($curr_year."-".$mon_num."-01 +1 months")),'year'=>date("Y",strtotime($curr_year."-".$mon_num."-01 +1 months")),'id'=>$_REQUEST['id']));?>
                        </div> <!-- End top navigation div -->
                        <div class="atnd_Con" style="margin:25px 0px 0px -16px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th><?php echo Yii::t('attendance','Name');?></th>
                            <?php
                            for($i=1;$i<=$num;$i++)
                            {
                                echo '<th>'.getweek($i,$mon_num,$curr_year).'<span>'.$i.'</span></th>';
                            }
                            ?>
                        </tr>
                        <?php $posts=Students::model()->findAll("batch_id=:x and is_active=:y and is_deleted=:z ORDER BY first_name", array(':x'=>$_REQUEST['id'],':y'=>1,':z'=>0));
								foreach($posts as $posts_1)
								{
									echo '<tr>';
										echo '<td class="name">'.$posts_1->first_name.'</td>';
										for($i=1;$i<=$num;$i++)
										{
											echo '<td><span  id="td'.$i.$posts_1->id.'">';
											echo  $this->renderPartial('attendance/ajax',array('day'=>$i,'month'=>$mon_num,'year'=>$curr_year,'emp_id'=>$posts_1->id));
											echo '</span><div  id="jobDialog123'.$i.$posts_1->id.'"></div></td>';
											echo '</span><div  id="jobDialogupdate'.$i.$posts_1->id.'"></div></td>';
										}
									echo '</tr>';
								}
						?>
                        </table>
                        </div>
                        
					</div> <!-- End attendance div -->
                    
                <?php }?>
			</div>
		</div>
	</div>
	 <div class="clear"></div>
</div>
