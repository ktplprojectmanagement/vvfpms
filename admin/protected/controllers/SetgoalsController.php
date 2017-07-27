<?php

class SetgoalsController extends Controller
{
	public $the_id = "";
	public function actionIndex()
	{
		$date = date('d/m/Y');
		$date = str_replace('/', '-', $date);
		$model=new KPIStructureForm;
		$model1=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$emploee_data =new EmployeeForm;
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list);
		$KRA_category = '';$prg_cnt = 0;
		$Employee_id = Yii::app()->user->getState("Employee_id");	
               $get_idp_data =new IDPForm;
$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$program_data_detail = $get_idp_data->get_idp_data($where,$data,$list);
if(isset($program_data_detail) && count($program_data_detail)>0)
{
$prg_cnt = 1;
}
//print_r($prg_cnt);die();
	
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id and kra_complete_flag = :kra_complete_flag';
		$list = array('Employee_id','kra_complete_flag');
		$data = array($Employee_id,'0');
		$kpi_data = $model->get_kpi_list($where,$data,$list);

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$emp_data = $emploee_data->get_employee_data($where,$data,$list);

		if (count($settings_data)>0) {
        	$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,$settings_data['0']['setting_type']);
			$kpi_data_saved = $model1->get_kpi_list($where,$data,$list);
		}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,date('Y'));
				$kpi_data_saved = $model1->get_kpi_list($where,$data,$list);
		}

		if (count($kpi_data)>0) {
		$where = 'where KRA_category = :KRA_category';
		$list = array('KRA_category');
		$data = array($kpi_data['0']['KRA_category']);
		$KRA_category = $kra->get_kra_data($where,$data,$list);
		}	
		$kra_types_array = '';$data = '';
		
		$selected_option = 'Goals';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$this->render('//site/set_goal_auto_save',array('model'=>$model,'kra_list'=>$kra_types,'kpi_auto_data'=>$kpi_data,'KRA_category_auto'=>$KRA_category,'kpi_data'=>$kpi_data_saved,'emp_data'=>$emp_data,'prg_cnt'=>$prg_cnt));
		$this->render('//site/footer_view_layout');
		
	}

	function actionapprovegoal_list()
	{
		Yii::app()->user->setState('emp_id1','');
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$id = Yii::app()->user->getState("employee_email");
		$where = 'where appraisal_id1 = :appraisal_id1 and KRA_status != :KRA_status GROUP BY Employee_id';
		$list = array('appraisal_id1','KRA_status');
		$data = array($id,'');
		$kpi_data = $model->get_emp_id_list($where,$data,$list);
		$where = 'where appraisal_id1 = :appraisal_id1 and KRA_status != :KRA_status GROUP BY Employee_id';
		$list = array('appraisal_id1','KRA_status');
		$data = array($id,'');
		$kpi_data1 = $model->get_kpi_data($where,$data,$list);
		$kpi_data_count = '';
		if (count($kpi_data)>0) {
			$kpi_data_count = $kpi_data;
		}
		else
		{
			$kpi_data_count = '';
		}
		$cnt = 0;$emp_count = 0;$employee_data = '';	
		
		if (isset($kpi_data) && count($kpi_data)>0) {
				foreach ($kpi_data as $row) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($row['Employee_id']);
				$employee_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
				$cnt++;
			}
			
		}
//print_r($employee_data);die();
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout');
		$this->render('//site/goal_list_view',array('kpi_data'=>$kpi_data,'kpi_data1'=>$kpi_data1,'employee_data'=>$employee_data,'approved_list'=>'approved_list'));
		$this->render('//site/footer_view_layout');
	}

	function actionkpi_list()
	{
		$model=new KpiListForm;
		$result = $model->get_seach($_POST['emp_dept_name'],$_POST['kpi_value']);
		if (count($result)>0) {
			$cnt = 0;
			foreach ($result as $row) {
			echo '<div style="border: 1px solid rgb(177, 178, 178);padding: 5px;cursor: pointer;" id="list_'.$cnt.'" class="listdata">'.$row['kpi_name'].'</div>';
			$cnt++;
			}
		}
	}

	function actiongettarget_value()
	{	
		$kra=new KRAStructureForm;
		if (isset($_POST['kra_category'])) {
			$kra->KRA_category = $_POST['kra_category'];
			$where = 'where KRA_category = :KRA_category';
			$list = array('KRA_category');
			$data = array($_POST['kra_category']);
			$result = $kra->get_kra_data($where,$data,$list); 
			$record = '';
			$format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value(In Lakh)','Percentage' => 'Percentage','Text' => 'Text');
			for ($i=0; $i < $result['0']['No_of_KPI']; $i++) { 
				if($record == '')
				{
					$record = '<tr><td id="kpilist_'.$i.'"  style="width: 10px;">
                        <input type="text" class="form-control kpi_list validate_field"  style="display: none">'.CHtml::textField('kpi_list','',array('class'=>'form-control kpi_list pophover validate_field','id'=>'kpilistyii_'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','style'=>'width: 326px;')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;height: auto;max-height: 200px;overflow-y: scroll;"></div></td><td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i)).'</td><td>'.CHtml::textField('kpi_target_value','',array('class'=>'form-control validate_field','id'=>'kpi_target_value-'.$i)).'</td><td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control value_field validate_field','id'=>'unit_value-'.$i.'','data-placement'=>'bottom')).'</td><td>'.CHtml::textField('','',array('class'=>'form-control fields input_custom_date pophover validate_field target_value1'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control pophover validate_field fields target_value2'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control pophover validate_field fields target_value3'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control validate_field fields pophover target_value4'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control pophover validate_field fields target_value5'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td></tr>';
				}
				else
				{
					$record = $record.'<tr><td id="kpilist_'.$i.'"  style="width: 10px;">
                        <input type="text" class="form-control kpi_list validate_field"  style="display: none">'.CHtml::textField('kpi_list','',array('class'=>'form-control kpi_list pophover validate_field','id'=>'kpilistyii_'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','style'=>'width: 326px;')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;height: auto;max-height: 200px;overflow-y: scroll;"></div></td><td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i)).'</td><td>'.CHtml::textField('kpi_target_value','',array('class'=>'form-control validate_field','id'=>'kpi_target_value-'.$i)).'</td><td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control validate_field value_field','id'=>'unit_value-'.$i.'','data-placement'=>'bottom')).'</td><td>'.CHtml::textField('','',array('class'=>'form-control validate_field fields pophover input_custom_date target_value1'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control fields pophover validate_field target_value2'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control pophover validate_field fields target_value3'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control validate_field pophover fields target_value4'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control pophover validate_field fields target_value5'.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td></tr>';
				}
				
			}
			$result_data = array();
			$result_data[0] = '<table class="table table-striped table-bordered table-hover" id="sample_1">
			<thead><tr style="background-color: rgb(238, 241, 245);"><th style="text-align: center;" rowspan=2>
                                                               Key Performance Indicator (KPI) description
                                                             </th>
                                                             <th  style="text-align: center;" rowspan=2>
                                                                Unit
                                                             </th>
                                                              <th style="text-align: center;" rowspan=2>
                                                                KPI Weightage</th>
                                                           <th  rowspan=2>
                                                                Value</th>
                                                              <th style="text-align: center;" rowspan=2>
                                                                (1)<br>Unsatisfactory <br>Performance</th>
                                                              <th style="text-align: center;" rowspan=2>
                                                                (2)<br>Needs<br>Improvement</th>
                                                              <th style="text-align: center;" rowspan=2>
                                                                (3)<br>Good Solid <br>Performance</th>
                                                             <th style="text-align: center;" rowspan=2>
                                                                (4)<br>Superior <br>Performance</th>
                                                              <th style="text-align: center;" rowspan=2>
                                                                (5)<br>Outstanding <br>Performance</th></tr></thead>
                                                                <tbody>'.$record.'</tbody></table>';
			$result_data[1] = $result['0']['No_of_KPI'];
			$result_data[2] = $result['0']['minimum_kpi'];
			$result_data[3] = $result['0']['maximum_kpi'];
			$result_data[4] = $result['0']['TargetList'];			
			echo json_encode($result_data);
		}
	}

