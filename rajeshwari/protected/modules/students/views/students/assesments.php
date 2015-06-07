<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Assessments',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <div class="emp_cont_left">
    <?php $this->renderPartial('profileleft');?>
    
    </div>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    
    <h1 style="margin-top:.67em;"><?php echo Yii::t('students','Student Profile : ');?><?php echo $model->first_name.'&nbsp;'.$model->last_name; ?><br /></h1>
        
    <div class="edit_bttns last">
    <ul>
    <li>
    <?php echo CHtml::link(Yii::t('students','<span>Edit</span>'), array('update', 'id'=>$model->id),array('class'=>' edit ')); ?>
    </li>
     <li>
    <?php echo CHtml::link(Yii::t('students','<span>Students</span>'), array('students/manage'),array('class'=>'edit last'));?>
    </li>
    </ul>
    </div>
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    <?php $this->renderPartial('tab');?>
    <div class="clear"></div>
    <div class="emp_cntntbx" >
    <?php
	$exam = ExamScores::model()->findAll("student_id=:x", array(':x'=>$_REQUEST['id']));
	?>
    <div class="tableinnerlist">
    <table width="100%" cellpadding="0" cellspacing="0">
<!--     <tr>
    <th><?php echo Yii::t('students','Exam Group Name');?></th>
    <th><?php echo Yii::t('students','Subject');?></th>
    <th><?php echo Yii::t('students','Score');?></th>
    <th><?php echo Yii::t('students','Result');?></th>
    </tr> -->

    <?php
	if($exam!=NULL){
		$arr = array(array());
		unset($arr[0]);
		$totals = array();
		foreach($exam as $exams)
		{
			
			$exm=Exams::model()->findByAttributes(array('id'=>$exams->exam_id));
			$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id));
			$grades = GradingLevels::model()->findAllByAttributes(array('batch_id'=>$exams->grading_level_id));
			$t = count($grades);
			$exm_name = $group->name;
			$sub=Subjects::model()->findByAttributes(array('id'=>$exm->subject_id));
			$sub_name = $sub->name ;
			if($sub->elective_group_id != "0")
			 {
			 $ele = StudentElectives::model()->findByAttributes(array('student_id'=>$_REQUEST['id'],'batch_id'=>$sub->batch_id,'elective_group_id'=>$sub->elective_group_id,'status'=>'1'));
			 $elename = Electives::model()->findByAttributes(array('id'=>$ele->elective_id));
			 $sub_name .= "(". @$elename->name .")";
			 }
			$totals[$exm_name] += $exams->marks;
			if($group->exam_type == 'Marks') {  
				  $arr[$sub_name] [$exm_name] = $exams->marks;  } 
				  else if($group->exam_type == 'Grades') {
				   
				        
				   foreach($grades as $grade)
						{
							
						 if($grade->min_score <= $exams->marks)
							{	
								$grade_value =  $grade->name;
							}
							else
							{
								$t--;
								
								continue;
								
							}
						$arr[$sub_name] [$exm_name] =  $grade_value ;
						break;
						
						}
						if($t<=0) 
							{
								$glevel = " No Grades" ;
							} 
						} 
				   else if($group->exam_type == 'Marks And Grades'){
					foreach($grades as $grade)
						{
							
						 if($grade->min_score <= $exams->marks)
							{	
								$grade_value =  $grade->name;
							}
							else
							{
								$t--;
								
								continue;
								
							}
						$arr[$sub_name] [$exm_name] =  $exams->marks . " & ".$grade_value ;
						break;
						
							
						} 
						if($t<=0) 
							{
								$arr[$sub_name] [$exm_name] = $exams->marks." & No Grades" ;
							}
						 } 
			if($exams->is_failed==NULL)
			$arr[$sub_name] [$exm_name] .= ' (PASS)';
			else
			$arr[$sub_name] [$exm_name] .= ' (FAIL)';
		}

		foreach ($arr as $sub => $subs) {
			echo '<tr><th>Exams:</th>';
			foreach($subs as $exam_name => $valu) {

				echo '<th>'. $exam_name. '</th>';
			}
			echo '</tr>';
			break;
			
		}
		
		foreach ($arr as $sub => $subs) {
			echo '<tr>';
			echo '<td>'. $sub. '</td>';
			foreach($subs as $exam_name => $valu)
			{
				echo '<td>'. $valu. '</td>';
			}
			echo '</tr>';

			
		}

		foreach ($arr as $sub => $subs) {
			echo '<tr><th>Total:</th>';
			foreach($subs as $exam_name => $valu)
			{
				echo '<th>'. $totals[$exam_name]. '</th>';
			}
			echo '</tr>';
			break;
			
		}
		
	}
	else{
		echo '<tr>';
			echo '<td colspan="4"> No Exam Details Available!</td>';
		echo '<tr>';
		
	}
	?>    </table>
    </div>
    
    <br />
    
    </div>
    </div>
    
    </div>
    </div>
   
    </td>
  </tr>
</table>