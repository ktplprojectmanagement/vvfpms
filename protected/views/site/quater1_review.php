<script>

$(function(){
    //alert("fffffffffff");
    var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$(".get_print").click(function () {    
    //window.print();
        var doc = new jsPDF()

    // doc.text('Hello world!', 10, 10);
    // doc.save('a4.pdf');
    doc.fromHTML($('.page-content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
});
</script>
<script type="text/javascript">
    $(function(){
       // alert("ffffffffffffddd");
        setInterval(save_emp_mid_data,3000);  
    });
</script>
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

head
{
background-color: none;
color: none;
}
</style>
    
<style type="text/css">
                .popover{
   min-width:30px;
  
   max-width:400px;
   overflow-wrap:break-word;
   border:1px solid #4c87b9;
}
            </style>
         

<style type="text/css">
    .file-blue:before {
      content: 'Browse File';
      background: -webkit-linear-gradient( -180deg, #99dff5, #02b0e6);
      background: -o-linear-gradient( -180deg, #99dff5, #02b0e6);
      background: -moz-linear-gradient( -180deg, #99dff5, #02b0e6);
      background: linear-gradient( -180deg, #99dff5, #02b0e6);
      border-color: #57cff4;
      color: #FFF;
      text-shadow: 1px 1px rgba(000,000,000,0.5);
    }
    .file-blue:hover:before {
      border-color: #02b0e6;
    }
    .file-blue:active:before {
      background: #02b0e6;
    }

</style>  
<script type="text/javascript">
    function save_emp_mid_data()
    {
        //alert("sdfdsfd");
       $("#err").removeClass("alert-success"); 
                            $("#err").removeClass("alert-danger");                        
                          var id_value = $("#total_kpi_id_list").text();
                          var id = id_value.split(';');var q1_review = ''; var review_comments = ''; var error_count1 = 0;var error_count2 = '';
                          var rel_program_review_by_emp = '';  var extra_program_review_by_emp = '';var program_review_by_emp = '';    var emp_project_q1_review = '';   var  q1_emp_cmt1=""; var  q1_emp_cmt2=""; var  q1_emp_cmt3="";var rel_program_review_status_emp="";
                          q1_emp_cmt3=$('.emp_cmt3').val();
                          q1_emp_cmt2=$('.emp_cmt2').val();
                          q1_emp_cmt1=$('.emp_cmt1').val();
                           $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                            var extra_cnt = $("#extra_program_count").text().replace(/\s+/g, '');
                               for (var state = 0; state < extra_cnt; state++) 
                               {
                                    
                                    if (extra_program_review_by_emp == '') 
                                    {
                                       extra_program_review_by_emp = $("#extra_program_review_by_emp-"+state).val();
                                    }
                                    else
                                    {
                                      extra_program_review_by_emp = extra_program_review_by_emp+';'+$("#extra_program_review_by_emp-"+state).val();
                                    }
                               }
                                for (var i = 1; i <= 2; i++) 
                               {
                                   var k=i+2;
                                     if (rel_program_review_by_emp == '') 
                                    {
                                       rel_program_review_by_emp = $("#rel_program_review1_by_emp-"+i).val();
                                    }
                                    else
                                    {
                                      rel_program_review_by_emp = rel_program_review_by_emp+';'+$("#rel_program_review1_by_emp-"+i).val();
                                    } 
                                    
                                    if (rel_program_review_status_emp == '') 
                                    {
                                       rel_program_review_status_emp = $("#rel_prg_status_emp-"+k+" option:selected").text();
                                    }
                                    else
                                    {
                                      rel_program_review_status_emp = rel_program_review_status_emp+';'+$("#rel_prg_status_emp-"+k+" option:selected").text();
                                    }
                                }

                           for (var l = 0; l < id.length; l++) {
                            var review_comments = ''; var q1_review="";
                                    for (var i = 0; i < $("#get_kpi_count-"+id[l]).text(); i++) {
                                          if (q1_review == '') 
                                          {
                                              q1_review = $(".q1_status_type-"+id[l]+i).find(':selected').val();
                                          }
                                          else
                                          {
                                              q1_review = q1_review +';'+$(".q1_status_type-"+id[l]+i).find(':selected').val();
                                          }
                                          console.log(id_value);
                                          var comment_data = $(".employee_comment"+id[l]+i).val();
                                          //alert($(".review_comment"+id[1]+i).text());
                                         if (review_comments == '') 
                                          {
                                              review_comments = $(".employee_comment"+id[l]+i).val();
                                          }
                                          else
                                          {
                                              review_comments = review_comments +';'+$(".employee_comment"+id[l]+i).val();
                                          }
                                    }

                              //alert(review_comments);
                            var program_review_by_emp = ''; var q1_tot_prg_sts_by_emp = '';
                              for (var i = 0; i < $("#total_prog").text(); i++) 
                              {
                                        if (program_review_by_emp == '') 
                                        {
                                           program_review_by_emp = i+"?"+$("#program_review_by_emp-"+i).val();
                                        }
                                        else
                                        {
                                          program_review_by_emp = program_review_by_emp+';'+i+"?"+$("#program_review_by_emp-"+i).val();
                                        }
                                        
                                        if (q1_tot_prg_sts_by_emp == '') 
                            {
                               q1_tot_prg_sts_by_emp =$("#tot_prog_status_emp-"+i+" option:selected").text();
                            }
                            else
                            {
                              q1_tot_prg_sts_by_emp = q1_tot_prg_sts_by_emp+';'+$("#tot_prog_status_emp-"+i+" option:selected").text();
                            }
                                       
                              
                              }

                              
                                 emp_project_q1_review = $("#project_q1_review_by_emp").val();
                              
                               
                                var formData = new FormData();
                                var data = {
                                    'KPI_id' : id[l],
                                    'review_comments' : review_comments,
                                  };
                                   formData.append("review_comments",review_comments);
                                   formData.append("program_review_by_emp",program_review_by_emp);
                                   formData.append("extra_program_review_by_emp",extra_program_review_by_emp);
                                   formData.append("rel_program_review_by_emp_name",rel_program_review_by_emp);
                                   formData.append("q1_tot_prg_sts_by_emp",q1_tot_prg_sts_by_emp);
                                   //correct_emp_id
                                   formData.append("KPI_id_value",id[l]);
                                    formData.append("correct_emp_id",$("#correct_emp_id").text());
                                   // formData.append("employee_csv",file_data);
                                   // formData.append("employee_csv1",file_data1);
                                   formData.append('rel_program_review_status_emp',rel_program_review_status_emp);
                                   formData.append("emp_project_q1_review",emp_project_q1_review);
                                   formData.append("q1_emp_cmt1",q1_emp_cmt1);
                                   formData.append("q1_emp_cmt2",q1_emp_cmt2);
                                   formData.append("q1_emp_cmt3",q1_emp_cmt3);
                                   formData.append('q1_review',q1_review);
                                   //formData.append("goalsheet_proof",emp_rating);
                                   //alert(file_data);
                                  console.log(data);
                                  var base_url = window.location.origin;
                                  $.ajax({
                                    type : 'post',
                                    datatype : 'json',
                                    processData: false, 
                                    contentType: false,
                                    enctype : 'multipart/form-data',
                                    data : formData,
                                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Quater1/employee_mid_review',
                                    success : function(data)
                                    { 
                                       //alert(data);
                                      //save_detail_pdf();
                                                                                       
                                    }                    
                                  });
                           }
    }
</script>
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
url : base_url+$("#basepath").attr('value')+'/index.php?r=Checkattach/check_view2',
success : function(data)
{
    //alert(data);
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
url : base_url+$("#basepath").attr('value')+'/index.php?r=Checkattach/check_idp1',
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
                        emp_id : $('#emp_id').text()
                    };
                    $.ajax({                            
                    type : 'post',
                    datatype : 'html',
                    data : data,
                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Checkattach/check_view2',
                    success : function(data)
                    {
                        //alert(data);
                    }
                    });
                  var data1 = {
                        doc : $('#target_idp').html(),
                        emp_id : $('#emp_id').text()
                    };
                    $.ajax({                            
                    type : 'post',
                    datatype : 'html',
                    data : data1,
                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Checkattach/check_idp1',
                    success : function(data)
                    {
                        //alert(data);
                    }
                    });
                    
                }
</script>
<label id="correct_emp_id" style="display:none"><?php if(isset($emp_data['0']['Employee_id']) && $emp_data['0']['Employee_id'] !='') { echo $emp_data['0']['Employee_id']; } ?></label>
   <style type="text/css">

<?php 
            Yii::app()->controller->renderPartial('//site/mid_year_review_summary');
Yii::app()->controller->renderPartial('//site/IDP_review_layout');

       ?>  
       <style>
#target_goal
{
display: none;
}
#target_idp
{
display: none;
}
       table.mid-table td { border:1px solid red; height:37px;min-height: 190px;max-height: auto}
       table.mid-table th { border:1px solid red; height:37px;min-height: 190px;max-height: auto}

       table.mid-table1 td { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       table.mid-table1 th { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       </style>
       <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1> <?php  if(isset($q1_review) && $q1_review == 1) { ?>List Of Goal's<?php }else { echo "List Of Pending Approvals"; } ?></h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
               
            <script type="text/javascript">
                var j = jQuery.noConflict();
                function get_notify(e)
                {                    
                    var settings = {
                            theme: 'teal',
                            horizontalEdge: 'top',
                            verticalEdge: 'right'
                        },
                        $button = $(this);
                    
                    if (
                        $.trim($('#notific8_heading').val()) != '') {
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
            <?php
$set_flag = 'disabled';
          if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved')
          {
          //$set_flag = "'disabled'"."=>"."'disabled'";
          } 
$set_flag1 = "'disabled'= 'false'";
          if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved')
          {
          $set_flag1 = "'disabled'= 'true'";
          } 
?>
                <div class="container-fluid" style='background: #EFF3F8 none repeat scroll 0% 0%;'>
                <div class="page-content"  style="background:none">
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
                            <div class="form-group col-xs-3">
                              <label>Select Year</label>
                                <select class="form-control " name="financial_year" id="financial_year">
                                    <option>--Select--</option>
                                    <option <?php if(Yii::app()->user->getState('financial_year_check') == "2016-2017") { echo "selected"; } ?>>2016-2017</option>
                                    <option <?php if(Yii::app()->user->getState('financial_year_check') == "2017-2018") { echo "selected"; } ?>>2017-2018</option>
                                </select>
                            </div>
                            <div class="page-content-col">
                            <input type="button" class='get_print' style="display:none">
                            <?php  
                            // print_r($kpi_data);die();
                                if (isset($kpi_data) && count($kpi_data)>0) {
                            ?>
                            <div id="err" style="display: none"></div>
<?php 
       if (isset($kpi_data['0']['mid_year_goalsheet_doc']) && $kpi_data['0']['mid_year_goalsheet_doc'] != '') {
?>
<a href="<?php echo 'http://pmstest.kritva.in/Goalsheet_mid_docs/'."goalsheet_".$emp_data['0']['Emp_fname']."_".$emp_data['0']['Emp_lname'].".pdf"; ?>" target="_new"><?php echo CHtml::button('Goalsheet',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
<?php }?>
<?php
       if (isset($kpi_data['0']['mid_year_goalsheet_doc']) && $kpi_data['0']['mid_year_goalsheet_doc'] != '') {
?>
<a href="<?php echo 'http://kritvainvestments.com/pmsuser/IDP_mid_docs/'."IDP_".$emp_data['0']['Emp_fname']."_".$emp_data['0']['Emp_lname'].".pdf"; ?>" target="_new"><?php echo CHtml::button('IDP',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
<?php } ?>
                             <br><br> 
                               <!-- BEGIN PAGE BASE CONTENT -->                                
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                 <?php 
                                 
                                 
                                 if (isset($kpi_data2['0']['q1_KRA_final_status']) && $kpi_data2['0']['q1_KRA_final_status'] != 'Approved') {
                                    
                                  ?>

                                 <?php 
//echo CHtml::button('Final Submission',array('class'=>'btn border-blue-soft send_for_appraisal','id'=>$employee_data["0"]["Employee_id"]));
                                    }
$errors = array_filter($kpi_data2);

                                 ?>
                                 <div class="portlet box border-blue-soft bg-blue-soft" <?php if(!empty($errors)) { ?> style="margin-top: 10px;border: 1px solid grey;display:block" <?php }else { ?>style="margin-top: 10px;border: 1px solid grey;display:none"<?php } ?>>
<?php
if(isset($emp_data['0']['new_kra_till_date']) && $emp_data['0']['new_kra_till_date'] != '') {
$emp_data1 = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($emp_data['0']['new_kra_till_date']);
$new_kra_till_date = $emp_data1->get_employee_data($where,$data,$list);
}

?>
                                        <div class="portlet-title">
                                            <div class="caption">New Mid year review goalsheet (Reporting Manager : <?php if(isset($new_kra_till_date['0']['Emp_fname'])) { echo $new_kra_till_date['0']['Emp_fname']." ".$new_kra_till_date['0']['Emp_lname']." / "; } ?> From : <?php if(isset($emp_data['0']['reporting_1_effective_date'])) { echo date('d-M-Y', strtotime($emp_data['0']['reporting_1_effective_date']))." To : ".date('d-M-Y', strtotime('Dec 31')); } ?>)  
                                            </div>
                                            <div class="tools">
                                                <?php  if (isset($kpi_data2) && count($kpi_data2)>0) { echo "KRA Approval Status : ".$kpi_data2['0']['KRA_status']; } else { echo "KRA Approval Status : Pending"; }  ?>
                                                <a href="javascript:;" class="collapse"> </a>                                                    
                                            </div>
                                        </div>
                                        <div class="portlet-body flip-scroll">
                                 <?php
                                            if (!isset($approved_list)) { ?>                                           
                                        <?php    if (isset($kpi_data2) && count($kpi_data2)>0) { 
                                            $total_kpi_id_list = '';
                                               foreach ($kpi_data2 as $row) { $cnt = 0; ?>
                                               <table class="mid-table table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top: 45px;">
                                                   <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']);
                                                                $employee_comment = explode(';',$row['q1_employee_comment']);
                                                                $appr_comment = explode(';',$row['appraiser_comment']);
                                                                $appr_status = explode(';',$row['q1_KRA_status']);
                                                                $kra_status = $row['q1_KRA_final_status'];
                                                                //print_r($kra_status);die();
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
                                                                }
                                                                //print_r($appr_comment);die();
                                                                //print_r($kpi_list_data);die();
                                                                
                                                                 if (isset($total_kpi_id_list) && $total_kpi_id_list == '') {
                                                                     $total_kpi_id_list = $row['KPI_id'];
                                                                 }
                                                                 else
                                                                 {
                                                                    $total_kpi_id_list = $total_kpi_id_list.';'.$row['KPI_id'];
                                                                 }
                                                            ?>
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
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>KPI Unit</font></b></td>

                                                <td align="left" valign=middle><b><font face="Calibri" size=3>KPI Value</font></b></td>
<td align="left" valign=middle ><b><font face="Calibri" size=3>Employee Comments</font></b></td>

<?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Status</font></b></td>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Comments</font></b></td><?php } ?></tr> 
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_unit[$i]!='Select') { $cnt++;
                                                            ?>
 
                                                                <tr>
                                                                    <td><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i]; } echo""; ?></td>
                                                                    <td><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } echo""; ?></td>
                                                                    <td><?php
                                                                            if (isset($kpi_list_unit[$i]) && $kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                                 <tr>
                                                                                 <td colspan="2"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                  <td colspan="1"><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                                  <td colspan="1"><b><font face="Calibri" size=3>Unit value</font></b></td>
                                                                                  <td colspan="1"><?php if(isset($kpi_list_target[$i])) { echo $kpi_list_target[$i]; } ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr>
                                                                                    <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.69,2); } ?></td>
                                                                                    <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.70,2); } ?></td>
                                                                                       
                                                                                     <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.96,2); } ?></td>
                                                                                        
                                                                                    <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.06,2); } ?></td>
                                                                                        
                                                                                     <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.39,2); } ?></td>
                                                                                   </tr>
                                                                                 </table>

                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <?php 
                                                                                if(isset($kpi_list_target[$i]))
                                                                                {
                                                                                    $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }                                                                                
                                                                               ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                               <tr>
                                                                                  <td colspan="3"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                   <td colspan="2"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr class="content_hover">                                                                    
                                                                               <?php
                                                                               if(isset($value_data) && count($value_data)>0)
                                                                               {
for ($l=0; $l < count($value_data); $l++) { ?>                                                                              
                                                                               
<td><lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value_data[$l]; ?>"><?php echo strlen($value_data[$l]) >= 20 ? 
substr($value_data[$l], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
$value_data[$l]; ?></lable></td>
                                                                              <?php } } ?>
                                                                               </tr>
                                                                               </table>
                                                                               <?php
                                                                            }
                                                                        ?></td>
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
                                                                        <?php
                                                                         if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
                                                                            echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px'));
                                                                         }
                                                                       else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                                                         {
                                                                              echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px','disabled'=> "true"));
                                                                         }
                                                                   
                                                                 ?>
                                                                </td>
<?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>
                                                <td <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?> >
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

                                                                    echo CHtml::dropDownList("q1_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control q1_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status,'disabled'=> "true"));
                                                                 ?>
                                                                    </td>
                                                                    <td <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:block"<?php } ?>>
                                                                        <?php
                                                                            $apr_comment = '';
                                                                            if (isset($appr_comment[$i]) && $appr_comment[$i] != '') {
                                                                                $apr_comment = $appr_comment[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                                $apr_comment = '';
                                                                            }
                                                                            
                                                                    echo CHtml::textArea("review_comment",$apr_comment,$htmlOptions=array('class'=>"form-control review_comment".$row['KPI_id'].$i."",'style'=>"width: 186px;max-width: 186px;max-height: 58px;min-width: 186px;min-height: 58px;",'rows'=>2,'maxlength' => 100,'max','disabled'=> "true"));
                                                                        ?>
                                                                    </td>
                                                    <?php } ?>
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>
                                                                <i id="updation_spinner-<?php echo $row['KPI_id']; ?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;margin-left: 212px;display: none"></i>                                    
                                                   
                                                     <label id="get_kpi_count-<?php echo $row['KPI_id']; ?>" style="display: none"><?php if(isset($kpi_data_data)) { echo $kpi_data_data; } ?></label>
                                                      <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php 
//echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'float:right','id'=>"KPI_id-".$row['KPI_id']));
 } ?> 
                                                </table>  
<?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php                                                  
//echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'margin-left: 87%;','id'=>"KPI_id-".$row['KPI_id']));
 } ?>    
                        
                                            
                                         <?php 
                                           $cnt++; } }
                                            else
                                            { ?>
                                              <div class="page-content-inner">
                            <div class="note note-info">
                                <p> No Record Found </p>
                            </div>
                        </div>
                                          <?php  }
                                            }                                           
                                        ?>
                                        </div>
                                        </div>
                                <!-- BEGIN PAGE BASE CONTENT -->                                
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                 <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
                                  ?>

                                 <?php 
