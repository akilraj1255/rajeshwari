<script>
	function addRow(tableID) 
	{
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		if(rowCount < 13)// limit the user from creating fields more than your limits
		{
			var row = table.insertRow(rowCount);
			var colCount = table.rows[0].cells.length;
			for(var i=0; i<colCount; i++) 
			{
				var newcell = row.insertCell(i);
				newcell.innerHTML = "&nbsp;";
			}   
			rowCount++;                     
			for(var j=0; j<2; j++)
			{
				var row = table.insertRow(rowCount);
				var colCount = table.rows[j].cells.length;
				for(var i=0; i<colCount; i++) 
				{
					var newcell = row.insertCell(i);
					newcell.innerHTML = table.rows[j].cells[i].innerHTML;
				}
				rowCount++;
			}
			addDiv("student_id");
			addDiv("file_type");
			addDiv("created_at");
		}
		else
		{
			 alert("Only 5 files can be uploaded at a time.");
				   
		}
	}
	
	function addDiv(divID)
	{
		var divTag = document.createElement("div");
		divTag.className = "row";
		divTag.innerHTML = document.getElementById(divID).innerHTML;
		document.getElementById("innerDiv").appendChild(divTag);
	}
</script>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-document-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'action'=>CController::createUrl('default/document')
)); ?>

	<?php 
		if($form->errorSummary($model)){
	?>
        <div class="errorSummary"><?php echo Yii::t('studentportal','Input Error'); ?><br />
        	<span><?php echo Yii::t('studentportal','Please fix the following error(s).'); ?></span>
        </div>
    <?php 
		}
		
	?>
    <div class="formCon" style="clear:left;">
        <div class="formConInner" id="innerDiv">
        	<table width="80%" border="0" cellspacing="0" cellpadding="0" id="documentTable">
            	<tr>
                	<td><?php echo $form->labelEx($model,'Document Name'); ?></td>
                    <td><?php echo $form->labelEx($model,'file'); ?></td>
                </tr>
                <tr>
                	<td>
						<?php echo $form->textField($model,'title[]',array('size'=>25,'maxlength'=>225)); ?>
                         <?php echo $form->error($model,'title'); ?>
                    </td>
                    <td>
						<?php echo $form->fileField($model,'file[]'); ?>
                        <?php echo $form->error($model,'file'); ?>
                    </td>
                    
                </tr>
            </table>
            <div class="row">
                <?php echo $form->hiddenField($model,'sid',array('value'=>$sid)); ?>
                <?php echo $form->error($model,'sid'); ?>    
            </div>
			
            <div class="row" id="student_id">
                <?php echo $form->hiddenField($model,'student_id[]',array('value'=>$sid)); ?>
                <?php echo $form->error($model,'student_id'); ?>
            </div>
        
            <div class="row" id="file_type">
                <?php //echo $form->labelEx($model,'file_type'); ?>
                <?php echo $form->hiddenField($model,'file_type[]'); ?>
                <?php echo $form->error($model,'file_type'); ?>
            </div>
        
            <div class="row" id="created_at">
                <?php //echo $form->labelEx($model,'created_at'); ?>
                <?php echo $form->hiddenField($model,'created_at[]'); ?>
                <?php echo $form->error($model,'created_at'); ?>
            </div>
        </div>
    </div>
    <div class="row buttons">
        <?php echo CHtml::button(Yii::t('studentportal','Add Another'), array('class'=>'formbut','id'=>'addAnother','onclick'=>'addRow("documentTable");')); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('studentportal','SAVE') : Yii::t('studentportal','Save'),array('class'=>'formbut')); ?>
    </div>
    	

<?php $this->endWidget(); ?>

</div><!-- form -->