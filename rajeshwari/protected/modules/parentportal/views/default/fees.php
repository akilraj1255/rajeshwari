<script>
	function getstudent() // Function to see student profile
	{
		var studentid = document.getElementById('studentid').value;
		if(studentid!='')
		{
			window.location= 'index.php?r=parentportal/default/fees&id='+studentid;	
		}
		else
		{
			window.location= 'index.php?r=parentportal/default/fees';
		}
	}
</script>

<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?> 
    <?php
		$user=User::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$guardian = Guardians::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
		$students = Students::model()->findAllByAttributes(array('parent_id'=>$guardian->id));
		if(count($students)==1) // Single Student 
		{
			$student = Students::model()->findByAttributes(array('id'=>$students[0]->id));
		}
		elseif(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL) // If Student ID is set
		{
			$student = Students::model()->findByAttributes(array('id'=>$_REQUEST['id']));
			
		}
		elseif(count($students)>1) // Multiple Student
		{
			$student = Students::model()->findByAttributes(array('id'=>$students[0]->id));
		}
		//$res=FinanceFees::model()->findAll(array('condition'=>'student_id=:vwid AND is_paid=:vpid','params'=>array(':vwid'=>$student->id, ':vpid'=>0)));
    ?>
    <div id="parent_rightSect">
        <div class="parentright_innercon">
            <div class="profile_top">
                <div class="prof_img">
					<?php
                     if($student->photo_data!=NULL)
                     { 
                        echo '<img  src="'.$this->createUrl('/students/Students/DisplaySavedImage&id='.$student->primaryKey).'" alt="'.$student->photo_file_name.'" width="100" height="103" />';
                    }
                    elseif($student->gender=='M')
                    {
                        echo '<img  src="images/portal/prof-img_male.png" alt='.$student->first_name.' width="100" height="103" />'; 
                    }
                    elseif($student->gender=='F')
                    {
                        echo '<img  src="images/portal/prof-img_female.png" alt='.$student->first_name.' width="100" height="103" />';
                    }
                    ?>
                </div> <!-- END div class="prof_img" -->
                <?php
                if(count($students)>1) // Show drop down only if more than 1 student present
				{
					$student_list = CHtml::listData($students,'id','studentname');
				?>
                    <div class="student_dropdown" style="top:15px;">
                        <?php
                        echo CHtml::dropDownList('sid','',$student_list,array('id'=>'studentid','style'=>'width:auto;','options'=>array($_REQUEST['id']=>array('selected'=>true)),'onchange'=>'getstudent();'));
                        ?>
                    </div> <!-- END div class="student_dropdown" -->
            	<?php
				}
				?>
                
                
                
                <h2><?php echo $student->first_name.' '.$student->middle_name.' '.$student->last_name;?></h2>
                <ul>
                    <li class="rleft"><?php echo Yii::t('parentportal','Course :');?></li>
                    <li class="rright">
						<?php 
                        $batch = Batches::model()->findByPk($student->batch_id);
                        echo $batch->course123->course_name;
                        ?>
                    </li>
                    <li class="rleft"><?php echo Yii::t('parentportal','Batch :');?></li>
                    <li class="rright"><?php echo $batch->name;?></li>
                    <li class="rleft"><?php echo Yii::t('parentportal','Admission No :');?></li>
                    <li class="rright"><?php echo $student->admission_no; ?></li>
                </ul>
            </div> <!-- END div class="profile_top" -->
            <div class="profile_details">
                <h3><?php echo Yii::t('parentportal','Pending Fees');?></h3>
                <br />
                <?php 
					$currency=Configurations::model()->findByPk(5);
					$res=FinanceFees::model()->findAll(array('condition'=>'student_id=:vwid AND is_paid=:vpid','params'=>array(':vwid'=>$student->id, ':vpid'=>0)));
					if(count($res)==0)
					{
						echo '<tr><td align="center" colspan="4"><i>'.Yii::t('parentportal','No Pending Fees').'</i></td></tr>';	
					}
                ?>
                <!-- Pending Fees Table -->
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo Yii::t('parentportal','Category Name');?></th>
                        <th><?php echo Yii::t('parentportal','Collection Name');?></th>
                        <th><?php echo Yii::t('parentportal','Last Date');?></th>
                        <th><?php echo Yii::t('parentportal','Amount');?></th>                        
                        <th><?php echo Yii::t('parentportal','Fees Paid');?></th>
                        <th><?php echo Yii::t('parentportal','Balance');?></th>
                        <th><?php echo Yii::t('parentportal','Action');?></th>
                    </tr>
                    <?php
                    foreach($res as $res_1)
                    {
							$posts = FinanceFeeCollections::model()->findByAttributes(array('id'=>$res_1->fee_collection_id));
							if($posts!=NULL)
							{
							$cat = FinanceFeeCategories::model()->findByAttributes(array('id'=>$posts->fee_category_id));
					
							?>
					
							<tr>
							  <td><?php if(@$cat) echo $cat->name; ?></td>
							   <td><?php echo $posts->name; ?></td>
							   <td>
									<?php 
										$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
										if($settings!=NULL)
										{	
											echo date($settings->displaydate,strtotime($posts->due_date));
											
										}
										else
										echo $posts->due_date; 
									?>
								</td>
								<td>
									<?php
									$check_admission_no = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$posts->fee_category_id,'admission_no'=>$student->admission_no));
									if(count($check_admission_no)>0){ // If any particular is present for this student
										$adm_amount = 0;
										foreach($check_admission_no as $adm_no){
											$adm_amount = $adm_amount + $adm_no->amount;
										}
										$fees = $adm_amount;
										//echo $adm_amount.' '.$currency->config_value;
										$balance = 	$adm_amount - $res_1->fees_paid;
									}
									else{ // If any particular is present for this student category
										$check_student_category = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$posts->fee_category_id,'student_category_id'=>$student->student_category_id,'admission_no'=>''));
										if(count($check_student_category)>0){
											$cat_amount = 0;
											foreach($check_student_category as $stu_cat){
												$cat_amount = $cat_amount + $stu_cat->amount;
											}
											$fees = $cat_amount;
											//echo $cat_amount.' '.$currency->config_value;
											$balance = 	$cat_amount - $res_1->fees_paid;				
										}
										else{ //If no particular is present for this student or student category
											$check_all = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$posts->fee_category_id,'student_category_id'=>NULL,'admission_no'=>''));
											if(count($check_all)>0){
												$all_amount = 0;
												foreach($check_all as $all){
													$all_amount = $all_amount + $all->amount;
												}
												$fees = $all_amount;
												//echo $all_amount.' '.$currency->config_value;
												$balance = 	$all_amount - $res_1->fees_paid;
											}
											else{
												echo '-'; // If no particular is found.
											}
										}
									}
									if($fees)	
										echo $fees.' '.$currency->config_value;
									else
										echo '-';
								 
								?>
								</td>
								<td>
									<?php
									if($res_1->is_paid == 0)
									{
										echo $res_1->fees_paid.' '.$currency->config_value;
									}
									else
									{
										echo $fees.' '.$currency->config_value; 
									}
									?>
								</td>
								<td>
									<?php
									if($res_1->is_paid == 0)
									{	
										echo $balance.' '.$currency->config_value;
									}
									else
									{
										echo '-';
									}
									?>
								 </td>
								<td> 
									<?php
									if($res_1->fees_paid!=0 and $res_1->fees_paid!=NULL)
									{ 
										echo Yii::t('parentportal','Paid Partially'); 
									}
									else
									{
										echo Yii::t('parentportal','Not Paid'); 
									}
									?>
								</td>
							</tr>
						  
							<?php 
							}
						} // END foreach($res as $res_1)
					?> 
                </table>
                <!-- END Pending Fees Table -->
                
                <br />
                <h3><?php echo Yii::t('parentportal','Paid Fees');?></h3>
                <?php 
                $res=FinanceFees::model()->findAll(array('condition'=>'student_id=:vwid AND is_paid=:vpid','params'=>array(':vwid'=>$student->id, ':vpid'=>1)));
                ?>
                <!-- Paid Fees Table -->
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo Yii::t('parentportal','Category Name');?></th>
                        <th><?php echo Yii::t('parentportal','Collection Name');?></th>
                        <th><?php echo Yii::t('parentportal','Amount');?></th>
                    </tr>
                    <?php
                    foreach($res as $res_1)
                    {
							$posts = FinanceFeeCollections::model()->findByAttributes(array('id'=>$res_1->fee_collection_id));
							if($posts!=NULL)
							{
							$cat = FinanceFeeCategories::model()->findByAttributes(array('id'=>$posts->fee_category_id));
					
							?>
					
							<tr>
							  <td><?php if(@$cat) echo $cat->name; ?></td>
							   <td><?php echo $posts->name; ?></td>
								<td>
									<?php
									$check_admission_no = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$posts->fee_category_id,'admission_no'=>$student->admission_no));
									if(count($check_admission_no)>0){ // If any particular is present for this student
										$adm_amount = 0;
										foreach($check_admission_no as $adm_no){
											$adm_amount = $adm_amount + $adm_no->amount;
										}
										$fees = $adm_amount;
										//echo $adm_amount.' '.$currency->config_value;
										$balance = 	$adm_amount - $res_1->fees_paid;
									}
									else{ // If any particular is present for this student category
										$check_student_category = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$posts->fee_category_id,'student_category_id'=>$student->student_category_id,'admission_no'=>''));
										if(count($check_student_category)>0){
											$cat_amount = 0;
											foreach($check_student_category as $stu_cat){
												$cat_amount = $cat_amount + $stu_cat->amount;
											}
											$fees = $cat_amount;
											//echo $cat_amount.' '.$currency->config_value;
											$balance = 	$cat_amount - $res_1->fees_paid;				
										}
										else{ //If no particular is present for this student or student category
											$check_all = FinanceFeeParticulars::model()->findAllByAttributes(array('finance_fee_category_id'=>$posts->fee_category_id,'student_category_id'=>NULL,'admission_no'=>''));
											if(count($check_all)>0){
												$all_amount = 0;
												foreach($check_all as $all){
													$all_amount = $all_amount + $all->amount;
												}
												$fees = $all_amount;
												//echo $all_amount.' '.$currency->config_value;
												$balance = 	$all_amount - $res_1->fees_paid;
											}
											else{
												echo '-'; // If no particular is found.
											}
										}
									}
									if($fees)	
										echo $fees.' '.$currency->config_value;
									else
										echo '-';
								 
								?>
								</td>
							</tr>
						  
							<?php 
							}
						} // END foreach($res as $res_1)
                    ?>
                </table>
                <!-- END Paid Fees Table -->
            </div> <!-- END div class="profile_details" -->
        </div> <!-- END div class="parentright_innercon" -->
    </div> <!-- END div id="parent_rightSect" -->
    <div class="clear"></div>
</div> <!-- END div id="parent_Sect" -->

