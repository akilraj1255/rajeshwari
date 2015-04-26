<script language="javascript">



function tab()
{
//alert(1);
      $("#filter").slideToggle("slow");
	 

}
</script>

<?php
$this->breadcrumbs=array(
	'Report'=>array('/report'),
	'Advanced Report',
);
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
	'method' => 'GET',
)); ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0" >
    <tr>
        <td width="247" valign="top">
       		<?php $this->renderPartial('left_side');?>
        </td>
        <td valign="top"> 
            <div class="cont_right">
                <h1><?php echo Yii::t('Report','Student Information');?></h1>
                <div class="formCon">
                    <div class="formConInner">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="s_search">
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('Report','Name');?></strong></td>
                                <td>&nbsp;</td>
                                <td><input type="text" name="studentname" /></td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('Report','Admission Number');?></strong></td>
                                <td>&nbsp;</td>
                                <td> <input type="text" name="admissionnumber" /></td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('Report','Email');?></strong></td>
                                <td>&nbsp;</td>
                                <td><input type="text" name="email" /></td>
                            </tr>
                            
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="top"><strong><?php echo Yii::t('Report','Gender');?></strong></td>
                                <td>&nbsp;</td>
                                <td><?php echo CHtml::activeDropDownList($model,'gender',array('M' => 'Male', 'F' => 'Female'),array('prompt'=>'All')); ?></td>
                            </tr>
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('Report','Blood Group');?></strong></td>
                                <td>&nbsp;</td>
                                <td><?php echo CHtml::activeDropDownList($model,'blood_group',
                                        array('A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'AB-' => 'AB-'),
                                        array('prompt' => 'Select')); ?></td>
                            </tr>
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" name="guard" value="1" /></td>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('Report','Include guardian details');?></strong></td>
                            </tr>
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                        </table> <!-- END class="s_search" -->
                        <?php
                        $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
                        if($settings!=NULL)
                        {
                        	$date=$settings->dateformat;                        
                        }
                        else
                       		$date = 'dd-mm-yy';	
                        ?>
                        
                        
                        <div onclick="tab();" style="cursor:pointer; color:#069; padding-left:0px; padding-top:4px;">
                        	<span style="font-weight:bold;">
								<?php echo Yii::t('Report','Advanced Search');?>
							</span>
						</div>
                        
                        <!-- Advanced Search Table -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none" id="filter">
                        	<tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                            
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('Report','Date Of Birth');?></strong></td>
                                <td>&nbsp;</td>
                                <td><?php echo CHtml::activeDropDownList($model,'dobrange',array('1' => 'less than', '2' => 'equal to', '3' => 'greater than'),array('prompt'=>'Option')); ?>
                                <?php 
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'name'=>'Students[date_of_birth]',
                                    'model'=>$model,
                                    'value'=>$model->date_of_birth,
                                    
                                    'options'=>array(
                                        'showAnim'=>'fold',
                                        'dateFormat'=>$date,
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'height:20px;'
                                    ),
                                ));
                                ?></td>
                            </tr>
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong><?php echo Yii::t('Report','Admission Date');?></strong></td>
                                <td>&nbsp;</td>
                                <td><?php echo CHtml::activeDropDownList($model,'admissionrange',array('1' => 'less than', '2' => 'equal to', '3' => 'greater than'),array('prompt'=>'Option')); ?>
                                <?php 
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'name'=>'Students[admission_date]',
                                    'model'=>$model,
                                    'value'=>$model->admission_date,
                                    
                                    'options'=>array(
                                        'showAnim'=>'fold',
                                        'dateFormat'=>$date,
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'height:20px;'
                                    ),
                                ));
                                ?></td>
                            </tr>
                            <tr>
                            	<td colspan="4">&nbsp;</td>
                            </tr>
                        </table>
                         <!-- END Advanced Search Table -->
                        <?php //echo CHtml::checkBox('guard');?>
                        <div style="margin-top:10px;"><?php echo CHtml::submitButton( 'Search',array('name'=>'search','class'=>'formbut')); ?></div>   
                    </div> <!-- END div class="formConInner" -->
                </div> <!--END div class="formCon" -->
                <br />
                
                <!-- Search Results -->  
                <?php if(isset($list))
                {
               ?>
					<div class="tablebx">  
                        <div class="pagecon">
							 <?php 
                                  $this->widget('CLinkPager', array(
                                  'currentPage'=>$pages->getCurrentPage(),
                                  'itemCount'=>$item_count,
                                  'pageSize'=>$page_size,
                                  'maxButtonCount'=>5,
                                  //'nextPageLabel'=>'My text >',
                                  'header'=>'',
                              'htmlOptions'=>array('class'=>'pages'),
                              ));?>
                        </div> <!-- End div class="pagecon" -->  
                        <!-- Result Table -->                                  
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr class="tablebx_topbg">
                                <td><?php echo Yii::t('students','Sl. No.');?></td>	
                                <td><?php echo Yii::t('students','Student Name');?></td>
                                <td><?php echo Yii::t('students','Admission No.');?></td>
                                <td><?php echo Yii::t('students','Course/Batch');?></td>
                                <td><?php echo Yii::t('students','Gender');?></td>
                                <?php
								if(isset($flag) && ($flag!='0'))
								{
								?>
								<td><?php echo Yii::t('students','Guardian');?></td>
								<?php
								}
								?>
							</tr>
							<?php 
							if($list!=NULL)
							{
								if(isset($_REQUEST['page']))
								{
								$i=($pages->pageSize*$_REQUEST['page'])-9;
								}
								else
								{
								$i=1;
								}
								
								$cls="even";
								
								foreach($list as $list_1)
								{ 
								?>
									<tr class=<?php echo $cls;?>>
									
										<td><?php echo $i; ?></td>
										
										<td>
											<?php echo CHtml::link(ucfirst($list_1->first_name.'  '.$list_1->middle_name.'  '.$list_1->last_name),array('/students/students/view','id'=>$list_1->id)) ?>
										</td>
										
										<td>
											<?php echo $list_1->admission_no ?>
										</td>
										
										<td>
											<?php 
											$batc = Batches::model()->findByAttributes(array('id'=>$list_1->batch_id)); 
											if($batc!=NULL)
											{
												$cours = Courses::model()->findByAttributes(array('id'=>$batc->course_id)); 
												echo $cours->course_name.' / '.$batc->name; 
											}
											else
											{
												echo '-'; 
											}
											?>
										</td>
										
										<td>
											<?php if($list_1->gender=='M')
											{
												echo 'Male';
											}
											elseif($list_1->gender=='F')
											{
												echo 'Female';
											}
											else
											{
												echo '-';
											}?>
										</td>
										
										
										<?php
										if(isset($flag) && ($flag!='0'))
										{
										$guard=Guardians::model()->findByAttributes(array('id'=>$list_1->parent_id));
										?>
										<td>
											<?php 
											if($guard!=NULL)
												echo CHtml::link(ucfirst($guard->first_name).' '.ucfirst($guard->last_name),array('/students/guardians/view','id'=>$guard->id));
											else
												echo '-';	
											?> 
										</td>
										<?php
										}
										?>
										<!--<td style="border-right:none;">Task</td>-->
									</tr>
									
									<?php
									if($cls=="even")
									{
										$cls="odd" ;
									}
									else
									{
										$cls="even"; 
									}
									$i++;
								}
							} // End If $list!=NULL
							else //$list == NULL
							{
								echo '<tr><td align="center" colspan="5"><strong>'.Yii::t('students','No Results Found!').'</strong></td></tr>';		
							}
							?>
							</table>
							<!-- End Result Table -->
							<div class="pagecon">
							<?php                                          
							  $this->widget('CLinkPager', array(
							  'currentPage'=>$pages->getCurrentPage(),
							  'itemCount'=>$item_count,
							  'pageSize'=>$page_size,
							  'maxButtonCount'=>5,
							  //'nextPageLabel'=>'My text >',
							  'header'=>'',
							  'htmlOptions'=>array('class'=>'pages'),
							  ));?>
							 </div> <!-- End bottom div class="pagecon" -->
							<div class="clear"></div>
						</div> <!-- End div class="tablebx" -->
						<?php 
						
                }
				
                ?>
                <!-- End Search Results --> 
            </div>
        </td>
    </tr>
</table>
 <?php $this->endWidget(); ?>