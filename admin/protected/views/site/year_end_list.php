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
                            <h1>Comment On Review(B) </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <div class="portlet box border-blue-soft bg-blue-soft">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                List Of Employee</div>
                                            <div class="tools">
                                               <!--  <a href="javascript:;" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="javascript:;" class="reload"> </a>
                                                <a href="javascript:;" class="remove"> </a> -->
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> Sr.No </th>
                                                            <th> Employee ID </th>
                                                            <th> Employee Name </th>
                                                            <th> Cluster Category  </th>
                                                            <th> Action </th>
                                                           <!--  <th> Table heading </th>
                                                            <th> Table heading </th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $cnt = 1;
                                                        if (isset($kpi_emp_data) && count($kpi_emp_data)>0 && $kpi_emp_data!='') {
                                                            for ($i=0; $i < count($kpi_emp_data); $i++) {
                                                         ?>
                                                        <tr>
                                                            <td> <?php echo $cnt; ?> </td>
                                                            <td> <?php echo $kpi_emp_data[$i]['0']['Employee_id']; ?> </td>
                                                            <td> <?php echo $kpi_emp_data[$i]['0']['Emp_fname']." ".$kpi_emp_data[$i]['0']['Emp_lname']; ?> </td>
                                                            <td> <?php echo $kpi_emp_data[$i]['0']['cluster_name']; ?> </td>
                                                            <td><a href='<?php echo Yii::app()->createUrl("Subordinate/yearendb_review",array("employee_id"=>$kpi_emp_data[$i]['0']['Employee_id'])); ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
 </td>
                                                        </tr>
                                                    <?php $cnt++; }  }
                                                    else
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td  colspan='5'>No Record Found</td>
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
              
