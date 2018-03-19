
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Employee Record</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Employee Master
                    </h3>
            <div class="container-fluid">
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">                            
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <?php 
                                    $form=$this->beginWidget('CActiveForm', array(
                                       // 'id'=>'user-form',                                       
                                            'enableAjaxValidation' => false,
                                            'enableClientValidation' => true,
                                            'clientOptions' => array(
                                                    'validateOnSubmit' => true,
                                                    'afterValidate' => 'js:checkErrors'

                                            ),
                                            'stateful' => false,
                                            'htmlOptions' => array(
                                                'class'=>'form-horizontal',
                                                'enctype' => 'multipart/form-data'
                                                ),
                                    ));
                                    ?>
                               
                                          
                                <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                                <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                                <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

                                  <script>
                                  var $j = jQuery.noConflict();///////// important//////////////
                                  jQuery(function() {
                 
                                   $(".cadre").change(function(){
                                            var grade = {
                                                'grade' :$(this).find(':selected').text(),
                                            };
                                            //alert($(this).find(':selected').text());
                                            var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'html',
                                                'data' : grade,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/Newemployee/Designation_change',
                                               
                                                success : function(data)
                                                {
                                                   // alert("tyrtyr");
                                                    //$('.designation').html(data);
                                                }
                                            });
                                        }); 




                                        

                                    $(".cluster_name").change(function(){
                                            var cluster_value = {
                                                'cluster_value' : $(this).find(':selected').val(),
                                            };
                                            //alert(cluster_value);
                                            var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                'data' : cluster_value,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/Newemployee/cluster_head',
                                               
                                                success : function(data)
                                                {
                                                    //alert(data);
                                                    var detail = jQuery.parseJSON(data);
                                                    //$('.cluster_appraiser').html(detail[0]);
                                                    // $('.department').html(detail[1]);
                                                }
                                            });
                                        });

                             



                                    $j( ".DOB" ).datepicker({dateFormat: 'yy-mm-dd'});
 $j( ".new_kra_till_date" ).datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
 var selecteddate=  $( "#rdc" ).datepicker( "getDate" );
//alert(selecteddate);
                                    $j( ".joining_date" ).datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
                                    $( ".joining_date1" ).datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
                                    $(".DOB").keyup(function(){

                                        $(this).val("");
                                    });
                                    $(".joining_date").keyup(function(){
                                        //alert("hi");
                                        $(this).val("");
                                    });
                                    $(".joining_date1").keyup(function(){
                                        //alert("hi");
                                        $(this).val("");
                                    });

