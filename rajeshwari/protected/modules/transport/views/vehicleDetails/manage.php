<?php Yii::app()->clientScript->registerCoreScript('jquery');

         //IMPORTANT about Fancybox.You can use the newest 2.0 version or the old one
        //If you use the new one,as below,you can use it for free only for your personal non-commercial site.For more info see
		//If you decide to switch back to fancybox 1 you must do a search and replace in index view file for "beforeClose" and replace with 
		//"onClosed"
        // http://fancyapps.com/fancybox/#license
          // FancyBox2
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.css', 'screen');
         // FancyBox
         //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.js', CClientScript::POS_HEAD);
         // Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.css','screen');
        //JQueryUI (for delete confirmation  dialog)
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/js/jquery-ui-1.8.12.custom.min.js', CClientScript::POS_HEAD);
         Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/css/dark-hive/jquery-ui-1.8.12.custom.css','screen');
          ///JSON2JS
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/json2/json2.js');
       

           //jqueryform js
               Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/jquery.form.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/form_ajax_binding.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/client_val_form.css','screen');  ?>
              <?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>
<script language="javascript">
function getid()
{
var id= document.getElementById('drop').value;
window.location = "index.php?r=batches/manage&id="+id;
}
</script>
<script>
$(document).ready(function() {
$(".act_but").click(function(){	$('.act_drop').hide();	
            	if ($("#"+this.id+'x').is(':hidden')){
					
                	$("#"+this.id+'x').show();
					
				}
            	else{
                	$("#"+this.id+'x').hide();
            	}
            return false;
       			 });
				  $('#'+this.id+'x').click(function(e) {
            		e.stopPropagation();
        			});
        		
});
$(document).click(function() {
					
            		$('.act_drop').hide();
					
        			});
</script>
<?php
$this->breadcrumbs=array(
	'Vehicle Details'=>array('/transport'),
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
     <h1><?php echo Yii::t('transport','Vehicle Details');?></h1>
     <div class="edit_bttns" style="top:20px; right:20px;">
    <ul>
    <li> <?php echo CHtml::link('<span>'.Yii::t('transport','Enter Vehicle Details').'</span>', array('/transport/vehicleDetails/create'),array('class'=>'addbttn last ')); ?></li>
    </ul>
    </div>
    <?php $vehicle=VehicleDetails::model()->findAll('status=:x AND is_deleted=:y' ,array(':x'=>'C',':y'=>0));
	
		?>
         <div class="pdtab_Con">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr class="pdtab-h">
        	<td align="center"><?php echo Yii::t('transport','Vehicle No.');?></td>
        	<td align="center"><?php echo Yii::t('transport','no_of_seats');?></td>
            <td align="center"><?php echo Yii::t('transport','maximum_capacity');?></td>
            <td align="center"><?php echo Yii::t('transport','Assigned Driver');?></td>
            <td align="center"><?php echo Yii::t('transport','Route');?></td>
            <td align="center"><?php echo Yii::t('transport','Action');?></td>
        </tr>
        <?php
		if($vehicle!=NULL)
		{
		foreach($vehicle as $vehicle_1)
		{
			$route=RouteDetails::model()->findByAttributes(array('vehicle_id'=>$vehicle_1->id));
			$driver=DriverDetails::model()->findByAttributes(array('vehicle_id'=>$vehicle_1->id));
			
				?>
                <tr>
                	<td align="center"><?php echo $vehicle_1->vehicle_no;?></td>
                    <td align="center"><?php echo $vehicle_1->no_of_seats;?></td>
                    <td align="center"><?php echo $vehicle_1->maximum_capacity;?></td>
                    <td align="center"><?php 
					if($driver!=NULL)
					{
					echo $driver->last_name.' '.$driver->first_name;
					}?></td>
                    <td align="center"><?php 
					if($route!=NULL)
					{
					echo $route->route_name;}?></td>
                  
                    <td align="center"><?php echo CHtml::link('Edit',array('/transport/vehicleDetails/update','id'=>$vehicle_1->id)).' | '.CHtml::link('Delete',array('/transport/vehicleDetails/deletedetails','id'=>$vehicle_1->id),array('confirm'=>'Are you sure?'));?></td>
                </tr>
                <?php
			
			
		}
		?>
        
        <?php
		
		
	}
		else
	{
		echo '<tr><td align="center" colspan="6"><strong>'.Yii::t('transport','No data available.').'</strong></div>';
	}
	?>
    </table>
        </div>
     
     </div>
     </td>
     </tr>
     </table>
<?php $this->endWidget(); ?>