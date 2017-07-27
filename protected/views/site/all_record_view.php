            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Blank Page</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Page Layouts</span>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Record Of <lable id="year">Current Year</lable>
                    </h3>
                    <div style="float: right;margin-top: -68px;">
                        <label class="control-label ">Select Year : </label>                                            
                        <select class="form-control get_cluster" style="width: 186px;"name="get_cluster" id="get_cluster">
                                        <option value="All">All</option>
                                        
                        </select>  
                    </div>                  
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Responsive Flip Scroll Tables </div>
                                </div>
                                <div class="portlet-body flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                            <tr>
                                                <th width="20%"> Code </th>
                                                <th> Company </th>
                                                <th class="numeric"> Price </th>
                                                <th class="numeric"> Change </th>
                                                <th class="numeric"> Change % </th>
                                                <th class="numeric"> Open </th>
                                                <th class="numeric"> High </th>
                                                <th class="numeric"> Low </th>
                                                <th class="numeric"> Volume </th>
                                            </tr>
                                        </thead>
                                        <tbody id="set_goal_data">
                                        <?php
                                            if (isset($report_data) && count($report_data)>0) {
                                                for ($i=0; $i < count($report_data); $i++) { 
                                                    ?>
                                                     <tr>
                                                        <td> AAC </td>
                                                        <td> AUSTRALIAN AGRICULTURAL COMPANY LIMITED. </td>
                                                        <td class="numeric"> &nbsp; </td>
                                                        <td class="numeric"> -0.01 </td>
                                                        <td class="numeric"> -0.36% </td>
                                                        <td class="numeric"> $1.39 </td>
                                                        <td class="numeric"> $1.39 </td>
                                                        <td class="numeric"> &nbsp; </td>
                                                        <td class="numeric"> 9,395 </td>
                                                    </tr>       
                                                    <?php
                                                }
                                            }
                                        ?>
                                                                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->
