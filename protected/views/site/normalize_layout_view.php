
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<html>
  <head>
<style>
.DTFC_LeftBodyLiner
{
top: 2px;
}
#example_filter
{
float:left;
z-index: 1000;
margin-bottom: -58px;
position: relative;
}

</style>

       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
function standard_chart(f,g,h,i,j)
{
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
          ['Rating', 'Target Bell Curve'],
          ['1',  +f],
          ['2',  +g],
          ['3',  +h],
          ['4',  +i],
          ['5',  +j]
        ]);

        var options = {
          title: 'Normalization',
          hAxis: {title: 'Rating',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
'width':600,
  'height':500
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
}
    </script>
        <script type="text/javascript">
function get_data(f,g,h,i,j,a,b,c,d,e)
        { 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data1 = google.visualization.arrayToDataTable([
          ['Rating', 'Target Bell Curve', 'Actual'],
          ['1',   +f,   +a],
          ['2',    +g,  +b],
          ['3',   +h,    +c],
          ['4',  +i,    +d],
          ['5',   +j,   +e]
        ]);

        var options = {
          title: 'Normalization',
          hAxis: {title: 'Rating',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
'width':600,
  'height':500
        };
        var chart1 = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart1.draw(data1, options);
      }
    }

    </script>
  </head>
  <body>  
<lable id="pending_list" style="display:none"><?php if(isset($kpi_data_pending) && $kpi_data_pending>0){ echo '1'; } ?></lable>
<?php

  $BU_form = new BUHeadForm;
        $plant_head = new PlantHeadForm;
        $employee = new EmployeeForm;

 if(Yii::app()->user->getState("employee_email") == "amit.sanas@vvfltd.com" || Yii::app()->user->getState("employee_email") == "mohit.sharma@vvfltd.com")
        {
            $where = 'where Email_id = :Email_id';
            $list = array('Email_id');
            $data = array(Yii::app()->user->getState("employee_email"));
            $is_bu = $employee->get_employee_data($where,$data,$list);
            //print_r($is_bu);die();
        }
        else
        {
            $where = 'where cluster_appraiser = :cluster_appraiser';
        	$list = array('cluster_appraiser');
        	$data = array(Yii::app()->user->getState("employee_email"));
        	$cluster_head = $employee->get_employee_data($where,$data,$list);
        	
            $where = 'where bu_head_email = :bu_head_email';
            $list = array('bu_head_email');
            $data = array(Yii::app()->user->getState("employee_email"));
            $is_bu = $employee->get_employee_data($where,$data,$list);
            
            $where = 'where email_id = :email_id';
            $list = array('email_id');
            $data = array(Yii::app()->user->getState("employee_email"));
            $is_plant_head = $employee->get_employee_data($where,$data,$list);
        }
?> 
<style>
.dataTables_scrollBody
{
height : '';
}
#floater1 {
    position: absolute;
    top: 100px;
    right: 41px;
    width: 150px;
    height: 38px;
    -webkit-transition: all 2s ease-in-out;
    transition: all 2s ease-in-out;
    z-index: 1;
    border-radius: 3px 0 0 3px;
    padding: 10px;
    background-color: #41a6d9;
    color: white;
    text-align: center;
    box-sizing: border-box;cursor:pointer;
}
#err_box {
    position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
        width: 367px;
    height: 60px;
    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;
    right: 45%;
background-color: #AB5454;
color: #FFF;
font-weight: bold;   
}
</style>
<div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
       
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->

                <div class="page-content">
                    <div class="container" style="width: 100%;">
                      <div class="" style="width: 100%;">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet box green" style="background-color: rgb(38, 70, 109);border: 1px solid rgb(38, 70, 109);">
                                            <div class="portlet-title" style="background-color: rgb(38, 70, 109);border: 1px solid rgb(38, 70, 109);">
                                                <div class="caption">
                                                   </div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
<table class="table table-striped table-bordered table-hover dt-responsive sample_555"id="sample_5" style="display:none;width:100%">
<thead>
<tr role="row" style="height: 42px;background-color: #154593;color: #fff;">
    <th style="width:100px;max-width:100px;min-width:100px;padding:0px">Employee ID</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Employee Name</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Quantitative<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Qualitative<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Round <br>Rating</th>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($cluster_head) && count($cluster_head)>0) || (isset($is_plant_head) && count($is_plant_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>

<th style="width:90px;max-width:90px;min-width:90px;padding:0px">Plant <br>Head<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Plant Head <br>Comments</th>
<?php } ?>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($cluster_head) && count($cluster_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Cluster<br>Head<br> Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Cluster Head<br> Comments</th>
<?php } ?>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($is_bu) && count($is_bu)>0)) { ?>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">BU<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">BU Head <br>Comments</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Special <br>Comments</th>
<?php } ?>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Cluster Name</th>
<th id="f1">Employee Name</th>
<th class="">Reporting manager</th>
<th class="">Promotion Recommended</th>
</tr>
</thead>
<tbody id="dept_based_emp">
<lable id="total_emp_count" style="display:none"><?php if (isset($employee_list) && count($employee_list)>0) { echo count($employee_list); } ?></lable>
<?php
if (isset($employee_list)) { ?>                                                        
<?php 


$cnt = 0;
foreach ($employee_list as $row) {
//print_r($employee_list);die();
    
$normalize_rating =new NormalizeRatingForm;
$employee = new EmployeeForm;
$where1 = 'where Employee_id = :Employee_id ORDER BY `changes_date` DESC';
$list1 = array('Employee_id');
$data2 = array($row['Employee_id']);
$normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
$promotion = new PromotionForm;
$where1 = 'where Employee_id = :Employee_id';
$list1 = array('Employee_id');
$data2 = array($row['Employee_id']);
$promo_data = $promotion->get_employee_data($where1,$data2,$list1); 


$where1 = 'where Employee_id = :Employee_id and bu_rating != :bu_rating and bu_rating != :bu_rating ORDER BY `changes_date` DESC';
$list1 = array('Employee_id','bu_rating','bu_rating');
$data2 = array($row['Employee_id'],'',0);
$normalize_rating_data1 = $normalize_rating->get_setting_data($where1,$data2,$list1); 

$where1 = 'where Employee_id = :Employee_id and other_comments != :other_comments and other_comments != :other_comments ORDER BY `changes_date` DESC';
$list1 = array('Employee_id','other_comments','other_comments');
$data2 = array($row['Employee_id'],'','undefined');
$normalize_rating_data2 = $normalize_rating->get_setting_data($where1,$data2,$list1); 
if($row['Employee_id'] == '10002386')
{
//print_r($IDPForm_data);die();
}
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($row['Reporting_officer1_id']);
$apr_name = $employee->get_employee_data($where,$data,$list);
if($row['Reporting_officer2_id'] != '')
{
    if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (Yii::app()->user->getState("employee_email") == 'mohit.sharma@vvfltd.com'))
    {
       
    }
    else
    {
        $where = 'where Email_id = :Email_id';
        $list = array('Email_id');
        $data = array($row['Reporting_officer2_id']);
        $apr_name1 = $employee->get_employee_data($where,$data,$list);
    }

}
else
{
$apr_name1 == '';
}

$day = 31;
$month = 03;
$year = date('Y');

$date = mktime(12, 0, 0, $month, $day, $year);
//print_r($IDPForm_data);die();
?>    
<lable id="emp_id-<?php echo $cnt; ?>" style="display:none"><?php echo $row['Employee_id']; ?></lable>                                                       
<tr>  
<td><?php echo $row['Employee_id']; ?></td>
<td <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['Emp_fname']." ".$row['Emp_lname']; ?></td> 
<td id="qualrate-<?php echo $cnt; ?>"><?php if(isset($row['reporting_1_change']) && $row['reporting_1_change'] != ''){ echo $IDPForm_data[$cnt]['0']['manager_1_rate']+$IDPForm_data[$cnt]['0']['manager_2_rate']; }else{ echo $IDPForm_data[$cnt]['0']['performance_rating']; }?></td>
<td><?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']!=''){ echo $IDPForm_data[$cnt]['0']['Tota_score']; }?></td>
<td><?php if(isset($row['reporting_1_change']) && $row['reporting_1_change'] != ''){ echo round($IDPForm_data[$cnt]['0']['manager_1_rate']+$IDPForm_data[$cnt]['0']['manager_2_rate']); }else{ echo round($IDPForm_data[$cnt]['0']['performance_rating']); }?></td>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') ||  (isset($is_bu) && count($is_bu)>0)) { ?>
<td style="width: 85px;"><input style="width: 85px;"  class="form-control pop chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_rating']) && $normalize_rating_data[$cnt]['plant_head_rating'] != '' && $normalize_rating_data[$cnt]['plant_head_rating'] != '0') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_rating']) && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop comm1 plant_head_comments" id="plant_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_comment'])) { echo $normalize_rating_data[$cnt]['plant_head_comment']; }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_comment'])) { echo $normalize_rating_data[$cnt]['plant_head_comment']; }else { echo ""; } ?></label></td>
<?php }else if((isset($is_plant_head) && count($is_plant_head)>0) && (date("Y",strtotime($row['rere_date']))==date("Y", $date))) { ?>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_rating'])  && $normalize_rating_data[$cnt]['plant_head_rating'] != '' && $normalize_rating_data[$cnt]['plant_head_rating'] != '0') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_rating'])  && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop plant_head_comments" id="plant_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_comment'])) { echo $normalize_rating_data[$cnt]['plant_head_comment']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_comment'])) { echo $normalize_rating_data[$cnt]['plant_head_comment']; }else { echo ""; } ?></label></td>
<?php } else if(isset($is_plant_head) && count($is_plant_head)>0) { ?>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_rating'])  && $normalize_rating_data[$cnt]['plant_head_rating'] != '' && $normalize_rating_data[$cnt]['plant_head_rating'] != '0') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_rating'])  && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop plant_head_comments" id="plant_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_comment'])) { echo $normalize_rating_data[$cnt]['plant_head_comment']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_comment'])) { echo $normalize_rating_data[$cnt]['plant_head_comment']; }else { echo ""; } ?></label></td>
<?php } ?>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') ||  (isset($is_bu) && count($is_bu)>0)) { ?>
<td style="width: 85px;"><input style="width: 85px;"  class="form-control pop chk_number cluster_head_data-<?php echo $cnt; ?>" id="cluster_head_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '' && $normalize_rating_data['0']['rating'] != '0')) { echo round($normalize_rating_data['0']['rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop comm1 cluster_head_comment" id="cluster_head_comment-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['cluster_head_comments']) && $normalize_rating_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_rating_data['0']['cluster_head_comments']; }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data['0']['cluster_head_comments']) && $normalize_rating_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_rating_data['0']['cluster_head_comments']; }else { echo ""; } ?></label></td>
<?php }else if((isset($cluster_head) && count($cluster_head)>0) && (date("Y",strtotime($row['retire_date']))==date("Y", $date))) { ?>
<td style="width: 85px;"><input style="width: 85px;"  class="form-control pop chk_number cluster_head_data-<?php echo $cnt; ?>" id="cluster_head_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '' && $normalize_rating_data['0']['rating'] != '0')) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text"><lable style="display:none" class="<?php echo $cnt; ?>"><?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></lable></td>

<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop cluster_head_comment" id="cluster_head_comment-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['cluster_head_comments']) && $normalize_rating_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_rating_data['0']['cluster_head_comments']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_rating_data['0']['cluster_head_comments']) && $normalize_rating_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_rating_data['0']['cluster_head_comments']; }else { echo ""; } ?></label></td>
<?php } else if(isset($cluster_head) && count($cluster_head)>0) { ?>
<td style="width: 85px;"><input style="width: 85px;"  class="form-control pop chk_number cluster_head_data-<?php echo $cnt; ?>" id="cluster_head_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '' && $normalize_rating_data['0']['rating'] != '0')) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text"><lable style="display:none" class="<?php echo $cnt; ?>"><?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></lable></td>

<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop cluster_head_comment" id="cluster_head_comment-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['cluster_head_comments']) && $normalize_rating_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_rating_data['0']['cluster_head_comments']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_rating_data['0']['cluster_head_comments']) && $normalize_rating_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_rating_data['0']['cluster_head_comments']; }else { echo ""; } ?></label></td>
<?php } ?>


