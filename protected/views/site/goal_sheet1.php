<?php


Yii::app()->controller->renderPartial('//site/all_js');

?> 
<style media="all" type="text/css">
#err { 
position: absolute; 
top: 0; right: 20; 
z-index: 10; 
width: 374px;
height: 52px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
right: 45%;
background-color: #AB5454;
color: #FFF;
font-weight: bold; 
}

.page-content
{
background :none;
}  
</style>

<script type="text/javascript">
  function refresh_page()
{
$("#target_goal").load(location.href + " #target_goal");
$("#target_idp").load(location.href + " #target_idp");
var specialElementHandlers = {
'#editor': function (element,renderer) {
return true;
    }
};
var doc = new jsPDF();
doc.fromHTML($('#target').html(), 15, 15, {
    'width': 170,'elementHandlers': specialElementHandlers
});
var base_url = window.location.origin;
var data = {
    doc : $('#target_goal').html(),
    emp_id : $('#correct_emp_id').text()
};

$.ajax({                            
type : 'post',
datatype : 'html',
data : data,
url : base_url+$("#basepath").attr('value')+'/index.php/Checkattach/check_view2',
success : function(data)
{
    alert(data);
}
});
var data1 = {
    doc : $('#target_idp').html(),
    emp_id : $('#correct_emp_id').text()
};

$.ajax({                            
type : 'post',
datatype : 'html',
data : data1,
url : base_url+$("#basepath").attr('value')+'/index.php/Checkattach/check_idp1',
success : function(data)
{
    //alert("dsfdsf");
}
});
}
function save_detail_pdf()
                { 
                    $("#target_goal").load(location.href + " #target_goal");
                    $("#target_idp").load(location.href + " #target_idp");
                    var specialElementHandlers = {
                        '#editor': function (element,renderer) {
                            return true;
                        }
                    };
                    var doc = new jsPDF();
                    doc.fromHTML($('#target').html(), 15, 15, {
                        'width': 170,'elementHandlers': specialElementHandlers
                    });
                    var base_url = window.location.origin;
                    var data = {
                        doc : $('#target_goal').html(),
                        emp_id : $('#correct_emp_id').text()
                    };
                    $.ajax({                            
                    type : 'post',
                    datatype : 'html',
                    data : data,
                    url : base_url+$("#basepath").attr('value')+'/index.php/Checkattach/check_view2',
                    success : function(data)
                    {
                        alert(data);
                    }
                    });
                  var data1 = {
                        doc : $('#target_idp').html(),
                        emp_id : $('#correct_emp_id').text()
                    };
                    $.ajax({                            
                    type : 'post',
                    datatype : 'html',
                    data : data1,
                    url : base_url+'/kritvapms//index.php/Checkattach/check_idp1',
                    success : function(data)
                    {
                        //alert("dsfdsf");
                    }
                    });
                    
                }
</script>


<label id="correct_emp_id" style="display:none"><?php if(isset($employee_data['0']['Employee_id']) && $employee_data['0']['Employee_id'] !='') { echo $employee_data['0']['Employee_id']; } ?></label>
 

       <style>
/*#target_goal
{
display: none;
}*/
#target_idp
{
display: none;
}
       table.mid-table td { border:1px solid red; height:37px;min-height: 190px;max-height: auto}
       table.mid-table th { border:1px solid red; height:37px;min-height: 190px;max-height: auto}

       table.mid-table1 td { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       table.mid-table1 th { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       </style>
   <script>
$(document).ready(function(){

 setInterval(save_mid_data,3000);    
    $('[data-toggle="popover"]').popover();
});
</script>
<script type="text/javascript">
  function save_mid_data()
  {
                          //alert("hiiiiiiii");
                          var error_count = 0;var error_count1 = 0;var error_count2 = '';
                          var id_value = $("#total_kra_id").text();
                          var id = id_value.split(';');
                          //alert(id);
                          var mid_review_status = '';var mid_review_status1 = [];
                          var comment_data = '';
                          var review_comments = '';var review_comments1 = [];
                          var error = [];var status_type='';var chk_colon = /[;]/;
                          var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;var chk_cmnts3 = 0;var program_status = '';var extra_program_status = '';var extra_chk_compl1 = 0;var extra_program_review_compl2 = 0;var extra_program_review_compl3 = 0;
                          var get_list = $("#compulsory_id").text();
                          var get_list_value = get_list.split(';');
                          var prgrm_cmd = ''; var extra_prgrm_cmd = ''; var topic = '';var date_value = '';var faculty_value = '';var chk = /[;]/; 
                          var extra_cnt = $("#extra_program_count").text().replace(/\s+/g, '');
                           
                          var mgr_cmt1='';var mgr_cmt2='';var mgr_cmt3='';

                          for (var j = 0; j < $("#total_kra_number").text(); j++) {
                          var mid_review_status = '';
                          var review_comments = '';
                              for (var i = 0; i < $("#get_kpi_count-"+id[j]).text(); i++) { 
                              var comment_data = $(".review_comment"+id[j]+i).val();
                              if($(".review_comment"+id[j]+i).val()=='' || $(".review_comment"+id[j]+i).val()=='undefined' || $(".review_comment"+id[j]+i).val()=== undefined){
                                $(".review_comment"+id[j]+i).val("NA");
                              }
                              if(chk_colon.test(comment_data))
                              {
                                error[id[j]] = "The special character ';' not allowed.";error_count1 = id[j]+i;error_count2 = id[j];break;
                              }
                              else
                              {
                                  error[id[j]] = '';
                                 
                                     if (mid_review_status == '') 
                                      {
                                          mid_review_status = $(".kpi_status_type-"+id[j]+i).find(':selected').val();
                                      }
                                      else
                                      {
                                            if ($(".kpi_status_type"+id[j]+i).find(':selected').val() !='Select') 
                                            {
                                                status_type = $(".kpi_status_type-"+id[j]+i).find(':selected').val()
                                            }
                                            else
                                            {
                                                status_type = 'Select';
                                            }
                                          mid_review_status = mid_review_status +';'+status_type;
                                      }
                                     
                                  if (review_comments == '') 
                                  {
                                      review_comments = $(".review_comment"+id[j]+i).val();
                                  }
                                  else
                                  {
                                      review_comments = review_comments +';'+$(".review_comment"+id[j]+i).val();
                                  }
                                   
                              }                              
                              
                          } 
                          mgr_cmt1=$('.mgr_cmt1').val();
                          mgr_cmt2=$('.mgr_cmt2').val();
                          mgr_cmt3=$('.mgr_cmt3').val();

                          var data = {
                                        'KPI_id' : id[j],
                                        'mid_KRA_status' : mid_review_status,
                                        'appraiser_comment' : review_comments,
                                        'mgr_cmt1':mgr_cmt1,
                                        'mgr_cmt2':mgr_cmt2,
                                        'mgr_cmt3':mgr_cmt3,
                                      };
                                      $("#updation_spinner-"+id[j]).show();
                                      console.log(data);
                                      var base_url = window.location.origin;
                                      $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+$("#basepath").attr('value')+'/index.php/Midreview1/midupdategoal',
                                        success : function(data)
                                        {
                                             //alert(data);
                                        }                    
                                      });
                              if(error[id[j]] == '')
                              {                                
                                error_count++;
                              }
                              else
                              {
                                break;
                              }                 
                          } 
                          //alert($("#total_prog").text());
                          var  prg_cmd=''; var program_status="";
                          for (var i = 0; i < $("#total_prog").text(); i++) {
                        //alert($("#extra_program_review-2"+state).val());
                          

                          // if($("#program_review-"+i).val()=="" || $("#program_review-"+i).val()=="undefined" || $("#program_review-"+i).val()===undefined){
                          //   $("#program_review-"+i).val('NA');
                          // }
                          // alert($("#program_review-"+i).val()+''+i);
                           //var prg_cmd=$("#program_review-"+i).val();
                           // if(prg_cmd !== undefined){

                           //      prg_cmd=$("#program_review-"+i).val();
                           // }
                           // else{
                           //     prg_cmd='';
                           // }
                          // alert(i+"  "+$("#program_review-"+i).val());
                          if($("#program_review-"+i).val()=='' ||  $("#program_review-"+i).val()=='undefined'){
                            $("#program_review-"+i).val('NA');
                          }
                           if (program_status == '') 
                            {
                               program_status =$("#tot_prog_status_mgr-"+i+" option:selected").text();
                            }
                            else
                            {
                              program_status = program_status+';'+$("#tot_prog_status_mgr-"+i+" option:selected").text();
                            }
                            if (prgrm_cmd == '') 
                            {
                                prgrm_cmd = $("#program_review-"+i).val();
                            }
                            else
                            {
                                prgrm_cmd = prgrm_cmd+';'+$("#program_review-"+i).val();
                            }                          
                        
                    }
                    for (var state = 0; state < extra_cnt; state++) {

                      extra_program_review_compl2 = 0;
                            if($("#extra_program_review-"+state).val()=='' || $("#extra_program_review-"+state).val()=='undefined' || $("#extra_program_review-"+state).val()=== undefined){
                              $("#extra_program_review-"+state).val('NA');
                            }
                            if (extra_prgrm_cmd == '') 
                            {
                               extra_prgrm_cmd = $("#extra_program_review-"+state).val();
                            }
                            else
                            {
                              extra_prgrm_cmd = extra_prgrm_cmd+';'+$("#extra_program_review-"+state).val();
                            }
                            if (extra_program_status == '') 
                            {
                               extra_program_status = $(".extra_completeion_type"+state+':checked').val();
                            }
                            else
                            {
                              extra_program_status = extra_program_status+';'+$(".extra_completeion_type"+state+':checked').val();
                            }
                            $("#extra_program_review-"+state).css('border-color','');                          
                             chk_cmnts2++;
                             chk_cmnts3++;
                    }
                    //alert(extra_program_status);
                    var chk_cmnts4 = 0;var rel_program_review = '';
                    for (var i = 0; i < 2; i++) {
                      if (chk.test($("#rel_program_review-"+i).val())) 
                      {
                         
                      }                      
                      else
                      {
                      extra_program_review_compl3 = 0;
                        $("#rel_program_review-"+i).css('border-color','');
                        if (rel_program_review == '') 
                        {
                           rel_program_review = $("#rel_program_review-"+i).val();
                        }
                        else
                        {
                          rel_program_review = rel_program_review+';'+$("#rel_program_review-"+i).val();
                        }
                      }
                    }
                    var chk_cmnts5 = 0;var rel_program_review_status = '';
                    for (var i = 0; i < 2; i++) {
                      var k=i+3;
                        if (rel_program_review_status == '') 
                        {
                           rel_program_review_status = $("#rel_prg_status_mgr-"+k+" option:selected").text();
                        }
                        else
                        {
                          rel_program_review_status = rel_program_review_status+';'+$("#rel_prg_status_mgr-"+k+" option:selected").text();
                        }
                      }
                      //alert(rel_program_review);
                      var base_url = window.location.origin;
                        str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                        str1 = $("#emp_code").text().replace(/\s+/g, '');
                        //str1='123456';
                        //alert(str1);
                       //$("#error_spec1").text("");
                        var detail_data = {
                            prgrm_cmd: prgrm_cmd,
                            program_status: program_status,
                            extra_prgrm_cmd: extra_prgrm_cmd,
                            extra_program_status: extra_program_status,
                            rel_program_review:rel_program_review,
                            rel_program_review_status:rel_program_review_status,
                            project_mid_review:$(".project_mid_review").val(),
                            project_mid_status:$(".project_mid_status").find(':selected').val(),
                            emp_code : str1,
                            Reporting_officer1_id: str
                        };                       
                        $.ajax({
                            'type' : 'post',
                            'datatype' : 'html',
                            'data' : detail_data,
                            'url' : base_url+$("#basepath").attr('value')+'/index.php/IDP/mid_save_data',
                            success : function(data)
                            {
                              //alert(data);
                            }
                        });
  }
</script>
<?php

  $IDPForm =new IDPForm;
  $employee = new EmployeeForm; 
  $where = 'where Employee_id = :Employee_id AND goal_set_year= :goal_set_year';
  $list = array('Employee_id','goal_set_year');
  $data = array(Yii::app()->user->getState('emp_id_3'),Yii::app()->user->getState('financial_year_check'));
  $IDP_data = $IDPForm->get_idp_data($where,$data,$list);
//print_r(Yii::app()->user->getState('emp_id_3'));die();
  $where = 'where Employee_id = :Employee_id';
  $list = array('Employee_id');
  $data = array(Yii::app()->user->getState('emp_id_3'));
  $emp_data = $employee->get_employee_data($where,$data,$list);

  $program_data =new ProgramDataForm;
  $Compare_Designation =new CompareDesignationForm; 
  $IDPForm =new IDPForm;    
  $where = 'where  goal_set_year =:goal_set_year';
  $list = array('goal_set_year');
  $data = array(Yii::app()->user->getState('financial_year_check'));
  $program_data_result = $program_data->get_kpi_data($where,$data,$list);
  //print_r($program_data_result);die();
  

  $designation_flag = 0;

  if(isset($employee_data['0']['Designation']) && $employee_data['0']['Designation'] != '') {
    $where = 'where designation = :designation';
    $list = array('designation');
    $data = array($employee_data['0']['Designation']);
    $Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
    if (isset($Compare_Designation1['0']['flag'])) {
      $designation_flag = $Compare_Designation1['0']['flag'];
    }
    
  }
