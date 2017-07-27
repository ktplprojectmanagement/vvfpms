<!DOCTYPE html>
<html>
<head>  
  
</head>

<body>

<?php
Yii::app()->controller->renderPartial('//site/all_js');
?>

<script>
$(function(){
$("#getdata").click(function(){
var base_url = window.location.origin;
save_detail_pdf();
});
});
function save_detail_pdf()
                { 
                    var base_url = window.location.origin;
                    var data = {
                        doc : $('#year_end_emppdf').html(),
                        emp_id : $('#emp_id').text()
                    };
                    $.ajax({                            
                    type : 'post',
                    datatype : 'html',
                    data : data,
                    url : base_url+'/index.php?r=Checkattach/check_view11',
                    success : function(data)
                    {

                        location.href = base_url+'/Goalsheet_docs/yearendgoalsheet'+'_'+$("#femp_name").text()+'_'+$("#lemp_name").text()+'.pdf'; 
                    }
                    });                 
                }
</script>
<button id="getdata">Download</button>
<div id="year_end_emppdf">
<?php
$notification_data =new NotificationsForm;
        $emploee_data =new EmployeeForm;
        $kra=new KpiAutoSaveForm;
        $where = 'where Employee_id = :Employee_id';
        $list = array('Employee_id');
        $data = array(Yii::app()->user->getState("Employee_id"));
        $employee_data = $emploee_data->get_employee_data($where,$data,$list);

        $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
        $list1 = array('Employee_id','goal_set_year');
        $data2 = array(Yii::app()->user->getState("Employee_id"),'2016-2017');
        $kpi_data = $kra->get_kpi_list($where1,$data2,$list1);  
        //print_r($employee_data);die();

$where = 'where Email_id = :Email_id';
      $list = array('Email_id');
      $data = array($employee_data['0']['Reporting_officer1_id']);
      $mgr_data = $emploee_data->get_employee_data($where,$data,$list);
?>
<lable id='emp_id' style="display: none"><?php echo Yii::app()->user->getState("Employee_id"); ?></lable>
<lable id='femp_name' style="display: none"><?php echo $employee_data['0']['Emp_fname']; ?></lable>
<lable id='lemp_name' style="display: none"><?php echo $employee_data['0']['Emp_lname']; ?></lable>
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
<label style="font-size:8px;">Employee Name :  <?php if(isset($employee_data['0']['Emp_fname'])) { echo $employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']; }?></label><label style="float: right;font-size:8px;">Manager's Name :  <?php if(isset($mgr_data) && count($mgr_data)>0){
                     echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                ?></label><br/>
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
 <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;">Actual achievement of year end</th>

 <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;">Appraisee comment on actual achievement</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
 $year_end_achive = explode(';',$row['year_end_achieve']); 
 $year_end_achive1 = explode(';',$row['year_end_reviewa']); 
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
<td style="height: 30px;border: 1px solid black;font-size: 5px;"><?php echo $year_end_achive[$i]; ?></td>
<td style="height: 30px;border: 1px solid black;font-size: 5px;"><?php echo $year_end_achive1[$i]; ?></td>
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
                                       
                                       </html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 5.0.2.2 (Linux)"/>
	<meta name="author" content="Charles Carvalho"/>
	<meta name="created" content="2016-04-26T10:03:00"/>
	<meta name="changedby" content="Charles Carvalho"/>
	<meta name="changed" content="2016-05-17T10:25:00"/>
	<meta name="AppVersion" content="14.0000"/>
	<meta name="DocSecurity" content="0"/>
	<meta name="HyperlinksChanged" content="false"/>
	<meta name="LinksUpToDate" content="false"/>
	<meta name="ScaleCrop" content="false"/>
	<meta name="ShareDoc" content="false"/>
	<style type="text/css">
		@page { margin-left: 1.27cm; margin-right: 1.27cm; margin-top: 1.25cm; margin-bottom: 1.27cm }
		p { margin-bottom: 0.25cm; direction: ltr; line-height: 120%; text-align: left; orphans: 2; widows: 2 }
	</style>
</head>
<body lang="en-IN" dir="ltr">
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
      
      //$Employee_id = Yii::app()->user->getState("Employee_id");
      $where = 'where Employee_id = :Employee_id';
      $list = array('Employee_id');
      $data = array(Yii::app()->user->getState("Employee_id"));
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
      $data = array(Yii::app()->user->getState("Employee_id"),'2016-2017');
      $IDP_data = $IDPForm->get_idp_data($where,$data,$list);
      //print_r(Yii::app()->user->getState('emp_id1'));die();
      $where = 'where Email_id = :Email_id';
      $list = array('Email_id');
      $data = array($emp_data['0']['Reporting_officer1_id']);
      $mgr_data = $employee->get_employee_data($where,$data,$list);
//print_r($emp_data);die();
   ?>
   <lable id='emp_id' style="display: none"><?php echo 'vvf57e264fd8d3ef'; ?></lable>
<div id="target_idp">

<div>
<label style="font-size: 24px;margin-top: 100px">Individual
	Development Plan (WI.CHR.03 F.NO. 1)</label>
</div><br>
<table cellpadding="3" cellspacing="0" style="page-break-before: always;">
	<tr valign="top">
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p style="margin-bottom: 0cm"><font face="Cambria, serif"><b>Employee</b></font></p>
			<p><font face="Cambria, serif"><b>Name</b></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
				<?php 
	              if(isset($emp_data)&& count($emp_data)>0){
	                    echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
	                    }?>
			</p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif"><b>Manager’s name</b></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
				<?php if(isset($mgr_data) && count($mgr_data)>0){
                     echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
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
                   echo $emp_data[0]['Employee_id'];   }?> 
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
<table cellpadding="3" cellspacing="0" style="width: 43px;">
	<col width="17">
	<col width="207">
	<col width="71">
	<col width="33">
	<col width="306">
	<tr valign="top">
		<td width="30" height="23" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif">No</font></p>
		</td>
		<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif">Name of program</font></p>
		</td>
		<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif">Faculty</font></p>
		</td>
		<td width="30" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif">Days</font></p>
		</td>
		<td width="100" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif">Please explain why the training is
			needed</font></p></td>
<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
<p><font face="Cambria, serif">Program completed</font></p></td><td width="100" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
<p><font face="Cambria, serif">Comments</font></p></td>
		</td>
	</tr>
	<?php
     $compulsory = '';
    if (isset($program_data_result) && count($program_data_result)>0) {
        for ($i=0; $i < count($program_data_result); $i++) {                                            
            if ($program_data_result[$i]['need'] == 1) {
                if ($compulsory == '') {
                   $compulsory = $i;
                }
                else
                {
                    $compulsory = $compulsory.';'.$i;
                }
            }

            ?>   
	<tr valign="top">	
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php echo $i+1; ?> </td>	
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm" class="prog_name" id="<?php echo $i; ?>"> <?php echo $program_data_result[$i]['program_name']; ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
            
            </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php echo $program_data_result[$i]['training_days']; ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
            <?php 
            $cmnt = '';$prg_state1 = '';$prg_state_com1 = '';
            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                $prg_state = explode('^', $IDP_data['0']['Year_end_prg_status']);
$prg_state_com = explode('^', $IDP_data['0']['Year_end_prg_comments']);
                for ($j=0; $j < count($cmt2); $j++) {
                    $cmt1 = explode('?', $cmt2[$j]);
                    if ($i == $cmt1[0]) {                                                            
                         $cmnt = $cmt1[1];$prg_state1 = $prg_state[$j];$prg_state_com1 = $prg_state_com[$j];
                    }
                }
            }
            else
            {
                $cmnt = '';
            }

                echo $cmnt;
            ?> </td>
<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"><?php echo $prg_state1; ?>
</td>
<td width="100" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"><?php echo $prg_state_com1; ?>
</td>
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
	            $topic = $topic1[0];
	            $day1 = explode(';',$IDP_data['0']['extra_days']);
$finaltopic = explode('^',$IDP_data['0']['Extra_year_end_prg_status']);
$finaltopic_cmt = explode('^',$IDP_data['0']['Extra_year_end_prg_comments']);
if(isset($day1[0]))
{
$day = $day1[0];
}
	            
	            $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
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
	?>
	<tr valign="top">
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif">1</font></p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php echo $topic; ?>
			</p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php echo $day; ?>
			</p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($faculty2[0])) { echo $faculty2[0]; } ?>
			</p>
		</td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($finaltopic[0])) { echo $finaltopic[0]; } ?>
			</p>
		</td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($finaltopic_cmt[0])) { echo $finaltopic_cmt[0]; } ?>
			</p>
		</td>
	</tr>
	<?php
		$topic = '';$day = '';$faculty = '';$finaltopic1 = '';$finaltopic_cmt1 = '';
		if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
		    $topic1 = explode(';',$IDP_data['0']['extra_topic']);
