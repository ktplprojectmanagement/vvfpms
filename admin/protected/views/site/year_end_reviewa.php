       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
       <script type="text/javascript">
       var $j = jQuery.noConflict();
           $j(function(){
    $j('.date_show').attr('onkeydown','return false');
            $j('.date_show').datepicker({dateFormat: 'yy/mm/dd',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
           });
       </script>
     <style type="text/css">
       .ui-datepicker-month
{
color: rgb(28, 148, 201);
}
.ui-datepicker-year
{
color: rgb(28, 148, 201);
}
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
                            <h1>Year End Review(A)</h1>
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
                <div class="page-content">
            <style media="all" type="text/css">      
      #err, #error { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 364px;
height: 60px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
      
      }      
   </style>   
   <style>
      .custom-file-input {
        display: inline-block;
        position: relative;
        color: #533e00;
      }
      .custom-file-input input[type=file] {
        visibility: hidden;
        width: 100px;
      }
      .custom-file-input:before {
        content: 'Choose File';
        display: block;
        background: -webkit-linear-gradient( -180deg, #ffdc73, #febf01);
        background: -o-linear-gradient( -180deg, #ffdc73, #febf01);
        background: -moz-linear-gradient( -180deg, #ffdc73, #febf01);
        background: linear-gradient( -180deg, #ffdc73, #febf01);
        border: 3px solid #dca602;
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
        border-color: #febf01;
      }
        .custom-file-input:active:before {
        background: #febf01;
      }
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
    <script src="http://momentjs.com/downloads/moment.js" type="text/javascript"></script>
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
                                $("#error_value").text("For the Actual achievement for text field special character ';' not allowed.");
                          }
                          else if (($("#kpi_unit-"+id_value[1]).text()!='Date' && $("#kpi_unit-"+id_value[1]).text()!='Text') && !$.isNumeric($(this).val())) 
                          {
                              $("#err").css('display','block');
                              $("#err").addClass("alert-danger"); 
                              $(this).css('border','1px solid red');
                              $("#error_value").text("Please Enter Actual achievement based on selected unit for the particular KPI.");
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
                                $("#error_value").text("The special character ';' not allowed.");
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
                      //alert(detail);
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
                            url : base_url+'/index.php?r=Setgoals/kpivalue',
                            success : function(data)
                            {
                              //alert(data);
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
                      //var date = $.datepicker.formatDate('yymmdd', new Date());
                      //alert($.datepicker.formatDate('yymmdd', new Date()));
                            
                        var curr_date1 = new Date();
                        var curr_date =  moment(curr_date1, "DD.MM.YYYY").format("YYYY-MM-DD");                 
                         var userDate = $(this).val();
                        var date_string = moment(userDate, "DD.MM.YYYY").format("YYYY-MM-DD");
                         if (date_string<curr_date) 
                         {
                            //alert("less");
                         }
                         else
                         {
                            //alert('grater');
                         }
                    });
                });
            </script>        
            <div class="container-fluid">                
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->                           
                            <!-- END PAGE SIDEBAR -->
                           <div class="alert alert-danger fade in" id="err" style="display: none">
                              <!-- <a href="#" class="close" data-dismiss="alert">&times;</a>      -->
                              <lable id="error_value"> A problem has been occurred while submitting your data.</lable>
                          </div>
                                <?php
                                    if (isset($kpi_data) && count($kpi_data)>0) {                                  
                                for ($k=0; $k < count($kpi_data); $k++) { 
                                ?>
                                <div  style="min-width: 900px;" class="portlet box bg-blue-soft border-blue-soft">
                                    <div class="portlet-title">
                                        <div class="caption">
                                           </div>
                                           <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                    </div>                                    
                                    <div style="min-width: 900px;" class="portlet-body tabs-below">
                                        <div class="tab-content">
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                    <div style="border: 1px solid rgb(76, 135, 185);margin-top: 20px;padding-left: 10px;min-width: 900px">
                                      <table class="table table-bordered" cellspacing="0" border="0">
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Description</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_description'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Category</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_category'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>Weightage</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdnum="16393;0;0"><?php echo $kpi_data[$k]['target'];?></td>
                                                </tr>
                                            <tr>
                                                <td align="left" valign=middle><b><font face="Calibri" size=3>Key Performance Indicators (KPI) Description</font></b></td>
                                                <!-- <td align="left" valign=middle ><b><font face="Calibri" size=3>Unit</font></b></td> -->
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Unit & Value</font></b></td>

                                                <td align="left" valign=middle><b><font face="Calibri" size=3>Actual achievement of year end</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraisee comment on actual achievement</font></b></td>
                                               <!--  <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraiser Comment on actual achievement</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraiser Rating</font></b></td> -->
                                               <!--  <td align="left" valign=middle ><b><font face="Calibri" size=3>Average rating for KRA</font></b></td> -->
                                               <td align="left" valign=middle ><b><font face="Calibri" size=3>Approximate Rating</font></b></td>
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
                                                        $view_flag = false;
                                                        if ($kpi_data[$k]['appraiser_avrage_end'] == 0) {
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
                                                 <label id='kpi_count_list-<?php echo $kpi_data[$k]['KPI_id']; ?>' style="display: none"><?php echo count($kpi_list); ?></label>
                                                <?php
                                                   for ($i=0; $i < count($kpi_list); $i++) {
                                                    if ($kpi_unit[$i] != 'Select') {
                                                ?>
                                                <tr>

                                                    <td><?php echo $kpi_list[$i]; ?></td>                                                    
                                                     
                                                      <td>
                                                      <?php
                                                            if ($kpi_unit[$i] == 'Date' || $kpi_unit[$i] == 'Percentage' || $kpi_unit[$i] == 'Days' || $kpi_unit[$i] == 'Ratio' || $kpi_unit[$i] == 'Text') {
                                                               $value = explode('-',$kpi_value[$i]);
                                                               ?>
                                                               <table class="table table-bordered" cellspacing="0" border="0">
                                                               <tr>
                                                                  <td colspan="3"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                   <td colspan="2" id="<?php echo "kpi_unit-".$i.$kpi_data[$k]['KPI_id'];?>"><?php echo $kpi_unit[$i]; ?></td>
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
                                                               for ($l=0; $l < count($value); $l++) { 
                                                                   echo "<td>".$value[$l]."</td>";
                                                               } ?>
                                                               </tr>
                                                               </table>
                                                               <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <?php 
                                                                // echo $kpi_value[$i]; echo "<br>";
                                                                 ?>
                                                                 <table class="table table-bordered" cellspacing="0" border="0">
                                                                 <tr>
                                                                 <td colspan="2"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                  <td colspan="1" id="<?php echo "kpi_unit-".$i.$kpi_data[$k]['KPI_id'];?>;"><?php echo $kpi_unit[$i]; ?></td>
                                                                  <td colspan="1"><b><font face="Calibri" size=3>Unit value</font></b></td>
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
                                                            <td>
                                                            <?php 
                                                            
                                                                
                                                            if ($year_end_achieve != '' && count($year_end_achieve)>0) {

                                                                
                                                               if ($kpi_unit[$i] == 'Date') {
                                                                 echo CHtml::textField('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'title'=>$kpi_unit[$i],'disabled'=> $view_flag));
                                                               }
                                                               else
                                                               {
                                                                 echo CHtml::textField('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control valid_entry validate_field valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'title'=>$kpi_unit[$i],'disabled'=> $view_flag));
                                                                    
                                                               }
                                                            }                                                            
                                                            else
                                                            {
                                                                if ($kpi_unit[$i] == 'Date') {
                                                                  echo CHtml::textField('emp_actual_achieve','',array('class'=>'form-control date_show valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'title'=>$kpi_unit[$i],'disabled'=> $view_flag));
                                                               }
                                                               else
                                                               {
                                                                   echo CHtml::textField('emp_actual_achieve','',array('class'=>'form-control valid_entry validate_field valid_entry1','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id'],'title'=>$kpi_unit[$i],'disabled'=> $view_flag));
                                                               }
                                                                 
                                                            }
                                                            ?></td>
                                                            <td>
                                                            <?php 
                                                            if ($year_end_reviewa != '' && count($year_end_reviewa)>0) {
                                                               echo CHtml::textField('appraisee_comment',$year_end_reviewa[$i],array('class'=>'form-control validate_field','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> $view_flag));
                                                            }
                                                            else
                                                            {
                                                                echo CHtml::textField('appraisee_comment','',array('class'=>'form-control validate_field','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> $view_flag));
                                                            }
                                                            ?>
                                                            <?php  ?></td>
                                                            <!-- <td> -->
                                                            <?php 
                                                            // if ($apr_comment_values != '' && count($apr_comment_values)>0) {
                                                            //     echo CHtml::textField('appraiser_comment',$apr_comment_values[$i],array('class'=>'form-control','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            // }
                                                            // else
                                                            // {
                                                            //      echo CHtml::textField('appraiser_comment','',array('class'=>'form-control','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            // }
                                                            ?>
                                                            <!-- </td>  -->
                                                            <!-- <td> -->
                                                            <?php 
                                                            // if ($appraiser_end_rating !='' && count($appraiser_end_rating)>0) {
                                                            //      echo CHtml::textField('appraiser_raiting',$appraiser_end_rating[$i],array('class'=>'form-control','id'=>'appraiser_raiting-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            // }
                                                            // else
                                                            // {
                                                            //      echo CHtml::textField('appraiser_raiting','',array('class'=>'form-control','id'=>'appraiser_raiting-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            // }
                                                            ?>
                                                            <!-- </td>   -->
                                                            <td>
                                                            <?php 
                                                            if (isset($rating_by_emp[$i]) && $rating_by_emp !='' && count($rating_by_emp)>0) {
                                                                 echo CHtml::textField('rating_by_emp_raiting',$rating_by_emp[$i],array('class'=>'form-control','id'=>'rating_by_emp_raiting-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textField('rating_by_emp_raiting','',array('class'=>'form-control','id'=>'rating_by_emp_raiting-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            ?>
                                                            </td> 
                                                    <?php 
                                                            
                                                        } ?>   
                                                        </div>
                                                    <?php    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                <td colspan=8><b><font face="Calibri" size=3>
                                                <div class='col-md-6'>Average rating for KRA : <?php 
                                                $avg_rating = '';
                                                if ($kpi_data[$k]['rating_by_emp']) {
                                                  $kra_rating_data = explode(';',$kpi_data[$k]['rating_by_emp']);
                                                  for ($i=0; $i < count($kra_rating_data); $i++) { 
                                                      if ($avg_rating == '') {
                                                        $avg_rating = $kra_rating_data[$i];
                                                      }
                                                      else
                                                      {
                                                        $avg_rating = $avg_rating+$kra_rating_data[$i];
                                                      }
                                                  }
                                                  $avg_rating = $avg_rating/count($kra_rating_data);
                                                    
                                                }
                                                else
                                                {
                                                    $avg_rating = '';
                                                }
                                                echo CHtml::textField('average_rating',$avg_rating,array('class'=>'form-control','id'=>'average_rating-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true",'style'=>'width:218px')); 
                                                ?>
                                                <?php 
                                                    echo CHtml::button('Submit',array('id'=>$kpi_data[$k]['KPI_id'],'class'=>'btn border-blue-soft year_end_rew','style'=>'float: right;'));
                                                    
                                                ?><i id="updation_spinner-<?php echo $kpi_data[$k]['KPI_id']; ?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i>
                                                </div>   
                                                <style type="text/css">
                                                    .image-upload > input
                                                    {
                                                        display: none;
                                                    }
                                               </style>
                                               <?php                                               
                                                    if (!isset($kpi_data[$k]['final_kra_status']) || (isset($kpi_data[$k]['final_kra_status']) && $kpi_data[$k]['final_kra_status'] == '' || $kpi_data[$k]['final_kra_status'] == 'Pending')) { ?>
                                                     <label  class="custom-file-input file-blue file_change" id="file_change-<?php echo $kpi_data[$k]['KPI_id']; ?>" style="width: 157px;float: right;margin-right: 154px;">
                                                        <input id="file-input" class='file-input<?php echo $kpi_data[$k]['KPI_id']; ?>' type="file"  name='employee_csv<?php echo $kpi_data[$k]['KPI_id']; ?>'/><label id='uploaded_file<?php echo $kpi_data[$k]['KPI_id']; ?>' style="margin-left: 165px;
margin-top: -37px;
">
                                                      </label>
                                                    <input id="file-input" class='file-input<?php echo $kpi_data[$k]['KPI_id']; ?>' type="file"  name='employee_csv<?php echo $kpi_data[$k]['KPI_id']; ?>'/><label id='uploaded_file<?php echo $kpi_data[$k]['KPI_id']; ?>'></label>
                                                     <input type="text" name="kpi_value_id" style="display: none">
                                                    <input type="text" name="year_end_reviewa" style="display: none">
                                                    <input type="text" name="year_end_achieve"  style="display: none">
                                                     <?php
                                                    if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { ?>
                                                    <a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/<?php if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { echo $kpi_data[$k]['document_proof']; }?>' target="_blank"><?php if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { echo CHtml::button('Open File',array('class'=>'btn border-blue-soft','style'=>'float: right;margin-top: -61px;margin-right: 169px;')); }?></a>
                                                    <?php } ?>
                                                <?php }
                                                else
                                                { ?>
                                               <?php
                                                    if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { ?>
                                                    <a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/<?php if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { echo $kpi_data[$k]['document_proof']; }?>' target="_blank"><?php if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { echo CHtml::button('Open File',array('class'=>'btn border-blue-soft','style'=>'float: right;margin-top: 7px;')); }?></a>
                                                    <?php } ?>
                                                <?php }
                                                 ?>
                                               
                                                
                                                </td>
                                                
                                                </tr>

                                            <?php $this->endWidget(); ?>   
                                    </table> 
                                    </div></div></div>  </div>                               
                                    <?php
                                        } ?>
                                     <?php   }
                                        else
                                        { ?>
                                            <div class="note note-info">
                                                <p>No data available.</p>
                                            </div>
                                    <?php    }
                                    ?>
                                
                                <?php if(isset($kpi_data['0']['final_kra_status']) && ($kpi_data['0']['final_kra_status']!='Approved')) { ?>
                                        <?php echo CHtml::button('Final Submission',array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>$kpi_data['0']['Employee_id'],'onclick'=>'js:send_notification();')); ?>
                                <?php } ?>
                                        
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
                                    <p> Are you sure you want to send year end review(A) to appraiser? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                    <script type="text/javascript">
                     $(function(){
                    $("body").on('click','.send_for_appraisal',function(){
                    $("#err").removeClass("alert-success"); 
                            $("#err").removeClass("alert-danger");
                             var emp_id = {
                              emp_id : $(this).attr('id'),
                            };
                            $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                            //alert($(this).attr('id'));
                             var base_url = window.location.origin;
                              $.ajax({
                                  type : 'post',
                                  datatype : 'html',
                                  data : emp_id,
                                  url : base_url+'/index.php?r=Year_endreview/final_goal_review',
                                  success : function(data)
                                  {
                                      if (data == 1) 
                                      {
                                        $("#err").hide(); 
                                          jQuery("#static").modal('show');
                                          $("#continue_goal_set").click(function(){
                                              $("#show_spin").show();
                                                  $.ajax({
                                                      type : 'post',
                                                      datatype : 'html',
                                                      url : base_url+'/index.php?r=Year_endreview/goalnotification1',
                                                      success : function(data)
                                                      {
                                                        alert(data);
                                                          jQuery("#static").modal('toggle');
                                                          $("#show_spin").hide(); 
                                                          $("#err").show();  
                                                          $("#err").fadeOut(6000);
                                                          $("#error_value").text("Notification Sent to appraiser");
                                                          $("#err").addClass("alert-success");                       
                                                      }
                                                  });
                                          });
                                      } 
                                      else
                                      {
                                            $("#err").show(); 
                                            $("#error_value").text("Please submit final year review for all KRA before final Submission");
                                            $("#err").addClass("alert-danger");
                                      }             
                                  }
                              });                          
                            
                            });
                        });
                        $(function(){
                          $("body").on('change','.file_change',function(){
                            var text_value = $(this).attr('id');var text_id = text_value.split('-');
                            var next_input = $(this).find('input').attr('class');
                          $("#uploaded_file"+text_id[1]).text($('.'+next_input).val());
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
                        $(function(){                            
                            $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                            $("body").on('click','.year_end_rew',function(){
                                
                                $("#err").removeClass("alert-success"); 
                                $("#err").removeClass("alert-danger"); 

                                var id = $(this).attr('id');
                                var kpi_total = $("#kpi_count_list-"+id).text();
                                var emp_actual_achieve = '';var year_end_achieve = '';var emp_rating = '';
                                var string_match = /^([0-9.]{1,10})$/;
                                var chk = /[;-]/;
                                var file_id = $(this).attr('id');
                                var e = document.getElementsByClassName('file-input'+file_id);
                                var file_data = $(e)[0].files[0];
                               var formData = new FormData();      
                                for (var i = 0; i < kpi_total; i++) {
                                    //alert($('#appraisee_comment'+i+id).val());
                                    if ($('#emp_actual_achieve-'+i+id).val() === undefined || $('#emp_actual_achieve-'+i+id).val() == '') 
                                  {
                                      error = "Please enter final year actual achieve.";break;                                 
                                  }
                                  else if ($('#emp_actual_achieve-'+i+id).val() != '' && $('#kpi_unit-'+i+id).text()=='Text' && chk.test($('#emp_actual_achieve-'+i+id).val())) 
                                  {
                                      error = "The special character ';' not allowed";break;                                  
                                  }
                                  else if ($('#emp_actual_achieve-'+i+id).val() != '' && ($('#kpi_unit-'+i+id).text()=='Weight' || $('#kpi_unit-'+i+id).text()=='Units' || $('#kpi_unit-'+i+id).text()=='Value' || $('#kpi_unit-'+i+id).text()=='Ratio' || $('#kpi_unit-'+i+id).text()=='Percentage' || $('#kpi_unit-'+i+id).text()=='Days') && !$.isNumeric($(this).val())) 
                                  {
                                      error = "Please enter only number for final year actual achieve.";break;                                  
                                  }
                                  else if ($('#appraisee_comment'+i+id).val()  == '' || $('#appraisee_comment'+i+id).val() === undefined) 
                                  {
                                      error = "Please enter comment for final year actual achieve.";break;                                 
                                  }
                                  else if(chk.test($('#appraisee_comment'+i+id).val()))
                                  {
                                    error = "The special charater ';' not allowed.";
                                  }
                                    else if($('#appraisee_comment'+i+id).val().length >300)
                                  {
                                    error = "Maximum length for final year actual achieve comment is 300 charaters.";
                                  }
                                  else if(file_data != undefined && file_data.size > 512000)
                                 {
                                    error = "Maximum file size allowed is 600KB";
                                 }
                                  else
                                  {
                                     error = '';
                                     if (file_data != 'undefined') 
                                     {
                                      formData.append("employee_csv"+id,file_data);
                                     }
                                     if (emp_rating == '') 
                                    {
                                        emp_rating = $('#rating_by_emp_raiting-'+i+id).val();
                                    }
                                    else
                                    {
                                        emp_rating = emp_rating+';'+$('#rating_by_emp_raiting-'+i+id).val();
                                    }

                                    if (emp_actual_achieve == '') 
                                    {
                                        emp_actual_achieve = $('#emp_actual_achieve-'+i+id).val();
                                    }
                                    else
                                    {
                                        emp_actual_achieve = emp_actual_achieve+';'+$('#emp_actual_achieve-'+i+id).val();
                                    }
                                    if (year_end_achieve == '') 
                                    {
                                        year_end_achieve = $('#appraisee_comment'+i+id).val();
                                    }
                                    else
                                    {
                                        year_end_achieve = year_end_achieve+';'+$('#appraisee_comment'+i+id).val();
                                    }
                                     
                                  }                                    
                                    
                                } 
                               
                               formData.append("kpi_value_id",id);
                               formData.append("year_end_reviewa",year_end_achieve);
                               formData.append("year_end_achieve",emp_actual_achieve);
                               formData.append("rating_by_emp_raiting",emp_rating);
                                if(error != '')
                                  {
                                    $("#err").show();  
                                    //$("#err").fadeOut(6000);
                                    $("#err").text(error);
                                    $("#err").addClass("alert-danger");
                                  }
                                  else
                                  {
                                    
                                    $("#err").hide();
                                    $("#updation_spinner-"+id).css('display','block');
                                    var data = {
                                        'KPI_id' : $(this).attr('id'),
                                        'year_end_reviewa' : year_end_achieve,
                                        'year_end_achieve' : emp_actual_achieve,
                                        'emp_rating' : emp_rating
                                        //'employee_csv325a434f9c2' : formData
                                    };
                                    console.log(data);
                                    var base_url = window.location.origin;
                                    $.ajax({
                                        type : 'post',
                                            datatype : 'json',
                                            processData: false, 
                                            contentType: false,
                                            enctype : 'multipart/form-data',
                                            data : formData,
                                            url : base_url+'/index.php?r=Year_endreview/updatereview',
                                            success : function(data)
                                            {
                                              //alert(data);
                                              $("#updation_spinner-"+id).css('display','none');
                                              
                                                if (data == 'success') 
                                                {
                                                    $("#err").show();  
                                                    $("#err").fadeOut(6000);
                                                    $("#err").addClass("alert-success");
                                                    $("#err").text("Year end review updated succesfully");
                                                }
                                                else if(data == 'Notification Send')
                                                {
                                                    $("#err").show();  
                                                    $("#err").fadeOut(6000);
                                                    $("#err").addClass("alert-success");
                                                    $("#err").text("Year end review updated succesfully");
                                                }  
                                                else if(data == "error occured")
                                                {
                                                    $("#err").show();  
                                                    $("#err").fadeOut(6000);
                                                    $("#err").addClass("alert-danger");
                                                    $("#err").text("No Changes Done");
                                                }                                                                                
                                            }
                                    });
                                  }
                                
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
              
