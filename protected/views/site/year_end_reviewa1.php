<label id="yr" style="display:none"><?php echo Yii::app()->user->getState('financial_year_check');?></label>
<?php

    $setting_date=new SettingsForm;
    $where = 'where setting_content = :setting_content and year = :year';
    $list = array('setting_content','year');
    $data = array('dis_active-date',date('Y'));             
    $settings_data_new = $setting_date->get_setting_data($where,$data,$list); 
    //print_r($settings_data_new);die();
    Yii::app()->controller->renderPartial('//site/all_js');

?>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
     // setInterval(save_final_year_data1,5000);  
    });
</script>

<script type="text/javascript">

    $(function(){
       // alert("hiiiiiii");
    $('.date_show').attr('onkeydown','return false');
    $('.date_show').datepicker({dateFormat: 'yy/mm/dd',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
    });
</script>


<script>

function save_final_year_data1()
{

//alert('yuyiyiyui');
    var id_list = $("#total_kra_count").text();
    var str = id_list.replace(/\s+/g, '');
    var id_number_list = str.split(';');
    var error1 = '';var error = '';
    var emp_rev1 = '';
    var emp_rev2='';
    var rev1_ex1='';
    var rev1_ex2='';
    var rev2_ex1='';
    var rev2_ex2='';
    emp_rev1=$("#target1").val().trim().length;
    emp_rev2=$("#target2").val().trim().length;
    rev1_ex1=$("#text1").val().trim().length;
    rev1_ex2=$("#text2").val().trim().length;
    rev2_ex1=$("#text3").val().trim().length;
    rev2_ex2=$("#text4").val().trim().length;
    $("#err").removeClass("alert-success"); 
    $("#err").removeClass("alert-danger");   
    var extra_prg_status1 = '';var extra_prg_cmt1 = '';
    var ext_list = $("#ext_program_count").text();
    var ext_list_data = ext_list.split(';');
    for (var i = 0; i < ext_list_data.length; i++) { 

        if($("#topic"+i).val()!="" ){

            if(extra_prg_status1 == '')
            {

                extra_prg_status1=$(".yearAextraprg_"+ext_list_data[i]+':checked').val();
            }
            else
            {

                extra_prg_status1=extra_prg_status1+'^'+$(".yearAextraprg_"+ext_list_data[i]+':checked').val();
            }
            if(extra_prg_cmt1 == '')
            {
                if($("#yearAextraprogram_cmt-"+ext_list_data[i]).val()==""){

                    extra_prg_cmt1="NA";
                }
                else{

                    extra_prg_cmt1=$("#yearAextraprogram_cmt-"+ext_list_data[i]).val();
                }

            }
            else
            {
                extra_prg_cmt1=extra_prg_cmt1+'^'+$("#yearAextraprogram_cmt-"+ext_list_data[i]).val();
            }
        }


    }

    var k=3;var rel_prg_status1=""; var rel_prg_cmt1="";
    for (var i = 0; i < 2; i++) { 
        if($(".number_of_meetings"+k).val()!="")
        {
            if(rel_prg_status1 == '')
            {
                rel_prg_status1=$(".yearArel_prg"+i+':checked').val();

            }
            else
            {
                rel_prg_status1=rel_prg_status1+'^'+$(".yearArel_prg"+i+':checked').val();

            }
            if(rel_prg_cmt1 == '')
            {
                if($("#yearArel_program_review"+i).val()==""){
                rel_prg_cmt1="NA";
                }
                else{
                rel_prg_cmt1=$("#yearArel_program_review"+i).val();
                }
            }
            else
            {
                rel_prg_cmt1=rel_prg_cmt1+'^'+$("#yearArel_program_review"+i).val();
            }
        }
        k++;
    }

    var total = $("#prg_list_defined").text();
    var prg = total.split(';');

    var prg_status1 = '';
    var prg_cmt1 = '';
    for (var i = 0; i < $('#total_prog').text(); i++) { 
        if($("#"+i).text()!=""){
          if(prg_status1 == '')
          {
              prg_status1 =$("#yearAcompleteion_type"+i+':checked').val();
          }
          else
          {
              prg_status1=prg_status1+'^'+$("#yearAcompleteion_type"+i+':checked').val();
          }
          if(prg_cmt1 == '')
          {
            if($("#yearAprogram_cmd-"+i).val()==''){
            prg_cmt1='NA';
            }
            else{
              prg_cmt1=$("#yearAprogram_cmd-"+i).val();
            }
          }
          else
          {
          prg_cmt1=prg_cmt1+'^'+$("#yearAprogram_cmd-"+i).val();
          }
        }
    }






    for (var j = 0; j < id_number_list.length; j++) {
    var emp_actual_achieve = '';var year_end_achieve = '';var emp_rating = '';var kpi_file = '';
    var kpi_list1 = '';var year_end_achieve1 = '';var emp_actual_achieve1 = '';
    var id = id_number_list[j];
    var string_match = /^([0-9.]{1,10})$/;
    var chk = /[;]/;
        if($('.proof_1').length >0)
        {
          var e = document.getElementsByClassName('proof_1');
          $("#proof_1").text($('.proof_1').val());
          var proof_1 = $(e)[0].files[0];                     
        }
        if($('.proof1').length >0)
        {
          var e = document.getElementsByClassName('proof1');
          $("#proof1").text($('.proof1').val());
          var proof1 = $(e)[0].files[0];  
        }
          $("#proof2").text($('.proof2').val());
          var formData = new FormData(); 
          var kpi_total = $("#kpi_count_list-"+id).text();
          var error1 = '';
    }  
    var prg_status=""; var prg_cmt="";var extra_prg_status=""; var extra_prg_cmt=""; var rel_prg_status=""; var rel_prg_cmt="";
    var emp_actual_achieve1=""; var year_end_achieve1="";

    for (var j = 0; j < id_number_list.length; j++) {
        var id = id_number_list[j];
        var kpi_total = $("#kpi_count_list-"+id).text();
        var emp_actual_achieve=""; var year_end_achieve="";
        for (var i = 0; i < kpi_total; i++) {
            if($("#file_change-"+i+id).text() != '' )
            {
              var e = document.getElementsByClassName('file-input'+i+id);                                
              var file_data = $(e)[0].files[0]; 
              formData.append("employee_csv"+i+id,file_data);  
            }
            if (emp_actual_achieve == '') 
            {
                if($('#emp_actual_achieve-'+i+id).val() == '')
                {
                emp_actual_achieve = 'NA';
                }
                else
                {
                emp_actual_achieve = $('#emp_actual_achieve-'+i+id).val();
                }

            }
            else
            {
                emp_actual_achieve = emp_actual_achieve+';'+$('#emp_actual_achieve-'+i+id).val();
            }
            if (year_end_achieve == '') 
            {
                if($('#appraisee_comment'+i+id).val() == '')
                {
                year_end_achieve = 'NA';
                }
                else
                {
                year_end_achieve = $('#appraisee_comment'+i+id).val();
                }

            }
            else
            {
            year_end_achieve = year_end_achieve+';'+$('#appraisee_comment'+i+id).val();
            }
      }

      if (emp_actual_achieve1 == '') 
      {
        emp_actual_achieve1 = emp_actual_achieve;
      }
      else
      {
        emp_actual_achieve1 = emp_actual_achieve1+'^'+emp_actual_achieve;
      }
      if (year_end_achieve1 == '') 
      {
        year_end_achieve1 = year_end_achieve;
      }
      else
      {
        year_end_achieve1 = year_end_achieve1+'^'+year_end_achieve;
    }


  }
    formData.append("kpi_value_id",str);
    formData.append("year_end_reviewa",year_end_achieve1);
    formData.append("year_end_achieve",emp_actual_achieve1);
    formData.append("rating_by_emp_raiting",emp_rating);
    formData.append("employee_review1",$("#target1").val());
    formData.append("employee_review2",$("#target2").val());
    formData.append("review1_example1",$("#text1").val());
    formData.append("review1_example2",$("#text2").val());
    formData.append("review2_example1",$("#text3").val());
    formData.append("review2_example2",$("#text4").val());

    formData.append("project_final_review",$(".project_final_review").val());
    formData.append("Year_end_prg_status",prg_status1);
    formData.append("Year_end_prg_comments",prg_cmt1);
    formData.append("Extra_year_end_prg_status",extra_prg_status1);
    formData.append("Extra_year_end_prg_comments",extra_prg_cmt1);
    formData.append("Relationship_year_end_status",rel_prg_status1);
    formData.append("Relationship_year_end_comments",rel_prg_cmt1);
    formData.append("Year_end_prog_status",$('#yearA_project_status option:selected').text());
    formData.append("Year_end_prog_comments",$('#yearA_prj_stat_comments').val());

    $("#err").hide();
    var base_url = window.location.origin;
    $.ajax({
                type : 'post',
                datatype : 'json',
                processData: false, 
                contentType: false,
                enctype : 'multipart/form-data',
                data : formData,
                url : base_url+'/pms/index.php/Year_endreview1/updatereview1',
                success : function(data)
                {
                   //alert(data);
                    $("#err").show();  
                    $("#err").text("Data save successfully");
                    $("#err").css('background-color','#B2EAC5');
                    $("#err").css('color','black');
                    $("#err").css('border','1px solid #0DEA56');
                    $("#err").fadeOut(2000);
                }
          });

}
</script>
<script type="text/javascript">
$(function(){
  $("body").on('mouseover','.validate_field',function(){
      $(this).attr('data-content',$(this).val());
      $(this).popover('show');
  });
});
</script>
<script type="text/javascript">
$(function(){
    $("body").on('mouseout','.validate_field',function(){
        $(this).attr('data-content',$(this).val());
        $(this).popover('hide');
    });
});
</script>
<script type="text/javascript">
$(function(){
    $("body").on('keyup','.validate_field',function(){
        var id = $(this).attr('id');
        var id_value = id.split('-');
        if (id_value[0] == 'emp_actual_achieve') 
        {
          var str_chk = /[;]/;
            if ($("#kpi_unit-"+id_value[1]).text()=='Text' && str_chk.test($(this).val())) 
            {
            $("#err").css('display','block');
            $("#err").addClass("alert-danger"); 
            $(this).css('border','1px solid red');

            $("#err").text("For the Actual achievement for text field special character ';' not allowed.");
            $("#err").css('background-color','#AB5454');
            $("#err").css('color','#fff');
            $("#err").css('border','1px solid #AB5454');
            }
            else if (($("#kpi_unit-"+id_value[1]).text()!='Date' && $("#kpi_unit-"+id_value[1]).text()!='Text') && !$.isNumeric($(this).val())) 
            {
            $("#err").css('display','block');
            $("#err").addClass("alert-danger"); 
            $(this).css('border','1px solid red');

            $("#err").text("Please Enter Actual achievement based on selected unit for the particular KPI.");
            $("#err").css('background-color','#AB5454');
            $("#err").css('color','#fff');
            $("#err").css('border','1px solid #AB5454');
            }
            else
            {
            $("#err").css('display','none');
            $(this).css('border','1px solid #999');
            }
        }
        else
        {
            var str_chk = /[;]/;
            if (str_chk.test($(this).val())) 
            {
                $("#err").css('display','block');
                $("#err").addClass("alert-danger"); 
                $(this).css('border','1px solid red');

                $("#err").text("The special character ';' not allowed.");
                $("#err").css('background-color','#AB5454');
                $("#err").css('color','#fff');
                $("#err").css('border','1px solid #AB5454');
            }
            else
            {
                $("#err").css('display','none');
                $(this).css('border','1px solid #999');
            }
        }
    });
    $("body").on('keyup','.valid_entry1',function(){
        var last_id_value1 = '';var last_id_value = '';
        var id = $(this).attr('id');
        var id_value = id.split('-');
        var detail = id_value[1].slice(1);
        last_id_value1 = id_value[1].charAt(0);
        last_id_value = id_value[1].split(last_id_value1);

        var data = {
        kra_id : detail,
        current_date : $(this).val(),
        last_id_value1 : last_id_value1
        }; 
        var base_url = window.location.origin;
        $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/pms/index.php/Setgoals/kpivalue',
            success : function(data)
            {
                var rate = '';
                $("#rating_by_emp_raiting-"+id_value[1]).val(data);
                for (var i = 0; i < $("#kpi_count_list-"+detail).text(); i++) {
                if(rate == '')
                {
                rate = $("#rating_by_emp_raiting-"+i+detail).val();
                }
                else
                {
                rate = parseFloat(rate)+parseFloat($("#rating_by_emp_raiting-"+i+detail).val());
                }
                }
                rate = (rate/$("#kpi_count_list-"+detail).text()).toFixed(2);
                $("#average_rating-"+detail).attr('value',rate);
            }
        });                  
        var curr_date1 = new Date();
        var curr_date =  moment(curr_date1, "DD.MM.YYYY").format("YYYY-MM-DD");                 
        var userDate = $(this).val();
        var date_string = moment(userDate, "DD.MM.YYYY").format("YYYY-MM-DD");
    });
});
</script>   
<script>
$(document).ready(function(){
$('[data-toggle="popover"]').popover();
});
</script>
<style>
    .element{ position:fixed; top:2%; right:1%; } 
        .btn-success{
        background-color: #26466d;
        border-color: #26466d;
    }
    .sucess_msg{
        color:black;
        background-color:#B2EAC5;
        border:1px solid #0DEA56;
    }

    .ui-datepicker-month
    {
      color: rgb(28, 148, 201);
    }
    .ui-datepicker-year
    {
      color: rgb(28, 148, 201);
    }

    .form-group{
      border-bottom:1px solid #efefef;
    }

    table.mid-table td { border:1px solid red; height:37px;min-height: 190px;max-height: auto}
    table.mid-table th { border:1px solid red; height:37px;min-height: 190px;max-height: auto}

    table.mid-table1 td { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
    table.mid-table1 th { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       
    #err { 
    position: absolute; 
    top: 0; right: 20; 
    z-index: 10; 
    width: 374px;
    height: 55px;
    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;
    right: 45%;
    background-color: #AB5454;
    color: #FFF;
    font-weight: bold;  
    }

    #temp_save{ 
    position: fixed; 
    top: 265; 
    z-index: 10; 
    right:-1%;

    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;

    background-color: #000;
    color: #FFF;
    font-weight: bold;  
    }

    .popover{
    min-width:30px;

    max-width:400px;
    word-wrap: break-word;
    border:1px solid #4c87b9;
    }

    .custom-file-input {
    display: inline-block;
    position: relative;
    color: #fff;
    }
    .custom-file-input input[type=file] {
    visibility: hidden;
    width: 100px;
    }
    .custom-file-input:before {
    content: 'Upload File';
    display: block;
    background: -webkit-linear-gradient( -180deg, #26466D, #26466D);
    background: -o-linear-gradient( -180deg, #26466D, #26466D);
    background: -moz-linear-gradient( -180deg, #26466D, #26466D);
    background: linear-gradient( -180deg, #26466D, #26466D);
    border: 3px solid #26466D;
    border-radius: 10px;
    padding: 5px 0px;
    outline: none;
    white-space: nowrap;
    cursor: pointer;
    text-shadow: 1px 1px rgba(255,255,255,0.7);
    font-weight: bold;
    text-align: center;
    font-size: 10pt;
    position: absolute;
    left: 0;
    right: 0;
    }
    .custom-file-input:hover:before {
    border-color: #26466D;
    }
    .custom-file-input:active:before {
    background: #26466D;
    }
    . :before {
    content: 'Browse File';
    background: -webkit-linear-gradient( -180deg, #99dff5, #02b0e6);
    background: -o-linear-gradient( -180deg, #99dff5, #02b0e6);
    background: -moz-linear-gradient( -180deg, #99dff5, #02b0e6);
    background: linear-gradient( -180deg, #99dff5, #02b0e6);
    border-color: #57cff4;
    color: #FFF;
    text-shadow: 1px 1px rgba(000,000,000,0.5);
    }
    . :hover:before {
    border-color: #02b0e6;
    }
    . :active:before {
    background: #02b0e6;
    }
    .tooltip{
    min-width:30px;

    max-width:400px;
    word-wrap: break-word;
    border:1px solid #4c87b9;
    }
</style>

<div class="page-container">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper" id="pdf_down">
<!-- BEGIN CONTENT BODY -->
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
<div class="container">
<!-- BEGIN PAGE TITLE -->
<div class="page-title">
<h1>Year End Review</h1>
</div>  
<h4 style="float: right;"><?php if(isset($emp_data['0']['Emp_fname'])) { echo 'Employee Name : '.$emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname'].'/ '; } ?>
<lable style="float: right;"><?php if(isset($emp_data['0']['Department'])) { echo 'Department : '.$emp_data['0']['Department']; } ?></lable>
</h4>

<!-- END PAGE TITLE -->
<!-- BEGIN PAGE TOOLBAR -->                       
<!-- END PAGE TOOLBAR -->
</div>
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE CONTENT BODY -->
<link href="https://kritva.in/pms/css/progress-wizard.min.css" rel="stylesheet">


<div class="page-content">
<div style="float:right;margin-right: -9px;color: #9d9ba7;padding-top: 182px;" class="element" id="bottom"><i class="fa fa-arrow-circle-o-down fa-3" style="font-size:40px;cursor:pointer;margin-right: 0px;"></i><div style="margin-top: 8px;margin-left: -11px;text-align: center;">Click To <br> Go Down</div></div>
<ul class="progress-indicator">
<li id="rate1"> <span class="bubble"></span> <lable>Rating Of Quantitative Goals </lable></li>
<li id="rate2"> <span class="bubble"></span><lable> Rating Of Qualitative Goals</lable> </li>
<li id="rate3"> <span class="bubble"></span> <lable>Completion Of IDP </lable></li>
</ul>





<div class="container-fluid">  

<!-- BEGIN SIDEBAR CONTENT LAYOUT -->

<div class="page-content-container">
<div class="page-content-row">
<!-- BEGIN PAGE SIDEBAR -->                           
<!-- END PAGE SIDEBAR -->

<div class="fade in" id="err" style="display: none">
<!-- <a href="#" class="close" data-dismiss="alert">&times;</a>      -->
<lable id="error_value"> A problem has been occurred while submitting your data.</lable>
</div>

<div class="portlet box " style="background-color:#26466D;border:1px solid #26466D;">
<div class="portlet-title">
<div class="caption">
Rating Of Quantitative Goals
</div>
<div class="tools">
<a href="javascript:;" class="collapse"></a>
</div>
</div>                                    
<div class="portlet-body tabs-below">
<div class="tab-content">
<label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
<div style="border: 1px solid #26466D;margin-top: 20px;padding-left: 10px;padding-right: 10px;padding-top: 10px;">
<label id="total_kra_count" style="display: none">
<?php 
$total_kra_id = '';
if (isset($kpi_data) && count($kpi_data)>0) {   
for ($k=0; $k < count($kpi_data); $k++) { 
if ($total_kra_id == '') {
$total_kra_id = $kpi_data[$k]['KPI_id'];
}
else
{
$total_kra_id = $total_kra_id.';'.$kpi_data[$k]['KPI_id'];
}
}
}
?>
<?php if (isset($total_kra_id) && $total_kra_id != '') { echo $total_kra_id; } ?></label>
<?php 
if (isset($kpi_data) && count($kpi_data)>0) { 
$kra_cnt = 0;                                
for ($k=0; $k < count($kpi_data); $k++) { 
?>
<table class="table table-bordered" cellspacing="0" border="0">
<tr>
<td   align="left" valign=middle><b>KRA Description </b></td>
<td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_description'];?></td>
</tr>
<tr>
<td   align="left" valign=middle><b>KRA Category </b></td>
<td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_category'];?></td>
</tr>
<tr>
<td   align="left" valign=middle><b>Weightage </b></td>
<td colspan=7 align="center" valign=middle sdnum="16393;0;0"><?php echo $kpi_data[$k]['target'];?></td>
</tr>
<?php
$employee=new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($kpi_data[$k]['appraisal_id1']);
$emp_data_apr = $employee->get_employee_data($where,$data,$list);
?>
<tr>
<td   align="left" valign=middle><b>Reporting Manager </b></td>
<td colspan=7 align="center" valign=middle sdnum="16393;0;0"><?php echo $emp_data_apr['0']['Emp_fname']." ".$emp_data_apr['0']['Emp_lname'];?></td>
</tr>
<tr>
<td align="left" valign=middle style="border: 2px solid #26466D;"><b>Key Performance Indicators (KPI) Description </b></td>
<!-- <td align="left" valign=middle ><b>Unit </b></td> -->
<td align="left" valign=middle  style="border: 2px solid #26466D;"><b>Unit & Value </b></td>

<td align="left" valign=middle  style="border: 2px solid #26466D;"><b>Actual achievement of year end </b></td>
<td align="left" valign=middle  style="border: 2px solid #26466D;"><b>Appraisee comment on actual achievement </b></td>
<td align="left" valign=middle  style="border: 2px solid #26466D;"><b>Upload Supported Documents </b></td>
<!--  <td align="left" valign=middle ><b>Appraiser Comment on actual achievement </b></td>
<td align="left" valign=middle ><b>Appraiser Rating </b></td> -->
<!--  <td align="left" valign=middle ><b>Average rating for KRA </b></td>
<td align="left" valign=middle ><b>Approximate Rating </b></td> -->
</tr>
<?php 
$form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form',                                       
'enableAjaxValidation' => false,
'enableClientValidation' => true,
'htmlOptions' => array(
'class'=>'form-horizontal',
'enctype' => 'multipart/form-data'
),
));
?>
<?php

$kpi_list = explode(';',$kpi_data[$k]['kpi_list']);
$kpi_unit = explode(';',$kpi_data[$k]['target_unit']);

$kpi_value = explode(';',$kpi_data[$k]['target_value1']);
$rating_by_emp = explode(';',$kpi_data[$k]['rating_by_emp']);
$seq_number = '';
if($kpi_data[$k]['document_proof'] != '')
{
$doc_prf_by_emp = explode(';',$kpi_data[$k]['document_proof']);

}
if(isset($kpi_data[$k]['seq_number']) && $kpi_data[$k]['seq_number'] != '')
{
$seq_number = explode(';',$kpi_data[$k]['seq_number']);
}




$total_upload = explode(';',"tyryrty;tyuyu");
$view_flag = false;

if ($kpi_data[$k]['final_kra_status'] == '' && $kpi_data[$k]['final_kra_status'] != 'Approved') {
$view_flag = false;
}
else
{
$view_flag = true;
}
if ($kpi_data[$k]['year_end_achieve'] != '') {
$year_end_achieve = explode(';',$kpi_data[$k]['year_end_achieve']);
}
else
{
$year_end_achieve = '';
}                                                        
if ($kpi_data[$k]['year_end_reviewa'] != '') {
$year_end_reviewa = explode(';',$kpi_data[$k]['year_end_reviewa']);
}
else
{
$year_end_reviewa = '';
}
if ($kpi_data[$k]['appraiser_end_review'] != '') {
$apr_comment_values = explode(';',$kpi_data[$k]['appraiser_end_review']);
}
else
{
$apr_comment_values = '';
}
if ($kpi_data[$k]['appraiser_end_rating'] != '') {
$appraiser_end_rating = explode(';',$kpi_data[$k]['appraiser_end_rating']);
}
else
{
$appraiser_end_rating = '';
}
if ($kpi_data[$k]['rating_by_emp'] != '') {
$rating_by_emp = explode(';',$kpi_data[$k]['rating_by_emp']);
}
else
{
$rating_by_emp = '';
} 



?>
<label id='kpi_count_list-<?php echo $kpi_data[$k]['KPI_id']; ?>' style='display: none'><?php echo count($kpi_list); ?></label>
<?php

for ($i=0; $i < count($kpi_list); $i++) { 


if ($kpi_unit[$i] != 'Select') {
?>
<tr>

<td style="border: 2px solid #26466D;"><?php 

echo $kpi_list[$i]; ?></td>                                                    
<?php ?>    
<td style="border: 2px solid #26466D;">
<?php
if ($kpi_unit[$i] == 'Date' || $kpi_unit[$i] == 'Percentage' || $kpi_unit[$i] == 'Days' || $kpi_unit[$i] == 'Ratio' || $kpi_unit[$i] == 'Text') { 
$value = explode('-',$kpi_value[$i]);
?><?php ?>
<table class="table table-bordered" cellspacing="0" border="0">
<tr>
<td colspan="3"><b>Unit </b></td>
<td colspan="2" id="<?php echo "kpi_unit-".$i.$kpi_data[$k]['KPI_id'];?>"><?php echo $kpi_unit[$i]; ?></td>
</tr>
<tr>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
</tr>
<!-- <tr>                                                                    
<?php
for ($l=0; $l < count($value); $l++) { 
echo "<td>".$value[$l]."</td>";
} ?>
</tr>-->
<tr class="content_hover">                                                                    
<?php 
for ($l=0; $l < count($value); $l++) { ?>
<td><lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value[$l]; ?>"><?php echo strlen($value[$l]) >= 10 ? 
substr($value[$l], 0, 5) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
$value[$l]; ?></lable></td>
<?php } ?>
</tr>
</table>
<?php
}
else
{


?>

<table class="table table-bordered" cellspacing="0" border="0">
<tr>
<td colspan="2"><b>Unit </b></td>
<td colspan="1" id="<?php echo "kpi_unit-".$i.$kpi_data[$k]['KPI_id'];?>;"><?php echo $kpi_unit[$i]; ?></td>
<td colspan="1"><b>Unit value </b></td>
<td colspan="1"><?php echo $kpi_value[$i]; ?></td>
</tr>
<tr>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
</tr>
<tr>
<td><?php echo round($kpi_value[$i]*0.69,2); ?></td>
<td><?php echo round($kpi_value[$i]*0.70,2); ?></td>

<td><?php echo round($kpi_value[$i]*0.96,2); ?></td>

<td><?php echo round($kpi_value[$i]*1.06,2); ?></td>

<td><?php echo round($kpi_value[$i]*1.39,2); ?></td>
</tr>
</table>


<?php  }
?>
</td>
<td style="border: 2px solid #26466D;">
<?php 

//echo date('Y-M-d');die();
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))  > strtotime($settings_data_new['0']['setting_type']))
{


if ($kpi_unit[$i] == 'Date') {  

if(!isset($year_end_achieve[$i]) || $year_end_achieve[$i] == '')
{
echo CHtml::textField('emp_actual_achieve','',array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> 'true','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));  
}
else{
echo CHtml::textField('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> 'true','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}
}
else
{


if(!isset($year_end_achieve[$i]) || $year_end_achieve[$i] == '')
{
echo CHtml::textField('emp_actual_achieve','',array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));  
}
else{
echo CHtml::textField('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}



}
}                                                            
else
{   //echo $kpi_unit['2'];die();

//print_r("fdgf");die();
if ($kpi_unit[$i] == 'Date') {  

if(!isset($year_end_achieve[$i]) || $year_end_achieve[$i] == '')
{
echo CHtml::textField('emp_actual_achieve','',array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));  
}
else{
echo CHtml::textField('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}
}
else
{


if(!isset($year_end_achieve[$i]) || $year_end_achieve[$i] == '')
{
echo CHtml::textField('emp_actual_achieve','',array('class'=>'form-control  valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));  
}
else{
echo CHtml::textField('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control  valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}



}


}
?></td>
<td style="border: 2px solid #26466D;">
<?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{ 
if(!isset($year_end_reviewa[$i]) || $year_end_reviewa[$i] == '')
{


echo CHtml::textArea('appraisee_comment','',array('class'=>'form-control validate_field','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> 'true','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));

}
else{

echo CHtml::textArea('appraisee_comment',$year_end_reviewa[$i],array('class'=>'form-control validate_field','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> 'true','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}
}
else
{
if(!isset($year_end_reviewa[$i]) || $year_end_reviewa[$i] == '')
{


echo CHtml::textArea('appraisee_comment','',array('class'=>'form-control validate_field','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));

}
else{

echo CHtml::textArea('appraisee_comment',$year_end_reviewa[$i],array('class'=>'form-control validate_field','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}
}
?>
</td>


<td style="border: 2px solid #26466D;">

<?php 

$num = 0;$num1 = 0;
for($f = 0;$f<count($seq_number);$f++)
{
//echo $f;
if(isset($seq_number[$f]) && $seq_number[$f]!= '' && ($seq_number[$f] == $kpi_data[$k]['KPI_id'].$i))
{
$num1++;
?>
<!--  -->                                    
<a id='<?php echo "del_file_name-".$i."-".$kpi_data[$k]['KPI_id']; ?>' href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/<?php if(isset($doc_prf_by_emp[$f])) { echo $doc_prf_by_emp[$f]; } ?>' target="_blank" download><?php if(isset($doc_prf_by_emp[$f])) { echo $doc_prf_by_emp[$f]; } ?></a>
<input id='<?php echo "del_file-".$i."-".$kpi_data[$k]['KPI_id']; ?>' value="Delete" class="btn btn-danger del_file" style="cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
<?php  ?>
<?php }
else if(isset($seq_number[$f]) && $seq_number[$f]!= '' && ($seq_number[$f] != $kpi_data[$k]['KPI_id'].$i))
{
$num++;
}
} ?>
<?php
if($num1==0)
{
?>
<div class='uploaded_file<?php echo $i.$kpi_data[$k]['KPI_id']; ?>' style="display:none"><a href="" target="_blank" download class="link<?php echo $i.$kpi_data[$k]['KPI_id']; ?>"><lable id='uploaded_file<?php echo $i.$kpi_data[$k]['KPI_id']; ?>'></lable></a>

<input id='uploaded_file1-<?php echo $i.$kpi_data[$k]['KPI_id']; ?>' value="Delete" class="btn btn-danger cancel_upload" style="cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
</div> 
<div class='uploaded_file1-<?php echo $i.$kpi_data[$k]['KPI_id']; ?>'>
<label  class="custom-file-input   file_change" id="file_change-<?php echo $i.$kpi_data[$k]['KPI_id']; ?>" data-toggle="tooltip" data-placement="top" title="Maximum file size should be 1 MB"><br><br>
<input id="file-input" style="margin-top:10px" class='file-input<?php echo $i.$kpi_data[$k]['KPI_id']; ?>' type="file"   name='employee_csv<?php echo $i.$kpi_data[$k]['KPI_id']; ?>'/>
</div> 
<?php
}
?> 
</td>
<?php 

} ?>   
</div>
<?php    }
?>
</tr>


<?php $this->endWidget(); ?>   
</table>                       
<?php
$kra_cnt++;
} ?>
<?php   }
else
{ ?>
<div class="alert alert-info" style="margin-top: 10px;width: 99%;">
Midyear Review For goalsheet not updated.
</div>
<?php    }
?>
</div></div></div>  </div>
<div class="portlet box " style="background-color:#26466D;border:1px solid #26466D">
<div class="portlet-title">
<div class="caption">
Rating Of Qualitative Goals
</div>
<div class="tools">
<a href="javascript:;" class="collapse"></a>
</div>
</div>                                    
<div  class="portlet-body tabs-below">
<div class="tab-content">
<label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
<div style="border: 1px solid #26466D;margin-top: 20px;">
<?php 

if (isset($IDP_data) && count($IDP_data)>0)
{ 
$model1=new Yearend_reviewbForm;  
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
$list = array('Employee_id','goal_set_year');
$data = array(Yii::app()->user->getState("Employee_id"),'2017-2018');
$employee_review_data = $model1->get_employee_data($where,$data,$list);

?>
<table class="table table-fixed">

<tbody>
<tr>
<td  class=" bold bg" colspan="2">
Year-End Review (Part B) - To be filled by appraisee
</td>

</tr>
<tr >
<td class="color" colspan="2">
This form captures the <span style="font-weight: bold; text-decoration: underline;"> HOW </span>of performance and will be used to differentiate between 3, 4 and 5 ratings on the performance scale when such differentiation is not normally possible i.e. all the employees have performed equally well and manager has to make a tough choice to fit the employees on a bell curve


</td>
</tr>

<tr>
<td  class=" bold bg" colspan="2"> 
1. I feel my goals were very challenging and stretched because:<span style="color:red">*</span> <br>
<span style="font-weight: initial;color: #8d8c8c;">(In case if you have any document proof please use 'Upload' file button)</span>

<?php  
if(isset($employee_review_data['0']['proof_1']) && $employee_review_data['0']['proof_1'] != '')
{

?>
<div style="float:right">
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof_1']; ?>' target="_blank" download ><?php echo $employee_review_data['0']['proof_1']; ?></a>

<input id='yearb-proof_1' value="Delete" class="btn btn-danger del_yearb" style="float:right;margin-top: -7px;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
</div>
<?php } else
{

?>
<div class='uploaded_file1' style="float:right;display:none"><a href="" target="_blank" download class="link1"><lable id='uploaded_file1' ></lable></a>

<input id='uploaded_file1-1' value="Delete" class="btn btn-danger cancel_upload" style="margin-top: -5px;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
</div> 
<div class='uploaded_file1-1'>
<label id='proof_2' style="float:right">
</label><label  class="custom-file-input   file_change" id="file_change-1" style="width: 96px;float:right;margin-top:-26px" data-toggle="tooltip" data-placement="top" title="Maximum file size should be 5 MB">
<input class='proof_1' type="file"  name='proof_1' style="display: none" /></label>

</div>
<?php } ?>
</td>

<tr>
<td colspan="2">
<?php 
if (isset($employee_review_data) && count($employee_review_data)>0) {
    //echo "hjghj";die();
$employee_review1 = $employee_review_data['0']['employee_review1'];
$employee_review2 = $employee_review_data['0']['employee_review2']; 
$review1_example1 = $employee_review_data['0']['review1_example1'];
$review1_example2 = $employee_review_data['0']['review1_example2'];
$review2_example1 = $employee_review_data['0']['review2_example1'];                     
$review2_example2 = $employee_review_data['0']['review2_example2'];
}
else
{ 
$employee_review1 = '';
$employee_review2 = '';
$review1_example1 = '';
$review1_example2 = '';
$review2_example1 = '';                     
$review2_example2 = '';
}

if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textArea('employee_review1',$employee_review1,array('class'=>'form-control','id'=>'target1','disabled'=>'true',"maxlength"=>"1000"));
}
else
{ 
echo CHtml::textArea('employee_review1',$employee_review1,array('class'=>'form-control','id'=>'target1',"maxlength"=>"1000"));
}
?>

</td>
</tr>

<tr>
<td  class=" bold bg" colspan="2">
2. I have gone the extra mile to help my colleagues/team/organization by:<span style="color:red">*</span><br>
<span style="font-weight: initial;color: #8d8c8c;">(In case if you have any document proof please use 'Upload' file button)</span>


<?php
if(isset($employee_review_data['0']['proof_2']) && $employee_review_data['0']['proof_2'] != '')
{
?>
<div style="float:right">
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof_2']; ?>' target="_blank" download><?php echo $employee_review_data['0']['proof_2']; ?></a>

<!-- <i class="fa fa-times del_yearb" aria-hidden="true" style="color: red;cursor:pointer" id='yearb-proof_2'></i> -->
<input id='yearb-proof_2' value="Delete" class="btn btn-danger del_yearb" style="float:right;margin-top: -7px;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">

</div>
<?php }
else
{
?>
<div class='uploaded_file2' style="display:none;float:right;"><a href="" target="_blank" download class="link2"><lable id='uploaded_file2'></lable></a>

<input id='uploaded_file1-2' value="Delete" class="btn btn-danger cancel_upload" style="float:right;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">

</div>
<div class='uploaded_file1-2'>
<label  class="custom-file-input   file_change" id="file_change-2" style="width: 96px;float:right;margin-top:-30px" data-toggle="tooltip" data-placement="top" title="Maximum file size should be 5 MB">
<input class='proof_2' type="file"  name='proof_2' style="display: none" /></lable><label id='proof_2' style="float:right;">
</label>

</div>
<?php
}
?>
</td>                                               
<tr>
<td colspan="2">
<?php

if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textArea('employee_review2',$employee_review2,array('class'=>'form-control','id'=>'target2','disabled'=>'true',"maxlength"=>"1000"));
}
else
{
echo CHtml::textArea('employee_review2',$employee_review2,array('class'=>'form-control','id'=>'target2',"maxlength"=>"1000"));
}

?>
</td>
</tr>

<tr>
<td  class=" bold bg" colspan="2" >
3. I have lived the  <a href="<?php echo Yii::app()->request->baseUrl; ?>/upload/Vision_Mission_Values_Final.pdf" download="Vision Mission Values_Final.pdf"> VVF values </a>(Openness, Integrity, Respect, Trust, Innovation, Agility) in an exemplary fashion in the following way:<br>
<span style="font-weight: initial;color: #8d8c8c;">(In case if you have any document proof please use 'Upload' file button)</span>

<?php
if(isset($employee_review_data['0']['proof1']) && $employee_review_data['0']['proof1'] != '')
{
?>
<div style="float:right">
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof1']; ?>' target="_blank" download><?php echo $employee_review_data['0']['proof1']; ?></a>
<input id='yearb-proof1' value="Delete" class="btn btn-danger del_yearb" style="cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">

</div>
<?php }
else
{
?>
<div class='uploaded_file3' style="display:none;float:right;"><a href="" target="_blank" download class="link3"><lable id='uploaded_file3' style="margin-top:-18px"></lable></a>

<input id='uploaded_file1-3' value="Delete" class="btn btn-danger cancel_upload" style="float:right;margin-top: -5px;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
</div>
<div class='uploaded_file1-3'>
<label  class="custom-file-input   file_change" id="file_change-3" style="width: 96px;float: right;margin-top: -28px;" data-toggle="tooltip" data-placement="top" title="Maximum file size should be 5 MB">
<input class='proof1' type="file"  name='proof1' style="display: none" />
</div>
<?php
} ?>




</td>

<tr>
<tr <?php if(isset($employee_review_data['0']['proof1']) && $employee_review_data['0']['proof1'] != '') { ?>style="display:block"<?php }else { ?>style="display:none"<?php } ?>>



</tr>
<tr>
<td  class="color " colspan="2">
Please give at least 1 example but not more than 2 examples that are meaningful. These examples can be of the same value or of different values. Not the number of examples that matter but the <span style="font-weight: bold; font-style: italic;"> impact </span> created by living that value that matters.
</td>

<tr>
<tr>
<td  class="color italic" colspan="2">
e.g. I proactively created a process for updating clients on weekly basis which increased client satisfaction (Innovation)
</td>

<tr>
<tr>
<td class=" bold">
Example:1 <span style="color:red">*</span>
</td>
<td class="col-md-10">
<?php

if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textArea('review1_example1',$review1_example1,array('class'=>'form-control','id'=>'text1','disabled'=>'true',"maxlength"=>"1000"));
}
else
{
echo CHtml::textArea('review1_example1',$review1_example1,array('class'=>'form-control','id'=>'text1',"maxlength"=>"1000"));
}

?>
</td>
</td >
</tr>   
<tr>
<td class="bold">
Example:2
</td>
<td class="col-md-10">
<?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textArea('review1_example2',$review1_example2,array('class'=>'form-control','id'=>'text2','disabled'=>'true',"maxlength"=>"1000"));
}
else
{
echo CHtml::textArea('review1_example2',$review1_example2,array('class'=>'form-control','id'=>'text2',"maxlength"=>"1000"));
}

?>
</td>
</td>
</tr>

<td  class=" bold bg" colspan="2" >
4. I have demonstrated the <a href="<?php echo Yii::app()->request->baseUrl; ?>/upload/VVF_Leadership_Framework.pdf" download="VVF Leadership Framework.pdf">VVF leadership competencies </a>(Teamwork, Customer Orientation, Result Orientation, Developing self and team, Strategic thinking, Ownership and accountability)  in the following way:<br>
<span style="font-weight: initial;color: #8d8c8c;">(In case if you have any document proof please use 'Upload' file button)</span>

<?php
if(isset($employee_review_data['0']['proof2']) && $employee_review_data['0']['proof2'] != '')
{
?>
<div style="float:right">
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof2']; ?>' target="_blank" download><?php echo $employee_review_data['0']['proof2']; ?></a>

<!-- <i class="fa fa-times del_yearb" aria-hidden="true" style="color: red;cursor:pointer" id='yearb-proof2'></i> -->
<input id='yearb-proof2' value="Delete" class="btn btn-danger del_yearb" style="float:right;margin-top: -7px;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
</div>
<?php }
else
{
?>
<div class='uploaded_file4' style="display:none;float:right"><a href="" target="_blank" download class="link4"><lable id='uploaded_file4' ></lable></a>
<!--   <lable id='uploaded_file1-4' style="cursor:pointer" class="cancel_upload">
<i class="fa fa-times" aria-hidden="true" style="margin-left: 11px;font-size: 21px;color: red;float:right"></i>
</lable> -->
<input id='uploaded_file1-4' value="Delete" class="btn btn-danger cancel_upload" style="float:right;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
</div>
<div class='uploaded_file1-4'>
<label id='proof2' style="float:right;display:none">
</label>     <label  class="custom-file-input   file_change" id="file_change-4" style="width: 96px;float: right;margin-top:-28px" data-toggle="tooltip" data-placement="top" title="Maximum file size should be 5 MB">
<input class='proof2' type="file"  name='proof2' style="display: none" /> 
</div> 
<?php
} ?>                  
</td>

</tr>
<tr <?php if(isset($employee_review_data['0']['proof2']) && $employee_review_data['0']['proof2'] != '') { ?>style="display:block"<?php }else { ?>style="display:none"<?php } ?>>



</tr>
<tr>
<td  class="color " colspan="2">
Please give at least 1 example but not more than 2 examples that are meaningful. These examples can be of the same value or of different values. Not the number of examples that matter but the <span style="font-weight: bold; font-style: italic;"> impact </span> created by living that value that matters.
</td>

</tr>
<tr>
<td  class="color italic" colspan="2">
e.g. Successfully arranged a session between IT team and production team that increased practical knowledge of MM module, thus reducing time required for system related process (teamwork, developing self and team)
</td>

</tr>
<tr>
<td class=" bold">
Example:1 <span style="color:red">*</span>
</td>
<td class="col-md-10">
<?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textArea('review2_example1',$review2_example1,array('class'=>'form-control','id'=>'text3','disabled'=>'true',"maxlength"=>"1000"));
}
else
{
echo CHtml::textArea('review2_example1',$review2_example1,array('class'=>'form-control','id'=>'text3',"maxlength"=>"1000"));
}

?>
</td>
</td >
</tr>   
<tr>
<td class="bold">
Example:2
</td>
<td class="col-md-10">
<?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textArea('review2_example2',$review2_example2,array('class'=>'form-control','id'=>'text4','disabled'=>'true',"maxlength"=>"1000"));
}
else
{
echo CHtml::textArea('review2_example2',$review2_example2,array('class'=>'form-control','id'=>'text4',"maxlength"=>"1000"));
}

?>
</td>
</tr>

</tbody>
</table>
<?php }else { ?>
<div class="alert alert-info"  style="margin-top: 10px;width: 99%;">
Midyear Review For IDP & goalsheet not updated.
</div>
<?php } ?>

</div></div></div>  </div>
<div class="portlet box " style="background-color:#26466D;border:1px solid #26466D">
<div class="portlet-title">
<div class="caption">
Completion Of IDP
</div>
<div class="tools">
<a href="javascript:;" class="collapse"></a>
</div>
</div>                                    
<div  class="portlet-body tabs-below">
<div class="tab-content">
<label id="kra_count" style="display: none"><?php echo count($kpi_data);  ?></label>
<div style="border: 1px solid #26466D;margin-top: 20px;padding-left: 10px">

<?php

if (isset($IDP_data) && count($IDP_data)>0)
{ 
?>
<div class="row">
<div class="col-md-12" style="padding-left: 5px;">
<!-- BEGIN PORTLET-->
<div class="portlet light form-fit" id="refresh_class">
<div class="portlet-title">
<div class="caption">

<span class="caption-subject bold uppercase" style="color:#26466D;">IDP</span>
</div>
<lable id="compare_designation" style="display: none"><?php if(isset($designation_flag)) { echo $designation_flag; } ?></lable>
</div>
<lable id="Reporting_officer1_id" style="display: none">
<?php  if(isset($emp_data)&& count($emp_data)>0){
echo trim($emp_data[0]['Reporting_officer1_id']);   }?> 
</lable>
<lable id="emp_code" style="display: none">
<?php  if(isset($emp_data)&& count($emp_data)>0){
echo trim($emp_data[0]['Employee_id']);   }?> 
</lable>
<div class="portlet-body form">
<!-- BEGIN FORM-->
<form action="#" id="form-username" class="form-horizontal form-bordered">
<div class="form-body">
<div class="form-group ">
<div class="col-md-2"><label>
<span class="bold">Employee Name</span></label>
</div>
<div class="col-md-4">
<label > <?php 
if(isset($emp_data)&& count($emp_data)>0){
echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
} ?></label>
   

</div>
<div class="col-md-2"><label >
<span class="bold">Manager’s name</span></label>
</div>
<div class="col-md-4">
<label ><?php if(isset($mgr_data) && count($mgr_data)>0){
echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
?></label>
</div>
</div>
<div class="form-group">
<div class="col-md-2"><label >
<span class="bold">Employee Code</span></label>
</div>
<div class="col-md-4">                                                        
<label > <?php  if(isset($emp_data)&& count($emp_data)>0){
echo $emp_data[0]['Employee_id'];   }?> </label>
</div>

<div class="col-md-2"><label >
<span class="bold">Date</span></label></div>

<div class="col-md-4">
<label ><?php 
$today = date('d-m-Y'); 
echo $today;?></label>

</div>
</div>

<div class="portlet light form-fit ">
<div class="portlet-title">
<div class="caption">

<span class="caption-subject  bold uppercase" style="color:#26466D;font-size: 12px;">Please discuss your strengths and work related weaknesses with your manager and identify your training needs. Your development will happen through the following ways:</span><br><br>                                                
<span style="color:#26466D;font-size: 14px;" class="bold"><lable style="color: red">*</lable>Mandatory for all employees to attend this program
<br><lable style="color: red">**</lable>Mandatory for employees working at locations covered by the certifications</span>
</div>
</div>
<div class="form-group">

<div style="height: 43px;background-color: #26466D;
width: 100%;">&nbsp;&nbsp;
<span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part A: Development through Instructor led training in Classroom</span><br>
</div>
</div>
<div class="portlet-body form">
<!-- BEGIN FORM-->
<form action="#" class="form-horizontal form-bordered">
<div class="form-body">
<label id="total_prog" style="display:none"><?php  

if(isset($program_data_result) && count($program_data_result)>0) { 
    echo count($program_data_result);
}  ?></label>

<table class="table table-bordered table-hover" id="maintable">
<thead>
<th>Name of program</th>
<th>Faculty</th>
<th>Days</th>                                        
<th>Please explain why the training is needed</th>
<th>Program completed</th>
<!--   <th>Review</th> -->
<th>Comments</th>
</thead>
<tbody>
<?php 
$compulsory = '';$program_state = '';$program_cmnt = '';$state = 0;$review_state = '';$program_state1 = '';$not_undefine = '';$prg_list = '';

if (isset($program_data_result) && count($program_data_result)>0) 
{
for ($i=0; $i <count($program_data_result); $i++) 
{
$cmnt = '';
    if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment']) && $IDP_data['0']['program_comment'] != '') {
       
    $cmt2 = explode(';', $IDP_data['0']['program_comment']);    

        for ($j=0; $j < count($cmt2); $j++) 
        {
            $cmt1 = explode('?', $cmt2[$j]);
            //print_r($cmt1);die();
                if (isset($cmt1[0]) && isset($cmt1[1]) && $i == $cmt1[0]) {                                                            
                    $cmnt = $cmt1[1];
                }
        }
    }
    else
    {

    $cmnt = '';

    }

    if (isset($IDP_data['0']['mid_prgrm_cmd']) && $IDP_data['0']['mid_prgrm_cmd'] != '') 
    {

        //print_r($IDP_data['0']['mid_prgrm_cmd']);die();
        $program_state = explode(';',$IDP_data['0']['mid_status']);
        $program_cmnt = explode(';',$IDP_data['0']['mid_prgrm_cmd']);

        if (isset($program_cmnt[$state])) 
        { 
                //echo "if";die();
                $review_state = $program_cmnt[$state];
                $program_state1 = $program_state[$state]; 
        } 
    } 
    else{ 
       // echo "ifff";die();
        $review_state = '';
        $program_state1 = ''; 
    }  

    if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] != 0) 
    { 

        if ($compulsory == '') 
        { 
           
            $compulsory= $i; 
           
        } 
        else { 
            $compulsory = $compulsory.';'.$i; 

        } 
    }

    if (isset($IDP_data['0']['Year_end_prg_status']) && isset($IDP_data['0']['Year_end_prg_comments']) && $IDP_data['0']['Year_end_prg_comments'] != '' && $IDP_data['0']['Year_end_prg_status'] != '') 
    { 
        //echo "if";die();
        
        $year_program_state = explode('^',$IDP_data['0']['Year_end_prg_status']);
        $year_program_cmnt = explode('^',$IDP_data['0']['Year_end_prg_comments']);
        if (isset($year_program_cmnt[$state]) && isset($year_program_state[$state])) 
        {
            $year_review_state = $year_program_cmnt[$state];
            $year_program_state1 = $year_program_state[$state];
        }

    }
    else
    {
        //echo "ifff";die();

        $year_review_state = '';
        $year_program_state1 = '';
    }   


    if ($cmnt != '' && $cmnt != 'undefined') 
    {
        

        if($prg_list == '')
        {
            

            $prg_list = $i;
        }
        else
        {
         
           $prg_list = $prg_list.';'.$i;
        } 
    ?>

    <tr class="error_row_chk">                                                               
        <td class="prog_name" id="<?php echo $i; ?>"> 
            <?php if(isset($program_data_result[$i]['program_name'])) { echo $program_data_result[$i]['program_name']; } ?>
             <?php if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) { ?>
                <label style="color: red">*</label>
             <?php }
             else if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2) { ?>
                <label style="color: red">**</label><?php } ?>
         </td>
        <td> 
            <?php if(isset($program_data_result[$i]['faculty_name'])) { echo $program_data_result[$i]['faculty_name']; } 
// print_r($program_data_result);die();
            ?> 
        </td>
        <td> 
            <?php if(isset($program_data_result[$i]['training_days'])) { echo $program_data_result[$i]['training_days']; } ?> 
        </td>
        <td>
        <?php 
            echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 validate_field program_cmd",'id'=>'program_cmd-'.$i,'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
       
        ?> 
        </td>


        <td>
            <div id="yearAcompleteion_type_sta<?php echo $i; ?>"> 
                <input type="radio" name='yearAcompleteion_type1<?php echo $i; ?>' 
                <?php 
                if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
                    { ?>
                        disabled="true"
              <?php } ?> 
              value="Yes" id='yearAcompleteion_type<?php echo $i; ?>' class='yearAcompleteion_type<?php echo $i; ?>  yearA_comp' 
              <?php if(isset($year_program_state1) && $year_program_state1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
        <input type="radio" <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
        { ?>disabled="true"<?php } ?> name='yearAcompleteion_type1<?php echo $i; ?>' value="No" id='yearAcompleteion_type<?php echo $i; ?>' class='yearAcompleteion_type<?php echo $i; ?> yearA_comp' <?php if(isset($year_program_state1) && $year_program_state1 == 'No') { ?>checked='check'<?php } ?>>No

        </div></td>


        <td  style="display:none">
        <?php 
        echo CHtml::textField('program_review',$review_state,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_review",'id'=>'program_review-'.$i,'disabled'=> "true",'style'=>'display:none'));
        ?> </td>

        <td >
        <?php 
        if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
        {
            if(isset($year_review_state) && $year_review_state !='' && $year_review_state!= "undefined"){
                //echo "if1";die();
                echo CHtml::textField('yearAprogram_cmd',$year_review_state,$htmlOptions=array('maxlength'=>1000,'class'=>"form-control validate_field col-md-4 program_cmd",'id'=>'yearAprogram_cmd-'.$i,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled'=> "true"));
            }
            else{
                //echo "else1";die();
                echo CHtml::textField('yearAprogram_cmd','',$htmlOptions=array('maxlength'=>1000,'class'=>"form-control validate_field col-md-4 program_cmd",'id'=>'yearAprogram_cmd-'.$i,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled'=> "true"));
            }
        
        }
        else
        {
            if(isset($year_review_state) && $year_review_state !='' && $year_review_state!= "undefined" ){
            //echo "if2";echo $year_review_state;die();
             echo CHtml::textField('yearAprogram_cmd',$year_review_state,$htmlOptions=array('maxlength'=>1000,'class'=>"form-control validate_field col-md-4 program_cmd",'id'=>'yearAprogram_cmd-'.$i,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
        }
            else{
                //echo "else2";die();
                echo CHtml::textField('yearAprogram_cmd','' ,$htmlOptions=array('maxlength'=>1000,'class'=>"form-control validate_field col-md-4 program_cmd",'id'=>'yearAprogram_cmd-'.$i,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
            }
        }
        ?> </td> 
    </tr>
    <?php 
    $not_undefine++;
    $state++;
}
}
}
?>
<label id="program_count" style="display: none"><?php if(isset($not_undefine)) { echo $not_undefine; } ?></label>
<label id="compulsory_id" style="display: none"><?php if(isset($compulsory)) { echo $compulsory; } ?></label>
<label id="prg_list_defined" style="display:none"><?php if(isset($prg_list)) { echo $prg_list; }  ?></label>
</tbody>

</table>     
</div>
<div class="form-group error_row_chk2">
<label class="col-md-12 control-label">
<span style="color:#26466D;font-size: 14px;float: left;" class="bold">If you need a program that is not mentioned above, please use the space below. Please note this program may be offered if at least 20 people request for it. 
</span></label>
<br>
</div>
<?php
$count = '';$count_value = '';
$extra_prgrm_cmd = '';$extra_program_status = '';$extra_prgrm_cmd1 = '';$extra_program_status1 = ''; 
$extra_program_status2 = ''; $extra_program_status3 = '';$rel_prgrm_cmd1 = '';$rel_prgrm_cmd2 = '';$year_extra_prg_stat='';
$year_extra_prg_comt='';$year_rel_prg_stat='';$year_rel_prg_comt='';$extra_list = '';
if (isset($IDP_data) && $IDP_data !='' && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic']) && $IDP_data['0']['extra_topic']!='' ) {

 //   echo "lllll";die();
$count = explode(';',$IDP_data['0']['extra_topic']);


?>
<div class="form-group">                                                         
<div class="col-md-4 bold">
Topics required
</div>
<div class="col-md-2 bold">No. of days</label></div>
<div class="col-md-2 bold">
Internal faculty name
</div>

<div class="col-md-2 bold">
Year End Review
</div>
<div class="col-md-2 bold">
Year End Review Comments
</div>


</div>
<?php 
//  echo $extra_list;die();
$extra_prgrm_cmd = '';$extra_program_status = '';$extra_prgrm_cmd1 = '';$extra_program_status1 = ''; $extra_program_status2 = ''; $extra_program_status3 = '';$rel_prgrm_cmd1 = '';$rel_prgrm_cmd2 = '';$year_extra_prg_stat='';$year_extra_prg_comt='';$year_rel_prg_stat='';$year_rel_prg_comt='';$extra_list = '';

if ($count !='') {
for ($m=0; $m < count($count); $m++) {  

if ($count[$m] != 'undefined') {
$count_value++;
if(isset($IDP_data['0']['extra_topic'])){
$topic1 = explode(';',$IDP_data['0']['extra_topic']);
}
if(isset($IDP_data['0']['extra_days'])){
$day1 = explode(';',$IDP_data['0']['extra_days']);
}
if(isset($IDP_data['0']['extra_faculty'])){
$faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
}


if(isset($IDP_data['0']['extra_prgrm_cmd'])){
$faculty2 = explode(';',$IDP_data['0']['extra_prgrm_cmd']);
}
if(isset($IDP_data['0']['extra_program_status'])){
$faculty2 = explode(';',$IDP_data['0']['extra_program_status']);
}
if(isset($IDP_data['0']['rel_program_review_status'])){
$faculty2 = explode(';',$IDP_data['0']['rel_program_review_status']);
}
if(isset($IDP_data['0']['rel_program_review'])){
$faculty2 = explode(';',$IDP_data['0']['rel_program_review']);
}
if(isset($IDP_data['0']['Extra_year_end_prg_status'])){
$faculty2 = explode(';',$IDP_data['0']['Extra_year_end_prg_status']);
}
if(isset($IDP_data['0']['Extra_year_end_prg_comments'])){
$faculty2 = explode(';',$IDP_data['0']['Extra_year_end_prg_comments']);
}
// $extra_prgrm_cmd = explode(';',$IDP_data['0']['extra_prgrm_cmd']);
// $extra_program_status = explode(';',$IDP_data['0']['extra_program_status']);
// $rel_program_status2 = explode(';',$IDP_data['0']['rel_program_review_status']);
// $rel_program_status3 = explode(';',$IDP_data['0']['rel_program_review']);
// $year_extra_prg_stat=explode('^', $IDP_data['0']['Extra_year_end_prg_status']);
// $year_extra_prg_cmt=explode('^', $IDP_data['0']['Extra_year_end_prg_comments']);

if($extra_list == '')
{
$extra_list = $m;
}
else
{
$extra_list = $extra_list.';'.$m;
} 


if (isset($extra_prgrm_cmd[$m])) {
$extra_prgrm_cmd1 = $extra_prgrm_cmd[$m];
}
else
{
$extra_prgrm_cmd1 = '';
}
if (isset($extra_program_status[$m])) {
$extra_program_status1 = $extra_program_status[$m];
}
else
{
$extra_program_status1 = '';
}
if (isset($rel_program_status2[0]) || $rel_program_status2[0]!=''  ) {
// echo $rel_program_status3[0];die();
$extra_program_status2 = $rel_program_status2[0];
// $rel_prgrm_cmd1 = $rel_program_status3[0];
}
else
{
// echo "hiiii";die();
$extra_program_status2 = '';
//    $rel_prgrm_cmd1 = '';
}

if (isset($rel_program_status3[0]) || $rel_program_status3[0]!=''  ) {
// echo $rel_program_status3[0];die();
//$extra_program_status2 = $rel_program_status2[0];
$rel_prgrm_cmd1 = $rel_program_status3[0];
}
else
{
// echo "hiiii";die();
// $extra_program_status2 = '';
$rel_prgrm_cmd1 = '';
}

if (isset($rel_program_status2[1])) {
$extra_program_status3 = $rel_program_status2[1];

}
else
{
$extra_program_status3 = '';

}
if (isset($rel_program_status3[1])) {

$rel_prgrm_cmd2 = $rel_program_status3[1];
}
else
{

$rel_prgrm_cmd2 = '';
}

if (isset($year_extra_prg_stat[$m])) {

$year_extra_prg_stat = $year_extra_prg_stat[$m];

}
else
{
$year_extra_prg_stat = '';
}        
if (isset($year_extra_prg_cmt[$m])) {

$year_extra_prg_comt = $year_extra_prg_cmt[$m];

}
else
{
$year_extra_prg_comt = '';
}  


?>
<div class="form-group">

<div class="col-md-4">
<?php 
$topic = '';$day = '';$faculty = '';
$topic = $topic1[$m];                                                                
$day = $day1[$m];                         
$faculty[$faculty2[$m]] = array('selected' => 'selected');
echo CHtml::textField('topic'.$m,$topic,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 validate_field topic".$m,'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?> 
</div>
<div class="col-md-2">
<?php 
echo CHtml::textField('days_required'.$m,$day,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 days_required".$m,'disabled'=> "true")); ?> 
</div>
<div class="col-md-2">
<?php 
$reporting_list = new EmployeeForm();
$records = $reporting_list->get_appraiser_list1();
for ($k=0; $k < count($records); $k++) { 
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($records[$k]['Email_id']);
$Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
}
$Cadre_id = array(); 
if (isset($Reporting_officer_data)) 
{
for ($l=0; $l < count($Reporting_officer_data); $l++) { 
if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
$Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].'?'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
}

}
}
echo CHtml::DropDownList('faculty_email_id'.$m,'faculty_email_id1',$Cadre_id,array('class'=>'form-control faculty_email_id'.$m,'empty'=>'Select','options' => $faculty,'disabled'=> "true")); ?>
</div>

<div class="col-md-2 ">
<div id="yearAextraprgSta_<?php echo $m; ?>"><input type="radio" <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{ ?>disabled="true"<?php } ?> name='yearAextra_prg1<?php echo $m; ?>'  value="Yes" class='yearAextraprg_<?php echo $m; ?>' <?php if($year_extra_prg_stat == 'Yes') { ?>checked='check'<?php } ?>>Yes
<input type="radio"  name='yearAextra_prg1<?php echo $m; ?>' value="No" <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-M-d'))>strtotime($settings_data_new['0']['setting_type']))
{ ?>disabled="true"<?php } ?> class='yearAextraprg_<?php echo $m; ?>' <?php if($year_extra_prg_stat == 'No') { ?>checked='check'<?php } ?>>No</div></div>
<div class="col-md-2 "> <?php 
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textField('yearAextraprogram_cmt',$year_extra_prg_comt,$htmlOptions=array('maxlength'=>1000,'class'=>"form-control validate_field  col-md-4 program_cmd",'id'=>'yearAextraprogram_cmt-'.$m,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled'=> "true"));
}
else
{
echo CHtml::textField('yearAextraprogram_cmt',$year_extra_prg_comt,$htmlOptions=array('maxlength'=>1000,'class'=>"form-control validate_field  col-md-4 program_cmd",'id'=>'yearAextraprogram_cmt-'.$m,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
?></div>
<!---written on 24 jan-->

</div>


<?php    }
}
}
}
?>

<label id="program_count" style="display: none"><?php if(isset($not_undefine)) { echo $not_undefine; } ?></label>
<label id="ext_program_count" style="display: none"><?php if(isset($extra_list)) { echo $extra_list; } ?></label>
</div>
<div id="new_topic">
</div>
<div class="form-group">
<div class="col-md-12 bold">
<?php
if(isset($IDP_data) && count($IDP_data)>0 && $IDP_data['0']['set_status']!='Approved')
{ ?>

<?php  }
?>    
</div>
<lable id="extra_program_count"  style="color: red;float: right;display: none"><?php echo $count_value; ?>
</lable></div>
</div>
</form>
<!-- END FORM-->
</div>
</div>
</form>
<!-- END FORM-->
</div>
</div></div>
<!-- END PORTLET-->

<div class="row">
<div class="col-md-12" style="padding-left: 5px;">
<!-- BEGIN PORTLET-->
<div class="portlet light form-fit error_row_chk1" style="margin:0px" >
<div class="portlet-body form">
<form action="#" id="form-username" class="form-horizontal form-bordered" style="margin-bottom:0px" >
<div class="form-group">
<div class="col-md-12">

<label class="col-md-12 control-label" style="text-align:left;"><span class="bold" style="color:#26466D;font-size: 14px;float: left;">
Note: Part B and Part C are to be filled by only AGM and above employees.     
</span>
</label>
</div>
<div style="height: 43px;background-color: #26466D;margin-top: 63px;
width: 100%;">&nbsp;&nbsp;
<span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part B: Development through developmental relationships</span><br>
</div>
</div>
<div class="form-group">
<div class="col-md-2 bold" >Relationship</div>
<div class="col-md-2 bold" >Name of leader</div>
<div class="col-md-2 bold" >Number of Meetings planned
</div>
<div class="col-md-2 bold" >Target date</div>
<div class="col-md-2 bold" >Program Status</div>
<div class="col-md-2 bold" >Review</div>
</div>
<style type="text/css">
/*.input-medium
{
width: 176px !important;
}
}*/
</style>
<div class="form-group">
<label class="control-label col-md-2"  style="text-align: left;">Coaching through leader in own function for functional inputs</label>
<div class="col-md-2">
<?php 
$faculty3 = '';
if (isset($IDP_data['0']['leader_name'])) {
$faclty = explode(';',$IDP_data['0']['leader_name']);
if (isset($faclty[0])) {
$faculty3 = $faclty[0];
}

}


echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('class'=>"form-control validate_field col-md-2 faculty_email_id3 fac_emp_id0",'id'=>'faculty_email_id3 ','disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
?>
</div>
<div class="col-md-2">

<?php 
$meet = '';
if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
//$meet = explode(';',$IDP_data['0']['meeting_planned


     $meet = explode(';',$IDP_data['0']['meeting_planned']);
                                                                $meet = $meet[0];
                                                              }
                                                              else
                                                              {
                                                                $meet = '';
                                                              }
                                                              echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('class'=>"form-control col-md-2 number_of_meetings3",'id'=>'number_of_meetings3','disabled'=> "true")); 
                                                              ?> 
                                                                 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group input-medium date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
                                                            <?php
                                                                    if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); 

  ?>
                                                                       <input class="form-control target_date3" readonly="" type="text" value="<?php echo $rel2[0]; ?>"  id="target_date3" style="width:101px;">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date3" readonly="" type="text"  id="target_date3" style="width:101px;">
                                                                 <?php   }
                                                                ?>
                                                                
                                                            </div>
                                                        </div>
                                                        
<div class="col-md-2 ">

<?php  
$year_rel_prg_stat=array();
$year_rel_prg_cmt=array();
$year_rel_prg_stat=explode('^', $IDP_data['0']['Relationship_year_end_status']);
$year_rel_prg_cmt=explode('^', $IDP_data['0']['Relationship_year_end_comments']); 
     ?>
<div id="yearArel_prgsta0">
<input type="radio" <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ ?>disabled="true"<?php } ?> name='yearArel_prg0'  value="Yes" class='yearArel_prg0' <?php if(isset($year_rel_prg_stat)&&$year_rel_prg_stat[0]=="Yes") { ?> checked='check' <?php } ?> >Yes
<input type="radio" <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ ?>disabled="true"<?php } ?> name='yearArel_prg0' value="No" class='yearArel_prg0'  <?php if(isset($year_rel_prg_stat)&&$year_rel_prg_stat[0]=="No"){ ?> checked='check' <?php } ?> >No</div></div>


                                                  <div class="col-md-2">
                                                    <?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
echo CHtml::textArea('yearArel_program_review0',$year_rel_prg_cmt[0],$htmlOptions=array('class'=>"form-control validate_field col-md-2 yearArel_program_review",'id'=>'yearArel_program_review0','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000",'disabled'=> "true"));
}
else
{
echo CHtml::textArea('yearArel_program_review0',$year_rel_prg_cmt[0],$htmlOptions=array('class'=>"form-control validate_field col-md-2 yearArel_program_review",'id'=>'yearArel_program_review0','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}

                                                    ?>
                                                  </div>
                                                  <!--written on 24 jan-->
                                                    </div>

                                                    <div class="form-group">                                                        
                                                        <label class="control-label col-md-2"  style="text-align: left;">Mentoring through leader from different function for behavioural inputs</label>
                                                        <div class="col-md-2">
                                                            <?php 
                                                            $faculty4 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[1])) {
                                                                $faculty4 = $faclty[1];
                                                              }
                                                              
                                                            }
                                                            
                                                            echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('class'=>"form-control validate_field col-md-2 faculty_email_id4 fac_emp_id1",'id'=>'faculty_email_id4 ','disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                             ?>
                                                          </div>
                                                       <div class="col-md-2">
                                                           <?php 
                                                           $meet = '';
                                                          if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                                                            $meet = explode(';',$IDP_data['0']['meeting_planned']);
                                                            $meet = $meet[1];
                                                          }
                                                          else
                                                          {
                                                            $meet = '';
                                                          }
                                                          echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('class'=>"form-control col-md-2 number_of_meetings4",'id'=>'number_of_meetings4','disabled'=> "true")); ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group input-medium date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date4" readonly="" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" style="width: 101px;" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date4" readonly="" type="text"  id="target_date4" style="width: 101px;" disabled="true">
                                                                 <?php   }
                                                                ?>
                                                                
                                                               
                                                            </div>
                                                        </div>
                                                         
<div class="col-md-2 ">
<div id="yearArel_prgsta1">
<input type="radio" name='yearArel_prg1' <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ ?>disabled="true"<?php } ?> value="Yes" class='yearArel_prg1'<?php if(isset($year_rel_prg_stat[1])&&$year_rel_prg_stat[1]=="Yes") { ?> checked='check' <?php } ?> >Yes
<input type="radio"  name='yearArel_prg1' <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ ?>disabled="true"<?php } ?> value="No" class='yearArel_prg1'<?php if(isset($year_rel_prg_stat[1])&&$year_rel_prg_stat[1]=="No") { ?> checked='check' <?php } ?> >No</div>
</div>

                                                          <!---written on 24 jan-->
                                                        <!--written on 24 jan-->
                                                        <div class="col-md-2">
                                                    <?php

if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
if(isset($year_rel_prg_cmt[1]) && $year_rel_prg_cmt[1]!=""){
  echo CHtml::textArea('yearArel_program_review1',$year_rel_prg_cmt[1],$htmlOptions=array('class'=>"form-control validate_field col-md-2 yearArel_program_review",'id'=>'yearArel_program_review1','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000",'disabled'=>'true'));
}
else{
  echo CHtml::textArea('yearArel_program_review1','',$htmlOptions=array('class'=>"form-control validate_field col-md-2 yearArel_program_review",'id'=>'yearArel_program_review1','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000",'disabled'=>'true'));
}
}
else
{
if(isset($year_rel_prg_cmt[1]) && $year_rel_prg_cmt[1]!=""){
  echo CHtml::textArea('yearArel_program_review1',$year_rel_prg_cmt[1],$htmlOptions=array('class'=>"form-control validate_field col-md-2 yearArel_program_review",'id'=>'yearArel_program_review1','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}
else{
  echo CHtml::textArea('yearArel_program_review1','',$htmlOptions=array('class'=>"form-control validate_field col-md-2 yearArel_program_review",'id'=>'yearArel_program_review1','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom","maxlength"=>"1000"));
}
}

                                                    ?>
                                                  </div>
                                                 
                                                    </div>



                                                 <div class="form-group">                                                      
                                                    <div style="height: 43px;background-color: #26466D;margin-top: 63px;
                                                    width: 100%;">&nbsp;&nbsp;
                                                    <span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part C: Development through action learning projects</span><br>
                                                    </div>
                                                   </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Project Title</label>
                                                    <div class="col-md-9">
                                                     <?php 
                                                     $project_title = '';
                                                        if (isset($IDP_data['0']['project_title'])) {
                                                          $project_title = $IDP_data['0']['project_title'];
                                                        }
                                                        else
                                                        {
                                                          $project_title = '';
                                                        }
                                                        echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('maxlength'=>80,'class'=>"form-control validate_field col-md-4 project_title1",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?>    
                                                    </div>
                                                </div>
                                                <div class="form-group last" style="border-bottom:1px solid #efefef">
                                                    <label class="col-md-3 control-label bold">Review date</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group input-medium date review_date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                         <?php
                                                                  if (isset($IDP_data['0']['project_review_date'])) { ?>
                                                                       <input class="form-control" readonly="" type="text" value="<?php echo $IDP_data['0']['project_review_date']; ?>" id="review_date">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control" readonly="" type="text" id="review_date">
                                                                 <?php   }
                                                                ?>
                                                               
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Target end date</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group input-medium date target_end_date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                <?php
                                                                  if (isset($IDP_data['0']['project_end_date'])) { ?>
                                                                       <input class="form-control" readonly="" type="text" value="<?php echo $IDP_data['0']['project_end_date']; ?>" id="target_end_date" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control" readonly="" type="text" id="target_end_date" disabled="true">
                                                                 <?php   }
                                                                ?>
                                                               
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="form-group last" style="border-bottom:1px solid #efefef">
                                                    <label class="col-md-3 control-label bold">Project scope</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_scope = '';
                                                        if (isset($IDP_data['0']['project_scope'])) {
                                                          $project_scope = $IDP_data['0']['project_scope'];
                                                        }
                                                        else
                                                        {
                                                          $project_scope = '';
                                                        }
                                                        echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('class'=>"form-control col-md-4 validate_field project_scope",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?> 
                                                    </div>
                                                </div>

                                                <div class="form-group last" style="border-bottom:1px solid #efefef">
                                                    <label class="col-md-3 control-label bold ">Project exclusions</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_exclusion = '';
                                                        if (isset($IDP_data['0']['project_exclusion'])) {
                                                          $project_exclusion = $IDP_data['0']['project_exclusion'];
                                                        }
                                                        else
                                                        {
                                                          $project_exclusion = '';
                                                        }
                                                        echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('class'=>"form-control col-md-4 validate_field project_exclusion",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?> 
                                                    </div>
                                                </div>                                                
                                                
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                <div class="col-md-12" style="padding-left:5px">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit ">
                                        <div class="portlet-body form">
                                            <form action="#" id="form-username" class="form-horizontal form-bordered">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Project deliverables (Target at rating 3: good solid performance)</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                         $Project_deliverables = '';
                                                        if (isset($IDP_data['0']['Project_deliverables'])) {
                                                          $Project_deliverables = $IDP_data['0']['Project_deliverables'];
                                                        }
                                                        else
                                                        {
                                                          $Project_deliverables = '';
                                                        }
                                                        echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('class'=>"form-control col-md-4 project_deliverables",'disabled'=> "true","maxlength"=>"1000")); ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group last" style="border-bottom:1px solid #efefef">
                                                    <label class="col-md-3 control-label bold">What is the employee expected to learn from this project</label>
                                                    <div class="col-md-9">
                                                       <?php 
                                                       $expected = '';
                                                        if (isset($IDP_data['0']['learn_from_project'])) {
                                                          $expected = $IDP_data['0']['learn_from_project'];
                                                        }
                                                        else
                                                        {
                                                          $expected = '';
                                                        }
                                                       echo CHtml::textArea('exp',$expected,$htmlOptions=array('class'=>"form-control col-md-4 learn_from",'disabled'=> "true","maxlength"=>"1000")); ?>  
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Reviewer(s) name</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $review_name = '';
                                                        if (isset($IDP_data['0']['Reviewer'])) {
                                                          $review_name = $IDP_data['0']['Reviewer'];
                                                        }
                                                        else
                                                        {
                                                          $review_name = '';
                                                        }
                                                        echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 validate_field reviewvers_name",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?> 
                                                    </div>
                                                </div>
                                              
<div class="form-group">
<label class="col-md-3 control-label bold ">Project Status</label>
<div class="col-md-2">
<select id="yearA_project_status"  class="form-control " <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{?>disabled="true"<?php } ?>>
<option>Select</option>
<option <?php  if(isset($IDP_data[0]['Year_end_prog_status'])&& $IDP_data[0]['Year_end_prog_status']== "Completed"){ ?> selected<?php }?>>Completed</option>
<option<?php  if(isset($IDP_data[0]['Year_end_prog_status'])&& $IDP_data[0]['Year_end_prog_status']== "Not Completed"){ ?> selected<?php }?>>Not Completed</option>
<option<?php  if(isset($IDP_data[0]['Year_end_prog_status'])&& $IDP_data[0]['Year_end_prog_status']== "Not Applicable"){ ?> selected<?php }?>>Not Applicable</option>
</select>
</div>
</div>   
<div class="form-group">
<label class="col-md-3 control-label bold ">Project Status Comments</label>
<div class="col-md-9">

<?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
?>
<textarea class="form-control validate_field" id="yearA_prj_stat_comments" data-toggle="popover" data-trigger="hover" data-placement="bottom" maxlength="1000" name="appraisee_comment" data-original-title="" title="" data-content="" disabled="true">
<?php
            if(isset($IDP_data[0]['Year_end_prog_comments'])&& $IDP_data[0]['Year_end_prog_comments']!= ""){
              echo $IDP_data[0]['Year_end_prog_comments'];
}

?>
</textarea>
<?php }else{ ?>
<textarea class="form-control validate_field" id="yearA_prj_stat_comments" data-toggle="popover" data-trigger="hover" data-placement="bottom" maxlength="1000" name="appraisee_comment" data-original-title="" title="" data-content="">
<?php
            if(isset($IDP_data[0]['Year_end_prog_comments'])&& $IDP_data[0]['Year_end_prog_comments']!= ""){
              echo $IDP_data[0]['Year_end_prog_comments'];
}

?>
</textarea>
<?php } ?>
</div>
</div>  
<!--written on 24 jan--> 
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold " style="display:none">Project Review</label>
                                                    <div class="col-md-9" style="display:none">
                                                        <?php 
                                                        $project_mid_review = '';
                                                        if (isset($IDP_data['0']['project_mid_review'])) {
                                                          $project_mid_review = $IDP_data['0']['project_mid_review'];
                                                        }
                                                        else
                                                        {
                                                          $project_mid_review = '';
                                                        }
                                                        $set_flag="undefined";
                                                        if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
                                                        echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('disabled' => 'disabled',"maxlength"=>"1000" ,'class'=>"form-control col-md-4 project_mid_review",$set_flag));
                                                        }
                                                        else
                                                        {
                                                        echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('class'=>"form-control col-md-4 project_mid_review","maxlength"=>"1000"));
                                                        }

                                                         ?> 
                                                    </div>
                                                </div>
      <div class="form-group last">
                                                    <label class="col-md-3 control-label bold " style="display:none">Project Final Review</label>
                                                    <div class="col-md-9" style="display:none">
                                                        <?php 
                                                        $project_final_review = '';
                                                        if (isset($IDP_data['0']['project_final_review'])) {
                                                          $project_final_review = $IDP_data['0']['project_final_review'];
                                                        }
                                                        else
                                                        {
                                                          $project_final_review = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['idp_final_status']=='Approved') {
echo CHtml::textArea('project_final_review',$project_final_review,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_final_review",$set_flag));
}
else
{
 echo CHtml::textArea('project_final_review',$project_final_review,$htmlOptions=array('class'=>"form-control col-md-4 project_final_review","maxlength"=>"1000"));
}

                                                         ?> 



                                                    </div>
                                                </div>

<div class="form-group last" style="border-bottom:1px solid #efefef">
                                                    <label class="col-md-3 control-label bold " style="padding-top:0px">View Document</label>
                                                    <div class="col-md-9" style="height:38px">
                                       <?php if(isset($IDP_data['0']['proof3']) && $IDP_data['0']['proof3'] != '') { ?>
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_idp_proofs/<?php echo $IDP_data['0']['proof3']; ?>' target="_blank" download><?php echo $IDP_data['0']['proof3']; ?></a>

<?php }
else
{
?>
<div class='uploaded_file5' style="display:none"><a href="" target="_blank" download class="link5"><lable id='uploaded_file5'></lable></a>

<input id='uploaded_file1-5' value="Delete" class="btn btn-danger cancel_upload" style="margin-top: -11px;cursor:pointer" type="button" data-toggle="confirmation" data-singleton="true">
</div>
<div class='uploaded_file1-5'>
<label id='proof3' style="float:right;display:none">
                                                      </label>
 <label  class="custom-file-input   file_change" id="file_change-5" style="width: 100px;margin-top:-13px;" data-toggle="tooltip" data-placement="top" title="Maximum file size should be 5 MB">
                                                        <input class='proof3' type="file"  name='proof3' style="display: none" />
</div>
<?php
} ?>

                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- END PORTLET-->
                                </div>
                            </div><?php }else { ?>
<div class="alert alert-info"  style="margin-top: 10px;width: 99%;">
  Midyear Review For IDP not updated.
</div>
<?php } ?>

                                    </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div></div>
                                    <!-- END PORTLET-->
                           </div>
                               
                               <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))<=strtotime($settings_data_new['0']['setting_type']))
{ ?>
                                <input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/><lable id="blink_me" style="color: red;"> I confirm that the data filled above is true to the best of my knowledge
</lable> <lable id="wait_lable" style="display:none">Please wait changes are getting saved....</lable><?php } ?>
                               <?php if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))<=strtotime($settings_data_new['0']['setting_type']))
{ ?>
                                        <?php echo CHtml::button('Final Submission',array('class'=>'btn  year_end_rew','style'=>'float:right;color:#fff;background-color:#26466D','id'=>$kpi_data['0']['Employee_id'],'onclick'=>'js:send_notification();')); ?><br>
                                <?php }?>
                                
                             <?php echo CHtml::button('Download Submission',array('class'=>'btn  year_pdf','style'=>'float:right;color:#fff;background-color:#26466D;display:none','id'=>'down_pdf')); ?>
           <button id="getdata" style="margin-right: 63px;margin-top: -25px;padding-top: 5px;padding-bottom: 7px;background-color: #26466d;color: #fff;border: 1px solid #26466d;float: right;">Download</button>
           <button id="temp_save" style="margin-right: 63px;padding-top: 5px;padding-bottom: 7px;background-color: #000;color: #fff;border: 1px solid #26466d;float: right;" onClick='js:save_final_year_data1()'>Temporary Save</button>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Thank You for submitting year end review.It has been forwarded to your manager. </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Edit</button>
                                    <button type="button" class="btn " id="continue_goal_set">OK</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
<div id="static_saved" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Data saved successfully </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="static_prg" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> <i class="fa fa-check" style="color:green"></i> Goal Sheet submitted </p>
                                    <p> <i class="fa fa-times" style="color:red"></i> IDP not approved </p>
                                </div>
                                <div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/IDP/subordinate_idp'),
                                                                ));
                                                                 ?>
<?php echo CHtml::textField('emp_id',$emp_data['0']['Employee_id'],array('style'=>'display:none;','id'=>'emp_val')); ?>
<?php echo CHtml::textField('chk_goalsheet_flag','1',array('style'=>'display:none;')); ?>
                                                                  <?php echo CHtml::submitButton('OK',array('style'=>'float:right','class'=>'btn dark btn-outline')); ?>
<?php 
                                        $this->endWidget(); 
                                        ?> 
                                </div>
                            </div>
                        </div>
                    </div> 
//                     <script type="text/javascript">
//                      $(function(){
//                     $("body").on('click','.send_for_appraisal',function(){
//                     $("#err").removeClass("alert-success"); 
//                             $("#err").removeClass("alert-danger");
//                              var emp_id = {
//                               emp_id : $(this).attr('id'),
//                             };
//                             $(window).scroll(function()
//                             {
//                                 $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
//                             });
                            
//                              var base_url = window.location.origin;
//                               $.ajax({
//                                   type : 'post',
//                                   datatype : 'html',
//                                   data : emp_id,
//                                   url : base_url+'/pms/index.php/Year_endreview1/final_goal_review',
//                                   success : function(data)
//                                   {
                                      
//                                        if (data == 1) 
//                                       {
//                                         $("#err").hide(); 
//                                           jQuery("#static").modal('show');
//                                           $("#continue_goal_set").click(function(){
//                                               $("#show_spin").show();
//                                                   $.ajax({
//                                                       type : 'post',
//                                                       datatype : 'html',
//                                                       url : base_url+'/pms/index.php/Year_endreview1/goalnotification1',
//                                                       success : function(data)
//                                                       {
                                                       
//                                                           jQuery("#static").modal('toggle');
//                                                           $("#show_spin").hide(); 
                                                         
//                                                           $("#err").text("Notification Sent to appraiser");

//                                                           $("#err").show();  
//                                                           $("#err").fadeOut(6000);
                                                          
//                                                           $("#err").addClass("alert-success");                       
//                                                       }
//                                                   });
//                                           });
//                                       } 
//                                       else
//                                       {
//                                             $("#err").show(); 
                                            
//                                             $("#err").text("Please submit final year review for all KRA before final Submission");
//                                             $("#err").addClass("alert-danger");
//                                       }             
//                                   }
//                               });                          
                            
//                             });
//                         });

// </script>
<script>

                        $(function(){

                          $("body").on('change','.file_change',function(event){
                            var text_value = $(this).attr('id');var text_id = text_value.split('-');
                            var next_input = $(this).find('input').attr('class');
var filename = $('.'+next_input).val().replace(/C:\\fakepath\\/i, '');
var f_ext = filename .split('.');
                          
$("#uploaded_file"+text_id[1]).text(filename);
                         
var new_ext = $('.'+next_input)[0].files[0];

var tmppath = URL.createObjectURL(event.target.files[0]);


            var oFile = $('.'+next_input)[0].files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>

            if (oFile.size > 1048576) // 2 mb for bytes.
            {
               // alert("File size must under 1mb!");
$("#err").show();  
$("#err").text("File size must under 1mb");
                         
$("#err").css('background-color','#AB5454');
$("#err").css('color','#fff');
$("#err").css('border','1px solid #AB5454');
                //return;
            }


else{
 $(".uploaded_file"+text_id[1]).css('display','block');
$(".uploaded_file1-"+text_id[1]).css('display','none');
$(".link"+text_id[1]).attr('href',tmppath);
$(".link"+text_id[1]).attr('download',tmppath+'.'+f_ext[1]);

$("#err").show();  
                                                       
$("#err").text("File uploaded successfully");
$("#err").css('background-color','#B2EAC5');
$("#err").css('color','black');
$("#err").css('border','1px solid #0DEA56');
}


                          
                        });

                        $("body").on('click','.cancel_upload',function(){
                            var text_value = $(this).attr('id');var text_id = text_value.split('-');
                            var next_input = $(this).find('input').attr('class');
                          $(".uploaded_file1"+text_id[1]).css('display','block');
                          $(".uploaded_file"+text_id[1]).css('display','none');
$(".uploaded_file1-"+text_id[1]).css('display','block');
$("#err").show();  
                                                         
                          $("#err").text("File remove successfully");
                         
$("#err").css('background-color','#AB5454');
$("#err").css('color','#fff');
$("#err").css('border','1px solid #AB5454');
                        });

                         $("body").on('change','.proof2',function(){
                            var e = document.getElementsByClassName('proof2');
                                
                                var proof2 = $(e)[0].files[0];        
                               $("#proof2").text($('.proof2').val());
                        });

                         $("body").on('change','.proof1',function(){
                            var e = document.getElementsByClassName('proof1');
                                
                                var proof1 = $(e)[0].files[0];        
                               $("#proof1").text($('.proof1').val());
                        });

                        $("body").on('change','.proof3',function(){
                            var e = document.getElementsByClassName('proof3');
                                
                                var proof1 = $(e)[0].files[0];        
                               $("#proof3").text($('.proof3').val());
                        });
      
                        });
                        var j = jQuery.noConflict();
                        function get_notify(e)
                        {                    
                            var settings = {
                                    theme: 'teal',
                                    horizontalEdge: 'top',
                                    verticalEdge: 'right'
                                },
                                $button = $(this);
                            
                            if ($.trim($('#notific8_heading').val()) != '') {
                                settings.heading = $.trim($('#notific8_heading').val());
                            }
                            
                            if (!settings.sticky) {
                                settings.life = '10000';
                            }

                            j.notific8('zindex', 11500);
                            j.notific8($.trim(e), settings);
                            
                            $button.attr('disabled', 'disabled');
                            
                            setTimeout(function() {
                                $button.removeAttr('disabled');
                            }, 1000);
                        }        
                    </script>
                    <script type="text/javascript">
                    var error = '';
                        // $(function(){                            
                        //     $(window).scroll(function()
                        //     {
                        //         $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                        //     });
$(function() {
            $(window).scroll(function() {
                $('#err').animate({
                    top: $(window).scrollTop() + "px"
                }, {
                    queue: false,
                    duration: 350
                });
            });
            $("body").on('click', '.year_end_rew', function() {
                $("#wait_lable").attr('style','display:block');
                //$("#wait_lable").attr('disabled',true);
                var id_list = $("#total_kra_count").text();
                var str = id_list.replace(/\s+/g, '');
                var id_number_list = str.split(';');
                var error1 = '';
                var error = '';

                var emp_rev1 = '';
                var emp_rev2 = '';
                var rev1_ex1 = '';
                var rev1_ex2 = '';
                var rev2_ex1 = '';
                var rev2_ex2 = '';
                emp_rev1 = $("#target1").val().trim().length;
                emp_rev2 = $("#target2").val().trim().length;
                rev1_ex1 = $("#text1").val().trim().length;
                rev1_ex2 = $("#text2").val().trim().length;
                rev2_ex1 = $("#text3").val().trim().length;
                rev2_ex2 = $("#text4").val().trim().length;
                $("#err").removeClass("alert-success");
                $("#err").removeClass("alert-danger");


                for (var j = 0; j < id_number_list.length; j++) {
                    var emp_actual_achieve = '';
                    var year_end_achieve = '';
                    var emp_rating = '';
                    var kpi_file = '';
                    var kpi_list1 = '';
                    var year_end_achieve1 = '';
                    var emp_actual_achieve1 = '';
                    var id = id_number_list[j];
                    var string_match = /^([0-9.]{1,10})$/;
                    var chk = /[;]/;
                    if ($('.proof_1').length > 0) {
                        var e = document.getElementsByClassName('proof_1');
                        $("#proof_1").text($('.proof_1').val());
                        var proof_1 = $(e)[0].files[0];
                    }
                    if ($('.proof1').length > 0) {
                        var e = document.getElementsByClassName('proof1');
                        $("#proof1").text($('.proof1').val());
                        var proof1 = $(e)[0].files[0];
                    }
                    if ($('.proof2').length > 0) {
                        var e = document.getElementsByClassName('proof2');
                        var proof2 = $(e)[0].files[0];
                    }
                    if ($('.proof3').length > 0) {
                        var e = document.getElementsByClassName('proof3');

                        var proof3 = $(e)[0].files[0];
                    }
                    if ($('.proof_2').length > 0) {
                        var e = document.getElementsByClassName('proof_2');
                        $("#proof_2").text($('.proof_2').val());
                        var proof_2 = $(e)[0].files[0];
                    }




                    $("#proof2").text($('.proof2').val());



                    var formData = new FormData();
                    var kpi_total = $("#kpi_count_list-" + id).text();
                    var error1 = '';

                    for (var i = 0; i < kpi_total; i++) {

                        if ($('#emp_actual_achieve-' + i + id).val() === undefined || $('#emp_actual_achieve-' + i + id).val() == '' || $('#emp_actual_achieve-' + i + id).val() == 'NA') {
                            error = "Please enter correct Actual achievement of year end.";

                            error1 = "error";
                            $("#err").css('background-color', '#AB5454');
                            $("#err").css('color', '#fff');
                            $("#err").css('border', '1px solid #AB5454');
                            $('#emp_actual_achieve-' + i + id).css('border', '2px solid red');
                            $('#emp_actual_achieve-' + i + id).focus();
                            break;
                        } else if ($('#emp_actual_achieve-' + i + id).val().length > 1000 || $('#emp_actual_achieve-' + i + id).val().length < 1) {
                            error = "Please enter minimum 10, maximum 1000 characters.";
                            error1 = "error";
                            $("#err").css('background-color', '#AB5454');
                            $("#err").css('color', '#fff');
                            $("#err").css('border', '1px solid #AB5454');
                            $('#emp_actual_achieve-' + i + id).css('border', '2px solid red');
                            $('#emp_actual_achieve-' + i + id).focus();
                            break;
                        } else if ($('#kpi_unit-' + i + id).text() == 'Text' && ($('#emp_actual_achieve-' + i + id).val() != '' && chk.test($('#emp_actual_achieve-' + i + id).val()))) {
                            error = "The special character ';' not allowed";
                            error1 = "error";
                            $("#err").css('background-color', '#AB5454');
                            $("#err").css('color', '#fff');
                            $("#err").css('border', '1px solid #AB5454');
                            $('#emp_actual_achieve-' + i + id).css('border', '2px solid red');
                            $('#emp_actual_achieve-' + i + id).focus();
                            break;
                        } else if ($('#appraisee_comment' + i + id).val() == '' || $('#appraisee_comment' + i + id).val() === undefined) {
                            error = "Please enter Appraisee comment on actual achievement";
                            error1 = "error";
                            $("#err").css('background-color', '#AB5454');
                            $("#err").css('color', '#fff');
                            $("#err").css('border', '1px solid #AB5454');
                            $('#emp_actual_achieve-' + i + id).css('border', '2px solid rgb(194, 202, 216)');
                            $('#appraisee_comment' + i + id).css('border', '2px solid red');
                            $('#appraisee_comment' + i + id).focus();
                            break;
                        } else if (chk.test($('#appraisee_comment' + i + id).val())) {
                            error = "The special charater ';' not allowed.";
                            error1 = "error";
                            $("#err").css('background-color', '#AB5454');
                            $("#err").css('color', '#fff');
                            $("#err").css('border', '1px solid #AB5454');
                            $('#emp_actual_achieve-' + i + id).css('border', '2px solid rgb(194, 202, 216)');
                            $('#appraisee_comment' + i + id).css('border', '2px solid red');
                            $('#appraisee_comment' + i + id).focus();
                            break;
                        } else if ($('#appraisee_comment' + i + id).val().length > 1000 || $('#appraisee_comment' + i + id).val().length < 10) {
                            error = "Please enter minimum 10, maximum 1000 characters.";
                            error1 = "error";

                            $("#err").css('background-color', '#AB5454');
                            $("#err").css('color', '#fff');
                            $("#err").css('border', '1px solid #AB5454');
                            $('#emp_actual_achieve-' + i + id).css('border', '2px solid rgb(194, 202, 216)');
                            $('#appraisee_comment' + i + id).css('border', '2px solid red');
                            $('#appraisee_comment' + i + id).focus();
                            break;
                        } else {
                            error = '';
                            error1 = "";
                            $('#emp_actual_achieve-' + i + id).css('border', '2px solid grey');
                            $('#appraisee_comment' + i + id).css('border', '2px solid grey');

                            if (emp_rating == '') {
                                emp_rating = $('#rating_by_emp_raiting-' + i + id).val();
                            } else {
                                emp_rating = emp_rating + ';' + $('#rating_by_emp_raiting-' + i + id).val();
                            }




                        }



                    }
                    if (error != '') {
                        $("#err").show();

                        $("#err").text(error);
                        $("#err").addClass("alert-danger");
                        break;
                    }
                    if (error1 != '') {
                        $("#err").show();

                        $("#err").text(error);
                        $("#err").addClass("alert-danger");
                        $("#err").css('background-color', '#AB5454');
                        $("#err").css('color', '#fff');
                        $("#err").css('border', '1px solid #AB5454');
                    } else {
                        $("#rate1").addClass("completed");
                        if (emp_rev1 == 0) {

                            error = 'Please enter Employee Review1';
                            error2 = 'error';
                            $('#target1').css('border', '2px solid red');
                            $('#target1').focus();

                        } else if (emp_rev1 > 1000 || emp_rev1 < 10) {
                            $('#target1').css('border', '2px solid red');
                            $('#target1').focus();
                            error = "Please enter minimum 10, maximum 1000 characters.";
                            error2 = 'error';
                        } else if (emp_rev2 == 0) {

                            error = 'Please enter Employee Review2';
                            $('#target1').css('border', '2px solid grey');
                            $('#target2').css('border', '2px solid red');
                            $('#target2').focus();
                            error2 = 'error';
                        } else if (emp_rev2 > 1000 || emp_rev2 < 10) {
                            error = "Please enter minimum 10, maximum 1000 characters.";
                            $('#target2').css('border', '2px solid red');
                            $('#target2').focus();
                            error2 = 'error';
                        } else if (rev1_ex1 == 0) {

                            error = 'Please enter VVF values Example 1';
                            $('#text1').css('border', '2px solid red');
                            $('#target2').css('border', '2px solid grey');
                            $('#text1').focus();
                            error2 = 'error';
                        } else if (rev1_ex1 > 1000 || rev1_ex1 < 10) {
                            error = "Please enter minimum 10, maximum 1000 characters.";
                            $('#text1').css('border', '2px solid red');
                            $('#text1').css('border', '2px solid grey');
                            $('#text1').focus();
                            error2 = 'error';
                        } else if (rev2_ex1 == 0) {

                            error = 'Please enter VVF leadership competencies Example 1';
                            $('#text3').css('border', '2px solid red');
                            $('#text1').css('border', '2px solid grey');
                            $('#text3').focus();
                            error2 = 'error';
                        } else if (rev2_ex1 > 1000 || rev2_ex1 < 10) {
                            error = "Please enter minimum 10, maximum 1000 characters.";
                            $('#text3').css('border', '2px solid red');
                            $('#text2').css('border', '2px solid grey');
                            $('#text1').focus();
                        } else {
                            $('#text3').css('border', '2px solid grey');
                            error2 = "";

                        }
                    }

                    if (error2 != '') {
                        $("#err").show();

                        $("#err").text(error);
                        $("#err").addClass("alert-danger");
                        $("#err").css('background-color', '#AB5454');
                        $("#err").css('color', '#fff');
                        $("#err").css('border', '1px solid #AB5454');
                    }
                }
                var prg_status = "";
                var prg_cmt = "";
                var extra_prg_status = "";
                var extra_prg_cmt = "";
                var rel_prg_status = "";
                var rel_prg_cmt = "";
                if (error2 != '') {
                    $("#err").show();

                    $("#err").text(error);
                    $("#err").addClass("alert-danger");
                    $("#err").css('background-color', '#AB5454');
                    $("#err").css('color', '#fff');
                    $("#err").css('border', '1px solid #AB5454');
                } else {
                    $("#rate2").addClass("completed");
                    var total = $("#prg_list_defined").text();
                    var prg = total.split(';');

                    for (var i = 0; i < $('#total_prog').text(); i++) {
                        if ($("#" + i).text() != "") {

                            if ($("#yearAcompleteion_type" + i + ':checked').val() === undefined) {
                                error = "Please select program status";
                                error3 = "error";
                                $("#yearAcompleteion_type" + i + ':checked').css('border', '2px solid red');
                                $("#yearAcompleteion_type" + i).focus();
                                break;
                            } else if ($("#yearAcompleteion_type" + i + ':checked').val() == "No" && ($("#yearAprogram_cmd-" + i).val() == '' || $("#yearAprogram_cmd-" + i).val() === undefined)) {

                                error = "Please enter minimum 10, maximum 1000 characters.";
                                error3 = "error";
                                $("#yearAprogram_cmd-" + i).css('border', '2px solid red');
                                $("#yearAprogram_cmd-" + i).focus();
                                break;
                            } else if ($("#yearAcompleteion_type" + i + ':checked').val() == "No" && ($("#yearAprogram_cmd-" + i).val() != '' && ($("#yearAprogram_cmd-" + i).val().length < 10 || $("#yearAprogram_cmd-" + i).val().length > 1000))) {

                                error = "Please enter minimum 10, maximum 1000 characters.";
                                error3 = "error";
                                $("#yearAprogram_cmd-" + i).css('border', '2px solid red');
                                $("#yearAprogram_cmd-" + i).focus();
                                break;
                            } else {
                                error3 = "";
                                if (prg_status == '') {
                                    prg_status = $("#yearAcompleteion_type" + i + ':checked').val();
                                } else {
                                    prg_status = prg_status + '^' + $("#yearAcompleteion_type" + i + ':checked').val();
                                }
                                if (prg_cmt == '') {
                                    prg_cmt = $("#yearAprogram_cmd-" + i).val();
                                } else {
                                    prg_cmt = prg_cmt + '^' + $("#yearAprogram_cmd-" + i).val();
                                }

                                $("#yearAprogram_cmd-" + i).css('border', '2px solid grey');
                            }
                        }
                    }
                    if (error3 == '') {
                        var ext_list = $("#ext_program_count").text();
                        var ext_list_data = ext_list.split(';');
                        for (var i = 0; i < ext_list_data.length; i++) {

                            if ($("#topic" + i).val() != "" && $(".yearAextraprg_" + ext_list_data[i] + ':checked').val() == "No" && ($("#yearAextraprogram_cmt-" + ext_list_data[i]).val() == '' || $("#yearAextraprogram_cmt-" + ext_list_data[i]).val() === undefined)) {
                                error = "Please enter minimum 10, maximum 1000 characters.";
                                error3 = "error";
                                $("#yearAextraprogram_cmt-" + ext_list_data[i]).css('border', '2px solid red');
                                $("#yearAextraprogram_cmt-" + ext_list_data[i]).focus();
                                break;
                            } else if ($("#topic" + i).val() != "" && $(".yearAextraprg_" + ext_list_data[i] + ':checked').val() == "No" && ($("#yearAextraprogram_cmt-" + ext_list_data[i]).val() != '' && ($("#yearAextraprogram_cmt-" + ext_list_data[i]).val().length < 10 || $("#yearAextraprogram_cmt-" + ext_list_data[i]).val().length > 1000))) {
                                error = "Please enter minimum 10, maximum 1000 characters.";
                                error3 = "error";
                                $("#yearAextraprogram_cmt-" + ext_list_data[i]).css('border', '2px solid red');
                                $("#yearAextraprogram_cmt-" + ext_list_data[i]).focus();
                                break;
                            } else if (!$("#topic" + i).val() === undefined && $(".yearAextraprg_" + ext_list_data[i] + ':checked').val() === undefined) {

                                error = "Please select extra program status";
                                error3 = "error";
                                $(".yearAextraprg_" + ext_list_data[i] + ':checked').css('border', '2px solid red');
                                $(".yearAextraprg_" + ext_list_data[i]).focus();
                                break;
                            } else {
                                error3 = "";
                                if (extra_prg_status == '') {
                                    extra_prg_status = $(".yearAextraprg_" + ext_list_data[i] + ':checked').val();
                                } else {
                                    extra_prg_status = extra_prg_status + '^' + $(".yearAextraprg_" + ext_list_data[i] + ':checked').val();
                                }
                                if (extra_prg_cmt == '') {
                                    extra_prg_cmt = $("#yearAextraprogram_cmt-" + ext_list_data[i]).val();
                                } else {
                                    extra_prg_cmt = extra_prg_cmt + '^' + $("#yearAextraprogram_cmt-" + ext_list_data[i]).val();
                                }

                                $("#yearAextraprogram_cmt-" + ext_list_data[i]).css('border', '2px solid grey');
                            }
                        }
                    }
                    if (error3 == '') {
                        for (var i = 0; i < 2; i++) {
                            var rel = i + 3;

                            if (!$("#number_of_meetings" + rel).attr('value') == '') {
                                if ($(".yearArel_prg" + i + ':checked').val() === undefined) {
                                    error = "Please select relationship program status";
                                    error3 = "error";
                                    $(".yearArel_prg" + i + ':checked').css('border', '2px solid red');
                                    $("#yearArel_program_review" + i).focus();
                                    break;
                                } else if ($(".yearArel_prg" + i + ':checked').val() == "No" && ($("#yearArel_program_review" + i).val() == '' || $("#yearArel_program_review" + i).val() === undefined)) {
                                    error = "Please enter minimum 100, maximum 1000 characters.";
                                    error3 = "error";
                                    $("#yearArel_program_review" + i).css('border', '2px solid red');
                                    $("#yearArel_program_review" + i).focus();
                                    break;
                                } else if ($(".yearArel_prg" + i + ':checked').val() == "No" && ($("#yearArel_program_review" + i).val() != '' && ($("#yearArel_program_review" + i).val().length < 10 || $("#yearArel_program_review" + i).val().length > 1000))) {
                                    error = "Please enter minimum 10, maximum 1000 characters.";
                                    error3 = "error";
                                    $("#yearArel_program_review" + i).css('border', '2px solid red');
                                    $("#yearArel_program_review" + i).focus();
                                    break;
                                } else {
                                    error3 = "";
                                    if (rel_prg_status == '') {
                                        rel_prg_status = $(".yearArel_prg" + i + ':checked').val();

                                    } else {
                                        rel_prg_status = rel_prg_status + '^' + $(".yearArel_prg" + i + ':checked').val();

                                    }
                                    if (rel_prg_cmt == '') {
                                        rel_prg_cmt = $("#yearArel_program_review" + i).val();
                                    } else {
                                        rel_prg_cmt = rel_prg_cmt + '^' + $("#yearArel_program_review" + i).val();
                                    }
                                    $("#yearArel_program_review" + i).css('border', '2px solid grey');
                                }
                            }
                        }
                    }
                    if (error3 == '') {
                        if ($("#yearA_project_status").find(':selected').val() == 'Select') {
                            error = "Please select project status";
                            error3 = "error";
                            $("#yearA_project_status").css('border', '2px solid red');
                            $("#yearA_project_status").focus();
                        } else if ($("#yearA_project_status").find(':selected').val() == 'Not Completed' && (($("#yearA_prj_stat_comments").val() == '' || $("#yearA_prj_stat_comments").val() == undefined))) {
                            error = "Please enter comments for project";
                            error3 = "error";
                            $("#yearA_project_status").css('border', '2px solid grey');
                            $("#yearA_prj_stat_comments").css('border', '2px solid red');
                            $("#yearA_prj_stat_comments").focus();
                        } else if ($("#yearA_project_status").find(':selected').val() == 'Not Completed' && ($("#yearA_prj_stat_comments").val() != '' && ($("#yearA_prj_stat_comments").val().length < 10 || $("#yearA_prj_stat_comments").val().length > 1000))) {
                            error = "Please enter minimum 10, maximum 1000 characters.";
                            error3 = "error";
                            $("#yearA_project_status").css('border', '2px solid grey');
                            $("#yearA_prj_stat_comments").css('border', '2px solid red');
                            $("#yearA_prj_stat_comments").focus();
                        } else {
                            error3 = "";
                            $("#yearA_project_status").css('border', '2px solid grey');
                            $("#yearA_prj_stat_comments").css('border', '2px solid grey');
                        }
                        if (error3 != '') {
                            $("#err").show();

                            $("#err").text(error);
                            $("#err").addClass("alert-danger");
                            $("#err").fadeOut(6000);
                            $("#err").css('background-color', '#AB5454');
                            $("#err").css('color', '#fff');
                            $("#err").css('border', '1px solid #AB5454');
                        }
                    }
                    if (error3 != '') {
                        $("#err").show();

                        $("#err").text(error);
                        $("#err").addClass("alert-danger");

                        $("#err").css('background-color', '#AB5454');
                        $("#err").css('color', '#fff');
                        $("#err").css('border', '1px solid #AB5454');
                    } else {
                        $("#rate3").addClass("completed");

                        if ($("#term_condition:checked").val() != 'term_condition') {

                            $("#blink_me").addClass('blink_me');
                        } else {
                            var emp_actual_achieve1 = "";
                            var year_end_achieve1 = "";
                            for (var j = 0; j < id_number_list.length; j++) {
                                var id = id_number_list[j];
                                var kpi_total = $("#kpi_count_list-" + id).text();
                                var emp_actual_achieve = "";
                                var year_end_achieve = "";

                                for (var i = 0; i < kpi_total; i++) {

                                    if ($("#file_change-" + i + id).text() != '') {
                                        var e = document.getElementsByClassName('file-input' + i + id);
                                        var file_data = $(e)[0].files[0];
                                        formData.append("employee_csv" + i + id, file_data);
                                    }
                                    if (emp_actual_achieve == '') {
                                        emp_actual_achieve = $('#emp_actual_achieve-' + i + id).val();
                                    } else {
                                        emp_actual_achieve = emp_actual_achieve + ';' + $('#emp_actual_achieve-' + i + id).val();
                                    }
                                    if (year_end_achieve == '') {
                                        year_end_achieve = $('#appraisee_comment' + i + id).val();
                                    } else {
                                        year_end_achieve = year_end_achieve + ';' + $('#appraisee_comment' + i + id).val();
                                    }
                                }

                                if (emp_actual_achieve1 == '') {
                                    emp_actual_achieve1 = emp_actual_achieve;
                                } else {
                                    emp_actual_achieve1 = emp_actual_achieve1 + '^' + emp_actual_achieve;
                                }
                                if (year_end_achieve1 == '') {
                                    year_end_achieve1 = year_end_achieve;
                                } else {
                                    year_end_achieve1 = year_end_achieve1 + '^' + year_end_achieve;
                                }
                            }

                            formData.append("kpi_value_id", str);
                            formData.append("year_end_reviewa", year_end_achieve1);
                            formData.append("year_end_achieve", emp_actual_achieve1);
                            formData.append("rating_by_emp_raiting", emp_rating);
                            formData.append("employee_review1", $("#target1").val());
                            formData.append("employee_review2", $("#target2").val());
                            formData.append("review1_example1", $("#text1").val());
                            formData.append("review1_example2", $("#text2").val());
                            formData.append("review2_example1", $("#text3").val());
                            formData.append("review2_example2", $("#text4").val());
                            formData.append("proof2", proof2);
                            formData.append("proof3", proof3);
                            formData.append("proof_1", proof_1);
                            formData.append("proof_2", proof_2);
                            formData.append("proof1", proof1);
                            formData.append("project_final_review", $(".project_final_review").val());
                            formData.append("Year_end_prg_status", prg_status);
                            formData.append("Year_end_prg_comments", prg_cmt);
                            formData.append("Extra_year_end_prg_status", extra_prg_status);
                            formData.append("Extra_year_end_prg_comments", extra_prg_cmt);
                            formData.append("Relationship_year_end_status", rel_prg_status);
                            formData.append("Relationship_year_end_comments", rel_prg_cmt);
                            formData.append("Year_end_prog_status", $('#yearA_project_status option:selected').text());
                            formData.append("Year_end_prog_comments", $('#yearA_prj_stat_comments').val());

                            $("#err").hide();
                            var base_url = window.location.origin;
                            $.ajax({
                                type: 'post',
                                datatype: 'json',
                                processData: false,
                                contentType: false,
                                enctype: 'multipart/form-data',
                                data: formData,
                                url: base_url + '/pms/index.php/Year_endreview1/updatereview',
                                success: function(data) {

                                    alert(data);
                                    //$("#wait_lable").attr('disabled',false);
                                    $("#wait_lable").attr('style','display:none');
                                    jQuery("#static").modal('show');
                                    $("#continue_goal_set").click(function() {
                                        $("#show_spin").show();
                                        $.ajax({
                                            type: 'post',
                                            datatype: 'html',
                                            url: base_url + '/pms/index.php/Year_endreview1/goalnotification1',
                                            success: function(data) {
                                                alert(data);
                                                jQuery("#static").modal('toggle');
                                                $("#show_spin").hide();
                                                $("#err").text("Notification Sent to appraiser");
                                                $("#err").show();
                                                $("#err").fadeOut(6000);
                                                $("#err").css('background-color', '#B2EAC5');
                                                $("#err").css('color', 'black');
                                                $("#err").css('border', '1px solid #0DEA56');
                                                $("#err").addClass("alert-success");
                                                window.setTimeout(function() {
                                                    window.location.href = base_url + '/index.php/User_dashboard';
                                                }, 1000);

                                            }
                                        });
                                    });

                                }
                            });
                        }
                    }
                }


            });





$("body").on('click','.del_yearb',function(){
var id = $(this).attr('id');
var splited_id = id.split('-');
var data = {
id : splited_id[1]
};
var base_url = window.location.origin;
                                    $.ajax({
                                        type : 'post',
                                            datatype : 'html',
                                            data : data,
                                            url : base_url+'/pms/index.php/Year_endreview1/updatereview_delfile1',
                                            success : function(data)
                                            {

                                              location.reload();
                                                                                                                        
                                            }
                                    });
});
$("body").on('click','.del_file',function(){
var id = $(this).attr('id');

var id1 = id.split('-');
var data = {
num : id1[2]+id1[1],
KPI_id : id1[2]
};

 var base_url = window.location.origin;
                                    $.ajax({
                                        type : 'post',
                                            datatype : 'html',
                                            data : data,
                                            url : base_url+'/pms/index.php/Year_endreview1/updatereview_delfile',
                                            success : function(data)
                                            {

                                             location.reload();

                                             $("#err").show();  
                                                          $("#err").fadeOut(6000);
                                                          
                                                         $("#error_value").text("File Deleted");                                                                                                                  
                                            }
                                    });

});                      
                        });
                    </script>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            
        </div>
        <!-- END CONTAINER -->
              
<script type="text/javascript">

$('#bottom').click(function(){
   $("html, body").animate({ scrollTop: $(document).height() }, 1000);

});


</script>



<script type="text/javascript">
    
</script>


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
                    url : base_url+'/pms/index.php/Checkattach/check_view11',
                    success : function(data)
                    {
                        //alert(data);
                        location.href = base_url+'/pms/Goalsheet_docs/yearendgoalsheet'+'_'+$("#femp_name").text()+'_'+$("#lemp_name").text()+'2017-2018'+'.pdf'; 
                    }
                    });                 
                }
</script>



<script type="text/javascript">
    $("body").on('click','.year_end_rew',function(){
                                 var emp_rev1 = '';
                                 var emp_rev2='';
                                 var rev1_ex1='';
                                 var rev1_ex2='';
                                 var rev2_ex1='';
                                 var rev2_ex2='';
                                 emp_rev1=$("#target1").val().trim().length;
                                 emp_rev2=$("#target2").val().trim().length;
                                 rev1_ex1=$("#text1").val().trim().length;
                                 rev1_ex2=$("#text2").val().trim().length;
                                 rev2_ex1=$("#text3").val().trim().length;
                                 rev2_ex2=$("#text4").val().trim().length;
        var id_list = $("#total_kra_count").text();
        var str = id_list.replace(/\s+/g, '');
        var id_number_list = str.split(';');

        for (var j = 0; j < id_number_list.length; j++) {
            var emp_actual_achieve = '';var year_end_achieve = '';var emp_rating = '';var kpi_file = '';var kpi_list1 = '';var year_end_achieve1 = '';var emp_actual_achieve1 = '';
            var id = id_number_list[j];   
            var formData = new FormData(); 
            var kpi_total = $("#kpi_count_list-"+id).text();
            for (var i = 0; i < kpi_total; i++) {  
                if ($('#emp_actual_achieve-'+i+id).val() === undefined || $('#emp_actual_achieve-'+i+id).val() == '' || $('#emp_actual_achieve-'+i+id).val() == 'NA') 
                {
                    $('#emp_actual_achieve-'+i+id).css('border','2px solid red');
                } 
                if ($('#appraisee_comment'+i+id).val()  == '' || $('#appraisee_comment'+i+id).val() === undefined) 
                {
                    $('#appraisee_comment'+i+id).css('border','2px solid red');
                }
                if($('#emp_actual_achieve-'+i+id).val().length >1000  || $('#emp_actual_achieve-'+i+id).val().length < 1)
                {
                    $('#emp_actual_achieve-'+i+id).css('border','2px solid red');
                }
            
                if($('#appraisee_comment'+i+id).val().length >1000  || $('#appraisee_comment'+i+id).val().length < 10)
                {
                     $('#appraisee_comment'+i+id).css('border','2px solid red');
                }
            }
        }

        if(emp_rev1==0){
            $('#target1').css('border','2px solid red');
        }
        else{
            $('#target1').css('border','2px solid grey');
        }
        if(emp_rev1>1000 || emp_rev1 < 10)
        {
            $('#target1').css('border','2px solid red');
        }
        else{
            $('#target1').css('border','2px solid grey');
        }
        if(emp_rev2==0)
        {
            $('#target2').css('border','2px solid red');
        }
        else{
            $('#target2').css('border','2px solid grey');
        }
        if(emp_rev2 >1000 ||emp_rev2 < 10)
        {
            $('#target2').css('border','2px solid red');
        }
        else{
            $('#target2').css('border','2px solid grey');
        }
        if(rev1_ex1==0)
        {
            $('#text1').css('border','2px solid red');
        }
        else{
            $('#text1').css('border','2px solid grey');
        }
        if(rev1_ex1 >1000 || rev1_ex1< 10 )
        {
            $('#text1').css('border','2px solid red');
        }
        else{
            $('#text1').css('border','2px solid grey');
        }
        if(rev2_ex1==0)
        {
            $('#text3').css('border','2px solid red');
        } 
        else{
            $('#text3').css('border','2px solid grey');
        }
        if(rev2_ex1 >1000 || rev2_ex1<10)
        {
            $('#text3').css('border','2px solid red');
        }
        else{
            $('#text3').css('border','2px solid grey');
        }

        var prg_status="";
        var prg_cmt="";
        var extra_prg_status=""; 
        var extra_prg_cmt=""; 
        var rel_prg_status=""; 
        var rel_prg_cmt="";

        var total = $("#prg_list_defined").text();
        var prg = total.split(';');

        for (var i = 0; i < $('#total_prog').text(); i++) { 
            if($("#"+i).text()!=""){

            if($("#yearAcompleteion_type"+i+':checked').val()===undefined)
            {
               $("#yearAcompleteion_type_sta"+i).css('border','2px solid red');
            }
            else
            {
               $("#yearAcompleteion_type_sta"+i).css('border','none');
            }
            if($("#yearAcompleteion_type"+i+':checked').val()=="No" && ($("#yearAprogram_cmd-"+i).val() == '' || $("#yearAprogram_cmd-"+i).val() === undefined))
            {
                $("#yearAprogram_cmd-"+i).css('border','2px solid red');
            }
            else{
                $("#yearAprogram_cmd-"+i).css('border','2px solid grey');
            }
           if($("#yearAcompleteion_type"+i+':checked').val()=="No" && ($("#yearAprogram_cmd-"+i).val() != '' && ($("#yearAprogram_cmd-"+i).val().length<10 || $("#yearAprogram_cmd-"+i).val().length>1000)))
            {
                $("#yearAprogram_cmd-"+i).css('border','2px solid red');
            }
            else{
                 $("#yearAprogram_cmd-"+i).css('border','2px solid grey');
            }
            
        }

}
        for (var i = 0; i < 2; i++) 
        { 
            if($(".yearArel_prg"+i+':checked').val()===undefined)
            {
                $("#yearArel_prgsta"+i).css('border','2px solid red');
            }
            else{
                $("#yearArel_prgsta"+i).css('border','none');
            }
            if($(".yearArel_prg"+i+':checked').val()=="No" && ($("#yearArel_program_review"+i).val() == '' || $("#yearArel_program_review"+i).val() === undefined))
            {
                $("#yearArel_program_review"+i).css('border','2px solid red');
            }
            else{
                $("#yearArel_program_review"+i).css('border','2px solid grey');
            }
            if($(".yearArel_prg"+i+':checked').val()=="No" && ($("#yearArel_program_review"+i).val() != '' && ($("#yearArel_program_review"+i).val().length<10 || $("#yearArel_program_review"+i).val().length>1000)))
            {
                $("#yearArel_program_review"+i).css('border','2px solid red');
            }
            else{
                $("#yearArel_program_review"+i).css('border','2px solid grey');
            }

        }

        var ext_list = $("#ext_program_count").text();
        var ext_list_data = ext_list.split(';');
        for (var i = 0; i < ext_list_data.length; i++) 
        { 
            if($(".yearAextraprg_"+ext_list_data[i]+':checked').val()=="No" && ($("#yearAextraprogram_cmt-"+ext_list_data[i]).val() == '' || $("#yearAextraprogram_cmt-"+ext_list_data[i]).val() === undefined))
            {
                $("#yearAextraprogram_cmt-"+ext_list_data[i]).css('border','2px solid red');
            }
            else{
               $("#yearAextraprogram_cmt-"+ext_list_data[i]).css('border','2px solid red');
           }
            if($(".yearAextraprg_"+ext_list_data[i]+':checked').val()=="No" && ($("#yearAextraprogram_cmt-"+ext_list_data[i]).val() != '' && ($("#yearAextraprogram_cmt-"+ext_list_data[i]).val().length<10 || $("#yearAextraprogram_cmt-"+ext_list_data[i]).val().length>1000)))
            {
                $("#yearAextraprogram_cmt-"+ext_list_data[i]).css('border','2px solid red');
            }
            else
            {
                $("#yearAextraprogram_cmt-"+ext_list_data[i]).css('border','2px solid grey');
            }
            if($("#topic"+i).val()!="" && $(".yearAextraprg_"+ext_list_data[i]+':checked').val()===undefined)
            {
               
               $("#yearAextraprgSta_"+i).css('border','2px solid red');
     
            }
            else{
               $("#yearAextraprgSta_"+i).css('border','none');
           }

        }


        if($("#yearA_project_status").find(':selected').val() == 'Select')
        {
            $("#yearA_project_status").css('border','2px solid red');
        }
        else
        {
            $("#yearA_project_status").css('border','2px solid grey');
        }

        if($("#yearA_project_status").find(':selected').val() == 'Not Completed' && (($("#yearA_prj_stat_comments").val() == '' || $("#yearA_prj_stat_comments").val() =="undefined")))
        {
            $("#yearA_prj_stat_comments").css('border','2px solid red');
        }
        if($("#yearA_project_status").find(':selected').val() == 'Not Completed' && ($("#yearA_prj_stat_comments").val() != '' && ($("#yearA_prj_stat_comments").val().length<10 || $("#yearA_prj_stat_comments").val().length>1000)))
        {
            $("#yearA_prj_stat_comments").css('border','2px solid red');
        }


    });
</script>

<?php 

       ?>  
<div id="year_end_emppdf"  style="display:none">
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
        $data2 = array(Yii::app()->user->getState("Employee_id"),'2017-2018');
        $kpi_data = $kra->get_kpi_list($where1,$data2,$list1);  
        

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
                                                    <?php echo "KRA Category : ".$row['KRA_category'];   ?><br>
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
                                                                                if(isset($kpi_list_target[$i])){$value_data = explode('-', $kpi_list_target[$i]); }
                                                                                
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
<td style="height: 30px;border: 1px solid black;font-size: 5px;"><?php if(isset( $year_end_achive[$i])){ echo $year_end_achive[$i]; }?></td>
<td style="height: 30px;border: 1px solid black;font-size: 5px;"><?php if(isset($year_end_achive1[$i])){ echo $year_end_achive1[$i]; } ?></td>
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
      //$program_data_result = $program_data->get_data();
      $where = 'where  goal_set_year =:goal_set_year';
    $list = array('goal_set_year');
    $data = array('2017-2018');
    $program_data_result = $program_data->get_kpi_data($where,$data,$list);
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
      $data = array(Yii::app()->user->getState("Employee_id"),'2017-2018');
      $IDP_data = $IDPForm->get_idp_data($where,$data,$list);
      //print_r(Yii::app()->user->getState('emp_id1'));die();
      $where = 'where Email_id = :Email_id';
      $list = array('Email_id');
      $data = array($emp_data['0']['Reporting_officer1_id']);
      $mgr_data = $employee->get_employee_data($where,$data,$list);
//print_r($emp_data);die();

   ?>
  
<div id="target_idp" >
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
   
<div>
    
   <h6><b>Rating Of Qualitative Goals</b></h6>
   
    
    <table>
        <tr ><td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">1. I feel my goals were very challenging and stretched because:</td></tr>
        <tr ><td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;"><b>Answer:-</b>
            <?php  //if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
//{
            if(isset($employee_review1)){
                          echo $employee_review1;}
                     //        }
                            ?></td></tr>
        <tr><td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">2. I have gone the extra mile to help my colleagues/team/organization by:</td></tr>
        <tr><td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;"> <b>Answer:-</b><?php

                                // if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))

                                  if(isset($employee_review2)){
                                 echo $employee_review2;
                                 }
                                     
                                ?></td></tr>
        <tr><td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">3. I have lived the   VVF values (Openness, Integrity, Respect, Trust, Innovation, Agility) in an exemplary fashion in the following way:<br>
        
        </td>
</tr>
<tr>
    <td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">
    <b>Example1:-</b><?php  if(isset($review1_example1)){ echo $review1_example1; }?></td>
</tr>
<tr>
    <td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">
    <b>Example2:-</b><?php if(isset($review1_example2)){ echo $review1_example2; }?></td>
</tr>

        <tr><td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">4. I have demonstrated the VVF leadership competencies (Teamwork, Customer Orientation, Result Orientation, Developing self and team, Strategic thinking, Ownership and accountability)  in the following way:</td>
</tr>
<tr>
    <td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">
    <b>Example1:-</b><?php if(isset($review2_example1)){ echo $review2_example1; }?></td>
</tr>
<tr>
    <td style="border: 1px solid #00000a; padding-top: 6px; padding-bottom: 6px; padding-left: 0.2cm; padding-right: 0.19cm;margin-top: 0px;">
    <b>Example2:-</b><?php if(isset($review2_example2)){ echo $review2_example2;}?></td>
</tr>
    </table>
    
    
    
<label style="margin-top: 100px">Individual
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
                 echo '2017-2018';?>
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
    <td width="100px" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
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
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm" class="prog_name" id="nm<?php echo $i; ?>"> <?php echo $program_data_result[$i]['program_name']; ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
            
            </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php echo $program_data_result[$i]['training_days']; ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
            <?php 
            $cmnt = '';$prg_state1 = '';$prg_state_com1 = '';
            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment']) && isset($IDP_data['0']['Year_end_prg_status']) && isset($IDP_data['0']['Year_end_prg_comments'])) {
                $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                if(isset($IDP_data['0']['Year_end_prg_status'])){ $prg_state = explode('^', $IDP_data['0']['Year_end_prg_status']);}
                
                $prg_state_com = explode('^', $IDP_data['0']['Year_end_prg_comments']);
                for ($j=0; $j < count($cmt2); $j++) {
                    if(isset($cmt2[$j]))
                    {
                        $cmt1 = explode('?', $cmt2[$j]);
                        if (isset($cmt1[0]) && isset($cmt1[1]) && $i == $cmt1[0]) {                                                            
                             $cmnt = $cmt1[1];
                             if(isset($prg_state[$j]) && isset($prg_state_com[$j]))
                             {
                                $prg_state1 = $prg_state[$j];
                                $prg_state_com1 = $prg_state_com[$j];
                             }                             
                        }
                    }                    
                }
            }
            else
            {
                $cmnt = '';
            }

                echo $cmnt;
            ?> </td>
<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"><?php if(isset($prg_state1)){ echo $prg_state1; } ?>
</td>
<td width="100" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"><?php if(isset($prg_state_com1)){ echo $prg_state_com1;  } ?>
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
    if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic']) && isset($topic1[0]) && isset($IDP_data['0']['extra_days']) && isset($IDP_data['0']['Extra_year_end_prg_status']) && isset($IDP_data['0']['Extra_year_end_prg_comments']) && isset($IDP_data['0']['extra_faculty'])) {

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
      <?php if(isset($topic)){ echo $topic; }?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($day)){ echo $day; }?>
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
        
        if (isset($topic1[1])) {
            $topic = $topic1[1];
            $day1 = explode(';',$IDP_data['0']['extra_days']);
            if(isset($day1[1]))
            {
                $day = $day1[1];
            }

            $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
            
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
      <?php if(isset($topic)){ echo $topic; } ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($day)){ echo $day; }?>
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
      <?php if(isset($faculty3)){echo $faculty3; }?>
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
      <p><font face="Cambria, serif"><b>Mentoring</b></font><font face="Cambria, serif">
      through leader from different function for </font><font face="Cambria, serif"><b>behavioural input</b></font><font face="Cambria, serif">
      inputs</font></p>

    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($faculty4)){ echo $faculty4; } ?>
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
      <?php if(isset($meet)){echo $meet;} ?>
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


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-confirmations.min.js" type="text/javascript"></script>

                                       </body>
                                       
                                       </html>


