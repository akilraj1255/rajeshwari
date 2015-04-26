<div id="othleft-sidebar">
             <!--<div class="lsearch_bar">
             	<input type="text" value="Search" class="lsearch_bar_left" name="">
                <input type="button" class="sbut" name="">
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
			array('label'=>''.'<h1>'.Yii::t('store','Manage Products').'</h1>'), 
			 
			array('label'=>''.Yii::t('store','Add product/category ').'<span>'.Yii::t('store','Create and Manage Products').'</span>', 'url'=>array('/inventory/manageProducts') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='manageProducts')
					    ),
					array('label'=>''.Yii::t('store','Search Product').'<span>'.Yii::t('store','Search all products').'</span>', 'url'=>array('/store/productSearch') ,'linkOptions'=>array('class'=>'sbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='productSearch' and Yii::app()->controller->action->id=='productsearch')
					    ),
						array('label'=>''.Yii::t('store','List Items').'<span>'.Yii::t('store','List all Products').'</span>', 'url'=>array('/store/storeProducts') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='storeProducts')
					    ),
						array('label'=>''.Yii::t('store','Supplies & vendors ').'<span>'.Yii::t('store','List of Supplies & vendors').'</span>', 'url'=>array('/store/storeProducts') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='storeProducts')
					    ),
						        
						
					array('label'=>''.'<h1>'.Yii::t('store','Shop Products').'</h1>'), 
					
					array('label'=>''.Yii::t('store','Buy Product').'<span>'.Yii::t('store','buy Product Here').'</span>', 'url'=>array('/store/buyProduct') ,'linkOptions'=>array('class'=>'bbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='buyProduct' and Yii::app()->controller->action->id=='create')
					    ),
						
						
						array('label'=>''.Yii::t('store','Sell Product').'<span>'.Yii::t('store','sell Product Here').'</span>', 'url'=>array('/store/sellProduct') ,'linkOptions'=>array('class'=>'bbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='sellProduct' and Yii::app()->controller->action->id=='create')
					    ),  
						  
						 array('label'=>''.'<h1>'.Yii::t('store','Stock').'</h1>'), 
					array('label'=>''.Yii::t('store','Available Stock').'<span>'.Yii::t('store','Issue Product Here').'</span>', 'url'=>array('/store/buyProduct') ,'linkOptions'=>array('class'=>'bbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='buyProduct' and Yii::app()->controller->action->id=='create')
					    ),  
						
						array('label'=>''.Yii::t('store','Issued Stock').'<span>'.Yii::t('store','Issue Product Here').'</span>', 'url'=>array('/store/buyProduct') ,'linkOptions'=>array('class'=>'bbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='buyProduct' and Yii::app()->controller->action->id=='create')
					    ),  
						
						array('label'=>''.'<h1>'.Yii::t('store','Settings').'</h1>'),  
						
						array('label'=>''.Yii::t('store','View Student Details').'<span>'.Yii::t('store','All Student Details').'</span>', 'url'=>array('/store/buyProduct/studentdetails') ,'linkOptions'=>array('class'=>'vsd_ico'),
                                   'active'=> (Yii::app()->controller->id=='buyProduct' and Yii::app()->controller->action->id=='studentdetails')
					    ), 
						
						array('label'=>''.Yii::t('store','Payments').'<span>'.Yii::t('store','View Payment Details').'</span>', 'url'=>array('/store/storeCategory') ,'linkOptions'=>array('class'=>'acbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='storeCategory')
					    ), 
						
						array('label'=>''.'<h1>'.Yii::t('store','Bill').'</h1>'), 
						array('label'=>''.Yii::t('store','Bill').'<span>'.Yii::t('store','View Bill Details').'</span>', 'url'=>array('/store/bill') ,'linkOptions'=>array('class'=>'acbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='bill')
					    ), 
				),
			)); ?>
            
            
            
            
            
            
		
		</div>
        
        
        
        
        
        
        
        
        