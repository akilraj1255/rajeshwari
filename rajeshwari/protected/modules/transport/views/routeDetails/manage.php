<?php
$this->breadcrumbs=array(
	'Route Details'=>array('/transport'),
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
     <h1><?php echo Yii::t('transport','Route Details');?></h1>
      <div class="edit_bttns" style="top:20px; right:20px;">
    <ul>
    <li> <?php echo CHtml::link('<span>'.Yii::t('transport','Enter Route Details').'</span>', array('/transport/RouteDetails/create'),array('class'=>'addbttn last ')); ?></li>
    </ul>
    </div>
    <?php $route=RouteDetails::model()->findAll();
	
		?>
         <div class="pdtab_Con">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr class="pdtab-h">
        	<td align="center"><?php echo Yii::t('transport','Route');?></td>
        	<td align="center"><?php echo Yii::t('transport','No of stops');?></td>
            <td align="center"><?php echo Yii::t('transport','No of students');?></td>
            <td align="center"><?php echo Yii::t('transport','Vehicle Code');?></td>
             <td align="center"><?php echo Yii::t('transport','Action');?></td> 
        </tr>
        <?php
		if($route!=NULL)
		{
		foreach($route as $route_1)
		{
			$connection = Yii::app()->db;
			$sql="SELECT t2.id FROM transportation AS t2 JOIN stop_details AS t1   WHERE t2.stop_id = t1.id AND t1.route_id= ".$route_1->id;
			

			$command = $connection->createCommand($sql);
			$stop = $command->queryAll();
			
			$vehicle=VehicleDetails::model()->findByAttributes(array('id'=>$route_1->vehicle_id));
			
			?>
                <tr>
                	<td align="center"><?php echo CHtml::link($route_1->route_name,array('/transport/StopDetails/manage','id'=>$route_1->id));?></td>
                    <td align="center"><?php echo $route_1->no_of_stops;?></td>
                    <td align="center"><?php echo count($stop);?></td>
                    <td align="center"><?php echo CHtml::link($vehicle->vehicle_code,array('/transport/VehicleDetails/manage','id'=>$vehicle->id));?></td>
                    <td align="center"><?php echo CHtml::link('Edit',array('/transport/RouteDetails/update','id'=>$route_1->id)).' | '.CHtml::link('Delete',array('/transport/RouteDetails/deletedetails','id'=>$route_1->id),array('confirm'=>'Are you sure?'));?></td>
                </tr>
                <?php
			
			
		}
	}
	else
	{
		 echo '<tr><td align="center" colspan="4"><strong>'.Yii::t('transport','No data available').'</strong></td></tr>';
	}
	?>
    </table>
      <div class="pagecon">
                                                 <?php 
	                                                  $this->widget('CLinkPager', array(
													  'currentPage'=>$pages->getCurrentPage(),
													  'itemCount'=>$item_count,
													  'pageSize'=>$page_size,
													  'maxButtonCount'=>5,
													  //'nextPageLabel'=>'My text >',
													  'header'=>'',
												  'htmlOptions'=>array('class'=>'pages'),
												  ));?>
                                                  </div>               
        </div>
    
     </div>
     </td>
     </tr>
     </table>
<?php $this->endWidget(); ?>