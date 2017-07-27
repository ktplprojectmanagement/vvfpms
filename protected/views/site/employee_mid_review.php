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
           
<script>
$(function(){
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
        setInterval(save_emp_mid_data,3000);  
    });
</script>
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
                          var id = id_value.split(';');var mid_review = ''; var review_comments = ''; var error_count1 = 0;var error_count2 = '';
                          var rel_program_review_by_emp = '';  var extra_program_review_by_emp = '';var program_review_by_emp = '';    var emp_project_mid_review = '';                   
                           $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });

                           for (var l = 0; l < id.length; l++) {
                            var review_comments = ''; 
                                    for (var i = 0; i < $("#get_kpi_count-"+id[l]).text(); i++) {
                              if (mid_review == '') 
                              {
                                  mid_review = $(".kpi_status_type-"+id[l]+i).find(':selected').val();
                              }
                              else
                              {
                                  mid_review = mid_review +';'+$(".kpi_status_type-"+id[l]+i).find(':selected').val();
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
                            var program_review_by_emp = '';
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
                              }

                               for (var i = 1; i <= 2; i++) 
                               {
                                     if (rel_program_review_by_emp == '') 
                                    {
                                       rel_program_review_by_emp = $("#rel_program_review1_by_emp-"+i).val();
                                    }
                                    else
                                    {
                                      rel_program_review_by_emp = rel_program_review_by_emp+';'+$("#rel_program_review1_by_emp-"+i).val();
                                    }  
                                }

                                 emp_project_mid_review = $("#project_mid_review_by_emp").val();
                              
                               
                                var formData = new FormData();
                                var data = {
                                    'KPI_id' : id[l],
                                    'review_comments' : review_comments,
                                  };
                                   formData.append("review_comments",review_comments);
                                   formData.append("program_review_by_emp",program_review_by_emp);
                                   formData.append("extra_program_review_by_emp",extra_program_review_by_emp);
                                   formData.append("rel_program_review_by_emp_name",rel_program_review_by_emp);
                                   //formData.append("demo","sdfds");
                                   //correct_emp_id
                                   formData.append("KPI_id_value",id[l]);
                                    formData.append("correct_emp_id",$("#correct_emp_id").text());
                                   // formData.append("employee_csv",file_data);
                                   // formData.append("employee_csv1",file_data1);
                                   formData.append("emp_project_mid_review",emp_project_mid_review);
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
                                    url : base_url+'/index.php?r=Midreview/employee_mid_review1',
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
url : base_url+'/index.php?r=Checkattach/check_view2',
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
url : base_url+'/index.php?r=Checkattach/check_idp1',
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
                    url : base_url+'/index.php?r=Checkattach/check_view2',
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
                    url : base_url+'/index.php?r=Checkattach/check_idp1',
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
                            <h1> <?php if(isset($mid_review) && $mid_review == 1) { ?>List Of Goal's<?php }else { echo "List Of Pending Approvals"; } ?></h1>
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
                            //print_r($kpi_data);die();
                                if (isset($kpi_data) && count($kpi_data)>0) {
                            ?>
                            <div id="err" style="display: none"></div>
<?php
       if (isset($kpi_data['0']['mid_year_goalsheet_doc']) && $kpi_data['0']['mid_year_goalsheet_doc'] != '') {
?>
<a href="<?php echo 'http://kritvainvestments.com/pmsuser/Goalsheet_mid_docs/'."goalsheet_".$emp_data['0']['Emp_fname']."_".$emp_data['0']['Emp_lname'].".pdf"; ?>" target="_new"><?php echo CHtml::button('Goalsheet',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
<?php } ?>
<?php
       if (isset($kpi_data['0']['mid_year_goalsheet_doc']) && $kpi_data['0']['mid_year_goalsheet_doc'] != '') {
?>
<a href="<?php echo 'http://kritvainvestments.com/pmsuser/IDP_mid_docs/'."IDP_".$emp_data['0']['Emp_fname']."_".$emp_data['0']['Emp_lname'].".pdf"; ?>" target="_new"><?php echo CHtml::button('IDP',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
<?php } ?>
                             <br><br> 
                               <!-- BEGIN PAGE BASE CONTENT -->                                
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                 <?php 
                                 
                                 
                                 if (isset($kpi_data2['0']['mid_KRA_final_status']) && $kpi_data2['0']['mid_KRA_final_status'] != 'Approved') {
                                    
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
                                                                $employee_comment = explode(';',$row['employee_comment']);
                                                                $appr_comment = explode(';',$row['appraiser_comment']);
                                                                $appr_status = explode(';',$row['mid_KRA_status']);
                                                                $kra_status = $row['mid_KRA_final_status'];
                                                                //print_r($kra_status);die();
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

<tr>
                                    <td align="left" valign=middle><b><font face="Calibri" size=3>Key Performance Indicators (KPI) Description</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>KPI Unit</font></b></td>

                                                <td align="left" valign=middle><b><font face="Calibri" size=3>KPI Value</font></b></td>
<td align="left" valign=middle ><b><font face="Calibri" size=3>Employee Comments</font></b></td>
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Status</font></b></td>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Comments</font></b></td><?php } ?></tr> 
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_unit[$i]!='Select') { $cnt++;
                                                            ?>
 
                                                                <tr>
                                                                    <td><?php echo $kpi_list_data[$i];echo""; ?></td>
                                                                    <td><?php echo $kpi_list_unit[$i];echo""; ?></td>
                                                                    <td><?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                                 <tr>
                                                                                 <td colspan="2"><b><font face="Calibri" size=3>Unit</font></b></td>
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
                                                                                   <tr class="content_hover">                                                                    
                                                                               <?php
                                                                               for ($l=0; $l < count($value_data); $l++) { ?>
<td><lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value_data[$l]; ?>"><?php echo strlen($value_data[$l]) >= 20 ? 
substr($value_data[$l], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
$value_data[$l]; ?></lable></td>
                                                                              <?php } ?>
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
                                                                         if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
                                                                            echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px'));
                                                                         }
                                                                       else if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved')
                                                                         {
                                                                              echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px','disabled'=> "true"));
                                                                         }
                                                                   
                                                                 ?>
                                                                </td>
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>
                                                <td <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?> >
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

                                                                    echo CHtml::dropDownList("kpi_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control kpi_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status,'disabled'=> "true"));
                                                                 ?>
                                                                    </td>
                                                                    <td <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:block"<?php } ?>>
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
                                                   
                                                     <label id="get_kpi_count-<?php echo $row['KPI_id']; ?>" style="display: none"><?php echo $kpi_data_data; ?></label>
                                                      <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php 
//echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'float:right','id'=>"KPI_id-".$row['KPI_id']));
 } ?> 
                                                </table>  
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
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
                                 <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
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
                                                                $employee_comment = explode(';',$row['employee_comment']);
                                                                $appr_comment = explode(';',$row['appraiser_comment']);
                                                                $appr_status = explode(';',$row['mid_KRA_status']);
                                                                $kra_status = $row['mid_KRA_final_status'];
                                                                //print_r($kra_status);die();
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
<td align="left" valign=middle ><b><font face="Calibri" size=3>Employee Comments</font></b></td>
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Status</font></b></td>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Comments</font></b></td><?php } ?></tr> 
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_unit[$i]!='Select') { $cnt++;
                                                            ?>
 
                                                                <tr>
                                                                    <td><?php echo $kpi_list_data[$i];echo""; ?></td>
                                                                    <td><?php echo $kpi_list_unit[$i];echo""; ?></td>
                                                                    <td><?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                                 <tr>
                                                                                 <td colspan="2"><b><font face="Calibri" size=3>Unit</font></b></td>
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
                                                                                   <tr class="content_hover">                                                                    
                                                                               <?php
                                                                               for ($l=0; $l < count($value_data); $l++) { ?>
<td><lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value_data[$l]; ?>"><?php echo strlen($value_data[$l]) >= 20 ? 
substr($value_data[$l], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
$value_data[$l]; ?></lable></td>
                                                                              <?php } ?>
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
                                                                         if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
                                                                            echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px'));
                                                                         }
                                                                       else if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved')
                                                                         {
                                                                              echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px','disabled'=> "true"));
                                                                         }
                                                                   
                                                                 ?>
                                                                </td>
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>
                                                <td <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?> >
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

                                                                    echo CHtml::dropDownList("kpi_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control kpi_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status,'disabled'=> "true"));
                                                                 ?>
                                                                    </td>
                                                                    <td <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:block"<?php } ?>>
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
                                                   
                                                     <label id="get_kpi_count-<?php echo $row['KPI_id']; ?>" style="display: none"><?php echo $kpi_data_data; ?></label>
                                                      <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php 
//echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'float:right','id'=>"KPI_id-".$row['KPI_id']));
 } ?> 
                                                </table>  
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
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
                                                                         if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
?>                                                                      
                                                   <label  class="custom-file-input file-blue file_change" id="file_change" style="width: 157px;float: right;margin-top: -54px;margin-right: 154px;">
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
                                        <input type='text' name="emp_project_mid_review" style="display: none">
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
                                            <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
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
                                                                echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
                                                                }?>
                                                                                                           
                                                        
                                                        </div>
                                                        <div class="col-md-2"><label class="col-md-2">
                                                       <span class="bold">Manager’s name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                        <?php if(isset($mgr_data) && count($mgr_data)>0){
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
                                                         echo '2016-2017';?>
                                                            
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
                                        <th>Employee Comments</th>
                                        <th>Program completed</th>
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
                                                    $cmt1 = explode('?', $cmt2[$j]);
                                                    if ($i == $cmt1[0]) {                                                            
                                                         $cmnt = $cmt1[1];
                                                         //$state = $cmt1[0];
                                                         // $review_state = $program_cmnt[$state];
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $cmnt = '';
                                                //$review_state = '';
                                            }

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
                                            if (isset($IDP_data['0']['mid_prgrm_cmd']) && $IDP_data['0']['mid_prgrm_cmd'] != '') 
                                            {
                                              $program_state = explode(';',$IDP_data['0']['mid_status']);
                                              $program_cmnt = explode(';',$IDP_data['0']['mid_prgrm_cmd']);
                                              //print_r($program_cmnt);die();
                                              if (isset($program_cmnt[$state])) {
                                                $review_state = $program_cmnt[$state];
                                                $program_state1 = $program_state[$state];
                                              }
                                            }
                                            else
                                            {
                                              $review_state = '';
                                              $program_state1 = '';
                                            }                                  
                                            if ($program_data_result[$i]['need'] != 0) {
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
                                                <td> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
                                                <td> <?php echo $program_data_result[$i]['training_days']; ?> </td>
                                                <td class="col-md-4">
                                                <?php 
                                                    echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,'disabled'=> "true"));
                                                ?> </td>
                                                <td class="col-md-4">
                                                <?php 
 if (isset($IDP_data['0']['midyear_status_flag']) && $IDP_data['0']['midyear_status_flag'] != 'Approved') 
                                            {
                                                    echo CHtml::textField('program_review_by_emp',$program_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_review_by_emp",'id'=>'program_review_by_emp-'.$i));
}
else
{
echo CHtml::textField('program_review_by_emp',$program_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 program_review_by_emp",'id'=>'program_review_by_emp-'.$i,'disabled'=> "true"));
}
                                                ?> </td>
                                                <td>
                                                <input type="radio" disabled="true" name='completeion_type1<?php echo $i; ?>'  value="Yes" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='completeion_type1<?php echo $i; ?>' value="No" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'No') { ?>checked='check'<?php } ?>>No
                                                
                                                </td>
                                                <td class="col-md-4">
                                                <?php 
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
                                    <label id="program_count" style="display: none"><?php echo $not_undefine; ?></label>
                                    <label id="compulsory_id" style="display: none"><?php echo $compulsory; ?></label>
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
                                                                    $count = explode(';',$IDP_data['0']['extra_topic']);
                                                                   
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
                                                    if ($count !='') {
                                                      for ($m=0; $m < count($count); $m++) {  

                                                        if ($count[$m] != 'undefined') {
                                                        $count_value++;
                                                        $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                        $extra_prgrm_cmd = explode(';',$IDP_data['0']['extra_prgrm_cmd']);
                                                        $extra_program_status = explode(';',$IDP_data['0']['extra_program_status']);
                                                        $rel_program_status2 = explode(';',$IDP_data['0']['rel_program_review_status']);
                                                        $rel_program_status3 = explode(';',$IDP_data['0']['rel_program_review']);
                                                        //print_r($IDP_data['0']['rel_program_review_by_emp']);die();
                                                        if (isset($IDP_data['0']['extra_program_review_by_emp'])) {
                                                             $extra_program_review_by_emp = explode(';',$IDP_data['0']['extra_program_review_by_emp']);
                                                        }
                                                       
                                                        if (isset($extra_program_review_by_emp[1])) {
                                                             $extra_program_review_by_emp1 = $extra_program_review_by_emp[1];
                                                        }
                                                        if (isset($IDP_data['0']['rel_program_review_by_emp'])) {
                                                             $rel_program_review_by_emp = explode(';',$IDP_data['0']['rel_program_review_by_emp']);
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
                                                         $topic = $topic1[$m];                                                                
                                                         $day = $day1[$m];                         
                                                         $faculty[$faculty2[$m]] = array('selected' => 'selected');

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
                                                        <div class="col-md-2" <?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['set_status']) && $IDP_data['0']['set_status'] == 'Pending') { ?>style="display: block;"<?php }else { ?> style="display: none;" <?php }?>>
                                                            <i class="fa fa-trash-o del_extra_program" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="<?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['Employee_id'])) { echo 'del_extra_program-'.$IDP_data['0']['Employee_id'].$l;
                                                        }?>" title="Delete" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-md-2">
                                                        <?php
 if (isset($IDP_data['0']['midyear_status_flag']) && $IDP_data['0']['midyear_status_flag'] != 'Approved') 
                                            {
                                                    echo CHtml::textField('extra_program_review_by_emp',$extra_program_review_by_emp0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 extra_program_review_by_emp",'id'=>'extra_program_review_by_emp-'.$m));
}
else
{
echo CHtml::textField('extra_program_review_by_emp',$extra_program_review_by_emp0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 extra_program_review_by_emp",'id'=>'extra_program_review_by_emp-'.$m,'disabled'=> "true"));
} 
                                                            
                                                        ?> </div>
                                                        <div  class="col-md-2">
                                                         <input type="radio" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="Yes" class='extra_completeion_type<?php echo $m; ?>' <?php if($extra_program_status1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="No" class='extra_completeion_type<?php echo $m; ?>' <?php if($extra_program_status1 == 'No') { ?>checked='check'<?php } ?>>No
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
                                                       <label class="control-label col-md-1 bold" style="text-align: left;">Relationship</label>
                                                        <label class="control-label col-md-1 bold">Name of leader</label>
                                                        <label class="control-label col-md-1 bold">Number of Meetings planned
                                                        </label>
                                                        <label class="control-label col-md-1 bold">Target date</label>
                                                        <label class="control-label col-md-3 bold">Employee Comments</label>
                                                        <label class="control-label col-md-2 bold">Prgram Status</label>
                                                        <label class="control-label col-md-2 bold">Review</label>
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
                                                                $meet = $meet[0];
                                                              }
                                                              else
                                                              {
                                                                $meet = '';
                                                              }
                                                              echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-1 number_of_meetings3",'id'=>'number_of_meetings3','disabled'=> "true")); ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date3" readonly="" type="text" value="<?php echo $rel2[0]; ?>" id="target_date3">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date3" readonly="" type="text"  id="target_date3">
                                                                 <?php   }
                                                                ?>
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                                        <div class="col-md-3">
                                                        <?php
                                                        if(isset($rel_prgrm_cmd2))
                                                        {
                                                        }
                                                        else
                                                        {
                                                        $rel_prgrm_cmd2 = '';
                                                        } 
 if (isset($IDP_data['0']['midyear_status_flag']) && $IDP_data['0']['midyear_status_flag'] != 'Approved') 
                                            {
                                                   echo CHtml::textArea('rel_program_review1_by_emp',$rel_program_emp_cmd0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review1_by_emp",'id'=>'rel_program_review1_by_emp-1','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;'));
}
else
{
echo CHtml::textArea('rel_program_review1_by_emp',$rel_program_emp_cmd0,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review1_by_emp",'id'=>'rel_program_review1_by_emp-1','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;','disabled'=> "true"));
}  
                                                            
                                                        ?> </div>
                                                        <div  class="col-md-2">
                                                         <input type="radio" disabled="true" name='rel_completeion_type0' value="Yes" class='rel_completeion_type0' <?php  if(isset($extra_program_status2) && $extra_program_status2 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='rel_completeion_type0' value="No" class='rel_completeion_type0' <?php if(isset($extra_program_status2) && $extra_program_status2 == 'No') { ?>checked='check'<?php } ?>>No                                                       
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
                                                            echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-2 rel_program_review",'id'=>'rel_program_review-0','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;','disabled'=> "true"));
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
                                                             
                                                            echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-2 faculty_email_id4",'id'=>'faculty_email_id4','disabled'=> "true"));
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
                                                          echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-1 number_of_meetings4",'id'=>'number_of_meetings4','disabled'=> "true")); ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date4" readonly="" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date4" readonly="" type="text"  id="target_date4" disabled="true">
                                                                 <?php   }
                                                                ?>
                                                                
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <?php
                                                        if(isset($rel_prgrm_cmd2))
                                                        {
                                                        }
                                                        else
                                                        {
                                                        $rel_prgrm_cmd2 = '';
                                                        }  
 if (isset($IDP_data['0']['midyear_status_flag']) && $IDP_data['0']['midyear_status_flag'] != 'Approved') 
                                            {
                                                   echo CHtml::textArea('rel_program_review2_by_emp',$rel_program_emp_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review2_by_emp",'id'=>'rel_program_review1_by_emp-2','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;'));
}
else
{
echo CHtml::textArea('rel_program_review2_by_emp',$rel_program_emp_cmd1,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review2_by_emp",'id'=>'rel_program_review1_by_emp-2','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;','disabled'=> "true"));
}  
                                                            
                                                        ?> </div>
                                                        <div  class="col-md-2">
                                                        <input type="radio" disabled="true" name='rel_completeion_type1' value="Yes" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                        <input type="radio" disabled="true" name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if(isset($extra_program_status3) && $extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No                                                       
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
                                                            echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 rel_program_review",'id'=>'rel_program_review-1','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;','disabled'=> "true"));
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
                                                        $project_mid_review_by_emp = '';
                                                        if (isset($IDP_data['0']['project_mid_review_by_emp'])) {
                                                          $project_mid_review_by_emp = $IDP_data['0']['project_mid_review_by_emp'];
                                                        }
                                                        else
                                                        {
                                                          $project_mid_review_by_emp = '';
                                                        }
if (isset($IDP_data['0']['midyear_status_flag']) && $IDP_data['0']['midyear_status_flag'] != 'Approved') 
                                            {
                                                   echo CHtml::textArea('project_mid_review_by_emp',$project_mid_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_mid_review_by_emp",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;'));
}
else
{
echo CHtml::textArea('project_mid_review_by_emp',$project_mid_review_by_emp,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_mid_review_by_emp",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;','disabled'=> "true"));
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
                                                        $project_mid_review = '';
                                                        if (isset($IDP_data['0']['project_mid_review'])) {
                                                          $project_mid_review = $IDP_data['0']['project_mid_review'];
                                                        }
                                                        else
                                                        {
                                                          $project_mid_review = '';
                                                        }
                                                        echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_mid_review",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;','disabled'=> "true")); ?> 
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
                                </div>
                </div>
                </div>
                </form></div>
<?php if((isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved')) 
{  ?>
                <input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/><lable id="blink_me" style="color: red;"> I confirm this Midyear review is discussed and agreed
with <?php
$emp_name = '';
if(isset($employee_data['0']['Emp_fname'])) { 
    $emp_name = $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'];
    echo $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname']; } ?></lable>
                                        <?php 
                                        echo CHtml::button('Approve Midyear review of '.$emp_name,array('class'=>'btn border-blue-soft update_status','style'=>'float:right;margin-bottom: 10px;')); }
                                        ?>
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
                                url : base_url+'/index.php?r=Login/set_new',
                                success : function(data)
                                { 
                                    //alert(data);
                                    location.reload();
                                }
                           });
                      });
                    $("body").on('click','.send_for_appraisal',function(){
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
                                url : base_url+'/index.php?r=Midreview/get_mid_emp_data',
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
                                                    url : base_url+'/index.php?r=Midreview/goalnotification',
                                                    success : function(data)
                                                    {
                                                        alert(data);
                                                        $("#show_spin").hide(); 
                                                        $("#err").show();  
                                                        $("#err").fadeOut(6000);
                                                        $("#error_value").text("Notification Send to appraiser");
                                                        $("#err").addClass("alert-success");                       
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
                            $("#err").removeClass("alert-success"); 
                            $("#err").removeClass("alert-danger");                        
                          var id_value = $("#total_kpi_id_list").text();
                          var id = id_value.split(';');var mid_review = ''; var review_comments = ''; var error_count1 = 0;var error_count2 = '';
                          var rel_program_review_by_emp = '';  var extra_program_review_by_emp = '';var program_review_by_emp = '';    var emp_project_mid_review = '';                   
                           $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                           for (var l = 0; l < id.length; l++) {
                            var review_comments = ''; 
                                    for (var i = 0; i < $("#get_kpi_count-"+id[l]).text(); i++) {
                              if (mid_review == '') 
                              {
                                  mid_review = $(".kpi_status_type-"+id[l]+i).find(':selected').val();
                              }
                              else
                              {
                                  mid_review = mid_review +';'+$(".kpi_status_type-"+id[l]+i).find(':selected').val();
                              }
                              console.log(id_value);
                              var comment_data = $(".employee_comment"+id[l]+i).val();
                              //alert($(".employee_comment"+id[l]+i).val());
                                  if (comment_data.length == 0) 
                                  {
                                      error = "Please enter mid review comment."; error_count1 = id[l]+i;break;                                 
                                  }
                                  else if (comment_data.length>1000) 
                                  {
                                      error = "Maximum 1000 charaters are allowed to write comment for review."; error_count1 = id[j]+i;error_count2 = id[j];break;                                 
                                  }
                                  else
                                  {
                                    error = '';
                                      $(".employee_comment"+id[l]+i).css('border-color','');
                                      if (review_comments == '') 
                                      {
                                          review_comments = $(".employee_comment"+id[l]+i).val();
                                      }
                                      else
                                      {
                                          review_comments = review_comments +';'+$(".employee_comment"+id[l]+i).val();
                                      }
                                  }
                              }
                            var program_review_by_emp = '';
                              for (var i = 0; i < $("#total_prog").text(); i++) 
                              {
                                
                                    if((!($("#program_review_by_emp-"+i).val() === undefined) && $("#program_review_by_emp-"+i).val() != '') && ($("#program_review_by_emp-"+i).val().length>500))
                                    {
                                        //alert($("#program_review_by_emp-"+i).val());
                                        error = "Maximum 500 characters are allowed for comments";
                                        // extra_chk_compl1 = 1;
                                        $("#program_review_by_emp-"+i).css('border-color','red');
                                        $('html, body').animate({
                                          scrollTop: ($("#program_review_by_emp-"+i).parent().offset().top)
                                      },500);
                                        break;
                                    } 
                                    else
                                    {
                                        $("#program_review_by_emp-"+i).css('border','');
                                        if (program_review_by_emp == '') 
                                        {
                                           program_review_by_emp = i+"?"+$("#program_review_by_emp-"+i).val();
                                        }
                                        else
                                        {
                                          program_review_by_emp = program_review_by_emp+';'+i+"?"+$("#program_review_by_emp-"+i).val();
                                        }
                                    }
                              }

                              var extra_cnt = $("#extra_program_count").text().replace(/\s+/g, '');
                               for (var state = 0; state < extra_cnt; state++) 
                               {
                                if((!($("#extra_program_review_by_emp-"+state).val() === undefined) && $("#extra_program_review_by_emp-"+state).val() != '') && $("#extra_program_review_by_emp-"+state).val().length>500)
                                    {
                                        //extra_program_review_compl2 = 1;
                                        error = "Maximum 500 characters are allowed for comments";
                                        $('html, body').animate({
                                              scrollTop: ($("#extra_program_review_by_emp-"+state).parent().offset().top)
                                          },500);
                                        $("#extra_program_review_by_emp-"+i).css('border-color','red');break;
                                    }
                                    else
                                    {
                                        $("#extra_program_review_by_emp-"+state).css('border','');
                                        if (extra_program_review_by_emp == '') 
                                        {
                                           extra_program_review_by_emp = $("#extra_program_review_by_emp-"+state).val();
                                        }
                                        else
                                        {
                                          extra_program_review_by_emp = extra_program_review_by_emp+';'+$("#extra_program_review_by_emp-"+state).val();
                                        }
                                    }
                               }

                               for (var i = 1; i <= 2; i++) 
                               {
                                  if((!($("#rel_program_review1_by_emp-"+i).val() === undefined) && $("#rel_program_review1_by_emp-"+i).val() != '') && $("#rel_program_review1_by_emp-"+i).val().length>500)
                                    {
                                        
                                         error = "Maximum 500 characters are allowed for comments";
                                         $("#rel_program_review1_by_emp-"+i).css('border','1px solid red');
                                        $('html, body').animate({
                                              scrollTop: ($("#rel_program_review1_by_emp-"+state).parent().offset().top)
                                          },500);
                                        break;
                                        
                                    }
                                  else
                                  {
                                    //extra_program_review_compl3 = 0;
                                    $("#rel_program_review1_by_emp-"+i).css('border','');                                    
                                    if (rel_program_review_by_emp == '') 
                                    {
                                       rel_program_review_by_emp = $("#rel_program_review1_by_emp-"+i).val();
                                    }
                                    else
                                    {
                                      rel_program_review_by_emp = rel_program_review_by_emp+';'+$("#rel_program_review1_by_emp-"+i).val();
                                    }
                                    //alert(rel_program_review_by_emp);
                                    // chk_cmnts4++;
                                  }
                                }

                                if (!($("#project_mid_review_by_emp").val() === undefined || $("#project_mid_review_by_emp").val() == '') && $("#project_mid_review_by_emp").val().length>500) 
                                {
                                  
                                  $("#project_mid_review_by_emp").css('border-color','red');
                                  error = "Maximum 500 characters are allowed for comments";
                                     $('body').animate({
                                        scrollTop: ($("#project_mid_review_by_emp").parent().offset().top)
                                    },500);
                                    break;                      
                                }
                                else
                                {
                                    $("#project_mid_review_by_emp").css('border-color','');
                                    emp_project_mid_review = $("#project_mid_review_by_emp").val();
                                }   
                              
                              
                              if (error != '') 
                              {
                                 $("#err").show();  
                                 $("#err").fadeOut(6000);
                                 $("#err").text(error);
                                $("#err").addClass("alert-danger");
                                $(".employee_comment"+error_count1).css('border-color','red');
                                $('html, body').animate({
                                      scrollTop: ($(".employee_comment"+error_count1).parent().offset().top)
                                  },500);

                              }
                              else
                              {
if($("#term_condition:checked").val() != 'term_condition')
                                            {
                                                 $("#blink_me").addClass('blink_me');
                                            }	
else
{
$("#saving").css('display','block');
                                //alert(review_comments);
                                //$("#updation_spinner-"+id[l]).show();
                                var e = document.getElementsByClassName('file-input');                                
                                var file_data = $(e)[0].files[0]; 

                                var e = document.getElementsByClassName('file-input1');                                
                                var file_data1 = $(e)[0].files[0]; 

                                var formData = new FormData();
                                var data = {
                                    'KPI_id' : id[l],
                                    'review_comments' : review_comments,
                                  };
                                   formData.append("review_comments",review_comments);
                                   formData.append("program_review_by_emp",program_review_by_emp);
                                   formData.append("extra_program_review_by_emp",extra_program_review_by_emp);
                                   formData.append("rel_program_review_by_emp_name",rel_program_review_by_emp);
                                   //formData.append("demo","sdfds");
                                   //correct_emp_id
                                   formData.append("KPI_id_value",id[l]);
                                    formData.append("correct_emp_id",$("#correct_emp_id").text());
                                   formData.append("employee_csv",file_data);
                                   formData.append("employee_csv1",file_data1);
                                   formData.append("emp_project_mid_review",emp_project_mid_review);
                                   //formData.append("goalsheet_proof",emp_rating);
                                   //alert(file_data);
                                  //console.log(data);
                                  var base_url = window.location.origin;
                                  $.ajax({
                                    type : 'post',
                                    datatype : 'json',
                                    processData: false, 
                                    contentType: false,
                                    enctype : 'multipart/form-data',
                                    data : formData,
                                    url : base_url+'/index.php?r=Midreview/employee_mid_review',
                                    success : function(data)
                                    { 
                                      save_detail_pdf();
//alert(data);
if(l == id.length)
{
//alert(l);
}
                                        //alert(data);
                                        if(data == "error occured")
                                        {$("#saving").css('display','none');
                                            $("#err").show();  
                                                            $("#err").fadeOut(6000);
                                                            $("#err").text("No Changes Done");
                                                            $("#err").addClass("alert-success");
                                                           // get_notify("Mid year review updated successfully");
                                                            $("#updation_spinner-"+id[l]).hide();
                                        }
                                        else
                                        {$("#saving").css('display','none');
                                            $("#err").show();  
                                                            $("#err").fadeOut(6000);
                                                            $("#err").text("Mid year review updated successfully");
                                                            $("#err").addClass("alert-success");
                                                           // get_notify("Mid year review updated successfully");
                                                            $("#updation_spinner-"+id[l]).hide();   
                                        }

                                                                                           
                                    }                    
                                  });
}

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