$finaltopic = explode('^',$IDP_data['0']['Extra_year_end_prg_status']);
$finaltopic_cmt = explode('^',$IDP_data['0']['Extra_year_end_prg_comments']);
//print_r($IDP_data);die();
		    if (isset($topic1[1])) {
		       $topic = $topic1[1];
		        $day1 = explode(';',$IDP_data['0']['extra_days']);
if(isset($day1[1]))
{
$day = $day1[1];
}
		        
		        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
		        // $faculty1 = explode('?',$faculty2[0]);  
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
			<p><font face="Cambria, serif">2</font></p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php echo $topic; ?>
			</p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php echo $day; ?>
			</p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($faculty2[1])) { echo $faculty2[1]; } ?>
			</p>
		</td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($finaltopic[1])) { echo $finaltopic[1]; } ?>
			</p>
		</td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($finaltopic_cmt[1])) { echo $finaltopic_cmt[1]; } ?>
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
$relfinaltopic = explode('^',$IDP_data['0']['Relationship_year_end_status']);
$relfinaltopic_cmt = explode('^',$IDP_data['0']['Relationship_year_end_comments']);
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
			<p><font face="Cambria, serif"><b>Program Completed</b></font></p>
		</td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif"><b>Reviews</b></font></p>
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
			<?php echo $faculty3; ?>
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
			<?php if(isset($relfinaltopic[0])) { echo $relfinaltopic[0]; } ?>
			</p>
		</td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($relfinaltopic_cmt[0])) { echo $relfinaltopic_cmt[0]; } ?>
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
			<?php echo $faculty4; ?>
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
			<?php if(isset($relfinaltopic[1])) { echo $relfinaltopic[1]; } ?>
			</p>
		</td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><br/>
			<?php if(isset($relfinaltopic_cmt[1])) { echo $relfinaltopic_cmt[1]; } ?>
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
			<?php echo $project_title; ?>
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
<tr valign="top">
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif"><b>Project Status
</b></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><?php if (isset($IDP_data['0']['Year_end_prog_status'])) { echo $IDP_data['0']['Year_end_prog_status']; } ?></p>
		</td>
	</tr>
<tr valign="top">
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><font face="Cambria, serif"><b>Project Status Comments</b></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
			<p><?php if (isset($IDP_data['0']['Year_end_prog_comments'])) { echo $IDP_data['0']['Year_end_prog_comments']; } ?></p>
		</td>
	</tr>
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><br/>
<br/>

</p>
</div>
</body>
 
</html>

