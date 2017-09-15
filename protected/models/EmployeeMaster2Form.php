<?php

/**
 * This is the model class for table "Employee_master".
 *
 * The followings are the available columns in table 'Employee_master':
 * @property integer $id
 * @property string $Employee_id
 * @property string $Old_Employee_ID
 * @property string $Emp_fname
 * @property string $Emp_lname
 * @property string $Emp_mname
 * @property string $Permanent_address
 * @property string $city
 * @property string $state
 * @property string $Pincode
 * @property string $Basic_qualification
 * @property string $Post_graduations
 * @property string $Additional_qualification
 * @property string $Marital_status
 * @property string $No_of_dependents
 * @property string $Blood_group
 * @property string $PAN_number
 * @property string $Age_yrs
 * @property string $Age_months
 * @property string $Gender
 * @property string $Position_code
 * @property string $Designation
 * @property string $Department
 * @property string $Sub_department
 * @property string $BU
 * @property string $Cadre
 * @property string $Grade
 * @property string $company_location
 * @property string $Location_payroll_at
 * @property string $cluster_name
 * @property string $Promotion_date
 * @property string $Designation_before_promotion
 * @property string $Cadre_before_promotion
 * @property string $Previous_grade
 * @property string $Redesignation_date
 * @property string $desig_bfr_redesgn
 * @property string $cadre_before_redesignation
 * @property string $Grade_before_redesignation_grade
 * @property string $Designation_bef_promo_icgc
 * @property string $Transferred_from_loc
 * @property string $Transfer_wef_loc
 * @property string $Transferred_from_old_data
 * @property string $Transfer_old_data_wef_loc
 * @property string $Transferred_from_dept
 * @property string $Transfer_wef_dept
 * @property string $Reporting_Mgr_SAP_Code
 * @property string $Reporting_1_for_time_n_attendance
 * @property string $Reporting_1_for_appraisal
 * @property string $Reporting_officer2_id
 * @property string $Manager_manager
 * @property string $cluster_appraiser
 * @property string $retire_date
 * @property string $last_working_date
 * @property string $Attrition_period
 * @property string $Date_of_resignation
 * @property string $Reason_for_leaving
 * @property string $Exit_category
 * @property string $Remarks
 * @property string $Type_of_attrition
 * @property string $Types_of_trainee
 * @property string $Department_on_joining
 * @property string $Date_of_Training_to_confirmation
 * @property string $Actual_date_of_probation_to_Confirmation
 * @property string $After_trainee_confirmed_as_wef
 * @property string $Previous_employer
 * @property string $joining_date
 * @property string $Other_exp
 * @property string $VVF_exp
 * @property string $Total_exp
 * @property string $Due_date_for_training_to_probation
 * @property string $Actual_date_for_training_to_probation
 * @property string $Confirmation_due_date
 * @property string $Confirmation_extention_date
 * @property string $Confirmation_actual_date
 * @property string $Cost_centre_codes
 * @property string $Cost_centre_description
 * @property string $Employee_status
 */
