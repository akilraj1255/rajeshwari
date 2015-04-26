<div class="edit_bttns" style="width:550px; top:40px; left:30px;">
	<ul>
    	<!-- For attendence -->
		<li><span>
  			<?php if(Yii::app()->controller->action->id=='attendance' or Yii::app()->controller->action->id=='studentattendance')
  			{ 
     			echo CHtml::link('<span>'.'View My Attendance'.'</span>',array('/teachersportal/default/employeeattendance')); 
			}?>
		</span></li>
		<li><span>
 			<?php  
			$employee=Employees::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
			$is_classteacher = Batches::model()->findAllByAttributes(array('employee_id'=>$employee->id));
			if($is_classteacher!=NULL){
				if(Yii::app()->controller->action->id=='attendance' or Yii::app()->controller->action->id=='employeeattendance')
				{ 
					echo CHtml::link('<span>'.'Manage Student Attendance'.'</span>',array('/teachersportal/default/studentattendance')); 
				}
			}?>
		</span></li>
        <li><span>
        	<?php if(count($is_classteacher)>1 and Yii::app()->controller->action->id=='studentattendance' and isset($_REQUEST['id'])){
						echo CHtml::link('<span>'.'Change Batch'.'</span>',array('/teachersportal/default/studentattendance'));	
			}?>
        </span></li>
        <!-- End For attendence -->
        <li><span>
  			<?php 
			if(Yii::app()->controller->action->id=='timetable' or Yii::app()->controller->action->id=='studenttimetable')
  			{ 
     			echo CHtml::link('<span>'.'View My Timetable'.'</span>',array('/teachersportal/default/employeetimetable')); 
			}?>
		</span></li>
        <li><span>
        	<?php if($is_classteacher!=NULL){
					if(Yii::app()->controller->action->id=='timetable' or Yii::app()->controller->action->id=='employeetimetable')
					{ 
						echo CHtml::link('<span>'.'View Class Timetable'.'</span>',array('/teachersportal/default/studenttimetable')); 
					}
                } ?>
        </span></li>
        <li><span>
        	<?php if(count($is_classteacher)>1 and Yii::app()->controller->action->id=='studenttimetable' and isset($_REQUEST['id'])){
						echo CHtml::link('<span>'.'Change Batch'.'</span>',array('/teachersportal/default/studenttimetable'));	
			}?>
        </span></li>
        <li><span>
        	<?php
				$criteria=new CDbCriteria;
				$criteria->select= 'batch_id';
				$criteria->distinct = true;
				// $criteria->order = 'batch_id ASC'; Uncomment if ID should be retrieved in ascending order
				$criteria->condition='employee_id=:emp_id';
				$criteria->params=array(':emp_id'=>$employee->id);
				$batches_id = TimetableEntries::model()->findAll($criteria); 
				if(count($batches_id) > 1){
					if(Yii::app()->controller->action->id=='employeetimetable' and isset($_REQUEST['id'])){
							echo CHtml::link('<span>'.'Change Batch'.'</span>',array('/teachersportal/default/employeetimetable'));	
					}
				}?>
        </span></li>
        <?php /*?><li>
        	<?php if(Yii::app()->controller->action->id=='examination')
  			{ 
     			echo CHtml::link('<span>View Exam Timetable</span>',array('/teachersportal/default/exams')); 
			}?>
        </li>
        <li>
        	<?php if(Yii::app()->controller->action->id=='examination')
  			{ 
     			echo CHtml::link('<span>View Exam Results</span>',array('/teachersportal/default/exams')); 
			}?>
        </li><?php */?>
 
	</ul>
</div>
 