$(".new_kra_till_date").keyup(function(){
                                        //alert("hi");
                                        $(this).val("");
                                    });
                                  });



                                  



                                  </script>
                                  <style media="all" type="text/css">
      
                    #err{ 
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
   <script>
       $(function(){
          $('body').on('change','.employee_status',function(){
              if($(this).val() == 'Retiring')
              {
                   $('#retire_date1').css('display','block');
                   $('#last_working_date1').css('display','none');
              }
          });
            $('body').on('change','.employee_status',function(){
                if($(this).val() == 'Left' || $(this).val() == 'Resign')
                {
                    $('#last_working_date1').css('display','block');
                    $('#retire_date1').css('display','none');
                }
          });
          $('body').on('change','.employee_status',function(){
                if($(this).val() == 'Active')
                {
                    $('#last_working_date1').css('display','none');
                    $('#retire_date1').css('display','none');
                }
          });
       });
   </script>
                                 
                                  <div class="portlet box " style='border:1px solid #337ab7;'  id='new_kra'>
                                    <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                        <div class="caption">
                                            Employee Profile</div>                                       
                                    </div>
                                     <label id="err" style="display: none"></label>
                                    <div class="portlet-body">
                                    <div>
                                             <div class="row">
                                    <div class="col-md-12">
                                    <div class="errorMessage" id="formResult"></div>
                                    <div class="col-md-2">
                                        <div id="AjaxLoader" style="display: none"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ajax-loader.gif"></img></div>
                                         <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                             <?php 
                                                     $img = '';
                                                    if (isset($employee_data['0']['Image'])) {  $img = $employee_data['0']['Image']; }else { $img = ''; }
                                                     ?>
                                                     
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $img?>" alt=""> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                           
                                        </div>
                                        </div>
                                        <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3">
                                            <?php 
                                             $emp_fname = '';
                                             if (isset($employee_data['0']['Emp_fname'])) {  $emp_fname = $employee_data['0']['Emp_fname']; }else { $emp_fname = ''; }
                                             echo CHtml::textField('emp_fname',$emp_fname,$htmlOptions=array('class'=>"form-control emp_fname",'disabled'=> "true")); ?>
                                        </div>
                                        <div class="col-md-3">
                                         <?php 
                                             $Emp_mname = '';
                                             if (isset($employee_data['0']['Emp_mname'])) {  $Emp_mname = $employee_data['0']['Emp_mname']; }else { $Emp_mname = ''; }
                                             echo CHtml::textField('emp_mname',$Emp_mname,$htmlOptions=array('class'=>"form-control emp_mname",'disabled'=> "true")); ?>
                                        </div>
                                        <div class="col-md-3">
                                        <?php 
                                             $Emp_lname = '';
                                            if (isset($employee_data['0']['Emp_lname'])) {  $Emp_lname = $employee_data['0']['Emp_lname']; }else { $Emp_lname = ''; }
                                             echo CHtml::textField('emp_lname',$Emp_lname,$htmlOptions=array('class'=>"form-control emp_lname",'disabled'=> "true")); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="control-label col-md-3">Employee ID
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                       <?php 
                                             $Employee_id = '';
                                            if (isset($employee_data['0']['Employee_id'])) {  $Employee_id = $employee_data['0']['Employee_id']; }else { $Employee_id = ''; }
                                             echo CHtml::textField('Employee_id',$Employee_id,$htmlOptions=array('class'=>"form-control Employee_id",'disabled'=> "true")); ?>
                                        <?php 
                                             $Employee_atd_code = '';
                                            if (isset($employee_data['0']['Employee_atd_code'])) {  $Employee_atd_code = $employee_data['0']['Employee_atd_code']; }else { $Employee_id = ''; }
                                             echo CHtml::textField('Employee_atd_code',$Employee_id,$htmlOptions=array('class'=>"form-control Employee_atd_code",'disabled'=> "true",'style'=>'display:none')); ?>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">        
                                         <label class="control-label col-md-3">Date Of Birth
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                       <?php 
                                             $DOB = '';
                                            if (isset($employee_data['0']['DOB'])) {$DOB = $employee_data['0']['DOB']; }else { $DOB = ''; }
                                             echo CHtml::textField('DOB',$DOB,$htmlOptions=array('class'=>"form-control DOB",'disabled'=> "true")); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">        
                                        <label class="control-label col-md-3">Joining Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                       <?php 
                                             $joining_date = '';
                                            if (isset($employee_data['0']['joining_date'])) {  $joining_date = $employee_data['0']['joining_date']; }else { $joining_date = ''; }
                                             echo CHtml::textField('joining_date',$joining_date,$htmlOptions=array('class'=>"form-control joining_date",'disabled'=> "true")); ?>
                                        </div>
                                    </div>
                                    
                                     

                                    <div class="form-group">   
                                        <label class="control-label col-md-3">Phone Number
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php 
                                             $mobile_number = '';
                                            if (isset($employee_data['0']['mobile_number'])) {  $mobile_number = $employee_data['0']['mobile_number']; }else { $mobile_number = ''; }
                                             echo CHtml::textField('mobile_number',$mobile_number,$htmlOptions=array('class'=>"form-control mobile_number",'disabled'=> "true")); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">       
                                        <label class="control-label col-md-3">PAN Number
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php 
                                             $PAN_number = '';
                                            if (isset($employee_data['0']['PAN_number'])) {  $PAN_number = $employee_data['0']['PAN_number']; }else { $PAN_number = ''; }
                                             echo CHtml::textField('PAN_number',$PAN_number,$htmlOptions=array('class'=>"form-control PAN_number",'disabled'=> "true")); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email ID
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                         <?php 
                                             $Email_id = '';
                                            if (isset($employee_data['0']['Email_id'])) {  $Email_id = $employee_data['0']['Email_id']; }else { $Email_id = ''; }
                                             echo CHtml::textField('Email_id',$Email_id,$htmlOptions=array('class'=>"form-control Email_id",'disabled'=> "true")); ?>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Gender
                                        <span class="required"> * </span>
                                    </label>
                                         <div class="col-md-4">
                                        <?php
                                             $gender1 = '';
                                             $gender2 = '';
                                            if (isset($employee_data['0']['Gender']) && (isset($employee_data['0']['Gender']) =='M' || isset($employee_data['0']['Gender']) =='Male')) {  $gender1 = $employee_data['0']['Gender']; }else { $gender1 = ''; }
                                            if (isset($employee_data['0']['Gender']) && (isset($employee_data['0']['Gender']) =='F' || isset($employee_data['0']['Gender']) =='Female')) {  $gender2 = $employee_data['0']['Gender']; }else { $gender2 = ''; }
                                        echo $form->radioButton($model, 'Gender', array(
                                            'value'=>'Male','class'=>'gender','checked'=> ($gender1 == "Male" || $gender1 == "M") ? 'checked' : '','uncheckValue'=>null
                                        )).' Male '; echo $form->radioButton($model, 'Gender', array(
                                            'value'=>'Female','class'=>'gender','checked'=> ($gender2 == "Female" || $gender2 == "F") ? 'checked' : '', 'uncheckValue'=>null
                                        )).' Female ';
                                        ?>
                                        <?php echo $form->error($model,'Gender',array('style'=>'color: red')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nationality
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                         <?php 
                                         $nationality = '';
                                            if (isset($employee_data['0']['Nationality']) && $employee_data['0']['Nationality']=='Indian') {  $nationality = $employee_data['0']['Nationality']; }else { $nationality = 'Other'; }
                                         echo $form->radioButton($model,'Nationality',array('value'=>'Indian','class'=>'nationality','checked'=> $nationality=='Indian' ? 'checked' : '','uncheckValue'=>null)).'Indian'; ?>
                                         <?php echo $form->radioButton($model,'Nationality',array('value'=>'Other','class'=>'nationality','checked'=> $nationality=='Other' ? 'checked' : '', 'uncheckValue'=>null)).'Other'; ?>
                                         </div>
                                        <?php echo $form->error($model,'Nationality',array('style'=>'color: red')); ?>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3"> Present Address
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php 
                                             $Present_address = '';
                                            if (isset($employee_data['0']['Present_address'])) {  $Present_address = $employee_data['0']['Present_address']; }else { $Present_address = ''; }
                                             echo CHtml::textField('Present_address',$Present_address,$htmlOptions=array('class'=>"form-control Present_address",'disabled'=> "true")); ?>
                                        </div>                                       
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Permanent Address
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php 
                                             $Permanent_address = '';
                                            if (isset($employee_data['0']['Permanent_address'])) {  $Permanent_address = $employee_data['0']['Permanent_address']; }else { $Permanent_address = ''; }
                                             echo CHtml::textField('Permanent_address',$Permanent_address,$htmlOptions=array('class'=>"form-control Permanent_address",'disabled'=> "true")); ?>
                                             <?php 
                                             $cluster_name = '';
                                            if (isset($employee_data['0']['cluster_name'])) {  $cluster_name = $employee_data['0']['cluster_name']; }else { $cluster_name = ''; }
                                             echo CHtml::textField('cluster_name',$cluster_name,$htmlOptions=array('class'=>"form-control cluster_name",'disabled'=> "true",'style'=>'display:none')); ?>
                                              <?php 
                                             $cluster_appraiser = '';
                                            if (isset($employee_data['0']['cluster_appraiser'])) {  $cluster_appraiser = $employee_data['0']['cluster_appraiser']; }else { $cluster_appraiser = ''; }
                                             echo CHtml::textField('cluster_appraiser',$cluster_appraiser,$htmlOptions=array('class'=>"form-control cluster_appraiser",'disabled'=> "true",'style'=>'display:none')); ?>
                                        </div>                                        
                                    </div>

                                  
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Select Cluster<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_cluster_list();
                                         
                                         $list = CHtml::listData($records,'cluster_name', 'cluster_name'); 
                                         $arr_clus = array();
                                         if (isset($employee_data['0']['cluster_name'])) {
                                          $arr_clus[$employee_data['0']['cluster_name']] = array('selected' => true);  
                                         }
                                         
                                         if(isset($employee_data['0']['cluster_appraiser']) && $employee_data['0']['cluster_appraiser']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'cluster_name',$list,array('class'=>'form-control cluster_name','empty'=>'Select','disabled'=> "true")); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'cluster_name',$list,array('class'=>'form-control cluster_name','options'=>$arr_clus,'disabled'=> "true")); 
                                         }
                                         ?>
                                        </div>
                                    </div>

