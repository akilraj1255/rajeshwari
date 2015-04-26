<?php
/**
* ImportCSV Module
*
* @author Artem Demchenkov <lunoxot@mail.ru>
* @version 0.0.3
*
* module form
*/

$this->breadcrumbs=array(
	Yii::t('exportModule.export', 'Import')." CSV",
);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">        
        	<?php $this->renderPartial('left_side');?>        
        </td>
        <td valign="top">
            <div class="cont_right ">
            	<h1><?php echo Yii::t('importcsvModule.importcsv', 'Import'); ?> CSV</h1>
                
                <?php if(Yii::app()->user->hasFlash('success'))
				{ ?>
                <div class="success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
                <?php } ?>
                <?php if(Yii::app()->user->hasFlash('error'))
				{ ?>
                <div class="success" style="color:#F00">
                <?php echo Yii::app()->user->getFlash('error'); ?>
                </div>
                <?php } ?>

                
                
                <div id="importCsvSteps">
                	<div class="inner_new_table" style="padding:0px; display:none" id="delimiters_log">
                     <strong style="display:none;"><?php echo Yii::t('importcsvModule.importcsv', 'File'); ?> :</strong> <span id="importCsvForFile" style="display:none;">&nbsp;</span>
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th width="30%">  <strong><?php echo Yii::t('importcsvModule.importcsv', 'Fields Delimiter'); ?></strong> </th>
                            <th width="30%"> <strong><?php echo Yii::t('importcsvModule.importcsv', 'Text Delimiter'); ?></strong> </th>
                            <th> <strong><?php echo Yii::t('importcsvModule.importcsv', 'Model'); ?></strong> </th>
                          </tr>
                          <tr>
                            <td><span id="importCsvForDelimiter">&nbsp;</span></td>
                            <td><span id="importCsvForTextDelimiter">&nbsp;</span></td>
                            <td><span id="importCsvForModel">&nbsp;</span></td>
                          </tr>
                        </table>

                    </div>
               
                    <?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
                    <?php echo CHtml::hiddenField("fileName", ""); ?>
                    <?php echo CHtml::hiddenField("thirdStep", "0"); ?>
                    <?php echo CHtml::hiddenField("table", $table); ?>
                    
                    <div id="importCsvFirstStep">
                        <div id="importCsvFirstStepResult">
                        	&nbsp;
                        </div>
                        <?php  echo CHtml::button(Yii::t('importcsvModule.importcsv', 'Select CSV File'), array("id"=>"importStep1", "class"=>"formbut")); ?>
                    </div> <!-- END div id="importCsvFirstStep" -->
                    <div id="importCsvSecondStep">
                        <div id="importCsvSecondStepResult">
                        	&nbsp;
                        </div> <!-- END div id="importCsvSecondStepResult" -->
                        <div class="formCon">
                            <div class="formConInner">
                            	<table width="90%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="30%"><strong><?php echo Yii::t('importcsvModule.importcsv', 'Fields Delimiter'); ?></strong> <span class="require">*</span><br/></td>
                                    <td> <?php echo CHtml::textField("delimiter", $delimiter); ?></td>
                                  </tr>
                                  <tr>
                                  	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td><strong><?php echo Yii::t('importcsvModule.importcsv', 'Text Delimiter'); ?></strong></td>
                                    <td><?php echo CHtml::textField("textDelimiter", $textDelimiter); ?></td>
                                  </tr>
                                  <tr>
                                  	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td><strong><?php echo Yii::t('importcsvModule.importcsv', 'Model'); ?></strong> <span class="require">*</span><br/></td>
                                    <td> 
                        				<?php echo CHtml::dropDownList('model', '', $modelsArray);?>
                        			</td>
                                  </tr>
                                </table>

                            </div>
                        </div>
                
                    
                        
                        <?php
                        echo CHtml::ajaxSubmitButton(
							Yii::t('importcsvModule.importcsv', 'Next'), 
							'', 
							array(
								'success' => 'function(response){
									$("#importCsvSecondStepResult").html(response);
									$("html, body").animate({scrollTop:$("#content").position().top}, "slow")
								}',
                        	), 
							array(
								"class"=>"formbut"
							)
						);
                        ?>                        
                    </div> <!-- END div id="importCsvSecondStep" -->
                    <?php echo CHtml::endForm(); ?>
                    
                    <div id="importCsvThirdStep">
						<?php echo CHtml::beginForm('','post'); ?>
                        <?php echo CHtml::hiddenField("thirdStep", "1"); ?>
                        <?php echo CHtml::hiddenField("thirdDelimiter", ""); ?>
                        <?php echo CHtml::hiddenField("thirdTextDelimiter", ""); ?>
                        <?php echo CHtml::hiddenField("thirdTable", ""); ?>
                        <?php echo CHtml::hiddenField("thirdFile", ""); ?>
                        <?php echo CHtml::hiddenField("perRequest", "10000"); ?>
                        <div id="importCsvThirdStepResult">
                        	&nbsp;
                        </div> <!-- END div id="importCsvThirdStepResult" -->
                        <div id="importCsvThirdStepColumnsAndForm">
                            <div id="importCsvThirdStepColumns">&nbsp;</div><br/>
                            <?php
                            echo CHtml::ajaxSubmitButton(
								Yii::t('importcsvModule.importcsv', 'Import'), 
								'', 
								array(
									'success' => 'function(response){
										$("#importCsvThirdStepResult").html(response);
										$("html, body").animate({scrollTop:$("#content").position().top}, "slow")
									}',
                            	), 
								array(
									"class"=>"formbut"
								)
							);
                            ?>
                        </div> <!-- END div id="importCsvThirdStepColumnsAndForm" -->
                        <?php echo CHtml::endForm(); ?>
                    </div> <!-- END div id="importCsvThirdStep" -->
                    <br/>
                    <div class="csv_links">
                    <span id="importCsvBread1">&laquo; <?php echo CHtml::link(Yii::t('importcsvModule.importcsv', 'Start over'), array("/importcsv"));?></span>
                    <span id="importCsvBread2"> &laquo; <a href="javascript:void(0)" id="importCsvA2"><?php echo Yii::t('importcsvModule.importcsv', 'Fields Delimiter').", ".Yii::t('importcsvModule.importcsv', 'Text Delimiter')." ".Yii::t('importcsvModule.importcsv', 'and')." ".Yii::t('importcsvModule.importcsv', 'Model');?></a></span>
                    </div>
                </div> <!-- END div id="importCsvSteps" -->
			</div>  <!--END div class="cont_right "-->              
        </td>
    </tr>
</table>
<script>
	function validate()
	{
	
	}
</script>