?>
<lable id="compare_designation" style="display: none"><?php if(isset($designation_flag)) { echo $designation_flag; } ?></lable>
   <style type="text/css">
       
       table.mid-table td { border:1px solid red; height:37px;min-height: 190px;max-height: auto}
       table.mid-table th { border:1px solid red; height:37px;min-height: 190px;max-height: auto}

       table.mid-table1 td { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       table.mid-table1 th { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       </style>
       <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Mid Review</h1>

                        </div>
                        
                        <label id="dotted_mgr"><?php if (isset($employee_data['0']['Reporting_officer2_id']) && $employee_data['0']['Reporting_officer2_id']!='' && $employee_data['0']['Reporting_officer2_id'] == Yii::app()->user->getState("employee_email")){ echo "1";} else{ echo "0";}?></label>
                         <h4 style="float: right;"><?php  if(isset($employee_data['0']['Emp_fname'])) { echo 'Employee Name : '.$employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'].' / '; } ?>
                             <lable style="float: right;"><?php if(isset($employee_data['0']['Department'])) { echo 'Department : '.$employee_data['0']['Department']; } ?></lable>
                        </h4>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <script type="text/javascript">
                  $(function(){
                    $("body").on('keyup','.validate_field',function(){
                       var chk = /[;]/;
                        if (chk.test($(this).val())) 
                        {
                            $("#err").css('display','block');
                            $("#err").addClass("alert-danger"); 
                            $(this).css('border','1px solid red');
                            $("#err").text("Midyear review text should not contain special characters like ;");
                        }
                        else if ($(this).val().length>500) 
                        {
                            $("#err").css('display','block');
                            $("#err").addClass("alert-danger"); 
                            $(this).css('border','1px solid red');
                            $("#err").text("Midyear review should contain maximum 500 characters.");
                        }
                        else
                        {
                          $(this).css('border','1px solid #999');
                          $("#err").css('display','none');
                        }
                    });
                  });
                </script>
                                        
           
                <div class="container-fluid" style='background: #EFF3F8 none repeat scroll 0% 0%;'>
                <div class="page-content" > 
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">                       
                        <!-- Sidebar Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                        </button>
                        <!-- Sidebar Toggle Button -->
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->                           
                            <!-- END PAGE SIDEBAR -->
                            
                            <div class="page-content-col">
                            <div id="err" style="display: none"></div>
                             <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Midreview1"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a><br><br>
                                <!-- BEGIN PAGE BASE CONTENT -->                                
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                        
                                        
                                                                    
                                        <?php   
$kpi_id_data = '';
                                         if (isset($kpi_data) && count($kpi_data)>0) { $cnt1 = 0;
                                               foreach ($kpi_data as $row) {  ?>   
                                               <label id="total_kra_number" style="display: none"><?php echo count($kpi_data); ?></label>
                                            <?php
                                                if ($kpi_id_data == '') {
                                                   $kpi_id_data = $row['KPI_id'];
                                                }
                                                else
                                                {
                                                    $kpi_id_data = $kpi_id_data.';'.$row['KPI_id'];
                                                }
                                            ?> 

                                        <div class="portlet box border-blue-soft bg-blue-soft sample_editable_1" id="output_div_<?php echo $row['KPI_id']; ?>"  style="margin-top: 10px;border: 1px solid grey;">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <?php if(isset($employee_data['0'][$cnt1]['Emp_fname']) && $employee_data!=0) { echo $employee_data['0'][$cnt1]['Emp_fname']; }?></div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>      
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                            
                                               <table class="mid-table table table-striped table-hover table-bordered sample_editable_1" id="sample_editable_1" style="margin-top: 45px;">
                                                      <tr>
                                                            <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Description</font></b></td>
                                                            <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $row['KRA_description'];?></td>
                                                        </tr>
                                                    <tr>
                                                            <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>Category</font></b></td>
                                                            <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $row['KRA_category'];?></td>
                                                    </tr>
<tr>
                                                            <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>Weightage</font></b></td>
                                                            <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $row['target'];?></td>
                                                    </tr>
                                                    <tr>
                                                <td align="left" valign=middle><b><font face="Calibri" size=3>Key Performance Indicators (KPI) Description</font></b></td>
                                                <td align="left" valign=middle><b><font face="Calibri" size=3>KPI Value</font></b></td>
<td align="left" valign=middle><b><font face="Calibri" size=3>Mid review status by Employee</font></b></td>
<td align="left" valign=middle ><b><font face="Calibri" size=3>Employee Comments</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Mid Review Status</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Mid Review Comments</font></b></td>
                                               
                                            </tr>
                                                   <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']);
                                                                $employee_comment = explode(';',$row['employee_comment']);
                                                                $appr_comment = explode(';',$row['appraiser_comment']);
                                                                $appr_status = explode(';',$row['mid_KRA_status']);
                                                                $appr_status1 = explode(';',$row['mid_emp_status']);
                                                                
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
                                                               //print_r($appr_comment);die();
                                                                //print_r($kpi_list_data);die();
                                                            ?>
                                                     
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_unit[$i]!='Select') { $cnt++;
                                                            ?>
                                                                <style type="text/css">
                .popover{
   min-width:30px;
  
   max-width:400px;
   word-break: break-all;
   border:1px solid #4c87b9;
}
            </style>
                                                                <tr id="review_state-<?php echo $row['KPI_id'].$i?>">
                                                                    <td><lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $kpi_list_data[$i];echo""; ?>"><?php echo strlen($kpi_list_data[$i]) >= 20 ? 
substr($kpi_list_data[$i], 0, 20) . ' >>' : 
$kpi_list_data[$i]; ?></lable></td>
                                                                   
                                                                    <td>
<div style="overflow-x: auto;width: 254px;">
                                                                      <?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                                 <tr>
                                                                                 <td colspan="2"><b><font face="Calibri" size=3>KPI Unit</font></b></td>
                                                                                  <td colspan="1"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                                  <td colspan="1"><b><font face="Calibri" size=3>Unit value</font></b></td>
                                                                                  <td colspan="1"><?php echo $kpi_list_target[$i]; ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr>
                                                                                    <td><?php echo round($kpi_list_target[$i]*0.69,2); ?></td>
                                                                                    <td><?php echo round($kpi_list_target[$i]*0.70,2); ?></td>
                                                                                       
                                                                                     <td><?php echo round($kpi_list_target[$i]*0.96,2); ?></td>
                                                                                        
                                                                                    <td><?php echo round($kpi_list_target[$i]*1.06,2); ?></td>
                                                                                        
                                                                                     <td><?php echo round($kpi_list_target[$i]*1.39,2); ?></td>
                                                                                   </tr>
                                                                                 </table>                                                                                       
                                                                        <?php
                                                                            }
                                                                            else if ($kpi_list_unit[$i] == 'Date') {
                                                                                ?>
                                                                 <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                               ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                               <tr>
                                                                                  <td colspan="3"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                   <td colspan="2"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr>                                                                    
                                                                              <?php
                                                                               for ($l=0; $l < count($value_data); $l++) { ?>
<td><?php echo $value_data[$l]; ?></td>
                                                                              <?php } ?>
                                                                               </tr>
                                                                               </table>                                                                                      
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                               ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                               <tr>
                                                                                  <td colspan="3"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                   <td colspan="2"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr>                                                                    
                                                                              <?php
                                                                               for ($l=0; $l < count($value_data); $l++) { ?>
<td><lable data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="<?php echo $value_data[$l]; ?>"><?php echo strlen($value_data[$l]) >= 20 ? 
substr($value_data[$l], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
$value_data[$l]; ?></lable></td>
                                                                              <?php } ?>
                                                                               </tr>
                                                                               </table>
                                                                               <?php
                                                                            }
                                                                        ?></div></td>
                                                                         <td>
                                                                            <?php   
                                                                    $select = '';$status = '';
                                                                    $status = '';
                                                                    if (isset($appr_status1[$i]) && $appr_status1[$i] != '') {
                                                                        $select = 0;
                                                                        $status[$appr_status1[$i]] = array('selected' => true); 
                                                                    }
                                                                    else
                                                                    {
                                                                         $select = '';
                                                                         $status['Select'] = array('selected' => true);
                                                                    }

                                                                    
                                                                    $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if((isset($row['mid_KRA_final_status']) && $row['mid_KRA_final_status'] != 'Approved')) 
{
                                                                    echo CHtml::dropDownList("mid_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control mid_status_type-".$row['KPI_id'].$i,'options' => $status,'disabled'=>"true"));
}
else
{
echo CHtml::dropDownList("mid_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control mid_status_type-".$row['KPI_id'].$i,'options' => $status,'disabled'=> "true"));
}
                                                                 ?>
                                                                            
                                                                        </td>
                                                                    <td>
                                                                        <?php
                                                                            $emp_comment = '';
                                                                             if (isset($employee_comment[$i]) && $employee_comment[$i] != '') {
                                                                               $emp_comment = $employee_comment[$i];
                                                                            }
                                                                             else
                                                                            {
                                                                                $emp_comment = '';
                                                                             }
                                                                        ?>
                                                                        <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $emp_comment;echo""; ?>"><?php echo strlen($emp_comment) >= 20 ? 
substr($emp_comment, 0, 20) . ' >>' : 
$emp_comment; ?></lable>

                                                                  </td>
                                                                    <td>
                                                                        <?php   
                                                                    $select = '';$status = '';
                                                                    $status = '';
                                                                    if (isset($appr_status[$i]) && $appr_status[$i] != '') {
                                                                        $select = 0;
                                                                        $status[$appr_status[$i]] = array('selected' => true); 
                                                                    }
                                                                    else
                                                                    {
                                                                         $select = '';
                                                                         $status['Select'] = array('selected' => true);
                                                                    }

                                                                    
                                                                    $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if((isset($row['mid_KRA_final_status']) && $row['mid_KRA_final_status'] != 'Approved')) 
{
                                                                    echo CHtml::dropDownList("kpi_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control kpi_status_type-".$row['KPI_id'].$i,'options' => $status));
}
else
{
echo CHtml::dropDownList("kpi_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control kpi_status_type-".$row['KPI_id'].$i,'options' => $status,'disabled'=> "true"));
}
                                                           ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            $apr_comment = '';
                                                                            if (isset($appr_comment[$i]) && $appr_comment[$i] != '') {
                                                                                $apr_comment = $appr_comment[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                                $apr_comment = '';
                                                                            }
                                                                            
                                                                   
if((isset($row['mid_KRA_final_status']) && $row['mid_KRA_final_status'] != 'Approved')) 
{
echo CHtml::textArea("review_comment",$apr_comment,$htmlOptions=array('class'=>"form-control validate_field review_comment".$row['KPI_id'].$i."",'style'=>"max-height: 58px;min-height: 58px;",'rows'=>2));
}
else
{
echo CHtml::textArea("review_comment",$apr_comment,$htmlOptions=array('class'=>"form-control validate_field review_comment".$row['KPI_id'].$i."",'style'=>"max-height: 58px;min-height: 58px;",'rows'=>2,'disabled'=> "true"));
}
                                                                        ?>
                                                                    </td>                                                      
                                                                </tr>
                                                                <?php
                                                                   } } 
                                                            ?>

<tr>
<td id="error_spec<?php echo $row['KPI_id']; ?>" colspan="5" style="color:red"></td>
</tr>
                                                               <!--  <i id="updation_spinner-<?php echo $row['KPI_id']; ?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;display: none"></i> -->                                                                        
                                                  

                                                     <label id="get_kpi_count-<?php echo $row['KPI_id']; ?>" style="display: none"><?php echo $kpi_data_data; ?></label>                                                    
                                                    
                                                    
                                                </table>                             
                                            </div>
                                        </div>
                                         <?php 
                                           $cnt1++;  } }   
                                        ?>
                                                               <?php 
       if (isset($kpi_data['0']['mid_year_goalsheet_doc']) && $kpi_data['0']['mid_year_goalsheet_doc'] != '') {
?>
<a href="<?php echo 'http://kritvainvestments.com/pmsuser/data(proof)/'.$kpi_data['0']['mid_year_goalsheet_doc']; ?>" target="_new"><label style="margin-top: -64px;
margin-left: 15px;"><?php echo "Goalsheet Document"; ?></label></a>
<?php } ?>
<?php
                                $employee_name = '';
                                    if(isset($employee_data['0']['Emp_fname'])) {
                                    $employee_name = $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'];
                                }
                                ?>
