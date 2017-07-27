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
                            <h1>Employee Goal List </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <style type="text/css">
                #sample_2_filter
                {
                    float: right;
                }
                #sample_2_length
                {
                    display: none;
                }
                </style>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
            <script type="text/javascript"> 
            var j = jQuery.noConflict();
            j(function(){
                j("#sample_2").DataTable();
            });
            </script>
                <div class="page-content">
                    <div class="container">
                       <?php if (isset($approved_list)) { ?>
                                       <div class="portlet box bg-blue-soft">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    Goal's List </div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                        <tr>
                                                            <th> Employee ID </th>
                                                            <th> Employee Name </th>
                                                            <th> Department </th>
                                                            <th> Status </th>
                                                            <th> View </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php
                                                            if (isset($employee_data) && count($employee_data)>0 && $employee_data!='') {
                                                            foreach ($employee_data as $row) { $cnt = 0; ?>
                                                            <tr>
                                                                <td> <?php if(isset($row['0']['Employee_id'])) { echo $row['0']['Employee_id']; }?> </td>
                                                                <td> <?php if(isset($row['0']['Emp_fname'])) { echo $row['0']['Emp_fname']." ".$row['0']['Emp_lname']; }?> </td>
                                                                <td> <?php if(isset($row['0']['Department'])) { echo $row['0']['Department']; }?> </td>
                                                                <td> <?php if(isset($kpi_data[$cnt]['set_status']) && $kpi_data[$cnt]['set_status'] == 'Pending') { ?>style="color:red"<?php }else if(isset($kpi_data[$cnt]['set_status']) && $kpi_data[$cnt]['set_status'] == 'Approved') { ?> style="color:green" <?php } ?> <?php if(isset($kpi_data[$cnt]['set_status'])) { echo $kpi_data[$cnt]['set_status']; }?> </td>
                                                                <td><a style="text-decoration: none;" href="<?php echo Yii::app()->createUrl('Setgoals/emp_kpi_edit', array('emp_id' => $row['0']['Employee_id']));?>"><span class="label label-sm label-warning" style="background-color:#337AB7;"> Check </span></a></td>                                                               
                                                            </tr>
                                                        <?php 
                                                           $cnt++; } }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php } ?>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->          
        </div>
        <!-- END CONTAINER -->
              