<?php
$this->breadcrumbs=array(
	'Student Attentances'=>array('/courses'),
	'Attendance',
);
?>
<style>
.unpaid_table{
	border-top:1px #CCC solid;
	margin:30px 0px;
	font-size:15px;
	border-right:1px #CCC solid;
}
.unpaid_table td,th{
	border-left:1px #CCC solid;
	padding:5px 6px;
	border-bottom:1px #CCC solid;
	
}
</style>
<div class="atnd_Con" style="padding-left:20px; padding-top:30px;">

<?php

  if(isset($_REQUEST['id']))
  {
?>
    <!-- Header -->
    <div style="border-bottom:#666 1px; width:700px; padding-bottom:20px;">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="first">
                           <?php $logo=Logo::model()->findAll();?>
                            <?php
                            if($logo!=NULL)
                            {
                                //Yii::app()->runController('Configurations/displayLogoImage/id/'.$logo[0]->primaryKey);
                                echo '<img src="uploadedfiles/school_logo/'.$logo[0]->photo_file_name.'" alt="'.$logo[0]->photo_file_name.'" class="imgbrder" width="100%" />';
                            }
                            ?>
                </td>
                <td align="center" valign="middle" class="first" style="width:300px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:22px; width:300px;  padding-left:10px;">
                                <?php $college=Configurations::model()->findAll(); ?>
                                <?php echo $college[0]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo $college[1]->config_value; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="listbxtop_hdng first" style="text-align:left; font-size:14px; padding-left:10px;">
                                <?php echo 'Phone: '.$college[2]->config_value; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
		</div>
		<br /><br />
    <span align="center"><h4><?php echo Yii::t('student','STUDENTS OF THE BATCH'); ?></h4></span>
    <!-- Fees and course details -->
    <div style="border:#CCC 1px; width:700px; padding:10px 10px; background:#E1EAEF;">
        <table style="font-size:14px;">
            <?php $batch = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
                  $course_name = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
                   
            ?>
            <tr>
                <td style="width:100px;"><b><?php echo Yii::t('courses','Course'); ?></b></td>
                <td style="width:10px;">:</td>
                <td style="width:250px;"><?php echo $course_name->course_name; ?></td>
            
                <td><b><?php echo Yii::t('courses','Batch'); ?></b></td>
                <td style="width:10px;">:</td>
                <td><?php echo $batch->name; ?></td>
            </tr>
            
        </table>
    </div>
    <!-- Students List Table -->
<table width="100%" cellspacing="0" class="unpaid_table">
    <tr style="background:#E1EAEF; text-align:center; line-height:10px;">
        <th style="width:5px; padding-top:10px;"><?php echo Yii::t('courses','Sl no.');?></th>
        <th style="width:30px;padding-top:10px;"><?php echo Yii::t('courses','Admn No.');?></th>
        <th style="width:200px; padding-top:10px;"><?php echo Yii::t('courses','Name of the student');?></th>
        <th style="width:40px; padding-top:10px;"><?php echo Yii::t('courses','Gender');?></th>
        <th style="width:200px; padding-top:10px;"><?php echo Yii::t('courses','Parent\'s Name');?></th>
        <th style="width:90px; padding-top:10px;"><?php echo Yii::t('courses','Mobile Phone');?></th>
        
    </tr>
<?php 
	

	 $list=Students::model()->findAll('batch_id=:x',array(':x'=>$_REQUEST['id']));


	$k = 1;	
	foreach($list as $student)
	{
		
		if($student==NULL || $student->is_active == 0 || $student->is_deleted==1)
		{
			continue;
		}
		echo "<tr>";
			echo "<td>".$k."</td>";
			echo "<td>".$student->admission_no."</td>";
			echo "<td style='padding-left:20px'>".$student->first_name.' '.$student->last_name."</td>";
			$gender=$student->gender;
			if ($gender==""){
				$gender="-";
			}
			echo "<td>".$gender."</td>";
			$guardian=Guardians::model()->findAll("id=:x", array(':x'=>$student->parent_id));
            
                                echo "<td>";
                                    
                                        if($guardian &&$guardian[0]->first_name&& $guardian[0]->first_name!=""){
                                            echo $guardian[0]->first_name;
                                        }
                                        else{
                                            echo '-';
                                        }
                                    
                                echo "</td>";
                                echo "<td>";
                                    
                                        if($guardian &&$guardian[0]->mobile_phone && $guardian[0]->mobile_phone!=""){
                                            echo $guardian[0]->mobile_phone;
                                        }
                                        else{
                                            echo '-';
                                        }
                                    
                                echo "</td>";  
		echo "</tr>";

	 $k++;
	 }	
	 ?>
</table>
<!--Students List Table End -->
<?php /*$j++;*/ }?>
</div>