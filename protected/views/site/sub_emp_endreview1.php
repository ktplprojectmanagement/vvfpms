<?php
Yii::app()->controller->renderPartial('//site/all_js');
?>
<?php


                $year1="";
                $setting_date=new SettingsForm;
        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('dis_active-date',date('Y'));             
        $settings_data_new = $setting_date->get_setting_data($where,$data,$list); 

//echo strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']);die();
                $year1=$settings_data['0']['setting_type']; 

?>
<label id="year1" style="display:none" ><?php echo $year1; ?> </label>
<script src="http:////cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
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
$(this).popover('hide');
});   
});
</script>
<script type="text/javascript">
    $(function(){
        setInterval(get_save_emp,3000);  
    });
</script> 
        <script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <script type="text/javascript">
       var id,id_value;var sum_value = '';
       var str_chk = /^[0-9]{1}/;
            $(function(){
            $(window).scroll(function()
            {
                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
            });      
                $("body").on('keyup','.score',function() {
                    var str_chk = /^[1-5]\d*$/;
                    id = $(this).attr('id');
                    id_value = id.split('-');
                    if (!str_chk.test($(this).val())) 
                    {
                        $("#err").show();  
                        $("#appraiser_raiting-"+id_value[1]+"-"+id_value[2]).css('border','1px solid red');
                        $("#err").text("Please enter valid rating between 1 to 5 without decimals.");
                        $("#err").addClass("alert-danger");
                    }
                    else
                    {
                        $("#err").hide();
                        sum_value = '';var val_new = 0;var wt = 1;var wt_sum = 1;
                        $("#appraiser_raiting-"+id_value[1]+"-"+id_value[2]).css('border','1px solid #999');                         
                        for (var i = 0; i < $("#kpi_count_list-"+id_value[2]).text(); i++) {
                            var wt = 1;
                            if($("#wt"+i+id_value[2]).text() != '')
                            {
                                wt = $("#wt"+i+id_value[2]).text()/100;
                            }
                            else if($("#kpi_count_list-"+id_value[2]).text() == 0)
                            {
                                wt = 0;
                            }
                            else
                            {
                                wt = (100/$("#kpi_count_list-"+id_value[2]).text())*0.01;
                            }
                            if(wt_sum == '')
                            {
                                wt_sum = $("#wt"+i+id_value[2]).text();
                            }
                            else
                            {
                                wt_sum = parseFloat(wt_sum)+parseFloat($("#wt"+i+id_value[2]).text());
                            }
                            if (!str_chk.test($("#appraiser_raiting-"+i+"-"+id_value[2]).val()) || $("#appraiser_raiting-"+i+"-"+id_value[2]).val() == '') 
                            {
                                val_new = 0;
                            }
                            else
                            {
                                val_new = $("#appraiser_raiting-"+i+"-"+id_value[2]).val()*wt;
                            }
                            if(sum_value == '')
                            {
                                sum_value = val_new;
                            }
                            else
                            {
                                sum_value = parseFloat(sum_value)+parseFloat(val_new);
                            } 
                            
                            $("#"+"rating"+i+id_value[2]).text(($("#appraiser_raiting-"+i+"-"+id_value[2]).val()*wt).toFixed(2));                       
                        }
                        
                        var avg_get = sum_value/$("#kpi_count_list-"+id_value[2]).text();
                        var v = sum_value*$("#rate_"+id_value[2]).text()/100;
                        $("#sum-"+id_value[2]).attr('value',sum_value.toFixed(2));       
                        var kra_sum = '';
                        var id_list = $('#kra_id_list').text();
                        var individual_id_list = id_list.split(';');

                        for(var j=0;j<$("#kra_count").text();j++)
                        {

                            if(kra_sum == '')
                            {
                                kra_sum = $("#sum-"+individual_id_list[j]).val()*$("#rate_"+individual_id_list[j]).text();
                            }
                            else
                            {
                                kra_sum = parseFloat(kra_sum)+parseFloat($("#sum-"+individual_id_list[j]).val()*$("#rate_"+individual_id_list[j]).text());
                            }
                        
                        }
                        var kra_avg_total = 1;
                        for(var j=0;j<$("#kra_count").text();j++)
                        {
                            if(kra_avg_total == '')
                            {
                                kra_avg_total = $("#rate_"+individual_id_list[j]).text()/100;
                            }
                            else
                            {
                                kra_avg_total = parseFloat(kra_avg_total)+parseFloat($("#rate_"+individual_id_list[j]).text()/100);
                            }
                        
                        }
                        var kra_avg_rate = kra_sum*kra_avg_total;
                        $("#kra_total_value").text((kra_sum/100).toFixed(2));
                    }                       
                   
                    });
                    });
       </script>
<style media="all" type="text/css">
      
    #err, #error { 
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
    #err1 { 
        position: fixed; 
        top: 0; right: 0; 
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
    .element{ 
        position:fixed; top:2%; right:1%; 
    } 
</style>
<style type="text/css">
    .popover{
       min-width:30px;
       max-width:400px;
       word-wrap: break-word;
       border:1px solid #4c87b9;
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
    #brk{
        word-break: break-word;
        overflow-wrap:break-word; 
    }
     
</style>
<?php

