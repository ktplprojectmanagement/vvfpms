         
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        
        $(function(){
        $("body").on("click",".del_kra", function(){
                     $("#static").modal('show');                                         
                    var id = $(this).attr('id');
                    var id_code = id.split('-');
                    //alert(id);
                    //alert(id_code);
                    var data = {
                        'KPI_id' : id_code[1],
                    };
                    var base_url = window.location.origin;
                    $("#continue_goal_set").click(function(){
                        $.ajax({
                        type : 'post',
                        data : data,
                        url : base_url+'/index.php?r=KPI/kpi_del',
                        success : function(data)
                        {
                           // alert(data);
                            if(data == 1)
                            {
                                $("#ditable_1").load(location.href + " #ditable_1");
                                // $(".del_kra").click(function(){

                                // });
                            }
                        }
                    });
                    });                    
                });
        });
        </script>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Admin_Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=KPI/KPI_create">KPI Form</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <h3 class="page-title"> KPI Form
                    </h3>         
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

      #ditable_1_filter
      {
        float: right;
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
   
           
                 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p> Are you sure you want to delete this KPI?
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                            <button type="button" data-dismiss="modal" class="btn green" id="continue_goal_set">Continue Task</button>
                        </div>
                    </div>
                </div>
            </div>

        <script type="text/javascript">
            $(function(){                               
      
            $('.md-check').click(function(){
                     var checkedValues = $('.md-check:checked').map(function() {
                        return this.value;
                    }).get();
                    console.log(checkedValues);
                    $("#emp_id_list").text(checkedValues);                                           
                }); 
            $("#add_kpi").click(function(){
                $("#error").text("");
                    $("#error").removeClass("alert-success"); 
                    $("#error").removeClass("alert-danger"); 
                    $(window).scroll(function()
                    {
                        $('#error').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
                    var data = {
                        'kpi_name' : $("#kpi_name").val(),
                        'kpi_description' : $("#kpi_desc").val(),
                        'department' : $("#dept").val()
                    }; console.log(data);              
                    var base_url = window.location.origin;
                    $.ajax({
                        type : 'post',
                        datatype : 'html',
                        data : data,
                        url : base_url+'/index.php?r=KPI/KPI_save',
                        success : function(data)
                        {
                          if (data != 'success') 
                            {
                                $("#err").show();
                                $("#err").fadeOut(6000); 
                                var obj = jQuery.parseJSON(data);
                                if (obj.kpi_name != undefined) 
                                    {
                                         $("#err").text(obj.kpi_name);
                                         $("#err").addClass("alert-danger");
                                         
                                    }
                                else if (obj.kpi_description != undefined) 
                                    {
                                         $("#err").text(obj.kpi_description);
                                         $("#err").addClass("alert-danger");
                                    }
                                else if (obj.department != undefined) 
                                    {
                                         $("#err").text(obj.department);
                                         $("#err").addClass("alert-danger");
                                    }                                
                            }
                            else
                            {
                                $("#err").show();
                                $("#err").fadeOut(6000);
                                $("#err").text("KPI Added Successfully");                               
                                $("#err").addClass("alert-success");
                                $("#ditable_1").load(location.href + " #ditable_1");
                                $('#user-form')[0].reset();
                            }
                        }
                    });
            });
            });                                         
          

          
            function getemplist()
            {                                                
                if($('.applicable_to').find(":selected").val() == 'Custom')
                {
                    $("#large").modal();
                }
                if($('.applicable_to').find(":selected").val() == 'Organization Chart')
                {
                    $("#org_chart").modal();
                }
            }
        </script>                           

            <div class="container-fluid">
                
                    <div id="emp_id_list" style="display: none"></div>
                    <div id="employee_list_data" style="display: none">
                    </div>
                   
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <style type="text/css">
                            .image-upload > input
                            {
                                display: none;
                            }
                    </style>
                   <div id="updation_spinner" style="float: right;margin-top: 16px;display: none">Please wait file upload is in process : <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;"></i></div>
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
                           
                            <?php $this->endWidget(); ?>
                             
                             <script type="text/javascript">
                            $(function(){
                                $("#file_change").change(function(){
                                    $("#uploaded_file").text($('#file-input').val());
                                     var e = document.getElementById("file-input");
                                     var file_data = $(e)[0].files[0];
                                     var formData = new FormData();
                                     formData.append("employee_csv",$('#file-input')[0].files[0]);             
                                     var ext = $("#file-input").val().split(".").pop().toLowerCase();
                                     //alert(ext);
                                     if($("#file-input").val()=='')
                                     {
                                        alert("Please Upload File file.");
                                     }
                                     else if(ext != 'xls')
                                     {
                                        alert("Only Excel files with extension .xls are allowed");
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
                                            'url' : base_url+'/yii/index.php?r=Export/kpi_export',
                                            success : function(data)
                                            {
                                                $("#uploaded_file").text('');
                                                $("#updation_spinner").hide();
                                                $("#file_uploaded_success").show();  
                                                $("#file_uploaded_success").fadeOut(6000);
                                               $("#ditable_1").load(location.href + " #ditable_1");
                                            }
                                        });
                                     }
                                     
                                    
                                });                                                                                    
                            });
                        </script>
                    <div class="page-content-container">
                        <div class="page-content-row">                            
                            <style type="text/css">
                                .dataTables_wrapper {
                                    padding-top: 23px;
                                }
                            </style>
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="err" style="display:none"></div>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit"  style="background: transparent none repeat scroll">                                            
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">   
                                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                                           'id'=>'user-form',                                                            
                                                            // 'action' => $this->createUrl('KRA/save_kra'),
                                                            'enableAjaxValidation' => false,
                                                            'enableClientValidation' => true,
                                                            'clientOptions' => array(
                                                                    'validateOnSubmit' => true,
                                                                    'afterValidate' => 'js:chk_kradata'

                                                            ),
                                                            'htmlOptions'=>array(
                                                                'class'=>'form-horizontal',
                                                                'enctype' => 'multipart/form-data'
                                                            ),
                                                        ));?>  
                                                        <label class="control-label" id="error_print"></label>
                                                        <div class="col-md-5">
                                                       <?php 
                                                       if(!isset($kra_edit_result)) 
                                                        { 
                                                             echo CHtml::button('Create',array('class'=>'btn green','id'=>'create_kra','style'=>'background-color: rgb(51, 122, 183)'));
                                                        }
                                                       ?>
                                                    </div> 
                                                   
                                                    <script type="text/javascript">
                                                        $(function(){
                                                            $("#create_kra").click(function(){
                                                                $("#new_kra").css('display','');
                                                            });                                                            
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                               
                                                <script type="text/javascript">
                                                    // $(function(){
                                                    //     $("#sample_1").DataTable();
                                                    // });
                                                </script>
                                            <div id="err" style="display: none"></div>
                                            <div class="portlet box " style='border:1px solid #337ab7;display: none'  id='new_kra'>
                                            <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                <div class="caption">
                                                    Add KPI</div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-bordered" id="sample_1">
                                                    <thead>
                                                        <tr>
                                                            <th> KPI Name </th>
                                                            <th> KPI Description </th>
                                                            <th> Department </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="kra_row">
                                                    <?php
                                                    $records1 = new ClusterForm();
                                                    $records = $records1->get_department_list();
                                                    $Department_id = array();
                                                    foreach ($records as $row) {
                                                      $Department_id[$row['department']] = $row['department'];
                                                    }                                                                       
                                                        $list_data = "<tr><td>".CHtml::textField('kpi_name','',array('class'=>'form-control','id'=>'kpi_name'))."</td>"."<td>".CHtml::textField("kpi_description",'',$htmlOptions=array('class'=>"form-control",'id'=>'kpi_desc'))."</td><td>".CHtml::activeDropDownList($records1,'department',$Department_id,$htmlOptions=array('class'=>"form-control",'id'=>'dept'))."</td></tr>";
                                                        echo $list_data;
                                                    ?>                                     
                                                    </tbody> 
                                                </table>
                                                     <?php                                  
                                                echo CHtml::button('Submit',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'add_kpi')); ?>
                                                </div>
                                            </div>
                                            </div>
                                             <div class="portlet box"  <?php if(!isset($kra_edit_result)) { ?>style="display: none"<?php }else{?>style='border:1px solid #337ab7;'<?php }?>>
                                                <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                    <div class="caption">
                                                        Add KRA</div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    
                                                <div class="col-md-7">
                                                <div class="col-md-3" style="float:right">
                                                <?php                                  
                                                echo CHtml::button('Submit',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);','onclick'=>'js:chk_kradata();')); ?>
                                                <a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=KRA/KPI_create'><?php  
                                                echo CHtml::button('Back',array('class'=>'btn green','style'=>'background-color: rgb(51, 122, 183);'));  
                                                ?></a>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                            </div>    
                                            </div>
                                            
                                        <?php $this->endWidget();?>
                                        <!-- <a class="btn purple btn-outline sbold" data-toggle="modal" href="#large"> View Demo </a> -->
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
      
                                        <div class="portlet box green" style="border:1px solid #337ab7">
                                    <div class="portlet-title" style="font-weight:bold ;background-color:#337ab7" >
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>KPI List </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            
                                        </div>
                                    </div>                                
                                <div class="portlet-body tabs-below">
                                    <div class="tab-content">                         
                                        <div class="table-responsive">
                                           <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
            <script type="text/javascript"> 
            var j = jQuery.noConflict();           
                $(function(){
                    j("#ditable_1").DataTable();
                });
            </script>
<table class="table table-striped table-hover table-bordered" id="ditable_1">
                                                    <thead>
                                                        <tr>
                                                            <th> KPI Name </th>
                                                            <th> KPI Description </th>
                                                            <th> Department </th>
                                                            <th> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="kra_row">                                                   
                                                         <?php
                                                            if (isset($kra_result) && count($kra_result)>0) { 
                                                                   foreach ($kra_result as $row) {
                                                            ?>                                                                
                                                            <tr class="odd gradeX">                    
                                                                <td> <?php echo $row['kpi_name']; ?> </td>
                                                                <td> <?php echo $row['kpi_description']; ?> </td>   
                                                                <td> <?php echo $row['department']; ?> </td>
                                                                <td>
                                                                <i class="fa fa-trash-o del_kra" style="cursor: pointer;font-size:30px;color: rgb(51, 122, 183);" id="kra_id-<?php echo $row['KPI_id']; ?>" title="Delete" aria-hidden="true"></i>
                                                            </td>
                                                            </tr>
                                                          <?php
                                                            }
                                                            }
                                                            else
                                                            { ?>
                                                                <tr>
                                                                    <td colspan='3'>No Record Found</td>
                                                                </tr>
                                                        <?php    }
                                                        ?>                                     
                                                    </tbody> 
                                                </table>
                                                            </div>
                                                             </div> </div> </div>           
                                       
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                <!-- BEGIN FOOTER -->
                
                <!-- END FOOTER -->
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
              
