<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'change',
);
?>

<div id="parent_Sect">
    <?php $this->renderPartial('/settings/studentleft');?>
    
    <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1>Room</h1>
                
                <div class="profile_details">
        	

<?php
$data=Allotment::model()->findByAttributes(array('student_id'=>$_REQUEST['studentid']));
$student=Students::model()->findByAttributes(array('id'=>$_REQUEST['studentid']));
echo 'Your request for room change has been submitted';
?>
</div>



 	</div>
    
     <div class="clear"></div> 
     </div>
     <div class="clear"></div> 
    </div>