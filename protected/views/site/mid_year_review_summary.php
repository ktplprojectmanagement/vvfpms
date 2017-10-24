
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
        $data2 = array($Employee_id,'2017-2018');
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
<div id="mid_review_pdf">
<div id="target_goal">
    <!-- <h1>Hellooooooo</h1> -->

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
                                                        <th style="border: 1px solid black;text-align:center;">Employee Mid Review Status</th>
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
                                                                $emp_status = explode(';',$row['mid_emp_status']);
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
                                                                        <td style="border: 1px solid black;word-break: break-all;">

                                                                            <?php
                                                                            $emp_status1 = '';
                                                                           if (isset($employee_comment[$i]) && $employee_comment[$i] != '') {
                                                                                 $emp_status1 = $emp_status[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                               $emp_status1 = '';
                                                                            }
                                                                            // echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px'));
                                                                        ?><label><?php echo $emp_status1; ?></label>

                                                                        </td>
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
                            





<?php
$emp_id_goal1 = '';
if(isset($emp_data['0']['Employee_id']) && $emp_data['0']['Employee_id'] !='') 
{ 
$emp_id_goal1 = $emp_data['0']['Employee_id']; 
} 

      $model = new LoginForm; 
      $program_data =new ProgramDataForm;
      $employee = new EmployeeForm; 
      $IDPForm =new IDPForm;  
      $Compare_Designation =new CompareDesignationForm;   
      $program_data_result = $program_data->get_data();
      $where = 'where  goal_set_year =:goal_set_year';
        $list = array('goal_set_year');
        $data = array('2017-2018');
        $program_data_result = $program_data->get_kpi_data($where,$data,$list);
      //$Employee_id = Yii::app()->user->getState("Employee_id");
      $where = 'where Employee_id = :Employee_id';
      $list = array('Employee_id');
      $data = array(Yii::app()->user->getState('emp_id1'));
      $emp_data = $employee->get_employee_data($where,$data,$list);
      $designation_flag = 0;
 
      if(isset($emp_data['0']['Designation']) && $emp_data['0']['Designation'] != '') {
        $where = 'where designation = :designation';
        $list = array('designation');
        $data = array($emp_data['0']['Designation']);
        $Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
        if (isset($Compare_Designation1['0']['flag'])) {
          $designation_flag = $Compare_Designation1['0']['flag'];
        }
        
      }
      $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
      $list = array('Employee_id','goal_set_year');
      $data = array('123456','2017-2018');
      $IDP_data = $IDPForm->get_idp_data($where,$data,$list);
      //print_r(Yii::app()->user->getState('emp_id1'));die();
      if(isset($emp_data['0']['Reporting_officer1_id']))
      {
          $where = 'where Email_id = :Email_id';
          $list = array('Email_id');
          $data = array($emp_data['0']['Reporting_officer1_id']);
          $mgr_data = $employee->get_employee_data($where,$data,$list);
      }
     
      
//print_r($emp_data);die();
   ?>
   <lable id='emp_id' style="display: none"><?php echo 'vvf57e264fd8d3ef'; ?></lable>
<div id="target_idp">

<div>
<label style="font-size: 30px;margin-top: 100px">Individual
  Development Plan (WI.CHR.03 F.NO. 1)</label>
</div>
<table cellpadding="3" cellspacing="0" style="page-break-before: always">
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p style="margin-bottom: 0cm"><font face="Cambria, serif"><b>Employee</b></font></p>
      <p><font face="Cambria, serif"><b>Name</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                if(isset($emp_data)&& count($emp_data)>0){
                      if(isset($emp_data[0]['Emp_fname']) && isset($emp_data[0]['Emp_lname']))
                      {
                        echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
                      }                      
                      }?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Manager’s name</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php if(isset($mgr_data) && count($mgr_data)>0){
          if(isset($mgr_data[0]['Emp_fname']) && isset($mgr_data[0]['Emp_lname']))
                      {
                     echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];} }
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Employee Code</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php  if(isset($emp_data)&& count($emp_data)>0){
                 if(isset($emp_data[0]['Employee_id'])) { echo $emp_data[0]['Employee_id']; } }?> 
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Year </b></font>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                   $today = date('d-m-Y'); 
                 echo '2016-2017';?>
      </p>
    </td>
  </tr>
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><span lang="en-US"><i><b>Please
discuss your strengths and work related weaknesses with your manager
and identify your training needs. Your development will happen
through the following ways:</b></i></span></font></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><span lang="en-US"><b>Part
A: Development through Instructor led training in Classroom</b></span></font></p>
<table cellpadding="3" cellspacing="0">
  <col width="17">
  <col width="207">
  <col width="71">
  <col width="33">
  <col width="306">
  <tr valign="top">
    <td width="17" height="23" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">No</font></p>
    </td>
    <td width="207" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Name of program</font></p>
    </td>
    <td width="71" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Faculty</font></p>
    </td>
    <td width="33" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Days</font></p>
    </td>
    <td width="306" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Please explain why the training is
      needed</font></p>
    </td>
               <td width="306" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Progress on training programs (Employee)</font></p>
    </td>
                <td width="306" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Employee Comments</font></p>
    </td>
    <td width="306" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Progress on training programs (Manager)</font></p>
    </td>
    <td width="306" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">Manager Comments</font></p>
    </td>
  </tr>
  <?php
     $compulsory = '';
    if (isset($program_data_result) && count($program_data_result)>0) {
        for ($i=0; $i < count($program_data_result); $i++) {                                            
            if (isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) {
                if (isset($compulsory) && $compulsory == '') {
                   $compulsory = $i;
                }
                else
                {
                    $compulsory = $compulsory.';'.$i;
                }
            }
 //print_r("dfdf");die();
            ?>   
  <tr valign="top"> 
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php echo $i+1; ?> </td> 
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm" class="prog_name" id="<?php echo $i; ?>"> <?php if(isset($program_data_result[$i]['program_name'])) { echo $program_data_result[$i]['program_name']; } ?> <?php if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
            
            </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php if(isset($program_data_result[$i]['faculty_name'])) { echo $program_data_result[$i]['faculty_name']; } ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php if(isset($program_data_result[$i]['training_days'])) { echo $program_data_result[$i]['training_days']; } ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
            <?php 
            $cmnt = '';$review_state = '';$program_state1 = '';
            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                if(isset($cmt2) && count($cmt2)>0)
                {
                    for ($j=0; $j < count($cmt2); $j++) {
                      if(isset($cmt2[$j]))
                      {
                         $cmt1 = explode('?', $cmt2[$j]);
                         if(isset($cmt1[0]))
                         {
                             if ($i == $cmt1[0]) 
                             {                                                            
                              if(isset($cmt1[1]))
                               {
                                  $cmnt = $cmt1[1];
                               }
                            }
                         }
                      }
                       
                       
                    }
                }                
            }
            else
            {
                $cmnt = '';
            }
if (isset($IDP_data['0']['mid_prgrm_cmd']) && $IDP_data['0']['mid_prgrm_cmd'] != '') 
                                            {
if(isset($IDP_data['0']['mid_status']))
{
$program_state = explode(';',$IDP_data['0']['mid_status']);
                                              $program_cmnt = explode(';',$IDP_data['0']['mid_prgrm_cmd']);
if (isset($program_cmnt[$i])) {
                                                $review_state = $program_cmnt[$i];
                                                if (isset($program_state[$i])) {
                                                    $program_state1 = $program_state[$i];
                                                }
                                                
                                              }
}
                                            }
                                            else
                                            {
                                              $review_state = '';
                                              $program_state1 = '';
                                            }    


                echo $cmnt;
            ?> </td>
            <?php 
                $prg_emp_stat=explode(';',$IDP_data['0']['mid_emp_trn_prog_stat']);
                
                if(isset($prg_emp_stat[$i]) && $prg_emp_stat[$i]!=''){
                    $emp_stat = $prg_emp_stat[$i];
                }
                else{
                    $emp_stat='';
                }
            ?>
            <?php
            if (isset($IDP_data['0']['program_review_by_emp'])) {
                $prg_emp_cmt=explode(';', $IDP_data['0']['program_review_by_emp']);//print_r($prg_emp_cmt);
            }
            if (isset($prg_emp_cmt[$i])) {
              $emp_cmmt=explode('?',$prg_emp_cmt[$i]);
            }
                
                 
                
               if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                if(isset($cmt2) && count($cmt2)>0)
                {
                    for ($j=0; $j < count($cmt2); $j++) {
                      if(isset($cmt2[$j]))
                      {
                         $cmt1 = explode('?', $cmt2[$j]);
                         if(isset($cmt1[0]))
                         {
                             if ($i == $cmt1[0]) 
                             {                                                            
                              if(isset($cmt1[1]))
                               {
                                  $cmnt = $cmt1[1];
                               }
                            }
                         }
                      }
                       
                       
                    }
                }                
            }
            else
            {
                $cmnt = '';
            }

                if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_review_by_emp'])) {
                $prg_emp_cmt = explode(';', $IDP_data['0']['program_review_by_emp']);
                if(isset($prg_emp_cmt) && count($prg_emp_cmt)>0)
                {
                    for ($j=0; $j < count($prg_emp_cmt); $j++) {
                      if(isset($prg_emp_cmt[$j]))
                      {
                         $emp_cmt1 = explode('?', $prg_emp_cmt[$j]);
                         if(isset($emp_cmt1[0]))
                         {
                             if ($i == $emp_cmt1[0]) 
                             {                                                            
                              if(isset($emp_cmt1[1]))
                               {
                                  $emp_cmnt = $emp_cmt1[1];
                               }
                            }
                         }
                      }
                       
                       
                    }
                }                
            }
            else
            {
                $emp_cmnt = '';
            }

            ?>
            <td><?php if(isset($emp_stat)) { echo $emp_stat ; } ?></td>
            <td><?php if(isset($emp_cmnt)) { echo $emp_cmnt; } ?></td>
        <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                                                <?php if(isset($program_state1)) { echo $program_state1; } ?>
                                                </td>
                                                <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                                                <?php 
                                                   if($review_state) { echo $review_state; } 
                                                ?> </td>
      </tr>
      <?php 
      }
      }
      ?>
