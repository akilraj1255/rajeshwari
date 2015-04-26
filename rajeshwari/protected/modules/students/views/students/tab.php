<div class="emp_tab_nav">
    <ul style="width:730px;">
          <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='view')
	          {
		      echo CHtml::link(Yii::t('students','Profile'), array('view', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Profile'), array('view', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='assesments')
	          {
		      echo CHtml::link(Yii::t('students','Assessments'), array('assesments', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Assessments'), array('assesments', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='attentance')
	          {
		      echo CHtml::link(Yii::t('students','Attendance'), array('attentance', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Attendance'), array('attentance', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='fees' && constant('FEES_ENABLED'))
	          {
		      echo CHtml::link(Yii::t('students','Fees'), array('fees', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else if(constant('FEES_ENABLED'))
			  {
	          echo CHtml::link(Yii::t('students','Fees'), array('fees', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        
         <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='document' or Yii::app()->controller->id=='studentDocument')
	          {
				  
				echo CHtml::link(Yii::t('students','Documents'), array('document', 'id'=>$_REQUEST['id']),array('class'=>'active'));
				  
		      
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Documents'), array('document', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='electives')
	          {
		      echo CHtml::link(Yii::t('students','Electives'), array('electives', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Electives'), array('electives', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
      
    <?php /*?><li><a href="#">Additional Notes</a></li><?php */?>
    </ul>
    </div>