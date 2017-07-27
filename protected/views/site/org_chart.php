            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                       
                        <!-- Sidebar Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                        </button>
                        <!-- Sidebar Toggle Button -->
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->                            
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="note note-info">
                                   <!--  <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p> -->
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                               <div id="emp_id_list" style="display: none"></div>
                    <div id="employee_list_data" style="display: none">
                        <?php
                            if(isset($appraiser_list) && count($appraiser_list)>0)
                            {
                                $apr_name_data = '';
                                    foreach ($appraiser_list as $row) {
                                        if (isset($row['0']['Emp_fname']) && ($row['0']['Emp_fname']!='')) {
                                            //print_r($row['0']['Emp_fname']);
                                            $lname = '';
                                            if (isset($row['0']['Emp_lname'])) {
                                                $lname = $row['0']['Emp_lname'];
                                            }
                                            else
                                            {
                                                $lname = '';
                                            }
                                            if ($apr_name_data == '') {
                                                
                                                $apr_name_data = $row['0']['Emp_fname'];
                                            }
                                            else
                                            {
                                                $apr_name_data = $apr_name_data.','.$row['0']['Emp_fname'];
                                            }

                                        }                                        
                                }
                                for ($i=0; $i < count($appraiser_list); $i++) { 
                                   if ($apr_name_data == '') {
                                       $apr_name_data = $appraiser_list[$i]['0']['Emp_fname'];
                                   }
                                   // else
                                   // {
                                   //      $apr_name_data = $apr_name_data.','.$appraiser_list[$i]['0']['Emp_fname'];
                                   // }
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
                     <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                        <script type="text/javascript">
                            google.load("visualization", "1", { packages: ["orgchart"] });
                            google.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = new google.visualization.DataTable();
                                        data.addColumn('string', 'Entity');
                                        data.addColumn('string', 'ParentEntity');
                                        data.addColumn('string', 'ToolTip');
                                        var department_list = $('#employee_list_data').text();
                                        var department = department_list.split(',');
                                        var designation = ['Developer','Tester','Designer'];
                                        var count_data = $('#count_emp').text();

                                        for (var i = 0; i < department.length; i++) {                     
                                            var get_list = $('#emp_data_value'+i).text();
                                            var get_list_count = get_list.split(',');
                                          for (var j = 0; j < get_list_count.length; j++) {
                                          
                                            data.addRows([[get_list_count[j],department[i], get_list_count[i]]]);
                                          }                
                                        }
                                       
                                        console.log($("#chart")[0]);
                                        var chart = new google.visualization.OrgChart(document.getElementById('chart'));
                                        chart.draw(data, { allowHtml: true });
                            }        
                        </script>
                        <div id='chart'>
     
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR CONTENT LAYOUT -->
        </div>
        </div>