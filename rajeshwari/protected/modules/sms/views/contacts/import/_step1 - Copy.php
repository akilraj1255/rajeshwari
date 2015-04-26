<?php
$start				= 0;
$allowedattributes	= array();
if(Contacts::model()->import_contacts_config()){
	$import_config		= Contacts::model()->import_contacts_config();
	if($import_config['allowed_attributes']){
		$allowedattributes	= $import_config['allowed_attributes'];
	}
}

$requiredattributes	= array();
if(Contacts::model()->import_contacts_config()){
	$import_config		= Contacts::model()->import_contacts_config();
	if($import_config['required_attributes']){
		$requiredattributes	= $import_config['required_attributes'];
	}
}
?>
<h3>Add contacts</h3>
<form id="import-contacts-form">
	<table>
	<?php
	echo CHtml::hiddenField('datas', json_encode($datas));
    foreach($allowedattributes as $attribute){
	?>
    
	<?php echo Contacts::model()->getAttributeLabel($attribute).((in_array($attribute, $requiredattributes))?'<span> *</span>':'');?>
    
	<?php echo CHtml::dropDownList('import_fields['.$attribute.']', '', $datas[$start], array('prompt'=>'', 'class'=>'import_fields'));?>
    
    <?php
        echo '<br />';
    }
    ?>
    
    	<tr>
            <td>    
				<?php
                echo Contacts::model()->getAttributeLabel('group');
                ?>
            </td>
            <td>
				<?php
                $criteria	= new CDbCriteria;
                $criteria->condition	= '`status`=:status';
                $criteria->params		= array(":status"=>1);
                $criteria->order		= '`id` ASC';
                $data 		= CHtml::listData(ContactGroups::model()->findAll($criteria), 'id', 'group_name');
                echo CHtml::dropDownList(
                    'groups[]',
                    '',
                    $data,
                    array(
                        'multiple'=>true,
                        'style'=>'height:100px;',
                    )
                ); 
                ?>
            </td>
        </tr>
    </table>
    <div class="clear"></div>
    <input type="button" name="" value="Save contacts" id="save_contacts_btn" class="formbut" />
</form>
<div id="results"></div>
<script>
$('#save_contacts_btn').click(function(e) {
	$.ajax({
		url:'<?php echo Yii::app()->createUrl('/mailbox/contacts/save');?>',
		type:'POST',
		data:$('#import-contacts-form').serialize(),
		dataType:"json",
		success: function(response){
			if(response.status=="success"){
				$('#message_block').html(response.data);
				$('#secondStep').slideUp(500);
			}
			else{
				$('#message_block').html(response.data);				
			}
		}
	});
});

$('#firstStep').slideUp(500);
</script>