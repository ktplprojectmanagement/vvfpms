 <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Employee Form Template</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                            </li>
                            <li class="active">System</li>
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
                                <div class="note note-info">
                                    <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN VALIDATION STATES-->
                                        <div class="portlet light portlet-fit portlet-form bordered">
                                            <!-- <div class="portlet-title">
                                                <div class="caption">
                                                    <i class=" icon-layers font-red"></i>
                                                    <span class="caption-subject font-red sbold uppercase">Floating Label Validation States</span>
                                                </div>
                                                <div class="actions">
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-cloud-upload"></i>
                                                    </a>
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-wrench"></i>
                                                    </a>
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                </div>
                                            </div> -->
                                            <div class="portlet-body">
                                                <!-- BEGIN FORM-->
                                                <form action="#">  
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group form-md-radios">
                                                                <label class="col-md-4 control-label" for="form_control_1">Employee ID</label>
                                                                <div class="col-md-8">
                                                                    <div class="md-radio-inline">
                                                                        <div class="md-radio">
                                                                            <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                            <label for="checkbox1_8">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Automated </label>
                                                                        </div>
                                                                        <div class="md-radio">
                                                                            <input id="checkbox1_8" name="radio2" value="manual" class="md-radiobtn" type="radio">
                                                                            <label for="checkbox1_9">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Manual </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script type="text/javascript">
                                                                $(function(){
                                                                    $('input[name="radio2"]').click(function(){
                                                                        if ($(this).val() == 'manual') 
                                                                        {
                                                                            alert('ghgjh');
                                                                        }
                                                                        $("#emp_id_structure").css('display','block');
                                                                    });
                                                                });
                                                            </script>
                                                            <div class="form-group form-md-radios" style="display: none" id="emp_id_structure">
                                                                <label class="col-md-4 control-label" for="form_control_1">ID Structure</label>
                                                                <div class="col-md-8">
                                                                    <div class="md-radio-inline">
                                                                        <div class="md-radio">
                                                                            <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                            <label for="checkbox1_8">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Prefix </label>
                                                                        </div>
                                                                        <div class="md-radio">
                                                                            <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                            <label for="checkbox1_9">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Postfix </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">Employee Attendance Code</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Yes </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">Default Nationality</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Indian </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Other </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">Personal email ID Notification</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Allow </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Do Not Allow </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>               
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">Mobile Number</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Yes </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">SMS Facility</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Yes </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">Reporting Level</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Indian </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> More than 2 </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">Reporting Structure For PMS</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> As Per Organization Chart </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Manual </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-radios">
                                                            <label class="col-md-4 control-label" for="form_control_1">Blood Group</label>
                                                            <div class="col-md-8">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_8" name="radio2" value="1" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_8">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Allow </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input id="checkbox1_9" name="radio2" value="2" class="md-radiobtn" type="radio">
                                                                        <label for="checkbox1_9">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Do Not Allow </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a href="javascript:;" class="btn dark">Submit</a>
                                                                <a href="javascript:;" class="btn default">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                                        <!-- END VALIDATION STATES-->
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                <!-- BEGIN FOOTER -->
                </div>
                </div>
                </div>