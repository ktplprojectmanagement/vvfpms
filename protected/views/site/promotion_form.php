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
                            <h1>Promotion Form</h1>
                        </div>
                        <!-- END PAGE TITLE -->

                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <style media="all" type="text/css">
      
      #err, #error { 
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
                <div class="page-content">
                    <div class="container">
                        <div class="page-content-inner">
                            
                            <div>
                             <div id="err" style="display:none"></div>
                                    <div class="portlet box bg-blue-soft" style="border: 1px solid rgb(51, 122, 183); min-width: 240px;">
                                    <div class="portlet-title" style="font-weight:bold ;" >
                                        <div class="caption">
                                           Promotion Form </div>
                                        </div>
                                
                                <div class="portlet-body tabs-below">
                                    <div class="tab-content">
                                <?php 
                                    $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'user-form',
                                    'enableClientValidation'=>true,
                                    'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                    ));
                                ?>
                                
                                <label id="emp_id1" style="display:none"><?php if(isset($emp_data) && $emp_data !='' && count($emp_data)>0) { echo $emp_data['0']['Employee_id']; }?></label>
                                <table class="table table-bordered table-condensed">
                                <tbody>
                                <tr style="font-weight:bold">
                                    <td  colspan="2">
                                        Note: <br>
                                        1. Please refer to the detailed guideline in the PMS handbook on promotions before filling this sheet. Promotions are given after assessing the potential of the incumbent to take on challenging roles at the next level. Thus, a promotion recommendation seeks to assess - the availability of a challenging role AND the existence of potential to meet the demands of the role. 
                                        <br>2. All questions are compulsory and will be considered by the panel before approving the promotion decision.
                                        <br>3. Potential is:
                                        Holistic view of behavior and capability to grow and take on larger or different roles;
                                        Longer-term pattern of leadership behavior; Partially measured by demonstration of behaviors in the past. Thus, potential is forward looking while performance is looking at the past.

                                    </td>
                                </tr> 
                                <tr style="font-weight:bold">
                                <td>
                                    1
                                </td>    
                                <td>
                                    Does the employee possess the potential for the next level? Please explain
                                </td>  

                                </tr>              
                                <tr>
                                <td>
                                  
                                </td>    
                                <td>
                                    <textarea id="field_1"  class="form-control" maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field1'])){ echo $emp_promotion_data['0']['field1']; }?></textarea>
                                </td>  

                                </tr>
                                <tr style="font-weight:bold">
                                <td>
                                   2
                                </td>    
                                <td>
                                    Please state the added responsibility that the employee will handle after the promotion.
                                </td>  

                                </tr> 
                                <tr>
                                <td>
                                 Manage more people 
                                </td>    
                                <td>
                                    <textarea id="field_2"  class="form-control " maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field2'])){ echo $emp_promotion_data['0']['field2']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage larger business volume
                                </td>    
                                <td>
                                    <textarea id="field_3"  class="form-control " maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field3'])){ echo $emp_promotion_data['0']['field3']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage additional projects
                                </td>    
                                <td>
                                    <textarea id="field_4"  class="form-control " maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0  && isset($emp_promotion_data['0']['field4'])){ echo $emp_promotion_data['0']['field4']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Manage new territory/ geography
                                </td>    
                                <td>
                                    <textarea id="field_5"  class="form-control " maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field5'])){ echo $emp_promotion_data['0']['field5']; }?></textarea>
                                </td>  

                                </tr> 
                                <tr style="font-weight:bold">
                                <td>
                                   3
                                </td>    
                                <td>
                                    Why do you think the employee is ready to handle the additional responsibility?
                                </td>  

                                </tr>              
                                <tr>
                                <td>
                                  
                                </td>    
                                <td>
                                    <textarea id="field_6"  class="form-control " maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data['0']['field6'])){ echo $emp_promotion_data['0']['field6']; }?></textarea>
                                </td>  

                                </tr>
                                <tr style="font-weight:bold">
                                <td>
                                   4
                                </td>    
                                <td>
                                    Please give your comments on why role change and role enhancement cannot be offered instead of a promotion.
                                </td>  

                                </tr> 
                                <tr>
                                <td>
                                 Role Change 
                                </td>    
                                <td>
                                    <textarea id="field_7"  class="form-control " maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field7'])){ echo $emp_promotion_data['0']['field7']; }?></textarea>
                                </td>  

                                </tr>
                                <tr>
                                <td>
                                  Role Enhancement
                                </td>    
                                <td>
                                    <textarea id="field_8"  class="form-control " maxlength="400" name="employee_review1"  required><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0 && isset($emp_promotion_data['0']['field8'])){ echo $emp_promotion_data['0']['field8']; }?></textarea>
                                </td>  
                                <tr>
                                    <td colspan="2">
                                        <div class="btn-group col-md-12">
                  

                        <a href="<?php echo $this->createUrl('Promotion/employee_list');?>"><?php echo CHtml::button('Back',array('class'=>'btn  btn-primary ','style'=>'float:left;display:none')); ?></a>
                        
                        <?php echo CHtml::button('Submit',array('class'=>'btn btn-primary ','style'=>'float:right','id'=>'promotion_form_submit')); ?>
                                    </div>
                                    </td>
                                </tr>
                                </tr>
                                </tbody>
                                </table>
                                 <?php $this->endWidget(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(function(){
                            $("#promotion_form_submit").click(function(){
                                $("#err").removeClass("alert-success"); 
                                $("#err").removeClass("alert-danger"); 
                                $(window).scroll(function()
                                {
                                    $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                                });
                                var field1 = $("#field_1").val();
                                var field2 = $("#field_2").val();
                                var field3 = $("#field_3").val();
                                var field4 = $("#field_4").val();
                                var field5 = $("#field_5").val();
                                var field6 = $("#field_6").val();
                                var field7 = $("#field_7").val();
                                var field8 = $("#field_8").val();
                                var error = '';
                                if (field1.length == 0 || field2.length == 0 || field3.length == 0 || field4.length == 0 || field5.length == 0 || field6.length == 0 || field7.length == 0 || field8.length == 0) 
                                {
                                    error = "All fields are required";
                                }
                                else
                                {
                                    error = '';
                                }
                                if (error != '') 
                                {
                                    $("#err").show();  
                                    $("#err").fadeOut(6000);
                                    $("#err").text(error);
                                    $("#err").addClass("alert-danger");
                                  
                                }
                                else
                                {
                                    var data = {
                                        'emp_id' : $("#emp_id1").text(),
                                        'field1' : $("#field_1").val(),
                                        'field2' : $("#field_2").val(),
                                        'field3' : $("#field_3").val(),
                                        'field4' : $("#field_4").val(),
                                        'field5' : $("#field_5").val(),
                                        'field6' : $("#field_6").val(),
                                        'field7' : $("#field_7").val(),
                                        'field8' : $("#field_8").val(),
                                    };
                                   //alert($("#emp_id1").text());
                                    var base_url = window.location.origin;
                                    $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+'/index.php?r=Promotion/submit_data',
                                    success : function(data)
                                    {
                                    // alert(data);
                                       if (data == 'success') 
                                       {
                                            $("#err").show();  
                                            $("#err").fadeOut(6000);
                                            $("#err").text("Successfully saved");
                                            $("#err").addClass("alert-success");
                                       }
                                       else if(data == 'update')
                                       {
                                            $("#err").show();  
                                            $("#err").fadeOut(6000);
                                            $("#err").text("Successfully updated");
                                            $("#err").addClass("alert-success");
                                       }
                                       else
                                       {
                                            $("#err").show();  
                                            $("#err").fadeOut(6000);
                                            $("#err").text("No changes done");
                                            $("#err").addClass("alert-danger");
                                       }
                                    }
                                    });
                                }
                            });
                        });
                    </script>

                    


    
                </div>

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
              