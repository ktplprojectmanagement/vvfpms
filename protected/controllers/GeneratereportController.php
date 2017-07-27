<?php

class GeneratereportController extends Controller
{
	public function actionIndex()
	{
        if(Yii::app()->user->getState("Employee_id")!='')
        {
            $model=new EmployeeForm;
            $report=new ReportFormatForm;
            $report_column=$report->getdata();
            $all_data =  $model::model()->getTableSchema()->getColumnNames();
            $selected_option = 'Generatereport';
            $this->render('//site/script_file');
            $this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
            $this->render('//site/report',array('model'=>$model,'columns'=>$all_data,'report_column'=>$report_column));
            $this->render('//site/admin_footer_view');
        }
        else
        {
            $this->redirect(array('Adminlogin/Index'));
        }		
		
	}

    function actionget()
    {
        $model=new ReportFormatForm;
        $list = '';
        for ($i=0; $i < count($_POST['content_list']); $i++) { 
           if ($list == '') {
               $list = $_POST['content_list'][$i];
           }
           else
           {
                $list = $list.';'.$_POST['content_list'][$i];
           }
        }
        
        $model->content_list = $list;
        $model->report_name = $_POST['report_name'];
        $update = $model->save();
        if($update!=0)
        {
            print_r("success");die();
        }
        else
        {
            print_r("error occured");die();
        }
    }

    function actionreport($id = null)
    {       
        $model=new ReportFormatForm;
        $Employee_data = new EmployeeForm;
        $where = 'where id = :id';
        $list = array('id');
        $data = array($id);
        $report_data = $model->get_report_data($where,$data,$list);
        $columns_field = explode(';',$report_data['0']['content_list']);
        $list_data = '';
        for ($i=0; $i < count($columns_field); $i++) { 
           if ($list_data == '') {
               $list_data = $columns_field[$i];
           }
           else
           {
                $list_data = $list_data.','.$columns_field[$i];
           }
        }

        $report_details = $Employee_data->get_report_content($list_data);
        $emp_id_data = $Employee_data->getdata();
        $selected_option = 'PMS';
        $this->render('//site/script_file');
        $this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
        $this->render('//site/report_format',array('report_data'=>$report_data,'report_details'=>$report_details,'emp_id_data'=>$emp_id_data));
        $this->render('//site/admin_footer_view');
    }

    function actionall_record($id = null,$year = null)
    {
    	$goal_data =new KPIStructureForm;
    	$where = 'where Employee_id = :Employee_id and KRA_date = :KRA_date';
        $list = array('Employee_id','KRA_date');
        $data = array($id,'2016-08-09');
        $report_data = $goal_data->get_kpi_list($where,$data,$list);
        $this->render('//site/script_file');
        $this->render('//site/admin_header_view');
        $this->render('//site/all_record_view',array('report_data'=>$report_data));
        $this->render('//site/admin_footer_view');
       
    }

    function actiondelete_report()
    {
        $model =new ReportFormatForm;
        $query_result = Yii::app()->db->createCommand()->delete('report_format', 'id=:id', array(':id'=>$_POST['id']));
        if ($query_result == 1) {
            echo "success";
        }
        else
        {
            echo "error";
        }
       
    }

 
}