</table>
<p style="margin-bottom: 0cm; line-height: 100%"><font face="Cambria, serif"><lable style="color: red">*</lable>Mandatory
for all employees to attend this program</font></p>
<p style="margin-bottom: 0cm; line-height: 100%"><font face="Cambria, serif"><lable style="color: red">**</lable>Mandatory
for employees working at locations covered by the certifications</font></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><br/>
</p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><i>If
you need a program that is not mentioned above, please use the space
below. Please note this program may be offered if at least 20 people
request for it. </i></font>
</p>
<table cellpadding="3" cellspacing="0">
  <tr valign="top">
    <td  style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>No</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Topics required</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>No. of Days</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Internal faculty name</b></font></p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Program Completed</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Reviews</b></font></p>
    </td>
  </tr>
  <?php 
    $topic = '';$day = '';$faculty = '';
       if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
              $topic1 = explode(';',$IDP_data['0']['extra_topic']);
              if(isset($topic1[0]))
              {
                $topic = $topic1[0];
              }
              if($IDP_data['0']['extra_days'])
              {
                $day1 = explode(';',$IDP_data['0']['extra_days']);
              }
              
              
if(isset($day1[0]))
{
$day = $day1[0];
}
           if(isset($IDP_data['0']['extra_faculty']))
           {
            $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
           }   
              
              // $faculty1 = explode('?',$faculty2[0]); 
