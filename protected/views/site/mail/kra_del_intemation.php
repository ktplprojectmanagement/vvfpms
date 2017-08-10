<!DOCTYPE html>
<html lang="en">
<head>
  <title>Appraiser Email</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="http://kritvainvestments.com/pmsuser/css/email.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style type="text/css">

a:hover {
    color: red;
}
div{
  line-height: 40px;
}
hr
{
  border: 2px solid #747272;
}
a{
   text-decoration: underline;
}
label{
  font-weight: bold;
}

  </style>
</head>
<body>

<div class="container">
  <div class="logo">
<img src="http://52.172.210.251/vvf.kritva.in/Logo.png" alt="Kritva" style="max-width: 8%;">
<hr >
  </div>
  Dear <label><?php if(isset($mail_data['0']['Emp_fname']) && isset($mail_data['0']['Emp_lname'])) { echo $mail_data['0']['Emp_fname'].' '.$mail_data['0']['Emp_lname']; }?></label>,<br/>

  Please be informed that the KRA below has been deleted : <br/>

  <?php
                                            if (isset($kpi_data) && count($kpi_data)>0) { $cnt_num = 1; ?>
                                            <label class='count_goal' style="display: none"><?php if(isset($kpi_data)) { echo count($kpi_data); } ?></label>
                                          
                                        <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php if(isset($kpi_data['0']["KPI_id"])) { echo $kpi_data['0']["KPI_id"]; } ?>">
<div class="portlet-title">
                                                <div class="caption" style="font-weight:bold; font-size:18px; color: black;">                                                  
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php if(isset($kpi_data['0']['target'])) { echo $kpi_data['0']['target']; } ?></label>
                                                    <lable style="color:red">Deleted - </lable><?php if(isset($kpi_data['0']['KRA_category'])) { echo "KRA Category : ".$kpi_data['0']['KRA_category']; }  ?><?php if(isset($kpi_data['0']['target'])) { echo ' / '."KRA Weightage : ".$kpi_data['0']['target']; } ?>
                                                   </div>
                                            </div>
                                            <div class="portlet-body flip-scroll expand_goal<?php echo $cnt_num; ?>">    <br>                     
<b>KRA Description : </b> <?php if(isset($kpi_data['0']['KRA_description'])) { echo $kpi_data['0']['KRA_description']; } ?>
                                                <table  class="table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top:20px;border-collapse: collapse;color:black;border: 1px solid black;">
                                                    <thead style="background-color: #4c87b9;color: #fff;">
                                                                 <tr>                                                           
                                                                   <th style="font-weight:bold;text-align: center;"  rowspan="2"> Key Performance Indicator (KPI) description  </th>
                                                             <th style="font-weight:bold;text-align: center;border: 1px solid black;" rowspan="2">
                                                                Unit
                                                             </th>
                                                              <th style="font-weight: bold; text-align: center;border: 1px solid black;" rowspan="2">
                                                                KPI Weightage</td>
                                                            <th style="font-weight:bold;text-align: center;border: 1px solid black;" rowspan="2">
                                                                Value</td>
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
                                                                $kpi_list_data = explode(';',$kpi_data['0']['kpi_list']);
                                                                $kpi_list_unit = explode(';',$kpi_data['0']['target_unit']);
                                                                $kpi_list_target = explode(';',$kpi_data['0']['target_value1']); 
                                if(isset($kpi_data['0']['KPI_target_value']) && $kpi_data['0']['KPI_target_value']=='')
                                {
                                 $KPI_target_value = '';
                                }
                                else
                                {
                                $KPI_target_value = explode(';',$kpi_data['0']['KPI_target_value']); 
                                }

                                                                //$KPI_target_value = explode(';',$row['KPI_target_value']);
                                                                $kpi_data_data = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if (isset($kpi_list_data[$i]) && $kpi_list_data[$i] != '') {
                                                                        if($kpi_data_data == '')
                                                                        {
                                                                            $kpi_data_data = 1;
                                                                        }
                                                                        else
                                                                        {
                                                                            $kpi_data_data = $kpi_data_data+1;
                                                                        }                                                                        
                                                                    }
                                
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if (isset($kpi_list_data[$i]) && $kpi_list_data[$i]!='') { $cnt++;
                                if (!isset($KPI_target_value[$i])) {
                                                                        $KPI_target_value[$i] = '';                                                                       
                                                                    }
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td style="height: 30px;border: 1px solid black;font-size: 14px;"><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i]; } ?></td>
                                                                    <td style="border: 1px solid black;font-size: 14px;"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                        <?php
                                                                            if (isset($kpi_list_unit[$i]) && $kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td style="border: 1px solid black;font-size: 14px;"><?php if(isset($kpi_list_target[$i])) { echo $kpi_list_target[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 14px;"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
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
                                                                                if (isset($kpi_list_target[$i])) {
                                                                                  $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }
                                                                               
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
                                        $cnt_num++;  }
                                        ?>
<br>
Kindly login to PMS portal thru link below, review the same and take necessary action if required. 
<br>
<span> Click on the link below to check the status:<br>
  <a href="http://52.172.210.251/vvf.kritva.in/Logo.png">PMS Login</a>

 
<p style="text-align:left; line-height:15px; font-weight: bold">Best Regards,<br/>
 <?php if(Yii::app()->user->getState("Employee_name") && Yii::app()->user->getState("Employee_name")!='') { print_r(Yii::app()->user->getState("Employee_name")); }?></p></span> 
 <p style="color: #bbb;">
2016 &#169; Kritva Technology Pvt. Ltd.
</p>
</div>

</body>
</html>
