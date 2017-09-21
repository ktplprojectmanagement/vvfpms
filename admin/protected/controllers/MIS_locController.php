<?php

class MIS_locController extends Controller
{

	public function actionIndex()
	{
	    $selected_option = 'rules_for_goalsheet';
	    $this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/baseurl');
		$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/mis_loc');
		$this->render('//site/admin_footer_view');
	   
	}
	function actioncity_list()
	{
		$city_state = new StateCityForm;
		$city = '';
		$where = 'where state = :state';
		$list = array('state');
		$data = array($_POST['state_name']);
		$city_state_record = $city_state->get_city_data($where,$data,$list,'city');
		$list_data = CHtml::listData($city_state_record,'city', 'city');
		echo CHtml::dropDownList("city",'',$list_data,$htmlOptions=array('class'=>'form-control format_list city','id'=>'city'));
	}
	// function actionSave()
	// {
		
	// 	 $model=new EmployeeMaster2Form;
 // 		 $model->Emp_fname = $_POST['fname'];
	// 	 $model->Emp_lname = $_POST['lname'];
	// 	 $model->Emp_mname = $_POST['mname'];
	// 	 $model->email = $_POST['email'];
	// 	 $model->Permanent_address = $_POST['perm_add'];
	// 	 $model->Pincode = $_POST['pin'];
	// 	 $model->Basic_qualification = $_POST['quali'];
	// 	 $model->Post_graduations = $_POST['post_grad'];
	// 	 $model->Pan_number = $_POST['pan'];
	// 	 $model->aadhar_no = $_POST['aadhar_no'];
	// 	 $model->dob = $_POST['dob'];
	// 	 $model->Age_yrs = $_POST['age_yrs'];
	// 	 $model->Age_months = $_POST['age_mnt'];
	// 	 $model->state = $_POST['state'];
	// 	 $model->city = $_POST['city'];
	// 	 $model->Marital_status = $_POST['mar_stat'];
	// 	 $model->No_of_dependents = $_POST['no_of_depend'];
	// 	 $model->Blood_group = $_POST['blg_grp'];
	// 	 $model->Gender = $_POST['gender'];
	// 	 $model->Additional_qualification = $_POST['add_edu'];
	// 	 $model->Employee_id=$_POST['sap'];
	// 	 $model->u_id = $_POST['u_id'];
	// 	 $model->Old_Employee_ID='';
	// 	 $model->Position_code='';
	// 	 $model->Designation='';
	// 	 $model->Department='';
	// 	 $model->Sub_department='';
	// 	 $model->BU='';
	// 	 $model->Cadre='';
	// 	 $model->Grade='';
	// 	 $model->company_location='';
	// 	 $model->Location_payroll_at='';
	// 	 $model->cluster_name='';
	// 	 $model->Reporting_Mgr_SAP_Code='';
	// 	 $model->Reporting_1_for_time_n_attendance='';
	// 	 $model->Reporting_1_for_appraisal='';
	// 	 $model->Reporting_officer2_id='';
	// 	 $model->Manager_manager='';
	// 	 $model->cluster_appraiser='';
	// 	 $model->Types_of_trainee='';
	// 	 $model->Department_on_joining='';
	// 	 $model->Date_of_Training_to_confirmation='';
	// 	 $model->Actual_date_of_probation_to_Confirmation='';
	// 	 $model->After_trainee_confirmed_as_wef='';
	// 	 $model->Previous_employer='';
	// 	 $model->joining_date='';
	// 	 $model->Other_exp='';
	// 	 $model->VVF_exp='';
	// 	 $model->Total_exp='';
	// 	 $model->Due_date_for_training_to_probation='';
	// 	 $model->Actual_date_for_training_to_probation='';
	// 	 $model->Confirmation_due_date='';
	// 	 $model->Confirmation_extention_date='';
	// 	 $model->Confirmation_actual_date='';
	// 	 $model->Promotion_date='';
	// 	 $model->Designation_before_promotion='';
	// 	 $model->Cadre_before_promotion='';
	// 	 $model->Previous_grade='';
	// 	 $model->Redesignation_date='';
	// 	 $model->desig_bfr_redesgn='';
	// 	 $model->cadre_before_redesignation='';
	// 	 $model->Grade_before_redesignation_grade='';
	// 	 $model->Designation_bef_promo_icgc='';
	// 	 $model->Transferred_from_loc='';
	// 	 $model->Transfer_wef_loc='';
	// 	 $model->Transferred_from_old_data='';
	// 	 $model->Transfer_old_data_wef_loc='';
	// 	 $model->Transferred_from_dept='';
	// 	 $model->Transfer_wef_dept='';
	// 	 $model->retire_date='';
	// 	 $model->last_working_date='';
	// 	 $model->Attrition_period='';
	// 	 $model->Date_of_resignation='';
	// 	 $model->Reason_for_leaving='';
	// 	 $model->Exit_category='';
	// 	 $model->Remarks='';
	// 	 $model->Type_of_attrition='';
	// 	 $model->Cost_centre_codes='';
	// 	 $model->Cost_centre_description='';
	// 	 $model->Employee_status='';
	// 	// print_r($_POST['fname']);die();
	// 	//print_r($model->attributes);die();
	// 	if($model->save())
	//   	{
	//   		//print_r($model->errors);die();
	//   		print_r("Successfully Saved");die();
	//   	}
	//   	else
	//   	{
	//   		print_r("No changes done");die();
	//   	}
	// }

