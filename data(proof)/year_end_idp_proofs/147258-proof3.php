



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
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>PMS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
         <!-- BEGIN LAYOUT FIRST STYLES -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />       
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
        
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />  
       
         
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

       

         </br><h1><?php $curr_url= $_SERVER['QUERY_STRING'] ?></h1>
                                

         <?php 
 

         if($curr_url == "r=Login/dashboard"){
        ?>
           <style type="text/css">
                  #dash{
                    background-color:#f9f9f9;
                   }
                  #pms{

                    background-color:#39424a;

                    color:#636e77;
                   }

           </style>
            <script type="text/javascript">
    $(document).ready(function(){
    
    $("a").click(function(){
        $("#pms").off("click");
    });
});
  </script>


        <?php
         }
         else{
                
           
        ?>
            <style type="text/css">
                   #pms{
                    background-color:#f9f9f9;
                   }
                   #dash{

                    background-color:#39424a;

                    color:#636e77;
                   }

           </style>
           <script type="text/javascript">
    $(document).ready(function(){
    
    $("a").click(function(){
        $("#dash").off("click");
    });
});
  </script>

        <?php
    }?>


    
    </head>

 
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo">
       
                               


        <!-- BEGIN CONTAINER -->
        <div class="wrapper">
            <!-- BEGIN HEADER -->
            <header class="page-header">
                <nav class="navbar mega-menu" role="navigation">
                    <div class="container-fluid">
                        <div class="clearfix navbar-fixed-top">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                            <!-- End Toggle Button -->
                            <!-- BEGIN LOGO -->
                            <a id="index" class="page-logo" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Login/dashboard">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/img/login/kritva_logo.png" alt="Logo"> </a>
                            <!-- END LOGO -->
                            <!-- BEGIN SEARCH -->
                            <form class="search" action="extra_search.html" method="GET">
                                <input type="name" class="form-control" name="query" placeholder="Search...">
                                <a href="javascript:;" class="btn submit md-skip">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                            <!-- END SEARCH -->
                            <!-- BEGIN TOPBAR ACTIONS -->
                            <div class="topbar-actions">
                                <!-- BEGIN GROUP NOTIFICATION -->
                                <div class="btn-group-notification btn-group" id="header_notification_bar">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="icon-bell"></i>
                                        <span id="get_count" class="badge"><?php if(isset($notication_data) && count($notication_data)!=0) { echo count($notication_data); }?></span>
                                    </button>
                                    <?php if(isset($notifications_count) && $notifications_count!='') { ?>
                                    <ul class="dropdown-menu-v2">                                        
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">
                                            <?php 
                                            foreach ($notifications_count as $row) {?>
                                                <li>
                                                    <a href="#">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success md-skip">
                                                                <i class="fa fa-plus"></i>
                                                            </span><label id="emp_id" style="display: none"><?php echo $row['Employee_id']; ?></label><?php echo $row['notification_type']." "; ?></span>
                                                        <span class="time"><?php echo $row['date']; ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?>                                                                                                
                                            </ul>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                </div>

                                 
                                <script type="text/javascript">
                                    $(function(){
                                        $("#header_notification_bar").click(function(){
                                            var data = {
                                                'Employee_id' : $("#emp_id").text(),
                                                'chk_flag' : '1'
                                            };
                                            var base_url = window.location.origin;
                                            $.ajax({
                                                type : 'post',
                                                datatype : 'html',
                                                data : data,
                                                url : base_url+'/pmsapp/index.php?r=Setgoals/update_notificationflag',
                                                success : function(data)
                                                {
                                                   //alert(data);  
                                                   $("#get_count").text('');                                
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- END GROUP NOTIFICATION -->
                                <!-- BEGIN GROUP INFORMATION -->
                                <div class="btn-group-red btn-group">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    
                                </div>

                              
                                <div class="btn-group-img btn-group">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span>Hi, <?php if(Yii::app()->user->getState("Employee_name") && Yii::app()->user->getState("Employee_name")!='') { print_r(Yii::app()->user->getState("Employee_name")); }?></span>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/img/avatar1.jpg" alt=""> </button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Login/dashboard">
                                                <i class="icon-user"></i> My Profile
                                            </a>
                                        </li>                                        
                                        <li>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Adminlogin/employee_logout"><i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </div>
                               
                                </button>  -->     
                                     <div class="btn-group-red btn-group">
                                   
                                </div>                          
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </div>
                            <!-- END TOPBAR ACTIONS -->                            
                        </div>

                        <!-- BEGIN HEADER MENU -->

                         <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown dropdown-fw  ">
                                    <a href="javascript:;" class="text-uppercase" id="dash" >
                                        <i class="icon-home"></i> Dashboard </a>
                                    
                                </li>
                                <li class="dropdown dropdown-fw  ">
                                    <a href="javascript:;" class="text-uppercase" id="pms" >
                                        <i class="icon-puzzle"></i> PMS </a>

                                    <ul class="dropdown-menu dropdown-menu-fw">
                                        <li class="dropdown more-dropdown-sub">
                                             <a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=Login/dashboard">Profile</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="ui_colors.html"> Self </a>
                                                </li>
                                                <li>
                                                    <a href="ui_colors.html"> Sub ordinates </a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-puzzle"></i> Goal Sheet</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="ui_colors.html"> Self </a>
                                                </li>
                                                <li>
                                                    <a href="ui_colors.html"> Sub ordinates </a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-puzzle"></i> Mid Year Review </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="ui_colors.html"> Self </a>
                                                </li>
                                                <li>
                                                    <a href="ui_colors.html"> Sub ordinates </a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                                
                                            </ul>
                                                
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </li>
                        <!-- END HEADER MENU -->
                    </div>
                    <!--/container-->
                </nav>
            </header>
             <div>       
               