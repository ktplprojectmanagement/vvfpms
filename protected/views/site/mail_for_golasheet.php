<!DOCTYPE html>
<html>
<head>  
  
</head>

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js
"></script>
<script type="text/javascript" src="libs/Blob.js/BlobBuilder.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>

<?php
$notification_data =new NotificationsForm;
        $emploee_data =new EmployeeForm;
        $kra=new KpiAutoSaveForm;
        $where = 'where Employee_id = :Employee_id';
        $list = array('Employee_id');
        $data = array(Yii::app()->user->getState('emp_id1'));
        $employee_data = $emploee_data->get_employee_data($where,$data,$list);

        $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
        $list1 = array('Employee_id','goal_set_year');
        $data2 = array(Yii::app()->user->getState('emp_id1'),'2016-2017');
        $kpi_data = $kra->get_kpi_list($where1,$data2,$list1);  
        //print_r($employee_data);die();
?>
<lable id='emp_id' style="display: none"><?php echo '111'; ?></lable>
<div id="target_goal" download>
<style type="text/css">
/*body{

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
}*/
</style>
<label style="font-size:8px;">Employee Name :  <?php if(isset($employee_data['0']['Emp_fname'])) { echo $employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']; }?></label><label style="float: right;font-size:8px;">Manager's Name :  <?php if(isset($employee_data['0']['Emp_fname'])) { echo $employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']; }?></label><br/>
<label style="font-size:8px;">Goalsheet Approval Date :  <?php echo date('d-M-Y'); ?></label>
<?php                                            if (isset($kpi_data)) { $cnt_num = 1; ?>
                                            <label class='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
                                          <?php     
                                        foreach ($kpi_data as $row) {  ?>
                                        <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption" style="font-weight:bold; font-size:8px; color: black;">                                                  
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   </div>
                                                <div class="tools" style="font-weight:bold; font-size:8px; color: black;">
                                                    <?php echo "KRA Category : ".$row['KRA_category']; ?><br>
                                                    <?php echo "KRA Weightage : ".$row['target']; ?>
                                                    <a href="javascript:;" class="collapse">
</a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll expand_goal<?php echo $cnt_num; ?>">                         
                                                <table  class="table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top:20px;border-collapse: collapse;color:black;border: 1px solid black;">
                                                    <thead>
                                                         <tr id="get_target_value">
                                                        <th style="background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> Key Performance Indicator (KPI) description  </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> Unit </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> KPI Weightage </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;">  Value </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (1)<br>Unsatisfactory <br>Performance </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (2)<br>Needs<br>Improvement </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (3)<br>Good Solid <br>Performance </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (4)<br>Superior <br>Performance </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;">(5)<br>Outstanding <br>Performance </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
                                if($row['KPI_target_value']=='')
                                {
                                 $KPI_target_value = '';
                                }
                                else
                                {
                                $KPI_target_value = explode(';',$row['KPI_target_value']); 
                                }

                                                                //$KPI_target_value = explode(';',$row['KPI_target_value']);
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
                                
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_data[$i]!='') { $cnt++;
                                if (!isset($KPI_target_value[$i])) {
                                                                        $KPI_target_value[$i] = '';                                                                       
                                                                    }
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td style="height: 30px;border: 1px solid black;font-size: 5px;"><?php echo $kpi_list_data[$i]; ?></td>
                                                                    <td style="border: 1px solid black;font-size: 5px;"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                        <?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php echo $kpi_list_target[$i]; ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php echo $KPI_target_value[$i]; ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php echo $KPI_target_value[$i]; ?></td>
                                                                                <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td style="border: 1px solid black;font-size: 5px;"><?php echo $value_data[$j]; ?></td>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                   ?>
                                                                                   <td style="border: 1px solid black;font-size: 5px;"><?php echo ""; ?></td>
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
                                        </div>

                                       </body>
                                       <script type="text/javascript">
                                           // $(function(){
                                           //  var specialElementHandlers = {
                                           //          '#editor': function (element,renderer) {
                                           //              return true;
                                           //          }
                                           //      };
                                           //      var doc = new jsPDF();
                                           //      doc.fromHTML($('#target').html(), 15, 15, {
                                           //          'width': 170,'elementHandlers': specialElementHandlers
                                           //      });
                                           //      var base_url = window.location.origin;
                                           //      var data = {
                                           //          doc : $('#target').html(),
                                           //          emp_id : $('#emp_id').text()
                                           //      };
                                           //      $.ajax({                            
                                           //      type : 'post',
                                           //      datatype : 'html',
                                           //      data : data,
                                           //      url : base_url+'/pmsuser/index.php?r=Setgoals/check_view1',
                                           //      success : function(data)
                                           //      {
                                           //          alert("dsfdsf");
                                           //      }
                                           //  });
                                           // });
                                       </script>
                                       </html>
