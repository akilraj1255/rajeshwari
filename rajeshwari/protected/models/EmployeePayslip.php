<?php

/**
 * This is the model class for table "employee_payslip".
 *
 * The followings are the available columns in table 'employee_payslip':
 * @property integer $id
 * @property string $emp_name
 * @property string $emp_id
 * @property string $employee_department_id
 * @property string $emp_designation
 * @property string $date_join
 * @property string $salary_date
 * @property integer $bank_acc_no
 * @property integer $total_day
 * @property integer $lop_day
 * @property integer $days_period
 * @property integer $basic_pay
 * @property integer $HRA
 * @property integer $bonus
 * @property integer $medi_reim
 * @property integer $spec_allowanc
 * @property integer $OR
 * @property integer $skilled_pay
 * @property integer $relocat_allow
 * @property integer $performnc_pay
 * @property integer $leave_enhancemnt
 * @property integer $PF
 * @property integer $VPF
 * @property integer $TAX
 * @property integer $ESI
 * @property integer $advnc_salary
 * @property integer $TDS
 * @property integer $vechile_loan
 * @property integer $bank_loan
 * @property integer $mobile_ded
 * @property integer $hostal_recovery
 * @property integer $store_ded
 * @property integer $food_ded
 * @property integer $other_ded
 * @property integer $tot_ded
 * @property integer $gross_earnings
 * @property integer $net_pay
 */
class EmployeePayslip extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeePayslip the static model class
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
		return 'employee_payslip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_name,  employee_department_id, emp_designation, date_join, salary_date, bank_acc_no, total_day, lop_day, days_period, basic_pay,tot_ded, gross_earnings, net_pay', 'required'),
			array('bank_acc_no, total_day, lop_day, days_period, basic_pay, HRA, bonus, medi_reim, spec_allowanc, OR, skilled_pay, relocat_allow, performnc_pay, leave_enhancemnt, PF, VPF, TAX, ESI, advnc_salary, TDS, vechile_loan, bank_loan, mobile_ded, hostal_recovery, store_ded, food_ded, other_ded, tot_ded, gross_earnings, net_pay', 'numerical', 'integerOnly'=>true),
			array('emp_name, employee_department_id, date_join, salary_date,bank_name, emp_designation,gender', 'length', 'max'=>255),
			array('emp_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, emp_name, emp_id, employee_department_id, emp_designation, gender,date_join,bank_name, salary_date, bank_acc_no, total_day, lop_day, days_period, basic_pay, HRA, bonus, medi_reim, spec_allowanc, OR, skilled_pay, relocat_allow, performnc_pay, leave_enhancemnt, PF, VPF, TAX, ESI, advnc_salary, TDS, vechile_loan, bank_loan, mobile_ded, hostal_recovery, store_ded, food_ded, other_ded, tot_ded, gross_earnings, net_pay', 'safe', 'on'=>'search'),
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
			'emp_name' => Yii::t('employees','Employee Name'),
			'emp_id' => 'Employee Id',
			'employee_department_id' => Yii::t('employees','Employee Dept'),
			'gender' => Yii::t('employees','Gender'),
			'emp_designation' => Yii::t('employees','Employee Designation'),
			'date_join' => Yii::t('employees','Date Joining'),
			'salary_date' => Yii::t('employees','Salary Date'),
			'bank_name' => Yii::t('employees','Bank Name'),
			'bank_acc_no' => Yii::t('employees','Bank Acc No'),
			'total_day' => Yii::t('employees','Total Days'),
			'lop_day' => Yii::t('employees','LOP Days'),
			'days_period' => Yii::t('employees','Days Period'),
			'basic_pay' => Yii::t('employees','Basic Pay'),
			'HRA' => Yii::t('employees','HRA'),
			'bonus' => Yii::t('employees','Bonus'),
			'medi_reim' => Yii::t('employees','Medi Reim'),
			'spec_allowanc' => Yii::t('employees','Spec Allowanc'),
			'OR' => Yii::t('employees','OR'),
			'skilled_pay' => Yii::t('employees','Skilled Pay'),
			'relocat_allow' => Yii::t('employees','Relocation Allow'),
			'performnc_pay' => Yii::t('employees','Performnc Pay'),
			'leave_enhancemnt' => Yii::t('employees','Leave Enhancemnt'),
			'PF' => Yii::t('employees','PF'),
			'VPF' => Yii::t('employees','VPF'),
			'TAX' => Yii::t('employees','Tax'),
			'ESI' => Yii::t('employees','ESI'),
			'advnc_salary' => Yii::t('employees','Advnc Salary'),
			'TDS' => Yii::t('employees','TDS'),
			'vechile_loan' => Yii::t('employees','Vechile Loan'),
			'bank_loan' => Yii::t('employees','Bank Loan'),
			'mobile_ded' => Yii::t('employees','Mobile Deduction'),
			'hostal_recovery' => Yii::t('employees','Hostal Recovery'),
			'store_ded' => Yii::t('employees','Store Deduction'),
			'food_ded' => Yii::t('employees','Food Deduction'),
			'other_ded' => Yii::t('employees','Other Deduction'),
			'tot_ded' => Yii::t('employees','Tot Deduction'),
			'gross_earnings' => Yii::t('employees','Gross Earnings'),
			'net_pay' => Yii::t('employees','Net Pay'),
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
		$criteria->compare('emp_name',$this->emp_name,true);
		$criteria->compare('emp_id',$this->emp_id,true);
		$criteria->compare('employee_department_id',$this->employee_department_id,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('emp_designation',$this->emp_designation,true);
		$criteria->compare('date_join',$this->date_join,true);
		$criteria->compare('salary_date',$this->salary_date,true);
		$criteria->compare('bank_name',$this->bank_name);
		$criteria->compare('bank_acc_no',$this->bank_acc_no);
		$criteria->compare('total_day',$this->total_day);
		$criteria->compare('lop_day',$this->lop_day);
		$criteria->compare('days_period',$this->days_period);
		$criteria->compare('basic_pay',$this->basic_pay);
		$criteria->compare('HRA',$this->HRA);
		$criteria->compare('bonus',$this->bonus);
		$criteria->compare('medi_reim',$this->medi_reim);
		$criteria->compare('spec_allowanc',$this->spec_allowanc);
		$criteria->compare('OR',$this->OR);
		$criteria->compare('skilled_pay',$this->skilled_pay);
		$criteria->compare('relocat_allow',$this->relocat_allow);
		$criteria->compare('performnc_pay',$this->performnc_pay);
		$criteria->compare('leave_enhancemnt',$this->leave_enhancemnt);
		$criteria->compare('PF',$this->PF);
		$criteria->compare('VPF',$this->VPF);
		$criteria->compare('TAX',$this->TAX);
		$criteria->compare('ESI',$this->ESI);
		$criteria->compare('advnc_salary',$this->advnc_salary);
		$criteria->compare('TDS',$this->TDS);
		$criteria->compare('vechile_loan',$this->vechile_loan);
		$criteria->compare('bank_loan',$this->bank_loan);
		$criteria->compare('mobile_ded',$this->mobile_ded);
		$criteria->compare('hostal_recovery',$this->hostal_recovery);
		$criteria->compare('store_ded',$this->store_ded);
		$criteria->compare('food_ded',$this->food_ded);
		$criteria->compare('other_ded',$this->other_ded);
		$criteria->compare('tot_ded',$this->tot_ded);
		$criteria->compare('gross_earnings',$this->gross_earnings);
		$criteria->compare('net_pay',$this->net_pay);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}