	function actionReprtngMgr(){
		
		$sap_id=$_POST['rep_sap'];
		
		$model=new EmployeeForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($_POST['rep_sap']);
		
		$employee_data = $model->get_employee_data($where,$data,$list);
		$reporting_nm = $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'];
		

		$where ='where email_id = :email_id';
		$list =array('email_id');
		$data = array($employee_data['0']['Reporting_officer1_id']);
		$employee_data1 = $model->get_employee_data($where,$data,$list);
		$reporting_rep = $employee_data1['0']['Emp_fname']." ".$employee_data1['0']['Emp_lname'];
		$reporting =$reporting_nm."-".$reporting_rep;
		 print_r($reporting);
		 
	}

	function actioncostCenter_change(){
		$code=$_POST['cost_center'];
		$model=new CostCenter;
		$where = 'where cost_center = :cost_center';
		$list = array('cost_center');
		$data = array($_POST['cost_center']);
		$costcenter_data = $model->get_costCenter_data($where,$data,$list);
		print_r($costcenter_data['0']['cost_center_description']);
	}

	function actionDesignation_change()
	{
		
		$cluster = new ClusterForm;
		
		$cadre =$_POST['grade'];
		//echo $cadre;die();
		$records = $cluster->get_list('grade');
		$cluster_details=$records['0']['grade'];
        $cluster1=explode(';',$cluster_details);

        $design_list=$cluster->get_list('designation');
        $emp_desg=$design_list['0']['designation'];
        $designation_list=explode(';',$emp_desg);
		
        for($i=0;$i<count($cluster1);$i++){
        	if($cluster1[$i]==$cadre){
        		$desg=explode('^', $designation_list[$i]);

        	}
        }
         echo CHtml::activeDropDownList($cluster,'designation',$desg,array('id'=>"desgn",'class'=>'form-control designation','options'=>array('selected'=>true),'empty'=>'Select')); 
         
	}