if(isset($faculty2[0]))
{
$faculty[$faculty2[0]] = array('selected' => 'selected');
 $reporting_list = new EmployeeForm();
             $records = $reporting_list->get_appraiser_list1();
             
                $where = 'where Email_id = :Email_id';
                $list = array('Email_id');
                $data = array($faculty2[0]);
                $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
}                         
                          
             
             
       }
       if(isset($IDP_data['0']['extra_faculty']))
        {
          $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
        }    
        if(isset($IDP_data['0']['extra_program_review_by_emp']))
        {
          $extra_program_review_by_emp = explode(';',$IDP_data['0']['extra_program_review_by_emp']);
          
        }
        if(isset($IDP_data['0']['extra_program_status']))
        {
          $extra_program_status = explode(';',$IDP_data['0']['extra_program_status']);
        }
  ?>


  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">1</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($topic)) { echo $topic; } ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if($day) { echo $day; } ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($faculty2[0])) { echo $faculty2[0]; } ?>
      </p>
    </td>
                <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($extra_program_status[0])) { echo $extra_program_status[0]; } ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($extra_program_review_by_emp[0])) { echo $extra_program_review_by_emp[0]; } ?>
      </p>
    </td>
  </tr>
  <?php
    $topic = '';$day = '';$faculty = '';
    if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
        $topic1 = explode(';',$IDP_data['0']['extra_topic']);
        if (isset($topic1[1])) {
            if (isset($topic1[1])) {
              $topic = $topic1[1];
            }
            if(isset($IDP_data['0']['extra_days']))
            {
               $day1 = explode(';',$IDP_data['0']['extra_days']);
            }
           
           
if(isset($day1[1]))
{
$day = $day1[1];
}
        



if(isset($faculty2[1]))
{
$faculty[$faculty2[1]] = array('selected' => 'selected');
 $reporting_list = new EmployeeForm();
             $records = $reporting_list->get_appraiser_list1();
             
                $where = 'where Email_id = :Email_id';
                $list = array('Email_id');
                $data = array($faculty2[1]);
                $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
}                         
            
        }
       
    }
  ?>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">1</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($topic)) { echo $topic; } ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($day)) { echo $day; } ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($faculty2[1])) { echo $faculty2[1]; } ?>
      </p>
    </td>
                <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($extra_program_status[1])) { echo $extra_program_status[1]; } ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($extra_program_review_by_emp[1])) { echo $extra_program_review_by_emp[1]; } ?>
      </p>
    </td>
  </tr>
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><i><u><b>Note:
Part B and Part C are to be filled by only AGM and above employees.</b></u></i></font></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><b>Part
B: Development through developmental relationships</b></font></p>
<table cellpadding="3" cellspacing="0">
  <?php
    $faculty3 = '';
        if (isset($IDP_data['0']['leader_name'])) {
          $faclty = explode(';',$IDP_data['0']['leader_name']);
          if (isset($faclty[0])) {
            $faculty3 = $faclty[0];
          }
          //$faculty3[$faclty[0]] = array('selected' => 'selected');
        }
  ?>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>No</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Relationship</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Name of leader</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Number of Meetings planned</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Target date</b></font></p>
    </td>
                <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Employee Program Status</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Employee Comments</b></font></p>
    </td>
  </tr>
  <tr valign="top">
    <td height="43" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">1</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Coaching</b></font><font face="Cambria, serif">
      through leader in own function for </font><font face="Cambria, serif"><b>functional</b></font><font face="Cambria, serif">
      inputs</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($faculty3)) { echo $faculty3; } ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php 
        $meet = '';
              if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                $meet = explode(';',$IDP_data['0']['meeting_planned']);
                if(isset($meet[0]))
{
$meet = $meet[0];
}
                
              }
              else
              {
                $meet = '';
              }
      ?>
      <?php echo $meet; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                     <?php if(isset($rel2[0])) { echo $rel2[0]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['mid_rel_prg_rev_emp'])) { $rel2 = explode(';',$IDP_data['0']['mid_rel_prg_rev_emp']); ?>
                     <?php if(isset($rel2[0])) { echo $rel2[0]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['rel_program_review_by_emp'])) { $rel2 = explode(';',$IDP_data['0']['rel_program_review_by_emp']); ?>
                     <?php if(isset($rel2[0])) { echo $rel2[0]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
  </tr>
  <?php 
    $faculty4 = '';
    if (isset($IDP_data['0']['leader_name'])) {
      $faclty = explode(';',$IDP_data['0']['leader_name']);
      if (isset($faclty[1])) {
        $faculty4 = $faclty[1];
      }
    }
    ?>
  <tr valign="top">
    <td height="42" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">2</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Coaching</b></font><font face="Cambria, serif">
      through leader in own function for </font><font face="Cambria, serif"><b>functional</b></font><font face="Cambria, serif">
      inputs</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($faculty4)) { echo $faculty4; } ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php
        $meet = '';
              if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                $meet = explode(';',$IDP_data['0']['meeting_planned']);
                if(isset($meet[1]))
{
$meet = $meet[1];
}
              }
              else
              {
                $meet = '';
              }
      ?>
      <?php echo $meet; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                     <?php if(isset($rel2[1])) { echo $rel2[1]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['mid_rel_prg_rev_emp'])) { $rel2 = explode(';',$IDP_data['0']['mid_rel_prg_rev_emp']); ?>
                     <?php if(isset($rel2[1])) { echo $rel2[1]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['rel_program_review_by_emp'])) { $rel2 = explode(';',$IDP_data['0']['rel_program_review_by_emp']); ?>
                     <?php if(isset($rel2[1])) { echo $rel2[1]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
  </tr>

</table>
 <?php 
 $project_title = '';
    if (isset($IDP_data['0']['project_title'])) {
      $project_title = $IDP_data['0']['project_title'];
    }
    else
    {
      $project_title = '';
    }
    ?>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><b>Part
C: Development through action learning projects</b></font></p>
<table cellpadding="3" cellspacing="0">
    <td height="42" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Title</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($project_title)) { echo $project_title; } ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td height="14" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Review date</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php
                  if (isset($IDP_data['0']['project_review_date'])) { ?>
                      <?php echo $IDP_data['0']['project_review_date']; ?>
                   <?php }
                    else
                    { ?>
                       <?php echo ""; ?>
                 <?php   }
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Target end date</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
         <?php
                  if (isset($IDP_data['0']['project_end_date'])) { ?>
                      <?php echo $IDP_data['0']['project_end_date']; ?>
                   <?php }
                    else
                    { ?>
                       <?php echo ""; ?>
                 <?php   }
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project scope</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
         <?php 
                  $project_scope = '';
                  if (isset($IDP_data['0']['project_scope'])) {
                    $project_scope = $IDP_data['0']['project_scope'];
                  }
                  else
                  {
                    $project_scope = '';
                  }
                  echo $project_scope;
                  ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td height="47" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project exclusions</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $project_exclusion = '';
                if (isset($IDP_data['0']['project_exclusion'])) {
                  $project_exclusion = $IDP_data['0']['project_exclusion'];
                }
                else
                {
                  $project_exclusion = '';
                }
                 echo $project_exclusion;
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project deliverables </b></font><font face="Cambria, serif">(Target
      at rating 3: good solid performance)</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                 $Project_deliverables = '';
                if (isset($IDP_data['0']['Project_deliverables'])) {
                  $Project_deliverables = $IDP_data['0']['Project_deliverables'];
                }
                else
                {
                  $Project_deliverables = '';
                }
                echo $Project_deliverables;
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>What is the employee expected to
      learn from this project</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
               $expected = '';
                if (isset($IDP_data['0']['learn_from_project'])) {
                  $expected = $IDP_data['0']['learn_from_project'];
                }
                else
                {
                  $expected = '';
                }
                echo $expected;
            ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Reviewer(s) name</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $review_name = '';
                if (isset($IDP_data['0']['Reviewer'])) {
                  $review_name = $IDP_data['0']['Reviewer'];
                }
                else
                {
                  $review_name = '';
                }
                echo $review_name;
                ?>
      </p>
    </td>
  </tr>
<tr>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Comments</b></font></p>
    </td>
    
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $review_name = '';
                if (isset($IDP_data['0']['project_mid_review_by_emp'])) {
                  $project_mid_review_by_emp = $IDP_data['0']['project_mid_review_by_emp'];
                }
                else
                {
                  $project_mid_review_by_emp = '';
                }
                echo $project_mid_review_by_emp;
                ?>
      </p>
    </td>
</tr>
<tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Status</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $review_name = '';
                if (isset($IDP_data['0']['project_mid_status'])) {
                  $review_name = $IDP_data['0']['project_mid_status'];
                }
                else
                {
                  $review_name = '';
                }
                echo $review_name;
                ?>
      </p>
    </td>
  </tr>
<tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Review</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $review_name = '';
                if (isset($IDP_data['0']['project_mid_review'])) {
                  $review_name = $IDP_data['0']['project_mid_review'];
                }
                else
                {
                  $review_name = '';
                }
                echo $review_name;
                ?>
      </p>
    </td>
  </tr>
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><br/>
<br/>

</p>
</div>
</div>