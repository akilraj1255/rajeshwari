<?php

/**
 * This is the model class for table "sms_settings".
 *
 * The followings are the available columns in table 'sms_settings':
 * @property integer $id
 * @property string $settings_key
 * @property integer $is_enabled
 */
class SmsSettings extends CActiveRecord
{
	public $enable_app;
	//public $enable_news;
	public $enable_std_ad;
	public $enable_std_atn;
	public $enable_emp_apmt;
	public $enable_exm_schedule;
	public $enable_exm_result;
	public $enable_fees;
	public $enable_library;

	protected $smsuid="";
	protected $smspin="";
	protected $smsroute="5";
	protected $smssender="";

	/**
	 * Returns the static model of the specified AR class.
	 * @return SmsSettings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sms_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('is_enabled', 'numerical', 'integerOnly'=>true),
			array('settings_key', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, settings_key, is_enabled', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'settings_key' => 'Settings Key',
			'is_enabled' => 'Is Enabled',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('settings_key',$this->settings_key,true);
		$criteria->compare('is_enabled',$this->is_enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function sendSms($to,$from,$message)
	{
		
		// Add SMS gateway settings here.
		
		/*require_once('/path/to/extensions/twilio/Services/Twilio.php');
 
		$sid = "{{ ACCOUNT SID }}"; // Your Account SID from www.twilio.com/user/account
		$token = "{{  AUTH TOKEN }}"; // Your Auth Token from www.twilio.com/user/account
		 
		$client = new Services_Twilio($sid, $token);
		$message = $client->account->sms_messages->create(
		  '+14158141829', // From a valid Twilio number
		  '+14159352345', // Text this number
		  "Hello world! This is admin, testing our twilio api"
		  
		);*/		
		
		
		
			
			//Change your configurations here.
			//---------------------------------
			// $username="naveenn";
			// $api_password="123456";
			// $sender="ESBLDR";
			// $domain="www.bulksmsgateway.in";
			// $priority="3";// 1-Normal,2-Priority,3-Marketing
			// $method="GET";
			//---------------------------------

			//$uid="686172695f313233";
			$uid="dummy";
			$pin="54cc7d3454d6d";
			$route="10";
			// $domain="www.bulksmsgateway.in";
			// $priority="3";// 1-Normal,2-Priority,3-Marketing
			$method="GET";
			
		
				
			$mobile			= $to;
			$message		= $message;
			
			//$message 		= html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $message), ENT_NOQUOTES, 'UTF-8');
			//$message		= str_replace('%u', '',$this->utf8_to_unicode($message));
			//$message		= $this->utf8ToUnicodeCodePoints($message);
			
			// Convert UTF-8 string to HTML entities
			//$message = mb_convert_encoding($message, 'HTML-ENTITIES',"UTF-8");
			// Convert HTML entities into ISO-8859-1
			//$message = html_entity_decode($message,ENT_NOQUOTES, "ISO-8859-1");
			
			$uid		= urlencode($uid);
			$pin	= urlencode($pin);
			$sender			= urlencode($sender);
			$message		= urlencode($message);
		
			$parameters="uid=$uid&pin=$pin&route=$route&mobile=$mobile&message=$message";
		
			$url="http://smsalertbox.com/api/sms.php";
		
			$ch = curl_init($url);
		
			if($method=="POST")
			{
				curl_setopt($ch, CURLOPT_POST,1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
			}
			else
			{
				$get_url=$url."?".$parameters;
		
				curl_setopt($ch, CURLOPT_POST,0);
				curl_setopt($ch, CURLOPT_URL, $get_url);
			}
		
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
			curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
			// $return_val = curl_exec($ch);
			
			
			//http://bulksmsgateway.in/sendmessage.php?user=........&password=.......&mobile=........&message=.......&sender=.......&type=3
		
		
			
		return 1 ;
		
				
		
	
	
		
		
		
		/*
				
			$mobile			= $to;
			$message		= $message;
			$message		= urlencode($message);
			$parameters="&mobile=$mobile&message=$message&sender=$sender&type=$priority";
			$model = Configurations::model()->findByPk(23);
			$url = $model->config_value;
		
		
			
			$get_url=$url."?".$parameters;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST,0);
			curl_setopt($ch, CURLOPT_URL, $get_url);
			
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
			curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
			$return_val = curl_exec($ch);
			
			$count=SmsCount::model()->findByPk(1);
			$count->current=$count->current+1;
			$count->save();
			
			
		
		
			
		return 1 ;
		
				
		
	
	*/}
	
	
	/*protected function utf8_to_unicode($str) {
        $unicode = array();
        $values = array();
        $lookingFor = 1;
        for ($i = 0; $i < strlen($str); $i++) {
            $thisValue = ord($str[$i]);
            if ($thisValue < 128) {
                $number = dechex($thisValue);
                $unicode[] = (strlen($number) == 1) ? '%u000' . $number : "%u00" . $number;
            } else {
                if (count($values) == 0)
                    $lookingFor = ( $thisValue < 224 ) ? 2 : 3;
                $values[] = $thisValue;
                if (count($values) == $lookingFor) {
                    $number = ( $lookingFor == 3 ) ?
                            ( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ) :
                            ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64
                            );
                    $number = dechex($number);
                    $unicode[] =
                            (strlen($number) == 3) ? "%u0" . $number : "%u" . $number;
                    $values = array();
                    $lookingFor = 1;
                } // if
            } // if
        }
        return implode("", $unicode);
    }*/
	//$hexMessage = str_replace('%u', '',utf8_to_unicode($_message));
	
