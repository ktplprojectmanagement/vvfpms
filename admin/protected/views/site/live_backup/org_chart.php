            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Blank Page Layout</h1>
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
                                <!-- END PAGE BASE CONTENT -->
                                <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.orgchart.css" media="all" rel="stylesheet" type="text/css" />
                                <style type="text/css">
                                    #orgChart{
                                        width: auto;
                                        height: auto;
                                    }

                                    #orgChartContainer{
                                        width: 1000px;
                                        height: 500px;
                                        overflow: auto;
                                        background: #eeeeee;
                                    }

                                </style>
                                <div id="orgChartContainer">
                                  <div id="orgChart"></div>
                                </div>
                                <div id="consoleOutput">
                                </div>
                                <div id="jd_data">
                                <?php
                                    if (isset($jd_data)) {
                                        foreach ($jd_data as $row) { 
                                          echo $row['Designation'].'-'.$row['JD_reporter'].',';
                                        }
                                    }
                                ?>
                                </div>
                            <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.orgchart.js"></script>
                                <script type="text/javascript">
                                var data = [];
                                for (var i = 0; i < 6; i++) {
                                    data[i] = {id: i, name: 'My Organization', parent: i};
                                    alert(data);
                                }
                                console.log(data);

                                var testData = [
                                    {id: 1, name: 'My Organization', parent: 0},
                                    {id: 2, name: 'CEO Office', parent: 1},
                                    {id: 3, name: 'Division 1', parent: 1},
                                    {id: 4, name: 'Division 2', parent: 1},
                                    {id: 6, name: 'Division 3', parent: 1},
                                    {id: 7, name: 'Division 4', parent: 1},
                                    {id: 8, name: 'Division 5', parent: 1},
                                    {id: 5, name: 'Sub Division', parent: 3},
                                    
                                ];
                                $(function(){
                                    var count = [];
                                    org_chart = $('#orgChart').orgChart({
                                        data: testData,
                                        showControls: true,
                                        allowEdit: true,
                                        onAddNode: function(node){ 
                                            log('Created new node on node '+node.data.id);
                                            org_chart.newNode(node.data.id); 
                                            count[node.data.id] = node.data.id;
                                        },
                                        onDeleteNode: function(node){
                                            log('Deleted node '+node.data.id);
                                            org_chart.deleteNode(node.data.id); 
                                            count[node.data.id] = parseInt(node.data.id)-parseInt(node.data.id);
                                        },
                                        onClickNode: function(node){
                                            log('Clicked node '+node.data.id);
                                            count[node.data.id] = node.data.id;
                                            alert(count[node.data.id]);
                                        }

                                    });
                                });

                                // just for example purpose
                                function log(text){
                                    $('#consoleOutput').append('<p>'+text+'</p>')
                                }
                                </script><script type="text/javascript">

                              var _gaq = _gaq || [];
                              _gaq.push(['_setAccount', 'UA-36251023-1']);
                              _gaq.push(['_setDomainName', 'jqueryscript.net']);
                              _gaq.push(['_trackPageview']);

                              (function() {
                                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                              })();

                            </script>
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>