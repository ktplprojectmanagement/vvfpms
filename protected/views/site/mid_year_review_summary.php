
<?php

$Employee_id = Yii::app()->user->getState("Employee_id");
$notification_data =new NotificationsForm;
        $emploee_data =new EmployeeForm;
        $kra=new KpiAutoSaveForm;
        $where = 'where Employee_id = :Employee_id';
        $list = array('Employee_id');
        $data = array($Employee_id);
        $employee_data = $emploee_data->get_employee_data($where,$data,$list);

        $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
        $list1 = array('Employee_id','goal_set_year');
        $data2 = array($Employee_id,'2016-2017');
        $kpi_data = $kra->get_kpi_list($where1,$data2,$list1);  

        //print_r($kpi_data);die();
?>

   <style type="text/css">

<style type="text/css">
body{

}
table {
    border-collapse: collapse;
    color:black;
}
table, th, td {
    border: 1px solid black;
}
th{
    width: 134px;
    font-size:16px
}

td{
    font-size: 14px;
}
</style>
<div id="target_goal">

<?php
                                            if (isset($kpi_data) && count($kpi_data)) { $cnt_num = 1; ?>
                                            <label class='count_goal' style="display: none"><?php if(isset($kpi_data)) { echo count($kpi_data); } ?></label>
                                          <?php     
                                        foreach ($kpi_data as $row) {  ?>
                                        <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption" style="font-weight:bold; font-size:18px; color: black;">                                                  
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none">
                                                   <?php echo $row['KRA_category']; ?><?php echo "(".$row['target'].")"; ?></div>
                                                <div class="tools" style="font-weight:bold; font-size:18px; color: black;">
                                                <?php echo "KRA Category : ".$row['KRA_category']; ?><?php echo ' / '."KRA Weightage : ".$row['target']; ?>
                                                    <a href="javascript:;" class="collapse">
</a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll expand_goal<?php echo $cnt_num; ?>">                         <br>                     
<b>KRA Description : </b> <?php echo $kpi_data['0']['KRA_description']; ?>
                                                <table  class="table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top:20px;border-collapse: collapse;color:black;border: 1px solid black;">
                                                    <thead style="background-color: #4c87b9;color: #fff;">
                                                        <tr>
                                                            <th style="border: 1px solid black;"> KPI List </th>
                                                            <th style="border: 1px solid black;"> KPI Unit Format </th>
                                                           <th style="border: 1px solid black;"> KPI value </th>
                                                           <th style="border: 1px solid black;"> KPI Target Value </th>
                                                            <th style="border: 1px solid black;text-align:center;"> (1)<br>Unsatisfactory <br>Performance </th>
                                                        <th style="border: 1px solid black;text-align:center;"> (2)<br>Needs<br>Improvement </th>
                                                        <th style="border: 1px solid black;text-align:center;"> (3)<br>Good Solid <br>Performance </th>
                                                        <th style="border: 1px solid black;-align:center;"> (4)<br>Superior <br>Performance </th>
                                                        <th style="border: 1px solid black;-align:center;">(5)<br>Outstanding <br>Performance </th>
                                                        <th style="border: 1px solid black;text-align:center;">Employee Comments</th>
                                                        <th style="border: 1px solid black;-align:center;">Mid Review Status</th>
                                                        <th style="border: 1px solid black;-align:center;">Mid Review Comments</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
                                                                $KPI_target_value = explode(';',$row['KPI_target_value']);
                                                                $employee_comment = explode(';',$row['employee_comment']);
                                                                $appr_comment = explode(';',$row['appraiser_comment']);
                                                                $appr_status = explode(';',$row['mid_KRA_status']);
                                                                $kra_status = $row['mid_KRA_final_status'];

                                                                $kpi_data_data = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if (isset($kpi_list_data[$i]) && $kpi_list_data[$i] != '') {
                                                                        if(isset($kpi_data_data) && $kpi_data_data == '')
                                                                        {
                                                                            $kpi_data_data = 1;
                                                                        }
                                                                        else
                                                                        {
                                                                            $kpi_data_data = $kpi_data_data+1;
                                                                        }                                                                        
                                                                    }
                                                                }
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if (isset($kpi_list_data[$i]) && $kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td style="border: 1px solid black;"><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i]; }?></td>
                                                                    <td style="border: 1px solid black;"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                        <?php
                                                                            if (isset($kpi_list_unit[$i]) && ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value')) {
                                                                                ?>
                                                                                <td style="border: 1px solid black;"><?php echo $kpi_list_target[$i]; ?></td>
                                                                               
                                                                                <td style="border: 1px solid black;"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;"><?php echo round($kpi_list_target[$i]*0.69,2); ?></td>
                                                                                <td style="border: 1px solid black;"><?php echo round($kpi_list_target[$i]*0.70,2)." to ".round($kpi_list_target[$i]*0.95,2); ?></td>
                                                                                <td style="border: 1px solid black;"><?php echo round($kpi_list_target[$i]*0.96,2)." to ".round($kpi_list_target[$i]*1.05,2); ?></td>
                                                                                <td style="border: 1px solid black"><?php echo round($kpi_list_target[$i]*1.06,2)." to ".round($kpi_list_target[$i]*1.29,2); ?></td>
                                                                                <td style="border: 1px solid black;"><?php echo "greater than ".round($kpi_list_target[$i]*1.39,2); ?></td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <td style="border: 1px solid black;"></td>
                                                                                <td style="border: 1px solid black;word-break: break-all;"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <?php  
                                                                                if(isset($kpi_list_target[$i]))
                                                                                {
                                                                                     $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }
                                                                               
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td style="border: 1px solid black;word-break: break-all;"><?php if(isset($value_data[$j])) { echo $value_data[$j]; } ?></td>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                   ?>
                                                                                   <td style="border: 1px solid black;"><?php echo ""; ?></td>
                                                                                   <?php 
                                                                                }
                                                                                }
                                                                        ?>
                                                                        <?php
                                                                            } 
                                                                        ?>
                                                                        <td  style="border: 1px solid black;word-break: break-all;">
                                                                        <?php
                                                                            $emp_comment = '';
                                                                           if (isset($employee_comment[$i]) && $employee_comment[$i] != '') {
                                                                                 $emp_comment = $employee_comment[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                               $emp_comment = '';
                                                                            }
                                                                            // echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px'));
                                                                        ?>
                                                                        <label><?php echo $emp_comment; ?></label>
                                                                    </td>
                                                                    <td  style="border: 1px solid black;word-break: break-all;">
                                                                        <?php
                                                                             $select = '';$status = '';
                                                                                $status = '';
                                                                                if (isset($appr_status[$i]) && $appr_status[$i] != '') {
                                                                                    $select = $appr_status[$i];
                                                                                    //$status[$appr_status[$i]] = array('selected' => true); 
                                                                                }
                                                                                else
                                                                                {
                                                                                     $select = '';
                                                                                     //$status['Select'] = array('selected' => true);
                                                                                }
                                                                        ?>
                                                                        <label><?php echo $select; ?></label>
                                                                    </td>
                                                                    <td  style="border: 1px solid black;word-break: break-all;">
                                                                        <?php
                                                                             $apr_comment = '';
                                                                            if (isset($appr_comment[$i]) && $appr_comment[$i] != '') {
                                                                                $apr_comment = $appr_comment[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                                $apr_comment = '';
                                                                            }
                                                                        ?>
                                                                        <label><?php if(isset($apr_comment)) { echo $apr_comment; } ?></label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>                              
                                                    </tbody>
                                                                                              
                                                </table>   
                                                <br><br>                                              
                                            </div>
                                        </div>
                                         <?php 
                                        $cnt_num++; } }
                                        ?>
</div>
                                     