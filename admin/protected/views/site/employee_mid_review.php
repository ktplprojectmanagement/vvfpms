       <style media="all" type="text/css">
      
         #err { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 374px;
height: 52px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
    right: 45%;
background-color: #AB5454;
color: #FFF;
font-weight: bold; 
}
      
   </style>
<style type="text/css">
                .popover{
   min-width:30px;
  
   max-width:400px;
   overflow-wrap:break-word;
   border:1px solid #4c87b9;
}
            </style>
   <style type="text/css">
       
       table.mid-table td { border:1px solid red; height:37px;min-height: 190px;max-height: auto}
       table.mid-table th { border:1px solid red; height:37px;min-height: 190px;max-height: auto}

       table.mid-table1 td { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       table.mid-table1 th { border:1px solid red; height:37px;min-height: 37px;max-height: auto}
       </style>
       <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1> <?php if(isset($mid_review) && $mid_review == 1) { ?>List Of Goal's<?php }else { echo "List Of Pending Approvals"; } ?></h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->         
                      
                           <!--  <div class="note note-info">
                                <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
                            </div> -->
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
                <div class="container-fluid" style='background: #EFF3F8 none repeat scroll 0% 0%;'>
                <div class="page-content"  style="background:none">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">                       
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
                            <!-- END PAGE SIDEBAR -->
                            
                            <div class="page-content-col">
                            <div id="err" style="display: none"></div>
                             <!-- <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a><br><br> -->
                                <!-- BEGIN PAGE BASE CONTENT -->                                
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                 <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
                                  ?>
                                 <?php 
//echo CHtml::button('Final Submission',array('class'=>'btn border-blue-soft send_for_appraisal','id'=>$employee_data["0"]["Employee_id"]));
                                    }
                                 ?>
                                 <?php
                                            if (!isset($approved_list)) { ?>                                           
                                        <?php    if (isset($kpi_data) && count($kpi_data)>0) { 
                                               foreach ($kpi_data as $row) { $cnt = 0; ?>                                               
                                        <div class="portlet box border-blue-soft bg-blue-soft" style="margin-top: 10px;border: 1px solid grey;">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <?php if(isset($employee_data['0']['Emp_fname']) && $employee_data!=0) { echo $employee_data['0']['Emp_fname']; }?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status : ".$row['KRA_status']; ?>
                                                    <a href="javascript:;" class="collapse"> </a>                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                               <table class="mid-table table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top: 45px;">
                                                   <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']);
                                                                $employee_comment = explode(';',$row['employee_comment']);
                                                                $appr_comment = explode(';',$row['appraiser_comment']);
                                                                $appr_status = explode(';',$row['mid_KRA_status']);
                                                                $kra_status = $row['mid_KRA_final_status'];
                                                                //print_r($kra_status);die();
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
                                                                //print_r($appr_comment);die();
                                                                //print_r($kpi_list_data);die();
                                                            ?>
                                                         <tr>
                                                            <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Description</font></b></td>
                                                            <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $row['KRA_description'];?></td>
                                                        </tr>
                                                    <tr>
                                                            <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>Category</font></b></td>
                                                            <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $row['KRA_category'];?></td>
                                                    </tr>
<tr>
                                                            <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>Weightage</font></b></td>
                                                            <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $row['target'];?></td>
                                                    </tr>  
<tr>
									<td align="left" valign=middle><b><font face="Calibri" size=3>Key Performance Indicators (KPI) Description</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>KPI Unit</font></b></td>

                                                <td align="left" valign=middle><b><font face="Calibri" size=3>KPI Value</font></b></td>
<td align="left" valign=middle ><b><font face="Calibri" size=3>Employee Comments</font></b></td>
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Status</font></b></td>
                                                <td align="left" valign=middle <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?>><b><font face="Calibri" size=3>Mid Review Comments</font></b></td><?php } ?></tr> 
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_unit[$i]!='Select') { $cnt++;
                                                            ?>
 
                                                                <tr>
                                                                    <td><?php echo $kpi_list_data[$i];echo""; ?></td>
                                                                    <td><?php echo $kpi_list_unit[$i];echo""; ?></td>
                                                                    <td><?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                                 <tr>
                                                                                 <td colspan="2"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                  <td colspan="1"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                                  <td colspan="1"><b><font face="Calibri" size=3>Unit value</font></b></td>
                                                                                  <td colspan="1"><?php echo $kpi_list_target[$i]; ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr>
                                                                                    <td><?php echo round($kpi_list_target[$i]*0.69,2); ?></td>
                                                                                    <td><?php echo round($kpi_list_target[$i]*0.70,2); ?></td>
                                                                                       
                                                                                     <td><?php echo round($kpi_list_target[$i]*0.96,2); ?></td>
                                                                                        
                                                                                    <td><?php echo round($kpi_list_target[$i]*1.06,2); ?></td>
                                                                                        
                                                                                     <td><?php echo round($kpi_list_target[$i]*1.39,2); ?></td>
                                                                                   </tr>
                                                                                 </table>

                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                               ?>
                                                                               <table class="mid-table1 table table-bordered" cellspacing="0" border="0">
                                                                               <tr>
                                                                                  <td colspan="3"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                                   <td colspan="2"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                   <td>1</td>
                                                                                   <td>2</td>
                                                                                   <td>3</td>
                                                                                   <td>4</td>
                                                                                   <td>5</td>
                                                                                 </tr>
                                                                                   <tr class="content_hover">                                                                    
                                                                               <?php
                                                                               for ($l=0; $l < count($value_data); $l++) { ?>
<td><lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value_data[$l]; ?>"><?php echo strlen($value_data[$l]) >= 20 ? 
substr($value_data[$l], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
$value_data[$l]; ?></lable></td>
                                                                              <?php } ?>
                                                                               </tr>
                                                                               </table>
                                                                               <?php
                                                                            }
                                                                        ?></td>
                                                                  <td>
                                                                        <?php
                                                                           $emp_comment = '';
                                                                           if (isset($employee_comment[$i]) && $employee_comment[$i] != '') {
                                                                                 $emp_comment = $employee_comment[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                               $emp_comment = '';
                                                                             }
                                                                        ?>
                                                                        <?php
                                                                         if ($kra_status == 'Pending' || $kra_status == '') {
                                                                            echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px'));
                                                                         }
                                                                       else if($kra_status == 'Approved')
                                                                         {
                                                                              echo CHtml::textArea("employee_comment",$emp_comment,$htmlOptions=array('class'=>"form-control employee_comment".$row['KPI_id'].$i,'rows'=>2,'style'=>'min-width: 310px;max-width: 300px;height: 64px;max-height: 64px;min-height: 64px','disabled'=> "true"));
                                                                         }
                                                                   
                                                                 ?>
                                                                </td>
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>
								                <td <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:''"<?php } ?> >
                                                                        <?php   
                                                                    $select = '';$status = '';

                                                                    $status = '';
                                                                    if (isset($appr_status[$i]) && $appr_status[$i] != '') {
                                                                        $select = 0;
                                                                        $status[$appr_status[$i]] = array('selected' => true); 
                                                                    }
                                                                    else
                                                                    {
                                                                         $select = '';
                                                                         $status['Select'] = array('selected' => true);
                                                                    }
                                                                    
                                                                   $review_type = array('Select'=>'Select','Needs Attention'=>'Needs Attention','Nearing Completion'=>'Nearing Completion','On Track'=>'On Track','Completed'=>'Completed');

                                                                    echo CHtml::dropDownList("kpi_status_type",'',$review_type,$htmlOptions=array('class'=>"form-control kpi_status_type-".$row['KPI_id'].$i,'style'=>"width: 186px;",'options' => $status,'disabled'=> "true"));
                                                                 ?>
                                                                    </td>
                                                                    <td <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] == 'Approved') {?>style="display:block"<?php } ?>>
                                                                        <?php
                                                                            $apr_comment = '';
                                                                            if (isset($appr_comment[$i]) && $appr_comment[$i] != '') {
                                                                                $apr_comment = $appr_comment[$i];
                                                                            }
                                                                            else
                                                                            {
                                                                                $apr_comment = '';
                                                                            }
                                                                            
                                                                    echo CHtml::textArea("review_comment",$apr_comment,$htmlOptions=array('class'=>"form-control review_comment".$row['KPI_id'].$i."",'style'=>"width: 186px;max-width: 186px;max-height: 58px;min-width: 186px;min-height: 58px;",'rows'=>2,'maxlength' => 100,'max','disabled'=> "true"));
                                                                        ?>
                                                                    </td>
                                                    <?php } ?>
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>
                                                                <i id="updation_spinner-<?php echo $row['KPI_id']; ?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;margin-left: 212px;display: none"></i>                                    
                                                   
                                                     <label id="get_kpi_count-<?php echo $row['KPI_id']; ?>" style="display: none"><?php echo $kpi_data_data; ?></label>
                                                      <?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php 
//echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'float:right','id'=>"KPI_id-".$row['KPI_id']));
 } ?> 
                                                </table>  
