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
               <style>
                   ul{
                    margin: 0px 0px 0px 20px; 
                    list-style: none; line-height: 2em; font-family: Arial;
                    li{
                        font-size: 16px;
                        position: relative;
                        &:before{
                            position: absolute;
                            left: -15px;
                            top: 0px;
                            content: '';
                            display: block;
                            border-left: 1px solid #ddd;
                            height: 1em;
                            border-bottom: 1px solid #ddd;
                            width: 10px;
                        }
                
                        &:after{
                            position: absolute;
                            left: -15px;
                            bottom: -7px;
                            content: '';
                            display: block;
                            border-left: 1px solid #ddd;
                            height: 100%;
                        }
                        
                      &.root{
                          margin: 0px 0px 0px -20px;
                          &:before{
                            display: none;
                          }
                
                          &:after{
                            display: none;
                          }
                
                
                       }
                
                
                       &:last-child{
                          &:after{ display: none }
                        }
                    }
                }
               </style>
                <div class="page-content">
                    <div class="container">
                        <div class="portlet box border-blue-soft bg-blue-soft">
                                        <div class="portlet-title">
                                            <div class="caption">
                                              Tree structure for all subordinate list</div>
                                            <div class="tools">
                                               <!--  <a href="javascript:;" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="javascript:;" class="reload"> </a>
                                                <a href="javascript:;" class="remove"> </a> -->
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <div style="float:right">
                                                    <div style="width:10px;height:10px;background-color:red;margin-left: -15px;"></div><div style="margin-top: -15px;">Approval Pending From Manager</div>
                                                </div><br>
                                                 <div style="float:right">
                                                    <div style="width:10px;height:10px;background-color:green;margin-left: -22px;"></div><div style="margin-top: -13px;">Approved From Manager</div>
                                                </div>
                                                <table class="table table-striped table-bordered table-hover">
                                             
                                                <tbody>
                                                    <ul>
  

                                                <?php
                                                    if (isset($emp_data) && count($emp_data)>0 && $emp_data!= '') {
                                                     for ($i=0; $i < count($emp_data); $i++) {
                                                         if($i>0)
                                                         {
                                                             //$html .= "</ol>";
                                                         }
                                                            if($emp_data[$i]['0']['Email_id'] != '')
                                                            {
                                                                $email = $emp_data[$i]['0']['Email_id'];
                                                                $model1=new KpiAutoSaveForm;	
                                                                $where = 'where Employee_id = :Employee_id';
                                                                $list = array('Employee_id');
                                                                $data = array($emp_data[$i]['0']['Employee_id']);
                                                                $kpi_data_details = $model1->get_kpi_list($where,$data,$list);
                                                                $color = "color:red";
                                                                if($kpi_data_details['0']['final_kra_status'] == 'Approved')
                                                                {
                                                                   $color = "color:green";
                                                                }
                                                               $html = "<ol class='tree'>";
                                                               $html .= "<img src='https://www.vvf.kritva.in/images/folder.png'> <label for='subfolder2'><a href='".Yii::app()->createUrl('index.php/Directreport/appraiser_end_review',array('Employee_id'=>$emp_data[$i]['0']['Employee_id'],'apr_data'=>$emp_data[$i]['0']['Reporting_officer1_id']))."'  target='_new' style='".$color."'>".$emp_data[$i]['0']['Emp_fname']." ".$emp_data[$i]['0']['Emp_lname']."</a></label> (".$emp_data[$i]['0']['Department'].")</li>"; 
                                                                $html .= "</ol>";
                                                                 echo $html;  
                                                                 //$html .= "</li>";
                                                                 $employee=new EmployeeForm;    
                                                                $where = 'where Reporting_officer1_id = :Reporting_officer1_id';
                                                                $list = array('Reporting_officer1_id');
                                                                $data = array($emp_data[$i]['0']['Email_id']);
                                                                $apr_data_details = $employee->get_employee_data($where,$data,$list);
                                                                 if(count($apr_data_details)>0 && $apr_data_details != '')
                                                                 {
                                                                    $this->actionchart($email,$emp_data[$i]['0']['Employee_id'],0);
                                                                 }
                                                                 
                                                                // $html .= "</ol>";
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
              
