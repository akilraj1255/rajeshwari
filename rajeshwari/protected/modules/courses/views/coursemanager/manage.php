<?php
$this->breadcrumbs=array(
	'Coursemanagers'=>array('index'),
	'Manage',
);


?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
  <?php $this->renderPartial('/courses/left_side');?>
 </td>
    <td valign="top"> 
 <div class="cont_right">
     <h1><?php echo Yii::t('Courses','Course Managers');?></h1>

 <?php $course=Coursemanager::model()->findAll('is_deleted=:y' ,array(':y'=>0));
	
		?>

 <div class="pdtab_Con">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr class="pdtab-h">
        	<td align="center"><?php echo Yii::t('Courses','Course Manager Name');?></td>
        	<td align="center"><?php echo Yii::t('Courses','Course');?></td>
            <td align="center"><?php echo Yii::t('Courses','Action');?></td>
          </tr>
        <?php
		if($course!=NULL)
		{
		foreach($course as $course_1)
		{
		    $profile = Profile::model()->findByAttributes(array('user_id'=>$course_1->user_id));
			if($course_1->course != 0)
			{
			$course_name = Courses::model()->findByAttributes(array('id'=>$course_1->course));
			$name = $course_name->course_name;
			}
			else 
			{
				$name = 'All Courses';
			}
?>
                <tr>
                	<td align="center"><?php echo $profile->firstname.' '.$profile->lastname;?></td>
                    <td align="center"><?php echo $name;?></td>
                   <?php /*?> <td align="center"><?php echo CHtml::link('Edit',array('coursemanager/update','id'=>$course_1->id)).' | '.CHtml::link('Delete',array('coursemanager/deleteall','id'=>$course_1->id),array('confirm'=>'Are you sure?'));?></td><?php */?>
                     <td align="center"><?php echo CHtml::link('Remove',array('coursemanager/deleteall','id'=>$course_1->id),array('confirm'=>'Are you sure?'));?></td>
                </tr>
                <?php
			
			
		}
		?>
        
        <?php
		
		
	}
		else
	{
		echo '<tr><td align="center" colspan="7"><strong>'.Yii::t('transport','No data available.').'</strong></div>';
	}
	?>
    </table>
        </div>
     
     </div>
     </td>
     </tr>
     </table>
