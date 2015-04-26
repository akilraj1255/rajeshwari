<?php
class Export extends CFormModel
{
   	public function exportdb($format='csv', $model='Students', $attributes){
		$method	= 'export2'.$format;		//here is the method name ex: export2csv
		if(method_exists($this, $method)){			
			$this->download_send_headers($model.".".$format);
			echo $this->$method($model, $attributes);
			die();
		}
		else{
			Yii::app()->user->setFlash('exporterror', 'You are not allowed to access this model !!');
			return NULL;
		}
	}
	
	protected function export2csv($model, $attributes){
		$headers	= array();
		foreach($attributes as $attribute){
			$headers[]	=	$model::model()->getAttributeLabel($attribute);			
		}
		
		if(count($headers) > 0){
			$handle		= fopen("php://output", 'w');
			fputcsv($handle, $headers, ',', '"');
			
			$criteria	= new CDbCriteria;
			$datas		= $model::model()->findAll($criteria);
			foreach($datas as $data){
				$row	= array();
				foreach($attributes as $attribute){
					$row[]	= $data->$attribute;
				}
				if(implode('', $row)!=""){
					fputcsv($handle, $row, ',', '"');
				}
			}
			
			fclose($handle);
			return ob_get_clean();
		}
		return;
	}
	
	protected function download_send_headers($filename) {
		// disable caching
		$now = gmdate("D, d M Y H:i:s");
		header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
		header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
		header("Last-Modified: {$now} GMT");
	
		// force download  
		//header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		//header("Content-Type: application/download");
	
		// disposition / encoding on response body
		header("Content-Disposition: attachment;filename={$filename}");
		header("Content-Transfer-Encoding: binary");
	}
}

?>
