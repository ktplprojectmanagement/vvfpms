<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>User Portal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css">
        .forget-form{
            display: none;
        }
        </style>

    </head>
    <!-- END HEAD -->

 <body class=" login">
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

<div class="alert alert-danger fade in" id="err" style="display: none">
                        <!-- <a href="#" class="close" data-dismiss="alert">&times;</a>      -->
                        <lable id="error_value"> A problem has been occurred while submitting your data.</lable>
                    </div>
        <!-- BEGIN LOGO -->
        <div class="logo">
             <img style="height: 50px;top:20px;left:10px;" class="login-logo login-6" src="<?php echo Yii::app()->request->baseUrl; ?>/images/Logo.png">
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->       
        <div class="content">
         <!-- <div style="width: auto;height: 50px;background-color:white;border: 1px solid red">dfgfd</div> -->
           <?php 
        $form=$this->beginWidget('CActiveForm', array(
               'id'=>'user-form',
                // 'enableClientValidation'=>true,
                // 'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                // 'action' => $this->createUrl('Adminlogin/employee_login'),
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
        <script type="text/javascript">
            $(function(){
                    $("#login_check").click(function(){
                         var data = {
                                'username' : $(".username").val(),
                                'password' : $(".password").val(),
                            };
                            var base_url = window.location.origin;
                            $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : data,
                                'url' : base_url+$("#basepath").attr('value')+'/index.php?r=Login/check',
                                success : function(data)
                                {                       
                                    if (data == 'Valid')
                                    {
                                        window.location.href = base_url+$("#basepath").attr('value')+"/index.php?r=Login/dashboard";
                                    }
                                    else if(data == 'already_login')
                                    {
                                        //$("#already_login").text("User already login");
                                        window.location.href=base_url+$("#basepath").attr('value')+'/index.php?r=Login';
                                    }
                                    else
                                    {
                                        $("#already_login").text("Invalid Login Credentials.")
                                    }
                                }
                            });
                    });
                });
        </script>
           
            
            <div id="forget_window">
                <h3 class="font-green">Reset Password </h3>
                <div class="form-group">
                <label id="emp_id_value" style="display: none"><?php if(isset($employee_id)) { echo $employee_id; }?></label>
                <label>Enter New Password </label>
                   <?php echo CHtml::passwordField('password','',array('class'=>'form-control placeholder-no-fix email_reset password_value')); ?>
                <label>Confirm Password </label>
                   <?php echo CHtml::passwordField('confirm_password','',array('class'=>'form-control placeholder-no-fix password_value1')); ?>
                </div>
                    <div class="form-actions">
                        
                        <?php echo CHtml::button('Submit',array('class'=>'btn green pull-right','id'=>'reset_login')); ?>
                        <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i>
                    </div>
                </div>
            </div>
             <?php $this->endWidget(); ?>
        <div class="copyright"> 2016 © Kritva Technologies Pvt. Ltd. </div>
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-notific8.min.js" type="text/javascript"></script>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
        $(function(){
            $("#reset_login").click(function(){
                var pass_value = $('.password_value').val();
                var pass_value1 = $('.password_value1').val();
                if(!(pass_value.length>0 && pass_value.length>8))
                {
			$("#err").css('display','block');
			//$("#err").fadeOut(5000);
			$("#error_value").text("Password should contain atleast 9 or maximum 15 characters");
                }
                else if(!(pass_value1.length>0 && pass_value1.length>8))
                {
			$("#err").css('display','block');
			//$("#err").fadeOut(5000);
			$("#error_value").text("Confirm password should contain atleast 9 or maximum 15 characters");
                }
                else if($('.password_value1').val() != $('.password_value').val())
                {
			$("#err").css('display','block');
			//$("#err").fadeOut(5000);
			$("#error_value").text("Password and confirm password does not match");
                }
                else
                {
                    $("#updation_spinner").css('display','block');
                    var base_url = window.location.origin;
                       var data = {
                        'password_value' :  $('.password_value').val(),
                        'username' : $("#emp_id_value").text()
                       };
                       $.ajax({
                        type : 'post',
                        datatype : 'html',
                        data : data,
                        url : base_url+$("#basepath").attr('value')+'/index.php?r=Reset_password/rsest1',
                        success : function(data)
                        { 
                            $("#updation_spinner").css('display','none');                                                        
                            if (data == "success")
                            {
					$("#err").css('display','block');
					$("#err").fadeOut(5000);
					$("#error_value").text("Password updated successfully.");
window.setTimeout(function() {
    window.location.href = base_url+$("#basepath").attr('value')+'/index.php/Adminlogin';
}, 1000);  
                                //window.location.href = base_url+$("#basepath").attr('value')+'/index.php?r=Adminlogin';
                            }
                            else if(data == "error occure")
                            {
                                $("#err").css('display','block');
				$("#err").fadeOut(5000);
				$("#error_value").text("Old password should not match with current password");
                            }
                            
                        }
                    });       
                }
            });
        });  
            </script>
        <!-- END : LOGIN PAGE 5-2 -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>                                                                                                                                                                                                                                                                                 