<div   class="portlet box bg-blue-soft border-blue-soft" <?php if(isset($show_idp) && count($show_idp)>0 && $show_idp != ''){ ?>style="min-width: 900px;border: 1px solid;display:block"<?php }else{ ?>style="min-width: 900px;border: 1px solid;display:none"<?php } ?>>
                                            <div class="portlet-title">
                                                <div class="caption">
                                                Midyear review IDP
                                                   </div>
                                                   <div class="tools">
                                                            <a href="javascript:;" class="collapse"></a>
                                                    </div>
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
                                                      <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Employee Name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                          <?php 
                                                          if(isset($emp_data)&& count($emp_data)>0){
                                                                echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
                                                                } ?>
                                                                                                           
                                                        
                                                        </div>
                                                        <div class="col-md-2"><label class="col-md-2">
                                                       <span class="bold">Manager’s name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                        <?php 
                                                        //print_r($mgr_data);die();
                                                        if(isset($mgr_data) && count($mgr_data)>0){
                                                             echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Employee Code</span></label>
                                                  </div>
                                                        <div class="col-md-4">                                                        
                                                           <?php  if(isset($emp_data)&& count($emp_data)>0){
                                                           echo $emp_data[0]['Employee_id'];   }?> 
                                                        </div>
                                                        
                                                        <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Date</span></label></div>

                                                        <div class="col-md-4">
                                                        <?php 
                                                           $today = date('d-m-Y'); 
                                                         echo Yii::app()->user->getState('financial_year_check');  ?>
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                <div class="portlet light form-fit ">
                                                    <div class="portlet-title">
                                                  <div class="caption">
                                               
                                                <span class="caption-subject  bold uppercase" style="color:#337ab7;font-size: 12px;">Please discuss your strengths and work related weaknesses with your manager and identify your training needs. Your development will happen through the following ways:</span><br><br>                                                
                                                <span style="color:#337ab7;font-size: 14px;" class="bold"><lable style="color: red">*</lable>Mandatory for all employees to attend this program
                            <br><lable style="color: red">**</lable>Mandatory for employees working at locations covered by the certifications</span>
                                            </div>
                                        </div>

                                              <div class="form-group">
                                                     
<div style="height: 43px;background-color: #4f7ab7;
width: 100%;">&nbsp;&nbsp;
<span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part A: Development through Instructor led training in Classroom</span><br>
</div>
                                                   </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="#" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                <label id="total_prog" style="display: none"><?php if(isset($program_data_result) && count($program_data_result)>0) { echo count($program_data_result);} ?></label>
                                                    <table class="table table-bordered table-hover" id="maintable">
                                    <thead>
                                        <th>Name of program</th>
                                        <th>Faculty</th>
                                        <th>Days</th>                                        
                                        <th>Please explain why the training is needed</th>
                                        <th>Progress on training programs (Employee)</th>
                                        <th>Employee Comments</th>
                                        <th>Program completed</th>
                                        <th>Review</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                     $compulsory = '';$program_state = '';$program_cmnt = '';$state1 = 0;$review_state = '';$program_state1 = '';$not_undefine = '';$extra_program_review_by_emp = '';$program_review_by_emp = '';
                                      $set_flag = 'disabled';
                                      if(isset($IDP_data['0']['midyear_status_flag']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved')
                                      {
                                      $set_flag = "'disabled'=>'<?php echo $set_flag; ?>'";
                                      } 
                                      $set_flag1 = "'disabled'= 'false'";
                                      if(isset($IDP_data['0']['midyear_status_flag']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved')
                                      {
                                      $set_flag1 = "'disabled'= 'true'";
                                      } 
                                      //print_r($IDP_data['0']['extra_program_review_by_emp']);die();
                                      if (isset($IDP_data['0']['extra_program_review_by_emp'])) {
                                           $extra_program_review_by_emp = explode(';',$IDP_data['0']['extra_program_review_by_emp']);
                                      }
                                      $cmt2 =array();
                                    if (isset($program_data_result) && count($program_data_result)>0) {
                                        for ($i=0; $i < count($program_data_result); $i++) { 
                                        if (isset($IDP_data['0']['program_comment'])) {
                                            $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                                        }   
                                         
                                         //print_r($extra_program_review_by_emp);die();
                                         if (isset($extra_program_review_by_emp[$i])) {
                                             $extra_program_review_by_emp0 = $extra_program_review_by_emp[$i];
                                        }
                                         $cmnt = '';
//print_r($cmt2);die();

                                          if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                                                if (isset($cmt2) ) {
                                                 
                                              
                                                      for ($j=0; $j < count($cmt2); $j++) {
                                                          $cmt1 = explode('?', $cmt2[$j]);
                                                              if(isset($cmt1[1])){
                                                                  if ($i == $cmt1[0]) {                                                            
                                                                       $cmnt = $cmt1[1];
                                                                       //$state = $cmt1[0];
                                                                       // $review_state = $program_cmnt[$state];
                                                                  }
                                                              }
                                                      }
                                                 }
                                            }
                                            else
                                            {
                                                $cmnt = '';
                                                //$review_state = '';
                                            }

// print_r($cmt2);
// print_r($cmnt);die();

                                            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_review_by_emp']) && $IDP_data['0']['program_review_by_emp'] != '') {
                                                    $program_review_by_emp_value = explode(';', $IDP_data['0']['program_review_by_emp']);  
                                                    for ($j=0; $j < count($program_review_by_emp_value); $j++) 
                                                    {
                                                        $program_review_by_emp_value1 = explode('?', $program_review_by_emp_value[$j]);
                                                        if ($i == $program_review_by_emp_value1[0]) {                                                            
                                                             $program_review_by_emp = $program_review_by_emp_value1[1];
                                                        }
                                                    }   
                                                    //$program_review_by_emp = $program_review_by_emp_value[$i];
                                            }
                                            else
                                            {
                                                $program_review_by_emp = '';
                                                //$review_state = '';
                                            }

                                            if (isset($IDP_data['0']['mid_prgrm_cmd'])) 
                                            {
                                              $program_state = explode(';',$IDP_data['0']['mid_status']);
                                              $program_cmnt = explode(';',$IDP_data['0']['mid_prgrm_cmd']);
                                              
                                              if (isset($state1) && isset($program_cmnt[$state1])) {
                                                $review_state = isset($program_cmnt[$i]) ? $program_cmnt[$i] : "";
                                                $program_state1 = isset($program_state[$state1]) ? $program_state[$state1] : "";
                                              }
                                            }
                                            else
                                            {
                                              $review_state = '';
                                              $program_state1 = '';
                                            } 

                                            if (isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] != 0) {
                                                if ($compulsory == '') {
                                                   $compulsory = $i;
                                                }
                                                else
                                                {
                                                    $compulsory = $compulsory.';'.$i;
                                                }
                                            }
                                            if ($cmnt != '' && $cmnt != 'undefined') {
                                                
                                              ?>
                                            <tr class="error_row_chk">                                                               
                                                <td class="prog_name" id="<?php echo $i; ?>"> <?php echo $program_data_result[$i]['program_name']; ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?></td>
                                                <td> <?php if(isset($program_data_result[$i]['faculty_name'])) {echo $program_data_result[$i]['faculty_name']; }?> </td>
                                                <td> <?php echo $program_data_result[$i]['training_days']; ?> </td>
                                                <td class="col-md-2">
                                                <?php 
                                                    echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,'disabled'=> "true"));
                                                ?> </td>
                                                <td>
                                                    <?php 
                                                    if(isset($IDP_data['0']['mid_emp_trn_prog_stat']))
                                                    {
                                                       $appr_status1 = explode(';',$IDP_data['0']['mid_emp_trn_prog_stat']);
                                                    }
                                                   //print_r($IDP_data);die();
                                                    //$appr_status1 = explode(';',$IDP_data['0']['mid_emp_trn_prog_stat']);
                                          //print_r($appr_status1);die();
                                                      $select = '';$status = '';
                                                                    $status = '';
                                                                    if (isset($appr_status1[$i]) && $appr_status1[$i] != '') {
                                                                        $select = 0;
                                                                        $status[$appr_status1[$i]] = array('selected' => true); 
                                                                    }
                                                                    else
                                                                    {
                                                                         $select = '';
                                                                         $status['Select'] = array('selected' => true);
                                                                    }
                                                    $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::dropDownList("tot_prog_status_emp-".$i,'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control tot_prog_status_emp-".$i,'style'=>"width: 186px;",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("tot_prog_status_emp-".$i,'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control tot_prog_status_emp-".$i,'style'=>"width: 186px;",'options' => $status));
}
                                                    ?>
                                                </td>
                                                <td>
                                                  <?php 
                                                    echo CHtml::textField('program_review_by_emp',$program_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_review_by_emp",'id'=>'program_review_by_emp-'.$i,'disabled'=> "true"));
                                                ?>
                                                </td>                                                    

                                                 <td>
                                                    <?php 
                                                   //print_r($IDP_data['0']['mid_status']);die();
                                                    if(isset($IDP_data['0']['mid_status']))
                                                    {
                                                         $appr_status1 = explode(';',$IDP_data['0']['mid_status']);
                                                    }
                                                    else{
                                                      $appr_status1=array();
                                                    }
//print_r($appr_status1);die();
                                                      $select = '';$status = '';
                                                                    $status = '';
                                                                    if (isset($appr_status1[$i]) && $appr_status1[$i] != '') {
                                                                        $select = 0;
                                                                        $status[$appr_status1[$i]] = array('selected' => true); 
                                                                    }
                                                                    else
                                                                    {
                                                                         $select = '';
                                                                         $status['Select'] = array('selected' => true);
                                                                    }

                                                    $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::dropDownList("tot_prog_status_mgr-".$i,'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control tot_prog_status_mgr-".$i,'style'=>"width: 186px;",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("tot_prog_status_mgr-".$i,'',$review_type,$htmlOptions=array('class'=>"form-control tot_prog_status_mgr-".$i,'style'=>"width: 186px;",'options' => $status));
}
                                                    ?>
                                                <td class="col-md-4">
                                                <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::textField('program_review',$review_state,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 program_review",'id'=>'program_review-'.$i,$set_flag));
}
else
{
echo CHtml::textField('program_review',$review_state,$htmlOptions=array('class'=>"form-control col-md-4 program_review",'id'=>'program_review-'.$i,$set_flag));
}
                                                    
                                                ?> </td>
                                            </tr>
                                            <?php 
                                            $not_undefine++;
                                            $state1++;
                                       }
                                    }
                                    }
//print_r($program_cmnt);die();
                                    ?>
                                    <label id="program_count" style="display: none"><?php echo $not_undefine; ?></label>
                                    <label id="compulsory_id" style="display: none"><?php echo $compulsory; ?></label>
                                    </tbody>

                                 </table>     
                                                </div>
                                                        <div class="form-group error_row_chk2">
<?php 
                                                 if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic']) && $IDP_data['0']['extra_topic'] != '') {
                                                                   
                                                 ?>
                                                    <label class="col-md-12 control-label">
                                                      <span style="color:#337ab7;font-size: 14px;float: left;" class="bold">If you need a program that is not mentioned above, please use the space below. Please note this program may be offered if at least 20 people request for it. 
                                                    </span></label>
<?php } ?>
                                                    <br>
                                                </div>
                                                <?php 
                                                $count = '';$count_value = '';
                                                 if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic']) && $IDP_data['0']['extra_topic'] != '') {
                                                                    //$count = explode(';',$IDP_data['0']['extra_topic']);
                                                  if (isset($IDP_data['0']['rel_program_review'])) {
                                                   $count = explode(';',$IDP_data['0']['rel_program_review']);
                                                  }
                                                  if (isset($IDP_data['0']['extra_topic'])) {
                                                   $count_extra = explode(';',$IDP_data['0']['extra_topic']); ///////////////////// change by monica
                                                  }
                                                                    
                                                                    //print_r($count_extra);die();
                                                   ?>
                                                 <div class="form-group">                                                         
                                                            <div class="col-md-2 bold">
                                                              Topics required
                                                            </div>
                                                            <div class="col-md-2 bold">No. of days</label></div>
                                                            <div class="col-md-2 bold">
                                                             Internal faculty name
                                                            </div>
                                                            <div class="col-md-2 bold">
                                                             Employee Comments
                                                            </div>
                                                            <div class="col-md-2 bold">
                                                             Program Completed
                                                            </div>
                                                            <div class="col-md-2 bold">
                                                             Reviews
                                                            </div>
                                                  </div>
                                                 <?php 
                                                 $extra_prgrm_cmd = '';$extra_program_status = '';$extra_prgrm_cmd1 = '';$extra_program_status1 = ''; $extra_program_status2 = ''; $extra_program_status3 = '';$rel_prgrm_cmd1 = '';$rel_prgrm_cmd2 = '';
                                                 $rel_program_review_by_emp = '';$rel_program_emp_cmd1 = '';
                                                    if ($count_extra != "") {
                                                      for ($m=0; $m < count($count_extra); $m++) {  

                                                        if ($count_extra[$m] != '' && $count_extra[$m] != 'undefined') {
                                                        $count_value++;
                                                        $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                        $extra_prgrm_cmd = explode(';',$IDP_data['0']['extra_prgrm_cmd']);
                                                        $extra_program_status = explode(';',$IDP_data['0']['extra_program_status']);
                                                        $rel_program_status2 = explode(';',$IDP_data['0']['rel_program_review_status']);
                                                        $rel_program_status3 = explode(';',$IDP_data['0']['rel_program_review']);
                                                        //print_r($extra_program_status);die();
                                                       // print_r($rel_program_status3);die();
                                                        if (isset($IDP_data['0']['rel_program_review_by_emp'])) {
                                                             $rel_program_review_by_emp = explode(';',$IDP_data['0']['rel_program_review_by_emp']);
                                                        }
                                                        if (isset($rel_program_review_by_emp[0])) {
                                                          //$rel_program_emp_cmd = $rel_program_review_by_emp[0];
                                                          $rel_program_emp_cmd0 = $rel_program_review_by_emp[0];
                                                        }
                                                        if (isset($rel_program_review_by_emp[1])) {
                                                          //$rel_program_emp_cmd = $rel_program_review_by_emp[1];
                                                          $rel_program_emp_cmd1 = $rel_program_review_by_emp[1];
                                                        }
                                                        else
                                                        {
                                                          $rel_program_emp_cmd = '';
                                                           $rel_program_emp_cmd1 = '';
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
                                                        if (isset($rel_program_status2[0])) {
                                                          $extra_program_status2 = $rel_program_status2[0];
                                                          $rel_prgrm_cmd1 = $rel_program_status3[0];
                                                        }
                                                        else
                                                        {
                                                          $extra_program_status2 = '';
                                                          $rel_prgrm_cmd1 = '';
                                                        }
                                                        if (isset($rel_program_status2[1])) {
                                                          $extra_program_status3 = $rel_program_status2[1];
                                                          if (isset($rel_program_status3[1])) {
                                                            $rel_prgrm_cmd2 = $rel_program_status3[1];
                                                          }
                                                          
                                                        }
                                                        else
                                                        {
                                                          $extra_program_status3 = '';
                                                           $rel_prgrm_cmd2 = '';
                                                        }    
                                                        //echo $rel_prgrm_cmd1;die();                                                   
                                                    ?>
                                                      <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-2">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                         // $topic = $topic1[$m];                                                                
                                                         // $day = $day1[$m];   
                                                         if(isset($topic1[$m]))
                                                         {
                                                           $topic = $topic1[$m]; 
                                                         }
                                                         if(isset($day1[$m]))
                                                         {
                                                          $day = $day1[$m];      
                                                         }
                                                         if(isset($faculty2[$m]))
                                                         {
                                                            $faculty[$faculty2[$m]] = array('selected' => 'selected');
                                                         }   
                                                         if (isset($extra_program_review_by_emp[$m])) {
                                                             $extra_program_review_by_emp0 = $extra_program_review_by_emp[$m];
                                                        }                    
                                                         //$faculty[$faculty2[$m]] = array('selected' => 'selected');
                                                         echo CHtml::textField('topic'.$m,$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic".$m,'disabled'=> "true")); ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo CHtml::textField('days_required'.$m,$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required".$m,'disabled'=> "true")); ?> 
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
                                                        <div class="col-md-2">
                                                        <label><?php echo $extra_program_review_by_emp0; ?></label>
                                                        </div>
                                                        <div  class="col-md-2">
<?php
if(isset($IDP_data['0']['midyear_status_flag']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
?>
<input type="radio" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="Yes" class='extra_completeion_type<?php echo $m; ?>' <?php if($extra_program_status1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="No" class='extra_completeion_type<?php echo $m; ?>' <?php if($extra_program_status1 == 'No') { ?>checked='check'<?php } ?>>No
<?php
}
else
{
 ?>
<input type="radio" <?php echo $set_flag1; ?> name='extra_completeion_type<?php echo $m; ?>' value="Yes" class='extra_completeion_type<?php echo $m; ?>' <?php if($extra_program_status1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" <?php echo $set_flag1; ?> name='extra_completeion_type<?php echo $m; ?>' value="No" class='extra_completeion_type<?php echo $m; ?>' <?php if($extra_program_status1 == 'No') { ?>checked='check'<?php } ?>>No
<?php
}
?>
                                                         
                                                        <?php
                                                            // echo CHtml::RadioButton('extra_completeion_type'.$m, 'Yes', array(
                                                            //     'value'=>'Yes','class'=>'extra_completeion_type'.$m, 'uncheckValue'=>null
                                                            // )).' Yes ';
                                                            // echo CHtml::RadioButton('extra_completeion_type'.$m, 'No', array(
                                                            //     'value'=>'No','class'=>'extra_completeion_type'.$m,'uncheckValue'=>null
                                                            // )).' No '; 
                                                            ?> 
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::textField('extra_program_review',$extra_prgrm_cmd1,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-2 extra_program_review",'id'=>'extra_program_review-'.$m,$set_flag));
}
else
{
echo CHtml::textField('extra_program_review',$extra_prgrm_cmd1,$htmlOptions=array('class'=>"form-control col-md-2 extra_program_review",'id'=>'extra_program_review-'.$m));
}
                                                            
                                                        ?> </div>
                                                        <div class="col-md-0" <?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['set_status']) && $IDP_data['0']['set_status'] == 'Pending') { ?>style="display: block;"<?php }else { ?> style="display: none;" <?php }?>>
                                                            <!-- <i class="fa fa-trash-o del_extra_program" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="<?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['Employee_id'])) { echo 'del_extra_program-'.$IDP_data['0']['Employee_id'].$l;
                                                        }?>" title="Delete" aria-hidden="true"></i> -->
                                                        </div>
                                                    </div>

                                                  <?php    }
                                                    }
                                                  }
                                                }
                                                 ?>
                                                  <label id="program_count" style="display: none"><?php echo $not_undefine; ?></label>

                                                    </div>
                                                     <div id="new_topic">
                                                     </div>
                                                <div class="form-group">
                                                <div class="col-md-12 bold">
                                                <?php
                                                  if(isset($IDP_data) && count($IDP_data)>0 && $IDP_data['0']['set_status']!='Approved')
                                                  { ?>
                                                      <!-- <button type="button" class="btn btn-primary add_program" id="<?php echo $count_value.'-'.$IDP_data['0']['Employee_id']; ?>" style="float: left;">Add Program</button> -->
                                                <?php  }
                                                ?>    
                                                <lable id="error_spec1"  style="color: red;float: right;"></lable></div>
                                                <lable id="extra_program_count"  style="color: red;float: right;display: none"><?php echo $count_value; ?>
                                                </lable></div>
                                                </div>

                                    <?php 
                                          if (isset($IDP_data['0']['rel_program_review_status'])) {
                                            $rel_program_status2 = explode(';',$IDP_data['0']['rel_program_review_status']);
                                          }
                                          if (isset($IDP_data['0']['rel_program_review'])) {
                                            $rel_program_status3 = explode(';',$IDP_data['0']['rel_program_review']);
                                          }
                                           
                                           //die();
                                           //print_r($rel_program_status3);die();
                                           if(isset($rel_program_status3['0']) && $rel_program_status3['0'] !=''){
                                            $rel_prgrm_cmd1=$rel_program_status3['0'];
                                           }
                                           else{
                                            $rel_prgrm_cmd1='';
                                           }
                                           if(isset($rel_program_status3['1']) && $rel_program_status3['1'] !=''){
                                            $rel_prgrm_cmd2=$rel_program_status3['1'];
                                           }
                                           else{
                                            $rel_prgrm_cmd2='';
                                           }
                                           //$rel_prgrm_cmd1=$rel_program_status3['0'];
                                           //$rel_prgrm_cmd2=$rel_program_status3['1'];
                                    ?>
                                    <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit error_row_chk1">
                                        <div class="portlet-body form">
                                            <form action="#" id="form-username" class="form-horizontal form-bordered">
                                                   <div class="form-group">
                                                      <div class="col-md-12">

                                                        <label class="col-md-12 control-label" style="text-align:left;"><span class="bold" style="color:#337ab7;font-size: 14px;float: left;">
                                                    Note: Part B and Part C are to be filled by only AGM and above employees.     
                                                          </span>
                                                        </label>
                                                      </div>
