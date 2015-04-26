<div id="othleft-sidebar">
             <div class="lsearch_bar">
             	<input type="text" value="Search" class="lsearch_bar_left" name="">
                <input type="button" class="sbut" name="">
                <div class="clear"></div>
  </div>       
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
			array('label'=>''.Yii::t('hostel','<h1>Mange Room</h1>')),  
					array('label'=>''.Yii::t('hostel','List Room Details<span>List all rooms here</span>'), 'url'=>array('/hostel/Room/manage') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='room' and Yii::app()->controller->action->id=='manage')
					    ),
						array('label'=>''.Yii::t('hostel','Search Room<span>List all rooms here</span>'), 'url'=>array('/hostel/Room/roomsearch') ,'linkOptions'=>array('class'=>'sbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='room' and Yii::app()->controller->action->id=='roomsearch')
					    ),        
						
						array('label'=>''.Yii::t('hostel','Add new hostel<span>List all rooms here</span>'), 'url'=>array('/hostel/Hosteldetails/create') ,'linkOptions'=>array('class'=>'abook_ico'),
                                   'active'=> (Yii::app()->controller->id=='Hosteldetails' and Yii::app()->controller->action->id=='create')
					    ),    
						array('label'=>''.Yii::t('hostel','Add Room Details<span>List all rooms here</span>'), 'url'=>array('/hostel/Floor/create') ,'linkOptions'=>array('class'=>'abook_ico'),
                                   'active'=> (Yii::app()->controller->id=='floor' and Yii::app()->controller->action->id=='create')
					    ),      
						array('label'=>''.Yii::t('hostel','Add Mess Details<span>List all rooms here</span>'), 'url'=>array('/hostel/foodInfo/create') ,'linkOptions'=>array('class'=>'abook_ico'),
                                   'active'=> (Yii::app()->controller->id=='foodInfo' and Yii::app()->controller->action->id=='create')
					    ),                
					array('label'=>''.Yii::t('hostel','<h1>Room</h1>')), 
					array('label'=>''.Yii::t('hostel','Allot Room<span>List all rooms here</span>'), 'url'=>array('/hostel/Registration/create') ,'linkOptions'=>array('class'=>'bbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='Registration' and Yii::app()->controller->action->id=='create')
					    ),  
						array('label'=>''.Yii::t('hostel','Change Room<span>List all rooms here</span>'), 'url'=>array('/hostel/Room/roomchange') ,'linkOptions'=>array('class'=>'rbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='Room' and Yii::app()->controller->action->id=='roomchange' )
					    ),  
						array('label'=>''.Yii::t('hostel','Vacate<span>List all rooms here</span>'), 'url'=>array('/hostel/Vacate/roomvacate') ,'linkOptions'=>array('class'=>'vdbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='Vacate' and Yii::app()->controller->action->id=='roomvacate')
					    ),  
						
						array('label'=>''.Yii::t('hostel','<h1>Settings</h1>')),  
						array('label'=>''.Yii::t('hostel','View Student Details<span>List all rooms here</span>'), 'url'=>array('/hostel/MessManage/manage') ,'linkOptions'=>array('class'=>'vsd_ico'),
                                   'active'=> (Yii::app()->controller->id=='MessManage' and Yii::app()->controller->action->id=='manage')
					    ), 
						array('label'=>''.Yii::t('hostel','Mess Manage<span>List all rooms here</span>'), 'url'=>array('/hostel/MessManage/messinfo') ,'linkOptions'=>array('class'=>'acbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='MessManage' and Yii::app()->controller->action->id=='messinfo')
					    ), 
						array('label'=>''.Yii::t('hostel','View Mess Dues<span>List all rooms here</span>'), 'url'=>array('/hostel/settings/settings') ,'linkOptions'=>array('class'=>'vsd_ico'),
                                   'active'=> (Yii::app()->controller->id=='settings' and Yii::app()->controller->action->id=='settings')
					    ), 
				),
			)); ?>
		
		</div>
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