	function actionSave()
	{
		 $model=new EmployeeMaster2Form;
		 $where = 'where u_id = :u_id';
		 $list = array('u_id');
		 $data = array($_POST['u_id']);
		 $employee_data = $model->get_employee_data($where,$data,$list);


		 if(isset($employee_data)&&count($employee_data)>0){
		 	$data=array(
		 		'Emp_fname'=> $_POST['fname'],
				'Emp_lname'=> $_POST['lname'],
				'Emp_mname'=> $_POST['mname'],
				'email'=> $_POST['email'],
				'contact'=>$_POST['contact'],
				'Permanent_address'=> $_POST['perm_add'],
				'Pincode'=> $_POST['pin'],
				'Basic_qualification'=> $_POST['quali'],
				'Post_graduations'=> $_POST['post_grad'],
				'Pan_number'=> $_POST['pan'],
				'aadhar_no'=> $_POST['aadhar_no'],
				'dob'=> $_POST['dob'],
				'Age_yrs'=> $_POST['age_yrs'],
				'Age_months'=> $_POST['age_mnt'],
				'state'=> $_POST['state'],
				'city'=> $_POST['city'],
				'Marital_status'=> $_POST['mar_stat'],
				'No_of_dependents'=> $_POST['no_of_depend'],
				'Blood_group'=> $_POST['blg_grp'],
				'Gender'=> $_POST['gender'],
				'Additional_qualification'=> $_POST['add_edu'],
				'Employee_id'=>$_POST['sap'],
				'Old_Employee_ID'=>'',
		 		);
		 	$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
		 	if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		 }
		 else{
		 $model=new EmployeeMaster2Form;
		 $model->Emp_fname = $_POST['fname'];
		 $model->Emp_lname = $_POST['lname'];
		 $model->Emp_mname = $_POST['mname'];
		 $model->email = $_POST['email'];
		 $model->contact = $_POST['contact'];
		 $model->Permanent_address = $_POST['perm_add'];
		 $model->Pincode = $_POST['pin'];
		 $model->Basic_qualification = $_POST['quali'];
		 $model->Post_graduations = $_POST['post_grad'];
		 $model->Pan_number = $_POST['pan'];
		 $model->aadhar_no = $_POST['aadhar_no'];
		 $model->dob = $_POST['dob'];
		 $model->Age_yrs = $_POST['age_yrs'];
		 $model->Age_months = $_POST['age_mnt'];
		 $model->state = $_POST['state'];
		 $model->city = $_POST['city'];
		 $model->Marital_status = $_POST['mar_stat'];
		 $model->No_of_dependents = $_POST['no_of_depend'];
		 $model->Blood_group = $_POST['blg_grp'];
		 $model->Gender = $_POST['gender'];
		 $model->Additional_qualification = $_POST['add_edu'];
		 $model->Employee_id=$_POST['sap'];
		 $model->u_id = $_POST['u_id'];
		 $model->Old_Employee_ID='';
		 $model->Position_code='';
		 $model->Designation='';
		 $model->Department='';
		 $model->Sub_department='';
		 $model->BU='';
		 $model->Cadre='';
		 $model->Grade='';
		 $model->company_location='';
		 $model->Location_payroll_at='';
		 $model->cluster_name='';
		 $model->Reporting_Mgr_SAP_Code='';
		 $model->Reporting_1_for_time_n_attendance='';
		 $model->Reporting_1_for_appraisal='';
		 $model->Reporting_officer2_id='';
		 $model->Manager_manager='';
		 $model->cluster_appraiser='';
		 $model->Types_of_trainee='';
		 $model->Department_on_joining='';
		 $model->Date_of_Training_to_confirmation='';
		 $model->Actual_date_of_probation_to_Confirmation='';
		 $model->After_trainee_confirmed_as_wef='';
		 $model->Previous_employer='';
		 $model->joining_date='';
		 $model->Other_exp='';
		 $model->VVF_exp='';
		 $model->Total_exp='';
		 $model->Due_date_for_training_to_probation='';
		 $model->Actual_date_for_training_to_probation='';
		 $model->Confirmation_due_date='';
		 $model->Confirmation_extention_date='';
		 $model->Confirmation_actual_date='';
		 $model->Promotion_date='';
		 $model->Designation_before_promotion='';
		 $model->Cadre_before_promotion='';
		 $model->Previous_grade='';
		 $model->Redesignation_date='';
		 $model->desig_bfr_redesgn='';
		 $model->cadre_before_redesignation='';
		 $model->Grade_before_redesignation_grade='';
		 $model->Designation_bef_promo_icgc='';
		 $model->Transferred_from_loc='';
		 $model->Transfer_wef_loc='';
		 $model->Transferred_from_old_data='';
		 $model->Transfer_old_data_wef_loc='';
		 $model->Transferred_from_dept='';
		 $model->Transfer_wef_dept='';
		 $model->retire_date='';
		 $model->last_working_date='';
		 $model->Attrition_period='';
		 $model->Date_of_resignation='';
		 $model->Reason_for_leaving='';
		 $model->Exit_category='';
		 $model->Remarks='';
		 $model->Type_of_attrition='';
		 $model->Cost_centre_codes='';
		 $model->Cost_centre_description='';
		 $model->Employee_status='';
		//print_r($model->attributes);die();
		if($model->save())
	  	{
	  		//print_r($model->errors);die();

	  		print_r("Successfully Saved");die();

	  	}
	  	else
	  	{
	  		print_r("No changes done");die();
	  	}
	}
		 
	}


