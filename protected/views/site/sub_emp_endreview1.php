<?php
Yii::app()->controller->renderPartial('//site/all_js');
?>
   <script type="text/javascript">
                $(function(){
 $("body").on('mouseover','.validate_field',function(){
$(this).attr('data-content',$(this).val());
 $(this).popover('show');
});   
});
</script>   

       <script type="text/javascript">
       var id,id_value;var sum_value = '';
       var str_chk = /^[0-9]{1}/;
            $(function(){
            $(window).scroll(function()
            {
                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
            });      
                $(".score").keyup(function() {
                    id = $(this).attr('id');
                    id_value = id.split('-');
                        if ($(this).val() == 0 || !$.isNumeric($(this).val()) || $(this).val()>5) 
                        {
                            //alert("jlkj")
                             $("#err").show();  
                             $("#appraiser_raiting-"+id_value[1]+"-"+id_value[2]).css('border','1px solid red');
                            //$("#err").fadeOut(6000);
                            $("#err").text("Please enter valid rating between 0-5.");
                            $("#err").addClass("alert-danger");
                        }
                        else
                        {
                            $("#err").hide();
                           sum_value = '';var val_new = 0;var wt = 1;var wt_sum = 1;
                           $("#appraiser_raiting-"+id_value[1]+"-"+id_value[2]).css('border','1px solid #999');                         
                            //alert(id_value);
                            for (var i = 0; i < $("#kpi_count_list-"+id_value[2]).text(); i++) {
var wt = 1;
if($("#wt"+i+id_value[2]).text() != '')
{
wt = $("#wt"+i+id_value[2]).text()/100;
}
else if($("#kpi_count_list-"+id_value[2]).text() == 0)
{
wt = 0;
}
else
{
wt = (100/$("#kpi_count_list-"+id_value[2]).text())*0.01;
}
if(wt_sum == '')
{
wt_sum = $("#wt"+i+id_value[2]).text();
}
else
{
wt_sum = parseFloat(wt_sum)+parseFloat($("#wt"+i+id_value[2]).text());
}
                                if (!str_chk.test($("#appraiser_raiting-"+i+"-"+id_value[2]).val()) || $("#appraiser_raiting-"+i+"-"+id_value[2]).val() == '') 
                                {
                                    val_new = 0;
                                }
                                else
                                {
                                    val_new = $("#appraiser_raiting-"+i+"-"+id_value[2]).val()*wt;
                                }
                                if(sum_value == '')
                                {
                                     sum_value = val_new;
                                }
                                else
                                {
                                    sum_value = parseFloat(sum_value)+parseFloat(val_new);
                                } 
//alert(wt);
$("#"+"rating"+i+id_value[2]).text(($("#appraiser_raiting-"+i+"-"+id_value[2]).val()*wt).toFixed(2));                       
                            }
                             //alert(sum_value);
                            var avg_get = sum_value/$("#kpi_count_list-"+id_value[2]).text();
                            $("#sum-"+id_value[2]).attr('value',avg_get);
                            
var kra_sum = '';
                            for(var j=0;j<$("#kra_count").text();j++)
{
if(kra_sum == '')
{
kra_sum = $("#sum-"+id_value[2]).val()*($("#rate_"+id_value[2]).text()/100);
}
else
{
kra_sum = parseFloat(kra_sum)+parseFloat($("#sum-"+id_value[2]).val()*($("#rate_"+id_value[2]).text()/100));
}

}
var kra_avg_rate = kra_sum/$("#kra_count").text();
$("#kra_total_value").text(kra_sum.toFixed(2));
                        }                       
                    // });
                });
            });
       </script>
       <style media="all" type="text/css">
      
      #err, #error { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
        width: 367px;
    height: 60px;
    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;
    right: 45%;
background-color: #AB5454;
color: #FFF;
font-weight: bold;  
      }
      
   </style>
<?php

?>
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
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                        <div id="err" style="display: none"></div>
            <div class="container-fluid"> 
       
<lable id="promotion_form_lable" style="display:none"><?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0) { echo "1"; }else { "0"; }?></lable>
<?php if(isset($emp_promotion_data) && count($emp_promotion_data)>0) { ?>
<div  style="min-width: 900px;" class="portlet box bg-blue-soft border-blue-soft">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Promotion Form
                                           </div>
                                           <div class="tools">
                                                   
                                                </div>
                                    </div>                                    
                                    <div style="min-width: 900px;" class="portlet-body tabs-below">
                                        <div class="tab-content">
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                    <div style="border: 1px solid rgb(76, 135, 185);margin-top: 20px;padding-left: 10px;min-width: 900px">
                                    <?php

if (isset($IDP_data) && count($IDP_data)>0)
{ 
$model1=new Yearend_reviewbForm;	
$where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
$list = array('Employee_id','goal_set_year');
$data = array(Yii::app()->user->getState("Employee_id"),date("Y",strtotime("-1 year"))."-".date("Y"));
$employee_review_data = $model1->get_employee_data($where,$data,$list);
?>
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
                                </tr>
                                </tbody>
                                </table>
                 <?php }else { ?>
<div class="alert alert-info"  style="margin-top: 10px;width: 99%;">
  Midyear Review For IDP & goalsheet not updated.
</div>
<?php } ?>
                                   
                                </div></div></div>  </div>
<?php } ?>








                 
 <?php if(isset($kpi_data) && count($kpi_data)>0) { ?>
                                      
                                <?php } ?>
                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to send year end review(A) to employee? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
 <div id="promotion" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" style="width: 55%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Promotion Form<lable id="error_text" style="color:red;margin-right: 68px;float:right"></lable></h4>
                                </div>
                                <div class="modal-body">
                                       <label id="emp_id" style="display: none;"><?php if(isset($emp_data) && $emp_data !='' && count($emp_data)>0) { echo $emp_data['0']['Employee_id']; }?></label>
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
                                </tr>
                                </tbody>
                                </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="promotion_form_submit">Save</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
           
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