<div style="height: 43px;background-color: #4f7ab7;margin-top: 63px;
width: 100%;">&nbsp;&nbsp;
<span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part B: Development through developmental relationships</span><br>
</div>
                                                   </div>
                                                   <div class="form-group">                                                        
                                                       <label class="control-label col-md-1 bold" style="text-align: left;">Relationship</label>
                                                        <label class="control-label col-md-1 bold">Name of leader</label>
                                                        <label class="control-label col-md-1 bold">Number of Meetings planned        </label>
                                                        <label class="control-label col-md-1 bold" style="text-align:center">Target date</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Progress on Coaching/Mentoring (Employee)</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Employee Comments</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Progress on Coaching/Mentoring (Manager)</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Review</label>
                                                    </div>
                                                    <style type="text/css">
                                                    /*.input-medium
                                                    {
                                                          width: 176px !important;
}
                                                    }*/
                                                    </style>
 <div class="form-group">
                                                        <label class="control-label col-md-1"  style="text-align: left;">Coaching through leader in own function for functional inputs</label>
                                                        
                                                        <div class="col-md-1">
                                                           <?php 
if (isset($IDP_data['0']['rel_program_review_by_emp'])) {
                                                             $rel_program_review_by_emp = explode(';',$IDP_data['0']['rel_program_review_by_emp']);
                                                        }
