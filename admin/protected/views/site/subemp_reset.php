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
    <input type="text" value="/vvf.kritva.in" id="basepath">
    <script type="text/javascript">
    var basepath = $("#basepath").attr('value');
    </script>
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
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Admin_Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                               <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Newemployee/employee_master">Employee Record</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Reset Password
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
                                
                                <div id="updation_spinner" style="float: right;margin-top: -25px;display: none">Please wait file upload is in process : <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;"></i></div>
                                <div id="file_uploaded_success" style="float: right;margin-top: 16px;display: none">File Uploaded successfully : <i class="fa fa-check" aria-hidden="true" style="font-size: 22px;color:green"></i></div>
                               <div id="file_uploaded_success" style="float: right;margin-top: 16px;display: none">File Uploaded successfully : <i class="fa fa-check" aria-hidden="true" style="font-size: 22px;color:green"></i></div>
                                 <label  class="custom-file-input file-blue" id="file_change" style="float: right;color: rgb(76, 158, 217);display:none;margin-top: -52px;margin-right: 67px;display: none">
                                   
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
</style>
    <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                                                <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
                                                <script type="text/javascript"> 
                                                var j = jQuery.noConflict();           
                                                    $(function(){
                                                        j("#sample_1").DataTable({
                                                           "bProcessing": true,
                                                            "bDeferRender": true,                                                            
                                                        });
                                                    });
                                                </script>
 <div class="portlet box " style='border:1px solid #337ab7;margin-top:40px '>
                                            <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                <div class="caption">
                                                    Employee List</div>                                                
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="padding-left: 68px;"> Employee ID </th>
                                                                        <th> Name </th>
                                                                        <th> Designation </th>
                                                                        <th> Department </th>
                                                                        <th> Joining Date </th>
                                                                        <th> Appraiser 1 </th>
                                                                        <th> Reset Password </th>
                                                                        <th> Check Profile </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                    if (isset($model) && count($model)>0) {
                                                                       foreach ($model as $row) {
                                                                ?>                                                                
                                                                    <tr class="odd gradeX">
                                                                        <td>
                                                                            <?php echo $row['Employee_id']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['Emp_fname']." ".$row['Emp_lname']; ?>
                                                                        </td>                                                                        
                                                                        <td>
                                                                             <?php echo $row['Designation']; ?>
                                                                        </td>
                                                                        <td> <?php echo $row['Department']; ?> </td>
                                                                        <td> <?php echo $row['joining_date']; ?> </td>
                                                                        <td class="center"> <?php echo $row['Reporting_officer1_id']; ?> </td>
<td class="center"><input type="text" id="emp_pass-<?php echo $row['Employee_id']; ?>" class="emp_pass">&nbsp;&nbsp;<input type="button" class="reset_pass" value="Reset" name="emp_pass-<?php echo $row['Employee_id']; ?>"></td>
                                                                        <td>
                                                                            <a style="text-decoration: none;" href="<?php echo Yii::app()->createUrl('index.php/Login/employee_profile', array('Employee_id' => $row['Employee_id']));?>"><span class="label label-sm label-warning" style="background-color:#337AB7;"> Check </span></a>
                                                                        </td>
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
$("body").on('click','.reset_pass',function(){
var id = $(this).attr('name');
var value = $("#"+id).val();
var emp_id = id.split('-');
//alert(emp_id[1]);
if(value == '')
{
alert("Please enter password.");
}
else
{
var content = {
password_value : value,
Employee_id : emp_id[1]
};
 var base_url = window.location.origin;                              
                                $.ajax({
                                dataType :'html',
                                 type :'post',
                                 data : content,
                                 url : base_url+$("#basepath").attr('value')+'/admin/index.php?r=Newemployee/subreset',
                                 'success' : function(data) {              
                                    alert("Password Reset Successfully");                                  
                                }
                            });
}

});
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