//echo CHtml::button('Final Submission',array('class'=>'btn border-blue-soft send_for_appraisal','id'=>$employee_data["0"]["Employee_id"]));
                                    }
                                 ?>
<?php
if(isset($emp_data['0']['Reporting_officer1_id']) && $emp_data['0']['Reporting_officer1_id'] != '') {
$emp_data1 = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($emp_data['0']['Reporting_officer1_id']);
$new_kra_till_date = $emp_data1->get_employee_data($where,$data,$list);
}
?>
                                 <div class="portlet box border-blue-soft bg-blue-soft"   style="margin-top: 38px;border: 1px solid grey;">
                                        <div class="portlet-title">
                                            <div class="caption">Mid year review goalsheet (Reporting Manager : <?php if(isset($new_kra_till_date['0']['Emp_fname'])) { echo $new_kra_till_date['0']['Emp_fname']." ".$new_kra_till_date['0']['Emp_lname']." / "; } ?> Till : <?php if(isset($emp_data['0']['reporting_1_effective_date']) && $emp_data['0']['reporting_1_effective_date']!= '0000-00-00') { echo date('d-M-Y', strtotime($emp_data['0']['reporting_1_effective_date']. ' -1 day')); }else{ echo date('d-M-Y', strtotime('Dec 31')); } ?>) 
                                            </div>
                                            <div class="tools">
                                                <?php  if (isset($kpi_data) && count($kpi_data)>0) { echo "KRA Approval Status : ".$kpi_data['0']['KRA_status']; } else { echo "KRA Approval Status : Pending"; }  ?>
                                                <a href="javascript:;" class="collapse"> </a>                                                    
                                            </div>
                                        </div>
                                        <div class="portlet-body flip-scroll">
                                 <?php 
                                            if (!isset($approved_list)) { ?>                                           
                                        <?php    if (isset($kpi_data) && count($kpi_data)>0) { 
                                            $total_kpi_id_list = '';
                                               foreach ($kpi_data as $row) { $cnt = 0; ?>
                                               <table class="mid-table table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top: 45px;">
                                                   <?php 
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']);
                                                                $employee_comment = explode(';',$row['q1_employee_comment']);
                                                               // $appr_comment = explode(';',$row['appraiser_comment']);
                                                                $appr_status = explode(';',$row['q1_emp_status']);
                                                                $kra_status = $row['q1_KRA_final_status'];
                                                                $appr_comment = explode(';',$row['q1_appraiser_comment']);
                                                               // print_r($kra_status);die();
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
                                                                }
                                                                //print_r($appr_comment);die();
                                                                //print_r($kpi_list_data);die();
                                                                
                                                                 if ($total_kpi_id_list == '') {
                                                                     $total_kpi_id_list = $row['KPI_id'];
                                                                 }
                                                                 else
                                                                 {
                                                                    $total_kpi_id_list = $total_kpi_id_list.';'.$row['KPI_id'];
                                                                 }
                                                            ?>
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
<?php 
$employee=new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($row['appraisal_id1']);
$emp_data_apr = $employee->get_employee_data($where,$data,$list);
?>

<tr>
                                    <td align="left" valign=middle><b><font face="Calibri" size=3>Key Performance Indicators (KPI) Description</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>KPI Unit</font></b></td>

                                                <td align="left" valign=middle><b><font face="Calibri" size=3>KPI Value</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Quaterly Review Status</font></b></td>
<td align="left" valign=middle ><b><font face="Calibri" size=3>Employee Comments</font></b></td>
<?php 
//print_r( $kpi_data);die(); 
?>
<?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') { ?>

                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Quater1 Review Status (Manager)</font></b></td>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Quater1 Review Comments (Manager)</font></b></td><?php } ?></tr> 
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_unit[$i]!='Select') { $cnt++;
                                                            ?>
 
                                                                <tr>
                                                                    <td><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i];echo""; }  ?></td>
                                                                    <td><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i];echo""; } ?></td>
                                                                    <td><?php
                                                                            if (isset($kpi_list_unit[$i]) && $kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                                 <tr>
                                                                                 <td colspan="2"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                  <td colspan="1"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; }  ?></td>
                                                                                  <td colspan="1"><b><font face="Calibri" size=3>Unit value</font></b></td>
                                                                                  <td colspan="1"><?php if(isset($kpi_list_target[$i])) { echo $kpi_list_target[$i]; } ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr>
                                                                                    <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.69,2); } ?></td>
                                                                                    <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.70,2); } ?></td>
                                                                                       
                                                                                     <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.96,2); } ?></td>
                                                                                        
                                                                                    <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.06,2); } ?></td>
                                                                                        
                                                                                     <td><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.39,2); } ?></td>
                                                                                   </tr>
                                                                                 </table>

                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <?php 
                                                                                if(isset($kpi_list_target[$i]))
                                                                                {
                                                                                    $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }
                                                                                
                                                                               ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                               <tr>
                                                                                  <td colspan="3"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                   <td colspan="2"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; }  ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr class="content_hover">                                                                    
                                                                               <?php 
                                                                               if(isset($value_data) && count($value_data)>0)
                                                                               {
                                                                               for ($l=0; $l < count($value_data); $l++) { ?>
<td><lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value_data[$l]; ?>"><?php echo strlen($value_data[$l]) >= 20 ? 
substr($value_data[$l], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
$value_data[$l]; ?></lable></td>
                                                                              <?php } } ?>
                                                                               </tr>
                                                                               </table>
                                                                               <?php
                                                                            }
                                                                        ?></td>
                                                                 
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
if((isset($row['q1_KRA_final_status']) && $row['q1_KRA_final_status'] != 'Approved')) 
{
                                                                    echo CHtml::dropDownList("q1_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control q1_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status));
}
else
{
echo CHtml::dropDownList("q1_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control q1_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status,'disabled'=> "true"));
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
                                                                        <?php
                                                                         if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
                                                                            echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px'));
                                                                         }
                                                                       else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                                                         {
                                                                              echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px','disabled'=> "true"));
                                                                         }
                                                                   
                                                                 ?>
                                                                </td>
                                                                    </td>
<?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>
                                                <td <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?> >
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
                                                                    //print_r("dfdsfd");die();
                                                                   $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');

                                                                    echo CHtml::dropDownList("q1_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control q1_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status,'disabled'=> "true"));
                                                                 ?>
                                                                    </td>
                                                                    <td <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved') {?>style="display:block"<?php } ?>>
                                                                        <?php
                                                                            $apr_comment = '';
                                                                            if (isset($appr_comment[$i]) && $appr_comment[$i] != '') {
                                                                                $appr_comment = $appr_comment[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                                $appr_comment = '';
                                                                            }
                                                                            
                                                                    echo CHtml::textArea("review_comment",$appr_comment,$htmlOptions=array('class'=>"form-control review_comment".$row['KPI_id'].$i."",'style'=>"width: 186px;max-width: 186px;max-height: 58px;min-width: 186px;min-height: 58px;",'rows'=>2,'maxlength' => 100,'max','disabled'=> "true"));
                                                                        ?>
                                                                    </td>
                                                    <?php } ?>
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>
                                                                <i id="updation_spinner-<?php echo $row['KPI_id']; ?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;margin-left: 212px;display: none"></i>                                    
                                                   
                                                     <label id="get_kpi_count-<?php echo $row['KPI_id']; ?>" style="display: none"><?php if(isset($kpi_data_data)) { echo $kpi_data_data; }  ?></label>
                                                      <?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php 
//echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'float:right','id'=>"KPI_id-".$row['KPI_id']));
 } ?> 
                                                </table>  
<?php if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php                                                  
//echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'margin-left: 87%;','id'=>"KPI_id-".$row['KPI_id']));
 } ?>    
                        
                                            
                                         <?php 
                                           $cnt++; } }
                                            else
                                            { ?>
                                              <div class="page-content-inner">
                            <div class="note note-info">
                                <p> No Record Found </p>
                            </div>
                        </div>
                                          <?php  }
                                            }                                           
                                        ?>
                                        </div>
                                        </div>
                                         <label id='total_kpi_id_list' style="display: none"><?php if(isset($total_kpi_id_list)) { echo $total_kpi_id_list; } ?></label> 
                                        <?php if (isset($approved_list) && count($approved_list)>0) { ?>
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
                                                            foreach ($kpi_data as $row) { $cnt = 0;?>
                                                            <tr>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0 && isset($employee_data['0'][$cnt]['Employee_id'])) { echo $employee_data['0'][$cnt]['Employee_id']; }?> </td>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0 && isset($employee_data['0'][$cnt]['Emp_fname'])) { echo $employee_data['0'][$cnt]['Emp_fname']; }?> </td>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0 && isset($employee_data['0'][$cnt]['Department'])) { echo $employee_data['0'][$cnt]['Department']; }?> </td>
                                                                <td> 
                                                                    <?php
                                                                        $kpi_list_data = '';
                                                                        $kpi_list_data = explode(';',$row['kpi_list']);
                                                                    ?>                                                               
                                                                    <table class="table">
                                                                    <?php 
                                                                    if(isset($kpi_list_data) && count($kpi_list_data)>0)
                                                                    {
                                                                    for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    ?>
                                                                    <tr><td><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i];echo""; }  ?></td></tr>
                                                                    <?php
                                                                        } }
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
                                        <?php } ?>
                                        <style type="text/css">
                                                                .file-blue:before {
                                                                  content: 'Browse File';
                                                                  background: -webkit-linear-gradient( -180deg, #99dff5, #02b0e6);
                                                                  background: -o-linear-gradient( -180deg, #99dff5, #02b0e6);
                                                                  background: -moz-linear-gradient( -180deg, #99dff5, #02b0e6);
                                                                  background: linear-gradient( -180deg, #99dff5, #02b0e6);
                                                                  border-color: #57cff4;
                                                                  color: #FFF;
                                                                  text-shadow: 1px 1px rgba(000,000,000,0.5);
                                                                }
                                                                .file-blue:hover:before {
                                                                  border-color: #02b0e6;
                                                                }
                                                                .file-blue:active:before {
                                                                  background: #02b0e6;
                                                                }
                                                                
                                                               </style>  
                                                               <?php 
       if (isset($kpi_data['0']['mid_year_goalsheet_doc']) && $kpi_data['0']['mid_year_goalsheet_doc'] != '') {
?>
<a href="<?php echo 'http://kritvainvestments.com/pmsuser/data(proof)/'.$kpi_data['0']['mid_year_goalsheet_doc']; ?>" target="_new"><label style="margin-top: -64px;
margin-left: 15px;"><?php echo "Goalsheet Document"; ?></label></a>
<?php } ?>
<?php 
                                                                         if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
?>                                                                      
                                                   <label  class="custom-file-input file-blue file_change" id="file_change" style="width: 157px;float: right;margin-top: -54px;margin-right: 154px;display: none">
                                                        <input id="file-input" class='file-input' type="file"  name='employee_csv' style="display: none" /><label id='uploaded_file' style="margin-left: 165px;
margin-top: -37px;
">
                                                      </label>
<?php
}
?>


                                                                 
                                         </div>
                                        </div>
                                        <input type='text' name="correct_emp_id" style="display: none">
                                        <input type='text' name="program_review_by_emp" style="display: none">
                                        <input type='text' name="extra_program_review_by_emp" style="display: none">
                                        <input type='text' name="rel_program_review_by_emp_name" style="display: none">
                                        <input type='text' name="emp_project_q1_review" style="display: none">
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                        <!-- END SAMPLE TABLE PORTLET--> 
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                     <div  style="min-width: 900px;border: 1px solid rgb(76, 135, 185);" class="portlet box bg-blue-soft border-blue-soft">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                Midyear review IDP
                                                   </div>
                                                   <div class="tools">
                                                            <a href="javascript:;" class="collapse"></a>
                                                    </div>
                                            </div>                                    
                                            <div style="min-width: 900px;" class="portlet-body tabs-below">
                                                <div class="tab-content">
                                            <label id="kra_count" style="display: none"><?php if(isset($kpi_data)) { echo count($kpi_data); }?></label>
                                            <div style="margin-top: 20px;padding-left: 10px;min-width: 900px;">
                                                     <form action="#" id="form-username" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group ">
                                                      <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Employee Name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                          <?php 
                                                          if(isset($emp_data)&& count($emp_data)>0){
                                                            if(isset($emp_data[0]['Emp_fname']) && isset($emp_data[0]['Emp_lname'])) {
                                                                echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
                                                              }  }?>
                                                                                                           
                                                        
                                                        </div>
                                                        <div class="col-md-2"><label class="col-md-2">
                                                       <span class="bold">Manager’s name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                        <?php if(isset($mgr_data) && count($mgr_data)>0){
                                                          if(isset($mgr_data[0]['Emp_fname']) && isset($mgr_data[0]['Emp_lname'])) {
                                                             echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];} }
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Employee Code</span></label>
                                                  </div>
                                                        <div class="col-md-4">                                                        
                                                           <?php  if(isset($emp_data)&& count($emp_data)>0){
                                                            if(isset($emp_data[0]['Employee_id'])) {
                                                           echo $emp_data[0]['Employee_id'];  } }?> 
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
                                        <th>Progress on training programs (Manager)</th>
                                        <!--<th>Program completed</th>-->
                                        <th>Review</th>                                       
                                    </thead>
                                    <tbody>
<?php


                                     $compulsory = '';$program_state = '';$program_cmnt = '';$state = 0;$review_state = '';$program_state1 = '';$not_undefine = '';$program_review_by_emp = '';
                                    if (isset($program_data_result) && count($program_data_result)>0) { 
                                        for ($i=0; $i <= count($program_data_result); $i++) {
                                         
                                         $cmnt = '';
                                            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment']) && $IDP_data['0']['program_comment'] != '') {
                                          $cmt2 = explode(';', $IDP_data['0']['program_comment']);   
                                                for ($j=0; $j < count($cmt2); $j++) {
                                                    if(isset($cmt2[$j])) {
                                                    $cmt1 = explode('?', $cmt2[$j]); 
                                                    if (isset($cmt1[0]) && $i == $cmt1[0]) {    
                                                      if(isset($cmt1[1])) {                                                        
                                                         $cmnt = $cmt1[1];
                                                       }
                                                         //$state = $cmt1[0];
                                                         // $review_state = $program_cmnt[$state];
                                                    } }
                                                }
                                            }
                                            else
                                            {
                                                $cmnt = '';
                                                //$review_state = '';
                                            }

                                                if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['q1_program_review_by_emp']) && $IDP_data['0']['q1_program_review_by_emp'] != '') {
                                                    $program_review_by_emp_value = explode(';', $IDP_data['0']['q1_program_review_by_emp']);  
                                                    for ($j=0; $j < count($program_review_by_emp_value); $j++) 
                                                    {
                                                      if(isset($program_review_by_emp_value[$j]))
                                                      {
                                                        $program_review_by_emp_value1 = explode('?', $program_review_by_emp_value[$j]);
                                                        if (isset($program_review_by_emp_value1[0]) && $i == $program_review_by_emp_value1[0]) {    
                                                          if(isset($program_review_by_emp_value1[1])) {                                                        
                                                             $program_review_by_emp = $program_review_by_emp_value1[1];
                                                           }
                                                        }
                                                      }                                                        
                                                    }   
                                                    //$program_review_by_emp = $program_review_by_emp_value[$i];
                                            }
                                            else
                                            {
                                                $program_review_by_emp = '';
                                                //$review_state = '';
                                            }
                                            if (isset($IDP_data['0']['q1_prgrm_cmd']) && $IDP_data['0']['q1_prgrm_cmd'] != '') 
                                            {
                                              if(isset($IDP_data['0']['mid_status']))
                                              {
                                                $program_state = explode(';',$IDP_data['0']['mid_status']);
                                              }
                                               if(isset($IDP_data['0']['q1_prgrm_cmd']))
                                              {
                                                $program_state = explode(';',$IDP_data['0']['q1_prgrm_cmd']);
                                              }

                                              if (isset($program_cmnt[$state])) {
                                                $review_state = $program_cmnt[$state];
                                                if(isset($program_state[$state]))
                                                {
                                                   $program_state1 = $program_state[$state];
                                                }
                                               
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
                                            if (isset($cmnt) && $cmnt != '' && $cmnt != 'undefined') {
                                                
                                              ?>
                                            <tr class="error_row_chk">                                                               
                                                <td class="prog_name"  id="<?php echo 'prg'.$i; ?>"> <?php if(isset($program_data_result[$i]['program_name'])) { echo $program_data_result[$i]['program_name']; } ?> <?php if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?></td>
                                                <td> <?php if(isset($program_data_result[$i]['faculty_name'])) { echo $program_data_result[$i]['faculty_name']; } ?> </td>
                                                <td> <?php if(isset($program_data_result[$i]['training_days'])) { echo $program_data_result[$i]['training_days']; } ?> </td>
                                                <td class="col-md-4">
                                                <?php 
                                                    echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,'disabled'=> "true"));
                                                ?> </td>
                                                 <td>
                                                    <?php
                                                    if(isset($IDP_data['0']['q1_emp_trn_prog_stat']))
                                                    {
                                                       $appr_status1 = explode(';',$IDP_data['0']['q1_emp_trn_prog_stat']);
                                                    }
                                                   
                                         //  print_r($appr_status1);
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
  if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
echo CHtml::dropDownList("tot_prog_status_emp-".$i,'',$review_type,$htmlOptions=array('class'=>"form-control tot_prog_status_emp-".$i,'style'=>"width: 186px;",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("tot_prog_status_emp-".$i,'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control tot_prog_status_emp-".$i,'style'=>"width: 186px;",'options' => $status));
}
                                                    ?>
                                                </td>
                                                <td class="col-md-4">
                                                <?php 
                       if(isset($program_review_by_emp))
                                                {
                                                  $program_review_by_emp = $program_review_by_emp;
                                                }
                                                else
                                                {
                                                  $program_review_by_emp = '';
                                                }                         
if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
{
                                                  //print_r($IDP_data);die();
                                                    echo CHtml::textField('program_review_by_emp',$program_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_review_by_emp",'id'=>'program_review_by_emp-'.$i));
}
else
{//print_r($IDP_data);die();
echo CHtml::textField('program_review_by_emp',$program_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_review_by_emp",'id'=>'program_review_by_emp-'.$i,'disabled'=> "true"));
}
                                                ?> </td>
                                                <!--<td>-->
                                                <!--<input type="radio" disabled="true" name='completeion_type1<?php echo $i; ?>'  value="Yes" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'Yes') { ?>checked='check'<?php } ?>>Yes-->
                                                <!--<input type="radio" disabled="true" name='completeion_type1<?php echo $i; ?>' value="No" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'No') { ?>checked='check'<?php } ?>>No-->
                                                
                                                <!--</td>-->
                                                 <td>
                                                    <?php  
                                                   //print_r($IDP_data);die();
                                                    if(isset($IDP_data['0']['q1_mgr_trn_prog_stat']))
                                                    {
                                                       $appr_status1 = explode(';',$IDP_data['0']['q1_mgr_trn_prog_stat']);
                                                    }                                           
                                            // print_r($IDP_data['q1_mgr_trn_prog_stat']);die();
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
 echo CHtml::dropDownList("tot_prog_status_mgr-".$i,'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control tot_prog_status_mgr-".$i,'style'=>"width: 186px;",'options' => $status));
}
                                                    ?>
                                                </td>
                                                <td class="col-md-4">
                                                <?php 
                                                if(isset($review_state))
                                                {
                                                  $review_state = $review_state;
                                                }
                                                else
                                                {
                                                  $review_state = '';
                                                }
                                                    echo CHtml::textField('program_review',$review_state,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_review",'id'=>'program_review-'.$i,'disabled'=> "true"));
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
                                    <label id="compulsory_id" style="display: none"><?php if(isset($compulsory)) { echo $compulsory;   } ?></label>
                                    </tbody>

                                    </tbody>

                                 </table>     
                                                </div>
                                                    <div class="form-group error_row_chk2">
                                                    <label class="col-md-12 control-label">
                                                      <span class="bold" style="color:#337ab7;font-size: 14px;float: left;">If you need a program that is not mentioned above, please use the space below. Please note this program may be offered if at least 20 people request for it. 
                                                    </span></label>
                                                    
                                                </div>
                                                <?php 
                                                $count = '';$count_value = 0;
                                                 if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
                                                 if(isset($IDP_data['0']['extra_topic']))
                                                 {
                                                    $count = explode(';',$IDP_data['0']['extra_topic']);
                                                 }
                                                                    
                                                                 
//die();
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
                                                  <div class="row_rfrsh">
                                                 <?php 
                                                 $extra_prgrm_cmd = '';$extra_program_status = '';$extra_prgrm_cmd1 = '';$extra_program_status1 = ''; $extra_program_status2 = ''; $extra_program_status3 = '';$rel_prgrm_cmd1 = '';$rel_prgrm_cmd2 = '';$rel_program_review_by_emp = '';$rel_program_emp_cmd = '';$rel_program_emp_cmd1 = '';$rel_program_emp_cmd0 = '';$extra_program_review_by_emp = '';$extra_program_review_by_emp0 = '';$extra_program_review_by_emp1 = '';
                                                    if (isset($count) && $count !='') {
                                                      for ($m=0; $m < count($count); $m++) {  

                                                        if (isset($count[$m]) && $count[$m] != 'undefined') {
                                                        $count_value++;
                                                        $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                        $extra_prgrm_cmd = explode(';',$IDP_data['0']['q1_extra_prgrm_cmd']);
                                                        $extra_program_status = explode(';',$IDP_data['0']['q1_extra_program_status']);
                                                        $rel_program_status2 = explode(';',$IDP_data['0']['rel_program_review_status']);
                                                        $rel_program_status3 = explode(';',$IDP_data['0']['q1_rel_program_review']);
                                                        //print_r($IDP_data['0']['rel_program_review_by_emp']);die();
                                                        if (isset($IDP_data['0']['q1_extra_program_review_by_emp'])) {
                                                             $extra_program_review_by_emp = explode(';',$IDP_data['0']['q1_extra_program_review_by_emp']);
                                                        }
                                                       
                                                        if (isset($extra_program_review_by_emp[1])) {
                                                             $extra_program_review_by_emp1 = $extra_program_review_by_emp[1];
                                                        }
                                                        if (isset($IDP_data['0']['q1_rel_program_review_by_emp'])) {
                                                             $rel_program_review_by_emp = explode(';',$IDP_data['0']['q1_rel_program_review_by_emp']);
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
                                                          $rel_prgrm_cmd2 = $rel_program_status3[1];
                                                        }
                                                        else
                                                        {
                                                          $extra_program_status3 = '';
                                                           $rel_prgrm_cmd2 = '';
                                                        }   
                                                        if (isset($rel_program_review_by_emp[0])) {
                                                          //$rel_program_emp_cmd = $rel_program_review_by_emp[0];
                                                          $rel_program_emp_cmd0 = $rel_program_review_by_emp[0];
                                                        }
                                                        else
                                                        {
                                                          $rel_program_emp_cmd = '';
                                                           $rel_program_emp_cmd0 = '';
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
                                                    ?>
                                     <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-2">
                                                         <?php   
                                                         $topic = '';$day = '';$faculty = '';
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
                                                         echo CHtml::textField('topic'.$m,$topic,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 topic".$m,'disabled'=> "true")); ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo CHtml::textField('days_required'.$m,$day,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 days_required".$m,'disabled'=> "true")); ?> 
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
                                                        <?php
   if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
                                            {
                                                    echo CHtml::textField('extra_program_review_by_emp',$extra_program_review_by_emp0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 extra_program_review_by_emp",'id'=>'extra_program_review_by_emp-'.$m));
}
else
{
echo CHtml::textField('extra_program_review_by_emp',$extra_program_review_by_emp0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 extra_program_review_by_emp",'id'=>'extra_program_review_by_emp-'.$m,'disabled'=> "true"));
} 
                                                            
                                                        ?> </div>
                                                        <div  class="col-md-2">
                                                         <input type="radio" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="Yes" class='extra_completeion_type<?php echo $m; ?>' <?php if(isset($extra_program_status1) && $extra_program_status1 == 'Yes') { ?>checked='check'<?php } ?>>Yes 
                                                <input type="radio" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="No" class='extra_completeion_type<?php echo $m; ?>' <?php if(isset($extra_program_status1) && $extra_program_status1 == 'No') { ?>checked='check'<?php } ?>>No
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
                                                            echo CHtml::textField('extra_program_review',$extra_prgrm_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 extra_program_review",'id'=>'extra_program_review-'.$m,'disabled'=> "true"));
                                                        ?> </div>
                                                    </div>

                                                  <?php    }
                                                    }
                                                  }
                                                }
                                                 ?>
                                                  <label id="program_count" style="display: none"><?php echo $not_undefine; ?></label>
                                                <lable id="extra_program_count"  style="color: red;float: right;display: none"><?php echo $count_value; ?>
                                                </lable>
                                                    </div>
                                                     <div id="new_topic">
                                                     </div>
                                                <div class="form-group">
                                                <div class="col-md-12 bold">
                                                
                                                </lable></div>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>                                   
                                    <!-- END PORTLET-->
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
                                                       <label class="control-label col-md-1 bold" style="text-align:center" >Relationship</label>
                                                        <label class="control-label col-md-1 bold" style="text-align:center">Name of leader</label>
                                                        <label class="control-label col-md-1 bold" style="text-align:center">Number of Meetings planned</label>
                                                        <label class="control-label col-md-1 bold" style="text-align:center">Target date</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Progress on Coaching/Mentoring (Employee)</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Employee Comments</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Progress on Coaching/Mentoring (Manager)</label>
                                                        <label class="control-label col-md-2 bold" style="text-align:center">Review</label>
                                                    </div>
 <div class="form-group">
                                                       
                          <label class="control-label col-md-1"  style="text-align: left;">Coaching through leader in own function for functional inputs</label>
                                                        <div class="col-md-1">
                                                           <?php 
                                                            $faculty3 = '';
                                                            if (isset($IDP_data['0']['leader_name']) && $IDP_data['0']['leader_name']!='') {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[0])) {
                                                                $faculty3 = $faclty[0];
                                                              }
                                                              //$faculty3[$faclty[0]] = array('selected' => 'selected');
                                                            }
                                          
                                                             echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-2 faculty_email_id3",'id'=>'faculty_email_id3','disabled'=> "true"));
                                                            ?>
                                                          </div>
                                                       <div class="col-md-1">
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
                                                              echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-1 number_of_meetings3",'id'=>'number_of_meetings3','disabled'=> "true")); ?> 
                                                          </div>
                                                        <div class="col-md-1">
                                                            <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 106px !important">
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date3" readonly="" type="text" value="<?php echo $rel2[0]; ?>" id="target_date3">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date3" readonly="" type="text"  id="target_date3">
                                                                 <?php   }
                                                                ?>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                             <?php 
                                                             if(isset($IDP_data['0']['q1_rel_prog_cmt_emp']))
                                                             {
                                                                $appr_status1 = explode(';',$IDP_data['0']['q1_rel_prog_cmt_emp']);                                                               
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
if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
                                            {
echo CHtml::dropDownList("rel_prg_status_emp-3",'',$review_type,$htmlOptions=array('class'=>"form-control rel_prg_status_emp-3",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("rel_prg_status_emp-3",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_emp-3",'options' => $status));
}
                                                    ?>
                                                            
                                                        </div>
                                                        
                                                        
                                                                        <div class="col-md-2">
                                                        <?php 
                                                        if(isset($rel_prgrm_cmd2))
                                                        {
                                                        }
                                                        else
                                                        {
                                                        $rel_prgrm_cmd2 = '';
                                                        } 
 if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
                                            {
                                                   echo CHtml::textArea('rel_program_review1_by_emp',$rel_program_emp_cmd0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review1_by_emp",'id'=>'rel_program_review1_by_emp-1'));
}
else
{
echo CHtml::textArea('rel_program_review1_by_emp',$rel_program_emp_cmd0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review1_by_emp",'id'=>'rel_program_review1_by_emp-1','disabled'=> "true"));
}  
                                                            
                                                        ?> </div>
                                                        <div  class="col-md-2">
                                                <!--         <input type="radio" disabled="true" name='rel_completeion_type0' value="Yes" class='rel_completeion_type0' <?php  if(isset($extra_program_status2) && $extra_program_status2 == 'Yes') { ?>checked='check'<?php } ?>>Yes-->
                                                <!--<input type="radio" disabled="true" name='rel_completeion_type0' value="No" class='rel_completeion_type0' <?php if(isset($extra_program_status2) && $extra_program_status2 == 'No') { ?>checked='check'<?php } ?>>No                                                       -->
                                                      <?php  
                                                      if(isset($IDP_data['0']['q1_rel_prog_cmt_mgr']))
                                                      {
                                                        $appr_status1 = explode(';',$IDP_data['0']['q1_rel_prog_cmt_mgr']);
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
if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
                                            {
echo CHtml::dropDownList("rel_prg_status_mgr-0",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_mgr-0",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("rel_prg_status_mgr-0",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_mgr-0",'options' => $status));
}
                                                    ?>
                                                        </div> 
                                                         <div class="col-md-2">
                                                        <?php
if(isset($rel_prgrm_cmd1))
{
}
else
{
$rel_prgrm_cmd1 = '';
}  
                                                            echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-2 rel_program_review",'id'=>'rel_program_review-0','disabled'=> "true"));
                                                        ?> </div>
                                                    </div>

                                                    <div class="form-group">                                                        
                                                        <label class="control-label col-md-1"  style="text-align: left;">Mentoring through leader from different function for behavioural inputs</label>
                                                        <div class="col-md-1">
                                                            <?php 
                                                            $faculty4 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              if(isset($IDP_data['0']['leader_name']))
                                                              {
                                                                $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              }                                                               
                                                              if (isset($faclty[1])) {
                                                                $faculty4 = $faclty[1];
                                                              }
                                                              //$faculty4[$faclty[1]] = array('selected' => 'selected');
                                                            }
                                                             
                                                            echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-2 faculty_email_id4",'id'=>'faculty_email_id4','disabled'=> "true"));
                                                             ?>
                                                          </div>
                                                       <div class="col-md-1">
                                                           <?php 
                                                           $meet = '';
                                                          if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                                                            if(isset($IDP_data['0']['meeting_planned']))
                                                            {
                                                              $meet = explode(';',$IDP_data['0']['meeting_planned']);
                                                            }

                                                            if(isset($meet[1]))
                                                            {
                                                                $meet = $meet[1];
                                                            }                                                           
                                                            
                                                          }
                                                          else
                                                          {
                                                            $meet = '';
                                                          }
                                                          echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-1 number_of_meetings4",'id'=>'number_of_meetings4','disabled'=> "true")); ?> 
                                                          </div>
                                                        <div class="col-md-1">
                                                            <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 106px !important">
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date4" readonly="" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date4" readonly="" type="text"  id="target_date4" disabled="true">
                                                                 <?php   }
                                                                ?>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                         <div class="col-md-2">
                                                             <?php 
                                                             if(isset($IDP_data['0']['q1_rel_prog_cmt_emp']))
                                                             {
                                                                $appr_status1 = explode(';',$IDP_data['0']['q1_rel_prog_cmt_emp']);
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
if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
                                            {
echo CHtml::dropDownList("rel_prg_status_emp-4",'',$review_type,$htmlOptions=array('class'=>"form-control rel_prg_status_emp-4",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("rel_prg_status_emp-4",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_emp-4",'options' => $status));
}
                                                    ?>
                                                            
                                                       
                                                                                                             
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <?php 
                                                        if(isset($rel_prgrm_cmd2))
                                                        {
                                                        }
                                                        else
                                                        {
                                                        $rel_prgrm_cmd2 = '';
                                                        }  
if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
                                            {
                                                   echo CHtml::textArea('rel_program_review2_by_emp',$rel_program_emp_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review2_by_emp",'id'=>'rel_program_review1_by_emp-2'));
}
else
{
echo CHtml::textArea('rel_program_review2_by_emp',$rel_program_emp_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review2_by_emp",'id'=>'rel_program_review1_by_emp-2','disabled'=> "true"));
}  
                                                            
                                                        ?> </div>
                                                        <div  class="col-md-2">
                                                        <!--<input type="radio" disabled="true" name='rel_completeion_type1' value="Yes" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes-->
                                                        <!--<input type="radio" disabled="true" name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No                              
                                                        -->
                                                         <?php 
                                                         if(isset($IDP_data['0']['q1_rel_prog_cmt_mgr']))
                                                         {
                                                            $appr_status1 = explode(';',$IDP_data['0']['q1_rel_prog_cmt_mgr']);
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
                                                                   //  print_r($status);
                                                    $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::dropDownList("rel_prg_status_mgr-1",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_mgr-1",'options' => $status,$set_flag));
}
else
{
 echo CHtml::dropDownList("rel_prg_status_mgr-1",'',$review_type,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control rel_prg_status_mgr-1",'options' => $status));
}
                                                    ?>
                                                            
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <?php
if(isset($rel_prgrm_cmd2))
{
}
else
{
$rel_prgrm_cmd2 = '';
}  
                                                            echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review",'id'=>'rel_program_review-1','disabled'=> "true"));
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('disabled' => 'disabled','maxlength'=>80,'class'=>"form-control col-md-4 project_title1"));
}
else
{
 echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_title1",'disabled'=> "true"));
}
                                                         ?>    
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold">Review date</label>
                                                    <div class="col-md-2">                                                        
                                                         <?php
                                                                  if (isset($IDP_data['0']['project_review_date'])) { ?>
                                                                       <input class="form-control" <?php echo $set_flag1; ?>  type="text" value="<?php echo $IDP_data['0']['project_review_date']; ?>" id="review_date" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control" type="text" id="review_date" disabled="true">
                                                                 <?php   }
                                                                ?>
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Target end date</label>
                                                    <div class="col-md-2">
                                                        
                                                                <?php
                                                                  if (isset($IDP_data['0']['project_end_date'])) {  ?>
                                                                       <input class="form-control" <?php echo $set_flag1; ?>  type="text" value="<?php echo $IDP_data['0']['project_end_date']; ?>" id="target_end_date" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control" type="text" id="target_end_date" disabled="true">
                                                                 <?php   }
                                                                ?>
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_scope"));
}
else
{
 echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('class'=>"form-control col-md-4 project_scope",'disabled'=> "true"));
}
                                                         ?> 
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_exclusion"));
}
else
{
 echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('class'=>"form-control col-md-4 project_exclusion",'disabled'=> "true"));
}
                                                         ?> 
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_deliverables",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;'));
}
else
{
 echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('class'=>"form-control col-md-4 project_deliverables",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;','disabled'=> "true"));
}
                                                         ?> 
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textArea('exp',$expected,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 learn_from"));
}
else
{
 echo CHtml::textArea('exp',$expected,$htmlOptions=array('class'=>"form-control col-md-4 learn_from",'disabled'=> "true"));
}
                                                        ?>  
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('disabled' => 'disabled','maxlength'=>80,'class'=>"form-control col-md-4 reviewvers_name"));
}
else
{
 echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 reviewvers_name",'disabled'=> "true"));
}
                                                         ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold ">Project Comments</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_q1_review_by_emp = '';
                                                        if (isset($IDP_data['0']['project_q1_review_by_emp'])) {
                                                          $project_q1_review_by_emp = $IDP_data['0']['project_q1_review_by_emp'];
                                                        }
                                                        else
                                                        {
                                                          $project_q1_review_by_emp = '';
                                                        }
if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') 
                                            {
                                                   echo CHtml::textArea('project_q1_review_by_emp',$project_q1_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_q1_review_by_emp",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;'));
}
else
{
echo CHtml::textArea('project_q1_review_by_emp',$project_q1_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_q1_review_by_emp",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;','disabled'=> "true"));
}  
                                                         ?> 
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

                                                            echo CHtml::dropDownList("project_mid_status",'',$review_type,$htmlOptions=array('class'=>"form-control project_mid_status",'style'=>"width: 186px;",'options' => $status,'disabled'=> "true"));
                                                       ?> 
                                                    </div>
                                                </div>                                                
                                                 <div class="form-group last">
                                                    <label class="col-md-3 control-label bold ">Project Review</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_q1_review = '';
                                                        if (isset($IDP_data['0']['project_q1_review'])) {
                                                          $project_q1_review = $IDP_data['0']['project_q1_review'];
                                                        }
                                                        else
                                                        {
                                                          $project_q1_review = '';
                                                        }
                                                        echo CHtml::textArea('project_q1_review',$project_q1_review,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_q1_review",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;','disabled'=> "true")); ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 bold"><lable id="error_spec4"  style="color: red;float: right;"></lable></div>
                                                </div>
                                            </form>

                                        </div>
<div id="saving" style="display:none">Please Wait while data getting saved...<i id="" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;"></i></div>
                                    </div>
                                                               </style>  
                                                               <?php 
       if (isset($IDP_data['0']['mid_year_idp_doc']) && $IDP_data['0']['mid_year_idp_doc'] != '') {
?>
<a href="<?php echo 'http://kritvainvestments.com/pmsuser/data(proof)/idp'.$IDP_data['0']['mid_year_idp_doc']; ?>" target="_new"><label><?php echo "IDP Document"; ?></label></a>
<?php } ?>

<?php
                                                                         if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved') {
?>
                                    <label  class="custom-file-input file-blue file_change1" id="file_change" style="width: 157px;float: right;margin-right: 154px;display: none">
                                                        <input id="file-input" class='file-input1' type="file"  name='employee_csv1' style="display: none" /><label id='uploaded_file1' style="margin-left: 165px;
margin-top: -37px;
">
                                                      </label>
<?php } ?>


                                    <!-- END PORTLET-->
                                </div>
                                </div>
                </div>
                </div>
                </form></div>
                <div class="portlet box blue" style="border: 1px solid rgb(76, 135, 185);background-color:rgb(76, 135, 185)">
                                        <div class="portlet-title" style="border: 1px solid rgb(76, 135, 185);background-color:rgb(76, 135, 185)">
                                            <div class="caption">
                                               Feedback </div>
                                            <div class="tools">
                                               <!--  <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a> -->
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                           <div style="border: 1px solid #c2cad8;margin-top: 20px;">
                                           <table class="table" style="border: none;">
                                               <thead>
                                                   <th style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;text-align: center;"><b>Question</b></th>
                                                   <th style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;text-align: center;"><b>Employee's Comments</b></th>
                                                   <th style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;text-align: center;"><b>Manager's Comment</b></th>
                                               </thead>
                                                <tbody>
                                                   <tr ><td class="col-md-4" style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;"><label style="margin-top: 15px;margin-left: 0px;margin-bottom: 15px;"><b>1) What went well in the last quarter?</b></label></td>
                                                     <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                           <?php
                                             if (isset($kpi_data['0']['q1_emp_cmt1'])) {
                                                echo CHtml::textArea("emp_cmt1",$kpi_data['0']['q1_emp_cmt1'],$htmlOptions=array('class'=>"form-control emp_cmt1"));
                                             } 
                                             else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                             {
                                                 $kpi_data['0']['q1_emp_cmt1']='';
                                                echo CHtml::textArea("emp_cmt1",$kpi_data['0']['q1_emp_cmt1'],$htmlOptions=array('class'=>"form-control emp_cmt1",'disabled'=> "true"));
                                             }
                                             ?> 
                                                            
                                                            </td>
                                                        <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                       <?php
                                             if (isset($kpi_data['0']['q1_mgr_cmt1'])) {
                                                echo CHtml::textArea("emp_mgr1",$kpi_data['0']['q1_mgr_cmt1'],$htmlOptions=array('class'=>"form-control emp_mgr2"));
                                             }
                                             else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                             {
                                                 $kpi_data['0']['q1_mgr_cmt1']='';
                                                echo CHtml::textArea("emp_mgr1",$kpi_data['0']['q1_mgr_cmt1'],$htmlOptions=array('class'=>"form-control emp_mgr1",'disabled'=> "true"));
                                             }
                                             ?> 
                                                            </td>
                                                   </tr>
                                                    
                                                    
                                                     <tr><td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;"><label style="margin-top: 15px;margin-left: 0px;margin-bottom: 15px;"><b>2) What could have been better?</b></label></td>
                                                     <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                           <?php
                                             if (isset($kpi_data['0']['q1_emp_cmt2'])) {
                                                echo CHtml::textArea("emp_cmt2",$kpi_data['0']['q1_emp_cmt2'],$htmlOptions=array('class'=>"form-control emp_cmt2"));
                                             }
                                             else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                             {
                                                 $kpi_data['0']['q1_emp_cmt2']='';
                                                echo CHtml::textArea("emp_cmt2",$kpi_data['0']['q1_emp_cmt2'],$htmlOptions=array('class'=>"form-control emp_cmt2",'disabled'=> "true"));
                                             }
                                             ?> 
                                                            
                                                            </td>
                                                        <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                            <?php
                                             if (isset($kpi_data['0']['q1_mgr_cmt3'])) {
                                                echo CHtml::textArea("emp_mgr2",$kpi_data['0']['q1_mgr_cmt2'],$htmlOptions=array('class'=>"form-control emp_mgr2"));
                                             }
                                             else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                             {
                                                 $kpi_data['0']['q1_mgr_cmt2']='';
                                                echo CHtml::textArea("emp_mgr2",$kpi_data['0']['q1_mgr_cmt2'],$htmlOptions=array('class'=>"form-control emp_mgr2",'disabled'=> "true"));
                                             }
                                             ?> 
                                                            </td>
                                                     </tr>
                                                    
                                                    
                                                    <tr ><td  style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;"><label style="margin-top: 15px;margin-left: 0px;margin-bottom: 15px;"><b>3) What support or resource you require?</b></label></td>
                                                    <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                           <?php
                                             if (isset($kpi_data['0']['q1_emp_cmt3'])) {
                                                echo CHtml::textArea("emp_cmt3",$kpi_data['0']['q1_emp_cmt3'],$htmlOptions=array('class'=>"form-control emp_cmt3"));
                                             }
                                             else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                             {
                                                 $kpi_data['0']['q1_emp_cmt3']='';
                                                echo CHtml::textArea("emp_cmt3",$kpi_data['0']['q1_emp_cmt3'],$htmlOptions=array('class'=>"form-control emp_cmt3",'disabled'=> "true"));
                                             }
                                             ?> 
                                                            
                                                            </td>
                                                        <td style="border:1px solid #c2cad8;border-bottom: 1px solid #c2cad8;">
                                                            <?php
                                             if (isset($kpi_data['0']['q1_mgr_cmt3'])) {
                                                echo CHtml::textArea("emp_mgr3",$kpi_data['0']['q1_mgr_cmt3'],$htmlOptions=array('class'=>"form-control emp_mgr3"));
                                             }
                                             else if (isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] == 'Approved')
                                             {
                                                 $kpi_data['0']['q1_mgr_cmt3']='';
                                                echo CHtml::textArea("emp_mgr3",$kpi_data['0']['q1_mgr_cmt3'],$htmlOptions=array('class'=>"form-control emp_mgr3",'disabled'=> "true"));
                                             }
                                             ?> 
                                                            </td>
                                                    </tr>
                                                   
                                                </tbody>
                                                
                                            </table>
                                             </div>
                                        </div>
                                    </div>

<?php if((isset($kpi_data['0']['q1_KRA_final_status']) && $kpi_data['0']['q1_KRA_final_status'] != 'Approved')) 
{  ?>
                <input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/><lable id="blink_me" style="color: red;"> I confirm this Midyear review is discussed and agreed with <?php
$emp_name = '';
if(isset($employee_data['0']['Emp_fname']) && isset($employee_data['0']['Emp_lname'])) { 
    $emp_name = $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'];
    echo $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname']; } ?></lable>
                                        <?php 
                                        echo CHtml::button('Approve Quater1 review of '.$emp_name,array('class'=>'btn border-blue-soft update_status','style'=>'float:right;margin-bottom: 10px;')); }
                                        ?>
                                        <?php echo CHtml::button('Download PDF',array('class'=>'btn border-blue-soft download_goal','style'=>'float:right;margin-right:20px;display:none','id'=>'getdata')); ?>
                                        <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <div class="page-content-inner">
                            <div class="note note-info">
                                <p> No Record Found </p>
                            </div>
                        </div>
                                                <?php 
                                            }
                                        ?>
                <div id="midstatic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to send goals to appraiser? </p>
                                </div>
                                <div class="modal-footer">                                 
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">Submit Goal</button>
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
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>                                
                                <?php echo CHtml::button('Save',array('class'=>'btn green update_idp','data-dismiss'=>'modal','style'=>'float:right')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" value="ghjgjh" name='demo' style="display: none">
                 <input type="text" name='review_comments' style="display: none">
                <input type="text" name='KPI_id_value' style="display: none">
                <input type="file" name='goalsheet_proof' style="display: none">
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
                                <label id="idp_id_update"></label>
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
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>                                
                                <?php echo CHtml::button('Update',array('class'=>'btn green update_idp_data','style'=>'float:right')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                     $(function(){
                          $("body").on('change','.file_change',function(){
                            var text_value = $(this).attr('id');var text_id = text_value.split('-');
                            var next_input = $(this).find('input').attr('class');
                          $("#uploaded_file").text($('.'+next_input).val());
                           var e = document.getElementsByClassName(next_input);
                           var file_data = $(e)[0].files[0];
                           var formData = new FormData();            
                           //formData.append("employee_csv"+text_id[1],file_data);
                           
                           var ext = $('.'+next_input).val().split(".").pop().toLowerCase();
                           if(file_data.size > 512000)
                           {
                              $("#err").show();
                              $("#err").fadeOut(6000);
                              $("#err").text("Maximum file size allowed is 600KB");
                              $("#err").addClass("alert-danger");
                           }
                           //alert(file_data.size);
                        });
                           $("body").on('change','.file_change1',function(){
                            var text_value = $(this).attr('id');var text_id = text_value.split('-');
                            var next_input = $(this).find('input').attr('class');
                          $("#uploaded_file1").text($('.'+next_input).val());
                           var e = document.getElementsByClassName(next_input);
                           var file_data = $(e)[0].files[0];
                           var formData = new FormData();            
                           //formData.append("employee_csv"+text_id[1],file_data);
                           
                           var ext = $('.'+next_input).val().split(".").pop().toLowerCase();
                           if(file_data.size > 512000)
                           {
                              $("#err").show();
                              $("#err").fadeOut(6000);
                              $("#err").text("Maximum file size allowed is 600KB");
                              $("#err").addClass("alert-danger");
                           }
                           //alert(file_data.size);
                        });
                        });
                </script>
   <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
                <script type="text/javascript">
                  $(function(){
                      $("body").on('change','#financial_year',function(){
                          //alert($(this).val());
                          var data = {
                              getyear : $(this).val()
                          };
                          var base_url = window.location.origin;
                           $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Login/set_new',
                                success : function(data)
                                { 
                                    //alert(data);
                                    location.reload();
                                }
                           });
                      });
                    $("body").on('click','.send_for_appraisal',function(){
                       //alert("aaa");
                        $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                        var data = {
                                'emp_id' : $(this).attr('id')
                              };

                              console.log(data);
                              var base_url = window.location.origin;
                              $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Quater1/get_mid_emp_data',
                                success : function(data)
                                { 
                                    var state = data.split('-');
                                    if (state[0] == state[1]) 
                                    {
                                       jQuery("#midstatic").modal('show');
                                        $("#continue_goal_set").click(function(){
                                            $("#show_spin").show();
                                             var base_url = window.location.origin;
                                                $.ajax({
                                                    type : 'post',
                                                    datatype : 'html',
                                                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Quater1/goalnotification',
                                                    success : function(data)
                                                    {
                                                        //alert(data);
                                                        $("#show_spin").hide(); 
                                                        $("#err").show();  
                                                        $("#err").fadeOut(6000);
                                                        $("#error_value").text("Notification Send to appraiser");
                                                        $("#err").addClass("alert-success");      
                                                        location.reload();                 
                                                    }
                                                });
                                        });
                                    }
                                    else if(state[0] != state[1])
                                    {
                                        $("#err").show();  
                                        $("#err").fadeOut(6000);
                                        $("#err").text("Please update all KRA.");
                                        $("#err").addClass("alert-danger");
                                    }
                                }
                            });
                    });
                   
$(".update_status").click(function(){ 

for (var i = 1; i < 3; i++) {
    
        var k=i+2;
        if($('#faculty_email_id'+k).val()!=""){
           // alert($("#rel_prg_status_emp-"+k+" option:selected").text());
       if ($("#rel_prg_status_emp-"+k+" option:selected").text() == "Select")
        {
            $("#rel_prg_status_emp-"+k).css('border','1px solid red');
            $("#rel_prg_status_emp-"+k).focus();
            $('#err').text("Select relationship program status");
            $('#err').show();
            err1="Select relationship program status";
            
        }
        else if(($("#rel_prg_status_emp-"+k+" option:selected").text() == "Needs Attention") && ($('#rel_program_review1_by_emp-'+i).val()=="" || $('#rel_program_review1_by_emp-'+i).val()=="undefined" || $('#rel_program_review1_by_emp-'+i).val() === undefined)){
           // alert($("#rel_prg_status_emp-"+k+" option:selected").text());
            $('#rel_program_review1_by_emp-'+i).css('border','1px solid red');
            $('#rel_program_review1_by_emp-'+i).focus();
            $('#err').text("Select relationship program comments");
            $('#err').show();
            err1="Select relationship program comments";
        }
        else{
            err1="1";
        }
        }
       else{
            err1="1";
        } 
    }
     var extra_cnt = $("#extra_program_count").text().replace(/\s+/g, '');
    //alert(extra_cnt);
    
    for (var state = 0; state < extra_cnt; state++) {
        
        if($('#topic'+state).val()!=''){
        // if ($(".extra_completeion_type"+state+':checked').val() === undefined)
        // {
        //     $("#extra"+state).css('border','1px solid red');
        //     $(".extra_completeion_type"+state).focus();
        //     $('#err').show();
        //     $('#err').text('Select extra program status.');   
        //     err2='Select extra program status.';
        //     break;
        // }
        // else
        if($("#extra_program_review_by_emp-"+state).val() === undefined || $("#extra_program_review_by_emp-"+state).val() == ''){
            $("#extra_program_review_by_emp-"+state).css('border','1px solid red');
            $("#extra_program_review_by_emp-"+state).focus();
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
         if($("#prg"+i).text()!=""){
        if ($("#tot_prog_status_emp-"+i+" option:selected").text() == "Select")
        {
            $("#tot_prog_status_emp-"+i).css('border','1px solid red');
            $("#tot_prog_status_emp-"+i).focus();
            $('#err').show();
            $('#err').text('Employee status are compulsary.');
            err3="Employee status are compulsary";
            break;
        }
        else if($("#tot_prog_status_emp-"+i+" option:selected").text() == "Needs Attention" && ($("#program_review_by_emp-"+i).val()=="" || $("#program_review_by_emp-"+i).val() === undefined || $("#program_review_by_emp-"+i).val() =="undefined" || $("#program_review_by_emp-"+i).val()=="NA")){
            $("#program_review_by_emp-"+i).css('border','1px solid red');
            $("#program_review_by_emp-"+i).focus();
            $('#err').show();
            $('#err').text('Employee comments are compulsary.');   
            err3='Employee comments are compulsary.';
            break;
        }
        else{
            $("#program_review_by_emp-"+i).css('border','');
            $("#tot_prog_status_emp-"+i).css('border','');
            err3="3";
        }
        if(err3!="3"){
            break;
        }
       
    }
     else{
             err3="3";
        }
    }
        var id_value = $("#total_kpi_id_list").text();
                          var id = id_value.split(';');var q1_review = ''; var review_comments = ''; 
                          var rel_program_review_by_emp = '';  var extra_program_review_by_emp = '';var program_review_by_emp = '';    var emp_project_q1_review = '';                   
        

            for (var l = 0; l < id.length; l++) {
                   //alert($("#get_kpi_count-"+id[l]).text());
            var review_comments = ''; var q1_review="";
            
            for (var i = 0; i < $("#get_kpi_count-"+id[l]).text(); i++) {
            //     alert(($(".q1_status_type-"+id[l]+i).find(':selected').val());
             
            var status_data = $(".q1_status_type-"+id[l]+i).find(':selected').val();
             var comment_data = $(".employee_comment"+id[l]+i).val();
           // alert(comment_data);
            if(status_data=="Select"){
                //alert("hi");
                $(".q1_status_type-"+id[l]+i).focus();
                $(".q1_status_type-"+id[l]+i).css('border','1px solid red');
                $('#err').text("Please enter status for quater1 review");
                $('#err').show();
                err4="Please enter status for quater1 review";
               break;
            }
            else if(status_data=="Needs Attention" && comment_data.length == 0){
                $(".employee_comment"+id[l]+i).focus();
                $(".employee_comment"+id[l]+i).css('border','1px solid red');
                $('#err').text("Please enter comment for quater1 review");
                err4="Please enter comment for project review";
                $('#err').show();
                break;
            }
            else{
                err4="4";
            }
        }
       if(err4!="4"){
            break;
        }
    }
    
  if($('#project_q1_review_by_emp').val()=="" || $('#project_q1_review_by_emp').val()=="undefined" || $('#project_q1_review_by_emp').val()=== undefined){
        $("#project_q1_review_by_emp").focus();
            $("#project_q1_review_by_emp").css('border','1px solid red');
            $("#err").text('Please select project comments');
            $("#err").show();
             err5="Please select project comments";
            // break;
       
    }
    else{
        err5="5";
    }      
    var q1_emp_cmt1=$('.emp_cmt1').val();
    var q1_emp_cmt2=$('.emp_cmt2').val();
    var q1_emp_cmt3=$('.emp_cmt3').val();
   
    if(q1_emp_cmt1 == ""){
        // alert(q1_emp_cmt1);
        $('#err').text("Please employee Comments");
        $('#err').show();
        $('.emp_cmt1').focus();
        $('.emp_cmt1').css('border','1px solid red');
        err6="Please employee Comments";
        //break;
    }
    else if(q1_emp_cmt2 == ""){
        // alert(q1_emp_cmt1);
        $('#err').text("Please employee Comments");
        $('#err').show();
        $('.emp_cmt2').focus();
        $('.emp_cmt2').css('border','1px solid red');
        err6="Please employee Comments";
        //break;
    }
    else if(q1_emp_cmt3 == ""){
        // alert(q1_emp_cmt1);
        $('#err').text("Please employee Comments");
        $('#err').show();
        $('.emp_cmt3').focus();
        $('.emp_cmt3').css('border','1px solid red');
        err6="Please employee Comments";
        //break;
    }
    else{
        err6="6";
    }
  // $("#blink_me").addClass('blink_me');  
//alert(err1);
//alert(err2);alert(err3);alert(err4);alert(err5);alert(err6);
     if(err1 == "1" && err2 == "2" && err3 == "3" && err4 == "4" && err5 == "5" && err6 == "6")  
     {
   $('#err').hide();
   
      if($("#term_condition:checked").val() != 'term_condition')
                                            {
                                                
                                                 $("#blink_me").addClass('blink_me');
                                            } 
                                            else
                                        {
                                            $("#saving").css('display','none');
                                            $("#err").show();  
                                                            $("#err").fadeOut(6000);
                                                            $("#err").text("Mid year review updated successfully");
                                                            $("#err").addClass("alert-success");
                                                          // get_notify("Mid year review updated successfully");
                                                            $("#updation_spinner-"+id[l]).hide();   
                                                          $("#midstatic").modal('show');
                                                          $("#continue_goal_set").click(function(){
                                            $("#show_spin").show();
                                             var base_url = window.location.origin;
                                                $.ajax({
                                                    type : 'post',
                                                    datatype : 'html',
                                                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Quater1/goalnotification',
                                                    success : function(data)
                                                    {
                                                       // alert(data);
                                                        $("#show_spin").hide(); 
                                                        $("#err").show();  
                                                        $("#err").fadeOut(6000);
                                                        $("#err").text("Notification Send to appraiser");
                                                        $("#err").addClass("alert-success");                       
                                                    }
                                                });
                                        });
                                        
                                        }

                                      
     }
                      });    
                    
                      
                  });
                </script>
               
                <script type="text/javascript">
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
                        settings.life = '700';
                    }

                    j.notific8('zindex', 11500);
                    j.notific8($.trim(e), settings);
                    
                    $button.attr('disabled', 'disabled');
                    
                    setTimeout(function() {
                        $button.removeAttr('disabled');
                    }, 1000);
                }        
            </script>
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
                        emp_id : $('#emp_id').text(),
                        year1:$('#yr').text(),
                    };
                    //alert(base_url);
                    $.ajax({                            
                    type : 'post',
                    datatype : 'html',
                    data : data,
                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Checkattach/check_midgoal_idp',
                    success : function(data)
                    {
//alert(data);
                        location.href = base_url+'/Goalsheet_docs/q1_goalsheet'+'_'+$("#femp_name").text()+'_'+$("#lemp_name").text()+$('#yr').text()+'.pdf'; 
                    }
                    });                 
                }
</script>

<style>
.hide_this
{
display:none;
}
</style>
<?php echo Yii::app()->request->baseUrl; ?>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>-->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        
        
<lable id='emp_id' class="hide_this" style="display: none"><?php echo $emp_data['0']['Employee_id']; ?></lable>
<lable id='femp_name' class="hide_this" style="display: none"><?php echo $emp_data['0']['Emp_fname']; ?></lable>
<lable id='lemp_name' class="hide_this" style="display: none"><?php echo $emp_data['0']['Emp_lname']; ?></lable>        
 <style>
 th
 {
     font-size: 14px;
 }
 td
 {
     font-size: 14px;
 }
 </style>         




         <div id="year_end_emppdf" style="display:none">
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
        $data2 = array(Yii::app()->user->getState("Employee_id"),Yii::app()->user->getState('financial_year_check'));
        $kpi_data = $kra->get_kpi_list($where1,$data2,$list1);  
        

$where = 'where Email_id = :Email_id';
      $list = array('Email_id');
      $data = array($employee_data['0']['Reporting_officer1_id']);
      $mgr_data = $emploee_data->get_employee_data($where,$data,$list);
?>

<div id="target_goal1" download>
<style type="text/css">

</style>
<label style="font-size:8px;">Employee Name :  <?php if(isset($employee_data['0']['Emp_fname']) && isset($employee_data['0']['Emp_lname'])) { echo $employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']; }?></label><br><label style="float: right;font-size:8px;">Manager's Name :  <?php if(isset($mgr_data) && count($mgr_data)>0){
                     echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                ?></label><br/>
<label style="font-size:8px;">Goalsheet Of Year:  <?php echo Yii::app()->user->getState('financial_year_check'); ?></label>
<?php                                            if (isset($kpi_data) && count($kpi_data)>0) { $cnt_num = 1; ?>
                                            <label class='count_goal' style="display: none"><?php if(isset($kpi_data)) { echo count($kpi_data); } ?></label>
                                          <?php     
                                        foreach ($kpi_data as $row) {  ?>
                                        <div  style="margin-top:-79px">
                                        <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption" style="font-weight:bold; font-size:8px; color: black;">                                                  
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   </div>
                                                <div class="tools" style="font-weight:bold; font-size:8px; color: black;">
                                                    <?php echo "KRA Category : ".$row['KRA_category']; ?><br>
                                                    <?php echo "KRA Weightage : ".$row['target']; ?><br>
                                                    <?php echo "KRA Description : ".$row['KRA_description']; ?>
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
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (5)<br>Outstanding <br>Performance </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> Quaterly Review Status </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> Employee Comments </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
 $q1_stat = explode(';',$row['q1_emp_status']); 
 $q1_cmt = explode(';',$row['q1_employee_comment']); 
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
                                                                        if(isset($kpi_data_data) && $kpi_data_data == '')
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
                                                                            if (isset($kpi_list_unit[$i]) && $kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo $kpi_list_target[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo '< '.round($kpi_list_target[$i]*0.69,2); } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.70,2)." to ".round($kpi_list_target[$i]*0.95,2); } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.96,2)." to ".round($kpi_list_target[$i]*1.05,2); } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.06,2)." to ".round($kpi_list_target[$i]*1.29,2); } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.39,2); } ?></td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                                <?php 
                                                                                if(isset($KPI_target_value[$i]))
                                                                                {
                                                                                   $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }      

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
                                                                    <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($q1_stat[$i])) { echo $q1_stat[$i]; } ?></td>
                                                                    <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($q1_cmt[$i])) { echo $q1_cmt[$i]; } ?></td>
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>                              
                                                    </tbody>
                                                                                              
                                                </table>   
                                               </div>                                           
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
      $where = 'where  goal_set_year =:goal_set_year';
                                    $list = array('goal_set_year');
                                    $data = array(Yii::app()->user->getState('financial_year_check'));
                                    $program_data_result = $program_data->get_kpi_data($where,$data,$list);
      //$program_data_result = $program_data->get_data();
    // print_r($program_data_result);die();
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
      $data = array(Yii::app()->user->getState("Employee_id"),Yii::app()->user->getState('financial_year_check'));
      $IDP_data = $IDPForm->get_idp_data($where,$data,$list);
      //print_r($IDP_data);die();
      //print_r(Yii::app()->user->getState('emp_id1'));die();
      $where = 'where Email_id = :Email_id';
      $list = array('Email_id');
      $data = array($emp_data['0']['Reporting_officer1_id']);
      $mgr_data = $employee->get_employee_data($where,$data,$list);