function actiongettarget_value1()
	{	
		$kra=new KRAStructureForm;
		if (isset($_POST['kra_category'])) {
			$kra->KRA_category = $_POST['kra_category'];
			$where = 'where KRA_category = :KRA_category';
			$list = array('KRA_category');
			$data = array($_POST['kra_category']);
			$result = $kra->get_kra_data($where,$data,$list); 
			//print_r($result);die();
			$record = '';
			$format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value(In Lakh)','Percentage' => 'Percentage','Text' => 'Text');
			$total_value = $result['0']['No_of_KPI']-$_POST['kpi_last_id'];
			$total_value1 = $_POST['extra_kpi']+$_POST['kpi_last_id'];
			
                        if($_POST['extra_kpi']<=$total_value)
			{
				$i=$_POST['kpi_last_id'];
$record = '<td id="kpilist_'.$_POST['kra_id'].$i.'"  style="width: 245px;">
                        <input type="text" class="form-control kpi_list validate_field1"  style="display: none">'.CHtml::textField('kpi_list','',array('class'=>'form-control kpi_list validate_field1','id'=>'kpilistyii_'.$_POST['kra_id'].$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'<div id="kpi_list_drop_'.$_POST['kra_id'].$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;height: auto;max-height: 200px;overflow-y: scroll;"></div></td><td>'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$_POST['kra_id'].$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td><td style="width: 160px;">'.CHtml::textField('kpi_target_value','',array('class'=>'form-control validate_field','id'=>'kpi_target_value-'.$_POST['kra_id'].$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td><td id="value_field" style="width: 146px;">'.CHtml::textField('unit_value','',array('class'=>'form-control value_field validate_field1','id'=>'unit_value-'.$_POST['kra_id'].$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td><td>'.CHtml::textField('','',array('class'=>'form-control fields input_custom_date validate_field1 target_value1'.$_POST['kra_id'].$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control validate_field1 fields target_value2'.$_POST['kra_id'].$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control validate_field1 fields target_value3'.$_POST['kra_id'].$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control validate_field1 fields target_value4'.$_POST['kra_id'].$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td>'.CHtml::textField('','',array('class'=>'form-control validate_field1 fields target_value5'.$_POST['kra_id'].$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','disabled' => true)).'</td><td><i class="fa fa-trash-o del_kra_kpi_extra" id="del_kra_kpi_extra-'.$_POST["kra_id"].$i.'" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" title="Delete" aria-hidden="true"></i></td>';
			}
			else
			{
				$record = '<lable style="color:red">'."Maximum ".$result['0']['No_of_KPI']." KPI are allowed to add.".'</lable>';
			}
			//print_r($_POST['kpi_last_id']);
			$result_data = array();
			$result_data[0] = $record;
			$result_data[1] = $total_value1;
			// $result_data[2] = $result['0']['minimum_kpi'];
			// $result_data[3] = $result['0']['maximum_kpi'];
			// $result_data[4] = $result['0']['TargetList'];			
			echo json_encode($result_data);
		}
	}

	function actionsave_kpi()
	{
		$model=new KPIStructureForm;
		
		$where = 'where id = :id';
		$list = array('id');
		$data = array(Yii::app()->user->getState("KPI_id"));
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		if (Yii::app()->user->getState("KPI_id")!=''){
			$id_value = Yii::app()->user->getState("KPI_id");
					$data1 = array(
					'KPI_id' => $kpi_data['0']['KPI_id'], 
					'target' => $_POST['target'], 
					'target_value1' => $_POST['target_value1'], 
					'KPI_target_value' => $_POST['KPI_target_value'],
					'target_unit' => $_POST['target_unit'], 
					'KRA_category' => $_POST['KRA_category'], 
					'KRA_description' => $_POST['KRA_description'], 
					'kpi_list' => $_POST['kpi_list'], 
					'KRA_date' => date('Y-m-d'), 
					
				);
				
				$update = Yii::app()->db->createCommand()->update('KPI_structure',$data1,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data['0']['KPI_id']));
				if($update==1)
				{
					if ($_POST['kra_complete_flag'] == 1) {
						$emp_id = Yii::app()->user->getState("Employee_id");
						$query_result = Yii::app()->db->createCommand()->delete('KPI_structure', 'kra_complete_flag=:kra_complete_flag and Employee_id=:Employee_id', array(':kra_complete_flag'=>1,':Employee_id'=>$emp_id));
						Yii::app()->user->setState('KPI_id','');
							if (Yii::app()->user->getState("KPI_id") == '') {
								print_r("Success");
							}
						}
						else
						{
							print_r("Success");
						}
				}
		}
		else
		{
			
			$connection = Yii::app()->db;
			$sql = 'INSERT INTO KPI_structure(KPI_id, target, target_value1, KPI_target_value,target_unit,KRA_category,KRA_description,kpi_list,KRA_date,KRA_status,appraisal_id1,Employee_id,kra_complete_flag) VALUES(:KPI_id, :target, :target_value1, :KPI_target_value,:target_unit,:KRA_category,:KRA_description,:kpi_list,:KRA_date,:KRA_status,:appraisal_id1,:Employee_id,:kra_complete_flag)';
			$command=$connection->createCommand($sql);
			$command->bindValue(':KPI_id', $_POST['kpi_id_value'], PDO::PARAM_STR);
			$command->bindValue(':target', $_POST['target'], PDO::PARAM_STR);
			$command->bindValue(':target_value1',$_POST['target_value1'], PDO::PARAM_STR);
			$command->bindValue(':KPI_target_value',$_POST['KPI_target_value'], PDO::PARAM_STR);
			$command->bindValue(':target_unit', $_POST['target_unit'], PDO::PARAM_STR);
			$command->bindValue(':KRA_category', $_POST['KRA_category'], PDO::PARAM_STR);
			$command->bindValue(':KRA_description',$_POST['KRA_description'], PDO::PARAM_STR);
			$command->bindValue(':kpi_list',$_POST['kpi_list'], PDO::PARAM_STR);
			$command->bindValue(':KRA_date', date('Y-m-d'), PDO::PARAM_STR);
			$command->bindValue(':KRA_status',"Pending", PDO::PARAM_STR);
			$command->bindValue(':appraisal_id1',Yii::app()->user->getState("appriaser_1"), PDO::PARAM_STR);
			$command->bindValue(':Employee_id',Yii::app()->user->getState("Employee_id"), PDO::PARAM_STR);
			$command->bindValue(':kra_complete_flag',$_POST['kra_complete_flag'], PDO::PARAM_STR);
			if($command->execute())
			{
				$this->the_id = Yii::app()->db->getLastInsertID();
				Yii::app()->user->setState('KPI_id',$this->the_id);
			if ($_POST['kra_complete_flag'] == 1) {
						$emp_id = Yii::app()->user->getState("Employee_id");
						$query_result = Yii::app()->db->createCommand()->delete('KPI_structure', 'kra_complete_flag=:kra_complete_flag and Employee_id=:Employee_id', array(':kra_complete_flag'=>1,':Employee_id'=>$emp_id));
						Yii::app()->user->setState('KPI_id','');
							if (Yii::app()->user->getState("KPI_id") == '') {
								print_r("Success");
							}
						}
						else
						{
							print_r("Success");
						}

			}
			else
			{
				print_r("error occured");die();
			}
		}
	}

	function actionkpivalue()
	{
		$model=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");	
		$KPI_id = $_POST['kra_id'];	
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id and KPI_id = :KPI_id';
		$list = array('Employee_id','KPI_id');
		$data = array($Employee_id,$KPI_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		//print_r($_POST['kra_id']);die();

		if (isset($kpi_data) && isset($kpi_data['0']['target_value1']) && count($kpi_data)>0) {
			$target_value1 = $kpi_data['0']['target_value1'];
			$target_value = explode(';',$target_value1);
			$target_unit1 = $kpi_data['0']['target_unit'];
			$target_unit = explode(';',$target_unit1);
			
			for ($i=0; $i < count($target_value); $i++) { 
				if ($i == $_POST['last_id_value1']) {					
					if ($target_unit[$i] == 'Units' || $target_unit[$i] == 'Weight' || $target_unit[$i] == 'Value' || $target_unit[$i] == 'Weight') {
						//print_r($target_value[$i]);die();
							if ($_POST['current_date']<=round($target_value[$i]*0.69,2)) {
									echo '1';die();
								}
								else if($_POST['current_date']>round($target_value[$i]*0.69,2) && $_POST['current_date']<=round($target_value[$i]*0.70,2))
								{
									echo '2';die();
								}
								else if($_POST['current_date']>round($target_value[$i]*0.70,2) && $_POST['current_date']<=round($target_value[$i]*0.96,2))
								{
									echo '3';die();
								}
								else if($_POST['current_date']>round($target_value[$i]*0.96,2) && $_POST['current_date']<=round($target_value[$i]*1.06,2))
								{
									echo '4';die();
								}
								else if($_POST['current_date']>round($target_value[$i]*1.06,2))
								{
									echo '5';die();
								}							
					}
					else if ($target_unit[$i] != 'Units' || $target_unit[$i] != 'Weight' || $target_unit[$i] != 'Value')
					{
						$list_data = explode('-',$target_value[$i]);
						if ($target_unit[$i] == 'Days') {
							if ($_POST['current_date']<=$list_data[4]) {
								echo '5';die();
							}
							else if($_POST['current_date']>$list_data[4] && $_POST['current_date']<=$list_data[3])
							{
								echo '4';die();
							}
							else if($_POST['current_date']>$list_data[3] && $_POST['current_date']<=$list_data[2])
							{
								echo '3';die();
							}
							else if($_POST['current_date']>$list_data[2] && $_POST['current_date']<$list_data[1])
							{
								echo '2';die();
							}
							else if($_POST['current_date']>=$list_data[1])
							{
								echo '1';die();
							}							
						}
						else if ($target_unit[$i] != 'Date' && $target_unit[$i] != 'Days' && $target_unit[$i] != 'Text') {
							if ($_POST['current_date']<=$list_data[0]) {
								echo '1';die();
							}
							else if($_POST['current_date']>$list_data[0] && $_POST['current_date']<=$list_data[1])
							{
								echo '2';die();
							}
							else if($_POST['current_date']>$list_data[1] && $_POST['current_date']<=$list_data[2])
							{
								echo '3';die();
							}
							else if($_POST['current_date']>$list_data[2] && $_POST['current_date']<=$list_data[3])
							{
								echo '4';die();
							}
							else if($_POST['current_date']>$list_data[3])
							{
								echo '5';die();
							}							
						}
						else if($target_unit[$i] == 'Date')
						{
							$actual_year_string0 = str_replace('/', '-',$_POST['current_date']);
		                   $actual_year_string1 = str_replace('/', '-',$list_data[0]);
		                   $actual_year_string2 = str_replace('/', '-',$list_data[1]);
		                   $actual_year_string3 = str_replace('/', '-',$list_data[2]);
		                   $actual_year_string4 = str_replace('/', '-',$list_data[3]);
		                   $actual_year_string5 = str_replace('/', '-',$list_data[4]);
							$today = date("Y-m-d");
							$today_time = strtotime($today);
							$expire_time = strtotime($_POST['current_date']);

							if ($expire_time<=strtotime(date('Y-m-d',strtotime($actual_year_string5)))) {
								echo '5';die();
							}
							else if($expire_time>strtotime(date('Y-m-d',strtotime($actual_year_string5))) && $expire_time<=strtotime(date('Y-m-d',strtotime($actual_year_string4))))
							{
								echo '4';die();
							}
							else if($expire_time>strtotime(date('Y-m-d',strtotime($actual_year_string4))) && $expire_time<=strtotime(date('Y-m-d',strtotime($actual_year_string3))))
							{
								echo '3';die();
							}
							else if($expire_time>strtotime(date('Y-m-d',strtotime($actual_year_string3))) && $expire_time<=strtotime(date('Y-m-d',strtotime($actual_year_string2))))
							{
								echo '2';die();
							}
							else if($expire_time>strtotime(date('Y-m-d',strtotime($actual_year_string2))))
							{
								echo '1';die();
							}
						}
					 }
					
				}
			}
		}
		
	}
		function actionsavekpi()
	{
		$model=new KpiAutoSaveForm;
		$setting_date=new SettingsForm;
		$emploee_data =new EmployeeForm;
		$where = 'where setting_content = :setting_content and year = :year';
        	$list = array('setting_content','year');
        	$data = array('PMS_display_format',date('Y'));             
        	$settings_data = $setting_date->get_setting_data($where,$data,$list);		
	 
		if (count($settings_data)>0) {
				$yr = date('Y',strtotime('+1 year'));
				$year_set = $settings_data['0']['setting_type'];
			}
			else
			{
				$year_set = date('Y');
			}
			$sub_emp_id = '';
			if (isset($_POST['correct_emp_id']) && $_POST['correct_emp_id'] != '') {
				$sub_emp_id = $_POST['correct_emp_id'];
			}
			else
			{
				$sub_emp_id = Yii::app()->user->getState("Employee_id");
			}
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($sub_emp_id);
			$emp_data = $emploee_data->get_employee_data($where,$data,$list);
			//print_r($sub_emp_id);die();
		$session_kra_id = Yii::app()->user->getState("KPI_id");
		$where = 'where id = :id';
		$list = array('id');
		$data = array($session_kra_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		if (count($kpi_data)>0 && $kpi_data['0']['KPI_id']!=''){
			$id_value = Yii::app()->user->getState("KPI_id");
				if (isset($_POST['kpi_list']) && $_POST['kpi_list']!='') {
					$data1 = array(
					'KPI_id' => $kpi_data['0']['KPI_id'], 
					'target' => $_POST['target'], 
					'target_value1' => $_POST['target_value1'], 
					'KPI_target_value' => $_POST['KPI_target_value'],
					'target_unit' => $_POST['target_unit'], 
					'KRA_category' => $_POST['KRA_category'], 
					'KRA_description' => $_POST['KRA_description'], 
					'kpi_list' => $_POST['kpi_list'], 
					'KRA_date' => date('Y-m-d'), 
					'kra_complete_flag' => 2,
				);
					
				$update = Yii::app()->db->createCommand()->update('KPI_structure',$data1,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data['0']['KPI_id']));
				if($update==1)
				{
					$emp_id = Yii::app()->user->getState("Employee_id");

					$query_result = Yii::app()->db->createCommand()->delete('KPI_structure', 'kra_complete_flag=:kra_complete_flag and Employee_id=:Employee_id', array(':kra_complete_flag'=>1,':Employee_id'=>$emp_id));					
					Yii::app()->user->setState('KPI_id','');
					print_r("Success");
				}
			}
		}
		else
		{
			$connection = Yii::app()->db;
			$sql = 'INSERT INTO kpi_auto_save(KPI_id, target, target_value1, KPI_target_value,target_unit,KRA_category,KRA_description,kpi_list,KRA_date,KRA_status,appraisal_id1,Employee_id,kra_complete_flag,goal_set_year) VALUES(:KPI_id, :target, :target_value1, :KPI_target_value,:target_unit,:KRA_category,:KRA_description,:kpi_list,:KRA_date,:KRA_status,:appraisal_id1,:Employee_id,:kra_complete_flag,:goal_set_year)';
			$command=$connection->createCommand($sql);
			$command->bindValue(':KPI_id', $_POST['kpi_id_value'], PDO::PARAM_STR);
			$command->bindValue(':target', $_POST['target'], PDO::PARAM_STR);
			$command->bindValue(':target_value1',$_POST['target_value1'], PDO::PARAM_STR);
			$command->bindValue(':KPI_target_value',$_POST['KPI_target_value'], PDO::PARAM_STR);
			$command->bindValue(':target_unit', $_POST['target_unit'], PDO::PARAM_STR);
			$command->bindValue(':KRA_category', $_POST['KRA_category'], PDO::PARAM_STR);
			$command->bindValue(':KRA_description',$_POST['KRA_description'], PDO::PARAM_STR);
			$command->bindValue(':kpi_list',$_POST['kpi_list'], PDO::PARAM_STR);
			$command->bindValue(':KRA_date', date('Y-m-d'), PDO::PARAM_STR);
			$command->bindValue(':KRA_status',"Pending", PDO::PARAM_STR);
			$command->bindValue(':appraisal_id1',$emp_data['0']['Reporting_officer1_id'], PDO::PARAM_STR);
			$command->bindValue(':Employee_id',$sub_emp_id, PDO::PARAM_STR);
			$command->bindValue(':kra_complete_flag',2, PDO::PARAM_STR);
			$command->bindValue(':goal_set_year',$year_set, PDO::PARAM_STR);
			//print_r(expression)
			if($command->execute())
			{
				$emp_id = Yii::app()->user->getState("Employee_id");
				$query_result = Yii::app()->db->createCommand()->delete('KPI_structure', 'Employee_id=:Employee_id', array(':Employee_id'=>$sub_emp_id));
					Yii::app()->user->setState('KPI_id','');
					print_r("Success");
			}
			else
			{
				print_r("error occured");die();
			}
		}
	}

function actionsavekpi1()
	{
		$model=new KpiAutoSaveForm;
		$setting_date=new SettingsForm;
		$emploee_data =new EmployeeForm;
		$where = 'where setting_content = :setting_content and year = :year';
        	$list = array('setting_content','year');
        	$data = array('PMS_display_format',date('Y'));             
        	$settings_data = $setting_date->get_setting_data($where,$data,$list);		
	 
		if (count($settings_data)>0) {
				$yr = date('Y',strtotime('+1 year'));
				$year_set = $settings_data['0']['setting_type'];
			}
			else
			{
				$year_set = date('Y');
			}
			$sub_emp_id = '';
			if (isset($_POST['correct_emp_id']) && $_POST['correct_emp_id'] != '') {
				$sub_emp_id = $_POST['correct_emp_id'];
			}
			else
			{
				$sub_emp_id = Yii::app()->user->getState("Employee_id");
			}
			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($sub_emp_id);
			$emp_data = $emploee_data->get_employee_data($where,$data,$list);
			//print_r($_POST['correct_emp_id']);die();
		$session_kra_id = Yii::app()->user->getState("KPI_id");
		$where = 'where id = :id';
		$list = array('id');
		$data = array($session_kra_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		if (count($kpi_data)>0 && $kpi_data['0']['KPI_id']!=''){
			$id_value = Yii::app()->user->getState("KPI_id");
				if (isset($_POST['kpi_list']) && $_POST['kpi_list']!='') {
					$data1 = array(
					'KPI_id' => $kpi_data['0']['KPI_id'], 
					'target' => $_POST['target'], 
					'target_value1' => $_POST['target_value1'], 
					'KPI_target_value' => $_POST['KPI_target_value'],
					'target_unit' => $_POST['target_unit'], 
					'KRA_category' => $_POST['KRA_category'], 
					'KRA_description' => $_POST['KRA_description'], 
					'kpi_list' => $_POST['kpi_list'], 
					'KRA_date' => date('Y-m-d'), 
					'kra_complete_flag' => 2,
				);
					
				$update = Yii::app()->db->createCommand()->update('KPI_structure',$data1,'KPI_id=:KPI_id',array(':KPI_id'=>$kpi_data['0']['KPI_id']));
				if($update==1)
				{
					$emp_id = Yii::app()->user->getState("Employee_id");

					$query_result = Yii::app()->db->createCommand()->delete('KPI_structure', 'kra_complete_flag=:kra_complete_flag and Employee_id=:Employee_id', array(':kra_complete_flag'=>1,':Employee_id'=>$emp_id));					
					Yii::app()->user->setState('KPI_id','');
					print_r("Success");
				}
			}
		}
		else
		{
			$connection = Yii::app()->db;
			$sql = 'INSERT INTO kpi_auto_save(KPI_id, target, target_value1, KPI_target_value,target_unit,KRA_category,KRA_description,kpi_list,KRA_date,KRA_status,appraisal_id1,Employee_id,kra_complete_flag,KRA_status_flag,goal_set_year) VALUES(:KPI_id, :target, :target_value1, :KPI_target_value,:target_unit,:KRA_category,:KRA_description,:kpi_list,:KRA_date,:KRA_status,:appraisal_id1,:Employee_id,:kra_complete_flag,:KRA_status_flag,:goal_set_year)';
			$command=$connection->createCommand($sql);
			$command->bindValue(':KPI_id', $_POST['kpi_id_value'], PDO::PARAM_STR);
			$command->bindValue(':target', $_POST['target'], PDO::PARAM_STR);
			$command->bindValue(':target_value1',$_POST['target_value1'], PDO::PARAM_STR);
			$command->bindValue(':KPI_target_value',$_POST['KPI_target_value'], PDO::PARAM_STR);
			$command->bindValue(':target_unit', $_POST['target_unit'], PDO::PARAM_STR);
			$command->bindValue(':KRA_category', $_POST['KRA_category'], PDO::PARAM_STR);
			$command->bindValue(':KRA_description',$_POST['KRA_description'], PDO::PARAM_STR);
			$command->bindValue(':kpi_list',$_POST['kpi_list'], PDO::PARAM_STR);
			$command->bindValue(':KRA_date', date('Y-m-d'), PDO::PARAM_STR);
			$command->bindValue(':KRA_status',"Pending", PDO::PARAM_STR);
			$command->bindValue(':appraisal_id1',$emp_data['0']['Reporting_officer1_id'], PDO::PARAM_STR);
			$command->bindValue(':Employee_id',$sub_emp_id, PDO::PARAM_STR);
			$command->bindValue(':kra_complete_flag',2, PDO::PARAM_STR);
			$command->bindValue(':KRA_status_flag',1, PDO::PARAM_STR);
			$command->bindValue(':goal_set_year',$year_set, PDO::PARAM_STR);
			//print_r(expression)
			if($command->execute())
			{
				$emp_id = Yii::app()->user->getState("Employee_id");
				$query_result = Yii::app()->db->createCommand()->delete('KPI_structure', 'Employee_id=:Employee_id', array(':Employee_id'=>$sub_emp_id));
					Yii::app()->user->setState('KPI_id','');
					print_r("Success");
			}
			else
			{
				print_r("error occured");die();
			}
		}
	}

	function actionupdate_emp_kpi()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$final_status = 'Pending';		
		$pending_count = 0;		
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data = array($_POST['KPI_id']);
		$emp_data = $model->get_kpi_list($where,$data,$list);

		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($emp_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
		$data = array(	
			'target'=>$_POST['target'],	
			'target_value1' => $_POST['target_value1'], 
			'target_unit' => $_POST['target_unit'],
			'kpi_list' => $_POST['kpi_list'], 
			'KRA_date' => date('Y-m-d'), 
			//'KRA_status' => 'Approved',			
			'KPI_target_value' => $_POST['KPI_target_value'],
			'KRA_category' => $_POST['KRA_category'],
			'KRA_description' => $_POST['KRA_description'],
			'goal_status' => 'Approved'
		);
		//print_r($data);die();
		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		
		if($update==1)
		{
			echo $_POST['KPI_id'];die();
			
		}
		else
		{
			print_r("error occured");die();
		}
		
	}

	function actionkrakpi_del()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$notification_data =new NotificationsForm;
		$value = 0;
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data = array($_POST['kra_id']);$detail3 = '';
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($kpi_data['0']['Employee_id']);
		$employee_data1 = $emploee_data->get_employee_data($where,$data,$list);

		if (isset($kpi_data) && count($kpi_data)>0) {
			$detail = explode(';',$kpi_data['0']['kpi_list']);
			$detail1 = explode(';',$kpi_data['0']['target_unit']);
			$detail2 = explode(';',$kpi_data['0']['target_value1']);
			if($kpi_data['0']['KPI_target_value']=='')
			{
			 $detail3 = '';
			}
			else
			{
			$detail3 = explode(';',$kpi_data['0']['KPI_target_value']); 
			}
			//$detail3 = explode(';',$kpi_data['0']['KPI_target_value']);
			$kpi_list = '';$kpi_unit = '';$kpi_value = '';$kpi_target = '';
			for ($i=0; $i < count($detail); $i++) {
								
				if ($i != $_POST['last_id']) 
				{
				if (!isset($detail3[$i])) {
		                       $detail3[$i] = '';                                                                   
		                 } 
					if ($kpi_list == '') {
						$kpi_list = $detail[$i];
						$kpi_unit = $detail1[$i];
						$kpi_value = $detail2[$i];
						$kpi_target = $detail3[$i];
					}
					else
					{
						$kpi_list = $kpi_list.';'.$detail[$i];
						$kpi_unit = $kpi_unit.';'.$detail1[$i];
						$kpi_value = $kpi_value.';'.$detail2[$i];
						$kpi_target = $kpi_target.';'.$detail3[$i];
					}
				}				
			}
			$data_update = array(
				'kpi_list' => $kpi_list,
				'target_unit' => $kpi_unit, 
				'target_value1' => $kpi_value,
				'KPI_target_value' => $kpi_target,
			);
			//$update = 1;
			$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data_update,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['kra_id']));
$notification_data->notification_type = 'KPI Deletion';
				  $notification_data->Employee_id = $kpi_data['0']['Employee_id'];
				  $notification_data->date = date('Y-m-d');
				  $notification_data->save();	
			if ($update == 1) {

                                   if($employee_data['0']['invalid_email'] != '1')
       {
   $employee_email = Yii::app()->user->getState("employee_email");
				//print_r($employee_data1);die();
				Yii::import('ext.yii-mail.YiiMailMessage');
				  $message = new YiiMailMessage;
				  $message->view = "kpi_del_intemation";
				  $params = array('mail_data'=>$employee_data1,'kpi_data'=>$kpi_data,'del_kpi'=>$detail[$_POST['last_id']]);
				  $message->setBody($params, 'text/html');
				  $message->subject = 'KPI Deletion';
				  //$email_id = 'priyankamhadik1994@gmail.com';
				 	$message->addTo($employee_data1['0']['Email_id']);
				  $message->addTo('vvf.pms@vvfltd.com');  
				$message->addTo($employee_email);		  
				  $message->from = $employee_email;
				  	 
				 
				  if(Yii::app()->mail->send($message))
				  {	  		
				  		echo 1;die();
				  }
       }
       else
       {
          echo 1;die();
       }
				
				
			}
			else
			{
				echo 0;die();
			}
			//print_r($kpi_unit);die();
		}
		
	}

	function actionfinal_goal_review1()
	{
		$model=new KpiAutoSaveForm;	
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 	

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);

		$Employee_id = $_POST['emp_id'];
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_status != :goal_status and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_status','goal_set_year');
			$data = array($Employee_id,'',$settings_data['0']['setting_type']);
			$kpi_data = $model->get_kpi_list($where,$data,$list);  

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,$settings_data['0']['setting_type']);
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);      	
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_status != :goal_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_status','goal_set_year');
				$data = array($Employee_id,'',$settings_data1['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);

				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,$settings_data1['0']['setting_type']);
				$kpi_data1 = $model->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_status != :goal_status and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_status','goal_set_year');
			$data = array($Employee_id,'',date('Y'));
			$kpi_data = $model->get_kpi_list($where,$data,$list);

			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($Employee_id,date('Y'));
			$kpi_data1 = $model->get_kpi_list($where,$data,$list);
		}
		$count = '';$kra_category_flag = '';$kra_category_flag1 = 0;
		for($i=0;$i<count($kpi_data1);$i++)
		{
			if($count == '')
			{
			$count = $kpi_data1[$i]['target'];
			}
			else
			{
			$count = $count+$kpi_data1[$i]['target'];
			}
			if ($kra_category_flag == '') {
				$kra_category_flag = $kpi_data1[$i]['KRA_category'];
			}
			if($kra_category_flag == $kpi_data1[$i]['KRA_category'])
			{
				//$kra_category_flag = $kpi_data1[$i]['KRA_category'];
				$kra_category_flag1++;
			}
			else
			{
				$kra_category_flag = $kpi_data1[$i]['KRA_category'];
			}
		}
//print_r($count);die();
		if(isset($kpi_data1) && isset($kpi_data))
		{
			$kra_category_flag = '';
			for ($i=0; $i < count($kpi_data1); $i++) { 
				$kra_category_flag1 = 0;
				$kra_category_flag = $kpi_data1[$i]['KRA_category'];				
				for ($j=0; $j < count($kpi_data1); $j++) { 
					if(($i != $j) && $kra_category_flag == $kpi_data1[$j]['KRA_category'])
					{
						$kra_category_flag1++;
					}
					if($kra_category_flag1>1)
					{
						echo '3';die();
					}			
				}
				
			}
			if($count != '100')
			{
				echo '2';die();
			}			
			else if (count($kpi_data1) == count($kpi_data) && $count == '100') {
				echo '1';die();
			}
		}	
	}

	function actionupdate_kpi()
	{
		$model=new KpiAutoSaveForm;
		$data = array(
			'target' => $_POST['target'], 
			'target_value1' => $_POST['target_value1'], 
			'target_unit' => $_POST['target_unit'], 
			'KRA_category' => $_POST['KRA_category'], 
			'KRA_description' => $_POST['KRA_description'], 
			'kpi_list' => $_POST['kpi_list'], 
			'KRA_date' => date('Y-m-d'), 
			'KRA_status' => 'Pending',
			'KPI_target_value' => $_POST['KPI_target_value'],
		);
		
		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		if($update!=0)
		{
			print_r("success");die();
		}
		else
		{
			print_r("error occured");die();
		}
		
	}

	function actionupdate_notificationflag()
	{
		$data = array(
			'chk_flag' => $_POST['chk_flag'],			
		);
		$update = Yii::app()->db->createCommand()->update('notifications',$data,'Employee_id=:Employee_id',array(':Employee_id'=>$_POST['Employee_id']));
		if($update!=0)
		{
			print_r("success");die();
		}
		else
		{
			print_r("error occured");die();
		}
		
	}

	function actionkpi_edit($KPI_id = NULL)
	{
		$model=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");		
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($Employee_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		////////////////////////////////////////////////////
		$where1 = 'where KPI_id = :KPI_id';
		$list1 = array('KPI_id');
		$data1 = array($KPI_id);
		$kpi_data_edit = $model->get_kpi_list($where1,$data1,$list1);

		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout');
		$this->render('//site/set_goal_auto_save',array('model'=>$model,'kra_list'=>$kra,'kpi_data'=>$kpi_data,'kpi_data_edit'=>$kpi_data_edit,'edit_flag'=>'1'));
		$this->render('//site/footer_view_layout');
	}

	function actionemp_kpi_list($emp_id = NULL)
	{
		$model=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 
		
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
		$KRA_category = '';
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($emp_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		////////////////////////////////////////////////////
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($emp_id,$settings_data['0']['setting_type']);
			$kpi_data_edit = $model->get_kpi_list($where,$data,$list);
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
					$list = array('Employee_id','goal_set_year');
					$data = array($Employee_id,$settings_data1['0']['setting_type']);
					$kpi_data_saved = $model1->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list = array('Employee_id','goal_set_year');
			$data = array($emp_id,date('Y'));
			$kpi_data_edit = $model->get_kpi_list($where,$data,$list);
		}
		
		// $where1 = 'where KPI_id = :KPI_id';
		// $list1 = array('KPI_id');
		// $data1 = array($KPI_id);
		// $kpi_data_edit = $model->get_kpi_list($where1,$data1,$list1);
//print_r($kpi_data_edit);die();
		if (isset($kpi_data_edit) && count($kpi_data_edit)>0) {
			$where = 'where KRA_category = :KRA_category';
			$list = array('KRA_category');
			$data = array($kpi_data_edit['0']['KRA_category']);
			$KRA_category = $kra->get_kra_data($where,$data,$list);
		}
		$selected_option = 'Goals';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
		$KRA_date = $model->get_distinct_list('KRA_date','where Employee_id = "'.$emp_id.'"');

		$this->render('//site/kpi_list_view',array('model'=>$model,'kra_list'=>$kra,'kpi_data'=>$kpi_data,'kpi_data_edit'=>$kpi_data_edit,'edit_flag'=>'1','apr_chk_flag'=>'1','KRA_category_auto'=>$KRA_category,'KRA_date'=>$KRA_date));
		$this->render('//site/footer_view_layout');
	}

	
	function actionemp_kpi_edit()
	{
		if (isset($_POST['emp_id'])) {
			$emp_id = Yii::app()->user->setState('emp_id1',$_POST['emp_id']);
		}
		else
		{
			$emp_id = '';
		}
		$emp_id = Yii::app()->user->getState('emp_id1');
		$model=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$setting_date=new SettingsForm;
		$emploee_data =new EmployeeForm;
		$IDPForm =new IDPForm;	
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 
		
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
		
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($emp_id);
		$emp_data = $emploee_data->get_employee_data($where,$data,$list);
		
		$where = 'where Employee_id = :Employee_id and set_status =:set_status';
		$list = array('Employee_id','set_status');
		$data = array($emp_id,'Approved');
		$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
		$prg_cnt = 0;
		if(isset($IDP_data) && count($IDP_data)>0)
		{
		$prg_cnt = 1;
		}

		$KRA_category = '';
		$kra_types = $kra->get_list();
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($emp_id);
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		////////////////////////////////////////////////////
		if (count($settings_data)>0) {
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
			$list = array('Employee_id','goal_set_year');
			$data = array($emp_id,$settings_data['0']['setting_type']);
			$kpi_data_edit = $model->get_kpi_list($where,$data,$list);
		}
		else if (count($settings_data1)>0) {
        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
			if ($settings_data1['0']['setting_type'] == $year) {
				$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
					$list = array('Employee_id','goal_set_year');
					$data = array($Employee_id,$settings_data1['0']['setting_type']);
					$kpi_data_saved = $model1->get_kpi_list($where,$data,$list);
			} 
        	}
		else
		{
			$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year ORDER BY target DESC ';
			$list = array('Employee_id','goal_set_year');
			$data = array($emp_id,date('Y'));
			$kpi_data_edit = $model->get_kpi_list($where,$data,$list);
		}

		if (isset($kpi_data_edit) && count($kpi_data_edit)>0) {
			for ($i=0; $i < count($kpi_data_edit); $i++) { 
				$where = 'where KRA_category = :KRA_category';
				$list = array('KRA_category');
				$data = array($kpi_data_edit[$i]['KRA_category']);
				$KRA_category[$i] = $kra->get_kra_data($where,$data,$list);
			}			
		}
		
		$selected_option = 'Goals';
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
//print_r($kpi_data);die();
		$this->render('//site/edit_goal_sheet',array('model'=>$model,'kra_list'=>$kra,'kpi_data'=>$kpi_data,'kpi_data_edit'=>$kpi_data_edit,'apr_chk_flag'=>'1','KRA_category_auto'=>$KRA_category,'emp_data'=>$emp_data,'edit_flag_chk'=>1,'prg_cnt'=>$prg_cnt));
		$this->render('//site/footer_view_layout');
	}

	function actionkpi_del()
	{
		$model=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");	
		$KPI_id = $_POST['KPI_id'];	
		$kra_types = $kra->get_list();
		$setting_date=new SettingsForm;
				

		$command = Yii::app()->db->createCommand();
		$query_result = $command->delete('kpi_auto_save', 'KPI_id=:KPI_id', array(':KPI_id'=>$KPI_id));
		if($query_result == 1)
		{
			$where = 'where setting_content = :setting_content and year = :year';
	        $list = array('setting_content','year');
	        $data = array('PMS_display_format',date('Y'));             
	        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

	        $where = 'where setting_content = :setting_content and year = :year';
	        $list = array('setting_content','year');
	        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
	        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

	        if (count($settings_data)>0) {
	        	$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,$settings_data['0']['setting_type']);
				$kpi_data = $model->get_kpi_list($where,$data,$list);
	        }
	        else if (count($settings_data1)>0) {
	        	$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
	        	if ($settings_data1['0']['setting_type'] == $year) {
	        		$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
					$list = array('Employee_id','goal_set_year');
					$data = array($Employee_id,$settings_data1['0']['setting_type']);
					$kpi_data = $model->get_kpi_list($where,$data,$list);
	        	} 
	        }
	        else
	        {
	        	$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list = array('Employee_id','goal_set_year');
				$data = array($Employee_id,date('Y'));
				$kpi_data = $model->get_kpi_list($where,$data,$list);
	        }
			print_r(count($kpi_data));die();
		}
		else
		{
			echo 'error occured';
		}
	}

	function actionkpi_del1()
	{
		$model=new KpiAutoSaveForm;
		$kra=new KRAStructureForm;
		$emploee_data =new EmployeeForm;
		$notification_data =new NotificationsForm;
		$Employee_id = Yii::app()->user->getState("Employee_id");	
		$KPI_id = $_POST['KPI_id'];	
		$kra_types = $kra->get_list();
		$setting_date=new SettingsForm;
		
	       	$where = 'where KPI_id = :KPI_id';
	        $list = array('KPI_id');
	        $data = array($_POST['KPI_id']); 
		$kpi_data = $model->get_kpi_list($where,$data,$list);
	       
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array($kpi_data['0']['Employee_id']);
		$employee_data1 = $emploee_data->get_employee_data($where,$data,$list);
		$command = Yii::app()->db->createCommand();
		$query_result = $command->delete('kpi_auto_save', 'KPI_id=:KPI_id', array(':KPI_id'=>$_POST['KPI_id']));	
		if($query_result == 1)
		{
$notification_data->notification_type = 'KRA Deletion';
			  $notification_data->Employee_id = $kpi_data['0']['Employee_id'];
			  $notification_data->date = date('Y-m-d');
			  $notification_data->save();		
                    if($employee_data['0']['invalid_email'] != '1')
       {
         Yii::import('ext.yii-mail.YiiMailMessage');
		  $employee_email = Yii::app()->user->getState("employee_email");
			Yii::import('ext.yii-mail.YiiMailMessage');
			  $message = new YiiMailMessage;
			  $message->view = "kra_del_intemation";
			  $params = array('mail_data'=>$employee_data1,'kpi_data'=>$kpi_data);
			  $message->setBody($params, 'text/html');
			  $message->subject = 'KRA Deletion';
			  //$email_id = 'priyankamhadik1994@gmail.com';
			 	$message->addTo($employee_data1['0']['Email_id']);
			  $message->addTo('vvf.pms@vvfltd.com');  
			$message->addTo($employee_email);		  
			  $message->from = $employee_email;
			 
			  if(Yii::app()->mail->send($message))
			  {	  		
			  		echo "Notification Send";die();
			  }
       }
       else
       {
         echo "Notification Send";die();
       }

			//print_r($employee_data1);die();
			
		}
		else
		{
			echo 'error occured';
		}
	}

	function actiongetlist()
	{
		$kra_list = $_POST['number_of_kra'];
		$this->render('//site/goal_sheet',array('kra_list'=>$kra_list));
	}

	function actionapprovegoals()
	{
		$model=new KPIStructureForm;
		$emploee_data =new EmployeeForm;
		$id = Yii::app()->user->getState("employee_email");
		$where = 'where appraisal_id1 = :appraisal_id1 and KRA_status = :KRA_status';
		$list = array('appraisal_id1','KRA_status');
		$data = array($id,'Approved');
		$kpi_data = $model->get_kpi_list($where,$data,$list);
		$kpi_data_count = '';
		if (count($kpi_data)>0) {
			$kpi_data_count = $kpi_data;
		}
		else
		{
			$kpi_data_count = '';
		}
		$cnt = 0;$emp_count = 0;$employee_data = '';
		
		$notification_data = '';
		if (isset($kpi_data) && count($kpi_data)>0) {
				foreach ($kpi_data as $row) {
				$where = 'where Employee_id = :Employee_id';
				$list = array('Employee_id');
				$data = array($row['Employee_id']);
				$employee_data[$cnt] = $emploee_data->get_employee_data($where,$data,$list);
				$cnt++;
			}
			$notification_data = array(
				'notication_count' => count($kpi_data), 
				'notication_type' => "KRA Approval Pending",
			);
		}	
		$mid_review = 1;
		
		$this->render('//site/script_file');
		$this->render('//site/session_check_view');
		$this->render('//site/header_view',array('notication_count'=>$notification_data));
		$this->render('//site/goal_sheet',array('kpi_data'=>$kpi_data,'employee_data'=>$employee_data,'mid_review'=>$mid_review));
		$this->render('//site/footer_view');
	}
	function actionupdategoal()
	{
		$model=new KpiAutoSaveForm;
		$emploee_data =new EmployeeForm;
		$final_status = 'Pending';
		$all_status = explode(';',$_POST['review_status']);
		for ($i=0; $i < count($all_status); $i++) { 
			if($all_status[$i] == 'Approved')
			{
				$final_status = 'Approved';
			}
			else
			{
				$final_status = 'Pending';
			}
		}
		$data = array(
			'review_status' => $_POST['review_status'],
			'review_comments' => $_POST['review_comments'],	
			'goal_approve_date' => date('Y-m-d'),
			//'KRA_status' => $final_status
		);
		$where = 'where KPI_id = :KPI_id';
		$list = array('KPI_id');
		$data1 = array($_POST['KPI_id']);
		$kpi_data = $model->get_kpi_list($where,$data1,$list);

		$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($kpi_data['0']['Employee_id']);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$_POST['KPI_id']));
		
		if ($update != 0) {
			echo "success";
			//$this->actiongoalnotification($employee_data['0']['Email_id']);
		}
		else
		{
			echo "error occured";
		}
	}

	function actiongoalapproved()
    {
    	
		  $employee_email = '';$appriaser_1 = '';
    	//print_r($_POST['emp_id']);die();
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$kra=new KpiAutoSaveForm;
    	$setting_date=new SettingsForm;
		$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");

    	$where1 = 'where Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($_POST['emp_id']);
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
		$mail_id = $employee_data1['0']['Email_id'];
    	//print_r(Yii::app()->user->getState("employee_email"));die();
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($mail_id);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array(Yii::app()->user->getState("employee_email"));
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

		if (count($settings_data)>0) {
        	$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],$settings_data['0']['setting_type']);
			$kra_data = $kra->get_kpi_list($where1,$data2,$list1);	
		}
		else if(count($settings_data1)>0)
		{
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
        	if ($settings_data1['0']['setting_type'] == $year) {
        		$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
				$list1 = array('Employee_id','goal_set_year');
				$data2 = array($_POST['emp_id'],$settings_data1['0']['setting_type']);
				$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
        	} 
		}
		else
		{			
			$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
			$list1 = array('Employee_id','goal_set_year');
			$data2 = array($_POST['emp_id'],date('Y'));
			$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
		}
		for ($i=0; $i < count($kra_data); $i++) { 
			$data = array(
			'KRA_status' => 'Approved',
			);
			$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kra_data[$i]['KPI_id']));
		}
		
    	//print_r($kra_data);die();
