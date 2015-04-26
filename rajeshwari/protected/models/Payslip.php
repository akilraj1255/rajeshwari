<?php

/**
 * This is the model class for table "payslip".
 *
 * The followings are the available columns in table 'payslip':
 * @property string $date_join
 * @property string $salary_date
 * @property string $bank_name
 * @property integer $bank_acc_no
 * @property integer $basic_pay
 * @property integer $HRA
 * @property integer $PF
 * @property integer $TDS
 */
class Payslip extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Payslip the static model class
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
		return 'payslip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('date_join, salary_date, bank_name, bank_acc_no, basic_pay, HRA, PF, TDS', 'required'),
			array('bank_acc_no, basic_pay, HRA, PF, TDS', 'numerical', 'integerOnly'=>true),
			array('date_join, salary_date, bank_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('date_join, salary_date, bank_name, bank_acc_no, basic_pay, HRA, PF, TDS', 'safe', 'on'=>'search'),
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
			'date_join' => 'Date Join',
			'salary_date' => 'Salary Date',
			'bank_name' => 'Bank Name',
			'bank_acc_no' => 'Bank Acc No',
			'basic_pay' => 'Basic Pay',
			'HRA' => 'Hra',
			'PF' => 'Pf',
			'TDS' => 'Tds',
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

		$criteria->compare('date_join',$this->date_join,true);
		$criteria->compare('salary_date',$this->salary_date,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_acc_no',$this->bank_acc_no);
		$criteria->compare('basic_pay',$this->basic_pay);
		$criteria->compare('HRA',$this->HRA);
		$criteria->compare('PF',$this->PF);
		$criteria->compare('TDS',$this->TDS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}