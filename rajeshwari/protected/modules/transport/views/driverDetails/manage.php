<?php
$this->breadcrumbs=array(
	'Driver Details'=>array('/transport'),
	'Manage',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
  <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
     <h1><?php echo Yii::t('transport','Driver Details');?></h1>
      <div class="edit_bttns" style="top:20px; right:20px;">
    <ul>
    <li> <?php echo CHtml::link('<span>'.Yii::t('transport','Enter Driver Details').'</span>', array('/transport/DriverDetails/create'),array('class'=>'addbttn last ')); ?></li>
    </ul>
    </div>
    <?php $drive=DriverDetails::model()->findAll();
	
		?>
         <div class="pdtab_Con">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr class="pdtab-h">
        	<td align="center"><?php echo Yii::t('transport','Name');?></td>
        	<td align="center"><?php echo Yii::t('transport','DOB');?></td>
            <td align="center"><?php echo Yii::t('transport','Age');?></td>
            <td align="center"><?php echo Yii::t('transport','License No.');?></td>
             <td align="center"><?php echo Yii::t('transport','Action');?></td>
        </tr>
        <?php
		if($drive!=NULL)
		{
		foreach($drive as $drive_1)
		{
			
			
			?>
                <tr>
                	<td align="center"><?php echo $drive_1->first_name.' '.$drive_1->last_name;?></td>
                    <td align="center"><?php 
										$user=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
										if($user!=NULL)
										{
												$date=date($user->displaydate,strtotime($drive_1->dob));
										}
										echo $date;
										?></td>
                    <td align="center"><?php echo $drive_1->age;?></td>
                    <td align="center"><?php echo $drive_1->license_no ;?></td>
                     <td align="center"><?php echo CHtml::link('Edit',array('/transport/DriverDetails/update','id'=>$drive_1->id)).' | '.CHtml::link('Delete',array('/transport/DriverDetails/deletedetails','id'=>$drive_1->id),array('confirm'=>'Are you sure?'));?></td>
                </tr>
                <?php
			
			
		}
	}
	else
	{
		 echo '<tr><td align="center" colspan="5"><strong>'.Yii::t('transport','No data available').'</strong></td></tr>';
	}
	?>
    </table>
        </div>
     
     </div>
     </td>
     </tr>
     </table>
<?php $this->endWidget(); ?>