<?php
$this->breadcrumbs=array(
'Students'=>array('index'),
'Document',
);


?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
        	<?php $this->renderPartial('profileleft');?>
        </td>
        <td valign="top">
            <div class="cont_right formWrapper">
           
                <!--<div class="searchbx_area">
                <div class="searchbx_cntnt">
                <ul>
                <li><a href="#"><img src="images/search_icon.png" width="46" height="43" /></a></li>
                <li><input class="textfieldcntnt"  name="" type="text" /></li>
                </ul>
                </div>
                </div>-->
                <h1 style="margin-top:.67em;">
					<?php echo Yii::t('students','Student Profile :');?> <?php echo ucfirst($model->first_name).' '.ucfirst($model->middle_name).' '.ucfirst($model->last_name); ?><br />
                </h1>
                <div class="edit_bttns last">
                    <ul>
                        <li>
                        	<?php echo CHtml::link(Yii::t('students','<span>Edit</span>'), array('update', 'id'=>$model->id),array('class'=>' edit ')); ?>
                        </li>
                        <li>
                        	<?php echo CHtml::link(Yii::t('students','<span>Students</span>'), array('students/manage'),array('class'=>'edit last'));?>
                        </li>
                    </ul>
                </div> <!-- END div class="edit_bttns last" -->
                <div class="clear"></div>
                
                <div class="emp_right_contner">
                 	<?php
					// Display Success Flash Messages 
					Yii::app()->clientScript->registerScript(
					   'myHideEffect',
					   '$(".flashMessage").animate({opacity: 1.0}, 3000).fadeOut("slow");',
					   CClientScript::POS_READY
					);
					?>
					<?php
					if(Yii::app()->user->hasFlash('successMessage')): 
					?>
					<div class="flashMessage" style="background:#FFF; color:#C00; padding-left:200px; top:150px;">
						<?php echo Yii::app()->user->getFlash('successMessage'); ?>
					</div>
					<?php
					endif;
					// END Display Success Flash Messages
					?>
                    
                    <?php
					// Display Error Flash Messages
					if(Yii::app()->controller->action->id=='document')
					{
					?>
						<?php
						if(Yii::app()->user->hasFlash('errorMessage')): 
						?>
						<div class="flashMessage" style="background:#FFF; color:#C00; padding-left:200px; top:150px;">
							<?php echo Yii::app()->user->getFlash('errorMessage'); ?>
						</div>
						<?php
						endif;
						// END Display Error Flash Messages
					}
                    ?>
                    
                    
                    <div class="emp_tabwrapper">
						<?php $this->renderPartial('tab');?>
                        <div class="clear"></div>
                        <div class="emp_cntntbx">
                            <div class="document_table">
                            	<?php
								$documents = StudentDocument::model()->findAllByAttributes(array('student_id'=>$_REQUEST['id'])); // Retrieving documents of student with id $_REQUEST['id'];
								?>
                                <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                       <th><?php echo Yii::t('students','Document Name'); ?></th>
                                    </tr>
                                </tbody>
                                </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none;">
                                    	<?php
                                    	if($documents) // If documents present
										{
											foreach($documents as $document) // Iterating the documents
											{
										?>
                                                <tr>
                                                    <td width="90%"><?php echo ucfirst($document->title);?></td>
                                                    <td width="127">
                                                    	<?php
														// Setting class for status label
														if($document->is_approved == -1)
														{
															$class = 'tag_disapproved';
														}
														elseif($document->is_approved == 0)
														{
															$class = 'tag_pending';
														}
														elseif($document->is_approved == 1)
														{
															$class = 'tag_approved';
														}
														echo '<div style="width:127px">';
														echo '<div class="'.$class.'"></div>';
														echo '</div>';
														?>
                                                    </td>
                                                    <td width="10%">
                                                    	<ul class="tt-wrapper">
															<li>
                                                            	<?php
																if($document->is_approved == 1)
																{ 
																	echo CHtml::link('<span>Approved</span>', array('studentDocument/approve','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-approved-disabled','onclick'=>'return false;'));
																}
																else
																{
																	echo CHtml::link('<span>Approve</span>', array('studentDocument/approve','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-approved','confirm'=>'Are you sure you want to approve this?')); 
																}
																?>
															</li>
                                                            <li>
                                                            	<?php 
																if($document->is_approved == -1)
																{
																	
																	echo CHtml::link('<span>Disapproved</span>', array('studentDocument/disapprove','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-disapproved-disabled','onclick'=>'return false;')); 
																}
																else
																{
																	echo CHtml::link('<span>Disapprove</span>', array('studentDocument/disapprove','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-disapproved','confirm'=>'Are you sure you want to disapprove this?')); 
																}
																
																?>
															</li>
                                                            <li>
																<?php echo CHtml::link('<span>Edit</span>', array('studentDocument/update','id'=>$document->student_id,'document_id'=>$document->id),array('class'=>'tt-edit')); ?>
															</li>
															<li>
																<?php echo CHtml::link('<span>Delete</span>', array('studentDocument/deletes','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-delete','confirm'=>'Are you sure you want to delete this?')); ?>
															</li>
															<li>
                                                           		<?php echo CHtml::link('<span>Download</span>', array('studentDocument/download','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-download')); ?>
															</li>
                                                        </ul>
                                                    </td>
												</tr>
                                        <?php	
											} // End foreach($documents as $document)
										}
										else // If no documents present
										{
										?>
                                            <tr>
                                                <td colspan="3" style="text-align:center;"><?php echo Yii::t('students','No document(s) uploaded'); ?></td>
                                            </tr>
                                        <?php
										}
										?>
                                    </table>
                              
                            </div><!-- END div class="document_table" -->
                           
                       	</div> <!-- END div class="emp_cntntbx" -->
                        	<div style="width:712px;">
								<?php
                            	if($documents==NULL) 
                                {
									$document = new studentDocument;
								}
                            	  echo $this->renderPartial('/studentDocument/_form', array('model'=>$document)); 
								?>
                         	</div>
                    </div> <!-- END div class="emp_tabwrapper" -->
                </div> <!-- END div class="emp_right_contner" -->
                
            </div> <!-- END div class="cont_right formWrapper" -->
          
        </td>
    </tr>
</table>
