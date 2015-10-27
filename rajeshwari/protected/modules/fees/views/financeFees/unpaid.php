<?php
$this->breadcrumbs=array(
	'Finance Fees'=>array('/fees'),
	
);?>
<script language="javascript">
function batch()
{
var id = document.getElementById('batch').value;
window.location= 'index.php?r=fees/financeFees/unpaid&batch='+id;	
}
function category()
{
var id_1 = document.getElementById('batch').value;
var id = document.getElementById('category').value;
window.location= 'index.php?r=fees/financeFees/unpaid&batch='+id_1+'&collection='+id;	
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <h1><?php echo Yii::t('fees','Unpaid Students');?></h1>
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
	$student_category_list=Yii::app()->db->createCommand('select id,name from student_categories')->queryAll();
	$categ=array();
	foreach ($student_category_list as $stu_cat) {
		$categ[$stu_cat["id"]]=$stu_cat["name"];
		//categ[$stu_cat->id]=$stu_cat->name;
	}

	$batch=$_REQUEST['batch'];

	$student_list= Yii::app()->db->createCommand('select students.id from students where batch_id=:batch_id')->bindValue('batch_id',$batch)->queryAll();
	$student_count = count($students_list);
	
	$student_arr_1=array();
	
	foreach($student_list as $student){
		foreach($student as $item){
			array_push($student_arr_1,$item); // Get the ids of students and push into an array
		}
	}
	
	$collection = FinanceFeeCollections::model()->findByAttributes(array('id'=>$_REQUEST['collection']));
	//$particular = FinanceFeeParticulars::model()->findByAttributes(array('finance_fee_category_id'=>$collection->fee_category_id));
	$particular = FinanceFeeParticulars::model()->findAll("finance_fee_category_id=:x", array(':x'=>$collection->fee_category_id));
	$currency=Configurations::model()->findByPk(5);
	if(count($particular)!=0)
	{
		//$amount = 0;
		$list  = FinanceFees::model()->findAll("fee_collection_id=:x", array(':x'=>$_REQUEST['collection']));
		$student_arr_2=array();
		foreach($list as $item){
			 array_push($student_arr_2,$item->student_id); // Push the students present in Finance fees tables
		}
		// Delete the student who is not present in the batch and somehow got added to the finance fee // table
		foreach($student_arr_2 as $student){
				if (!in_array($student,$student_arr_1)){
						$command=Yii::app()->db->createCommand('delete from finance_fees where student_id=:id and fee_collection_id=:coll_id and date is null')->bindValue('id',$student)->
						bindValue('coll_id',$_REQUEST['collection']);
						$command->execute();
						
				}
		}
		$missing_students = array_diff($student_arr_1,$student_arr_2);
		
		foreach($missing_students as $student){
			$finance = new FinanceFees;
			$finance->fee_collection_id = $_REQUEST['collection'];
			$finance->student_id = $student;
			$finance->is_paid = 0;
			$finance->save();
		}
	//	var_dump($missing_students);
		//$amount = 0;
	$list  = FinanceFees::model()->findAll("fee_collection_id=:x and is_paid=:y", array(':x'=>$_REQUEST['collection'],':y'=>0));
		
		?>
		<td>
		 </tr>
	</table>
	</div></div>
	
	   <div class="tableinnerlist">
	   	<div class="ea_pdf" style="top:6px; right:1px;"><?php echo CHtml::link('<img src="images/pdf-but.png" border="0" />', array('/fees/FinanceFees/unpaidpdf','batch'=>$_REQUEST['batch'],'collection'=>$_REQUEST['collection']),array('target'=>"_blank")); ?></div> 
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
                 <th><strong><?php echo Yii::t('fees','Category');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Fees');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Fees Paid');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Balance');?></strong></th>
                 <th><strong><?php echo Yii::t('fees','Payment');?></strong></th>
			</tr> 
		   <?php 
		   $i= 1;
		   foreach($list as $list_1) { 
			if(in_array($inactive_students,$list_1->student_id)){
				continue;
			}
		    $posts=Students::model()->findByAttributes(array('id'=>$list_1->student_id,'is_deleted'=>0,'is_active'=>1));
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
			 		if($categ[$posts->student_category_id] && $categ[$posts->student_category_id]!=""){
			 			echo $categ[$posts->student_category_id]; 
			 		}
			 		else{
			 			echo "-"; 
			 		}	
			 	?>
			 </td>
			 <td>
				<?php
					
						$check_student_category= Yii::app()->db->createCommand()->select('*')->from('finance_fee_particulars')->where('finance_fee_category_id=:finance_fee_cat_id and (student_category_id=:param1 or student_category_id is NULL)')->bindValue('finance_fee_cat_id',$collection->fee_category_id)->bindValue('param1',$posts->student_category_id)->queryAll();
						$fees=0;
						if(count($check_student_category)>0){
						
							$cat_amount = 0;
							foreach($check_student_category as $stu_cat){
								$cat_amount = $cat_amount + $stu_cat["amount"];
							}
							$fees = $cat_amount;
							$balance = 	$cat_amount - $list_1->fees_paid;		
						}
					
				if($fees!=0)	
					echo $currency->config_value.' '.$fees;
				else
					echo '-';				
				?>
			 </td>

             <td>
             	<?php
             			if($fees==0){
             				echo "-";
             			}
				elseif($list_1->is_paid == 0)
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
				if($list_1->is_paid == 0 && $fees!=0)
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
			 if($list_1->is_paid == 0 && $fees!=0)
			 {
			 	echo CHtml::ajaxLink(Yii::t('fees','Full'), Yii::app()->createUrl('fees/FinanceFees/Payfees' ), array('type' =>'GET','data' =>array( 'val1' => $list_1->id,'fees'=> $fees ),'dataType' => 'text',  'update' =>'#req_res'.$list_1->id,'success'=>'js: function(data) {window.location.reload();}'),array( 'confirm'=>'Are You Sure?'));
				echo ' | ';
				//if($list_1->fees_paid > $fees)
				//{
					//echo CHtml::ajaxLink(Yii::t('fees','Edit'), Yii::app()->createUrl('fees/FinanceFees/Editfees' ), array('type' =>'GET','data' =>array( 'id' => $list_1->id ),'dataType' => 'text',  'update' =>'#edit'.$list_1->id, 'onclick'=>'$("#editfees'.$list_1->id.'").dialog("open"); return false;',));
					//echo '<div  id="edit'.$list_1->id.'"></div>';
				//}
				//else
				//{
					echo CHtml::ajaxLink(Yii::t('fees','Partial'), Yii::app()->createUrl('fees/FinanceFees/Partialfees' ), array('type' =>'GET','data' =>array( 'id' => $list_1->id ),'dataType' => 'text',  'update' =>'#partial'.$list_1->id, 'onclick'=>'$("#partialfees'.$list_1->id.'").dialog("open"); return false;',));
					echo '<div  id="partial'.$list_1->id.'"></div>';
				//}
			 }
			 else
			 {
			 	echo Yii::t('fees','-');
				//echo ' | ';
				//echo CHtml::ajaxLink(Yii::t('fees','Edit'), Yii::app()->createUrl('fees/FinanceFees/Editfees' ), array('type' =>'GET','data' =>array( 'id' => $list_1->id ),'dataType' => 'text',  'update' =>'#edit'.$list_1->id, 'onclick'=>'$("#editfees'.$list_1->id.'").dialog("open"); return false;',));
					//echo '<div  id="edit'.$list_1->id.'"></div>';
				
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