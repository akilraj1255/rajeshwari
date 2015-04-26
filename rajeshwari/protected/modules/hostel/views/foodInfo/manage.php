<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'Manage',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
            <?php $this->renderPartial('/settings/hostel_left');?>
        </td>
        <td valign="top">
            <div class="cont_right">
                <h1><?php echo Yii::t('hostel','Manage Mess Details');?></h1>
                <div class="edit_bttns" style="top:20px; right:20px;">
    <ul>
    <li> <?php echo CHtml::link('<span>'.Yii::t('hostel','Enter Mess Details').'</span>', array('/hostel/foodInfo/create'),array('class'=>'addbttn last ')); ?></li>
    </ul>
    </div>
     <?php $hst=FoodInfo::model()->findAll('is_deleted=:x',array(':x'=>0));
	
		?>
        <div class="pdtab_Con">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr class="pdtab-h">
        	<td align="center"><?php echo Yii::t('hostel','Preference');?></td>
        	<td align="center"><?php echo Yii::t('hostel','Amount');?></td>
           <td align="center"><?php echo Yii::t('hostel','Action');?></td>
        </tr>
        <?php
		if($hst!=NULL)
		{
		foreach($hst as $hostel)
		{
			
			
			?>
                <tr>
                	
                    <td align="center"><?php echo $hostel->food_preference;?></td>
                    <td align="center"><?php echo $hostel->amount ;?></td>
                   
                    <td align="center"><?php echo CHtml::link(Yii::t('hostel','Edit'),array('/hostel/foodInfo/update','id'=>$hostel->id)).' | '.CHtml::link(Yii::t('hostel','Delete'),array('/hostel/foodInfo/deleteall','id'=>$hostel->id),array('confirm'=>'Are you sure?'));?></td>
                </tr>
                <?php
			
			
		}
	}
	else
	{
		 echo '<tr><td align="center" colspan="3"><strong>'.Yii::t('hostel','No data available').'</strong></td></tr>';
	}
	?>
    </table>
        </div>
                </div>
                </td>
                </tr>
                </table>
                <?php $this->endWidget(); ?>