<div class="form-group">
                                       <label class="control-label col-md-3">Cluster Appraiser<span class="required"> * </span></label>
                                         <div class="col-md-4" id="reporting_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();

                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      if(isset($employee_data['0']['cluster_appraiser']))
                                      {

                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['cluster_appraiser']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);

                                            $status1 = '';
                                            $status1[$employee_data['0']['cluster_appraiser']] = array('selected' => true);
                                      }
                                      if(isset($employee_data['0']['cluster_appraiser']) && $employee_data['0']['cluster_appraiser']=="" ||$employee_data['0']['cluster_appraiser']=="undefined"){
                                            echo CHtml::dropDownList('Reporting_officer1_id','',$Cadre_id,$htmlOptions=array('class'=>'form-control cluster_appr','options' => $status1,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
                                            echo CHtml::dropDownList('cluster_appraiser','',$Cadre_id,$htmlOptions=array('class'=>'form-control cluster_appraiser','options' => $status1,'disabled'=> "true")); 
                                          }?>                                                                     
                                        </div>
                                   



                                        <div id="LoadingImage" style="display:none">
                                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ajax-loader.gif" alt="">
                                              </div>
                                    </div>                          

                                     
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Select Cadre/Grade<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       // $records = $cluster_name_models->get_list('cluster_name');
                                          //$list = array('cluster_name');
                                          $records=$cluster_name_model->get_cader_list();
                                         // print_r($records);die();
                                         $list = CHtml::listData($records,'Cadre', 'Cadre'); 
                                         $arr_clus = array();
                                         $arr_clus[$employee_data['0']['Cadre']] = array('selected' => true);  
                                         if($employee_data['0']['Cadre']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'Cadre',$list,array('class'=>'form-control Cadre','empty'=>'Select','disabled'=> "true")); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Cadre',$list,array('class'=>'form-control Cadre','options'=>$arr_clus,'disabled'=> "true")); 
                                         }
                                         ?>
                                        </div>
                                    </div>


                                     <div class="form-group">
                                       <label class="control-label col-md-3">Select Department<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_department_list();
                                          //print_r($records);die();
                                         $list = CHtml::listData($records,'Department', 'Department'); 
                                         $arr_clus = array();
                                         $arr_clus[$employee_data['0']['Department']] = array('selected' => true);  
                                         if($employee_data['0']['Department']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('class'=>'form-control Department','empty'=>'Select','disabled'=> "true")); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('class'=>'form-control Department','options'=>$arr_clus,'disabled'=> "true")); 
                                         }
                                         ?>
                                        </div>
                                    </div>
                             
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Select Designation<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_designation_list();
                                          //print_r($records);die();
                                         $list = CHtml::listData($records,'Designation', 'Designation'); 
                                         $arr_clus = array();
                                         $arr_clus[$employee_data['0']['Designation']] = array('selected' => true);  
                                         if($employee_data['0']['Designation']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'Designation',$list,array('class'=>'form-control Designation','empty'=>'Select','disabled'=> "true")); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Designation',$list,array('class'=>'form-control Designation','options'=>$arr_clus,'disabled'=> "true")); 
                                         }
                                         ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Reporting Manager<span class="required"> * </span></label>
                                         <div class="col-md-4" id="reporting_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status1 = '';
                                            $status1[$employee_data['0']['Reporting_officer1_id']] = array('selected' => true);
                                            if($employee_data['0']['Reporting_officer1_id']==""){
                                            echo CHtml::dropDownList('Reporting_officer1_id','',$Cadre_id,$htmlOptions=array('class'=>'form-control repoting_officer','options' => $status1,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
                                            echo CHtml::dropDownList('Reporting_officer1_id','',$Cadre_id,$htmlOptions=array('class'=>'form-control repoting_officer','options' => $status1,'disabled'=> "true")); 
                                          }?>                                                                     
                                        </div>
                                    </div>

                                    
                        <div class="form-group">
                                       <label class="control-label col-md-3">Select BU<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_bu_list();
                                          //print_r($records);die();
                                         $list = CHtml::listData($records,'BU', 'BU'); 
                                         $arr_clus = array();
                                         $arr_clus[$employee_data['0']['BU']] = array('selected' => true);  
                                         //print_r($employee_data);die();
                                         if($employee_data['0']['BU']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'BU',$list,array('class'=>'form-control bu','empty'=>'Select','disabled'=> "true")); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Designation',$list,array('class'=>'form-control bu','options'=>$arr_clus,'disabled'=> "true")); 
                                         }
                                         ?>
                                        </div>  </div>
                             
<div class="form-group">
                                       <label class="control-label col-md-3">BU Head<span class="required"> * </span></label>
                                         <div class="col-md-4" id="reporting_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();

                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                     
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['bu_head_email']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);

                                            $status1 = '';
                                            $status1[$employee_data['0']['bu_head_email']] = array('selected' => true);
                                            if($employee_data['0']['bu_head_email']=="" ||$employee_data['0']['bu_head_email']=="undefined"){
                                            echo CHtml::dropDownList('bu_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control bu_head','options' => $status1,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
                                            echo CHtml::dropDownList('bu_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control bu_head','options' => $status1,'disabled'=> "true")); 
                                          }?>                                                                     
                                        </div>
                                    </div>



                                     <div class="form-group" style="display:none">
                                       <label class="control-label col-md-3">BU Head Email Id
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4" id="bu_email">
                                        <?php $model1=new PlantHeadForm() ;
                                        $plnt_email=$employee_data['0']['bu_head_email'];
                                        echo CHtml::activeTextField($model1,'email_id',array('class'=>'form-control validate_field addr1','id'=>'bu_email1','value'=>$plnt_email,'disabled'=> "true")); ?>
                                        </div>
                                    </div>




                                  
                                 
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Employee Status<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                        $lang = array('Active'=>'Active', 'Resign'=>'Resign','Left'=>'Left','Retiring'=>'Retiring');
                                       
                                        $status[$employee_data['0']['Employee_status']] = array('selected' => true);
                                        echo CHtml::dropDownList('Employee_status','',$lang,$htmlOptions=array('class'=>'form-control employee_status','options' => $status,'disabled'=> "true")); ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display:none" id="last_working_date1">
                                       <label class="control-label col-md-3">Last Date Of working<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                             $reporting_1_effective_date = '';
                                            if (isset($employee_data['0']['last_working_date'])) {  $reporting_1_effective_date = $employee_data['0']['last_working_date']; }else { $reporting_1_effective_date = ''; }
                                             echo CHtml::textField('effective_date',$reporting_1_effective_date,$htmlOptions=array('class'=>"form-control new_kra_till_date last_working_date",'disabled'=> "true")); ?>
                                        </div>
                                    </div>
