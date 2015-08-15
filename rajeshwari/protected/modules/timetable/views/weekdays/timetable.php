<?php
$this->breadcrumbs=array(
	'Weekdays'=>array('/timetable'),
	'TimeTable',
);?>
<!--<script language="javascript">
function getid()
{
var id= document.getElementById('drop').value;
window.location = "index.php?r=weekdays/timetable&id="+id;
}
</script>-->
<style>
.timetable{ width:712px;overflow-x:auto; overflow-y: hidden; }
.timetable table{overflow-x:auto;}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
   <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <!--<div class="searchbx_area">
    <div class="searchbx_cntnt">
    	<ul>
        <li><a href="#"><img src="images/search_icon.png" width="46" height="43" /></a></li>
        <li><input class="textfieldcntnt"  name="" type="text" /></li>
        </ul>
    </div>
    
    </div>-->
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
     <?php $this->renderPartial('/default/tab');?>
        
    <div class="clear"></div>
    <div class="emp_cntntbx" style="padding-top:10px;">
    <div class="c_subbutCon" align="right" style="width:100%">
    <div class="edit_bttns" style="width:280px; top:6px; right:-16px">
    <ul>
    <li>
    <?php echo CHtml::link('<span>'.Yii::t('timetable','Set Week Days').'</span>', array('/timetable/weekdays','id'=>$_REQUEST['id']),array('class'=>'addbttn'));?>
    </li>
    <li>
    <?php echo CHtml::link('<span>'.Yii::t('timetable','Set Class Timings').'</span>', array('/timetable/classTiming','id'=>$_REQUEST['id']),array('class'=>'addbttn last'));?>
    </li>
    </ul>
    <div class="clear"></div>
    </div>
    </div>
    <?php 
		$present = PeriodEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id']));
		/*if($present!=NULL){
			echo CHtml::link(Yii::t('timetable','Publish Time Table'), array('Weekdays/Publish', 'id'=>$_REQUEST['id']),array('class'=>'cbut')); 
		}*/
	?>&nbsp;
    
    <?php 		$criteria = new CDbCriteria(array("order"=>"STR_TO_DATE(start_time,'%h:%i%p') ASC"));
		$criteria->addCondition('batch_id=:x');
		$criteria->params = array(':x' => $_REQUEST['id']);
        $timing = ClassTimings::model()->findAll( $criteria); // Display pdf button only if there is class timings.
		if($timing!=NULL){
	 		echo CHtml::link(Yii::t('timetable','Generate PDF'), array('Weekdays/pdf','id'=>$_REQUEST['id']),array('class'=>'cbut','target'=>'_blank')); 
	  } ?>
  
    <div  style="width:100%">

<div class="">

