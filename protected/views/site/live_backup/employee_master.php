           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
           <script type="text/javascript">
               // $(function(){
               //      $("#sample_1_filter").css('float','right');
               // });
           </script>
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Employee Master </h1>
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
                                                <?php  if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='3') { ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/">Set Goals</a><?php }else if(Yii::app()->user->getState("role_id")=='1'){ ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Newemployee/employee_master">Employee Master</a><?php }else{ ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/approvegoals">Approve Goals</a><?php } ?>
                                        </li>
                                        <li>
                                                <?php if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='2') { ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/">Mid Review</a><?php }else{ ?><a hre="">Elevation</a><?php } ?>
                                        </li>
                                            <?php if(Yii::app()->user->getState("role_id")=='1'){ ?>
                                            <li><a href="#">Organization Structure</a></li>
                                            <?php }?>  
                                             <?php if(Yii::app()->user->getState("role_id")=='1'){ ?>
                                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=KRA/kra_create">KRA</a></li>
                                            <?php }?>
                                    </ul>
                                    <ul class="nav navbar-nav margin-bottom-35">
                                        <li class="active">
                                            <a href="#">
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

                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">                                        
                                        <div class="app-ticket app-ticket-list">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light bordered">
                                                        <div class="portlet-title tabbable-line">
                                                            <div class="caption caption-md">
                                                                <i class="icon-globe theme-font hide"></i>
                                                                <span class="caption-subject font-blue-madison bold uppercase">Ticket List</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="table-toolbar">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="btn-group">
                                                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                                <i class="fa fa-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                        
                                                                        <div class="btn-group" style="float: right;">
                                                                       

                                                                                <div>
                                                                            
                                                                        </div>
                                                                            <hr>
                                                                           
                                                                        </div>                                                                       
                                                                           <!--  <button id="import_previous" class="btn sbold green"> Import
                                                                                <i class="fa fa-plus"></i>
                                                                            </button> -->
                                                                         
                                                                        </div>
                                                                      
                                                                    </div>
                                                                    <script type="text/javascript">
                                                                        $(function(){
                                                                            $("#sample_editable_1_new").click(function(){
                                                                                window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Newemployee';
                                                                            });
                                                                            $("#sample_1_filter").css('float','right');
                                                                        });
                                                                    </script>
                                                                    <div class="col-md-6">
                                                                        <div class="btn-group pull-right">
                                                                            <!-- <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                                                <i class="fa fa-angle-down"></i>
                                                                            </button> -->
                                                                            <!-- <ul class="dropdown-menu pull-right">
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="fa fa-print"></i> Print </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                                                </li>
                                                                            </ul> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                                                <span></span>
                                                                            </label>
                                                                        </th>
                                                                        <th> Employee ID </th>
                                                                        <th> Name </th>
                                                                        <th> Designation </th>
                                                                        <th> Department </th>
                                                                        <th> Joining Date </th>
                                                                        <th> Appraiser 1 </th>                                                                       
                                                                        <th> Status </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                    if (isset($model)) {
                                                                       foreach ($model as $row) {
                                                                ?>                                                                
                                                                    <tr class="odd gradeX">
                                                                        <td>
                                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                                <span></span>
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['Employee_id']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row['Emp_fname']." ".$row['Emp_lname']; ?>
                                                                        </td>                                                                        
                                                                        <td>
                                                                             <?php echo $row['Designation']; ?>
                                                                        </td>
                                                                        <td> <?php echo $row['Department']; ?> </td>
                                                                        <td> <?php echo $row['joining_date']; ?> </td>
                                                                        <td class="center"> <?php echo $row['Reporting_officer1_id']; ?> </td>
                                                                        <td>
                                                                            <span class="label label-sm label-warning"> New </span>
                                                                        </td>
                                                                    </tr>
                                                                  <?php
                                                                    }
                                                                    }
                                                                ?>                                                          
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
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
                <!-- BEGIN FOOTER -->
                            <!-- END PAGE SIDEBAR -->
                            </div>


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
                                
