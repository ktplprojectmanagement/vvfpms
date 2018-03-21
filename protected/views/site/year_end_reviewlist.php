       <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Year End Review Employee List </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <div class="portlet box border-blue-soft bg-blue-soft">
                                        <div class="portlet-title">
                                            <div class="caption">
                                               List Of Employee</div>
                                            <div class="tools">
                                               <!--  <a href="javascript:;" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="javascript:;" class="reload"> </a>
                                                <a href="javascript:;" class="remove"> </a> -->
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                   <thead class="bg-blue-soft" style="color: white;background-color: #154592;border:1px solid #154592">
                                                    <tr>
                                                        <th class="all">Employee ID</th>
                                                        <th class="min-phone-l">Employee Name</th>
                                                        <th class="min-tablet">Department</th>
                                                        <th class="none">Designation</th>
                                                        <th class="none">Reporting Manager</th>
                                                        <th class="none">Dotted Line Manager</th>
                                                        <th class="none">Status</th>
                                                        <th class="none">Check</th>                                                            
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
    if (isset($emp_data) && count($emp_data)>0 && $emp_data!= '') {
        for ($i=0; $i < count($emp_data); $i++) {
            if($emp_data[$i]['0']['Employee_id'] != '')
            {
            $model=new KpiAutoSaveForm;	
            $where = 'where Employee_id = :Employee_id';
            $list = array('Employee_id');
            $data = array($emp_data[$i]['0']['Employee_id']);
            $kpi_data_details = $model->get_kpi_list($where,$data,$list);
            $emp_id = '';
                if(isset($emp_data[$i]['0']['Employee_id']))
                {
                $emp_id = $emp_data[$i]['0']['Employee_id'];
                }
                else
                {
                $emp_id = '';
                }
?>
<tr>
    <td><?php if(isset($emp_data[$i]['0']['Employee_id'])) { echo $emp_data[$i]['0']['Employee_id']; } ?></td>
    <td><?php if(isset($emp_data[$i]['0']['Emp_fname'])) { echo $emp_data[$i]['0']['Emp_fname'].' '.$emp_data[$i]['0']['Emp_lname']; } ?></td>
    <td><?php if(isset($emp_data[$i]['0']['Department'])) { echo $emp_data[$i]['0']['Department']; }?></td>
    <td><?php if(isset($emp_data[$i]['0']['Designation'])) { echo $emp_data[$i]['0']['Designation']; }?></td>
<td><?php 
$employee=new EmployeeForm;	
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($emp_data[$i]['0']['Reporting_officer1_id']);
$apr_data_details = $employee->get_employee_data($where,$data,$list);
if(isset($apr_data_details['0']['Emp_fname'])) 
{ 
echo $apr_data_details['0']['Emp_fname']." ".$apr_data_details['0']['Emp_lname']; 
}?></td>
<td><?php 
$employee=new EmployeeForm;	
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($emp_data[$i]['0']['Reporting_officer2_id']);
$apr_data_details1 = $employee->get_employee_data($where,$data,$list);

$employee=new EmployeeForm;	
$where = 'where Reporting_officer2_id = :Reporting_officer2_id';
$list = array('Reporting_officer2_id');
$data = array(Yii::app()->user->getState("employee_email"));
$apr_data_details3 = $employee->get_employee_data($where,$data,$list);

if(isset($apr_data_details1['0']['Emp_fname'])) 
{ 
echo $apr_data_details1['0']['Emp_fname']." ".$apr_data_details1['0']['Emp_lname']; 
}

$model=new KpiAutoSaveForm;	
$where = 'where appraisal_id1 = :appraisal_id1';
$list = array('appraisal_id1');
$data = array($emp_data[$i]['0']['Reporting_officer2_id']);
$kpi_data_details_dot = $model->get_kpi_list($where,$data,$list);
//print_r($apr_data_details1);die();
?></td>
                                                                <td <?php if(isset($apr_data_details3) && count($apr_data_details3)>0 && isset($kpi_data_details_dot['0']['dot_final_kra_status']) && $kpi_data_details_dot['0']['dot_final_kra_status'] == "Approved") { ?> style="color:green" <?php } else if(isset($kpi_data_details['0']['final_kra_status']) && $kpi_data_details['0']['final_kra_status'] == "Approved") { ?>style="color:green"<?php } else { ?>style="color:red"<?php } ?>><?php if(isset($kpi_data_details_dot['0']['dot_final_kra_status']) && $kpi_data_details_dot['0']['dot_final_kra_status']!='') { echo $kpi_data_details_dot['0']['dot_final_kra_status']; } else if(isset($kpi_data_details['0']['final_kra_status'])) { echo $kpi_data_details['0']['final_kra_status']; }?></td>
                                                                <td><a href='<?php echo Yii::app()->createUrl("index.php/Year_endreview/appraiser_end_review",array("Employee_id"=>$emp_id,"apr_data"=>Yii::app()->user->getState("employee_email"))); ?>'><input style="background-color:#337AB7;color:white" name="yt0" value="Check" type="submit"></a></td>
                                                            </tr>
                                                <?php
                                                        }
                                                        }
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>                                                 
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
     
        </div>
        <!-- END CONTAINER -->
              