<div class="form-group" style="display:none" id="retire_date1">
                                       <label class="control-label col-md-3">Date Of Retirement<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                             $reporting_1_effective_date = '';
                                            if (isset($employee_data['0']['retire_date'])) {  $reporting_1_effective_date = $employee_data['0']['retire_date']; }else { $reporting_1_effective_date = ''; }
                                             echo CHtml::textField('effective_date',$reporting_1_effective_date,$htmlOptions=array('class'=>"form-control new_kra_till_date retire_date",'disabled'=> "true")); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3">PMS Status<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                        $lang = array('Select'=>'Select','Active'=>'Active', 'Inactive'=>'Inactive');
                                        $status1 = '';
                                        $status1[$employee_data['0']['pms_status']] = array('selected' => true);
                                        echo CHtml::activeDropDownList($model,'pms_status',$lang,array('class'=>'form-control pms_stat','options' => $status1,'disabled'=> "true")); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Location Working At <span class="required"> * </span></label>
                                        <div class="col-md-4">
                                        <?php 
                                        $records=array();
                                        $cluster_name_models = new ClusterForm();
                                        $records = $cluster_name_models->get_list('company_location');
                                        $location_details=$records['0']['company_location'];
                                        $location1=explode(';',$location_details);
                                        $status1 = '';
                                        $status1[$employee_data['0']['company_location']] = array('selected' => true);

                                        $list_data = array();
                                        for ($i=0; $i < count($location1); $i++) { 
                                            $list_data[$location1[$i]] = $location1[$i];
                                        }
                                        echo CHtml::dropDownList("location",'',$list_data,$htmlOptions=array('class'=>"form-control location",'options' => $status1,'disabled'=> "true"));
                                     
                                       ?>

                                        </div>
                                    </div>
