<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
<script>
  $(function(){   
                $(".date_pickup").datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
});
</script>
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
                            <div class="row">
                                <div class="col-md-12">
                                 <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                              <h4 class="modal-title">Confirmation</h4>
                                          </div>
                                          <div class="modal-body">
                                              <p> Do want to send IDP for approval? </p>
                                          </div>
                                          <div class="modal-footer">
                                              <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;display: none"></i>
                                              <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>                                              
                                              <button type="button" class="btn border-blue-soft" id="continue_IDP_set">OK</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
<?php
$set_flag = 'disabled';
					if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved')
					{
					//$set_flag = "'disabled'=>'<?php echo $set_flag; ?>'";
					} 
$set_flag1 = "'disabled'= 'false'";
					if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved')
					{
					$set_flag1 = "'disabled'= 'true'";
					} 


?>
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                
                                                <span class="caption-subject bold uppercase" style="color:#337ab7;">IDP</span>
                                            </div>
                                             <lable id="compare_designation"  style="display: none"><?php if(isset($designation_flag)) { echo $designation_flag; } ?></lable>
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
                                                        <span class="bold">Year</span></label></div>

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
                                        <!-- <th>No</th> -->
                                        <th>Name of program</th>
                                        <th>Faculty</th>
                                        <th>Days</th>
                                        <th>Please explain why the training is needed</th>
                                    </thead>
                                    <tbody>
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
                                             <tr class="error_row_chk"> 
                                               <!--  <td><?php echo $i; ?></td>    -->                
                                                <td class="prog_name" id="<?php echo $i; ?>"> <?php echo $program_data_result[$i]['program_name']; ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
                                                <?php if($program_data_result[$i]['need'] == 2 && $program_data_result[$i]['location'] != '' && $program_data_result[$i]['location'] != 'undefined') { ?><label id = 'complusory_prg<?php echo $i; ?>' style="color: red;display: none"><?php echo $program_data_result[$i]['location']; ?></label><?php } ?>
                                                </td>
                                                <td> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
                                                <td> <?php echo $program_data_result[$i]['training_days']; ?> </td>
                                                <td class="col-md-4">
                                                <?php 
                                                $cmnt = '';
                                                if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                                                    $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                                                    for ($j=0; $j < count($cmt2); $j++) {
                                                        $cmt1 = explode('?', $cmt2[$j]);
                                                        if ($i == $cmt1[0]) {                                                            
                                                             $cmnt = $cmt1[1];
                                                        }
                                                    }
                                                }
                                                else
                                                {
                                                    $cmnt = '';
                                                }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i));
}
else
{
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i));
}
                                                ?> </td>
                                            </tr>
                                    <?php 
                                       }
                                    }
                                    ?>
                                    <label id="compulsory_id" style="display: none"><?php echo $compulsory; ?></label>
                                    </tbody>

                                 </table>     
                                                </div>
                                                        <div class="form-group error_row_chk2">
                                                    <label class="col-md-12 control-label">
                                                      <span class="bold" style="color:#337ab7;font-size: 14px;float: left;">If you need a program that is not mentioned above, please use the space below. Please note this program may be offered if at least 20 people request for it. 
                                                    </span></label>
                                                    
                                                </div>

                                                <div class="form-group">
                                                       <!--  <div class="col-md-2 bold">No</div> -->
                                                        <div class="col-md-4 bold">
                                                          Topics required
                                                        </div>
                                                        <div class="col-md-2 bold">No. of days</label></div>
                                                        <div class="col-md-4 bold">
                                                         Internal faculty name
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-4">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                         if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
                                                                $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                                $topic = $topic1[0];
                                                                $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                                $day = $day1[0];
                                                                $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                                // $faculty1 = explode('?',$faculty2[0]);                           
                                                                $faculty[$faculty2[0]] = array('selected' => 'selected');
                                                                 //print_r($faculty);die();
                                                         }
                                                        if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('topic1',$topic,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic1"));
}
else
{
  echo CHtml::textField('topic1',$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic1"));
} 
                                                         ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('days_required1',$day,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 days_required1")); 
}
else
{
 echo CHtml::textField('days_required1',$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required1")); 
} 

?> 
                                                        </div>
                                                        <div class="col-md-4">
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::DropDownList('faculty_email_id1','faculty_email_id1',$Cadre_id,array('disabled' => 'disabled','class'=>'form-control faculty_email_id1','empty'=>'Select','options' => $faculty));
}
else
{
 echo CHtml::DropDownList('faculty_email_id1','faculty_email_id1',$Cadre_id,array('class'=>'form-control faculty_email_id1','empty'=>'Select','options' => $faculty));
}
                                                             ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">2</label></div> -->
                                                        <div class="col-md-4">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                             if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
                                                                    $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                                    if (isset($topic1[1])) {
                                                                       $topic = $topic1[1];
                                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                                        $day = $day1[1];
                                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                                        // $faculty1 = explode('?',$faculty2[0]);                           
                                                                        $faculty[$faculty2[1]] = array('selected' => 'selected');
                                                                    }
                                                             }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('topic2',$topic,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic2"));
}
else
{
 echo CHtml::textField('topic2',$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic2"));
}
                                                             ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('days_required2',$day,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 days_required2"));
}
else
{
  echo CHtml::textField('days_required2',$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required2")); 
}

?> 
                                                        </div>
                                                        <div class="col-md-4">
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::DropDownList('faculty_email_id2','faculty_email_id2',$Cadre_id,array('disabled' => 'disabled','class'=>'form-control faculty_email_id2','empty'=>'Select','options' => $faculty,$set_flag));
}
else
{
  echo CHtml::DropDownList('faculty_email_id2','faculty_email_id2',$Cadre_id,array('class'=>'form-control faculty_email_id2','empty'=>'Select','options' => $faculty,$set_flag));
}
                                                            ?>
                                                        </div>
                                                    </div>

                                                <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec1"  style="color: red;float: right;"></lable></div>
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
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Relationship</label>
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Name of leader</label>
                                                        <label class="control-label col-md-2 bold" style="text-align: left;">Number of Meetings planned
                                                        </label>
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Target date</label>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <label class="control-label col-md-1">1</label> -->
                                                        <label class="control-label col-md-3" style="text-align: left;">Coaching through leader in own function for functional inputs</label>
                                                        <div class="col-md-3">
                                                            <?php 
                                                            $faculty3 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[0])) {
                                                                $faculty3 = $faclty[0];
                                                              }
                                                              //$faculty3[$faclty[0]] = array('selected' => 'selected');
                                                            }
                                            if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 faculty_email_id3",'id'=>'faculty_email_id3'));
}
else
{
  echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('class'=>"form-control col-md-4 faculty_email_id3",'id'=>'faculty_email_id3'));
}
                                                             
                                                            ?>
                                                          </div>
                                                       <div class="col-md-2">
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 number_of_meetings3",'id'=>'number_of_meetings3'));
}
else
{
  echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('class'=>"form-control col-md-4 number_of_meetings3",'id'=>'number_of_meetings3'));
}
                                                               ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date3 date_pickup" <?php echo $set_flag1; ?> readonly="" type="text" value="<?php echo $rel2[0]; ?>" id="target_date3">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date3 date_pickup" readonly="" type="text"  id="target_date3">
                                                                 <?php   }
                                                                ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                       <!--  <label class="control-label col-md-1">2</label> -->
                                                        <label class="control-label col-md-3" style="text-align: left;">Mentoring through leader from different function for behavioural inputs</label>
                                                        <div class="col-md-3">
                                                            <?php 
                                                            $faculty4 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[1])) {
                                                                $faculty4 = $faclty[1];
                                                              }
                                                              //$faculty4[$faclty[1]] = array('selected' => 'selected');
                                                            }
                                                            if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 faculty_email_id4",'id'=>'faculty_email_id4'));
}
else
{
   echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('class'=>"form-control col-md-4 faculty_email_id4",'id'=>'faculty_email_id4'));
}
                                                           
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
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 number_of_meetings4",'id'=>'number_of_meetings4'));
}
else
{
   echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('class'=>"form-control col-md-4 number_of_meetings4",'id'=>'number_of_meetings4'));
}
                                                           ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            
                                                            <?php
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date4 date_pickup" <?php echo $set_flag1; ?> readonly="" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date4 date_pickup" readonly="" type="text"  id="target_date4">
                                                                 <?php   }
                                                                ?>
                                                        </div>
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
echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_title1"));
}
else
{
   echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('class'=>"form-control col-md-4 project_title1"));
}
                                                        ?>    
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold">Review date</label>
                                                    <div class="col-md-2">
                                                       
                                                         <?php
                                                                  if (isset($IDP_data['0']['project_review_date'])) { ?>
                                                                       <input class="form-control" <?php echo $set_flag1; ?>  type="text" value="<?php echo $IDP_data['0']['project_review_date']; ?>" id="review_date">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control" type="text" id="review_date">
                                                                 <?php   }
                                                                ?>
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Target end date</label>
                                                    <div class="col-md-2">
                                                        
                                                                <?php
                                                                  if (isset($IDP_data['0']['project_end_date'])) { ?>
                                                                       <input class="form-control date_pickup" <?php echo $set_flag1; ?> readonly="" type="text" value="<?php echo $IDP_data['0']['project_end_date']; ?>" id="target_end_date">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control date_pickup" readonly="" type="text" id="target_end_date">
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
                                                        echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('class'=>"form-control col-md-4 project_scope",$set_flag)); ?> 
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
   echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('class'=>"form-control col-md-4 project_exclusion"));
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
 echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_deliverables",'style'=>'max-width: 846px;width: 936px;height: 214px;max-height: 67px;'));
}
else
{
    echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('class'=>"form-control col-md-4 project_deliverables",'style'=>'max-width: 846px;width: 936px;height: 214px;max-height: 67px;'));
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
     echo CHtml::textArea('exp',$expected,$htmlOptions=array('class'=>"form-control col-md-4 learn_from"));
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
     echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 reviewvers_name"));
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
                                <div class="col-md-offset-3 col-md-9">

                                 <button type="button" class="btn btn-primary save_data1" style="float: right;">
                                    Send IDP for approval</button>
                                
