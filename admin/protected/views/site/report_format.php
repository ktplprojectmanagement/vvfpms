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
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Admin_Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Generatereport">Generate Report</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Report Data</h3>
                                   <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-dark">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject bold uppercase"><?php if(isset($report_data) && count($report_data)>0){ echo $report_data['0']['report_name']; }?></span>
                                                </div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                    <thead>
                                                     <tr>
                                                     <th>Sr.No</th>
                                                    <?php  
                                                        if (isset($report_data) && count($report_data)>0) {
                                                        $columns_field = explode(';',$report_data['0']['content_list']);
                                                        for ($i=0; $i < count($columns_field); $i++) { ?>
                                                            <th><?php echo $columns_field[$i]; ?></th>
                                                    <?php
                                                        } 
                                                        }
                                                     ?>
                                                     <th>Check Data</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php  
                                                        if (isset($report_details) && count($report_details)>0) {    
                                                         $columns_field = explode(';',$report_data['0']['content_list']);
                                                         //print_r($report_details);
                                                        for ($i=0; $i < count($report_details); $i++) { ?>
                                                        <tr>
                                                         <td></td>
                                                        <?php
                                                            for ($j=0; $j < count($columns_field); $j++) { 
                                                              ?>
                                                               <td><?php echo $report_details[$i][$columns_field[$j]]; ?></td>
                                                              <?php
                                                            }
                                                        ?>
                                                          <td><a href="<?php echo Yii::app()->createUrl('Login/employee_profile', array('Employee_id' => $emp_id_data[$i]['Employee_id']))?>"> <button class="btn" id="get_report" style='border: 1px solid;'>Get Report</button></a></td> 
                                                        </tr>
                                                    <?php
                                                        } 
                                                        }
                                                     ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->            
        </div>
        <!-- END CONTAINER -->
