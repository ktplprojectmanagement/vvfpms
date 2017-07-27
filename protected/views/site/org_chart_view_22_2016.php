<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/orgchart.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    table.google-visualization-orgchart-table
    {
        width: 100px;
        max-width: 100px;
        overflow: scroll;
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
                        var all_emp_list = $('#tree_data_value').text();
                        var emp_apr_list = all_emp_list.trim().split(';');
                        //var head_emp_list = $('#tree_data_value').text();
                        //var head_emp_all_list = emp_apr_list.split('-');
                        //alert(emp_apr_list);
                        var designation = ['Developer','Tester','Designer'];
                        var count_data = $('#count_emp').text();
                        var level_data = '';
//alert(head_emp_all_list[1]);
// //console.log(department);console.log(get_list_count.length);
//alert(emp_apr_list.length);
                        for (var i = 0; i < emp_apr_list.length; i++) {                     
                            var get_list = emp_apr_list[i].trim().split('-');
                                var get_list_count = get_list[1].trim().split(',');                                
                                for (var j = 0; j < get_list_count.length; j++) {                                    
                                    var level_data1 = [get_list_count[j],get_list[0],get_list[0]];                                    
                                    var level_data2 = [get_list_count[j],get_list[0],get_list[0]]; 
                                    data.addRows([level_data2]);                                       
                                }
                               //alert(level_data);
                               //var level = [['Alice', 'Mike', ''],['dfs', 'Msfdike', '']];
                                //data.addRows([level_data1]);
                                
                            //data.addRows([['Alice', 'Mike', ''],['dfs', 'Msfdike', '']]);
                        }
                        
                        // for (var i = 0; i <emp_apr_list.length; i++) {
                        //     data.addRows([[emp_apr_list[i],'VVF', 'VVF']]);
                        // }
                        
                        //For each orgchart box, provide the name, manager, and tooltip to show.
                       
                           // for (var i = 0; i < 5; i++) {
                           //       var level_data = [                                  
                           //        ['Alice', 'Mike', ''],
                           //        ['Jim', 'Mike', ''],
                           //        ['Bob'+i, 'Jim', 'Bob Sponge'],
                           //        ['Bob1', 'Jim', 'Bob Sponge1'],
                           //        ['Bob2', 'Jim', 'Bob Sponge2'],
                           //        ['Carol', 'Bob', '']
                           //      ];
                           //  }
                        
                       
                        // data.addRows([level_data]);

                        console.log($("#chart")[0]);
                        var chart = new google.visualization.OrgChart(document.getElementById('chart'));
                        chart.draw(data, { allowHtml: true });
            }        
        </script>
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
                        $emp_data_array = '';$apr_data_array = '';
                            if(isset($appraiser_list) && count($appraiser_list)>0)
                            {
                               if(isset($employee_list_data) && count($employee_list_data)>0)
                            {
                                for ($i=0; $i < count($appraiser_list); $i++) { 
                                   // for ($j=0; $j < count($employee_list_data[$i]); $j++) {
                                   //  if (isset($appraiser_list[$i]['0']['Emp_fname']) && isset($employee_list_data[$i][$j]['Emp_fname'])) {
                                   //      if ($emp_data_array == '') {
                                   //             $emp_data_array = $appraiser_list[$i]['0']['Email_id'].';'.$employee_list_data[$i][$j]['Email_id'];echo '<br>';
                                   //         }
                                   //         else
                                   //         {
                                   //              $emp_data_array = $emp_data_array.','.$appraiser_list[$i]['0']['Email_id'].';'.$employee_list_data[$i][$j]['Email_id'];echo '<br>';
                                   //         }
                                   //  }                                   
                                   //}
                                if (isset($appraiser_list[$i]['0']['Emp_fname'])) {
                                    if ($apr_data_array == '') {
                                                $apr_data_array = $appraiser_list[$i]['0']['Email_id'];
                                           }
                                           else
                                           {
                                                $apr_data_array = $apr_data_array.','.$appraiser_list[$i]['0']['Email_id'];
                                           }
                                                                        
                                }
                                   
                                }
                            }
                            print_r($apr_data_array);
                            }
                            //print_r("ghgh");
                                
                        ?>
                    </div>
                    <div id="tree_data_value" style="display: none">
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
                        $emp_data_array = '';$apr_data_array = '';$emp_data_array1 = '';
                            if(isset($appraiser_list) && count($appraiser_list)>0)
                            {
                               if(isset($employee_list_data) && count($employee_list_data)>0)
                            {
                                for ($i=0; $i < count($appraiser_list); $i++) { 
                                   for ($j=0; $j < count($employee_list_data[$i]); $j++) {
                                    if (isset($appraiser_list[$i]['0']['Emp_fname']) && isset($employee_list_data[$i][$j]['Emp_fname'])) {
                                        
                                     if ($emp_data_array1 == '') {
                                                $emp_data_array1 = $employee_list_data[$i][$j]['Emp_fname'];
                                           }
                                           else
                                           {
                                                $emp_data_array1 = $emp_data_array1.','.$employee_list_data[$i][$j]['Emp_fname'];
                                           } 
                                        }                              
                                  if (isset($appraiser_list[$i]['0']['Emp_fname'])) {
                                      if ($emp_data_array == '') {
                                       $emp_data_array = $appraiser_list[$i]['0']['Emp_fname'].'-'.$emp_data_array1;
                                       }
                                       else
                                       {
                                            $emp_data_array = $emp_data_array.';'.$appraiser_list[$i]['0']['Emp_fname'].'-'.$emp_data_array1;
                                       }
                                  }                                   
                                } 
                                }
                                print_r($emp_data_array);
                            }
                            }
                            //print_r("ghgh");
                                
                        ?>
                    </div>
                    <div id='chart' class="table-responsive">
     
                                                </div>