$notification_data->notification_type = 'Updated Goalsheet';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();		 
       if($employee_data['0']['invalid_email'] != '1')
       {
         Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "goal_set_page";
		  $params = array('mail_data'=>$employee_data,'kpi_data'=>$kra_data,'employee_data1'=>$employee_data1);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'IDP & Goalsheet Approved';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo($mail_id);
		  $message->addTo($Employee_id);  		  
		  $message->from = $Employee_id;
                  $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/Goalsheet_docs/goalsheet_".$employee_data1['0']['Emp_fname']."_".$employee_data1['0']['Emp_lname'].".pdf"));
		   $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot')."/IDP_docs/IDP_".$employee_data1['0']['Emp_fname']."_".$employee_data1['0']['Emp_lname'].".pdf"));
		  
		//print_r($kra_data);die(); 
		  if(Yii::app()->mail->send($message))
		  {	  		
		  		echo "Notification Send";die();
		  }
       }
       else
       {
          echo "Notification Send";die();
       }

    	
    }

	function actiongoalnotification($mail_id = NULL)
    {
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($mail_id);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);
$notification_data->notification_type = 'Goal Approval';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
if($employee_data['0']['invalid_email'] != '1')
       {
        Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "appraiser_to_emp";
		  $params = array('mail_data'=>$employee_data);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Goal Approve';
		  $message->addTo($mail_id); 
		  $message->from = $Employee_id;
		 
		  if(Yii::app()->mail->send($message))
		  {
		  		echo "Notification Send";die();
		  }
       }
       else
       {
          echo "Notification Send";die();
       }
    	
 
    }

	function actionsendmail()
    {
    	$employee_email = '';$appriaser_1 = '';
    	
    	$emploee_data =new EmployeeForm;
    	$notification_data =new NotificationsForm;
    	$kra=new KpiAutoSaveForm;
    	$Employee_id = Yii::app()->user->getState("employee_email");
    	$appriaser_1 = Yii::app()->user->getState("appriaser_1");
    	//print_r(Yii::app()->user->getState("employee_email"));die();
    	$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array($appriaser_1);
		$employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where Email_id = :Email_id';
		$list1 = array('Email_id');
		$data2 = array(Yii::app()->user->getState("employee_email"));
		$employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

		$where1 = 'where  Employee_id = :Employee_id';
		$list1 = array('Employee_id');
		$data2 = array($employee_data1['0']['Employee_id']);
		$kra_data = $kra->get_kpi_list($where1,$data2,$list1);
$notification_data->notification_type = 'Goal Approval_pending';
		  $notification_data->Employee_id = $employee_data['0']['Employee_id'];
		  $notification_data->date = date('Y-m-d');
		  $notification_data->save();
    	if($employee_data['0']['invalid_email'] != '1')
       {
        Yii::import('ext.yii-mail.YiiMailMessage');
		  $message = new YiiMailMessage;
		  $message->view = "goal_set_page";
		  $params = array('mail_data'=>$employee_data,'kpi_data'=>$kra_data,'employee_data1'=>$employee_data1);
		  $message->setBody($params, 'text/html');
		  $message->subject = 'Approval Pending';
		  //$email_id = 'priyankamhadik1994@gmail.com';
		  $message->addTo($appriaser_1);
		  $message->addTo($Employee_id);  		  
		  $message->from = $Employee_id;
		 
		  $kra_update = array(
		  	'KRA_status_flag' => '1', 
		  );
		 //print_r($kra_update);die();
		  if(Yii::app()->mail->send($message))
		  {
		  		$update = Yii::app()->db->createCommand()->update('kpi_auto_save',$kra_update,'Employee_id=:Employee_id',array(':Employee_id'=>Yii::app()->user->getState("Employee_id")));		  		
		  		echo "Notification Send";die();
		  }
       }
       else
       {
          echo "Notification Send";die();
       }
 
    	
    }
	public function actionfetch_field()
	{
		$format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value(In Lakh)','Percentage' => 'Percentage');
		if (isset($_POST['unit_type'])) {
			if($_POST['unit_type'] == 'Units' || $_POST['unit_type'] == 'Weight' || $_POST['unit_type'] == 'Value')
			{
				$date_str = $_POST['unit_value'];
				
				$field_1 = round($date_str*0.69,2);
				$field_2 = round($date_str*0.69,2)+0.01." to ".round($date_str*0.95,2);
				$field_3 = round($date_str*0.95,2)+0.01." to ".round($date_str*1.05,2);
				$field_4 = round($date_str*1.05,2)+0.01." to ".round($date_str*1.29,2);
				$field_5 = " > ".round($date_str*1.29,2);
				echo $field_1.','.$field_2.','.$field_3.','.$field_4.','.$field_5;
			}
			
		}

	}
	
}	
