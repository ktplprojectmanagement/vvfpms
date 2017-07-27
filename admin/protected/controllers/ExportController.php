<?php
class ExportController extends Controller
{
	public function actionIndex()
	{
		// $upload = 0;
		// $file_name = $_FILES['employee_csv']['tmp_name'];
		// $fp = fopen($file_name, 'r');
		// while(! feof($fp))
		//   {
		//   	$line = fgetcsv($fp);
		//   	$model=new EmployeeForm;
		//   	$model->Employee_id  = uniqid();
		//   	$model->Emp_lname  = $line[1];
		//   	//print_r($model->attributes);die();
		//   	if($model->save())
		//   	{
		//   		$upload++;
		//   	}
		//   }
		//   if($upload>0)
		//   {
		//   	print_r("Success");
		//   }
		//   else
		//   {
		//   	print_r("error");
		//   }

		$upload_count = 1;$update_count = 0;
		$model=new EmployeeForm;
		require_once 'excel_reader2.php';
		//print_r(Yii::app()->request->baseUrl."/Master_05.08.2016.xls");die();

		$data = new Spreadsheet_Excel_Reader($_FILES['employee_csv']['tmp_name']);
		$error = '';
		//print_r($data->sheets['0']['numRows']);die();
		//print_r($data->sheets['0']['cells']['1']);die();
		for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
		{	
			if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
			{

				for($j=2;$j<=$data->sheets['0']['numRows'];$j++) // loop used to get each row of the sheet
				{ 
						$model=new EmployeeForm;

						$where = 'where Employee_id = :Employee_id';
						$list = array('Employee_id');
						$data1 = array($data->sheets[$i]['cells'][$j][1]);
						$chk_data = $model->get_employee_data($where,$data1,$list);

						//print_r($data->sheets[$i]['cells'][$j][1]);die();
						
						$model->Employee_id = isset($data->sheets[$i]['cells'][$j][1]) && preg_match("/^([0-9a-zA-Z]{1,99})$/", trim($data->sheets[$i]['cells'][$j][1])) ? $data->sheets[$i]['cells'][$j][1] : $error = 'please correct employee ID';
						$model->Employee_atd_code = isset($data->sheets[$i]['cells'][$j][2]) && preg_match("/^([0-9a-zA-Z]{1,99})$/", trim($data->sheets[$i]['cells'][$j][2])) ? $data->sheets[$i]['cells'][$j][2] : $error = 'please correct employee attendance ID';
						$model->Emp_fname = isset($data->sheets[$i]['cells'][$j][3]) ? $data->sheets[$i]['cells'][$j][3] : $error = 'Employee first name is compalsory for all rows';
						$model->Emp_mname = isset($data->sheets[$i]['cells'][$j][4]) ? $data->sheets[$i]['cells'][$j][4] : '';
						$model->Emp_lname = isset($data->sheets[$i]['cells'][$j][5]) ? $data->sheets[$i]['cells'][$j][5] :  $error = 'Employee last name is compalsory for all rows';
						$model->Gender = isset($data->sheets[$i]['cells'][$j][6]) && preg_match("/^([a-zA-Z]{1,5})$/", trim($data->sheets[$i]['cells'][$j][6]))  ? $data->sheets[$i]['cells'][$j][6] :  $error = 'Employee gender is compalsory for all rows';
						$model->DOB = isset($data->sheets[$i]['cells'][$j][7]) && preg_match("/\d{2}\/\d{2}\/\d{4}/", trim($data->sheets[$i]['cells'][$j][7])) ? $data->sheets[$i]['cells'][$j][7] : $error = 'Please enter valid Date of birth';
						$model->Nationality = isset($data->sheets[$i]['cells'][$j][8]) && preg_match("/^([a-zA-Z\s]{1,20})$/", trim($data->sheets[$i]['cells'][$j][8])) ? $data->sheets[$i]['cells'][$j][8] : $error = 'Please enter valid Nationality Format';
						$model->Email_id = isset($data->sheets[$i]['cells'][$j][9]) && preg_match("/^[a-zA-Z0-9.]+@[a-z0-9A-Z.]+\.[a-z]{2,3}$/", trim($data->sheets[$i]['cells'][$j][9])) ? $data->sheets[$i]['cells'][$j][9] : $error = 'Please enter valid Email ID';
						$model->mobile_number = isset($data->sheets[$i]['cells'][$j][10]) && preg_match("/^([\d]{10})$/", trim($data->sheets[$i]['cells'][$j][10])) ? $data->sheets[$i]['cells'][$j][10] : '';
						$model->PAN_number = isset($data->sheets[$i]['cells'][$j][11]) && preg_match("/^([A-Z]){5}([0-9]){4}([A-Z]){1}$/", trim($data->sheets[$i]['cells'][$j][11])) ? $data->sheets[$i]['cells'][$j][11] : $error = 'Please enter valid PAN Number';
						$model->Designation = isset($data->sheets[$i]['cells'][$j][12]) && preg_match("/^([a-zA-Z-&\s]{1,50})$/", trim($data->sheets[$i]['cells'][$j][12])) ? $data->sheets[$i]['cells'][$j][12] : $error = 'Please enter valid Designation';
						$model->Cadre = isset($data->sheets[$i]['cells'][$j][13]) && preg_match("/^([a-zA-Z\s]{1,25})$/", trim($data->sheets[$i]['cells'][$j][13])) ? $data->sheets[$i]['cells'][$j][13] : $error = 'Please enter valid Cader';
						$model->Reporting_officer1_id = isset($data->sheets[$i]['cells'][$j][14]) && preg_match("/^[a-zA-Z0-9.]+@[a-zA-Z0-9.]+\.[a-z]{2,3}$/", trim($data->sheets[$i]['cells'][$j][14])) ? $data->sheets[$i]['cells'][$j][14] : $error = 'Please enter valid appraiser ID';
						$model->Reporting_officer2_id = isset($data->sheets[$i]['cells'][$j][15]) && preg_match("/^[a-z0-9.]+@[a-z0-9.]+\.[a-z]{2,3}$/", trim($data->sheets[$i]['cells'][$j][15])) ? $data->sheets[$i]['cells'][$j][15] : '';
						$model->Employee_status = isset($data->sheets[$i]['cells'][$j][16]) && preg_match("/^([a-zA-Z]{1,25})$/", trim($data->sheets[$i]['cells'][$j][16])) ? $data->sheets[$i]['cells'][$j][16] : '';
						$model->Present_address = isset($data->sheets[$i]['cells'][$j][17]) && preg_match("/^([a-zA-Z]{1,200})$/", trim($data->sheets[$i]['cells'][$j][17])) ? $data->sheets[$i]['cells'][$j][17] : $data->sheets[$i]['cells'][$j][17];
						$model->Permanent_address = isset($data->sheets[$i]['cells'][$j][18]) && preg_match("/^([a-zA-Z]{1,200})$/", trim($data->sheets[$i]['cells'][$j][18])) ? $data->sheets[$i]['cells'][$j][18] : '';
						$model->Blood_group = isset($data->sheets[$i]['cells'][$j][19]) && preg_match("/^((A|B|AB|O)[+-])|[\s]$/", trim($data->sheets[$i]['cells'][$j][19])) ? $data->sheets[$i]['cells'][$j][19] : '';
						$model->Image = '';
						$model->Department = isset($data->sheets[$i]['cells'][$j][21]) ? $data->sheets[$i]['cells'][$j][21] : $error = 'Please enter valid Department';
						$model->joining_date = isset($data->sheets[$i]['cells'][$j][22]) && preg_match("/\d{2}\/\d{2}\/\d{4}/", trim($data->sheets[$i]['cells'][$j][22])) ? $data->sheets[$i]['cells'][$j][22] : $error = 'Please enter valid Joining date';
						$model->cluster_appraiser = isset($data->sheets[$i]['cells'][$j][23]) && preg_match("/^([a-zA-Z]{1,100})*$/", trim($data->sheets[$i]['cells'][$j][23])) ? $data->sheets[$i]['cells'][$j][23] : $error = 'Please enter valid appraiser';
						$model->cluster_name = isset($data->sheets[$i]['cells'][$j][24]) && preg_match("/^([a-zA-Z]{1,100})*$/", trim($data->sheets[$i]['cells'][$j][24])) ? $data->sheets[$i]['cells'][$j][24] : $error = 'Please enter valid Cluster name';
						$model->state = isset($data->sheets[$i]['cells'][$j][25]) && preg_match("/^([a-zA-Z]{1,100})*$/", trim($data->sheets[$i]['cells'][$j][25])) ? $data->sheets[$i]['cells'][$j][25] : $error = 'Please enter valid State';
						$model->city = isset($data->sheets[$i]['cells'][$j][26]) && preg_match("/^([a-zA-Z]{1,100})*$/", trim($data->sheets[$i]['cells'][$j][26])) ? $data->sheets[$i]['cells'][$j][26] : $error = 'Please enter valid City';
						$model->other_city = isset($data->sheets[$i]['cells'][$j][27]) && preg_match("/^([a-zA-Z]{1,100})*$/", trim($data->sheets[$i]['cells'][$j][27])) ? $data->sheets[$i]['cells'][$j][27] : '';
						if (count($chk_data)>0) {
							//$j++;
							//print_r($j);
							if ($error == '') {
								
								$data_values = array(
									'Employee_id' => $data->sheets[$i]['cells'][$j][1], 
									'Employee_atd_code' => $data->sheets[$i]['cells'][$j][2], 
									'Emp_fname' => $data->sheets[$i]['cells'][$j][3], 
									'Emp_mname' => $data->sheets[$i]['cells'][$j][4], 
									'Emp_lname' => $data->sheets[$i]['cells'][$j][5], 
									'Gender' => $data->sheets[$i]['cells'][$j][6], 
									'DOB' => $data->sheets[$i]['cells'][$j][7], 
									'Nationality' => $data->sheets[$i]['cells'][$j][8],
									'Email_id' => $data->sheets[$i]['cells'][$j][9], 
									'mobile_number' => $data->sheets[$i]['cells'][$j][10], 
									'PAN_number' => $data->sheets[$i]['cells'][$j][11], 
									'Designation' => $data->sheets[$i]['cells'][$j][12], 
									'Cadre' => $data->sheets[$i]['cells'][$j][13], 
									'Reporting_officer1_id' => $data->sheets[$i]['cells'][$j][14], 
									'Reporting_officer2_id' => isset($data->sheets[$i]['cells'][$j][15]) ? $data->sheets[$i]['cells'][$j][15] : '', 
									'Employee_status' => isset($data->sheets[$i]['cells'][$j][16]) ? $data->sheets[$i]['cells'][$j][16] : '', 
									'Present_address' => isset($data->sheets[$i]['cells'][$j][17]) ? $data->sheets[$i]['cells'][$j][17] : '', 
									'Permanent_address' => isset($data->sheets[$i]['cells'][$j][18]) ? $data->sheets[$i]['cells'][$j][18] : '', 
									'Blood_group' => isset($data->sheets[$i]['cells'][$j][19]) ? $data->sheets[$i]['cells'][$j][19] : '',
									'Department' => isset($data->sheets[$i]['cells'][$j][21]) ? $data->sheets[$i]['cells'][$j][21] : '', 
									'joining_date' => isset($data->sheets[$i]['cells'][$j][22]) ? $data->sheets[$i]['cells'][$j][22] : '', 
									'cluster_appraiser' => isset($data->sheets[$i]['cells'][$j][23]) ? $data->sheets[$i]['cells'][$j][23] : '', 
									'cluster_name' => isset($data->sheets[$i]['cells'][$j][24]) ? $data->sheets[$i]['cells'][$j][24] : '', 
									'state' => isset($data->sheets[$i]['cells'][$j][25]) ? $data->sheets[$i]['cells'][$j][25] : '', 
									'city' => isset($data->sheets[$i]['cells'][$j][26]) ? $data->sheets[$i]['cells'][$j][26] : '', 
									'other_city' => isset($data->sheets[$i]['cells'][$j][27]) ? $data->sheets[$i]['cells'][$j][27] : '', 
								);
								//print_r($data_values);die();
								$update = Yii::app()->db->createCommand()->update('Employee',$data_values,'Employee_id=:Employee_id',array(':Employee_id'=>$data->sheets[$i]['cells'][$j][1]));

								if ($update != 1) {									
									$j++;
								}
								else if($update == 1)
								{
									$update_count++;
									$j++;
								}
								
								// if ($j == $data->sheets['0']['numRows'] && $update_count!=0) {
								// 	print_r("No New data to update");die();
								// }								
								$upload_count++;
							}
							else
							{
								print_r($error);die();
							}
						}
						else
						{						
						
							if ($error == '') {
								//print_r($model->attributes);die();
								$model->save();
								$upload_count++;
							}
							else
							{
								print_r($error);die();
							}
						}

				}
				
			}
		}

		
		if ($upload_count == $data->sheets['0']['numRows']) {
			print_r("Successfully Uploaded");
		}
		else if($update_count>0)
		{
			echo "Updation done";
		}
		else
		{
			echo "";
		}
		
	}