<?php if (isset($kpi_data['0']['mid_KRA_final_status']) && $kpi_data['0']['mid_KRA_final_status'] != 'Approved') {
                                                        ?>
                                                 <?php 
echo CHtml::button('Save Changes',array('class'=>'btn border-blue-soft update_status','style'=>'margin-left: 93%;','id'=>"KPI_id-".$row['KPI_id']));
 } ?>                             
                                            </div>
                                        </div>
                                         <?php 
                                           $cnt++; } }
                                            else
                                            { ?>
                                              <div class="page-content-inner">
                            <div class="note note-info">
                                <p> No Record Found </p>
                            </div>
                        </div>
                                          <?php  }
                                            }                                           
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
                <div id="midstatic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to send goals to appraiser? </p>
                                </div>
                                <div class="modal-footer">                                 
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">Submit Goal</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div> 
                                </div>
                            </div>
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
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
                <script type="text/javascript">
                  $(function(){
                    $("body").on('click','.send_for_appraisal',function(){
                        $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                        var data = {
                                'emp_id' : $(this).attr('id')
                              };
                              console.log(data);
                              var base_url = window.location.origin;
                              $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Midreview/get_mid_emp_data',
                                success : function(data)
                                { 
                                    var state = data.split('-');
                                    if (state[0] == state[1]) 
                                    {
                                       jQuery("#midstatic").modal('show');
                                        $("#continue_goal_set").click(function(){
                                            $("#show_spin").show();
                                             var base_url = window.location.origin;
                                                $.ajax({
                                                    type : 'post',
                                                    datatype : 'html',
                                                    url : base_url+'/index.php?r=Midreview/goalnotification',
                                                    success : function(data)
                                                    {
                                                        alert(data);
                                                        $("#show_spin").hide(); 
                                                        $("#err").show();  
                                                        $("#err").fadeOut(6000);
                                                        $("#error_value").text("Notification Send to appraiser");
                                                        $("#err").addClass("alert-success");                       
                                                    }
                                                });
                                        });
                                    }
                                    else if(state[0] != state[1])
                                    {
                                        $("#err").show();  
                                        $("#err").fadeOut(6000);
                                        $("#err").text("Please update all KRA.");
                                        $("#err").addClass("alert-danger");
                                    }
                                }
                            });
                    });
                      $(".update_status").click(function(){ 
                            $("#err").removeClass("alert-success"); 
                            $("#err").removeClass("alert-danger");                        
                          var id_value = $(this).attr('id');
                          var id = id_value.split('-');var mid_review = ''; var review_comments = ''; var error_count1 = 0;var error_count2 = '';                          
                           $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                          for (var i = 0; i < $("#get_kpi_count-"+id[1]).text(); i++) {
                              if (mid_review == '') 
                              {
                                  mid_review = $(".kpi_status_type-"+id[1]+i).find(':selected').val();
                              }
                              else
                              {
                                  mid_review = mid_review +';'+$(".kpi_status_type-"+id[1]+i).find(':selected').val();
                              }
                              console.log(id_value);
                              var comment_data = $(".employee_comment"+id[1]+i).val();
                              //alert($(".review_comment"+id[1]+i).text());
                              if (comment_data.length == 0) 
                              {
                                  error = "Please enter mid review comment."; error_count1 = id[1]+i;break;                                 
                              }
                              else if (comment_data.length>1000) 
                              {
                                  error = "Maximum 1000 charaters are allowed to write comment for review."; error_count1 = id[j]+i;error_count2 = id[j];break;                                 
                              }
                              else
                              {
                                error = '';
                                  $(".employee_comment"+id[1]+i).css('border-color','');
                                  if (review_comments == '') 
                                  {
                                      review_comments = $(".employee_comment"+id[1]+i).val();
                                  }
                                  else
                                  {
                                      review_comments = review_comments +';'+$(".employee_comment"+id[1]+i).val();
                                  }
                              }
                          }
                           //alert(error);
                          if (error != '') 
                          {
                             $("#err").show();  
                             $("#err").fadeOut(6000);
                             $("#err").text(error);
                            $("#err").addClass("alert-danger");
                            $(".employee_comment"+error_count1).css('border-color','red');
                            $('html, body').animate({
                                  scrollTop: ($(".employee_comment"+error_count1).parent().offset().top)
                              },500);

                          }
                          else
                          {
                            $("#updation_spinner-"+id[1]).show();
                            var data = {
                                'KPI_id' : id[1],
                                'review_comments' : review_comments,
                              };
                              console.log(data);
                              var base_url = window.location.origin;
                              $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Midreview/employee_mid_review',
                                success : function(data)
                                { 
                                    //alert(data);
                if(data == "error occured")
                {
                    $("#err").show();  
                                    $("#err").fadeOut(6000);
                                    $("#err").text("No Changes Done");
                                    $("#err").addClass("alert-success");
                                   // get_notify("Mid year review updated successfully");
                                    $("#updation_spinner-"+id[1]).hide();
                }
                else
                {
                    $("#err").show();  
                                    $("#err").fadeOut(6000);
                                    $("#err").text("Mid year review updated successfully");
                                    $("#err").addClass("alert-success");
                                   // get_notify("Mid year review updated successfully");
                                    $("#updation_spinner-"+id[1]).hide();   
                }
                                                                                       
                                }                    
                              });
                          }
                          
                      });
                  });
                </script>
               
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
                        settings.life = '700';
                    }

                    j.notific8('zindex', 11500);
                    j.notific8($.trim(e), settings);
                    
                    $button.attr('disabled', 'disabled');
                    
                    setTimeout(function() {
                        $button.removeAttr('disabled');
                    }, 1000);
                }        
            </script>
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>-->
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->

