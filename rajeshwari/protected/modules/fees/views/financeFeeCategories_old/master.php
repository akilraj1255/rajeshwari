<script language="javascript">
function batch()
{
 var id = document.getElementById('batchdrop').value;
 window.location= 'index.php?r=fees/financeFeeCategories/master&id='+id;	
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
<?php $this->renderPartial('//assesments/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">

<?php echo CHtml::link('Create Category', array('create', 'id'=>1)); ?><br />

<?php echo CHtml::link('Create Particulars', array('create1', 'id'=>1)); ?><br />
<?php echo CHtml::link('Create discount', array('view', 'id'=>1)); ?><br />
<?php
$data = CHtml::listData(Batches::model()->findAll("is_active=:x", array(':x'=>1)), 'id', 'name');
	if(isset($_REQUEST['id']))
	{
		$val = $_REQUEST['id'];	
	}
	else
	{
		$val = '';
	}
echo CHtml::dropDownList('batch','',$data,array('onchange'=>'batch()','id'=>'batchdrop','empty'=>'Select Batch','options'=>array($val=>array('selected'=>true)))); ?>
<?php 
if(isset($_REQUEST['id']))
{
$criteria = new CDbCriteria;
$criteria->compare('is_deleted',0);  // normal DB field	
$criteria->compare('batch_id',$_REQUEST['id']);
$total = FinanceFeeCategories::model()->count($criteria);
$pages = new CPagination($total);
$pages->setPageSize(Yii::app()->params['listPerPage']);
$pages->applyLimit($criteria);  // the trick is here!
$posts = FinanceFeeCategories::model()->findAll($criteria);
?>
 <div class="tablebx">  
 	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="tablebx_topbg">
        <td>Sl. No.</td>	
        <td>Fees Name</td>
        <td>Batch Name</td>
        <td>Created Date </td>
        <td>Select </td>
        <!--<td style="border-right:none;">Task</td>-->
      </tr>
      
	<?php
	$i=1;
    foreach($posts as $posts_1)
    {
	echo '<tr class="even">';	
	echo '<td>'.$i.'</td>';
    echo '<td>'.CHtml::link($posts_1->name, array('/financeFeeParticulars/manage', 'id'=>$posts_1->id)).'</td>';
	$batc = Batches::model()->findByAttributes(array('id'=>$posts_1->batch_id)); 
	echo '<td>'.$batc->name.'<td>';

	echo '<td>'.$posts_1->created_at.'</td>';
	echo '<td>&nbsp;</td>';
	echo '</tr>';
    
	
	 $i++;
    }
	?>
    
    </table>
    <?php    
    }
    ?>
    <!-- Pagination -->
    <?php /*?><div class="pagecon">
        <?php                                          
             $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$total,
            'pageSize'=>Yii::app()->params['listPerPage'],
            'maxButtonCount'=>5,
            'header'=>'',
            'htmlOptions'=>array('class'=>'pages'),
             ));?>
    </div><?php */?>
</div>


</div>
    </td>
  </tr>
</table>