	protected function utf8ToUnicodeCodePoints($str) {
		if (!mb_check_encoding($str, 'UTF-8')) {
			trigger_error('$str is not encoded in UTF-8, I cannot work like this');
			return false;
		}
		return preg_replace_callback('/./u', function ($m) {
			$ord = ord($m[0]);
			if ($ord <= 127) {
				return sprintf('\u%04x', $ord);
			} else {
				return trim(json_encode($m[0]), '"');
			}
		}, $str);
	}

	public function sendSmsAdmission($to, $name, $collegename, $admission_no)
	{
	

		
			$tempid="45140";
			$message = "Admission: Dear $name, You've been admitted to $collegename. Your admission no. is $admission_no . Thank you.";

			// $domain="www.bulksmsgateway.in";
			// $priority="3";// 1-Normal,2-Priority,3-Marketing
			$method="POST";
				
			$mobile			= $to;
			$message		= $message;
			
			
			$uid		= urlencode($this->smsuid);
			$pin	= urlencode($this->smspin);
			$sender			= urlencode($this->smssender);
			$route			= urlencode($this->smsroute);
			$message		= urlencode($message);
		
			$parameters="uid=$uid&pin=$pin&route=$route&sender=$sender&tempid=$tempid&mobile=$mobile&message=$message&pushid=1";
		// file_put_contents("data.txt", $parameters);
			$url="http://sms.thirstyscholarstech.com/api/sms.php";
		
			$ch = curl_init($url);
		
			if($method=="POST")
			{
				curl_setopt($ch, CURLOPT_POST,1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
			}
			else
			{
				$get_url=$url."?".$parameters;
		
				curl_setopt($ch, CURLOPT_POST,0);
				curl_setopt($ch, CURLOPT_URL, $get_url);
			}
		
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
			curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
			$return_val = curl_exec($ch);
		
			
		return 1 ;
		
				
		
	
	
		
		}

	public function sendSmsFees($to, $name, $fees, $balance)
	{
		
		
			$tempid="45139";
			$message = "Fee: Dear $name, Fee paid Rs. $fees. Balance Rs. $balance. Thank you.";
			
			// $domain="www.bulksmsgateway.in";
			// $priority="3";// 1-Normal,2-Priority,3-Marketing
			$method="POST";
				
			$mobile			= $to;
			$message		= $message;
			
			
			$uid		= urlencode($this->smsuid);
			$pin	= urlencode($this->smspin);
			$sender			= urlencode($this->smssender);
			$route			= urlencode($this->smsroute);
			$message		= urlencode($message);
		
			$parameters="uid=$uid&pin=$pin&route=$route&sender=$sender&tempid=$tempid&mobile=$mobile&message=$message&pushid=1";
		// file_put_contents("data.txt", $parameters);
			$url="http://sms.thirstyscholarstech.com/api/sms.php";
		
			$ch = curl_init($url);
		
			if($method=="POST")
			{
				curl_setopt($ch, CURLOPT_POST,1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
			}
			else
			{
				$get_url=$url."?".$parameters;
		
				curl_setopt($ch, CURLOPT_POST,0);
				curl_setopt($ch, CURLOPT_URL, $get_url);
			}
		
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
			curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
			$return_val = curl_exec($ch);
				
			
		return 1 ;
		
				
		
	
	
		
		}


		public function sendSmsExamresult($data)
	{
	

		
			$tempid="45141";
			$message = "Results Declared: Dear #FIELD2#, The result of examination #FIELD3# is : #FIELD4#. Total #FIELD5#. Thank you.";

			// $domain="www.bulksmsgateway.in";
			// $priority="3";// 1-Normal,2-Priority,3-Marketing
			$method="POST";
				
			$mobile			= $to;
			$message		= $message;
			
			// file_put_contents("data.txt", $data);
			$uid		= urlencode($this->smsuid);
			$pin	= urlencode($this->smspin);
			$sender			= urlencode($this->smssender);
			$route			= urlencode($this->smsroute);
			$message		= urlencode($message);
			$data = urlencode($data);
		
			$parameters="uid=$uid&pin=$pin&route=$route&sender=$sender&tempid=$tempid&message=$message&dynamic=1&data=$data&pushid=1";
		
			$url="http://sms.thirstyscholarstech.com/api/sms.php";
		
			$ch = curl_init($url);
		
			if($method=="POST")
			{
				curl_setopt($ch, CURLOPT_POST,1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
			}
			else
			{
				$get_url=$url."?".$parameters;
		
				curl_setopt($ch, CURLOPT_POST,0);
				curl_setopt($ch, CURLOPT_URL, $get_url);
			}
		
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
			curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
			$return_val = curl_exec($ch);
		
			
		return 1 ;
		
				
		
	
	
		
		}
}