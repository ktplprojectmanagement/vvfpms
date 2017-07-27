            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>User Profile</h1>
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
                     <?php
                                    $model=new EmployeeForm;
                                    $where = 'where Employee_id = :Employee_id';
                                    $list = array('Employee_id');
                                    $data = array(Yii::app()->user->getState("Employee_id"));
                                    $bookedData = $model->get_employee_data($where,$data,$list);
                                      $img = '';
                                      if (isset($bookedData['0']['Image'])) {  $img = $bookedData['0']['Image']; }else { $img = ''; }
                                   
                                ?>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN PROFILE SIDEBAR -->
                                        <div class="profile-sidebar">
                                            <!-- PORTLET MAIN -->
                                            <div class="portlet light profile-sidebar-portlet bordered">
                                                <!-- SIDEBAR USERPIC -->
                                                <div class="profile-userpic">
                                                    <img src="<?php echo $img; ?>" class="img-responsive" alt=""> </div>
                                                <!-- END SIDEBAR USERPIC -->
                                                <!-- SIDEBAR USER TITLE -->
                                                <div class="profile-usertitle">
                                                    <div class="profile-usertitle-name"> User Name </div>
                                                    <div class="profile-usertitle-job"> Developer </div>
                                                </div>
                                                <!-- END SIDEBAR USER TITLE -->
                                                <!-- SIDEBAR BUTTONS -->
                                                <div class="profile-userbuttons">
                                                    <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                                    <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                                </div>
                                                <!-- END SIDEBAR BUTTONS -->
                                                <!-- SIDEBAR MENU -->
                                                <div class="profile-usermenu">
                                                    <ul class="nav">
                                                        <li class="active">
                                                            <a href="page_user_profile_1.html">
                                                                <i class="icon-home"></i> Overview </a>
                                                        </li>
                                                        <li>
                                                            <a href="page_user_profile_1_account.html">
                                                                <i class="icon-settings"></i> Account Settings </a>
                                                        </li>
                                                        <li>
                                                            <a href="page_user_profile_1_help.html">
                                                                <i class="icon-info"></i> Help </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- END MENU -->
                                            </div>
                                            <!-- END PORTLET MAIN -->
                                            <!-- PORTLET MAIN -->
                                            <div class="portlet light bordered">
                                                <!-- STAT -->
                                                <div class="row list-separated profile-stat">
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 37 </div>
                                                        <div class="uppercase profile-stat-text"> Projects </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 51 </div>
                                                        <div class="uppercase profile-stat-text"> Tasks </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 61 </div>
                                                        <div class="uppercase profile-stat-text"> Uploads </div>
                                                    </div>
                                                </div>
                                                <!-- END STAT -->
                                                <div>
                                                    <h4 class="profile-desc-title">About User</h4>
                                                    <span class="profile-desc-text"> Some Information about user. </span>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="#">http://www.kritva.com/</a>
                                                    </div>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-twitter"></i>
                                                        <a href="#/">@kritva</a>
                                                    </div>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-facebook"></i>
                                                        <a href="#">kritva</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END PORTLET MAIN -->
                                        </div>
                                        <!-- END BEGIN PROFILE SIDEBAR -->
                                        <!-- BEGIN PROFILE CONTENT -->
                                        <div class="profile-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- BEGIN PORTLET -->
                                                    <div class="portlet light bordered">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart theme-font hide"></i>
                                                                <span class="caption-subject font-blue-madison bold uppercase">Your Activity</span>
                                                                <span class="caption-helper hide">weekly stats...</span>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                    <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                                                        <input type="radio" name="options" class="toggle" id="option1">Today</label>
                                                                    <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                                        <input type="radio" name="options" class="toggle" id="option2">Week</label>
                                                                    <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                                        <input type="radio" name="options" class="toggle" id="option2">Month</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row number-stats margin-bottom-30">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="stat-left">
                                                                        <div class="stat-chart">
                                                                            <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                                            <div id="sparkline_bar"></div>
                                                                        </div>
                                                                        <div class="stat-number">
                                                                            <div class="title"> Total </div>
                                                                            <div class="number"> 2460 </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="stat-right">
                                                                        <div class="stat-chart">
                                                                            <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                                            <div id="sparkline_bar2"></div>
                                                                        </div>
                                                                        <div class="stat-number">
                                                                            <div class="title"> New </div>
                                                                            <div class="number"> 719 </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="table-scrollable table-scrollable-borderless">
                                                                <table class="table table-hover table-light">
                                                                    <thead>
                                                                        <tr class="uppercase">
                                                                            <th colspan="2"> MEMBER </th>
                                                                            <th> Earnings </th>
                                                                            <th> CASES </th>
                                                                            <th> CLOSED </th>
                                                                            <th> RATE </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tr>
                                                                        <td class="fit">
                                                                            <img class="user-pic" src="../assets/pages/media/users/avatar4.jpg"> </td>
                                                                        <td>
                                                                            <a href="javascript:;" class="primary-link">Brain</a>
                                                                        </td>
                                                                        <td> $345 </td>
                                                                        <td> 45 </td>
                                                                        <td> 124 </td>
                                                                        <td>
                                                                            <span class="bold theme-font">80%</span>
                                                                        </td>
                                                                    </tr>                                                               
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END PORTLET -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PROFILE CONTENT -->
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>                
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>       
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/profile.min.js" type="text/javascript"></script>        
    
