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
                            <h1>Year End Review(A) Employee List </h1>
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
                                                    <thead class='bg-blue-soft' style="color: white;">
                                                    <tr>
                                                        <th class="all">Employee ID</th>
                                                        <th class="min-phone-l">Employee Name</th>
                                                        <th class="min-tablet">Department</th>
                                                        <th class="none">Designation</th>
                                                        <th class="none">Check</th>                                                            
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    if (isset($emp_data) && count($emp_data)>0 && $emp_data!= '') {
                                                        for ($i=0; $i < count($emp_data); $i++) {
							$emp_id = '';
							if(isset($emp_data[$i]['0']['Employee_id']))
							{
							$emp_id = $emp_data[$i]['0']['Employee_id'];
							}
							else
							{
							$emp_id = '';
							}
							?>
                                                            <tr>
                                                                <td><?php if(isset($emp_data[$i]['0']['Employee_id'])) { echo $emp_data[$i]['0']['Employee_id']; } ?></td>
                                                                <td><?php if(isset($emp_data[$i]['0']['Emp_fname'])) { echo $emp_data[$i]['0']['Emp_fname'].' '.$emp_data[$i]['0']['Emp_lname']; } ?></td>
                                                                <td><?php if(isset($emp_data[$i]['0']['Department'])) { echo $emp_data[$i]['0']['Department']; }?></td>
                                                                <td><?php if(isset($emp_data[$i]['0']['Designation'])) { echo $emp_data[$i]['0']['Designation']; }?></td>
                                                                <td><a href='<?php echo Yii::app()->createUrl("Year_endreview/appraiser_end_review",array("Employee_id"=>$emp_id)); ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                                            </tr>
                                                <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
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
              
