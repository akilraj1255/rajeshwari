<?php

/**
 * This is the model class for table "finance_transactions".
 **/
class FinanceTransaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FinanceFeeCollections the static model class
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
		return 'finance_transactions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('collection_id, student_id', 'numerical', 'integerOnly'=>true),
			array('transaction_date', 'safe'),
			array('collection_id, amount,  student_id','required'),
			//array('name','CRegularExpressionValidator', 'pattern'=>'/^[A-Za-z_ ]+$/','message'=>"{attribute} should contain only letters."),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, collection_id, student_id', 'safe', 'on'=>'search'),
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
			'amount' => Yii::t('fees','Amount'),
			'collection_id' => Yii::t('fees','Collection ID'),
			'student_id' => Yii::t('fees','Student ID'),
			'transaction_date' => Yii::t('fees','Transaction date'),
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
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('collection_id',$this->collection_id,true);
		$criteria->compare('student_id',$this->student_id,true);
		$criteria->compare('transaction_date',$this->transaction_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function convertDate($model,$str)
        {               
        echo $str;
		
                if($str != null)
                {
								$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$str=date($settings->displaydate,strtotime($str));
									echo $date1;
		
								}
								

                        
                }
                else
                {
                        $str = '';
                }
                
                return $str;
        }
		
	public function feecategory($data,$row){
		$fees_category=FinanceFeeCategories::model()->findByAttributes(array('id'=>$data->fee_category_id,'is_deleted'=>0));
		if(count($fees_category)>0){
			return $fees_category->name;
		}
		else{
			return '-';
		}
	}
	
	public function batchname($data,$row){
		$batch_name=Batches::model()->findByAttributes(array('id'=>$data->batch_id,'is_deleted'=>0));
		if(count($batch_name)>0){
			return $batch_name->name;
		}
		else{
			return '-';
		}
	}
        
}