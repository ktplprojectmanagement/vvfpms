                   <!-- BEGIN CONTENT -->
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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Blank Page</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Page Layouts</span>
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
      
   </style>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1", { packages: ["orgchart"] });
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = new google.visualization.DataTable();
//                         data.addColumn('string', 'Entity');
//                         data.addColumn('string', 'ParentEntity');
//                         data.addColumn('string', 'ToolTip');
                            data.addColumn('string', 'Name');
                            data.addColumn('string', 'Manager');
                            data.addColumn('string', 'ToolTip');
                        var all_emp_list = $('#tree_data').text();
                        var emp_apr_list = all_emp_list.split(',');
                        var head_emp_list = $('#head_tree_data').text();
                        var head_emp_all_list = head_emp_list.split(',');
                        var designation = ['Developer','Tester','Designer'];
                        var count_data = $('#count_emp').text();

// //console.log(department);console.log(get_list_count.length);
                        for (var i = 0; i < emp_apr_list.length; i++) {                     
                            var get_list = emp_apr_list[i].trim();                           
                            var get_list_count = get_list.split(';');
                            // for (var k = 0; k < 0; k++) {
                            //     Things[i]
                            // }
                          //alert(get_list_count[0]);alert(get_list_count[1]);
                            data.addRows([[get_list_count[1],get_list_count[0], get_list_count[1]]]);
                        }
                        
                        // for (var i = 0; i <head_emp_all_list.length; i++) {
                        //     data.addRows([[head_emp_all_list[i],'VVF', 'VVF']]);
                        // }
                        
                        // For each orgchart box, provide the name, manager, and tooltip to show.
                        // data.addRows([
                        //   [{v:'Mike', f:'Mike<div style="color:red; font-style:italic">President</div>'},
                        //    '', 'The President'],
                        //   [{v:'Jim', f:'Jim<div style="color:red; font-style:italic">Vice President</div>'},
                        //    'Mike', 'VP'],
                        //   ['Alice', 'Mike', ''],
                        //   ['Bob', 'Jim', 'Bob Sponge'],
                        //   ['Bob1', 'Jim', 'Bob Sponge1'],
                        //   ['Bob2', 'Jim', 'Bob Sponge2'],
                        //   ['Carol', 'Bob', '']
                        // ]);

                        console.log($("#chart")[0]);
                        var chart = new google.visualization.OrgChart(document.getElementById('chart'));
                        chart.draw(data, { allowHtml: true });
            }        
        </script>
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
                    url : base_url+'/pmsuser/index.php?r=Organization_flow/getdata',
                    success : function(data)
                    {
                       $('#dept_based_emp').html(data);
                    //     $('.change_dpt_head').change(function(){
                    //     var dept_name = {
                    //         cluster_name : $(this).find(':selected').val(),
                    //     };
                    //     console.log(dept_name);
                    //     var base_url = window.location.origin;
                    //     $.ajax({
                    //         type : 'post',
                    //         datatype : 'html',
                    //         data : dept_name,
                    //         url : base_url+'/pmsuser/index.php?r=Organization_flow/chng_dept_head',
                    //         success : function(data)
                    //         {
                    //            $('#get_cluster_dept').html(data); 
                    //         }
                    //     });
                    // });                           
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
            $('.get_cluster').change(function(){
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
                url : base_url+'/pmsuser/index.php?r=Organization_flow/getdata',
                success : function(data)
                {
                   $('#dept_based_emp').html(data);
                //     $('.change_dpt_head').change(function(){
                //     var dept_name = {
                //         cluster_name : $(this).find(':selected').val(),
                //     };
                //     console.log(dept_name);
                //     var base_url = window.location.origin;
                //     $.ajax({
                //         type : 'post',
                //         datatype : 'html',
                //         data : dept_name,
                //         url : base_url+'/pmsuser/index.php?r=Organization_flow/chng_dept_head',
                //         success : function(data)
                //         {
                //            $('#get_cluster_dept').html(data); 
                //         }
                //     });
                // });                           
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
                    for (var i = 0; i < dev_id.length; i++) {
                        if (clustr_name_list == '') 
                        {
                            clustr_name_list =  $('.dept_based_id-'+dev_id[i]).find(':selected').val();
                        }
                        else
                        {
                            clustr_name_list = clustr_name_list+';'+$('.dept_based_id-'+dev_id[i]).find(':selected').val();
                        }
                        if (reporting_head == '') 
                        {
                            reporting_head = $('.cluster_based_id-'+dev_id[i]).find(':selected').val();
                        }
                        else
                        {
                            reporting_head = reporting_head+';'+$('.cluster_based_id-'+dev_id[i]).find(':selected').val();
                        }
                    }
                    //alert(clustr_name_list);
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
                        url : base_url+'/pmsuser/index.php?r=Organization_flow/chng_dept_head_data',
                        success : function(data)
                        {
                            jQuery("#large").modal('show');
                            $('#large').modal({backdrop: 'static', keyboard: false})  
                          $("#tree_data").load(location.href + " #tree_data");
                          drawChart();
                        }
                    });
                }                
            });
             $('body').on('change','.change_dpt_head',function(){
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
                url : base_url+'/pmsuser/index.php?r=Organization_flow/chng_dept_head',
                success : function(data)
                {
                   // alert(data);
                   $('#get_cluster_dept').html(data); 
                }
            });
        });
            });
        </script>
        <div id="emp_id_list"></div>
                    <div id="employee_list_data">
                        <?php
                        //print_r($appraiser_list);die();
                            if(isset($appraiser_list) && count($appraiser_list)>0)
                            {
                                $apr_name_data = '';
                                //     foreach ($appraiser_list as $row) {
                                //         if (isset($row['0']['Emp_fname']) && ($row['0']['Emp_fname']!='')) {
                                //             //print_r($row['0']['Emp_fname']);
                                //             $lname = '';
                                //             if (isset($row['0']['Emp_lname'])) {
                                //                 $lname = $row['0']['Emp_lname'];
                                //             }
                                //             else
                                //             {
                                //                 $lname = '';
                                //             }
                                //             if ($apr_name_data == '') {
                                                
                                //                 $apr_name_data = $row['0']['Emp_fname'];
                                //             }
                                //             else
                                //             {
                                //                 $apr_name_data = $apr_name_data.','.$row['0']['Emp_fname'];
                                //             }

                                //         }                                        
                                // }
                                for ($i=0; $i < count($appraiser_list); $i++) { 
                                   if ($apr_name_data == '') {
                                       $apr_name_data = $appraiser_list[$i]['0']['Emp_fname'];
                                   }
                                   else
                                   {
                                        $apr_name_data = $apr_name_data.','.$appraiser_list[$i]['0']['Emp_fname'];
                                   }
                                }
                                
                                print_r($apr_name_data);  
                            }                            
                        ?>
                    </div>
                    <div id='count_emp' style="display: none"><?php if(isset($employee_list_data) && count($employee_list_data)>0)
                            {echo count($employee_list_data); }?></div>
                    <div id='emp_data' style="display: none">
                        <?php
                            if(isset($employee_list_data) && count($employee_list_data)>0)
                            {
                                $emp_name_data = '';
                                $cnt = 0;
                                for ($i=0; $i < count($employee_list_data); $i++) { 
                                    if (isset($employee_list_data[$i])) 
                                    {
                                       for ($j=0; $j < count($employee_list_data[$i]); $j++) { 
                                        if (isset($employee_list_data[$i][$j])) 
                                        {
                                            if ($emp_name_data == '') {
                                                $emp_name_data[$i][$j] = $employee_list_data[$i][$j]['Emp_fname'];
                                            }
                                            else
                                            {
                                                $emp_name_data[$i][$j] = $employee_list_data[$i][$j]['Emp_fname'];
                                            } 
                                            
                                        }
                                        }
                                    }
                                }
                                $emp_get_list = '';
                                for ($i=0; $i < count($emp_name_data); $i++) {
                                    for ($j=0; $j < count($emp_name_data[$i]); $j++) { 
                                       if ($emp_get_list == '') {
                                            $emp_get_list = $emp_name_data[$i][$j];
                                        }
                                        else
                                        {
                                            $emp_get_list =  $emp_get_list.','.$emp_name_data[$i][$j];
                                        }
                                        } ?> 
                                        <div id="emp_data_value<?php echo $i; ?>"><?php print_r($emp_get_list); ?></div>                                   
                                <?php }
                               
                            }
                        ?>
                    </div>

                <div id="err" style="display: none"></div>
                   
                    <div class="col-md-12"><br>
                        <div class="row">
                            <div class="col-md-12">
                            <input type="button" id="modal-954288" href="#large" role="button" class="btn" data-toggle="modal" value="View" style="border: 1px solid rgb(76, 158, 217);float: right;">
                            <div class="col-md-3">
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
                            </div>
                            <div class="col-md-3">
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
                            </div>
                               
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box blue" style="margin-top: 85px;">
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
                                            <div class="table-responsive">
                                              <table class="table table-striped table-bordered table-hover table-fixedheader">
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
                                                           foreach ($employee_list as $row) { ?>
                                                            <tr>
                                                                <td><input id="checkbox1" class="md-check" type="checkbox" value="<?php echo $row['Employee_id']; ?>"></td>
                                                                <td><?php echo $row['Employee_id']; ?></td>
                                                                <td><?php echo $row['Emp_fname']; ?></td>
                                                                <td><?php echo $row['Designation']; ?></td>
                                                                <td><?php echo $row['Department']; ?></td>
                                                                <td><?php echo $row['Email_id']; ?></td>  
                                                                <td>
                                                                    <select class="form-control change_dpt_head cluster_based_id-<?php echo $row['Employee_id']; ?>" style="width: 186px;"name="get_cluster">
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
                                                                    <select class="form-control dept_based_id-<?php echo $row['Employee_id']; ?>" style="width: 186px;"name="get_dept" id="get_cluster_dept">
                                                                            <option value="All">All</option>
                                                                            <?php
                                                                                if (isset($diff_reporting_head) && count($diff_reporting_head)>0) {
                                                                                    $cnt = 0;
                                                                                    foreach ($diff_reporting_head as $row2) { ?>
                                                                                        <option value="<?php echo $row2['Reporting_officer1_id'];?>"><?php echo $dep_head_data[$cnt]['0']['Emp_fname']." ".$dep_head_data[$cnt]['0']['Emp_lname'];?></option>
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
                                                <div class="col-md-6">
                                                <input type="button" role="button" class="btn change_priority" value="Change" style="border: 1px solid rgb(76, 158, 217);float: right;">
                                                </div>
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
             <div>
                   <div id="tree_data" style="display: none">
                        <?php
                        $employee = new EmployeeForm;
                                $appraiser_list_data = $employee->get_appraiser_list();
                                $appraiser_list = '';
                                $employee_list_data = '';
                                $cnt = 0;
                                if (count($appraiser_list_data)>0) {
                                    for ($i=0; $i < count($appraiser_list_data); $i++) {
                                    $where = 'where Reporting_officer1_id = :Reporting_officer1_id';
                                    $list = array('Reporting_officer1_id');
                                    $data = array($appraiser_list_data[$i]['Reporting_officer1_id']);
                                    $employee_list_data[$i] = $employee->get_employee_data($where,$data,$list);
                                    }
                                }
                                if (count($appraiser_list_data)>0) {
                                    $cnt = 0;
                                    for ($i=0; $i < count($appraiser_list_data); $i++) {
                                    $where = 'where Email_id = :Email_id';
                                    $list = array('Email_id');
                                    $data = array($appraiser_list_data[$i]['Reporting_officer1_id']);
                                    $appraiser_list[$cnt] = $employee->get_employee_data($where,$data,$list);
                                    //print_r($appraiser_list_data);die();
                                    $cnt++;
                                    }
                                }
                        $emp_data_array = '';
                            if(isset($appraiser_list) && count($appraiser_list)>0)
                            {
                               if(isset($employee_list_data) && count($employee_list_data)>0)
                            {
                                for ($i=0; $i < count($appraiser_list); $i++) { 
                                   for ($j=0; $j < count($employee_list_data[$i]); $j++) {
                                    if ($emp_data_array == '') {
                                       $emp_data_array = $appraiser_list[$i]['0']['Emp_fname'].';'.$employee_list_data[$i][$j]['Emp_fname'];
                                   }
                                   else
                                   {
                                        $emp_data_array = $emp_data_array.','.$appraiser_list[$i]['0']['Emp_fname'].';'.$employee_list_data[$i][$j]['Emp_fname'];
                                   }
                                       
                                   }
                                }
                            }
                            }
                            print_r($emp_data_array);
                        ?>
                    </div>
                    <div id="head_tree_data" style="display: none">
                                  <?php
                        $head_branch_ata_array = '';
                           
                            if(isset($head_branch_data) && count($head_branch_data)>0)
                            {
                                   for ($j=0; $j < count($head_branch_data); $j++) { 
                                        if ($head_branch_ata_array == '') {
                                           $head_branch_ata_array = $head_branch_data[$j]['Emp_fname'];
                                       }
                                       else
                                       {
                                            $head_branch_ata_array = $head_branch_ata_array.','.$head_branch_data[$j]['Emp_fname'];
                                       }
                                       
                                   }
                            }
                            print_r($head_branch_ata_array);
                        ?>
                    </div>
                 
             </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                <span class="badge badge-success">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-speech"></i> Activities </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-settings"></i> Settings </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                <h3 class="list-heading">Staff</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">8</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ella Wong</h4>
                                            <div class="media-heading-sub"> CEO </div>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="list-heading">Customers</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">2</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lara Kunis</h4>
                                            <div class="media-heading-sub"> CEO, Loop Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="label label-sm label-success">new</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lisa Stone</h4>
                                            <div class="media-heading-sub"> CTO, Keort Inc </div>
                                            <div class="media-heading-small"> Last seen 13:10 PM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">7</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Maria Gomez</h4>
                                            <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="page-quick-sidebar-item">
                                <div class="page-quick-sidebar-chat-user">
                                    <div class="page-quick-sidebar-nav">
                                        <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                            <i class="icon-arrow-left"></i>Back</a>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn green">
                                                    <i class="icon-paper-clip"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                            <div class="page-quick-sidebar-alerts-list">
                                <h3 class="list-heading">General</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-warning"> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="list-heading">System</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                            <div class="page-quick-sidebar-settings-list">
                                <h3 class="list-heading">General Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Enable Notifications
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Allow Tracking
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Log Errors
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Auto Sumbit Issues
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Enable SMS Alerts
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <h3 class="list-heading">System Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Security Level
                                        <select class="form-control input-inline input-sm input-small">
                                            <option value="1">Normal</option>
                                            <option value="2" selected>Medium</option>
                                            <option value="e">High</option>
                                        </select>
                                    </li>
                                    <li> Failed Email Attempts
                                        <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                    <li> Secondary SMTP Port
                                        <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                    <li> Notify On System Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Notify On SMTP Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <div class="inner-content">
                                    <button class="btn btn-success">
                                        <i class="icon-settings"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->