class EmployeeMaster2Form extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Employee_master2';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            // array('Employee_id, Old_Employee_ID, Emp_fname, Emp_lname, Emp_mname, Permanent_address, city, state, Pincode, Basic_qualification, Post_graduations, Additional_qualification, Marital_status, No_of_dependents, Blood_group, PAN_number, Age_yrs, Age_months, Gender, Position_code, Designation, Department, Sub_department, BU, Cadre, Grade, company_location, Location_payroll_at, cluster_name, Promotion_date, Designation_before_promotion, Cadre_before_promotion, Previous_grade, Redesignation_date, desig_bfr_redesgn, cadre_before_redesignation, Grade_before_redesignation_grade, Designation_bef_promo_icgc, Transferred_from_loc, Transfer_wef_loc, Transferred_from_old_data, Transfer_old_data_wef_loc, Transferred_from_dept, Transfer_wef_dept, Reporting_Mgr_SAP_Code, Reporting_1_for_time_n_attendance, Reporting_1_for_appraisal, Reporting_officer2_id, Manager_manager, cluster_appraiser, retire_date, last_working_date, Attrition_period, Date_of_resignation, Reason_for_leaving, Exit_category, Remarks, Type_of_attrition, Types_of_trainee, Department_on_joining, Date_of_Training_to_confirmation, Actual_date_of_probation_to_Confirmation, After_trainee_confirmed_as_wef, Previous_employer, joining_date, Other_exp, VVF_exp, Total_exp, Due_date_for_training_to_probation, Actual_date_for_training_to_probation, Confirmation_due_date, Confirmation_extention_date, Confirmation_actual_date, Cost_centre_codes, Cost_centre_description, Employee_status', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            //array('id, Employee_id, Old_Employee_ID, Emp_fname, Emp_lname, Emp_mname, Permanent_address, city, state, Pincode, Basic_qualification, Post_graduations, Additional_qualification, Marital_status, No_of_dependents, Blood_group, PAN_number, Age_yrs, Age_months, Gender, Position_code, Designation, Department, Sub_department, BU, Cadre, Grade, company_location, Location_payroll_at, cluster_name, Promotion_date, Designation_before_promotion, Cadre_before_promotion, Previous_grade, Redesignation_date, desig_bfr_redesgn, cadre_before_redesignation, Grade_before_redesignation_grade, Designation_bef_promo_icgc, Transferred_from_loc, Transfer_wef_loc, Transferred_from_old_data, Transfer_old_data_wef_loc, Transferred_from_dept, Transfer_wef_dept, Reporting_Mgr_SAP_Code, Reporting_1_for_time_n_attendance, Reporting_1_for_appraisal, Reporting_officer2_id, Manager_manager, cluster_appraiser, retire_date, last_working_date, Attrition_period, Date_of_resignation, Reason_for_leaving, Exit_category, Remarks, Type_of_attrition, Types_of_trainee, Department_on_joining, Date_of_Training_to_confirmation, Actual_date_of_probation_to_Confirmation, After_trainee_confirmed_as_wef, Previous_employer, joining_date, Other_exp, VVF_exp, Total_exp, Due_date_for_training_to_probation, Actual_date_for_training_to_probation, Confirmation_due_date, Confirmation_extention_date, Confirmation_actual_date, Cost_centre_codes, Cost_centre_description, Employee_status', 'safe', 'on'=>'search'),
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
    function getdata()
    {
     $connection=Yii::app()->db;
     $sql = "select * from Employee_master2";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();
     return $rows;
    }
    function get_employee_data($where,$data,$list)
    {        
     $connection=Yii::app()->db;
     $sql = "select * from `Employee_master2` ".' '.$where;
               
     //print_r($sql);die();
     $command=$connection->createCommand($sql);
     for ($i=0; $i < count($list); $i++) { 
         $command->bindValue(":".$list[$i],$data[$i]);
     }
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_department_list()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `Department` from `Employee_master2`  where Department != ''";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_locwise_list()
    {
     $connection=Yii::app()->db;
     $sql = 'select * from `Employee_master2`  WHERE company_location IN ("Kolkata", "Corporate", "chennai", "kutch-II", "palanpur", "raipur")';
     
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_appraiser_list()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `Reporting_1_for_time_n_attendance` from `Employee_master2` ";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_appraiser_list_time()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `Reporting_1_for_appraisal` from `Employee_master2` ";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_appraiser_dotted()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `Reporting_officer2_id` from `Employee_master2` ";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_appraiser_mgr()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `Manager_manager` from `Employee_master2` ";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_cluster_head()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `cluster_appraiser` from `Employee_master2` ";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_designation_list()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `Designation` from `Employee_master2` where Designation != ''";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    function get_bu_list()
    {
     $connection=Yii::app()->db;
     $sql = "select distinct `BU` from `Employee_master2` where BU != ''";
     $command=$connection->createCommand($sql);
     $rows=$command->queryAll();     
     return $rows;
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'Employee_id' => 'Employee',
            'Old_Employee_ID' => 'Old Employee',
            'Emp_fname' => 'Emp Fname',
            'Emp_lname' => 'Emp Lname',
            'Emp_mname' => 'Emp Mname',
            'Permanent_address' => 'Permanent Address',
            'city' => 'City',
            'state' => 'State',
            'Pincode' => 'Pincode',
            'Basic_qualification' => 'Basic Qualification',
            'Post_graduations' => 'Post Graduations',
            'Additional_qualification' => 'Additional Qualification',
            'Marital_status' => 'Marital Status',
            'No_of_dependents' => 'No Of Dependents',
            'Blood_group' => 'Blood Group',
            'PAN_number' => 'Pan Number',
            'Age_yrs' => 'Age Yrs',
            'Age_months' => 'Age Months',
            'Gender' => 'Gender',
            'Position_code' => 'Position Code',
            'Designation' => 'Designation',
            'Department' => 'Department',
            'Sub_department' => 'Sub Department',
            'BU' => 'Bu',
            'Cadre' => 'Cadre',
            'Grade' => 'Grade',
            'company_location' => 'Company Location',
            'Location_payroll_at' => 'Location Payroll At',
            'cluster_name' => 'Cluster Name',
            'Promotion_date' => 'Promotion Date',
            'Designation_before_promotion' => 'Designation Before Promotion',
            'Cadre_before_promotion' => 'Cadre Before Promotion',
            'Previous_grade' => 'Previous Grade',
            'Redesignation_date' => 'Redesignation Date',
            'desig_bfr_redesgn' => 'Desig Bfr Redesgn',
            'cadre_before_redesignation' => 'Cadre Before Redesignation',
            'Grade_before_redesignation_grade' => 'Grade Before Redesignation Grade',
            'Designation_bef_promo_icgc' => 'Designation Bef Promo Icgc',
            'Transferred_from_loc' => 'Transferred From Loc',
            'Transfer_wef_loc' => 'Transfer Wef Loc',
            'Transferred_from_old_data' => 'Transferred From Old Data',
            'Transfer_old_data_wef_loc' => 'Transfer Old Data Wef Loc',
            'Transferred_from_dept' => 'Transferred From Dept',
            'Transfer_wef_dept' => 'Transfer Wef Dept',
            'Reporting_Mgr_SAP_Code' => 'Reporting Mgr Sap Code',
            'Reporting_1_for_time_n_attendance' => 'Reporting 1 For Time N Attendance',
            'Reporting_1_for_appraisal' => 'Reporting 1 For Appraisal',
            'Reporting_officer2_id' => 'Reporting Officer2',
            'Manager_manager' => 'Manager Manager',
            'cluster_appraiser' => 'Cluster Appraiser',
            'retire_date' => 'Retire Date',
            'last_working_date' => 'Last Working Date',
            'Attrition_period' => 'Attrition Period',
            'Date_of_resignation' => 'Date Of Resignation',
            'Reason_for_leaving' => 'Reason For Leaving',
            'Exit_category' => 'Exit Category',
            'Remarks' => 'Remarks',
            'Type_of_attrition' => 'Type Of Attrition',
            'Types_of_trainee' => 'Types Of Trainee',
            'Department_on_joining' => 'Department On Joining',
            'Date_of_Training_to_confirmation' => 'Date Of Training To Confirmation',
            'Actual_date_of_probation_to_Confirmation' => 'Actual Date Of Probation To Confirmation',
            'After_trainee_confirmed_as_wef' => 'After Trainee Confirmed As Wef',
            'Previous_employer' => 'Previous Employer',
            'joining_date' => 'Joining Date',
            'Other_exp' => 'Other Exp',
            'VVF_exp' => 'Vvf Exp',
            'Total_exp' => 'Total Exp',
            'Due_date_for_training_to_probation' => 'Due Date For Training To Probation',
            'Actual_date_for_training_to_probation' => 'Actual Date For Training To Probation',
            'Confirmation_due_date' => 'Confirmation Due Date',
            'Confirmation_extention_date' => 'Confirmation Extention Date',
            'Confirmation_actual_date' => 'Confirmation Actual Date',
            'Cost_centre_codes' => 'Cost Centre Codes',
            'Cost_centre_description' => 'Cost Centre Description',
            'Employee_status' => 'Employee Status',
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

        $criteria->compare('id',$this->id);
        $criteria->compare('Employee_id',$this->Employee_id,true);
        $criteria->compare('Old_Employee_ID',$this->Old_Employee_ID,true);
        $criteria->compare('Emp_fname',$this->Emp_fname,true);
        $criteria->compare('Emp_lname',$this->Emp_lname,true);
        $criteria->compare('Emp_mname',$this->Emp_mname,true);
        $criteria->compare('Permanent_address',$this->Permanent_address,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('state',$this->state,true);
        $criteria->compare('Pincode',$this->Pincode,true);
        $criteria->compare('Basic_qualification',$this->Basic_qualification,true);
        $criteria->compare('Post_graduations',$this->Post_graduations,true);
        $criteria->compare('Additional_qualification',$this->Additional_qualification,true);
        $criteria->compare('Marital_status',$this->Marital_status,true);
        $criteria->compare('No_of_dependents',$this->No_of_dependents,true);
        $criteria->compare('Blood_group',$this->Blood_group,true);
        $criteria->compare('PAN_number',$this->PAN_number,true);
        $criteria->compare('Age_yrs',$this->Age_yrs,true);
        $criteria->compare('Age_months',$this->Age_months,true);
        $criteria->compare('Gender',$this->Gender,true);
        $criteria->compare('Position_code',$this->Position_code,true);
        $criteria->compare('Designation',$this->Designation,true);
        $criteria->compare('Department',$this->Department,true);
        $criteria->compare('Sub_department',$this->Sub_department,true);
        $criteria->compare('BU',$this->BU,true);
        $criteria->compare('Cadre',$this->Cadre,true);
        $criteria->compare('Grade',$this->Grade,true);
        $criteria->compare('company_location',$this->company_location,true);
        $criteria->compare('Location_payroll_at',$this->Location_payroll_at,true);
        $criteria->compare('cluster_name',$this->cluster_name,true);
        $criteria->compare('Promotion_date',$this->Promotion_date,true);
        $criteria->compare('Designation_before_promotion',$this->Designation_before_promotion,true);
        $criteria->compare('Cadre_before_promotion',$this->Cadre_before_promotion,true);
        $criteria->compare('Previous_grade',$this->Previous_grade,true);
        $criteria->compare('Redesignation_date',$this->Redesignation_date,true);
        $criteria->compare('desig_bfr_redesgn',$this->desig_bfr_redesgn,true);
        $criteria->compare('cadre_before_redesignation',$this->cadre_before_redesignation,true);
        $criteria->compare('Grade_before_redesignation_grade',$this->Grade_before_redesignation_grade,true);
        $criteria->compare('Designation_bef_promo_icgc',$this->Designation_bef_promo_icgc,true);
        $criteria->compare('Transferred_from_loc',$this->Transferred_from_loc,true);
        $criteria->compare('Transfer_wef_loc',$this->Transfer_wef_loc,true);
        $criteria->compare('Transferred_from_old_data',$this->Transferred_from_old_data,true);
        $criteria->compare('Transfer_old_data_wef_loc',$this->Transfer_old_data_wef_loc,true);
        $criteria->compare('Transferred_from_dept',$this->Transferred_from_dept,true);
        $criteria->compare('Transfer_wef_dept',$this->Transfer_wef_dept,true);
        $criteria->compare('Reporting_Mgr_SAP_Code',$this->Reporting_Mgr_SAP_Code,true);
        $criteria->compare('Reporting_1_for_time_n_attendance',$this->Reporting_1_for_time_n_attendance,true);
        $criteria->compare('Reporting_1_for_appraisal',$this->Reporting_1_for_appraisal,true);
        $criteria->compare('Reporting_officer2_id',$this->Reporting_officer2_id,true);
        $criteria->compare('Manager_manager',$this->Manager_manager,true);
        $criteria->compare('cluster_appraiser',$this->cluster_appraiser,true);
        $criteria->compare('retire_date',$this->retire_date,true);
        $criteria->compare('last_working_date',$this->last_working_date,true);
        $criteria->compare('Attrition_period',$this->Attrition_period,true);
        $criteria->compare('Date_of_resignation',$this->Date_of_resignation,true);
        $criteria->compare('Reason_for_leaving',$this->Reason_for_leaving,true);
        $criteria->compare('Exit_category',$this->Exit_category,true);
        $criteria->compare('Remarks',$this->Remarks,true);
        $criteria->compare('Type_of_attrition',$this->Type_of_attrition,true);
        $criteria->compare('Types_of_trainee',$this->Types_of_trainee,true);
        $criteria->compare('Department_on_joining',$this->Department_on_joining,true);
        $criteria->compare('Date_of_Training_to_confirmation',$this->Date_of_Training_to_confirmation,true);
        $criteria->compare('Actual_date_of_probation_to_Confirmation',$this->Actual_date_of_probation_to_Confirmation,true);
        $criteria->compare('After_trainee_confirmed_as_wef',$this->After_trainee_confirmed_as_wef,true);
        $criteria->compare('Previous_employer',$this->Previous_employer,true);
        $criteria->compare('joining_date',$this->joining_date,true);
        $criteria->compare('Other_exp',$this->Other_exp,true);
        $criteria->compare('VVF_exp',$this->VVF_exp,true);
        $criteria->compare('Total_exp',$this->Total_exp,true);
        $criteria->compare('Due_date_for_training_to_probation',$this->Due_date_for_training_to_probation,true);
        $criteria->compare('Actual_date_for_training_to_probation',$this->Actual_date_for_training_to_probation,true);
        $criteria->compare('Confirmation_due_date',$this->Confirmation_due_date,true);
        $criteria->compare('Confirmation_extention_date',$this->Confirmation_extention_date,true);
        $criteria->compare('Confirmation_actual_date',$this->Confirmation_actual_date,true);
        $criteria->compare('Cost_centre_codes',$this->Cost_centre_codes,true);
        $criteria->compare('Cost_centre_description',$this->Cost_centre_description,true);
        $criteria->compare('Employee_status',$this->Employee_status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EmployeeMaster the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
