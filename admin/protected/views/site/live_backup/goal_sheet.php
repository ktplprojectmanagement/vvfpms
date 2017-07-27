            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-notific8.min.js" type="text/javascript"></script>
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript">
                var j = jQuery.noConflict();
                function get_notify(e)
                {                    
                    var settings = {
                            theme: 'teal',
                            horizontalEdge: 'top',
                            verticalEdge: 'right'
                        },
                        $button = $(this);
                    
                    if ($.trim($('#notific8_heading').val()) != '') {
                        settings.heading = $.trim($('#notific8_heading').val());
                    }
                    
                    if (!settings.sticky) {
                        settings.life = '10000';
                    }

                    j.notific8('zindex', 11500);
                    j.notific8($.trim(e), settings);
                    
                    $button.attr('disabled', 'disabled');
                    
                    setTimeout(function() {
                        $button.removeAttr('disabled');
                    }, 1000);
                }        
            </script>
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Goal Sheet</h1>
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
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                        <?php
                                            if (!isset($approved_list)) { ?>
                                            <div class="note note-info">
                                                    <p>List Of Pending Approvals</p>
                                            </div>
                                        <?php    if (isset($kpi_data) && count($kpi_data)>0) { 
                                               foreach ($kpi_data as $row) { $cnt = 0; ?>                                               
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i><?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Emp_fname']; }?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status : ".$row['KRA_status']; ?>
                                                    <a href="javascript:;" class="collapse"> </a>                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                              <div class="col-xs-4">                                                    
                                                    <ul class="list-unstyled">
                                                    <li>Employee Name :  <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Emp_fname']; }?></li>
                                                        <li>Job Role :  <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Designation']; }?></li>
                                                        <li>KRA Weigth :  <?php echo $row['target']; ?></li>
                                                    </ul>
                                                </div>
                                                <div class="col-xs-4">                                                   
                                                    <ul class="list-unstyled">
                                                        <li>Department :  <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Department']; }?></li> 
                                                        <li>KRA Filled Date :  <?php echo $row['KRA_date']; ?></li>                                                        
                                                    </ul>
                                                </div>
                                                <table class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content">
                                                        <tr>
                                                            <th width="20%"> KRA Category </th>
                                                            <th> KPI List </th>
                                                            <th class="numeric"> KPI Unit Format </th>
                                                            <th class="numeric"> KPI Unit </th>                                                            
                                                            <?php if(isset($mid_review) && $mid_review == 1) { ?><th class="numeric"> Employee Comment </th><?php } ?>                                                            
                                                            <th class="numeric"> Appraiser Comment </th>
                                                            <?php if(isset($mid_review) && $mid_review == 1) { ?><th class="numeric"> Mid KPI Status </th><?php }else{?><th class="numeric"> KPI Status </th><?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']);
                                                                $employee_comment = explode(';',$row['employee_comment']);
                                                                $appr_comment = explode(';',$row['review_comments']);
                                                                $appr_status = explode(';',$row['review_status']);
                                                                $kpi_data_data = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if ($kpi_list_data[$i] != '') {
                                                                        if($kpi_data_data == '')
                                                                        {
                                                                            $kpi_data_data = 1;
                                                                        }
                                                                        else
                                                                        {
                                                                            $kpi_data_data = $kpi_data_data+1;
                                                                        }                                                                        
                                                                    }
                                                                }
                                                                //print_r($kpi_data_data);die();
                                                            ?>
                                                            <label id="get_kpi_count" style="display: none"><?php echo $kpi_data_data; ?></label>
                                                            <td rowspan="<?php echo count($kpi_list_data); ?>"><?php echo $row['KRA_description']; ?></td>
                                                            <td>
                                                            <table class="table">
                                                                <?php
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                            ?>
                                                            <tr><td><?php echo $kpi_list_data[$i];echo""; ?></td></tr>
                                                            <?php
                                                                }
                                                            ?>   
                                                            </table>                                                         
                                                            </td>                                                            
                                                            <td class="numeric">
                                                                <table class="table">
                                                                <?php
                                                                for ($i=0; $i < count($kpi_list_unit); $i++) { 
                                                                    if ($kpi_list_unit[$i] != 'Select') { ?>
                                                                <tr><td><?php echo $kpi_list_unit[$i];echo""; ?></td></tr>
                                                                <?php
                                                                  }  }
                                                            ?>  
                                                            </table>  
                                                            </td>
                                                            <td>
                                                                <table class="table">
                                                                <?php
                                                                for ($i=0; $i < count($kpi_list_unit); $i++) { 
                                                                    if ($kpi_list_unit[$i] != 'Select') { ?>
                                                                     <tr><td><?php echo $kpi_list_unit[$i];echo""; ?></td></tr>
                                                                <?php
                                                                } }
                                                            ?>  
                                                            </table>  
                                                            </td>                                                            
                                                            <?php if(isset($mid_review) && $mid_review == 1) { ?>
                                                            <td class="numeric">
                                                                 <table class="table">
                                                                <?php
                                                                for ($i=0; $i < count($employee_comment); $i++) {                                                                     
                                                                    $emp_comment = '';
                                                                    if ($employee_comment[$i] != '') {
                                                                        $emp_comment = $employee_comment[$i];
                                                                    }
                                                                    else
                                                                    {
                                                                        $emp_comment = '';
                                                                    }
                                                                ?>
                                                                <tr><td><?php
                                                                    echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment",'rows'=>2,'maxlength' => 100,'max','disabled'=> "true"));
                                                                 ?></td></tr>
                                                                <?php
                                                                   }
                                                            ?>  
                                                            </table>  
                                                            </td>
                                                            <?php } ?>
                                                            <td class="numeric">
                                                                 <table class="table">
                                                                <?php                                                                
                                                                for ($i=0; $i < count($appr_comment); $i++) { 
                                                                    if ($kpi_list_unit[$i] != '') {
                                                                    $apr_comment = '';
                                                                    if ($appr_comment[$i] != '') {
                                                                        $apr_comment = $appr_comment[$i];
                                                                    }
                                                                    else
                                                                    {
                                                                        $apr_comment = '';
                                                                    }
                                                                ?>
                                                                <tr><td><?php
                                                                    echo CHtml::textArea("review_comment",$apr_comment,$htmlOptions=array('class'=>"form-control review_comment".$i."",'style'=>"width: 186px;max-width: 186px;max-height: 58px;min-width: 186px;min-height: 58px;",'rows'=>2,'maxlength' => 100,'max'));
                                                                 ?></td></tr>
                                                                <?php
                                                                   } }
                                                            ?>  
                                                            </table>  
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                for ($j=0; $j < count($appr_status); $j++) { 
                                                                    if ($kpi_list_unit[$j] != '') {
                                                                ?>
                                                                <table class="table">
                                                                <tr><td><?php   
                                                                $select = '';$status = '';
                                                                    if ($appr_status[$j] != '' && $appr_status[$j] == 'Approved') {
                                                                        $select = 0;
                                                                        //$status[$appr_status[$j]] = array('selected' => true); 
                                                                    } 
                                                                    else{
                                                                        $select = 1;
                                                                        //$status['Pending'] = array('selected' => true);
                                                                    } 
                                                                    if ($select == 1) {
                                                                        $status['Pending'] = array('selected' => true);
                                                                    }
                                                                    else
                                                                    {
                                                                        $status['Approved'] = array('selected' => true);       
                                                                    }
                                                                    
                                                                    $review_type = array('Pending'=>'Pending','Approved'=>'Approved');

                                                                    echo CHtml::dropDownList("kpi_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control kpi_status_type".$j."",'style'=>"width: 186px;",'options' => $status));
                                                                 ?></td></tr>
                                                                <?php
                                                                 }  }
                                                            ?> 
                                                            </table>   
                                                            </td>                                                                                                                  
                                                        </tr>                                                       
                                                    </tbody>    
                                                    <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;display: none"></i>
                                                    <?php if(isset($mid_review) && $mid_review == 1) { ?>
                                                    <div class="col-md-6">
                                                         <?php echo CHtml::button('Submit IDP',array('class'=>'btn green idp_update','style'=>'margin-left: 230px;','id'=>"KPI_id-".$row['KPI_id'])); ?>  
                                                         <?php echo CHtml::button('Edit IDP',array('class'=>'btn green edit_IDP','style'=>'margin-left: 150px;','id'=>"value-".$row['KPI_id'])); ?>
                                                         <?php echo CHtml::button('Approve',array('class'=>'btn green mid_review_update','style'=>'float:right','id'=>"KPI_id-".$row['KPI_id'])); ?>
                                                    </div>
                                                    
                                                    <?php }else{ ?>
                                                            <?php echo CHtml::button('Approve',array('class'=>'btn green update_status','style'=>'float:right','id'=>"KPI_id-".$row['KPI_id'])); ?>
                                                    <?php } ?> 
                                                </table>
                                                                                      
                                            </div>
                                        </div>
                                         <?php 
                                           $cnt++; } } }
                                        ?>
                                        <?php if (isset($approved_list)) { ?>
                                       <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-globe"></i>Approved Goal List </div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                        <tr>
                                                            <th> Employee ID </th>
                                                            <th> Employee Name </th>
                                                            <th> Department </th>
                                                            <th> KRA Category </th>
                                                            <th> View </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php
                                                            if (isset($kpi_data) && count($kpi_data)>0) { 
                                                            foreach ($kpi_data as $row) { $cnt = 0; ?>
                                                            <tr>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Employee_id']; }?> </td>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Emp_fname']; }?> </td>
                                                                <td> <?php if(isset($employee_data) && count($employee_data)>0) { echo $employee_data['0'][$cnt]['Department']; }?> </td>
                                                                <td> 
                                                                    <?php
                                                                        $kpi_list_data = '';
                                                                        $kpi_list_data = explode(';',$row['kpi_list']);
                                                                    ?>                                                               
                                                                    <table class="table">
                                                                    <?php
                                                                    for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    ?>
                                                                    <tr><td><?php echo $kpi_list_data[$i];echo""; ?></td></tr>
                                                                    <?php
                                                                        }
                                                                    ?>   
                                                                    </table> 
                                                                </td>
                                                                <td></td>                                                               
                                                            </tr>
                                                        <?php 
                                                           $cnt++; } }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                        <!-- END SAMPLE TABLE PORTLET--> 
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                 <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">IDP Mid - Year Review</h4>
                            </div>
                            <div class="modal-body" style="height: 184px;">
                                <div class="col-md-12">
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">IDP Review</label>
                                </div><br>
                                <div class="col-md-6">
                                 <?php 
                                    $review_type = array('Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track');
                                    echo CHtml::dropDownList("review_type",'',$review_type,$htmlOptions=array('class'=>"form-control idp_review_status",'style'=>"width: 186px;"));
                                 ?>   
                                </div>    
                                <div class="col-md-6" style="padding-top: 15px;">
                                <label for="exampleInputEmail1">IDP Comments</label>
                                </div>
                                <div class="col-md-6" style="padding-top: 15px;">
                                 <?php
                                    echo CHtml::textArea("idp_comment",'',$htmlOptions=array('class'=>"form-control idp_comment",'rows'=>2,'maxlength' => 100,'max'));
                                 ?>   
                                </div> 
                                </div>               
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>                                
                                <?php echo CHtml::button('Save',array('class'=>'btn green update_idp','data-dismiss'=>'modal','style'=>'float:right')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                 <div id="view_idp" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">IDP Mid - Year Review</h4>
                            </div>
                            <div class="modal-body" style="height: 184px;">
                                <div class="col-md-12">
                                <div class="col-md-6">
                                <label id="idp_id_update"></label>
                                <label for="exampleInputEmail1">IDP Review</label>
                                </div><br>
                                <div class="col-md-6">
                                 <?php 
                                    $review_type = array('Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track');
                                    echo CHtml::dropDownList("review_type",'',$review_type,$htmlOptions=array('class'=>"form-control idp_review_status_update",'style'=>"width: 186px;"));
                                 ?>   
                                </div>    
                                <div class="col-md-6" style="padding-top: 15px;">
                                <label for="exampleInputEmail1">IDP Comments</label>
                                </div>
                                <div class="col-md-6" style="padding-top: 15px;">
                                 <?php
                                    echo CHtml::textArea("idp_comment",'',$htmlOptions=array('class'=>"form-control idp_comment_update",'rows'=>2,'maxlength' => 100,'max'));
                                 ?>   
                                </div> 
                                </div>               
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>                                
                                <?php echo CHtml::button('Update',array('class'=>'btn green update_idp_data','style'=>'float:right')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                  $(function(){
                      $(".update_status").click(function(){
                         $("#updation_spinner").show();
                          var id_value = $(this).attr('id');
                          var id = id_value.split('-');var mid_review = ''; var review_comments = '';
                          for (var i = 0; i < $("#get_kpi_count").text(); i++) {
                              if (mid_review == '') 
                              {
                                  mid_review = $(".kpi_status_type"+i).find(':selected').val();
                              }
                              else
                              {
                                  mid_review = mid_review +';'+$(".kpi_status_type"+i).find(':selected').val();
                              }
                              var comment_data = $(".review_comment"+i).val();
                              //alert(comment_data);
                              if (comment_data.length>100) 
                              {
                                  error = "Maximum 100 charaters are allowed to write comment for review.";                                  
                              }
                              else
                              {
                                  if (review_comments == '') 
                                  {
                                      review_comments = $(".review_comment"+i).val();
                                  }
                                  else
                                  {
                                      review_comments = review_comments +';'+$(".review_comment"+i).val();
                                  }
                              }
                          }
                          var data = {
                            'KPI_id' : id[1],
                            'review_status' : mid_review,
                            'review_comments' : review_comments,
                          };
                          console.log(data);
                          var base_url = window.location.origin;
                          $.ajax({
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/pmsuser/index.php?r=Setgoals/updategoal',
                            success : function(data)
                            {   
                                 //alert(data);
                               $("#updation_spinner").hide();
                                if(data == "Notification Send")
                                {
                                    get_notify("Notification send to appraiser.");
                                }                         
                            }                    
                          });
                      });
                      $(".idp_update").click(function(){                         
                        $("#static").modal('show');
                        var id_value = $(this).attr('id');
                        $(".update_idp").click(function(){                            
                            var id = id_value.split('-');
                            var data = {
                                'KPI_id' : id[1],
                                'IDP_status' : $(".idp_review_status").find(':selected').val(),
                                'IDP_comment' : $('.idp_comment').val(),
                            };
                            var base_url = window.location.origin;
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/pmsuser/index.php?r=Midreview/submitidp',
                                success : function(data)
                                {
                                   get_notify("IDP Submitted Successfully");
                                    $(".edit_IDP").css('display','block');         
                                }
                            });
                      });
                      });
                      $(".update_idp_data").click(function(){
                        var id_value = $("#idp_id_update").text();
                            var data = {
                                'KPI_id' : id_value,
                                'IDP_status' : $(".idp_review_status_update").find(':selected').val(),
                                'IDP_comment' : $('.idp_comment_update').val(),
                            };
                            console.log(data);
                            var base_url = window.location.origin;
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/pmsuser/index.php?r=Midreview/updateidp',
                                success : function(data)
                                {
                                    if(data == 1)
                                    {
                                        get_notify("IDP updated Successfully");
                                        $("#view_idp").modal('hide');
                                    }                                          
                                }
                            });
                      });
                      $(".edit_IDP").click(function(){
                        var id_value = $(this).attr('id');
                        var id = id_value.split('-');
                        var data = {
                                'KPI_id' : id[1],
                        };
                        var base_url = window.location.origin;
                            $.ajax({
                                type : 'post',
                                datatype : 'json',
                                data : data,
                                url : base_url+'/pmsuser/index.php?r=Midreview/get_idp',
                                success : function(data)
                                {
                                    var obj = $.parseJSON(data);var index = 0;
                                    $(".idp_comment_update").text(obj[0].IDP_comment);
                                    if(obj[0].IDP_status == 'Needs Attention')
                                    {
                                        index = 0;
                                    }
                                    else if(obj[0].IDP_status == 'Nearing Completion')
                                    {
                                        index = 1;
                                    }
                                    else if(obj[0].IDP_status == 'On Track')
                                    {
                                        index = 2;
                                    }
                                    $("#view_idp").modal('show');
                                    $('.idp_review_status_update').prop('selectedIndex',index);
                                    $("#idp_id_update").text(obj[0].KPI_id);
                                    console.log(obj[0].IDP_comment);    
                                }
                            });
                      });                      
                       $(".mid_review_update").click(function(){
                          var id_value = $(this).attr('id');
                          var id = id_value.split('-');
                          var mid_review_status = '';
                          var comment_data = '';
                          var review_comments = '';
                          var error = '';
                          for (var i = 0; i < $("#get_kpi_count").text(); i++) {
                            if (mid_review_status == '') 
                              {
                                  mid_review_status = $(".kpi_status_type"+i).find(':selected').val();
                              }
                              else
                              {
                                  mid_review_status = mid_review_status +';'+$(".kpi_status_type"+i).find(':selected').val();
                              }
                              // if (mid_review == '') 
                              // {
                              //     mid_review = $(".review_type"+i).find(':selected').val();
                              // }
                              // else
                              // {
                              //     mid_review = mid_review +';'+$(".review_type"+i).find(':selected').val();
                              // }
                              var comment_data = $(".review_comment"+i).val();
                              if (comment_data.length>100) 
                              {
                                  error = "Maximum 100 charaters are allowed to write comment for review.";                                  
                              }
                              else
                              {
                                  if (review_comments == '') 
                                  {
                                      review_comments = $(".review_comment"+i).val();
                                  }
                                  else
                                  {
                                      review_comments = review_comments +';'+$(".review_comment"+i).val();
                                  }
                              }
                          }
                          if(error !='')
                          {
                            get_notify(error);
                            //alert(error);
                          }
                          else
                          {
                              var data = {
                                'KPI_id' : id[1],
                                'mid_KRA_status' : mid_review_status,
                                'appraiser_comment' : review_comments,
                              };
                              $("#updation_spinner").show();
                              console.log(data);
                              var base_url = window.location.origin;
                              $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/pmsuser/index.php?r=Midreview/midupdategoal',
                                success : function(data)
                                { 
                                    //alert(data);
                                    if(data == 'Mid Year Review Updation Done')
                                    {
                                      $("#updation_spinner").hide();
                                      get_notify(data);
                                    }             
                                }                    
                              });
                          }                          
                      });
                  });
                </script>
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
