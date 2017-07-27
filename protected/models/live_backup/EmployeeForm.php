<?php

/**
 * This is the model class for table "Employee".
 *
 * The followings are the available columns in table 'Employee':
 * @property string $Employee_id
 * @property string $Employee_atd_code
 * @property string $Emp_fname
 * @property string $Emp_mname
 * @property string $Emp_lname
 * @property string $Gender
 * @property string $DOB
 * @property string $Nationality
 * @property string $Email_id
 * @property string $mobile_number
 * @property string $PAN_number
 * @property string $Designation
 * @property string $Cadre
 * @property string $Reporting_officer1_id
 * @property string $Reporting_officer2_id
 * @property string $Employee_status
 * @property string $Present_address
 * @property string $Permanent_address
 * @property string $Blood_group
 * @property string $Image
 * @property string $Department
 * @property string $joining_date
 * @property string $JD_reporter
 * @property string $employee_csv
 */
class EmployeeForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('Employee_id, Employee_atd_code, Emp_fname, Gender, DOB, Nationality, Email_id, mobile_number, PAN_number, Designation, Cadre, Reporting_officer1_id, Employee_status, Present_address, Permanent_address, Image, Department, joining_date', 'required'),
			array('Employee_id, Employee_atd_code, Reporting_officer1_id, Reporting_officer2_id, Department, JD_reporter', 'length', 'max'=>100),
			array('Emp_fname, Emp_mname, Emp_lname, DOB, Email_id, Designation, joining_date', 'length', 'max'=>50),
			array('Gender, Nationality', 'length', 'max'=>20),
			array('mobile_number', 'length', 'max'=>45),
			array('PAN_number, Cadre, Employee_status, Blood_group', 'length', 'max'=>25),
			array('Email_id','match','pattern'=>'/^([a-z_.])+([a-z0-9])+@([a-z]+\.)+[a-z]+$/', 'message'=>'Please Enter valid email id'),
			array('mobile_number','match','pattern'=>'/^([0-9]{3})([-]{1})([0-9]{10})+$/', 'message'=>'Please Enter valid phone number'),
			array('PAN_number','match','pattern'=>'/^([A-Z]{5})([0-9]{4})([A-Z]{1})([A-Z0-9]{0})+$/', 'message'=>'Please Enter valid PAN number'),
			array('Present_address, Permanent_address, employee_csv', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Employee_id, Employee_atd_code, Emp_fname, Emp_mname, Emp_lname, Gender, DOB, Nationality, Email_id, mobile_number, PAN_number, Designation, Cadre, Reporting_officer1_id, Reporting_officer2_id, Employee_status, Present_address, Permanent_address, Blood_group, Image, Department, joining_date, JD_reporter, employee_csv', 'safe', 'on'=>'search'),
		);
	}

	function getdata()
	{
		$connection=Yii::app()->db;
		$sql = "select * from Employee";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	function get_JD()
	{
		$connection=Yii::app()->db;
		$sql = "SELECT * FROM `Employee` GROUP by `Designation`,`JD_reporter` ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	function get_employee_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `Employee`".' '.$where;
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();		
		return $rows;
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
			'Employee_id' => 'Employee',
			'Employee_atd_code' => 'Employee Atd Code',
			'Emp_fname' => 'Emp Fname',
			'Emp_mname' => 'Emp Mname',
			'Emp_lname' => 'Emp Lname',
			'Gender' => 'Gender',
			'DOB' => 'Dob',
			'Nationality' => 'Nationality',
			'Email_id' => 'Email',
			'mobile_number' => 'Mobile Number',
			'PAN_number' => 'Pan Number',
			'Designation' => 'Designation',
			'Cadre' => 'Cadre',
			'Reporting_officer1_id' => 'Reporting Officer1',
			'Reporting_officer2_id' => 'Reporting Officer2',
			'Employee_status' => 'Employee Status',
			'Present_address' => 'Present Address',
			'Permanent_address' => 'Permanent Address',
			'Blood_group' => 'Blood Group',
			'Image' => 'Image',
			'Department' => 'Department',
			'joining_date' => 'Joining Date',
			'JD_reporter' => 'Jd Reporter',
			'employee_csv' => 'Employee Csv',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Employee_id',$this->Employee_id,true);
		$criteria->compare('Employee_atd_code',$this->Employee_atd_code,true);
		$criteria->compare('Emp_fname',$this->Emp_fname,true);
		$criteria->compare('Emp_mname',$this->Emp_mname,true);
		$criteria->compare('Emp_lname',$this->Emp_lname,true);
		$criteria->compare('Gender',$this->Gender,true);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('Nationality',$this->Nationality,true);
		$criteria->compare('Email_id',$this->Email_id,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('PAN_number',$this->PAN_number,true);
		$criteria->compare('Designation',$this->Designation,true);
		$criteria->compare('Cadre',$this->Cadre,true);
		$criteria->compare('Reporting_officer1_id',$this->Reporting_officer1_id,true);
		$criteria->compare('Reporting_officer2_id',$this->Reporting_officer2_id,true);
		$criteria->compare('Employee_status',$this->Employee_status,true);
		$criteria->compare('Present_address',$this->Present_address,true);
		$criteria->compare('Permanent_address',$this->Permanent_address,true);
		$criteria->compare('Blood_group',$this->Blood_group,true);
		$criteria->compare('Image',$this->Image,true);
		$criteria->compare('Department',$this->Department,true);
		$criteria->compare('joining_date',$this->joining_date,true);
		$criteria->compare('JD_reporter',$this->JD_reporter,true);
		$criteria->compare('employee_csv',$this->employee_csv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