if (isset($rel_program_review_by_emp[0])) {
                                                          //$rel_program_emp_cmd = $rel_program_review_by_emp[0];
                                                          $rel_program_emp_cmd0 = $rel_program_review_by_emp[0];
                                                        }
                                                        if (isset($rel_program_review_by_emp[1])) {
                                                          //$rel_program_emp_cmd = $rel_program_review_by_emp[1];
                                                          $rel_program_emp_cmd1 = $rel_program_review_by_emp[1];
                                                        }
                                                        else
                                                        {
                                                          $rel_program_emp_cmd = '';
                                                           $rel_program_emp_cmd1 = '';
                                                        } 
                                                            $faculty3 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[0])) {
                                                                $faculty3 = $faclty[0];
                                                              }

                                                             
                                                            }
                                                            else{
                                                                $faculty3='';
                                                              }
                                                            
                                                             echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('class'=>"form-control col-md-2 faculty_email_id3",'id'=>'faculty_email_id3','disabled'=> "true"));
                                                            ?>
                                                          </div>
                                                       <div class="col-md-1">
                                                             <?php 
                                                              $meet = '';
                                                              if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                                                                $meet = explode(';',$IDP_data['0']['meeting_planned']);
                                                                $meet = $meet[0];
                                                              }
                                                              else
                                                              {
                                                                $meet = '';
                                                              }
                                                              echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('class'=>"form-control col-md-1 number_of_meetings3",'id'=>'number_of_meetings3','disabled'=> "true")); ?> 
                                                          </div>
                                                        <div class="col-md-1">
                                                            <div class="input-group input-medium date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
                                                            <?php
                                                                    if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); 

  ?>
                                                                       <input class="form-control target_date3" readonly="" type="text" value="<?php echo $rel2[0]; ?>"  id="target_date3" style="width:107px">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date3" readonly="" type="text"  id="target_date3" style="width:107px">
                                                                 <?php   }
                                                                ?>
                                                               
                                                            </div>
                                                        </div>
                                                      <div class="col-md-2">
                                                             <?php 
                                                             if(isset($IDP_data['0']['mid_rel_prg_rev_emp']))
                                                             {
                                                                $appr_status1 = explode(';',$IDP_data['0']['mid_rel_prg_rev_emp']);
                                                             }
                                                             
                                                      $select = '';$status = '';
                                                                    $status = '';
                                                                    if (isset($appr_status1['0']) && $appr_status1['0'] != '') {
                                                                        $select = 0;
                                                                        $status[$appr_status1['0']] = array('selected' => true); 
                                                                    }
                                                                    else
                                                                    {
                                                                         $select = '';
                                                                         $status['Select'] = array('selected' => true);
                                                                    }
                                                    $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::dropDownList("rel_prg_status_emp-3",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_emp-3",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("rel_prg_status_emp-3",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_emp-3",'options' => $status));
}
                                                    ?>
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                        <?php  
                                                        if (isset($rel_program_emp_cmd0)) {
                                                          echo CHtml::textArea('rel_program_review1_by_emp',$rel_program_emp_cmd0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review1_by_emp",'id'=>'rel_program_review1_by_emp-1','disabled'=> "true"));                                                      # code...
                                                        }                                                      
                                                            
                                                        ?> </div>
                                                        

                                                         <div  class="col-md-2">
                                                            <?php 
                                                            if (isset($IDP_data['0']['rel_program_review_status'])) {
                                                              $appr_status1 = explode(';',$IDP_data['0']['rel_program_review_status']);
                                                            }
                                                            
                                                            //  print_r($appr_status1);
                                                            $select = '';$status = '';
                                                            $status = '';
                                                            if (isset($appr_status1['0']) && $appr_status1['0'] != '') {
                                                            $select = 0;
                                                            $status[$appr_status1['0']] = array('selected' => true); 
                                                            }
                                                            else
                                                            {
                                                            $select = '';
                                                            $status['Select'] = array('selected' => true);
                                                            }
                                                            $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
                                                            if (isset($IDP_data['0']['midyear_status_flag']) && $IDP_data['0']['midyear_status_flag'] != 'Approved') 
                                                            {
                                                            echo CHtml::dropDownList("rel_prg_status_mgr-3",'',$review_type,$htmlOptions=array('class'=>"form-control rel_prg_status_mgr-3",'options' => $status,$set_flag));
                                                            }
                                                            else
                                                            {
                                                            echo CHtml::dropDownList("rel_prg_status_mgr-3",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_mgr-3",'options' => $status));
                                                            }
                                                            ?>
                                                        <!--<input type="radio" disabled="true" name='rel_completeion_type1' value="Yes" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes-->
                                                        <!--<input type="radio" disabled="true" name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No                                                       -->
                                                        </div> 
                                                         <div class="col-md-2">
                                                        <?php 
                                                        if(isset($rel_prgrm_cmd1))
                                                        {
                                                          $rel_prgrm_cmd1 = $rel_prgrm_cmd1;
                                                        }
                                                        else
                                                        {
                                                          $rel_prgrm_cmd1 = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-2 rel_program_review",'id'=>'rel_program_review-0'));
}
else
{
echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('class'=>"form-control col-md-2 rel_program_review",'id'=>'rel_program_review-0'));
}
                                                            
                                                        ?> </div>
                                                    </div>

                                                    <div class="form-group">                                                        
                                                        <label class="control-label col-md-1"  style="text-align: left;">Mentoring through leader from different function for behavioural inputs</label>
                                                        <div class="col-md-1">
                                                            <?php 
                                                            $faculty4 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[1])) {
                                                                $faculty4 = $faclty[1];
                                                              }
                                                              //$faculty4[$faclty[1]] = array('selected' => 'selected');
                                                            }
                                                            //  $reporting_list = new EmployeeForm();
                                                            //  $records = $reporting_list->get_appraiser_list1();
                                                            //  for ($k=0; $k < count($records); $k++) { 
                                                            //     $where = 'where Email_id = :Email_id';
                                                            //     $list = array('Email_id');
                                                            //     $data = array($records[$k]['Email_id']);
                                                            //     $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                                            //  }
                                                            //  $Cadre_id = array(); 
                                                            //  if (isset($Reporting_officer_data)) 
                                                            //  {
                                                            //     for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                            //     if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                            //        $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].'?'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                            //     }
                                                                   
                                                            //    }
                                                            //  }
                                                            // echo CHtml::DropDownList('faculty_email_id4','faculty_email_id4',$Cadre_id,array('class'=>'form-control faculty_email_id4','empty'=>'Select','options' => $faculty4));
                                                            echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('class'=>"form-control col-md-2 faculty_email_id4",'id'=>'faculty_email_id4','disabled'=> "true"));
                                                             ?>
                                                          </div>
                                                       <div class="col-md-1">
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
                                                          echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('class'=>"form-control col-md-1 number_of_meetings4",'id'=>'number_of_meetings4','disabled'=> "true")); ?> 
                                                          </div>
                                                        <div class="col-md-1">
                                                            <div class="input-group input-medium date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input style="width:107px" class="form-control target_date4" readonly="" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input style="width:107px" class="form-control target_date4" readonly="" type="text"  id="target_date4" disabled="true">
                                                                 <?php   }
                                                                ?>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                             <?php 
                                                             if(isset($IDP_data['0']['mid_rel_prg_rev_emp']))
                                                             {
                                                                $appr_status1 = explode(';',$IDP_data['0']['mid_rel_prg_rev_emp']);
                                                             }

                                                             
                                         //  print_r($appr_status1);
                                                      $select = '';$status = '';
                                                                    $status = '';
                                                                    if (isset($appr_status1['1']) && $appr_status1['1'] != '') {
                                                                        $select = 0;
                                                                        $status[$appr_status1['1']] = array('selected' => true); 
                                                                    }
                                                                    else
                                                                    {
                                                                         $select = '';
                                                                         $status['Select'] = array('selected' => true);
                                                                    }
                                                    $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::dropDownList("rel_prg_status_emp-4",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_emp-4",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("rel_prg_status_emp-4",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_emp-4",'options' => $status));
}
                                                    ?>
                                                            
                                                       
                                                                                                             
                                                        </div> 

                                                        <div class="col-md-2">
                                                        <?php
                                                            echo CHtml::textArea('rel_program_review2_by_emp',$rel_program_emp_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review2_by_emp",'id'=>'rel_program_review1_by_emp-2','disabled'=> "true"));
                                                        ?> </div>
                                                     <!--   <div  class="col-md-2"> -->

                                                                                                                                                                        <div  class="col-md-2">
                                                            <?php 
                                                            if (isset($IDP_data['0']['rel_program_review_status'])) {
                                                               $appr_status1 = explode(';',$IDP_data['0']['rel_program_review_status']);
                                                            }
                                                           
                                                            //  print_r($appr_status1);
                                                            $select = '';$status = '';
                                                            $status = '';
                                                            if (isset($appr_status1['1']) && $appr_status1['1'] != '') {
                                                            $select = 0;
                                                            $status[$appr_status1['1']] = array('selected' => true); 
                                                            }
                                                            else
                                                            {
                                                            $select = '';
                                                            $status['Select'] = array('selected' => true);
                                                            }
                                                            $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
                                                            if (isset($IDP_data['0']['midyear_status_flag']) && $IDP_data['0']['midyear_status_flag'] != 'Approved') 
                                                            {
                                                            echo CHtml::dropDownList("rel_prg_status_mgr-4",'',$review_type,$htmlOptions=array('class'=>"form-control rel_prg_status_mgr-4",'options' => $status,$set_flag));
                                                            }
                                                            else
                                                            {
                                                            echo CHtml::dropDownList("rel_prg_status_mgr-4",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_mgr-4",'options' => $status));
                                                            }
                                                            ?>
                                                        <!--<input type="radio" disabled="true" name='rel_completeion_type1' value="Yes" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes-->
                                                        <!--<input type="radio" disabled="true" name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No                                                       -->
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <?php 
                                                        if(isset($rel_prgrm_cmd2))
                                                        {
                                                          $rel_prgrm_cmd2 = $rel_prgrm_cmd2;
                                                        }
                                                        else
                                                        {
                                                          $rel_prgrm_cmd2 = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
 echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 rel_program_review",'id'=>'rel_program_review-1',$set_flag));
}
else
{
 echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('class'=>"form-control col-md-4 rel_program_review",'id'=>'rel_program_review-1'));
}
                                                           
                                                        ?> </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec2"  style="color: red;float: right;"></lable></div>
                                                    </div>
                                                    </div>



                                                 <div class="form-group">                                                      
                                                    <div style="height: 43px;background-color: #4f7ab7;margin-top: 63px;
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
                                                        echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_title1",'disabled'=> "true")); ?>    
                                                    </div>
                                                </div>
                                                <div class="form-group last">
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
                                                <div class="form-group last">
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
                                                        echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('class'=>"form-control col-md-4 project_scope",'disabled'=> "true")); ?> 
                                                    </div>
                                                </div>

                                                <div class="form-group last">
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
                                                        echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('class'=>"form-control col-md-4 project_exclusion",'disabled'=> "true")); ?> 
                                                    </div>
                                                </div>                                                
                                                <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec3"  style="color: red;float: right;"></lable></div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                    <!-- END PORTLET-->
                                </div>
                                <div class="row">
                                <div class="col-md-12">
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
                                                        echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('class'=>"form-control col-md-4 project_deliverables",'style'=>'height: 214px;max-height: 67px;','disabled'=> "true")); ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group last">
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
                                                       echo CHtml::textArea('exp',$expected,$htmlOptions=array('class'=>"form-control col-md-4 learn_from",'disabled'=> "true")); ?>  
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
                                                        echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 reviewvers_name",'disabled'=> "true")); ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold ">Project Comments</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_mid_review_by_emp = '';
                                                        if (isset($IDP_data['0']['project_mid_review_by_emp'])) {
                                                          $project_mid_review_by_emp = $IDP_data['0']['project_mid_review_by_emp'];
                                                        }
                                                        else
                                                        {
                                                          $project_mid_review_by_emp = '';
                                                        }
                                                        echo CHtml::textArea('project_mid_review_by_emp',$project_mid_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_mid_review_by_emp",'style'=>'height: 214px;max-height: 67px;','disabled'=> "true")); ?> 
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label bold ">Project Status</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                          $select = '';$status = '';
                                                            $status = '';
                                                            if (isset($IDP_data['0']['project_mid_status']) && $IDP_data['0']['project_mid_status'] != '') {
                                                                $select = 0;
                                                                $status[$IDP_data['0']['project_mid_status']] = array('selected' => true); 
                                                            }
                                                            else
                                                            {
                                                                 $select = '';
                                                                 $status['Select'] = array('selected' => true);
                                                            }

                                                            
                                                            $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::dropDownList("project_mid_status",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control project_mid_status",'style'=>"width: 186px;",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("project_mid_status",'',$review_type,$htmlOptions=array('class'=>"form-control project_mid_status",'style'=>"width: 186px;",'options' => $status));
}

                                                            
                                                       ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold ">Project Review</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_mid_review = '';
                                                        if (isset($IDP_data['0']['project_mid_review'])) {
                                                          $project_mid_review = $IDP_data['0']['project_mid_review'];
                                                        }
                                                        else
                                                        {
                                                          $project_mid_review = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_mid_review",'style'=>'height: 214px;max-height: 67px;',$set_flag));
}
else
{
 echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('class'=>"form-control col-md-4 project_mid_review",'style'=>'height: 214px;max-height: 67px;'));
}

                                                         ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 bold"><lable id="error_spec4"  style="color: red;float: right;"></lable></div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
<?php
                                                                         if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
?>
                                    <label  class="custom-file-input file-blue file_change1" id="file_change" style="width: 157px;float: right;margin-right: 154px;">
                                                        <input id="file-input" class='file-input1' type="file"  name='employee_csv1' style="display: none" /><label id='uploaded_file1' style="margin-left: 165px;
margin-top: -37px;
">
                                                      </label>
<?php } ?>

                                    <!-- END PORTLET-->
                                </div>
                            </div> </div></form></div></div>
                                    </div>





<div class="portlet box blue feedback" 

<?php 
if (isset($employee_data['0']['Reporting_officer2_id']) && $employee_data['0']['Reporting_officer2_id']!='' && $employee_data['0']['Reporting_officer2_id'] == Yii::app()->user->getState("employee_email")){ ?> style="border: 1px solid rgb(76, 135, 185);background-color:rgb(76, 135, 185); display:none" <?php } else{ ?>style="border: 1px solid rgb(76, 135, 185);background-color:rgb(76, 135, 185);"<?php } ?>



>
                                        <div class="portlet-title" style="border: 1px solid rgb(76, 135, 185);background-color:rgb(76, 135, 185)">
                                            <div class="caption">
                                                Feedback </div>
                                           <!--  <div class="tools"> -->
                                                <!-- <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="portlet-body">
                                           <div style="margin-top: 20px;">
                                           <table class="table" style="border: none;">
                                               <thead>
                                                   <th style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;text-align: center;"><b>Question</b></th>
                                                   <th style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;text-align: center;"><b>Employee's Comments</b></th>
                                                   <th style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;text-align: center;"><b>Manager's Comment</b></th>
                                               </thead>
                                                <tbody>
                                                   <tr ><td class="col-md-4" style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;"><label style="margin-top: 15px;margin-left: 0px;margin-bottom: 15px;"><b>1) What went well in the last 6 months?</b></label></td>
                                                   <td class="col-md-4" style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                            <?php  if (isset($kpi_data['0']['mid_emp_cmt1'])) { ?>
                                                            <textarea class="form-control col-md-4 emp_cmt1" style="border:1px solid #c2cad8" disabled><?php if(isset($kpi_data['0']['mid_emp_cmt1'])) { echo $kpi_data['0']['mid_emp_cmt1']; } }
                                                       
                                                        else{
                                                            echo "";
                                                        }
                                                        ?></textarea></td>
                                                    
                                                        <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                         <?php 
                                                        if (isset($kpi_data['0']['mid_mgr_cmt1'])) { 
                                                          echo CHtml::textArea("mgr_cmt1",$kpi_data['0']['mid_mgr_cmt1'],$htmlOptions=array('class'=>"form-control mgr_cmt1"));
                                                            
                                                           
                                                          
                                                        }
                                                        else{
                                                            $kpi_data['0']['mid_mgr_cmt1']="";
                                                            echo CHtml::textArea("mgr_cmt1",$kpi_data['0']['mid_mgr_cmt1'],$htmlOptions=array('class'=>"form-control mgr_cmt1"));
                                                        }
                                                        ?>


                                                         </td>
                                                   </tr>
                                                    
                                                    
                                                     <tr><td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;"><label style="margin-top: 15px;margin-left: 0px;margin-bottom: 15px;"><b>2) What could have been better?</b></label></td>
                                                     <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                            <?php 
                                                        if (isset($kpi_data['0']['mid_emp_cmt2'])) { ?>
                                                            <textarea class="form-control col-md-4 emp_cmt2" style="border:1px solid #c2cad8;text-align:left" disabled> <?php  if(isset($kpi_data['0']['mid_emp_cmt2'])) { echo $kpi_data['0']['mid_emp_cmt2']; }
                                                        }
                                                        else{
                                                            echo "";
                                                        }
                                                        ?>
                                                            
                                                        </textarea></td>
                                                        <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                             <?php 
                                                        if (isset($kpi_data['0']['mid_mgr_cmt2'])) { 
                                                          echo CHtml::textArea("mgr_cmt2",$kpi_data['0']['mid_mgr_cmt2'],$htmlOptions=array('class'=>"form-control mgr_cmt2"));
                                                            
                                                           
                                                          
                                                        }
                                                        else{
                                                            $kpi_data['0']['mid_mgr_cmt2']="";
                                                            echo CHtml::textArea("mgr_cmt2",$kpi_data['0']['mid_mgr_cmt2'],$htmlOptions=array('class'=>"form-control mgr_cmt2"));
                                                        }
                                                        ?>
                                                       </td>
                                                     </tr>
                                                    
                                                    
                                                    <tr ><td  style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;"><label style="margin-top: 15px;margin-left: 0px;margin-bottom: 15px;"><b>3) What support or resource you require?</b></label></td>
                                                    <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                            <?php 
                                                        if (isset($kpi_data['0']['mid_emp_cmt3'])) { ?>
                                                            <textarea class="form-control col-md-4 emp_cmt3" style="border:1px solid #c2cad8;text-align:left" disabled><?php  if(isset($kpi_data['0']['mid_emp_cmt3'])) { echo $kpi_data['0']['mid_emp_cmt3']; }
                                                        }
                                                        else{
                                                            echo "";
                                                        }
                                                        ?>
                                                        </textarea></td>
                                                        <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                           <?php 
                                                        if (isset($kpi_data['0']['mid_mgr_cmt3'])) { 
                                                          echo CHtml::textArea("mgr_cmt3",$kpi_data['0']['mid_mgr_cmt3'],$htmlOptions=array('class'=>"form-control mgr_cmt3"));
                                                            
                                                           
                                                          
                                                        }
                                                        else{
                                                            $kpi_data['0']['mid_mgr_cmt3']="";
                                                            echo CHtml::textArea("mgr_cmt3",$kpi_data['0']['mid_mgr_cmt3'],$htmlOptions=array('class'=>"form-control mgr_cmt3"));
                                                        }
                                                        ?>  

                                                        </td>
                                                    </tr>
                                                   
                                                </tbody>
                                                
                                            </table>
                                             </div>
                                        </div>
                                    </div>




















                                        <?php 
