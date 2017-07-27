            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>New Employee Account</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                            </li>
                            <li class="active">User</li>
                        </ol>
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
                            <div class="page-sidebar"  style="background-color: rgba(47, 55, 62, 0.13);">
                                <div class="nav-collapse">
                                <ul class="nav">
                                        <?php
                                            if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='3')
                                            { ?>
                                                 <li class="mainmenu1" style="background-color:#009dc7;  font-weight:bold">
                                                 <a id="first" tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Login/myprofile" style="color: white;">Profile</a>
                                                 </li>
                                        <?php   }
                                            else
                                            {
                                        ?>
                                        <li class="dropdown-submenu mainmenu1" style="background-color:#009dc7;  font-weight:bold">
                                        <a id="first" tabindex="-1" href="#" style="color: white;">Profile</a>
                                        <ul class="dropdown-menu">
                                            <li><a id='mainmenu1' class="menu" id="first1" tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Login/myprofile"  style="color:#009dc7; ">Self</a></li>
                                            <li><a id='mainmenu1' class="menu" id="first2" tabindex="-1" href="#" style="color:#009dc7; " >Sub Ordinates</a></li>
                                        </ul>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                         
                                          
                                    </li>                                    
                                     <?php
                                            if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='3')
                                            { ?>
                                                <li class="mainmenu2" Style="font-weight:bold;">
                                                 <a id="second" tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/">Set Goal</a>
                                                </li>
                                        <?php   }
                                            else
                                            {
                                        ?>
                                        <li class="dropdown-submenu mainmenu2" Style="font-weight:bold;">
                                        <a id="second" tabindex="-1" href="#">Set Goal</a>
                                        <ul class="dropdown-menu">
                                            <li><a id='mainmenu2' tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/"  class="menu"  style="color:#009dc7; "  ID="second">Self</a></li>
                                            <li><a id='mainmenu2' tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/approvegoals"  class="menu"  style="color:#009dc7; " >Sub Ordinates</a></li>
                                        </ul>
                                         </li>
                                         <?php
                                            }
                                        ?>
                                    <?php
                                            if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='3')
                                            { ?>
                                                 <li class="mainmenu3" Style="font-weight:bold;">
                                                 <a id="third" tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/">Mid Year Review</a>
                                                 </li>
                                        <?php   }
                                            else
                                            {
                                        ?>
                                         <li class="dropdown-submenu mainmenu3" Style="font-weight:bold;">
                                        <a id="third" tabindex="-1" href="#">Mid Year Review</a>
                                        <ul class="dropdown-menu">
                                            <li><a id='mainmenu3' tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/"  class="menu"  style="color:#009dc7; " >Self</a></li>
                                            <li><a id='mainmenu3' tabindex="-1" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/"  class="menu"  style="color:#009dc7; " >Sub Ordinates</a></li>  
                                        </ul> 
                                        </li>
                                     <?php
                                        }
                                    ?>
                                 </ul>
                                </div><!--/.nav-collapse -->
                            </div>
                            <!-- END PAGE SIDEBAR -->
                  
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                              
                                 
                                <div class="note note-info">
                                    <p></p>
                                </div>
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
                                    $j( ".dob_date" ).datepicker({dateFormat: 'dd-M-yy'});
                                    $j( ".joining_date" ).datepicker({dateFormat: 'dd-M-yy'});
                                    $(".dob_date").keyup(function(){
                                        $(this).val("");
                                    });
                                    $(".joining_date").keyup(function(){
                                        $(this).val("");
                                    });
                                  });
                                  </script>

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
                                                    // echo CHtml::image($img,$alt = '',$htmlOptions = array('class'=>'image_name'));
                                                    //echo CHtml::activeFileField('Image', $img,array('class'=>'image_name')); ?>
                                                     
                                                <img src="<?php echo $img?>" alt=""> </div>
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
                                             echo CHtml::textField('emp_fname',$Emp_mname,$htmlOptions=array('class'=>"form-control emp_fname",'disabled'=> "true")); ?>
                                        </div>
                                        <div class="col-md-3">
                                        <?php 
                                             $Emp_lname = '';
                                            if (isset($employee_data['0']['Emp_lname'])) {  $Emp_lname = $employee_data['0']['Emp_lname']; }else { $Emp_lname = ''; }
                                             echo CHtml::textField('emp_fname',$Emp_lname,$htmlOptions=array('class'=>"form-control emp_fname",'disabled'=> "true")); ?>
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
                                        </div>
                                    </div>                                    
                                    <div class="form-group">        
                                         <label class="control-label col-md-3">Date Of Birth
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                       <?php 
                                             $DOB = '';
                                            if (isset($employee_data['0']['DOB'])) {  $DOB = $employee_data['0']['DOB']; }else { $DOB = ''; }
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
                                             echo CHtml::textField('PAN_number',$PAN_number,$htmlOptions=array('class'=>"form-control mobile_number",'disabled'=> "true")); ?>
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
                                             echo CHtml::textField('Email_id',$Email_id,$htmlOptions=array('class'=>"form-control joining_date",'disabled'=> "true")); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Department<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                             $Department = '';
                                            if (isset($employee_data['0']['Department'])) {  $Department = $employee_data['0']['Department']; }else { $Department = ''; }
                                             echo CHtml::textField('Department',$Department,$htmlOptions=array('class'=>"form-control Department",'disabled'=> "true")); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Designation<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                             $Designation = '';
                                            if (isset($employee_data['0']['Designation'])) {  $Designation = $employee_data['0']['Designation']; }else { $Designation = ''; }
                                             echo CHtml::textField('Designation',$Designation,$htmlOptions=array('class'=>"form-control Department",'disabled'=> "true")); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Gender
                                        <span class="required"> * </span>
                                    </label>
                                         <div class="col-md-4">
                                        <?php
                                        echo $form->radioButton($model, 'Gender', array(
                                            'value'=>'Male','class'=>'gender','uncheckValue'=>null
                                        )).' Male '; echo $form->radioButton($model, 'Gender', array(
                                            'value'=>'Female','class'=>'gender', 'uncheckValue'=>null
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
                                         <?php echo $form->radioButton($model,'Nationality',array('value'=>'Indian','class'=>'nationality','uncheckValue'=>null)).'Indian'; ?>
                                         <?php echo $form->radioButton($model,'Nationality',array('value'=>'Other','class'=>'nationality', 'uncheckValue'=>null)).'Other'; ?>
                                         </div>
                                        <?php echo $form->error($model,'Nationality',array('style'=>'color: red')); ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Cadre/Grade<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                            <?php 
                                             $Cadre = '';
                                            if (isset($employee_data['0']['Cadre'])) {  $Cadre = $employee_data['0']['Cadre']; }else { $Cadre = ''; }
                                             echo CHtml::textField('Cadre',$Cadre,$htmlOptions=array('class'=>"form-control Cadre",'disabled'=> "true")); ?>
                                         </div>                                       
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Employee Status<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                       <?php 
                                             $Employee_status = '';
                                            if (isset($employee_data['0']['Employee_status'])) {  $Employee_status = $employee_data['0']['Employee_status']; }else { $Employee_status = ''; }
                                             echo CHtml::textField('Employee_status',$Employee_status,$htmlOptions=array('class'=>"form-control Employee_status",'disabled'=> "true")); ?>
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
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Reporting Officer 1<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                             $Reporting_officer1_id = '';
                                            if (isset($Reporting_officer_name)) {  $Reporting_officer1_id = $Reporting_officer_name; }else { $Reporting_officer1_id = ''; }
                                             echo CHtml::textField('Reporting_officer1_id',$Reporting_officer1_id,$htmlOptions=array('class'=>"form-control Reporting_officer1_id",'disabled'=> "true")); ?>
                                        </div>                                        
                                    </div>                                                        
                                    </div>
                                <div class="form-actions">
                                
                                </div>
                                </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>               
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
                     
