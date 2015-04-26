<?php 
$roles = Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
foreach($roles as $role)
	if(sizeof($roles)==1 and $role->name == 'parent')
	{
		$this->renderPartial('/default/parentleft');
	}
	else if(sizeof($roles)==1 and $role->name == 'student')
	{
		$this->renderPartial('/default/studentleft');
	}
	else if(sizeof($roles)==1 and $role->name == 'teacher')
	{
		$this->renderPartial('/default/teacherleft');
	}
	else
	{
	?>
	<div id="othleft-sidebar">
        <!--<div class="lsearch_bar">
        <input name="" type="text" class="lsearch_bar_left" value="Search" />
        <input name="" type="button" class="sbut" />
        <div class="clear"></div>
        </div>-->
        <?php
		function t($message, $category = 'cms', $params = array(), $source = null, $language = null) 
		{
			return $message;
		}
        $this->widget('zii.widgets.CMenu',array(
        'encodeLabel'=>false,
        'activateItems'=>true,
        'activeCssClass'=>'list_active',
        'items'=>array(
			//The Welcome Link
			//array('label'=>''.t('Welcome'),  'url'=>array('/message/index') ,'linkOptions'=>array('class'=>'menu_1' ), 'itemOptions'=>array('id'=>'menu_1') 
			//),
			
			//SMS
			array('label'=>''.'<h1>'.t('SMS').'</h1>',
			'active'=> ((Yii::app()->controller->module->id=='sms' and Yii::app()->controller->id=='sms') ? true : false)),
			
			array('label'=>t('Send SMS').'<span>'.t('send an sms').'</span>', 'url'=>array('/sms/send'),
			'active'=> ((Yii::app()->controller->module->id=='sms' and Yii::app()->controller->id=='send' and Yii::app()->controller->action->id=='index') ? true : false),'linkOptions'=>array('class'=>'sent_sms')),

			array('label'=>t('Send SMS Batch').'<span>'.t('send an sms to a batch').'</span>', 'url'=>array('/sms/sendbatch'),
			'active'=> ((Yii::app()->controller->module->id=='sms' and Yii::app()->controller->id=='sendbatch' and Yii::app()->controller->action->id=='index') ? true : false),'linkOptions'=>array('class'=>'batch_sms')),

			array('label'=>t('Templates').'<span>'.t('All SMS templates').'</span>', 'url'=>array('/sms/templates'),
			'active'=> ((Yii::app()->controller->module->id=='sms' and Yii::app()->controller->id=='templates') ? true : false),'linkOptions'=>array('class'=>'evntlist_ico')),
			
			//Contacts
			array('label'=>''.'<h1>'.t('Contacts').'</h1>',
			'active'=> ((Yii::app()->controller->module->id=='mailbox' and Yii::app()->controller->id=='contacts') ? true : false)),
			
			array('label'=>t('All Contacts').'<span>'.t('All contacts').'</span>', 'url'=>array('/sms/contacts'),
			'active'=> ((Yii::app()->controller->module->id=='sms' and Yii::app()->controller->id=='contacts' and Yii::app()->controller->action->id!='import') ? true : false),'linkOptions'=>array('class'=>'sent_contact')),
			array('label'=>t('Groups').'<span>'.t('Contact groups').'</span>', 'url'=>array('/sms/contactgroups'),
			'active'=> ((Yii::app()->controller->module->id=='sms' and Yii::app()->controller->id=='contactgroups') ? true : false),'linkOptions'=>array('class'=>'sent_group')),
			array('label'=>t('Import').'<span>'.t('Import contacts').'</span>', 'url'=>array('/sms/contacts/import'),
			'active'=> ((Yii::app()->controller->module->id=='sms' and Yii::app()->controller->id=='contacts' and Yii::app()->controller->action->id=='import') ? true : false),'linkOptions'=>array('class'=>'sent_import')),
			),
        )); ?>
        
	</div>
	
	<?php 
	}
	?>
<script type="text/javascript">

$(document).ready(function () {
	//Hide the second level menu
	$('#othleft-sidebar ul li ul').hide();            
	//Show the second level menu if an item inside it active
	$('li.list_active').parent("ul").show();
	
	$('#othleft-sidebar').children('ul').children('li').children('a').click(function () {                    
	
	if($(this).parent().children('ul').length>0){                  
		$(this).parent().children('ul').toggle();    
	}
	
	});
});
</script>