//                                        if((isset($row['mid_KRA_final_status']) && $row['mid_KRA_final_status'] != 'Approved')) 
// {                                        ?>
                                        <label id="total_kra_id" style="display: none"><?php echo $kpi_id_data; ?></label>     
 
                    <input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/><lable id="blink_me" style="color: red;"> I confirm this Midyear review is discussed and agreed
with <?php if(isset($employee_data['0']['Emp_fname'])) { echo $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname']; } ?></lable>
                                        <?php 
                                        if (isset($kpi_data['0']['Employee_id'])) {
                                          echo CHtml::button('Approve Midyear review of '.$employee_name,array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right;margin-bottom: 10px;','id'=>$kpi_data['0']['Employee_id'],'onclick'=>'js:send_notification();')); 
                                        }
                                        
                                        ?>

                                        <?php
//}
                                            $IDPform=new IDPForm;
                                            if (isset($kpi_data['0']['Employee_id'])) {
                                              $where = 'where KPI_id = :KPI_id';
                                              $list = array('KPI_id');
                                              $data = array($kpi_data['0']['Employee_id']);
                                              $idp_data = $IDPform->get_idp_data($where,$data,$list);
                                            }
                                         // die();  
                                        ?>
                                        <?php if((isset($kpi_data) && count($kpi_data)>0) || (isset($kpi_data_aprv) && count($kpi_data_aprv)>0)) { 
                                                        // if(isset($idp_data) && count($idp_data)>0) { 
                                                        //     echo CHtml::button('Edit IDP',array('class'=>'btn border-blue-soft edit_IDP','style'=>'width: 183px;','id'=>"value-".$kpi_data['0']['Employee_id']));
                                                        // }
                                                        // else
                                                        // {
                                                        //      echo CHtml::button('Submit IDP',array('class'=>'btn border-blue-soft idp_update','style'=>'width: 183px;','id'=>"KPI_id-".$kpi_data['0']['Employee_id']));
                                                        // } 
                                                        } 
                                                    ?>
                                        <?php if (isset($approved_list)) { ?>
                                       <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-globe"></i>Approved Goal List </div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                        <tr>
                                                            <th> Employee ID </th>
                                                            <th> Employee Name </th>
                                                            <th> Department </th>
                                                            <th> KRA Category </th>
                                                            <th> View </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php
                                                            if (isset($kpi_data) && count($kpi_data)>0) { 
                                                            foreach ($kpi_data as $row) { $cnt = 0; ?>
                                                            <tr>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Employee_id']; }?> </td>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Emp_fname']; }?> </td>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Department']; }?> </td>
                                                                <td> 
                                                                    <?php
                                                                        $kpi_list_data = '';
                                                                        $kpi_list_data = explode(';',$row['kpi_list']);
                                                                    ?>                                                               
                                                                    <table class="table">
                                                                    <?php
                                                                    for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    ?>
                                                                    <tr><td><?php echo $kpi_list_data[$i];echo""; ?></td></tr>
                                                                    <?php
                                                                        }
                                                                    ?>   
                                                                    </table> 
                                                                </td>
                                                                <td></td>                                                               
                                                            </tr>
                                                        <?php 
                                                           $cnt++; } }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                        <!-- END SAMPLE TABLE PORTLET--> 
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
<lable id="prg_cnt" style="display:none"><?php if(isset($prg_cnt)) { echo $prg_cnt; } ?> </lable>
<div id="static_prg" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> <i class="fa fa-check" style="color:green"></i> Midyear review Completed </p>
                                    <p> <i class="fa fa-times" style="color:red"></i> Midyear IDP not Completed </p>
                                </div>
                                <div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/IDP/Midyear_subordinate_idp'),
                                                                ));
                                                                 ?>
<?php echo CHtml::textField('emp_id',$employee_data['0']['Employee_id'],array('style'=>'display:none')); ?>
                                                                  <?php echo CHtml::submitButton('OK',array('class'=>'btn dark btn-outline')); ?>