	function actiongenrl_info(){
		//echo $_POST['u_id'];die();
		$data=array(
			  'Position_code'=>$_POST['pos_code'],
			  'Designation'=>$_POST['desgn'],
			  'Department'=>$_POST['dept'],
			  'Sub_department'=>$_POST['sub_dept'],
			  'BU'=>$_POST['bu'],
			  'Cadre'=>$_POST['cadre'],
			  'Grade'=>$_POST['grade'],
			  'company_location'=>$_POST['loc_work'],
			  'Location_payroll_at'=>$_POST['loc_pay'],
			  'cluster_name'=>$_POST['cluster'],
			);
		//print_r($data);die();
			$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
			//print_r($data);die();
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
	}

	function actionreport_info(){
		$data=array(
			'Reporting_Mgr_SAP_Code'=>$_POST['report_mgr_sap'],
			'Reporting_1_for_time_n_attendance'=>$_POST['rep1_attd'],
			'Reporting_1_for_appraisal'=>$_POST['rep1_appr'],
			'Reporting_officer2_id'=>$_POST['dot_mgr'],
			'Manager_manager'=>$_POST['mgr_mgr'],
			'cluster_appraiser'=>$_POST['clust_hd'],
			);
		//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
		
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
	}
	function actionjoin_details(){
		//echo $_POST['trainee'];die();
		$data = array(
			'Types_of_trainee'=>$_POST['trainee'],
			'Department_on_joining'=>$_POST['trn_dept'],
			'Date_of_Training_to_confirmation'=>$_POST['date_confrm_trn'],
			'Actual_date_of_probation_to_Confirmation'=>$_POST['date_confrm_prob'],
			'After_trainee_confirmed_as_wef'=>$_POST['aftr_trn_confrm'],
			'Previous_employer'=>$_POST['prev_emplyr'],
			'joining_date'=>$_POST['doj_vvf'],
			'Other_exp'=>$_POST['othr_exp'],
			'VVF_exp'=>$_POST['vvf_exp'],
			'Total_exp'=>$_POST['tot_exp'],
			'Due_date_for_training_to_probation'=>$_POST['due_date_trn_prob'],
			'Actual_date_for_training_to_probation'=>$_POST['act_date_trn_prob'],
			'Confirmation_due_date'=>$_POST['confirm_due_date'],
			'Confirmation_extention_date'=>$_POST['confrm_extn_dt'],
			'Confirmation_actual_date'=>$_POST['confrm_actl_dt'],
		);
		//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
		
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
	}