</div>
                            </div>
         
        </div>  </div>  </div>
       <label id = 'company_loc'><?php if(isset($emp_data['0']['company_location'])) { echo $emp_data['0']['company_location']; } ?></label>
         <script type="text/javascript">
             $(function(){
$(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
               $(".save_data").click(function(){
                    var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_compl = 0;var chk_compl1 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                    var prgrm_cmd = ''; var topic = '';var date_value = '';var faculty_value = '';var chk = /[;]/;
                    for (var i = 0; i < $("#total_prog").text(); i++) {
                        if (get_list != '') 
                        {
                            for (var j = 0; j < get_list_value.length; j++) {                                
                                    if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() === undefined || $("#program_cmd-"+get_list_value[j]).val() == '' || chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {
                                        chk_cmnts = 0;chk_compl = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                       
                                    } 
else if($("#program_cmd-"+get_list_value[j]).val().length>500)
{
chk_cmnts = 0;chk_compl = 0;chk_compl1 = 1;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
} 
                                    else if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() != 'undefined' && $("#program_cmd-"+get_list_value[j]).val() != '' || !chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {chk_compl1 = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','');chk_compl++;
                                    }         
                            }
                        }
if($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' && $("#program_cmd-"+i).val().length>500)
{
chk_compl1 = 1;
 $("#program_cmd-"+i).css('border-color','red');break;

}
else if ($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' && !chk.test($("#program_cmd-"+i).val()))
                        {chk_compl1 = 0;
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
                        // else
                        // {
                        //   chk_cmnts = 0;
                        // }                         
                    }
                    //alert(chk_compl);
                    for (var i = 1; i <= 2; i++) {
                       if (($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select') && ($("#days_required"+i).val()!='' && !$.isNumeric($("#days_required"+i).val()))))
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
                    
if (chk_compl1 == 1) 
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                          $("#error_spec1").text("Maximum 500 characters are allowed for program comments.");                          
                    }
else if (chk_cmnts == 0 || chk_compl<get_list_value.length) 
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
                    else
                    {
                        var base_url = window.location.origin;
                        str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                        str1 = $("#emp_code").text().replace(/\s+/g, '');
                        $("#error_spec1").text("");
                        var detail_data = {
                            prgrm_cmd: prgrm_cmd,
                            topic: topic,
                            date_value: date_value,
                            faculty_value: faculty_value,
                            emp_code : str1,
                            Reporting_officer1_id: str
                        };                       
                        $.ajax({
                            'type' : 'post',
                            'datatype' : 'html',
                            'data' : detail_data,
                            'url' : base_url+'/index.php?r=IDP/save_data',
                            success : function(data)
                            {
                              jQuery("#static").modal('show');
                              $("#continue_IDP_set").click(function(){
                                $("#updation_spinner").css('display','block');
                                     $.ajax({
                                    'type' : 'post',
                                    'datatype' : 'html',
                                    'data' : detail_data,
                                    'url' : base_url+'/index.php?r=IDP/send_for_approval',
                                    success : function(data)
                                    {
                                      jQuery("#static").modal('toggle');
                                      $("#updation_spinner").css('display','none');
                                        $("#err").show();  
                                        $("#err").fadeOut(6000);
                                        $("#err").text("Notification Send to appraiser Successfully.");
                                        $("#err").addClass("alert-success");  

                                    }
                                  });
                                  });
                            }
                        });
                        //alert(chk_cmnts);
                    }
                    
                });


                $(".save_data1").click(function(){
                    var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;var chk_compl = 0;var chk_compl1 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                    var prgrm_cmd = ''; var chk = /[;]/; var topic = '';var date_value = '';var faculty_value = '';var development_data = '';var number_of_meetings = '';var faculty_value1 = '';
                    for (var i = 0; i < $("#total_prog").text(); i++) {
                        if (get_list != '') 
                        {
                            for (var j = 0; j < get_list_value.length; j++) {                                
                                    if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() === undefined || $("#program_cmd-"+get_list_value[j]).val() == '' || chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {
                                        chk_cmnts = 0;chk_compl = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                       
                                    } 
                                    else if($("#program_cmd-"+get_list_value[j]).val().length>500)
                                    {
                                    chk_cmnts = 0;chk_compl = 0;chk_compl1 = 1;
                                                                            $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                    }
                                    else if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() != 'undefined' && $("#program_cmd-"+get_list_value[j]).val() != '' || !chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {chk_compl1 = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','');chk_compl++;
                                    }         
                            }
                        }
                       if ($("#complusory_prg"+i).text() != '' && $("#complusory_prg"+i).text() != 'undefined')
                        {
                           var comp_loc = $("#complusory_prg"+i).text();
                                    var comp_loc_list = comp_loc.split(';');
                                  for (var k = 0; k < comp_loc_list.length; k++) { 
                                      if (comp_loc_list[k] == $("#company_loc").text() && ($("#program_cmd-"+i).val() === undefined || $("#program_cmd-"+i).val() == '' || chk.test($("#program_cmd-"+i).val())))
                                        {  
                                          //alert(comp_loc_list[k]);
                                            chk_cmnts = 0;chk_compl = 0;
                                            $("#program_cmd-"+i).css('border-color','red');break;
                                           
                                        }  
                                        else if (comp_loc_list[k] != $("#company_loc").text() && ($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' || !chk.test($("#program_cmd-"+i).val())))
                                        {chk_compl1 = 0;
                                            $("#program_cmd-"+i).css('border-color','');chk_compl++;
                                        }   
                                   }  
                        }
                        
                        if (!($("#program_cmd-"+i).val() === undefined || $("#program_cmd-"+i).val() == '' || chk.test($("#program_cmd-"+i).val())))
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
                            $("#program_cmd-"+i).css('border-color','');
                             chk_cmnts++;
                        }                
                    }
                    for (var i = 1; i <= 2; i++) {
                       if (($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select') && ($("#days_required"+i).val()!='' && !$.isNumeric($("#days_required"+i).val()))))
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
                       if (($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()!='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()===undefined))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()!='' && !$.isNumeric($("#number_of_meetings"+i).val()) && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()=='undefined'))))
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
                                Project_deliverables: $(".project_deliverables").val(),
                                learn_from_project: $(".learn_from").val(),
                                Reviewer: $(".reviewvers_name").val(),
                                emp_code : str1,
                                Reporting_officer1_id: str
                            };

                           if (chk_cmnts == 0 || chk_compl<get_list_value.length) 
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
                           $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#target_end_date").css('border-color','red');
                                $("#error_spec3").text("Please provide project target end date.");
                        }
                        else if($("#project_scope").val() == '' || $("#project_scope").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_scope").css('border-color','red');
                                $("#error_spec3").text("Please provide project scope(Note: 500characters are maximum limit).");   
                        }
                        else if($("#project_exclusion").val() == '' || $("#project_exclusion").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_exclusion").css('border-color','red');
                                $("#error_spec3").text("Please provide project exclusion(Note: 500characters are maximum limit).");   
                        }
                         else if($(".project_deliverables").val() == '' || $(".project_deliverables").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $(".project_deliverables").css('border-color','red');
                                $("#error_spec4").text("Please provide comments in project deliverables field(Note: 500 characters are maximum limit).");   
                        }
                        else if($(".learn_from").val() == '' || $(".learn_from").val().length>300)
                        {
                          $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $(".project_deliverables").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $(".learn_from").css('border-color','red');
                                $("#error_spec4").text("Please provide comments in what is expected to learn from this project(Note: 300 characters are maximum limit).");   
                        }
                        else if($(".reviewvers_name").val() == '' || $(".reviewvers_name").val().length>50)
                        {
                          $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $(".project_deliverables").css('border-color','');
                             $(".learn_from").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $(".reviewvers_name").css('border-color','red');
                                $("#error_spec4").text("Please provide reviewer(s) name(Note: 50 characters are maximum limit).");   
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
                                Project_deliverables: $(".project_deliverables").val(),
                                learn_from_project: $(".learn_from").val(),
                                Reviewer: $(".reviewvers_name").val(),
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
                                   jQuery("#static").modal('show');
                              $("#continue_IDP_set").click(function(){
                                $("#updation_spinner").css('display','block');
                                     $.ajax({
                                    'type' : 'post',
                                    'datatype' : 'html',
                                    'data' : detail_data,
                                    'url' : base_url+'/index.php?r=IDP/send_for_approval',
                                    success : function(data)
                                    {
                                      jQuery("#static").modal('toggle');
                                      $("#updation_spinner").css('display','none');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $("#err").text("Notification Send to appraiser Successfully.");
                                      window.setTimeout(function() {
    window.location.href = base_url+'/index.php/User_dashboard';
}, 1000);  
                                    }
                                  });
                                  });
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
                            $("#error_spec4").text("");
                            //alert(chk_cmnts);
                        }
                        
                    }
                    
                    
                });
             });
         </script>
