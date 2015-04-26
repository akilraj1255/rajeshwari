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
                <h1><?php echo Yii::t('hostel','Manage Room Details');?></h1>
                <div>
                 <div class="events_con" style="width:97%; padding-top:10px">
<table width="100%" cellspacing="0" cellpadding="0">
<tbody>
                   <?php echo CHtml::label(Yii::t('hostel','Sort Rooms by'),'').'&nbsp;';; 
echo CHtml::dropDownList('search','',array('1'=>'All','2'=>'Occupied','3'=>'Vacant'),array('prompt'=>'Select','id'=>'search_id','submit'=>array('Room/manage')));
?>
                </div>
               
                    <?php if(isset($list))
{
	
	
	
		?> <div class="pdtab_Con">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr class="pdtab-h">
                           <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
                            <td align="center"><?php echo Yii::t('hostel','Floor');?></td>
                            <td align="center"><?php echo Yii::t('hostel','Room No');?></td>
                            <td align="center"><?php echo Yii::t('hostel','Availability');?></td>
                        </tr>
                        <?php 
						
						if($list==NULL)
						{ 
						
							echo '<tr><td align="center" colspan="6"><strong>'.Yii::t('hostel','No data available').'</strong></td></tr>';
						}
						else
						{
						foreach($list as $list_1)
						{
							$allot=Allotment::model()->findAllByAttributes(array('room_no'=>$list_1->room_no));
							$room=Room::model()->findByAttributes(array('id'=>$list_1->room_no));
							$floor=Floor::model()->findByAttributes(array('id'=>$room->floor));
							$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floor->hostel_id));
							?>
                        <tr>
                            <td align="center">
                                <?php echo $hostel->hostel_name; ?>
                            <td align="center">
                                <?php echo $floor->floor_no; ?>
                            </td>
                            <td align="center">
                                <?php echo $list_1->room_no.'<br>'.Yii::t('hostel','Beds').'&nbsp;-&nbsp;';
								foreach($allot as $allot_1)
								{
									
									$data=Allotment::model()->findAllByAttributes(array('room_no'=>$allot_1->room_no,'status'=>'C'));
									echo $allot_1->bed_no.'&nbsp;&nbsp; ';
								}
							
								 ?>
                            </td>
                           <td align="center">
                           <?php
						   echo (count($data)).'/'.(count($allot));
						   ?>
                           </td>
                            
                                <?php /*?><?php if($list_1->status=='C')
	{
		echo '<td align="center">Yes</td>';
	}
	else
	{
	echo '<td align="center" >No</td>';
	}?><?php */?>
                           
                        </tr>
                        <?php 
			}
	}
	?>
                    </table>
 </div>
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
  <?php
              }  ?>
            </div>
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>