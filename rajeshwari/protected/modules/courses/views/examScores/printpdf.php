<style>
.attendance_table{
	border-top:1px #CCC solid;
	margin:30px 0px;
	font-size:9px;
	border-right:1px #CCC solid;
	text-align:center;
	/*height:50px;*/
	width:500px;
}
.attendance_table td{
	border-left:1px #CCC solid;
	padding:5px 6px;
	border-bottom:1px #CCC solid;
	width:auto;
	font-size:15px;
	
}

.attendance_table th{
	font-size:15px;
	padding:10px;
	
}
</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">
<?php
  if(isset($_REQUEST['examid']))
  { 
  
  ?>
	 
	<div style="border-bottom:1px #333333 solid; width:700px; padding-bottom:10px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tr> 
            <td class="first">
                       <?php  $logo=Logo::model()->findAll();?>
                        <?php
                        if($logo!=NULL)
                        { 
							//echo $logo[0]->photo_file_name;
                            //Yii::app()->runController('Configurations/displayLogoImage/id/'.$logo[0]->primaryKey);
							echo '<img src="uploadedfiles/school_logo/'.$logo[0]->photo_file_name.'" alt="'.  $logo[0]->photo_file_name.'" class="imgbrder" width="100%" />';
                        }
                        ?>
            </td>
            <td align="center" valign="middle" class="first">
            
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    	<td class="listbxtop_hdng first" style="text-align:center;"></td>
                    </tr>
                    <tr>
                        <td class="listbxtop_hdng first" style="text-align:center; font-size:20px; ">
                        <?php $college=Configurations::model()->findByPk(1); ?>
                        <?php  echo $college->config_value ; ?></td>
                    </tr>
                </table>
          
            </td>
      </tr>
</table>
</div>
<?php
if(isset($_REQUEST['id']))
  {  
$batch=Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
$batchname=$batch->name;
$courseid=$batch->course_id;
$course=Courses::model()->findByAttributes(array('id'=>$courseid));
$name=$course->course_name;
//echo $batchname;
  }
?>
<h4 ><?php echo Yii::t('examination','Student Assessment Report'); ?></h4>
<h5><?php echo Yii::t('examination','Course :').$name;?> <br/>
<?php echo Yii::t('examination','Batch :').$batchname;?></h5>
<?php $allscores = ExamScores::model()->findAllByAttributes(array('exam_id'=>$_REQUEST['examid']));
		 $sum=0;
		 foreach($allscores as $allscores1)
		 {
			$sum=$sum+$allscores1->marks;
		 }
		 $avg=$sum/count($allscores);
		 
		 $data=Exams::model()->find("id=:x", array(':x'=>$_REQUEST['examid']));
		 $exam_group = ExamGroups::model()->findByAttributes(array('id'=>$data->exam_group_id));
		 
		 echo '<div class="notifications nt_green">'.Yii::t('examination','Class Average = ').$avg.'</div>';?>

<table width="100%" cellspacing="0" cellpadding="0" class="attendance_table" align="left">
<tr style="background:#dfdfdf;">
    <th><?php echo Yii::t('examination','Student Name');?></th>
    <th><?php echo Yii::t('examination','Admission No.');?></th>
   <?php if($exam_group->exam_type =='Marks' || $exam_group->exam_type =='Marks And Grades'){ ?>
    <th><?php echo Yii::t('examination','Score');?></th>
    <?php }if($exam_group->exam_type =='Grades' || $exam_group->exam_type =='Marks And Grades'){ ?>
    <th><?php echo Yii::t('examination','Grades');?></th>
     <?php } ?>
    <th><?php  echo Yii::t('students','Remarks');?></th></tr>
   
    <?php
	
	$data=Exams::model()->findAll("id=:x", array(':x'=>$_REQUEST['examid']));
	
	//var_dump($exam_group);exit;
   	foreach($data as $data1)
	 {
		  $score=$exam=ExamScores::model()->findAll('exam_id=:x',array(':x'=>$data1->id));
		  $exam_group = ExamGroups::model()->findByAttributes(array('id'=>$data1->exam_group_id));
		 foreach($exam as $exam_1)
		 { 
			 $student=Students::model()->findByAttributes(array('id'=>$exam_1->student_id));
			 
			
			 echo '<tr>' ;
			echo '<td>'. $student->first_name .'</td>';
			  echo '<td>'.$no=$student->admission_no.'</td>';
			  if($exam_group->exam_type =='Marks' || $exam_group->exam_type =='Marks And Grades'){
				 echo "<td>".$exam_1->marks."</td>";
				 }
				 if($exam_group->exam_type =='Grades' || $exam_group->exam_type =='Marks And Grades'){
				 echo "<td>".$exam_1->getgradinglevel($exam_1)."</td>";
				 }
			 echo '<td>'.$remark=$exam_1->remarks.'</td>';
	 
	 echo '</tr>';
		 }
	 }
    ?>
 
  </table>
  <?php
	 
	 }
	
  ?>
 
</div>