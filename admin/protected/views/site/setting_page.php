     <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <h3 class="page-title">Master Setting
                    </h3> 
      
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-checktree.js"></script>
<script>
$('#tree').checktree();

$(function(){
$("#tree ul li").unbind('click');
 $("input[type=checkbox]").change(function(){
     var name_value = $(this).attr('name');
    var near_name =  $("input[name="+name_value+"]").closest('ul').find('.new').attr('id');

   //$("input[name="+name_value+"]").parent().next('ul').toggle('slide');
    //alert(name_value);
   if ($(this).is(':checked')) 
   {
        var arr_id = $("input[name="+name_value+"]").parent().prev('.openarrow').attr('class');
        $("input[name="+name_value+"]").parent().next('ul').slideDown('slow');
        $("input[name="+name_value+"]").parent().prev('.openarrow').css('display','');
        $("input[name="+name_value+"]").parent().prev('.openarrow').prev('.closed_arrow').css('display','none');
   }
   else
   {
    $("input[name="+name_value+"]").parent().next('ul').slideUp('slow');
     $("input[name="+name_value+"]").parent().prev('.openarrow').css('display','none');
        $("input[name="+name_value+"]").parent().prev('.openarrow').prev('.closed_arrow').css('display','');
   }
 });
})
  
//    alert("ghjgjh");

        // $("#myList li").filter(function(index){
        // return !($(this).data("width-type") == $in.attr("name"));
        // }).toggle();