<?php 
                                        $this->endWidget(); 
                                        ?>
                                   
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>          
          <div id="agree_box" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> Please agree if discussion with this employee is completed.</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button"  data-dismiss="modal" class="btn border-blue-soft">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>       
        <div id="static2" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p><b>Successfully Updated</b> </p>
                                </div>
                                <div class="modal-footer">
                                    
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview1/"><button type="button" class="btn border-blue-soft">OK</button></a>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                <div id="static1" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Complete Mid-year
review of <?php if(isset($employee_data['0']['Emp_fname'])) { echo $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname']; }?> ? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">IDP Mid - Year Review</h4>
                            </div>
                            <div class="modal-body" style="height: 184px;">
                                <div class="col-md-12">
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">IDP Review</label>
                                </div><br>
                                <div class="col-md-6">
                                 <?php 
                                    $review_type = array('Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track');
                                    echo CHtml::dropDownList("review_type",'',$review_type,$htmlOptions=array('class'=>"form-control idp_review_status",'style'=>"width: 186px;"));
                                 ?>   
                                </div>    
                                <div class="col-md-6" style="padding-top: 15px;">
                                <label for="exampleInputEmail1">IDP Comments</label>
                                </div>
                                <div class="col-md-6" style="padding-top: 15px;">
                                 <?php
                                    echo CHtml::textArea("idp_comment",'',$htmlOptions=array('class'=>"form-control idp_comment",'rows'=>2,'maxlength' => 100,'max'));
                                 ?>   
                                </div> 
                                </div>               
                            </div>
                            <div class="modal-footer">
            <label id="error" style="float: left;color: red;"></label> 
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>                                
                                <?php echo CHtml::button('Save',array('class'=>'btn border-blue-soft update_idp','style'=>'float:right')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                 <div id="view_idp" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">IDP Mid - Year Review</h4>
                            </div>
                            <div class="modal-body" style="height: 184px;">
                                <div class="col-md-12">
                                <div class="col-md-6">
                                <label id="idp_id_update" style="display: none"></label>
                                <label for="exampleInputEmail1">IDP Review</label>
                                </div><br>
                                <div class="col-md-6">
                                 <?php 
                                    $review_type = array('Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track');
                                    echo CHtml::dropDownList("review_type",'',$review_type,$htmlOptions=array('class'=>"form-control idp_review_status_update",'style'=>"width: 186px;"));
                                 ?>   
                                </div>    
                                <div class="col-md-6" style="padding-top: 15px;">
                                <label for="exampleInputEmail1">IDP Comments</label>
                                </div>
                                <div class="col-md-6" style="padding-top: 15px;">
                                 <?php
                                    echo CHtml::textArea("idp_comment",'',$htmlOptions=array('class'=>"form-control idp_comment_update",'rows'=>2,'maxlength' => 100,'max'));
                                 ?>   
                                </div> 
                                </div>               
                            </div>
                            <div class="modal-footer">
                <label id="error1" style="float: left;color: red;"></label> 
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>                                
                                <?php echo CHtml::button('Update',array('class'=>'btn border-blue-soft update_idp_data','style'=>'float:right')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script type="text/javascript">
                    //        $(function(){
                    // $("body").on('click','.send_for_appraisal',function(){
                     
                                        
                            
                    //         });
                    //     });
                $(window).scroll(function()
                {
                    $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                });
                  $(function(){
                      $(".update_status").click(function(){ 
                        var id_value = $(this).attr('id');
                        var id = id_value.split('-');var mid_review = ''; var review_comments = '';
                          $("#updation_spinner-"+id[1]).show();                         

                           for (var i = 0; i < $("#get_kpi_count-"+id[1]).text(); i++) {
                             
                              var comment_data = $(".review_comment"+id[1]+i).val();
                              if (comment_data.length>100) 
                              {
                                  error = "Maximum 100 charaters are allowed to write comment for review.";                                  
                              }
                              else if($(".kpi_status_type-"+id[1]+i).find(':selected').val() == 'Select')
                              {
                                error = "Please Select Mid Review Status";
                              }
                              else
                              {
                                 if (mid_review == '') 
                                  {
                                      mid_review = $(".kpi_status_type-"+id[1]+i).find(':selected').val();
                                  }
                                  else
                                  {
                                      mid_review = mid_review +';'+$(".kpi_status_type-"+id[1]+i).find(':selected').val();
                                  }
                                  if (review_comments == '') 
                                  {
                                      review_comments = $(".review_comment"+id[1]+i).val();
                                  }
                                  else
                                  {
                                      review_comments = review_comments +';'+$(".review_comment"+id[1]+i).val();
                                  }
                              }
                          }
                          var data = {
                            'KPI_id' : id[1],
                            'review_status' : mid_review,
                            'review_comments' : review_comments,
                          };
                          console.log(data);
                          var base_url = window.location.origin;
                          $.ajax({
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Setgoals/updategoal',
                            success : function(data)
                            {
                               $("#updation_spinner-"+id[1]).hide();
                                if (data == 'success') 
                                {
                                    $("#err").show();  
                                    $("#err").fadeOut(6000);
                                    $("#error_value").addClass("alert-success");
                                    $("#err").text("Mid year Review updated successfully.");
                                } 
                                else if(data == "error occured")
                                {
                                    $("#err").show();  
                                    $("#err").fadeOut(6000);
                                    $("#error_value").addClass("alert-danger");
                                    $("#err").text("No Changes Done");
                                }                           
                            }                    
                          });
                      });
                      $(".idp_update").click(function(){                         
                       $("#static").modal('show');
                        var id_value = $(this).attr('id');
                        $(".update_idp").click(function(){ 
                        var error = '';                          
                            var id = id_value.split('-');
                            if ($(".idp_review_status").find(':selected').val() == 'Select') 
                            {
                                error = "Please Select IDP Status.";
                            }
                            else if($('.idp_comment').val() == '')
                            {
                                error = "Please enter comments for IDP.";
                            }
                            var data = {
                                'KPI_id' : id[1],
                                'IDP_status' : $(".idp_review_status").find(':selected').val(),
                                'IDP_comment' : $('.idp_comment').val(),
                            };
                            var base_url = window.location.origin;
                            if (error != '') 
                            {                                
                                $("#error").text(error);
                            }
                            else
                            {
                                $("#error").text('');
                                error = '';
                                $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+$("#basepath").attr('value')+'/index.php/Midreview1/submitidp',
                                success : function(data)
                                {
                                    if (data == 'success') 
                                    {
                                        $("#err").show();
                                        $("#err").fadeOut(6000);
                                        $("#err").text("IDP Submitted");
                                        $("#err").addClass("alert-success");
                                        // $("#error").text("IDP Submitted For this KRA");
                                        // $("#error").css('color','green');
                                        $('#static').modal('toggle');
                                        $("#output_div_"+id[1]).load(location.href + " #output_div_"+id[1]);
                                        //$(".edit_IDP").css('display','block');    
                                    }
                                    else if (data == 'error occured') 
                                    {
                                        $("#err").show();
                                        $("#err").fadeOut(6000);
                                        $("#err").text("No Changes Done");
                                        $("#err").addClass("alert-danger");
                                        //$("#sample_editable_1").load(location.href + " #sample_editable_1");
                                        //$(".edit_IDP").css('display','block');    
                                    }
                                         
                                }
                                });
                            }
                            
                      });
                      });
                      $(".update_idp_data").click(function(){
                        var id_value = $("#idp_id_update").text();
                        var error = '';      
                        if ($(".idp_review_status_update").find(':selected').val() == 'Select') 
                            {
                                error = "Please Select IDP Status.";
                            }
                            else if($('.idp_comment_update').val() == '')
                            {
                                error = "Please enter comments for IDP.";
                            }
                            var data = {
                                'KPI_id' : id_value,
                                'IDP_status' : $(".idp_review_status_update").find(':selected').val(),
                                'IDP_comment' : $('.idp_comment_update').val(),
                            };
                            console.log(data);
                            var base_url = window.location.origin;
                            if (error != '') 
                            {                                
                                $("#error1").text(error);
                            }
                            else
                            {
                                $("#error1").text('');
                                $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+$("#basepath").attr('value')+'/index.php/Midreview1/updateidp',
                                success : function(data)
                                {
                                    if(data == 1)
                                    {
                                        $("#err").show();
                                        $("#err").fadeOut(6000);
                                        $("#err").text("IDP Updation Done");
                                        $("#err").addClass("alert-success");
                                        // $("#error").text("IDP Submitted For this KRA");
                                        // $("#error").css('color','green');
                                        $('#view_idp').modal('toggle');
                                        $("#output_div_"+id[1]).load(location.href + " #output_div_"+id[1]);
                                    }                                          
                                }
                                });
                            }
                            
                      });
                      $(".edit_IDP").click(function(){
                        var id_value = $(this).attr('id');
                        var id = id_value.split('-');
                        var data = {
                                'KPI_id' : id[1],
                        };
                        var base_url = window.location.origin;
                            $.ajax({
                                type : 'post',
                                datatype : 'json',
                                data : data,
                                url : base_url+$("#basepath").attr('value')+'/index.php/Midreview1/get_idp',
                                success : function(data)
                                {
                                    var obj = $.parseJSON(data);var index = 0;
                                    $(".idp_comment_update").text(obj[0].IDP_comment);
                                    if(obj[0].IDP_status == 'Needs Attention')
                                    {
                                        index = 0;
                                    }
                                    else if(obj[0].IDP_status == 'Nearing Completion')
                                    {
                                        index = 1;
                                    }
                                    else if(obj[0].IDP_status == 'On Track')
                                    {
                                        index = 2;
                                    }
                                    $("#view_idp").modal('show');
                                    $('.idp_review_status_update').prop('selectedIndex',index);
                                    $("#idp_id_update").text(obj[0].KPI_id);
                                    console.log(obj[0].IDP_comment);    
                                }
                            });
                      });    
                         








// $(".send_for_appraisal").click(function(){
//       var error_count = 0;var error_count1 = 0;var error_count2 = '';
//       var id_value = $("#total_kra_id").text();
//       var id = id_value.split(';');
//       //alert(id);
//       var mid_review_status = '';var mid_review_status1 = [];
//       var comment_data = '';
//       var review_comments = '';var review_comments1 = [];
//       var error = [];var status_type='';var chk_colon = /[;]/;
        
        
//     var program_status = '';var extra_program_status = '';var extra_chk_compl1 = 0;var extra_program_review_compl2 = 0;var extra_program_review_compl3 = 0;
//     var get_list = $("#compulsory_id").text();
//     var get_list_value = get_list.split(';');
//     var prgrm_cmd = ''; var extra_prgrm_cmd = ''; var topic = '';var date_value = '';var faculty_value = '';var chk = /[;]/; 
//     var extra_cnt = $("#extra_program_count").text().replace(/\s+/g, '');
//     var err1="";var err2="";var err3="";var err4="";var err5="";var err6="";var err7="";
//     for (var i = 0; i < 2; i++) {
//         var k=i+3;
//        if($('#faculty_email_id'+k).val()!=""){
//        if ($("#rel_prg_status_mgr-"+i+" option:selected").text() == "Select")
//         {
//             $("#rel_prg_status_mgr-"+i).css('border','1px solid red');
//             $("#rel_prg_status_mgr-"+i).focus();
//             $('#err').text("Select relationship program status");
//             $('#err').show();
//             err1="Select relationship program status";
            
//         }
//         else if(($("#rel_prg_status_mgr-"+i+" option:selected").text() == "Needs Attention") && ($('#rel_program_review-'+i).val()=="" || $('#rel_program_review-'+i).val()=="undefined" || $('#rel_program_review-'+i).val() === undefined)){
//             $('#rel_program_review-'+i).css('border','1px solid red');
//             $('#rel_program_review-'+i).focus();
//             $('#err').text("Select relationship program comments");
//             $('#err').show();
//             err1="Select relationship program comments";
//         }
//         else{
//             err1="1";
//         }
//         }
//         else{
//             err1="1";
//         }
//     }
    
//     for (var state = 0; state < extra_cnt; state++) {
        
//         if($('#topic'+state).val()!=''){
//         if ($(".extra_completeion_type"+state+':checked').val() === undefined)
//         {
//             $("#extra"+state).css('border','1px solid red');
//             $(".extra_completeion_type"+state).focus();
//             $('#err').show();
//             $('#err').text('Select extra program status.');   
//             err2='Select extra program status.';
//             break;
//         }
//         else if($("#extra_program_review-"+state).val() === undefined || $("#extra_program_review-"+state).val() == ''){
//             $("#extra_program_review-"+state).css('border','1px solid red');
//             $("#extra_program_review-"+state).focus();
//             $('#err').show();
//             $('#err').text('Enter extra program comments.');   
//             err2="Enter extra program comments";
//             break;
//         }
//         else{
//             err2="2";
//         }
//         }
//         else{
//             err2="2";
//         }
//     }
    
    
    
    
    
//     for (var i = 0; i < $("#total_prog").text(); i++) {
//         if ($("#tot_prog_status_mgr-"+i+" option:selected").text() == "Select")
//         {
//           alert("hiiiii");
//           $('#err').text('');
//             $("#tot_prog_status_mgr-"+i).css('border','1px solid red');
//             $("#tot_prog_status_mgr-"+i).focus();
//             $('#err').show();
//             $('#err').text('Manager status are compulsary.');
//             err3="Manager status are compulsary";
//             break;
//         }
//         else if($("#tot_prog_status_mgr-"+i+" option:selected").text() == "Needs Attention" && ($("#program_review-"+i).val()=="" || $("#program_review-"+i).val() === undefined || $("#program_review-"+i).val() =="undefined" || $("#program_review-"+i).val()=="NA")){
            
//             $("#program_review-"+i).css('border','1px solid red');
//             $("#program_review-"+i).focus();
//             $('#err').show();
//             $('#err').text('Manager comments are compulsary.');   
//             err3='Manager comments are compulsary.';
//             break;
//         }
//         else{
//             $("#program_review-"+i).css('border','');
//             $("#tot_prog_status_mgr-"+i).css('border','');
//             err3="3";
//         }
//         if(err3!="3"){
//             break;
//         }
//     }
    
        
        
//     for (var j = 0; j < $("#total_kra_number").text(); j++) {
//         var mid_review_status = '';
//         var review_comments = '';
//        // alert(j);
//         for (var i = 0; i < $("#get_kpi_count-"+id[j]).text(); i++) { 
//             var comment_data = $(".review_comment"+id[j]+i).val();
//             if($(".kpi_status_type-"+id[j]+i).find(':selected').val() == 'Select')
//             {
//                 err4 = "Please Select Mid-year Review Status";
//                  $(".kpi_status_type-"+id[j]+i).focus();
//                 $(".kpi_status_type-"+id[j]+i).css('border','1px solid red');
//                 $('#err').text("Please Select Mid-year Review Status");
//                 $('#err').show();
//                 break;
//             }
//             else if ((comment_data == undefined || comment_data =='' || comment_data == "NA") && $(".kpi_status_type-"+id[j]+i).find(':selected').val()=='Needs Attention')  
//             {
//                 err4 = "Please enter comments on quater1 review";
//                 $(".review_comment"+id[j]+i).focus();
//                 $(".review_comment"+id[j]+i).css('border','1px solid red');
//                 $('#err').text("Please enter comments on Mid-year review");
//                 $('#err').show();
//                 break;
//             }
//             else if(chk_colon.test(comment_data))
//             {
//                 err4 = "The special character ';' not allowed.";
//                 $('#err').text("The special character ';' not allowed.");
//                 $('#err').show();
//                 break;
//             }
//             else if(comment_data.length>500)
//             {
                
//                 err4 = "Maximum 500 charaters are allowed to write comment for review.";
//                 $('#err').text("Maximum 500 charaters are allowed to write comment for review.");
//                 $('#err').show();
//                 break;
//             }
//             else
//             {
//                 error[id[j]] = '';
//                 err4="4";
                
//                 $(".review_comment"+id[j]+i).css('border-color','');
//                 $(".kpi_status_type-"+id[j]+i).css('border-color','');
//                 //  $('#err').text('');
//                 // $('#err').hide();
//                 $("#error_spec"+id[j]).text('');
//                 if (mid_review_status == '') 
//                 {
//                 mid_review_status = $(".kpi_status_type-"+id[j]+i).find(':selected').val();
//                 }
//                 else
//                 {
//                 if ($(".kpi_status_type"+id[j]+i).find(':selected').val() !='Select') 
//                 {
//                 status_type = $(".kpi_status_type-"+id[j]+i).find(':selected').val()
//                 }
//                 else
//                 {
//                 status_type = 'Select';
//                 }
//                 mid_review_status = mid_review_status +';'+status_type;
//                 }
                
//                 if (review_comments == '') 
//                 {
//                 review_comments = $(".review_comment"+id[j]+i).val();
//                 }
//                 else
//                 {
//                 review_comments = review_comments +';'+$(".review_comment"+id[j]+i).val();
//                 }
//             //break;
//             }                              
        
//         }
        
        
//     var mgr_cmt1='';var mgr_cmt2='';var mgr_cmt3='';
//     mgr_cmt1=$('.mgr_cmt1').val();
//     mgr_cmt2=$('.mgr_cmt2').val();
//     mgr_cmt3=$('.mgr_cmt3').val();
    
//     if(mgr_cmt1=='' || mgr_cmt1 == undefined){
//         $('.mgr_cmt1').css('border','1px solid red');
//         $('.mgr_cmt1').focus();
//         $('#err').show();
//         $('#err').text('Manager comments are compulsary.');
//         err4="Manager comments are compulsary.";
//         break;
//     }
//     else if(mgr_cmt2=='' || mgr_cmt2 == undefined){
//         $('.mgr_cmt2').css('border','1px solid red');
//         $('.mgr_cmt2').focus();
//         $('#err').show();
//         $('#err').text('Manager comments are compulsary.');
//         err6="Manager comments are compulsary.";
//         break;
//     }
//     else if(mgr_cmt3=='' || mgr_cmt3 == undefined ){
//         $('.mgr_cmt3').css('border','1px solid red');
//         $('.mgr_cmt3').focus();
//         $('#err').show();
//         $('#err').text('Manager comments are compulsary.');
//         err6="Manager comments are compulsary.";
//         break;
//     }    
//     else{

//         err6="6";
//     }  
    
//     var data = {
//         'KPI_id' : id[j],
//         'mid_KRA_status' : mid_review_status,
//         'appraiser_comment' : review_comments,
//         'mid_mgr_cmt1': mgr_cmt1,
//         'mid_mgr_cmt2': mgr_cmt2,
//         'mid_mgr_cmt3': mgr_cmt3,

//     };
//     $("#updation_spinner-"+id[j]).show();
//     console.log(data);
//     var base_url = window.location.origin;
//     $.ajax({
//         type : 'post',
//         datatype : 'html',
//         data : data,
//         url : base_url+$("#basepath").attr('value')+'/index.php/Midreview/midupdategoal',
//         success : function(data)
//         {
//              //alert(data);
//         }                    
//     });    
        
//         if(err4!="4"){
//             break;
//         }
//     }
    
//     if($("#project_mid_status").find(':selected').val() == 'Select')
//         {
//             $("#project_mid_status").focus();
//             $("#project_mid_status").css('border','1px solid red');
//             $("#err").text('Please select project status');
//             $("#err").show();
//              err5="Please select project status";
//             // break;
//         }
//     else if($('#project_mid_review').val()=="" || $('#project_mid_review').val()=="undefined" || $('#project_mid_review').val()=== undefined){
//         $("#project_mid_review").focus();
//             $("#project_mid_review").css('border','1px solid red');
//             $("#err").text('Please select project comments');
//             $("#err").show();
//              err5="Please select project comments";
//             // break;
       
//     }
//     else{
//         err5="5";
//     }        
// alert(err1);alert(err2);
// alert(err3);alert(err4);alert(err5);alert(err6);
//      if(err1 == "1" && err2 == "2" && err3 == "3" && err4 == "4" && err5 == "5" && err6 == "6")  
//      {
//         $("#err").hide();
//         $('#err').text("");
//       if($("#term_condition:checked").val() != 'term_condition')
//                                             {
//                                                  $("#blink_me").addClass('blink_me');
//                                             } 
// else
//                                             {
// //save_detail_pdf();
//                                                $("#blink_me").removeClass('blink_me');
//                                                 var emp_id = {
//                                                       emp_id : $(".send_for_appraisal").attr('id'),
//                                                     };
                                        
//                                                                 $("#err").hide(); 
//                                                                   jQuery("#static1").modal('show');
//                                                                   $("#continue_goal_set").click(function(){
                                                                      
//                                                                       $("#show_spin").show();
//                                                                           $.ajax({
//                                                                               type : 'post',
//                                                                               datatype : 'html',
//                                                                               data : emp_id,
//                                                                               url : base_url+$("#basepath").attr('value')+'/index.php/Midreview/sendmail',
//                                                                               success : function(data)
//                                                                               {
                                                                                 
//                                                                                  alert(data);
//                                                                                   jQuery("#static1").modal('toggle');
//                                                                                   $("#show_spin").hide(); 
//                                                                                   $("#err").show();  
//                                                                                   $("#err").fadeOut(6000);
//                                                                                   $("#err").text("Notification Sent to employee");
//                                                                                   $("#err").addClass("alert-success"); 
//                                                     jQuery("#static2").modal('show');                           
//                                                     //window.location.href = base_url+'/index.php?r=Midreview';                      
//                                                                               }
//                                                                           });
//                                                                   });
//                                             }
//      }
// });




$(".send_for_appraisal").click(function(){
  //alert("hello");
      var error_count = 0;var error_count1 = 0;var error_count2 = '';
      var id_value = $("#total_kra_id").text();
      var id = id_value.split(';');
      //alert(id);
      var mid_review_status = '';var mid_review_status1 = [];
      var comment_data = '';
      var review_comments = '';var review_comments1 = [];
      var error = [];var status_type='';var chk_colon = /[;]/;
        
        
    var program_status = '';var extra_program_status = '';var extra_chk_compl1 = 0;var extra_program_review_compl2 = 0;var extra_program_review_compl3 = 0;
    var get_list = $("#compulsory_id").text();
    var get_list_value = get_list.split(';');
    var prgrm_cmd = ''; var extra_prgrm_cmd = ''; var topic = '';var date_value = '';var faculty_value = '';var chk = /[;]/; 
    var extra_cnt = $("#extra_program_count").text().replace(/\s+/g, '');
    var err1="1";var err2="2";var err3="3";var err4="4";var err5="5";var err6="6";var err7="7";
if($('#dotted_mgr').text()=='0'){

if($('#mgr_cmt1').val() == '' || $('#mgr_cmt1').val() === undefined){
                    $('#mgr_cmt1').css('border','1px solid red');
                    $('#mgr_cmt1').focus();
                    $('#err').show();
                    $('#err').text('Please enter Manager’s comments');
                    err6="Please enter employee comments";
                  }
                  else if($('#mgr_cmt2').val() == '' || $('#mgr_cmt2').val() === undefined){
                    $('#mgr_cmt2').css('border','1px solid red');
                    $('#mgr_cmt2').focus();
                    $('#err').show();
                    $('#err').text('Please enter Manager’s comments');
                    err6="Please enter employee comments";
                    
                  }
                  else if($('#mgr_cmt3').val() == '' || $('#mgr_cmt3').val() === undefined){
                    $('#mgr_cmt3').css('border','1px solid red');
                    $('#mgr_cmt3').focus();
                    $('#err').show();
                    $('#err').text('Please enter Manager’s comments');
                    err6="Please enter employee comments";
                  }
                  else{
                    err6="6";
                  }

      if($("#project_mid_status").find(':selected').val() == 'Select')
        {
            $("#project_mid_status").focus();
            $("#project_mid_status").css('border','1px solid red');
            $("#err").text('Please select project status');
            $("#err").show();
             err5="Please select project status";
            // break;
        }
    else if($('#project_mid_review').val()=="" || $('#project_mid_review').val()=="undefined" || $('#project_mid_review').val()=== undefined){
        $("#project_mid_review").focus();
            $("#project_mid_review").css('border','1px solid red');
            $("#err").text('Please select project comments');
            $("#err").show();
             err5="Please select project comments";
            // break;
       
    }
    else{
        err5="5";
    }

    for (var i = 0; i < 2; i++) {
        var k=i+3;

       if($('#faculty_email_id'+k).val()!=""){
       // alert($("#rel_prg_status_mgr-"+k+" option:selected").text());
       if ($("#rel_prg_status_mgr-"+k+" option:selected").text() == "Select")
        {
            //alert("error"+""+$("#rel_prg_status_mgr-"+k+" option:selected").text()) ;
            $("#rel_prg_status_mgr-"+k).css('border','1px solid red');
            $("#rel_prg_status_mgr-"+k).focus();
            $('#err').text("Select relationship program status");
            $('#err').show();
            err1="Select relationship program status";
            break;
        }
        else if(($("#rel_prg_status_mgr-"+k+" option:selected").text() == "Needs Attention") && ($('#rel_program_review-'+i).val()=="" || $('#rel_program_review-'+i).val()=="NA" ||  $('#rel_program_review-'+i).val() === undefined)){
            $('#rel_program_review-'+i).css('border','1px solid red');
            $('#rel_program_review-'+i).focus();
            $('#err').text("Select relationship program comments");
            $('#err').show();
            err1="Select relationship program comments";
            break;
        }
        else{
            err1="1";
            //break;
        }
        }
        else{
            err1="1";
            break;
        }
    }
    
    for (var state = 0; state < extra_cnt; state++) {
        
        if($('#topic'+state).val()!=''){
        if ($(".extra_completeion_type"+state+':checked').val() === undefined)
        {
            $("#extra"+state).css('border','1px solid red');
            $(".extra_completeion_type"+state).focus();
            $('#err').show();
            $('#err').text('Select extra program status.');   
            err2='Select extra program status.';
            break;
        }
        else if($("#extra_program_review-"+state).val() === undefined || $("#extra_program_review-"+state).val() == '' || $("#extra_program_review-"+state).val() == 'NA'){
            $("#extra_program_review-"+state).css('border','1px solid red');
            $("#extra_program_review-"+state).focus();
            $('#err').show();
            $('#err').text('Enter extra program comments.');   
            err2="Enter extra program comments";
            break;
        }
        else{
            err2="2";
        }
        }
        else{
            err2="2";
        }
    }
    
    
    
    
    
    for (var i = 0; i < $("#total_prog").text(); i++) {
        if ($("#tot_prog_status_mgr-"+i+" option:selected").text() == "Select")
        {
          
          $('#err').text('');
            $("#tot_prog_status_mgr-"+i).css('border','1px solid red');
            $("#tot_prog_status_mgr-"+i).focus();
            $('#err').show();
            $('#err').text('Manager status are compulsary.');
            err3="Manager status are compulsary";
            break;
        }
        else if($("#tot_prog_status_mgr-"+i+" option:selected").text() == "Needs Attention" && ($("#program_review-"+i).val()=="" || $("#program_review-"+i).val() === undefined || $("#program_review-"+i).val() =="undefined" || $("#program_review-"+i).val()=="NA")){
            
            $("#program_review-"+i).css('border','1px solid red');
            $("#program_review-"+i).focus();
            $('#err').show();
            $('#err').text('Manager comments are compulsary.');   
            err3='Manager comments are compulsary.';
            break;
        }
        else{
            $("#program_review-"+i).css('border','');
            $("#tot_prog_status_mgr-"+i).css('border','');
            err3="3";
        }
        if(err3!="3"){
            break;
        }
    }
    
    }    
        
    for (var j = 0; j < $("#total_kra_number").text(); j++) {
        var mid_review_status = '';
        var review_comments = '';
       // alert(j);
        for (var i = 0; i < $("#get_kpi_count-"+id[j]).text(); i++) { 
            var comment_data = $(".review_comment"+id[j]+i).val();
            if($(".kpi_status_type-"+id[j]+i).find(':selected').val() == 'Select')
            {
                err4 = "Please Select Mid-year Review Status";
                 $(".kpi_status_type-"+id[j]+i).focus();
                $(".kpi_status_type-"+id[j]+i).css('border','1px solid red');
                $('#err').text("Please Select Mid-year Review Status");
                $('#err').show();
                break;
            }
            else if ((comment_data == undefined || comment_data =='' || comment_data == "NA") && $(".kpi_status_type-"+id[j]+i).find(':selected').val()=='Needs Attention' )  
            {
                err4 = "Please enter comments on Mid-year Review review";
                $(".review_comment"+id[j]+i).focus();
                $(".review_comment"+id[j]+i).css('border','1px solid red');
                $('#err').text("Please enter comments on Mid-year review");
                $('#err').show();
                break;
            }
            else if(chk_colon.test(comment_data))
            {
                err4 = "The special character ';' not allowed.";
                $('#err').text("The special character ';' not allowed.");
                $('#err').show();
                break;
            }
            else if(comment_data.length>500)
            {
                
                err4 = "Maximum 500 charaters are allowed to write comment for review.";
                $('#err').text("Maximum 500 charaters are allowed to write comment for review.");
                $('#err').show();
                break;
            }
            else
            {
                error[id[j]] = '';
                err4="4";
                
                $(".review_comment"+id[j]+i).css('border-color','');
                $(".kpi_status_type-"+id[j]+i).css('border-color','');
                //  $('#err').text('');
                // $('#err').hide();
                $("#error_spec"+id[j]).text('');
                if (mid_review_status == '') 
                {
                mid_review_status = $(".kpi_status_type-"+id[j]+i).find(':selected').val();
                }
                else
                {
                if ($(".kpi_status_type"+id[j]+i).find(':selected').val() !='Select') 
                {
                status_type = $(".kpi_status_type-"+id[j]+i).find(':selected').val()
                }
                else
                {
                status_type = 'Select';
                }
                mid_review_status = mid_review_status +';'+status_type;
                }
                
                if (review_comments == '') 
                {
                review_comments = $(".review_comment"+id[j]+i).val();
                }
                else
                {
                review_comments = review_comments +';'+$(".review_comment"+id[j]+i).val();
                }
            //break;
            }                              
        
        }
        
        
    
    
    // var data = {
    //     'KPI_id' : id[j],
    //     'mid_KRA_status' : mid_review_status,
    //     'appraiser_comment' : review_comments,
    //     'mid_mgr_cmt1': mgr_cmt1,
    //     'mid_mgr_cmt2': mgr_cmt2,
    //     'mid_mgr_cmt3': mgr_cmt3,

    // };
    // $("#updation_spinner-"+id[j]).show();
    // console.log(data);
    // var base_url = window.location.origin;
    // $.ajax({
    //     type : 'post',
    //     datatype : 'html',
    //     data : data,
    //     url : base_url+'/kritvapms/index.php/Midreview/midupdategoal',
    //     success : function(data)
    //     {
    //          //alert(data);
    //     }                    
    // });    
        
        if(err4!="4"){
            break;
        }
    }
    
   //err6="6";
// alert(err1);alert(err2);
// alert(err3);alert(err4);alert(err5);alert(err6);
     if(err1 == "1" && err2 == "2" && err3 == "3" && err4 == "4" && err5 == "5" && err6 == "6")  
     {
        $("#err").hide();
        $('#err').text("");
      if($("#term_condition:checked").val() != 'term_condition')
                                            {
                                                 $("#blink_me").addClass('blink_me');
                                            } 
else
                                            {
//save_detail_pdf();
                                               $("#blink_me").removeClass('blink_me');
                                                var emp_id = {
                                                      emp_id : $(".send_for_appraisal").attr('id'),
                                                    };
                                        
                                                                $("#err").hide(); 
                                                                  jQuery("#static1").modal('show');
                                                                  $("#continue_goal_set").click(function(){
                                                                      
                                                                      $("#show_spin").show();
                                                                          $.ajax({
                                                                              type : 'post',
                                                                              datatype : 'html',
                                                                              data : emp_id,
                                                                              url : base_url+$("#basepath").attr('value')+'/index.php/Midreview1/sendmail',
                                                                              success : function(data)
                                                                              {
                                                                                 
                                                                                 //alert(data);
                                                                                  jQuery("#static1").modal('toggle');
                                                                                  $("#show_spin").hide(); 
                                                                                  $("#err").show();  
                                                                                  $("#err").fadeOut(6000);
                                                                                  $("#err").text("Notification Sent to employee");
                                                                                  $("#err").addClass("alert-success"); 
                                                    jQuery("#static2").modal('show');                           
                                                    //window.location.href = base_url+'/index.php?r=Midreview';                      
                                                                              }
                                                                          });
                                                                  });
                                            }
     }
});





























                       
                  });
                </script>
                <div id="redirect_page" class="modal fade" tabindex="-1" data-backdrop="redirect_page" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                         <div class="modal-body">
                                    <p> Mid Year updation done successfully. </p>
                                </div>
                                <div class="modal-footer">
                                   <button type="button" data-dismiss="modal" class="btn border-blue-soft" id="reload">Reload</button>
                                <a href=""><button type="button" data-dismiss="modal" class="btn border-blue-soft" id="redirect_to_master">Master Page</button></a>
                                </div> 
                        </div>
                    </div>
                </div>
               
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->

