<?php
Yii::app()->controller->renderPartial('//site/all_js');
?>         
 
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
                                                            
<th >Check</th>
                </tr>
            </thead>
            <tbody id="dept_based_emp">
<lable id="total_emp_count" style="display:none"><?php if (isset($employee_list) && count($employee_list)>0) { echo count($employee_list); } ?></lable>
                
                  <?php
                                                        if (isset($employee_list)) { ?>                                                        
                                                           <?php 
                                                           $cnt = 0;
                                                           foreach ($employee_list as $row) {
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
<td>
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/Setgoals/emp_kpi_edit1'),
                                                                ));
                                                                 ?>
									<?php echo CHtml::textField('emp_id',$row['0']['Employee_id'],array('style'=>'display:none')); ?>
                                                                  <?php echo CHtml::submitButton('Check',array('style'=>'background-color:#337AB7;color:white')); ?>
<?php 
                                        $this->endWidget(); 
                                        ?>
</td>

                                                            </tr>                                                       
                                                        <?php $cnt++;  
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

                                                <script type="text/javascript"> 
                                                var j = jQuery.noConflict();           
                                                    $(function(){
                                                        j("#example").DataTable();
                                                    });
                                                </script>
