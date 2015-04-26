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
<div class="db_Con">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5%" valign="top">
    	
    </td>
    <td width="71%" style="padding-left:30px;position:relative" valign="top">
    <div>
     <div  style="cursor:pointer" id="shbar"></div>
    <!--Visits Tio Bar-->
    <br/>
    
 
    <div id="req_res">
    
    
<div id='calendar' style="padding-right:20px;"></div>

	
</div>
</div>
</td>
<td width="22%" valign="top" id="tpanel"  style="border-left:1px #e1e1e1 dotted;">
	
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