<?php
 
	if(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL)
	{      
	$times=Batches::model()->findAll("id=:x", array(':x'=>$_REQUEST['id']));
	
	
	$weekdays=Weekdays::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id']));
	
	if(count($weekdays)==0)
	$weekdays=Weekdays::model()->findAll("batch_id IS NULL");
	
	
	?> <br /><br />
    <?php   		$criteria = new CDbCriteria(array("order"=>"STR_TO_DATE(start_time,'%h:%i%p') ASC"));
		$criteria->addCondition('batch_id=:x');
		$criteria->params = array(':x' => $_REQUEST['id']);
        $timing = ClassTimings::model()->findAll( $criteria);
	  		$count_timing = count($timing);
			if($timing!=NULL)
			{
	?>
<div class="timetable">
<table border="0" align="center" width="100%" id="table" cellspacing="0">
    <tbody><tr>
	
      <td class="loader">&nbsp;
        
        </td><!--timetable_td_tl -->
      <td class="td-blank"></td>
      <?php 
			foreach($timing as $timing_1)
			{
			echo '<td class="td"><div class="top">'.$timing_1->start_time.' - '.$timing_1->end_time.'</div></td>';	
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
        <td class="td"><div class="name"><?php echo Yii::t('timetable','SUN');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo '<td class="td">
					<div  onclick="" style="position: relative; ">
					
					  <div class="tt-subject" style=" margin:0 auto;">
						<div class="subject">'; ?>
			<?php
$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[0]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo 	CHtml::ajaxLink(Yii::t('timetable','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[0]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[0]['weekday'])) ;
					}
					else
					{
						echo Yii::t('timetable','Break');
					}
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
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
        <td class="td"><div class="name"><?php echo Yii::t('timetable','MON');?></div></td>
        <td class="td-blank"></td>
        	 <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject" style="margin:0 auto;">
							<div class="subject">';
		$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[1]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('timetable','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[1]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[1]['weekday'])) ;
					}
					else
					{
						echo Yii::t('timetable','Break');
					}
	
					
		
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
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
        <td class="td"><div class="name"><?php echo Yii::t('timetable','TUE');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject" style="width:120px; margin:0 auto;">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[2]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('timetable','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[2]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[2]['weekday'])) ;
					}
					else
					{
						echo Yii::t('timetable','Break');
					}	
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
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
        <td class="td"><div class="name"><?php echo Yii::t('timetable','WED');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject" style="width:120px; margin:0 auto;">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[3]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('timetable','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[3]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[3]['weekday'])) ;
					}
					else
					{
						echo Yii::t('timetable','Break');
					}	
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));	
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
        <td class="td"><div class="name"><?php echo Yii::t('timetable','THU');?></div></td>
        <td class="td-blank"></td>
          <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject" style="width:120px; margin:0 auto;">
							<div class="subject">';
				$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[4]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('timetable','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[4]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[4]['weekday'])) ;
					}
					else
					{
						echo Yii::t('timetable','Break');
					}	
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
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
        <td class="td"><div class="name"><?php echo Yii::t('timetable','FRI');?></div></td>
        <td class="td-blank"></td>
         <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject" style="width:120px; margin:0 auto;">
							<div class="subject">';
				$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[5]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{	
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('timetable','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[5]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[5]['weekday'])) ;
					}
					else
					{
						echo Yii::t('timetable','Break');
					}	
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
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
        <td class="td"><div class="name"><?php echo Yii::t('timetable','SAT');?></div></td>
        <td class="td-blank"></td>
          <?php
			  for($i=0;$i<$count_timing;$i++)
			  {
				echo ' <td class="td">
						<div  onclick="" style="position: relative; ">
						  <div class="tt-subject" style="width:120px; margin:0 auto;">
							<div class="subject">';
							$set =  TimetableEntries::model()->findByAttributes(array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[6]['weekday'],'class_timing_id'=>$timing[$i]['id'])); 			
				if(count($set)==0)
				{
					$is_break = ClassTimings::model()->findByAttributes(array('id'=>$timing[$i]['id'],'is_break'=>1));
					if($is_break==NULL)
					{	
						echo CHtml::ajaxLink(Yii::t('timetable','Assign'),$this->createUrl('TimetableEntries/settime'),array(
        'onclick'=>'$("#jobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'].'").dialog("open"); return false;',
        'update'=>'#jobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'],'type' =>'GET','data'=>array('batch_id'=>$_REQUEST['id'],'weekday_id'=>$weekdays[6]['weekday'],'class_timing_id'=>$timing[$i]['id']),'dataType'=>'text',
        ),array('id'=>'showJobDialog'.$timing[$i]['id'].$weekdays[6]['weekday'])) ;
					}
					else
					{
						echo Yii::t('timetable','Break');
					}		
					
				}
				else
				{
				$time_sub = Subjects::model()->findByAttributes(array('id'=>$set->subject_id));
				if($time_sub!=NULL){echo $time_sub->name.'<br>';}
				$time_emp = Employees::model()->findByAttributes(array('id'=>$set->employee_id));
				if($time_emp!=NULL){echo '<div class="employee">'.$time_emp->first_name.'</div>';}
				echo CHtml::link('',array('timetableEntries/remove','id'=>$set->id,'batch_id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?','class'=>'delete'));
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
</div><?php }
     else
	 {
		 echo '<i>'.Yii::t('timetable','No Class Timings').'</i>';
		 
	 }?>
     
 
	</div>
    
</div>
    <!--<div class="table_listbx">
                         <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tbody><tr>
                    <td class="listbx_subhdng">Sl no.</td>
                    <td class="listbx_subhdng">Student Name</td>
                    <td class="listbx_subhdng">Admission Number</td>
                    <td class="listbx_subhdng">Gender</td>
                    <td class="listbx_subhdng">Actions</td>
                    </tr>
                        <tr><td>1</td><td><a href="/osv2.1/osadmin/index.php?r=students/view&amp;id=1">Balusamy</a></td><td>1</td><td>fff</td><td>gggg</td>                    </tr></tbody></table>
                    
    
   

 
    </div>-->
    </div>
    </div>
    
    </div>
    </div>
    
    
    
    
    

    <?php
		$batch = Weekdays::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['id']));
		if(count($batch)==0)
		$batch = Weekdays::model()->findAll("batch_id IS NULL");
		?>
        
        <?php
		
	}
	
	?>
     

    </td>
  </tr>
</table>
