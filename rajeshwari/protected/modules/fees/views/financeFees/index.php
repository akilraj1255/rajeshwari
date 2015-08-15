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
window.location= 'index.php?r=fees/financeFees/index&batch='+id_1+'&collection='+id;	
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
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

    <?php 

$data = CHtml::listData(Batches::model()->findAll("is_active=:x and is_deleted=:y", array(':x'=>1,':y'=>0)),'id','coursename');
if(isset($_REQUEST['batch']))
{
	$sel= $_REQUEST['batch'];
}
else
{
	$sel='';
}
echo '<span style="font-size:14px; font-weight:bold; color:#666;">'.Yii::t('fees','Batch').'</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'batch()','id'=>'batch','options'=>array($sel=>array('selected'=>true)))); 
echo '</td><td style="padding-top:13px;">';
?>

<?php
$data_1 = array();
if(isset($_REQUEST['batch']))
{
	$data_1 = CHtml::listData(FinanceFeeCollections::model()->findAll("batch_id=:x", array(':x'=>$_REQUEST['batch'])),'id','name');

}
if(isset($_REQUEST['collection']))
	{
		$sel_1= $_REQUEST['collection'];
	}	
	else
	{
	$sel_1 = '';	
	}
echo '<span style="font-size:14px; font-weight:bold; color:#666;">'.Yii::t('fees','Collection').' </span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data_1,array('prompt'=>'Select','onchange'=>'category()','id'=>'category','options'=>array($sel_1=>array('selected'=>true)))); 
echo '<br/><br/>';


?>

