<?php
$this->breadcrumbs=array(
	'Hostel',
);
?>

<?php  $roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
					
						  foreach($roles as $role)
						  
						   if(sizeof($roles)==1 and $role->name == 'student')
						   { ?>
                           
                           <div id="parent_Sect">
    <?php $this->renderPartial('/settings/studentleft');?>
    
    <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1>Hostel Details</h1>
                 <div class="profile_details" style="position:relative;">
                 <?php
			 $student=Students::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
			 $register=Registration::model()->findByAttributes(array('student_id'=>$student->id,'status'=>'S'));
			 if($register!=NULL)
			 {
				 $foodinfo=FoodInfo::model()->findByAttributes(array('id'=>$register->food_preference));
				 $mess=MessFee::model()->findByAttributes(array('student_id'=>$student->id));
			
		?>  
               <div class="but_right_con" style=" position:absolute; top:13px; right:-70px;"><?php echo CHtml::link(Yii::t('hostel','Change Room'),array('/hostel/room/change','id'=>$student->id),array('class'=>'com_but')); ?></div> 
               
            
         
  <div class="emp_tabwrapper">
  <?php
  	if(!isset($_REQUEST['id']) || $_REQUEST['id']==='1')
			{
				$link_1='active';
				$link_2='';
				$link_3='';
				
			}
			else if($_REQUEST['id']=='2')
			{
				$link_1='';
				$link_2='active';
				$link_3='';
				
			}
			else if($_REQUEST['id']=='3')
			{
				$link_1='';
				$link_2='';
				$link_3='active';
				
				
			}
  ?>
  <div class="tab_nav">
                	<ul >
                    	<li>
                        <?php echo CHtml::link(Yii::t('hostel','Mess Fee'),array('/hostel','id'=>'1'),array('class'=>$link_1));?>
                       </li>
                        <li> <?php echo CHtml::link(Yii::t('hostel','Hostel Fee'),array('/hostel','id'=>'2'),array('class'=>$link_2));?></li>
                        <li> <?php echo CHtml::link(Yii::t('hostel','Mess Dues'),array('/hostel','id'=>'3'),array('class'=>$link_3));?></li>
                       
                    </ul>
                    <div class="clear"></div>
                </div>


  </div>
  <?php
  if(!isset($_REQUEST['id']))
  {
	  ?>
      <?php
  $allot=Allotment::model()->findByAttributes(array('student_id'=>$student->id));
  $floordetails=Floor::model()->findByAttributes(array('id'=>$allot->floor));
  $hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floordetails->hostel_id));
  ?>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr >
						<th align="center"><?php echo Yii::t('hostel','Student Name');?></th>
                        <th align="center"><?php echo Yii::t('hostel','Hostel Name');?></th>
                        <th align="center"><?php echo Yii::t('hostel','Floor No');?></th>
						<th align="center"><?php echo Yii::t('hostel','Room No');?></th>
						<th align="center"><?php echo Yii::t('hostel','Bed');?></th>
					
					</tr>
                    <?php
					if($allot!=NULL)
					{
					?>
                    <tr>
   							    <td align="center"><?php echo $student->first_name.' '.$student->last_name; ?></td>
                                <td align="center"><?php echo $hostel->hostel_name;?></td>
                                <td align="center"><?php echo $floordetails->floor_no;?></td>
   			 					<td align="center"><?php echo $allot->room_no;?></td>
    							<td align="center"><?php echo $allot->bed_no;?></td>
    							
    					</tr>
                        <?php 
					}
					else
					{
						echo '<tr><td colspan="5">'.Yii::t('hostel','No data available now..').'</td></tr>';
					}
						?>
                        </table>
      <?php
  }
  else if(isset($_REQUEST['id']) && ($_REQUEST['id']==1))
  {
	  $foodinfo=FoodInfo::model()->findByAttributes(array('id'=>$register->food_preference));
	  $mess=MessFee::model()->findByAttributes(array('student_id'=>$student->id));
	  ?>
      <table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr >
						<th align="center"><?php echo Yii::t('hostel','Student Name');?></th>
						<th align="center"><?php echo Yii::t('hostel','Mess Fee');?></th>
						<th align="center"><?php echo Yii::t('hostel','Status');?></th>
					
					</tr>
                    <tr>
   							 <td align="center"><?php
										
												echo $student->first_name.' '.$student->last_name;
										
	
									 ?></td>
   			 					<td align="center"><?php echo $foodinfo->amount;?></td>
    							<td align="center"><?php 
								if($mess!=NULL)
								{
								if($mess->is_paid=='1')
								echo 'Paid';
								else if($mess->is_paid=='0')
								echo 'Not Paid';
								}
								else
								echo 'Nil';?></td>
    							
    					</tr>
                        </table>
      <?php
  }
  
   else if(isset($_REQUEST['id']) && ($_REQUEST['id']==2))
  {
	  $foodinfo=FoodInfo::model()->findByAttributes(array('id'=>$register->food_preference));
	  $mess=MessFee::model()->findByAttributes(array('student_id'=>$student->id));
	  ?>
      <table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr >
						<th align="center"><?php echo Yii::t('hostel','Student Name');?></th>
						<th align="center"><?php echo Yii::t('hostel','Mess Fee');?></th>
						<th align="center"><?php echo Yii::t('hostel','Status');?></th>
					
					</tr>
                    <tr>
   							 <td align="center"><?php
										
												echo $student->first_name.' '.$student->last_name;
										
	
									 ?></td>
   			 					<td align="center"><?php echo $foodinfo->amount;?></td>
    							<td align="center"><?php 
								if($mess!=NULL)
								{
								if($mess->is_paid=='1')
								echo 'Paid';
								else if($mess->is_paid=='0')
								echo 'Not Paid';
								}
								else
								echo 'Nil';?></td>
    							
    					</tr>
                        </table>
      <?php
  }
   else if(isset($_REQUEST['id']) && ($_REQUEST['id']==3))
  {
	  $foodinfo=FoodInfo::model()->findByAttributes(array('id'=>$register->food_preference));
	  $mess=MessFee::model()->findByAttributes(array('student_id'=>$student->id,'is_paid'=>'0'));
	  ?>
      <table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr >
						<th align="center"><?php echo Yii::t('hostel','Student Name');?></th>
						<th align="center"><?php echo Yii::t('hostel','Mess Fee');?></th>
						<th align="center"><?php echo Yii::t('hostel','Status');?></th>
					
					</tr>
                    <?php 
					if($mess==NULL)
					{
						echo '<tr><td align="center" colspan="3">'.Yii::t('hostel','No dues').'</td></tr>';
					}
					else
					{
					?>
                    <tr>
   							 <td align="center"><?php
										
												echo $student->first_name.' '.$student->last_name;
										
	
									 ?></td>
                                     
   			 					<td align="center"><?php echo $foodinfo->amount;?></td>
    							<td align="center"><?php 
								if($mess->is_paid=='1')
								echo 'No Dues';
								else if($mess->is_paid=='0')
								echo 'Due';?></td>
    							
    					</tr>
                        <?php } ?>
                        </table>
      <?php
  }
  ?>
  
 
       	
