 
	 <!--navigation ends here-->
     <!--banner starts here-->
     <!--<section id="innerbanner"><img src="images/innerbanner.png" width="1000" height="168"></section>-->
      <!--banner ends here-->
      <!--midsection starts here-->
      
      <!--midsection ends here-->
      <!--innersection starts here-->
      <div id="parent_Sect">
        <?php $this->renderPartial('leftside');?> 
        <?php
		$user=User::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		
		$guard=Guardians::model()->findByAttributes(array('uid'=>$user->id));
		$student=Students::model()->findByAttributes(array('id'=>$guard->ward_id));
		$exam = ExamScores::model()->findAll("student_id=:x", array(':x'=>$student->id));
		
		?>
        <div id="parent_rightSect">
        	<div class="parentright_innercon">
            <h1><?php echo Yii::t('parentportal','Exams');?></h1>
            <div class="profile_top">
               	<div class="prof_img">
                <?php
				 if($student->photo_data!=NULL){ 
   				 echo '<img  src="'.$this->createUrl('/students/Students/DisplaySavedImage&id='.$student->primaryKey).'" alt="'.$student->photo_file_name.'" width="100" height="103" />';
	 }else{
		echo '<img  src="images/portal/prof-img001.png" alt='.$student->first_name.' width="100" height="103" />'; 
	 }
				?>
                </div>
                <h2><?php echo $student->last_name.' '.$student->first_name;?></h2>
                <ul>
                	<li class="rleft"><?php echo Yii::t('parentportal','Course :');?></li>
                    <li class="rright">
                    <?php 
					$posts=Batches::model()->findByPk($student->batch_id);
					echo $posts->course123->course_name;
					?>
                  	</li>
                    <li class="rleft"><?php echo Yii::t('parentportal','Batch :');?></li>
                    <li class="rright"><?php $batch=Batches::model()->findByAttributes(array('id'=>$student->batch_id));
		 				echo $batch->name;?></li>
                    <li class="rleft"><?php echo Yii::t('parentportal','Admission No :');?></li>
                    <li class="rright"><?php echo $student->admission_no; ?></li>
                </ul>
               	</div>
       		<div class="profile_details">
    <h3><?php echo Yii::t('parentportal','Assessment');?></h3>
            <br />  
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
    <th><?php echo Yii::t('parentportal','Exam Group Name');?></th>
    <th><?php echo Yii::t('parentportal','Subject');?></th>
    <th><?php echo Yii::t('parentportal','Marks');?></th>
    <th><?php echo Yii::t('parentportal','Result');?></th>
    </tr>

    <?php
	if($exam==NULL)
	{
		echo '<tr><td align="center" colspan="4"><i>'.Yii::t('parentportal','No Assessments').'</i></td></tr>';	
	}
	else
	{
	foreach($exam as $exams)
	{
		echo '<tr>';
		$exm=Exams::model()->findByAttributes(array('id'=>$exams->exam_id));
		if($exm!=NULL)
		{
		$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id));
		echo '<td>'.$group->name.'</td>';
		$sub=Subjects::model()->findByAttributes(array('id'=>$exm->subject_id));
		echo '<td>'.$sub->name.'</td>';
		echo '<td>'.$exams->marks.'</td>';
		if($exams->is_failed==NULL)
		echo '<td>'.Yii::t('parentportal','Passed').'</td>';
		else
		echo '<td>'.Yii::t('parentportal','Failed').'</td>';
		}
		echo '</tr>';
		
	}
	}
	?>    </table>
    
   </div>            
              
         
                
            </div>
        </div>
        <div class="clear"></div>
      </div>
      <!--innersection ends here-->
