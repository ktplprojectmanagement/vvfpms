<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>User Login</title>
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

    <body class=" login" >
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
        <!-- BEGIN : LOGIN PAGE 5-2 -->

        <div class="user-login-5">
         <div style="background-color:whitesmoke;" class="row bs-reset">

                <div class="col-md-5 login-container bs-reset" >
                   <img style="height: 50px;top:20px;left:10px;" class="login-logo login-6" src="<?php echo Yii::app()->request->baseUrl; ?>/images/Logo.png">
                            <div class="content" style="border: 1px solid rgb(50, 197, 210); margin-top: 131px;">
            <!-- BEGIN LOGIN FORM -->
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
             
                 <div id="login_window">
                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                     <?php echo $form->textField($model,'username',array('class'=>'form-control username','placeholder'=>'Email or Employee ID')); ?>
                    <?php echo $form->error($model,'username',array('style'=>'color:red')); ?></div>

                <div class="form-group">
                   <?php echo $form->passwordField($model,'password',array('class'=>'form-control password','placeholder'=>'Password')); ?>
                <?php echo $form->error($model,'password',array('style'=>'color:red')); ?>
                 </div>
                <div class="form-actions" style="border: medium none;">
                     <?php echo CHtml::button('Login',array('class'=>'btn green pull-right','id'=>'login_check')); ?>
                    <!-- <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> -->
                    <div class="col-md-6" ><a href="javascript:;" id="forget-password" class="forget-password" style="text-decoration: none;
color: rgb(50, 197, 210);">Forgot Password?</a></div>
                </div>
                </div>
                <div id="forget_window" style="display: none">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                   <?php echo CHtml::textField('email_id','',array('class'=>'form-control placeholder-no-fix email_reset')); ?></div>
                    <div class="form-actions" style="border: none;">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Login"><button type="button" class="btn green btn-outline">Back</button></a>
                        <?php echo CHtml::button('Submit',array('class'=>'btn green pull-right','id'=>'reset_login')); ?>
                        <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i>
                    </div>
                </div>
           
            <?php $this->endWidget(); ?>

            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
           <!--  <form class="forget-form" action="index.html" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form> -->
            <!-- END FORGOT PASSWORD FORM -->
          
        </div>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-notific8.min.js" type="text/javascript"></script>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
        $(function(){
$("#LoginForm_password").keypress(function(e){
var key = e.which;
 if(key == 13)  // the enter key code
  {
   var data = {
                                'username' : $(".username").val(),
                                'password' : $(".password").val(),
                            };
var base_url = window.location.origin;
                           $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : data,
                                'url' : base_url+$("#basepath").attr('value')+'/index.php?r=Account_test/check',
                                success : function(data)
                                {
                                
                                        if (data == '1')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Setgoals";
                                        }
                                        else if (data == '0')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Setgoals/approvegoal_list";
                                        }
                                        else if (data == '2')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Midreview";
                                        }
                                        else if (data == '3')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/setbyemployee";
                                        }
                                        else if (data == '4')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/IDP";
                                        }
                                        else if (data == '5')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/IDP_approvegoal_list";
                                        }
                                        else if (data == '6')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Midyear_subordinate_idp1";
                                        }
                                        else if (data == '7')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/IDP/IDP_Mid_approvegoal_list";
                                        }
                                        else if (data == 'Valid')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/User_dashboard";
                                        }                                        
                                        else if(data == 'already_login')
                                        {
                                            //$("#already_login").text("User already login");
                                            window.location.href=base_url+$("#basepath").attr('value')+'/index.php/Login';
                                        }
                                        else if(data == 'reset_pending')
                                        {
                                            window.location.href=base_url+$("#basepath").attr('value')+'/index.php/Reset_password/Index/';
                                        }
                                        else
                                        {
                                            $("#err").css('display','block');
						$("#error_value").text("Invalid login credentials");
                                        }
                                }
                            });  }
                         
                            });
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
                                'url' : base_url+$("#basepath").attr('value')+'/index.php?r=Account_test/check',
                                success : function(data)
                                {
alert(data);
                                $("#err").css('display','none');
                                         if (data == '1')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Setgoals";
                                        }
                                        else if (data == '0')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Setgoals/approvegoal_list";
                                        }
                                        else if (data == '2')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Midreview";
                                        }
                                        else if (data == '3')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/setbyemployee";
                                        }
                                        else if (data == '4')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/IDP";
                                        }
                                        else if (data == '5')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/IDP_approvegoal_list";
                                        }
                                        else if (data == '6')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/Midyear_subordinate_idp1";
                                        }
                                        else if (data == '7')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/IDP/IDP_Mid_approvegoal_list";
                                        }
                                        else if (data == 'Valid')
                                        {
                                            window.location.href = base_url+$("#basepath").attr('value')+"/index.php/User_dashboard";
                                        }                                        
                                        else if(data == 'already_login')
                                        {
                                            //$("#already_login").text("User already login");
                                            window.location.href=base_url+$("#basepath").attr('value')+'/index.php/Login';
                                        }
                                        else if(data == 'reset_pending')
                                        {
                                            window.location.href=base_url+$("#basepath").attr('value')+'/index.php/Reset_password/Index/';
                                        }
                                        else
                                        {
						$("#err").css('display','block');
						$("#error_value").text("Invalid login credentials");
                                        }
                                }
                            });
                    });
            $('#forget-password').click(function(){
                $("#login_window").hide();
                $("#forget_window").show();
            });
            // $('#back-btn').click(function(){
            //     $("#login_window").show();
            //     $("#forget_window").hide();
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
                        url : base_url+$("#basepath").attr('value')+'/index.php?r=Login/reset_password',
                        success : function(data)
                        { 
                        $("#updation_spinner").css('display','none'); 
                            if (data == "Notification Send")
                            {
                                $("#err").css('display','block');
				$("#err").fadeOut(5000);
				$("#error_value").text("Reset Password Link set to you on your email please check.");
                            }
                            
                        }
                    });                    
                }
                else
                {
			$("#err").css('display','block');
			$("#err").fadeOut(5000);
			$("#error_value").text("Please Enter Valid Email ID");
                }
            });
        });
                        
            </script>
        <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>2016 Copyright &copy; Kritva Technologies Pvt. Ltd.</p>
                                </div>
                            </div>
                        </div>
                    </div>

         </div>  
                <div class="col-md-7 bs-reset">
                    <div class="login-bg" style="background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/img/login/Test1.jpg)"> </div>
                        
                </div>

            </div>

        </div>

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
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-notific8.min.js" type="text/javascript"></script>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
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
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>                                                                                                                                                                                                                                                                                 
