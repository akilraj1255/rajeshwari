<?php Yii::app()->clientScript->registerCoreScript('jquery');?>

<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?> 
	<div class="right_col"  id="req_res123">
    <!--contentArea starts Here--> 
     <div id="parent_rightSect">
        <div class="parentright_innercon">
            <h1><?php echo Yii::t('teachersportal','View Class Time Table'); ?></h1>
            <?php $this->renderPartial('/default/employee_tab');?>
        	<div>
              <?php 
			   //If $list_flag = 1, table of batches will be displayed. If $list_flag = 0, attendance table will be displayed.
			   if($_REQUEST['id']!=NULL){
						$list_flag=0;   		
				?>
			   <?php }
				else{
					 $employee = Employees::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
					 $batch=Batches::model()->findAll("employee_id=:x AND is_active=:y AND is_deleted=:z", array(':x'=>$employee->id,':y'=>1,':z'=>0));
					 $course_name = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
					 if(count($batch)>1){
						 $list_flag = 1;
					 }
					 else{
						  $list_flag = 0;
						  $_REQUEST['id'] = $batch[0]->id;							 
					 }
				}
				?>
				<?php if($list_flag==1){ ?>
                 		<div class="pdtab_Con">
                        <table width="80%" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                          <!--class="cbtablebx_topbg"  class="sub_act"-->
                          <tr class="pdtab-h">
                            <td align="center"><?php echo Yii::t('teachersportal','Batch Name');?></td>
                            <td align="center"><?php echo Yii::t('teachersportal','Class Teacher');?></td>
                            <td align="center"><?php echo Yii::t('teachersportal','Start Date');?></td>
                            <td align="center"><?php echo Yii::t('teachersportal','End Date');?></td>
                           
                          </tr>
                          <?php 
                          foreach($batch as $batch_1)
                                {
                                    echo '<tr id="batchrow'.$batch_1->id.'">';
                                    echo '<td style="text-align:left; padding-left:10px; font-weight:bold;">'.CHtml::link($batch_1->name, array('/teachersportal/default/studenttimetable','id'=>$batch_1->id)).'</td>';
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
                         
                <?php } // End batch list table
				 if($list_flag==0 or isset($_REQUEST['id'])){ 
				 ?>
					<div class="atdn_div">
                    	<div class="name_div">
							<?php 
                            $batch_name = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
                            $course_name = Courses::model()->findByAttributes(array('id'=>$batch_name->course_id));
                            echo Yii::t('teachersportal','Course Name:').$course_name->course_name.'<br/>'; 	
                            echo Yii::t('teachersportal','Batch Name:').$batch_name->name; ?>
                        </div>
                        <div class="timetable_div">
						<?php $weekdays=Weekdays::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id'])); // Fetching weekdays
							if(count($weekdays)==0){
								$weekdays=Weekdays::model()->findAll("batch_id IS NULL"); // If weekdays are not set for a batch,fetch the default weekdays
							}
							$timing = ClassTimings::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id'])); // Fetching Class timings
	  						$count_timing = count($timing);
							if($timing!=NULL) // If class timing is set
							{
							?>
								<div class="portal_timetable">
								<table border="0" align="center" width="90%" id="table" cellspacing="0">
									<tbody>
                                    	<tr> <!-- timetable header tr -->
                                          <td class="loader">&nbsp;</td><!--timetable_td_tl -->
                                          <td class="td-blank"></td>
                                          <?php 
											foreach($timing as $timing_1)
											{
												
												$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
												if($settings!=NULL)
												{	
													$time1=date($settings->timeformat,strtotime($timing_1->start_time));
													$time2=date($settings->timeformat,strtotime($timing_1->end_time));
													
						
												}
											echo '<td class="td"><div class="top">'.$time1.' - '.$time2.'</div></td>';	
											//echo '<td class="td"><div class="top">'.$timing_1->start_time.' - '.$timing_1->end_time.'</div></td>';	
											}
                                           ?>
										</tr> <!-- End timetable header tr -->
                                        <tr class="blank">
                                            <td></td>
                                            <td></td>
                                              <?php
                                              for($i=0;$i<$count_timing;$i++)
                                              {
                                                echo '<td></td>';  
                                              }
                                              ?>
                                        </tr>
									<?php if($weekdays[0]['weekday']!=0) // If sunday is working
                                   		 { ?>
                                         <tr>
                                            <td class="td"><div class="name"><?php echo Yii::t('teachersportal','SUN');?></div></td>
                                            <td class="td-blank"></td>
                                             <?php
                                                  for($i=0;$i<$count_timing;$i++)
                                                  {
                                                    echo '<td class="td">
															<div  onclick="" style="position: relative; ">
															  <div class="tt-subject">
																<div class="subject">'; ?>
                                                <?php
                                   					 $set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[0]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
                                                    if(count($set)==0)
                                                    {	
                                                        $is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
														if($is_break!=NULL)
														{	
															echo Yii::t('teachersportal','Break');	
														}	
                                                    }
                                                    else
                                                    {	
                                                    $time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
                                                    if($time_sub!=NULL){echo $time_sub->name.'<br>';}
                                                    $time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
                                                    if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
                                                    }
                                             		echo 	'</div> 
                                                          </div>
                                                        </div>
                                                        <div id="jobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'].'"></div>
                                                      </td>';  
                                                  }
                                                  ?>
                                          </tr>
									<?php } // End If sunday is working 
										 if($weekdays[1]['weekday']!=0) // If monday is working.
										{ ?>
                                        <tr>
                                            <td class="td"><div class="name"><?php echo Yii::t('teachersportal','MON');?></div></td>
                                            <td class="td-blank"></td>
                                                 <?php
                                                  for($i=0;$i<$count_timing;$i++)
                                                  {
                                                    echo ' <td class="td">
                                                            <div  onclick="" style="position: relative; ">
                                                              <div class="tt-subject">
                                                                <div class="subject">';
                                            $set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[1]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
                                                    if(count($set)==0)
                                                    {	
                                                        $is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
														if($is_break!=NULL)
														{	
															echo Yii::t('teachersportal','Break');	
														}	
                                                    }
                                                    else
                                                    {		
                                                    $time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
                                                    $time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
                                                    if($time_sub!=NULL){echo $time_sub->name.'<br>';}
                                                    if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
                                                    echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'are you sure?','class'=>'delete'));
                                                    }
                                    
                                                            echo '</div>
                                                              </div>
                                                            </div>
                                                            <div id="jobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'].'"></div>
                                                          </td>';  
                                                 }
                                                ?>
                                              <!--timetable_td -->
                                          </tr><!--timetable_tr -->
									<?php } // End If monday is working.
										if($weekdays[2]['weekday']!=0) // If tuesday is working.
										{ ?>
                                        <tr>
                                            <td class="td"><div class="name"><?php echo Yii::t('teachersportal','TUE');?></div></td>
                                            <td class="td-blank"></td>
                                             <?php
                                                  for($i=0;$i<$count_timing;$i++)
                                                  {
                                                    echo ' <td class="td">
                                                            <div  onclick="" style="position: relative; ">
                                                              <div class="tt-subject">
                                                                <div class="subject">';
                                                                $set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[2]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
                                                    if(count($set)==0)
                                                    {	
                                                        $is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
														if($is_break!=NULL)
														{	
															echo Yii::t('teachersportal','Break');	
														}	
                                                    }
                                                    else
                                                    {	
                                                    $time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
                                                    if($time_sub!=NULL){echo $time_sub->name.'<br>';}
                                                    $time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
                                                    if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
                                                    echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'are you sure?','class'=>'delete'));
                                                    }
                                    
                                                                
                                                            echo	'</div>
                                                                
                                                              </div>
                                                            </div>
                                                            <div id="jobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'].'"></div>
                                                          </td>';  
                                                 }
                                                ?><!--timetable_td -->
                                            
                                          </tr>
									<?php } // End If tuesday is working.
										if($weekdays[3]['weekday']!=0) // If wednesday is working.
	  									{ ?>
                                        <tr>
                                            <td class="td"><div class="name"><?php echo Yii::t('teachersportal','WED');?></div></td>
                                            <td class="td-blank"></td>
                                             <?php
                                                  for($i=0;$i<$count_timing;$i++)
                                                  {
                                                    echo ' <td class="td">
                                                            <div  onclick="" style="position: relative; ">
                                                              <div class="tt-subject">
                                                                <div class="subject">';
                                                                $set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[3]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
                                                    if(count($set)==0)
                                                    {	
                                                        $is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
														if($is_break!=NULL)
														{	
															echo Yii::t('teachersportal','Break');	
														}	
                                                    }
                                                    else
                                                    {	
                                                    $time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
                                                    if($time_sub!=NULL){echo $time_sub->name.'<br>';}
                                                    $time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
                                                    if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
                                                    echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'are you sure?','class'=>'delete'));	
                                                    }
                                                                echo '</div>
                                                                
                                                              </div>
                                                            </div>
                                                            <div id="jobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'].'"></div>
                                                          </td>';  
                                                 }
                                                ?><!--timetable_td -->
                                            
                                          </tr>
									<?php } // End if wednesday is working.
										 if($weekdays[4]['weekday']!=0) // If thursday is working
	 									 {  ?>
                                         <tr>
                                            <td class="td"><div class="name"><?php echo Yii::t('teachersportal','THU');?></div></td>
                                            <td class="td-blank"></td>
                                              <?php
                                                  for($i=0;$i<$count_timing;$i++)
                                                  {
                                                    echo ' <td class="td">
                                                            <div  onclick="" style="position: relative; ">
                                                              <div class="tt-subject">
                                                                <div class="subject">';
                                                    $set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[4]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
                                                    if(count($set)==0)
                                                    {	
                                                        $is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
														if($is_break!=NULL)
														{	
															echo Yii::t('teachersportal','Break');	
														}	
                                                    }
                                                    else
                                                    {	
                                                    $time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
                                                    if($time_sub!=NULL){echo $time_sub->name.'<br>';}
                                                    $time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
                                                    if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
                                                    echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'are you sure?','class'=>'delete'));
                                                    }
                                                                
                                                            echo '</div>
                                                                
                                                              </div>
                                                            </div>
                                                            <div id="jobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'].'"></div>
                                                          </td>';  
                                                 }
                                                ?><!--timetable_td -->
                                            
                                          </tr>
									<?php } // End If thursday is working
									if($weekdays[5]['weekday']!=0) // If friday is working
									{ ?>
                                    <tr>
                                        <td class="td"><div class="name"><?php echo Yii::t('teachersportal','FRI');?></div></td>
                                        <td class="td-blank"></td>
                                         <?php
                                              for($i=0;$i<$count_timing;$i++)
                                              {
                                                echo ' <td class="td">
                                                        <div  onclick="" style="position: relative; ">
                                                          <div class="tt-subject">
                                                            <div class="subject">';
                                                $set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[5]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
                                                if(count($set)==0)
												{	
													$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
													if($is_break!=NULL)
													{	
														echo Yii::t('teachersportal','Break');	
													}	
												}
												else
												{	
                                                $time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
                                                if($time_sub!=NULL){echo $time_sub->name.'<br>';}
                                                $time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
                                                if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
                                                echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'are you sure?','class'=>'delete'));
                                                }
                                                            echo '</div>
                                                            
                                                          </div>
                                                        </div>
                                                        <div id="jobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'].'"></div>
                                                      </td>';  
                                             }
                                            ?><!--timetable_td -->
                                        
                                      </tr>
								<?php } // End if friday is working
								if($weekdays[6]['weekday']!=0) // If Saturday is working
	  							{ ?>
                                <tr>
                                    <td class="td"><div class="name"><?php echo Yii::t('teachersportal','SAT');?></div></td>
                                    <td class="td-blank"></td>
                                      <?php
                                          for($i=0;$i<$count_timing;$i++)
                                          {
                                            echo ' <td class="td">
                                                    <div  onclick="" style="position: relative; ">
                                                      <div class="tt-subject">
                                                        <div class="subject">';
                                                        $set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[6]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
                                            if(count($set)==0)
											{	
												$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
												if($is_break!=NULL)
												{	
													echo Yii::t('teachersportal','Break');	
												}	
											}
											else
											{	
                                            $time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
                                            if($time_sub!=NULL){echo $time_sub->name.'<br>';}
                                            $time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
                                            if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
                                            echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'are you sure?','class'=>'delete'));
                                            }
                                                        echo '</div>
                                                        
                                                      </div>
                                                    </div>
                                                    <div id="jobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'].'"></div>
                                                  </td>';  
                                         }
                                        ?><!--timetable_td -->
                                    
                                  </tr>
								<?php } // End if Saturday is working
								?>
									</tbody>
								</table>
								</div>
								
						<?php } // End if timing is set
							else // If no class timings set
							 {
								 ?>
								 <div class="yellow_bx" style="background-image:none;width:90%;padding-bottom:45px;">
                                    <div class="y_bx_head">
                                        <?php echo Yii::t('teachersportal','No timetable set for this batch!'); ?>
                                    </div>      
                                </div>
							<?php	 
							 }
                        ?>
                        </div> <!-- End timetable div (timetable_div)-->
					</div> <!-- End entire div (atdn_div) -->
				<?php } // End individual timetable
				?>	 
                
			</div>
		</div>
	</div>
	 <div class="clear"></div>
</div>
