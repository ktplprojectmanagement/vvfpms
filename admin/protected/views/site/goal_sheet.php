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
   <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
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
                         <h4 style="float: right;"><?php if(isset($employee_data['0']['Emp_fname'])) { echo 'Employee Name : '.$employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'].' / '; } ?>
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
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-notific8.min.js" type="text/javascript"></script>
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
           
                <div class="container-fluid" style='background: #EFF3F8 none repeat scroll 0% 0%;'>
                <div class="page-content" style="background:none">
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
                             <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Midreview"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a><br><br>
                                <!-- BEGIN PAGE BASE CONTENT -->                                
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                        <?php
                                        $kpi_id_data = '';
                                            if (!isset($approved_list)) { ?>                                           
                                        <?php    if (isset($kpi_data) && count($kpi_data)>0) { $cnt1 = 0;
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
                                                                //print_r($appr_status);die();
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
                                                                   
                                                                    <td><?php
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

                                                                    echo CHtml::dropDownList("kpi_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control kpi_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status));
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
                                                                            
                                                                    echo CHtml::textArea("review_comment",$apr_comment,$htmlOptions=array('class'=>"form-control validate_field review_comment".$row['KPI_id'].$i."",'style'=>"width: 186px;max-width: 186px;max-height: 58px;min-width: 186px;min-height: 58px;",'rows'=>2));
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
                                           $cnt1++; } } }
                                        ?>
<?php
                                $employee_name = '';
                                    if(isset($employee_data['0']['Emp_fname'])) {
                                    $employee_name = $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'];
                                }
                                ?>
                                        <?php 
                                        // echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft mid_review_update','style'=>'float:right')); 
                                        ?>
                                        <label id="total_kra_id" style="display: none"><?php echo $kpi_id_data; ?></label>     
 
                    <input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/><lable id="blink_me" style="color: red;"> I confirm this Midyear review is discussed and agreed
with <?php if(isset($employee_data['0']['Emp_fname'])) { echo $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname']; } ?></lable>
                                        <?php echo CHtml::button('Approve Midyear review of '.$employee_name,array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right;margin-bottom: 10px;','id'=>$kpi_data['0']['Employee_id'],'onclick'=>'js:send_notification();')); ?>

                                        <?php
                                            $IDPform=new IDPForm;
                                            $where = 'where KPI_id = :KPI_id';
                                            $list = array('KPI_id');
                                            $data = array($kpi_data['0']['Employee_id']);
                                            $idp_data = $IDPform->get_idp_data($where,$data,$list);
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
                                    <p> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/success.png" style="height: 38px;width: 35px;margin-top: 10px;" alt="VVF" class="logo-default"><b>Successfully Updated</b> </p>
                                </div>
                                <div class="modal-footer">
                                    
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/"><button type="button" class="btn border-blue-soft">OK</button></a>                                   
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
                                url : base_url+'/index.php?r=Midreview/submitidp',
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
                                url : base_url+'/index.php?r=Midreview/updateidp',
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
                                url : base_url+'/index.php?r=Midreview/get_idp',
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
                                        
                       $(".send_for_appraisal").click(function(){
                            var error_count = 0;var error_count1 = 0;var error_count2 = '';
                          var id_value = $("#total_kra_id").text();
                          var id = id_value.split(';');
                          //alert(id);
                          var mid_review_status = '';var mid_review_status1 = [];
                          var comment_data = '';
                          var review_comments = '';var review_comments1 = [];
                          var error = [];var status_type='';var chk_colon = /[;]/;
                           $("#err").text("");
                            $("#err").removeClass("alert-success"); 
                            $("#err").removeClass("alert-danger"); 
                         
                          //setInterval(scroll_div,1000);
                          
                          for (var j = 0; j < $("#total_kra_number").text(); j++) {
var mid_review_status = '';
var review_comments = '';
                              for (var i = 0; i < $("#get_kpi_count-"+id[j]).text(); i++) { 
                              var comment_data = $(".review_comment"+id[j]+i).val();
                              if (comment_data == undefined || comment_data =='')  
                              {
                                    error[id[j]] = "Please Enter review comments.";error_count1 = id[j]+i;error_count2 = id[j];break;
                                   
                              }
                            else if(chk_colon.test(comment_data))
                              {
                                error[id[j]] = "The special character ';' not allowed.";error_count1 = id[j]+i;error_count2 = id[j];break;
                              }
                              else if(comment_data.length>500)
                              {
                                error[id[j]] = "Maximum 500 charaters are allowed to write comment for review.";break;
                              }
                              else if($(".kpi_status_type-"+id[j]+i).find(':selected').val() == 'Select')
                              {
                                error[id[j]] = "Please Select Mid Review Status";error_count1 = id[j]+i;error_count2 = id[j];break;
                              }
                              else
                              {
                                  error[id[j]] = '';
                                  $(".review_comment"+id[j]+i).css('border-color','');
                                  $(".kpi_status_type-"+id[j]+i).css('border-color','');
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
                                   
                              }                              
                              
                          } 
var data = {
                                        'KPI_id' : id[j],
                                        'mid_KRA_status' : mid_review_status,
                                        'appraiser_comment' : review_comments,
                                      };
                                      $("#updation_spinner-"+id[j]).show();
                                      console.log(data);
                                      var base_url = window.location.origin;
                                      $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/index.php?r=Midreview/midupdategoal',
                                        success : function(data)
                                        {
                                             
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
                          if(error_count != $("#total_kra_number").text())
                          {
        $('html, body').animate({
                                  scrollTop: ($("#review_state-"+error_count1).parent().offset().top)
                              },500);
                            
                            if (error[error_count2] == 'Please Select Mid Review Status') 
                            {
                              
                              $(".review_comment"+error_count1).css('border-color','');
                                //$("#error_spec"+error_count2).text(error[error_count2]);
                                 $("#err").css('display','block');
                                  $("#err").addClass("alert-danger"); 
                                  $(this).css('border','1px solid red');
                                  $("#err").text(error[error_count2]);
                                $(".kpi_status_type-"+error_count1).css('border-color','red');
                            }
                            else
                            {
                              $(".kpi_status_type-"+error_count1).css('border-color','');
                                //$("#error_spec"+error_count2).text(error[error_count2]);
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#err").text(error[error_count2]);
                                $(".review_comment"+error_count1).css('border-color','red');
                            }
                            
                          } 
                          else
                          {
                             $("#err").hide();
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
                                      url : base_url+'/index.php?r=Midreview/final_goal_review1',
                                      success : function(data)
                                      {
                                          if (data == 1) 
                                          {
						
                                           if($("#term_condition:checked").val() != 'term_condition')
                                            {
                                                 $("#blink_me").addClass('blink_me');
                                            }
					else if($("#prg_cnt").text() == 0)
                                            {
                                                jQuery("#static_prg").modal('show');
                                            } 
                                            else
                                            {
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
                                                                              url : base_url+'/index.php?r=Midreview/sendmail',
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
                                      else
                                      {
                                            $("#err").show(); 
                                            $("#err").text("Please submit midyear review for all KRA before final approval");
                                            $("#err").addClass("alert-danger");
                                      }             
                                  }
                              });              
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
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
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

