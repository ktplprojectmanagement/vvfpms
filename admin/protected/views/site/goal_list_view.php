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
                            <h1>Employee List </h1>
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
                                                     List </div>
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
                                                            <th> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php
                                                         //print_r($kpi_data1);die();
                                                            if (isset($employee_data) && count($employee_data)>0 && $employee_data!='') {$cnt = 0; 
                                                            foreach ($employee_data as $row) { ?>
                                                            <tr>
                                                                <td> <?php if(isset($row['0']['Employee_id'])) { echo $row['0']['Employee_id']; }?> </td>
                                                                <td> <?php if(isset($row['0']['Emp_fname'])) { echo $row['0']['Emp_fname']." ".$row['0']['Emp_lname']; }?> </td>
                                                                <td> <?php if(isset($row['0']['Department'])) { echo $row['0']['Department']; }?> </td>
                                                                <td> <?php if(isset($kpi_data1[$cnt]['KRA_status']) && $kpi_data1[$cnt]['KRA_status'] == 'Pending') { ?><lable style="color:red"><?php echo $kpi_data1[$cnt]['KRA_status']; ?></lable><?php } else if(isset($kpi_data1[$cnt]['KRA_status']) && $kpi_data1[$cnt]['KRA_status'] == 'Approved') {?><lable style="color:green"><?php echo $kpi_data1[$cnt]['KRA_status']; ?></lable><?php }?></td>
                                                                <td>
 <?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/Setgoals/emp_kpi_edit'),
                                                                ));
                                                                 ?>
									<?php echo CHtml::textField('emp_id',$row['0']['Employee_id'],array('style'=>'display:none')); ?>
                                                                  <?php echo CHtml::submitButton('Check',array('style'=>'background-color:#337AB7;color:white')); ?>
<?php 
                                        $this->endWidget(); 
                                        ?>  
								</td>                                                               
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
              
