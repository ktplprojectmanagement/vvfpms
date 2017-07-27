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
        <title>PMS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        
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
                                        <span class="badge">1</span>
                                    </button>
                                    <ul class="dropdown-menu-v2">
                                        <li class="external">
                                            <h3>
                                                <span class="bold">1 pending</span> notifications</h3>
                                            <a href="#">view all</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">
                                                <li>
                                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success md-skip">
                                                                <i class="fa fa-plus"></i>
                                                            </span> KRA Fillup. </span>
                                                        <span class="time">just now</span>
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
                                        <span>Hi, Charles</span>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/img/avatar1.jpg" alt=""> </button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> My Profile
                                                <span class="badge badge-danger">1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-calendar"></i> My Calendar </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-envelope-open"></i> My Inbox
                                                <span class="badge badge-danger"> 3 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-rocket"></i> My Tasks
                                                <span class="badge badge-success"> 7 </span>
                                            </a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-lock"></i> Lock Screen </a>
                                        </li>
                                        <li>
                                            <a href="#">
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
                                     <div class="btn-group-red btn-group">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li class="active">
                                            <a href="#">Create employee form</a>
                                        </li>                                        
                                    </ul>
                                </div>                          
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </div>
                            <!-- END TOPBAR ACTIONS -->                            
                        </div>

                        <!-- BEGIN HEADER MENU -->
                        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown dropdown-fw  ">
                                    <a href="javascript:;" class="text-uppercase">
                                        <i class="icon-home"></i> Dashboard </a>
                                    <ul class="dropdown-menu dropdown-menu-fw">
                                        <li>
                                            <a href="#">
                                                 Home </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-fw  active open selected">
                                    <a href="javascript:;" class="text-uppercase">
                                        <i class="fa fa-database" aria-hidden="true"></i> Master </a>
                                    <ul class="dropdown-menu dropdown-menu-fw">
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="javascript:;">
                                                 Employee Master </a>                                            
                                        </li>
                                        <li class="dropdown more-dropdown-sub">
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Newemployee/org_chart">
                                                 Organization Structure </a>                                            
                                        </li>
                                        <li class="dropdown more-dropdown-sub active">
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=KRA/kra_create">
                                                 KRA </a>                                            
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
                        <h1>Create KRA</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Tables</a>
                            </li>
                            <li class="active">Datatables</li>
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
                            <style type="text/css">
                                .dataTables_wrapper {
                                    padding-top: 23px;
                                }
                            </style>
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light portlet-fit bordered">                                            
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">   
                                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                                           'id'=>'user-form',                                                            
                                                            // 'action' => $this->createUrl('KRA/save_kra'),
                                                            'enableAjaxValidation' => false,
                                                            'enableClientValidation' => true,
                                                            'clientOptions' => array(
                                                                    'validateOnSubmit' => true,
                                                                    'afterValidate' => 'js:chk_kradata'

                                                            ),
                                                            'htmlOptions'=>array(
                                                                'class'=>'form-horizontal',
                                                                'enctype' => 'multipart/form-data'
                                                            ),
                                                        ));?>  
                                                        <label class="control-label" id="error_print"></label>                                                   
                                                        <div class="col-md-5">
                                                            <label class="control-label">Number Of KRA &nbsp;</label>
                                                            <div class="btn-group">
                                                            <?php echo $form->textField($model,'No_of_KPI',array('class'=>'form-control','id'=>'kra_num')); ?>
                                                        </div>
                                                       <?php echo CHtml::ajaxSubmitButton('Create',CHtml::normalizeUrl(array('KRA/get_kra_list','render'=>true)),
                                                                         array(
                                                                             'dataType'=>'html',
                                                                             'type'=>'post',
                                                                             'success'=>'function(data) {
                                                                                 $("#kra_row").html(data);
                                                                            }',                    
                                                                             
                                                                             ),array('id'=>'mybtn','class'=>'btn green')); ?>
                                                        
                                                    </div> 
                                                    <div class="col-md-7">
                                                        <div class="form-group" style="float: right;">
                                                            <label class="control-label">Whether applicable to all</label>
                                                            <div class="radio-list" style="margin-left: 18px;">
                                                                <!-- <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Yes" checked> Yes </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="No"> No </label> -->
                                                                    <?php
                                                                        echo CHtml::radioButton('send_to', '', array(
                                                                            'value'=>'Yes', 'uncheckValue'=>null
                                                                        )).' Male '; echo CHtml::radioButton('send_to', '', array(
                                                                            'value'=>'Female', 'uncheckValue'=>null
                                                                        )).' No ';
                                                                    ?>
                                                            </div>
                                                        </div>
                                                    </div>                                                       
                                                </div>
                                            </div>
                                                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
                                                <script src="https://code.jquery.com/jquery-1.12.3.js" type="text/javascript"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
                                                <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js" type="text/javascript"></script>
                                                <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js" type="text/javascript"></script>
                                                <script type="text/javascript">
                                                    $(function(){
                                                        $("#sample_1").DataTable();
                                                    });
                                                </script>
                                                
                                                <table class="table table-striped table-hover table-bordered" id="ditable_1">
                                                    <thead>
                                                        <tr>
                                                            <th> Category Name </th>
                                                            <!-- <th> Weightage Format </th>
                                                            <th> Weightage </th> -->
                                                            <th> Number Of KPI </th>
                                                            <th> Applicability </th>
                                                            <!-- <th> Action </th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="kra_row">
                                                            <tr>
                                                                <td colspan="3">No Record Found</td>
                                                            </tr>
                                                             <tr id="edit_data" <?php if(!isset($kra_edit_result)) { ?>style="display: none"<?php }?>>                                                             
                                                                 <td>
                                                                     <?php 
                                                                     $kra_category_edit = '';$kpi_edit = '';$KRA_id = '';
                                                                     if (isset($kra_edit_result)) {
                                                                        $kra_category_edit = $kra_edit_result['0']['KRA_category'];
                                                                     }
                                                                     echo CHtml::textField('KRA_category_edit',$kra_category_edit,array('class'=>'form-control','id'=>'KRA_category_edit')); ?>
                                                                 </td>
                                                                 <td>
                                                                     <?php
                                                                     if (isset($kra_edit_result)) {
                                                                        $kpi_edit = $kra_edit_result['0']['No_of_KPI'];
                                                                     }
                                                                    if (isset($kra_edit_result)) {
                                                                        $KRA_id = $kra_edit_result['0']['KRA_id'];
                                                                     }
                                                                     echo CHtml::textField("KRA_id",$KRA_id,$htmlOptions=array('class'=>"form-control",'id'=>'KRA_id','style'=>"display:none"));
                                                                     echo CHtml::textField("No_of_KPI_edit",$kpi_edit,$htmlOptions=array('class'=>"form-control",'id'=>'No_of_KPI_edit')); ?>
                                                                 </td>
                                                                 <td>
                                                                    <?php 
                                                                        $applicable_to = array('Organization Chart'=>'Organization Chart', 'Custom'=>'Custom', 'All'=>'All');
                                                                        echo CHtml::dropDownList("applicable_to_edit",'',$applicable_to,$htmlOptions=array('class'=>"form-control applicable_to",'onchange'=>'js:getemplist();'))?> 
                                                                 </td>
                                                             </tr>                                           
                                                    </tbody> 
                                                </table>
                                            </div>
                                             <?php
                                        // $options = array(
                                        //     'type'=>'POST', 
                                        //     'url'=>CController::createUrl('playTest/udpateTxt'),
                                        //      'data'=>array('order_id'=>'js:this.value'),
                                        //     'success': 'function(data){
                                        //     alert(data);
                                        //     }'
                                        // );
                                        echo CHtml::button('Submit',array('class'=>'btn green','style'=>'float:right','onclick'=>'js:chk_kradata();')); ?>
                                        <?php $this->endWidget();?>
                                        <!-- <a class="btn purple btn-outline sbold" data-toggle="modal" href="#large"> View Demo </a> -->
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                        </div> 
                                        <div>
                                         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                                <thead>
                                                                    <tr>                                                                        
                                                                        <th>Category Name</th>
                                                                        <th>Number Of KPI</th>
                                                                        <th>KRA Creation Date</th>
                                                                        <th> Action </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (isset($kra_result)) {
                                                                           foreach ($kra_result as $row) {
                                                                    ?>                                                                
                                                                    <tr class="odd gradeX">                                                                       
                                                                        <td> <?php echo $row['KRA_category']; ?> </td>
                                                                        <td> <?php echo $row['No_of_KPI']; ?> </td>   
                                                                        <td> <?php echo $row['KRA_creation_date']; ?> </td>                      
                                                                        <td>
                                                                             <a href="<?php echo $this->createUrl('KRA/kra_edit', array('KRA_id' => $row['KRA_id']));
     ?>"><i class="fa fa-pencil fa-fw" title="Delete" aria-hidden="true"></i></a><i class="fa fa-trash-o del_kra" style="cursor: pointer;" id="kra_id-<?php echo $row['KRA_id']; ?>" title="Delete" aria-hidden="true"></i>
                                                                        </td>
                                                                    </tr>
                                                                  <?php
                                                                    }
                                                                    }
                                                                ?>                                                             
                                                                </tbody>
                                                            </table>
                                                            </div>
                                        <script type="text/javascript"> 
                                            $(function(){
                                                $(".del_kra").click(function(){                                                   
                                                    var id = $(this).attr('id');
                                                    var id_code = id.split('-');
                                                     //alert(id_code);
                                                    var data = {
                                                        'KRA_id' : id_code[1],
                                                    };
                                                    var base_url = window.location.origin;
                                                    $.ajax({
                                                        type : 'post',
                                                        data : data,
                                                        url : base_url+'/pmsuser/index.php?r=KRA/kra_del',
                                                        success : function(data)
                                                        {
                                                            if(data == 1)
                                                            {
                                                                $("#sample_1").load(location.href + " #sample_1");
                                                            }
                                                        }
                                                    });
                                                });
                                            });                                         
                                            function chk_kradata()
                                            {
                                                //alert("kjljlk");
                                                // if ($("#KRA_category_edit").val()!='')
                                                // {
                                                //     alert($("#KRA_category_edit").val());
                                                // }
                                                var data = $("#kra_num").val();var details = '';
                                                var str = new RegExp("^([a-zA-Z]{1,25})$");
                                                var str1 = new RegExp("^([0-9]{1,10})$");
                                                //var str = /^[a-zA-Z]$/;
                                                var error = '';
                                               
                                                if (data>0)
                                                {
                                                    for (var i = 0; i < data; i++) {
                                                        if(!str.test($("#KRA_category_"+i).val()))
                                                        {
                                                            error = "Please correct "+i+" KRA category";
                                                        }
                                                        else if(!str1.test($("#No_of_KPI"+i).val()))
                                                        {
                                                            error = "Please correct number of KPI field for "+i+"";
                                                        }
                                                        else
                                                        {
                                                            error = "";
                                                        }
                                                        
                                                    }
                                                }
                                                else if($("#KRA_category_edit").val()!='')
                                                {
                                                    if(!str.test($("#KRA_category_edit").val()))
                                                        {
                                                            error = "Please correct KRA category";
                                                        }
                                                        else if(!str1.test($("#No_of_KPI_edit").val()))
                                                        {
                                                            error = "Please correct number of KPI field";
                                                        }
                                                        else
                                                        {
                                                            error = "";
                                                        }
                                                }

                                                if(error != '')
                                                {
                                                    alert(error);
                                                }
                                                else
                                                {
                                                    if (data>0)
                                                    {
                                                        for (var i = 0; i < data; i++) {
                                                            if (details == '') 
                                                            {
                                                                details = $("#KRA_category_"+i).val()+','+$("#No_of_KPI"+i).val();
                                                            }
                                                            else
                                                            {
                                                                details = details+','+$("#KRA_category_"+i).val()+','+$("#No_of_KPI"+i).val();
                                                            }
                                                            
                                                        }
                                                        //data = $("#KRA_category_0").val();
                                                        data = {
                                                        details,
                                                            'kra_number' : $("#kra_num").val(),
                                                        };
                                                        console.log(data);
                                                        var base_url = window.location.origin;
                                                        $.ajax({
                                                            type : 'post',
                                                            data : data,
                                                            url : base_url+'/pmsuser/index.php?r=KRA/save_kra',
                                                            success : function(data)
                                                            {
                                                               if(data == 1)
                                                                {
                                                                    $("#sample_1").load(location.href + " #sample_1");
                                                                }
                                                            }
                                                        });
                                                    }
                                                    else if($("#KRA_category_edit").val()!='')
                                                    {
                                                        alert($("#KRA_category_edit").val());
                                                        details = $("#KRA_category_edit").val()+','+$("#No_of_KPI_edit").val();
                                                        data = {
                                                            'catergory' : $("#KRA_category_edit").val(),
                                                            'kpi_number' : $("#No_of_KPI_edit").val(),
                                                            'KRA_id' : $("#KRA_id").val(),
                                                        };
                                                        console.log(data);
                                                        var base_url = window.location.origin;
                                                        $.ajax({
                                                            type : 'post',
                                                            data : data,
                                                            url : base_url+'/pmsuser/index.php?r=KRA/kra_update',
                                                            success : function(data)
                                                            {
                                                                if(data == 1)
                                                                {
                                                                    $("#sample_1").load(location.href + " #sample_1");
                                                                }
                                                            }
                                                        });
                                                    }

                                                    
                                                }
                                                //console.log($("#KRA_category_0").val());

                                                
                                            }

                                            function getemplist()
                                            {
                                                
                                                if($('.applicable_to').find(":selected").val() == 'Custom')
                                                {
                                                    alert($('.applicable_to').find(":selected").val());
                                                    $("#large").modal();
                                                }
                                            }
                                        </script>                                      
                                       
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                <!-- BEGIN FOOTER -->
                <p class="copyright">2016 © Kritva Technology Private Limited.
                </p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
         <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Employee List</h4>
                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                        <div class="col-md-12">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet light bordered">
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#employee_table').DataTable();
                                                });
                                            </script>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover order-column" id="employee_table">
                                                    <thead>
                                                        <tr>  
                                                            <th>No</th>                                                          
                                                            <th>Employee ID</th>
                                                            <th>First&nbsp;name</th>
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Joining Date</th>
                                                            <th>E-mail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        if (isset($employee_list)) {
                                                           foreach ($employee_list as $row) { ?>
                                                            <tr>
                                                                <td><input id="checkbox1" class="md-check" type="checkbox"></td>
                                                                <td><?php echo $row['Employee_id']; ?></td>
                                                                <td><?php echo $row['Emp_fname']; ?></td>
                                                                <td><?php echo $row['Designation']; ?></td>
                                                                <td><?php echo $row['Department']; ?></td>
                                                                <td><?php echo $row['joining_date']; ?></td>  
                                                                <td><?php echo $row['Email_id']; ?></td>             
                                                            </tr>
                                                       
                                                        <?php    }
                                                        }
                                                    ?>                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- END CONTAINER -->
        
        <!-- END QUICK SIDEBAR -->
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
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