<div class="form-group">
                                       <label class="control-label col-md-3">Plant Head<span class="required"> * </span></label>
                                         <div class="col-md-4" id="reporting_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();

                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                     
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['plant_head_email']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);

                                            $status1 = '';
                                            $status1[$employee_data['0']['plant_head_email']] = array('selected' => true);
                                            if($employee_data['0']['plant_head_email']=="" || $employee_data['0']['plant_head_email']=="undefined"){
                                            echo CHtml::dropDownList('plant_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control plant_head','options' => $status1,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
                                            echo CHtml::dropDownList('plant_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control plant_head','options' => $status1,'disabled'=> "true")); 
                                          }?>                                                                     
                                        </div>
                                    </div>


                                     <div class="form-group" style="display:none">
                                       <label class="control-label col-md-3">Plant Head Email Id
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4" id="plant_email">
                                        <?php $model1=new PlantHeadForm() ;
                                        $plnt_email=$employee_data['0']['plant_head_email'];
                                        echo CHtml::activeTextField($model1,'email_id',array('class'=>'form-control validate_field addr1','id'=>'plant_email1','value'=>$plnt_email,'disabled'=> "true")); ?>
                                        </div>
                                    </div>

                                   

                                   <div class="form-group">
                                        <label class="control-label col-md-3">Blood Group</label>
                                         <div class="col-md-4">
                                        <?php 
                                             $Blood_group = '';
                                            if (isset($employee_data['0']['Blood_group'])) {  $Blood_group = $employee_data['0']['Blood_group']; }else { $Blood_group = ''; }
                                             echo CHtml::textField('Employee_status',$Blood_group,$htmlOptions=array('class'=>"form-control Blood_group",'disabled'=> "true")); ?>
                                        </div>                                       
                                    </div>
<div class="form-group">        
                                        <label class="control-label col-md-3">Allow New Goal Sheet to fill
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                          <input type="checkbox" name="allow_kra" class="allow_kra" <?php echo ($employee_data['0']['new_kra_create']=='on' ? 'checked' : '');?>>
                                        </div>
                                    </div>

