<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Appraisal Portal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
       
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css_extended/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css_extended/blue-steel.min.css" rel="stylesheet" type="text/css" />
      
        <link rel="shortcut icon" href="favicon.ico" />
            <style type="text/css">
        .page-header .page-header-menu .hor-menu .navbar-nav>li .dropdown-menu li>a:hover{
            background-color:#4B77BE; 
        }
        .page-footer{
            background-color: #154593;
            color:#fff;
        }
        .blink_me {
            -webkit-animation-name: blinker;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: infinite;

            -moz-animation-name: blinker;
            -moz-animation-duration: 1s;
            -moz-animation-timing-function: linear;
            -moz-animation-iteration-count: infinite;

            animation-name: blinker;
            animation-duration: 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @-moz-keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

        @-webkit-keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

        @keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }
        </style>
        </head>
    <?php
      $header_menu =new SettingsForm;
      $menu_settings_data = '';$menu_settings_data1 = '';
      $menu_list = array('goal_sub_date','mid_goal_set_tab_active-date','final_goal_set_tab_active-date');
        for ($i=0; $i < count($menu_list); $i++) { 
          $where = 'where setting_content = :setting_content and year = :year';
          $list = array('setting_content','year');
          $data = array($menu_list[$i],date('Y'));             
          $menu_settings_data[$i] = $header_menu->get_setting_data($where,$data,$list);
          if (isset($menu_settings_data[$i]['0']['setting_type']) && strtotime(date('Y-m-d'))<=strtotime($menu_settings_data[$i]['0']['setting_type'])) {
               $menu_settings_data1[$i] = '1';
          }
          else if(isset($menu_settings_data[$i]['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($menu_settings_data[$i]['0']['setting_type']))
          {
                $menu_settings_data1[$i] = '0';
          }
        }
       
        $employee=new EmployeeForm;
        $apr_email = Yii::app()->user->getState("employee_email");
        $where = 'where Reporting_officer1_id = :Reporting_officer1_id';
        $list = array('Reporting_officer1_id');
        $data = array(Yii::app()->user->getState("employee_email"));
        $is_apr = $employee->get_employee_data($where,$data,$list);

        ///////////////// Notification Data///////////////////////////
        $id = Yii::app()->user->getState("Employee_id");
        $notification_data=new NotificationsForm;
        $where1 = 'where Employee_id = :Employee_id';
        $list1 = array('Employee_id');
        $data2 = array($id);
        $notifications_count = $notification_data->get_notifications($where1,$data2,$list1);

        $where1 = 'where Employee_id = :Employee_id and chk_flag = :chk_flag';
        $list1 = array('Employee_id','chk_flag');
        $data2 = array($id,0);
        $notifications_pending = $notification_data->get_notifications($where1,$data2,$list1);
        //print_r($menu_settings_data1);die();
    ?>
    <body class="page-container-bg-solid"  onload="set_interval()" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
<style>
.fixed {
    position: fixed;
    top:0; left:0;
    width: 100%; }
</style>
<script>
$(function(){
$(window).scroll(function(){
  var sticky = $('.page-header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
});

$(document).ready(function(){
  $(document).on("scroll mousedown DOMMouseScroll mousewheel keydown", function (e) {
    if (e.which > 0 || e.type === "mousedown" || e.type === "mousewheel") {
       $('html, body').stop();
    }
});
</script>
        <input type="text" value="/pms" id="basepath">
<script type="text/javascript">
var basepath = $("#basepath").attr('value');
</script>
        <!-- BEGIN HEADER -->
        <div class="page-header" style="z-index: 5;">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/User_dashboard">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Logo.png" style="height: 62px;width: 135px;margin-top: 10px;" alt="logo" class="logo-default">
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                            <?php if(isset($notifications_pending) && count($notifications_pending)!=0) { ?>
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="circle" id="notify_circle1"><?php if(isset($notifications_pending) && count($notifications_pending)!=0) { echo count($notifications_pending); }?></span>
                                    <span class="corner" id="notify_circle2"></span>
                                </a>
                            <?php }else{ ?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-bell" aria-hidden="true" style="color: rgb(21, 69, 147);" id="seen_notification"></i>
                                </a>
                            <?php
                                }
                            ?>
                             <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-bell" aria-hidden="true" style="color: rgb(21, 69, 147);display: none;margin-top: -26px;" id="seen_notification1"></i>
                            </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <strong><?php if(isset($notifications_count) && count($notifications_count)!=0) { echo count($notifications_count); }?> New</strong> Notifications</h3>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>                                                
                                        <?php if(isset($notifications_count) && $notifications_count!='') { 
                                            foreach ($notifications_count as $row) {
                                        ?>
                                                          <a href="#">                                
                                                        <label id="emp_id" style="display: none"><?php echo $row['Employee_id']; ?></label>
                                                 <span class="details">
                                                            <span class="label label-sm label-icon label-success md-skip">
                                                                <i class="fa fa-plus"></i>
                                                            </span><label id="emp_id" style="display: none"><?php echo $row['Employee_id']; ?></label><?php echo " ".$row['notification_type']." "; ?></span>
                                                        <span class="time" style="float: right;"><?php echo $row['date']; ?></span>

                                                  </a>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </li>                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php
                                    $model=new EmployeeForm;
                                    $where = 'where Employee_id = :Employee_id';
                                    $list = array('Employee_id');
                                    $data = array(Yii::app()->user->getState("Employee_id"));
                                    $bookedData = $model->get_employee_data($where,$data,$list);
                                      $img = '';
                                      if (isset($bookedData['0']['Image'])) {  $img = $bookedData['0']['Image']; }else { $img = ''; }
                                   
                            ?>
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-mobile">Hi, <?php if(Yii::app()->user->getState("Employee_name") && Yii::app()->user->getState("Employee_name")!='') { print_r(Yii::app()->user->getState("Employee_name")); }?></span>
                                </a>
                            </li>
                            <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout" id="log_out_chk" onclick="log_out_chk()" style="color:red"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
            <script type="text/javascript">
            function log_out_chk()
            {
                var base_url = window.location.origin;
                window.location.href=base_url+'/index.php/Login/employee_logout';
            }
                $(function(){ 
                    $("#header_inbox_bar").click(function(){
                        var data = {
                            'Employee_id' : $("#emp_id").text(),
                            'chk_flag' : '1'
                        };
                        var base_url = window.location.origin;
                        $.ajax({
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Setgoals/update_notificationflag',
                            success : function(data)
                            {
                                $("#notify_circle1").css('display','none'); 
                                $("#notify_circle2").css('display','none'); 
                                $("#seen_notification").css('display','none');
                                $("#seen_notification1").css('display','block');                              
                            }
                        });
                    });
                });
            </script>
            <div class="page-header-menu">
                <div class="container">
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                            <li class="menu-dropdown classic-menu-dropdown <?php if (isset($selected_option) && $selected_option == 'Dashboard') { echo 'active';
                            } ?>">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/User_dashboard"> Dashboard
                                    <span class="arrow"></span>
                                </a>
                            </li>                               
                            
                        <li class="menu-dropdown classic-menu-dropdown <?php if (isset($selected_option) && $selected_option == 'Goals') { echo 'active';
                            } ?>">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Setgoals"> Goals
                                            <span class="arrow"></span>
                                        </a>
                                        
                                           <ul class="dropdown-menu pull-left">
                                                <li class="dropdown-submenu ">
                                                    <a href="#" class="nav-link nav-toggle ">
                                                       Goal Sheet
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Setgoals" class="nav-link ">
                                                                Self </a>
                                                        </li>
<?php
                                            if (isset($is_apr) && count($is_apr)>0) {
                                        ?>
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Setgoals/approvegoal_list" class="nav-link ">
                                                               Subordinates </a>
                                                        </li>
<?php
                                            }
                                        ?>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="#" class="nav-link nav-toggle ">
                                                       IDP
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/IDP" class="nav-link ">
                                                                Self </a>
                                                        </li>
<?php
                                            if (isset($is_apr) && count($is_apr)>0) {
                                        ?>
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/IDP/IDP_approvegoal_list" class="nav-link ">
                                                               Subordinates </a>
                                                        </li>
<?php
                                            }
                                        ?>
                                                    </ul>
                                                </li>
                                            </ul>

                                        
                                       
                                    </li>
                           
                                    <li class="menu-dropdown classic-menu-dropdown <?php if (isset($selected_option) && $selected_option == 'Mid_review') { echo 'active';
                            } ?>">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Midreview/setbyemployee"> Mid-Year Review
                                            <span class="arrow"></span>
                                        </a>
                                        
                                        <ul class="dropdown-menu pull-left">
                                                <li class="dropdown-submenu ">
                                                    <a href="#" class="nav-link nav-toggle ">
                                                       Goal Sheet
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Midreview/setbyemployee" class="nav-link ">
                                                                Self </a>
                                                        </li>
						<?php
                                            if (isset($is_apr) && count($is_apr)>0) {
                                        ?>
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Midreview" class="nav-link ">
                                                               Subordinates </a>
                                                        </li> <?php
                                            }
                                        ?>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="#" class="nav-link nav-toggle ">
                                                       IDP
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/IDP/Midyear_subordinate_idp1" class="nav-link ">
                                                                Self </a>
                                                        </li>
<?php
                                            if (isset($is_apr) && count($is_apr)>0) {
                                        ?>
                                                        <li class=" ">
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/IDP/IDP_Mid_approvegoal_list" class="nav-link ">
                                                               Subordinates </a>
                                                        </li><?php
                                            }
                                        ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        
                                    </li>
                            
                               <li class="menu-dropdown classic-menu-dropdown <?php if (isset($selected_option) && $selected_option == 'year end review') { echo 'active';
                            } ?>">
                                <a href="#"> Year-End Review
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class="dropdown-submenu ">
                                        <a href="#">
                                            Review(A)</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-submenu ">
                                       <a href="#">
                                           Review(B)</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>
                            
                           <li class="menu-dropdown classic-menu-dropdown <?php if (isset($selected_option) && $selected_option == 'Dashboard') { echo 'active';
                            } ?>">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Login/dashboard"> My Profile
                                    <span class="arrow"></span>
                                </a>
                            </li>  
                        </ul>
                    </div>
                </div>
            </div>
        </div>
