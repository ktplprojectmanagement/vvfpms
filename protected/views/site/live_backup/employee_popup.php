            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Modals</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Features</a>
                            </li>
                            <li class="active">UI Features</li>
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
                                            <a href="index.html">
                                                <i class="icon-home"></i> Home </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-note "></i> Reports </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> User Activity </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-basket "></i> Marketplace </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-bell"></i> Templates </a>
                                        </li>
                                    </ul>
                                    <h3>Quick Actions</h3>
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="#">
                                                <i class="icon-envelope "></i> Inbox
                                                <label class="label label-danger">New</label>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-paper-clip "></i> Task </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-star"></i> Projects </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-pin"></i> Events
                                                <span class="badge badge-success">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="note note-success">
                                            <h4 class="block">Bootstrap Native Modals</h4>
                                            <p> Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults. If you need more control over the Bootstrap Modals please check out
                                                <a class="btn btn-outline red"
                                                    href="ui_extended_modals.html"> extended modals plugin</a>
                                            </p>
                                        </div>
                                        <!-- BEGIN PORTLET-->
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-bubble font-green-sharp"></i>
                                                    <span class="caption-subject font-green-sharp sbold">Bootstrap Modal Demos</span>
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
                                                <table class="table table-hover table-striped table-bordered">
                                                    <tr>
                                                        <td> Basic Example </td>
                                                        <td>
                                                            <a class="btn red btn-outline sbold" data-toggle="modal" href="#basic"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Draggable Modal Example </td>
                                                        <td>
                                                            <a class="btn green btn-outline sbold" data-toggle="modal" href="#draggable"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Large Width Example </td>
                                                        <td>
                                                            <a class="btn purple btn-outline sbold" data-toggle="modal" href="#large"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Small Width Example </td>
                                                        <td>
                                                            <a class="btn blue btn-outline sbold" data-toggle="modal" href="#small"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Full Width Example </td>
                                                        <td>
                                                            <a class="btn dark btn-outline sbold" data-toggle="modal" href="#full"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Responsive </td>
                                                        <td>
                                                            <a class="btn red btn-outline sbold" data-toggle="modal" href="#responsive"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> AJAX content loading </td>
                                                        <td>
                                                            <a class=" btn yellow btn-outline sbold" href="ui_modals_ajax_sample.html" data-target="#ajax" data-toggle="modal"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Stackable </td>
                                                        <td>
                                                            <a class=" btn green btn-outline sbold" data-target="#stack1" data-toggle="modal"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Static Background </td>
                                                        <td>
                                                            <a class=" btn purple btn-outline sbold" data-toggle="modal" href="#static"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Long Modals </td>
                                                        <td>
                                                            <a class=" btn dark btn-outline sbold" data-toggle="modal" href="#long"> View Demo </a>
                                                        </td>
                                                    </tr>
                                                </table>                                               
                                                <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-full">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h4 class="modal-title">Modal Title</h4>
                                                            </div>
                                                            <div class="modal-body"> Modal body goes here </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn green">Save changes</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                                <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h4 class="modal-title">Modal Title</h4>
                                                            </div>
                                                            <div class="modal-body"> Modal body goes here </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn green">Save changes</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- END PORTLET-->
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
               
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>