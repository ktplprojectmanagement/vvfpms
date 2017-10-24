       <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script type="text/javascript"> 
        var j = jQuery.noConflict();           
            $(function(){
                j("#ditable_1").DataTable();
                j("#ditable_2").DataTable();
            });
        </script>
        <style type="text/css">
            #ditable_1_filter
              {
                float: right;
              }
              #ditable_2_filter
              {
                float: right;
              }
		#ditable_2_length
{
display:none;
}
        </style>
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
                            <h1>Mid Review Employee List </h1>
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
                                            <div>
                                                <table class="table table-striped table-bordered table-hover" id="ditable_2">
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
                                                    $cnt = 1;
                                                   //  echo "<pre>";
                                                   // print_r($kpi_emp_data_aprv);die();
                                                        if (isset($kpi_emp_data_aprv) && $kpi_emp_data_aprv!='') {
                                                            for ($i=0; $i < count($kpi_emp_data_aprv); $i++) {
                                                         ?>
                                                        <tr>
                                                            <td> <?php echo $kpi_emp_data_aprv[$i]['0']['Employee_id']; ?> </td>
                                                            <td> <?php echo $kpi_emp_data_aprv[$i]['0']['Emp_fname']." ".$kpi_emp_data_aprv[$i]['0']['Emp_lname']; ?> </td>
							<td> <?php echo $kpi_emp_data_aprv[$i]['0']['Department']; ?> </td>
                                                            <td> <?php  if(isset($kpi_data_aprv[$i]['0']['mid_KRA_final_status']) && $kpi_data_aprv[$i]['0']['mid_KRA_final_status']!='' && $kpi_data_aprv[$i]['0']['mid_KRA_final_status']!='Pending') { ?> <lable style="color: rgb(18, 95, 38);"><?php echo "Completed";?></lable> <?php }else{ ?><lable style="color: red;"><?php echo "Pending";  ?></lable><?php } ?> </td>
                                                            <td>

<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/Midreview/midreview_emp_data'),
                                                                ));
                                                                 ?>
<?php echo CHtml::textField('emp_id',$kpi_emp_data_aprv[$i]['0']['Employee_id'],array('style'=>'display:none')); ?>
                                                                  <?php echo CHtml::submitButton('Check',array('style'=>'background-color:#337AB7;color:white')); ?>
<?php 
                                        $this->endWidget(); 
                                        ?> 
 </td>
                                                        </tr>
                                                    <?php }  }
                                                    else
                                                    {?>
                                                    <tr> <td colspan='5'> No Record Found </td></tr>
                                                    <?php }
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
              
