<?php
/**
 * ImportCSV Module
 *
 * @author Artem Demchenkov <lunoxot@mail.ru>
 * @version 0.0.3
 *
 * ImportCSV is used for load positions from CSV file to database.
 * Import occurs in three steps:
 *
 * Upload file;
 * Select delimiter and table;
 * Select mode and columns in table.
 * Module has 3 modes:
 * 
 * Insert all - Add all rows;
 * Insert new - Add new rows. Old rows remain unchanged;
 * Insert new and replace old - Add new rows. Old rows replace.
 * All parameters from the previous imports will be saved in a special .php file in upload folder.
 * 
 * Requirements 
 * 
 * Yii 1.1
 * 
 * Usage 
 * 
 * 1) Copy all the 'importcsv' folder under /protected/modules;
 * 
 * 2) Register this module in /protected/config/main.php
 * 
 * 'modules'=>array(
 *         .........
 *         'importcsv'=>array(
 *             'path'=>'upload/importCsv/', // path to folder for saving csv file and file with import params
 *         ),
 *         ......
 *     ),
 * 3) Create a directory which you use in 'path'. Do not forget to set access permissions for directory 'path';
 * 
 * 4) The module is available here:
 * 
 * http://yourproject/importcsv.
 * 
 * Or here:
 * 
 * http://yourproject/index.php?r=importcsv.
 * 
 * Or somewhere else:-) It depends from path settings in your project;
 * 
 * 5) ATTENTION! The first row of your csv-file must will be a row with column names. 
 *
*/

class ImportCsv extends CFormModel
{
    /*
     *
     *  Insert new rows to database
     *
     *  $table - db table
     *  $linesArray - lines with values from csv
     *  $columns - list of csv columns
     *  $tableColumns - list of table columns
     *
     */

