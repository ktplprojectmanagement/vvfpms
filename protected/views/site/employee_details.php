            <style media="all" type="text/css">
      
      #err, #error { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 226px;
height: 50px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
      
      }
      
   </style>
        <style>
      .custom-file-input {
        display: inline-block;
        position: relative;
        color: #533e00;
      }
      .custom-file-input input[type=file] {
        visibility: hidden;
        width: 100px;
      }
      .custom-file-input:before {
        content: 'Choose File';
        display: block;
        background: -webkit-linear-gradient( -180deg, #ffdc73, #febf01);
        background: -o-linear-gradient( -180deg, #ffdc73, #febf01);
        background: -moz-linear-gradient( -180deg, #ffdc73, #febf01);
        background: linear-gradient( -180deg, #ffdc73, #febf01);
        border: 3px solid #dca602;
        border-radius: 10px;
        padding: 5px 0px;
        outline: none;
        white-space: nowrap;
        cursor: pointer;
        text-shadow: 1px 1px rgba(255,255,255,0.7);
        font-weight: bold;
        text-align: center;
        font-size: 10pt;
        position: absolute;
        left: 0;
        right: 0;
      }
      .custom-file-input:hover:before {
        border-color: #febf01;
      }
        .custom-file-input:active:before {
        background: #febf01;
      }
      .file-blue:before {
        content: 'Browse File';
        background: -webkit-linear-gradient( -180deg, #99dff5, #02b0e6);
        background: -o-linear-gradient( -180deg, #99dff5, #02b0e6);
        background: -moz-linear-gradient( -180deg, #99dff5, #02b0e6);
        background: linear-gradient( -180deg, #99dff5, #02b0e6);
        border-color: #57cff4;
        color: #FFF;
        text-shadow: 1px 1px rgba(000,000,000,0.5);
      }
      .file-blue:hover:before {
        border-color: #02b0e6;
      }
      .file-blue:active:before {
        background: #02b0e6;
      }
    </style>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                <div id="err" style="display:none"></div>
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php?r=Admin_Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                               <a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php?r=Newemployee/employee_master">Employee Record</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Employee Master
                    </h3>
            <div class="container-fluid">
                    <div class="breadcrumbs">                        
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">                            
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                               <style type="text/css">
                                    .image-upload > input
                                    {
                                        display: none;
                                    }
                               </style>
                                <div>
                                <div class="col-md-6" style="float: left;margin-top: -52px;">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/MIS" class="nav-link nav-toggle"><input type='button' id="import_csv" class="btn sbold blue" value='New Employee' ></a>
                                </div>
                                <div id="updation_spinner" style="float: right;margin-top: -25px;display: none">Please wait file upload is in process : <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;"></i></div>
                                <div id="file_uploaded_success" style="float: right;margin-top: 16px;display: none">File Uploaded successfully : <i class="fa fa-check" aria-hidden="true" style="font-size: 22px;color:green"></i></div>
                               <div id="file_uploaded_success" style="float: right;margin-top: 16px;display: none">File Uploaded successfully : <i class="fa fa-check" aria-hidden="true" style="font-size: 22px;color:green"></i></div>
                                 <label  class="custom-file-input file-blue" id="file_change" style="float: right;color: rgb(76, 158, 217);margin-top: -52px;margin-right: 67px;">
                                   
                                    <input id="file-input" type="file"  name='employee_csv'/><label id='uploaded_file' style="margin-top: -23px;
margin-left: -105px;"></label>
                                </label>
                                
                                <?php 
                                    $form=$this->beginWidget('CActiveForm', array(
                                   'id'=>'user-master',
                                    'enableClientValidation'=>true,
                                    //'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                    //'action' => $this->createUrl('Newemployee/importdata'),                                        
                                ));
                                ?>
                            <!--  <?php echo CHtml::FileField('employee_csv','employee_csv',array('id'=>'file_name')); ?> -->
                            <!-- <input type='button' id="import_csv" class="btn sbold green" value='Import' > -->
                            <?php $this->endWidget(); ?>

                                                                <?php 
                                $form=$this->beginWidget('CActiveForm', array(
                               'id'=>'user-form',
                                'enableClientValidation'=>true,
                                'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
                            ));
                            ?>
                             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript">
    $(function(){
        // $("#file_change").change(function(){
        //     $("#uploaded_file").text($('#file-input').val());
        //     //alert($('#file-input').val());
        // });
       $("#file_change").change(function(){
            $("#uploaded_file").text($('#file-input').val());
             var e = document.getElementById("file-input");
             var file_data = $(e)[0].files[0];
             var formData = new FormData();            
             formData.append("employee_csv",$('#file-input')[0].files[0]);             
             var ext = $("#file-input").val().split(".").pop().toLowerCase(); 
            $("#err").removeClass("alert-success"); 
            $("#err").removeClass("alert-danger");
             $(window).scroll(function()
            {
                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
            });
             if($("#file-input").val()=='')
             {
                $("#err").show();
                $("#err").fadeOut(6000);
                $("#err").text("Please Upload File file.");
                $("#err").addClass("alert-danger");
             }
             else if(ext != 'xls')
             {
                $("#err").show();
                $("#err").fadeOut(6000);
                $("#err").text("Only Excel files with extension .xls are allowed");
                $("#err").addClass("alert-danger");
             }
             else
             {
                $("#updation_spinner").show();
                var base_url = window.location.origin;
                $.ajax({
                    'type' : 'post',
                    'datatype' : 'json',
                    processData: false, 
                    contentType: false,
                    'enctype': 'multipart/form-data',
                    'data' : formData,
                    'url' : base_url+$("#basepath").attr('value')+'/index.php?r=Export/',
                    success : function(data)
                    {
                        if (data == 'Successfully Uploaded') 
                        {
                            $("#uploaded_file").text();
                            $("#updation_spinner").hide();
                            $("#file_uploaded_success").show();  
                            $("#file_uploaded_success").fadeOut(6000);
                            $("#sample_1").load(location.href + " #sample_1");
                        }
                        else if(data == 'Updation done')
                        {
                            $("#uploaded_file").text();
                            $("#updation_spinner").hide();
                            $("#err").show();
                            $("#err").fadeOut(6000);
                            $("#err").text("Updation done");
                            $("#err").addClass("alert-success");
                            $("#sample_1").load(location.href + " #sample_1");
                        }
                        else if(data != '')
                        {
                            $("#uploaded_file").text();
                            $("#updation_spinner").hide();
                            $("#err").show();
                            $("#err").fadeOut(6000);
                            $("#err").text(data);
                            $("#err").addClass("alert-danger");
                        }
                        else 
                        {
                            $("#uploaded_file").text();
                            $("#updation_spinner").hide();
                            $("#err").show();
                            $("#err").fadeOut(6000);
                            $("#err").text("No Updation");
                            $("#err").addClass("alert-danger");
                        }
                    }
                });
             }
        });                                                                                    
    });
</script>
<style type="text/css">
    #sample_1_filter
    {
        float: right;
    }
    #sample_1_length
    {
        display: none;
    }
    button.buttons-pdf, div.buttons-pdf, a.buttons-pdf{
        display: none;
    }
</style>
    <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                                                <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
                                                <link href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />
                                                <script type="text/javascript"> 
                                                var j = jQuery.noConflict();           
                                                    // $(function(){
                                                    //     j("#sample_1").DataTable({
                                                    //        "bProcessing": true,
                                                    //         "bDeferRender": true,                                                            
                                                    //     });
                                                    // });
    $(document).ready(function() {
    j('#sample_1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
 <div class="portlet box " style='border:1px solid #337ab7;margin-top:40px '>
                                            <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                <div class="caption">
                                                    Employee List</div>                                                
                                            </div>
                                            <div class="portlet-body">
                                                <!-- <div class="table-responsive"> -->
                                                <div class="table-responsive1">
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="padding-left: 68px;"> SAP Code </th>

                                                                        <th>Name </th>
                                                                        <th style="display:none">Emp FName </th>
                                                                        <th style="display:none">Emp LName </th>
                                                                        <th style="display:none">Emp MName </th>
                                                                        <th style="display:none">Email</th>
                                                                        <th style="display:none">Gender</th>
                                                                        <th style="display:none">Permanent_address</th>
                                                                        <th style="display:none">City</th>
                                                                        <th style="display:none">State</th>
                                                                        <th style="display:none">Pincode</th>
                                                                        <th style="display:none">Basic qualification</th>
                                                                        <th style="display:none">Post graduations</th>
                                                                        <th style="display:none">Additional qualification</th>
                                                                        <th style="display:none">Marital status</th>
                                                                        <th style="display:none">No of dependents</th>
                                                                        <th style="display:none">Blood group</th>
                                                                        <th style="display:none">PAN number</th>
                                                                        <th style="display:none">Aadhar no</th>
                                                                        <th style="display:none">Position code</th>
                                                                        <th>Designation </th>
                                                                        <th>Department </th>
                                                                        <th style="display:none">Sub department</th>
                                                                        <th style="display:none">BU</th>
                                                                        <th style="display:none">Cadre</th>
                                                                        <th style="display:none">Grade</th>
                                                                        <th>Company Location</th>
                                                                        <th style="display:none">Location payroll at</th>
                                                                        <th style="display:none">Cluster Name</th>
                                                                        <th style="display:none">Reporting Mgr SAP Code</th>
                                                                        <th>Reporting1 for time n attendance</th>
                                                                        <th style="display:none">Reporting1 for appraisal</th>
                                                                        <th style="display:none">Reporting officer2 id   </th>
                                                                        <th style="display:none">Manager's manager</th>
                                                                        <th style="display:none">Cluster appraiser</th>
                                                                        <th style="display:none">Promotion_date</th>
                                                                        <th style="display:none">Designation before promotion</th>
                                                                        <th style="display:none">Cadre before promotion</th>
                                                                        <th style="display:none">Previous grade</th>
                                                                        <th style="display:none">Redesignation date</th>
                                                                        <th style="display:none">Designation Before redesignation</th>
                                                                        <th style="display:none">Cadre before redesignation </th>
                                                                        <th style="display:none">Grade before redesignation grade</th>
                                                                        <th style="display:none">Designation before promotion icgc</th>
                                                                        <th style="display:none">Transferred from location</th>
                                                                        <th style="display:none">Transfer wef location</th>
                                                                        <th style="display:none">Transferred from old data</th>
                                                                        <th style="display:none">Transfer old data wef location</th>
                                                                        <th style="display:none">Transferred from dept</th>
                                                                        <th style="display:none">Transfer wef dept</th>
                                                                        <th style="display:none">Retire date</th>
                                                                        <th style="display:none">Last working date </th>
                                                                        <th style="display:none">Attrition period</th>
                                                                        <th style="display:none">Date of resignation</th>
                                                                        <th style="display:none">Reason for leaving</th>
                                                                        <th style="display:none">Exit category</th>
                                                                        <th style="display:none">Remarks</th>
                                                                        <th style="display:none">Type of attrition</th>
                                                                        <th style="display:none">Types of trainee</th>
                                                                        <th style="display:none">Department on joining</th>
                                                                        <th style="display:none">Date of Training to confirmation</th>
                                                                        <th style="display:none">Actual date of probation to Confirmation</th>
                                                                        <th style="display:none">After trainee confirmed as wef</th>
                                                                        <th style="display:none">Previous employer</th>
                                                                        <th style="display:none">Joining date</th>
                                                                        <th style="display:none">Other experience</th>
                                                                        <th style="display:none">VVF experience</th>
                                                                        <th style="display:none">Total experience</th>
                                                                        <th style="display:none">Due date for training to probation</th>
                                                                        <th style="display:none">Actual date for training to probation</th>
                                                                        <th style="display:none">Confirmation due date</th>
                                                                        <th style="display:none">Confirmation extention date</th>
                                                                        <th style="display:none">Confirmation actual date</th>
                                                                        <th style="display:none">Cost_centre_codes</th>
                                                                        <th style="display:none">Cost_centre_description</th>
                                                                        <th style="display:none">Employee_status</th>
                                                                        <th style="display:none">Contact number</th>
                                                                        <th style="display:none">Date of birth</th>
                                                                        <th style="display:none">Age (Years)</th>
                                                                        <th style="display:none">Age (Months)</th>
                                                                        <th style="display:none">Company Name</th>
                                                                        <th style="display:none">Personal Email Id</th>
                                                                        <th> Check Profile </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                //print_r($model[0]);
                                                                    if (isset($model) && count($model)>0) {
                                                                       foreach ($model as $row) {
                                                                ?>                                                                
                                                                    <tr class="odd gradeX">
                                                                        <td><?php echo $row['Employee_id']; ?></td>
                                                                        <td><?php echo $row['Emp_fname']." ".$row['Emp_lname']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Emp_fname']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Emp_lname']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Emp_mname']; ?></td>   
                                                                        <td style="display:none"><?php echo $row['email']; ?>  
                                                                        <td style="display:none"><?php echo $row['Gender']; ?>                                                                      
                                                                        <td style="display:none"><?php echo $row['Permanent_address']; ?></td>
                                                                        <td style="display:none"><?php echo $row['city']; ?> </td>
                                                                        <td style="display:none"><?php echo $row['state']; ?> </td>
                                                                        <td style="display:none"><?php echo $row['Pincode']; ?> </td>
                                                                        <td style="display:none"><?php echo $row['Basic_qualification']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Post_graduations']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Additional_qualification']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Marital_status']; ?></td>
                                                                        <td style="display:none"><?php echo $row['No_of_dependents']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Blood_group']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Pan_number']; ?></td>
                                                                        <td style="display:none"><?php echo $row['aadhar_no']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Position_code']; ?></td>
                                                                        <td><?php echo $row['Designation']; ?></td>
                                                                        <td><?php echo $row['Department']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Sub_department']; ?></td>
                                                                        <td style="display:none"><?php echo $row['BU']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Cadre']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Grade']; ?></td>
                                                                        <td><?php echo $row['company_location']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Location_payroll_at']; ?></td>
                                                                        <td style="display:none"><?php echo $row['cluster_name']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Reporting_Mgr_SAP_Code']; ?></td>
                                                                        <td><?php echo $row['Reporting_1_for_time_n_attendance']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Reporting_1_for_appraisal']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Reporting_officer2_id']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Manager_manager']; ?></td>
                                                                        <td style="display:none"><?php echo $row['cluster_appraiser']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Promotion_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Designation_before_promotion']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Cadre_before_promotion']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Previous_grade']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Redesignation_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['desig_bfr_redesgn']; ?></td>
                                                                        <td style="display:none"><?php echo $row['cadre_before_redesignation']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Grade_before_redesignation_grade']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Designation_bef_promo_icgc']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Transferred_from_loc']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Transfer_wef_loc']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Transferred_from_old_data']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Transfer_old_data_wef_loc']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Transferred_from_dept']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Transfer_wef_dept']; ?></td>
                                                                        <td style="display:none"><?php echo $row['retire_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['last_working_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Attrition_period']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Date_of_resignation']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Reason_for_leaving']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Exit_category']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Remarks']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Type_of_attrition']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Types_of_trainee']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Department_on_joining']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Date_of_Training_to_confirmation']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Actual_date_of_probation_to_Confirmation']; ?></td>
                                                                        <td style="display:none"><?php echo $row['After_trainee_confirmed_as_wef']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Previous_employer']; ?></td>
                                                                        <td style="display:none"><?php echo $row['joining_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Other_exp']; ?></td>
                                                                        <td style="display:none"><?php echo $row['VVF_exp']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Total_exp']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Due_date_for_training_to_probation']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Actual_date_for_training_to_probation']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Confirmation_due_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Confirmation_extention_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Confirmation_actual_date']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Cost_centre_codes']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Cost_centre_description']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Employee_status']; ?></td>
                                                                        <td style="display:none"><?php echo $row['contact']; ?></td>
                                                                        <td style="display:none"><?php echo $row['dob']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Age_yrs']; ?></td>
                                                                        <td style="display:none"><?php echo $row['Age_months']; ?></td>
                                                                        <td style="display:none"><?php echo $row['comp_name']; ?></td>
                                                                        <td style="display:none"><?php echo $row['personal_email']; ?></td>
                                                                        <td ><a style="text-decoration: none;" href="<?php echo Yii::app()->createUrl('index.php/MIS/Mis_update', array('u_id' => $row['u_id']));?>"><span class="label label-sm label-warning" style="background-color:#337AB7;"> Check </span></a></td>
                                                                    </tr>
                                                                  <?php
                                                                    }
                                                                    }else
                                                                    {?>
                                                                    <tr>
                                                                    <td colspan='7'>No Record Found</td>
                                                                    </tr>
                                                                <?php
                                                                    }
                                                                ?>                                                          
                                                                </tbody>
                                                            </table>

                                                </div>
                                            </div>
                                        </div>  
                                                                           
 <?php $this->endWidget(); ?>
                                </div>

                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
               <!--  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script> -->
                <script type="text/javascript">
                var click = 0;
                var j = jQuery.noConflict();
                function get_notify(e)
                {  
                    click++;                  
                    var settings = {
                            theme: 'teal',
                            horizontalEdge: 'top',
                            verticalEdge: 'right'
                        },
                        $button = $(this);
                    
                    if ($.trim($('#notific8_heading').val()) != '') {
                        settings.heading = $.trim($('#notific8_heading').val());
                    }
                    
                    if (!settings.sticky) {
                        settings.life = '10000';
                    }

                    j.notific8('zindex', 11500);
                    j.notific8($.trim(e), settings);
                    
                    $button.attr('disabled', 'disabled');
                    
                    setTimeout(function() {
                        $button.removeAttr('disabled');
                    }, 1000);
                }        
            </script>
                <script type="text/javascript">
                    $(function(){
                        $("#add_settings").click(function(){
                            var checkedValues = $('.md-check:checked').map(function() {
                                return this.value;
                            }).get();                            
                            //var checkedValues_values = checkedValues.split(',');
                            console.log(checkedValues);
                            for (var i = 0; i < checkedValues.length; i++) {
                                var data = checkedValues[i];
                                var data_split = data.split('-');
                                var content = '';
                                content = {
                                        'content_name' : data_split[0],
                                        'content_value' : data_split[1]
                                };
                                console.log(content);
                                var base_url = window.location.origin;                              
                                $.ajax({
                                dataType :'html',
                                 type :'post',
                                 data : content,
                                 url : base_url+$("#basepath").attr('value')+'/index.php?r=Settingpage/save',
                                 'success' : function(data) {              
                                    if (click == 0) 
                                    {
                                         get_notify("Settings Updated Successfully");
                                    }                                    
                                }
                            });
                            }
                        });
                    });
                </script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>


