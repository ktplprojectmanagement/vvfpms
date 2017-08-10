<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css_extended/admin_css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css_extended/admin_css/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css_extended/admin_css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" /> 
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
    <input type="text" value="/vvf.kritva.in" id="basepath" style="display:none">
<script type="text/javascript">
var basepath = $("#basepath").attr('value');
</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <script src="http://momentjs.com/downloads/moment.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    var interval = setInterval(function() {
                        var momentNow = moment();
                        $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                                            + momentNow.format('dddd')
                                             .substring(0,3).toUpperCase());
                       
                        $('#time-part').html(momentNow.format('A hh:mm:ss'));
                    }, 100);
                });
            </script>
            <style type="text/css">
                .page-header.navbar .top-menu .navbar-nav > li.dropdown:last-child
                {
                    padding-right: 13px;
                }
            </style>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Admin_Dashboard">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Logo.png" style="height: 48px;width: 127px;margin-top: 1px;
}" alt="VVF" class="logo-default">
                    <div class="menu-toggler sidebar-toggler" style="display:none">
                        <span></span>
                    </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <div class="top-menu">
                   <div class='time-frame border-blue-soft' style="float: right;color: white;max-width: 157px;">
                    <div id='date-part'></div>
                    <div id='time-part'></div>
                </div>
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Settings" class="dropdown-toggle">
                                <i class="icon-settings" style="color:white;padding-right: 30px;"></i>
                            </a>
                        </li>
                        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Adminlogin" class="dropdown-toggle">
                                <i class="fa fa-sign-out" style="color:white;padding-right: 30px;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
            <style type="text/css">
            .active
            {
                background-color:red; 
            }
            </style>            
                <div class="page-sidebar navbar-collapse collapse">                   
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>                                      
                        <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Admin_Dashboard"); ?>" class="nav-link nav-toggle " <?php if (isset($selected_option) && $selected_option=='dashboard') { ?>style="background-color:#15535e;"<?php }?>>
                                <span class="title">Home</span>
                            </a>
                        </li>  
                        <!--<li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Newemployee"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='newemployee') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">Employee</span>
                            </a>
                        </li>-->
                        <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Newemployee/employee_master"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='employee_master') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">Employee Master</span>
                            </a>
                        </li> 
                       <!--  <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Organization_flow"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='org_chart') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">Organization Chart</span>
                            </a>
                        </li> -->
                        <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/KRA/kra_create"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='kra_set') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">KRA</span>
                            </a>
                        </li>                       
                        <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/KPI/KPI_create"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='kpi_set') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">KPI</span>
                            </a>
                        </li>
			 <li class="nav-item start " >
                            <a href="<?php echo Yii::app()->createUrl("index.php/IDP_master"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='IDP') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">IDP Programs</span>
                            </a>
                        </li>
                        <li class="nav-item start " style="display:none">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Generatereport"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='Generatereport') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">Generate Report</span>
                            </a>
                        </li>
                        <li class="nav-item start " style="display:none">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Normalization"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='Normalization') { ?>style="background-color:#15535e;"<?php }?>>                                
                                <span class="title">Normalization</span>
                            </a>
                        </li>
<li class="nav-item start "  style="display:none">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Promotion_data"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='promotion') { ?><?php }?>>                                
                                <span class="title">Promotion</span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Assigndetails"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='Assigndetails') { ?><?php }?>>                                
                                <span class="title">Assign KRA</span>
                            </a>
                        </li>

                        <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Download_goalsheet"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='Assigndetails') { ?><?php }?>>                                
                                <span class="title">Download Goal sheet and IDP</span>
                            </a>
                        </li>
<li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Reset_password/reset_new",array("employee_id"=>Yii::app()->user->getState('Employee_id'))); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='Assigndetails') { ?><?php }?>>                                
                                <span class="title">Reset Password</span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="<?php echo Yii::app()->createUrl("index.php/Location_wiseAcces"); ?>" class="nav-link nav-toggle" <?php if (isset($selected_option) && $selected_option=='Assigndetails') { ?><?php }?>>                                
                                <span class="title">Location Wise Request</span>
                            </a>
                        </li>
                    </ul>
                </div>