//print_r($emp_data);die();

   ?>
   <lable id='emp_id' style="display: none"><?php echo 'vvf57e264fd8d3ef'; ?></lable>
<div id="target_idp1" >
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
    
  <label >Individual Development Plan (WI.CHR.03 F.NO. 1)</label>
</div><br>
<table cellpadding="3" cellspacing="0" >
<thead>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b> Employee Name </b></th>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b> Manager’s name </b></th>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b>Employee ID </b></th>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b>Year </b></th>
</thead>
<tbody>
<tr>
<td style="border: 1px solid #00000a;">
 <?php 
                if(isset($emp_data)&& count($emp_data)>0){
                      echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
}?>
</td>
<td style="border: 1px solid #00000a;">
 <?php if(isset($mgr_data) && count($mgr_data)>0){
                     echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                ?>
</td>
<td style="border: 1px solid #00000a;">
<?php  if(isset($emp_data)&& count($emp_data)>0){
                   echo $emp_data[0]['Employee_id'];   }?> 
</td>
<td style="border: 1px solid #00000a;">
<?php 
                   $today = date('d-m-Y'); 
                 echo Yii::app()->user->getState('financial_year_check');?>
</td>
</tr>
</tbody>
  
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><span lang="en-US"><i><b>Please
discuss your strengths and work related weaknesses with your manager
and identify your training needs. Your development will happen
through the following ways:</b></i></span></font></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><span lang="en-US"><b>Part
A: Development through Instructor led training in Classroom</b></span></font></p>
<table cellpadding="3" cellspacing="0" >
  <col width="17">
  <col width="207">
  <col width="71">
  <col width="33">
  <col width="306">
  <tr>
    <td height="23" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">No</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b>Name of program</b>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b>Faculty</b>
    </td>
    <td  style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b><font face="Cambria, serif">Days</b>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b>Please explain why the training is
      needed</b></td>
<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
<p><font face="Cambria, serif">Program Status</font></p></td><td width="100" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
<p><font face="Cambria, serif">Comments</font></p></td>
    </td>
  </tr>
  <?php
     $compulsory = '';
    if (isset($program_data_result) && count($program_data_result)>0) {
        for ($i=0; $i < count($program_data_result); $i++) {                                            
            if (isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) {
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
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm" class="prog_name" id="nm<?php echo $i; ?>"> <?php if(isset($program_data_result[$i]['program_name'])) { echo $program_data_result[$i]['program_name']; } ?> <?php if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
            
            </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php if(isset($program_data_result[$i]['faculty_name'])) { echo $program_data_result[$i]['faculty_name']; } ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php if(isset($program_data_result[$i]['training_days'])) { echo $program_data_result[$i]['training_days']; } ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
            <?php 
            $cmnt = '';$prg_state1 = '';$prg_state_com1 = '';
            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                if(isset($IDP_data['0']['program_comment']))
                {
                  $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                }
                if(isset($IDP_data['0']['q1_emp_trn_prog_stat']))
                {
                  $prg_state = explode(';', $IDP_data['0']['q1_emp_trn_prog_stat']);
                }

                if(isset($IDP_data['0']['q1_program_review_by_emp']))
                {
                  $prg_state_com = explode(';', $IDP_data['0']['q1_program_review_by_emp']);
                }               

                if(isset($cmt2) && count($cmt2)>0)
                {
                  for ($j=0; $j < count($cmt2); $j++) {
                    if(isset($cmt2[$j]))
                    {
                      $cmt1 = explode('?', $cmt2[$j]);
                    }
                      
                      if (isset($cmt1[0]) && $i == $cmt1[0]) {   
                        if(isset($cmt1[1]))
                        {
                            $cmnt = $cmt1[1];
                        } 
                        if(isset($prg_state[$j]))
                        {
                            $prg_state_com1 = $prg_state_com[$j];
                        } 
                        if(isset($prg_state_com[$j]))
                        {
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
<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"><?php if(isset($prg_state1)) { echo $prg_state1; } ?>
</td>
<td width="100" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"><?php  if(isset($prg_state_com1)) { $prg_state_com1 = explode('?',$prg_state_com1); } if(isset($prg_state_com1['1'])) { echo $prg_state_com1['1']; } ?>
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
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><font face="Cambria, serif"><b>Program Completed</b></font></p>-->
<!--    </td>-->
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Employee Comments</b></font></p>
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
              if(isset($IDP_data['0']['extra_days']))
              {
                $day1 = explode(';',$IDP_data['0']['extra_days']);
              }
              if(isset($IDP_data['0']['Extra_year_end_prg_status']))
              {
                $finaltopic = explode('^',$IDP_data['0']['Extra_year_end_prg_status']);
              }
              if(isset($IDP_data['0']['q1_extra_program_review_by_emp']))
              {
                $finaltopic_cmt = explode(';',$IDP_data['0']['q1_extra_program_review_by_emp']);
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
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><br/>-->
<!--      <?php if(isset($finaltopic[0])) { echo $finaltopic[0]; } ?>-->
<!--      </p>-->
<!--    </td>-->
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
        if(isset($IDP_data['0']['Extra_year_end_prg_status']))
        {
          $finaltopic = explode('^',$IDP_data['0']['Extra_year_end_prg_status']);
        }
        if(isset($IDP_data['0']['Extra_year_end_prg_comments']))
        {
          $finaltopic_cmt = explode('^',$IDP_data['0']['Extra_year_end_prg_comments']);
        }

        if (isset($topic1[1])) {
           $topic = $topic1[1];
           if(isset($IDP_data['0']['extra_days']))
           {
               $day1 = explode(';',$IDP_data['0']['extra_days']);
           }
           
if(isset($day1[1]))
{
$day = $day1[1];
}

if(isset($IDP_data['0']['extra_faculty']))
{
  $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
}
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
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><br/>-->
<!--      <?php if(isset($finaltopic[1])) { echo $finaltopic[1]; } ?>-->
<!--      </p>-->
<!--    </td>-->
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><br/>-->
<!--      <?php if(isset($finaltopic_cmt[1])) { echo $finaltopic_cmt[1]; } ?>-->
<!--      </p>-->
<!--    </td>-->
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
          
          if(isset($IDP_data['0']['q1_rel_prog_cmt_emp']))
          {
            $relfinaltopic = explode(';',$IDP_data['0']['q1_rel_prog_cmt_emp']);
          }
          if(isset($IDP_data['0']['q1_rel_program_review_by_emp']))
          {
            $relfinaltopic_cmt = explode(';',$IDP_data['0']['q1_rel_program_review_by_emp']);
          }


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
      <p><font face="Cambria, serif"><b>Program Status</b></font></p>
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
      <p><font face="Cambria, serif"><b>Mentoring</b></font><font face="Cambria, serif">
      through leader in own function for </font><font face="Cambria, serif"><b>behavioural inputs</b></font><font face="Cambria, serif">
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
      <p><font face="Cambria, serif"><b>Project Comments</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $review_name = '';
                if (isset($IDP_data['0']['  project_q1_review_by_emp'])) {
                  $review_name = $IDP_data['0']['project_q1_review_by_emp'];
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
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cmda; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Status Comments</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><?php if (isset($IDP_data['0']['Year_end_prog_comments'])) { echo $IDP_data['0']['Year_end_prog_comments']; } ?></p>
    </td>
  </tr>
</table>

<br>
<br>
<table style="margin-top:30px">
    <thead>
        <th style="border: 1px solid black;"><b>Question</b></th>
         <th style="border: 1px solid black;"><b>Employee's Comments</b></th>
          <th style="border: 1px solid black;"><b>Manager's Comments</b></th>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black;">1) What went well in the last quarter?</td>
            <td style="border: 1px solid black;"><?php if(isset($kpi_data['0']['q1_emp_cmt1'])) echo $kpi_data['0']['q1_emp_cmt1'];?></td>
            <td style="border: 1px solid black;"><?php if(isset($kpi_data['0']['q1_mgr_cmt1'])) echo $kpi_data['0']['q1_mgr_cmt1'];?></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">2) What could have been better?</td>
            <td style="border: 1px solid black;"><?php if(isset($kpi_data['0']['q1_emp_cmt2'])) echo $kpi_data['0']['q1_emp_cmt2'];?></td>
            <td style="border: 1px solid black;"><?php if(isset($kpi_data['0']['q1_mgr_cmt2'])) echo $kpi_data['0']['q1_mgr_cmt2'];?></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">3) What support or resource you require?</td>
            <td style="border: 1px solid black;"><?php if(isset($kpi_data['0']['q1_emp_cmt3'])) echo $kpi_data['0']['q1_emp_cmt3'];?></td>
            <td style="border: 1px solid black;"><?php if(isset($kpi_data['0']['q1_mgr_cmt3'])) echo $kpi_data['0']['q1_mgr_cmt3'];?></td>
        </tr>
    </tbody>
</table>


<p style="margin-bottom: 0.35cm; line-height: 115%"><br/>
<br/>

</p>
</div>




                                       </body>
                                       
                                       </html>


