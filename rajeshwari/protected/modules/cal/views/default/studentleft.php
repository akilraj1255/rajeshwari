  <div id="parent_leftSect">
       
        	<ul>
            <li>
            <?php
			if(Yii::app()->controller->module->id=='mailbox' and  Yii::app()->controller->id!='news')
			{
				echo CHtml::link(Yii::t('cal','Messages'),array('/mailbox'),array('class'=>'mssg_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','Messages'),array('/mailbox'),array('class'=>'mssg'));
			}
			?>
           </li>
           <li>
            <?php
			if(Yii::app()->controller->id=='news')
			{
				echo CHtml::link(Yii::t('cal','News'),array('/mailbox/news'),array('class'=>'news_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','News'),array('/mailbox/news'),array('class'=>'news'));
			}
			?>
           </li>
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='profile')
			{
				echo CHtml::link(Yii::t('cal','Profile'),array('/studentportal/default/profile'),array('class'=>'profile_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','Profile'),array('/studentportal/default/profile'),array('class'=>'profile'));
			}
		   ?>
           </li>
             <li>
           <?php
		   	if(Yii::app()->controller->action->id=='attendance')
			{
				echo CHtml::link(Yii::t('cal','Attendance'),array('/studentportal/default/attendance'),array('class'=>'attendance_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','Attendance'),array('/studentportal/default/attendance'),array('class'=>'attendance'));
			}
		   ?>
           </li>
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='timetable')
			{
				echo CHtml::link(Yii::t('cal','TimeTable'),array('/studentportal/default/timetable'),array('class'=>'attendance_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','TimeTable'),array('/studentportal/default/timetable'),array('class'=>'attendance'));
			}
		   ?>
           </li>      
           <li>
           <?php
		   	if(Yii::app()->controller->action->id=='fees')
			{
				echo CHtml::link(Yii::t('cal','Fees'),array('/studentportal/default/fees'),array('class'=>'fees_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','Fees'),array('/studentportal/default/fees'),array('class'=>'fees'));
			}
		   ?>
           </li>   
             
                  <li>
           <?php
		   	if(Yii::app()->controller->action->id=='exams')
			{
				echo CHtml::link(Yii::t('cal','Exams'),array('/studentportal/default/exams'),array('class'=>'exams_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','Exams'),array('/studentportal/default/exams'),array('class'=>'exams'));
			}
		   ?>
           </li>     
              <li>
           <?php
		 
		   	if(Yii::app()->controller->action->id=='manage' || Yii::app()->controller->action->id=='booksearch' || Yii::app()->controller->action->id=='authordetails')
			{
				echo CHtml::link(Yii::t('cal','Library'),array('/library/book/manage'),array('class'=>'library_active'));
			}
			else
			{
				echo CHtml::link(Yii::t('cal','Library'),array('/library/book/manage'),array('class'=>'library'));
			}
		   ?>
           </li>        
              <li>
           <?php
		   		if(Yii::app()->controller->action->id=='index' || Yii::app()->controller->action->id=='change')
			{
				echo CHtml::link('Hostel',array('/hostel'),array('class'=>'report_active'));
			}
			else
			{
				echo CHtml::link('Hostel',array('/hostel'),array('class'=>'report'));
			}
		   ?>
           </li>         
            </ul>
      
        </div>