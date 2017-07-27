
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                       <!--  <h1>Blank Page Layout</h1> -->                       
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
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->                               
                                <div>
                                        <?php 
                                                $form=$this->beginWidget('CActiveForm', array(
                                               'id'=>'user-form',
                                                'enableClientValidation'=>true,
                                                'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                                //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
                                            ));
                                            ?>
                                            <div class="portlet box " style='border:1px solid #337ab7'>
                                            <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                <div class="caption">
                                                    KRA Assigned List</div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" style="border:none">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-4"> <label >Sort By Cluster</label>
                                                                <?php
                                                                $models = ClusterForm::model()->get_list('cluster_name');
                                                                $list = CHtml::listData($models,'cluster_name', 'cluster_name');
                                                                     echo CHtml::dropDownList("cluster_name",'',$list,$htmlOptions=array('class'=>"form-control cluster_list",'style'=>"width: 186px;"));
                                                                ?>
                                                                 </th>
                                                            
                                                                <th> <label >Sort By Department</label>
                                                                <?php
                                                                $models = ClusterForm::model()->get_list('department');
                                                                $list = CHtml::listData($models,'department', 'department');
                                                                     echo CHtml::dropDownList("department",'',$list,$htmlOptions=array('class'=>"form-control department_list",'style'=>"width: 186px;"));
                                                                ?>
                                                                 </th>
                                                               
                                                                <!-- <th> <label >KRA Type</label>
                                                                <?php
                                                                $models = KRAStructureForm::model()->get_list();
                                                                $list = CHtml::listData($models,'KRA_category', 'KRA_category');
                                                                     echo CHtml::dropDownList("KRA_category",'',$list,$htmlOptions=array('class'=>"form-control KRA_category",'style'=>"width: 186px;"));
                                                                ?>
                                                                 </th> -->
                                                                
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered" id='sample_1'>
                                                            <thead>
                                                            <tr>
                                                                <th>Employee Name </th>
                                                                <th>Cluster Name  </th>
                                                                <th>KRA Name  </th>
                                                                <th>Designation  </th>
                                                                <th>Action </th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id='emp_data'>                                                       
                                                        <?php
                                                            if (isset($kra_data) && count($kra_data)>0) {
                                                            for ($i=0; $i < count($kra_data); $i++) { ?>
                                                            <tr>
                                                                <td><?php echo $appraiser_list_data[$i]['0']['Emp_fname'].' '.$appraiser_list_data[$i]['0']['Emp_lname']; ?></td>
                                                                <td><?php echo $appraiser_list_data[$i]['0']['cluster_name']; ?></td>
                                                                <td><?php echo $kra_data[$i]['KRA_category']; ?></td>
                                                                <td><?php echo $appraiser_list_data[$i]['0']['Designation']; ?></td>
                                                                <td> <?php echo CHtml::button('Delete',array('class'=>'btn btn-primary update_changes','id'=>$appraiser_list_data[$i]['0']['Employee_id'])); ?></td>
                                                             </tr>
                                                        <?php    }
                                                        }
                                                        else
                                                        { ?>
                                                            <tr>
                                                                <td colspan=5>No Record Found</td>
                                                             </tr>
                                                        <?php }
                                                        ?>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-4 col-md-8">                                            
                                          
                                        </div>
 <?php $this->endWidget(); ?>
                                </div>
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
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to remove this record? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn green" id="continue_goal_set">Continue Task</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script type="text/javascript">
                    $(function(){
                        $(".cluster_list").change(function(){
                            var data = {
                                Department : $('.department_list').find(':selected').val(),
                                cluster_name : $(this).find(':selected').val(),
                                KRA_category : $('.KRA_category').find(':selected').val()
                            };
                            console.log(data);
                            var base_url = window.location.origin;
                            $.ajax({
                                type :'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/pmsapp/index.php?r=Employee/emp_list_data',
                                success : function(data)
                                {
                                    $('#emp_data').html(data);
                                    $(".update_changes").click(function(){
                                    var data = {
                                        'applicable_to' : $(this).attr('id'),
                                    };
                                    //alert('sdf');
                                    jQuery("#static").modal('show');
                                    var base_url = window.location.origin;  
                                    $("#continue_goal_set").click(function(){
                                        $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : data,
                                            url : base_url+'/pmsapp/index.php?r=KRA/update_kra',
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
                                }
                            });
                        });
                        $(".department_list").change(function(){
                            var data = {
                                Department : $(this).find(':selected').val(),
                                cluster_name : $('.cluster_list').find(':selected').val(),
                                KRA_category : $('.KRA_category').find(':selected').val()
                            };
                            console.log(data);
                            var base_url = window.location.origin;
                            $.ajax({
                                type :'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/pmsapp/index.php?r=Employee/emp_list_data',
                                success : function(data)
                                {
                                    $('#emp_data').html(data);
                                    $(".update_changes").click(function(){
                                    var data = {
                                        'applicable_to' : $(this).attr('id'),
                                    };
                                    //alert('sdf');
                                    jQuery("#static").modal('show');
                                    var base_url = window.location.origin;  
                                    $("#continue_goal_set").click(function(){
                                        $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : data,
                                            url : base_url+'/pmsapp/index.php?r=KRA/update_kra',
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
                                }
                            });
                        });
                        $(".update_changes").click(function(){
                            var data = {
                                'applicable_to' : $(this).attr('id'),
                            };
                            //alert('sdf');
                            jQuery("#static").modal('show');
                            var base_url = window.location.origin;  
                            $("#continue_goal_set").click(function(){
                                $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+'/pmsapp/index.php?r=KRA/update_kra',
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
                    });
                </script>