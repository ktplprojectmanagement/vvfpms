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
        <title>Metronic | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
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
                            <a id="index" class="page-logo" href="index.html">
                                <img src="../assets/layouts/layout5/img/logo.png" alt="Logo"> </a>
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
                                        <span class="badge">7</span>
                                    </button>
                                    <ul class="dropdown-menu-v2">
                                        <li class="external">
                                            <h3>
                                                <span class="bold">12 pending</span> notifications</h3>
                                            <a href="#">view all</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success md-skip">
                                                                <i class="fa fa-plus"></i>
                                                            </span> New user registered. </span>
                                                        <span class="time">just now</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Server #12 overloaded. </span>
                                                        <span class="time">3 mins</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning md-skip">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span> Server #2 not responding. </span>
                                                        <span class="time">10 mins</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info md-skip">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> Application error. </span>
                                                        <span class="time">14 hrs</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Database overloaded 68%. </span>
                                                        <span class="time">2 days</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> A user IP blocked. </span>
                                                        <span class="time">3 days</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning md-skip">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span> Storage Server #4 not responding dfdfdfd. </span>
                                                        <span class="time">4 days</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info md-skip">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> System Error. </span>
                                                        <span class="time">5 days</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Storage server failed. </span>
                                                        <span class="time">9 days</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END GROUP NOTIFICATION -->
                                <!-- BEGIN GROUP INFORMATION -->
                                <div class="btn-group-red btn-group">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li class="active">
                                            <a href="#">New Post</a>
                                        </li>
                                        <li>
                                            <a href="#">New Comment</a>
                                        </li>
                                        <li>
                                            <a href="#">Share</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Comments
                                                <span class="badge badge-success">4</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Feedbacks
                                                <span class="badge badge-danger">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END GROUP INFORMATION -->
                                <!-- BEGIN USER PROFILE -->
                                <div class="btn-group-img btn-group">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span>Hi, Marcus</span>
                                        <img src="../assets/layouts/layout5/img/avatar1.jpg" alt=""> </button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <a href="page_user_profile_1.html">
                                                <i class="icon-user"></i> My Profile
                                                <span class="badge badge-danger">1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="app_calendar.html">
                                                <i class="icon-calendar"></i> My Calendar </a>
                                        </li>
                                        <li>
                                            <a href="app_inbox.html">
                                                <i class="icon-envelope-open"></i> My Inbox
                                                <span class="badge badge-danger"> 3 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="app_todo_2.html">
                                                <i class="icon-rocket"></i> My Tasks
                                                <span class="badge badge-success"> 7 </span>
                                            </a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="page_user_lock_1.html">
                                                <i class="icon-lock"></i> Lock Screen </a>
                                        </li>
                                        <li>
                                            <a href="page_user_login_1.html">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END USER PROFILE -->
                                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                <button type="button" class="quick-sidebar-toggler md-skip" data-toggle="collapse">
                                    <span class="sr-only">Toggle Quick Sidebar</span>
                                    <i class="icon-logout"></i>
                                </button>
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </div>
                            <!-- END TOPBAR ACTIONS -->
                        </div>
                        <!-- BEGIN HEADER MENU -->
                        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown dropdown-fw  active open selected">
                                    <a href="javascript:;" class="text-uppercase">
                                        <i class="icon-home"></i> Dashboard </a>
                                    <ul class="dropdown-menu dropdown-menu-fw">
                                        <li class="active">
                                            <a href="index.html">
                                                <i class="icon-bar-chart"></i> Default </a>
                                        </li>
                                        <li>
                                            <a href="dashboard_2.html">
                                                <i class="icon-bulb"></i> Dashboard 2 </a>
                                        </li>
                                        <li>
                                            <a href="dashboard_3.html">
                                                <i class="icon-graph"></i> Dashboard 3 </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-fw  ">
                                    <a href="javascript:;" class="text-uppercase">
                                        <i class="icon-puzzle"></i> Features </a>
                                    <ul class="dropdown-menu dropdown-menu-fw">
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-diamond"></i> UI Features </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="ui_colors.html"> Color Library </a>
                                                </li>
                                                <li>
                                                    <a href="ui_general.html"> General Components </a>
                                                </li>
                                                <li>
                                                    <a href="ui_buttons.html"> Buttons </a>
                                                </li>
                                                <li>
                                                    <a href="ui_buttons_spinner.html"> Spinner Buttons </a>
                                                </li>
                                                <li>
                                                    <a href="ui_confirmations.html"> Popover Confirmations </a>
                                                </li>
                                                <li>
                                                    <a href="ui_icons.html"> Font Icons </a>
                                                </li>
                                                <li>
                                                    <a href="ui_socicons.html"> Social Icons </a>
                                                </li>
                                                <li>
                                                    <a href="ui_typography.html"> Typography </a>
                                                </li>
                                                <li>
                                                    <a href="ui_tabs_accordions_navs.html"> Tabs, Accordions & Navs </a>
                                                </li>
                                                <li>
                                                    <a href="ui_tree.html"> Tree View </a>
                                                </li>
                                                <li>
                                                    <a href="ui_timeline.html"> Timeline 1 </a>
                                                </li>
                                                <li>
                                                    <a href="ui_timeline_2.html"> Timeline 2 </a>
                                                </li>
                                                <li>
                                                    <a href="ui_timeline_horizontal.html"> Horizontal Timeline </a>
                                                </li>
                                                <li>
                                                    <a href="ui_page_progress_style_1.html"> Page Progress Bar - Flash </a>
                                                </li>
                                                <li>
                                                    <a href="ui_page_progress_style_2.html"> Page Progress Bar - Big Counter </a>
                                                </li>
                                                <li>
                                                    <a href="ui_blockui.html"> Block UI </a>
                                                </li>
                                                <li>
                                                    <a href="ui_bootstrap_growl.html"> Bootstrap Growl Notifications </a>
                                                </li>
                                                <li>
                                                    <a href="ui_notific8.html"> Notific8 Notifications </a>
                                                </li>
                                                <li>
                                                    <a href="ui_toastr.html"> Toastr Notifications </a>
                                                </li>
                                                <li>
                                                    <a href="ui_bootbox.html"> Bootbox Dialogs </a>
                                                </li>
                                                <li>
                                                    <a href="ui_alerts_api.html"> Metronic Alerts API </a>
                                                </li>
                                                <li>
                                                    <a href="ui_session_timeout.html"> Session Timeout </a>
                                                </li>
                                                <li>
                                                    <a href="ui_idle_timeout.html"> User Idle Timeout </a>
                                                </li>
                                                <li>
                                                    <a href="ui_modals.html"> Modals </a>
                                                </li>
                                                <li>
                                                    <a href="ui_extended_modals.html"> Extended Modals </a>
                                                </li>
                                                <li>
                                                    <a href="ui_tiles.html"> Tiles </a>
                                                </li>
                                                <li>
                                                    <a href="ui_timeline.html"> Timeline </a>
                                                </li>
                                                <li>
                                                    <a href="ui_datepaginator.html"> Date Paginator </a>
                                                </li>
                                                <li>
                                                    <a href="ui_nestable.html"> Nestable List </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-puzzle"></i> Components </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="components_date_time_pickers.html"> Date & Time Pickers </a>
                                                </li>
                                                <li>
                                                    <a href="components_color_pickers.html"> Color Pickers </a>
                                                </li>
                                                <li>
                                                    <a href="components_select2.html"> Select2 Dropdowns </a>
                                                </li>
                                                <li>
                                                    <a href="components_bootstrap_select.html"> Bootstrap Select </a>
                                                </li>
                                                <li>
                                                    <a href="components_multi_select.html"> Multi Select </a>
                                                </li>
                                                <li>
                                                    <a href="components_bootstrap_select_splitter.html"> Select Splitter </a>
                                                </li>
                                                <li>
                                                    <a href="components_typeahead.html"> Typeahead Autocomplete </a>
                                                </li>
                                                <li>
                                                    <a href="components_bootstrap_tagsinput.html"> Bootstrap Tagsinput </a>
                                                </li>
                                                <li>
                                                    <a href="components_bootstrap_switch.html"> Bootstrap Switch </a>
                                                </li>
                                                <li>
                                                    <a href="components_bootstrap_maxlength.html"> Bootstrap Maxlength </a>
                                                </li>
                                                <li>
                                                    <a href="components_bootstrap_fileinput.html"> Bootstrap File Input </a>
                                                </li>
                                                <li>
                                                    <a href="components_bootstrap_touchspin.html"> Bootstrap Touchspin </a>
                                                </li>
                                                <li>
                                                    <a href="components_form_tools.html"> Form Widgets & Tools </a>
                                                </li>
                                                <li>
                                                    <a href="components_context_menu.html"> Context Menu </a>
                                                </li>
                                                <li>
                                                    <a href="components_editors.html"> Markdown & WYSIWYG Editors </a>
                                                </li>
                                                <li>
                                                    <a href="components_code_editors.html"> Code Editors </a>
                                                </li>
                                                <li>
                                                    <a href="components_ion_sliders.html"> Ion Range Sliders </a>
                                                </li>
                                                <li>
                                                    <a href="components_noui_sliders.html"> NoUI Range Sliders </a>
                                                </li>
                                                <li>
                                                    <a href="components_knob_dials.html"> Knob Circle Dials </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-settings"></i> Form Stuff </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="form_controls.html"> Bootstrap Form
                                                        <br>Controls </a>
                                                </li>
                                                <li>
                                                    <a href="form_controls_md.html"> Material Design
                                                        <br>Form Controls </a>
                                                </li>
                                                <li>
                                                    <a href="form_validation.html"> Form Validation </a>
                                                </li>
                                                <li>
                                                    <a href="form_validation_states_md.html"> Material Design
                                                        <br>Form Validation States </a>
                                                </li>
                                                <li>
                                                    <a href="form_validation_md.html"> Material Design
                                                        <br>Form Validation </a>
                                                </li>
                                                <li>
                                                    <a href="form_layouts.html"> Form Layouts </a>
                                                </li>
                                                <li>
                                                    <a href="form_input_mask.html"> Form Input Mask </a>
                                                </li>
                                                <li>
                                                    <a href="form_editable.html"> Form X-editable </a>
                                                </li>
                                                <li>
                                                    <a href="form_wizard.html"> Form Wizard </a>
                                                </li>
                                                <li>
                                                    <a href="form_icheck.html"> iCheck Controls </a>
                                                </li>
                                                <li>
                                                    <a href="form_image_crop.html"> Image Cropping </a>
                                                </li>
                                                <li>
                                                    <a href="form_fileupload.html"> Multiple File Upload </a>
                                                </li>
                                                <li>
                                                    <a href="form_dropzone.html"> Dropzone File Upload </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="?p=">
                                                <i class="icon-wallet"></i> Portlets </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="portlet_boxed.html"> Boxed Portlets </a>
                                                </li>
                                                <li>
                                                    <a href="portlet_light.html"> Light Portlets </a>
                                                </li>
                                                <li>
                                                    <a href="portlet_solid.html"> Solid Portlets </a>
                                                </li>
                                                <li>
                                                    <a href="portlet_ajax.html"> Ajax Portlets </a>
                                                </li>
                                                <li>
                                                    <a href="portlet_draggable.html"> Draggable Portlets </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-bar-chart"></i> Charts </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="charts_amcharts.html"> amChart </a>
                                                </li>
                                                <li>
                                                    <a href="charts_flotcharts.html"> Flot Charts </a>
                                                </li>
                                                <li>
                                                    <a href="charts_flowchart.html"> Flow Charts </a>
                                                </li>
                                                <li>
                                                    <a href="charts_google.html"> Google Charts </a>
                                                </li>
                                                <li>
                                                    <a href="charts_echarts.html"> eCharts </a>
                                                </li>
                                                <li>
                                                    <a href="charts_morris.html"> Morris Charts </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> HighCharts </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-cloud-upload"></i> Elements </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="elements_steps.html"> Steps </a>
                                                </li>
                                                <li>
                                                    <a href="elements_lists.html"> Lists </a>
                                                </li>
                                                <li>
                                                    <a href="elements_ribbons.html"> Ribbons </a>
                                                </li>
                                                <li>
                                                    <a href="elements_overlay.html"> Overlays </a>
                                                </li>
                                                <li>
                                                    <a href="elements_cards.html"> User Cards </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-pointer"></i> Maps </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="maps_google.html"> Google Maps </a>
                                                </li>
                                                <li>
                                                    <a href="maps_vector.html"> Vector Maps </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-fw  ">
                                    <a href="javascript:;" class="text-uppercase">
                                        <i class="icon-briefcase"></i> Tables </a>
                                    <ul class="dropdown-menu dropdown-menu-fw">
                                        <li>
                                            <a href="table_static_basic.html"> Basic Tables </a>
                                        </li>
                                        <li>
                                            <a href="table_static_responsive.html"> Responsive Tables </a>
                                        </li>
                                        <li>
                                            <a href="table_bootstrap.html"> Bootstrap Tables </a>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;"> Datatables </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="table_datatables_managed.html"> Managed Datatables </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_buttons.html"> Buttons Extension </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_colreorder.html"> Colreorder Extension </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_rowreorder.html"> Rowreorder Extension </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_scroller.html"> Scroller Extension </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_fixedheader.html"> FixedHeader Extension </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_responsive.html"> Responsive Extension </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_editable.html"> Editable Datatables </a>
                                                </li>
                                                <li>
                                                    <a href="table_datatables_ajax.html"> Ajax Datatables </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-fw  ">
                                    <a href="javascript:;" class="text-uppercase">
                                        <i class="icon-layers"></i> Pages </a>
                                    <ul class="dropdown-menu dropdown-menu-fw">
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-basket"></i> eCommerce </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="ecommerce_index.html">
                                                        <i class="icon-home"></i> Dashboard </a>
                                                </li>
                                                <li>
                                                    <a href="ecommerce_orders.html">
                                                        <i class="icon-basket"></i> Orders </a>
                                                </li>
                                                <li>
                                                    <a href="ecommerce_orders_view.html">
                                                        <i class="icon-tag"></i> Order View </a>
                                                </li>
                                                <li>
                                                    <a href="ecommerce_products.html">
                                                        <i class="icon-graph"></i> Products </a>
                                                </li>
                                                <li>
                                                    <a href="ecommerce_products_edit.html">
                                                        <i class="icon-graph"></i> Product Edit </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-docs"></i> Apps </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="app_todo.html">
                                                        <i class="icon-clock"></i> Todo 1 </a>
                                                </li>
                                                <li>
                                                    <a href="app_todo_2.html">
                                                        <i class="icon-check"></i> Todo 2 </a>
                                                </li>
                                                <li>
                                                    <a href="app_inbox.html">
                                                        <i class="icon-envelope"></i> Inbox </a>
                                                </li>
                                                <li>
                                                    <a href="app_calendar.html">
                                                        <i class="icon-calendar"></i> Calendar </a>
                                                </li>
                                                <li>
                                                    <a href="app_ticket.html">
                                                        <i class="icon-notebook"></i> Support </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-user"></i> User </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="page_user_profile_1.html"> Profile 1 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_profile_1_account.html"> Profile 1 Account </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_profile_1_help.html"> Profile 1 Help </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_profile_2.html"> Profile 2 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_login_1.html"> Login Page 1 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_login_2.html"> Login Page 2 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_login_3.html"> Login Page 3 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_login_4.html"> Login Page 4 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_login_5.html"> Login Page 5 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_login_6.html"> Login Page 6 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_lock_1.html"> Lock Screen 1 </a>
                                                </li>
                                                <li>
                                                    <a href="page_user_lock_2.html"> Lock Screen 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-social-dribbble"></i> General </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="page_general_about.html"> About </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_contact.html"> Contact </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_portfolio_1.html"> Portfolio 1 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_portfolio_2.html"> Portfolio 2 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_portfolio_3.html"> Portfolio 3 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_portfolio_4.html"> Portfolio 4 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_search.html"> Search 1 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_search_2.html"> Search 2 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_search_3.html"> Search 3 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_search_4.html"> Search 4 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_search_5.html"> Search 5 </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_pricing.html"> Pricing </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_faq.html"> FAQ </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_blog.html"> Blog </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_blog_post.html"> Blog Post </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_invoice.html"> Invoice </a>
                                                </li>
                                                <li>
                                                    <a href="page_general_invoice_2.html"> Invoice 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                <i class="icon-settings"></i> System </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="layout_blank_page.html"> Blank Page </a>
                                                </li>
                                                <li>
                                                    <a href="page_system_coming_soon.html"> Coming Soon </a>
                                                </li>
                                                <li>
                                                    <a href="page_system_404_1.html"> 404 Page 1 </a>
                                                </li>
                                                <li>
                                                    <a href="page_system_404_2.html"> 404 Page 2 </a>
                                                </li>
                                                <li>
                                                    <a href="page_system_404_3.html"> 404 Page 3 </a>
                                                </li>
                                                <li>
                                                    <a href="page_system_500_1.html"> 500 Page 1 </a>
                                                </li>
                                                <li>
                                                    <a href="page_system_500_2.html"> 500 Page 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown more-dropdown">
                                    <a href="javascript:;" class="text-uppercase"> More </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Link 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Link 2</a>
                                        </li>
                                        <li>
                                            <a href="#">Link 3</a>
                                        </li>
                                        <li>
                                            <a href="#">Link 4</a>
                                        </li>
                                        <li>
                                            <a href="#">Link 5</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!--/container-->
                </nav>
            </header>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Dashboard</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="1349">0</span>
                                    </div>
                                    <div class="desc"> New Feedbacks </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="12,5">0</span>M$ </div>
                                    <div class="desc"> Total Profit </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="549">0</span>
                                    </div>
                                    <div class="desc"> New Orders </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> +
                                        <span data-counter="counterup" data-value="89"></span>% </div>
                                    <div class="desc"> Brand Popularity </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Site Visits</span>
                                        <span class="caption-helper">weekly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">New</label>
                                            <label class="btn red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading">
                                        <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_statistics_content" class="display-none">
                                        <div id="site_statistics" class="chart"> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Revenue</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                                <span class="fa fa-angle-down"> </span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Q1 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q2 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:;"> Q3 2014
                                                        <span class="label label-sm label-success"> current </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q4 2014
                                                        <span class="label label-sm label-warning"> upcoming </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading">
                                        <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_activities_content" class="display-none">
                                        <div id="site_activities" style="height: 228px;"> </div>
                                    </div>
                                    <div style="margin: 20px 0 10px 30px">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-success"> Revenue: </span>
                                                <h3>$13,234</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-info"> Tax: </span>
                                                <h3>$134,900</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-danger"> Shipment: </span>
                                                <h3>$1,134</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-warning"> Orders: </span>
                                                <h3>235090</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Comments</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#portlet_comments_1" data-toggle="tab"> Pending </a>
                                        </li>
                                        <li>
                                            <a href="#portlet_comments_2" data-toggle="tab"> Approved </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="portlet_comments_1">
                                            <!-- BEGIN: Comments -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar1.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Michael Baker</span>
                                                            <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar6.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Larisa Maskalyova</span>
                                                            <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Natasha Kim</span>
                                                            <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic. </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Sebastian Davidson</span>
                                                            <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> The standard chunk of Lorem or non-characteristic Ipsum used since the 1500s or non-characteristic. </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END: Comments -->
                                        </div>
                                        <div class="tab-pane" id="portlet_comments_2">
                                            <!-- BEGIN: Comments -->
                                            <div class="mt-comments">
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Michael Baker</span>
                                                            <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Larisa Maskalyova</span>
                                                            <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> It is a long established fact that a reader will be distracted by. </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar6.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Natasha Kim</span>
                                                            <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="../assets/pages/media/users/avatar1.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">Sebastian Davidson</span>
                                                            <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> The standard chunk of Lorem Ipsum used since the 1500s </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="#">Quick Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">View</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END: Comments -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class=" icon-social-twitter font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Quick Actions</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_actions_pending" data-toggle="tab"> Pending </a>
                                        </li>
                                        <li>
                                            <a href="#tab_actions_completed" data-toggle="tab"> Completed </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_actions_pending">
                                            <!-- BEGIN: Actions -->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar10.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class="icon-magnet"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Natasha Kim</span>
                                                                    <p class="mt-action-desc">Dummy text of the printing</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar3.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class=" icon-bubbles"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Gavin Bond</span>
                                                                    <p class="mt-action-desc">pending for approval</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-red"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar2.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class="icon-call-in"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Diana Berri</span>
                                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar7.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class=" icon-bell"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">John Clark</span>
                                                                    <p class="mt-action-desc">Text of the printing and typesetting industry</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-red"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class="icon-magnet"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Donna Clarkson </span>
                                                                    <p class="mt-action-desc">Simply dummy text of the printing</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar9.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class="icon-magnet"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Tom Larson</span>
                                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END: Actions -->
                                        </div>
                                        <div class="tab-pane" id="tab_actions_completed">
                                            <!-- BEGIN:Completed-->
                                            <div class="mt-actions">
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar1.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class="icon-action-redo"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Frank Cameron</span>
                                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-red"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class="icon-cup"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Ella Davidson </span>
                                                                    <p class="mt-action-desc">Text of the printing and typesetting industry</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar5.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class=" icon-graduation"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Jason Dickens </span>
                                                                    <p class="mt-action-desc">Dummy text of the printing and typesetting industry</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-red"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-action">
                                                    <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar2.jpg" /> </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class="icon-badge"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Jan Kim</span>
                                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-green"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END: Completed -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-directions font-green hide"></i>
                                        <span class="caption-subject bold font-dark uppercase "> Activities</span>
                                        <span class="caption-helper">Horizontal Timeline</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Action 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Action 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Action 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Action 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="cd-horizontal-timeline mt-timeline-horizontal">
                                        <div class="timeline">
                                            <div class="events-wrapper">
                                                <div class="events">
                                                    <ol>
                                                        <li>
                                                            <a href="#0" data-date="16/01/2014" class="border-after-red bg-after-red selected">16 Jan</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="28/02/2014" class="border-after-red bg-after-red">28 Feb</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="20/04/2014" class="border-after-red bg-after-red">20 Mar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="20/05/2014" class="border-after-red bg-after-red">20 May</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="09/07/2014" class="border-after-red bg-after-red">09 Jul</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="30/08/2014" class="border-after-red bg-after-red">30 Aug</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="15/09/2014" class="border-after-red bg-after-red">15 Sep</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="01/11/2014" class="border-after-red bg-after-red">01 Nov</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="10/12/2014" class="border-after-red bg-after-red">10 Dec</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="19/01/2015" class="border-after-red bg-after-red">29 Jan</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="03/03/2015" class="border-after-red bg-after-red">3 Mar</a>
                                                        </li>
                                                    </ol>
                                                    <span class="filling-line bg-red" aria-hidden="true"></span>
                                                </div>
                                                <!-- .events -->
                                            </div>
                                            <!-- .events-wrapper -->
                                            <ul class="cd-timeline-navigation mt-ht-nav-icon">
                                                <li>
                                                    <a href="#0" class="prev inactive btn btn-outline red md-skip">
                                                        <i class="fa fa-chevron-left"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#0" class="next btn btn-outline red md-skip">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- .cd-timeline-navigation -->
                                        </div>
                                        <!-- .timeline -->
                                        <div class="events-content">
                                            <ol>
                                                <li class="selected" data-date="16/01/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">New User</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_3.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">16 January 2014 : 7:45 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam
                                                            at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non est rhoncus volutpat.</p>
                                                        <a href="javascript:;" class="btn btn-circle red btn-outline">Read More</a>
                                                        <a href="javascript:;" class="btn btn-circle btn-icon-only blue">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li data-date="28/02/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Sending Shipment</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_3.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Hugh Grant</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle btn-outline green-jungle">Download Shipment List</a>
                                                        <div class="btn-group dropup pull-right">
                                                            <button class="btn btn-circle blue-steel dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">Action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Another action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Something else here </a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">Separated link </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-date="20/04/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Blue Chambray</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue">Rory Matthew</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="20/05/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="09/07/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Event Success</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Matt Goldman</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.</p>
                                                        <a href="javascript:;" class="btn btn-circle btn-outline purple-medium">View Summary</a>
                                                        <div class="btn-group dropup pull-right">
                                                            <button class="btn btn-circle green dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">Action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Another action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Something else here </a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">Separated link </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-date="30/08/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Conference Call</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Rory Matthew</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <img class="timeline-body-img pull-left" src="../assets/pages/media/blog/5.jpg" alt="">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="15/09/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Conference Decision</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_5.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Jessica Wolf</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">15 September 2014 : 8:30 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <img class="timeline-body-img pull-right" src="../assets/pages/media/blog/6.jpg" alt="">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-sharp">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="01/11/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">1 November 2014 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="10/12/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">10 December 2015 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="19/01/2015">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">19 January 2015 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="03/03/2015">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <!-- .events-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-directions font-green hide"></i>
                                        <span class="caption-subject bold font-dark uppercase"> Events</span>
                                        <span class="caption-helper">Horizontal Timeline</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn green btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn  green btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="cd-horizontal-timeline mt-timeline-horizontal">
                                        <div class="timeline mt-timeline-square">
                                            <div class="events-wrapper">
                                                <div class="events">
                                                    <ol>
                                                        <li>
                                                            <a href="#0" data-date="16/01/2014" class="border-after-blue bg-after-blue selected">Expo 2016</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="28/02/2014" class="border-after-blue bg-after-blue">New Promo</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="20/04/2014" class="border-after-blue bg-after-blue">Meeting</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="20/05/2014" class="border-after-blue bg-after-blue">Launch</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="09/07/2014" class="border-after-blue bg-after-blue">Party</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="30/08/2014" class="border-after-blue bg-after-blue">Reports</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="15/09/2014" class="border-after-blue bg-after-blue">HR</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="01/11/2014" class="border-after-blue bg-after-blue">IPO</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="10/12/2014" class="border-after-blue bg-after-blue">Board</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="19/01/2015" class="border-after-blue bg-after-blue">Revenue</a>
                                                        </li>
                                                        <li>
                                                            <a href="#0" data-date="03/03/2015" class="border-after-blue bg-after-blue">Dinner</a>
                                                        </li>
                                                    </ol>
                                                    <span class="filling-line bg-blue" aria-hidden="true"></span>
                                                </div>
                                                <!-- .events -->
                                            </div>
                                            <!-- .events-wrapper -->
                                            <ul class="cd-timeline-navigation mt-ht-nav-icon">
                                                <li>
                                                    <a href="#0" class="prev inactive btn blue md-skip">
                                                        <i class="fa fa-chevron-left"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#0" class="next btn blue md-skip">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- .cd-timeline-navigation -->
                                        </div>
                                        <!-- .timeline -->
                                        <div class="events-content">
                                            <ol>
                                                <li class="selected" data-date="16/01/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Expo 2016 Launch</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Lisa Bold</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">23 February 2014</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod mi felis, aliquam at iaculis eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis mi felis, aliquam at
                                                            iaculis eu, onsectetur adipiscing elit finibus eu ex. Integer efficitur leo eget dolor tincidunt, et dignissim risus lacinia. Nam in egestas onsectetur adipiscing elit nunc. Suspendisse potenti</p>
                                                        <a href="javascript:;" class="btn btn-circle dark btn-outline">Read More</a>
                                                        <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li data-date="28/02/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Sending Shipment</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_3.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Hugh Grant</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle btn-outline green-jungle">Download Shipment List</a>
                                                        <div class="btn-group dropup pull-right">
                                                            <button class="btn btn-circle blue-steel dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">Action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Another action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Something else here </a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">Separated link </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-date="20/04/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Blue Chambray</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue">Rory Matthew</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="20/05/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="09/07/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Event Success</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Matt Goldman</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.</p>
                                                        <a href="javascript:;" class="btn btn-circle btn-outline purple-medium">View Summary</a>
                                                        <div class="btn-group dropup pull-right">
                                                            <button class="btn btn-circle green dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">Action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Another action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Something else here </a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">Separated link </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-date="30/08/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Conference Call</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Rory Matthew</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <img class="timeline-body-img pull-left" src="../assets/pages/media/blog/5.jpg" alt="">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="15/09/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Conference Decision</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_5.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Jessica Wolf</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">15 September 2014 : 8:30 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <img class="timeline-body-img pull-right" src="../assets/pages/media/blog/6.jpg" alt="">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                            qui ut.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-sharp">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="01/11/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">1 November 2014 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="10/12/2014">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">10 December 2014 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="19/01/2015">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">19 January 2015 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                                <li data-date="03/03/2015">
                                                    <div class="mt-title">
                                                        <h2 class="mt-content-title">Timeline Received</h2>
                                                    </div>
                                                    <div class="mt-author">
                                                        <div class="mt-avatar">
                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                        </div>
                                                        <div class="mt-author-name">
                                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                        </div>
                                                        <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-content border-grey-steel">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                            risus sed sodales.</p>
                                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <!-- .events-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Recent Activities</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" /> Finance
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" checked="" /> Membership
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" /> Customer Support
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" checked="" /> HR
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" /> System
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                        <ul class="feeds">
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 4 pending tasks.
                                                                <span class="label label-sm label-warning "> Take action
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> Just now </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bar-chart-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received with
                                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 30 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                                <span class="label label-sm label-default "> Overdue </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 2 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-briefcase"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 4 pending tasks.
                                                                <span class="label label-sm label-warning "> Take action
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> Just now </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-danger">
                                                                    <i class="fa fa-bar-chart-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received with
                                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 30 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-warning">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                                <span class="label label-sm label-default "> Overdue </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 2 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-briefcase"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="scroller-footer">
                                        <div class="btn-arrow-link pull-right">
                                            <a href="javascript:;">See All Records</a>
                                            <i class="icon-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light tasks-widget bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Tasks</span>
                                        <span class="caption-helper">tasks summary...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> More
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> All Project </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> AirAsia </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Cruise </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> HSBC </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Pending
                                                        <span class="badge badge-danger"> 4 </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Completed
                                                        <span class="badge badge-success"> 12 </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Overdue
                                                        <span class="badge badge-warning"> 9 </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="task-content">
                                        <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                                            <!-- START TASK LIST -->
                                            <ul class="task-list">
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Present 2013 Year IPO Statistics at Board Meeting </span>
                                                        <span class="label label-sm label-success">Company</span>
                                                        <span class="task-bell">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Hold An Interview for Marketing Manager Position </span>
                                                        <span class="label label-sm label-danger">Marketing</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> AirAsia Intranet System Project Internal Meeting </span>
                                                        <span class="label label-sm label-success">AirAsia</span>
                                                        <span class="task-bell">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Technical Management Meeting </span>
                                                        <span class="label label-sm label-warning">Company</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Kick-off Company CRM Mobile App Development </span>
                                                        <span class="label label-sm label-info">Internal Products</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Prepare Commercial Offer For SmartVision Website Rewamp </span>
                                                        <span class="label label-sm label-danger">SmartVision</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Sign-Off The Comercial Agreement With AutoSmart </span>
                                                        <span class="label label-sm label-default">AutoSmart</span>
                                                        <span class="task-bell">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group dropup">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Company Staff Meeting </span>
                                                        <span class="label label-sm label-success">Cruise</span>
                                                        <span class="task-bell">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group dropup">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="last-line">
                                                    <div class="task-checkbox">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> KeenThemes Investment Discussion </span>
                                                        <span class="label label-sm label-warning">KeenThemes </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group dropup">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- END START TASK LIST -->
                                        </div>
                                    </div>
                                    <div class="task-footer">
                                        <div class="btn-arrow-link pull-right">
                                            <a href="javascript:;">See All Records</a>
                                            <i class="icon-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-cursor font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">General Stats</span>
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn btn-sm btn-circle red easy-pie-chart-reload">
                                            <i class="fa fa-repeat"></i> Reload </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number transactions" data-percent="55">
                                                    <span>+55</span>% </div>
                                                <a class="title" href="javascript:;"> Transactions
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number visits" data-percent="85">
                                                    <span>+85</span>% </div>
                                                <a class="title" href="javascript:;"> New Visits
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number bounce" data-percent="46">
                                                    <span>-46</span>% </div>
                                                <a class="title" href="javascript:;"> Bounce
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-equalizer font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Server Stats</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="" class="reload"> </a>
                                        <a href="" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_bar5"></div>
                                                <a class="title" href="javascript:;"> Network
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_bar6"></div>
                                                <a class="title" href="javascript:;"> CPU Load
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_line"></div>
                                                <a class="title" href="javascript:;"> Load Rate
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN REGIONAL STATS PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Regional Stats</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-container="false" data-placement="bottom" href="javascript:;"> </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="region_statistics_loading">
                                        <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="region_statistics_content" class="display-none">
                                        <div class="btn-toolbar margin-bottom-10">
                                            <div class="btn-group btn-group-circle" data-toggle="buttons">
                                                <a href="" class="btn grey-salsa btn-sm active"> Users </a>
                                                <a href="" class="btn grey-salsa btn-sm"> Orders </a>
                                            </div>
                                            <div class="btn-group pull-right">
                                                <a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Select Region
                                                    <span class="fa fa-angle-down"> </span>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_world"> World </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_usa"> USA </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_europe"> Europe </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_russia"> Russia </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_germany"> Germany </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="vmap_world" class="vmaps display-none"> </div>
                                        <div id="vmap_usa" class="vmaps display-none"> </div>
                                        <div id="vmap_europe" class="vmaps display-none"> </div>
                                        <div id="vmap_russia" class="vmaps display-none"> </div>
                                        <div id="vmap_germany" class="vmaps display-none"> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END REGIONAL STATS PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-globe font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Feeds</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" class="active" data-toggle="tab"> System </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab"> Activities </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <!--BEGIN TABS-->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_1">
                                            <div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
                                                <ul class="feeds">
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> You have 4 pending tasks.
                                                                        <span class="label label-sm label-info"> Take action
                                                                            <i class="fa fa-share"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> Just now </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New version v1.4 just lunched! </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 20 mins </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 24 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 30 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 40 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-warning">
                                                                        <i class="fa fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New user registered. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 1.5 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                                        <span class="label label-sm label-default "> Overdue </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 2 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 3 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-warning">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 5 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 18 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_1_2">
                                            <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                                                <ul class="feeds">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 10 mins </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Order #24DOP4 has been rejected.
                                                                        <span class="label label-sm label-danger "> Take action
                                                                            <i class="fa fa-share"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 24 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END TABS-->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light calendar bordered">
                                <div class="portlet-title ">
                                    <div class="caption">
                                        <i class="icon-calendar font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Feeds</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="calendar"> </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-hide hide"></i>
                                        <span class="caption-subject font-hide bold uppercase">Chats</span>
                                    </div>
                                    <div class="actions">
                                        <div class="portlet-input input-inline">
                                            <div class="input-icon right">
                                                <i class="icon-magnifier"></i>
                                                <input type="text" class="form-control input-circle" placeholder="search..."> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body" id="chats">
                                    <div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">
                                        <ul class="chats">
                                            <li class="out">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Lisa Wong </a>
                                                    <span class="datetime"> at 20:11 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="out">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Lisa Wong </a>
                                                    <span class="datetime"> at 20:11 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="in">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Bob Nilson </a>
                                                    <span class="datetime"> at 20:30 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="in">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Bob Nilson </a>
                                                    <span class="datetime"> at 20:30 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="out">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Richard Doe </a>
                                                    <span class="datetime"> at 20:33 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="in">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Richard Doe </a>
                                                    <span class="datetime"> at 20:35 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="out">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Bob Nilson </a>
                                                    <span class="datetime"> at 20:40 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="in">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Richard Doe </a>
                                                    <span class="datetime"> at 20:40 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </li>
                                            <li class="out">
                                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Bob Nilson </a>
                                                    <span class="datetime"> at 20:54 </span>
                                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-form">
                                        <div class="input-cont">
                                            <input class="form-control" type="text" placeholder="Type a message here..." /> </div>
                                        <div class="btn-cont">
                                            <span class="arrow"> </span>
                                            <a href="" class="btn blue icn-only">
                                                <i class="fa fa-check icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-dark hide"></i>
                                        <span class="caption-subject font-hide bold uppercase">Recent Users</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--begin: widget 1-1 -->
                                            <div class="mt-widget-1">
                                                <div class="mt-icon">
                                                    <a href="#">
                                                        <i class="icon-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="mt-img">
                                                    <img src="../assets/pages/media/users/avatar80_8.jpg"> </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-username">Diana Ellison</h3>
                                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>
                                                    <div class="mt-stats">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn font-red">
                                                                <i class="icon-bubbles"></i> 1,7k </a>
                                                            <a href="javascript:;" class="btn font-green">
                                                                <i class="icon-social-twitter"></i> 2,6k </a>
                                                            <a href="javascript:;" class="btn font-yellow">
                                                                <i class="icon-emoticon-smile"></i> 3,7k </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: widget 1-1 -->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin: widget 1-2 -->
                                            <div class="mt-widget-1">
                                                <div class="mt-icon">
                                                    <a href="#">
                                                        <i class="icon-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="mt-img">
                                                    <img src="../assets/pages/media/users/avatar80_7.jpg"> </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-username">Jason Baker</h3>
                                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>
                                                    <div class="mt-stats">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn font-yellow">
                                                                <i class="icon-bubbles"></i> 1,7k </a>
                                                            <a href="javascript:;" class="btn font-blue">
                                                                <i class="icon-social-twitter"></i> 2,6k </a>
                                                            <a href="javascript:;" class="btn font-green">
                                                                <i class="icon-emoticon-smile"></i> 3,7k </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: widget 1-2 -->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin: widget 1-3 -->
                                            <div class="mt-widget-1">
                                                <div class="mt-icon">
                                                    <a href="#">
                                                        <i class="icon-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="mt-img">
                                                    <img src="../assets/pages/media/users/avatar80_6.jpg"> </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-username">Julia Berry</h3>
                                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>
                                                    <div class="mt-stats">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn font-yellow">
                                                                <i class="icon-bubbles"></i> 1,7k </a>
                                                            <a href="javascript:;" class="btn font-red">
                                                                <i class="icon-social-twitter"></i> 2,6k </a>
                                                            <a href="javascript:;" class="btn font-green">
                                                                <i class="icon-emoticon-smile"></i> 3,7k </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: widget 1-3 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-dark hide"></i>
                                        <span class="caption-subject bold font-dark uppercase"> Recent Works</span>
                                        <span class="caption-helper">default option...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Settings</label>
                                            <label class="btn  red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mt-widget-2">
                                                <div class="mt-head" style="background-image: url(../assets/pages/img/background/32.jpg);">
                                                    <div class="mt-head-label">
                                                        <button type="button" class="btn btn-success">Manhattan</button>
                                                    </div>
                                                    <div class="mt-head-user">
                                                        <div class="mt-head-user-img">
                                                            <img src="../assets/pages/img/avatars/team7.jpg"> </div>
                                                        <div class="mt-head-user-info">
                                                            <span class="mt-user-name">Chris Jagers</span>
                                                            <span class="mt-user-time">
                                                                <i class="icon-emoticon-smile"></i> 3 mins ago </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-body-title"> Thomas Clark </h3>
                                                    <p class="mt-body-description"> It is a long established fact that a reader will be distracted </p>
                                                    <ul class="mt-body-stats">
                                                        <li class="font-green">
                                                            <i class="icon-emoticon-smile"></i> 3,7k</li>
                                                        <li class="font-yellow">
                                                            <i class=" icon-social-twitter"></i> 3,7k</li>
                                                        <li class="font-red">
                                                            <i class="  icon-bubbles"></i> 3,7k</li>
                                                    </ul>
                                                    <div class="mt-body-actions">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn">
                                                                <i class="icon-bubbles"></i> Bookmark </a>
                                                            <a href="javascript:;" class="btn ">
                                                                <i class="icon-social-twitter"></i> Share </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-widget-2">
                                                <div class="mt-head" style="background-image: url(../assets/pages/img/background/43.jpg);">
                                                    <div class="mt-head-label">
                                                        <button type="button" class="btn btn-danger">London</button>
                                                    </div>
                                                    <div class="mt-head-user">
                                                        <div class="mt-head-user-img">
                                                            <img src="../assets/pages/img/avatars/team3.jpg"> </div>
                                                        <div class="mt-head-user-info">
                                                            <span class="mt-user-name">Harry Harris</span>
                                                            <span class="mt-user-time">
                                                                <i class="icon-user"></i> 3 mins ago </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-body-title"> Christian Davidson </h3>
                                                    <p class="mt-body-description"> It is a long established fact that a reader will be distracted </p>
                                                    <ul class="mt-body-stats">
                                                        <li class="font-green">
                                                            <i class="icon-emoticon-smile"></i> 3,7k</li>
                                                        <li class="font-yellow">
                                                            <i class=" icon-social-twitter"></i> 3,7k</li>
                                                        <li class="font-red">
                                                            <i class="  icon-bubbles"></i> 3,7k</li>
                                                    </ul>
                                                    <div class="mt-body-actions">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn ">
                                                                <i class="icon-bubbles"></i> Bookmark </a>
                                                            <a href="javascript:;" class="btn ">
                                                                <i class="icon-social-twitter"></i> Share </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-dark hide"></i>
                                        <span class="caption-subject bold font-dark uppercase"> Recent Projects</span>
                                        <span class="caption-helper">default option...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn blue btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn  blue btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mt-widget-4">
                                                <div class="mt-img-container">
                                                    <img src="../assets/pages/img/background/34.jpg" /> </div>
                                                <div class="mt-container bg-purple-opacity">
                                                    <div class="mt-head-title"> Website Revamp & Deployment </div>
                                                    <div class="mt-body-icons">
                                                        <a href="#">
                                                            <i class=" icon-pencil"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-map"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mt-footer-button">
                                                        <button type="button" class="btn btn-circle btn-danger btn-sm">Dior</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-4">
                                                <div class="mt-img-container">
                                                    <img src="../assets/pages/img/background/46.jpg" /> </div>
                                                <div class="mt-container bg-green-opacity">
                                                    <div class="mt-head-title"> CRM Development & Deployment </div>
                                                    <div class="mt-body-icons">
                                                        <a href="#">
                                                            <i class=" icon-social-twitter"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-bubbles"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-bell"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mt-footer-button">
                                                        <button type="button" class="btn btn-circle blue-ebonyclay btn-sm">Nike</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-4">
                                                <div class="mt-img-container">
                                                    <img src="../assets/pages/img/background/37.jpg" /> </div>
                                                <div class="mt-container bg-dark-opacity">
                                                    <div class="mt-head-title"> Marketing Campaigns </div>
                                                    <div class="mt-body-icons">
                                                        <a href="#">
                                                            <i class=" icon-bubbles"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-map"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-cup"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mt-footer-button">
                                                        <button type="button" class="btn btn-circle btn-success btn-sm">Honda</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-dark hide"></i>
                                        <span class="caption-subject bold font-dark uppercase"> Activities</span>
                                        <span class="caption-helper">default option...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn red btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-blue-hoki">
                                                    <div class="mt-head-icon">
                                                        <i class=" icon-social-twitter"></i>
                                                    </div>
                                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>
                                                    <span class="mt-head-date"> 25 Jan, 2015 </span>
                                                    <div class="mt-head-button">
                                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>
                                                    </div>
                                                </div>
                                                <div class="mt-body-actions-icons">
                                                    <div class="btn-group btn-group btn-group-justified">
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-align-justify"></i>
                                                            </span>RECORD </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-camera"></i>
                                                            </span>PHOTO </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </span>DATE </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-record"></i>
                                                            </span>RANC </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-red">
                                                    <div class="mt-head-icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>
                                                    <span class="mt-head-date"> 12 Feb, 2016 </span>
                                                    <div class="mt-head-button">
                                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>
                                                    </div>
                                                </div>
                                                <div class="mt-body-actions-icons">
                                                    <div class="btn-group btn-group btn-group-justified">
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-align-justify"></i>
                                                            </span>RECORD </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-camera"></i>
                                                            </span>PHOTO </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </span>DATE </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-record"></i>
                                                            </span>RANC </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-green">
                                                    <div class="mt-head-icon">
                                                        <i class=" icon-graduation"></i>
                                                    </div>
                                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>
                                                    <span class="mt-head-date"> 3 Mar, 2015 </span>
                                                    <div class="mt-head-button">
                                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>
                                                    </div>
                                                </div>
                                                <div class="mt-body-actions-icons">
                                                    <div class="btn-group btn-group btn-group-justified">
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-align-justify"></i>
                                                            </span>RECORD </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-camera"></i>
                                                            </span>PHOTO </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </span>DATE </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-record"></i>
                                                            </span>RANC </a>
                                                    </div>
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
                <!-- BEGIN FOOTER -->
                <p class="copyright">2015 © Metronic by keenthemes.
                    <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                </p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <div class="page-quick-sidebar">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                            <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                            <span class="badge badge-success">7</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-bell"></i> Alerts </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-info"></i> Notifications </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-speech"></i> Activities </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-settings"></i> Settings </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                            <h3 class="list-heading">Staff</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">8</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Bob Nilson</h4>
                                        <div class="media-heading-sub"> Project Manager </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nick Larson</h4>
                                        <div class="media-heading-sub"> Art Director </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">3</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Hubert</h4>
                                        <div class="media-heading-sub"> CTO </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Wong</h4>
                                        <div class="media-heading-sub"> CEO </div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="list-heading">Customers</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-warning">2</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lara Kunis</h4>
                                        <div class="media-heading-sub"> CEO, Loop Inc </div>
                                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="label label-sm label-success">new</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ernie Kyllonen</h4>
                                        <div class="media-heading-sub"> Project Manager,
                                            <br> SmartBizz PTL </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lisa Stone</h4>
                                        <div class="media-heading-sub"> CTO, Keort Inc </div>
                                        <div class="media-heading-small"> Last seen 13:10 PM </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">7</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Portalatin</h4>
                                        <div class="media-heading-sub"> CFO, H&D LTD </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Irina Savikova</h4>
                                        <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">4</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Maria Gomez</h4>
                                        <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="page-quick-sidebar-item">
                            <div class="page-quick-sidebar-chat-user">
                                <div class="page-quick-sidebar-nav">
                                    <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                        <i class="icon-arrow-left"></i>Back</a>
                                </div>
                                <div class="page-quick-sidebar-chat-user-messages">
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> When could you send me the report ? </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Its almost done. I will be sending it shortly </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Alright. Thanks! :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:16</span>
                                            <span class="body"> You are most welcome. Sorry for the delay. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> No probs. Just take your time :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Alright. I just emailed it to you. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Great! Thanks. Will check it right away. </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Please let me know if you have any comment. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-quick-sidebar-chat-user-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type a message here...">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn green">
                                                <i class="icon-paper-clip"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                        <div class="page-quick-sidebar-alerts-list">
                            <h3 class="list-heading">General</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-warning"> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="list-heading">System</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-default "> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                        <div class="page-quick-sidebar-settings-list">
                            <h3 class="list-heading">General Settings</h3>
                            <ul class="list-items borderless">
                                <li> Enable Notifications
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Allow Tracking
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Log Errors
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Auto Sumbit Issues
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Enable SMS Alerts
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            </ul>
                            <h3 class="list-heading">System Settings</h3>
                            <ul class="list-items borderless">
                                <li> Security Level
                                    <select class="form-control input-inline input-sm input-small">
                                        <option value="1">Normal</option>
                                        <option value="2" selected>Medium</option>
                                        <option value="e">High</option>
                                    </select>
                                </li>
                                <li> Failed Email Attempts
                                    <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                <li> Secondary SMTP Port
                                    <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                <li> Notify On System Error
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Notify On SMTP Error
                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                            </ul>
                            <div class="inner-content">
                                <button class="btn btn-success">
                                    <i class="icon-settings"></i> Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END QUICK SIDEBAR -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>