    public function InsertAll($table, $linesArray, $columns, $tableColumns, $selectedmodel, $allowedColumns, $dataTypes, $uniqueColumns, $externals=NULL, $compares=NULL)
    {
            // $columnsLength - size of columns array
            // $tableString - rows in table
            // $tableString - items in csv
            // $linesLength - size of lines for insert array
			
            $columnsLength   = sizeof($columns);
            $tableString = '';
            $csvString   = '';
            $n = 0;
			$original_loop_count	=	0;
            $linesLength = sizeof($linesArray);			
			$newentries		=	array();
			
			
			$importcompleted	= false;
			$total_rows_inserted = 0;
			$exception_array	= array();
			$warning_array		= array();
			
			//external attribute details from config
			$ext_config	= Yii::app()->controller->module->models[$selectedmodel]['external'];
			
			//compare attribute details from config
			$cmp_config	= Yii::app()->controller->module->models[$selectedmodel]['compare'];
			
			//table primaty key
			$primary_key_column	= $selectedmodel::model()->tableSchema->primaryKey;
			
            // watching all strings in array
            for($k=0; $k<$linesLength; $k++) {

                // watching all columns in POST
                $n_in 		= 0;
				
				//checking for unique fields
				$val_col_cout	=	0;
                $is_valid		=	true;
				//if all fileds are empty
				if(implode('', $linesArray[$k])==''){
					$is_valid	=	false;
				}
				
				for($i=0; $i<$columnsLength; $i++){
					if(in_array($tableColumns[$i], $allowedColumns)){
						if($uniqueColumns=='all' or (is_array($uniqueColumns) and in_array($tableColumns[$i], $uniqueColumns))){
							if($columns[$val_col_cout]!='' and $columns[$val_col_cout]!=0){
								$data		=	stripslashes($linesArray[$k][$columns[$val_col_cout]-1]);
								$data_valid	=	$selectedmodel::model()->findAllByAttributes(array($tableColumns[$i]=>$data));
								
								if($data_valid!=NULL){
									$is_valid	=	false;
									break;
								}
								
								//checking for reapeated values in csv that are unique and value not present in db, got it..??
								if(isset($newentries[$tableColumns[$i]][trim($data)])){
									$is_valid	=	false;
									break;
								}
								$newentries[$tableColumns[$i]][trim($data)]	=	true;
							}
						}
						$val_col_cout++;			
					}
				}
				
				if($is_valid){
					$colString	=	"";
					$valString	=	"";
					for($i=0; $i<$columnsLength; $i++) {
						if($columns[$i]!='') {
							//format value here
							$field_value	=	CHtml::encode(stripslashes($linesArray[$k][$columns[$i]-1]));
							if(isset($dataTypes[$tableColumns[$i]])){
								$field_value	=	$this->formatValue($field_value, $dataTypes[$tableColumns[$i]]);
							}
							$field_value	=	addslashes($field_value);
							
							if($i!=0 and $colString!=""){
								$colString	.=	", ";
								$valString	.=	", ";
							}
							//column string
							$colString	.=	$tableColumns[$i];
							//value string
							$valString	.=	"'".$field_value."'";
						}
					}
					
					//execute query here
					$sql			= "INSERT INTO ".$table."(".$colString.") VALUES (".$valString.")";
            		$command 		= Yii::app()->db->createCommand($sql);
					$querylength 	= $command->execute();
					if($querylength){
						
						//last insert id
						$primary_key	= Yii::app()->db->getLastInsertID();
						//external table entries
						if($externals!=NULL){
						
							foreach($externals as $attribute=>$external_attrs){
												//-----^----------^-----
								   //column of primary table=>external attributes
								   
								$ext_primary_key	=	NULL;
								
								if(isset($ext_config[$attribute])){
									$ext_model	= isset($ext_config[$attribute]['model'])?$ext_config[$attribute]['model']:NULL;
									if($ext_model){
										$ext_table		= $ext_model::model()->tableSchema->name;
										$extColString	= "";
										$extValString	= "";
										$extcolcount	= 0;
										foreach($external_attrs as $external_attr=>$csv_column){
											//check already exists
											if(is_array($ext_config[$attribute]['uniqueColumns']) and in_array($external_attr, $ext_config[$attribute]['uniqueColumns'])){
												if($csv_column!='' and $csv_column!=0){
													
													$data			= trim(preg_replace( '/\s+/', ' ',stripslashes($linesArray[$k][$csv_column-1])));
													$already_there	= $ext_model::model()->findByAttributes(array($external_attr=>$data));
													
													if($already_there!=NULL){
														$ext_primary_key_column	= $ext_model::model()->tableSchema->primaryKey;
														$ext_primary_key		= $already_there->$ext_primary_key_column;
														break;
													}
												}
											}
											$field_value	= CHtml::encode(stripslashes($linesArray[$k][$csv_column - 1]));
											$field_value	=	addslashes($field_value);
											
											if($extcolcount!=0 and $extColString!=""){
												$extColString	.= ", ";
												$extValString	.= ", ";
											}
											//column string
											$extColString	.= $external_attr;
											//value string
											$extValString	.= "'".$field_value."'";
											
											$extcolcount++;
										}
										
										if($ext_primary_key==NULL){		//change to ==
											//execute query here
											$sql			= "INSERT INTO ".$ext_table."(".$extColString.") VALUES (".$extValString.")";
											$command 		= Yii::app()->db->createCommand($sql);
											$extquerylength = $command->execute();
											if($extquerylength){
												//last insert id of external table
												$ext_primary_key	= Yii::app()->db->getLastInsertID();
											}
										}
										
										//if parent generated
										if($ext_primary_key){											
											//update query for primary table
											$sql				= "UPDATE ".$table." SET ".$attribute."=".$ext_primary_key." WHERE ".$primary_key_column."=".$primary_key;
											$command 			= Yii::app()->db->createCommand($sql);
											$updatequerylength 	= $command->execute();
											if(!$updatequerylength){
												//error message
											}
										}										
									}
								}
							}
						}
						//external table entries end
						
						//compare table entries
						if($compares!=NULL){
							$compare_key	= key($compares);
							$cmp_data		= array();
							$compare_attributes	= array();
							while($compare_key){							
								if(isset($cmp_config[$compare_key])){
									$cmp_model	= $cmp_config[$compare_key]['model'];									
									foreach($compares[$compare_key] as $attribute=>$csv_column){
										$compare_attributes[$attribute]	= trim(preg_replace( '/\s+/', ' ',stripslashes($linesArray[$k][$csv_column-1])));
									}
									
									$already_in_db	= $cmp_model::model()->findByAttributes($compare_attributes);
									if($already_in_db!=NULL){
										//clear compare attributes
										$compare_attributes	= array();
										
										$cmp_primary_key_column				= $cmp_model::model()->tableSchema->primaryKey;
										$cmp_primary_key					= $already_in_db->$cmp_primary_key_column;
										$cmp_data[$compare_key]				= $cmp_primary_key;
										
										
										if(isset($cmp_config[$compare_key]['compareWith'])){
											$compare_attributes[$compare_key]	= $cmp_primary_key;
											$compare_key	= $cmp_config[$compare_key]['compareWith'];											
										}
										else{
											//update query for primary table
											$sql				= "UPDATE ".$table." SET ".$compare_key."=".$cmp_primary_key." WHERE ".$primary_key_column."=".$primary_key;
											$command 			= Yii::app()->db->createCommand($sql);
											$updatequerylength 	= $command->execute();
											if(!$updatequerylength){
												//error message
											}
											
											//insert to another table if
											if(isset($cmp_config[$compare_key]['insertInto'])){
												$insert_into	=	$cmp_config[$compare_key]['insertInto'];
												
												$insert_datas	=	array();
												
												if($insert_into['base_attribute']){
													$cmp_data[$insert_into['base_attribute']]	= $primary_key;
													$insert_datas[$insert_into['base_attribute']]	= $primary_key;
												}
												$insert_into_model	= (isset($insert_into['model']))?$insert_into['model']:NULL;
												
												//selected attributes
												if(isset($insert_into['attributes'])){
													foreach($insert_into['attributes'] as $attribute){
														$insert_datas[$attribute]	= $cmp_data[$attribute];
													}
												}
												
												//preset values
												if(isset($insert_into['preset'])){
													$presets	=	$insert_into['preset'];
													foreach($presets as $attribute=>$settings){
														if(!is_array($settings)){
															$insert_datas[$attribute]	= $settings;
														}
														else{
															$preset_model	= $settings['model'];
															$criteria		=	new CDbCriteria;
															if(isset($settings['criteria'])){
																$criteria->condition	=	$settings['criteria']['condition'];	
																
																$params		=	array();
																foreach($settings['criteria']['params'] as $param=>$value){
																	if(isset($cmp_data[$value]))
																		$params[$param]	=	$cmp_data[$value];
																	else
																		$params[$param]	=	$value;
																}
																
																$criteria->params	=	$params;
															}
															
															//if found / not
															if($preset_model::model()->find($criteria))
																
																$insert_datas[$attribute]	= $settings['values'][1];																
															else
															
																$insert_datas[$attribute]	= $settings['values'][0];
														}														
													}
												}
												
												if(class_exists($insert_into_model)){
													$insert_into_table	= $insert_into_model::model()->tableSchema->name;													
													$sql			= "INSERT INTO ".$insert_into_table."(".implode(",", array_keys($insert_datas)).") VALUES (".implode(",", $insert_datas).")";
													$command 		= Yii::app()->db->createCommand($sql);
													$extquerylength = $command->execute();
													if($extquerylength){
														//any operations
													}
												}
											}
											
											//stop looping
											$compare_key	= NULL;
										}
									}
									else{
										//stop looping
										$compare_key	= NULL;
									}									
								}
							
							}
							
							
						}
						//compare table entries end
						
						$importcompleted	= true;
						
						$total_rows_inserted++;
					}
					else{
						array_push($exception_array, "<b style='color:#FFF;'>Row ".($k+1)."</b> : Can't insert row ( ".implode(', ',$linesArray[$k])." )");
					}
					$original_loop_count++;
				}
				else{
					array_push($warning_array, "<b style='color:#FFF;'>Row ".($k+1)."</b> : Already exists, duplicate values found ( ".str_replace($data, '<u style="color:#FFF;">'.$data.'</u>', implode(', ',$linesArray[$k]))." ) ");
				}
            }
			
			$response	= array();
			
            if($importcompleted)
				$response['status']	= 1;
            else 
				$response['status']	= 0;
			
			$response['exceptions']	= $exception_array;
			$response['warnings']	= $warning_array;
			$response['total_rows']	= $linesLength;
			$response['total_rows_inserted']	= $total_rows_inserted;

			return $response;
    }