<?php 
	}

	else
	{
		?>
       
 		<?php echo Yii::t('hostel','Need hostel facility?Click here to');?>&nbsp;<?php echo CHtml::link(Yii::t('hostel','Register'),array('/hostel/registration/create'),array('class'=>'com_but')); ?><?php echo Yii::t('hostel','now');?> .
        <?php
	}
?>

 
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
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" width="75%">
        <?php
		$vacant=Allotment::model()->findAll('status=:x',array(':x'=>'C'));
		$allot=Allotment::model()->findAll('status=:x',array(':x'=>'S'));
		$mess=MessFee::model()->findAll('is_paid=:x',array(':x'=>')'));
		?>
        <div class="cont_right">
<h1><?php echo Yii::t('hostel','Hostel Dashboard');?></h1>
<div class="overview">
	<div class="overviewbox ovbox1">
    	<h1><strong><?php echo Yii::t('hostel','Vacant Rooms');?></strong></h1>
        <div class="ovrBtm"><?php echo count($vacant);?></div>
    </div>
    <div class="overviewbox ovbox2">
    	<h1><strong><?php echo Yii::t('hostel','Room Requests');?></strong></h1>
        <div class="ovrBtm"><?php echo count($allot);?></div>
    </div>
    <div class="overviewbox ovbox3">
    	<h1><strong><?php echo Yii::t('hostel','Mess Dues');?></strong></h1>
        <div class="ovrBtm"><?php echo count($mess);?></div>
    </div>
  <div class="clear"></div>
    
</div>
<div class="pdtab_Con">
	<div style="font-size:13px; padding:5px 0px"><strong><?php echo Yii::t('hostel','Available Rooms');?></strong></div>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
        <tr class="pdtab-h">
           <td align="center"><?php echo Yii::t('hostel','Floor');?></td>
            <td align="center"><?php echo Yii::t('hostel','Room No');?></td>
            <td align="center"><?php echo Yii::t('hostel','Availability');?></td>
        </tr>
        <?php
		$criteria=new CDbCriteria;
		$criteria->order = 'id DESC';
		$criteria->condition='status = :match4 group by room_no';
		$criteria->params[':match4'] = 'C';
		$total = Allotment::model()->count($criteria);
		$pages = new CPagination($total);
		$pages->setPageSize(Yii::app()->params['listPerPage']);
		$pages->applyLimit($criteria);  // the trick is here!
		$list = Allotment::model()->findAll($criteria);
		$page_size=Yii::app()->params['listPerPage'];
		//$list=Allotment::model()->findAll($criteria);
		if($list!=NULL)
		{
			foreach($list as $list_1)
			{
				$room=Room::model()->findByAttributes(array('id'=>$list_1->room_no));
				$allot=Allotment::model()->findAllByAttributes(array('room_no'=>$list_1->room_no));
				$floor=Floor::model()->findByAttributes(array('id'=>$room->floor));
		
		?>
        <tr>
            <td align="center"><?php echo $floor->floor_no; ?></td>
            <td align="center"><?php echo $list_1->room_no.'<br>Beds&nbsp;-&nbsp;';
								foreach($allot as $allot_1)
								{
									
									$data=Allotment::model()->findAllByAttributes(array('room_no'=>$allot_1->room_no,'status'=>'C'));
									echo $allot_1->bed_no.'&nbsp;&nbsp; ';
								}
							
								 ?></td>
            <td align="center">  <?php
						   echo (count($data)).'/'.(count($allot));
						   ?></td>
        </tr>
       
      <?php } 
	  }
	  else
	  {
		  echo '<tr><td align="center" colspan="3"><strong>'.Yii::t('hostel','No data available').'</strong></td></tr>';
	  }
	  ?>
        </tbody>
     </table>
      <div class="pagecon">
                                                 <?php 
	                                                  $this->widget('CLinkPager', array(
													  'currentPage'=>$pages->getCurrentPage(),
													  'itemCount'=>$total,
													  'pageSize'=>$page_size,
													  'maxButtonCount'=>5,
													  //'nextPageLabel'=>'My text >',
													  'header'=>'',
												  'htmlOptions'=>array('class'=>'pages'),
												  ));?>
                                                  </div>
    <?php } ?>                                </div>
<div class="clear"></div>
</div>
		</td>
       </tr>
     </table>
    </td>
   </tr>
</table>