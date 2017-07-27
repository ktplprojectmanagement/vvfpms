           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
            <script type="text/javascript"> 
            var j = jQuery.noConflict();           
                j(function(){
                    //alert("fdgf");
                    j("#ditable_1").DataTable();
                    $("#ditable_1").parent().css({
    'height' : '400px',
    'max-height' : '400px',
    'overflow-y' : 'scroll'
    });
                });
            </script>
            <style type="text/css">
                #ditable_1_filter
                {
                    float: right;
                }
               /* #ditable_1_paginate
                {
                    display: none;
                }*/
                #ditable_1_info
                {
                    display: none;
                }
            </style>
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
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Admin_Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Organization_flow">Organization Chart</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Organization Chart
                    </h3>
        <style media="all" type="text/css">
      
      #err { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 226px;
height: 50px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
      
      }
      #ditable_1_length
      {
        display: none;
      }
   </style>
        <script type="text/javascript">
            $(function(){
                $('.get_dept').change(function(){                                                    
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
                    url : base_url+'/index.php?r=Organization_flow/getdata',
                    success : function(data)
                    {
                       $('#dept_based_emp').html(data);
                    }
                });
            });
                $('body').on('click','.md-check',function(){
                     var checkedValues = $('.md-check:checked').map(function() {
                        return this.value;
                    }).get();
                    console.log(checkedValues);
                    $("#emp_id_list").text(checkedValues);                                           
                });
            $('body').on('change','.get_cluster',function(){
                $("#emp_id_list").text('');
            var dept_name = {
                Department : $('.get_dept').find(':selected').val(),
                cluster_name : $(this).find(':selected').val(),
            };
            //alert($(this).find(':selected').val());
            console.log(dept_name);
            var base_url = window.location.origin;
            $.ajax({
                type : 'post',
                datatype : 'html',
                data : dept_name,
                url : base_url+'/index.php?r=Organization_flow/getdata',
                success : function(data)
                {
                   $('#dept_based_emp').html(data);
                }
            });
        });
            $(".change_priority").click(function(){
                $("#err").text("");
                $("#err").removeClass("alert-success"); 
                $("#err").removeClass("alert-danger"); 
                $(window).scroll(function()
                {
                    $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                });
                var emp_id_list = $("#emp_id_list").text();
                if (emp_id_list == '') 
                {
                    $("#err").show();
                    $("#err").fadeOut(6000);
                    $("#err").addClass("alert-danger");
                    $("#err").text("Please select employee list.");
                }
                else
                {
                    var dev_id = emp_id_list.split(',');

                    var clustr_name_list = '',reporting_head = '';
                    var error = '';
                    for (var i = 0; i < dev_id.length; i++) {
                        if ($('#dept_based_id-'+dev_id[i]).find(':selected').val() == 'All') 
                        {
                            error = 'Please select Reporting head.';                            
                        }
                        else if($('#cluster_based_id-'+dev_id[i]).find(':selected').val() == 'All')
                        {
                            error = 'Please select Cluster.';
                        }
                        else
                        {
                            error = '';
                            if (clustr_name_list == '') 
                            {
                                clustr_name_list =  $('#dept_based_id-'+dev_id[i]).find(':selected').val();
                            }
                            else
                            {
                                clustr_name_list = clustr_name_list+';'+$('#dept_based_id-'+dev_id[i]).find(':selected').val();
                            }
                            if (reporting_head == '') 
                            {
                                reporting_head = $('#cluster_based_id-'+dev_id[i]).find(':selected').val();
                            }
                            else
                            {
                                reporting_head = reporting_head+';'+$('#cluster_based_id-'+dev_id[i]).find(':selected').val();
                            }
                        }
                    }                    
                    //alert(dev_id);
                    if (error != '') 
                    {
                        $("#err").show();
                        $("#err").fadeOut(6000);
                        $("#err").addClass("alert-danger");
                        $("#err").text(error);
                    }
                    else
                    {
                        var data = {
                        'employee_id' : emp_id_list,
                        'clustr_name_list' : reporting_head,
                        'reporting_head' : clustr_name_list,
                        };
                        var base_url = window.location.origin;
                         $.ajax({
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Organization_flow/chng_dept_head_data',
                            success : function(data)
                            {
                                $("#err").show();  
                                $("#err").fadeOut(6000);
                                $("#err").text("Successfully save changes");
                                $("#err").addClass("alert-success");
                            }
                        });  
                    }
                    
                }                
            });
             $('body').on('change','.change_dpt_head',function(){
                var id_value = $(this).attr('id');
                var id = id_value.split('-');
            var dept_name = {
                cluster_name : $(this).find(':selected').val(),
            };
            //alert($(this).find(':selected').val());
            console.log(dept_name);
            var base_url = window.location.origin;
            $.ajax({
                type : 'post',
                datatype : 'html',
                data : dept_name,
                url : base_url+'/index.php?r=Organization_flow/chng_dept_head',
                success : function(data)
                {
                   // alert(data);
                   $('#dept_based_id-'+id[1]).html(data); 
                }
            });
        });
            });
        </script>
        

        <div id="emp_id_list"></div>
                    
                    <div id='count_emp' style="display: none"><?php if(isset($employee_list_data) && count($employee_list_data)>0)
                            {echo count($employee_list_data); }?></div>
                    <div id='emp_data' style="display: none">
                        
                    </div>

                <div id="err" style="display: none"></div>
                   <?php 
                    $form=$this->beginWidget('CActiveForm', array(
                           'id'=>'user-form',
                            // 'enableClientValidation'=>true,
                            // 'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                            'action' => $this->createUrl('Organization_flow/chartdata'),
                           'enableAjaxValidation'=>false,                            
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    'afterValidate' => 'js:checkErrors'

                            ),
                            'htmlOptions'=>array(
                                'class'=>'form-horizontal',
                                'enctype' => 'multipart/form-data'
                            ),
                        ));
                        ?>        
                    <div class="col-md-12"><br>
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                                echo CHtml::submitButton('View',array('class'=>'btn green pull-right','id'=>'login_check','style'=>"border: 1px solid rgb(76, 158, 217);float: right;"));
                            ?>
                           <!-- <input type="button" id="modal-954288" role="button" class="btn" data-toggle="modal" value="View" style="border: 1px solid rgb(76, 158, 217);float: right;"> -->
                            <div class="col-md-3">
                                <label class="control-label ">Select Cluster : </label> 
                                <?php
                                    $cluster_name1 = new ClusterForm;
                                    $cluster_name2 = $cluster_name1->get_distinct_list('cluster_name','where 1');
                                    if (isset($cluster_name2) && count($cluster_name2)>0) { 
                                        $list = CHtml::listData($cluster_name2,'cluster_name', 'cluster_name');
                                         echo CHtml::dropDownList("cluster_name",'',$list,$htmlOptions=array('class'=>"form-control get_cluster",'style'=>"width: 186px;",'id'=>'get_cluster'));
                                    }
                                ?>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label ">Select Department : </label>
                                <?php
                                 $diff_Department2 = $cluster_name1->get_distinct_list('department','where 1');
                                 //print_r($diff_Department2);die();
                                    if (isset($diff_Department2) && count($diff_Department2)>0) {
                                        $list = CHtml::listData($diff_Department2,'department', 'department');
                                         echo CHtml::dropDownList("dept_name",'',$list,$htmlOptions=array('class'=>"form-control get_dept",'style'=>"width: 186px;",'id'=>'get_dept'));
                                    }
                                ?>  
                            </div>
                               <?php $this->endWidget(); ?>
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box blue table-responsive" style="margin-top: 85px;">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                Employee Data</div>
                                            <div class="tools">
                                               <!--  <a href="javascript:;" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="javascript:;" class="reload"> </a>
                                                <a href="javascript:;" class="remove"> </a> -->
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="">
                                              <table class="table table-striped table-bordered table-hover table-fixedheader" id='ditable_1'>
                                              <thead class="thead-default">
                                                        <tr> 
                                                            <th>No</th>                                                       
                                                            <th>Employee ID</th>
                                                            <th>First&nbsp;name</th>
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Repoting To</th>
                                                            <th>Change Cluster</th>
                                                            <th>Change Head</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dept_based_emp">
                                                        <?php
                                                        if (isset($employee_list)) {
                                                            for ($i=0; $i < count($employee_list); $i++) { ?>
                                                            <tr>
                                                                <td><input id="checkbox1" class="md-check" type="checkbox" value="<?php echo $employee_list['0']['Employee_id']; ?>"></td>
                                                                <td><?php echo $employee_list[$i]['Employee_id']; ?></td>
                                                                <td><?php echo $employee_list[$i]['Emp_fname']; ?></td>
                                                                <td><?php echo $employee_list[$i]['Designation']; ?></td>
                                                                <td><?php echo $employee_list[$i]['Department']; ?></td>
                                                                <td><?php echo $employee_list[$i]['Email_id']; ?></td>  
                                                                <td>
                                                                    <select id=" cluster_based_id-<?php echo $employee_list[$i]['Employee_id']; ?>" class="form-control change_dpt_head" style="width: 186px;"name="get_cluster">
                                                                                <option value="All">All</option>
                                                                                <?php
                                                                                    if (isset($diff_cluster) && count($diff_cluster)>0) {
                                                                                        foreach ($diff_cluster as $row1) { ?>
                                                                                            <option value="<?php echo $row1['cluster_name'];?>"><?php echo $row1['cluster_name'];?></option>
                                                                                <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                </select>
                                                                </td>
                                                                <td>
                                                                    <select id="dept_based_id-<?php echo $employee_list[$i]['Employee_id']; ?>" class="form-control" style="width: 186px;"name="get_dept" id="get_cluster_dept">
                                                                            <option value="All">All</option>
                                                                            <?php
                                                                                if (isset($diff_reporting_head) && count($diff_reporting_head)>0) {
                                                                                    $cnt = 0;
                                                                                    foreach ($diff_reporting_head as $row2) { ?>
                                                                                        <option value="<?php echo $row2['Reporting_officer1_id'];?>"><?php if(isset($dep_head_data[$cnt]['0']['Emp_fname'])) { echo $dep_head_data[$cnt]['0']['Emp_fname']." ".$dep_head_data[$cnt]['0']['Emp_lname'];}?></option>
                                                                            <?php
                                                                                        $cnt++;
                                                                                    }
                                                                                }
                                                                            ?>
                                                                    </select>
                                                                </td>
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
                                                <?php
                                                    if (isset($employee_list) && count($employee_list)>0 && count($employee_list)!='') {
                                                ?>
                                                <div class="col-md-6" style="margin: top:-28px;float: right;">
                                                <input type="button" role="button" class="btn change_priority" value="Change" style="border: 1px solid rgb(76, 158, 217);float: right;margin-top: -45px;">
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                           <!--  <div class="col-md-2">
                                <div id='chart'>
     
                                </div>
                            </div> -->
                        </div>
                    </div>
                     <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Employee Chart</h4>
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
                        <!-- <button type="button" class="btn green">Confirm changes</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>            
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->
