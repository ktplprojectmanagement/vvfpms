       <!-- BEGIN CONTAINER -->
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>      
        <style media="all" type="text/css">      
      #err { 
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
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Reset Password </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                 <?php 
                 $form=$this->beginWidget('CActiveForm', array(
               'id'=>'user-form',
               'enableAjaxValidation'=>false,                            
                'enableClientValidation' => true,
                'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'afterValidate' => 'js:checkErrors'

                ),
                'htmlOptions'=>array(
                    'class'=>'form-horizontal',
                    'enctype' => 'multipart/form-data'
                ),
            ));
            ?>        
                <div class="page-content">
                    <div class="container">
                    <div class="alert alert-danger fade in" id="err" style="display: none">
                        <!-- <a href="#" class="close" data-dismiss="alert">&times;</a>      -->
                        <lable id="error_value"></lable>
                    </div>
                    <div class="row" id="msg_link" style="display: none">
                        <div class="alert alert-info col-md-6">
                            To reset the password kindly click on link send to you on mail.
                        </div> 
                    </div>
                    <div class="row">                       
                        <div class="col-md-6" <?php if(isset($employee_id) && $employee_id!='') { ?>style="display:none"<?php } ?>>
                           <div id="forget_window1">
                            <h3 class="font-green">Forget Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                               <?php echo CHtml::textField('email_id','',array('class'=>'form-control placeholder-no-fix email_reset')); ?></div>
                                <div class="form-actions">                                    
                                    <?php echo CHtml::button('Submit',array('class'=>'btn green pull-right','id'=>'reset_login')); ?>
                                    <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i>
                                </div>
                            </div>
                        </div> 
                        </div>
                        <div class="col-md-6" <?php if(!(isset($employee_id) && $employee_id!='')) { ?>style="display:none"<?php } ?>>
                            <div id="forget_window">
                            <h3 class="font-green">Reset Password ?</h3>
                            <div class="form-group">
                            <label id="emp_id_value" style="display: none"><?php if(isset($employee_id)) { echo $employee_id; }?></label>
                            <label>Current Password </label>
                               <?php echo CHtml::passwordField('curpassword','',array('class'=>'form-control placeholder-no-fix curpassword')); ?>
                            <label>Reset Password </label>
                               <?php echo CHtml::passwordField('password','',array('class'=>'form-control placeholder-no-fix email_reset password_value')); ?>
                            <label>Confirm Password </label>
                               <?php echo CHtml::passwordField('confirm_password','',array('class'=>'form-control placeholder-no-fix password_value1')); ?>
                            </div>
                                <div class="form-actions">                                    
                                    <?php echo CHtml::button('Submit',array('class'=>'btn green pull-right','id'=>'reset_login1')); ?>
                                    <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
                 <?php $this->endWidget(); ?>
            </div>           
        </div>
        <script type="text/javascript">
            $(function(){
                // $('#reset_login').click(function(){
                //     $("#forget_window1").hide();
                //     $("#msg_link").show();
                // });
                $("#reset_login").click(function(){
                var email_string = /^[a-zA-Z0-9.]+@[a-z0-9A-Z.]+\.[a-z]{2,3}$/;
                if (email_string.test($('.email_reset').val())) 
                {
                    $("#updation_spinner").css('display','block');
                    var base_url = window.location.origin;
                       var data = {
                        'email_id_reset' : $('.email_reset').val()
                       };
                       $.ajax({
                        type : 'post',
                        datatype : 'html',
                        data : data,
                        url : base_url+'/index.php?r=Login/reset_user_password',
                        success : function(data)
                        { 
                        $("#updation_spinner").css('display','none'); 
                            if (data == "Notification Send")
                            {
                                $("#forget_window1").hide();
                                $("#msg_link").show();
                            }
                            
                        }
                    });                    
                }
                else
                {
                    $("#err").show();  
                    $("#err").fadeOut(6000);
                    $("#error_value").text("Please Enter Valid Email ID"); 
                }
            });
                 $("#reset_login1").click(function(){
                var pass_value = $('.password_value').val();
                var pass_value1 = $('.password_value1').val();
                $("#err").hide();  
                if($(".curpassword").val() == '')
                {
                    $("#err").show();  
                   //$("#err").fadeOut(6000);
                    $("#error_value").text("Please enter current password"); 
                }
                else if(!((pass_value.length>0) && pass_value.length>8))
                {
                    $("#err").show();  
                    //$("#err").fadeOut(6000);
                    $("#error_value").text("Password should contain atleast 9 or maximum 15 characters"); 
                }
                else if(!((pass_value1.length>0) && pass_value1.length>8))
                {
                    $("#err").show();  
                    //("#err").fadeOut(6000);
                    $("#error_value").text("Confirm password should contain atleast 9 or maximum 15 characters"); 
                }
                else if($('.password_value1').val() != $('.password_value').val())
                {
                    $("#err").show();  
                    //$("#err").fadeOut(6000);
                    $("#error_value").text("Password and confirm password does not match");                    
                }
                else
                {
                    $("#err").hide();  
                    $("#updation_spinner").css('display','block');
                    var base_url = window.location.origin;
                       var data = {
                        'password_value' :  $('.password_value').val(),
                        'password' :  $('.curpassword').val(),
                        'username' : $("#emp_id_value").text()
                       };
                       $.ajax({
                        type : 'post',
                        datatype : 'html',
                        data : data,
                        url : base_url+'/index.php?r=Reset_user_password/rsest',
                        success : function(data)
                        { 
                            //alert(data);
                            $("#updation_spinner").css('display','none');                                                        
                            if (data == "success")
                            {
                                $("#err").show();  
                                $("#err").fadeOut(6000);
                                $("#error_value").text("Password updated successfully");
                               // window.location.href = base_url+'/index.php?r=Login';
                            }
                            else if(data == "error occure")
                            {
                                $("#err").show();  
                                //$("#err").fadeOut(6000);
                                $("#error_value").text("Old password and current password cannot be same");
                               // alert("Old password and current password cannot be same");
                            }
                            
                        }
                    });       
                }
            });
            });
        </script>
        <!-- END CONTAINER -->
              
