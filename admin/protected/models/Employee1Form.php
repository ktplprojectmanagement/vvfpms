<?php

/**
 * This is the model class for table "Employee1".
 *
 * The followings are the available columns in table 'Employee1':
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
 * @property string $Department
 * @property string $joining_date
 * @property string $cluster_appraiser
 * @property string $cluster_name
 * @property string $state
 * @property string $city
 * @property string $other_city
 * @property string $Image
 * @property string $changes_date
 * @property integer $invalid_email
 * @property string $company_location
 * @property string $BU
 * @property string $pms_status
 * @property string $reporting_1_change
 * @property string $reporting_2_change
 * @property string $reporting_1_effective_date
 * @property string $reporting_2_effective_date
 * @property string $bu_head_name
 * @property string $bu_head_email
 * @property string $plant_head_name
 * @property string $plant_head_email
 * @property string $new_kra_till_date
 * @property string $new_kra_create
 * @property string $year_end_review_of_manager
 * @property string $year_end_review_of_clshead
 * @property string $year_end_review_of_plant_head
 * @property string $year_end_review_of_bu_head
 * @property string $effective_date_promo
 * @property string $effective_date_norm
 * @property string $retire_date
 */
class Employee1Form extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Employee1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Employee_id, Employee_atd_code, Emp_fname, Emp_lname, Gender, DOB, Nationality, Email_id,  PAN_number, Designation, Cadre, Reporting_officer1_id,  Employee_status, Department, joining_date, cluster_appraiser, cluster_name,company_location, BU, pms_status', 'required'),
			array('invalid_email', 'numerical', 'integerOnly'=>true),
			array('Employee_id, Employee_atd_code, Reporting_officer1_id, Reporting_officer2_id, Department, cluster_name, state, city, other_city, company_location, pms_status, reporting_1_effective_date, reporting_2_effective_date, bu_head_name, bu_head_email, plant_head_name, plant_head_email, new_kra_till_date, new_kra_create, year_end_review_of_manager, year_end_review_of_clshead, year_end_review_of_plant_head, year_end_review_of_bu_head, effective_date_promo, effective_date_norm', 'length', 'max'=>100),
			array('Emp_fname, Emp_mname, Emp_lname, DOB, Email_id, Designation, joining_date, retire_date', 'length', 'max'=>50),
			array('Gender, Nationality', 'length', 'max'=>20),
			array('mobile_number', 'length', 'max'=>45),
			array('PAN_number, Cadre, Employee_status, Blood_group', 'length', 'max'=>25),
			array('Present_address, Permanent_address, cluster_appraiser', 'length', 'max'=>200),
			array('Image, reporting_1_change, reporting_2_change', 'length', 'max'=>300),
			array('BU', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Employee_id, Employee_atd_code, Emp_fname, Emp_mname, Emp_lname, Gender, DOB, Nationality, Email_id, mobile_number, PAN_number, Designation, Cadre, Reporting_officer1_id, Reporting_officer2_id, Employee_status, Present_address, Permanent_address, Blood_group, Department, joining_date, cluster_appraiser, cluster_name, state, city, other_city, Image, changes_date, invalid_email, company_location, BU, pms_status, reporting_1_change, reporting_2_change, reporting_1_effective_date, reporting_2_effective_date, bu_head_name, bu_head_email, plant_head_name, plant_head_email, new_kra_till_date, new_kra_create, year_end_review_of_manager, year_end_review_of_clshead, year_end_review_of_plant_head, year_end_review_of_bu_head, effective_date_promo, effective_date_norm, retire_date', 'safe', 'on'=>'search'),
		);
	}




	function getdata()
	{
		$connection=Yii::app()->db;
		$sql = "select * from Employee1 ";
//print_r($sql);die();
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}


	function get_employee_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `Employee1`".' '.$where;
                
			
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
			'Department' => 'Department',
			'joining_date' => 'Joining Date',
			'cluster_appraiser' => 'Cluster Appraiser',
			'cluster_name' => 'Cluster Name',
			'state' => 'State',
			'city' => 'City',
			'other_city' => 'Other City',
			'Image' => 'Image',
			'changes_date' => 'Changes Date',
			'invalid_email' => 'Invalid Email',
			'company_location' => 'Company Location',
			'BU' => 'Bu',
			'pms_status' => 'Pms Status',
			'reporting_1_change' => 'Reporting 1 Change',
			'reporting_2_change' => 'Reporting 2 Change',
			'reporting_1_effective_date' => 'Reporting 1 Effective Date',
			'reporting_2_effective_date' => 'Reporting 2 Effective Date',
			'bu_head_name' => 'Bu Head Name',
			'bu_head_email' => 'Bu Head Email',
			'plant_head_name' => 'Plant Head Name',
			'plant_head_email' => 'Plant Head Email',
			'new_kra_till_date' => 'New Kra Till Date',
			'new_kra_create' => 'New Kra Create',
			'year_end_review_of_manager' => 'Year End Review Of Manager',
			'year_end_review_of_clshead' => 'Year End Review Of Clshead',
			'year_end_review_of_plant_head' => 'Year End Review Of Plant Head',
			'year_end_review_of_bu_head' => 'Year End Review Of Bu Head',
			'effective_date_promo' => 'Effective Date Promo',
			'effective_date_norm' => 'Effective Date Norm',
			'retire_date' => 'Retire Date',
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
		$criteria->compare('Department',$this->Department,true);
		$criteria->compare('joining_date',$this->joining_date,true);
		$criteria->compare('cluster_appraiser',$this->cluster_appraiser,true);
		$criteria->compare('cluster_name',$this->cluster_name,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('other_city',$this->other_city,true);
		$criteria->compare('Image',$this->Image,true);
		$criteria->compare('changes_date',$this->changes_date,true);
		$criteria->compare('invalid_email',$this->invalid_email);
		$criteria->compare('company_location',$this->company_location,true);
		$criteria->compare('BU',$this->BU,true);
		$criteria->compare('pms_status',$this->pms_status,true);
		$criteria->compare('reporting_1_change',$this->reporting_1_change,true);
		$criteria->compare('reporting_2_change',$this->reporting_2_change,true);
		$criteria->compare('reporting_1_effective_date',$this->reporting_1_effective_date,true);
		$criteria->compare('reporting_2_effective_date',$this->reporting_2_effective_date,true);
		$criteria->compare('bu_head_name',$this->bu_head_name,true);
		$criteria->compare('bu_head_email',$this->bu_head_email,true);
		$criteria->compare('plant_head_name',$this->plant_head_name,true);
		$criteria->compare('plant_head_email',$this->plant_head_email,true);
		$criteria->compare('new_kra_till_date',$this->new_kra_till_date,true);
		$criteria->compare('new_kra_create',$this->new_kra_create,true);
		$criteria->compare('year_end_review_of_manager',$this->year_end_review_of_manager,true);
		$criteria->compare('year_end_review_of_clshead',$this->year_end_review_of_clshead,true);
		$criteria->compare('year_end_review_of_plant_head',$this->year_end_review_of_plant_head,true);
		$criteria->compare('year_end_review_of_bu_head',$this->year_end_review_of_bu_head,true);
		$criteria->compare('effective_date_promo',$this->effective_date_promo,true);
		$criteria->compare('effective_date_norm',$this->effective_date_norm,true);
		$criteria->compare('retire_date',$this->retire_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employee1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
