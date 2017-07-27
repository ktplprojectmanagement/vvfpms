 <style type="text/css">
.bold{
    font-weight: bold;
}
.caption-subject{
    color:#337ab7;
}
 </style>
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
 <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <h4><?php if(isset($emp_data['0']['Emp_fname'])) { echo 'Employee Name : '.$emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?>
                             <lable style="float: right;"><?php if(isset($emp_data['0']['Department'])) { echo 'Department : '.$emp_data['0']['Department']; } ?></lable>
                        </h4>
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">                       
                        <div class="page-content-inner">
                        <div id="err" style="display: none"></div>
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
<lable id="prg_cnt" style="display:none"><?php if(isset($prg_cnt)) { echo $prg_cnt; } ?> </lable>
<div id="static_prg" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> <i class="fa fa-times" style="color:red"></i> Midyear not completed</p>
                                    <p> <i class="fa fa-check" style="color:green"></i> IDP completed </p>
                                </div>
                                <div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/Midreview/midreview_emp_data'),
                                                                ));
                                                                 ?>
<?php echo CHtml::textField('emp_id',$emp_data['0']['Employee_id'],array('style'=>'display:none')); ?>
                                                                  <?php echo CHtml::submitButton('OK',array('style'=>'float:right','class'=>'btn dark btn-outline')); ?>
<?php 
                                        $this->endWidget(); 
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div id="redirect_page" class="modal fade" tabindex="-1" data-backdrop="redirect_page" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                         <div class="modal-body">
                                    <p> IDP Midyear Review updation done successfully. </p>
                                </div>
                                <div class="modal-footer">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php/IDP/IDP_Mid_approvegoal_list"><button type="button" class="btn border-blue-soft" id="redirect_to_master">OK</button></a>
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
                                    <p> Complete IDP of <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']."'"; } ?>? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button><div id="show_spin1" style="display: none;margin-top: 10px;float: right;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="row">
<div class="col-md-12" style="margin-top: 58px;">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php/IDP/IDP_Mid_approvegoal_list"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;margin-top: -64px;
}')); ?></a></div>
                                <div class="col-md-12" style="margin-top: -18px;">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit" id="refresh_class">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                
                                                <span class="caption-subject bold uppercase" style="color:#337ab7;">IDP</span>
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
                                        <th>Program completed</th>
                                        <th>Review</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $compulsory = '';$program_state = '';$program_cmnt = '';$state = 0;$review_state = '';$program_state1 = '';$not_undefine = '';
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
                                    if (isset($program_data_result) && count($program_data_result)>0) {
                                        for ($i=0; $i < count($program_data_result); $i++) {    
                                         $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                                         
                                         $cmnt = '';
                                            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                                               
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
                                            if (isset($IDP_data['0']['mid_prgrm_cmd'])) 
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
                                                    echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,'disabled'=> "true"));
                                                ?> </td>
                                                <td>
<?php
if(isset($IDP_data['0']['midyear_status_flag']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
?>
<input type="radio" disabled='true' name='completeion_type1<?php echo $i; ?>'  value="Yes" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
 <input type="radio" disabled='true' <?php echo $set_flag1; ?> name='completeion_type1<?php echo $i; ?>' value="No" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'No') { ?>checked='check'<?php } ?>>No
<?php
}
else
{
 ?>
<input type="radio" name='completeion_type1<?php echo $i; ?>'  value="Yes" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'Yes') { ?>checked='check'<?php } ?>>Yes
 <input type="radio" <?php echo $set_flag1; ?> name='completeion_type1<?php echo $i; ?>' value="No" class='completeion_type<?php echo $i; ?>' <?php if($program_state1 == 'No') { ?>checked='check'<?php } ?>>No
