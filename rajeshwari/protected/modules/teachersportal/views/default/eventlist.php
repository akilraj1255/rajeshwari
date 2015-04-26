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
<script>
	function getType()
	{
		var eventid = document.getElementById('eventid').value;
		if(eventid == '')
		{
			window.location= 'index.php?r=teachersportal/default/eventlist';
		}
		else
		{
			window.location= 'index.php?r=teachersportal/default/eventlist&type='+eventid;
		}
	}
</script>
<style>
a.sp_cal_viewcon
{
	text-decoration:none; display:block;
	color: #4F5759;
    font-family: 'Open Sans',sans-serif;
    font-size: 13px;
    font-weight: 700;
}
.sp_cal_viewbx {
	border-left-width: 1px;
	margin:0px 6px 20px 0px;
	padding:0px;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	-webkit-box-shadow: -1px 3px 6px rgba(50, 50, 50, 0.4);
	-moz-box-shadow:    -1px 3px 6px rgba(50, 50, 50, 0.4);
	box-shadow:         -1px 3px 6px rgba(50, 50, 50, 0.4);	
	position: relative;
	}
.sp_cal_hdng
{
	font-weight: bold;
	margin:0px;
	padding:5px 0px 5px 5px;
	background: url(images/sp_cal_bg.jpg) repeat-x ;
	-webkit-border-top-left-radius: 2px;
	-webkit-border-top-right-radius: 2px;
	-moz-border-radius-topleft: 2px;
	-moz-border-radius-topright: 2px;
	border-top-left-radius: 2px;
	border-top-right-radius: 2px;
	position:relative;
	display:block;
}
.sp_cal_titlebx
{
	padding:10px 10px ;
	margin:0px;
	font-size:11px;
	display:block;
	min-height:50px;
	word-wrap: break-word;
	background:#fff;
}
.sp_cal_color
{
	position:absolute;
	top:0px;
	right:0px;
	z-index:10;
}
</style>
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>

<link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/js/portal/fullcalendar/dbfullcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/js/portal/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/portal/fullcalendar/fullcalendar.js'></script>
<div id="parent_Sect">
      <?php $this->renderPartial('leftside');?> 
           <div style="position:absolute; width:auto; z-index:10; top:0px; right:25px; font-size:14px;">
                        	<?php
								echo Yii::t('CalModule.fullCal', 'Show');
								$data = EventsType::model()->findAll();
								$events_type = CHtml::listData($data,'id','name');
								
								foreach($data as $datum)
								{
									$options["options"][$datum->id] = array("style" => "background-color:".$datum->colour_code);
									
								}
								$options["prompt"] = 'All Events';
								$options["style"] = 'margin:10px';
								$options["onchange"] = 'getType();';
								$options["id"] = 'eventid';
								echo CHtml::dropDownList("Event_type",$_REQUEST['type'], $events_type,$options);
							?>
            </div>
            <?php
	        $cal ='{
							title: "All Day Event",
							start: new Date(y, m, 1)
						},';
			$m='';
			$d='';
			$y='';
			$roles = Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
		
				foreach($roles as $role)
				{
					$rolename = $role->name;
				}
				
				$criteria = new CDbCriteria;
				$criteria->order = 'start DESC';
				if($_REQUEST['type'])
				{
					$criteria->condition = 'type=:type';
					$criteria->params[':type'] = $_REQUEST['type'];
					if($rolename!= 'Admin')
					{
					
					$criteria->condition = $criteria->condition.' AND (placeholder= :default or placeholder=:placeholder)';
					$criteria->params[':placeholder'] = $rolename;
					$criteria->params[':default'] = '0';
					}
				}
				else
				{
					if($rolename!= 'Admin')
					{
					
					$criteria->condition = 'placeholder = :default or placeholder=:placeholder';
					$criteria->params[':placeholder'] = $rolename;
					$criteria->params[':default'] = '0';
					}
				}
				
				$events = Events::model()->findAll($criteria);
				foreach($events as $event)
				{	
					$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
					if($settings!=NULL)
					 {	
						$time=Timezone::model()->findByAttributes(array('id'=>$settings->timezone));
						date_default_timezone_set($time->timezone);
						$time=date($settings->displaydate.' '.$settings->timeformat,$event->start);
						$date=date($settings->displaydate,$event->start);
						$event->start = date($settings->timeformat,$event->start);
						$event->end = date($settings->timeformat,$event->end);
					 }
					 $m=date('m',strtotime($date))-1;
					 $d=date('d',strtotime($date));
					 $y=date('Y',strtotime($date));	
					 $event_type=EventsType::model()->findByPk($event->type);
		             $desc = preg_replace( "/\r|\n/", "", substr($event->desc,0,40));
					 $link = CHtml::ajaxLink(substr($event->title,0,25),$this->createUrl("default/view",array("event_id"=>$event->id)),array("update"=>"#jobDialog"),array("id"=>"showJobDialog1".$event->id,"class"=>"add"));					
				
				
				  $cal .= "{
					title: '".'<a class="sp_cal_viewcon" href="#"><div class="sp_cal_viewbx"><div class="sp_cal_color"><svg xml:space="preserve" enable-background="new 0 0 20 20" viewBox="0 0 20 20" height="20px" width="20px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" version="1.1"><path d="M0,0.004h17c0,0,3-0.303,3,2.728c0,3.011,0,17.272,0,17.272L0,0.004z" fill="'.$event_type->colour_code.'" clip-rule="evenodd" fill-rule="evenodd"/></svg></div><div class="sp_cal_hdng">'.addslashes($link).'</div><div class="sp_cal_titlebx"><strong>Time : </strong>'.$event->start. '-'.$event->end.'<br><strong>Details</strong> :'.$desc.'</div></div></a>'."',
					start: new Date('".$y."', '".$m."', '".$d."')
				  },";


               }
              ?>
                 <div id="jobDialog"></div>

                              
                
                 
                 
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
            <h1><?php echo Yii::t('teachersportal','View Event Calender'); ?></h1>
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
