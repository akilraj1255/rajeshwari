<?php
$this->breadcrumbs=array(
	'Registrations'=>array('/hostel'),
	'Create',
);

?>

 <?php 

              $roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
					
						  foreach($roles as $role)
						  
						   if(sizeof($roles)==1 and $role->name == 'student')
						   { ?>
                             <div id="parent_Sect">
                              <?php $this->renderPartial('/settings/studentleft');?>
                              <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1>Registration</h1>
               
                <div class="profile_details">
                
        	
					<?php echo $this->renderPartial('_form1', array('model'=>$model)); ?>
						
 
				</div>



 	</div>
    
     <div class="clear"></div> 
     </div>
                               <div class="clear"></div> 
    </div>
                            
                           <?php } else { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
<h1><?php echo Yii::t('hostel','Registration');?></h1>
 <?php
/* Error Message */
if(Yii::app()->user->hasFlash('errorMessage')): 
?>
	<div class="errorSummary">
	<?php echo Yii::app()->user->getFlash('errorMessage'); ?>
	</div>
<?php endif;
 /* End Error Message */
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
    </td>
    </tr>
    </table>
    <?php } ?>