<?php if(((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($is_bu) && count($is_bu)>0)) && (date("Y",strtotime($row['retire_date']))==date("Y", $date))) { ?>
<td style="width: 95px;"><input style="width: 85px;" disabled  class="form-control pop chk_number performance_data-<?php echo $cnt; ?>" id="performance_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" maxlength="1"><lable style="display:none" class="<?php echo $cnt; ?>" id="performance_data1-<?php echo $cnt; ?>"><?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></lable></td>

<td style="width: 95px;"><input style="width: 85px;" disabled  class="form-control comm1 pop bu_head_comments" id="bu_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;" disabled type="text" class="form-control pop" id="other<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom"value="<?php if(isset($normalize_rating_data['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?>"><label style="display:none"><?php if(isset($normalize_rating_data2['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?></label></td>
<?php }else if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($is_bu) && count($is_bu)>0)) {
?>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop chk_number performance_data-<?php echo $cnt; ?>" id="performance_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" maxlength="1"><lable style="display:none" class="<?php echo $cnt; ?>" id="performance_data1-<?php echo $cnt; ?>"><?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></lable></td>

<td style="width: 95px;"><input style="width: 85px;"  class="form-control comm1 pop bu_head_comments" id="bu_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;"  type="text" class="form-control pop" id="other<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom"value="<?php if(isset($normalize_rating_data['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?>"><label style="display:none"><?php if(isset($normalize_rating_data2['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?></label></td>
<?php
} ?>
<td><?php if(isset($row['cluster_name'])) { echo $row['cluster_name']; } ?></td>
<td><?php if(isset($row['Emp_fname'])) { echo $row['Emp_fname']." ".$row['Emp_lname']; } ?></td>
<td>
<?php 
$employee = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($row['Reporting_officer1_id']);
$apr_data_get = $employee->get_employee_data($where,$data,$list);

if(isset($apr_data_get['0']['Emp_fname'])) { echo $apr_data_get['0']['Emp_fname']." ".$apr_data_get['0']['Emp_lname']; } ?>
</td>
<td><?php if(isset($promo_data['0']['update_flag']) && $promo_data['0']['update_flag'] != '2') { echo "<br>";echo "Yes"; }else { echo "No"; } ?></td>
</tr>                                                       
<?php $cnt++;   }
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
<div class="modal fade" id="normalize_msg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width: 65%;">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">
								Alert
							</h4>
						</div>
						<div class="modal-body">
							<table id="example1" class="table" cellspacing="0" width="100%">
        <thead>
            <tr>
                 <th >Employee Id</th>
                                                            <th>Employee Name</th>
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Reporting Manager</th>
            </tr>
        </thead>        
        <tbody>
<?php
if(isset($pending_list) && count($pending_list)>0)
{
for($i=0;$i<count($pending_list);$i++)
{
if($pending_list[$i]['0'] != '')
{
?>
<tr>
<td>
 <?php echo $pending_list[$i]['0']['Employee_id'] ;?>
</td>
<td>
<?php echo $pending_list[$i]['0']['Emp_fname']." ".$pending_list[$i]['0']['Emp_lname']; ?>
</td>
<td>
<?php echo $pending_list[$i]['0']['Designation'] ;?>
</td>
<td>
<?php echo $pending_list[$i]['0']['Department'] ;?>
</td>
<td>
<?php 
$employee = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($pending_list[$i]['0']['Reporting_officer1_id']);
$apr_data_get1 = $employee->get_employee_data($where,$data,$list);

echo $apr_data_get1['0']['Emp_fname']." ".$apr_data_get1['0']['Emp_lname'] ;
?>
</td>
</tr>
<?php
}
}
}
?>
        </tbody>
    </table>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default"  id="get_complete1">
								Cancel
							</button> 
							<button type="button" class="btn btn-primary" id="get_complete">
								OK
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
<div class="modal fade" id="normalize_msg1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">
								Success
							</h4>
						</div>
						<div class="modal-body">
							Rating Successfully updated
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default"  data-dismiss="modal">
								Close
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
<div class="modal fade" id="confrm_box" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">
								Alert
							</h4>
						</div>
						<div class="modal-body">
							Do you really want to change the this rating?
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default"  data-dismiss="modal">
								Cancel
							</button> 
							<button type="button" class="btn btn-primary" id="chk_number_ok">
								OK
							</button>
						</div>
					</div>
					
				</div>
				
			</div>

<div id="err_box" style="display:none;position: fixed;"></div>
<div class="modal fade" id="chart_model" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width: 1232px;">
					<div class="modal-content" style="width: 1283px;">
						<div class="modal-header">
							 
							
							<h4 class="modal-title" id="myModalLabel">
								Bell Curve
							</h4>
						</div>
						<div class="modal-body">
<div class="col-md-12">
			<div class="row">
				<div class="col-md-7" style="margin-left: 10px;">
<div id="chart_div"></div>
</div>
<div class="col-md-5">
<table cellspacing="0" border="0">
	<colgroup span="14" width="80"></colgroup>
	
	<tr>
		<td height="20" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><b><font color="#000000"><br></font></b></td>
		<td align="left" valign=bottom><b><font color="#000000"><br></font></b></td>
		<td align="left" valign=bottom><b><font color="#000000"><br></font></b></td>
		<td align="left" valign=bottom><b><font color="#000000"><br></font></b></td>
		<td align="left" valign=bottom><b><font color="#000000"><br></font></b></td>
		</tr>

	<tr style="background-color: rgba(0, 138, 255, 0.24);">
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="100" align="center" valign=middle ><b><font>Rating</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font color="#000000">Target Distribution%</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font>Target Distribution<br>Nos.</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font>Actual </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font>Actual %</font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font>Deviation %<br>(Allowed)</font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font>Deviation %<br>(Actual)</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font>Deviation<br>(Actual minus Target)</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle sdval="1" sdnum="16393;"><b><font color="#000000">1</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0.05" sdnum="16393;0;0%"><b><font color="#000000">5%</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="0" sdnum="16393;0;0"><font color="#000000"  id="actual1"></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom  sdval="0.7" sdnum="16393;0;0" ><font color="#000000" id="actual_cnt1">1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="16393;0;0"><font color="#000000"  id="actual_per_cnt1"></font></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_allow1"></font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_actual1"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev1"></font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle sdval="1" sdnum="16393;"><b><font color="#000000">2</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0.05" sdnum="16393;0;0%"><b><font color="#000000">10%</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="0" sdnum="16393;0;0"><font color="#000000"  id="actual2"></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom  sdval="0.7" sdnum="16393;0;0" ><font color="#000000" id="actual_cnt2">2</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="16393;0;0"><font color="#000000"  id="actual_per_cnt2"></font></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_allow2"></font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_actual2"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev2"></font></b></td>
		</tr>
	<tr>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle  sdval="4" sdnum="16393;"><b><font color="#000000">3</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0.2" sdnum="16393;0;0%"><b><font color="#000000">60%</font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="4" sdnum="16393;0;0"><font color="#000000"  id="actual3"></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom  sdval="2.8" sdnum="16393;0;0"><font color="#000000" id="actual_cnt3">3</font></td>
		
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="30.7692307692308" sdnum="16393;0;0"><font color="#000000" id="actual_per_cnt3"></font></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_allow3"></font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_actual3"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="1.2" sdnum="16393;0;0"><b><font color="#0070C0"  id="dev3"></font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle  sdval="4" sdnum="16393;"><b><font color="#000000">4</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0.2" sdnum="16393;0;0%"><b><font color="#000000">20%</font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="4" sdnum="16393;0;0"><font color="#000000"  id="actual4"></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom  sdval="2.8" sdnum="16393;0;0"><font color="#000000" id="actual_cnt4">3</font></td>
		
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="30.7692307692308" sdnum="16393;0;0"><font color="#000000" id="actual_per_cnt4"></font></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_allow4"></font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_actual4"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="1.2" sdnum="16393;0;0"><b><font color="#0070C0"  id="dev4"></font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle  sdval="4" sdnum="16393;"><b><font color="#000000">5</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0.2" sdnum="16393;0;0%"><b><font color="#000000">5%</font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="4" sdnum="16393;0;0"><font color="#000000"  id="actual5"></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom  sdval="2.8" sdnum="16393;0;0"><font color="#000000" id="actual_cnt5">3</font></td>
		
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="30.7692307692308" sdnum="16393;0;0"><font color="#000000" id="actual_per_cnt5"></font></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_allow5"></font></b></td>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="2.8" sdnum="16393;0;0"><b><font color="#0070C0" id="dev_actual5"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle  sdval="1.2" sdnum="16393;0;0"><b><font color="#0070C0"  id="dev5"></font></b></td>
		</tr>
	<tr style="background-color: rgba(0, 138, 255, 0.24);">
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle><b><font color="#000000">Total</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1" sdnum="16393;0;0%"><b><font color="#000000"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="13" sdnum="16393;0;0"><b><font color="#000000" id="emp_actual_total"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="13" sdnum="16393;"><b><font color="#000000" id="avg_actual"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdnum="16393;0;0%"><b><font color="#000000"  id="ftotal"><br></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdnum="16393;0;0"><b><font color="#000000"  id="total_dev1"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdnum="16393;0;0"><b><font color="#000000" id="total_dev2"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdnum="16393;0;0"><b><font color="#000000" id="total_dev"><br></font></b></td>
		</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		</tr>
</table>
</div>
</div>
</div>
							
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Close
							</button> 
						</div>
					</div>
					
				</div>
				
			</div>

<style>
input[placeholder], [placeholder], *[placeholder] {
    color: #c8cfdf !important;
}
</style>

 <script src="//code.jquery.com/jquery-1.12.4.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>



<script type='text/javascript' src='https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script type='text/javascript' src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js'></script>
<script type='text/javascript' src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js'></script>
<script type='text/javascript' src='https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js'></script>
<script type='text/javascript' src='https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js'></script>
<script type="text/javascript">
$(document).ready(function() {
$('.sample_555').DataTable({dom: 'Bfrtip',
        buttons: [
             'excel'
        ]});
   // alert("sf");
$('.sample_444').DataTable({
        "lengthMenu": [[-1, 50, 25, 10], ["All", 25, 50,10]]
    });
    var table = $('#sample_4').DataTable();

//alert("sf");
//$('#search-empid').on('keyup', function(){
 //   $(this).css('color', 'red');
 //   table
 //   .column(0)
  //  .search(this.value)
 //   .draw();

 // });
//$('#search-empname').on('keyup', function(){
   // $(this).css('color', 'red');
 //  table
    //.column(2)
  //  .search(this.value)
  //  .draw();
// });

    $('#search-cluster').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(2)
    .search(this.value)
    .draw();

  });


  $('#search-design').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(3)
    .search(this.value)
    .draw();

  });


$('#search-dept').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(4)
    .search(this.value)
    .draw();

  });

	$('#search-manager').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(5)
    .search(this.value)
    .draw();

  });


