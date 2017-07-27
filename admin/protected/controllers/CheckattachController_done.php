<?php

class CheckattachController extends Controller
{
	
	public function actionIndex()
	{
		$notification_data =new NotificationsForm;
		$emploee_data =new EmployeeForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array('vvf57e264fd8d3ef');
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);
		$webroot = Yii::getPathOfAlias('webroot');
		$file_name = 'IDP'.'vvf57e264fd8d3ef'.'.odt';
		$file =  $webroot.'/'.'Goalsheet_docs/'.$file_name;
		$handle = fopen($file, 'w');	
		$txt = "Dear ".$employee_data['0']['Emp_fname']."\n
 Please check IDP for the year ".date('Y').'-'.date('Y', strtotime('+1 year'))."Kindly login to PMS Online to review the same and further actions.click the link below to check status: \n http://kritvainvestments.com/pmsuser/index.php/Login\nBest Regards,\n".print_r(Yii::app()->user->getState('Employee_name'))."
2016 &#169; Kritva Technology Pvt. Ltd.";
		fwrite($handle,$txt);
		fclose($handle);	  
	}

	public function actioncheck_view()
	{
// 		require("html2fpdf.php"); 
// $htmlFile = "http://www.cnn.com"; 
// $buffer = file_get_contents($htmlFile); 

// $pdf = new HTML2FPDF('P', 'mm', 'Legal'); 
// $pdf->AddPage(); 
// $pdf->WriteHTML($buffer); 
// $pdf->Output('my.pdf', 'F'); 
	// 	require(Yii::getPathOfAlias('webroot').'/pdfget/html2pdf.php');
	// 	 $pdf=new PDF_HTML();
 //    $pdf->SetFont('Arial','',12);
 //    $pdf->AddPage();
 //    $pdf->WriteHTML('<h1>asdsadsa</h1>');
 //    $filename=Yii::getPathOfAlias('webroot')."/test.pdf";
	// $pdf->Output($filename,'F');
		
		$this->render('//site/mail_for_golasheet');  
	}

	public function actioncheck_view1()
	{
		// $webroot = Yii::getPathOfAlias('webroot');
		// $file_name = 'goalsheet'.$_POST['emp_id'].'.html';
		// $file =  $webroot.'/'.'Goalsheet_docs/'.$file_name;
		// $handle = fopen($file, 'w');
		// $textIWantToInsert = $_POST['doc'];
		// fwrite($handle,$textIWantToInsert);
		// fclose($handle);	
		// print_r($_POST['doc']); 
		// require(Yii::getPathOfAlias('webroot').'/pdfget/html2pdf.php');
		$file_name = 'goalsheet'.$_POST['emp_id'].'.pdf';
		//  $pdf=new PDF_HTML();
	 //    $pdf->SetFont('Arial','',12);
	 //    $pdf->AddPage();
	 //    $pdf->WriteHTML(Yii::getPathOfAlias('webroot').'/ex.php');
	 //    $filename=Yii::getPathOfAlias('webroot').'/Goalsheet_docs/'.$file_name;
		// $pdf->Output($filename,'F');
		require Yii::getPathOfAlias('webroot').'/pdfget/pdfcrowd.php';
		$client = new Pdfcrowd("monica1992", "e122dfc0afd07d9a939a742b42f06309");
		//$pdf = $client->convertURI('http://www.google.com/');
		 header("Content-Type: application/pdf");
	    header("Cache-Control: max-age=0");
	    header("Accept-Ranges: none");
	    header("Content-Disposition: attachment; filename=\"google_com.pdf\"");
	     $out_file = fopen(Yii::getPathOfAlias('webroot').'/Goalsheet_docs/'.$file_name, "wb");
	    $client->convertHtml($_POST['doc'], $out_file);
	    fclose($out_file);
	}

	function actiondata_sheet()
	{
		$notification_data =new NotificationsForm;
		$emploee_data =new EmployeeForm;
		$kra=new KpiAutoSaveForm;
		$where = 'where Employee_id = :Employee_id';
		$list = array('Employee_id');
		$data = array('vvf57e264fd8d3ef');
		$employee_data = $emploee_data->get_employee_data($where,$data,$list);

		$where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
		$list1 = array('Employee_id','goal_set_year');
		$data2 = array('vvf57e264fd8d3ef','2016-2017');
		$kpi_data = $kra->get_kpi_list($where1,$data2,$list1);	

		// $webroot = Yii::getPathOfAlias('webroot');
		// $file_name = 'goalsheet'.'vvf57e264fd8d3ef'.'.php';
		// $file =  $webroot.'/'.'Goalsheet_docs/'.$file_name;
		// $handle = fopen($file, 'w');
		$input = '';$input1 = '';$input2 = '';$input11 = '';$input3 = '';
		//print_r($kpi_data);die();
		if (isset($kpi_data)) { $cnt_num = 0;
            foreach ($kpi_data as $row) {  
            	 $kpi_list_data = '';
                $kpi_list_data = explode(';',$row['kpi_list']);
                $kpi_list_unit = explode(';',$row['target_unit']);
                $kpi_list_target = explode(';',$row['target_value1']); 
                //print_r($kpi_list_data);die();
                for ($i=0; $i < count($kpi_list_data); $i++) { 
                	
                	//$input1 = '<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_data[$i].'</td>';
                	if ($input1 == '') {
                		$input1 = '<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_data[$i].'</td>';
                		$input11 = '<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_unit[$i].'</td>';
                		$input2[$cnt_num] = '<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_data[$i].'</td>';
                		$input3[$cnt_num] = '<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_unit[$i].'</td>';
                	}
                	else
                	{
                		$input1 = $input1.'<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_data[$i].'</td>';
                		$input11 = $input11.'<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_unit[$i].'</td>';
                		$input2[$cnt_num] = $input1.'<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_data[$i].'</td>';
                		$input3[$cnt_num] = $input11.'<td style="height: 30px;border: 1px solid black;font-size: 14px;">'.$kpi_list_unit[$i].'</td>';
                	}
                }
                $cnt_num++;
                
            }
        }
        // print_r($input2);echo '<br>';
        //  die();
		if (isset($kpi_data)) { $cnt_num = 0;
                                        foreach ($kpi_data as $row) {  
                                        	if ($input == '') {
                                        		$input = '<div class="portlet box border-blue-soft bg-blue-soft" id="output_div_'.$row["KPI_id"].'>
                                            <div class="portlet-title">
                                                <div class="caption" style="font-weight:bold; font-size:18px; color: black;">                                                  
                                                    <label id="total_'.$cnt_num.' style="display: none">'.$row['target'].'</label>'.$row['KRA_category']."(".$row['target'].")".'</div>
                                                <div class="tools" style="font-weight:bold; font-size:18px; color: black;">'."KRA Approval Status : ".$row['KRA_status'].'<a href="javascript:;" class="collapse">
</a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll expand_goal'.$cnt_num.'>                         
                                                <table  class="table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top:20px;border-collapse: collapse;color:black;border: 1px solid black;">
                                                    <thead style="background-color: #4c87b9;color: #fff;">
                                                        <tr>
                                                            <th style="height: 40px;border: 1px solid black;width: 134px;font-size:16px "> KPI List </th>
                                                            <th style="border: 1px solid black;width: 134px;font-size:16px" class="numeric"> KPI Unit Format </th>
                                                           <th style="border: 1px solid black;width: 134px;font-size:16px" class="numeric"> KPI value </th>
                                                           <th style="border: 1px solid black;width: 134px;font-size:16px" class="numeric"> KPI Target Value </th>
                                                            <th style="border: 1px solid black;width: 134px;font-size:16px">Target 1</th>
                                                            <th style="border: 1px solid black;width: 134px;font-size:16px">Target 2</th>
                                                            <th style="border: 1px solid black;width: 134px;font-size:16px">Target 3</th>
                                                            <th style="border: 1px solid black;width: 134px;font-size:16px">Target 4</th> 
                                                            <th style="border: 1px solid black;width: 134px;font-size:16px">Target 5</th>
                                                        </tr>
                                                    </thead>
                                                    </tbody>
                                                    <tr>
	                                                    <td><table><tr>
	                                                    '.$input2[$cnt_num].$input3[$cnt_num].'</tr></table></td>
                                                    </tr>
                                                    </tbody>                                
                                                </table>   
                                                <br><br>                                              
                                            </div>
                                        </div>';
                                        	}
                                        	// else
                                        	// {

                                        	// }
                                        $cnt_num++; } }
                                        ?> 
		<?php
		$detail_data = "Dear <label>".$employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']."</label>,<br/>
                                                The Goals are successfully submitted </label><br/><br>".$input.

                                        "<span> Please click the link below to check status:<br>
  <a href='http://kritvainvestments.com/pmsuser/index.php?r=PMSlogin/setgaolsheet'>http://kritvainvestments.com/pmsuser/index.php?r=Login</a>
                                        <p style='text-align:left; line-height:15px; font-weight: bold'>Best Regards,<br/>".$employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname'].'(Employee ID : '.$employee_data['0']['Employee_id'].' )'."</p></span> 
                                         <p style='color: #bbb;'>
                                        2016 &#169; Kritva Technology Pvt. Ltd.
                                        </p>";
        print_r($input);
		//fwrite($handle,$detail_data);
		$detail = '';
	}
}
?>