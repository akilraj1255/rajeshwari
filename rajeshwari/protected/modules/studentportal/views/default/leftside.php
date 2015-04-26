  <div id="parent_leftSect">
       
        	<ul>
            <li>
            <?php
			if(Yii::app()->controller->module->id=='mailbox' and  Yii::app()->controller->id!='news')
			{
				echo CHtml::link(Yii::t('studentportal','Messages'),array('/mailbox'),array('class'=>'mssg_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Messages'),array('/mailbox'),array('class'=>'mssg'));
			}
			?>
           </li>
           <li>
            <?php
			if(Yii::app()->controller->id=='news')
			{
				echo CHtml::link(Yii::t('studentportal','News'),array('/mailbox/news'),array('class'=>'news_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','News'),array('/mailbox/news'),array('class'=>'news'));
			}
			?>
           </li>
             <li>
            <?php
			if(Yii::app()->controller->action->id=='events')
			{
				echo CHtml::link(Yii::t('studentportal','Events'),array('/dashboard/default/events'),array('class'=>'events_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Events'),array('/dashboard/default/events'),array('class'=>'events'));
			}
           
			?>
            </li>
            <li>
            <?php
			if(Yii::app()->controller->action->id=='eventlist')
			{
				echo CHtml::link(Yii::t('studentportal','Calender'),array('/studentportal/default/eventlist'),array('class'=>'cal_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Calender'),array('/studentportal/default/eventlist'),array('class'=>'cal'));
			}
           
			?>
            </li>
            <li>
           <?php
		   		if(Yii::app()->controller->module->id=='downloads' || Yii::app()->controller->id=='students' || Yii::app()->controller->action->id=='authordetails')
			{
				echo CHtml::link(Yii::t('studentportal','Downloads'),array('/downloads/students'),array('class'=>'downloads_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Downloads'),array('/downloads/students'),array('class'=>'downloads'));
			}
		   ?>
           </li> 
           <li>
           <?php
		   	if(Yii::app()->controller->id == 'default' and (Yii::app()->controller->action->id=='profile' or Yii::app()->controller->action->id=='documentupdate'))
			{
				echo CHtml::link(Yii::t('studentportal','Profile'),array('/studentportal/default/profile'),array('class'=>'profile_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Profile'),array('/studentportal/default/profile'),array('class'=>'profile'));
			}
		   ?>
           </li>
             <li>
           <?php
		   	if(Yii::app()->controller->action->id=='attendance')
			{
				echo CHtml::link(Yii::t('studentportal','Attendance'),array('/studentportal/default/attendance'),array('class'=>'attendance_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Attendance'),array('/studentportal/default/attendance'),array('class'=>'attendance'));
			}
		   ?>
           </li>   
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='timetable')
			{
				echo CHtml::link(Yii::t('studentportal','TimeTable'),array('/studentportal/default/timetable'),array('class'=>'timetable_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','TimeTable'),array('/studentportal/default/timetable'),array('class'=>'timetable'));
			}
		   ?>
           </li>   
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='fees')
			{
				echo CHtml::link(Yii::t('studentportal','Fees'),array('/studentportal/default/fees'),array('class'=>'fees_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Fees'),array('/studentportal/default/fees'),array('class'=>'fees'));
			}
		   ?>
           </li>   
             
                  <li>
           <?php
		   	if(Yii::app()->controller->action->id=='exams')
			{
				echo CHtml::link(Yii::t('studentportal','Exams'),array('/studentportal/default/exams'),array('class'=>'exams_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Exams'),array('/studentportal/default/exams'),array('class'=>'exams'));
			}
		   ?>
           </li>     
              <li>
           <?php
		   		if(Yii::app()->controller->action->id=='manage' || Yii::app()->controller->action->id=='booksearch' || Yii::app()->controller->action->id=='authordetails')
			{
				echo CHtml::link(Yii::t('studentportal','Library'),array('/library/book/manage'),array('class'=>'library_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Library'),array('/library/book/manage'),array('class'=>'library'));
			}
		   ?>
           </li>        
             <li>
           <?php
		   		if(Yii::app()->controller->action->id=='manage' || Yii::app()->controller->action->id=='booksearch' || Yii::app()->controller->action->id=='authordetails')
			{
				echo CHtml::link(Yii::t('studentportal','Hostel'),array('/hostel'),array('class'=>'report_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('studentportal','Hostel'),array('/hostel'),array('class'=>'report'));
			}
		   ?>
           </li>
           
           <li>
           <?php
		   		if(Yii::app()->controller->module->id == 'user')
				{
					echo CHtml::link(Yii::t('studentportal','Settings'),array('/user/profile'),array('class'=>'settings_active'));
				}
				else
				{
		   			echo CHtml::link(Yii::t('studentportal','Settings'),array('/user/profile'),array('class'=>'settings'));
				}
		   ?>
           </li>                      
            </ul>
      
        </div>