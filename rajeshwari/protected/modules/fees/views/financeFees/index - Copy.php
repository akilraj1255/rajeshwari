<?php
$this->breadcrumbs=array(
	'Finance Fees'=>array('/fees'),
	
);?>
<script language="javascript">
function batch()
{
var id = document.getElementById('batch').value;
window.location= 'index.php?r=fees/financeFees/index&batch='+id;	
}
function category()
{
var id_1 = document.getElementById('batch').value;
var id = document.getElementById('category').value;
window.location= 'index.php?r=fees/financeFees/index&batch='+id_1+'&course='+id;	
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <h1><?php echo Yii::t('fees','Fees Collection');?></h1>
    <div class="formCon" style="padding:3px;">
    <div class="formConInner" style="padding:3px 10px;">
    <table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

    <?php 

$data = CHtml::listData(Batches::model()->findAll("is_active=:x", array(':x'=>1)),'id','name');
if(isset($_REQUEST['batch']))
{
	$sel= $_REQUEST['batch'];
}
else
{
	$sel='';
}
echo '<span style="font-size:14px; font-weight:bold; color:#666;">'.Yii::t('fees','Batch<').'/span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'batch()','id'=>'batch','options'=>array($sel=>array('selected'=>true)))); 
echo '</td><td style="padding-top:13px;">';
?>

<?php
$data_1 = array();
if(isset($_REQUEST['batch']))
{
	$data_1 = CHtml::listData(FinanceFeeCollections::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['batch'])),'id','name');
	
	
}
if(isset($_REQUEST['course']))
	{
		$sel_1= $_REQUEST['course'];
	}	
	else
	{
	$sel_1 = '';	
	}
echo '<span style="font-size:14px; font-weight:bold; color:#666;">'.Yii::t('fees','Collection').' </span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data_1,array('prompt'=>'Select','onchange'=>'category()','id'=>'category','options'=>array($sel_1=>array('selected'=>true)))); 
echo '<br/><br/>';


?>

<?php if(isset($_REQUEST['batch']) && isset($_REQUEST['course']))
{ 
$collection = FinanceFeeCollections::model()->findByAttributes(array('id'=>$_REQUEST['course']));
//$particular = FinanceFeeParticulars::model()->findByAttributes(array('finance_fee_category_id'=>$collection->fee_category_id));
$particular = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x", array(':x'=>$collection->fee_category_id));

if(count($particular)!=0)
{
	$amount = 0;




	
	$list  = FinanceFees::model()->findAll("fee_collection_id=:x", array(':x'=>$_REQUEST['course']));
	?>
    <td>
     </tr>
</table>
</div></div>
   <div class="tableinnerlist"> 
    <table width="70%" cellspacing="0" cellpadding="0">
        <tr>
         <th><strong><?php echo Yii::t('fees','Sl no.');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Paticulars');?></strong></th>
          <th><strong><?php echo Yii::t('fees','Amount');?></strong></th>
        </tr>
        <?php 
		$i = 1;
			foreach($particular as $particular_1) { ?>
        <tr>
         <td><?php echo $i; ?></td>
         <td><?php echo $particular_1->name; ?></td>
          <td><?php echo $particular_1->amount; ?></td>
        </tr>
        <?php  $amount = $amount + $particular_1->amount; $i++;} ?>
        <tr>
        <td>&nbsp;</td>
        <td style="color:#333333; font-size:16px; text-align:right"><strong><?php echo Yii::t('fees','Total');?></strong></td>
        <td style="color:#333333; font-size:16px;"><?php echo $amount;?> </td>
      </tr>
        </table> <br />
       <table width="70%" cellspacing="0" cellpadding="0">
        <tr>
         <th><strong><?php echo Yii::t('fees','Sl no.');?> </strong></th>
         <th><strong><?php echo Yii::t('fees','Student Name');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Fees');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Action');?></strong></th>
        </tr> 
       <?php 
	   $i= 1;
	   foreach($list as $list_1) { ?> 
        <tr>
         <td><?php echo $i; ?></td>
         <td><?php 
		 $posts=Students::model()->findByAttributes(array('id'=>$list_1->student_id));
		 echo $posts->first_name; ?></td>
         <td><?php echo $amount; ?></td>
         <td id="req_res<?php echo $list_1->id;?>"><?php 
		 if($list_1->is_paid == 0)
		 echo CHtml::ajaxLink(Yii::t('fees','Pay Fees'), Yii::app()->createUrl('fees/FinanceFees/Payfees' ), array('type' =>'GET','data' =>array( 'val1' => $list_1->id ),'dataType' => 'text',  'update' =>'#req_res'.$list_1->id),array( 'confirm'=>'Are You Sure?',));
		 else
		 echo Yii::t('fees','Paid'); ?>
		  </td>
        
        
        </tr>   
        
    
    <?php $i++; } ?>
  
    </table>
</div>


<?php }
?>



<?php } ?>

    
    
    </div>
    </td>
  </tr>
</table>