<?php
}
?>
                                                
                                               
                                                
                                                </td>
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
                                                                    $count = explode(';',$IDP_data['0']['extra_topic']);
                                                                    //print_r($count);die();
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
                                                             Program Completed
                                                            </div>
                                                            <div class="col-md-2 bold">
                                                             Reviews
                                                            </div>
                                                  </div>
                                                 <?php
                                                 $extra_prgrm_cmd = '';$extra_program_status = '';$extra_prgrm_cmd1 = '';$extra_program_status1 = ''; $extra_program_status2 = ''; $extra_program_status3 = '';$rel_prgrm_cmd1 = '';$rel_prgrm_cmd2 = '';
                                                    if ($count !='') {
                                                      for ($m=0; $m < count($count); $m++) {  

                                                        if ($count[$m] != '' && $count[$m] != 'undefined') {
                                                        $count_value++;
                                                        $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                        $extra_prgrm_cmd = explode(';',$IDP_data['0']['extra_prgrm_cmd']);
                                                        $extra_program_status = explode(';',$IDP_data['0']['extra_program_status']);
                                                        $rel_program_status2 = explode(';',$IDP_data['0']['rel_program_review_status']);
                                                        $rel_program_status3 = explode(';',$IDP_data['0']['rel_program_review']);
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
                                                    ?>
                                                      <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-4">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                         $topic = $topic1[$m];                                                                
                                                         $day = $day1[$m];                         
                                                         $faculty[$faculty2[$m]] = array('selected' => 'selected');
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
                                                        <div class="col-md-2" <?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['set_status']) && $IDP_data['0']['set_status'] == 'Pending') { ?>style="display: block;"<?php }else { ?> style="display: none;" <?php }?>>
                                                            <i class="fa fa-trash-o del_extra_program" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="<?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['Employee_id'])) { echo 'del_extra_program-'.$IDP_data['0']['Employee_id'].$l;
                                                        }?>" title="Delete" aria-hidden="true"></i>
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
echo CHtml::textField('extra_program_review',$extra_prgrm_cmd1,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 extra_program_review",'id'=>'extra_program_review-'.$m,$set_flag));
}
else
{
echo CHtml::textField('extra_program_review',$extra_prgrm_cmd1,$htmlOptions=array('class'=>"form-control col-md-4 extra_program_review",'id'=>'extra_program_review-'.$m));
}
                                                            
                                                        ?> </div>
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
                                                      <button type="button" class="btn btn-primary add_program" id="<?php echo $count_value.'-'.$IDP_data['0']['Employee_id']; ?>" style="float: left;">Add Program</button>
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
                                                        <label class="control-label col-md-2 bold" style="text-align: left;">Relationship</label>
                                                        <label class="control-label col-md-2 bold">Name of leader</label>
                                                        <label class="control-label col-md-1 bold">Number of Meetings planned
                                                        </label>
                                                        <label class="control-label col-md-2 bold">Target date</label>
                                                        <label class="control-label col-md-2 bold">Prgram Status</label>
                                                        <label class="control-label col-md-2 bold">Review</label>
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
                                                            // echo CHtml::DropDownList('faculty_email_id3','faculty_email_id3',$Cadre_id,array('class'=>'form-control faculty_email_id3','empty'=>'Select','options' => $faculty3)); 
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
                                                        <div class="col-md-2">
                                                            <div class="input-group input-medium date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
                                                            <?php
          	                                                        if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); 

	?>
                                                                       <input class="form-control target_date3" readonly="" type="text" value="<?php echo $rel2[0]; ?>"  id="target_date3">
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
                                                        <div  class="col-md-2">
