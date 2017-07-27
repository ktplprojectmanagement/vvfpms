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
		return array(
			array('Employee_id, Employee_atd_code, Emp_fname,Emp_lname,Email_id,Department,Designation,
				Gender,Cadre,Nationality,Employee_status,Reporting_officer1_id,cluster_name,cluster_appraiser,company_location,BU,pms_status','required'),
			array('Emp_fname','match','pattern'=>'/^([A-Za-z0-9\s.]{1,})$/', 'message'=>'Please Enter valid first name'),
			array('Emp_lname','match','pattern'=>'/^([A-Za-z0-9\s.]{1,})$/', 'message'=>'Please Enter valid last name'),
			array('Email_id','match','pattern'=>'/^([A-Za-z0-9][A-Za-z0-9_\.]{1,})@([A-Za-z0-9][A-Za-z0-9\-]{1,}).([A-Za-z]{2,4})(\.[A-Za-z]{2,4})?$/', 'message'=>'Please Enter valid Email Id'),
			array('mobile_number','match','pattern'=>'/^([\d]{10})*$/', 'message'=>'Please Enter valid 10 digit phone/mobile number'),
			array('PAN_number','match','pattern'=>'/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/', 'message'=>'Please Enter valid PAN number'),
			// array('Image', 'file', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,png', 'maxSize'=>512000,'on'=>'insert'),
			array('Employee_id, Employee_atd_code, Reporting_officer1_id, Reporting_officer2_id, Department', 'length', 'max'=>100),
			array('Emp_fname, Emp_mname, Emp_lname, DOB, Email_id, Designation, joining_date', 'length', 'max'=>50),
			array('Gender, Nationality', 'length', 'max'=>20),
			array('mobile_number', 'length', 'max'=>45),
			array('PAN_number, Cadre, Employee_status, Blood_group', 'length', 'max'=>25),
			array('Present_address, Permanent_address', 'length', 'max'=>200),
			array('Employee_id, Employee_atd_code, Emp_fname, Emp_mname, Emp_lname, Gender, DOB, Nationality, Email_id, mobile_number, PAN_number, Designation, Cadre, Reporting_officer1_id, Reporting_officer2_id, Employee_status, Present_address, Permanent_address, Blood_group, Image, Department, joining_date, cluster_appraiser, cluster_name, state, city, other_city', 'safe', 'on'=>'search'),
		);
	}

	function getdata()
	{
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$connection=Yii::app()->db;
			$sql = 'select * from `Employee`'.' '.'where pms_status = "Active" '.' and company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
			$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
}
else
{
$connection=Yii::app()->db;
			$sql = "select * from `Employee`".' '.'where pms_status != "Inactive" '.' and company_location="'.Yii::app()->user->getState('admin_location').'"';
			$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;

}
		
	}

function get_employee_data_new($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `Employee`".' '.$where;
               // $list[count($list)] = 'pms_status';
			//$data[count($data)] = "Inactive";	
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
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
		if (Yii::app()->user->getState('role_id') == '4') {
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$connection=Yii::app()->db;
			$sql = 'SELECT * FROM Employee '.$where.' and company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
			
			
			$command=$connection->createCommand($sql);
			for ($i=0; $i < count($list); $i++) { 
				$command->bindValue(":".$list[$i],$data[$i]);
			}
			$rows=$command->queryAll();	
			//print_r($rows);die();	
			return $rows;

}
else
{
$connection=Yii::app()->db;
			$sql = "select * from `Employee`".' '.$where.' and company_location=:company_location';
			//print_r($list);die();
			$list[count($list)] = 'company_location';
			$data[count($data)] = Yii::app()->user->getState('admin_location');		
			//print_r($data);die();
			$command=$connection->createCommand($sql);
			for ($i=0; $i < count($list); $i++) { 
				$command->bindValue(":".$list[$i],$data[$i]);
			}
			$rows=$command->queryAll();		
			return $rows;
}
			
		}
		else
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
	}




function get_employee_data1($where,$data,$list)
	{
		
$connection=Yii::app()->db;
			//$sql = "select * from `Employee`".' '.$where.' '. and pms_status != "Inactive";
			$sql = "select * from `Employee`".' '.$where.' and pms_status !="Inactive" ';
			
			$command=$connection->createCommand($sql);
			for ($i=0; $i < count($list); $i++) { 
				$command->bindValue(":".$list[$i],$data[$i]);
			}
			$rows=$command->queryAll();	
			//print_r($rows);die();	
			return $rows;


		

	}




	function get_appraiser_list()
	{
			$connection=Yii::app()->db;
			$sql = "select distinct `Reporting_officer1_id` from `Employee` where `pms_status` != 'Inactive' ";

			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
		
	}

