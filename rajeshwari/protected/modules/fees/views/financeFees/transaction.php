<?php
$this->breadcrumbs=array(
	'Finance Fees'=>array('/fees'),
	
);?>
<script language="javascript">
function collection()
{
var id = document.getElementById('collection').value;
window.location= 'index.php?r=fees/financeFees/transaction&collection='+id;	
}

function transact()
{
var id = document.getElementById('transaction_id').value;
window.location= 'index.php?r=fees/financeFees/transaction&transaction_id='+id; 
}
function student()
{
var id_1 = document.getElementById('collection').value;
var id = document.getElementById('student').value;
window.location= 'index.php?r=fees/financeFees/transaction&collection='+id_1+'&student='+id;	
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <h1><?php echo Yii::t('fees','Transaction Details');?></h1>
    <div class="formCon" style="padding:3px;">
    <div class="formConInner" style="padding:3px 10px;">
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

    <?php 

$data = CHtml::listData(FinanceFeeCollections::model()->findAll("is_deleted=:y", array(':y'=>0)),'id','name');
if(isset($_REQUEST['collection']))
{
	$sel= $_REQUEST['collection'];
}
else
{
	$sel='';
}
echo '<span style="font-size:14px; font-weight:bold; color:#666;">'.Yii::t('fees','Collection').'</span>&nbsp;&nbsp;&nbsp;&nbsp;<br>';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'collection()','id'=>'collection','options'=>array($sel=>array('selected'=>true)))); 
echo '</td></tr><tr><td style="padding-top:13px;">';
?>

<?php
$data_1 = array();
if(isset($_REQUEST['collection']))
{
	$data_1 = CHtml::listData(FinanceTransaction::model()->findAll("collection_id=:x", array(':x'=>$_REQUEST['collection'])),'id','student_id');
	
	
}

if(isset($_REQUEST['student']))
{
    $stud = $_REQUEST['student'];

}
else
{
    $stud = '';
}

echo '<br><span style="font-size:14px; font-weight:bold; color:#666;">'.Yii::t('fees','Admission no.').' </span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<br><input type="text" name="student" id="student" value="'.$stud.'" />';
echo '<br><br>';
echo CHtml::submitButton( 'Search',array('name'=>'search','class'=>'formbut', 'onclick'=>'student();'));


?>

    <td>
     </tr>
</table>

    
    

   

<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

    <?php 



echo '<br><b>OR</b><br><br><span style="font-size:14px; font-weight:bold; color:#666;">'.Yii::t('fees','Transaction ID').' </span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<br><input type="text" name="transaction_id" id="transaction_id" value="'.$_REQUEST['transaction_id'].'" />';
echo '<br><br>';
echo CHtml::submitButton( 'Search',array('name'=>'search','class'=>'formbut', 'onclick'=>'transact();'));


?>

    <td>
     </tr>
</table>

    </div></div><br /> <br /><br />
<?php if(isset($_REQUEST['collection']) && isset($_REQUEST['student']))
{ 



	//$amount = 0;
	$list  = FinanceTransaction::model()->findAll("collection_id=:x and student_id=:y", array(':x'=>$_REQUEST['collection'],':y'=>$_REQUEST['student']));
	// print_r($list);
    ?>

   <div class="tableinnerlist"> 
   <?php echo Yii::t('fees','Transaction Details');?>
    <table width="80%" cellspacing="0" cellpadding="0">
        <tr>
         <th><strong><?php echo Yii::t('fees','ID.');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Amount');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Date');?></strong></th>
        </tr>
        <tr>
        <?php 
		$i = 1;
			foreach($list as $list_item) { 

                echo '<td>'. $list_item['id']. '</td>';
                echo '<td>'. $list_item['amount']. '</td>';
                echo '<td>'. $list_item['transaction_date']. '</td>';

               
                ?>
        
       
        </tr>
      <?php } ?>
        </table> <br />
        
      
        
        
       
        <br />
 
</div>






<?php } ?>

<?php  if(isset($_REQUEST['transaction_id']) ) { 



    //$amount = 0;
    $list  = FinanceTransaction::model()->findAll("id=:x", array(':x'=>$_REQUEST['transaction_id']));
    // print_r($list);
    ?>

   <div class="tableinnerlist"> 
   <?php echo Yii::t('fees','Transaction Details');?>
    <table width="80%" cellspacing="0" cellpadding="0">
        <tr>
         <th><strong><?php echo Yii::t('fees','ID.');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Admission No.');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Amount');?></strong></th>
         <th><strong><?php echo Yii::t('fees','Date');?></strong></th>
        </tr>
        <tr>
        <?php 
        $i = 1;
            foreach($list as $list_item) { 

                echo '<td>'. $list_item['id']. '</td>';
                echo '<td>'. $list_item['student_id']. '</td>';
                echo '<td>'. $list_item['amount']. '</td>';
                echo '<td>'. $list_item['transaction_date']. '</td>';

               
                ?>
        
       
        </tr>
       <?php } ?>
        </table> <br />
        
      
        
        
       
        <br />
 
</div>






<?php } ?>

    
    
    </div>
    </td>
  </tr>
</table>
