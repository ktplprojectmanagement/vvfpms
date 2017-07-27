<!DOCTYPE html>
<html>
<head>  
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
thead{
    background-color: #4c87b9;
    color: #fff;
}
td{
    font-size: 14px;
}
</style>
</head>

<body>
Dear <label><?php if(isset($mail_data['0']['Emp_fname'])) { echo $mail_data['0']['Emp_fname'].' '.$mail_data['0']['Emp_lname']; }?></label>,<br/>
                                                I have reviewed and approved your goal sheet and is as attached herewith. Kindly review it and in case of any queries please approach me.</label><br/><br>
<?php
                                            if (isset($kpi_data)) { $cnt_num = 1; ?>
                                            <label class='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
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
                                                            <th style="height: 40px;border: 1px solid black;width: 134px;font-size:16px "> KPI List </th>
                                                            <th style="border: 1px solid black;width: 134px;font-size:16px" class="numeric"> KPI Unit Format </th>
                                                           <th style="border: 1px solid black;width: 134px;font-size:16px" class="numeric"> KPI value </th>
                                                           <th style="border: 1px solid black;width: 134px;font-size:16px" class="numeric"> KPI Target Value </th>
                                                            <th style="text-align:center;"> (1)<br>Unsatisfactory <br>Performance </th>
                                                        <th style="text-align:center;"> (2)<br>Needs<br>Improvement </th>
                                                        <th style="text-align:center;"> (3)<br>Good Solid <br>Performance </th>
                                                        <th style="text-align:center;"> (4)<br>Superior <br>Performance </th>
                                                        <th style="text-align:center;">(5)<br>Outstanding <br>Performance </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
                                                                $KPI_target_value = explode(';',$row['KPI_target_value']);
                                                                $kpi_data_data = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if ($kpi_list_data[$i] != '') {
                                                                        if($kpi_data_data == '')
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
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td style="height: 30px;border: 1px solid black;font-size: 14px;"><?php echo $kpi_list_data[$i]; ?></td>
                                                                    <td style="border: 1px solid black;font-size: 14px;"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                        <?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td style="border: 1px solid black;font-size: 14px;"><?php echo $kpi_list_target[$i]; ?></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"><?php echo $KPI_target_value[$i]; ?></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"></td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <td style="border: 1px solid black;font-size: 14px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"><?php echo $KPI_target_value[$i]; ?></td>
                                                                                <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td style="border: 1px solid black;font-size: 14px;"><?php echo $value_data[$j]; ?></td>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                   ?>
                                                                                   <td style="border: 1px solid black;font-size: 14px;"><?php echo ""; ?></td>
                                                                                   <?php 
                                                                                }
                                                                                }
                                                                        ?>
                                                                        <?php
                                                                            }
                                                                        ?>
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
                                        <p style="text-align:left; line-height:15px; font-weight: bold">Best Regards,<br/>
                                         <?php if(isset($employee_data1['0']['Emp_fname'])) { echo $employee_data1['0']['Emp_fname'].' '.$employee_data1['0']['Emp_lname']; }?></p></span> 
                                         <p style="color: #bbb;">
                                        2016 &#169; Kritva Technologies Pvt. Ltd.
                                        </p>
                                       </body>
                                       </html>