	function actionpromo_details(){
		$data = array(
			'Promotion_date'=>$_POST['promo_dt'],
			'Designation_before_promotion'=>$_POST['desgn_bfr_promo'],
			'Cadre_before_promotion'=>$_POST['cdre_bfr_promo'],
			'Previous_grade'=>$_POST['prev_cadre'],
			'Redesignation_date'=>$_POST['redesgn_dt'],
			'desig_bfr_redesgn'=>$_POST['desg_bfr_redesgn'],
			'cadre_before_redesignation'=>$_POST['cdr_bfr_redesgn'],
			'Grade_before_redesignation_grade'=>$_POST['grd_bfr_redgn'],
			'Designation_bef_promo_icgc'=>$_POST['desgn_bfr_promo'],
		);
		//print_r($data);die();
		//$_POST['u_id']
		$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
		
		//echo $update;die();
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
	}
	function actiontrans_details(){
		//echo "hi";die();
		$data = array(
			'Transferred_from_loc'=>$_POST['trnsfr_frm_loc'],
			'Transfer_wef_loc'=>$_POST['tranr_wef_loc'],
			'Transferred_from_old_data'=>$_POST['transfr_frm_old_data_loc'],
			'Transfer_old_data_wef_loc'=>$_POST['transfr_old_data_wef_loc'],
			'Transferred_from_dept'=>$_POST['transfr_frm_dept'],
			'Transfer_wef_dept'=>$_POST['tranr_wef_dept'],
			);
		//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
		
		
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
	}
	function actionleave_details(){
		//echo "hi";die();
		$data = array(
			//'retire_date'=>$_POST['dt_retire'],
			 'last_working_date'=>$_POST['lst_wrk_dt'],
			 'Attrition_period'=>$_POST['arrt_prd'],
			 'Date_of_resignation'=>$_POST['redesign_dt'],
			  'Reason_for_leaving'=>$_POST['reasn_leave'],
			 'Exit_category'=>$_POST['ext_cat'],
			'Remarks'=>$_POST['remark'],
			'Type_of_attrition'=>$_POST['attr_type'],
			);
			//print_r($data);die();
			$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
	}
	function actionother_details(){
		$data = array(
			'Cost_centre_codes'=>$_POST['cost_center'],
			'Cost_centre_description'=>$_POST['cost_cenr_descr'],
			'Employee_status'=>$_POST['emp_sta'],
			);
		//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
		
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		}

	function actionEmployee_list(){

		$model=new EmployeeMaster1Form;
		$loc=Yii::app()->user->getState('admin_location');
		if($loc=="Corporate"){
		$data=$model->get_locwise_list();
		}
		else{
		$where = 'where	company_location = :company_location';
		$list = array('company_location');
		$data = array($loc);
		$data = $model->get_employee_data($where,$data,$list);
		}
		
		//$data = $model->getdata();
		$selected_option = 'employee_master1';
		$this->render('//site/script_file');
		$this->render('//site/baseurl');
		$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/employee_details_loc',array('model'=>$data));

		$this->render('//site/admin_footer_view');
	}


