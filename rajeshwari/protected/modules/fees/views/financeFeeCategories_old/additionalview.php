<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
<?php $this->renderPartial('//assesments/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    
    <h1>Create Additional View</h1>
    
    <div class="formCon" style="width:60%">

    <div class="formConInner">
    <?php
	if(isset($_REQUEST['id']))
	{ 
	$posts_1=FinanceFeeCategories::model()->findByAttributes(array('id'=>$_REQUEST['id']));
	$posts=FinanceFeeCollections::model()->findByAttributes(array('fee_category_id'=>$posts_1->id));
	?>
	<table width="50%">
    <tr>
     <td>Category Name</td>
     <td></td>
     <td><?php echo $posts_1->name; ?></td>
    </tr>
    <tr>
     <td>Description</td>
     <td></td>
     <td><?php echo $posts_1->description; ?></td>
    </tr>
    <tr>
     <td>Course</td>
     <td></td>
     <td>
     <?php
	 $batch =Batches::model()->findByPk($posts_1->batch_id);
	 echo $batch->course123->course_name;
	 
	 ?>
     </td>
    </tr>
    <tr>
     <td>Start Date</td>
     <td></td>
     <td><?php echo $posts->start_date; ?></td>
    </tr>
    <tr>
     <td>End Date</td>
     <td></td>
     <td><?php echo $posts->end_date; ?></td>
    </tr>
    <tr>
     <td>Due Date</td>
     <td></td>
     <td><?php echo $posts->due_date; ?></td>
    </tr>
    </table> 
    <?php echo CHtml::link('Add Particular', array('feeCollectionParticulars/create', 'id'=>$_REQUEST['id'])); ?>
  <?php   $collection=feeCollectionParticulars::model()->findAll("	finance_fee_collection_id =:x", array(':x'=>$_REQUEST['id']));
       if(count($collection)!=0)
	   {
   ?>  
 <div class="tablebx">  
 	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="tablebx_topbg">
       <td>Sl no.</td>
       <td>Particulars</td>
       <td>Student Category</td>
       <td>Admission no</td>
       <td>Amount ($)</td>
        <td>Created Date</td>
     </tr>
     <?php
	 $i=1;
	 foreach($collection as $collection_1)
	 {
		echo '<tr>';
		echo '<td>'.$i.'</td>'; 
		echo '<td>'.$collection_1->name.'</td>'; 
		echo '<td>';
		if($collection_1->student_category_id==NULL)
		 echo '-';
		else
		  echo  $collection_1->student_category_id;
		echo '</td>'; 
		echo '<td>';
		if($collection_1->admission_no==NULL)
		 echo '-';
		else
		  echo  $collection_1->admission_no;
		echo '</td>'; 
		echo '<td>'.$collection_1->amount.'</td>'; 
		echo '<td>'.$collection_1->created_at.'</td>'; 
		echo '</tr>';
		$i++;
	 }
	 ?>
     </table>
     </div>
    
    <?php
	   }
	   else
	   {
		echo 'No particulars added!';   
	   }
	}
    
    
    ?>
    
     </div>
    </div>


</div>
    </td>
  </tr>
</table>