<div class="form-group allow_kra1" <?php if($employee_data['0']['reporting_1_change']=="") {?>style="display:none"<?php } ?>>
                                       <label class="control-label col-md-3">Add Reporting Manager <span class="required"> * </span></label>
                                         <div class="col-md-4" id="reporting_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list2();
 //print_r($records);die(); 
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         } 
  
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      //print_r($Cadre_id);die(); 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status1 = '';
                                            $status1[$employee_data['0']['reporting_1_change']] = array('selected' => true);
                                            if($employee_data['0']['reporting_1_change']==""){
                                            echo CHtml::dropDownList('reporting_1_change','',$Cadre_id,$htmlOptions=array('class'=>'form-control main_repoting_officer','options' => $status1,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
                                            echo CHtml::dropDownList('reporting_1_change','',$Cadre_id,$htmlOptions=array('class'=>'form-control main_repoting_officer','options' => $status1,'disabled'=> "true")); 
                                          }  ?>                                                                     
                                        </div>

                                    </div>
                                    <div class="form-group allow_kra2" <?php if($employee_data['0']['reporting_1_effective_date']=="") {?>style="display:none"<?php } ?>>        
                                        <label class="control-label col-md-3">Effective date for reporting manager change
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                       <?php 
                                             $reporting_1_effective_date = '';
                                            if (isset($employee_data['0']['reporting_1_effective_date'])) {  $reporting_1_effective_date = $employee_data['0']['reporting_1_effective_date']; }else { $reporting_1_effective_date = ''; }
                                             echo CHtml::textField('effective_date',$reporting_1_effective_date,$htmlOptions=array('class'=>"form-control new_kra_till_date",'id'=>'rdc','disabled'=> "true")); ?>
                                        </div>
                                    </div>
                                     
                                    
                                     <div class="form-group">
                                       <label class="control-label col-md-3">Change Dottedline Manager </label>
                                         <div class="col-md-4" id="reporting_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list2();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status1 = '';
                                            $status1[$employee_data['0']['reporting_2_change']] = array('selected' => true);
                                            if($employee_data['0']['reporting_2_change']==""){
                                            echo CHtml::dropDownList('reporting_2_change','',$Cadre_id,$htmlOptions=array('class'=>'form-control dottedline_repoting_officer','options' => $status1,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
                                            echo CHtml::dropDownList('reporting_2_change','',$Cadre_id,$htmlOptions=array('class'=>'form-control joining_date','options' => $status1,'disabled'=> "true")); 
                                          }?>                                                                     
                                        </div>

                                    </div>
                                    
                                      <div class="form-group" style="display:none">        
                                        <label class="control-label col-md-3">Effective date for Dottedline manager change
                                            
                                        </label>
                                         <div class="col-md-4">
                                       <?php 
                                             $reporting_2_effective_date = '';
                                            if (isset($employee_data['0']['reporting_2_effective_date'])) {  $reporting_2_effective_date = $employee_data['0']['reporting_2_effective_date']; }else { $reporting_2_effective_date = ''; }
                                             echo CHtml::textField('effective_date2',$reporting_2_effective_date,$htmlOptions=array('class'=>"form-control joining_date",'disabled'=> "true")); ?>
                                        </div>
                                    </div>

<div class="form-group" style="display:none">        
                                        <label class="control-label col-md-3">Assign respective head
                                           
                                        </label>
                                         <div class="col-md-4">
                                       
                    <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list2();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status1 = '';
                                            $status1[$employee_data['0']['new_kra_till_date']] = array('selected' => true);
                                            if($employee_data['0']['reporting_2_change']==""){
                                            echo CHtml::dropDownList('reporting_2_change','',$Cadre_id,$htmlOptions=array('class'=>'form-control new_kra_till_date','options' => $status1,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
                                            echo CHtml::dropDownList('new_kra_till_date','',$Cadre_id,$htmlOptions=array('class'=>'form-control new_kra_till_date','options' => $status1,'disabled'=> "true")); 
                                          } ?>  
                                        </div>
                                    </div>

<div class="form-group">        
                                        <label class="control-label col-md-3">Assign temporary reporting manager for year end review
                                           
                                        </label>
                                         <div class="col-md-4">
                                       
                    <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list2();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status5 = '';
                                            //print_r($employee_data['0']['year_end_review_of_manager']);die();
                                            if($employee_data['0']['year_end_review_of_manager']=="" || $employee_data['0']['year_end_review_of_manager']==0){
                                            echo CHtml::dropDownList('year_end_review_of_manager','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_manager','disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
$status5[$employee_data['0']['year_end_review_of_manager']] = array('selected' => true);
                                            echo CHtml::dropDownList('year_end_review_of_manager','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_manager','options' => $status5,'disabled'=> "true")); 
                                          }?>  
                                        </div>
                                    </div>

<div class="form-group">        
                                        <label class="control-label col-md-3">Assign temporary cluster head for year end review
                                           
                                        </label>
                                         <div class="col-md-4">
                                       
                    <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list2();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status4 = '';
                                            
                                            if($employee_data['0']['year_end_review_of_clshead']=="" || $employee_data['0']['year_end_review_of_clshead']==0){
                                            echo CHtml::dropDownList('year_end_review_of_clshead','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_clshead','options' => $status4,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
$status4[$employee_data['0']['year_end_review_of_clshead']] = array('selected' => true);
                                            echo CHtml::dropDownList('year_end_review_of_clshead','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_clshead','options' => $status4,'disabled'=> "true")); 
                                          }?>  
                                        </div>
                                    </div>

<div class="form-group">        
                                        <label class="control-label col-md-3">Assign temporary plant head for year end review
                                         
                                        </label>
                                         <div class="col-md-4">
                                       
                    <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list2();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status3 = '';
                                            
                                            if($employee_data['0']['year_end_review_of_plant_head']=="" || $employee_data['0']['year_end_review_of_plant_head']==0){
                                            echo CHtml::dropDownList('year_end_review_of_plant_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_plant_head','options' => $status3,'disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
$status3[$employee_data['0']['year_end_review_of_plant_head']] = array('selected' => true);
                                            echo CHtml::dropDownList('year_end_review_of_plant_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_plant_head','options' => $status3,'disabled'=> "true")); 
                                          }?>  
                                        </div>
                                    </div>

<div class="form-group">        
                                        <label class="control-label col-md-3">Assign temporary Bu head for year end review
                                          
                                        </label>
                                         <div class="col-md-4">
                                       
                    <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list2();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }    
                                         $Cadre_id = array();                                 
                                        for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                           $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                        }
                                           
                                       }
                                      
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($employee_data['0']['Reporting_officer1_id']);
                                            $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            $status2 = '';
                                            //print_r($employee_data['0']['year_end_review_of_bu_head']);die();
                                            if($employee_data['0']['year_end_review_of_bu_head']=="" || $employee_data['0']['year_end_review_of_bu_head']==0){
                                            echo CHtml::dropDownList('year_end_review_of_bu_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_bu_head','disabled'=> "true",'empty'=>'Select'));
                                      }
                                        else{
$status2[$employee_data['0']['year_end_review_of_bu_head']] = array('selected' => true);
                                            echo CHtml::dropDownList('year_end_review_of_bu_head','',$Cadre_id,$htmlOptions=array('class'=>'form-control year_end_review_of_bu_head','options' => $status2,'disabled'=> "true")); 
                                          } ?>  
                                        </div>
                                    </div>

           <div class="form-group" style="display:none">        
                                        <label class="control-label col-md-3">Cut Off date for normalization
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                       <?php 
                                             $reporting_1_effective_date = '';
                                            if (isset($employee_data['0']['effective_date_norm'])) {  $reporting_1_effective_date = $employee_data['0']['effective_date_norm']; }else { $reporting_1_effective_date = ''; }
                                             echo CHtml::textField('effective_date_norm',$reporting_1_effective_date,$htmlOptions=array('class'=>"form-control effective_date_norm joining_date",'disabled'=> "true")); ?>
                                        </div>
</div>
           <div class="form-group"  style="display:none">        
                                        <label class="control-label col-md-3">Cut Off date for promotion
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                       <?php 
                                             $reporting_1_effective_date = '';
                                            if (isset($employee_data['0']['effective_date_promo'])) {  $reporting_1_effective_date = $employee_data['0']['effective_date_promo']; }else { $reporting_1_effective_date = ''; }
                                             echo CHtml::textField('effective_date_promo',$reporting_1_effective_date,$htmlOptions=array('class'=>"form-control effective_date_promo joining_date",'disabled'=> "true")); ?>
                                        </div>

                                                                                              
                                    </div>

<a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/Newemployee/employee_master'><?php  
                                                echo CHtml::button('Back',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);'));  
                                                ?></a>   
                                        <?php  
                                                echo CHtml::button('Edit',array('class'=>'btn green','style'=>'float:right;margin-right: 596px;background-color: rgb(51, 122, 183);','onClick'=>'js:update_emp_profile()','id'=>'edit_profile'));  
                                                ?>  
                                         <?php                                  
                                                echo CHtml::button('Delete',array('class'=>'btn green','style'=>'float:left;background-color: rgb(51, 122, 183);','onclick'=>'js:delete_emp_profile();')); ?>    
                                
                                </div>


                                <!-- END PAGE BASE CONTENT -->
                                <?php $this->endWidget(); ?>                                            
                                        </div>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p> Are you sure you want to delete this Employee profile?
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                            <button type="button" data-dismiss="modal" class="btn green" id="continue_goal_set">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
                 <script type="text/javascript">
                        function update_emp_profile(){
                            // alert($('#effective_date').val());
                        $(window).scroll(function()
                        {
                            $('#err').animate({top:$(window).scrollTop()+"1000px" },{queue: false, duration: 350});  
                        });                        
                        $('input').prop('disabled',false);
                        $('select').prop('disabled',false);
                        $(".Reporting_officer1_id").prop('disabled',true);
                        $("#edit_profile").attr('value','Update');
                        $('#Employee_id').prop('disabled',true);
                        $('#Reporting_officer1_id').prop('disabled',false);

                        var form_data = new FormData();            
                                            //form_data.append("Image",$('#UploadedFiles_image')[0].files[0]);
                                            form_data.append("Employee_id",$(".Employee_id").val());
                                            form_data.append("Employee_atd_code",$(".Employee_atd_code").val());
                                            form_data.append("Emp_fname",$(".emp_fname").val());
                                            form_data.append("Emp_mname",$(".emp_mname").val());
                                            form_data.append("Emp_lname",$(".emp_lname").val());
                                            form_data.append("DOB",$(".DOB").val());
                                            form_data.append("joining_date",$(".joining_date").val());
                                            form_data.append("allow_kra",$(".allow_kra:checked" ).val());
form_data.append("new_kra_till_date",            $(".main_repoting_officer").find(':selected').val());
                                           // form_data.append("new_kra_till_date",$(".new_kra_till_date").find(':selected').val());
                                            form_data.append("mobile_number",$(".mobile_number").val());
                                            form_data.append("PAN_number",$(".PAN_number").val());
                                            form_data.append("Email_id",$(".Email_id").val());
                                            form_data.append("Department",$(".Department").find(':selected').text());
                                            form_data.append("Designation",$(".Designation").find(':selected').text());
                                            form_data.append("Employee_status",$(".Employee_status").val());
                                            form_data.append("Permanent_address",$(".Permanent_address").val());
                                            form_data.append("cluster_name",$(".cluster_name").find(':selected').val());
                                            form_data.append("Email_id",$(".Email_id").val());
                                            form_data.append("Gender",$( ".gender:checked" ).val());
                                            form_data.append("Nationality",$( ".nationality:checked" ).val());
                                            form_data.append("Cadre",$(".Cadre").find(':selected').text());
                                            form_data.append("Blood_group",$(".Blood_group").val());
                                            form_data.append("Present_address",$(".Present_address").val());
                                            form_data.append("Reporting_officer1_id",$(".repoting_officer").find(':selected').val());
                                            form_data.append("cluster_appraiser",$(".cluster_appraiser").find(':selected').val());
                                            
                                            form_data.append("company_location",$(".location").find(':selected').text());
                                            form_data.append("BU",$(".bu").find(':selected').text());
                                            form_data.append("pms_status",$(".pms_stat").find(':selected').val());
                                            form_data.append("reporting_1_change",$(".main_repoting_officer").find(':selected').val());
                                            form_data.append("reporting_1_effective_date",$('#rdc').val());
                                            form_data.append("reporting_2_change",$('#reporting_2_change').find(':selected').val());
                                            form_data.append("reporting_2_effective_date",$('#effective_date2').val());
                                            form_data.append("bu_head_name",$('#bu_head').find(':selected').text());
                                            form_data.append("bu_head_email",$('#bu_head').find(':selected').val());
                                            form_data.append("plant_head_name",$('#plant_head').find(':selected').text());
                                            form_data.append("plant_head_email",$('#plant_head').find(':selected').val());
                                           // alert($(".cluster_name").find(':selected').val());
form_data.append("effective_date_promo",$('.effective_date_promo').val());
form_data.append("effective_date_norm",$('.effective_date_norm').val());
form_data.append("year_end_review_of_manager",$('.year_end_review_of_manager').find(':selected').val());
form_data.append("year_end_review_of_clshead",$('.year_end_review_of_clshead').find(':selected').val());
form_data.append("year_end_review_of_plant_head",$('.year_end_review_of_plant_head').find(':selected').val());
form_data.append("year_end_review_of_bu_head",$('.year_end_review_of_bu_head').find(':selected').val());
form_data.append("retire_date",$('.retire_date').val());
form_data.append("last_working_date",$('.last_working_date').val());
                                            console.log(form_data);
                                           //alert($("#ClusterForm_cluster_appraiser").find(':selected').val());
                                           //alert($('#rdc').val());
                                           
                                           var base_url = window.location.origin;
                                           //alert(base_url+$("#basepath").attr('value')+'pmsuser/index.php/Login/UpdateEmp_profile');
                                             $.ajax({
                                               
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                processData: false, 
                                                contentType: false,
                                                'data' : form_data,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/Login/UpdateEmp_profile',
                                                success : function(data)
                                                { 
                                                 // alert(data);
                                                  //$("#LoadingImage").hide();
                                                   $(window).scroll(function()
                                                    {
                                                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                                                    });
                                                    if (data != 'success'){
                                                       
                                                        var obj = jQuery.parseJSON(data);
                                                        $("#err").show();
                                                        //$("#err").fadeOut(6000);
                                                        if (obj.Emp_fname != undefined) 
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Emp_fname);
                                                                } 
                                                        else if(obj.Emp_lname != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Emp_lname);
                                                                }
                                                        
                                                        else if(obj.Email != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Email);
                                                                }
                                                        else if(obj.Department != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Department);
                                                                }
                                                        else if(obj.Designation != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Designation);
                                                                }
                                                        else if(obj.Cadre != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Cadre);
                                                                }
                                                        else if(obj.Employee_status != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Employee_status);
                                                                }
                                                        else if(obj.Blood_group != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Blood_group);
                                                                }                                                        
                                                        else if(obj.Reporting_officer1_id != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.Reporting_officer1_id);
                                                                    //alert(data);
                                                                } 