	function actionMis_update($u_id = null){
		$model=new EmployeeMaster1Form;
		$reporting_list = new ClusterForm();
                
		$notification_data=new NotificationsForm;
		$id = $u_id;
//print_r($id);die();
		$where = 'where u_id = :u_id';
		$list = array('u_id');
		$data = array($id);
		$employee_data = $model->get_employee_data($where,$data,$list);
		

		//echo $id;die();
		$selected_option = 'rules_for_goalsheet';
	    $this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/baseurl');
		$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/mis_update_loc',array('employee_data'=>$employee_data));
		$this->render('//site/admin_footer_view');
	}
	function actionSave_loc()
	{
		//echo "hi";die();
		//print_r($_POST['cluster']);die();
		 $model=new EmployeeMaster2Form;
		 $where = 'where u_id = :u_id';
		 $list = array('u_id');
		 $data = array($_POST['u_id']);
		 $employee_data = $model->get_employee_data($where,$data,$list);
		// print_r($employee_data);die();	
		 if(isset($employee_data) && count($employee_data)>0){
		 	//echo $_POST['clust_hd'];die();
		 	$data=array(
				'Emp_fname'=> $_POST['fname'],
				'Emp_lname'=> $_POST['lname'],
				'Emp_mname'=> $_POST['mname'],
				'email'=> $_POST['email'],
				'contact'=>$_POST['contact'],
				'Permanent_address'=> $_POST['perm_add'],
				'Pincode'=> $_POST['pin'],
				'Basic_qualification'=> $_POST['quali'],
				'Post_graduations'=> $_POST['post_grad'],
				'Pan_number'=> $_POST['pan'],
				'aadhar_no'=> $_POST['aadhar_no'],
				'dob'=> $_POST['dob'],
				'Age_yrs'=> $_POST['age_yrs'],
				'Age_months'=> $_POST['age_mnt'],
				'state'=> $_POST['state'],
				'city'=> $_POST['city'],
				'Marital_status'=> $_POST['mar_stat'],
				'No_of_dependents'=> $_POST['no_of_depend'],
				'Blood_group'=> $_POST['blg_grp'],
				'Gender'=> $_POST['gender'],
				'Additional_qualification'=> $_POST['add_edu'],
				'Employee_id'=>$_POST['sap'],
				'Old_Employee_ID'=>'',
				'Position_code'=>$_POST['pos_code'],
				'Designation'=>$_POST['desgn'],
				'Department'=>$_POST['dept'],
				'Sub_department'=>$_POST['sub_dept'],
				'BU'=>$_POST['bu'],
				'Cadre'=>$_POST['cadre'],
				'Grade'=>$_POST['grade'],
				'company_location'=>$_POST['loc_work'],
				'Location_payroll_at'=>$_POST['loc_pay'],
				'cluster_name'=>$_POST['cluster'],
				'Reporting_Mgr_SAP_Code'=>$_POST['report_mgr_sap'],
				'Reporting_1_for_time_n_attendance'=>$_POST['rep1_attd'],
				'Reporting_1_for_appraisal'=>$_POST['rep1_appr'],
				'Reporting_officer2_id'=>$_POST['dot_mgr'],
				'Manager_manager'=>$_POST['mgr_mgr'],
				'cluster_appraiser'=>$_POST['clust_hd'],
				'Types_of_trainee'=>$_POST['trainee'],
				'Department_on_joining'=>$_POST['trn_dept'],
				'Date_of_Training_to_confirmation'=>$_POST['date_confrm_trn'],
				'Actual_date_of_probation_to_Confirmation'=>$_POST['date_confrm_prob'],
				'After_trainee_confirmed_as_wef'=>$_POST['aftr_trn_confrm'],
				'Previous_employer'=>$_POST['prev_emplyr'],
				'joining_date'=>$_POST['doj_vvf'],
				'Other_exp'=>$_POST['othr_exp'],
				'VVF_exp'=>$_POST['vvf_exp'],
				'Total_exp'=>$_POST['tot_exp'],
				'Due_date_for_training_to_probation'=>$_POST['due_date_trn_prob'],
				'Actual_date_for_training_to_probation'=>$_POST['act_date_trn_prob'],
				'Confirmation_due_date'=>$_POST['confirm_due_date'],
				'Confirmation_extention_date'=>$_POST['confrm_extn_dt'],
				'Confirmation_actual_date'=>$_POST['confrm_actl_dt'],
				'Transferred_from_loc'=>$_POST['trnsfr_frm_loc'],
				'Transfer_wef_loc'=>$_POST['tranr_wef_loc'],
				'Transferred_from_old_data'=>$_POST['transfr_frm_old_data_loc'],
				'Transfer_old_data_wef_loc'=>$_POST['transfr_old_data_wef_loc'],
				'Transferred_from_dept'=>$_POST['transfr_frm_dept'],
				'Transfer_wef_dept'=>$_POST['tranr_wef_dept'],
				'retire_date'=>$_POST['dt_retire'],
				'last_working_date'=>$_POST['lst_wrk_dt'],
				'Attrition_period'=>$_POST['arrt_prd'],
				'Date_of_resignation'=>$_POST['redesign_dt'],
				'Reason_for_leaving'=>$_POST['reasn_leave'],
				'Exit_category'=>$_POST['ext_cat'],
				'Remarks'=>$_POST['remark'],
				'Type_of_attrition'=>$_POST['attr_type'],
				'Cost_centre_codes'=>$_POST['cost_center'],
				'Cost_centre_description'=>$_POST['cost_cenr_descr'],
				'Employee_status'=>$_POST['emp_sta'],
			);
			//print_r($data);die();
			$update = Yii::app()->db->createCommand()->update('Employee_master2',$data,'u_id=:u_id',array(':u_id'=>$_POST['u_id']));
			
			$model = new Employee1Form;
			$data=array(

					'u_id'=>$_POST['u_id']
				);
			$command = Yii::app()->db->createCommand();
			$query_result = $command->delete('Employee_master2', 'u_id=:u_id', array(':u_id'=>$_POST['u_id']));
			if ($query_result) {
				print_r($query_result);
			}
			if($update>0)
		  	{
		  		echo "Successfully Saved";die();	
		  	}
		  	else
		  	{
		  		print_r("No changes done");die();
		  	}
		 }
		 
		 else{
		 $model=new EmployeeMaster2Form;
		 $model->Emp_fname = $_POST['fname'];
		 $model->Emp_lname = $_POST['lname'];
		 $model->Emp_mname = $_POST['mname'];
		 $model->email = $_POST['email'];
		 $model->contact = $_POST['contact'];
		 $model->Permanent_address = $_POST['perm_add'];
		 $model->Pincode = $_POST['pin'];
		 $model->Basic_qualification = $_POST['quali'];
		 $model->Post_graduations = $_POST['post_grad'];
		 $model->Pan_number = $_POST['pan'];
		 $model->aadhar_no = $_POST['aadhar_no'];
		 $model->dob = $_POST['dob'];
		 $model->Age_yrs = $_POST['age_yrs'];
		 $model->Age_months = $_POST['age_mnt'];
		 $model->state = $_POST['state'];
		 $model->city = $_POST['city'];
		 $model->Marital_status = $_POST['mar_stat'];
		 $model->No_of_dependents = $_POST['no_of_depend'];
		 $model->Blood_group = $_POST['blg_grp'];
		 $model->Gender = $_POST['gender'];
		 $model->Additional_qualification = $_POST['add_edu'];
		 $model->Employee_id=$_POST['sap'];
		 $model->u_id = $_POST['u_id'];
		 $model->Old_Employee_ID='';
		 $model->Position_code=$_POST['pos_code'];
		 $model->Designation=$_POST['desgn'];
		 $model->Department=$_POST['dept'];
		 $model->Sub_department=$_POST['sub_dept'];
		 $model->BU=$_POST['bu'];
		 $model->Cadre=$_POST['cadre'];
		 $model->Grade=$_POST['grade'];
		 $model->company_location=$_POST['loc_work'];
		 $model->Location_payroll_at=$_POST['loc_pay'];
		 $model->cluster_name=$_POST['cluster'];
		 $model->Reporting_Mgr_SAP_Code=$_POST['report_mgr_sap'];
		 $model->Reporting_1_for_time_n_attendance=$_POST['rep1_attd'];
		 $model->Reporting_1_for_appraisal=$_POST['rep1_appr'];
		 $model->Reporting_officer2_id=$_POST['dot_mgr'];
		 $model->Manager_manager=$_POST['mgr_mgr'];
		 $model->cluster_appraiser=$_POST['clust_hd'];
		 $model->Types_of_trainee=$_POST['trainee'];
		 $model->Department_on_joining=$_POST['trn_dept'];
		 $model->Date_of_Training_to_confirmation=$_POST['date_confrm_trn'];
		 $model->Actual_date_of_probation_to_Confirmation=$_POST['date_confrm_prob'];
		 $model->After_trainee_confirmed_as_wef=$_POST['aftr_trn_confrm'];
		 $model->Previous_employer=$_POST['prev_emplyr'];
		 $model->joining_date=$_POST['doj_vvf'];
		 $model->Other_exp=$_POST['othr_exp'];
		 $model->VVF_exp=$_POST['vvf_exp'];
		 $model->Total_exp=$_POST['tot_exp'];
		 $model->Due_date_for_training_to_probation=$_POST['due_date_trn_prob'];
		 $model->Actual_date_for_training_to_probation=$_POST['act_date_trn_prob'];
		 $model->Confirmation_due_date=$_POST['confirm_due_date'];
		 $model->Confirmation_extention_date=$_POST['confrm_extn_dt'];
		 $model->Confirmation_actual_date=$_POST['confrm_actl_dt'];
		 $model->Promotion_date='';
		 $model->Designation_before_promotion='';
		 $model->Cadre_before_promotion='';
		 $model->Previous_grade='';
		 $model->Redesignation_date='';
		 $model->desig_bfr_redesgn='';
		 $model->cadre_before_redesignation='';
		 $model->Grade_before_redesignation_grade='';
		 $model->Designation_bef_promo_icgc='';
		 $model->Transferred_from_loc=$_POST['trnsfr_frm_loc'];
		 $model->Transfer_wef_loc=$_POST['tranr_wef_loc'];
		 $model->Transferred_from_old_data=$_POST['transfr_frm_old_data_loc'];
		 $model->Transfer_old_data_wef_loc=$_POST['transfr_old_data_wef_loc'];
		 $model->Transferred_from_dept=$_POST['transfr_frm_dept'];
		 $model->Transfer_wef_dept=$_POST['tranr_wef_dept'];
		 $model->retire_date=$_POST['dt_retire'];
		 $model->last_working_date=$_POST['lst_wrk_dt'];
		 $model->Attrition_period=$_POST['arrt_prd'];
		 $model->Date_of_resignation=$_POST['redesign_dt'];
		 $model->Reason_for_leaving=$_POST['reasn_leave'];
		 $model->Exit_category=$_POST['ext_cat'];
		 $model->Remarks=$_POST['remark'];
		 $model->Type_of_attrition=$_POST['attr_type'];
		 $model->Cost_centre_codes=$_POST['cost_center'];
		 $model->Cost_centre_description=$_POST['cost_cenr_descr'];
		 $model->Employee_status=$_POST['emp_sta'];
		 
		if($model->save())
	  	{
	  		
	  		print_r("Successfully Saved");die();

	  	}
	  	else
	  	{
	  		print_r("No changes done");die();
	  	}

		 }
		 
	}



		function actionlocation_submit()
{
	echo"hiiiiiiiiiiiiiii";die();
		IsSMTP();
		$mailer->IsHTML(true);
		$mailer->SMTPAuth = true;
		$mailer->SMTPSecure = "ssl";
		$mailer->Host = "smtp.gmail.com";
		$mailer->Port = 465;
		$mailer->Username = "demo.appraisel@gmail.com";
		$mailer->Password = "appraisel@123";
		$mailer->From = "employee.kritva@gmail.com";
		$mailer->FromName = "Test";
		$mailer->AddAddress("employee.kritva@gmail.com");
		$mailer->Subject = "Someone sent you an email.";
		$mailer->Body = "Hi, This is just a test email using PHP Mailer and Yii Framework.";
		if (!$mailer->Send())
		{
		    echo "Message sent successfully!";
		}
		else 
		{
		    echo "Fail to send your message!";
		}
}

}

?>