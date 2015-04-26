<?php
$this->breadcrumbs=array(
	'Coursemanagers'=>array('index'),
	array('view','id'=>$model->id),
	'Update',
);


?>


<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/courses/left_side');?>
    
  </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('Courses','Update Course Manager');?></h1>
  <div class="formCon">
<div class="formConInner">
  <div style="position:relative; width:180px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td width="1000px"><strong><?php echo Yii::t('Courses','Select Coursemanager');?></strong></td>
    <td>&nbsp;</td>
       <td><?php   
	              $cid = Coursemanager::model()->findByAttributes(array('id'=>$_REQUEST['id']));
				  $profile = Profile::model()->findByAttributes(array('user_id'=>$cid->user_id));
				  $name = $profile->firstname.' '.$profile->lastname;
							
					echo '<span style="font-size:14px; font-weight:bold; color:#666;"></span>&nbsp;&nbsp;&nbsp;&nbsp;';
					echo CHtml::dropDownList('user',$profile->user_id,array($profile->user_id=>$name),array('id'=>'user'));
					echo '</td><td style="padding-top:13px;">'; 
						         ?></td>
                                </td></tr>
                                <tr>
                                 <td>&nbsp;</td>
                                 <td><strong><?php echo Yii::t('Courses','Select Course');?></strong></td>
                                 <td>&nbsp;</td>
                                 <td><?php  $model = new Courses;
								            $course = Courses::model()->findByAttributes(array('id'=>$cid->course));
                                            $criteria = new CDbCriteria;
                                            $criteria->compare('is_deleted',0); 
                                            $course_names = CHtml::listData(Courses::model()->findAllByAttributes(array('is_deleted'=>0),array('order'=>'id DESC')),'id','course_name'); 
											$course_list = CMap::mergeArray(array(0=>'All Courses'),$course_names);
											echo CHtml::dropDownList('cid',$course->id,array($course_list),array('style'=>'width:190px;' )); 
										  
                                                ?></td></td> </tr>
                                                  </td>  </tr>
                                                         
                  <tr><td><?php  echo '<br/><br/>'. CHtml::submitButton( Yii::t('Courses','Update'),array('name'=>'update','class'=>'formbut')); 
				                 ?> </td>
                  </tr>
                   </td>
     </tr> 
     </table> 
     </td>
     </tr>
     </table>
     </div>
     </div>
     </div>
   