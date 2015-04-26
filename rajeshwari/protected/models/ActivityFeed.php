<?php

/**
 * This is the model class for table "activity_feed".
 *
 * The followings are the available columns in table 'activity_feed':
 * @property integer $id
 * @property integer $initiator_id
 * @property integer $activity_type
 * @property integer $goal_id
 * @property string $activity_time
 */
class ActivityFeed extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ActivityFeed the static model class
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
		return 'activity_feed';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('initiator_id, activity_type', 'required'),
			array('initiator_id, activity_type, goal_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, initiator_id, activity_type, goal_id, goal_name, field_name, initial_field_value, new_field_value, activity_time', 'safe', 'on'=>'search'),
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
			'initiator_id' => 'Initiator',
			'activity_type' => 'Activity Type',
			'goal_id' => 'Goal',
			'goal_name' => 'Goal Name',
			'field_name' => 'Field Name',
			'initial_field_value' => 'Initial Field Value',
			'new_field_value' => 'New Field Value', 
			'activity_time' => 'Activity Time',
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
		$criteria->compare('initiator_id',$this->initiator_id);
		$criteria->compare('activity_type',$this->activity_type);
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('goal_name',$this->goal_name);
		$criteria->compare('field_name',$this->field_name);
		$criteria->compare('initial_field_value',$this->initial_field_value);
		$criteria->compare('new_field_value',$this->new_field_value);
		$criteria->compare('activity_time',$this->activity_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function saveFeed($initiator_id,$activity_type,$goal_id,$goal_name,$field_name,$initial_field_value,$new_field_value)
	{    
		$model = new ActivityFeed;
		$model->initiator_id = $initiator_id;
		$model->activity_type = $activity_type;
		$model->goal_id = $goal_id;
		$model->goal_name = $goal_name;
		$model->field_name = $field_name;
		$model->initial_field_value = $initial_field_value;
		$model->new_field_value = $new_field_value;
		$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
		if($settings!=NULL)
		{	
			$timezone = Timezone::model()->findByAttributes(array('id'=>$settings->timezone));
			date_default_timezone_set($timezone->timezone);
									
		}
		$model->activity_time = date('Y-m-d H:i:s');
		$model->save();
	}
}