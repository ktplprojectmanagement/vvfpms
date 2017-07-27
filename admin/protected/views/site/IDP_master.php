            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
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
                    <script type="text/javascript">
                    $(function(){
                        $('input[type="radio"]').click(function(){
                            if ($('.faculty_type:checked').val() == 'External') 
                          {
                                $("#ext_faculty").show();
                                $("#ext_faculty1").show();
                                $("#fal_list").hide();
                          }
                          else if($('.faculty_type:checked').val() == 'Internal')
                          {
                                $("#ext_faculty").hide();
                                $("#ext_faculty1").hide();
                                $("#fal_list").show();
                          }
                        });
                    });
                    </script>
                    <style media="all" type="text/css">
      
     /* #err, #error { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 226px;
height: 50px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;*/
      
      }
      
   </style>
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
                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Delete this record? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="portlet box new_kra" style='border:1px solid #337ab7;'  id='new_kra'>
                    <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                        <div class="caption">
                            Add Program</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">                    
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" >
                            <tbody>
                                <tr>
                                  <td> Program Name </td>
                                    <td>
                                     <?php
                                                                                                          
                                         echo CHtml::textField("program_name",'',$htmlOptions=array('class'=>"form-control",'id'=>'program_name','style'=>'width: 803px;'));
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                  <td> Faculty Type </td>
                                    <td>
                                     <?php
                                        echo CHtml::RadioButton('faculty_type', 'faculty_type', array(
                                            'value'=>'External','class'=>'faculty_type', 'uncheckValue'=>null
                                        )).' External ';
                                        echo CHtml::RadioButton('faculty_type', 'faculty_type', array(
                                            'value'=>'Internal','class'=>'faculty_type','uncheckValue'=>null
                                        )).' Internal '; 
                                        ?>
                                    </td>
                                </tr>
                                 <tr id="ext_faculty1" style="display: none">
                                  <td> External Faculty name </td>
                                    <td>
                                     <?php
                                                                                                          
                                         echo CHtml::textField("external_name",'',$htmlOptions=array('class'=>"form-control",'id'=>'external_name','style'=>'width: 803px;'));
                                    ?>
                                    </td>
                                </tr>
                                <tr id="ext_faculty" style="display: none">
                                  <td> Amount To Pay </td>
                                    <td>
                                     <?php
                                                                                                          
                                         echo CHtml::textField("amount",'',$htmlOptions=array('class'=>"form-control",'id'=>'amount','style'=>'width: 803px;'));
                                    ?>
                                    </td>
                                </tr>
                                <tr id="fal_list">
                                  <td> Select Faculty </td>
                                    <td>
                                      <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list1();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }
                                         $Cadre_id = array(); 
                                         if (isset($Reporting_officer_data) && count($Reporting_officer_data)>0) 
                                         {
                                            for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                            if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                               $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].';'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
                                               
                                           }
                                         }
                                        echo CHtml::DropDownList('faculty_email_id','faculty_email_id',$Cadre_id,array('class'=>'form-control faculty_email_id','empty'=>'Select','style'=>'width: 803px;')); ?>
                                    </td>
                                </tr>
                                <tr>
                                  <td> Training Days </td>
                                    <td>
                                     <?php
                                                                                                          
                                         echo CHtml::textField("training_days",'',$htmlOptions=array('class'=>"form-control",'id'=>'training_days','style'=>'width: 803px;'));
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                            <div id="error" style="display:none;color: red"></div>
                             <?php                                  
                        echo CHtml::button('Add',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'program_submit')); ?>
                        </div>
                    </div>
                    </div>
                    <?php $this->endWidget();?>
                    <div class="portlet-body tabs-below">
                    <div class="tab-content">                         
                        <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="output_div_edit">
                            <thead>
                                <tr>                                                                        
                                    <th>Program Name</th>
                                    <th>Faculty Type</th>
                                    <th>Faculty Name</th>
                                    <th> Days </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($program_data_result) && count($program_data_result)>0) {
                                        for ($i=0; $i < count($program_data_result); $i++) { ?>
                                             <tr>                    
                                                <td> <?php echo $program_data_result[$i]['program_name']; ?> </td>
                                                <td> <?php echo $program_data_result[$i]['faculty_type']; ?> </td> 
                                                <td> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
                                                <td> <?php echo $program_data_result[$i]['training_days']; ?> </td>
                                                <td> <?php echo CHtml::button('Delete',array('class'=>'btn border-blue-soft send_for_appraisal','id'=>$program_data_result[$i]['id'],'onclick'=>'js:send_notification();')); ?></td>
                                            </tr>
                                <?php 
                                       }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>                   
                                                <td colspan="5">No Programs Found</td>                                              
                                        </tr>
                                        <?php
                                    }
                                ?>                                                       
                            </tbody>
                    </table>
                    </div>
                     </div> </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>     
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
        <script type="text/javascript">
            $(function(){
                $("body").on('click','.send_for_appraisal',function(){
                    jQuery("#static").modal('show');
                    var data = {
                        id : $(this).attr('id'),
                    };
                    $("#continue_goal_set").click(function(){
                        $("#show_spin").show();
                         var base_url = window.location.origin;
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=IDP_master/del_record',
                                success : function(data)
                                {
                                    //alert(data);
                                   jQuery("#static").modal('toggle');
                                    if (data == 1) 
                                    {
                                        $("#error").show();  
                                        $("#error").fadeOut(6000);
                                        $("#error").text("Successfully Deleted");
                                        $("#error").css('color','#1B741B');
                                        $("#user-form").load(location.href + " #user-form");
                                        $("#output_div_edit").load(location.href + " #output_div_edit");  
                                    }
                                                       
                                }
                            });
                    });
                });
                $("#program_submit").click(function(){
                    if($("#program_name").val() == '')
                    {
                        $("#error").show();
                        $("#error").text("Please enter program name.");
                        $("#error").css('color','red');
                    } 
                    else if($(".faculty_type:checked").val() === undefined)
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select Faculty type.");
                        $("#error").css('color','red');
                    }    
                    else if($(".faculty_type:checked").val() != 'External' && ($("#faculty_email_id").find(':selected').val() == 'Select' || $("#faculty_email_id").find(':selected').val() == ''))
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select Faculty name.");
                        $("#error").css('color','red');
                    } 
                    else if($(".faculty_type:checked").val() == 'External' && ($("#amount").val() == '' || !$.isNumeric($("#amount").val())))
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select amount in numbers only.");
                        $("#error").css('color','red');
                    }
                    else if($(".faculty_type:checked").val() == 'External' && $("#external_name").val() == '')
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please enter name for external faculty");
                        $("#error").css('color','red');
                    }
                    else if($("#training_days").val() == '' || !$.isNumeric($("#training_days").val()))
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please enter valid number of days for training.");
                        $("#error").css('color','red');
                    } 
                    else
                    {
                        
                        var data = {
                            'program_name' : $("#program_name").val(),
                            'faculty_type' : $(".faculty_type:checked").val(),
                            'faculty_email_id' : $("#faculty_email_id").find(':selected').val(),
                            'amount' : $("#amount").val(),
                            'external_name' : $("#external_name").val(),
                            'training_days' : $("#training_days").val(),
                        };
                        var base_url = window.location.origin;
                        $.ajax({
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=IDP_master/add',
                            success : function(data)
                            {
                                //alert(data);
                               if (data) 
                               {
                                    $("#error").show();  
                                    $("#error").fadeOut(6000);
                                    $("#error").text(data);
                                    $("#error").css('color','#1B741B');
                                    $("#user-form").load(location.href + " #user-form");
                                    $("#output_div_edit").load(location.href + " #output_div_edit"); 
                                    //$("#error").addClass("alert-success");
                               }
                            }
                        });      
                    } 
                    
                });
            });
        </script>
