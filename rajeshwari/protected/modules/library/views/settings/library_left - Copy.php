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
					array('label'=>''.Yii::t('library','Search Books<span>Search all books here</span>'), 'url'=>array('/library/Book/booksearch') ,'linkOptions'=>array('class'=>'sbook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='booksearch')
					    ),  
						array('label'=>''.Yii::t('List Books<span>Search all books here</span>>'), 'url'=>array('/library/Book/manage') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='manage')
					    ),  
						array('label'=>''.Yii::t('library','Add Book<span>Search all books here</span>'), 'url'=>array('/library/Book/create') ,'linkOptions'=>array('class'=>'abook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='create')
					    ),              
					array('label'=>''.Yii::t('library','<h1>Book Lend</h1>')), 
					array('label'=>''.Yii::t('library','Borrow Book<span>Search all books here</span>'), 'url'=>array('/library/BorrowBook/create') ,'linkOptions'=>array('class'=>'bbook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='create')
					    ),  
						array('label'=>''.Yii::t('library','Return Book<span>Search all books here</span>'), 'url'=>array('/library/ReturnBook/returnbook') ,'linkOptions'=>array('class'=>'rbook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='returnbook')
					    ),  
						array('label'=>''.Yii::t('library','View Book Details<span>Search all books here</span>'), 'url'=>array('/library/Book/bookdetails') ,'linkOptions'=>array('class'=>'vdbook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='bookdetails')
					    ),  
						array('label'=>''.Yii::t('library','Due Dates<span>Search all books here</span>'), 'url'=>array('/library/Settings/settings') ,'linkOptions'=>array('class'=>'ddbook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='settings')
					    ), 
						array('label'=>''.Yii::t('library','<h1>Settings</h1>')),  
						array('label'=>''.Yii::t('library','Add Book Category<span>Search all books here</span>'), 'url'=>array('/library/Category/create') ,'linkOptions'=>array('class'=>'acbook_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='create')
					    ), 
						array('label'=>''.Yii::t('library','View Student Details<span>Search all books here</span>'), 'url'=>array('/library/BorrowBook/studentdetails') ,'linkOptions'=>array('class'=>'vsd_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='studentdetails')
					    ), 
						array('label'=>''.Yii::t('library','View Authors <span>Search all books here</span>'), 'url'=>array('/library/Authors') ,'linkOptions'=>array('class'=>'vsd_ico'),
                                   'active'=> (Yii::app()->controller->action->id=='settings')
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