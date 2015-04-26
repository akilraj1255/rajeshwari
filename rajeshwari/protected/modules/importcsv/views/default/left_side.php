<div id="othleft-sidebar">
<!--<div class="lsearch_bar">
             	<input type="text" name="" class="lsearch_bar_left" value="Search">
                <input type="button" name="" class="sbut">
                <div class="clear"></div>
  </div>-->
          <h1><?php echo Yii::t('students','Import Module');?></h1>          
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
					array('label'=>''.Yii::t('students','Import').'<span>'.Yii::t('students','All Students Details').'</span>', 'url'=>array('/importcsv') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> ((Yii::app()->controller->id=='students') && (in_array(Yii::app()->controller->action->id,array('manage')))) ? true : false
					    ),                               
					array('label'=>''.Yii::t('students','Create Users').'<span>'.Yii::t('students','New Users').'</span>',  'url'=>array('/importcsv/users/student') ,'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->action->id=='create'), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
						  
				),
			)); 
			
	