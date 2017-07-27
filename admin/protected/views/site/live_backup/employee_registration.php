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
                            <div class="page-sidebar">
                                <nav class="navbar" role="navigation">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <ul class="nav navbar-nav margin-bottom-35">
                                        <li class="active">
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Newemployee/employee_master">
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
                                    <ul class="nav navbar-nav margin-bottom-35">
                                        <li class="active">
                                            <a href="index.html">
                                                <i class="icon-home"></i> Home </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-note "></i> Task </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> Projects </a>
                                        </li>                                                                             
                                    </ul>       
                                </nav>
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
                               
                                <script type="text/javascript">                                    
                                    function checkErrors(form, data, hasError) 
                                    {$("#updation_spinner").show();
                                        if (hasError)
                                        {
                                            alert("validation failed");
                                        }
                                        else
                                        {
                                            var mname = '',lname = '',blood_grp = '';
                                            if($(".emp_mname").val() != '')
                                            {
                                               mname = $(".emp_mname").val(); 
                                            }
                                            else
                                            {
                                                mname = '';
                                            }
                                            if($(".emp_lname").val() != '')
                                            {
                                               lname = $(".emp_lname").val(); 
                                            }
                                            else
                                            {
                                                lname = '';
                                            }
                                            if($(".blood_grp").val() != '')
                                            {
                                               blood_grp = $(".blood_grp").val(); 
                                            }
                                            else
                                            {
                                                blood_grp = '';
                                            }
                                            var data = {
                                                    'emp_id' : $(".emp_id").val(),
                                                'Employee_atd_code' : $(".Employee_atd_code").val(),
                                                'fname' : $(".emp_fname").val(),
                                                'mname' : mname,
                                                'lname' : lname,   
                                                   'gender' : $(".gender:checked").val(),                                         //     
                                                'dob_date' : $(".dob_date").val(),
                                                 'nationality' : $(".nationality:checked").val(),
                                                  'email_id' : $(".email_id").val(),
                                                'joining_date' : $(".joining_date").val(),
                                                'mobile_number' : $(".mobile_number").val(),
                                                'pan_number' : $(".pan_number").val(),
                                                 'designation' : $(".designation").find(':selected').val(),
                                                'cader' : $(".cader").find(':selected').val(),                                          
                                                  'repoting_officer' : $(".repoting_officer").find(':selected').val(),
                                                'emp_status' : $(".emp_status").find(':selected').val(),
                                                 'addr1' : $(".addr1").val(),
                                                'addr2' : $(".addr2").val(),
                                                'blood_grp' : blood_grp,                                           
                                                'Image' : $('.fileinput-preview').find('img').attr('src'), 
                                                  'department' : $(".department").find(':selected').val(),
                                            };
                                            var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'html',
                                                'data' : data,
                                                'url' : base_url+'/pmsuser/index.php?r=Newemployee/save',
                                                success : function(data)
                                                {$("#updation_spinner").hide();
                                                    alert(data);
                                                }
                                            });                                            
                                           console.log(data);
                                        }
                                        
                                    }
                                    
                                </script>                               
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
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <?php echo CHtml::activeFileField($model, 'Image',array('class'=>'image_name')); ?></span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3">
                                             <?php echo $form->textField($model,'Emp_fname',array('class'=>'form-control emp_fname')); ?>
                                            <?php echo $form->error($model,'Emp_fname',array('style'=>'color: red')); ?>
                                        </div>
                                        <div class="col-md-3">
                                        <?php echo $form->textField($model,'Emp_mname',array('class'=>'form-control emp_mname')); ?>
                                        <?php echo $form->error($model,'Emp_mname'); ?>
                                        </div>
                                        <div class="col-md-3">
                                        <?php echo $form->textField($model,'Emp_lname',array('class'=>'form-control emp_lname')); ?>
                                        <?php echo $form->error($model,'Emp_lname'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="control-label col-md-3">Employee ID
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                       <?php $model->Employee_id = uniqid(); 
                                        echo $form->textField($model,'Employee_id',array('class'=>'form-control emp_id')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="control-label col-md-3">Employee Attendance Code
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php $model->Employee_atd_code = uniqid(); 
                                        echo $form->textField($model,'Employee_atd_code',array('class'=>'form-control Employee_atd_code')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">        
                                         <label class="control-label col-md-3">Date Of Birth
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php echo $form->textField($model,'DOB',array('class'=>'form-control dob_date')); ?>
                                        <?php echo $form->error($model,'DOB',array('style'=>'color: red')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">        
                                        <label class="control-label col-md-3">Joining Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php echo $form->textField($model,'joining_date',array('class'=>'form-control joining_date')); ?>
                                        <?php echo $form->error($model,'joining_date',array('style'=>'color: red')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">   
                                        <label class="control-label col-md-3">Phone Number
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php echo $form->textField($model,'mobile_number',array('class'=>'form-control mobile_number')); ?>
                                        <?php echo $form->error($model,'mobile_number',array('style'=>'color: red')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">       
                                        <label class="control-label col-md-3">PAN Number
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php echo $form->textField($model,'PAN_number',array('class'=>'form-control pan_number')); ?>
                                        <?php echo $form->error($model,'PAN_number',array('style'=>'color: red')); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email ID
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                         <?php echo $form->textField($model,'Email_id',array('class'=>'form-control email_id')); ?>
                                        <?php echo $form->error($model,'Email_id',array('style'=>'color: red')); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Department<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                        $records = OrgStructure::model()->findAll();
                                        $Department_id = array();                                 
                                        foreach ($records as $row) {
                                          $Department_id[$row['Department']] = $row['Department'];
                                        }
                                        echo $form->dropDownList($model,'Department',$Department_id,array('class'=>'form-control department','options'=>array('selected'=>true))); ?>
                                        <?php echo $form->error($model,'Department',array('style'=>'color: red')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Designation<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                        $records = OrgStructure::model()->findAll();
                                        $Designation_id = array();                                 
                                        foreach ($records as $row) {
                                          $Designation_id[$row['Designation']] = $row['Designation'];
                                        }
                                        echo $form->dropDownList($model,'Designation',$Designation_id,array('class'=>'form-control designation','options'=>array('selected'=>true))); ?>
                                        <?php echo $form->error($model,'Designation',array('style'=>'color: red')); ?>
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
                                        $records = OrgStructure::model()->findAll();
                                        $cnt = 0; $Cadre_id = array();                                 
                                        foreach ($records as $row) {
                                          $Cadre_id[$row['Cadre']] = $row['Cadre'];
                                        }
                                        echo $form->dropDownList($model,'Cadre',$Cadre_id,array('class'=>'form-control cader'));
                                         ?>
                                         </div>
                                        <?php echo $form->error($model,'Cadre',array('style'=>'color: red')); ?>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Employee Status<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                        $lang = array('Probation'=>'Probation', 'Permanent'=>'Permanent');
                                        echo $form->dropDownList($model,'Employee_status',$lang,array('class'=>'form-control emp_status')); ?>
                                        </div>
                                        <?php echo $form->error($model,'Employee_status',array('style'=>'color: red')); ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Blood Group</label>
                                         <div class="col-md-4">
                                        <?php echo $form->textField($model,'Blood_group',array('class'=>'form-control blood_grp')); ?>
                                        </div>
                                        <?php echo $form->error($model,'Blood_group',array('style'=>'color: red')); ?>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3"> Present Address
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php echo $form->textField($model,'Present_address',array('class'=>'form-control addr1')); ?>
                                        </div>
                                        <?php echo $form->error($model,'Present_address',array('style'=>'color: red')); ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Permanent Address
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php echo $form->textField($model,'Permanent_address',array('class'=>'form-control addr2')); ?>
                                        </div>
                                        <?php echo $form->error($model,'Permanent_address',array('style'=>'color: red')); ?>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Reporting Officer 1<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                        $lang = array('project_pms@kritva.com'=>'Sawant', 'mssadafule@gmail.com'=>'New');
                                        echo $form->dropDownList($model,'Reporting_officer1_id',$lang,array('class'=>'form-control repoting_officer')); ?>
                                        </div>
                                        <?php echo $form->error($model,'Reporting_officer1_id',array('style'=>'color: red')); ?>
                                    </div>
                                    
                                                                                                    
                                    </div>
                                <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">     
                                        <?php echo CHtml::resetButton('Reset',array('class'=>'btn default','style'=>'float:left')); ?> 
                                        <?php echo CHtml::SubmitButton('Submit',array('class'=>'btn green','style'=>'float:right')); ?><i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;display:none"></i>
                                    </div>
                                </div>
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
                     
