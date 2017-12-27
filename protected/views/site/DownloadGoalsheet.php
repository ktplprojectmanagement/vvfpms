          <script src="../ckeditor.js"></script>
    <script src="js/sample.js"></script>
    <link rel="stylesheet" href="css/samples.css">
    <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
            <div class="page-content-wrapper">
                <div class="page-content">
                   
                    <div class="page-bar">
                                            
                    </div>
                    <h3 class="page-title"> Employee KRA Details
                    </h3>
                     <table class="table zui-table" id="example">
            <thead>
<tr>
<th style="background-color: white;visibility: hidden;" class="zui-sticky-col">Emp Name</th>
<th style="background-color: white;visibility: hidden;">Emp Name</th>
</tr>
                <tr>
                   <th class="zui-sticky-col">Emp Id</th>
                   <th  class="zui-sticky-col1">Emp Name</th>
                   <th style="padding-left: 62px;">Cluster</th>
                   <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Reporting Officer</th>
                                                            
<th >Download Goalsheet</th>
<!-- <th >Download IDP</th> -->
                </tr>
            </thead>
            <tbody id="dept_based_emp">
<lable id="total_emp_count" style="display:none"><?php if (isset($employee_list) && count($employee_list)>0) { echo count($employee_list); } ?></lable>
                
                  <?php
                                                        if (isset($employee_list) && count($employee_list)>0) { ?>                                                        
                                                           <?php 
                                                           $cnt = 0;
                                                           foreach ($employee_list as $row) {
                                                            if(isset($row['0']))
                                                            {
if($row['0']['Employee_id'] != '')
{
                                               
//print_r($IDPForm_data);die();
?>                                                           
                                                            <tr>                                                             
                                                                <td style="height: 55px;" id="emp_id-<?php echo $cnt; ?>" class="zui-sticky-col"><?php echo $row['0']['Employee_id']; ?></td>
                                                                <td style="height: 55px;" class="zui-sticky-col1"><?php echo $row['0']['Emp_fname']." ".$row['0']['Emp_lname']; ?></td>
<td></td>
                                                                <td style="padding-left: 62px;"><?php echo $row['0']['cluster_name']; ?></td>
                                                                <td><?php echo $row['0']['Department']; ?></td>
                                                                <td><?php echo $row['0']['Reporting_officer1_id']; ?></td>
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/Setgoals/emp_kpi_edit1'),
                                                                ));
                                                                 ?>
									<?php echo CHtml::textField('emp_id',$row['0']['Employee_id'],array('style'=>'display:none')); ?>
                                                                 
<?php 
                                        $this->endWidget(); 
                                        ?>




<?php
$file_id="0";
$filename="https://kritva.in/pms/Goalsheet_docs/goalsheet_".$row['0']['Emp_fname']."_".$row['0']['Emp_lname'].Yii::app()->user->getState('financial_year_check');

$file_headers = @get_headers($filename);

if($file_headers[0] == 'HTTP/1.1 404 Not Found'){
      $file_id="1";
} else if ($file_headers[0] == 'HTTP/1.1 302 Found' && $file_headers[7] == 'HTTP/1.1 404 Not Found'){
   $file_id="2";
} else {
   $file_id="3";
}



?>
<?php if($file_id=="3") { ?>
<td>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/Goalsheet_docs/goalsheet_<?php echo $row['0']['Emp_fname']."_".$row['0']['Emp_lname'];?><?php echo Yii::app()->user->getState('financial_year_check');?>".".pdf">Download</a>

</td>
<?php } else if($file_id=="1"){?>
<td><a  data-toggle="modal" href="#basic"> Download </a></td>
<?php }?>





<!-- <td>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/Goalsheet_docs/goalsheet_<?php echo $row['0']['Emp_fname']."_".$row['0']['Emp_lname'];?><?php echo Yii::app()->user->getState('financial_year_check');?>".".pdf">Download</a>




</td> -->




<!-- 
<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/IDP_docs/IDP_<?php echo $row['0']['Emp_fname']."_".$row['0']['Emp_lname'];?>.pdf">Download</a></td> -->

                                                            </tr>                                                       
                                                        <?php $cnt++;  
                                                    }
} }
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
                </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->

         <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h4 class="modal-title">PDF not available</h4>
                                                            </div>
                                                            <div class="modal-body"> Sorry , Goal sheet of this employee is not available. </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>


                                                
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                                                <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
                                                <script type="text/javascript"> 
                                                var j = jQuery.noConflict();           
                                                    $(function(){
                                                        j("#example").DataTable();
                                                    });
                                                </script>