$('#search-prfrating').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(2)
    .search(this.value)
    .draw();

  });

$('#search-qualitativerating').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(3)
    .search(this.value)
    .draw();

  });

$('body').on('keyup','#search-plantrate1', function(){
    $(this).css('color', 'red');
    table
    .column(4)
    .search(this.value)
    .draw();

  });

$('body').on('keyup','#search-plantrate', function(){
    $(this).css('color', 'red');
    table
    .column(5)
    .search(this.value,true, false)
    .draw();

  });

$('#search-plantcmnt').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(6)
    .search(this.value)
    .draw();

  });

$('body').on('keyup','#search-clsheadrate', function(){
    $(this).css('color', 'red');
    table
    .column(7)
    .search(this.value,true, false)
    .draw();

  });
$('#search-clsheadcomment').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(8)
    .search(this.value)
    .draw();

  });

$('#search-burate').on('keyup', function(){
    $(this).css('color', 'red');
   table
    .column(9)
    .search(this.value,true, false)
    .draw();
  });

$('#search-bucomment').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(10)
    .search(this.value)
    .draw();

  });
$('#search-clustername').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(12)
    .search(this.value)
    .draw();

  });
$('#search-empnamechk').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(13)
    .search(this.value)
    .draw();

  });
$('#search-empnamechk1').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(14)
    .search(this.value)
    .draw();

  });
$('#search-empnamechk2').on('keyup', function(){
    $(this).css('color', 'red');
    table
    .column(15)
    .search(this.value)
    .draw();

  });

});

</script>