    /*
     * 
     *  Update old rows
     *  $table - db table
     *  $csvLine - one line from csv
     *  $columns - list of csv columns
     *  $tableColumns - list of table columns
     *  $needle - value for compare from csv
     *  $tableKey - key for compare from table
     * 
     */

    public function updateOld($table, $csvLine, $columns, $tableColumns, $needle, $tableKey)
    {
        // $columnsLength - size of columns array
        // $tableString - rows in table
        // $csvLine - items from csv
        
        $columnsLength = sizeof($columns);
        $tableString = '';
        $n           = 0;
        
        for($i=0; $i<$columnsLength; $i++) {
            if($columns[$i]!='') {
                $tableString = ($n!=0) ? $tableString.", ".$tableColumns[$i]."='".CHtml::encode(stripslashes($csvLine[$columns[$i]-1]))."'" : $tableColumns[$i]."='".CHtml::encode(stripslashes($csvLine[$columns[$i]-1]))."'";

                $n++;
            }
        }

        // update row in database

        $sql="UPDATE ".$table." SET ".$tableString." WHERE ".$tableKey."='".$needle."'";
        $command=Yii::app()->db->createCommand($sql);

        if($command->execute())
             return (1);
        else
             return (0);
    }

    /*
     * get columns from selected table
     * $table - db table
     * @return array list of db columns
     *
     */