function get_appraiser_list2()
	{
		$connection=Yii::app()->db;
		$sql = "select distinct `Email_id` from `Employee`";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_department_list()
	{
		if (Yii::app()->user->getState('role_id') == '4') {
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$connection=Yii::app()->db;
			$sql = 'select distinct `Department` from Employee where Department != "" and company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
			
			
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;

}
else
{
$connection=Yii::app()->db;
			$sql = "select distinct `Department` from `Employee` where Department != '' and company_location='".Yii::app()->user->getState('admin_location')."'";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}
			
		}
		else
		{
			$connection=Yii::app()->db;
			$sql = "select distinct `Department` from `Employee` where Department != ''";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
		}
		
	}

	function get_distinct_list($list,$where)
	{
		if (Yii::app()->user->getState('role_id') == '4') {
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$connection=Yii::app()->db;
			$sql = 'SELECT DISTINCT '.$list.' FROM Employee'.' '.$where.' and company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
			
			
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;

}
else
{
$connection=Yii::app()->db;
			$sql = "SELECT DISTINCT `".$list."` FROM `Employee`".' '.$where.' and company_location=:company_location';
			$list[count($list)] = 'company_location';
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}
			
		}
		else
		{
			$connection=Yii::app()->db;
			$sql = "SELECT DISTINCT `".$list."` FROM `Employee`".$where."";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
		}
		
	}

	function get_distinct_emplist()
	{
		if (Yii::app()->user->getState('role_id') == '4') {	
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{

			$connection=Yii::app()->db;
			$sql = 'select distinct Employee_id from Employee where company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}
else
{
$connection=Yii::app()->db;
			$sql = "select distinct `Employee_id` from `Employee` where company_location='".Yii::app()->user->getState('admin_location')."'";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}		
			
		}
		else
		{
			$connection=Yii::app()->db;
			$sql = "select distinct `Employee_id` from `Employee`";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
		}
		
	}


	function get_report_content($list)
	{	
		if (Yii::app()->user->getState('role_id') == '4') {	
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{

			$connection=Yii::app()->db;
			$sql = 'select distinct Employee_id from Employee where company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}
else
{
$connection=Yii::app()->db;
			$sql = "select ".$list." from `Employee` where company_location='".Yii::app()->user->getState('admin_location')."'";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}
			
		}
		else
		{
			$connection=Yii::app()->db;
			$sql = "select ".$list." from `Employee`";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
		}	
		
	}

	function get_designation_list()
	{
		if (Yii::app()->user->getState('role_id') == '4') {	
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$connection=Yii::app()->db;
			$sql = "select distinct `Designation` from `Employee` where Designation != '' and company_location IN ('Kolkata', 'Corporate', 'chennai', 'kutch-II', 'palanpur', 'raipur')";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
			
}
else
{
$connection=Yii::app()->db;
			$sql = "select distinct `Designation` from `Employee` where Designation != '' and company_location='".Yii::app()->user->getState('admin_location')."'";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}
			
		}
		else
		{
			$connection=Yii::app()->db;
			$sql = "select distinct `Designation` from `Employee` where Designation != ''";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
		}
	}

	
function get_cluster_list()
	{

$connection=Yii::app()->db;
			$sql = "SELECT DISTINCT `cluster_name` FROM `Employee` where `cluster_name`!=''   ";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
			

	}

function get_bu_list()
	{
		$connection=Yii::app()->db;
		$sql = "select distinct `BU` from `Employee` where BU != ''";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
function get_cadre_list()
	{

$connection=Yii::app()->db;
			$sql = "SELECT DISTINCT `Cadre` FROM `Employee` where `Cadre`!=''   ";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
			

	}
function get_department_list1()
	{

$connection=Yii::app()->db;
			$sql = "SELECT DISTINCT `Department` FROM `Employee` where `Department`!=''   ";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
			

	}

function get_designation_list1()
	{

$connection=Yii::app()->db;
			$sql = "SELECT DISTINCT `Designation` FROM `Employee` where `Designation`!=''   ";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
			

	}

function get_appraiser_list1()
	{
		if (Yii::app()->user->getState('role_id') == '4') {
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$connection=Yii::app()->db;
$sql = 'select distinct Email_id from Employee where company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")  ORDER BY Emp_fname ASC ';
			
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
			
}
else
{
$connection=Yii::app()->db;
			$sql = "select distinct `Email_id` from `Employee` where company_location='".Yii::app()->user->getState('admin_location')."' ORDER BY `Emp_fname` ASC ";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
}
			
		}
		else
		{
			$connection=Yii::app()->db;
			$sql = "select distinct `Email_id` from `Employee` ORDER BY `Emp_fname` ASC ";
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
		}
		
	}

	function get_dist_employee_data($list)
	{

		if (Yii::app()->user->getState('role_id') == '4') {
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$connection=Yii::app()->db;
$sql = 'SELECT DISTINCT '.$list.' FROM Employee'.' '.$where.' and company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
			
			$command=$connection->createCommand($sql);
			$rows=$command->queryAll();		
			return $rows;
			
}
else
{
$connection=Yii::app()->db;
			$sql = "select distinct  ".$list . "  from  `Employee` where company_location='".Yii::app()->user->getState('admin_location')."'";
			
			$command=$connection->createCommand($sql);
			
			$rows=$command->queryAll();		
			return $rows;
}
			
		}
		else
		{
			$connection=Yii::app()->db;
			$sql = "select distinct  ".$list . "  from  `Employee`";
			
			$command=$connection->createCommand($sql);
			
			$rows=$command->queryAll();		
			return $rows;
		}		
		
	}

	function get_mid_review_notbmitted_team($array,$emp_id_array){
		$connection=Yii::app()->db;
		
		if ($emp_id_array == '') {
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{

			$sql = "select * from Employee where company_location IN ('Kolkata', 'Corporate', 'chennai', 'kutch-II', 'palanpur', 'raipur') and `Employee_id` IN (".$array.") AND `Employee_id` NOT IN ('.$emp_id_array.')";
			
}
else
{
$sql = "select * from `Employee` where company_location='".Yii::app()->user->getState('admin_location')."' and `Employee_id` IN (".$array.") AND `Employee_id` NOT IN ('.$emp_id_array.')";
}
		
		}
		else{
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$sql = "select * from Employee where company_location IN ('Kolkata', 'Corporate', 'chennai', 'kutch-II', 'palanpur', 'raipur') and `Employee_id` IN (".$array.") AND `Employee_id` NOT IN (".$emp_id_array.")";
			
}
else
{
$sql = "select * from `Employee` where company_location='".Yii::app()->user->getState('admin_location')."' and `Employee_id` IN (".$array.") AND `Employee_id` NOT IN (".$emp_id_array.")";
}
			
		}
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

        function get_emp_idp_not_submitted($emp_not_sub_idp)
	{
		
		$connection=Yii::app()->db;
		//$sql = "SELECT DISTINCT `Employee_id` FROM `IDP` WHERE (`Employee_id` IN (".$array.")) AND (`goal_set_year`='$year1')";
	//print_r($array);die();
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$sql="SELECT DISTINCT `Employee_id` FROM `Employee` WHERE company_location IN ('Kolkata', 'Corporate', 'chennai', 'kutch-II', 'palanpur', 'raipur') and (`Employee_id` NOT IN (".$emp_not_sub_idp.")) ";
		
}
else
{
$sql="SELECT DISTINCT `Employee_id` FROM `Employee` WHERE company_location='".Yii::app()->user->getState('admin_location')."' and (`Employee_id` NOT IN (".$emp_not_sub_idp.")) ";
}
		
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
		$connection=Yii::app()->db;
	
	}
	function get_midEmp_idp_not_submitted($mid_idp_not_sub1)
	{
		
		$connection=Yii::app()->db;
		//$sql = "SELECT DISTINCT `Employee_id` FROM `IDP` WHERE (`Employee_id` IN (".$array.")) AND (`goal_set_year`='$year1')";
	//print_r($array);die();
if(Yii::app()->user->getState('admin_location') == 'Corporate')
{
$sql="SELECT DISTINCT `Employee_id` FROM `Employee` WHERE company_location IN ('Kolkata', 'Corporate', 'chennai', 'kutch-II', 'palanpur', 'raipur') and (`Employee_id` NOT IN (".$mid_idp_not_sub1.")) ";
}
else
{
$sql="SELECT DISTINCT `Employee_id` FROM `Employee` WHERE company_location='".Yii::app()->user->getState('admin_location')."' and (`Employee_id` NOT IN (".$mid_idp_not_sub1.")) ";
}
		
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
		$connection=Yii::app()->db;
	
	}

function get_yearEnd_not_submitted($emp_not_subyearEnd)
	{
		if(Yii::app()->user->getState('admin_location') == 'Corporate')
{

$connection=Yii::app()->db;
		//$sql = "SELECT DISTINCT `Employee_id` FROM `IDP` WHERE (`Employee_id` IN (".$array.")) AND (`goal_set_year`='$year1')";
	//print_r($array);die();
		$sql="SELECT DISTINCT `Employee_id` FROM `Employee` WHERE (`Employee_id` NOT IN (".$emp_not_subyearEnd.")) and company_location IN ('Kolkata', 'Corporate', 'chennai', 'kutch-II', 'palanpur', 'raipur')";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
		$connection=Yii::app()->db;
}
else
{
$connection=Yii::app()->db;
		//$sql = "SELECT DISTINCT `Employee_id` FROM `IDP` WHERE (`Employee_id` IN (".$array.")) AND (`goal_set_year`='$year1')";
	//print_r($array);die();
		$sql="SELECT DISTINCT `Employee_id` FROM `Employee` WHERE (`Employee_id` NOT IN (".$emp_not_subyearEnd.")) ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
		$connection=Yii::app()->db;
}
		
	
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
