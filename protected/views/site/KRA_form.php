            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
             <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
             <script type="text/javascript">
             var $j = jQuery.noConflict();
                 $j(function(){
                    $j("body").on('click','.assign_kra',function(){
                    $j('#large').modal({backdrop:'static',keyboard:false, show:true});
                    var id = $(this).attr('id');
                    $("#kra_id_value").text(id);
                });
                });
             </script>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
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
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php?r=KRA/kra_create">KRA Form</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> KRA Form
                    </h3>
   
                        <!-- BEGIN PAGE BREADCRUMBS -->                       
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                                   
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

        
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p> Are you sure you want to delete this KRA?
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                            <button type="button" data-dismiss="modal" class="btn green" id="continue_goal_set">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="emp_id_list" style="display: none"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
             <script type="text/javascript">
        var j = jQuery.noConflict();
            $(function(){
        j("body").on("click",".del_kra", function(){
                     j("#static").modal('show');                                         
                    var id = $(this).attr('id');
                    var id_code = id.split('-');
                    var data = {
                        'KRA_id' : id_code[1],
                    };
                    var base_url = window.location.origin;
                    $("#continue_goal_set").click(function(){
                        $.ajax({
                        type : 'post',
                        data : data,
                        url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/kra_del',
                        success : function(data)
                        {
                            if(data == 1)
                            {
                                $("#sample_1").load(location.href + " #sample_1");
                                // $(".del_kra").click(function(){

                                // });
                            }
                        }
                    });
                    });                    
                });
        });
            $(function(){  
            $(".checkBoxClass").click(function () {
                $(".md-check").prop('checked', $(this).prop('checked'));
            });        
                
                $('.get_dept').change(function(){ 
                $('.checkBoxClass').prop('checked', false);                                                   
                var dept_name = {
                    Department : $(this).find(':selected').val(),
                    cluster_name : $('.get_cluster').find(':selected').val(),
                };
                console.log(dept_name);
                var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : dept_name,
                    url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/getdata',
                    success : function(data)
                    {
                       $('#dept_based_emp').html(data);  
                       $('.md-check').click(function(){
                             var checkedValues = $('.md-check:checked').map(function() {
                                return this.value;
                            }).get();
                            console.log(checkedValues);
                            $("#emp_id_list").text(checkedValues);                                           
                        });                             
                    }
                });
            });
            $('.get_cluster').change(function(){
            $('.checkBoxClass').prop('checked', false);
            var dept_name = {
                Department : $('.get_dept').find(':selected').val(),
                cluster_name : $(this).find(':selected').val(),
            };
            console.log(dept_name);
            var base_url = window.location.origin;
            $.ajax({
                type : 'post',
                datatype : 'html',
                data : dept_name,
                url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/getdata',
                success : function(data)
                {
                   $('#dept_based_emp').html(data);  
                   $('.md-check').click(function(){
                         var checkedValues = $('.md-check:checked').map(function() {
                            return this.value;
                        }).get();
                        console.log(checkedValues);
                        $("#emp_id_list").text(checkedValues);                                           
                    });                             
                }
            });
        });
            $('.md-check').click(function(){
                     var checkedValues = $('.md-check:checked').map(function() {
                        return this.value;
                    }).get();
                    console.log(checkedValues);
                    $("#emp_id_list").text(checkedValues);                                           
                }); 
            $("#submit_emp_kra").click(function(){
                $("#error").text("");
                    $("#error").removeClass("alert-success"); 
                    $("#error").removeClass("alert-danger"); 
                    $(window).scroll(function()
                    {
                        $('#error').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                     });
                var data = {
                    'emp_list' : $("#emp_id_list").text(),
                    'kra_id_value' : $("#kra_id_value").text()
                    //pplicable_date' : $("#applicable_date").val()
                };
                if($("#get_cluster").find(':selected').val() == 'Select')
                {
                    $("#error").show();  
                    $("#error").fadeOut(6000);
                    $("#error").text("Please Select Cluster");
                    $("#error").addClass("alert-danger");
                }
                else if($("#get_dept").find(':selected').val() == 'Select')
                {
                    $("#error").show();  
                    $("#error").fadeOut(6000);
                    $("#error").text("Please Select Department");
                    $("#error").addClass("alert-danger");
                }
                else if($("#emp_id_list").text() == '')
                {
                    $("#error").show();  
                    $("#error").fadeOut(6000);
                    $("#error").text("Please Select Employee To assign KRA");
                    $("#error").addClass("alert-danger");
                }               
                else{
        $("#error").hide(); 
                    var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : data,
                    url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/kra_requst',
                    success : function(data)
                    {
                       if (data !=0) 
                       {
                            $("#error").show();  
                            $("#error").fadeOut(6000);
                            $("#error").text("Successfully save changes");
                            $("#error").addClass("alert-success");
                       }
                    }
                });                   
                }
                
            });
            });                                         
          
    $(function(){
                $("#kra_edit").click(function(){
$("#err").text("");
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger"); 
                    $(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
                    var catergory = $("#KRA_category_edit").val().length;
                     
                        var targetlist = '';
                        for (var i = 1; i <= 5; i++) {
                            if (targetlist == '') 
                            {
                                targetlist = $('#Target'+i+i+':checked').val();
                            }
                            else
                            {
                                targetlist = targetlist+';'+$('#Target'+i+i+':checked').val();
                            }
                        }
                        
                        details = $("#KRA_category_edit").val()+','+$("#No_of_KPI_edit").val();
                        data = {
                            'catergory' : $("#KRA_category_edit").val(),
                            'kpi_number' : $("#No_of_KPI_edit").val(),
                            'minimum_kpi' : $("#minimum_kpi").val(),
                            'targetlist' : targetlist,
                            'Cadre' : $("#selected_cader1").find(':selected').val(),
                            'min_kpi_wt' : $("#min_kpi_wt").val(),
                            'KRA_id' : $("#KRA_id").val(),
                        };
                        //alert($("#min_kpi_wt").val());
                         //alert($("#KRA_category_edit").val());alert($("#No_of_KPI_edit").val());alert($("#minimum_kpi").val());alert($("#selected_cader1").find(':selected').val());alert($("#KRA_id").val());alert(targetlist);
                                                 console.log(data);
                        var base_url = window.location.origin;
                        $.ajax({
                            type : 'post',
                            data : data,
                            url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/kra_update',
                            success : function(data)
                            {
                               // alert(data);
                               $("#err").text('');                                                        
                                        if (data != 'success' && data != 1) 
                                        {
                                            $("#err").show();  
                                            $("#err").fadeOut(6000);
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.KRA_category != undefined) 
                                                {
                                                     $("#err").text(obj.KRA_category);
                                                     $("#err").addClass("alert-danger");
                                                     
                                                }
                                            else if (obj.No_of_KPI != undefined) 
                                                {
                                                     $("#err").text(obj.No_of_KPI);
                                                     $("#err").addClass("alert-danger");
                                                }
                                            else if (obj.minimum_kpi != undefined) 
                                                {
                                                     $("#err").text(obj.minimum_kpi);
                                                     $("#err").addClass("alert-danger");
                                                }
                                                else if (obj.Cadre != undefined) 
                                                {
                                                     $("#err").text("Please Select the cadre");
                                                     $("#err").addClass("alert-danger");
                                                }
                                                else if (obj.targetlist != undefined) 
                                                {
                                                     $("#err").text("Please Check requried target");
                                                     $("#err").addClass("alert-danger");
                                                }
                                        }
                                        else
                                        {  
                                            $("#err").show();  
                                            $("#err").fadeOut(6000); 
                                             if($("#No_of_KPI_edit").val()>10)
                                            {
                                             $("#err").text("Please enter Number upto 10 in No of KPI field");
                                             $("#err").addClass("alert-danger");
                                            }
                                            else if(parseInt($("#minimum_kpi").val())>parseInt($("#No_of_KPI_edit").val()))
                                            {
                                             $("#err").text("Please enter valid Number in Minimum KPI field");
                                             $("#err").addClass("alert-danger");
                                            }                                            
                                            else
                                            {
                                                data = {
                                                    'catergory' : $("#KRA_category_edit").val(),
                                                    'kpi_number' : $("#No_of_KPI_edit").val(),
                                                    'minimum_kpi' : $("#minimum_kpi").val(),
                                                    'targetlist' : targetlist,
                                                    'min_kpi_wt' : $("#min_kpi_wt").val(),
                                                    'Cadre' : $("#selected_cader1").find(':selected').val(),
                                                    'KRA_id' : $("#KRA_id").val(),
                                                    'validation_flag' : 1  
                                                };
                                                
                                                    var base_url = window.location.origin;
                                                    $.ajax({
                                                        type : 'post',
                                                        data : data,
                                                        url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/kra_update',
                                                        success : function(data)
                                                        {
                                                            //alert(data);
                                                            $("#err").show();
                                                            $("#err").fadeOut(6000);
                                                            $("#err").text("Successfully Submit");
                                                            $("#err").addClass("alert-success");
                                                           if(data == 1)
                                                            {
                                                                $("#sample_1").load(location.href + " #sample_1");
                                                            }
                                                        }
                                                    });
                                            }
                                        }
                            }
                        });
                 
                        });
});
            $(function(){
                    $("#kra_submit").click(function(){
            $("#err").text("");
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger"); 
                    $(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });

                    if($("#KRA_category_edit").val()!='')
                    {
                        details = $("#KRA_category_edit").val()+','+$("#No_of_KPI_edit").val();
                        data = {
                            'catergory' : $("#KRA_category_edit").val(),
                            'kpi_number' : $("#No_of_KPI_edit").val(),
                            'minimum_kpi' : $("#minimum_kpi").val(),
                            'maximum_kpi' : $("#maximum_kpi").val(),
                            'KRA_id' : $("#KRA_id").val(),
                        };
                        console.log(data);
                        var base_url = window.location.origin;

                        $.ajax({
                            type : 'post',
                            data : data,
                            url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/kra_update',
                            success : function(data)
                            {
                                //alert(data);
                                $("#err").show();
                                $("#err").fadeOut(6000);
                                $("#err").text("Successfully Updated");
                                $("#err").addClass("alert-success");
                                if(data == 1)
                                {
                                    $("#sample_1").load(location.href + " #sample_1");
                                }
                            }
                        });
                    }
                    else if($("#KRA_category_edit").val()=='')
                    {
                        var targetlist = '';
                        for (var i = 1; i <= 5; i++) {
                            if (targetlist == '') 
                            {
                                targetlist = $('#Target'+i+':checked').val();
                            }
                            else
                            {
                                targetlist = targetlist+';'+$('#Target'+i+':checked').val();
                            }
                        }
                       data = {
                            'catergory' : $("#KRA_category_0").val(),
                            'kpi_number' : $("#No_of_KPI0").val(),
                            'minimum_kpi' : $("#minimum_kpi0").val(),
                            'targetlist' : targetlist,
                            'min_kpi_wt' : $("#minimum_kpi_wt0").val(),
                            'Cadre' : $("#selected_cader").find(':selected').val(),                            
                            //'validation_flag' : 1  
                        };
                       var base_url = window.location.origin;

                                 $.ajax({
                                    'type' : 'post',
                                    'datatype' : 'json',
                                    'data' : data,
                                    'url' : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/save_kra',
                                     success : function(data)
                                     {
                                       //alert("in");
                                         $("#err").text('');                                                        
                                        if (data != 'success' && data != '1') 
                                        {
                        $("#err").show();  
                                            $("#err").fadeOut(6000);
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.KRA_category != undefined) 
                                                {
                                                     $("#err").text(obj.KRA_category);
                                                     $("#err").addClass("alert-danger");
                                                     
                                                }
                                            else if (obj.No_of_KPI != undefined) 
                                                {
                                                     $("#err").text(obj.No_of_KPI);
                                                     $("#err").addClass("alert-danger");
                                                }
                                            else if (obj.minimum_kpi != undefined) 
                                                {
                                                     $("#err").text(obj.minimum_kpi);
                                                     $("#err").addClass("alert-danger");
                                                }
                                        }
                                        else
                                        {  
                                            $("#err").show();  
                                            $("#err").fadeOut(6000); 
                                             if($("#No_of_KPI0").val()>10)
                                            {
                                             $("#err").text("Please enter Number upto 10 in No of KPI field");
                                             $("#err").addClass("alert-danger");
                                            }
                                            else if((parseInt($("#minimum_kpi0").val())>parseInt($("#No_of_KPI0").val())))
                                            {
                                             $("#err").text("Please enter valid Number in Minimum KPI field");
                                             $("#err").addClass("alert-danger");
                                            }
                                            else
                                            {
                                              $("#err").hide();
                                                 data = {
                                                        'catergory' : $("#KRA_category_0").val(),
                                                        'kpi_number' : $("#No_of_KPI0").val(),
                                                        'minimum_kpi' : $("#minimum_kpi0").val(),
                                                        'targetlist' : targetlist,
                                                        'min_kpi_wt' : $("#minimum_kpi_wt0").val(),
                                                        'Cadre' : $("#selected_cader").find(':selected').val(),                            
                                                        'validation_flag' : 1  
                                                    };
                                                    var base_url = window.location.origin;
                                                    $.ajax({
                                                        type : 'post',
                                                        data : data,
                                                        url : base_url+$("#basepath").attr('value')+'/index.php?r=KRA/save_kra',
                                                        success : function(data)
                                                        {
                                                            //alert(data);
                                                            $("#err").show();
                                                            $("#err").fadeOut(6000);
                                                            $("#err").text("Successfully Submit");
                                                            $("#err").addClass("alert-success");
                                                           if(data == 1)
                                                            {
                                                                $("#sample_1").load(location.href + " #sample_1");
                                                                $('#user-form')[0].reset();
                                                            }
                                                        }
                                                    });
                                            }
                                        }
                                    }
                                    });
                    }

        });
            });
        


            
        </script> 
                           
