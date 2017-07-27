            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Admin_Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Generatereport">Generate Report</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Generate Report</h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                                <style media="all" type="text/css">
                              #err { 
                               position: absolute; 
                               top: 0; right: 20; 
                               z-index: 10; 
                            width: 226px;
                        height: 50px;
                        border: 1px solid #4C9ED9;
                        text-align: center;
                        padding-top: 10px;
                              }
      
                        </style>
                        <style type="text/css">
                                    .report_data tr {
                                    width: 98.5%;
                                    display: inline-table;
                                    table-layout: fixed;
                                    }

                                    .report_data table{
                                     height:356px;   
                                     display: -moz-groupbox;
                                     overflow-y: scroll; 
                                    }
                                    .report_data tbody{
                                      overflow-y: scroll;      
                                      height: 356px;        
                                      width: 100%;
                                      position: absolute;
                                    }
                                </style>
                        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Report Name</h4>
                                </div>
                                <div class="modal-body">
                                    <label>Enter Report Name : </label>
                                   <?php echo CHtml::textField('report_name','',array('class'=>'form-control','id'=>'report_name')); ?>
                                </div>
                                <div class="modal-footer">
                                    <label id="report_name_error" style="color: red;float: left;display: none">Please Enter Report name.</label>
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn green" id="continue_goal_set">Save Report</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="err" style="display:none"></div>                                
                                     <div class="portlet box" style="border:1px solid #337ab7;height: 397px;">
                                                <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                    <div class="caption">
                                                        Generate Report</div>
                                                   <!--  <div class="tools">
                                                        <a title="" data-original-title="" href="javascript:;" class="collapse"> </a>
                                                    </div> -->
                                                </div>
                                                
                                                <div>
                                                   <table class="table table-bordered table-condensed report_data" style="width: 1580px;max-width: 1580px">
                                                 <?php
                                                    if (isset($columns)) {
                                                       foreach ($columns as $rows) { ?>
                                                <tr>
                                               <td><label class='column_name' id="<?php echo $rows;?>"><?php echo $rows;?></label></td>
                                                <td align="center" style="top:50%">
                                                    <input value="<?php echo $rows;?>" name="test" type="checkbox" class="md-check">
                                                </td>
                                                </tr>
                                                 <?php    }
                                                    } 
                                                    ?>
                                                </table>
                                                <div class="row-fluid" style="margin-top: 375px;">
                                                    <div class="span4 offset4 text-center">
                                                    <button class="btn btn-primary" id="generate_button">Generate</button>
                                                    </div>
                                                </div>
                                            </div>
                                                </div> 
                                                <style type="text/css">
                                                #sample_1_filter
                                                {
                                                    float: right;
                                                }
                                                #sample_1_length
                                                {
                                                    display: none;
                                                }
                                                #sample_1_info
                                                {
                                                    display: none;
                                                }
                                                </style>  
                                                <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                                                <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                                                <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
                                                <script type="text/javascript"> 
                                                var j = jQuery.noConflict();           
                                                    $(function(){
                                                        j("#sample_1").DataTable();
                                                    });
                                                </script>
                                                <table class="table" id="sample_1" style="margin-top:50px;height: auto;">
                                                 <thead style="background-color: #337AB7;color: white">                 
                                                        <th>Sr.No</th>
                                                        <th>Report Name</th>
                                                        <th> Action </th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    if (isset($report_column)) {
                                                        $cnt = 0;
                                                        foreach ($report_column as $row) { ?>
                                                         <tr>
                                                         <td><?php echo $cnt; ?></td>
                                                         <td><?php echo $row['report_name']; ?></td>               
                                                             <td><a href="<?php echo Yii::app()->createUrl('Generatereport/report', array('id' => $row['id']))?>"> <button class="btn" id="get_report" style='border: 1px solid;'>Get Report</button></a>
                                                            <button class="btn delete_report" id="<?php echo $row['id']; ?>" style='border: 1px solid;'>Delete Report</button>
                                                             </td>
                                                         </tr>
                                                <?php        }
                                                    }
                                                ?>
                                                </tbody>
                                            </table> 
                                                </div>
                                        </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
          
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script type="text/javascript">
                    $(function(){
                        $("body").on('click','.delete_report',function(){
                            var data = {
                                'id' : $(this).attr('id'),
                            };                            
                            var base_url = window.location.origin;                              
                            $.ajax({
                            dataType :'html',
                             type :'post',
                             data : data,
                             url : base_url+'/index.php?r=Generatereport/delete_report',
                             'success' : function(data) {
                                if (data == 'success') 
                                {
                                    $("#sample_1").load(location.href + " #sample_1");
                                }                                
                            }
                        });
                        })
                       
                        $('.report_data').find('tbody').css('width','auto','max-width','auto');
                        $("#generate_button").click(function(){
                            var checkedValues = $('.md-check:checked').map(function() {
                                return this.value;
                                }).get();
                            $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                            if (checkedValues == '') 
                            {
                                $("#err").show();  
                                $("#err").fadeOut(6000);
                                $("#err").text("Please Select columns required for report.");
                                $("#err").addClass("alert-danger");
                            }
                            else
                            {
                                    jQuery("#static").modal('show');
                                    $("#continue_goal_set").click(function(){
                                    var checkedValues = $('.md-check:checked').map(function() {
                                    return this.value;
                                    }).get();                               
                                    var content = '';
                                    
                                    if ($("#report_name").val() != '') 
                                    {
                                        //alert($("#report_name").css('display','none'));
                                            $("#report_name_error").css('display','none');
                                            content = {                                    
                                            'content_list' : checkedValues,
                                            'report_name' : $("#report_name").val(),
                                            };
                                            console.log(content);
                                            var base_url = window.location.origin;                              
                                            $.ajax({
                                            dataType :'html',
                                             type :'post',
                                             data : content,
                                             url : base_url+'/index.php?r=Generatereport/get',
                                             'success' : function(data) {
                                                $("#sample_1").load(location.href + " #sample_1");
                                                jQuery("#static").modal('hide');
                                                $("#report_name").val('');
                                            }
                                        });
                                    }
                                    else
                                    {                                        
                                        $("#report_name_error").css('display','block');                                        
                                    }
                                    
                                });
                            }
                        });                        
                    });
                </script>
            
        </div>
        <!-- END CONTAINER -->