else if(obj.cluster_name != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.cluster_name);
                                                                    //alert(data);
                                                                } 
else if(obj.cluster_appraiser != undefined)
                                                                {
                                                                    $("#err").addClass('alert-danger');
                                                                    $("#err").text(obj.cluster_appraiser);
                                                                    //alert(data);
                                                                }   
    
                                                                                                

                                                }
                                                else if(data == 'success'){
                                                     $("#err").show();
                                                    $("#err").fadeOut(6000);
                                                     $("#err").removeClass('alert-danger');
                                                     $("#err").addClass('alert-success');
                                                     $("#err").text("Success");
                                                     window.location.replace(base_url+$("#basepath").attr('value')+'/index.php/Newemployee/employee_master'); 

                                                }
                                                

                                            }
                                        });
                                }
                                var j = jQuery.noConflict();
                                function delete_emp_profile(){  
                                //alert("hi")   ;
                                 j("#static").modal('show');  
                                  var data = {
                                    'Employee_id' : $(".Employee_id").val(),
                                        };
                                         console.log(data);
                                    var base_url = window.location.origin;
                                 $("#continue_goal_set").click(function(){
                                        $.ajax({                            
                                        type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+$("#basepath").attr('value')+'/index.php/Login/del_Emp_profile',
                                        success : function(data)
                                        {   
                                            if(data == '1')
                                             {
                                                
                                             window.location.replace(base_url+$("#basepath").attr('value')+'/index.php/Newemployee/employee_master'); 
                                            }
                                        }

                                });
                                    });              
                                   
                                    
                                }
                    
                </script>
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>               
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/form-input-mask.min.js" type="text/javascript"></script>


