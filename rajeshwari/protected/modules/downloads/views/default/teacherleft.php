  <div id="parent_leftSect">
       
        	<ul>
            <li>
            <?php
			if(Yii::app()->controller->module->id=='mailbox' and  Yii::app()->controller->id!='news')
			{
				echo CHtml::link(Yii::t('teachersportal','Messages'),array('/mailbox'),array('class'=>'mssg_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','Messages'),array('/mailbox'),array('class'=>'mssg'));
			}
			?>
           </li>
            <li>
            <?php
			if(Yii::app()->controller->id=='news')
			{
				echo CHtml::link(Yii::t('teachersportal','News'),array('/mailbox/news'),array('class'=>'news_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','News'),array('/mailbox/news'),array('class'=>'news'));
			}
			?>
           </li>
               <li>
            <?php
			if(Yii::app()->controller->action->id=='events')
			{
				echo CHtml::link(Yii::t('teachersportal','Events'),array('/dashboard/default/events'),array('class'=>'events_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','Events'),array('/dashboard/default/events'),array('class'=>'events'));
			}
           ?>
            </li>
              <li>
            <?php
			if(Yii::app()->controller->action->id=='eventlist')
			{
				echo CHtml::link(Yii::t('teachersportal','Calender'),array('/teachersportal/default/eventlist'),array('class'=>'cal_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','Calender'),array('/teachersportal/default/eventlist'),array('class'=>'cal'));
			}
           
			?>
            </li>
              <li>
           <?php
		   	if(Yii::app()->controller->id=='teachers' and Yii::app()->controller->module->id=='downloads')
			{
				echo CHtml::link(Yii::t('teachersportal','Downloads'),array('/downloads/teachers'),array('class'=>'downloads_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','Downloads'),array('/downloads/teachers'),array('class'=>'downloads'));
			}
		   ?>
           </li> 
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='profile')
			{
				echo CHtml::link(Yii::t('teachersportal','Profile'),array('/teachersportal/default/profile'),array('class'=>'profile_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','Profile'),array('/teachersportal/default/profile'),array('class'=>'profile'));
			}
		   ?>
           </li>
             <li>
           <?php
		   	if(Yii::app()->controller->action->id=='attendance')
			{
				echo CHtml::link(Yii::t('teachersportal','Attendance'),array('/teachersportal/default/attendance'),array('class'=>'attendance_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','Attendance'),array('/teachersportal/default/attendance'),array('class'=>'attendance'));
			}
		   ?>
           </li>  
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='timetable')
			{
				echo CHtml::link(Yii::t('teachersportal','TimeTable'),array('/teachersportal/default/timetable'),array('class'=>'timetable_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','TimeTable'),array('/teachersportal/default/timetable'),array('class'=>'timetable'));
			}
		   ?>
           </li> 
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='examination' or Yii::app()->controller->action->id=='allexam' or Yii::app()->controller->action->id=='classexam')
			{
				echo CHtml::link(Yii::t('teachersportal','Exams'),array('/teachersportal/default/examination'),array('class'=>'exams_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('teachersportal','Exams'),array('/teachersportal/default/examination'),array('class'=>'exams'));
			}
		   ?>
           </li> 
           
            <li>
           <?php
		   		if(Yii::app()->controller->module->id == 'user')
				{
					echo CHtml::link(Yii::t('teachersportal','Settings'),array('/user/profile'),array('class'=>'settings_active'));
				}
				else
				{
		   			echo CHtml::link(Yii::t('teachersportal','Settings'),array('/user/profile'),array('class'=>'settings'));
				}
		   ?>
           </li>    
         
           </ul>
      
        </div>