<style>
/* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
         width: 100%;
        margin: 0 auto;
    }
    button, html input[type="button"], input[type="reset"], input[type="submit"] {
    -webkit-appearance: button;
    cursor: pointer;
    border:1px solid #154593;
    
}
.hidden
</style>


         <table class="table table-striped table-bordered table-hover dt-responsive sample_444" width="100%" id="sample_4">


<thead>


<tr>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:81px;min-width:147px;max-width:75px" id="search-empnamechk" ><span class="glyphicon glyphicon-search"></th>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px" type="text" id="search-prfrating" ><span class="glyphicon glyphicon-search"></th>

<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px"type="text" id="search-qualitativerating" ><span class="glyphicon glyphicon-search"></th>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px"type="text" id="search-plantrate1" ><span class="glyphicon glyphicon-search"></th>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($is_plant_head) && count($is_plant_head)>0) || (isset($cluster_head) && count($cluster_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px"type="text" id="search-plantrate" ><span class="glyphicon glyphicon-search"></th>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px" type="text" id="search-plantcmnt" ><span class="glyphicon glyphicon-search"></th>
<?php } ?>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($cluster_head) && count($cluster_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px"  type="text" id="search-clsheadrate" ><span class="glyphicon glyphicon-search"></th>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px" type="text" id="search-clsheadcomment" ><span class="glyphicon glyphicon-search"></th>
<?php } ?>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || isset($is_bu) && count($is_bu)>0) { ?>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px" type="text" id="search-burate" ><span class="glyphicon glyphicon-search"></th>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px" id="search-bucomment" ><span class="glyphicon glyphicon-search"></th>
<th ></th>

<?php } ?>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:75px;min-width:75px;max-width:75px" id="search-clustername" ><span class="glyphicon glyphicon-search"></th>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:81px;min-width:147px;max-width:75px" id="search-empnamechk1" ><span class="glyphicon glyphicon-search"></th>
<th style="width:75px;min-width:75px;max-width:75px"><input  style="width:81px;min-width:147px;max-width:75px" id="search-empnamechk2" ><span class="glyphicon glyphicon-search"></th>
</tr>






<tr role="row" style="height: 42px;background-color: #154593;color: #fff;">
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Employee Name</th>
<!-- <th class="none" style="width:100px;max-width:100px;min-width:100px;padding:0px">Employee Name</th>
<th class="none">Cluster</th>
<th class="none">Designation</th>
<th class="none">Department</th>
<th class="none">Reporting Manager</th>
<th class="none">Dotted Line Manager</th> -->
<th class="none"></th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Quantitative<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Qualitative<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Round <br>Rating</th>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($cluster_head) && count($cluster_head)>0) || (isset($is_plant_head) && count($is_plant_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>

<th style="width:90px;max-width:90px;min-width:90px;padding:0px">Plant <br>Head<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Plant Head <br>Comments</th>
<?php } ?>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($cluster_head) && count($cluster_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Cluster<br>Head<br> Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Cluster Head<br> Comments</th>
<?php } ?>
<?php if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($is_bu) && count($is_bu)>0)) { ?>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">BU<br>Rating</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">BU Head <br>Comments</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Special <br>Comments</th>
<?php } ?>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Cluster Name</th>
<th id="f1">Employee Name</th>
<th class="">Reporting manager</th>
<th class="">Promotion Recommended</th>
<th style="width:100px;max-width:100px;min-width:100px;padding:0px">Check</th>
<th class="f2"></th>
</tr>
</thead>

<tbody id="dept_based_emp">
<lable id="total_emp_count" style="display:none"><?php if (isset($employee_list) && count($employee_list)>0) { echo count($employee_list); } ?></lable>

<?php
if (isset($employee_list)) { ?>                                                        
<?php 


$cnt = 0;
foreach ($employee_list as $row) {
//print_r($employee_list);die();
    
$normalize_rating =new NormalizeRatingForm;
$employee = new EmployeeForm;
if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') ||  (isset($is_bu) && count($is_bu)>0))
{
    $where1 = 'where Employee_id = :Employee_id and bu_rating !=:bu_rating and bu_rating !=:bu_rating and bu_rating !=:bu_rating ORDER BY `changes_date` DESC';
    $list1 = array('Employee_id','bu_rating','bu_rating','bu_rating');
    $data2 = array($row['Employee_id'],'','undefined','0');
    $normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
    
    $where1 = 'where Employee_id = :Employee_id and bu_comments !=:bu_comments and bu_comments !=:bu_comments and bu_comments !=:bu_comments ORDER BY `changes_date` DESC';
    $list1 = array('Employee_id','bu_comments','bu_comments','bu_comments');
    $data2 = array($row['Employee_id'],'','undefined','0');
    $normalize_comment_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
}
else if((isset($cluster_head) && count($cluster_head)>0))
{
    $where1 = 'where Employee_id = :Employee_id and rating !=:rating and rating !=:rating and rating !=:rating ORDER BY `changes_date` DESC';
    $list1 = array('Employee_id','rating','rating','rating');
    $data2 = array($row['Employee_id'],'','undefined','0');
    $normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
    
    $where1 = 'where Employee_id = :Employee_id and cluster_head_comments !=:cluster_head_comments and cluster_head_comments !=:cluster_head_comments and cluster_head_comments !=:cluster_head_comments  ORDER BY `changes_date` DESC';
    $list1 = array('Employee_id','cluster_head_comments','cluster_head_comments','cluster_head_comments');
    $data2 = array($row['Employee_id'],'','undefined','0');
    $normalize_comment_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
    
   // print_r($normalize_rating_data);die();
}
else if((isset($cluster_head) && count($cluster_head)>0))
{
    $where1 = 'where Employee_id = :Employee_id and plant_head_rating !=:plant_head_rating and plant_head_rating and plant_head_rating !=:plant_head_rating and plant_head_rating !=:plant_head_rating ORDER BY `changes_date` DESC';
    $list1 = array('Employee_id','plant_head_rating','plant_head_rating','plant_head_rating');
    $data2 = array($row['Employee_id'],'','undefined','0');
    $normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
    
    $where1 = 'where Employee_id = :Employee_id and plant_head_comment  !=:plant_head_comment  and plant_head_comment  !=:plant_head_comment  and plant_head_comment  !=:plant_head_comment  ORDER BY `changes_date` DESC';
    $list1 = array('Employee_id','plant_head_comment ','plant_head_comment ','plant_head_comment ');
    $data2 = array($row['Employee_id'],'','undefined','0');
    $normalize_comment_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
}
else
{
   
    $where1 = 'where Employee_id = :Employee_id ORDER BY `changes_date` DESC';
    $list1 = array('Employee_id');
    $data2 = array($row['Employee_id']);
    $normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
}

$promotion = new PromotionForm;
$where1 = 'where Employee_id = :Employee_id';
$list1 = array('Employee_id');
$data2 = array($row['Employee_id']);
$promo_data = $promotion->get_employee_data($where1,$data2,$list1); 


$where1 = 'where Employee_id = :Employee_id and bu_rating != :bu_rating';
$list1 = array('Employee_id','bu_rating');
$data2 = array($row['Employee_id'],'');
$normalize_rating_data1 = $normalize_rating->get_setting_data($where1,$data2,$list1); 

$where1 = 'where Employee_id = :Employee_id';
$list1 = array('Employee_id');
$data2 = array($row['Employee_id']);
$normalize_rating_data2 = $normalize_rating->get_setting_data($where1,$data2,$list1); 
if($row['Employee_id'] == '10002386')
{
//print_r($IDPForm_data);die();
}
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($row['Reporting_officer1_id']);
$apr_name = $employee->get_employee_data($where,$data,$list);
if($row['Reporting_officer2_id'] != '')
{
    if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (Yii::app()->user->getState("employee_email") == 'mohit.sharma@vvfltd.com'))
    {
       
    }
    else
    {
        $where = 'where Email_id = :Email_id';
        $list = array('Email_id');
        $data = array($row['Reporting_officer2_id']);
        $apr_name1 = $employee->get_employee_data($where,$data,$list);
    }

}
else
{
$apr_name1 == '';
}




//print_r($IDPForm_data);die();
?>    
<lable id="emp_id-<?php echo $cnt; ?>" style="display:none"><?php echo $row['Employee_id']; ?></lable>                                                       
<tr>  
<td <?php 
if($row['Employee_id'] == '10001469')
{
  //print_r($IDPForm_data[$cnt]['0']['Tota_score']);die();   
}
if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['Emp_fname']." ".$row['Emp_lname']; ?><a href='<?php echo Yii::app()->createUrl("index.php/Promotion/promotion_form_dis",array("Employee_id"=>$row['Employee_id'])); ?>' target="_blank"><lable style="color:green"><?php if(isset($promo_data['0']['update_flag']) && $promo_data['0']['update_flag'] != '2') { echo "<br>";echo "Promotion"; } ?></lable></a></td>                                                           

<td>
<table class="table table-bordered">
    <thead>
      <tr style="background-color: #154593; color:#fff">
        <th colspan=6 style="text-align:center">Employee Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-weight:bold">Employee ID</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['Employee_id']; ?><a href='<?php echo Yii::app()->createUrl("index.php/Promotion/promotion_form",array("Employee_id"=>$row['Employee_id'])); ?>' target="_blank"><lable style="color:green"><?php if(isset($promo_data['0']['update_flag']) && $promo_data['0']['update_flag'] != '2') { echo "<br>";echo " (Promotion Recommendation Form)"; } ?></lable></a></td>
        <td style="font-weight:bold">Cluster</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['cluster_name']; ?></td>
        <td style="font-weight:bold">Date of Birth</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['DOB']; ?></td>
        </tr>
      <tr>
        <td style="font-weight:bold">Department</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['Department']; ?></td>  
        <td style="font-weight:bold">BU</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['BU']; ?></td>  
        <td style="font-weight:bold">Date of joining</td>
                <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['joining_date']; ?></td>  
      </tr>
      <tr>
        <td style="font-weight:bold">Designation</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['Designation']; ?></td>  
        <td style="font-weight:bold">Location</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['company_location']; ?></td>  
        <td style="font-weight:bold">Date of Retirement</td>
               <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php  echo $retire_date; ?></td>
      </tr>
      <tr>
        <td style="font-weight:bold">Cadre</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['Cadre']; ?></td>  
        <td style="font-weight:bold">BU Head Name</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['bu_head_name']; ?></td>  
        <td style="font-weight:bold">Cluster Head Name</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $cluster_name['0']['Emp_fname']." ".$cluster_name['0']['Emp_lname']; ?></td>
       

      </tr>
      <tr>
        <td style="font-weight:bold">Reporting Manager</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $apr_name['0']['Emp_fname']." ".$apr_name['0']['Emp_lname']; ?></td>
        <td style="font-weight:bold">Dotted Line Manager</td>
        <td <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php if(isset($apr_name1) && $apr_name1 != '') { echo $apr_name1['0']['Emp_fname']." ".$apr_name1['0']['Emp_lname']; } ?></td>
        <td style="font-weight:bold">Plant Head Name</td>
        <td  <?php if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']==''){ ?>style="color:red;"<?php } ?> ><?php echo $row['plant_head_name']; ?></td>  
        
      </tr>
    </tbody>
  </table>

</td>

<?php
$day = 31;
$month = 03;
$year = date('Y');

$date = mktime(12, 0, 0, $month, $day, $year);
?>
<td id="qualrate-<?php echo $cnt; ?>"><?php if(isset($row['reporting_1_change']) && $row['reporting_1_change'] != ''){ echo "fdgdfgdfgdf"; }else{ echo $IDPForm_data[$cnt]['0']['performance_rating']; }?></td>

<td><?php 
if(!isset($IDPForm_data[$cnt]['0']['Tota_score']) || isset($IDPForm_data[$cnt]['0']['Tota_score']) && $IDPForm_data[$cnt]['0']['Tota_score']!=''){ echo $IDPForm_data[$cnt]['0']['Tota_score']; }?></td>


<td><?php if(isset($row['reporting_1_change']) && $row['reporting_1_change'] != ''){ echo "fghfghgf"; }else{ echo round($IDPForm_data[$cnt]['0']['performance_rating']); }?></td>

<?php if(((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') ||  (isset($is_bu) && count($is_bu)>0)) && (date("Y",strtotime($row['retire_date']))==date("Y", $date))) { ?>
<td style="width: 85px;"><input style="width: 85px;" disabled class="form-control pop chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_rating']) && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_rating']) && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;" disabled class="form-control pop comm1 plant_head_comments" id="plant_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data[$cnt]['plant_head_comment'])) { echo $normalize_comment_data[$cnt]['plant_head_comment']; }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_comment_data[$cnt]['plant_head_comment'])) { echo $normalize_comment_data[$cnt]['plant_head_comment']; }else { echo ""; } ?></label></td>
<?php } else if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') ||  (isset($is_bu) && count($is_bu)>0)) { ?>
<td style="width: 85px;"><input style="width: 85px;"  class="form-control pop chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_rating']) && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_rating']) && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop comm1 plant_head_comments" id="plant_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data[$cnt]['plant_head_comment'])) { echo $normalize_comment_data[$cnt]['plant_head_comment']; }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_comment_data[$cnt]['plant_head_comment'])) { echo $normalize_comment_data[$cnt]['plant_head_comment']; }else { echo ""; } ?></label></td>
<?php }else if(isset($is_plant_head) && count($is_plant_head)>0) { ?>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data[$cnt]['plant_head_rating'])  && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_rating_data[$cnt]['plant_head_rating'])  && $normalize_rating_data[$cnt]['plant_head_rating'] != '') { echo round($normalize_rating_data[$cnt]['plant_head_rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop plant_head_comments" id="plant_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data[$cnt]['plant_head_comment'])) { echo $normalize_comment_data[$cnt]['plant_head_comment']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_comment_data[$cnt]['plant_head_comment'])) { echo $normalize_comment_data[$cnt]['plant_head_comment']; }else { echo ""; } ?></label></td>

<?php } ?>
<?php if(((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') ||  (isset($is_bu) && count($is_bu)>0)) && (date("Y",strtotime($row['retire_date']))==date("Y", $date))) { ?>
<td style="width: 85px;"><input style="width: 85px;" disabled class="form-control pop chk_number cluster_head_data-<?php echo $cnt; ?>" id="cluster_head_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;" disabled class="form-control pop comm1 cluster_head_comment" id="cluster_head_comment-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data['0']['cluster_head_comments']) && $normalize_comment_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_comment_data['0']['cluster_head_comments']; }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_comment_data['0']['cluster_head_comments']) && $normalize_comment_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_comment_data['0']['cluster_head_comments']; }else { echo ""; } ?></label></td>
<?php } else if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') ||  (isset($is_bu) && count($is_bu)>0)) { ?>
<td style="width: 85px;"><input style="width: 85px;" class="form-control pop chk_number cluster_head_data-<?php echo $cnt; ?>" id="cluster_head_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); } else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;" class="form-control pop comm1 cluster_head_comment" id="cluster_head_comment-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data['0']['cluster_head_comments']) && $normalize_comment_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_comment_data['0']['cluster_head_comments']; }else { echo ""; } ?>" type="text" disabled><label style="display:none"><?php if(isset($normalize_comment_data['0']['cluster_head_comments']) && $normalize_comment_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_comment_data['0']['cluster_head_comments']; }else { echo ""; } ?></label></td>
<?php }else if(isset($cluster_head) && count($cluster_head)>0) { ?>
<td style="width: 85px;"><input style="width: 85px;"  class="form-control pop chk_number cluster_head_data-<?php echo $cnt; ?>" id="cluster_head_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text"><lable style="display:none" class="<?php echo $cnt; ?>"><?php if(isset($normalize_rating_data['0']['rating']) && ($normalize_rating_data['0']['rating'] != 'undefined' && $normalize_rating_data['0']['rating'] != '')) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></lable></td>

<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop cluster_head_comment" id="cluster_head_comment-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data['0']['cluster_head_comments']) && $normalize_comment_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_comment_data['0']['cluster_head_comments']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_comment_data['0']['cluster_head_comments']) && $normalize_comment_data['0']['cluster_head_comments'] != 'undefined') { echo $normalize_comment_data['0']['cluster_head_comments']; }else { echo ""; } ?></label></td>

<?php } ?>


<?php if(((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($is_bu) && count($is_bu)>0)) && (date("Y",strtotime($row['retire_date']))==date("Y", $date))) { ?>
<td style="width: 95px;"><input style="width: 85px;" disabled  class="form-control pop chk_number performance_data-<?php echo $cnt; ?>" id="performance_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" maxlength="1"><lable style="display:none" class="<?php echo $cnt; ?>" id="performance_data1-<?php echo $cnt; ?>"><?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></lable></td>

<td style="width: 95px;"><input style="width: 85px;" disabled class="form-control comm1 pop bu_head_comments" id="bu_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;" disabled type="text" class="form-control pop" id="other<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom"value="<?php if(isset($normalize_rating_data['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?>"><label style="display:none"><?php if(isset($normalize_rating_data2['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?></label></td>
<?php } else if((Yii::app()->user->getState("employee_email") == 'amit.sanas@vvfltd.com') || (isset($is_bu) && count($is_bu)>0)) { ?>
<td style="width: 95px;"><input style="width: 85px;"  class="form-control pop chk_number performance_data-<?php echo $cnt; ?>" id="performance_data-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?>" type="text" maxlength="1"><lable style="display:none" class="<?php echo $cnt; ?>" id="performance_data1-<?php echo $cnt; ?>"><?php if(isset($normalize_rating_data1['0']['bu_rating']) && ($normalize_rating_data['0']['bu_rating'] != 'undefined' && $normalize_rating_data['0']['bu_rating'] != '')) { echo round($normalize_rating_data1['0']['bu_rating']); }else if(isset($normalize_rating_data['0']['rating'])) { echo round($normalize_rating_data['0']['rating']); }else if(isset($IDPForm_data[$cnt]['0']['performance_rating'])) { echo round($IDPForm_data[$cnt]['0']['performance_rating']); }else { echo ""; } ?></lable></td>

<td style="width: 95px;"><input style="width: 85px;"  class="form-control comm1 pop bu_head_comments" id="bu_head_comments-<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom" value="<?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?>" type="text"><label style="display:none"><?php if(isset($normalize_comment_data['0']['bu_comments']) && $normalize_comment_data['0']['bu_comments'] != 'undefined') { echo $normalize_comment_data['0']['bu_comments']; }else { echo ""; } ?></label></td>

<td style="width: 95px;"><input style="width: 85px;"  type="text" class="form-control pop" id="other<?php echo $cnt; ?>" data-toggle="popover" data-trigger="hover"  data-placement="bottom"value="<?php if(isset($normalize_rating_data['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?>"><label style="display:none"><?php if(isset($normalize_rating_data2['0']['other_comments']) && $normalize_rating_data2['0']['other_comments'] != 'undefined') { echo $normalize_rating_data2['0']['other_comments']; }else { echo ""; } ?></label></td>
<?php } ?>
<td><?php if(isset($row['cluster_name'])) { echo $row['cluster_name']; } ?></td>
<td class="f2" style="display:none"><?php if(isset($row['Emp_fname'])) { echo $row['Emp_fname']." ".$row['Emp_lname']; } ?></td>
<td class="" style="display:none">
<?php 
$employee = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($row['Reporting_officer1_id']);
$apr_data_get = $employee->get_employee_data($where,$data,$list);

if(isset($apr_data_get['0']['Emp_fname'])) { echo $apr_data_get['0']['Emp_fname']." ".$apr_data_get['0']['Emp_lname']; } ?>
</td>
<td><?php if(isset($promo_data['0']['update_flag']) && $promo_data['0']['update_flag'] != '2') { echo "<br>";echo "Yes"; }else { echo "No"; } ?></td>
<td><a href='<?php echo Yii::app()->createUrl("index.php/Directreport/appraiser_end_review",array("Employee_id"=>$row['Employee_id'],"apr_data"=>$row['Reporting_officer1_id'])); ?>' target="_blank"><input class="btn chk_profile" id="$row['Employee_id']" value="Check Goalsheet" type="button"></a></td>
<td class="f2" ><?php echo $cnt; ?></td>
</tr>                                                       
<?php $cnt++;   }
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








<div class="col-md-5">


				</div>
<div class="row">
<div class="col-md-12" style="margin-top: 10px;margin-left: -282px;">
<div class="col-md-4">
<a href="<?php echo Yii::app()->createUrl("index.php/User_dashboard"); ?>"><input type="button" class="btn border-blue-soft" value="Back"></a>
</div>
<div class="col-md-4">
<input type="button" value="Confirm" class="final_normalize btn border-blue-soft" <?php if(isset($is_bu) && count($is_bu)>0) { ?>id="bu"<?php }else if(isset($cluster_head) && count($cluster_head)>0) { ?>id="cluster_head"<?php }else if(isset($is_plant_head) && count($is_plant_head)>0) { ?>id="plant_head"<?php } ?> >
</div>
<div class="col-md-4">
<input type="button" class="btn border-blue-soft" value="Generate Bell Curve" id="floater">
</div>
</div>
    </div></div>

<lable id="user_detail" style="display:none"><?php if(isset($cluster_head) && count($cluster_head)>0) {?>cluster_head<?php }else if(isset($is_bu) && count($is_bu)>0) { ?>bu<?php }else if(isset($is_plant_head) && count($is_plant_head)>0) { ?>plant_head<?php } ?></lable>
</div>
<lable class="final_normalize" <?php if(isset($cluster_head) && count($cluster_head)>0) {?>id="cluster_head"<?php }else if(isset($is_bu) && count($is_bu)>0) { ?>id="bu"<?php }else if(isset($is_plant_head) && count($is_plant_head)>0) { ?>id="plant_head"<?php } ?>></lable>
<lable id="specific_user"><?php echo Yii::app()->user->getState("employee_email"); ?></lable>
 </div></div></div></div></div></div></div>

  </body>
<!--  -->
<script>
function getdisplay()
{
    var dt = $("#sample_4_info").text();
    var dt1 = dt.split(' ');
    //alert(dt1['3']);
    $("#total_emp_count").text(dt1['5']);
//var id_value = $(this).next('lable').attr('id');
var class_value = $(this).next('lable').attr('class');
var rate1 = 0;var rate2 = 0;var rate3 = 0;var rate4 = 0;var rate5 = 0;var dev_chk = 0;
var str = /^[1-5]$/; 
var initial_index = '0';var last_index = $("#total_emp_count").text();
//alert($("#specific_user").text());

if($("#specific_user").text() == "amit.sanas@vvfltd.com")
{
   if($("#search-clustername").val() == 'CMB Manufacturing')
    {
        initial_index = 0;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'R&D')
    {
        initial_index = 301;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Oleo Non Mfg')
    {
        initial_index = 223;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Sewree Operations')
    {
        initial_index = 315;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Oleo Mfg')
    {
        initial_index = 168;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'HR/Security/Admin')
    {
        initial_index = 126;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Finance / IT / Indirect Tax/Excise/EXIM')
    {
        initial_index = 65;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Strategic Procurement')
    {
        initial_index = 342;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'CMB Non Mfg')
    {
        initial_index = 31;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'SMC Cluster')
    {
        initial_index = 322;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Miscellaneous')
    {
        initial_index = 161;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'CPD')
    {
        initial_index = 51;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'PCP Quality')
    {
        initial_index = 292;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Promoters')
    {
        initial_index = 298;
        last_index = parseInt(initial_index)+parseInt(last_index);
    } 
}
else if($("#specific_user").text() == "mohit.sharma@vvfltd.com")
{
     if($("#search-clustername").val() == 'CMB Manufacturing')
    {
        initial_index = 0;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'R&D')
    {
        initial_index = 304;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Oleo Non Mfg')
    {
        initial_index = 226;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Sewree Operations')
    {
        initial_index = 318;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Oleo Mfg')
    {
        initial_index = 171;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'HR/Security/Admin')
    {
        initial_index = 126;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Finance / IT / Indirect Tax/Excise/EXIM')
    {
        initial_index = 65;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Strategic Procurement')
    {
        initial_index = 357;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'CMB Non Mfg')
    {
        initial_index = 31;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'SMC Cluster')
    {
        initial_index = 325;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Miscellaneous')
    {
        initial_index = 164;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'CPD')
    {
        initial_index = 51;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'PCP Quality')
    {
        initial_index = 295;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }
    else if($("#search-clustername").val() == 'Promoters')
    {
        initial_index = 301;
        last_index = parseInt(initial_index)+parseInt(last_index);
    }   
}



//alert(initial_index);alert(last_index);
if($(".final_normalize").attr('id') == 'bu')
{
dev_chk = $("#total_emp_count").text()*0.10;
for (var i = initial_index; i < last_index; i++) {
  if ($(".performance_data-"+i).val() == 1) 
  {
       rate1++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if ($(".performance_data-"+i).val() == 2) 
  {
       rate2++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if ($(".performance_data-"+i).val() == 3) 
  {
       rate3++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if ($(".performance_data-"+i).val() == 4) 
  {
       rate4++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if ($(".performance_data-"+i).val() == 5) 
  {
       rate5++;
  }

}


}
else if($(".final_normalize").attr('id') == "cluster_head")
{
dev_chk = $("#total_emp_count").text()*0.15;
for (var i = initial_index; i < last_index; i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && ($(".cluster_head_data-"+i).val() == 1 || ($(".cluster_head_data-"+i).val()>1 && $(".cluster_head_data-"+i).val()<2))) 
  {
       rate1++;
  }

}

for (var i = initial_index; i < last_index; i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && ($(".cluster_head_data-"+i).val() == 2 || ($(".cluster_head_data-"+i).val()>2 && $(".cluster_head_data-"+i).val()<3))) 
  {
       rate2++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && ($(".cluster_head_data-"+i).val() == 3 || ($(".cluster_head_data-"+i).val()>3 && $(".cluster_head_data-"+i).val()<4))) 
  {
       rate3++;
  }

}
for (var i = initial_index; i < last_index; i++) {
   
if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && ($(".cluster_head_data-"+i).val() == 4 || ($(".cluster_head_data-"+i).val()>4 && $(".cluster_head_data-"+i).val()<5))) 
  {
       rate4++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && $(".cluster_head_data-"+i).val() == 5) 
  {
      alert(rate5);
       rate5++;
  }

}
//alert(rate4);
}
else if($(".final_normalize").attr('id') == "plant_head")
{
dev_chk = $("#total_emp_count").text()*0.20;
for (var i = initial_index; i < last_index; i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && ($(".normalize_rate-"+i).val() == 1 || ($(".normalize_rate-"+i).val()>1 && $(".normalize_rate-"+i).val()<2))) 
  {
       rate1++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && ($(".normalize_rate-"+i).val() == 2 || ($(".normalize_rate-"+i).val()>2 && $(".normalize_rate-"+i).val()<3))) 
  {
       rate2++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && ($(".normalize_rate-"+i).val() == 3 || ($(".normalize_rate-"+i).val()>3 && $(".normalize_rate-"+i).val()<4))) 
  {
       rate3++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && ($(".normalize_rate-"+i).val() == 4 || ($(".normalize_rate-"+i).val()>4 && $(".normalize_rate-"+i).val()<5))) 
  {
       rate4++;
  }

}
for (var i = initial_index; i < last_index; i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && ($(".normalize_rate-"+i).val() == 5 || ($(".normalize_rate-"+i).val()>5 && $(".normalize_rate-"+i).val()<2))) 
  {
       rate5++;
  }

}


}


//alert(rate3)
$("#actual_cnt1").text(parseFloat(rate1));
$("#actual_cnt2").text(rate2);
$("#actual_cnt3").text(rate3);
$("#actual_cnt4").text(parseFloat(rate4));
$("#actual_cnt5").text(rate5);
var avg = parseFloat(rate1)+parseFloat(rate2)+parseFloat(rate3)+parseFloat(rate4)+parseFloat(rate5);
//alert(avg);
$("#avg_actual").text(avg);
var data = {
                    'rate1' : rate1,
                    'rate2' : rate2,
                    'rate3' : rate3,
'rate4' : rate4,
'rate5' : rate5,
                  };
var f = $("#total_emp_count").text()*0.05;
var g = $("#total_emp_count").text()*0.10;
var h = $("#total_emp_count").text()*0.60;
var i = $("#total_emp_count").text()*0.20;
var j = $("#total_emp_count").text()*0.05;

var val1 = $("#total_emp_count").text()*0.05;
var r1 = val1.toFixed(1);
var r11 = r1.split('.');
var val2 = $("#total_emp_count").text()*0.10;
var r2 = val2.toFixed(1);
var r22 = r2.split('.');
var val3 = $("#total_emp_count").text()*0.60;
var r3 = val3.toFixed(1);
var r33 = r3.split('.');
var val4 = $("#total_emp_count").text()*0.20;
var r4 = val4.toFixed(1);
var r44 = r4.split('.');
var val5 = $("#total_emp_count").text()*0.05;
var r5 = val5.toFixed(1);
var r55 = r5.split('.');

//alert(parseFloat(val1));
if(r11[1] != '' && (r11[1]>5 || r11[1]==5))
{
$("#actual1").text(parseFloat(r11[0]));
}
else
{
$("#actual1").text(parseFloat(r11[0]));
}
if(r22[1] != '' && (r22[1]>5 || r22[1]==5))
{
$("#actual2").text(parseFloat(r22[0]));
}
else
{
$("#actual2").text(parseFloat(r22[0]));
}
if(r33[1] != '' && (r33[1]>5 || r33[1]==5))
{
$("#actual3").text(parseFloat(r33[0])+parseFloat(1));
}
else
{
$("#actual3").text(r33[0]);
}

if(r44[1] != '' && (r44[1]>5 || r44[1]==5))
{
$("#actual4").text(parseFloat(r44[0])+parseFloat(1));
}
else
{
$("#actual4").text(parseFloat(r44[0]));
}

if(r55[1] != '' && (r55[1]>5 || r55[1]==5))
{
$("#actual5").text(parseFloat(r55[0])+parseFloat(1));
}
else
{
$("#actual5").text(parseFloat(r55[0]));
}
//alert((($("#actual_cnt4").text()/$("#total_emp_count").text())*100).toFixed(2));dev_allow1

//alert($(".final_normalize").attr('id'));
//alert(rate1);alert(rate2);alert(rate3);alert(rate4);alert(rate5);
$("#actual_per_cnt1").text((($("#actual_cnt1").text()/$("#total_emp_count").text())*100).toFixed(2));
$("#actual_per_cnt2").text((($("#actual_cnt2").text()/$("#total_emp_count").text())*100).toFixed(2));
$("#actual_per_cnt3").text((($("#actual_cnt3").text()/$("#total_emp_count").text())*100).toFixed(2));
$("#actual_per_cnt4").text((($("#actual_cnt4").text()/$("#total_emp_count").text())*100).toFixed(2));
$("#actual_per_cnt5").text((($("#actual_cnt5").text()/$("#total_emp_count").text())*100).toFixed(2));
$("#ftotal").text((parseFloat($("#actual_per_cnt1").text())+parseFloat($("#actual_per_cnt3").text())+parseFloat($("#actual_per_cnt4").text())).toFixed(2));

$("#dev1").text(parseFloat($("#actual_cnt1").text())-parseFloat($("#actual1").text()));        
$("#dev2").text(parseFloat($("#actual_cnt2").text())-parseFloat($("#actual2").text())); 
$("#dev3").text(parseFloat($("#actual_cnt3").text())-parseFloat($("#actual3").text())); 
$("#dev4").text(parseFloat($("#actual_cnt4").text())-parseFloat($("#actual4").text())); 
$("#dev5").text(parseFloat($("#actual_cnt5").text())-parseFloat($("#actual5").text())); 


if($(".final_normalize").attr('id') == 'bu')
{
$("#dev_allow1").text((($("#dev1").text()/$("#actual1").text())*10).toFixed(2));
$("#dev_actual1").text((($("#dev1").text()/$("#actual_cnt1").text())*10).toFixed(2));
$("#dev_allow2").text((($("#dev2").text()/$("#actual2").text())*10).toFixed(2));
$("#dev_actual2").text((($("#dev2").text()/$("#actual_cnt2").text())*10).toFixed(2));
$("#dev_allow3").text((($("#dev3").text()/$("#actual3").text())*10).toFixed(2));
$("#dev_actual3").text((($("#dev3").text()/$("#actual_cnt3").text())*10).toFixed(2));
$("#dev_allow4").text((($("#dev4").text()/$("#actual4").text())*10).toFixed(2));
$("#dev_actual4").text((($("#dev4").text()/$("#actual_cnt4").text())*10).toFixed(2));
$("#dev_allow5").text((($("#dev5").text()/$("#actual5").text())*10).toFixed(2));
$("#dev_actual5").text((($("#dev5").text()/$("#actual_cnt5").text())*10).toFixed(2));
}
else if($(".final_normalize").attr('id') == "cluster_head")
{
$("#dev_allow1").text((($("#dev1").text()/$("#actual1").text())*15).toFixed(2));
$("#dev_actual1").text((($("#dev1").text()/$("#actual_cnt1").text())*15).toFixed(2));
$("#dev_allow2").text((($("#dev2").text()/$("#actual2").text())*10).toFixed(2));
$("#dev_actual2").text((($("#dev2").text()/$("#actual_cnt2").text())*15).toFixed(2));
$("#dev_allow3").text((($("#dev3").text()/$("#actual3").text())*10).toFixed(2));
$("#dev_actual3").text((($("#dev3").text()/$("#actual_cnt3").text())*15).toFixed(2));
$("#dev_allow4").text((($("#dev4").text()/$("#actual4").text())*10).toFixed(2));
$("#dev_actual4").text((($("#dev4").text()/$("#actual_cnt4").text())*15).toFixed(2));
$("#dev_allow5").text((($("#dev5").text()/$("#actual5").text())*10).toFixed(2));
$("#dev_actual5").text((($("#dev5").text()/$("#actual_cnt5").text())*15).toFixed(2));
}
else if($(".final_normalize").attr('id') == "plant_head")
{
$("#dev_allow1").text((($("#dev1").text()/$("#actual1").text())*20).toFixed(2));
$("#dev_actual1").text((($("#dev1").text()/$("#actual_cnt1").text())*20).toFixed(2));
$("#dev_allow2").text((($("#dev2").text()/$("#actual2").text())*10).toFixed(2));
$("#dev_actual2").text((($("#dev2").text()/$("#actual_cnt2").text())*20).toFixed(2));
$("#dev_allow3").text((($("#dev3").text()/$("#actual3").text())*10).toFixed(2));
$("#dev_actual3").text((($("#dev3").text()/$("#actual_cnt3").text())*20).toFixed(2));
$("#dev_allow4").text((($("#dev4").text()/$("#actual4").text())*10).toFixed(2));
$("#dev_actual4").text((($("#dev4").text()/$("#actual_cnt4").text())*20).toFixed(2));
$("#dev_allow5").text((($("#dev5").text()/$("#actual5").text())*20).toFixed(2));
$("#dev_actual5").text((($("#dev5").text()/$("#actual_cnt5").text())*20).toFixed(2));
}


var dev = parseFloat($("#dev_allow1").text())+parseFloat($("#dev_allow3").text())+parseFloat($("#dev_allow4").text());
$("#total_dev1").text(dev.toFixed(2));
$("#total_dev2").text((parseFloat($("#dev_actual1").text())+parseFloat($("#dev_actual3").text())+parseFloat($("#dev_actual4").text())).toFixed(2));
$("#total_dev").text((parseFloat($("#dev1").text())+parseFloat($("#dev3").text())+parseFloat($("#dev4").text())).toFixed(2));
//alert(dev_chk);alert($("#total_dev").text());
if($("#total_dev").text()>dev_chk)
{
$("#err_box").css("display","block");
$("#err_box").text("The maximum deviation limit exceeds.");
$("#err_box").fadeOut(3000);
}
$("#emp_actual_total").text($("#total_emp_count").text());
//alert("inside");
standard_chart(f,g,h,i,j);get_data(f,g,h,i,j,rate1,rate2,rate3,rate4,rate5);
}
$(function(){
$("body").on('keyup','.chk_number',function (e){
if (!($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4 || $(this).val() == 5)) {
$(this).val('')
$("#err_box").css("display","block");
$("#err_box").text("Only numbers are allowed.");
$("#err_box").fadeOut(3000);
}
else
{
var id_val = $(this).attr('id');
var id_val1 = id_val.split('-');
//alert($(this).val());alert($("#cluster_head_data-"+id_val1[1]).val());
if($(".final_normalize").attr('id') == 'bu' && $(this).val() != $("#cluster_head_data-"+id_val1[1]).val() && $("#bu_head_comments-"+id_val1[1]).val() == '')
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter comments to justify the rating");
for(var f=0;f<$("#total_emp_count").text();f++)
{
if(f!=id_val1[1])
{
$("#performance_data-"+f).attr('disabled','true');
$("#bu_head_comments-"+f).attr('disabled','true');
}
}
}
else if($(".final_normalize").attr('id') == 'bu' && $(this).val() == $("#cluster_head_data-"+id_val1[1]).val())
{
for(var f=0;f<$("#total_emp_count").text();f++)
{
$("#performance_data-"+f).removeAttr('disabled');
$("#bu_head_comments-"+f).removeAttr('disabled');
}
}
else if($(".final_normalize").attr('id') == 'bu' && $("#bu_head_comments-"+id_val1[1]).val().length>5)
{
//alert("check");
$("#err_box").css("display","block");
$("#err_box").text("Maximum 500 characters are allowed");
for(var f=0;f<$("#total_emp_count").text();f++)
{
if(f!=id_val1[1])
{
$("#performance_data-"+f).attr('disabled','true');
$("#bu_head_comments-"+f).attr('disabled','true');
}
}
}
else if($(".final_normalize").attr('id') == "plant_head" && $(this).val() != $("#qualrate-"+id_val1[1]).val() && $("#plant_head_comments-"+id_val1[1]).val() == '')
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter comments to justify the rating");
for(var f=0;f<$("#total_emp_count").text();f++)
{
if(f!=id_val1[1])
{
$("#normalize_rate-"+f).attr('disabled','true');
$("#plant_head_comments-"+f).attr('disabled','true');
}
}
}
else if($(".final_normalize").attr('id') == "plant_head" && $(this).val() == $("#qualrate-"+id_val1[1]).val())
{
for(var f=0;f<$("#total_emp_count").text();f++)
{
$("#normalize_rate-"+f).removeAttr('disabled');
$("#plant_head_comments-"+f).removeAttr('disabled');
}
}
else if($(".final_normalize").attr('id') == 'plant_head' && $("#plant_head_comments-"+id_val1[1]).val().length>5)
{
//alert("check");
$("#err_box").css("display","block");
$("#err_box").text("Maximum 500 characters are allowed");
for(var f=0;f<$("#total_emp_count").text();f++)
{
if(f!=id_val1[1])
{
$("#normalize_rate-"+f).attr('disabled','true');
$("#plant_head_comments-"+f).attr('disabled','true');
}
}
}
else if($(".final_normalize").attr('id') == "cluster_head" && $(this).val() != $("#normalize_rate-"+id_val1[1]).val() && $("#cluster_head_comment-"+id_val1[1]).val() == '')
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter comments to justify the rating");
for(var f=0;f<$("#total_emp_count").text();f++)
{
if(f!=id_val1[1])
{
$("#cluster_head_data-"+f).attr('disabled','true');
$("#cluster_head_comment-"+f).attr('disabled','true');
}
}
}
else if($(".final_normalize").attr('id') == "cluster_head" && $(this).val() == $("#normalize_rate-"+id_val1[1]).val())
{
for(var f=0;f<$("#total_emp_count").text();f++)
{
    $("#cluster_head_data-"+f).removeAttr('disabled');
    $("#cluster_head_comment-"+f).removeAttr('disabled');
}
}
else if($(".final_normalize").attr('id') == 'cluster_head' && $("#cluster_head_comment-"+id_val1[1]).val().length>5)
{
//alert("check");
$("#err_box").css("display","block");
$("#err_box").text("Maximum 500 characters are allowed");
for(var f=0;f<$("#total_emp_count").text();f++)
{
if(f!=id_val1[1])
{
$("#cluster_head_data-"+f).attr('disabled','true');
$("#cluster_head_comment-"+f).attr('disabled','true');
}
}
}
else
{
for(var f=0;f<$("#total_emp_count").text();f++)
{
if(f!=id_val1[1])
{
$("#performance_data-"+f).attr('disabled','false');
$("#bu_head_comments-"+f).attr('disabled','false');
}
}
$("#err_box").css("display","none");
$("#err_box").text("");
$("#confrm_box").modal('show');
$("#chk_number_ok").click(function(){
$("#confrm_box").modal('hide');
var id_value = $(this).next('lable').attr('id');
var class_value = $(this).next('lable').attr('class');
var rate1 = 0;var rate2 = 0;var rate3 = 0;var rate4 = 0;var rate5 = 0;var dev_chk = 0;
var str = /^[1-5]$/; 
if($(this).val()>5 || $(this).val() == 0)
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter rating between 1-5.");
//break;
//alert("Rating Between 1-5 are allowed");
}
//alert($(".final_normalize").attr('id'));
if($(".final_normalize").attr('id') == 'bu')
{
dev_chk = $("#total_emp_count").text()*0.10;
for (var i = 0; i < $("#total_emp_count").text(); i++) {
if(!str.test($(this).val()))
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter rating between 1-5.");
$("#err_box").fadeOut(3000);break;
//alert("Rating Between 1-5 are allowed");
}
else if($(".performance_data-"+i).val() !='' && $("#bu_head_comments-"+i).val() =='')
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter the comments to justify the ratings.");
$("#err_box").fadeOut(3000);break;
}
if($("#bu-"+i).text() == 1)
{
$(".cluster_head_data-"+i).attr('value',$(".performance_data-"+i).val());
$("#auto_cls_"+i).text($(".performance_data-"+i).val());
} 

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if ($(".performance_data-"+i).val() == 1) 
  {
       rate1++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if ($(".performance_data-"+i).val() == 2) 
  {
       rate2++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if ($(".performance_data-"+i).val() == 3) 
  {
       rate3++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if ($(".performance_data-"+i).val() == 4) 
  {
       rate4++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if ($(".performance_data-"+i).val() == 5) 
  {
       rate5++;
  }

}


}
else if($(".final_normalize").attr('id') == "cluster_head")
{
dev_chk = $("#total_emp_count").text()*0.15;
if($(this).val()>5 || $(this).val() == 0)
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter rating between 1-5.");
$("#err_box").fadeOut(3000);
//alert("Rating Between 1-5 are allowed");
}
else if($(".cluster_head_data-"+i).val() !='' && $("#cluster_head_comment-"+i).val() =='')
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter the comments to justify the ratings.");
$("#err_box").fadeOut(3000);
}
for (var i = 0; i < $("#total_emp_count").text(); i++) {

if(class_value == i)
{
$("#normalize_rate1-"+i).text($(this).val());

}

}

for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && $(".cluster_head_data-"+i).val() == 1) 
  {
       rate1++;
  }

}

for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && $(".cluster_head_data-"+i).val() == 2) 
  {
       rate2++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && $(".cluster_head_data-"+i).val() == 3) 
  {
       rate3++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && $(".cluster_head_data-"+i).val() == 4) 
  {
       rate4++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".cluster_head_data-"+i).val() != '' || $(".cluster_head_data-"+i).val() != undefined) && $(".cluster_head_data-"+i).val() == 5) 
  {
       rate5++;
  }

}

}
else if($(".final_normalize").attr('id') == "plant_head")
{
dev_chk = $("#total_emp_count").text()*0.20;
if($(this).val()>5 || $(this).val() == 0)
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter rating between 1-5.");
$("#err_box").fadeOut(3000);
//alert("Rating Between 1-5 are allowed");
}
else if($(".normalize_rate-"+i).val() !='' && $("#plant_head_comments-"+i).val() =='')
{
$("#err_box").css("display","block");
$("#err_box").text("Please enter the comments to justify the ratings.");
$("#err_box").fadeOut(3000);
}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 1) 
  {
       rate1++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 2) 
  {
       rate2++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 3) 
  {
       rate3++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 4) 
  {
       rate4++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 5) 
  {
       rate5++;
  }

}


}


if($(".final_normalize").attr('id') == 'bu')
{
$("#dev_allow1").text((($("#dev1").text()/$("#actual1").text())*10).toFixed(2));
$("#dev_actual1").text((($("#dev1").text()/$("#actual_cnt1").text())*10).toFixed(2));
$("#dev_allow2").text((($("#dev3").text()/$("#actual3").text())*10).toFixed(2));
$("#dev_actual2").text((($("#dev3").text()/$("#actual_cnt3").text())*10).toFixed(2));
$("#dev_allow4").text((($("#dev4").text()/$("#actual4").text())*10).toFixed(2));
$("#dev_actual4").text((($("#dev4").text()/$("#actual_cnt4").text())*10).toFixed(2));
}
else if($(".final_normalize").attr('id') == "cluster_head")
{
$("#dev_allow1").text((($("#dev1").text()/$("#actual1").text())*15).toFixed(2));
$("#dev_actual1").text((($("#dev1").text()/$("#actual_cnt1").text())*15).toFixed(2));
$("#dev_allow2").text((($("#dev3").text()/$("#actual3").text())*15).toFixed(2));
$("#dev_actual2").text((($("#dev3").text()/$("#actual_cnt3").text())*15).toFixed(2));
$("#dev_allow4").text((($("#dev4").text()/$("#actual4").text())*15).toFixed(2));
$("#dev_actual4").text((($("#dev4").text()/$("#actual_cnt4").text())*15).toFixed(2));
}
else if($(".final_normalize").attr('id') == "plant_head")
{
$("#dev_allow1").text((($("#dev1").text()/$("#actual1").text())*20).toFixed(2));
$("#dev_actual1").text((($("#dev1").text()/$("#actual_cnt1").text())*20).toFixed(2));
$("#dev_allow2").text((($("#dev3").text()/$("#actual3").text())*20).toFixed(2));
$("#dev_actual2").text((($("#dev3").text()/$("#actual_cnt3").text())*20).toFixed(2));
$("#dev_allow4").text((($("#dev4").text()/$("#actual4").text())*20).toFixed(2));
$("#dev_actual4").text((($("#dev4").text()/$("#actual_cnt4").text())*20).toFixed(2));
}
$("#actual_cnt1").text(parseFloat(rate1));
$("#actual_cnt2").text(rate2);
$("#actual_cnt3").text(rate3);
$("#actual_cnt4").text(parseFloat(rate4));
$("#actual_cnt5").text(rate5);
var avg = parseFloat(rate1)+parseFloat(rate2)+parseFloat(rate3)+parseFloat(rate4)+parseFloat(rate5);
//alert(avg);
$("#avg_actual").text(avg);
var data = {
                    'rate1' : rate1,
                    'rate2' : rate2,
                    'rate3' : rate3,
'rate4' : rate4,
'rate5' : rate5,
                  };
var f = $("#total_emp_count").text()*0.05;
var g = $("#total_emp_count").text()*0.10;
var h = $("#total_emp_count").text()*0.60;
var i = $("#total_emp_count").text()*0.20;
var j = $("#total_emp_count").text()*0.05;

var val1 = $("#total_emp_count").text()*0.05;
var r1 = val1.toFixed(1);
var r11 = r1.split('.');
var val2 = $("#total_emp_count").text()*0.10;
var r2 = val2.toFixed(1);
var r22 = r2.split('.');
var val3 = $("#total_emp_count").text()*0.60;
var r3 = val3.toFixed(1);
var r33 = r3.split('.');
var val4 = $("#total_emp_count").text()*0.20;
var r4 = val4.toFixed(1);
var r44 = r4.split('.');
var val5 = $("#total_emp_count").text()*0.05;
var r5 = val5.toFixed(1);
var r55 = r5.split('.');

//alert(val3);
$("#actual1").text(parseFloat(r1[0]));
$("#actual2").text(r2[0]);
if(r33[1] != '' && (r33[1]>5 || r33[1]==5))
{
$("#actual3").text(parseFloat(r33[0])+parseFloat(1));
}
else
{
$("#actual3").text(r33[0]);
}

if(r44[1] != '' && (r44[1]>5 || r44[1]==5))
{
$("#actual4").text(parseFloat(r44[0])+parseFloat(1));
}
else
{
$("#actual4").text(parseFloat(r44[0]));
}

if(r55[1] != '' && (r55[1]>5 || r55[1]==5))
{
$("#actual5").text(parseFloat(r55[0])+parseFloat(1));
}
else
{
$("#actual5").text(parseFloat(r55[0]));
}
//alert((($("#actual_cnt4").text()/$("#total_emp_count").text())*100).toFixed(2));dev_allow1

//alert($(".final_normalize").attr('id'));
//alert(rate1);alert(rate2);alert(rate3);alert(rate4);alert(rate5);

$("#actual_per_cnt2").text(((rate2/$("#total_emp_count").text())*100).toFixed(2));
$("#actual_per_cnt3").text((($("#actual_cnt3").text()/$("#total_emp_count").text())*100).toFixed(2));
$("#actual_per_cnt4").text((($("#actual_cnt4").text()/$("#total_emp_count").text())*100).toFixed(2));
$("#actual_per_cnt5").text(((rate5/$("#total_emp_count").text())*100).toFixed(2));
$("#ftotal").text(parseFloat($("#actual_per_cnt1").text())+parseFloat($("#actual_per_cnt3").text())+parseFloat($("#actual_per_cnt4").text()));

$("#dev1").text(parseFloat($("#actual_cnt1").text())-parseFloat($("#actual1").text()));        
$("#dev2").text(parseFloat($("#actual_cnt2").text())-parseFloat($("#actual2").text())); 
$("#dev3").text(parseFloat($("#actual_cnt3").text())-parseFloat($("#actual3").text())); 
$("#dev4").text(parseFloat($("#actual_cnt4").text())-parseFloat($("#actual4").text())); 
$("#dev5").text(parseFloat($("#actual_cnt5").text())-parseFloat($("#actual5").text())); 


var dev = parseFloat($("#dev_allow1").text())+parseFloat($("#dev_allow3").text())+parseFloat($("#dev_allow4").text());
$("#total_dev1").text(dev.toFixed(2));
$("#total_dev2").text((parseFloat($("#dev_actual1").text())+parseFloat($("#dev_actual3").text())+parseFloat($("#dev_actual4").text())).toFixed(2));
$("#total_dev").text((parseFloat($("#dev1").text())+parseFloat($("#dev3").text())+parseFloat($("#dev4").text())).toFixed(2));

if($("#total_dev").text()>dev_chk)
{
$("#err_box").css("display","block");
$("#err_box").text("The maximum deviation limit exceeds.");
$("#err_box").fadeOut(3000);
}
$("#emp_actual_total").text($("#total_emp_count").text());

standard_chart(f,g,h,i,j);get_data(f,g,h,i,j,rate1,rate2,rate3,rate4,rate5);

});
}
}
});
$("body").on('click','.final_normalize',function(){
                var emp_id_list = '';var rating = '';var comments = '';var error = '';
                var total_count = $("#emp_list_data_count").text();var normalize_data = '';var performance_data = '';var cluster_head_data = '';var other_comments = '';
                for (var i = 0; i < total_count; i++) {
$(".performance_data-"+i).css('border','1px solid none');
$("#bu_head_comments-"+i).css('border','1px solid none');
if($(this).attr('id') == "cluster_head")
{
if($(".cluster_head_data-"+i).val() == '')
{
$(".cluster_head_data-"+i).css('border','2px solid red');
error ="Please enter the ratings";
$(".cluster_head_data-"+i).focus();
break;
}
else if($(".cluster_head_data-"+i).val() > 5)
{
$(".cluster_head_data-"+i).css('border','2px solid red');
error ="Please enter the ratings between 1-5 only";
$(".cluster_head_data-"+i).focus();
break;
}
else if($(".cluster_head_data-"+i).val() !='' && $("#cluster_head_comment-"+i).val() =='')
{
$("#cluster_head_comment-"+i).css('border','2px solid red');
   error ="Please enter the comments to justify the ratings";
$("#cluster_head_comment-"+i).focus();
break;
}
else
{
   error = '';
$(".cluster_head_data-"+i).css('border','1px solid none');
$("#cluster_head_comment-"+i).css('border','1px solid none');
$("#err_box").css("display","none");
  if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".cluster_head_data-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".cluster_head_data-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#cluster_head_comment-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#cluster_head_comment-"+i).val();
  }
}  
}
else if($(this).attr('id') == "plant_head")
{
if($(".normalize_rate-"+i).val() == '')
{
$(".normalize_rate-"+i).css('border','2px solid red');
error ="Please enter the ratings";
$(".normalize_rate-"+i).focus();
break;
}
else if($(".normalize_rate-"+i).val() > 5)
{
$(".normalize_rate-"+i).css('border','2px solid red');
error ="Please enter the ratings between 1-5 only";
$(".normalize_rate-"+i).focus();
break;
}
else if($(".normalize_rate-"+i).val() !='' && $("#plant_head_comments-"+i).val() =='')
{
$("#plant_head_comments-"+i).css('border','2px solid red');
   error ="Please enter the comments to justify the ratings";
$("#plant_head_comments-"+i).focus();
break;
}
else
{
  error = '';
$(".normalize_rate-"+i).css('border','1px solid none');
$("#plant_head_comments-"+i).css('border','1px solid none');
$("#err_box").css("display","none");
  if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".normalize_rate-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".normalize_rate-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#plant_head_comments-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#plant_head_comments-"+i).val();
  }
}
}
else if($(this).attr('id') == "bu")
{

if($(".performance_data-"+i).val() == 5 || $(".performance_data-"+i).val() <5)
{
$(".performance_data-"+i).css('border','1px solid grey');
$("#bu_head_comments-"+i).css('border','1px solid grey');
}

if($(".performance_data-"+i).val() == '')
{
$(".performance_data-"+i).css('border','2px solid red');
error ="Please enter the ratings";
$(".performance_data-"+i).focus();
break;
}
else if($(".performance_data-"+i).val() > 5)
{
$(".performance_data-"+i).css('border','2px solid red');
error ="Please enter the ratings between 1-5 only";
$(".performance_data-"+i).focus();
break;
}
else if($(".performance_data-"+i).val() !='' && $("#bu_head_comments-"+i).val() =='')
{
$("#bu_head_comments-"+i).css('border','2px solid red');
   error ="Please enter the comments to justify the ratings";
$("#bu_head_comments-"+i).focus();
break;
}
else
{
   error = '';
$("#err_box").css("display","none");
  if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".performance_data-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".performance_data-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#bu_head_comments-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#bu_head_comments-"+i).val();
  }
if(other_comments == '')
  {
    other_comments = $("#other"+i).val();
  }
  else
  {
    other_comments = other_comments+';'+$("#other"+i).val();
  }
}
}
}

//alert(error);
if(error != "")
{
   $("#err_box").css("display","block");
   $("#err_box").text(error);
}
else
{
$("#err_box").css("display","none");
//alert(comments);alert(rating);alert(emp_id_list);alert($(this).attr('id'));
$("#err").hide();
$("#err").text("");
              var data = {
                    'emp_id_list' : emp_id_list,
                    'rating' : rating,
                    'comments' : comments,
                    'other_comments' : other_comments,
                    'user' : $(this).attr('id')
                  };
                  var base_url = window.location.origin;
                  $.ajax({
                    type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Normalization_process/normalize',
                            success : function(data)
                            {
alert(data);
                              $("#normalize_msg1").modal('show');
                            }
                  });
}
});
});

setInterval(save_normalizedata,3000);
$(".confirm1").click(function(){
	//alert("hi");
save_normalizedata();
});
function save_normalizedata()
{
var e = $(".final_normalize").attr('id');
//alert(e);
var emp_id_list = '';var rating = '';var comments = '';var error = '';var other_comments = '';
                var total_count = $("#emp_list_data_count").text();var normalize_data = '';var performance_data = '';var cluster_head_data = '';var rate1 = 0;var rate2 = 0;var rate3 = 0;var rate4 = 0;var rate5 = 0;
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 1) 
  {
       rate1++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 2) 
  {
       rate2++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 3) 
  {
       rate3++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 4) 
  {
       rate4++;
  }

}
for (var i = 0; i < $("#total_emp_count").text(); i++) {
  if (($(".normalize_rate-"+i).val() != '' || $(".normalize_rate-"+i).val() != undefined) && $(".normalize_rate-"+i).val() == 5) 
  {
       rate5++;
  }

}
//alert(total_count);
                for (var i = 0; i < total_count; i++) {

if(e == "bu")
{
if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".performance_data-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".performance_data-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#bu_head_comments-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#bu_head_comments-"+i).val();
  }
if(other_comments == '')
  {
    other_comments = $("#other"+i).val();
  }
  else
  {
    other_comments = other_comments+';'+$("#other"+i).val();
  }
  if(i == 69)
  {
      //alert(comments);
  }
  
//alert(emp_id_list);
//alert(emp_id_list);
}
else if(e == "cluster_head")
{

if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".cluster_head_data-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".cluster_head_data-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#cluster_head_comment-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#cluster_head_comment-"+i).val();
  }
}
else if(e == "plant_head")
{

if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".cluster_head_data-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".cluster_head_data-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#cluster_head_comment-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#cluster_head_comment-"+i).val();
  }
}

}

//alert(e);
var flag = 0;
if($("#bu-0").text() == 1)
{
flag = 1;
}
else
{
flag = 0;
}

              var data = {
                    'emp_id_list' : emp_id_list,
                    'rating' : rating,
                    'comments' : comments,
                    'user' : e,
                    'other_comments' : other_comments,
                    'flag' : flag,
                  };
                  var base_url = window.location.origin;
                  $.ajax({
                    type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Normalization_process/normalize',
                            success : function(data)
                            {
                             // alert(data);
                            }
                  });
standard_chart(f,g,h,i,j);get_data(f,g,h,i,j,rate1,rate2,rate3,rate4,rate5);
}
</script>
 <script type="text/javascript">
    $(function(){
                $('.get_dept').change(function(){                                           
                var dept_name = {
                    Department : $(this).find(':selected').val(),
                    cluster_name : $('.get_cluster').find(':selected').val(),
                    reporting_head_name :$('.get_reporting_manager').find(':selected').val(),
                    BU_name : $('.get_BU').find(':selected').val(),
                };
                console.log(dept_name);
                var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : dept_name,
                    url : base_url+'/index.php?r=Normalization/getdata',
                    success : function(data)
                    {
                        //alert(data);
                        var splited_data = data.split(';');                       
                       //var table = $('#sample_4').DataTable();
                     //table.clear().draw();
                    //table.rows.add($(splited_data[0])).draw();
                       $("#emp_list_data_count").text(splited_data[1]);
                       // $('#sample_4').DataTable();          
                    }
                });
            });

            $('.get_BU').change(function(){                                           
                var dept_name = {
                    Department : $(this).find(':selected').val(),
                    cluster_name : $('.get_cluster').find(':selected').val(),
                    reporting_head_name :$('.get_reporting_manager').find(':selected').val(),
                    BU_name : $(this).find(':selected').val(),
                };
                console.log(dept_name);
                var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : dept_name,
                    url : base_url+'/index.php?r=Normalization/getdata',
                    success : function(data)
                    {
                        //alert(data);
                        var splited_data = data.split(';');                       
                        $('#dept_based_emp').html(splited_data[0]);
                    }
                });
            });

            $('.get_reporting_manager').change(function(){                                           
                var dept_name = {
                    Department : $('.get_dept').find(':selected').val(),
                    cluster_name : $('.get_cluster').find(':selected').val(),
                    reporting_head_name : $(this).find(':selected').val(),
                    BU_name : $('.get_BU').find(':selected').val(),
                };
                console.log(dept_name);
                var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : dept_name,
                    url : base_url+'/index.php?r=Normalization/getdata',
                    success : function(data)
                    {
                        //alert(data);
                        var splited_data = data.split(';');                       
                        $('#dept_based_emp').html(splited_data[0]);
                    }
                });
            });
            
            $('.get_cluster').change(function(){
            var dept_name = {
                Department : $('.get_dept').find(':selected').val(),
                cluster_name : $(this).find(':selected').val(),
                reporting_head_name :$('.get_reporting_manager').find(':selected').val(),
                BU_name : $('.get_BU').find(':selected').val(),
            };
            console.log(dept_name);
            var base_url = window.location.origin;
            $.ajax({
                type : 'post',
                datatype : 'html',
                data : dept_name,
                url : base_url+'/index.php?r=Normalization/getdata',
                success : function(data)
                {
                    //alert("gfdgfd");
                    var splited_data = data.split(';');
                     //alert(splited_data);
                     
                   $('#dept_based_emp').html(splited_data[0]);
                    
                }
            });
        });
        });
</script>


           
         <script type="text/javascript">



 
} );
$(function(){ 
$(window).scroll(function() {
    var winScrollTop = $(window).scrollTop();
    var winHeight = $(window).height();
    var floaterHeight = $('#floater').outerHeight(true);
    var fromBottom = 20;
    var top = winScrollTop + winHeight - floaterHeight - fromBottom;
	$('#floater').css({'top': winScrollTop + 'px'});
});
});
 </script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 


 <script>
$(function(){ 
var pending_list = $("#pending_list").text();

if(pending_list>0)
{
$("#normalize_msg").modal('show');
$("body").on('click','#get_complete',function(){
$("#normalize_msg").modal('hide');
});
$("body").on('click','#get_complete1',function(){
 var base_url = window.location.origin;
window.location.href = base_url+'/index.php?r=User_dashboard';
});
}

$("#floater").click(function(){
getdisplay();
$("#chart_model").modal('show');
});
});
</script>
<style>
.table
{
background-color: white;
}

#example_info
{
display: none;
}
#example_paginate
{
display: none;
}
</style>
</html>
           
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>
/* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        
        margin: 0 auto;
    }
</style>
<div style="">  
<style>
input::-webkit-input-placeholder {
 color:    blue;

}
</style>                          
<label id="emp_list_data_count" style="display: none"><?php echo count($employee_list); ?></label>
  <!-- <div class="row">
    <div class="col-md-10" style="margin-left: 100px;margin-top: 38px;">-->
<script>
$(function(){
  $("body").on('click','.final_normalize',function(){
                var emp_id_list = '';var rating = '';var comments = '';var error = '';
                var total_count = $("#emp_list_data_count").text();var normalize_data = '';var performance_data = '';var cluster_head_data = '';var other_comments = '';
$("#err_box").css("display","block");
$("#err_box").text("Data saved successfully.");
$("#err_box").fadeOut(3000);
});  
});
</script>

        <script>
$(document).ready(function(){
$('#example1').DataTable();
});
</script>
   <style type="text/css">
.popover{
   min-width:30px;
  
   max-width:400px;
   word-wrap: break-word;
   border:1px solid #4c87b9;
}
.dt-button buttons-excel buttons-html5
{
margin-top: 41px;
margin-right: 1304px;
}
</style>
<script type="text/javascript">
$(function(){
$("body").on('mouseover','.pop',function(){
$(this).attr('data-content',$(this).val());
$(this).popover('show');
});
});
</script>
<script type="text/javascript">
$(function(){
$("body").on('mouseout','.pop',function(){
$(this).attr('data-content',$(this).val());
$(this).popover('hide');
});
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $(".chk_number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   $("body").on('keyup','.comm1',function(){
     if($(".final_normalize").attr('id') == 'bu' && $(this).val().length >5)
{
$("#err_box").css("display","block");
$("#err_box").text("Maximum 500 characters are allowed");
}
else if($(".final_normalize").attr('id') == 'bu' && ($(this).val().length < 5 && $(this).val() != ''))
{
$("#err_box").css("display","none");
for(var f=0;f<$("#total_emp_count").text();f++)
{
$("#performance_data-"+f).removeAttr('disabled');
$("#bu_head_comments-"+f).removeAttr('disabled');
}
}
else if($(".final_normalize").attr('id') == 'plant_head' && $(this).val().length >5)
{
$("#err_box").css("display","block");
$("#err_box").text("Maximum 500 characters are allowed");
}
else if($(".final_normalize").attr('id') == "plant_head" && ($(this).val().length < 5 && $(this).val() != ''))
{
$("#err_box").css("display","none");
for(var f=0;f<$("#total_emp_count").text();f++)
{
$("#normalize_rate-"+f).removeAttr('disabled');
$("#plant_head_comments-"+f).removeAttr('disabled');
}
}
else if($(".final_normalize").attr('id') == 'cluster_head' && $(this).val().length >5)
{
$("#err_box").css("display","block");
$("#err_box").text("Maximum 500 characters are allowed");
}
else if($(".final_normalize").attr('id') == "cluster_head" && ($(this).val().length < 5 && $(this).val() != ''))
{
$("#err_box").css("display","none");
for(var f=0;f<$("#total_emp_count").text();f++)
{
$("#cluster_head_data-"+f).removeAttr('disabled');
$("#cluster_head_comment-"+f).removeAttr('disabled');
}
}

   });
});
</script>
<style>
#f1
{
display:none
}
.f2
{
display:none
}
#sample_5_wrapper
{
  margin-top: -56px;
  display: initial;
}
#sample_5_filter
{
display: none;
}
#sample_5_info
{
display: none;
}
#sample_5_paginate
{
display: none;
}
</style>

<style>
    #sample_4_paginate
    {
        display:none;
    }
</style>