	public function actionkpi_export()
	{
		$upload_count = 1;
		$model=new KpiListForm;
		require_once 'excel_reader2.php';
		//print_r(Yii::app()->request->baseUrl."/Master_05.08.2016.xls");die();

		$data = new Spreadsheet_Excel_Reader($_FILES['employee_csv']['tmp_name']);

		//print_r($data->sheets['0']['cells']);die();
		//print_r($data->sheets['0']['cells']['1']);die();
		for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
		{
			if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
			{
				for($j=2;$j<=$data->sheets['0']['numRows'];$j++) // loop used to get each row of the sheet
				{ 

						$model=new KpiListForm;
						$model->KPI_id = uniqid();
						$model->kpi_name = isset($data->sheets[$i]['cells'][$j][1]) ? $data->sheets[$i]['cells'][$j][1] : '';
						$model->kpi_description = isset($data->sheets[$i]['cells'][$j][2]) ? $data->sheets[$i]['cells'][$j][2] : '';
						$model->department = isset($data->sheets[$i]['cells'][$j][3]) ? $data->sheets[$i]['cells'][$j][3] : '';
						$model->KPI_creation_date = date('Y-m-d');	
						//print_r($model->attributes);die();	
						$model->save();				
						$upload_count++;
				}
			}
		}
		if ($upload_count == $data->sheets['0']['numRows']) {
			print_r("Successfully Uploaded");
		}
		else
		{
			echo $upload_count;
		}
		
	}
}
?>
