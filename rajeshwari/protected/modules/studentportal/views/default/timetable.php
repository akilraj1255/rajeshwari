<div id="parent_Sect">
        <?php $this->renderPartial('leftside');?> 
      
        <div id="parent_rightSect">
        	<div class="parentright_innercon">
            <h1><?php echo Yii::t('studentportal','Timetable');?></h1>
            
       		<?php
			$student=Students::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
			$times=Batches::model()->findAll("id=:x", array(':x'=>$student->batch_id));
			$weekdays=Weekdays::model()->findAll("batch_id=:x", array(':x'=>$student->batch_id));
			if(count($weekdays)==0)
			$weekdays=Weekdays::model()->findAll("batch_id IS NULL");
			 $timing = ClassTimings::model()->findAll("batch_id=:x", array(':x'=>$student->batch_id));
	  		$count_timing = count($timing);
			if($timing!=NULL)
			{
			?>
         <div class="timetable" style="margin-top:10px;">
         <table border="0" align="center" width="100%" id="table" cellspacing="0">
    <tbody><tr>
	
      <td class="loader">&nbsp;
        
        </td><!--timetable_td_tl -->
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
        
      
    </tr> <!-- timetable_tr -->
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
    <?php if($weekdays[0]['weekday']!=0)
	{ ?>
    <tr>
        <td class="td"><div class="name"><?php echo Yii::t('weekdays','SUN');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo '<td class="td">
					<div  onclick="" style="position: relative; ">
					
					  <div class="tt-subject">
						<div class="subject">'; ?>
			<?php
$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$student->batch_id,'weekday_id'=>$weekdays[0]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break!=NULL)
					{	
						echo Yii::t('studentportal','Break');	
					}
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){
				if($time_sub->elective_group_id!=0 and $time_sub->elective_group_id!=NULL)
				{
										
					$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
					if($student_elective!=NULL)
					{
						$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$time_sub->elective_group_id));
						if($electname!=NULL)
						{
							echo $electname->name.'<br>';
						}
					}
									
										
				}
				else
				{
					echo $time_sub->name.'<br>';
				}
				}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
		
				}
		 ?>
					<?php echo 	'</div>
						
					  </div>
					</div>
					<div id="jobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'].'"></div>
				  </td>';  
			  }
			  ?>
        
          
        
      </tr>
      <?php } 
	  if($weekdays[1]['weekday']!=0)
	  { ?>
      <tr>
        <td class="td"><div class="name"><?php echo Yii::t('studentportal','MON');?></div></td>
        <td class="td-blank"></td>
        	 <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
		$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$student->batch_id,'weekday_id'=>$weekdays[1]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break!=NULL)
					{	
						echo Yii::t('studentportal','Break');	
					}
				}
				else
				{
					
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				
				if($time_sub!=NULL){
				if($time_sub->elective_group_id!=0 and $time_sub->elective_group_id!=NULL)
				{
										
					$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
					if($student_elective!=NULL)
					{
						$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$time_sub->elective_group_id));
						if($electname!=NULL)
						{
							echo $electname->name.'<br>';
						}
					}
									
										
				}
				else
				{
					echo $time_sub->name.'<br>';
				}
				}
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				
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
      <?php } 
	  if($weekdays[2]['weekday']!=0)
	  {
	  ?>
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('studentportal','TUE');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$student->batch_id,'weekday_id'=>$weekdays[2]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break!=NULL)
					{	
						echo Yii::t('studentportal','Break');	
					}	
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){
				if($time_sub->elective_group_id!=0 and $time_sub->elective_group_id!=NULL)
				{
										
					$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
					if($student_elective!=NULL)
					{
						$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$time_sub->elective_group_id));
						if($electname!=NULL)
						{
							echo $electname->name.'<br>';
						}
					}
									
										
				}
				else
				{
					echo $time_sub->name.'<br>';
				}
				}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				
				}

							
						echo	'</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php }
	  if($weekdays[3]['weekday']!=0)
	  { ?>
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('studentportal','WED');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$student->batch_id,'weekday_id'=>$weekdays[3]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break!=NULL)
					{	
						echo Yii::t('studentportal','Break');	
					}	
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){
				if($time_sub->elective_group_id!=0 and $time_sub->elective_group_id!=NULL)
				{
										
					$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
					if($student_elective!=NULL)
					{
						$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$time_sub->elective_group_id));
						if($electname!=NULL)
						{
							echo $electname->name.'<br>';
						}
					}
									
										
				}
				else
				{
					echo $time_sub->name.'<br>';
				}
				}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
					
				}
							echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php }
	  if($weekdays[4]['weekday']!=0)
	  {  ?>
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('studentportal','THU');?></div></td>
        <td class="td-blank"></td>
          <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
				$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$student->batch_id,'weekday_id'=>$weekdays[4]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break!=NULL)
					{	
						echo Yii::t('studentportal','Break');	
					}	
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){
				if($time_sub->elective_group_id!=0 and $time_sub->elective_group_id!=NULL)
				{
										
					$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
					if($student_elective!=NULL)
					{
						$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$time_sub->elective_group_id));
						if($electname!=NULL)
						{
							echo $electname->name.'<br>';
						}
					}
									
										
				}
				else
				{
					echo $time_sub->name.'<br>';
				}
				}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				
				}
							
						echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php }
	  if($weekdays[5]['weekday']!=0)
	  { ?>
	  
          <tr>
        <td class="td"><div class="name"><?php echo Yii::t('studentportal','FRI');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
				$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$student->batch_id,'weekday_id'=>$weekdays[5]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break!=NULL)
					{	
						echo Yii::t('studentportal','Break');	
					}	
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){
				if($time_sub->elective_group_id!=0 and $time_sub->elective_group_id!=NULL)
				{
										
					$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
					if($student_elective!=NULL)
					{
						$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$time_sub->elective_group_id));
						if($electname!=NULL)
						{
							echo $electname->name.'<br>';
						}
					}
									
										
				}
				else
				{
					echo $time_sub->name.'<br>';
				}
				}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				
				}
							echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr><!--timetable_tr -->
      <?php } 
	  if($weekdays[6]['weekday']!=0)
	  { ?>
      <tr>
        <td class="td"><div class="name"><?php echo Yii::t('studentportal','SAT');?></div></td>
        <td class="td-blank"></td>
          <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$student->batch_id,'weekday_id'=>$weekdays[6]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break!=NULL)
					{	
						echo Yii::t('studentportal','Break');	
					}	
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){
				if($time_sub->elective_group_id!=0 and $time_sub->elective_group_id!=NULL)
				{
										
					$student_elective = StudentElectives::model()->findByAttributes(array('student_id'=>$student->id));
					if($student_elective!=NULL)
					{
						$electname = Electives::model()->findByAttributes(array('id'=>$student_elective->elective_id,'elective_group_id'=>$time_sub->elective_group_id));
						if($electname!=NULL)
						{
							echo $electname->name.'<br>';
						}
					}
									
										
				}
				else
				{
					echo $time_sub->name.'<br>';
				}
				}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				
				}
							echo '</div>
							
						  </div>
						</div>
						<div id="jobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'].'"></div>
					  </td>';  
			 }
			?><!--timetable_td -->
        
      </tr>
    <?php } ?>
  </tbody></table>
          </div>
         <?php
			}
			 else
	 {
		 echo '<strong>'.Yii::t('timetable','No Class Timings').'</strong>';
	 }?>
			
                
            </div>
        </div>
        <div class="clear"></div>
      </div>