<script type="text/javascript">
$(function(){

$("#applicable_to_list").change(function(){alert($('.applicable_to').find(":selected").val());
if($('.applicable_to').find(":selected").val() == 'Custom')
                {
        jQuery("#large").modal('show'); 
                }
                if($('.applicable_to').find(":selected").val() == 'Organization Chart')
                {
                    $("#org_chart").modal();
                }
    });
});
 </script>
            <div class="container-fluid">
                
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
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
                                        <div class="portlet light portlet-fit" style="background: transparent none repeat scroll">                                            
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
                                                           <!--  <label class="control-label">Number Of KRA &nbsp;</label> -->
                                                            <div class="btn-group">
                                                            <?php
                                                            $model->No_of_KPI='1';
                                                             echo $form->textField($model,'No_of_KPI',array('class'=>'form-control','id'=>'kra_num','style'=>'display:none')); ?>
                                                            </div>
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
                                                    $(function(){
                                                        $("#sample_1").DataTable();
                                                    });
                                                </script>
                                            <div id="err" style="display: none"></div>
                                            <div class="portlet box " style='border:1px solid #337ab7;display: none'  id='new_kra'>
                                            <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                <div class="caption">
                                                    Add KRA</div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-bordered" >
                                                    <tbody id="kra_row">
                                                    <tr>
                                                        <td> Category Name </td><td><?php echo CHtml::textField('KRA_category0','',array('class'=>'form-control','id'=>'KRA_category_0','style'=>'width: 220px;')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Number Of KPI </td><td><?php echo CHtml::textField("No_of_KPI0",'',$htmlOptions=array('class'=>"form-control",'style'=>'width: 220px;')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Minimum KPI </td><td><?php echo CHtml::textField("minimum_kpi0",'',$htmlOptions=array('class'=>"form-control",'style'=>'width: 220px;')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Minimum KPI wt. </td><td><?php echo CHtml::textField("minimum_kpi_wt0",'',$htmlOptions=array('class'=>"form-control",'style'=>'width: 220px;')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Cader </td>
                                                        <td>
                                                            <?php 
                                                             $cader_form = new EmployeeForm();
                                                             $records = $cader_form->get_distinct_list('Cadre','where Cadre!=""');
                                                            $list = CHtml::listData($records,'Cadre', 'Cadre');                                        
                                                            echo CHtml::activeDropDownList($cader_form,'Cadre',$list,array('class'=>'form-control Cadre','empty'=>'Select','id'=>'selected_cader','style'=>'width: 220px;')); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Minimum Targer Required </td>
                                                        <td>
                                                            <?php
                                                                echo 'Target 1 : '.CHtml::checkBox('TargetList', false, array('value'=>'Target1', 'id'=>'Target1')).' ';
                                                                echo 'Target 2 : '.CHtml::checkBox('TargetList', false, array('value'=>'Target2', 'id'=>'Target2')).' ';
                                                                echo 'Target 3 : '.CHtml::checkBox('TargetList', false, array('value'=>'Target3', 'id'=>'Target3')).' ';
                                                                echo 'Target 4 : '.CHtml::checkBox('TargetList', false, array('value'=>'Target4', 'id'=>'Target4')).' ';
                                                                echo 'Target 5 : '.CHtml::checkBox('TargetList', false, array('value'=>'Target5', 'id'=>'Target5')).' ';
                                                            ?>
                                                        </td>
                                                    </tr>                                                                                
                                                    </tbody> 
                                                </table>
                                                     <?php                                  
                                                echo CHtml::button('Submit',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'kra_submit')); ?>
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
                                                 <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-bordered" >
                                                    <tbody id="edit_data">
                                                    <tr>
                                                        <td> Category Name </td>
                                                        <td> 
                                                        <?php 
                                                             $kra_category_edit = '';$kpi_edit = '';$KRA_id = '';$minimum_kpi = '';$maximum_kpi = '';
                                                             if (isset($kra_edit_result)) {
                                                                $kra_category_edit = $kra_edit_result['0']['KRA_category'];
                                                             }
                                                             echo CHtml::textField('KRA_category_edit',$kra_category_edit,array('class'=>'form-control','id'=>'KRA_category_edit')); 
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Number Of KPI </td>
                                                        <td>
                                                        <?php
                                                         if (isset($kra_edit_result)) {
                                                            $kpi_edit = $kra_edit_result['0']['No_of_KPI'];
                                                         }
                                                        if (isset($kra_edit_result)) {
                                                            $KRA_id = $kra_edit_result['0']['KRA_id'];
                                                         }
                                                         echo CHtml::textField("KRA_id",$KRA_id,$htmlOptions=array('class'=>"form-control",'id'=>'KRA_id','style'=>"display:none"));
                                                         echo CHtml::textField("No_of_KPI_edit",$kpi_edit,$htmlOptions=array('class'=>"form-control",'id'=>'No_of_KPI_edit')); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Minimum KPI </td>
                                                        <td>
                                                         <?php
                                                             if (isset($kra_edit_result)) {
                                                                $minimum_kpi = $kra_edit_result['0']['minimum_kpi'];
                                                             }                                                                   
                                                             echo CHtml::textField("minimum_kpi",$minimum_kpi,$htmlOptions=array('class'=>"form-control",'id'=>'minimum_kpi'));
                                                        ?>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td> Minimum KPI wt </td>
                                                        <td>
                                                         <?php
                                                             if (isset($kra_edit_result)) {

                                                                $minimum_kpi = $kra_edit_result['0']['min_kpi_wt'];
                                                             }                                                                   
                                                             echo CHtml::textField("min_kpi_wt",$minimum_kpi,$htmlOptions=array('class'=>"form-control",'id'=>'min_kpi_wt'));
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Cader </td>
                                                        <td>
                                                            <?php 
                                                             $cader_form = new EmployeeForm();
                                                             if (isset($kra_edit_result['0']['Cadre'])) {
                                                                 $kpi_category[$kra_edit_result['0']['Cadre']] = array('selected' => 'selected');
                                                             }
                                                             else
                                                             {
                                                                $kpi_category = array('selected' => 'selected');
                                                             }
                                                            
                                                             $records = $cader_form->get_distinct_list('Cadre','where Cadre!=""');
                                                            $list = CHtml::listData($records,'Cadre', 'Cadre');                                        
                                                            echo CHtml::activeDropDownList($cader_form,'Cadre',$list,array('class'=>'form-control Cadre','empty'=>'Select','id'=>'selected_cader1','style'=>'width: 220px;','options' => $kpi_category)); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Minimum Targer Required </td>
                                                        <td>
                                                            <?php
                                                                $target1 = false;
                                                                $target2 = false;
                                                                $target3 = false;
                                                                $target4 = false;
                                                                $target5 = false;
                                                                if (isset($kra_edit_result['0']['TargetList'])) {
                                                                   $TargetList = $kra_edit_result['0']['TargetList'];
                                                                   $TargetList1 = explode(';',$TargetList);
                                                                    for ($l=0; $l < count($TargetList1); $l++) { 
                                                                        if ($TargetList1[$l] == 'Target1') {
                                                                           $target1 = true; 
                                                                        }
                                                                        if ($TargetList1[$l] == 'Target2') {
                                                                           $target2 = true; 
                                                                        }
                                                                        if ($TargetList1[$l] == 'Target3') {
                                                                           $target3 = true; 
                                                                        }
                                                                        if ($TargetList1[$l] == 'Target4') {
                                                                           $target4 = true; 
                                                                        }
                                                                        if ($TargetList1[$l] == 'Target5') {
                                                                           $target5 = true; 
                                                                        }
                                                                    }
                                                                }
                                                                
                                                                
                                                                
                                                                echo 'Target 1 : '.CHtml::checkBox('TargetList', $target1, array('value'=>'Target1', 'id'=>'Target11')).' ';
                                                                echo 'Target 2 : '.CHtml::checkBox('TargetList', $target2 , array('value'=>'Target2', 'id'=>'Target22')).' ';
                                                                echo 'Target 3 : '.CHtml::checkBox('TargetList', $target3, array('value'=>'Target3', 'id'=>'Target33')).' ';
                                                                echo 'Target 4 : '.CHtml::checkBox('TargetList', $target4, array('value'=>'Target4', 'id'=>'Target44')).' ';
                                                                echo 'Target 5 : '.CHtml::checkBox('TargetList', $target5, array('value'=>'Target5', 'id'=>'Target55')).' ';
                                                            ?>
                                                        </td>
                                                    </tr>                                                                                
                                                    </tbody> 
                                                </table>
                                                <div class="col-md-7" style='margin-bottom: 10px;'>
                                                    <div class="col-md-5" style="float:right">
                                                    <?php                                  
                                                    echo CHtml::button('Update',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'kra_edit')); ?>
                                                    <a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=KRA/kra_create'><?php  
                                                    echo CHtml::button('Back',array('class'=>'btn green','style'=>'background-color: rgb(51, 122, 183);width: 75px;'));  
                                                    ?></a>
                                                </div>
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
                                            <i class="fa fa-gift"></i>KRA List </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            
                                        </div>
                                    </div>
                                
                                <div class="portlet-body tabs-below">
                                    <div class="tab-content">                         
                                        <div class="table-responsive">

                                         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                                <thead>
                                                                    <tr>                                                                        
                                                                        <th>Category Name</th>
                                                                        <th>Number Of KPI</th>
                                                                        <th> Applicability </th>
                                                                        <th> Action </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (isset($kra_result) && count($kra_result)>0) { 
                                                                           foreach ($kra_result as $row) {
                                                                    ?>                                                                
                                                                    <tr class="odd gradeX">                    
                                                                        <td> <?php echo $row['KRA_category']; ?> </td>
                                                                        <td> <?php echo $row['No_of_KPI']; ?> </td> 
                                                                        <td>
                                                                            <input type="button" id="<?php echo $row['KRA_id']; ?>" class="btn assign_kra" value="Custom" style="border: 1px solid rgb(76, 158, 217);">
                                                                         </td>                    
                                                                        <td>
                                                                             <a href="<?php echo $this->createUrl('index.php/KRA/kra_edit', array('KRA_id' => $row['KRA_id']));
     ?>"><i class="fa fa-pencil fa-fw" title="Delete" aria-hidden="true" style="cursor: pointer;font-size: 30px;color: rgb(51, 122, 183);"></i></a>
     <?php if($row['kra_assign_flag'] != 1) { ?><i class="fa fa-trash-o del_kra" style="cursor: pointer;font-size: 30px;color: rgb(51, 122, 183);" id="kra_id-<?php echo $row['KRA_id']; ?>" title="Delete" aria-hidden="true"></i><?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                  <?php
                                                                    }
                                                                    }
                                                                    else
                                                                    { ?>
                                                                        <tr>
                                                                            <td colspan='6'>No Record Found</td>
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
            </div>
        </div>

         <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Employee List</h4>

                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                        <label id='kra_id_value'></label>
                        <div class="col-md-12">
                            <div id="error" style="display:none"></div>
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light bordered">
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#employee_table').DataTable();
                                                });
                                            </script>
                                            <div class="portlet-body"> 
                                            <table class="table"> 
                                            <tr>   
                                            <td>                                        
                                            <label class="control-label ">Select Cluster : </label>
                                            
                                            <select class="form-control get_cluster" style="width: 186px;"name="get_cluster" id="get_cluster">
                                                            <option value="All">All</option>
                                                            <?php
                                                                if (isset($diff_cluster) && count($diff_cluster)>0) {
                                                                    foreach ($diff_cluster as $row) { ?>
                                                                        <option value="<?php echo $row['cluster_name'];?>"><?php echo $row['cluster_name'];?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                            </select>
                                            </td>
                                            <td>
                                            <label class="control-label ">Select Department : </label>
                                           
                                            <select class="form-control get_dept" style="width: 186px;"name="get_dept" id="get_dept">
                                            <option value="All">All</option>
                                            <?php
                                                if (isset($diff_Department) && count($diff_Department)>0) {
                                                    foreach ($diff_Department as $row) { ?>
                                                        <option value="<?php echo $row['Department'];?>"><?php echo $row['Department'];?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </select>
                                           
                                            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                                            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                                            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                                            <script>
                                              // var $j = jQuery.noConflict();///////// important//////////////
                                              // jQuery(function() {
                                              //   $j( ".applicable_date" ).datepicker({dateFormat: 'yy-M-dd',changeMonth: true,changeYear: true,yearRange: '1900:2050'});                                               
                                              // });
                                              </script></td>
                                              <td>
                                           <!--  <label class="control-label ">Applicable Date
                                                <span class="required"> * </span>
                                            </label> -->
                                           
                                                <?php 
                                                // echo CHtml::textField('applicable_date','',array('class'=>'form-control applicable_date','id'=>'mask_date'));
                                                ?>
                                            
                                            <div></td>
                                            </tr> 
                                            </table>
                                            <style type="text/css">
                                               .table-fixedheader{
                                                 width: 100%;
                                               }
                                            </style>
                                                <br>
                                            <div style="overflow-y: scroll;height: 389px;">
                                                <table class="table table-striped table-bordered table-hover table-fixedheader">
                                              <thead class="thead-default">
                                                        <tr>  
                                                            <th>No</th>                                                          
                                                            <th>Employee ID</th>
                                                            <th>First&nbsp;name</th>
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Repoting To</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dept_based_emp">
                                                    <?php
                                                        if (isset($employee_list)) {
                                                           foreach ($employee_list as $row) { ?>
                                                            <tr>
                                                                <td><input id="checkbox1" class="md-check" type="checkbox" value="<?php echo $row['Employee_id']; ?>"></td>
                                                                <td><?php echo $row['Employee_id']; ?></td>
                                                                <td><?php echo $row['Emp_fname']; ?></td>
                                                                <td><?php echo $row['Designation']; ?></td>
                                                                <td><?php echo $row['Department']; ?></td>
                                                                <td><?php echo $row['Email_id']; ?></td>             
                                                            </tr>
                                                       
                                                        <?php    }
                                                        }
                                                        else
                                                        { ?>
                                                            <tr>
                                                                <td colspan='6'>No Record Found</td>
                                                            </tr>
                                                    <?php    }
                                                    ?>                        
                                                    </tbody>
                                                </table>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                    </div>
                    <div class="modal-footer">
                        <lable  style="float: left;">Select All:<input  class="checkBoxClass" type="checkbox" style="margin-left: 10px;"></lable>
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green" id="submit_emp_kra">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- END CONTAINER -->
        
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.orgchart.css" rel="stylesheet" type="text/css" />       
        <div class="modal fade bs-modal-lg" id="org_chart" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Employee List</h4>
                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                        <div class="col-md-12">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light bordered">                                            
                                            <div class="portlet-body">
                                                <div id='chart'>
     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
           
        </div>
        <!-- END CONTAINER -->

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
    
        </div>
        <!-- END CONTAINER -->
