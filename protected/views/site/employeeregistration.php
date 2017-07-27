<?php 
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'employee-form-employeeregistration-form',
    'enableClientValidation'=>true,
    //'action' => array('Newemployee/save'),
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),    
));
?>
<?php
Yii::app()->controller->renderPartial('//site/all_js');
?>
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>New Employee</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Features</a>
                            </li>
                            <li class="active">Form Stuff</li>
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
                            <div class="page-sidebar">
                                <nav class="navbar" role="navigation">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <ul class="nav navbar-nav margin-bottom-35">
                                        <li class="active">
                                            <a href="index.html">
                                                <i class="icon-home"></i> Employee Master </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-note "></i> Elevation </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> Separation </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-basket "></i> Ex-Employee </a>
                                        </li>
                                    </ul>
                                    <h3>Quick Actions</h3>
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="#">
                                                <i class="icon-envelope "></i> Inbox
                                                <label class="label label-danger">New</label>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-paper-clip "></i> Task </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-star"></i> Projects </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-pin"></i> Events
                                                <span class="badge badge-success">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">
                                     <!--    <div class="m-heading-1 border-green m-bordered">
                                            <h3>Twitter Bootstrap Wizard Plugin</h3>
                                            <p> This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to
                                                hook into each step individually. </p>
                                            <p> For more info please check out
                                                <a class="btn red btn-outline" href="http://vadimg.com/twitter-bootstrap-wizard-example" target="_blank">the official documentation</a>
                                            </p>
                                        </div> -->
                                        <div class="portlet light bordered" id="form_wizard_1">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class=" icon-layers font-red"></i>
                                                    <span class="caption-subject font-red bold uppercase"> Form Wizard -
                                                        <span class="step-title"> Step 1 of 3 </span>
                                                    </span>
                                                </div>
                                                <div class="actions">
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-cloud-upload"></i>
                                                    </a>
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-wrench"></i>
                                                    </a>
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                               
                                                    <div class="form-wizard">
                                                        <div class="form-body">
                                                            <ul class="nav nav-pills nav-justified steps">
                                                                <li>
                                                                    <a href="#tab1" data-toggle="tab" class="step">
                                                                        <span class="number"> 1 </span>
                                                                        <span class="desc">
                                                                            <i class="fa fa-check"></i> Account Setup </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                                        <span class="number"> 2 </span>
                                                                        <span class="desc">
                                                                            <i class="fa fa-check"></i> Profile Setup </span>
                                                                    </a>
                                                                </li>                                                                
                                                                <li>
                                                                    <a href="#tab4" data-toggle="tab" class="step">
                                                                        <span class="number"> 3 </span>
                                                                        <span class="desc">
                                                                            <i class="fa fa-check"></i> Confirm </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                                <div class="progress-bar progress-bar-success"> </div>
                                                            </div>
                                                            <div class="tab-content">
                                                                <div class="alert alert-danger display-none">
                                                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                                <div class="alert alert-success display-none">
                                                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                                <div class="tab-pane active" id="tab1">
                                                                    <h3 class="block">Provide your account details</h3>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Username
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                           <!-- <input aria-invalid="true" aria-describedby="username-error" aria-required="true" class="form-control" name="username" type="text"> -->
                                                                           <?php echo $form->textField($model,'username',array('class'=>'form-control','aria-describedby'=>'username-error','aria-required'=>'true','aria-invalid'=>'true')); ?>
                                                                            <span class="help-block"> Provide your username </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Password
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <!-- <input type="password" class="form-control" name="password" id="submit_form_password" /> -->
                                                                            <?php echo $form->textField($model,'password',array('class'=>'form-control','id'=>'submit_form_password','aria-describedby'=>'username-error','aria-required'=>'true','aria-invalid'=>'true')); ?>
                                                                            <span class="help-block"> Provide your password. </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Confirm Password
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <!-- <input type="password" class="form-control" name="rpassword" /> -->
                                                                            <?php echo $form->textField($model,'password',array('class'=>'form-control','id'=>'submit_form_password','aria-describedby'=>'username-error','aria-required'=>'true','aria-invalid'=>'true')); ?>
                                                                            <span class="help-block"> Confirm your password </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Email
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <!-- <input type="text" class="form-control" name="email" /> -->
                                                                            <?php echo $form->textField($model,'Email_id',array('class'=>'form-control','id'=>'submit_form_password','aria-describedby'=>'username-error','aria-required'=>'true','aria-invalid'=>'true')); ?>
                                                                            <span class="help-block"> Provide your email address </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="tab2">
                                                                    <h3 class="block">Provide your profile details</h3>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Name
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-3">
                                                                            <!-- <input type="text" class="form-control" name="fullname" /> -->
                                                                            <?php echo $form->textField($model,'Emp_fname',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> First Name </span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <!-- <input type="text" class="form-control" name="fullname" /> -->
                                                                            <?php echo $form->textField($model,'Emp_mname',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> Middle Name </span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <!-- <input type="text" class="form-control" name="fullname" /> -->
                                                                            <?php echo $form->textField($model,'Emp_lname',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> Last Name </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Date Of Birth
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <!-- <input class="form-control" id="mask_date" type="text"> -->
                                                                            <?php echo $form->textField($model,'DOB',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> Provide your phone number </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Phone Number
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                           <!-- <input class="form-control" id="mask_number" type="text"> -->
                                                                           <?php echo $form->textField($model,'mobile_number',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> Provide your phone number </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Nationality
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->textField($model,'Nationality',array('class'=>'form-control')); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Gender
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <div class="radio-list">
                                                                                <label>
                                                                                    <!-- <input type="radio" name="gender" value="M" data-title="Male" /> Male </label> -->
                                                                                    <?php echo $form->radioButton($model,'Gender',array('class'=>'form-control','value'=>'M')).'Male'; ?></label>
                                                                                <label>
                                                                                    <!-- <input type="radio" name="gender" value="F" data-title="Female" /> Female </label> -->
                                                                                    <?php echo $form->radioButton($model,'Gender',array('class'=>'form-control','value'=>'F')).'Female'; ?></label>
                                                                            </div>
                                                                            <div id="form_gender_error"> </div>
                                                                        </div>
                                                                    </div>                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Select Department</label>
                                                                        <div class="col-md-4">
                                                                           <!--  <select name="country" id="country_list" class="form-control">
                                                                                <option value=""></option>
                                                                                <option value="AF">Afghanistan</option>
                                                                            </select>    -->                                                                         
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Select Designation</label>
                                                                        <div class="col-md-4">
                                                                            <!-- <select name="country" id="country_list" class="form-control">
                                                                                <option value=""></option>
                                                                                <option value="AF">Afghanistan</option>
                                                                            </select> -->
                                                                            <?php echo $form->dropDownList($model,'Designation',CHtml::listData(EmployeeForm::model()->findAll(), 'id', 'name'),array('class'=>'form-control')); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Select Cadre/Grade</label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->dropDownList($model,'Cadre',CHtml::listData(EmployeeForm::model()->findAll(), 'id', 'name'),array('class'=>'form-control')); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"> Present Address
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->textField($model,'Present_address',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> Provide your street address </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3"> Permanent Address
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->textField($model,'Permanent_address',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> Provide your street address </span>
                                                                        </div>
                                                                    </div>                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Blood Group
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->textField($model,'Blood_group',array('class'=>'form-control')); ?>
                                                                            <span class="help-block"> Provide your city or town </span>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Employee Status</label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->dropDownList($model,'Employee_status',CHtml::listData(EmployeeForm::model()->findAll(), 'id', 'name'),array('class'=>'form-control')); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Reporting Officer 1</label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->dropDownList($model,'Employee_status',CHtml::listData(EmployeeForm::model()->findAll(), 'id', 'name'),array('class'=>'form-control')); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Reporting Officer 2</label>
                                                                        <div class="col-md-4">
                                                                            <?php echo $form->dropDownList($model,'Employee_status',CHtml::listData(EmployeeForm::model()->findAll(), 'id', 'name'),array('class'=>'form-control')); ?>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="form-group">
                                                                    <label class="control-label col-md-3">Upload Photo</label>
                                                                    <div class="col-md-4">
                                                                        <button type="file" class="btn blue start">
                                                                        <i class="fa fa-upload"></i>
                                                                        <span> upload </span>
                                                                    </button>
                                                                    </div>
                                                                    </div> 
                                                                                                                                   
                                                                </div>                                                               
                                                                <div class="tab-pane" id="tab4">
                                                                    <h3 class="block">Confirm your account</h3>
                                                                    <h4 class="form-section">Account</h4>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Username:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="username"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Email:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="email"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <h4 class="form-section">Profile</h4>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Fullname:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="fullname"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">DOB:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="fullname"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Phone Number:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="fullname"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Nationality:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="fullname"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Gender:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="gender"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Department:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="phone"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Designation:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="phone"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Grade:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="phone"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Present Address:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="address"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Permanent Address:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="address"> </p>
                                                                        </div>
                                                                    </div>                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Blood Group:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="country"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Employee Status:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="remarks"> </p>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Reporting Officer 1:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="remarks"> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Reporting Officer 2:</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="remarks"> </p>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Photo :</label>
                                                                        <div class="col-md-4">
                                                                            <p class="form-control-static" data-display="remarks"> </p>
                                                                        </div>
                                                                    </div>                                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <a href="javascript:;" class="btn default button-previous">
                                                                        <i class="fa fa-angle-left"></i> Back </a>
                                                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                                        <i class="fa fa-angle-right"></i>
                                                                    </a>
                                                                    <!-- <a href="javascript:;" class="btn green button-submit"> Submit
                                                                        
                                                                    </a> -->
                                                                    <?php echo CHtml::submitButton('Submit',array('class'=>'btn green')); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                <?php $this->endWidget(); ?>