<script type="text/javascript">
$("#bu").change(function(){
   // alert("hi");
                                            var bu_value = {
                                                'bu_value' : $(this).find(':selected').text(),
                                            };
                                        //alert();
                                             var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                'data' : bu_value,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/Newemployee/Bu_details',
                                               
                                                success : function(data)
                                                {
                                                   
                                                     var detail = jQuery.parseJSON(data);
                                                   
                                                     $('#bu_head').html(detail[0]);
                                                   

                                                }
                                            });
                                         });


</script>

<script type="text/javascript">
$("#bu_head").change(function(){
   //alert("hi");
                                            var bu_head = {
                                                'bu_head' : $(this).find(':selected').text(),
                                            };
                                        
                                             var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                'data' : bu_head,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/Newemployee/Bu_mail',
                                               
                                                success : function(data)
                                                {
                                                  
                                                     var detail1 = jQuery.parseJSON(data);
                                                    //alert(detail1);
                                                     $('#bu_email').html(detail1[0]);
                                                   

                                                }
                                            });
                                         });


</script>
<script>
$(function(){
$("body").on('click','.allow_kra',function(){
if($(".allow_kra:checked").val() == 'on')
{
$(".allow_kra1").css('display','');
$(".allow_kra2").css('display','');
}
else
{
$(".allow_kra1").css('display','none');
$(".allow_kra2").css('display','none');
}
});
});
</script>


<script type="text/javascript">
$("#location").change(function(){
   // alert("hi");
                                            var location = {
                                                'location' : $(this).find(':selected').text(),
                                            };
                                        //alert();
                                             var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                'data' : location,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/Newemployee/Plant_details',
                                               
                                                success : function(data)
                                                {
                                                   //alert(data);
                                                     var detail = jQuery.parseJSON(data);
                                                   
                                                     $('#plant_head').html(detail[0]);
                                                   

                                                }
                                            });
                                         });


</script>

<script type="text/javascript">
$("#plant_head").change(function(){
   //alert("hi");
                                            var plant_head = {
                                                'plant_head' : $(this).find(':selected').text(),
                                            };
                                        
                                             var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                'data' : plant_head,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/Newemployee/Plant_mail',
                                               
                                                success : function(data)
                                                {
                                                 // alert(data);
                                                     var detail1 = jQuery.parseJSON(data);
                                                   // alert(detail1);
                                                     $('#plant_email').html(detail1[0]);
                                                   

                                                }
                                            });
                                         });


</script>