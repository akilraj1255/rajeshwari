<div class="emp_tab_nav">
    <ul style="width:730px;">
          <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='view')
	          {
		      echo CHtml::link(Yii::t('students','Profile'), array('students/view', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Profile'), array('students/view', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='assesments')
	          {
		      echo CHtml::link(Yii::t('students','Assessments'), array('students/assesments', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Assessments'), array('students/assesments', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='attentance')
	          {
		      echo CHtml::link(Yii::t('students','Attendance'), array('students/attentance', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Attendance'), array('students/attentance', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='fees')
	          {
		      echo CHtml::link(Yii::t('students','Fees'), array('students/fees', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Fees'), array('students/fees', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        
         <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='document' or Yii::app()->controller->id=='studentDocument')
	          {
				  
				 echo CHtml::link(Yii::t('students','Documents'), array('students/document', 'id'=>$_REQUEST['id']),array('class'=>'active'));
				  
		      
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Documents'), array('students/document', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='electives')
	          {
		      echo CHtml::link(Yii::t('students','Electives'), array('students/electives', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Electives'), array('students/electives', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
      
    <?php /*?><li><a href="#">Additional Notes</a></li><?php */?>
    </ul>
    </div>