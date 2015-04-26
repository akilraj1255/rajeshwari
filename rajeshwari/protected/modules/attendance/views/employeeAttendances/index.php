
<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<script>
function course()
{
var id = document.getElementById('cou').value;
window.location= 'index.php?r=attendance/employeeAttendances/index&id='+id;	
}
</script>
<?php
  // $this->widget('application.extensions.ETooltip.ETooltip', array("selector"=>"#demo span[title]",'image'=>'white_arrow.png','tooltip'=>array("opacity"=>1, 'effect'=>'slide')));
?>
 <div style="background:#fff; min-height:800px;">  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
 
    <td valign="top" width="96%" align="left">
    <div style="padding:20px; position:relative;" id="demo">
    <h1><?php echo Yii::t('attendance','Employee Attendances');?></h1>
     <?php $this->renderPartial('/default/employee_tab');?>
    

<?php

function getweek($date,$month,$year)
{
$date = mktime(0, 0, 0,$month,$date,$year); 
$week = date('w', $date); 
switch($week) {
case 0: 
return 'Su';
break;
case 1: 
return 'M';
break;
case 2: 
return 'Tu';
break;
case 3: 
return 'W';
break;
case 4: 
return 'Th';
break;
case 5: 
return 'F';
break;
case 6: 
return 'Sa';
break;
}
}
?>



<div class="c_batch_tbar" style="height:58px;">
<?php if(isset($_REQUEST['id']))
{?>
	
	<div class="cb_right" style="width:120px">
        	<div class="status_bx">
    			<ul>
        			<li><span><?php echo count(Employees::model()->findAll("employee_department_id=:x", array(':x'=>$_REQUEST['id']))); ?></span><?php echo Yii::t('attendance','Employee(s)');?></li>
            		
        		</ul>
     		<div class="clear"></div>
   			</div>
            
        </div>

<?php }?>
<div class="cb_left" style="margin-top:8px;">
<?php

$data = CHtml::listData(EmployeeDepartments::model()->findAll(),'id','name');
if(isset($_REQUEST['id']))
{
	$sel= $_REQUEST['id'];
}
else
{
	$sel='';
}

echo Yii::t('attendance','Select Department&nbsp;&nbsp;');
echo CHtml::dropDownList('id','',$data,array('prompt'=>Yii::t('attendance','Select Department'),'onchange'=>'course()','id'=>'cou','options'=>array($sel=>array('selected'=>true)))); ?>

<?php 
if(isset($_REQUEST['id']))
{

	if(!isset($_REQUEST['mon']))
	{
		$mon = date('F');
		$mon_num = date('n');
		$curr_year = date('Y');
	}
	else
	{
		$mon = $model->getMonthname($_REQUEST['mon']);
		$mon_num = $_REQUEST['mon'];
		$curr_year = $_REQUEST['year'];
	}
	$num = cal_days_in_month(CAL_GREGORIAN, $mon_num, $curr_year); // 31
	?>
    </div>
    <div class="clear"></div>
   </div>

 
	<div align="center" class="atnd_tnav" style="top:150px;"><?php echo CHtml::link('<div class="atnd_arow_l"><img src="images/atnd_arrow-l.png" width="7" border="0"  height="13" /></div>', array('index', 'mon'=>date("m",strtotime($curr_year."-".$mon_num."-01 -1 months")),'year'=>date("Y",strtotime($curr_year."-".$mon_num."-01 -1 months")),'id'=>$_REQUEST['id']));  echo $mon.'&nbsp;&nbsp;&nbsp; '.$curr_year; echo CHtml::link('<div class="atnd_arow_r"><img src="images/atnd_arrow.png" border="0" width="7"  height="13" /></div>', array('index',  'mon'=>date("m",strtotime($curr_year."-".$mon_num."-01 +1 months")),'year'=>date("Y",strtotime($curr_year."-".$mon_num."-01 +1 months")),'id'=>$_REQUEST['id']));?></div>
<br />
<div class="ea_pdf" style="top:150px; right:0px;">

<?php 
	
	/*echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('employeeAttendances/pdf','id'=>$_REQUEST['id']),array('target'=>"_blank")); */
	
	if($_REQUEST['mon']&&$_REQUEST['year']){
  		echo CHtml::link('<img src="images/pdf-but.png" border="0">', array('employeeAttendances/pdf','mon'=>$_REQUEST['mon'],'year'=>$_REQUEST['year'],'id'=>$_REQUEST['id']),array('target'=>'_blank')); 
	}
	else{
		 echo CHtml::link('<img src="images/pdf-but.png" border="0">', array('employeeAttendances/pdf','mon'=>date("m"),'year'=>date("Y"),'id'=>$_REQUEST['id']),array('target'=>'_blank')); 
		
	}
?>

</div>
<div class="atnd_Con" style="margin-top:50px;">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th><?php echo Yii::t('attendance','Name');?></th>
    <?php
    for($i=1;$i<=$num;$i++)
    {
        echo '<th>'.getweek($i,$mon_num,$curr_year).'<span>'.$i.'</span></th>';
    }
    ?>
</tr>
<?php $posts=Employees::model()->findAll("employee_department_id=:x AND is_deleted=:y", array(':x'=>$_REQUEST['id'], ':y'=>0));
$j=0;
foreach($posts as $posts_1)
{
	if($j%2==0)
	$class = 'class="odd"';	
	else
	$class = 'class="even"';	
	
 ?>
<tr <?php echo $class; ?> >
    <td class="name"><?php echo $posts_1->first_name; ?></td>
    <?php
    for($i=1;$i<=$num;$i++)
    {
        echo '<td><span  id="td'.$i.$posts_1->id.'">';
		echo  $this->renderPartial('ajax',array('day'=>$i,'month'=>$mon_num,'year'=>$curr_year,'emp_id'=>$posts_1->id));
		/*echo CHtml::ajaxLink(Yii::t('job','ll'),$this->createUrl('EmployeeAttendances/addnew'),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog','type' =>'GET','data'=>array('day' =>$i,'month'=>$mon_num,'year'=>'2012','emp_id'=>$posts_1->id),
        ),array('id'=>'showJobDialog'));
		echo '<div id="jobDialog"></div>';*/
		
		echo '</span><div  id="jobDialog123'.$i.$posts_1->id.'"></div></td>';
		echo '</span><div  id="jobDialogupdate'.$i.$posts_1->id.'"></div></td>';
    }
    ?>
</tr>
<?php $j++; }?>
</table>
<?php } ?>

    </div>
    
    </div>
    </td>
  </tr>
</table>
</div>