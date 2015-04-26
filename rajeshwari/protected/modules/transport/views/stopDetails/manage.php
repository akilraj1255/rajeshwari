<?php
$this->breadcrumbs=array(
	'Stop Details'=>array('/transport'),
	'Manage',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
	//'htmlOptions'=>array(
		'action'=>Yii::app()->createUrl('transport/StopDetails/create'),
		'method'=>'get',
	//),
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
  <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
     <h1><?php echo Yii::t('transport','Stop Details');?></h1>
		<?php echo CHtml::link('Edit Stops',array('update','id'=>$_REQUEST['id']));?>
         | 
        <?php echo CHtml::link('Remove All Stops',array('removeall','id'=>$_REQUEST['id']));?>
     <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
     <table>
     <tr>
     	<td>Add <input type="text" name="stops" id="noOfStops" style="width:40px;" />&nbsp;stops</td><td><input type="submit" value="Go" onclick="return checkStops();" /></td>
        <td>
        		<?php
					Yii::app()->clientScript->registerScript(
					   'myHideEffect',
					   '$(".error").animate({opacity: 1.0}, 5000).fadeOut("slow");',
					   CClientScript::POS_READY
					);
				?>  
                <div class="error" id="error" style="background:#FFF; color:#C00; padding-left:10px; visibility:hidden;"> 
                </div>
				
        </td>
     </tr>
     </table>
    <?php $stop=StopDetails::model()->findAll('route_id =:x',array(':x'=>$_REQUEST['id']));
	if($stop!=NULL)
	{
		?>
         <div class="pdtab_Con">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr class="pdtab-h">
        	<td align="center"><?php echo Yii::t('transport','Stop Name');?></td>
            <td align="center"><?php echo Yii::t('transport','Fare');?></td>
            <td align="center"><?php echo Yii::t('transport','Arrival Time(Morning)');?></td>
            <td align="center"><?php echo Yii::t('transport','Arrival Time(Evening)');?></td>
            <td align="center"><?php echo Yii::t('transport','Options');?></td>
        </tr>
        <?php
		foreach($stop as $stop_1)
		{
			$route=RouteDetails::model()->findByAttributes(array('id'=>$stop_1->route_id));
			
				?>
                <tr>
                    <td align="center"><?php echo $stop_1->stop_name;?></td>
                    <td align="center"><?php echo $stop_1->fare;?></td>
                    <td align="center"><?php echo $stop_1->arrival_mrng;?></td>
                    <td align="center"><?php echo $stop_1->arrival_evng;?></td>
                    <td align="center">
					<?php echo CHtml::link('Edit',array('stopDetails/edit','id'=>$stop_1->id));?>&nbsp;| 
					<?php echo CHtml::link(
							'Remove',
							array('stopDetails/remove','id'=>$stop_1->id),
							array('onclick'=>'if(confirm("Remove stop '.$stop_1->stop_name.' ?")){}else{return false;}')
						);
					?>
                    </td>
                </tr>
                <?php
		}
		?>
        
        <?php
	}
	else
	{
		echo '<div align="center"><strong>'.Yii::t('transport','No data available.').'</strong></div>';
	}
	?>
    </table>
        </div>
     </div>
     </td>
     </tr>
     </table>
<?php $this->endWidget(); ?>

<script type="text/javascript">
function checkStops()
{
	
	var stops = document.getElementById("noOfStops").value;
	if(stops==""){
		document.getElementById("error").style.visibility = 'visible';
		document.getElementById("error").innerHTML = 'Add the number of stop(s)!';
		return false;
	}
}
</script>