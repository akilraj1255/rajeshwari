<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/ad2b9968/jquery.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dash_board.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/listnav.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/highchart/highcharts.js"></script>
	<!-- Begin Coda Stylesheets -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/coda-slider-2.0.css" type="text/css" media="screen" />
<script language="javascript">
function showsearch()
{
	if ($("#seachdiv").is(':hidden')){
	$("#seachdiv").show();
	}
	else{
		$("#seachdiv").hide();
	}
}

</script>
  
 <?php //echo Yii::app()->user->agency_id ?>

<?php Yii::app()->clientScript->registerCoreScript('jquery');?>

<link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/js/portal/fullcalendar/dbfullcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/js/portal/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/portal/fullcalendar/fullcalendar.js'></script>
<div id="parent_Sect">
      <?php $this->renderPartial('leftside');?> 
<?php

$cal ='{
					title: "All Day Event",
					start: new Date(y, m, 1)
				},';
$m='';
$d='';
$y='';
//$result=TaskAssignToPatients::model()->findAll(('status=:t1 OR status=:t2 OR status=:t3 OR status=:t4 OR  status=:t5 OR status IS NULL group by target_date'),array(':t1'=>'C',':t2'=>'S',':t3'=>'A',':t4'=>'E',':t5'=>'R'));
$studentdetails=Students::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
$student=StudentAttentance::model()->findAll('student_id=:x group by date',array(':x'=>$studentdetails->id));

foreach($student as $student_1)
{
		$m=date('m',strtotime($student_1['date']))-1;
		$d=date('d',strtotime($student_1['date']));
		$y=date('Y',strtotime($student_1['date']));
$cal .= "{
					title: '".'<div align="center" title="Reason: '.$student_1->reason.'"><img src="images/portal/atend_cross.png" width="26" border="0"  height="25" /></div>'."',
					start: new Date('".$y."', '".$m."', '".$d."')
				},";

}

?>

                              
                
                 
                 
                 <div class="right_col"  id="req_res123">
                           
                          
                                            
                                    
<script type='text/javascript'>


	$(document).ready(function() {
	
		var date = new Date();
		
		var d = date.getDate();
		
		var m = date.getMonth();
		var y = date.getFullYear();
	
		
		var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			editable: false,
			events: [ <?php echo $cal; ?>]
		});
		
	});
	

</script>

<script type="text/javascript">

$(document).ready(function(){
	
	 $("#shbar").click(function(){
		 
       $('#tpanel').toggle();
	 
	
        });

     
});
</script>
  <!--contentArea starts Here-->
 <div id="parent_rightSect">
        	<div class="parentright_innercon">
            <h1><?php echo Yii::t('studentportal','View Attendance'); ?></h1>
<div >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3.5%" valign="top">
    	
    </td>
    <td width="95%" valign="top">
    <div>
     <div  style="cursor:pointer" id="shbar"></div>
    <!--Visits Tio Bar-->
    <br/>
    
 
    <div id="req_res">
    
    
<div id='calendar' style="padding-right:20px;"></div>

	
</div>
</div>
</td>
<td width="3%" valign="top" id="tpanel"  >
	
</td>
  </tr>
</table>

<br />
<br />
<br />
</div>
</div>
</div>
 <div class="clear"></div>
      </div>
