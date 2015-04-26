<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
<?php $this->renderPartial('//assesments/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    
    <?php
	if(isset($_REQUEST['id']))
	{
		$data =  FinanceFeeParticulars::model()->findAll("finance_fee_category_id =:x", array(':x'=>$_REQUEST['id']));
		?>
         <div class="tablebx">  
        <table width="50%">
       <tr class="tablebx_topbg">
        	<td>Sl no.</td>
            <td>Category</td>
            <td>Student Category</td>
            <td>Admission number</td>
            <td>Amount( $ )</td>
            <td>Created Date</td>
        </tr>
        <?php
		$i=1;
		foreach($data as $data_1)
		{
			 echo '<tr class="even">';
			 echo '<td>'.$i.'</td>';
			 echo '<td>'.$data_1->name.'</td>';
			 echo '<td>';
			 if($data_1->student_category_id==NULL)
				 { echo '-';  }
			 else
			 	echo $data_1->student_category_id;
			 echo '</td>';
			 echo '<td>';
			  if($data_1->admission_no==NULL)
			   	 { echo '-';  }
			  else
			 	echo $data_1->admission_no;	 
			 echo '</td>';
			 echo '<td>'.$data_1->amount.'</td>';
			 echo '<td>'.$data_1->created_at.'</td>';
			 echo '</tr>';
			 $i++;
		}
		?>
        </table>
        </div>
<?php        
	}
 ?>
    
    
    
    </div>
    </td>
  </tr>
</table>