?>

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
                            <h1>Year End Review</h1>
                        </div>
 <h4 style="float: right;"><?php if(isset($emp_data['0']['Emp_fname'])) { echo 'Employee Name : '.$emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname'].'/ '; } ?>
                             <lable style="float: right;"><?php if(isset($emp_data['0']['Department'])) { echo 'Department : '.$emp_data['0']['Department']; } ?></lable>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
<lable id="num_days" style="display:none"><?php  if(isset($num_days) && $num_days != '') { echo $num_days; }else { echo "1"; } ?></lable>
<lable id="manager_diff" style="display:none"><?php if(isset($chk_manager_diff) && $chk_manager_diff == 1) { echo '1'; }else { echo "0"; } ?></lable>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->

<lable id="apr_chk" style="display:none"><?php if(isset($emp_data['0']['Reporting_officer1_id']) && ($emp_data['0']['Reporting_officer1_id'] == Yii::app()->user->getState("employee_email") || $show_idp == '2')){ echo "" ;}else if(isset($emp_data['0']['reporting_1_change']) && $emp_data['0']['reporting_1_change'] !='') { echo $emp_data['0']['reporting_1_change']; }else if(isset($emp_data['0']['reporting_2_change']) && $emp_data['0']['reporting_2_change'] !='') { echo $emp_data['0']['reporting_2_change']; }else if(isset($emp_data['0']['new_kra_till_date']) && $emp_data['0']['new_kra_till_date'] !='') { echo $emp_data['0']['new_kra_till_date']; } ?></lable>
                <div class="page-content">
<div style="float:right;margin-right: -9px;color: #9d9ba7;padding-top: 182px;" class="element" id="bottom"><i class="fa fa-arrow-circle-o-down fa-3" style="font-size:40px;cursor:pointer;margin-right: 0px;"></i><div style="margin-top: 8px;margin-left: -11px;text-align: center;">Click To <br> Go Down</div></div>
                        <div class="alert alert-danger fade in" id="err" style="display: none"></div>
                        <div class="alert alert-danger fade in" id="err1" style="display: none"></div>
            <div class="container-fluid"> 
                 <a href="<?php  echo Yii::app()->request->baseUrl; ?>/pms/index.php?r=Year_endreview1/year_end_reviewlist/"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a><br><br>                  
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->                           
                            <!-- END PAGE SIDEBAR -->

                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->                                
                                <div>                                               
                                   <!-- </div>
                                </div> -->
                                <?php

                                    if (isset($kpi_data) && count($kpi_data)>0) {
                                ?>


                                <div class="portlet box " style="background-color:#26466D;border:1px solid #26466D">
                                    <div class="portlet-title">
                                        <div class="caption">
                                           Rating Of Quantitative Goals (Part-A)</div>
                                        <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                    </div>
                                    <div class="portlet-body tabs-below">
                                        <div class="tab-content table-responsive">
                                <?php 
                                $kra_id_list = '';   
                                for ($k=0; $k < count($kpi_data); $k++) { 
                                ?>
                                <label id="emp_id_value1" style="display: none"><?php echo $kpi_data['0']['Employee_id']; ?></label> <label id="success1" style="display: none"></label>
                                    <label id="kra_count" style="display:none"><?php echo count($kpi_data); ?></label>
                                     <div style="border: 1px solid #26466D;margin-top: 20px;padding:0px;">
                                        <table class="table table-bordered" cellspacing="0" border="0" style="margin-top: 21px;">
                                            <tr>
                                                <td height="59" align="left" valign=middle><b>KRA Description</b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_description'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b>KRA Category</b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_category'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b>Weightage</b></td>
                                                <td colspan=7 align="center" valign=middle sdnum="16393;0;0" id="rate_<?php echo $kpi_data[$k]['KPI_id']; ?>"><?php echo $kpi_data[$k]['target'];?></td>
                                                </tr>
                                            <tr>
                                                <td align="left" valign=middle style="border:2px solid #26466D"><b>Key Performance Indicators (KPI) Description</b></td>
                                                 <td align="left" valign=middle style="border:2px solid #26466D"><b>KPI Weightage</b></td>
                                                <td align="left" valign=middle style="border:2px solid #26466D">Unit & Value</td>
                                                <!-- <td align="left" valign=middle >Value</td> -->
                                                <td align="left" valign=middle style="border:2px solid #26466D"><b>Actual <span id="brk">achievement </span>of year end</b></td>
                                                <td align="left" valign=middle style="border:2px solid #26466D"><b>Appraisee  comment on actual <span id="brk">achievement</span></b></td>
                                                 <!--  <td style="font-weight:bold;text-align: center;">
                                                                Appraisee <br>Rating</td> -->
                                                <td align="left" valign=middle style="border:2px solid #26466D"><b>Appraiser Comment on actual <span id="brk">achievement</span></b></td>
                                                <td align="left" valign=middle style="border:2px solid #26466D"><b>Appraiser Rating</b></td>
                                                <td align="left" valign=middle style="border:2px solid #26466D"><b>Supported Documents</b></td>
                                               <!--  <td style="font-weight:bold;text-align: center;">
                                                                KPI <br>Status</td> -->
                                               <!--  <td align="left" valign=middle ><b>Average rating for KRA</b></td> -->
                                            </tr>
                                            <?php 
                                                $form=$this->beginWidget('CActiveForm', array(
                                               'id'=>'user-form',
                                                'enableClientValidation'=>true,
                                                'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                                //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
                                            ));
                                            ?>
                                                <?php
                                                        $kpi_list = explode(';',$kpi_data[$k]['kpi_list']);
                                                        $doc_prf_by_emp = explode(';',$kpi_data[$k]['document_proof']);
                                                        $kpi_wt = explode(';',$kpi_data[$k]['KPI_target_value']);
                                                        $kpi_unit = explode(';',$kpi_data[$k]['target_unit']);
                                                        $kpi_value = explode(';',$kpi_data[$k]['target_value1']);
                                                        $goal_status_flag = explode(';', $kpi_data[$k]['final_year_kra_status']);
                                                        $total_upload = explode(';',"tyryrty;tyuyu");
                                                        $doc_prf_by_emp = explode(';',$kpi_data[$k]['document_proof']);
//print_r($kpi_data[$k]['document_proof']);die();
$seq_number = '';
if($kpi_data[$k]['document_proof'] != '')
{
 $doc_prf_by_emp = explode(';',$kpi_data[$k]['document_proof']);
}
if(isset($kpi_data[$k]['seq_number']) && $kpi_data[$k]['seq_number'] != '')
{
  $seq_number = explode(';',$kpi_data[$k]['seq_number']);
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
                                                           //print_r($apr_comment_values);die();
                                                        }
                                                        else
                                                        {
                                                            $apr_comment_values = '';
                                                        }
                                                         if ($kpi_data[$k]['rating_by_emp'] != '') {
                                                           $rating_by_emp = explode(';',$kpi_data[$k]['rating_by_emp']);
                                                           //print_r($apr_comment_values);die();
                                                        }
                                                        else
                                                        {
                                                            $rating_by_emp = '';
                                                        }
                            $appraiser_end_rating1 = '';
                            if ($kpi_data[$k]['appraiser_end_rating'] != '') {
                                                           $appraiser_end_rating1 = explode(';',$kpi_data[$k]['appraiser_end_rating']);
                            $avg_rating = $kpi_data[$k]['appraiser_avrage_end'];
                                                           //print_r($appraiser_end_rating1);die();
                                                        }
                                                        else
                                                        {
                                                            $appraiser_end_rating1 = '';$avg_rating ='';
                                                        }
                                                        // if ($kpi_data[$k]['appraiser_end_rating'] != '') {
                                                        //    $appraiser_end_rating = explode(';',$kpi_data[$k]['appraiser_end_rating']);
                                                        // }
                                                        // else
                                                        // {                                                            
                                                        //     $appraiser_end_rating = '';
                                                        // }
                                                        if($kra_id_list == '')
{
$kra_id_list = $kpi_data[$k]['KPI_id'];
}
else
{
$kra_id_list = $kra_id_list.';'.$kpi_data[$k]['KPI_id'];
}
                                                
                                                        
                                                ?>
                                                 
                                                <?php

                                                   for ($i=0; $i < count($kpi_list); $i++) { $appraiser_end_rating[$k][$i] = 0;

$j=$i+1;

                                                    if ($kpi_unit[$i] == 'Units' || $kpi_unit[$i] == 'Weight' || $kpi_unit[$i] == 'Value') 
                                                    {
                                                         // echo $year1;die(); 
                                                        //print_r($year_end_achieve[$i]);
                                                        if ($year_end_achieve[$i]<=round($kpi_value[$i]*0.69,3)) {
                                                            $appraiser_end_rating[$k][$i] = 1;
                                                        }
                                                        else if ($year_end_achieve[$i]>round($kpi_value[$i]*0.69,3) && $year_end_achieve[$i]<=round($kpi_value[$i]*0.70,3)) {
                                                            $appraiser_end_rating[$k][$i] = 2;
                                                        }
                                                        else if ($year_end_achieve[$i]<=round($kpi_value[$i]*0.96,3) && $year_end_achieve[$i]>round($kpi_value[$i]*0.70,3)) {
                                                            $appraiser_end_rating[$k][$i] = 3;
                                                        }
                                                        else if ($year_end_achieve[$i]>round($kpi_value[$i]*0.96,3) && $year_end_achieve[$i]<=round($kpi_value[$i]*1.06,3)) {
                                                            $appraiser_end_rating[$k][$i] = 4;
                                                        }
                                                        else if ($year_end_achieve[$i]>=round($kpi_value[$i]*1.39,3)) {
                                                            $appraiser_end_rating[$k][$i] = 5;
                                                        }    

                                                      // echo $year1;                    
                                                    }
                                                    

                                                    if ($kpi_unit[$i] != 'Select') {
                                                ?>
                                                <tr>
                                                    <label id='kpi_count_list-<?php echo $kpi_data[$k]['KPI_id']; ?>' style="display: none"><?php echo count($kpi_list); ?></label>
                                                    <td style="border:2px solid #26466D"><?php echo $kpi_list[$i]; ?></td>
                                                    <td id="<?php echo "wt".$i.$kpi_data[$k]['KPI_id']; ?>" style="border:2px solid #26466D"><?php if(isset($kpi_wt[$i])) { echo $kpi_wt[$i]; } ?></td>
                                                    <?php
                                                        $emp_id = Yii::app()->user->getState("role_id");
                                                         ?>                                                    
                                                       <td style="border:2px solid #26466D">
                                                      <?php 
                                                     //echo '33333'.$kpi_unit[$i].'9999';die();
                                                            if ($kpi_unit[$i] == 'Date' || $kpi_unit[$i] == 'Percentage' || $kpi_unit[$i] == 'Days' || $kpi_unit[$i] == 'Ratio' || $kpi_unit[$i] == 'Text') {  

                                                               $value = explode('-',$kpi_value[$i]); //print_r($value);die();
                                                               for ($l=0; $l < count($value); $l++) {
                                                                  ?>
                                                                  <table class="table table-bordered" cellspacing="0" border="0">
                                                               <tr>
                                                                  <td colspan="3"><b>Unit</b></td>
                                                                   <td colspan="2"><?php echo $kpi_unit[$i]; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                   <td>1</td>
                                                                   <td>2</td>
                                                                   <td>3</td>
                                                                   <td>4</td>
                                                                   <td>5</td>
                                                                 </tr>
                                                                   <!--<tr>                                                                    
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
                                                               if($kpi_unit[$i] == 'Date')
                                                               {
                                                                    $actual_year_string = str_replace('/', '-',$year_end_achieve[$i]);
                                                                   $actual_year_string0 = str_replace('/', '-',$value[0]);
                                                                   $actual_year_string1 = str_replace('/', '-',$value[1]);
                                                                   $actual_year_string2 = str_replace('/', '-',$value[2]);
                                                                   $actual_year_string3 = str_replace('/', '-',$value[3]);
                                                                   $actual_year_string4 = str_replace('/', '-',$value[4]);
                                                                   //print_r(strtotime($date_year));echo "<br>";print_r(strtotime($value[0]));die();
                                                                    if (strtotime($actual_year_string)<=strtotime($actual_year_string0)) {
                                                                        $appraiser_end_rating[$k][$i] = 1;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string0) && strtotime($actual_year_string)<=strtotime($actual_year_string1)) {
                                                                        $appraiser_end_rating[$k][$i] = 2;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string1) && strtotime($actual_year_string)<=strtotime($actual_year_string2)) {
                                                                        $appraiser_end_rating[$k][$i] = 3;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string2) && strtotime($actual_year_string)<=strtotime($actual_year_string3)) {
                                                                        $appraiser_end_rating[$k][$i] = 4;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string3)) {
                                                                        $appraiser_end_rating[$k][$i] = 5;
                                                                    }
                                                               }
                                                               else
                                                               {
                                                                    if ($year_end_achieve[$i]==$value[0] || ($year_end_achieve[$i]>$value[0] && $year_end_achieve[$i]<$value[1])) {
                                                                        $appraiser_end_rating[$k][$i] = 1;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[1] || ($year_end_achieve[$i]>$value[1] && $year_end_achieve[$i]<$value[2])) {
                                                                        $appraiser_end_rating[$k][$i] = 2;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[2] || ($year_end_achieve[$i]>$value[2] && $year_end_achieve[$i]<$value[3])) {
                                                                        $appraiser_end_rating[$k][$i] = 3;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[3] || ($year_end_achieve[$i]>$value[3] && $year_end_achieve[$i]<$value[4])) {
                                                                        $appraiser_end_rating[$k][$i] = 4;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[4]) {
                                                                        $appraiser_end_rating[$k][$i] = 5;
                                                                    }
                                                               }
                                                              
                                                            }
                                                            else
                                                            {

                                                                ?>
                                                                     <table class="table table-bordered" cellspacing="0" border="0">
                                                                 <tr>
                                                                 <td colspan="2"><b>Unit</b></td>
                                                                  <td colspan="1"><?php 
                                                                  if (isset($kpi_unit[$i])) {
                                                                       echo $kpi_unit[$i]; 
                                                                  }
                                                                 ?></td>
                                                                  <td colspan="1"><b>Unit value</b></td>
                                                                  <td colspan="1"><?php if(isset($kpi_value[$i])){
                                                                  echo $kpi_value[$i];} ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                   <td>1</td>
                                                                   <td>2</td>
                                                                   <td>3</td>
                                                                   <td>4</td>
                                                                   <td>5</td>
                                                                 </tr>
                                                                   <tr>
                                                                    <td><?php 
                                                                    echo round($kpi_value[$i]*0.69,3); ?></td>
                                                                    <td><?php if(isset($kpi_value[$i])){ echo round($kpi_value[$i]*0.70,3); } ?></td>
                                                                       
                                                                     <td><?php if(isset($kpi_value[$i])){ echo round($kpi_value[$i]*0.96,3); } ?></td>
                                                                        
                                                                    <td><?php if(isset($kpi_value[$i])){ echo round($kpi_value[$i]*1.06,3); } ?></td>
                                                                        
                                                                     <td><?php if(isset($kpi_value[$i])){ echo round($kpi_value[$i]*1.39,3); } ?></td>
                                                                   </tr>
                                                                 </table>
                                                                <?php
                                                            }
                                                        ?>
                                                      </td>
                                                                 <?php
                                                            if ($year_end_achieve != '' && count($year_end_achieve)>0) {
                                                            ?>
                                                            <td style="border:2px solid #26466D"><?php echo CHtml::textArea('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control validate_field','id'=>'emp_actual_achieve'.$kpi_data[$k]['KPI_id'],'disabled'=> "true",'data-toggle'=>"popover","rel"=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?></td>
                                                            <?php 
                                                            }
                                                            else
                                                            {?>
                                                           <td style="border:2px solid #26466D"><?php echo CHtml::textArea('emp_actual_achieve','',array('class'=>'form-control validate_field','id'=>'emp_actual_achieve'.$kpi_data[$k]['KPI_id'],'disabled'=> "true",'data-toggle'=>"popover","rel"=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?></td>
                                                            <?php } ?>
                                                            <?php
                                                            if ($year_end_reviewa != '' && count($year_end_reviewa)>0) {
                                                            ?>
                                                           <td style="border:2px solid #26466D"><?php echo CHtml::textArea('appraisee_comment',$year_end_reviewa[$i],array('class'=>'form-control validate_field','id'=>'appraisee_comment','disabled'=> "true",'data-toggle'=>"popover","rel"=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));?></td>
                                                            <!--   <td> -->
                                                            <?php 
                                                            if ($rating_by_emp !='') {
                                                                // echo CHtml::textField('rating_by_emp',$rating_by_emp[$i],array('class'=>'form-control ','id'=>'rating_by_emp-'.$i.'-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true",'style'=>'min-width: 429px;min-height: 93px;max-width: 429px;max-height: 93px;','data-toggle'=>"popover","rel"=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                            }
                                                            else
                                                            {
                                                                // echo CHtml::textField('rating_by_emp','',array('class'=>'form-control','id'=>'rating_by_emp-'.$i.'-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            ?>
                                                                <?php
                                                                    //$goal_status_select = '';
                                                                    // if (isset($goal_status_flag[$i])) {
                                                                    //      $goal_status_select[$goal_status_flag[$i]] = array('selected' => 'selected');
                                                                    // }
                                                                    // else
                                                                    // {
                                                                    //     $goal_status_select['Select'] = array('selected' => 'selected');
                                                                    // }
                                                                    
                                                                    // $goal_status_list = array('Select' => 'Select','Pending' => 'Pending','Approved' => 'Approved');
                                                                    // echo CHtml::dropDownList("goal_status",'',$goal_status_list,$htmlOptions=array('class'=>'form-control','id'=>'goal_status-'.$i.'-'.$kpi_data[$k]['KPI_id'],'options' => $goal_status_select))
                                                                ?>
                                                            <!--   </td> -->
                                                            <td style="border:2px solid #26466D">
                                                            <?php

                                                            }
                                                            else
                                                            {?>
                                                           <td style="border:2px solid #26466D"><?php echo CHtml::textField('appraisee_comment','',array('class'=>'form-control','id'=>'appraisee_comment','disabled'=> "true")); ?></td>
                                                            <td style="border:2px solid #26466D">
                                                            <?php } ?>
                                                            <?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
if ($apr_comment_values != '' && count($apr_comment_values)>0) {
                                                                echo CHtml::textArea('appraiser_comment',$apr_comment_values[$i],array('class'=>'form-control validate_field','disabled'=> "true",'id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textArea('appraiser_comment','',array('class'=>'form-control validate_field','disabled'=> "true",'id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                            }
}
else
{
if (isset($appraiser_end_rating1[$i]) && count($appraiser_end_rating1)>0 && isset($emp_data['0']['Reporting_officer1_id']) && $emp_data['0']['Reporting_officer2_id'] == $kpi_data[$k]['appraisal_id1'] && $emp_data['0']['Reporting_officer2_id'] != Yii::app()->user->getState("employee_email")) {
echo CHtml::textArea('appraiser_comment',$apr_comment_values[$i],array('class'=>'form-control validate_field','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled'=> "true"));
}
else if ($apr_comment_values != '' && count($apr_comment_values)>0) {
                                                                echo CHtml::textArea('appraiser_comment',$apr_comment_values[$i],array('class'=>'form-control validate_field','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textArea('appraiser_comment','',array('class'=>'form-control validate_field','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                            }
} 
                                                            
                                                          ?></td> 
                                                            <td style="border:2px solid #26466D"><?php 
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
if (isset($appraiser_end_rating1[$i]) && count($appraiser_end_rating1)>0) {
                                                                 echo CHtml::textField('appraiser_raiting',$appraiser_end_rating1[$i],array('class'=>'form-control score','id'=>'appraiser_raiting-'.$i.'-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textField('appraiser_raiting','',array('class'=>'form-control score','id'=>'appraiser_raiting-'.$i.'-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
}
else
{ 
if (isset($appraiser_end_rating1[$i]) && count($appraiser_end_rating1)>0 && isset($emp_data['0']['Reporting_officer1_id']) && $emp_data['0']['Reporting_officer2_id'] == $kpi_data[$k]['appraisal_id1'] && $emp_data['0']['Reporting_officer2_id'] != Yii::app()->user->getState("employee_email")) {
                                                                 echo CHtml::textField('appraiser_raiting',$appraiser_end_rating1[$i],array('class'=>'form-control score','id'=>'appraiser_raiting-'.$i.'-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
else if (isset($appraiser_end_rating1[$i]) && count($appraiser_end_rating1)>0) {
                                                                 echo CHtml::textField('appraiser_raiting',$appraiser_end_rating1[$i],array('class'=>'form-control score','id'=>'appraiser_raiting-'.$i.'-'.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textField('appraiser_raiting','',array('class'=>'form-control score','id'=>'appraiser_raiting-'.$i.'-'.$kpi_data[$k]['KPI_id']));
                                                            }
}
                                                             
    
                                                            ?><lable id="rating<?php echo $i.$kpi_data[$k]['KPI_id']; ?>" style="display:none"></lable></td>  
 
<?php //echo Yii::app()->request->baseUrl; die();?>
 <td style="border:2px solid #26466D">

<?php 
if(isset($seq_number) && count($seq_number)>0)
{
    for($f = 0;$f<count($seq_number);$f++)
{

if(isset($seq_number[$f]) && isset($kpi_data[$k]['KPI_id']) && ($seq_number[$f] == $kpi_data[$k]['KPI_id'].$i))
{
    //echo  $seq_number[$f];
?>
                                   <a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/<?php if(isset($doc_prf_by_emp[$f])) { echo $doc_prf_by_emp[$f]; } ?>' target="_blank"><?php echo CHtml::button('Open File',array('class'=>'btn yellow','style'=>'background-color:#26466D')); ?></a>
<?php } } } ?>                                                 
</td>  
                                                            
                                                    <?php 
                                                            }
                                                        } ?>   
                                                        </div>
                                                   
                                                </tr>
                                                <tr>
                                                <td colspan=8  ><b>
<?php 
$kra_num = $k+1;
?>
                                                <div class='col-md-4'>Average rating for KRA <?php echo $kra_num;?>: <?php     
                                                if(isset($kpi_data[$k]['KPI_id']))
                                                {
                                                    echo CHtml::textField('average_rating',$avg_rating,array('class'=>'form-control','id'=>'sum-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true",'style'=>'width:218px')); 
                                                }                                            
                                                
                                                ?></div>
                        <?php 
                                                    if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { ?>
                                                    
                                                    <?php } ?>
                                                <?php if (isset($as_apr_data) && count($as_apr_data)>0) {  
                                                   // echo CHtml::button('Review',array('id'=>$kpi_data[$k]['KPI_id'],'class'=>'btn border-blue-soft year_end_rew_by_apraiser','style'=>'margin-left: 243px;')); 
                                                }
                                                else
                                                { 
                                                   // echo CHtml::button('Submit',array('id'=>$kpi_data[$k]['KPI_id'],'class'=>'btn border-blue-soft year_end_rew','style'=>'float: right;'));    
                                                }
                                                ?><i id="updation_spinner-<?php if(isset($kpi_data[$k]['KPI_id'])) { echo $kpi_data[$k]['KPI_id']; } ?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i></td>
                                                </tr>

                                            <?php $this->endWidget(); ?>   
                                    </table>                                          
                                    </div>                                    
                                    <?php
                                        }   ?>
                                         </div>
                                                                     <!--<lable style="font-size: 18px;">
Average rating for KRA :
<lable id="kra_total_value1"></lable></lable> -->
 <div style="background-color: rgba(38, 70, 109, 0.77);border:1px solid #26466D;height:41px;">  <lable style="font-size: 18px;padding-left:10px;padding-top:5px;color:#fff">
Manager's quantitative rating for  <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?> =
<lable style="font-size: 22px;padding-left:10px;padding-top:5px;color:#fff;font-weight: bold;" id="kra_total_value"><?php if(isset($IDP_data['0']['performance_rating'])) { echo $IDP_data['0']['performance_rating']; } ?></lable></lable> </div>  
                                         </div> 

                                     <?php   }
                                        else
                                        { ?>
                                            <div class="note note-info">
                                                <p> No Data Found </p>
                                            </div>
                                    <?php    }
                                    ?>

                                </div>
                                
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                       
                
  
<div class="portlet box " <?php if(isset($show_idp) && $show_idp != '' && (count($show_idp)>0 || $show_idp == '2')){ ?>style="background-color:#26466D;border:1px solid #26466D;padding-top: 52px;margin-top: 20px;display:block"<?php }else{ ?>style="background-color:#26466D;border:1px solid #26466D;padding-top: 52px;margin-top: 20px;display:none"<?php } ?> >
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Rating Of Qualitative Goals (Part-B)
                                           </div>
                                           <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                    </div>                                    
                                    <div  class="portlet-body tabs-below">
                                        <div class="tab-content">
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                     <div style="border: 1px solid #26466D;margin-top: 20px;padding:0px;">
                                    <?php

if (isset($IDP_data) && count($IDP_data)>0)
{ 
    //print_r($IDP_data);die();
$model1=new Yearend_reviewbForm;    
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
$list = array('Employee_id','goal_set_year');
$data = array($IDP_data['0']['Employee_id'],date("Y",strtotime("-1 year"))."-".date("Y"));
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
        <td class="color" colspan="2" style="border-bottom-width: 2px;border-bottom-style: solid;">
            This form captures the <span style="font-weight: bold; text-decoration: underline;"> HOW </span>of performance and will be used to differentiate between 3, 4 and 5 ratings on the performance scale when such differentiation is not normally possible i.e. all the employees have performed equally well and manager has to make a tough choice to fit the employees on a bell curve

            
        </td>                     
    </tr>
    <tr>
        <?php 
if (isset($employee_review_data) && count($employee_review_data)>0) {
                             
                                $employee_review1 = $employee_review_data['0']['employee_review1'];
                                $employee_review2 = $employee_review_data['0']['employee_review2']; 
                                $review1_example1 = $employee_review_data['0']['review1_example1'];
                                $review1_example2 = $employee_review_data['0']['review1_example2'];
                                $review2_example1 = $employee_review_data['0']['review2_example1'];                     
                                $review2_example2 = $employee_review_data['0']['review2_example2'];
                                $appr_comments_yearB1=$employee_review_data['0']['appr_comments_yearB1'];
                                $appr_comments_yearB2=$employee_review_data['0']['appr_comments_yearB2'];
                                $appr_comments_yearB3=$employee_review_data['0']['appr_comments_yearB3'];
                                $appr_comments_yearB4=$employee_review_data['0']['appr_comments_yearB4'];
                                $yearB_rate1=$employee_review_data['0']['yearB_rate1'];
                                $yearB_rate2=$employee_review_data['0']['yearB_rate2'];
                                $yearB_rate3=$employee_review_data['0']['yearB_rate3'];
                                $yearB_rate4=$employee_review_data['0']['yearB_rate4'];
                               

                            }
                            else
                            {
                                $employee_review1 = '';
                                $employee_review2 = '';
                                $review1_example1 = '';
                                $review1_example2 = '';
                                $review2_example1 = '';                     
                                $review2_example2 = '';
                                $appr_comments_yearB1 = '';
                                $appr_comments_yearB2 = '';
                                $appr_comments_yearB3 = '';
                                $appr_comments_yearB4 = '';
                                $yearB_rate1 = '';
                                $yearB_rate2 = '';
                                $yearB_rate3 = '';
                                $yearB_rate4 = '';
                            }
        ?>
        <td  class=" bold bg" colspan="2">
            1. I feel my goals were very challenging and stretched because:
<?php
if(isset($employee_review_data['0']['proof_1']) && $employee_review_data['0']['proof_1'] != '')
{
?>
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof_1']; ?>' target="_blank"><?php echo CHtml::button('Open File',array('class'=>'btn yellow','style'=>'float: right; background-color:#26466D')); ?></a>

<?php } ?>
        </td>
                                
    <tr>

    <tr>
                        <td colspan="2">
                        <?php
                            
                             if(isset($master_apr) && $master_apr==2)

                             {
                                echo CHtml::textArea('employee_review1',$employee_review1,array('class'=>'form-control','id'=>'target1','disabled'=>'true'));
                             }
                             else
                             {
                                echo CHtml::textArea('employee_review1',$employee_review1,array('class'=>'form-control','id'=>'target1','disabled'=>'true'));
                             }
                               
                        ?>

                        </td>
                    </tr>
                    <tr>
                    <td class="bold">
                      Manager's Comment
                    </td>
                    <td class="col-md-10">
                        <?php
                        if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
                        echo CHtml::textArea('appr_comments_yearB1',$appr_comments_yearB1,array('class'=>'form-control','id'=>'appr_comments_yearB1','disabled'=>'true'));
}
else
{
echo CHtml::textArea('appr_comments_yearB1',$appr_comments_yearB1,array('class'=>'form-control','id'=>'appr_comments_yearB1'));
}
                        ?>
                    </td>
                    </tr>
                     <tr style="border-bottom-width: 2px;border-bottom-style: solid;">
                    <td class="bold">
                      
                      Manager's Rating 
                    </td>
                    <td class="col-md-10">

                        <?php
                      if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ 
                        echo CHtml::textField('yearB_rate1', $yearB_rate1, array('class'=>'form-control score1','id'=>'yearB_rate1','style'=>'width:100px','placeholder'=>"(Out of 25)",'maxlength'=>2,'disabled'=>'true'));
}
else
{
echo CHtml::textField('yearB_rate1', $yearB_rate1, array('class'=>'form-control score1','id'=>'yearB_rate1','style'=>'width:100px','placeholder'=>"(Out of 25)",'maxlength'=>2));
}
                        ?>
                    </td>
                    </tr>

                    <tr>
                        <td  class=" bold bg" colspan="2">
                             2. I have gone the extra mile to help my colleagues/team/organization by:
<?php
if(isset($employee_review_data['0']['proof_2']) && $employee_review_data['0']['proof_2'] != '')
{
?>
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof_2']; ?>' target="_blank"><?php echo CHtml::button('Open File',array('class'=>'btn yellow','style'=>'float: right; background-color:#26466D')); ?></a>
<?php } ?>
                        </td>
                    </tr>

                     <tr>
                        <td colspan="2">
                                <?php

                                if(isset($master_apr) && $master_apr==2)
                                 {
                                   echo CHtml::textArea('employee_review2',$employee_review2,array('class'=>'form-control','id'=>'target2','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('employee_review2',$employee_review2,array('class'=>'form-control','id'=>'target2','disabled'=>'true'));
                                 }
                                     
                                ?>
                        </td>
                    </tr> 
                          
                    


                    <tr>
                        <td class="bold">
                          Manager's comments
                        </td>
                        <td>
                            <?php
                           if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{  
                            echo CHtml::textArea('appr_comments_yearB2',$appr_comments_yearB2,array('class'=>'form-control','id'=>'appr_comments_yearB2','disabled'=>'true'));
}
else
{
echo CHtml::textArea('appr_comments_yearB2',$appr_comments_yearB2,array('class'=>'form-control','id'=>'appr_comments_yearB2'));
}
                            ?>
                        </td>
                    </tr>


                    <tr style="border-bottom-width: 2px;border-bottom-style: solid;">
                    <td class="bold">
                      Manager's Rating
                    </td>
                    <td>

                        <?php
                        if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{   
                        echo CHtml::textField('yearB_rate2', $yearB_rate2, array('class'=>'form-control score1','id'=>'yearB_rate2','style'=>'width:100px','placeholder'=>"(Out of 25)",'maxlength'=>2,'disabled'=>'true'));
}
else
{
 echo CHtml::textField('yearB_rate2', $yearB_rate2, array('class'=>'form-control score1','id'=>'yearB_rate2','style'=>'width:100px','placeholder'=>"(Out of 25)",'maxlength'=>2));
}
                        ?> 
                    </td>
                    </tr>
                
                    <tr>
                        <td  class=" bold bg" colspan="2" >
                            3. I have lived the VVF values (Openness, Integrity, Respect, Trust, Innovation, Agility) in an exemplary fashion in the following way:
                            <label id="proof1" style="float: right;"></label>
<?php
if(isset($employee_review_data['0']['proof1']) && $employee_review_data['0']['proof1'] != '')
{
?>
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof1']; ?>' target="_blank"><?php echo CHtml::button('Open File',array('class'=>'btn yellow','style'=>'float: right; background-color:#26466D')); ?></a>
<?php } ?>
                            
                        </td>
                                                
                    <tr>
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
                        Example:1<span style="color:red">*</span>
                    </td>
                    <td>
                        <?php

                            if(isset($master_apr) && $master_apr==2)
                                 {
                                   echo CHtml::textArea('review1_example1',$review1_example1,array('class'=>'form-control','id'=>'text1','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('review1_example1',$review1_example1,array('class'=>'form-control','id'=>'text1','disabled'=>'true'));
                                 }
                             
                        ?>
                        </td>
                    </td >
                    </tr>   

                    <tr>
                    <td class="bold">
                        Example:2
                    </td>
                    <td>
                        <?php
                            if(isset($master_apr) && $master_apr==2)
                                 {
                                   echo CHtml::textArea('review1_example2',$review1_example2,array('class'=>'form-control','id'=>'text2','disabled'=>'true'));
                                 }
                                 else
                                 {
                                   echo CHtml::textArea('review1_example2',$review1_example2,array('class'=>'form-control','id'=>'text2','disabled'=>'true'));
                                 }
                             
                        ?>
                        </td>
                    </td>
                    </tr>
                    

                    <tr>
                        <td class="bold">
                          Manager's comments 
                        </td>
                        <td>
                            <?php
                           if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{   
                            echo CHtml::textArea('appr_comments_yearB3',$appr_comments_yearB3,array('class'=>'form-control','id'=>'appr_comments_yearB3','disabled'=>'true'));
}
else
{
echo CHtml::textArea('appr_comments_yearB3',$appr_comments_yearB3,array('class'=>'form-control','id'=>'appr_comments_yearB3'));
}
                            ?>
                        </td>
                    </tr>


                    <tr style="border-bottom-width: 2px;border-bottom-style: solid;">
                    <td class="bold">
                      Manager's Rating 
                    </td>
                    <td>

                        <?php
                        if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{   
                        echo CHtml::textField('yearB_rate3', $yearB_rate3, array('class'=>'form-control score1','id'=>'yearB_rate3','style'=>'width:100px','placeholder'=>"(Out of 25)",'maxlength'=>2,'disabled'=>'true'));
}
else
{
echo CHtml::textField('yearB_rate3', $yearB_rate3, array('class'=>'form-control score1','id'=>'yearB_rate3','style'=>'width:100px','placeholder'=>"(Out of 25)",'maxlength'=>2));
}
                        ?>
                    </td>
                    </tr>

                    <tr>
                        <td  class=" bold bg" colspan="2" >
                            4. I have demonstrated the VVF leadership competencies (Teamwork, Customer Orientation, Result Orientation, Developing self and team, Strategic thinking, Ownership and accountability)  in the following way:<label id='proof2' style="float:right">
                                                      </label>  
<?php
if(isset($employee_review_data['0']['proof2']) && $employee_review_data['0']['proof2'] != '')
{
?>
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_proofs/<?php echo $employee_review_data['0']['proof2']; ?>' target="_blank"><?php echo CHtml::button('Open File',array('class'=>'btn yellow','style'=>'float: right; background-color:#26466D')); ?></a>
<?php } ?>                          
                        </td>
                                                
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
                        Example:1<span style="color:red">*</span>
                    </td>
                    <td>
                    <?php
                        if(isset($master_apr) && $master_apr==2)
                                 {
                                    echo CHtml::textArea('review2_example1',$review2_example1,array('class'=>'form-control','id'=>'text3','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('review2_example1',$review2_example1,array('class'=>'form-control','id'=>'text3','disabled'=>'true'));
                                 }
                            
                    ?>
                        </td>
                    </td >
                    </tr>   
                    <tr>
                    <td class="bold">
                        Example:2
                    </td>
                    <td>
                    <?php
                        if(isset($master_apr) && $master_apr==2)
                                 {
                                    echo CHtml::textArea('review2_example2',$review2_example2,array('class'=>'form-control','id'=>'text4','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('review2_example2',$review2_example2,array('class'=>'form-control','id'=>'text4','disabled'=>'true'));
                                 }
                             
                    ?>
                    </td>
                    </tr>

                     <tr>
                        <td class="bold">
                          Manager's comments
                        </td>
                        <td >
                            <?php
                           if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{    
                            echo CHtml::textArea('appr_comments_yearB4',$appr_comments_yearB4,array('class'=>'form-control ','id'=>'appr_comments_yearB4','disabled'=>'true'));
}
else
{
echo CHtml::textArea('appr_comments_yearB4',$appr_comments_yearB4,array('class'=>'form-control ','id'=>'appr_comments_yearB4'));
}
                            ?>
                        </td>
                    </tr>


                    <tr>
                    <td class="bold">
                      Manager's Rating
                    </td>
                    <td >

                        <?php
                        if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{    
                        echo CHtml::textField('yearB_rate4', $yearB_rate4, array('class'=>'form-control score1','id'=>'yearB_rate4','style'=>'width:100px','placeholder'=>'(Out of 25)','maxlength'=>2,'disabled'=>'true'));
}
else
{
echo CHtml::textField('yearB_rate4', $yearB_rate4, array('class'=>'form-control score1','id'=>'yearB_rate4','style'=>'width:100px','placeholder'=>'(Out of 25)','maxlength'=>2));
}
                        ?></div><div><span style="color:#555555;padding-left: 30px;">
                    </td>
                    </tr>

   
<tr><td>
<label  class="custom-file-input file-blue file_change" id="file_change" style="width: 96px;float: right;margin-top: -8px;">
<input class='proof1' type="file"  name='proof1' style="display: none" />
</td>
<td>
<label  class="custom-file-input file-blue file_change" id="file_change" style="width: 96px;float: right;margin-top: -8px;">
                                                        <input class='proof2' type="file"  name='proof2' style="display: none" />
</td>
</tr>
                </tbody>
            </table>

                 <?php }else { ?>
<div class="alert alert-info"  style="margin-top: 10px;width: 99%;">
  Midyear Review For IDP & goalsheet not updated.
</div>
<?php } ?>
          <div <?php if(isset($show_idp) && count($show_idp)>0 && $show_idp != ''){ ?>style="background-color:#26466D;border:1px solid #26466D;height:41px;display:block"<?php }else{ ?>style="background-color: rgba(38, 70, 109, 0.61);border:1px solid #26466D;height:41px;display:none"<?php } ?>>  <lable style="font-size: 18px;padding-left:10px;padding-top:5px;color:#fff">
Manager's qualitative rating for  <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?> =
<lable style="font-size: 22px;padding-left:10px;padding-top:5px;color:#fff;font-weight: bold;" id="kra_total_value1"><?php if(isset($IDP_data['0']['Tota_score'])) { echo $IDP_data['0']['Tota_score']; } ?></lable></lable><span class="bold" id="sum1" style="color:#fff;display:none"> <?php if(isset($IDP_data['0']['Tota_score'])) { echo $IDP_data['0']['Tota_score']; } ?> </span></div>      
                                </div></div></div>                    </div>

                 


<div class="portlet box "   <?php if(isset($show_idp) && count($show_idp)>0 && $show_idp != ''){ ?>style="background-color:#26466D;border:1px solid #26466D;margin-top:20px;display:block"<?php }else{ ?>style="background-color:#26466D;border:1px solid #26466D;margin-top:20px;display:none"<?php } ?> >
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
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                     <div style="border: 1px solid #26466D;margin-top: 20px;padding-left: 10px;padding-right:10px;padding-top:10px">
                                    <?php

if (isset($IDP_data) && count($IDP_data)>0)
{ 
?>
                                       <div class="row">
                                <div class="col-md-12" style="padding-left: 5px;padding-right: 5px;">
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
                                                      <!-- <div class="col-md-2"><label >
                                                        <span class="bold">Employee Name</span></label>
                                                      </div> -->
                                                      <div class="col-md-2"><label >
                                                        <span class="bold">Employee Name</span></label>
                                                      </div>
                                                        <div class="col-md-4" id="emp_nm">
                                                          <?php 
                                                          if(isset($emp_data)&& count($emp_data)>0){
                                                                echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
                                                                }?>
                                                                                                           
                                                        
                                                        </div>
                                                       <div class="col-md-2"><label >
                                                       <span class="bold">Manager’s name</span></label>
                                                      </div>
                                                       
                                                        <div class="col-md-4">
                                                        <?php if(isset($mgr_data) && count($mgr_data)>0){
                                                             echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <div class="col-md-2"><label >
                                                        <span class="bold">Employee Code</span></label>
                                                  </div>
                                                        <div class="col-md-4" >                                                        
                                                           <?php  if(isset($emp_data)&& count($emp_data)>0){
                                                           echo $emp_data[0]['Employee_id'];   }?> 
                                                        </div>
                                                        
                                                        <div class="col-md-2"><label >
                                                        <span class="bold">Date</span></label></div>

                                                        <div class="col-md-4">
                                                        <?php 
                                                           $today = date('d-m-Y'); 
                                                         echo $today;?>
                                                            
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
                                                <label id="total_prog" style="display:none"><?php if(isset($program_data_result) && count($program_data_result)>0) { echo count($program_data_result);} ?></label>
                                                    <table class="table table-bordered table-hover" id="maintable">
                                    <thead>
                                        <th>Name of program</th>
                                        <th>Faculty</th>
                                        <th>Days</th>                                        
                                        <th>Please explain why the training is needed</th>
                                        <th>Year End Status Program completed</th>
                                        <!-- <th>Review</th> -->
                                        <th>Year End Review By Employee</th>

                                        <th>Final Review</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $compulsory = '';$program_state = '';$program_cmnt = '';$state = 0;$review_state = '';$program_state1 = '';$not_undefine = '';$val_cnt = 0;
                                    if (isset($program_data_result) && count($program_data_result)>0) {
                                        for ($i=0; $i < 8; $i++) {
                                         
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
                                            if(isset($IDP_data) && count($IDP_data)>0)
                                            {
                                              $program_individual_final_review = '';
                                              $program_state = explode('^',$IDP_data['0']['Year_end_prg_status']);
                                              //$program_state = $IDP_data['0']['Year_end_prg_status'];
//print_r($program_state);die();
                                              $program_cmnt = explode('^',$IDP_data['0']['Year_end_prg_comments']);
                                              $program_final_review = explode(';',$IDP_data['0']['program_final_review']);
                                              //print_r($program_final_review);die();
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
                                            //print_r($program_data_result)                                ;die();
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

                                             if(isset($program_final_review[$val_cnt]))
                                            {
                                                $program_individual_final_review = $program_final_review[$val_cnt];
                                            } 

                                              ?>
                                            <tr class="error_row_chk">                                                               
                                                <td class="prog_name" id="<?php echo $i; ?>"> <?php echo $program_data_result[$i]['program_name']; ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?></td>
                                                <td> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
                                                <td> <?php echo $program_data_result[$i]['training_days']; ?> </td>
                                                <td class="col-md-4">
                                                <?php 
                                                    echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('maxlength'=>80,'class'=>"form-control  validate_field program_cmd",'id'=>'program_cmd-'.$i,'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                ?> </td>
                                                <td class="col-md-1">
                                                <input type="radio" disabled="true" name='completeion_type1<?php echo $i; ?>'  value="Yes" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='completeion_type1<?php echo $i; ?>' value="No" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'No') { ?>checked='check'<?php } ?>>No
                                                
                                                </td>
                                                <td class="col-md-4">
                                                <?php 
                                                    echo CHtml::textField('program_review',$review_state,$htmlOptions=array('maxlength'=>80,'class'=>"form-control  program_review validate_field",'id'=>'program_review-'.$i,'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
                                                ?> </td>
                                                 <td class="col-md-4">
                                                <?php 
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{    
                                                    echo CHtml::textField('program_final_review',$program_individual_final_review,$htmlOptions=array('maxlength'=>80,'class'=>"form-control program_final_review validate_field",'id'=>'program_final_review-'.$i,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled'=> "true"));
}
else
{
echo CHtml::textField('program_final_review',$program_individual_final_review,$htmlOptions=array('maxlength'=>80,'class'=>"form-control program_final_review validate_field",'id'=>'program_final_review-'.$i,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
                                                ?> </td>
                                            </tr>
                                            <?php 
$val_cnt++;
                                            $not_undefine++;
                                            $state++;

                                       }
                                    }
                                    }
                                    ?>
                                    <label id="program_count" style="display: none"><?php echo $not_undefine; ?></label>
                                    <label id="compulsory_id" style="display: none"><?php echo $compulsory; ?></label>
                                    </tbody>

                                 </table>     
                                                </div>
<?php
if (isset($IDP_data)) {
?>
                                                        <div class="form-group error_row_chk2">

                                                    <label class="col-md-12 control-label">
                                                      <span style="color:#26466D;font-size: 14px;float: left;" class="bold">If you need a program that is not mentioned above, please use the space below. Please note this program may be offered if at least 20 people request for it. 
                                                    </span></label> 
                                                    <br>
                                                </div><?php } ?>
                                                <?php
                                                $count = '';$count_value = '';
                                                 if (isset($IDP_data)) {
                                                                    $count = explode(';',$IDP_data['0']['extra_topic']);
                                                                   //print_r($count);die();
                                                 ?>
                                                 <div class="form-group">                                                         
                                                            <div class="col-md-3 bold">
                                                              Topics required
                                                            </div>
                                                            <div class="col-md-1 bold">No. of days</label></div>
                                                            <div class="col-md-2 bold">
                                                             Internal faculty name
                                                            </div>
                                                            <div class="col-md-2 bold">
                                                             Program Completed
                                                            </div>
                                                            <div class="col-md-2 bold">
                                                             Reviews
                                                            </div>
                                                            <div class="col-md-2 bold">
                                                             Final Reviews
                                                            </div>
                                                  </div>
                                                 <?php
                                                 $year_extra_prgrm_cmd = '';$year_extra_program_status = '';$year_extra_prgrm_cmd1 = '';$year_extra_program_status1 = ''; $year_extra_program_status2 = ''; $year_extra_program_status3 = '';$rel_prgrm_cmd1 = '';$rel_prgrm_cmd2 = '';$rel_program_final_review0 = '';$rel_program_final_review1 = '';$extra_program_final_review0 = '';$extra_program_final_review1 = '';$extra_list = '';
                                                    if ($count !='') {
                                                      for ($m=0; $m < count($count); $m++) {  

                                                        if ($count[$m] != 'undefined') {
                                                        $count_value++;
                                                        $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                        $year_extra_prgrm_cmd = explode('^',$IDP_data['0']['Extra_year_end_prg_comments']);
                                                        $year_extra_program_status = explode('^',$IDP_data['0']['Extra_year_end_prg_status']);
                                                        $year_rel_program_status2 = explode('^',$IDP_data['0']['Relationship_year_end_status']);
                                                        $year_rel_program_status3 = explode('^',$IDP_data['0']['Relationship_year_end_comments']);
                                                        // print_r($IDP_data);die();
                                                        if(isset($rel_program_final_review)){
                                                        $rel_program_final_review = explode(';',$IDP_data['0']['rel_program_final_review']);}
                                                        $extra_program_final_review = explode(';',$IDP_data['0']['extra_program_final_review']);
if($extra_list == '')
{
$extra_list = $m;
}
else
{
$extra_list = $extra_list.';'.$m;
}
                                                        if (isset($year_extra_prgrm_cmd[$m])) {
                                                          $year_extra_prgrm_cmd1 = $year_extra_prgrm_cmd[$m];
                                                        }
                                                        else
                                                        {
                                                          $year_extra_prgrm_cmd1 = '';
                                                        }
                                                        if (isset($year_extra_program_status[$m])) {
                                                          $year_extra_program_status1 = $year_extra_program_status[$m];
                                                        }
                                                        else
                                                        {
                                                          $year_extra_program_status1 = '';
                                                        }
                                                        if (isset($year_rel_program_status2[0])) {
                                                          $year_extra_program_status2 = $year_rel_program_status2[0];
                                                          $rel_prgrm_cmd1 = $year_rel_program_status3[0];
                                                        }
                                                        else
                                                        {
                                                          $year_extra_program_status2 = '';
                                                          $rel_prgrm_cmd1 = '';
                                                        }
                                                        if (isset($year_rel_program_status2[1])) {
                                                          $year_extra_program_status3 = $year_rel_program_status2[1];
                                                          $rel_prgrm_cmd2 = $year_rel_program_status3[1];
                                                        }
                                                        else
                                                        {
                                                          $year_extra_program_status3 = '';
                                                           $rel_prgrm_cmd2 = '';
                                                        }                                                        
                                                                                                                                                                 
                                                    ?>
                                                      <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-3">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                         $topic = $topic1[$m];                                                                
                                                         $day = $day1[$m];                         
                                                         $faculty[$faculty2[$m]] = array('selected' => 'selected');
                                                         echo CHtml::textField('topic'.$m,$topic,$htmlOptions=array('maxlength'=>80,'class'=>"form-control  topic".$m,'disabled'=> "true")); ?> 
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo CHtml::textField('days_required'.$m,$day,$htmlOptions=array('maxlength'=>80,'class'=>"form-control  days_required".$m,'disabled'=> "true")); ?> 
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
                                                        <div class="col-md-2" style="display: none;">
                                                            <i class="fa fa-trash-o del_extra_program" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="<?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['Employee_id'])) { echo 'del_extra_program-'.$IDP_data['0']['Employee_id'].$l;
                                                        }?>" title="Delete" aria-hidden="true"></i>
                                                        </div>
                                                        <div  class="col-md-2">
<?php
if(isset($IDP_data['0']['midyear_status_flag']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
?>
<input type="radio" disabled="true" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="Yes" class='extra_completeion_type<?php echo $m; ?>' <?php if($year_extra_program_status1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="No" class='extra_completeion_type<?php echo $m; ?>' <?php if($year_extra_program_status1 == 'No') { ?>checked='check'<?php } ?>>No
<?php
}
else
{
 ?>
 <?php

 $set_flag1="undefined";
?>
<input type="radio" <?php echo $set_flag1; ?> disabled="true" name='extra_completeion_type<?php echo $m; ?>' value="Yes" class='extra_completeion_type<?php echo $m; ?>' <?php if($year_extra_program_status1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" <?php echo $set_flag1; ?> name='extra_completeion_type<?php echo $m; ?>' disabled="true" value="No" class='extra_completeion_type<?php echo $m; ?>' <?php if($year_extra_program_status1 == 'No') { ?>checked='check'<?php } ?>>No
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
                                                        $set_flag="undefined";
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('extra_program_review',$year_extra_prgrm_cmd1,$htmlOptions=array('disabled' => 'true','class'=>"form-control validate_field extra_program_review",'id'=>'extra_program_review-'.$m,$set_flag,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
else
{
echo CHtml::textField('extra_program_review',$year_extra_prgrm_cmd1,$htmlOptions=array('disabled' => 'true','class'=>"form-control validate_field extra_program_review",'id'=>'extra_program_review-'.$m,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
$rel_program_final_review_by_apr = '';
if (isset($extra_program_final_review[$m])) {
                                                          $extra_program_final_review1 = $extra_program_final_review[$m];
                                                        }
                                                        else
                                                        {
                                                          $extra_program_final_review1 = '';
                                                        }    
?></div>
 <div class="col-md-2">
<?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ 
echo CHtml::textField('extra_program_final_review',$extra_program_final_review1,$htmlOptions=array('class'=>"form-control validate_field extra_program_final_review",'id'=>'extra_program_final_review-'.$m,$set_flag,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled' => 'true'));
}
else
{
echo CHtml::textField('extra_program_final_review',$extra_program_final_review1,$htmlOptions=array('class'=>"form-control validate_field extra_program_final_review",'id'=>'extra_program_final_review-'.$m,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
                                                            
                                                        ?> </div>

                                                    </div>

                                                  <?php    }
                                                    }
                                                  }
                                                }
                                                 ?>
                                                  <label id="program_count" style="display: none"><?php echo $not_undefine; ?></label>
<label id="extra_program_count" style="display: none"><?php echo $count_value++; ?></label>
<label id="ext_program_count" style="display: none"><?php echo $extra_list; ?></label>
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
                                                <lable id="error_spec1"  style="color: red;float: right;"></lable></div>
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
                                <div class="col-md-12" style="padding-left: 5px;padding-right: 5px;">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit error_row_chk1" style="margin-bottom: 0px;">
                                        <div class="portlet-body form">
                                           <!-- <form action="#" id="form-username" class="form-horizontal form-bordered"> -->
<form action="#" id="form-username" class="form-horizontal form-bordered" style="margin-bottom: 0px;">
                                                   <div class="form-group">
                                                      <div class="col-md-12">

                                                        <label class="col-md-12 control-label" style="text-align:left;"><span class="bold" style="color:#26466D;font-size: 14px;float: left;">
                                                    Note: Part B and Part C are to be filled by only AGM and above employees.     
                                                          </span>
                                                        </label>
                                                      </div>
<div style="height: 43px;background-color: #26466D;margin-top: 63px;
">&nbsp;&nbsp;
<span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part B: Development through developmental relationships</span><br>
</div>
                                                   </div>
                                                   <div class="form-group">
                                                          <div class="col-md-2 bold" >Relationship</div>
                                                         <div class="col-md-2 bold" >Name of leader</div>
                                                       <div class="col-md-1 bold" >Number of Meetings planned
                                                        </div>
                                                        <div class="col-md-1 bold" >Target date</div>
                                                       <div class="col-md-2 bold" >Prgram Status</div>
                                                       <div class="col-md-2 bold" >Review</div>
                                                        <div class="col-md-2 bold" >Final Review</div>
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
 $rel_program_final_review1 = explode(';',$IDP_data['0']['rel_program_final_review_by_apr']);
//print_r();die();
if (isset($rel_program_final_review1[0])) {
                                                          $rel_program_final_review0 = $rel_program_final_review1[0];
                                                        }
                                                        else
                                                        {
                                                          $rel_program_final_review0 = '';
                                                        }
                                                        if (isset($rel_program_final_review1[1])) {
                                                          $rel_program_final_review1 = $rel_program_final_review1[1];
                                                        }
                                                        else
                                                        {
                                                          $rel_program_final_review1 = '';
                                                        }     
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[0])) {
                                                                $faculty3 = $faclty[0];
                                                              }
                                                              //$faculty3[$faclty[0]] = array('selected' => 'selected');
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
                                                            // echo CHtml::DropDownList('faculty_email_id3','faculty_email_id3',$Cadre_id,array('class'=>'form-control validate_field faculty_email_id3','empty'=>'Select','options' => $faculty3,'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); 
                                                             echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('class'=>"form-control validate_field col-md-2 faculty_email_id3",'id'=>'faculty_email_id3','disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
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
                                                                       <input style="width:80px" class="form-control target_date3" readonly="" type="text" value="<?php echo $rel2[0]; ?>"  id="target_date3">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input style="width:80px" class="form-control target_date3" readonly="" type="text"  id="target_date3">
                                                                 <?php   }
                                                                ?>
                                                                
                                                            </div>
                                                        </div>
                                                        <div  class="col-md-2">
<?php
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
?>
<input  style="margin-left: 50px;" type="radio" disabled="true" name='rel_completeion_type0' value="Yes" class='rel_completeion_type0' <?php if($year_extra_program_status2 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='rel_completeion_type0' value="No" class='rel_completeion_type0' <?php if($year_extra_program_status2 == 'No') { ?>checked='check'<?php } ?>>No   
<?php
}
else
{
 ?>
<input  style="margin-left: 50px;" type="radio" name='rel_completeion_type0' disabled="true" value="Yes" class='rel_completeion_type0' <?php if($year_extra_program_status2 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" name='rel_completeion_type0' disabled="true" value="No" class='rel_completeion_type0' <?php if($year_extra_program_status2 == 'No') { ?>checked='check'<?php } ?>>No   
<?php
}
?>
                                                                                                             
                                                        </div> 
                                                         <div class="col-md-2">
                                                        <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('disabled' => true,'class'=>"form-control validate_field col-md-2 rel_program_review",'id'=>'rel_program_review-0','disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
else
{
echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('class'=>"form-control validate_field col-md-2 rel_program_review",'id'=>'rel_program_review-0','disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
                                                            
                                                        ?> </div>
<div class="col-md-2">
                                                        <?php 
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ 
echo CHtml::textArea('rel_program_final_review0',$rel_program_final_review0,$htmlOptions=array('class'=>"form-control validate_field col-md-2 rel_program_final_review",'id'=>'rel_program_final_review-0','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled'=> "true"));
}
else
{
echo CHtml::textArea('rel_program_final_review0',$rel_program_final_review0,$htmlOptions=array('class'=>"form-control validate_field col-md-2 rel_program_final_review",'id'=>'rel_program_final_review-0','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
                                                            
                                                        ?> </div>
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
                                                            echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('class'=>"form-control validate_field col-md-2 faculty_email_id4",'id'=>'faculty_email_id4','disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
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
                                                                       <input style="width:80px" class="form-control target_date4" readonly="" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" disabled="true">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input style="width:80px" class="form-control target_date4" readonly="" type="text"  id="target_date4" disabled="true">
                                                                 <?php   }
                                                                ?>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div  class="col-md-2">
<?php
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
?>
 <input  style="margin-left: 50px;" type="radio" disabled="true" name='rel_completeion_type1' value="Yes" class='rel_completeion_type1' <?php if($year_extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                        <input type="radio" disabled="true" name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if($year_extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No 
<?php
}
else
{
 ?>
 <input  style="margin-left: 50px;" type="radio" <?php echo $set_flag1; ?> name='rel_completeion_type1' disabled="true" value="Yes" class='rel_completeion_type1' <?php if($year_extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                        <input type="radio" disabled="true" <?php echo $set_flag1; ?> name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if($year_extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No      
<?php
}
?>
                                                                                                         
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control validate_field rel_program_review",'id'=>'rel_program_review-1',$set_flag,'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
else
{
 echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('class'=>"form-control  validate_field rel_program_review",'id'=>'rel_program_review-1','disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
                                                           
                                                        ?> </div>
<div class="col-md-2">
                                                        <?php 
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ 
echo CHtml::textArea('rel_program_final_review1',$rel_program_final_review1,$htmlOptions=array('class'=>"form-control validate_field col-md-2 rel_program_final_review",'id'=>'rel_program_final_review-1','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom",'disabled'=> "true"));
}
else
{
echo CHtml::textArea('rel_program_final_review1',$rel_program_final_review1,$htmlOptions=array('class'=>"form-control validate_field col-md-2 rel_program_final_review",'id'=>'rel_program_final_review-1','data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom"));
}
                                                            
                                                        ?> </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec2"  style="color: red;float: right;"></lable></div>
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
                                                        echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('maxlength'=>80,'class'=>"form-control  validate_field project_title1",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?>    
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
                                                        echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('class'=>"form-control validate_field project_scope",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?> 
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
                                                        echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('class'=>"form-control validate_field project_exclusion",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?> 
                                                    </div>
                                                </div>                                                
                                                <!-- <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec3"  style="color: red;float: right;"></lable></div>
                                                    </div> -->
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                <div class="col-md-12" style="padding-left: 5px;padding-right: 5px;">
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
                                                        echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('class'=>"form-control  project_deliverables",'disabled'=> "true")); ?> 
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
                                                       echo CHtml::textArea('exp',$expected,$htmlOptions=array('class'=>"form-control  learn_from",'disabled'=> "true")); ?>  
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
                                                        echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('maxlength'=>80,'class'=>"form-control validate_field reviewvers_name",'disabled'=> "true",'data-toggle'=>"popover","data-trigger"=>"hover","data-placement"=>"bottom")); ?> 
                                                    </div>
                                                </div>
<!--                                                  <div class="form-group">
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
echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control  project_mid_review",$set_flag));
}
else
{
 echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('class'=>"form-control  project_mid_review",));
}

                                                         ?> 
                                                    </div>
                                                </div> -->
      <div class="form-group last" style="border-bottom:1px solid #efefef" style="display:none">
                                                    <label class="col-md-3 control-label bold "  style="display:none">Project Final Review by Employee</label>
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
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ 
echo CHtml::textArea('project_final_review',$project_final_review,$htmlOptions=array('disabled' => 'true','class'=>"form-control  project_final_review"));
}
else
{
 echo CHtml::textArea('project_final_review',$project_final_review,$htmlOptions=array('class'=>"form-control  project_final_review"));
}

                                                         ?> 



                                                    </div>
                                                </div>
<div class="form-group">
<label class="col-md-3 control-label bold ">Project Status</label>
<div class="col-md-2">

<select id="yearA_project_status"  class="form-control " disabled>

<option <?php  if(isset($IDP_data[0]['Year_end_prog_status'])&& $IDP_data[0]['Year_end_prog_status']== "Select"){ ?> selected<?php }?>>Select</option>
<option <?php  if(isset($IDP_data[0]['Year_end_prog_status'])&& $IDP_data[0]['Year_end_prog_status']== "Completed"){ ?> selected<?php }?>>Completed</option>
<option<?php  if(isset($IDP_data[0]['Year_end_prog_status'])&& $IDP_data[0]['Year_end_prog_status']== "Not Completed"){ ?> selected<?php }?>>Not Completed</option>
</select>
</div>
</div>   
<div class="form-group">
<label class="col-md-3 control-label bold ">Project Status Comments</label>
<div class="col-md-9">
<input type="text" class="form-control validate_field" data-toggle="popover" data-trigger="hover" data-placement="bottom" id="yearA_prj_stat_comments" <?php  if(isset($IDP_data[0]['Year_end_prog_comments'])&& $IDP_data[0]['Year_end_prog_comments']!= ""){ ?>value="<?php echo $IDP_data[0]['Year_end_prog_comments'];?> " <?php } ?> disabled>
</div>
</div>
      <div class="form-group last" style="border:1px solid #efefef">
                                                    <label class="col-md-3 control-label bold ">Project Final Review by Appraiser</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_final_review_apr = '';
                                                        if (isset($IDP_data['0']['project_final_review_apr'])) {
                                                          $project_final_review_apr = $IDP_data['0']['project_final_review_apr'];
                                                        }
                                                        else
                                                        {
                                                          $project_final_review_apr = '';
                                                        }
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{ 
echo CHtml::textArea('project_final_review_by_apr',$project_final_review_apr,$htmlOptions=array('disabled'=>'true','class'=>"form-control project_final_review_by_apr"));
}
else
{
 echo CHtml::textArea('project_final_review_by_apr',$project_final_review_apr,$htmlOptions=array('class'=>"form-control  project_final_review_by_apr"));
}

                                                         ?> 



                                                    </div>
                                                </div>
                                                <!--<div class="form-group">
                                                    <div class="col-md-12 bold"><lable id="error_spec4"  style="color: red;float: right;"></lable></div>
                                                </div>-->
<div class="form-group last" style="border:1px solid #efefef">
                                                    <label class="col-md-3 control-label bold " style="padding-top: 0px;">View Document</label>
                                                    <div class="col-md-9">
                                       <?php if(isset($IDP_data['0']['proof3']) && $IDP_data['0']['proof3'] != '') { ?>
<a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/year_end_idp_proofs/<?php echo $IDP_data['0']['proof3']; ?>' target="_blank"><?php echo CHtml::button('Open File',array('class'=>'btn yellow','style'=>' background-color:#26466D')); ?></a>
<?php } ?>
<label id='proof3' style="float:right">
                                                      </label>
 <label  class="custom-file-input file-blue file_change" id="file_change" style="width: 96px;float: right;margin-top: -8px;">
                                                        <input class='proof3' type="file"  name='proof3' style="display: none" />
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
                                   
                                </div></div></div>  </div>
<lable id="promotion_form_lable" style="display:none"><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0) { echo "1"; }else { "0"; }?></lable>
<?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0) { ?>
<div class="portlet box "  <?php if(isset($show_idp) && count($show_idp)>0 && $show_idp != ''){ ?>style="background-color:#26466D;border:1px solid #26466D;margin-top: 10px;display:block"<?php }else{ ?>style="background-color:#26466D;border:1px solid #26466D;display:none"<?php } ?>>
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Promotion Form
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
$data = array(Yii::app()->user->getState("Employee_id"),date("Y",strtotime("-1 year"))."-".date("Y"));
$employee_review_data = $model1->get_employee_data($where,$data,$list);
?>
<table class="table table-bordered table-condensed">
                                <tbody>
                                <tr style="font-weight:bold">
                                    <td  colspan="2">
                                        Note: <br>
                                        1. Please refer to the detailed guideline in the PMS handbook on promotions before filling this sheet. Promotions are given after assessing the potential of the incumbent to take on challenging roles at the next level. Thus, a promotion recommendation seeks to assess - the availability of a challenging role AND the existence of potential to meet the demands of the role. 
                                        <br>2. All questions are compulsory and will be considered by the panel before approving the promotion decision.
                                        <br>3. Potential is:
                                        Holistic view of behavior and capability to grow and take on larger or different roles;
                                        Longer-term pattern of leadership behavior; Partially measured by demonstration of behaviors in the past. Thus, potential is forward looking while performance is looking at the past.

                                    </td>
                                </tr> 
                                <tr style="font-weight:bold">
                                <td>
                                    1
                                </td>    
                                <td>
                                    Does the employee possess the potential for the next level? Please explain
                                </td>  

                                </tr>              
                                <tr>
                                <td>
                                  
                                </td>    
                                <td>
                                    <textarea   class="form-control field_1" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field1'])){ echo $emp_promotion_data['0']['field1']; }?></textarea>
                                </td>  

                                </tr>
                                <tr style="font-weight:bold">
                                <td>
                                   2
                                </td>    
                                <td>
                                    Please state the added responsibility that the employee will handle after the promotion.
                                </td>  

                                </tr> 
                                <tr>
                                <td>
                                 Manage more people 
                                </td>    
                                <td>
                                    <textarea   class="form-control field_2" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field2'])){ echo $emp_promotion_data['0']['field2']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage larger business volume
                                </td>    
                                <td>
                                    <textarea  class="form-control field_3" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field3'])){ echo $emp_promotion_data['0']['field3']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage additional projects
                                </td>    
                                <td>
                                    <textarea   class="form-control field_4" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field4'])){ echo $emp_promotion_data['0']['field4']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage new territory/ geography
                                </td>    
                                <td>
                                    <textarea   class="form-control field_5" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field5'])){ echo $emp_promotion_data['0']['field5']; }?></textarea>
                                </td>  

                                </tr> 
                                <tr style="font-weight:bold">
                                <td>
                                   3
                                </td>    
                                <td>
                                    Why do you think the employee is ready to handle the additional responsibility?
                                </td>  

                                </tr>              
                                <tr>
                                <td>
                                  
                                </td>    
                                <td>
                                    <textarea   class="form-control field_6 " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data['0']['field6'])){ echo $emp_promotion_data['0']['field6']; }?></textarea>
                                </td>  

                                </tr>
                                <tr style="font-weight:bold">
                                <td>
                                   4
                                </td>    
                                <td>
                                    Please give your comments on why role change and role enhancement cannot be offered instead of a promotion.
                                </td>  

                                </tr> 
                                <tr>
                                <td>
                                 Role Change 
                                </td>    
                                <td>
                                    <textarea  class="form-control field_7" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field7'])){ echo $emp_promotion_data['0']['field7']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Role Enhancement
                                </td>    
                                <td>
                                    <textarea  class="form-control field_8" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field8'])){ echo $emp_promotion_data['0']['field8']; }?></textarea>
                                </td> 
                                </tr>
                               <!-- <tr>
                                
                                <td>Other comments11</td>
                                  <td>
                                    <textarea   class="form-control field_9" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field9'])){ echo $emp_promotion_data['0']['field9']; }?></textarea>
                                </td> 
                                </tr>-->
                               
                                </tbody>
                                </table>
                 <?php }else { ?>
<div class="alert alert-info"  style="margin-top: 10px;width: 99%;">
  Midyear Review For IDP & goalsheet not updated.
</div>
<?php } ?>
                                   
                                </div></div></div>  </div>
<?php } ?>
<!-- <div class="portlet box "  style="background-color:#26466D;border:1px solid #26466D">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Career Planing
                                           </div>
                                           <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                    </div>                                    
                                    <div  class="portlet-body tabs-below">
                                        <div class="tab-content">
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                    <div style="border: 1px solid rgb(76, 135, 185);margin-top: 20px;padding-left: 10px;">
                                    <?php

if (isset($IDP_data) && count($IDP_data)>0)
{ 
$model1=new Yearend_reviewbForm;    
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
$list = array('Employee_id','goal_set_year');
$data = array(Yii::app()->user->getState("Employee_id"),'2016-2017');
$employee_review_data = $model1->get_employee_data($where,$data,$list);

?>


<?php 
    $form=$this->beginWidget('CActiveForm', array(
   'id'=>'user-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
    //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
));
?>

                <table class="table  table-condensed "><label id='min_kra' style="display: none"><?php if(isset($emp_kra_data) and count($emp_kra_data)>0){ echo count($emp_kra_data); }?></label>
                <thead>
                    <tr>
                        <th colspan="3">
                                SECTION 4 :Manager comments on part B
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  class=" bold bg" colspan="3">
                            Year-End Review (Part B) - To be filled by appraiser
                        </td>
                                                
                    </tr>
                    <tr >
                        <td class="color" colspan="3">
                            Each field carries 25 points. Please refer Part B filled by the employee and give your score and responses on the qualitative aspects of performance. This sheet will be used by the normalization panel to differentiate between equally good performers and the manager will be called upon to substantiate the comments made in this sheet.
                            
                        </td>
                    </tr>
                        
                    <tr>
                        <td  class=" bold bg" >
                            Sr. No
                        </td>
                        <td  class=" bold bg" >
                            Score on 25
                        </td>
                        <td  class=" bold bg" >
                           Rationale (Please comment with data w.r.t. employee responses above your reasons for giving the particular score on a scale of 20)
                        </td>
                       
                         <?php
                         if (isset($kpi_data) && count($kpi_data)>0) {
                            //print_r($kpi_data);die();
                            ?>
                            <label id="emp_id_value" style="display: none"><?php echo $kpi_data['0']['Employee_id']; ?></label><label id="apr_id" style="display: none">
                            <?php
                             for ($i=0; $i < count($kpi_data); $i++) { ?>
                        <tr>
                            <td ><?php echo $i; ?></td>
                            <td>
                                <?php
                                if (isset($normalize_data) && count($normalize_data)>0) {
                                    //print_r($normalize_data['0']['KRA_score']);die();
                                   $score = explode(';',$normalize_data['0']['KRA_score']);$total_value = '';
                                   for ($k=0; $k < count($score); $k++) { 
                                      if ($total_value == '') {
                                         $total_value = $score[$k];
                                      }
                                      else
                                      {
                                        $total_value = $total_value+$score[$k];
                                      }
                                   }
                                    echo CHtml::textField('score'.$i,$score[$i],array('class'=>'form-control score','id'=>'score'.$i,'style'=>'text-align: center','placeholder'=>'score'));
                                }
                                else
                                {
                                    $score = '';
                                     echo CHtml::textField('score'.$i,$score,array('class'=>'form-control score','id'=>'score'.$i,'style'=>'text-align: center','placeholder'=>'score'));
                                }
                                echo CHtml::textField('kra_id'.$i,'',array('class'=>'form-control','id'=>'kra_id'.$i,'style'=>'text-align: center;display:none','placeholder'=>'score'));

                                ?>
                            </td>
                            <td>
                                <?php                                
                                if (isset($normalize_data) && count($normalize_data)>0) {
                                   $Score_comment = explode(';',$normalize_data['0']['Score_comment']);
                                    echo CHtml::textField('comment'.$i,$Score_comment[$i],array('class'=>'form-control','id'=>'comment'.$i,'style'=>'text-align: center','placeholder'=>'comment'));
                                }
                                else
                                {
                                    $Score_comment = '';
                                     echo CHtml::textField('comment'.$i,$Score_comment,array('class'=>'form-control','id'=>'comment'.$i,'style'=>'text-align: center','placeholder'=>'comment'));
                                }
                                   // echo CHtml::textField('comment'.$i,'',array('class'=>'form-control','id'=>'comment'.$i,'style'=>'text-align: center','placeholder'=>'comment'));
                                ?>
                            </td>
                        </tr>
                        <?php    }
                         }                            
                         ?> 
                    <tr>
                        <td class="bold">
                            TOTAL
                        </td>
                        <td><span class="bold" id="sum"><?php if(isset($total_value) && $total_value>0) { echo $total_value; }else{ echo 0;}?></span></td>
                    </tr>
                    <tr >
                        <td class="bold">
                            PERFORMANCE RATING 
                        </td>
                        <td><label id="performance_rating"><?php if(isset($apr_end_rating)) { echo $apr_end_rating; }?></label></td>
                    </tr>
                    <tr>
                        <td class="bold" colspan='2'>
                            Career Planning
                        </td>
                        <td>
                            <div class="col-md-7" style="float: right;">
                                <?php
                                $cluster_name_models = new ClusterForm();
                                         $records = $cluster_name_models->get_list('cluster_name');
                                         $promotion_category = '';
                                         if (isset($normalize_data['0']['career_planning'])) {
                                             $promotion_category[$normalize_data['0']['career_planning']] = array('selected' => 'selected');
                                         }
                                         else
                                         {
                                            $promotion_category['No change'] = array('selected' => 'selected');
                                         }
                                        
                                        $list = array('No change' => 'No change','Role change' => 'Role change','Enhance current role' => 'Enhance current role','Promotion' => 'Promotion');                                        
                                        echo CHtml::activeDropDownList($cluster_name_models,'cluster_name',$list,array('class'=>'form-control promotion','style'=>'width: 204px','options' => $promotion_category));
                            ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
    

 <?php $this->endWidget(); ?>
                    </div>
                </div>
               
            </div>
   
        </div>







                 <?php }else { ?>
<div class="alert alert-info"  style="margin-top: 10px;width: 99%;">
  Midyear Review For IDP & goalsheet not updated.
</div>

                                   
                                </div></div></div>  </div>
<?php } ?>
 -->
<div class="modal fade" id="promo_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                             
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Alert
                            </h4>
                        </div>
                        <div class="modal-body">
                            Do you really want to delete this promotion form?
                        </div>
                        <div class="modal-footer">
                             
                            <button type="button" class="btn btn-default" id="do_not_delete">
                                Close
                            </button> 
                            <button type="button" class="btn btn-primary" id="do_delete">
                                OK
                            </button>
                        </div>
                    </div>
                    
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
                                    <p> Are you sure you want to approve year end review of this employee? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
 <div id="promotion" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" style="width: 55%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Promotion Form<lable id="error_text" style="color:red;margin-right: 68px;float:right"></lable></h4>
                                </div>
                                <div class="modal-body">
                                       <label id="emp_id" style="display: none;"><?php if(isset($emp_data) && $emp_data !='' && count($emp_data)>0) { echo $emp_data['0']['Employee_id']; }?></label>
                                <table class="table table-bordered table-condensed">
                                <tbody>
                                <tr style="font-weight:bold">
                                    <td  colspan="2">
                                        Note: <br>
                                        1. Please refer to the detailed guideline in the PMS handbook on promotions before filling this sheet. Promotions are given after assessing the potential of the incumbent to take on challenging roles at the next level. Thus, a promotion recommendation seeks to assess - the availability of a challenging role AND the existence of potential to meet the demands of the role. 
                                        <br>2. All questions are compulsory and will be considered by the panel before approving the promotion decision.
                                        <br>3. Potential is:
                                        Holistic view of behavior and capability to grow and take on larger or different roles;
                                        Longer-term pattern of leadership behavior; Partially measured by demonstration of behaviors in the past. Thus, potential is forward looking while performance is looking at the past.

                                    </td>
                                </tr> 
                                <tr style="font-weight:bold">
                                <td>
                                    1
                                </td>    
                                <td>
                                    Does the employee possess the potential for the next level? Please explain
                                </td>  

                                </tr>              
                                <tr>
                                <td>
                                  
                                </td>    
                                <td>
                                    <textarea id="field_1"  class="form-control" maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field1'])){ echo $emp_promotion_data['0']['field1']; }?></textarea>
                                </td>  

                                </tr>
                                <tr style="font-weight:bold">
                                <td>
                                   2
                                </td>    
                                <td>
                                    Please state the added responsibility that the employee will handle after the promotion.
                                </td>  

                                </tr> 
                                <tr>
                                <td>
                                 Manage more people 
                                </td>    
                                <td>
                                    <textarea id="field_2"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field2'])){ echo $emp_promotion_data['0']['field2']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage larger business volume
                                </td>    
                                <td>
                                    <textarea id="field_3"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field3'])){ echo $emp_promotion_data['0']['field3']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage additional projects
                                </td>    
                                <td>
                                    <textarea id="field_4"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field4'])){ echo $emp_promotion_data['0']['field4']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage new territory/ geography
                                </td>    
                                <td>
                                    <textarea id="field_5"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field5'])){ echo $emp_promotion_data['0']['field5']; }?></textarea>
                                </td>  

                                </tr> 
                                <tr style="font-weight:bold">
                                <td>
                                   3
                                </td>    
                                <td>
                                    Why do you think the employee is ready to handle the additional responsibility?
                                </td>  

                                </tr>              
                                <tr>
                                <td>
                                  
                                </td>    
                                <td>
                                    <textarea id="field_6"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data['0']['field6'])){ echo $emp_promotion_data['0']['field6']; }?></textarea>
                                </td>  

                                </tr>
                                <tr style="font-weight:bold">
                                <td>
                                   4
                                </td>    
                                <td>
                                    Please give your comments on why role change and role enhancement cannot be offered instead of a promotion.
                                </td>  

                                </tr> 
                                <tr>
                                <td>
                                 Role Change 
                                </td>    
                                <td>
                                    <textarea id="field_7"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field7'])){ echo $emp_promotion_data['0']['field7']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Role Enhancement
                                </td>    
                                <td>
                                    <textarea id="field_8"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field8'])){ echo $emp_promotion_data['0']['field8']; }?></textarea>
                                </td> 
                                </tr>
                                 
                                </tbody>
                                </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="promotion_form_submit">Save</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>











                           
                            <div class="portlet box " <?php if(isset($show_idp) && count($show_idp)>0 && $show_idp != ''){ ?>style="background-color:#26466D;border:1px solid #26466D;display:block"<?php }else{ ?>style="background-color:#26466D;border:1px solid #26466D;display:none"<?php } ?> >
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Career Planning
                                           </div>
                                           <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                    </div>                                    
                                    <div  class="portlet-body tabs-below">
                                        <div class="tab-content">
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                    <div style="border: 1px solid #26466D;margin-top: 20px;padding-left: 10px;padding-right:10px;padding-top:10px">
                                    <?php

if (isset($IDP_data) && count($IDP_data)>0)
{ 
    //print_r($IDP_data);die();
$model1=new Yearend_reviewbForm;    
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
$list = array('Employee_id','goal_set_year');
$data = array($IDP_data['0']['Employee_id'],date("Y",strtotime("-1 year"))."-".date("Y"));
$employee_review_data = $model1->get_employee_data($where,$data,$list);
?>
 <table class="table table-fixed table-bordered">
<thead>
<tr>
<th colspan="2" style="background-color: #26466d;color: #fff;">Career Movement  Description</th>
</tr>
<tr>
<td>Status Quo</td>
<td>No change recommended</td>
</tr>
<tr>
<td>Role enhancement</td>
<td>Greater responsibilities are allotted in same role</td>
</tr>
<tr>
<td>Job rotation</td>
<td>Move to another role in same function for a short duration</td>
</tr>
<tr>
<td>Role change</td>
<td>Move to another role within the function or to another function</td>
</tr><tr>
<td>Promotion</td>
<td>Vertical movement to a higher grade and enhanced role.</td>
</tr>

</thead>

</table>

                                      <table class="table table-fixed table-bordered">
               
                <tbody>
                    

                    



  <tr>
                    <td class="bold col-md-3">
                       Career Planning
                    </td>
                    <td>
                         <?php
$career_plan = '';
//print_r($IDP_data);die();
if (isset($IDP_data['0']['career_plan']) && $IDP_data['0']['career_plan'] != '') 
{
$career_plan[$IDP_data['0']['career_plan']] = array('selected' => 'selected');
}
 $list = array('No change' => 'No change','Enhance current role' => 'Enhance current role','Job rotation'=>'Job rotation','Role change' => 'Role change','Promotion' => 'Promotion'); 
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
 echo CHtml::dropDownList("career_plan",'',$list,$htmlOptions=array('class'=>"form-control career_plan",'style'=>"width: 186px;",'options' => $career_plan,'disabled'=>'true'));
}
else
{
 echo CHtml::dropDownList("career_plan",'',$list,$htmlOptions=array('class'=>"form-control career_plan",'style'=>"width: 186px;",'options' => $career_plan));
}                                       
                                      
                         ?>
<div id="promo_text"></div>
                    </td>
                    </tr>
  <tr >
                    <td class="bold">
                       Description For Career Planning
                    </td>
                    <td>
                         <?php
$career_plan_desc = '';
if (isset($IDP_data['0']['career_plan_desc']) && $IDP_data['0']['career_plan_desc'] != '') 
{
$career_plan_desc = $IDP_data['0']['career_plan_desc'];
}
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
 echo CHtml::textArea('career_plan_desc',$career_plan_desc,array('class'=>'form-control','id'=>'career_plan_desc','disabled'=>'true'));
}
else
{
 echo CHtml::textArea('career_plan_desc',$career_plan_desc,array('class'=>'form-control','id'=>'career_plan_desc'));
}

                         ?>
                    </td>
                    </tr>

                <tr>
                                <td class="bold">Other comments</td>
                                  <td>
<?php
if(isset($settings_data_new['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($settings_data_new['0']['setting_type']))
{
?>
<textarea id="other_comment"  class="form-control " maxlength="1000" name="employee_review1" disabled="true"  required><?php if(isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['other_comment'])){ echo $IDP_data['0']['other_comment']; }?></textarea>
<?php
}
else
{
?>
<textarea id="other_comment"  class="form-control " maxlength="1000" name="employee_review1"  required><?php if(isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['other_comment'])){ echo $IDP_data['0']['other_comment']; }?></textarea>
<?php
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











<?php
$where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('dis_active-date',date('Y'));             
        //$settings_data_new = $setting_date->get_setting_data($where,$data,$list); 

?>
<input name="term_condition1" type="checkbox" value="term_condition1"  id="term_condition1"/><lable  style="color: red;" id="blink_me1"> I confirm that the rating given has not been discussed with <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?>
 </lable>
<br/>

<input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/><lable id="blink_me" style="color: red;"> I have conducted the year end review of  <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?> on <?php echo  date("d-m-Y");?>
 </lable>
<lable id="kra_id_list" style="display:none"><?php echo $kra_id_list; ?></lable>
                  
 
                                        <?php echo CHtml::button('Approve',array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>$kpi_data['0']['Employee_id'],'onclick'=>'js:send_notification();')); ?>
                                        <button id="temp_save" style="margin-right: 63px;padding-top: 5px;padding-bottom: 7px;background-color: #000;color: #fff;border: 1px solid #26466d;float: right;" onClick='js:get_save_emp()'>Temporary Save</button>
                                


                    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                    <script type="text/javascript">
                    $(function(){

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
                        $(function(){
$("body").on('click','.career_plan',function(){
var base_url = window.location.origin;
var data = {
emp_id : $("#emp_id_value1").text()
};
                                    $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+'/pms/index.php/Year_endreview1/get_promo_form',
                                    success : function(data)
                                    {
                                       $("#promo_text").html(data);
                                    }
                                    });
});
$("body").on('click','#del_this',function(){
$("#promo_modal").modal('show');
$("body").on('click','#do_delete',function(){
var base_url = window.location.origin;
var data = {
emp_id : $("#emp_id_value1").text()
};
                                    $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+'/pms/index.php/Year_endreview1/del_promo_form',
                                    success : function(data)
                                    {
                                       if (data == 'success') 
                                       {   
                                            $("#error_text").text("Successfully Deleted");
                                            $("#error_text").css("color","green");
$("#promo_modal").modal('hide');
                                       }
                                    }
                                    });
});
});

$("body").on('change','.career_plan',function(){
var base_url = window.location.origin;
var data = {
emp_id : $("#emp_id_value1").text()
};
                                    $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+'/pms/index.php/Year_endreview1/get_promo_form',
                                    success : function(data)
                                    {
                                       $("#promo_text").html(data);
                                    }
                                    });

$("body").on('click','#do_not_delete',function(){
$("#promo_modal").modal('hide');
});
if($("#promo_text").html() != '' && $(".career_plan").find(':selected').val() != 'Promotion')
{
$("#promo_modal").modal('show');
$("body").on('click','#do_delete',function(){
$("#promo_modal").modal('hide');
var base_url = window.location.origin;
var data = {
emp_id : $("#emp_id_value1").text()
};
                                    $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+'/pms/index.php/Year_endreview1/del_promo_form',
                                    success : function(data)
                                    {$("#promo_text").html(""); 
                                       if (data == 'success') 
                                       {  
$("#promo_text").html(""); 
                                            $("#error_text").text("Successfully Deleted");
                                            $("#error_text").css("color","green");
$("#promo_modal").modal('hide');
                                       }
                                    }
                                    });
});
}

if($(".career_plan").find(':selected').val() == 'Promotion')
{
jQuery("#promotion").modal('show');$(".career_desc").css('display','none');
}
if($(".career_plan").find(':selected').val() != 'Promotion')
{
$(".career_desc").css('display','table-row');
}
});
                            var str_chk = /^[1-5]\d*$/;var str_chk1 = /^(1[0-9]|2[0-5])\d*$/;
                            $("body").on('click','.send_for_appraisal',function(){
                              
                                $("#err").removeClass("alert-success"); 
                                $("#err").removeClass("alert-danger"); 


var str_chk = /^[1-5]\d*$/;var str_chk1 = /^(0?[1-9]|1[0-9]|2[0-5])*$/;
var appr_comments_yearB1=$('#appr_comments_yearB1').val();
var appr_comments_yearB2=$('#appr_comments_yearB2').val();
var appr_comments_yearB3=$('#appr_comments_yearB3').val();
var appr_comments_yearB4=$('#appr_comments_yearB4').val();
var yearB_rate1=$('#yearB_rate1').val();
var yearB_rate2=$('#yearB_rate2').val();
var yearB_rate3=$('#yearB_rate3').val();
var yearB_rate4=$('#yearB_rate4').val();

// alert(isNaN(yearB_rate1));

var extra_progrm_count = $("#extra_program_count").text();
var id_list = $('#kra_id_list').text();
var individual_id_list = id_list.split(';');
var avg_kra_rating = 0;

var l=0;var error1 = '';var error2 = '';var error3 = '';
//alert(individual_id_list.length);
                               
for(var j = 0; j < individual_id_list.length; j++)
                                { 
                                    var id = individual_id_list[j];
                                    var kpi_total = $("#kpi_count_list-"+id).text(); $('#appraiser_comment-'+i+id).css('border','2px solid grey');
                                     for (var i = 0; i < kpi_total; i++) {
                                        if ($('#appraiser_comment-'+i+id).val() === undefined || $('#appraiser_comment-'+i+id).val() == '') 
                                          {
                                              error = "Please enter appraiser comment on actual achievement.";
                                              error1 = "error";
                                              $('#appraiser_comment-'+i+id).css('border','2px solid red');
                                              $('#appraiser_comment-'+i+id).focus();
                                          }  
                                          else  if(($('#appraiser_comment-'+i+id).val().length>1000 || $('#appraiser_comment-'+i+id).val().length<10)){
                                        
                                            error = "Maximum 1000 and minimum 10 charaters are allowed to write comment for KPI "; 
                                            error1 = "error";
                                            $('#appraiser_comment-'+i+id).css('border','2px solid red');
                                             $('#appraiser_comment-'+i+id).focus();break;
                                         }
                                         else if(!str_chk.test($('#appraiser_raiting-'+i+'-'+id).val()))
                                          {
                                            error = "Please enter appraiser rating without decimals.";
                                            error1 = "error";
                                            $('#appraiser_comment-'+i+id).css('border','2px solid grey');
                                            $('#appraiser_raiting-'+i+'-'+id).css('border','2px solid red');
                                           $('#appraiser_raiting-'+i+'-'+id).focus();
                                          }
                                          else if ($('#appraiser_raiting-'+i+'-'+id).val()>5) 
                                          {
                                              error = "Maximum 5 rating allowed for each kpi."; 
                                              error1 = "error";
                                              $('#appraiser_comment-'+i+id).css('border','2px solid grey');
                                              $('#appraiser_raiting-'+i+'-'+id).css('border','2px solid red');
                                               $('#appraiser_raiting-'+i+'-'+id).focus();
                                          }
                                          else
                                          {
                                            error1 = "";error = "";
                                            $('#appraiser_comment-'+i+id).css('border','2px solid grey');
                                            $('#appraiser_raiting-'+i+'-'+id).css('border','2px solid grey');
                                          }
if(error != '')
{
//alert(error);
$("#err").show();  
                                    //$("#err").fadeOut(6000);
                                    $("#err").text(error);
                                    $("#err").addClass("alert-danger");
break;
}
                                     }
if(error != '')
{
//alert(error);
$("#err").show();  
                                    //$("#err").fadeOut(6000);
                                    $("#err").text(error);
                                    $("#err").addClass("alert-danger");
break;
}
 
}
if(error1 != '')
{
$("#err").show();  
                                    //$("#err").fadeOut(6000);
                                    $("#err").text(error);
                                    $("#err").addClass("alert-danger");brak;
}
else
{
if($('#appr_comments_yearB1').val()=="" && $("#apr_chk").text() ==""){
            $('#appr_comments_yearB1').css('border','2px solid red');
            $('#appr_comments_yearB1').focus();
            error="Please comment for example 1";
error2="error";
        }
else if($('#appr_comments_yearB1').val().length >1000 || $('#appr_comments_yearB1').val().length < 10 && $("#apr_chk").text() ==""){
            $('#appr_comments_yearB1').css('border','2px solid red');
            $('#appr_comments_yearB1').focus();
            error="Minimum 10, maximum 1000 characters are allowed";
error2="error";
        }
        else if($('#appr_comments_yearB2').val()=="" && $("#apr_chk").text() =="" && $("#apr_chk").text() ==""){
$('#appr_comments_yearB1').css('border','2px solid grey');
            $('#appr_comments_yearB2').css('border','2px solid red');
            $('#appr_comments_yearB2').focus();
            error="Please comment for example 2";
error2="error";
        }
else if($('#appr_comments_yearB2').val().length >1000 || $('#appr_comments_yearB2').val().length < 10 && $("#apr_chk").text() ==""){
           $('#appr_comments_yearB1').css('border','2px solid grey');
            $('#appr_comments_yearB2').css('border','2px solid red');
            $('#appr_comments_yearB2').focus();
            error="Minimum 10, maximum 1000 characters are allowed";
error2="error";
        }

else if($('#appr_comments_yearB3').val()=="" && $("#apr_chk").text() =="" && $("#apr_chk").text() ==""){
 $('#appr_comments_yearB2').css('border','2px solid grey');
            $('#appr_comments_yearB3').css('border','2px solid red');
            $('#appr_comments_yearB3').focus();
            error="Please comment for example 3";
error2="error";
        }
else if($('#appr_comments_yearB3').val().length >1000 || $('#appr_comments_yearB3').val().length < 10 && $("#apr_chk").text() ==""){
           $('#appr_comments_yearB2').css('border','2px solid grey');
            $('#appr_comments_yearB3').css('border','2px solid red');
            $('#appr_comments_yearB3').focus();
            error="Minimum 10, maximum 1000 characters are allowed";
error2="error";
        }

else if($('#appr_comments_yearB4').val()=="" && $("#apr_chk").text() ==""){
$('#appr_comments_yearB3').css('border','2px solid grey');
            $('#appr_comments_yearB4').css('border','2px solid red');
            $('#appr_comments_yearB4').focus();
            error="Please comment for example 4";
error2="error";
        }
else if($('#appr_comments_yearB4').val().length >1000 || $('#appr_comments_yearB4').val().length < 10 && $("#apr_chk").text() ==""){
           $('#appr_comments_yearB3').css('border','2px solid grey');
            $('#appr_comments_yearB4').css('border','2px solid red');
            $('#appr_comments_yearB4').focus();
            error="Minimum 10, maximum 1000 characters are allowed";
error2="error";
        }
 else if(($('#yearB_rate1').val() == 0 || !str_chk1.test($('#yearB_rate1').val())) && $("#apr_chk").text() ==""){
            $('#yearB_rate1').css('border','2px solid red');
$('#appr_comments_yearB4').css('border','2px solid grey');
            $('#yearB_rate1').focus();
            error="Please give rating between 1-25 for example 1";
error2="error";
        }
else if(($('#yearB_rate2').val() == 0 || !str_chk1.test($('#yearB_rate2').val())) && $("#apr_chk").text() ==""){
$('#yearB_rate1').css('border','2px solid grey');
            $('#yearB_rate2').css('border','2px solid red');
            $('#yearB_rate2').focus();
            error="Please give rating between 1-25 for example 2";
error2="error";
        } 
else if(($('#yearB_rate3').val()==0 || !str_chk1.test($('#yearB_rate3').val())) && $("#apr_chk").text() ==""){
//alert(yearB_rate3);
$('#yearB_rate2').css('border','2px solid grey');
            $('#yearB_rate3').css('border','2px solid red');
            $('#yearB_rate3').focus();
           error="Please give rating between 1-25 for example 3";
error2="error";
        }    
else if(($('#yearB_rate4').val()==0 || !str_chk1.test($('#yearB_rate4').val())) && $("#apr_chk").text() ==""){
$('#yearB_rate3').css('border','2px solid grey');
            $('#yearB_rate4').css('border','2px solid red');
            $('#yearB_rate4').focus();
            error="Please give rating between 1-25 for example 4";
error2="error";
        }    
     else if($('#project_final_review_by_apr').val()=="" && $("#apr_chk").text() ==""){
$('#yearB_rate4').css('border','2px solid grey');
 $('#yearB_rate3').css('border','2px solid grey');
            $('#project_final_review_by_apr').css('border','2px solid red');
            $('#project_final_review_by_apr').focus();
            error="Please give comment for final project status";
error2="error";
        }
else if(($('#project_final_review_by_apr').val().length <10 || $('#project_final_review_by_apr').val().length>1000)  && $("#apr_chk").text() ==""){
    error = "Please enter minimum 10, maximum 1000 characters.";
    error2 = "error";
    $('#project_final_review_by_apr').css('border','2px solid red');
    $('#project_final_review_by_apr').focus();
}
else
{
error2="";error='';
}
}
if(error2 != '')
{
$("#err").show();  
                                    //$("#err").fadeOut(6000);
                                    $("#err").text(error);
                                    $("#err").addClass("alert-danger");
}
else
{
$(".career_plan").css('border','1px solid grey');
$('#yearB_rate1').css('border','2px solid grey');
$('#yearB_rate2').css('border','2px solid grey');
$('#yearB_rate3').css('border','2px solid grey');
$('#yearB_rate4').css('border','2px solid grey');
$('#appr_comments_yearB1').css('border','2px solid grey');
$('#appr_comments_yearB2').css('border','2px solid grey');
$('#appr_comments_yearB3').css('border','2px solid grey');
$('#appr_comments_yearB4').css('border','2px solid grey');
$('#project_final_review_by_apr').css('border','2px solid grey');
for(var i = 0; i < $("#total_prog").text(); i++)
                             {
                                    //alert($("#"+i).text());
                                    if($("#"+i).text()!=""  && $("#program_final_review-"+i).val()=="" && ($("#apr_chk").text() =="" || $("#apr_chk").text() =="0")){

                                            error="Please enter comments for program"; error3="error";
                                            $("#program_final_review-"+i).css('border','2px solid red');
                                            $("#program_final_review-"+i).focus();break;
                                    }
                                    else if($("#"+i).text()!="" && ($("#program_final_review-"+i).val().length <10 || $("#program_final_review-"+i).val().length >1000) && $("#apr_chk").text() ==""){
                                        error="Please enter minimum 10, maximum 1000 characters";error3="error";
                                            $("#program_final_review-"+i).css('border','2px solid red');
                                            $("#program_final_review-"+i).focus();break;
                                    }
                                    else{
                                         error=""; error3="";
                                        $("#program_final_review-"+i).css('border','2px solid #c2cad8');
                                    }
                             }

}
if(error3 != '')
{
}
else
{
//alert($("#ext_program_count").text());
var ext_list = $("#ext_program_count").text();
var ext_list_data = ext_list.split(';');
for (var i = 0; i < ext_list_data.length; i++) {
if((($("#topic"+i).val() !='' || $("#topic"+i).val() !='undefined') && $("#extra_program_final_review-"+ext_list_data[i]).val()===undefined || $("#extra_program_final_review-"+ext_list_data[i]).val() == "") && ($("#apr_chk").text() =="" || $("#apr_chk").text() =="0"))
{
error = "Please enter extra program review";
    error3 = "error";
    $("#extra_program_final_review-"+ext_list_data[i]).css('border','2px solid red');
    $("#extra_program_final_review-"+ext_list_data[i]).focus();break;
}
else if((($("#topic"+i).val() !='' || $("#topic"+i).val() !='undefined') && $("#extra_program_final_review-"+ext_list_data[i]).val().length <10 || $("#extra_program_final_review-"+ext_list_data[i]).val().length>1000) && $("#apr_chk").text() ==""){
    error = "Please enter minimum 10, maximum 1000 characters.";
    error3 = "error";
    $("#extra_program_final_review-"+ext_list_data[i]).css('border','2px solid red');
    $("#extra_program_final_review-"+ext_list_data[i]).focus();break;
}
else
{
 $("#extra_program_final_review-"+ext_list_data[i]).css('border','2px solid grey');
}
}
}
if(error3 != '')
{
}
else
{
for (var i = 0; i < 2; i++) {
if($("#rel_program_final_review-"+i).val()===undefined || $("#rel_program_final_review-"+i).val()=="" && ($("#apr_chk").text() =="" || $("#apr_chk").text() =="0"))
{
error = "Please enter relational program review";
    error3 = "error";
    $("#rel_program_final_review-"+i).css('border','2px solid red');
    $("#rel_program_final_review-"+i).focus();break;
}
else if(($("#rel_program_final_review-"+i).val().length <10 || $("#rel_program_final_review-"+i).val().length>1000) && $("#apr_chk").text() ==""){
    error = "Please enter minimum 10, maximum 1000 characters.";
    error3 = "error";
    $("#rel_program_final_review-"+i).css('border','2px solid red');
    $("#rel_program_final_review-"+i).focus();break;
}
else
{
$("#rel_program_final_review-"+i).css('border','2px solid grey');
}
}
}

if(error3 != '')
{
  //alert("hiiiii");
}
else
{
 var field1 = $("#field_1").val();
        var field2 = $("#field_2").val();
        var field3 = $("#field_3").val();
        var field4 = $("#field_4").val();
        var field5 = $("#field_5").val();
        var field6 = $("#field_6").val();
        var field7 = $("#field_7").val();
        var field8 = $("#field_8").val();
if($(".career_plan").find(':selected').val() == 'Select' && ($("#apr_chk").text() =="" || $("#apr_chk").text() =="0"))
        {

    $('#project_final_review_by_apr').css('border','2px solid grey');
    error = 'Please Select Career plan';
    error3="error";
    $(".career_plan").focus();
   $(".career_plan").css('border','1px solid red');
          
  }
  else if($(".career_plan").find(':selected').val() == 'Promotion' && $("#apr_chk").text() =="")
  {
    if(field1.length<10 || field1.length>1000)
   {

    error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_1").css('border','2px solid red');
    $("#field_1").focus();
   }
 else if(field2.length<10 || field2.length>1000 && $("#apr_chk").text() =="")
{
error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_2").css('border','2px solid red');
    $("#field_1").css('border','2px solid grey');
    $("#field_2").focus();
}
else if(field3.length<10 || field3.length>1000 && $("#apr_chk").text() =="")
{
error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_3").css('border','2px solid red');
    $("#field_2").css('border','2px solid grey');
    $("#field_3").focus();
}
else if(field4.length<10 || field4.length>1000 && $("#apr_chk").text() =="")
{
error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_4").css('border','2px solid red');
    $("#field_3").css('border','2px solid grey');
    $("#field_4").focus();
}
else if(field5.length<10 || field5.length>1000 && $("#apr_chk").text() =="")
{
error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_5").css('border','2px solid red');
    $("#field_4").css('border','2px solid grey');
    $("#field_5").focus();
}
else if(field6.length<10 || field6.length>1000 && $("#apr_chk").text() =="")
{
error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_6").css('border','2px solid red');
    $("#field_5").css('border','2px solid grey');
    $("#field_6").focus();
}
else if(field7.length<10 || field7.length>1000 && $("#apr_chk").text() =="")
{
error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_7").css('border','2px solid red');
    $("#field_6").css('border','2px solid grey');
    $("#field_7").focus();
}
else if(field8.length<10 || field8.length>1000 && $("#apr_chk").text() =="")
{
error = "Please fill all the fields of promotion form";
    error3 = "error";
    $("#field_8").css('border','2px solid red');
    $("#field_7").css('border','2px solid grey');
    $("#field_8").focus();
}


else
{

error = "";
    error3 = "";
}
}
else if($("#career_plan_desc").val()=="" && $("#apr_chk").text() ==""){
    error = "Please fill career description field";
    error3 = "error";
    $("#career_plan_desc").css('border','2px solid red');
    //$("#career_plan_desc").css('border','2px solid grey');
    $("#career_plan_desc").focus();

}
else if(($("#career_plan_desc").val().length > 1000 || $("#career_plan_desc").val().length < 10) && $("#apr_chk").text() ==""){
    error = "Minimum 10 and maximum 1000 characters are allowed";
    error3 = "error";
    $("#career_plan_desc").css('border','2px solid red');
    //$("#career_plan_desc").css('border','2px solid grey');
    $("#career_plan_desc").focus();

}
else
{
error = "";
    error3 = "";
$("#field_1").css('border','2px solid grey');
$("#field_2").css('border','2px solid grey');
$("#field_3").css('border','2px solid grey');
$("#field_4").css('border','2px solid grey');
$("#field_5").css('border','2px solid grey');
$("#field_6").css('border','2px solid grey');
$("#field_7").css('border','2px solid grey');
$("#field_8").css('border','2px solid grey');
$("#field_9").css('border','2px solid grey');
}

}

//alert(error1);
if(error3 != '')
{

$("#err").show();  
                                    //$("#err").fadeOut(6000);
                                    $("#err").text(error);
                                    $("#err").addClass("alert-danger");
}
else if(error1 == '' && error2 == '' && error3 == '')
{
$("#err").css('display','none');  
if($("#term_condition1:checked").val() != 'term_condition1')
                                            {
                                                //jQuery("#agree_box").modal('show');
                                                $("#blink_me1").addClass('blink_me');
                                            }  
        else if($("#term_condition:checked").val() != 'term_condition')
                                            {
                                                //jQuery("#agree_box").modal('show');
                                                $("#blink_me").addClass('blink_me');
                                            }
else
{

var prg_final_review_by_apr = ''; var rel_program_final_review_by_apr="";var extra_prg_final_review_by_apr = '';var rel_program_final_review_by_apr = '';var kpi_id_list = '';var apr_comment = '';var apr_kpi_rating = '';
var prg_final_review_by_apr1 = ''; var rel_program_final_review_by_apr1="";var extra_prg_final_review_by_apr1 = '';var apr_comment1 = '';var apr_kpi_rating1 = '';var sum_score = '';

for(var j = 0; j < individual_id_list.length; j++)
{ 

var id = individual_id_list[j];
if(kpi_id_list == "")
{
kpi_id_list = id;
}
else
{
kpi_id_list = kpi_id_list+';'+id;
}
var kpi_total = $("#kpi_count_list-"+id).text();
var apr_comment=""; var apr_kpi_rating="";
for (var i = 0; i < kpi_total; i++) 
{

if (apr_comment == '') 
                                                {
                                                    apr_comment = $('#appraiser_comment-'+i+id).val();
                                                }
                                                else
                                                {
                                                    apr_comment = apr_comment+';'+$('#appraiser_comment-'+i+id).val();
                                                }

                                                if (apr_kpi_rating == '') 
                                                {
                                                    apr_kpi_rating = $('#appraiser_raiting-'+i+'-'+id).val();
                                                }
                                                else
                                                {
                                                    apr_kpi_rating = apr_kpi_rating+';'+$('#appraiser_raiting-'+i+'-'+id).val();
                                                }
}
if (apr_comment1 == '') 
                                                {
                                                    apr_comment1 = apr_comment;
                                                }
                                                else
                                                {
                                                    apr_comment1 = apr_comment1+'^'+apr_comment;
                                                }

                                                if (apr_kpi_rating1 == '') 
                                                {
                                                    apr_kpi_rating1= apr_kpi_rating;
                                                }
                                                else
                                                {
                                                    apr_kpi_rating1 = apr_kpi_rating1+'^'+apr_kpi_rating;
                                                }
if (sum_score == '') 
                                                {
                                                    sum_score = $('#sum-'+id).val();
                                                }
                                                else
                                                {
                                                    sum_score = sum_score+';'+$('#sum-'+id).val();
                                                }
}
for(var i = 0; i < $("#total_prog").text(); i++)
  {
    if($("#"+i).text()!=""  && $("#program_final_review-"+i).val()!="")
    {
       if(prg_final_review_by_apr == '')
                                    {
                                        prg_final_review_by_apr = $("#program_final_review-"+i).val();
                                    }
                                    else
                                    {
                                        prg_final_review_by_apr = prg_final_review_by_apr+';'+$("#program_final_review-"+i).val();
                                    }
    }
  }
var ext_list = $("#ext_program_count").text();
var ext_list_data = ext_list.split(';');
for (var i = 0; i < ext_list_data.length; i++) 
{
if(extra_prg_final_review_by_apr == '')
                {
                extra_prg_final_review_by_apr = $("#extra_program_final_review-"+i).val();
                    
                }
                else
                {
                extra_prg_final_review_by_apr = extra_prg_final_review_by_apr+';'+$("#extra_program_final_review-"+i).val();
                
                }
}
for (var i = 0; i < 2; i++) 
{
if(rel_program_final_review_by_apr==''){
               rel_program_final_review_by_apr=$('#rel_program_final_review-'+i).val() ;
            }
            else{
                 rel_program_final_review_by_apr=rel_program_final_review_by_apr+';'+$('#rel_program_final_review-'+i).val();
            }
}
//alert(prg_final_review_by_apr);
var appr_comments_yearB1=$('#appr_comments_yearB1').val();
var appr_comments_yearB2=$('#appr_comments_yearB2').val();
var appr_comments_yearB3=$('#appr_comments_yearB3').val();
var appr_comments_yearB4=$('#appr_comments_yearB4').val();
var yearB_rate1=$('#yearB_rate1').val();
var yearB_rate2=$('#yearB_rate2').val();
var yearB_rate3=$('#yearB_rate3').val();
var yearB_rate4=$('#yearB_rate4').val();
var base_url = window.location.origin; 
if($("#manager_diff").text() == '1')
{
var data = {
                                    'KPI_id' : kpi_id_list,
                                    'appraiser_comment' : apr_comment1,
                                    'appraiser_raiting' : apr_kpi_rating1,
                                    'average_rating' : sum_score,
                                    'project_final_review_apr' : $('#project_final_review_by_apr').val(),
                                    'rel_program_final_review_by_apr' : $('#rel_program_final_review-0').val()+';'+$('#rel_program_final_review-1').val(),
                                    'program_final_review' : prg_final_review_by_apr,
                                    'extra_program_final_review' : extra_prg_final_review_by_apr,
                                    'career_plan' : $(".career_plan").find(':selected').val(),
                                    'career_plan_desc' : $('#career_plan_desc').val(),
                                    'other_comment' : $('#other_comment').val(),
                                    'appr_comments_yearB1':appr_comments_yearB1,
                                    'appr_comments_yearB2':appr_comments_yearB2,
                                    'appr_comments_yearB3':appr_comments_yearB3,
                                    'appr_comments_yearB4':appr_comments_yearB4,
                                    'yearB_rate1':yearB_rate1,
                                    'yearB_rate2':yearB_rate2,
                                    'yearB_rate3':yearB_rate3,
                                    'yearB_rate4':yearB_rate4,
                                    'performance_rating':$("#kra_total_value").text(),
                                    'Tota_score':$("#sum1").text(),
                                    'state' : $("#apr_chk").text(),
                                    'manager_2_rate' : ($("#kra_total_value").text()/365)*$("#num_days").text(),
                                }; 
                             // alert($("#sum1").text());
                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/pms/index.php/Year_endreview1/updatereview_appraiser',
                                        success : function(data)
                                        {
$("#success1").text('1');
send_data();
                                           alert(data);
                                            
                                                                                                                                     
                                        }
                                });   
}
else
{
    
var data = {
                                    'KPI_id' : kpi_id_list,
                                    'appraiser_comment' : apr_comment1,
                                    'appraiser_raiting' : apr_kpi_rating1,
                                    'average_rating' : sum_score,
                                    'project_final_review_apr' : $('#project_final_review_by_apr').val(),
                                    'rel_program_final_review_by_apr' : $('#rel_program_final_review-0').val()+';'+$('#rel_program_final_review-1').val(),
                                    'program_final_review' : prg_final_review_by_apr,
                                    'extra_program_final_review' : extra_prg_final_review_by_apr,
                                    'career_plan' : $(".career_plan").find(':selected').val(),
                                    'career_plan_desc' : $('#career_plan_desc').val(),
                                    'other_comment' : $('#other_comment').val(),
                                    'appr_comments_yearB1':appr_comments_yearB1,
                                    'appr_comments_yearB2':appr_comments_yearB2,
                                    'appr_comments_yearB3':appr_comments_yearB3,
                                    'appr_comments_yearB4':appr_comments_yearB4,
                                    'yearB_rate1':yearB_rate1,
                                    'yearB_rate2':yearB_rate2,
                                    'yearB_rate3':yearB_rate3,
                                    'yearB_rate4':yearB_rate4,
                                    'performance_rating':$("#kra_total_value").text(),
                                    'Tota_score':$("#sum1").text(),
                                    'state' : $("#apr_chk").text(),
'manager_1_rate' : ($("#kra_total_value").text()/365)*$("#num_days").text(),
                                }; 
                                 //alert($("#sum1").text());
                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/pms/index.php/Year_endreview1/updatereview_appraiser',
                                        success : function(data)
                                        {
$("#success1").text('1');
send_data();
                                           alert(data);
                                            
                                                                                                                                     
                                        }
                                });   
}
                                 
}        

}

});
                            





                            $(".year_end_rew").click(function(){
                                var id = $(this).attr('id');
                                var data = {
                                    'KPI_id' : $(this).attr('id'),
                                    'year_end_reviewa' : $('#emp_actual_achieve-'+id).val(),
                                };
                                console.log(data);
                                var base_url = window.location.origin;
                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/pms/index.php?r=Year_endreview1/updatereview',
                                        success : function(data)
                                        {
                                            get_notify('Year end review updated succesfully');                                   
                                        }
                                });
                            });
                        });
function send_data()
{
jQuery("#static").modal('show');
                                          $("#continue_goal_set").click(function(){
var emp_nam=$("#emp_nm").text();
var data = {
emp_id : $("#emp_id_value1").text()
};
                                    $("#show_spin").show();
                                    $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+'/pms/index.php/Year_endreview1/goalnotification',
                                    success : function(data)
                                    {
                                    //alert(data);
                                    jQuery("#static").modal('toggle');

                                    $("#show_spin").hide(); 
                                    $("#err").show();  
                                    //$("#err").fadeOut(6000);
                                    $("#err").text("The final review for "+emp_nam+" has been saved");
                                    $("#err").addClass("alert-danger");

                                   $("#err").css('background-color','#B2EAC5');
$("#err").css('color','black');
$("#err").css('border','1px solid #0DEA56');
                                                            
window.setTimeout(function() {
    window.location.href = base_url+'/pms/index.php/Year_endreview1/year_end_reviewlist';
}, 2000);                     
                                                      }
                                                  });
                                          });
}
                    </script>

<script>
    $(document).ready(function(){

       
        $(".score").each(function() {

            $(this).keyup(function(){
                calculateSum();
            });
        });

    });

    function calculateSum() {

       
       var sum = 0;
       var err_msg='';
        $(".score").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {

                sum += parseFloat(this.value);
             
            }
        });
        $("#sum").html(sum.toFixed(2));
        
    }
    function nospaces(t){
        if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
        }
    }
    
    // function nospaces1(t){
    //   // str=t.value;
    //    //str=str.trim();
    //    alert($("#comment1").val().trim().length);
    // }
   var error='';
    function submit_pbr(){
                    $("#err").text("");
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger"); 
                    $(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
var kra_count = $('#min_kra').text();var error = '';var flag = true; var score_total = '';var score_comments = '';var kra_id_list = '';
for (var i = 0; i < kra_count; i++) {
   if((isNaN($("#score"+i).val())|| $("#score"+i).val() >25 || $("#score"+i).val() < 0) || $("#score"+i).val()==0)  {
       error = 'Please enter a number upto 25 in score '+i+' field';
       i =kra_count
    }
    else if($("#score"+i).val().length!=0 && $("#comment"+i).val().trim().length==0){
         error = "Please enter comment for score"+i;
         i =kra_count
    }
     else if($(".promotion").find(':selected').val() == 'Select'){
         error = "Please select career Planning";
    }
    else
    {
        error = '';
    }
    // if (!flag) 
    // {
    //     return false;
    // }
}
//alert(error);
if(error != '')
{
    $("#err").show();  
    //$("#err").fadeOut(6000);
    $("#err").text(error);
    $("#err").addClass("alert-danger");
}
else
{
    $("#updation_spinner").css('display','block');
   $("#err").hide();  
    for (var i = 0; i < kra_count; i++) {
        //alert($("#comment"+i).val());
        if (score_total == '') 
        {
            score_total = $("#score"+i).val();
        }
        else
        {
            score_total = score_total+';'+$("#score"+i).val();
        }
        if (score_comments == '') 
        {
            score_comments = $("#comment"+i).val();
        }
        else
        {
            score_comments = score_comments+';'+$("#comment"+i).val();
        }
        if (kra_id_list == '') 
        {
            kra_id_list = $("#kra_id"+i).val();
        }
        else
        {
            kra_id_list = kra_id_list+';'+$("#kra_id"+i).val();
        }
    }

    var record = {
        'KRA_score' : score_total,
        'Score_comment' : score_comments,
        'Employee_id' : $("#emp_id_value").text(),
        'Reporting_officer1_id' : $("#apr_id").text(),
        'Tota_score' : $("#sum").text(),
        'performance_rating' : $("#performance_rating").text(),
        'career_planning' : $(".promotion").find(':selected').val(),
        'KRA_id' : kra_id_list

    };
    //alert(score_comments);
    
    var base_url = window.location.origin;
    $.ajax({
        type : 'post',
        datatype : 'html',
        data : record,
        url : base_url+'/pms/index.php?r=Manager_final_review/save_data',
        success : function(data)
        {
           $("#updation_spinner").css('display','none');
            if (data == 'Notification Send ') 
            {
                $("#err").show();  
                //$("#err").fadeOut(6000);
                $("#err").text("Year End Review Completed");
                $("#err").addClass("alert-success");
            }
            else if(data == 'error occured')
            {
                $("#err").show();  
                //$("#err").fadeOut(6000);
                $("#err").text("No Changes Done");
                $("#err").addClass("alert-danger");
            }
            
        }
    });
   
}

}
             
function get_save_emp()
{
    //alert("hhhhhhhhh");
 $("#err").removeClass("alert-success"); 
                                $("#err").removeClass("alert-danger"); 


var str_chk = /^[1-5]\d*$/;var str_chk1 = /^(0?[1-9]|1[0-9]|2[0-5])*$/;
var appr_comments_yearB1=$('#appr_comments_yearB1').val();
var appr_comments_yearB2=$('#appr_comments_yearB2').val();
var appr_comments_yearB3=$('#appr_comments_yearB3').val();
var appr_comments_yearB4=$('#appr_comments_yearB4').val();
var yearB_rate1=$('#yearB_rate1').val();
var yearB_rate2=$('#yearB_rate2').val();
var yearB_rate3=$('#yearB_rate3').val();
var yearB_rate4=$('#yearB_rate4').val();

// alert(isNaN(yearB_rate1));

var extra_progrm_count = $("#extra_program_count").text();
var id_list = $('#kra_id_list').text();
var individual_id_list = id_list.split(';');
var avg_kra_rating = 0;

var l=0;var error1 = '';var error2 = '';var error3 = '';
//alert(individual_id_list.length);
                               
var prg_final_review_by_apr = ''; var rel_program_final_review_by_apr="";var extra_prg_final_review_by_apr = '';var rel_program_final_review_by_apr = '';var kpi_id_list = '';var apr_comment = '';var apr_kpi_rating = '';
var prg_final_review_by_apr1 = ''; var rel_program_final_review_by_apr1="";var extra_prg_final_review_by_apr1 = '';var apr_comment1 = '';var apr_kpi_rating1 = '';var sum_score = '';

for(var j = 0; j < individual_id_list.length; j++)
{ 

var id = individual_id_list[j];
if(kpi_id_list == "")
{
kpi_id_list = id;
}
else
{
kpi_id_list = kpi_id_list+';'+id;
}
var kpi_total = $("#kpi_count_list-"+id).text();
var apr_comment=""; var apr_kpi_rating="";
for (var i = 0; i < kpi_total; i++) 
{

if (apr_comment == '') 
                                                {
                                                    apr_comment = $('#appraiser_comment-'+i+id).val();
                                                }
                                                else
                                                {
                                                    apr_comment = apr_comment+';'+$('#appraiser_comment-'+i+id).val();
                                                }

                                                if (apr_kpi_rating == '') 
                                                {
                                                    apr_kpi_rating = $('#appraiser_raiting-'+i+'-'+id).val();
                                                }
                                                else
                                                {
                                                    apr_kpi_rating = apr_kpi_rating+';'+$('#appraiser_raiting-'+i+'-'+id).val();
                                                }
}
if (apr_comment1 == '') 
                                                {
                                                    apr_comment1 = apr_comment;
                                                }
                                                else
                                                {
                                                    apr_comment1 = apr_comment1+'^'+apr_comment;
                                                }

                                                if (apr_kpi_rating1 == '') 
                                                {
                                                    apr_kpi_rating1= apr_kpi_rating;
                                                }
                                                else
                                                {
                                                    apr_kpi_rating1 = apr_kpi_rating1+'^'+apr_kpi_rating;
                                                }
if (sum_score == '') 
                                                {
                                                    sum_score = $('#sum-'+id).val();
                                                }
                                                else
                                                {
                                                    sum_score = sum_score+';'+$('#sum-'+id).val();
                                                }
}
for(var i = 0; i < $("#total_prog").text(); i++)
  {
    if($("#"+i).text()!=""  && $("#program_final_review-"+i).val()!="")
    {
       if(prg_final_review_by_apr == '')
                                    {
                                        prg_final_review_by_apr = $("#program_final_review-"+i).val();
                                    }
                                    else
                                    {
                                        prg_final_review_by_apr = prg_final_review_by_apr+';'+$("#program_final_review-"+i).val();
                                    }
    }
  }
var ext_list = $("#ext_program_count").text();
var ext_list_data = ext_list.split(';');
for (var i = 0; i < ext_list_data.length; i++) 
{
if(extra_prg_final_review_by_apr == '')
                {
                extra_prg_final_review_by_apr = $("#extra_program_final_review-"+i).val();
                    
                }
                else
                {
                extra_prg_final_review_by_apr = extra_prg_final_review_by_apr+';'+$("#extra_program_final_review-"+i).val();
                
                }
}
for (var i = 0; i < 2; i++) 
{
if(rel_program_final_review_by_apr==''){
               rel_program_final_review_by_apr=$('#rel_program_final_review-'+i).val() ;
            }
            else{
                 rel_program_final_review_by_apr=rel_program_final_review_by_apr+';'+$('#rel_program_final_review-'+i).val();
            }
}
//alert(prg_final_review_by_apr);
var appr_comments_yearB1=$('#appr_comments_yearB1').val();
var appr_comments_yearB2=$('#appr_comments_yearB2').val();
var appr_comments_yearB3=$('#appr_comments_yearB3').val();
var appr_comments_yearB4=$('#appr_comments_yearB4').val();
var yearB_rate1=$('#yearB_rate1').val();
var yearB_rate2=$('#yearB_rate2').val();
var yearB_rate3=$('#yearB_rate3').val();
var yearB_rate4=$('#yearB_rate4').val();
var base_url = window.location.origin; 
//alert($("#manager_diff").text());

if($("#manager_diff").text() == '1')
{
var data = {
                                    'KPI_id' : kpi_id_list,
                                    'appraiser_comment' : apr_comment1,
                                    'appraiser_raiting' : apr_kpi_rating1,
                                    'average_rating' : sum_score,
                                    'project_final_review_apr' : $('#project_final_review_by_apr').val(),
                                    'rel_program_final_review_by_apr' : $('#rel_program_final_review-0').val()+';'+$('#rel_program_final_review-1').val(),
                                    'program_final_review' : prg_final_review_by_apr,
                                    'extra_program_final_review' : extra_prg_final_review_by_apr,
                                    'career_plan' : $(".career_plan").find(':selected').val(),
                                    'career_plan_desc' : $('#career_plan_desc').val(),
                                    'other_comment' : $('#other_comment').val(),
                                    'appr_comments_yearB1':appr_comments_yearB1,
                                    'appr_comments_yearB2':appr_comments_yearB2,
                                    'appr_comments_yearB3':appr_comments_yearB3,
                                    'appr_comments_yearB4':appr_comments_yearB4,
                                    'yearB_rate1':yearB_rate1,
                                    'yearB_rate2':yearB_rate2,
                                    'yearB_rate3':yearB_rate3,
                                    'yearB_rate4':yearB_rate4,
                                    'performance_rating':$("#kra_total_value").text(),
                                    'Tota_score':$("#sum1").text(),
                                    'state' : $("#apr_chk").text(),
                                    'manager_2_rate' : ($("#kra_total_value").text()/365)*$("#num_days").text(),
                                }; 
                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/pms/index.php/Year_endreview1/updatereview_appraiser1',
                                        success : function(data)
                                        {
                                           //alert(data);
                                            $("#err1").show();  
                                                       
$("#err1").text("Data save successfully");
$("#err1").css('background-color','#B2EAC5');
$("#err1").css('color','black');
$("#err1").css('border','1px solid #0DEA56');
 $("#err1").fadeOut(2000);
                                                                                                                                     
                                        }
                                });   
}
else
{

var data = {
                                    'KPI_id' : kpi_id_list,
                                    'appraiser_comment' : apr_comment1,
                                    'appraiser_raiting' : apr_kpi_rating1,
                                    'average_rating' : sum_score,
                                    'project_final_review_apr' : $('#project_final_review_by_apr').val(),
                                    'rel_program_final_review_by_apr' : $('#rel_program_final_review-0').val()+';'+$('#rel_program_final_review-1').val(),
                                    'program_final_review' : prg_final_review_by_apr,
                                    'extra_program_final_review' : extra_prg_final_review_by_apr,
                                    'career_plan' : $(".career_plan").find(':selected').val(),
                                    'career_plan_desc' : $('#career_plan_desc').val(),
                                    'other_comment' : $('#other_comment').val(),
                                    'appr_comments_yearB1':appr_comments_yearB1,
                                    'appr_comments_yearB2':appr_comments_yearB2,
                                    'appr_comments_yearB3':appr_comments_yearB3,
                                    'appr_comments_yearB4':appr_comments_yearB4,
                                    'yearB_rate1':yearB_rate1,
                                    'yearB_rate2':yearB_rate2,
                                    'yearB_rate3':yearB_rate3,
                                    'yearB_rate4':yearB_rate4,
                                    'performance_rating':$("#kra_total_value").text(),
                                    'Tota_score':$("#sum1").text(),
                                    'state' : $("#apr_chk").text(),
'manager_1_rate' : ($("#kra_total_value").text()/365)*$("#num_days").text(),
                                }; 

                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/pms/index.php/Year_endreview1/updatereview_appraiser1',
                                        success : function(data)
                                        {
                                           //alert(data);
                                           $("#err1").show();  
                                                       
$("#err1").text("Data save successfully");
$("#err1").css('background-color','#B2EAC5');
$("#err1").css('color','black');
$("#err1").css('border','1px solid #0DEA56');
 $("#err1").fadeOut(2000); 
                                                                                                                                     
                                        }
                                });   
}
                                 
}                  
</script>












                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
           
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->




<script type="text/javascript">
                        $(function(){
                            $("body").on('click','#promotion_form_submit',function(){
                                $("#err").removeClass("alert-success"); 
                                $("#err").removeClass("alert-danger"); 
                                $(window).scroll(function()
                                {
                                    $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                                });
                                var field1 = $("#field_1").val();
                                var field2 = $("#field_2").val();
                                var field3 = $("#field_3").val();
                                var field4 = $("#field_4").val();
                                var field5 = $("#field_5").val();
                                var field6 = $("#field_6").val();
                                var field7 = $("#field_7").val();
                                var field8 = $("#field_8").val();
                                
                                var error = '';
if(field1.length == 0)
{
$("#field_1").css("border","1px solid red");
error = "All fields are required";
}
else if(field2.length == 0)
{
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid red");
error = "All fields are required";
}
else if(field3.length == 0)
{
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid");
$("#field_3").css("border","1px solid red");
error = "All fields are required";
}
else if(field4.length == 0)
{
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid");
$("#field_3").css("border","1px solid");
$("#field_4").css("border","1px solid red");
error = "All fields are required";
}
else if(field5.length == 0)
{
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid");
$("#field_3").css("border","1px solid");
$("#field_4").css("border","1px solid");
$("#field_5").css("border","1px solid red");
error = "All fields are required";
}
else if(field6.length == 0)
{
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid");
$("#field_3").css("border","1px solid");
$("#field_4").css("border","1px solid");
$("#field_5").css("border","1px solid");
$("#field_6").css("border","1px solid red");
error = "All fields are required";
}
else if(field7.length == 0)
{
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid");
$("#field_3").css("border","1px solid");
$("#field_4").css("border","1px solid");
$("#field_5").css("border","1px solid");
$("#field_6").css("border","1px solid");
$("#field_7").css("border","1px solid red");
error = "All fields are required";
}
else if(field8.length == 0)
{
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid");
$("#field_3").css("border","1px solid");
$("#field_4").css("border","1px solid");
$("#field_5").css("border","1px solid");
$("#field_6").css("border","1px solid");
$("#field_7").css("border","1px solid");
$("#field_8").css("border","1px solid red");
error = "All fields are required";
}
else if (field1.length > 1000 || field2.length > 1000 || field3.length  > 1000 || field4.length > 1000 || field5.length > 1000 || field6.length  > 1000 || field7.length  > 1000 || field8.length  > 1000 ) 
                                {
                                    error = "Maximum 1000 characters are allowed.";
                                }
                                else
                                {
                                    error = '';
                                }
                                if (error != '') 
                                {
                                    //$("#err").show(); 
                                    $("#error_text").text(error);
                                    //$("#err").addClass("alert-danger");
                                  
                                }
                                else
                                {
$("#field_1").css("border","1px solid");
$("#field_2").css("border","1px solid");
$("#field_3").css("border","1px solid");
$("#field_4").css("border","1px solid");
$("#field_5").css("border","1px solid");
$("#field_6").css("border","1px solid");
$("#field_7").css("border","1px solid");
$("#field_8").css("border","1px solid");
$("#field_9").css("border","1px solid");
$("#error_text").text("");

//alert($("#emp_id_value1").text());
var goal_set_year=$("#year1").text();  
//alert(goal_set_year);
              var data1 = {
                                        'emp_id' : $("#emp_id_value1").text(),
                                        'field1' : $("#field_1").val(),
                                        'field2' : $("#field_2").val(),
                                        'field3' : $("#field_3").val(),
                                        'field4' : $("#field_4").val(),
                                        'field5' : $("#field_5").val(),
                                        'field6' : $("#field_6").val(),
                                        'field7' : $("#field_7").val(),
                                        'field8' : $("#field_8").val(),
                                        'goal_set_year':goal_set_year,
                                        
                                    };
                                    
                                   
                                    var base_url = window.location.origin;

                                    $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data1,
                                    url : base_url+'/pms/index.php?r=Year_endreview1/submit_data',
                                    success : function(data)
                                    {
                                    //alert(data);
                                       if (data == 'success') 
                                       {   
                                            $("#error_text").text("Successfully saved");
                                            $("#error_text").css("color","green");
                                       }
                                       else if(data == 'update')
                                       {
                                            $("#error_text").text("Successfully updated");
                                            $("#error_text").css("color","green");
                                       }
                                       else
                                       {
                                            $("#error_text").text("No changes done");
                                       }
                                    }
                                    });
                                }
                            });
                        });
                    </script>






















<script type="text/javascript">
$(document).ready(function(){

$("body").on('keyup','.score1',function(){
//alert($(this).val());
var str_chk1 = /^([1-9]|1[0-9]|2[0-5])$/;
var str_chk2 = /^(1[0-9])*$/;
var str_chk3 = /^(2[0-5])*$/;
if (!str_chk1.test($(this).val())) 
{
                            //alert("jlkj")
                             $("#err").show();  
                             $(this).css('border','2px solid red');
                            //$("#err").fadeOut(6000);
                            $("#err").text("Please enter valid rating between 1-25.");
                            $("#err").addClass("alert-danger");
}
else
{
$("#err").hide();
$(this).css('border','1px solid grey');
}
});
       
        $(".score1").each(function() {
//$("#kra_total_value1").html('');
            $(this).keyup(function(){

 //$("#sum1").html('');
                //alert($(this).val());
                calculateSum();
            });
        });

    });

    function calculateSum() {

       
       var sum = 0;
       var err_msg='';
        $(".score1").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {

                sum += parseFloat(this.value);
             
            }
        });
//alert(sum.toFixed(2));
$("#kra_total_value1").css("display","none");
$("#sum1").css("display","inline");
        $("#sum1").html(sum.toFixed(2));
        
    }

</script>            

<script type="text/javascript">
//$(window).load(function() {
  
//});
$('#bottom').click(function(){
   $("html, body").animate({ scrollTop: $(document).height() }, 1000);
//alert("hi");
});


</script>
<script type="text/javascript">
$("body").on('click','.send_for_appraisal',function(){
        var appr_comments_yearB1=$('#appr_comments_yearB1').val();
        var appr_comments_yearB2=$('#appr_comments_yearB2').val();
        var appr_comments_yearB3=$('#appr_comments_yearB3').val();
        var appr_comments_yearB4=$('#appr_comments_yearB4').val();
        var yearB_rate1=$('#yearB_rate1').val();
        var yearB_rate2=$('#yearB_rate2').val();
        var yearB_rate3=$('#yearB_rate3').val();
        var yearB_rate4=$('#yearB_rate4').val();
        var extra_progrm_count = $("#extra_program_count").text();
        var id_list = $('#kra_id_list').text();
       // alert(id_list);
        var individual_id_list = id_list.split(';');
        for(var j = 0; j < individual_id_list.length; j++)
        { 
                var id = individual_id_list[j];
                var kpi_total = $("#kpi_count_list-"+id).text(); 
                
                for (var i = 0; i < kpi_total; i++) {
                    
                    if ($('#appraiser_comment-'+i+id).val() === undefined || $('#appraiser_comment-'+i+id).val() == '') 
                    {
                            $('#appraiser_comment-'+i+id).css('border','2px solid red');
                    } 
                    else
                    {
                            $('#appraiser_comment-'+i+id).css('border','2px solid grey');
                    }   
                    if(($('#appraiser_comment-'+i+id).val().length>1000 || $('#appraiser_comment-'+i+id).val().length<10))
                    {
                            $('#appraiser_comment-'+i+id).css('border','2px solid red');
                    }
                    else
                    {
                        $('#appraiser_comment-'+i+id).css('border','2px solid grey');
                    }
                    
                    if ($('#appraiser_raiting-'+i+'-'+id).val() > 5) 
                    {
                            $('#appraiser_raiting-'+i+'-'+id).css('border','2px solid red');
                    }
                    else
                    {
                       
                            $('#appraiser_raiting-'+i+'-'+id).css('border','2px solid grey');
                    }
                    if ($('#appraiser_raiting-'+i+'-'+id).val()=='' || $('#appraiser_raiting-'+i+'-'+id).val() == undefined) 
                    {
                            $('#appraiser_raiting-'+i+'-'+id).css('border','2px solid red');
                    }
                    else
                    {
                        $('#appraiser_raiting-'+i+'-'+id).css('border','2px solid grey');
                    }
                }
        } 
  

        if($('#appr_comments_yearB1').val()=="")
        {
            $('#appr_comments_yearB1').css('border','2px solid red');
        }
        else{
            $('#appr_comments_yearB1').css('border','2px solid grey');
        }
        if($('#appr_comments_yearB2').val()=="")
        {
            $('#appr_comments_yearB2').css('border','2px solid red');
        }
        else{
            $('#appr_comments_yearB2').css('border','2px solid grey');
        }
        if($('#appr_comments_yearB3').val()=="")
        {
            $('#appr_comments_yearB3').css('border','2px solid red');
        }
        else{
            $('#appr_comments_yearB3').css('border','2px solid grey');
        }
        if($('#appr_comments_yearB4').val()=="")
        {
            $('#appr_comments_yearB4').css('border','2px solid red');
        }
        else{
            $('#appr_comments_yearB4').css('border','2px solid grey');
        }
        if($('#yearB_rate1').val()=="" || $('#yearB_rate1').val()<=0 || $('#yearB_rate1').val()>25)
        {
            $('#yearB_rate1').css('border','2px solid red');
        }
        else{
            $('#yearB_rate1').css('border','2px solid grey');
        }
        if($('#yearB_rate2').val()=="" || $('#yearB_rate2').val()<=0 || $('#yearB_rate2').val()>25)
        {
            $('#yearB_rate2').css('border','2px solid red');
        }
        else{
            $('#yearB_rate2').css('border','2px solid grey');
        }
        if($('#yearB_rate3').val()=="" || $('#yearB_rate3').val()<=0 || $('#yearB_rate3').val()>25)
        {
            $('#yearB_rate3').css('border','2px solid red');
        } 
        else{
            $('#yearB_rate3').css('border','2px solid grey');
        }   
        if($('#yearB_rate4').val()=="" || $('#yearB_rate4').val()<=0 || $('#yearB_rate4').val()>25)
        {
            $('#yearB_rate4').css('border','2px solid red');
        }
        else{
            $('#yearB_rate4').css('border','2px solid grey');
        }   
        if($('#project_final_review_by_apr').val()==""){
            $('#project_final_review_by_apr').css('border','2px solid red');
        }
        else{
            $('#project_final_review_by_apr').css('border','2px solid grey');
        }
        if($('#project_final_review_by_apr').val().length <10 || $('#project_final_review_by_apr').val().length>1000){
           $('#project_final_review_by_apr').css('border','2px solid red');
        }
        else{
            $('#project_final_review_by_apr').css('border','2px solid grey');
        }
        
        for(var i = 0; i < $("#total_prog").text(); i++)
        {

                if($("#"+i).text()!=""  && $("#program_final_review-"+i).val()=="")
                {
                    $("#program_final_review-"+i).css('border','2px solid red');
                }
                else{
                    $("#program_final_review-"+i).css('border','2px solid grey');
                }
                if($("#"+i).text()!="" && ($("#program_final_review-"+i).val().length <10 || $("#program_final_review-"+i).val().length >1000) )
                {
                    $("#program_final_review-"+i).css('border','2px solid red');
                }
                else{
                    $("#program_final_review-"+i).css('border','2px solid grey');
                }
        }

        var ext_list = $("#ext_program_count").text();
        var ext_list_data = ext_list.split(';');
        for (var i = 0; i < ext_list_data.length; i++) {
                if(($("#topic"+i).val() !='' || $("#topic"+i).val() !='undefined') && $("#extra_program_final_review-"+ext_list_data[i]).val()===undefined || $("#extra_program_final_review-"+ext_list_data[i]).val() == "")
                {
                    $("#extra_program_final_review-"+ext_list_data[i]).css('border','2px solid red');
                }
                 else
                {
                    $("#extra_program_final_review-"+ext_list_data[i]).css('border','2px solid grey');
                }
                if(($("#topic"+i).val() !='' || $("#topic"+i).val() !='undefined') && $("#extra_program_final_review-"+ext_list_data[i]).val().length <10 || $("#extra_program_final_review-"+ext_list_data[i]).val().length>1000)
                {
                    $("#extra_program_final_review-"+ext_list_data[i]).css('border','2px solid red');
                }
                else
                {
                    $("#extra_program_final_review-"+ext_list_data[i]).css('border','2px solid grey');
                }
        }
        for (var i = 0; i < 2; i++) {
                if($("#rel_program_final_review-"+i).val()===undefined || $("#rel_program_final_review-"+i).val()=="")
                {
                    $("#rel_program_final_review-"+i).css('border','2px solid red');
                }
                else{
                    $("#rel_program_final_review-"+i).css('border','2px solid grey');
                }
                if($("#rel_program_final_review-"+i).val().length <10 || $("#rel_program_final_review-"+i).val().length>1000)
                {
                    $("#rel_program_final_review-"+i).css('border','2px solid red');
                }
                else{
                    $("#rel_program_final_review-"+i).css('border','2px solid grey');
                }
               
        }
        if($("#career_plan").find(':selected').val() != 'Promotion' && $('#career_plan_desc').val()==""){
            $("#career_plan_desc").css('border','2px solid red');
        }
        else{
            $("#career_plan_desc").css('border','2px solid grey');
        }
       
});
</script>
<script type="text/javascript">
$("body").on('keyup','.appr_comment',function() {
var chk = /[;-]/;

if (chk.test($(this).val())) 
{
                            
                             $("#err").show();  
                             $(this).css('border','2px solid red');
                            
                            $("#err").text("Special character ';' not allowed");
                            $("#err").addClass("alert-danger");
}
else
{
$("#err").hide();
$(this).css('border','1px solid grey');
}


});
</script>