<?php if(isset($_REQUEST['batch']) && isset($_REQUEST['collection']))
{ 
	$collection = FinanceFeeCollections::model()->findByAttributes(array('id'=>$_REQUEST['collection']));
	//$particular = FinanceFeeParticulars::model()->findByAttributes(array('finance_fee_category_id'=>$collection->fee_category_id));
	$particular = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x", array(':x'=>$collection->fee_category_id));
	$currency=Configurations::model()->findByPk(5);
	if(count($particular)!=0)
	{
		//$amount = 0;
		$list  = FinanceFees::model()->findAll("fee_collection_id=:x", array(':x'=>$_REQUEST['collection']));
		?>
		<td>
		 </tr>
	</table>
	</div></div>
	   <div class="tableinnerlist"> 
		<table width="80%" cellspacing="0" cellpadding="0">
			<tr>
			 <th><strong><?php echo Yii::t('fees','Sl no.');?></strong></th>
			 <th><strong><?php echo Yii::t('fees','Particulars');?></strong></th>
			 <th><strong><?php echo Yii::t('fees','Applicable For');?></strong></th>
			  <th><strong><?php echo Yii::t('fees','Amount');?></strong></th>
			</tr>
			<?php 
			$i = 1;
				foreach($particular as $particular_1) { ?>
			<tr>
			 <td><?php echo $i; ?></td>
			 <td><?php echo $particular_1->name; ?></td>
			 <td>
				<?php 
					if($particular_1->student_category_id==NULL and $particular_1->admission_no==NULL){
						echo 'All'; 
					}
					elseif($particular_1->student_category_id!=NULL and $particular_1->admission_no==NULL){
						$student_category = StudentCategories::model()->findByAttributes(array('id'=>$particular_1->student_category_id));
						echo 'Category: '.$student_category->name; 
					}
					elseif($particular_1->student_category_id==NULL and $particular_1->admission_no!=NULL){
						echo 'Admission No: '.$particular_1->admission_no;
					}
					else{
						echo '-';
					}
				?>
			</td>
			  <td><?php echo $currency->config_value.' '.$particular_1->amount; ?></td>
			  
			</tr>
			<?php  /*$amount = $amount + $particular_1->amount;*/$i++;} ?>
			<?php /*?><tr>
				<td>&nbsp;</td>
				<td style="color:#333333; font-size:16px; text-align:right"><strong><?php echo Yii::t('fees','Total');?></strong></td>
				<td style="color:#333333; font-size:16px;"><?php echo $amount;?> </td>
			</tr><?php */?>
			</table> <br />
		   <table width="90%" cellspacing="0" cellpadding="0">
			<tr>
                 <th><strong><?php echo Yii::t('fees','Sl no.');?> </strong></th>
                 <th><strong><?php echo Yii::t('fees','Admission No');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Student Name');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Fees');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Fees Paid');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Balance');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Payment');?></strong></th>
			</tr> 
		   <?php 
		   $i= 1;
		   foreach($list as $list_1) { 
		    $posts=Students::model()->findByAttributes(array('id'=>$list_1->student_id,'is_deleted'=>0));
				if($posts==NULL)
				{
					continue;
				}
		   ?> 
			<tr>
			 <td><?php echo $i; ?></td>
			 <td><?php 
			 echo $posts->admission_no;
			 ?></td>
			 <td><?php echo $posts->first_name.' '.$posts->last_name; ?></td>
			 <td>
				<?php
					$check_admission_no = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$collection->fee_category_id,'admission_no'=>$posts->admission_no));
					if(count($check_admission_no)>0){ // If any particular is present for this student
						$adm_amount = 0;
						foreach($check_admission_no as $adm_no){
							$adm_amount = $adm_amount + $adm_no->amount;
						}
						$fees = $adm_amount;
						//echo $adm_amount.' '.$currency->config_value;
						$balance = 	$adm_amount - $list_1->fees_paid;
					}
					else{ // If any particular is present for this student category
						$check_student_category = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$collection->fee_category_id,'student_category_id'=>$posts->student_category_id,'admission_no'=>''));
						if(count($check_student_category)>0){
							$cat_amount = 0;
							foreach($check_student_category as $stu_cat){
								$cat_amount = $cat_amount + $stu_cat->amount;
							}
							$fees = $cat_amount;
							//echo $cat_amount.' '.$currency->config_value;
							$balance = 	$cat_amount - $list_1->fees_paid;		
						}
						else{ //If no particular is present for this student or student category
							$check_all = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$collection->fee_category_id,'student_category_id'=>NULL,'admission_no'=>''));
							if(count($check_all)>0){
								$all_amount = 0;
								foreach($check_all as $all){
									$all_amount = $all_amount + $all->amount;
								}
								$fees = $all_amount;
								//echo $all_amount.' '.$currency->config_value;
								$balance = 	$all_amount - $list_1->fees_paid;
							}
							else{
								echo '-'; // If no particular is found.
							}
						}
					}
				if($fees)	
					echo $currency->config_value.' '.$fees;
				else
					echo '-';				
				?>
			 </td>
             <td>
             	<?php
				if($list_1->is_paid == 0)
			 	{
					echo $currency->config_value.' '.$list_1->fees_paid;
				}
				else
				{
					echo $currency->config_value.' '.$fees; 
				}
				?>
             </td>
             <?php 
			 	if($list_1->is_paid == 0 and $list_1->fees_paid > $fees)
				{
				?>
					<td style="color: #F50000">
				<?php                    
				}
				else
				{
				?>
					<td>
				<?php                    	
				}
				if($list_1->is_paid == 0)
			 	{	
             		echo $currency->config_value.' '.$balance;
				}
				else
				{
					echo '-';
				}
				?>
             </td>
			 <td id="req_res<?php echo $list_1->id;?>"><?php 
			 if($list_1->is_paid == 0)
			 {
			 	echo CHtml::ajaxLink(Yii::t('fees','Full'), Yii::app()->createUrl('fees/FinanceFees/Payfees' ), array('type' =>'GET','data' =>array( 'val1' => $list_1->id,'fees'=> $fees ),'dataType' => 'text',  'update' =>'#req_res'.$list_1->id,'success'=>'js: function(data) {window.location.reload();}'),array( 'confirm'=>'Are You Sure?'));
				echo ' | ';
				//if($list_1->fees_paid > $fees)
				//{
					echo CHtml::ajaxLink(Yii::t('fees','Edit'), Yii::app()->createUrl('fees/FinanceFees/Editfees' ), array('type' =>'GET','data' =>array( 'id' => $list_1->id ),'dataType' => 'text',  'update' =>'#edit'.$list_1->id, 'onclick'=>'$("#editfees'.$list_1->id.'").dialog("open"); return false;',));
					echo '<div  id="edit'.$list_1->id.'"></div>';
				//}
				//else
				//{
					echo CHtml::ajaxLink(Yii::t('fees','Partial'), Yii::app()->createUrl('fees/FinanceFees/Partialfees' ), array('type' =>'GET','data' =>array( 'id' => $list_1->id ),'dataType' => 'text',  'update' =>'#partial'.$list_1->id, 'onclick'=>'$("#partialfees'.$list_1->id.'").dialog("open"); return false;',));
					echo '<div  id="partial'.$list_1->id.'"></div>';
				//}
			 }
			 else
			 {
			 	echo Yii::t('fees','Paid');
				echo ' | ';
				echo CHtml::ajaxLink(Yii::t('fees','Edit'), Yii::app()->createUrl('fees/FinanceFees/Editfees' ), array('type' =>'GET','data' =>array( 'id' => $list_1->id ),'dataType' => 'text',  'update' =>'#edit'.$list_1->id, 'onclick'=>'$("#editfees'.$list_1->id.'").dialog("open"); return false;',));
					echo '<div  id="edit'.$list_1->id.'"></div>';
				
			 }
			 ?>
             
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
