<?php

class ExportModule extends CWebModule
{
	public $allowedModels	=	array();
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'export.models.*',
			'export.components.*',
		));
		
		$this->allowedModels	=	array(
			'Students'	=> array(
				'label'	=> 'Students',
				'allowedColumns'	=> array('first_name', 'last_name', 'gender', 'address_line1', 'email'),
			),
			'Employees'	=> array(
				'label'	=> 'Employees',
				'allowedColumns'	=> array('first_name', 'last_name', 'gender', 'email'),				
			),
		);
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