<?php
if(isset($IDP_data['0']['midyear_status_flag']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
?>
<input type="radio" disabled="true" name='rel_completeion_type0' value="Yes" class='rel_completeion_type0' <?php if($extra_program_status2 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" disabled="true" name='rel_completeion_type0' value="No" class='rel_completeion_type0' <?php if($extra_program_status2 == 'No') { ?>checked='check'<?php } ?>>No   
<?php
}
else
{
 ?>
<input type="radio" name='rel_completeion_type0' value="Yes" class='rel_completeion_type0' <?php if($extra_program_status2 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                <input type="radio" name='rel_completeion_type0' value="No" class='rel_completeion_type0' <?php if($extra_program_status2 == 'No') { ?>checked='check'<?php } ?>>No   
<?php
}
?>
                                                                                                             
                                                        </div> 
                                                         <div class="col-md-2">
                                                        <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-2 rel_program_review",'id'=>'rel_program_review-0','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;'));
}
else
{
echo CHtml::textArea('rel_program_review0',$rel_prgrm_cmd1,$htmlOptions=array('class'=>"form-control col-md-2 rel_program_review",'id'=>'rel_program_review-0','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;'));
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
                                                        <div class="col-md-2">
                                                            <div class="input-group input-medium date" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 176px !important">
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
                                                        <div  class="col-md-2">
<?php
if(isset($IDP_data['0']['midyear_status_flag']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
?>
 <input type="radio" disabled="true" name='rel_completeion_type1' value="Yes" class='rel_completeion_type1' <?php if($extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                        <input type="radio" disabled="true" name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if($extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No 
<?php
}
else
{
 ?>
 <input type="radio" <?php echo $set_flag1; ?> name='rel_completeion_type1' value="Yes" class='rel_completeion_type1' <?php if($extra_program_status3 == 'Yes') { ?>checked='check'<?php } ?>>Yes
                                                        <input type="radio" <?php echo $set_flag1; ?> name='rel_completeion_type1' value="No" class='rel_completeion_type1' <?php if($extra_program_status3 == 'No') { ?>checked='check'<?php } ?>>No      
<?php
}
?>
                                                                                                         
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['midyear_status_flag']=='Approved') {
 echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 rel_program_review",'id'=>'rel_program_review-1','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;',$set_flag));
}
else
{
 echo CHtml::textArea('rel_program_review1',$rel_prgrm_cmd2,$htmlOptions=array('class'=>"form-control col-md-4 rel_program_review",'id'=>'rel_program_review-1','style'=>'width: 260px;height: 87px;max-width: 245px;max-height: 76px;'));
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
                                                        echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('class'=>"form-control col-md-4 project_deliverables",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;','disabled'=> "true")); ?> 
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
echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_mid_review",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;',$set_flag));
}
else
{
 echo CHtml::textArea('project_mid_review',$project_mid_review,$htmlOptions=array('class'=>"form-control col-md-4 project_mid_review",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;'));
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
                                    <!-- END PORTLET-->
                                </div>
                            </div>
                            <div class="row">
                             
                                <div class="col-md-12">
                                 <?php  
if(!(isset($emp_data) && ($IDP_data['0']['midyear_status_flag']=='Approved')))
                                    { ?>
                                <lable style="color: red;" id="term_lable"><input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/></label><lable id="blink_me"> I confirm this IDP is discussed and agreed
with <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?></lable>
                                         <button type="button" class="btn btn-primary send_for_appraisal1" id="<?php if(isset($emp_data['0']['Employee_id'])) { echo $emp_data['0']['Employee_id']; } ?>" style="float: right;">
                                        Approve Midyear IDP of <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?></button>
                                    <?php } ?>
                                </div>
                            </div>
         
        </div>  </div>  </div>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
         <script type="text/javascript">
             $(function(){
              $("body").on('click','.add_program',function(){
                   var base_url = window.location.origin;
                   var data = {
                    last_id : $(this).attr('id'),
                   };
                    $.ajax({
                            'type' : 'post',
                            'datatype' : 'html',
                            'data' : data,
                            'url' : base_url+'/index.php?r=IDP/add_program',
                            success : function(data)
                            {
                              $("#new_topic").html(data);
                            }
                    });
              });
                $(".send_for_appraisal1").click(function(){
                    var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;var chk_cmnts3 = 0;var program_status = '';var extra_program_status = '';var extra_chk_compl1 = 0;var extra_program_review_compl2 = 0;var extra_program_review_compl3 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                    var prgrm_cmd = ''; var extra_prgrm_cmd = ''; var topic = '';var date_value = '';var faculty_value = '';var chk = /[;]/; 
                     var extra_cnt = $("#extra_program_count").text().replace(/\s+/g, '');
                    for (var i = 0; i < $("#total_prog").text(); i++) {
                        //alert($("#extra_program_review-2"+state).val());
                       
                        if ($(".completeion_type"+i+':checked').val() === undefined)
                        {
                          chk_cmnts==0;
                        }
                        else if(chk.test($("#program_review-"+i).val()) || $("#program_review-"+i).val() === undefined || $("#program_review-"+i).val() == '')
                        {
                            chk_cmnts++;
                           $("#program_review-"+i).css('border-color','red');
                          chk_cmnts1==0;
                        }
else if($("#program_review-"+i).val() != 'undefined' && $("#program_review-"+i).val() != '' && $("#program_review-"+i).val().length>500)
{
extra_chk_compl1 = 1;
 $("#program_review-"+i).css('border-color','red');break;

} 
                        else
                        {extra_chk_compl1 = 0;

                           if (program_status == '') 
                            {
                               program_status = $(".completeion_type"+i+':checked').val();
                            }
                            else
                            {
                              program_status = program_status+';'+$(".completeion_type"+i+':checked').val();
                            }
                            if (prgrm_cmd == '') 
                            {
                                prgrm_cmd = $("#program_review-"+i).val();
                            }
                            else
                            {
                                prgrm_cmd = prgrm_cmd+';'+$("#program_review-"+i).val();
                            }                           
                            $("#program_review-"+i).css('border-color','');
                            chk_cmnts++;
                             chk_cmnts1++;                            
                        }
                    }

                    for (var state = 0; state < extra_cnt; state++) {
                                            
                        if ($(".extra_completeion_type"+state+':checked').val() === undefined)
                        {
                          chk_cmnts2==0;
                        }
                        else if($("#extra_program_review-"+state).val() === undefined || $("#extra_program_review-"+state).val() == '')
                        {
                          chk_cmnts2++;
                           $("#extra_program_review-"+state).css('border-color','red');
                          chk_cmnts3==0;
                        }
else if($("#extra_program_review-"+state).val() != 'undefined' && $("#extra_program_review-"+state).val() != '' && $("#extra_program_review-"+state).val().length>500)
                        {
                          extra_program_review_compl2 = 1;
 $("#extra_program_review-"+i).css('border-color','red');break;
                        }
                        else
                        {extra_program_review_compl2 = 0;
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
                    }
                    var chk_cmnts4 = 0;var rel_program_review = '';
                    for (var i = 0; i < 2; i++) {
                      if (chk.test($("#rel_program_review-"+i).val()) || $("#rel_program_review-"+i).val() === undefined || $("#rel_program_review-"+i).val() == '') 
                      {
                          $("#rel_program_review-"+i).css('border-color','red');
                          chk_cmnts4==0;
                      }
else if($("#rel_program_review-"+i).val() != 'undefined' && $("#rel_program_review-"+i).val() != '' && $("#rel_program_review-"+i).val().length>500)
                        {
                          extra_program_review_compl3 = 1;
 $("#rel_program_review-"+i).css('border-color','red');break;
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
                        chk_cmnts4++;
                      }
                    }
                    var chk_cmnts5 = 0;var rel_program_review_status = '';
                    for (var i = 0; i < 2; i++) {
                      if ($(".rel_completeion_type"+i+':checked').val() === undefined) 
                      {
                         $(".rel_completeion_type"+i+':checked').css('border-color','red');
                          chk_cmnts5==0;
                      }
                      else
                      {
                        if (rel_program_review_status == '') 
                        {
                           rel_program_review_status = $(".rel_completeion_type"+i+':checked').val();
                        }
                        else
                        {
                          rel_program_review_status = rel_program_review_status+';'+$(".rel_completeion_type"+i+':checked').val();
                        }
                        chk_cmnts5++;
                      }
                    }
                   
                    //alert($("#program_count").text());
                    if (chk_cmnts == 0 || chk_cmnts<$("#program_count").text()) 
                    {
                      //alert(chk_cmnts);
                         $('body').animate({
                            scrollTop: ( $("#maintable").parent().offset().top)
                        },500);
                          $("#error_spec1").text("Please select the status of all programs.");                          
                    }
 else if (extra_chk_compl1 == 1) 
                    {
                         $('body').animate({
                            scrollTop: ( $("#maintable").parent().offset().top)
                        },500);
                          $("#error_spec1").text("Maximum 500 characters are allowed for comments.");                          
                    }   
                    else if (chk_cmnts1 == 0 || chk_cmnts1<$("#program_count").text()) 
                    {
                         $('body').animate({
                            scrollTop: ( $("#maintable").parent().offset().top)
                        },500);
                          $("#error_spec1").text("Please fill the mid review for all the programs comments(Note : special character ';' not allowed).");                          
                    } 
                    else if (extra_cnt != '' && (chk_cmnts2 == 0 || chk_cmnts2<extra_cnt)) 
                    {
                         $('body').animate({
                            scrollTop: ( $("#maintable").parent().offset().top)
                        },500);
                          $("#error_spec1").text("Please select the status of extra programs enter by you.");                          
                    }  
 else if (extra_program_review_compl2 == 1) 
                    {
                         $('body').animate({
                            scrollTop: ( $("#maintable").parent().offset().top)
                        },500);
                          $("#error_spec1").text("Maximum 500 characters are allowed for comments.");                          
                    } 
                    else if (extra_cnt != '' && (chk_cmnts3 == 0 || chk_cmnts3<extra_cnt)) 
                    {
                         $('body').animate({
                            scrollTop: ( $("#maintable").parent().offset().top)
                        },500);
                          $("#error_spec1").text("Please fill the mid review for all the extra programs comments(Note : special character ';' not allowed).");                          
                    }
                    else if ($("#compare_designation").text() == 1 && (chk_cmnts5 == 0 || chk_cmnts5<2))
                    {
                         $('body').animate({
                            scrollTop: ( $("#error_spec1").parent().offset().top)
                        },500);
                          $("#error_spec2").text("Please select status for Development through developmental relationships.");                          
                    } 
 else if (extra_program_review_compl3 == 1) 
                    {
                         $('body').animate({
                            scrollTop: ( $("#error_spec1").parent().offset().top)
                        },500);
                         $("#error_spec2").text("Maximum 500 characters are allowed for comments.");                          
                    }      
                    else if ($("#compare_designation").text() == 1 && (chk_cmnts4 == 0 || chk_cmnts4<2)) 
                    {
                         $('body').animate({
                            scrollTop: ( $("#error_spec1").parent().offset().top)
                        },500);
                          $("#error_spec2").text("Please fill the mid review for Development through developmental relationships(Note : special character ';' not allowed).");                          
                    }  
                    else if ($("#compare_designation").text() == 1 && ($(".project_mid_status").find(':selected').val() === 'Select')) 
                      {
                         $(".project_mid_status").css('border-color','red');
                         $('body').animate({
                            scrollTop: ($("#error_spec4").parent().offset().top)
                        },500);
                          $("#error_spec4").text("Please select status for project.");  
                      } 
                    else if ($("#compare_designation").text() == 1 && ($(".project_mid_review").val() === undefined || $(".project_mid_review").val() == '')) 
                    {
                      $(".project_mid_status").css('border-color','');
                      $(".project_mid_review").css('border-color','red');
                         $('body').animate({
                            scrollTop: ($("#error_spec4").parent().offset().top)
                        },500);
                          $("#error_spec4").text("Please fill the mid review for Development through action learning projects(Note: maximum limit is 500).");                          
                    } 
else if (($(".project_mid_review").val() != undefined || $(".project_mid_review").val() != '') && $(".project_mid_review").val().length>500) 
                    {
                      $(".project_mid_status").css('border-color','');
                      $(".project_mid_review").css('border-color','red');
                         $('body').animate({
                            scrollTop: ($("#error_spec4").parent().offset().top)
                        },500);
                          $("#error_spec4").text("Maximum 500 characters are allowed for comments.");                          
                    }                             
                    else
                    {
                      $(".project_mid_status").css('border-color','');
                       $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                            $("#project_scope").css('border-color','');
                            $("#project_exclusion").css('border-color','');
                             $(".project_mid_review").css('border-color','');

                            $("#error_spec1").text("");
                            $("#error_spec2").text("");
                            $("#error_spec3").text("");
                            $("#error_spec4").text("");
                        var base_url = window.location.origin;
                        str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                        str1 = $("#emp_code").text().replace(/\s+/g, '');
                        $("#error_spec1").text("");
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
                            'url' : base_url+'/index.php?r=IDP/mid_save_data',
                            success : function(data)
                            {
                               if (data) 
                                {                                    
                                     if($("#term_condition:checked").val() != 'term_condition')
                                    {
                                        $("#blink_me").addClass('blink_me');
                                    }
				else if($("#prg_cnt").text() == 0)
                                {
					var data = {
                                            emp_id : $(".send_for_appraisal1").attr('id')
                                        };
                                    jQuery("#static_prg").modal('show');
					var base_url = window.location.origin;
	                                        $.ajax({
	                                            type : 'post',
	                                            datatype : 'html',
	                                            data : data,
	                                            url : base_url+'/index.php?r=IDP/mid_idp_approval',
	                                            success : function(data)
	                                            {
	                                                //alert(data);
	                                                //$("#term_lable").css('display','none');
	                                                //$(".send_for_appraisal1").css('display','none');
	                                                //jQuery("#static").modal('toggle');
	                                                //jQuery("#redirect_page").modal('show');
	                                               // $("#show_spin1").hide(); 
	                                            }
	                                        });
                                }
                                    else
                                    {
                                      $("#blink_me").removeClass('blink_me');
                                        var data = {
                                            emp_id : $(".send_for_appraisal1").attr('id')
                                        };
                                        $("#err").hide();
                                        jQuery("#static").modal('show');
                                        $("#continue_goal_set").click(function(){
                                            $("#show_spin1").show();
                                             var base_url = window.location.origin;
                                                $.ajax({
                                                    type : 'post',
                                                    datatype : 'html',
                                                    data : data,
                                                    url : base_url+'/index.php?r=IDP/mid_idp_approval',
                                                    success : function(data)
                                                    {
                                                       //alert(data);
                                                        $("#term_lable").css('display','none');
                                                        $(".send_for_appraisal1").css('display','none');
                                                        jQuery("#static").modal('toggle');
                                                        jQuery("#redirect_page").modal('show');
                                                        $("#show_spin1").hide(); 
                                                    }
                                                });
                                        });
                                    }
                                      
                                }

                            }
                        });
                        //alert(chk_cmnts);
                    }
                    
                });

              $("body").on('click','.del_extra_program',function(){
                var current_row = $(this).attr('id');
                var current_row_id = current_row.split('-');
                var str1 = $("#emp_code").text().replace(/\s+/g, '');
                var base_url = window.location.origin;
                var detail_data = {
                                current_row_id: current_row_id[2],     
                                emp_id : str1,
                            };

                            $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : detail_data,
                                'url' : base_url+'/index.php?r=IDP/del_extra_program',
                                success : function(data)
                                {
                                    alert(data);
                                    $("#refresh_class").load(location.href + "#refresh_class");
                                }
                            });

              });
                $(".save_data1").click(function(){
                    var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                    var prgrm_cmd = ''; var chk = /[;]/; var topic = '';var date_value = '';var faculty_value = '';var development_data = '';var number_of_meetings = '';var faculty_value1 = '';
                    for (var i = 1; i < $("#total_prog").text(); i++) {
                        if (get_list != '') 
                        {
                            for (var j = 0; j < get_list_value.length; j++) {
                                
                                    if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() == '' || chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {
                                        chk_cmnts = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');
                                       
                                    }  
                                    else if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() != '' || !chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','');
                                    }             
                            }
                        }
                        if ($("#program_cmd-"+i).val() != '' && !chk.test($("#program_cmd-"+i).val()))
                        {
                            if (prgrm_cmd == '') 
                            {
                                prgrm_cmd = i+'?'+$("#program_cmd-"+i).val();
                            }
                            else
                            {
                                prgrm_cmd = prgrm_cmd+';'+i+'?'+$("#program_cmd-"+i).val();
                            }
                            $("#program_cmd-"+get_list_value[j]).css('border-color','');
                             chk_cmnts++;
                        }     
                        
                    }
                    for (var i = 1; i <= 2; i++) {
                       if (($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select'))) || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && !$.isNumeric($("#days_required"+i).val()) && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))))
                        {
                            $(".topic"+i).css('border-color','red');
                            $("#days_required"+i).css('border-color','red');
                            $("#faculty_email_id"+i).css('border-color','red');
                            chk_cmnts1++;
                        }
                        else
                        { chk_cmnts1== 0;
                            if (topic == '') 
                            {
                                topic = $(".topic"+i).val();
                                date_value = $("#days_required"+i).val();
                                faculty_value = $("#faculty_email_id"+i).find(":selected").val();
                            }
                            else
                            {
                                topic = topic+';'+$(".topic"+i).val();
                                date_value = date_value+';'+$("#days_required"+i).val();
                                faculty_value = faculty_value+';'+$("#faculty_email_id"+i).find(":selected").val();
                            }
                            $(".topic"+i).css('border-color','');
                            $("#days_required"+i).css('border-color','');
                            $("#faculty_email_id"+i).css('border-color','');
                            $("#error_spec1").text("");
                        }
                    }

                    for (var i = 3; i <= 4; i++) {
                       if (($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()===undefined))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()!='' && !$.isNumeric($("#number_of_meetings"+i).val()) && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()=='undefined'))))
                        {
                            $(".target_date"+i).css('border-color','red');
                            $("#number_of_meetings"+i).css('border-color','red');
                            $("#faculty_email_id"+i).css('border-color','red');
                            chk_cmnts2++;
                        }
                        else
                        {
                            chk_cmnts2== 0;
                            if (development_data == '') 
                            {
                                development_data = $("#target_date"+i).val();
                                number_of_meetings = $("#number_of_meetings"+i).val();
                                faculty_value1 = $("#faculty_email_id"+i).val();
                            }
                            else
                            {
                                development_data = development_data+';'+$("#target_date"+i).val();
                                number_of_meetings = number_of_meetings+';'+$("#number_of_meetings"+i).val();
                                faculty_value1 = faculty_value1+';'+$("#faculty_email_id"+i).val();
                            }
                            $(".target_date"+i).css('border-color','');
                            $("#number_of_meetings"+i).css('border-color','');
                            $("#faculty_email_id"+i).css('border-color','');
                            $("#error_spec2").text("");
                        }
                    }
                    
                    if (chk_cmnts == 0) 
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                          $("#error_spec1").text("Please fill all required fields for program comments(Note : special character ';' not allowed).");                          
                    }
                    else if(chk_cmnts1 != 0)
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                          $("#error_spec1").text("Please provide all the details if you need other program.");   
                    }
                    else if(chk_cmnts2 != 0)
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk2").first().offset().top)
                        },500);
                          $("#error_spec2").text("Please provide all the details for Development through developmental relationships.");   
                    }
                    else
                    {
                        $("#error_spec1").text("");
                        $("#error_spec2").text("");
                        if($("#project_title1").val() == '' || $("#project_title1").val().length>500)
                        {
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_title1").css('border-color','red');
                                $("#error_spec3").text("Please provide project title(Note: 500characters are maximum limit).");   
                        }
                        else if($("#review_date").val() == '')
                        {
                             $("#project_title1").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#review_date").css('border-color','red');
                                $("#error_spec3").text("Please provide project review date.");
                        }
                        else if($("#target_end_date").val() == '')
                        {
                            $("#review_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#target_end_date").css('border-color','red');
                                $("#error_spec3").text("Please provide project target end date.");
                        }
                        else if($("#project_scope").val() == '' || $("#project_scope").val().length>500)
                        {
                            $("#target_end_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_scope").css('border-color','red');
                                $("#error_spec3").text("Please provide project scope(Note: 500characters are maximum limit).");   
                        }
                        else if($("#project_exclusion").val() == '' || $("#project_exclusion").val().length>500)
                        {
                             $("#project_scope").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_exclusion").css('border-color','red');
                                $("#error_spec3").text("Please provide project exclusion(Note: 500characters are maximum limit).");   
                        }
                        else
                        {
                             str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                            str1 = $("#emp_code").text().replace(/\s+/g, '');
                            var base_url = window.location.origin;
                             var detail_data = {
                                prgrm_cmd: prgrm_cmd,
                                topic: topic,
                                date_value: date_value,
                                faculty_value: faculty_value,
                                development_data: development_data,
                                number_of_meetings: number_of_meetings,
                                faculty_value1: faculty_value1,
                                project_title: $("#project_title1").val(),
                                review_date: $("#review_date").val(),
                                target_end_date: $("#target_end_date").val(),
                                project_scope: $("#project_scope").val(),
                                project_exclusion: $("#project_exclusion").val(),
                                emp_code : str1,
                                Reporting_officer1_id: str
                            };

                            $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : detail_data,
                                'url' : base_url+'/index.php?r=IDP/save_data1',
                                success : function(data)
                                {
                                    alert(data);
                                }
                            });

                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                            $("#project_scope").css('border-color','');
                            $("#project_exclusion").css('border-color','');
                            $("#error_spec1").text("");
                            $("#error_spec2").text("");
                            $("#error_spec3").text("");
                            alert(chk_cmnts);
                        }
                        
                    }
                    
                });
             });
         </script>