    public function tableColumns($table)
    {
        return Yii::app()->getDb()->getSchema()->getTable($table)->getColumnNames();
    }

    /*
     * get attribute from all rows from selected table
     *
     * $table - db table
     * $attribute - columns in db table
     * @return - rows array
     *
     */

    public function selectRows($table, $attribute)
    {
        $sql = "SELECT ".$attribute." FROM ".$table;
        $command=Yii::app()->db->createCommand($sql);
        return ($command->queryAll());
    }
	
	protected function formatValue($value, $params){
		if(isset($params['type'])){
			switch($params['type']){
				case "date":	
					$dateformats	=	array('Y-m-d', 'Y/m/d', 'Y.m.d', 'd-m-Y', 'd/m/Y', 'd.m.Y', 'd/m/y', 'd-m-y', 'd.m.y');		//add more date formats if needed
					foreach($dateformats as $format){
						if($this->validateDate($value, $format)){
							$d 		=	DateTime::createFromFormat($format, $value);
							$value	=	$d->format(isset($params['format'])?$params['format']:'Y-m-d');
							break;
						}
					}
				break;
				
				case "gender":
					$genderformats	=	array('M'=>array('male', 'm', '1'), 'F'=>array('female', 'f', '2'));		//add more date formats if needed
					foreach($genderformats as $dbval=>$formats){
						if(in_array(str_replace(array(' '),'',strtolower($value)), $formats)){
							$value	=	$dbval;
							break;
						}
					}
				break;
			}
		}
		return $value;
	}
	
	protected function perfectValue($value){
		$value	=	mysql_real_escape_string($value);
		return $value;
	}
	
	protected function validateDate($date, $format = 'Y-m-d H:i:s'){
		$d	=	DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
}

?>
