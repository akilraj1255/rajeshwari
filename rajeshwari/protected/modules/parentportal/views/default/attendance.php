<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/ad2b9968/jquery.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dash_board.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/listnav.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/highchart/highcharts.js"></script>
<!-- Begin Coda Stylesheets -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/coda-slider-2.0.css" type="text/css" media="screen" />
<script language="javascript">
	function showsearch()
	{
		if ($("#seachdiv").is(':hidden'))
		{
			$("#seachdiv").show();
		}
		else
		{
			$("#seachdiv").hide();
		}
	}

	function getstudent() // Function to see student profile
	{
		var studentid = document.getElementById('studentid').value;
		if(studentid!='')
		{
			window.location= 'index.php?r=parentportal/default/attendance&id='+studentid;	
		}
		else
		{
			window.location= 'index.php?r=parentportal/default/attendance';
		}
	}
</script>

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
    
    $guardian = Guardians::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
	$students = Students::model()->findAllByAttributes(array('parent_id'=>$guardian->id));
	if(count($students)==1) // Single Student 
	{
		$attendances = StudentAttentance::model()->findAll('student_id=:x group by date',array(':x'=>$students[0]->id));
	}
	elseif(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL) // If Student ID is set
	{
		$attendances = StudentAttentance::model()->findAll('student_id=:x group by date',array(':x'=>$_REQUEST['id']));
		
	}
	elseif(count($students)>1) // Multiple Student
	{
    	$attendances = StudentAttentance::model()->findAll('student_id=:x group by date',array(':x'=>$students[0]->id));
	}
    foreach($attendances as $attendance)
    {
		$m=date('m',strtotime($attendance['date']))-1;
		$d=date('d',strtotime($attendance['date']));
		$y=date('Y',strtotime($attendance['date']));
		$cal .= "{
		title: '".'<div align="center" title="Reason: '.$attendance->reason.'"><img src="images/portal/atend_cross.png" width="26" border="0"  height="25" /></div>'."',
		start: new Date('".$y."', '".$m."', '".$d."')
		},";
    
    }
    ?>
    <div class="right_col"  id="req_res123">
		<script type='text/javascript'>
        $(document).ready(function(){
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
                <h1><?php echo Yii::t('parentportal','View Attendance'); ?></h1>
                <?php
                if(count($students)>1)
				{
					
					 $student_list = CHtml::listData($students,'id','studentname');
				?>
                	<div class="student_dropdown" style="top:3px;">
                        <?php
                        echo Yii::t('parentportal','Viewing Attendance of ').CHtml::dropDownList('sid','',$student_list,array('id'=>'studentid','style'=>'width:auto;','options'=>array($_REQUEST['id']=>array('selected'=>true)),'onchange'=>'getstudent();'));
                        ?>
                    </div> <!-- END div class="student_dropdown" -->
                <?php
				}
				?>
                <div> <!-- Some div start -->
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="3.5%" valign="top"></td>
                        <td width="95%"  valign="top">
                        <div>
                            <div  style="cursor:pointer" id="shbar"></div>
                            <!--Visits Tio Bar-->
                            <br/>
                            <div id="req_res">
                            	<div id='calendar' style="padding-right:20px;"></div>
                            </div>
                        </div>
                        </td>
                        <td width="3%" valign="top" id="tpanel"></td>
                    </tr>
                </table>
                <br />
                <br />
                <br />
                </div> <!-- Some div end -->
            </div> <!-- END div class="parentright_innercon" -->
        </div> <!-- END div id="parent_rightSect" -->
        <div class="clear"></div>
    </div>
</div>