</script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>
      var $j = jQuery.noConflict();///////// important//////////////
      jQuery(function() {
        $j( ".date_select" ).datepicker({dateFormat: 'yy-M-dd',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
      });
      </script>
           
                    <div class="page-content-container">
                        <div class="page-content-row">                            
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                               
                                <div>


<style type="text/css">
    ul.checktree-root, ul#tree ul {
    list-style: none;
    }
    ul.checktree-root label {
    font-weight: normal;
    position: relative;
    }
    ul.checktree-root label input {
    position: relative;
    top: 2px;
    left: -5px;
    }
</style>
<script type="text/javascript">
    $(function(){
        var content_array = {};
        var content_value = {};
        $("input[type=checkbox]").click(function(){
             var checkedValues = $("input[type=checkbox]:checked").map(function() {
                return this.value;
            }).get();
            //console.log(checkedValues);
            $("#emp_id_list").text(checkedValues);                                           
        }); 
        $("#save_settings").click(function(){
            var string = $("#emp_id_list").text();
            var string_data = string.split(',');            
            var error = '';
            var str_validate =/^([a-zA-Z0-9\s]{0,4})$/;
            for (var i = 0; i < string_data.length; i++) {
                if (string_data[i] != 'main_menu' && string_data[i] != 'on') 
                {
		if(string_data[i] == 'year_structure')
                    {
                        if ($(".PMS_display_format:checked").val() === undefined)
                        {
                            error = 'Please select PMS Calender Structure.';
                        }
                        else
                        {
                          
                                if (string_data[i] == 'year_structure' && $(".PMS_display_format:checked").val() == 'year_structure_finance') 
                                {
                                    content_array[i] = 'PMS_display_format';
                                    content_value[i] = $("#PMS_display_format1").text();
                                    error = '';
                                }
                                else if (string_data[i] == 'year_structure' && $(".PMS_display_format:checked").val() == 'year_structure_calender')
                                {
                                    content_array[i] = 'PMS_display_format';
                                    content_value[i] = $("#PMS_display_format2").text();
                                    error = '';
                                }                      
                        }
                        
                        
                      
                    }
                    else if (string_data[i] == 'emp_id') 
                    {
                            if ((string_data[i] == 'emp_id') && ($("."+string_data[i]+":checked").val() != 'undefined'))
                            {
                                var emp_id_format = $("."+string_data[i]+":checked").val();
                                if ($("."+string_data[i]+":checked").val() == 'emp_id-Automatic') 
                                {
                                    content_array[i] = 'emp_id-Automatic';
                                    //alert($('.emp_id-Automatic1').val());
                                     
                                    if(!str_validate.test($('.emp_id-Automatic1').val()))
                                    {
                                        error = 'Please enter prefix for employee ID.';
                                    } 
                                    else if(!str_validate.test($('.emp_id-Automatic2').val()))
                                    {
                                        error = 'Please enter postfix for employee ID.';
                                    }
                                    else
                                    {
                                        if(str_validate.test($('.emp_id-Automatic1').val()))
                                        {
                                            content_value[i] = 'prefix_emp_id-'+$('.emp_id-Automatic1').val()+';'+'postfix_emp_id-'+$('.emp_id-Automatic2').val();
                                                error = '';                                            
                                        }                                        
                                      
                                    }
                                } 
                                else if($("."+string_data[i]+":checked").val() == 'emp_id-Manual')
                                {
                                    content_array[i] = 'emp_id-Manual';
                                    content_value[i] = '';
                                    error = '';
                                }
                                else if($("."+string_data[i]+":checked").val() === undefined)
                                {
                                    error = 'Please select employee ID type.';
                                }                          
                            }
                            else
                            {
                                error = 'Please select employee ID.';
                            }
                           
                            
                    }
                    else if(string_data[i] == 'emp_atd_code')
                    {
                        if ((string_data[i] == 'emp_atd_code') && ($("."+string_data[i]+":checked").val() != 'undefined'))
                        {
                            if ((string_data[i] == 'emp_atd_code') && ($("."+string_data[i]+":checked").val() == 'emp_atd_code-Automatic')) 
                            {
                                content_array[i] = "emp_atd_code-Automatic";    
                                         
                                if(!str_validate.test($('#emp_atd_code-Automatic1').val()))
                                    {
                                        error = 'Please enter prefix for attendance code.';
                                    } 
                                    else if(!str_validate.test($('#emp_atd_code-Automatic2').val()))
                                    {
                                        error = 'Please enter postfix for attendance code.';
                                    }
                                    else
                                    {
                                        if(str_validate.test($('#emp_atd_code-Automatic1').val()))
                                        {
                                            content_value[i] = 'prefix_emp_atd_code-'+$('#emp_atd_code-Automatic1').val()+';'+'postfix_emp_atd_code-'+$('#emp_atd_code-Automatic2').val();
                                                error = ''; 
                                        }                                       
                                    }

                            }
                            else if ((string_data[i] == 'emp_atd_code') && ($("."+string_data[i]+":checked").val() == 'emp_atd_code-Manual'))
                            {
                                content_array[i] = 'emp_atd_code-Manual';
                                content_value[i] = '';
                                error = '';
                            } 
                            else if($("."+string_data[i]+":checked").val() === undefined)
                            {
                                error = 'Please select attendance code ID type.';
                            } 
                        }
                        else
                        {
                            error = 'Please select attendance code ID.';
                        }
                      
                    }
                    else
                    {
                       
                        if(string_data[i] == 'min_kra_required')
                        {
                            content_array[i] = 'min_kra_required';
                            if ($('#min_kra_required-value').val() !='') 
                            {
                                content_value[i] = $('#min_kra_required-value').val();
                                error = '';
                            }
                            else if($('#min_kra_required-value').val() =='')
                            {
                                error = 'Please enter minimum kra.';
                            } 
                        }
                        if(string_data[i] == 'goal_sub_date')
                        {
                            content_array[i] = 'goal_sub_date';
                            if ($('#goal_set_tab_active-date').val() !='') 
                            {
                                content_value[i] = $('#goal_set_tab_active-date').val();
                                error = '';
                            }
                            else if($('#goal_set_tab_active-date').val() =='')
                            {
                                error = 'Please enter final date To submit goal.';
                            } 
                        }
                        if(string_data[i] == 'mid_goal_set_tab_active-date')
                        {
                            content_array[i] = 'mid_goal_set_tab_active-date';
                            if ($('#mid_goal_set_tab_active-date').val() !='') 
                            {
                                content_value[i] = $('#mid_goal_set_tab_active-date').val();
                                error = '';
                            }
                            else if($('#mid_goal_set_tab_active-date').val() =='')
                            {
                                error = 'Please enter date To submit mid year review.';
                            }                             
                        }
                        if(string_data[i] == 'final_goal_set_tab_active-date')
                        {
                             content_array[i] = 'final_goal_set_tab_active-date';
                            if ($('#final_goal_set_tab_active-date').val() !='') 
                            {
                                content_value[i] = $('#final_goal_set_tab_active-date').val();
                                error = '';
                            }
                            else if($('#final_goal_set_tab_active-date').val() =='')
                            {
                                error = 'Please enter date To submit final year review.';
                            } 
                        }
                        if(string_data[i] != 'min_kra_required' && string_data[i] != 'goal_sub_date' && string_data[i] != 'mid_goal_set_tab_active-date' && string_data[i] != 'final_goal_set_tab_active-date')
                        {
                            content_array[i] = string_data[i];
                            content_value[i] = 1;
                        }
                        
                    }
                }
               
            }
            var data = {
                'content_value':content_value,
            }
            $("#err").removeClass("alert-success"); 
            $("#err").removeClass("alert-danger"); 
            $(window).scroll(function()
            {
                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
             });
            //{content_array:content_array,content_value:content_value},
           if (error == '') 
            {
               //alert(string_data);
                var base_url = window.location.origin;
                $.ajax({
                   type: "POST",
                   data: {content_value:content_value,content_array:content_array},
                   url: base_url+'/index.php?r=Settings/set_setting',
                   success: function(data){
                     $("#err").show();  
                        $("#err").fadeOut(6000);
                        $("#err").text("Settings saved");
                        $("#err").addClass("alert-success");
                   }
                });
            }
            else
            {
                //alert(string_data);
                $("#err").show();  
                $("#err").fadeOut(6000);
                $("#err").text(error);
                $("#err").addClass("alert-danger");
            }
        });
    });
</script>
<style type="text/css">
    li
    {
        list-style-type: none;
    }
</style>
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
.text_style
{
color : #005F68;
text-decoration : underline;
font-weight : bold
}
.text_style1
{
color : #005F68;
text-decoration : underline;
}
      
   </style>
<label id='emp_id_list' style="display: none"></label>
<label id="PMS_display_format1"><?php echo date('Y').'-'.date('Y', strtotime('+1 year')); ?></label>
<label id="PMS_display_format2"><?php echo date('Y'); ?></label>
 <div class="portlet box bg-blue-ebonyclay border-blue-ebonyclay" style='border: 1px solid rgb(3, 31, 78);'>
                                            <div class="portlet-title" style="background-color: rgb(3, 31, 78);">
                                                <div class="caption">
                                                    Settings</div>                                                
                                            </div>
                                            <div class="portlet-body">
                                            <div id="err" style="display:none"></div>
                                                <div class="table-responsive">   
                                                <button type="button" class="btn" id="save_settings" style="float: right;border: 1px solid rgb(3, 31, 78);">Save changes</button>
                                                    <ul id="tree">
                                                    <li><i class="fa fa-angle-right closed_arrow" style="font-size:24px"></i><i class="fa fa-angle-down openarrow" style="font-size:24px;display: none"></i>
                                                    <label style="cursor: pointer;" class="text_style">
                                                    <input name="reg_form" type="checkbox" value="main_menu" style="display: none"/>
                                                    Employee Registration Form</label>
                                                            <ul class="new" id="reg_form" style="display: none;">
                                                            <li>
                                                                <label  style="cursor: pointer;" class="text_style">
                                                                <input  name="reg_form_emp_id" type="checkbox" value="emp_id" style="display: none"/>
                                                                Employee Id</label>
                                                                <ul class="new" id="reg_form_emp_id" style="display: none;">
                                                                    <li>
                                                                        <label>
                                                                        <input class="emp_id" name="emp_id_type" type="radio" value="emp_id-Automatic"/>
                                                                        Automatic</label>
                                                                        <ul>
                                                                            <li>
                                                                                <label>        
                                                                                Prefix For ID :  <input class="form-control emp_id-Automatic1"  type="text" /></label>
                                                                            </li>
                                                                            <li>
                                                                                <label>        
                                                                                Postfix For ID :  <input class="form-control emp_id-Automatic2" type="text" /></label>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                     <li>
                                                                        <label>
                                                                        <input class="emp_id" name="emp_id_type" type="radio" value="emp_id-Manual"/>
                                                                        Manual</label>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <label style="cursor: pointer;" class="text_style">
                                                                <input name="emp_atd_code" type="checkbox" value="emp_atd_code" style="display: none"/>
                                                                Employee Attendance</label>
                                                                 <ul class="new" id="emp_atd_code" style="display: none;">
                                                                    <li>
                                                                        <label>
                                                                        <input class='emp_atd_code' name="emp_atd_code_type" type="radio" value="emp_atd_code-Automatic"/>
                                                                        Automatic</label>
                                                                        <ul class="new" id="emp_atd_code_type">
                                                                            <li>
                                                                                <label>        
                                                                                Prefix For ID :  <input  class="form-control" name="sublevel-2-1" type="text" id="emp_atd_code-Automatic1"/></label>
                                                                            </li>
                                                                            <li>
                                                                                <label>        
                                                                                Postfix For ID :  <input  class="form-control" name="sublevel-2-1" type="text" id="emp_atd_code-Automatic2"/></label>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                     <li>
                                                                        <label>
                                                                        <input  class='emp_atd_code' name="emp_atd_code_type" type="radio" value="emp_atd_code-Manual"/>
                                                                        Manual</label>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                <input  name="default_nationality" type="checkbox" value="emp_nationality_indian"/>
                                                                Set nationality to default India</label>
                                                            </li>                                                            
                                                            <li>
                                                                <label>
                                                                <input id="blood_grp" name="enable_blood_grp" type="checkbox" value="emp_blood_grp"/>
                                                                Enable Blood Group field in Registration</label>
                                                            </li>
                                                            <li>
                                                                <label style="cursor: pointer;" class="text_style">
                                                                <input name="emp_reg_notifications" type="checkbox"  style="display: none"/>
                                                                Notifications</label>
                                                                    <ul class="new" id="emp_reg_notifications" style="display: none;">
                                                                        <li>
                                                                        <label>
                                                                        <input name="reg_mail_to_official_id" type="checkbox" value="reg_notify_official_id"/>
                                                                        After Registration Send mail to employee on official ID</label>
                                                                        </li>
                                                                        <li>
                                                                        <label>
                                                                        <input name="reg_mail_to_personal_id" type="checkbox"  value="reg_notify_personal_id"/>
                                                                        After Registration Send mail to employee on personal ID</label>        
                                                                        </li>
                                                                    </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><i class="fa fa-angle-right closed_arrow" style="font-size:24px"></i><i class="fa fa-angle-down openarrow" style="font-size:24px;display: none"></i>
                                                    <label style="cursor: pointer;" class="text_style">
                                                    <input name="kra_setting" type="checkbox"  value="main_menu"  style="display: none"/>
                                                    KRA Setting</label>
                                                        <ul class="new" id="kra_setting" style="display: none;">
                                                            <li>
                                                                <label>
                                                                <input name="reporting_structure" type="checkbox"  value="kra_reporting_structure"/>
                                                                Reporting Structure for PMS</label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                <input name="minimum_kra" type="checkbox" value="min_kra_required" />
                                                                Minimum KRA Required</label>
                                                                <ul style="display: none;">
                                                                    <li>
                                                                        <label><input  class="form-control" name="sublevel-2-1" type="text" id="min_kra_required-value"/></label>
                                                                    </li> 
                                                                </ul>
                                                            </li>
                                                            <!-- <li>
                                                                <label>
                                                                <input id="sublevel-2-1" name="sublevel-2-1" type="checkbox" value="max_kra_required"/>
                                                                Maximum KRA Required</label>
                                                                <ul class="new" id="ul_drop">
                                                                    <li>
                                                                        <label><input id="sublevel-2-1" class="form-control" name="sublevel-2-1" type="text" value="max_kra_required-value"/></label>
                                                                    </li> 
                                                                </ul>
                                                            </li>  
                                                            <li>
                                                                <label>
                                                                <input id="sublevel-2-1" name="sublevel-2-1" type="checkbox" value="kra_sub_final_date"/>
                                                                KRA Submmission final date</label>
                                                                <ul class="new" id="ul_drop">
                                                                    <li>
                                                                        <label><input id="sublevel-2-1" class="form-control date_select" name="sublevel-2-1" type="text" value="kra_sub_final_date-value"/></label>
                                                                    </li> 
                                                                </ul>
                                                            </li>     -->                                             
                                                            <li>
                                                                <label style="cursor: pointer;" class="text_style">
                                                                <input name="kra_notifications" type="checkbox" style="display: none"/>
                                                                Notifications</label>
                                                                    <ul class="new" id="kra_notifications" style="display: none;">
                                                                        <li>
                                                                        <label>
                                                                        <input name="kra_sub_admin_notify" type="checkbox" value="kra_sub_final_notification-admin"/>
                                                                        KRA Submission notification to admin</label>
                                                                        </li>
                                                                        <li>
                                                                        <label>
                                                                        <input name="kra_sub_emp_notify" type="checkbox" value="kra_sub_final_notification-emp"/>
                                                                        KRA Submission notification to employee</label>
                                                                        </li>
                                                                        <li>
                                                                        <label>
                                                                        <input name="kra_sub_apr_notify" type="checkbox" value="kra_sub_final_notification-appraiser"/>
                                                                         KRA Submission notification to appraiser of employee</label>        
                                                                        </li>
                                                                    </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><i class="fa fa-angle-right closed_arrow" style="font-size:24px"></i><i class="fa fa-angle-down openarrow" style="font-size:24px;display: none"></i>
                                                    <label style="cursor: pointer;" class="text_style">
                                                    <input name="goal_setting" type="checkbox"  value="main_menu"  style="display: none"/>
                                                    Goal Setting</label>
                                                        <ul class="new" id="goal_setting" style="display: none;">                                                            
                                                            <li>
                                                            <label>
                                                                <input name="goal_set_tab_active" type="checkbox" value="goal_set_tab_active"/>
                                                                Set active goalset tab for employee</label>                   
                                                            </li>
                                                            <li>
                                                                <label class="text_style1">
                                                                <input name="sublevel-2-1" type="checkbox" value="goal_sub_date"/>
                                                                Goal Submmission final date</label>
								<ul class="new" style="display: none;width: 262px;">
                                                                    <li>
                                                                       <input name="sublevel-2-1" class="form-control date_select" type="text" id="goal_set_tab_active-date"/>
                                                                    </li>
                                                                </ul>
                                                            </li>   
                                                            <li>
                                                                <label>
                                                                <input name="mid_goal_set_tab_active" type="checkbox" value="mid_goal_set_tab_active"/>
                                                                Set active Mid Year tab for employee</label>
                                                            </li>   
                                                            <li>
                                                                <label class="text_style1">
                                                                <input name="mid_goal_set_tab_active-date" type="checkbox" value="mid_goal_set_tab_active-date"/>
                                                                 Mid Year final date </label>
								<ul class="new" style="display: none;width: 262px;">
                                                                    <li>
                                                                       <input name="sublevel-2-1" class="form-control date_select" type="text" id="mid_goal_set_tab_active-date"/>
                                                                    </li>
                                                                </ul>
                                                            </li>   
                                                            <li>
                                                                <label>
                                                                <input name="final_goal_set_tab_active" type="checkbox" value="final_goal_set_tab_active"/>
                                                                Set active Final Year tab for employee</label>
                                                            </li>   
                                                            <li>
                                                                <label class="text_style1">
                                                                <input name="final_goal_set_tab_active-date" type="checkbox" value="final_goal_set_tab_active-date"/>
                                                                 Final Year final date </label>
								<ul class="new" style="display: none;width: 262px;">
                                                                    <li>
                                                                       <input name="sublevel-2-1" class="form-control date_select" type="text" id="final_goal_set_tab_active-date"/>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
							<li><i class="fa fa-angle-right closed_arrow" style="font-size:24px"></i><i class="fa fa-angle-down openarrow" style="font-size:24px;display: none"></i>
                                                    <label  style="cursor: pointer;" class="text_style">
                                                    <input name="year_structure" type="checkbox"  value="year_structure"  style="display: none"/>
                                                    PMS Year Structure</label>
                                                        <ul class="new" id="year_structure" style="display: none;">
                                                            <li>
                                                                <label>
                                                                        <input class='PMS_display_format' name="emp_atd_code_type" type="radio" value="year_structure_finance"/>
                                                                        Financial Year</label>
                                                            </li> 
                                                            <li>
                                                               <label>
                                                                        <input class='PMS_display_format' name="emp_atd_code_type" type="radio" value="year_structure_calender"/>
                                                                        Calender Year</label>
                                                            </li>                                                            
                                                        </ul>
                                                    </li>
                                                    <!-- <li>
                                                    <label>
                                                    <input name="level-1-0" type="checkbox" />
                                                    Active Tab For </label>
                                                        <ul>                                                            
                                                            <li>
                                                            <label>
                                                                <input id="sublevel-2-1" name="sublevel-2-1" type="checkbox" />
                                                                Admin</label>
                                                                <ul>
                                                                    <li>
                                                                        <label>
                                                                        <input id="sublevel-2-1" name="sublevel-2-1" type="checkbox" />
                                                                        Admin</label>
                                                                    </li>
                                                                </ul>
                                                            <label>
                                                                <input id="sublevel-2-1" name="sublevel-2-1" type="checkbox" />
                                                                User</label>
                                                                <ul>
                                                                    <li>
                                                                        <label>
                                                                        <input id="sublevel-2-1" name="sublevel-2-1" type="checkbox" />
                                                                        Admin</label>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>  -->
                                                    </li>
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
               <!--  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
               <!--  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script> -->
               <script type="text/javascript">
                   $(function(){
                        // $("#setting_changes").click(function(){
                        //         var data = {
                        //             'setting_type' : $('input[name=emp_id]:checked').val(),
                        //             'setting_value' : 'employee_id_format',
                        //         };
                        //         console.log(data);
                        //         var base_url = window.location.origin;  
                        //         $.ajax({
                        //         dataType :'html',
                        //          type :'post',
                        //          data : data,
                        //          url : base_url+'/pmsapp/index.php?r=Settings/setting_update',
                        //          success : function(data) {              
                        //             alert(data);                                
                        //         }
                        //     });
                        // });
                   });
               </script>
                <script type="text/javascript">
                // var click = 0;
                // var j = jQuery.noConflict();
                $(function(){
                    //var emp_id = $('input[name=emp_id]:checked').val();
                    $('input[name=emp_id]').click(function(){
                      if ($('input[name=emp_id]:checked').val() == 'Custom') 
                      {
                            $("#employee_id").show();
                      }
                      else
                      {
                            $("#employee_id").hide();
                      }
                    }); 
                    $("#setting_changes").click(function(){
                        var data = {
                            'setting_type' : $('input[name=emp_id]:checked').val(),
                            'setting_value' : 'employee_id_format',
                        };
                        console.log(data);
                        var base_url = window.location.origin;  
                        $.ajax({
                        dataType :'html',
                         type :'post',
                         data : data,
                         url : base_url+'/pmsapp/index.php?r=Settings/setting_update',
                         success : function(data) {              
                            alert(data);                                 
                        }
                    });
                    });
                    $("#atd_code").click(function(){
                        var data = {
                            'setting_type' : $('input[name=emp_atd_code]:checked').val(),
                            'setting_value' : 'Employee_atd_code',
                        };
                        var base_url = window.location.origin;  
                        $.ajax({
                        dataType :'html',
                         type :'post',
                         data : data,
                         url : base_url+'/pmsapp/index.php?r=Settings/setting_update',
                         success : function(data) {              
                            alert(data);                                  
                        }
                    });
                    });
                    $("#personal_id").click(function(){
                        var data = {
                            'setting_type' : $('input[name=personal_id]:checked').val(),
                            'setting_value' : 'personal_id',
                        };
                        var base_url = window.location.origin;  
                        $.ajax({
                        dataType :'html',
                         type :'post',
                         data : data,
                         url : base_url+'/pmsapp/index.php?r=Settings/setting_update',
                         success : function(data) {              
                            alert(data);                                  
                        }
                    });
                    });
                    $("#kra_value").click(function(){
                        var data = {
                            'setting_type' : $('#kra_num').val(),
                            'setting_value' : 'kra_number',
                        };
                        var base_url = window.location.origin;  
                        $.ajax({
                        dataType :'html',
                         type :'post',
                         data : data,
                         url : base_url+'/pmsapp/index.php?r=Settings/setting_update',
                         success : function(data) {              
                            alert(data);                                 
                        }
                    });
                    });
                });
                // function get_notify(e)
                // {  
                //     click++;                  
                //     var settings = {
                //             theme: 'teal',
                //             horizontalEdge: 'top',
                //             verticalEdge: 'right'
                //         },
                //         $button = $(this);
                    
                //     if ($.trim($('#notific8_heading').val()) != '') {
                //         settings.heading = $.trim($('#notific8_heading').val());
                //     }
                    
                //     if (!settings.sticky) {
                //         settings.life = '10000';
                //     }

                //     j.notific8('zindex', 11500);
                //     j.notific8($.trim(e), settings);
                    
                //     $button.attr('disabled', 'disabled');
                    
                //     setTimeout(function() {
                //         $button.removeAttr('disabled');
                //     }, 1000);
                // }        
            </script>
                <script type="text/javascript">
                var value = 0;
                    // $(function(){
                    //     $("#add_settings").click(function(){
                    //         var checkedValues = $('.md-check:checked').map(function() {
                    //             return this.value;
                    //         }).get();  
                    //         var checkedValues1 = $('.md-check:not(:checked)').map(function() {
                    //             return this.value;
                    //         }).get();                          
                    //         //var checkedValues_values = checkedValues.split(',');
                    //         console.log(checkedValues1);
                    //         for (var i = 0; i < checkedValues.length; i++) {
                    //             var data = checkedValues[i];
                    //             var data_split = data.split('-');
                    //             var content = '';
                    //             content = {
                    //                     'content_name' : data_split[0],
                    //                     'content_value' : data_split[1]
                    //             };
                    //             console.log(content);
                    //             var base_url = window.location.origin;                              
                    //             $.ajax({
                    //             dataType :'html',
                    //              type :'post',
                    //              data : content,
                    //              url : base_url+'/pmsapp/index.php?r=Settingpage/save',
                    //              'success' : function(data) {              
                    //                 if (click == 0) 
                    //                 {
                    //                     $("#sample_1").load(location.href + " #sample_1");
                    //                 }                                    
                    //             }
                    //         });
                    //         }
                    //         for (var i = 0; i < checkedValues1.length; i++) {
                    //             var data = checkedValues1[i];
                    //             var data_split = data.split('-');
                    //             var content = '';
                    //             content = {
                    //                     'content_name' : data_split[0],
                    //                     'content_value' : 0
                    //             };
                    //             console.log(content);
                    //             var base_url = window.location.origin;                              
                    //             $.ajax({
                    //             dataType :'html',
                    //              type :'post',
                    //              data : content,
                    //              url : base_url+'/pmsapp/index.php?r=Settingpage/save',
                    //              'success' : function(data) {              
                    //                 if (click == 0) 
                    //                 {
                    //                    $("#sample_1").load(location.href + " #sample_1");
                    //                 }                                    
                    //             }
                    //         });
                    //         }
                    //         if(value!=0)
                    //         {
                    //             window.location.reload(true);
                    //         }
                    //     });
                    // });
                </script>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
      	</div>
        </div>
        <!-- END CONTAINER -->
              
