
      <label id='emp_dept_name' style="display:none"><?php if(isset($emp_data['0']['Department'])) { echo $emp_data['0']['Department']; } ?></label>
      <label id='emp_dept_name' style="display:none"><?php if(isset($emp_data['0']['Cadre'])) { echo $emp_data['0']['Cadre']; } ?></label>
      <script type="text/javascript">
           $(function(){
            for (var v = 0; v <= 3; v++) {
                    $(".target_value1"+v).removeAttr('id');
                    $(".target_value2"+v).removeAttr('id');
                    $(".target_value3"+v).removeAttr('id');
                    $(".target_value4"+v).removeAttr('id');
                    $(".target_value5"+v).removeAttr('id');
                }
           });
       </script>
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">

                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Goalsheet </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                <style type="text/css">
                .ui-datepicker-title
                {
                    color:#1C94C4;
                }
                </style>
                <style media="all" type="text/css">      
      #err { 
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
    <style type="text/css">
                .popover{
   min-width:30px;
  
   max-width:400px;
   overflow-wrap:break-word;
   border:1px solid #4c87b9;
   
}
            </style>

 <style type="text/css">
       
       table.mid-table td { border:1px solid red; height:55px;min-height: 55px;max-height: 55px }
       table.mid-table th { border:1px solid red; height:55px;min-height: 55px;max-height: 55px }
       </style>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>   


    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 

<script>
$(document).ready(function(){
//alert("hi");
    $('[data-toggle="popover"]').popover();
});
</script> 
<script type="text/javascript">
    $(function(){
       setInterval(save_idp_data,3000);  
    });
</script>
<script>
function save_idp_data()
{
	var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;var chk_compl = 0;var chk_compl1 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                    var prgrm_cmd = ''; var chk = /[;]/; var topic = '';var date_value = '';var faculty_value = '';var development_data = '';var number_of_meetings = '';var faculty_value1 = '';
                    for (var i = 0; i < $("#total_prog").text(); i++) {                  
                        
                        if (!($("#program_cmd-"+i).val() === undefined || $("#program_cmd-"+i).val() == '' || chk.test($("#program_cmd-"+i).val())))
                        {
                            if (prgrm_cmd == '') 
                            {
                                prgrm_cmd = i+'?'+$("#program_cmd-"+i).val();
                            }
                            else
                            {
                                prgrm_cmd = prgrm_cmd+';'+i+'?'+$("#program_cmd-"+i).val();
                            }
                           
                        }                
                    }
                    for (var i = 1; i <= 2; i++) {
                       if (topic == '') 
                            {
                                topic = $(".topic"+i).val();
                                date_value = $("#days_required"+i).val();
                                faculty_value = $("#faculty_email_id"+i).find(":selected").val();
                            }
                            else
                            {
                                topic = topic+';'+$(".topic"+i).val();
                                date_value = date_value+';'+$("#days_required"+i).val();
                                faculty_value = faculty_value+';'+$("#faculty_email_id"+i).find(":selected").val();
                            }
                    }
                    for (var i = 3; i <= 4; i++) {
                       if (development_data == '') 
                            {
                                development_data = $("#target_date"+i).val();
                                number_of_meetings = $("#number_of_meetings"+i).val();
                                faculty_value1 = $("#faculty_email_id"+i).val();
                            }
                            else
                            {
                                development_data = development_data+';'+$("#target_date"+i).val();
                                number_of_meetings = number_of_meetings+';'+$("#number_of_meetings"+i).val();
                                faculty_value1 = faculty_value1+';'+$("#faculty_email_id"+i).val();
                            }
                    }
                    
   str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                            str1 = $("#emp_code").text().replace(/\s+/g, '');
                            var base_url = window.location.origin;
                             var detail_data = {
                                prgrm_cmd: prgrm_cmd,
                                topic: topic,
                                date_value: date_value,
                                faculty_value: faculty_value,
                                development_data: development_data,
                                number_of_meetings: number_of_meetings,
                                faculty_value1: faculty_value1,
                                project_title: $("#project_title1").val(),
                                review_date: $("#review_date").val(),
                                target_end_date: $("#target_end_date").val(),
                                project_scope: $("#project_scope").val(),
                                project_exclusion: $("#project_exclusion").val(),
                                Project_deliverables: $(".project_deliverables").val(),
                                learn_from_project: $(".learn_from").val(),
                                Reviewer: $(".reviewvers_name").val(),
                                emp_code : str1,
                                Reporting_officer1_id: str
                            };

                   			str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                            str1 = $("#emp_code").text().replace(/\s+/g, '');
                            var base_url = window.location.origin;
                             var detail_data = {
                                prgrm_cmd: prgrm_cmd,
                                topic: topic,
                                date_value: date_value,
                                faculty_value: faculty_value,
                                development_data: development_data,
                                number_of_meetings: number_of_meetings,
                                faculty_value1: faculty_value1,
                                project_title: $("#project_title1").val(),
                                review_date: $("#review_date").val(),
                                target_end_date: $("#target_end_date").val(),
                                project_scope: $("#project_scope").val(),
                                project_exclusion: $("#project_exclusion").val(),
                                Project_deliverables: $(".project_deliverables").val(),
                                learn_from_project: $(".learn_from").val(),
                                Reviewer: $(".reviewvers_name").val(),
                                emp_code : str1,
                                Reporting_officer1_id: str
                            };

                            $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : detail_data,
                                'url' : base_url+'/index.php?r=IDP/save_data1',
                                success : function(data)
                                {
                                   //alert(data);
                                }
                            });
}
</script>       
            <script type="text/javascript">
            var error = '';
         var j = jQuery.noConflict();
                j(function(){   
                j(".date_pickup").datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
        j(".date_pickup").attr('onkeydown','return false');  
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger");               
                    $("body").on('click','.del_kpi',function(){
                        j("#del_goal").modal('show');
                        var id = $(this).attr('id');
                        var id_value = id.split('-');                        
                        var data = {
                        'KPI_id' : id_value[1],
                        };
                        var base_url = window.location.origin;
                        $("#del_goal_set").click(function(){
                             $.ajax({                            
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Setgoals1/kpi_del',
                            success : function(data)
                            {
                                $(".count_goal").text(data);
                                if(data != '')
                                {
                                    $("#output_div_"+id_value[1]).fadeOut(1000);
                                   $("output_div_"+id_value[1]).load(location.href + " .output_div"); 
                                   location.reload();
                                }

                            }
                        });
                        });                       
                    }); 
                    if ($("#edit_flag_set").text() == 1) 
                    {
                        setInterval(kpi_update_data,3000);
                    } 
                    else
                    {
                        setInterval(kpi_save_data_new,3000);                        
                    }          
                });
            </script>
            <script type="text/javascript">
               $(function(){

$("body").on('mouseover','.validate_field',function(){
if($(this).val() == '')
{
$(this).popover('hide');
}
$(this).attr('data-content',$(this).val());
 $(this).popover('show');
});
$("body").on('mousedown','.validate_field',function(){
if($(this).val() == '')
{
$(this).popover('hide');
}
$(this).attr('data-content',$(this).val());
 $(this).popover('hide');
});
$("body").on('focusout','.validate_field',function(){
if($(this).val() == '')
{
$(this).popover('hide');
}
$(this).attr('data-content',$(this).val());
 $(this).popover('hide');
});
$("body").on('focusin','.validate_field',function(){
if($(this).val() == '')
{
$(this).popover('hide');
}
else
{
$(this).attr('data-content',$(this).val());
$(this).attr('data-placement','bottom');
$(this).popover('show');
}


});
$("body").on('mouseover','.validate_field1',function(){
if($(this).val() == '')
{
$(this).popover('hide');
//alert("hi");
}
$(this).attr('data-content',$(this).val());
 $(this).popover('show');
});
$("body").on('mousedown','.validate_field1',function(){
if($(this).val() == '')
{
$(this).popover('hide');
}
$(this).attr('data-content',$(this).val());
 $(this).popover('hide');
});
$("body").on('focusout','.validate_field1',function(){
if($(this).val() == '')
{
$(this).popover('hide');
}
$(this).attr('data-content',$(this).val());
 $(this).popover('hide');
});
$("body").on('focusin','.validate_field1',function(){
if($(this).val() == '')
{
$(this).popover('hide');
}
else
{
$(this).attr('data-content',$(this).val());
$(this).attr('data-placement','bottom');
$(this).popover('show');
}


});
$("body").on('scroll','.validate_field',function(){
 $(this).popover('hide');
});
                    $("body").on('keyup','.validate_field',function(){

                        if ($(this).attr('id') === undefined) 
                        {
                             var id = $(this).attr('id');
                            var class_name = $(this).attr('class');
                            var class_value = class_name.split(' ');
                           var last_id_value = class_value[3].substr(class_value[3].length - 1);
                            var string1 = /^([0-9])([.]{1})([0-9])*$/;
                            var ratio_chk1 = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                            var chk = /[;-]/;
                            if($("#mask_number-"+last_id_value).find(':selected').val() == 'Text')
                                {

                                    if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Text' && chk.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI with unit Text should not contain special characters like '-;'.");
                                    }
                                    else if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Text' && $(this).val().length>2000) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI Text unit should contain maximum 2000 characters.");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }
                                else if($("#mask_number-"+last_id_value).find(':selected').val() == 'Ratio')
                                {
                                    if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Ratio' && !ratio_chk1.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please enter valid value in ratio field");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }
                                else if ($("#mask_number-"+last_id_value).find(':selected').val() != 'Text' && $(this).val() != '' && !$.isNumeric($(this).val())) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Only numbers are allowed");
                                }
                                else
                                {
                                     $("#err").css('display','none');
                                    $(this).css('border','1px solid #999');
                                }
                        }
                        else
                        {
                            var id = $(this).attr('id');
                        var id_value = id.split('-');
                        var id_value_text = id_value[0].split('_');
                         if(id_value_text[0] == 'kpilistyii')
                        { 
                           var string1 = /[;]/;
                            if (string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("KPI description should not contain special character ';'");
                            }
                            else if($(this).val().length>1000)
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("KPI description should contain only 1000 characters");
                            }
                            else if(!string1.test($(this).val()))
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }                        
                       else if(id_value_text[0] == 'kpi')
                        { 
                            var string1 = /^([0-9])*$/;
                            if ($(this).val() != '' && !$.isNumeric($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("KPI Weightage should contain only numbers.");
                            }
                            else if($(this).val() == '' || $.isNumeric($(this).val()))
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }                        
                        else if(id_value_text[0] == 'unit')
                        {
                            var string1 = /^([0-9])*$/;
                                if(id_value[0] == 'unit_value')
                                {
                                    if ($("#mask_number-"+id_value[1]).find(':selected').val() == 'Select' && $(this).val() !='') 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please Select Unit type first.");
                                    } 
                                    else if (($("#mask_number-"+id_value[1]).find(':selected').val() == 'Units' || $("#mask_number-"+id_value[1]).find(':selected').val() == 'Weight' || $("#mask_number-"+id_value[1]).find(':selected').val() == 'Value') && !$.isNumeric($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI Unit value should contain only numbers.");
                                    }
                                    else if ($(this).val() !='' && ($(this).val() == 0 || $(this).val().length>6)) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Minimum 1 and maximum 6 digits are allowed.");
                                    }
                                    else if ($("#mask_number-"+id_value[1]).find(':selected').val() != 'Text' && $(this).val() != '' && !$.isNumeric($(this).val()))
                                    {
                                        $("#err").css('display','none');
                                        $("#error_value").text("");
                                        $(this).css('border','1px solid #999');
                                    }  
                else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }                               
                                }                            
                                else if($.isNumeric($(this).val()))
                                {
                                    $("#err").css('display','none');
                                    $(this).css('border','1px solid #999');
                                }
                            }
                            else if(id_value_text[0] == '')
                            { 

                                var class_name = $(this).attr('class');
                                var class_value = class_name.split(' ');var chk = /[;-]/;
                                var last_id_value = class_value[4].substr(class_value[4].length - 1);
                                var string1 = /^([0-9])([.]{1})([0-9])*$/;
                                var ratio_chk1 = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                                if($("#mask_number-"+last_id_value).find(':selected').val() == 'Text')
                                {
                                    if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Text' && chk.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI with unit Text should not contain special characters like '-;'.");
                                    }
                                    else if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Text' && $(this).val().length>2000) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI Text unit should contain maximum 2000 characters.");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }
                                else if($("#mask_number-"+last_id_value).find(':selected').val() == 'Ratio')
                                {
                                    if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Ratio' && !ratio_chk1.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please enter valid value in ratio field");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }
                                else if ($("#mask_number-"+last_id_value).find(':selected').val() != 'Text' && $(this).val() != '' && !$.isNumeric($(this).val())) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Only numbers are allowed");
                                }
                                else
                                {
                                     $("#err").css('display','none');
                                    $(this).css('border','1px solid #999');
                                }
                            }
                        }
                        
                        
                    });
                });
            </script>
            <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
            <script type="text/javascript">  
              var $j = jQuery.noConflict();
                $(function(){     
                $(window).scroll(function()
                {
                    $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                });               
                    $('body').on('keyup','.value_field',function(e){
                                    var id = $(this).prop('id');
                                    var id_value = id.split('-');
                                    var selected_unit = $('#mask_number-'+id_value[1]).find(':selected').val();

                                        var selected_unit1 = {
                                            unit_type : selected_unit,
                                            'unit_value' : $(this).val(),
                                        };
                                       console.log(selected_unit1);
                                        var base_url = window.location.origin;
                                        var data_value = $(this).val();
                                        var str = /^([0-9]{1,})$/;
                                        if ($.isNumeric(data_value)) {
                                           $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : selected_unit1,
                                            url : base_url+'/index.php?r=Setgoals1/fetch_field',
                                            success : function(data)
                                            {
                                                var res = data.split(","); 
                                                $(".target_value1"+id_value[1]).val(res[0]);
                                                $(".target_value2"+id_value[1]).val(res[1]);
                                                $(".target_value3"+id_value[1]).val(res[2]);
                                                $(".target_value4"+id_value[1]).val(res[3]);
                                                $(".target_value5"+id_value[1]).val(res[4]);
                                            }
                                            });
                                        }
                                        
                                });
                                $('body').on('keypress','.kpi_list',function(event){
                                            //alert($(this).val());                                            
                                            var kpi_value = $(this).val();
                                            var kpi_value = {
                                                kpi_value : $(this).val(),
                                                emp_dept_name : $("#emp_dept_name").text(),
                                            };
                                            var id = $(this).attr('id');
                                            var num = id.split('_');
                                            
                                            var base_url = window.location.origin;
                                            //alert(num);
                                            $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : kpi_value,
                                            url : base_url+'/index.php?r=Setgoals1/kpi_list',
                                            success : function(data)
                                            {
                                                if (data != '') 
                                                {
                                                     $("#kpi_list_drop_"+num[1]).show();
                                                    $("#kpi_list_drop_"+num[1]).html(data);
                                                }
                                               // alert(event.which);
                                                $(".listdata").click(function(){
                                                    var list_id = $(this).text();
                                                    //alert(list_id);                                                    
                                                    $("#kpilist_"+num[1]).val(list_id);
                                                    $("#kpilistyii_"+num[1]).val(list_id);
                                                    // $("#kpilistyii_"+num[1]).css('display','none');
                                                    // $("#kpilist_"+num[1]).css('display','show');
                                                      $('body').click(function(){
                                                        $("#kpi_list_drop_"+num[1]).hide();
                                                    });                                                     
                                                });
                                                $('body').click(function(){
                                                    $("#kpi_list_drop_"+num[1]).hide();
                                                });
                                                if (event.which == 0) 
                                                {
                                                    $("#kpi_list_drop_"+num[1]).hide();
                                                }
                                            }
                                        });
                                        });
                                var base_url = window.location.origin;
                                $('body').on('change','.format_detail',function(){
                                    var value = $(this).val();
                                     var id = $(this).prop('id');
                                     var id_value = id.split('-');
                                    for (var v = 0; v <= 3; v++) {
                                        // $j(".target_value1"+v).removeAttr('id');
                                        // $j(".target_value2"+v).removeAttr('id');
                                        // $j(".target_value3"+v).removeAttr('id');
                                        // $j(".target_value4"+v).removeAttr('id');
                                        // $j(".target_value5"+v).removeAttr('id');
                                    }
                                    var selected_unit = $('#mask_number-'+id_value[1]).find(':selected').val();
                                    $("#unit_value-"+id_value[1]).val('');
                                    $(".target_value1"+id_value[1]).val('');
                                    $(".target_value2"+id_value[1]).val('');
                                    $(".target_value3"+id_value[1]).val('');
                                    $(".target_value4"+id_value[1]).val('');
                                    $(".target_value5"+id_value[1]).val('');

                                    $(".target_value1"+id_value[1]).removeAttr('onkeydown');
                                    $(".target_value2"+id_value[1]).removeAttr('onkeydown');
                                    $(".target_value3"+id_value[1]).removeAttr('onkeydown');
                                    $(".target_value4"+id_value[1]).removeAttr('onkeydown');
                                    $(".target_value5"+id_value[1]).removeAttr('onkeydown');
               $j("#unit_value-"+id_value[1]).css("border","1px solid rgb(153, 153, 153)");      
                                        $j(".target_value1"+id_value[1]).css("border","1px solid rgb(153, 153, 153)"); 
                                        $j(".target_value2"+id_value[1]).css("border","1px solid rgb(153, 153, 153)"); 
                                        $j(".target_value3"+id_value[1]).css("border","1px solid rgb(153, 153, 153)"); 
                                        $j(".target_value4"+id_value[1]).css("border","1px solid rgb(153, 153, 153)"); 
                                        $j(".target_value5"+id_value[1]).css("border","1px solid rgb(153, 153, 153)"); 
                if(selected_unit == 'Units' || selected_unit == 'Weight' || selected_unit == 'Value')
                                    {

                                        $(".target_value1"+id_value[1]).attr('disabled','true');
                                        $(".target_value2"+id_value[1]).attr('disabled','true');
                                        $(".target_value3"+id_value[1]).attr('disabled','true');
                                        $(".target_value4"+id_value[1]).attr('disabled','true');
                                        $(".target_value5"+id_value[1]).attr('disabled','true');
                                        $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                        $("#unit_value-"+id_value[1]).removeAttr('readonly');
                                        $(".target_value1"+id_value[1]).css('background-color','');
                                        $(".target_value2"+id_value[1]).css('background-color','');
                                        $(".target_value3"+id_value[1]).css('background-color','');
                                        $(".target_value4"+id_value[1]).css('background-color','');
                                        $(".target_value5"+id_value[1]).css('background-color','');
                                       
                                        $j("#unit_value-"+id_value[1]).datepicker("destroy");      
                                        $j(".target_value1"+id_value[1]).datepicker("destroy");
                                        $j(".target_value2"+id_value[1]).datepicker("destroy");
                                        $j(".target_value3"+id_value[1]).datepicker("destroy");
                                        $j(".target_value4"+id_value[1]).datepicker("destroy");
                                        $j(".target_value5"+id_value[1]).datepicker("destroy");
                                       
                                    }
                                    else
                                    {
                                       if (selected_unit == 'Date') 
                                        {
                                            $("#unit_value-"+id_value[1]).attr('readonly','readonly');
                                             $(".target_value1"+id_value[1]).removeAttr('disabled');
                                            $(".target_value2"+id_value[1]).removeAttr('disabled');
                                            $(".target_value3"+id_value[1]).removeAttr('disabled');
                                            $(".target_value4"+id_value[1]).removeAttr('disabled');
                                            $(".target_value5"+id_value[1]).removeAttr('disabled');
                                            $(".target_value1"+id_value[1]).attr('onkeydown','return false');
                                            $(".target_value2"+id_value[1]).attr('onkeydown','return false');
                                            $(".target_value3"+id_value[1]).attr('onkeydown','return false');
                                            $(".target_value4"+id_value[1]).attr('onkeydown','return false');
                                            $(".target_value5"+id_value[1]).attr('onkeydown','return false');
                                            // maskuse =  "99/99/9999";
                                            // $(".target_value1"+id_value[1]).inputmask("99/99/9999", { "mask": maskuse });
                                          $j(".target_value1"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value2"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value3"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value4"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value5"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                                                                       
                                           
                                            //$(".target_value1"+id_value[1]).addClass('input_custom_date');
                                            //$('.input_custom_date').css('display','block');
                                            $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                           
                                        }
                                        else if(selected_unit == 'Percentage' || selected_unit == 'Ratio' || selected_unit == 'Days' || selected_unit == 'Text')
                                        {
                                             $("#unit_value-"+id_value[1]).attr('readonly','readonly');
                                           
                                            $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                            $(".target_value1"+id_value[1]).removeClass('input_custom_date');
                                            $(".target_value1"+id_value[1]).removeAttr('disabled');
                                            $(".target_value2"+id_value[1]).removeAttr('disabled');
                                            $(".target_value3"+id_value[1]).removeAttr('disabled');
                                            $(".target_value4"+id_value[1]).removeAttr('disabled');
                                            $(".target_value5"+id_value[1]).removeAttr('disabled');
                                            $j("#unit_value-"+id_value[1]).datepicker("destroy");      
                                            $j(".target_value1"+id_value[1]).datepicker("destroy");
                                            $j(".target_value2"+id_value[1]).datepicker("destroy");
                                            $j(".target_value3"+id_value[1]).datepicker("destroy");
                                            $j(".target_value4"+id_value[1]).datepicker("destroy");
                                            $j(".target_value5"+id_value[1]).datepicker("destroy");
                                            $(".fields").keyup(function(){
                                                var data_value = $(this).val();
                                                var str = /^([0-9/]{1,})$/;
                                                // if ((data_value.length>0) && !str.test(data_value)) {
                                                //     $("#validation_msg").css('display','block');
                                                // }
                                                // else
                                                // {
                                                //     $("#validation_msg").css('display','none');
                                                // }
                                            });
                                        }                                      

                                    }  
                                });
                });                           
                       
            </script>
            <div class="container-fluid">
                <div class="page-content">
                 <div id="get_goal_list">
                    <div class="alert alert-danger fade in" id="err" style="display: none">
                        <!-- <a href="#" class="close" data-dismiss="alert">&times;</a>      -->
                        <lable id="error_value"> A problem has been occurred while submitting your data.</lable>
                    </div>
                                               
                    </div> 
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                       
                    </div>   
                      <lable id="prg_cnt" style="display:none"><?php if(isset($prg_cnt)) { echo $prg_cnt; } ?> </lable>
<div id="static_prg" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> <i class="fa fa-check" style="color:green"></i> Goalsheet submitted </p>
                                    <p> <i class="fa fa-times" style="color:red"></i> IDP submitted </p>
                                </div>
                                <div class="modal-footer">
                                   <a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php?r=IDP"> <button type="button"  class="btn dark btn-outline">OK</button>
                                    </a>
                                </div>
                            </div>
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
                                    <p> Are you sure you want to send goalsheet & IDP to appraiser? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn border-blue-soft" id="continue_goal_set">Submit Goalsheet</button>
                                </div>
                            </div>
                        </div>
                    </div>
                             <div id="del_goal" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Delete KRA</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to delete this KRA? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn border-blue-soft" id="del_goal_set">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">

                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="note note-success popupbox" style="display: none">
                                    <p class="popupmsg"></p>
                                </div>
<lable id="gaolsheet_type" style="display:none"><?php if(isset($emp_data['0']['new_kra_create']) && $emp_data['0']['new_kra_create'] == "on") { echo '1'; }else{ echo '0'; } ?></lable>
                                <div class="mt-bootstrap-tables" style="display: block">
<?php
if(isset($emp_data['0']['new_kra_create']) && $emp_data['0']['new_kra_create'] == "on") {
?>
<lable id="new_apr" style="display:none"><?php if(isset($emp_data['0']['new_kra_till_date']) && $emp_data['0']['new_kra_till_date'] != "") { echo $emp_data['0']['new_kra_till_date']; }else { echo Yii::app()->user->getState("appriaser_1"); } ?></lable>
<?php
}
?>
                                    <div class="row">
                                     <?php 
                                        $form=$this->beginWidget('CActiveForm', array(
                                       'id'=>'user-form',
                                        'enableClientValidation'=>true,
                                        'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                        //'action' => $this->createUrl('Setgoals1/save_kpi'),                                        
                                    ));
                                    ?>
                                    <div class="col-md-5">
                                        <!--<label class="control-label">Number Of KRA &nbsp;</label>
                                        <div class="btn-group">
                                        <?php echo CHtml::textField('No_of_KPI','',array('class'=>'form-control','id'=>'kra_num')); ?>
                                    </div> -->
                                   <!-- <?php echo CHtml::button('Create',array('id'=>'mybtn','class'=>'btn green','onclick'=>'js:get_kra_list();')); ?> -->
                                    
                                </div> 
                                <script type="text/javascript">
                                function get_kra_list()
                                {
                                    var number_of_kra = {
                                        number_of_kra : $("#kra_num").val(),
                                    }
                                    var base_url = window.location.origin;
                                    if ($("#kra_num").val()>5)
                                    {
                                        $(".popupmsg").text("Maximum 5 KRA's are allowed!!!");
                                        $(".popupbox").show();
                                        $(".popupbox").fadeOut(5000);
                                    }
                                    else
                                    {
                                        $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : number_of_kra,
                                            url : base_url+'/index.php?r=Newemployee/getlist',
                                            success : function(data)
                                            {
                                                $("#get_goal_list").html(data);
                                            }
                                        });
                                    }                                   
                                }
                                </script>

                                <div class="portlet box border-blue-soft bg-blue-soft">
                                <div class="portlet-title">
                                                                 
                                    <div class="caption">
                                        Set Goalsheet</div>
                                </div>                                     
                                <div class="portlet-body" style="border: 1px solid rgb(76, 135, 185);">
                                    <div class="row table-responsive" style="margin-top: -15px;">
                                         <div class="form-group col-xs-3">
                                                        <label>Select Year</label>
                                                        <select class="form-control " name="financial_year" id="financial_year">
                                                            <option>2016-2017</option>
                                                            <option>2017-2018</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function(){
var goal_year=$("#financial_year option:selected").text();
//alert(goal_year);
}); 
                                      </script>
                                      <script>
                                          $("#financial_year").change(function() {
           var goal_year=$("#financial_year option:selected").text();
//alert(goal_year);
});
                                      </script>
                                    <label id="edit_flag_set" style="display: none"><?php if(isset($edit_flag)) { echo $edit_flag; }?></label>
                                        <table id="kpi_table" class="table table-striped table-bordered table-hover" style="background-color: #EEF1F5;">
                                                    <tr>
                                                            <td>
                                                                KRA Category
                                                             </td>
                                                             <td colspan= 7 align="center" style="float: left;">                                                         
                                                            <?php
                                                            
                                                             if (isset($kra_list) && count($kra_list)>0) {
                                                                
                                                                $list_data = '';
                                                                $models = new KRAStructureForm();
                                                                 $models1 = $models->findAll();
                                                                $list = CHtml::listData($models1,'KRA_category', 'KRA_category');
                                                             }
                                                            $kpi_category = '';$kpi_desc = '';$wtg = '';$kpi_count = '';$target_value1 = '';$target_unit = '';$kpi_id = '';
                                                           $format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value','Percentage' => 'Percentage','Text' => 'Text');
                                                            $wtage = array('0'=>'0','15'=>'15','20'=>'20','25'=>'25','30'=>'30','40'=>'40','50'=>'50');
                                                            if (isset($kpi_data_edit)) {
                                                                 //print_r($kpi_data_edit);die();
                                                               $kpi_category[$kpi_data_edit['0']['KRA_category']] = array('selected' => 'selected');
                                                               //print_r($kpi_category);die();
                                                               $kpi_desc = $kpi_data_edit['0']['KRA_description'];
                                                               $kpi_id = $kpi_data_edit['0']['KPI_id'];
                                                               $list_count = explode(';', $kpi_data_edit['0']['target_unit']);
                                                               $wtg[$kpi_data_edit['0']['target']] = array('selected' => 'selected');
                                                               $kpi_count = explode(';', $kpi_data_edit['0']['kpi_list']);
                                                               $target_unit = explode(';', $kpi_data_edit['0']['target_unit']);
                                                               //print_r($target_unit);die();
                                                               $target_value1 = explode(';', $kpi_data_edit['0']['target_value1']);
                                                               $per_kpi_wt = explode(';', $kpi_data_edit['0']['KPI_target_value']);
                                                            }
                                                            else if(isset($kpi_auto_data) && count($kpi_auto_data)>0)
                                                            {
                                                                $kpi_category[$kpi_auto_data['0']['KRA_category']] = array('selected' => 'selected');
                                                               $kpi_desc = $kpi_auto_data['0']['KRA_description'];
                                                               $kpi_id = $kpi_auto_data['0']['KPI_id'];
                                                               $list_count = explode(';', $kpi_auto_data['0']['target_unit']);
                                                               $wtg[$kpi_auto_data['0']['target']] = array('selected' => 'selected');
                                                               $kpi_count = explode(';', $kpi_auto_data['0']['kpi_list']);
                                                               $target_unit = explode(';', $kpi_auto_data['0']['target_unit']);
                                                               $target_value1 = explode(';', $kpi_auto_data['0']['target_value1']);
                                                                $per_kpi_wt = explode(';', $kpi_auto_data['0']['KPI_target_value']);
                                                                 //print_r($per_kpi_wt);die();
                                                            }
                                                           $cities = array('Business'=>'Business','Process'=>'Process','People'=>'People','Customer'=>'Customer');
                                                             echo CHtml::dropDownList("target_value",'',$list,$htmlOptions=array('class'=>"form-control target_value",'style'=>"width: 186px;",'onchange'=>'js:get_target_value();','options' => $kpi_category));
                                                            ?>
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                            <td style=""><label id="kpi_edit_id" style="display: none"><?php echo $kpi_id; ?></label>
                                                                KRA Description
                                                             </td>
                                                             <td colspan=7 align="center" valign=bottom>                
                                                            <?php echo CHtml::textField('KRA_description',$kpi_desc,array('style'=>'float: left;','class'=>'form-control'));  ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                            <td>
                                                                Weightage
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php
                                                           echo CHtml::dropDownList("target_value",'',$wtage,$htmlOptions=array('class'=>"form-control Weightage",'id'=>'Weightage','style'=>"width: 186px;float: left;",'options' => $wtg));
                                                             ?>
                                                        </td>
                                                    </tr> 
                                                    <tr style="display:none">
                                                                                <td>
                                                                Reporting Manager
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php
                                                           $reporting_list = new EmployeeForm();
$head_array = array();
                                            $where = 'where Employee_id = :Employee_id';
                                            $list = array('Employee_id');
                                            $data = array(Yii::app()->user->getState("Employee_id"));
                                            $emp_all_detail = $reporting_list->get_employee_data($where,$data,$list);
//print_r($emp_all_detail);die();


$head_array['0'] = $emp_all_detail['0']['Reporting_officer1_id'];
if ($emp_all_detail['0']['Reporting_officer2_id'] == '') {
    if ($emp_all_detail['0']['reporting_1_change'] !='' && strtotime(date('Y-m-d')) <= strtotime($emp_all_detail['0']['reporting_1_effective_date'])) {
               $head_array['1'] = $emp_all_detail['0']['reporting_1_change'];
    }
}
else
{
    $head_array['1'] = $emp_all_detail['0']['Reporting_officer2_id'];
    if ($emp_all_detail['0']['reporting_1_change'] !='' && strtotime(date('Y-m-d')) <= strtotime($emp_all_detail['0']['reporting_1_effective_date'])) {
               $head_array['2'] = $emp_all_detail['0']['reporting_1_change'];
    }
}
//print_r($head_array);die();

                                         $records = $reporting_list->get_appraiser_list1();
                                         for ($k=0; $k < count($head_array); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($head_array[$k]);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }
                                         //print_r($Reporting_officer_data);die();
                                         $Cadre_id = array(); 
                                         if (isset($Reporting_officer_data)) 
                                         {
                                            for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                            if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                               $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
                                               
                                           }
                                         }
                                        // print_r($Cadre_id);die();
                                        echo CHtml::DropDownList('faculty_email_id','faculty_email_id',$Cadre_id,array('class'=>'form-control faculty_email_id','empty'=>'Select','style'=>'width: 186px;float: left;'));
                                                             ?>
                                                        </td>
                                                    </tr>  
                        
                                                    <table id="kpi_record" class="table table-bordered ">
                                                    <thead>
                                                         <tr id="get_target_value">
                                                        <th style=" "> Key Performance Indicator (KPI) description  </th>
                                                        <th style="text-align:center;"> Unit </th>
                                                        <th style="text-align:center;"> KPI Weightage </th>
                                                        <th style="text-align:center;">  Value </th>
                                                        <th style="text-align:center;"> (1)<br>Unsatisfactory <br>Performance </th>
                                                        <th style="text-align:center;"> (2)<br>Needs<br>Improvement </th>
                                                        <th style="text-align:center;"> (3)<br>Good Solid <br>Performance </th>
                                                        <th style="text-align:center;"> (4)<br>Superior <br>Performance </th>
                                                        <th style="text-align:center;">(5)<br>Outstanding <br>Performance </th>
                                                    </tr>
                                                    </thead>
                                                   <tr id="other_format_text">
                                                   <label id="kpi_list_number" style="display: none"><?php if($kpi_count != '')
                                                    {
                                                        echo count($kpi_count);
                                                    }?></label>
                                                    <label id='min_kpi' style="display: none"><?php if(isset($KRA_category_auto['0']['minimum_kpi']) && $KRA_category_auto['0']['minimum_kpi'] != ''){ echo $KRA_category_auto['0']['minimum_kpi']; }?></label><label style="display: none" id='max_kpi'></label>
                                                    <label style="display: none" id='target_need1'></label>
                                                    <label style="display: none" id='target_need2'></label>
                                                    <label style="display: none" id='target_need3'></label>
                                                    <label style="display: none" id='target_need4'></label>
                                                    <label style="display: none" id='target_need5'></label>                                                   
                                                    <?php 
                                                    
                                                        $val = array();
                                                        $disable_select = true;
                                                        $disable_select1 = false;
                                                         if (isset($list_count) && $list_count!='') {
                                                            $cnt = 0;
                                                            $list_cnt = 0;
                                                            //print_r(count($list_cnt));die();
                                                            if (isset($KRA_category_auto['0']['minimum_kpi']) && count($list_count) == 1) {
                                                                $list_cnt = $KRA_category_auto['0']['minimum_kpi'];
                                                            }
                                                            else
                                                            {
                                                                $list_cnt = count($list_count);
                                                            }
                                                           
                                                            for ($i=0; $i < $list_cnt; $i++) {
                                                             if (isset($target_unit[$cnt])) {
                                                                $unit = $target_unit[$cnt];
                                                                
                                                                                       
                                                                //echo $cnt;
                                                                if (!isset($kpi_count[$i]) || $kpi_count=='') {
                                                                   $kpi_count[$i] = '';
                                                                }

                                                                if (!isset($per_kpi_wt[$i]) || $per_kpi_wt=='') {
                                                                   $per_kpi_wt[$i] = '';
                                                                }
                                                                if ($unit=='Select') {
                                                                    $unit_type[$unit] = array('selected' => 'selected');
                                                                    $unit_target = '';
                                                                    for ($j=0; $j < 5; $j++) { 
                                                                        $val[$i][$j] = '';
                                                                    }
                                                                    $disable_select = true;

                                                                }
                                                                else if ($unit=='Days' || $unit=='Text' || $unit=='Ratio' || $unit=='Percentage' || $unit=='Date') { 

                                                                $disable_select = false; 
                                                                $disable_select1 = true;                                                                
                                                                    $unit_target = '';
                                                                     $unit_type[$unit] = array('selected' => 'selected');
                                                                //      if ($unit == '') {
                                                                //    print_r("gfhfg");die();
                                                                // }
                                                                // else
                                                                // {
                                                                //     print_r($target_unit);die();
                                                                // }
                                                                     
                                                                    if (isset($target_value1[$i]) && $target_value1[$i] != '') {
                                                                       $val_data = explode('-',$target_value1[$i]);
                                                                        for ($j=0; $j < count($val_data); $j++) { 
                                                                            $val[$i][$j] = $val_data[$j];
                                                                        }
                                                                        
                                                                    }
                                                                    else
                                                                    {
                                                                         for ($j=0; $j < 5; $j++) { 
                                                                            $val[$i][$j] = '';
                                                                        }
                                                                    }

                                                                    
                                                                   
                                                                }
                                                                else if($unit=='Units' || $unit=='Weight' || $unit=='Value')
                                                                {
                                                                    $disable_select = true;
                                                                    $disable_select1 = false;
                                                                    $unit_type[$unit] = array('selected' => 'selected');
                                                                   if (isset($target_value1[$i]) && count($target_unit[$cnt])>0 && ($target_value1[$i]!='' || $target_value1[$i]!=0)) {
                                                                       $unit_target = $target_value1[$i];
                                                                           for ($j=0; $j < 5; $j++) { 
                                                                            if ($j==0) {
                                                                                $val[$i][$j] = round($unit_target*0.69,2);
                                                                            }
                                                                            else if($j==1)
                                                                            {
                                                                                $val[$i][$j] = round($unit_target*0.70,2)." to ".round($unit_target*0.95,2);
                                                                            }
                                                                            else if($j==2)
                                                                            {
                                                                                $val[$i][$j] = round($unit_target*0.96,2)." to ".round($unit_target*1.05,2);
                                                                            }
                                                                            else if($j==3)
                                                                            {
                                                                                $val[$i][$j] = round($unit_target*1.06,2)." to ".round($unit_target*1.29,2);
                                                                            }
                                                                            else if($j==4)
                                                                            {
                                                                                $val[$i][$j] = '> '.round($unit_target*1.39,2);
                                                                            }
                                                                            
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        $unit_target = '';
                                                                        for ($j=0; $j < 5; $j++) { 
                                                                            $val[$i][$j] = '';
                                                                        }
                                                                    }
                                                                    
                                                                                                                                     
                                                                    
                                                                }
                                                               
                                                                 $cnt++;
 echo '<tr>
<td id="kpilist_'.$i.'"  style="width: 10px;"><input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list',$kpi_count[$i],array('class'=>'form-control kpi_list validate_field','id'=>'kpilistyii_'.$i.'','style'=>'width: 326px;','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;height: auto;max-height: 200px;overflow-y: scroll;"></div></td>
<td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i,'options' => $unit_type)).'</td>
<td>'.CHtml::textField('kpi_target_value',$per_kpi_wt[$i],array('class'=>'form-control fields validate_field','id'=>'kpi_target_value-'.$i)).'</td>
<td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control validate_field','id'=>'unit_value','style'=>'display:none')).CHtml::textField('unit_value',$unit_target,array('class'=>'form-control validate_field value_field','id'=>'unit_value-'.$i.'','disabled' => $disable_select1,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value1',$val[$i][0],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value1".$i:"form-control fields validate_field target_value1".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value2',$val[$i][1],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value2".$i:"form-control fields validate_field target_value2".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value3',$val[$i][2],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value3".$i:"form-control fields validate_field target_value3".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td><td>'.CHtml::textField('target_value4',$val[$i][3],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value4".$i:"form-control fields validate_field target_value4".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value5',$val[$i][4],array('class'=> ($unit=='Date') ? "form-control fields date_pickup validate_field target_value5".$i:"form-control fields validate_field target_value5".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
</tr>';   
                                 $unit_type='';
                                                       } } } 
                                                        
                                                    ?>                                                    
                                                </table>
                                                    </tr>                                             
                                                </table><br>
                                        <div class="col-md-7">
                                                     <?php if(isset($edit_flag) && $edit_flag!='')
                                             {  echo CHtml::button('Update',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'kpi_update_data')); ?>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals1/"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
                                            <?php }else{  echo CHtml::button('Submit',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'submit_kra','onclick'=>'js:kpi_save_data()')); ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                     
                                    </div>
                                    <?php $this->endWidget();?>
                                       
                                    </div> 
                                     
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#employee_table').DataTable();
                                                });
                                            </script>                                           
                                
                                        <!-- BEGIN SAMPLE TABLE PORTLET-->

<div class="portlet box border-blue-soft bg-blue-soft" <?php  if (!empty($errors) != "") { ?>style="display:block"<?php }else { ?>style="display:none"<?php } ?>>
                                            <div class="portlet-title">
<?php
if(isset($emp_data['0']['new_kra_till_date']) && $emp_data['0']['new_kra_till_date'] != '') {
$emp_data1 = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($emp_data['0']['new_kra_till_date']);
$new_kra_till_date = $emp_data1->get_employee_data($where,$data,$list);
}
?>
                                                <div class="caption"> New Goalsheet (Reporting Manager : <?php if(isset($new_kra_till_date['0']['Emp_fname'])) { echo $new_kra_till_date['0']['Emp_fname']." ".$new_kra_till_date['0']['Emp_lname']." / "; } ?> From : <?php if(isset($emp_data['0']['reporting_1_effective_date'])) { echo date('d-M-Y', strtotime($emp_data['0']['reporting_1_effective_date']))." To : ".date('d-M-Y', strtotime('Dec 31')); } ?>)                                                   
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
 <?php
                                            if (isset($kpi_data2)) { $cnt_num = 1; ?>
                                            <label class='count_goal' id="count_goal" style="display: none"><?php echo count($kpi_data); ?></label>                                            
                                          <?php     
                                        foreach ($kpi_data2 as $row) {  ?>
                                       <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   <?php echo "KRA Category : ".$row['KRA_category']; ?><?php echo ' / '."KRA Weightage : ".$row['target']; ?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status : ".$row['KRA_status']; ?><a href="javascript:;" class="collapse"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                                <table class="mid-table table table-striped table-hover table-bordered" id="sample_editable_1" >

                                                    <thead>
<tr><td style="text-align:center;" class="col-md-2"><b style="float: left;">KRA Description</b></td><td colspan="8" class="col-md-10"><?php echo $row['KRA_description']; ?></td></tr>
                                                        <tr>
                                                          <!--   <th width="20%"> KRA Category </th> -->
                                                            <th> KPI List </th>
                                                            <th class="numeric"> KPI Unit Format </th>
                                                           <th class="numeric"> KPI value </th>
                                                           <th class="numeric"> KPI Target Value </th>
                                                             <th style="text-align:center;"> (1)<br>Unsatisfactory <br>Performance </th>
                                                        <th style="text-align:center;"> (2)<br>Needs<br>Improvement </th>
                                                        <th style="text-align:center;"> (3)<br>Good Solid <br>Performance </th>
                                                        <th style="text-align:center;"> (4)<br>Superior <br>Performance </th>
                                                        <th style="text-align:center;">(5)<br>Outstanding <br>Performance </th>
                                                           <!--  <th class="numeric"> Action </th> -->      
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
                                                                $KPI_target_value = explode(';',$row['KPI_target_value']);
                                                                $kpi_data_data = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if ($kpi_list_data[$i] != '') {
                                                                        if($kpi_data_data == '')
                                                                        {
                                                                            $kpi_data_data = 1;
                                                                        }
                                                                        else
                                                                        {
                                                                            $kpi_data_data = 2;
                                                                        }                                                                        
                                                                    }
                                                                }
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td class="validate_field1"><?php echo $kpi_list_data[$i]; ?></td>
                                                                    <td class="validate_field1"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                        <?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td class="validate_field1" >

                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $kpi_list_target[$i];  ?>">
                                                                                        <?php echo strlen($kpi_list_target[$i]) >= 20 ? 
                                                                                        substr($kpi_list_target[$i] , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $kpi_list_target[$i];  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                   
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $kpi_list_target[$i];  ?>">
                                                                                        <?php echo strlen($KPI_target_value[$i] ) >= 20 ? 
                                                                                        substr($KPI_target_value[$i] , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $KPI_target_value[$i];  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                 
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.69,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.69,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.69,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*0.69,2);  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                    <?php echo round($kpi_list_target[$i]*0.70,2);?>
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.70,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.70,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.70,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*0.70,2);  ?>
                                                                                        </lable>
                                                                                </td>
                                                                               
                                                                             <td class="validate_field1">
                                                                               
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.96,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.96,2) ) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.96,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                       round($kpi_list_target[$i]*0.96,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                             
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*1.06,2);  ?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*1.06,2) ) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*1.06,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*1.06,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                           
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*1.39,2);  ?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*1.39,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*1.39,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*1.39,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                 <td></td>
                                                                                <td class="validate_field1"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td class="validate_field1">
                                                                                        <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value_data[$j]; ?>">
                                                                                        <?php echo strlen($value_data[$j]) >= 20 ? 
                                                                                        substr($value_data[$j], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $value_data[$j]; ?>
                                                                                        </lable>

                                                                                      </td>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                   ?>
                                                                                   <td><?php echo ""; ?></td>
                                                                                   <?php 
                                                                                }
                                                                                }
                                                                        ?>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                       <!--  <td class="numeric"><a href="<?php echo $this->createUrl('Setgoals1/kpi_edit', array('KPI_id' => $row['KPI_id']));
     ?>"><i class="fa fa-pencil fa-fw" title="Delete" aria-hidden="true"></i></a><i class="fa fa-trash-o del_kpi" style="cursor: pointer;" id="KPI_id-<?php echo $row['KPI_id']; ?>" title="Delete" aria-hidden="true"></i></td> -->
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>                              
                                                    </tbody>
                                                    <?php
                                                        if (isset($row['KRA_status']) && $row['KRA_status'] != 'Approved') {
                                                    ?>
                                                    <a href="<?php echo $this->createUrl('index.php/Setgoals1/kpi_edit', array('KPI_id' => $row['KPI_id']));
     ?>"><?php echo CHtml::button('Edit',array('class'=>'btn border-blue-soft','style'=>'float:right')); ?></a><?php echo CHtml::button('Delete',array('class'=>'btn border-blue-soft del_kpi','id'=>'KPI_id-'.$row["KPI_id"],'style'=>'float:right;margin-right: 14px;')); ?>
                                                    <?php
                                                        }
                                                        
                                                    ?>                                                   
                                                </table>                                                
                                            </div>
                                        </div>

                                         <?php 
                                        $cnt_num++; } }
                                        ?>

</div>
</div>

                                        <div class="output_div1">
<?php
if(isset($emp_data['0']['Reporting_officer1_id']) && $emp_data['0']['Reporting_officer1_id'] != '') {
$emp_data1 = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($emp_data['0']['Reporting_officer1_id']);
$new_kra_till_date = $emp_data1->get_employee_data($where,$data,$list);
}
?>
                                        <?php
                                            if (isset($kpi_data)) { $cnt_num = 1; ?>
                                            <label class='count_goal' ><?php echo count($kpi_data); ?></label>
                                            <div class="portlet box border-blue-soft bg-blue-soft">
                                            <div class="portlet-title">
                                                <div class="caption"> Goalsheet (Reporting Manager : <?php if(isset($new_kra_till_date['0']['Emp_fname'])) { echo $new_kra_till_date['0']['Emp_fname']." ".$new_kra_till_date['0']['Emp_lname']." / "; } ?> Till : <?php if(isset($emp_data['0']['reporting_1_effective_date']) && $emp_data['0']['reporting_1_effective_date']!= '0000-00-00') { echo date('d-M-Y', strtotime($emp_data['0']['reporting_1_effective_date']. ' -1 day')); }else{ echo date('d-M-Y', strtotime('Dec 31')); } ?>)                                                    
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                          <?php     
                                        foreach ($kpi_data as $row) {  ?>
                                       <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   <?php echo "KRA Category : ".$row['KRA_category']; ?><?php echo ' / '."KRA Weightage : ".$row['target']; ?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status : ".$row['KRA_status']; ?><a href="javascript:;" class="collapse"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                                <table class="mid-table table table-striped table-hover table-bordered" id="sample_editable_1" >

                                                    <thead>
<tr><td style="text-align:center;" class="col-md-2"><b style="float: left;">KRA Description</b></td><td colspan="8" class="col-md-10"><?php echo $row['KRA_description']; ?></td></tr>
                                                        <tr>
                                                          <!--   <th width="20%"> KRA Category </th> -->
                                                            <th> KPI List </th>
                                                            <th class="numeric"> KPI Unit Format </th>
                                                           <th class="numeric"> KPI value </th>
                                                           <th class="numeric"> KPI Target Value </th>
                                                             <th style="text-align:center;"> (1)<br>Unsatisfactory <br>Performance </th>
                                                        <th style="text-align:center;"> (2)<br>Needs<br>Improvement </th>
                                                        <th style="text-align:center;"> (3)<br>Good Solid <br>Performance </th>
                                                        <th style="text-align:center;"> (4)<br>Superior <br>Performance </th>
                                                        <th style="text-align:center;">(5)<br>Outstanding <br>Performance </th>
                                                           <!--  <th class="numeric"> Action </th> -->      
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
                                                                $KPI_target_value = explode(';',$row['KPI_target_value']);
                                                                $kpi_data_data = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if ($kpi_list_data[$i] != '') {
                                                                        if($kpi_data_data == '')
                                                                        {
                                                                            $kpi_data_data = 1;
                                                                        }
                                                                        else
                                                                        {
                                                                            $kpi_data_data = 2;
                                                                        }                                                                        
                                                                    }
                                                                }
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td class="validate_field1"><?php echo $kpi_list_data[$i]; ?></td>
                                                                    <td class="validate_field1"><?php echo $kpi_list_unit[$i]; ?></td>
                                                                        <?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td class="validate_field1" >

                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $kpi_list_target[$i];  ?>">
                                                                                        <?php echo strlen($kpi_list_target[$i]) >= 20 ? 
                                                                                        substr($kpi_list_target[$i] , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $kpi_list_target[$i];  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                   
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $kpi_list_target[$i];  ?>">
                                                                                        <?php echo strlen($KPI_target_value[$i] ) >= 20 ? 
                                                                                        substr($KPI_target_value[$i] , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $KPI_target_value[$i];  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                 
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.69,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.69,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.69,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*0.69,2);  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                    <?php echo round($kpi_list_target[$i]*0.70,2);?>
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.70,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.70,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.70,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*0.70,2);  ?>
                                                                                        </lable>
                                                                                </td>
                                                                               
                                                                             <td class="validate_field1">
                                                                               
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.96,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.96,2) ) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.96,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                       round($kpi_list_target[$i]*0.96,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                             
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*1.06,2);  ?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*1.06,2) ) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*1.06,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*1.06,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                           
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*1.39,2);  ?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*1.39,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*1.39,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*1.39,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                 <td></td>
                                                                                <td class="validate_field1"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td class="validate_field1">
                                                                                        <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $value_data[$j]; ?>">
                                                                                        <?php echo strlen($value_data[$j]) >= 20 ? 
                                                                                        substr($value_data[$j], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $value_data[$j]; ?>
                                                                                        </lable>

                                                                                      </td>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                   ?>
                                                                                   <td><?php echo ""; ?></td>
                                                                                   <?php 
                                                                                }
                                                                                }
                                                                        ?>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                       <!--  <td class="numeric"><a href="<?php echo $this->createUrl('Setgoals1/kpi_edit', array('KPI_id' => $row['KPI_id']));
     ?>"><i class="fa fa-pencil fa-fw" title="Delete" aria-hidden="true"></i></a><i class="fa fa-trash-o del_kpi" style="cursor: pointer;" id="KPI_id-<?php echo $row['KPI_id']; ?>" title="Delete" aria-hidden="true"></i></td> -->
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>                              
                                                    </tbody>
                                                    <?php
                                                        if (isset($row['KRA_status']) && $row['KRA_status'] != 'Approved') {
                                                    ?>
                                                    <a href="<?php echo $this->createUrl('index.php/Setgoals1/kpi_edit', array('KPI_id' => $row['KPI_id']));
     ?>"><?php echo CHtml::button('Edit',array('class'=>'btn border-blue-soft','style'=>'float:right')); ?></a><?php echo CHtml::button('Delete',array('class'=>'btn border-blue-soft del_kpi','id'=>'KPI_id-'.$row["KPI_id"],'style'=>'float:right;margin-right: 14px;')); ?>
                                                    <?php
                                                        }
                                                        
                                                    ?>                                                   
                                                </table>                                                
                                            </div>
                                        </div>

                                         <?php 
                                        $cnt_num++; } }
                                        ?>
</div>
</div>
                                        </div>
                                        <?php
                        $model = new LoginForm; 
            $program_data =new ProgramDataForm;
            $employee = new EmployeeForm;   
            $IDPForm =new IDPForm;  
            $Compare_Designation =new CompareDesignationForm;       
            $program_data_result = $program_data->get_data();
            
            $Employee_id = Yii::app()->user->getState("Employee_id");
            $where = 'where Employee_id = :Employee_id';
            $list = array('Employee_id');
            $data = array($Employee_id);
            $emp_data = $employee->get_employee_data($where,$data,$list);
            $designation_flag = 0;

            if(isset($emp_data['0']['Designation']) && $emp_data['0']['Designation'] != '') {
                $where = 'where designation = :designation';
                $list = array('designation');
                $data = array($emp_data['0']['Designation']);
                $Compare_Designation1 = $Compare_Designation->get_designation_flag($where,$data,$list);
                if (isset($Compare_Designation1['0']['flag'])) {
                    $designation_flag = $Compare_Designation1['0']['flag'];
                }
                
            }
           //$goal_set_year=$_POST['goal_year'];
            //echo  $goal_set_year;
            if($_POST['submit'] && $_POST['submit'] != 0)
{
   $goal_set_year=$_POST['goal_year'];
}

            $where = 'where Employee_id = :Employee_id AND goal_set_year = :goal_set_year';
            $list = array('Employee_id','goal_set_year');
            $data = array($Employee_id,'2017-2018');
            $IDP_data = $IDPForm->get_idp_data($where,$data,$list);
            //print_r($IDP_data);die();
            $where = 'where Email_id = :Email_id';
            $list = array('Email_id');
            $data = array($emp_data['0']['Reporting_officer1_id']);
            $mgr_data = $employee->get_employee_data($where,$data,$list);

                    ?> 
                    <?php
$set_flag = 'disabled';
          if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved')
          {
          //$set_flag = "'disabled'"."=>"."'disabled'";
          } 
$set_flag1 = "'disabled'= 'false'";
          if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved')
          {
          $set_flag1 = "'disabled'= 'true'";
          } 


?>       
<div class="row">
<div class="col-md-12" style="margin-top: 58px;">
                               </div>
                                <div class="col-md-12" style="margin-top: -18px;">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit" id="refresh_class">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                
                                                <span class="caption-subject bold uppercase" style="color:#337ab7;">IDP</span>
                                            </div>
                                            <lable id="compare_designation" style="display: none"><?php if(isset($designation_flag)) { echo $designation_flag; } ?></lable>
                                        </div>
                                        <lable id="Reporting_officer1_id" style="display: none">
                                           <?php  if(isset($emp_data)&& count($emp_data)>0){
                                           echo trim($emp_data[0]['Reporting_officer1_id']);   }?> 
                                        </lable>
                                         <lable id="emp_code" style="display: none">
                                           <?php  if(isset($emp_data)&& count($emp_data)>0){
                                           echo trim($emp_data[0]['Employee_id']);   }?> 
                                        </lable>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="#" id="form-username" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group ">
                                                      <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Employee Name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                          <?php 
                                                          if(isset($emp_data)&& count($emp_data)>0){
                                                                echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
                                                                }?>
                                                                                                           
                                                        
                                                        </div>
                                                        <div class="col-md-2"><label class="col-md-2">
                                                       <span class="bold">Manager’s name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                        <?php if(isset($mgr_data) && count($mgr_data)>0){
                                                             echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Employee Code</span></label>
                                                  </div>
                                                        <div class="col-md-4">                                                        
                                                           <?php  if(isset($emp_data)&& count($emp_data)>0){
                                                           echo $emp_data[0]['Employee_id'];   }?> 
                                                        </div>
                                                        
                                                        <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Date</span></label></div>

                                                        <div class="col-md-4">
                                                        <?php 
                                                           $today = date('d-m-Y'); 
                                                         echo '2016-2017';?>
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                <div class="portlet light form-fit ">
                                        <div class="portlet-title">
                                                  <div class="caption">
                                               
                                                <span class="caption-subject  bold uppercase" style="color:#337ab7;font-size: 12px;">Please discuss your strengths and work related weaknesses with your manager and identify your training needs. Your development will happen through the following ways:</span><br><br>                                                
                                                <span style="color:#337ab7;font-size: 14px;" class="bold"><lable style="color: red">*</lable>Mandatory for all employees to attend this program
                            <br><lable style="color: red">**</lable>Mandatory for employees working at locations covered by the certifications</span>
                                            </div>
                                        </div>
                                              <div class="form-group">
                                                     
<div style="height: 43px;background-color: #4f7ab7;
width: 100%;">&nbsp;&nbsp;
<span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part A: Development through Instructor led training in Classroom</span><br>
</div>
                                                   </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="#" class="form-horizontal form-bordered">
                                                <div class="form-body">

                                                <label id="total_prog" style="display: none"><?php if(isset($program_data_result) && count($program_data_result)>0) { echo count($program_data_result);} ?></label>
                                                    <table class="table table-bordered table-hover" id="maintable">
                                    <thead>
                                       <!--  <th>No</th> -->
                                        <th>Name of program</th>
                                        <th>Faculty</th>
                                        <th>Days</th>
                                        <th>Please explain why the training is needed</th>
                                    </thead>
                                    <tbody>

                                    <?php
                                     $compulsory = '';$compulsory_cnt = 1; 
                                    $program_data =new ProgramDataForm;  
                                    $program_data_result = $program_data->get_data();       
                                    if (isset($program_data_result) && count($program_data_result)>0) {
                                        for ($i=0; $i < count($program_data_result); $i++) {    
                                          if (isset($IDP_data['0']['program_comment'])) {
                                             $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                                          }
                                          else
                                          {
                                             $cmt2 = '';
                                          }
                                        
                                         $cmnt = '';
                                            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment'])) {
                                               
                                                for ($j=0; $j < count($cmt2); $j++) {
                                                    $cmt1 = explode('?', $cmt2[$j]);
                                                    if ($i == $cmt1[0]) {                                                            
                                                         $cmnt = $cmt1[1];
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $cmnt = '';
                                            }
                                                                                
                                            if ($program_data_result[$i]['need'] == 1) {
                                                if ($compulsory == '') {
                                                   $compulsory = $i;
                                                }
                                                else
                                                {
                                                    $compulsory = $compulsory.';'.$i;
                                                }
                                            }
                                            if ($cmnt == 'undefined') {
                                                $cmnt = '';
                                            }
                                            ?>
                                            <tr class="error_row_chk" id="show_this-<?php echo $i; ?>"> 
                                               <!--  <td><?php echo $i; ?></td>   -->                 
                                                <td class="prog_name" id="<?php echo $i; ?>"> <?php echo $program_data_result[$i]['program_name']; ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
                                                <?php if($program_data_result[$i]['need'] == 2 && $program_data_result[$i]['location'] != '' && $program_data_result[$i]['location'] != 'undefined') { ?><label id = 'complusory_prg<?php echo $i; ?>' style="color: red;display: none"><?php echo $program_data_result[$i]['location']; ?></label><?php } ?>
                                                </td>
                                                <td> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
                                                <td> <?php echo $program_data_result[$i]['training_days']; ?> </td>
                                                <td class="col-md-4">
                                                <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i));
}
else
{
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i));
}
                                                    
                                                ?> </td>
                                              
                                            </tr>
                                            <?php 
                                    }
                                    } 
                                    ?>   
                                                    
                                    <label id="compulsory_id" style="display: none"><?php echo $compulsory; ?></label>
                                    </tbody>

                                 </table>     
                                                </div>
                                                    <div class="form-group error_row_chk2">
                                                    <label class="col-md-12 control-label">
                                                      <span class="bold" style="color:#337ab7;font-size: 14px;float: left;">If you need a program that is not mentioned above, please use the space below. Please note this program may be offered if at least 20 people request for it. 
                                                    </span></label>
                                                    
                                                </div>
                                                <?php
                                               
                                                                   
//die();
                                                 ?>
                                                 <div class="form-group">                                                         
                                                            <div class="col-md-4 bold">
                                                              Topics required
                                                            </div>
                                                            <div class="col-md-2 bold">No. of days</label></div>
                                                            <div class="col-md-4 bold">
                                                             Internal faculty name
                                                            </div>
                                                  </div>
                           
                                                    <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-4">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                         if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
                                                                $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                                $topic = $topic1[0];
                                                                $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                                $day = $day1[0];
                                                                $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                                // $faculty1 = explode('?',$faculty2[0]);                           
                                                                $faculty[$faculty2[0]] = array('selected' => 'selected');
                                                                 //print_r($faculty);die();
                                                         }
                                                        if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('topic1',$topic,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic1"));
}
else
{
  echo CHtml::textField('topic1',$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic1"));
} 
                                                         ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('days_required1',$day,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 days_required1")); 
}
else
{
 echo CHtml::textField('days_required1',$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required1")); 
} 

?> 
                                                        </div>
                                                        <div class="col-md-4">
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
                                                             if (isset($Reporting_officer_data)) 
                                                             {
                                                                for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                   $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].'?'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                }
                                                                   
                                                               }
                                                             }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::DropDownList('faculty_email_id1','faculty_email_id1',$Cadre_id,array('disabled' => 'disabled','class'=>'form-control faculty_email_id1','empty'=>'Select','options' => $faculty));
}
else
{
 echo CHtml::DropDownList('faculty_email_id1','faculty_email_id1',$Cadre_id,array('class'=>'form-control faculty_email_id1','empty'=>'Select','options' => $faculty));
}
                                                             ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">2</label></div> -->
                                                        <div class="col-md-4">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                             if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
                                                                    $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                                    if (isset($topic1[1])) {
                                                                       $topic = $topic1[1];
                                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                                        $day = $day1[1];
                                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                                        // $faculty1 = explode('?',$faculty2[0]);                           
                                                                        $faculty[$faculty2[1]] = array('selected' => 'selected');
                                                                    }
                                                             }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('topic2',$topic,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic2"));
}
else
{
 echo CHtml::textField('topic2',$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic2"));
}
                                                             ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('days_required2',$day,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 days_required2"));
}
else
{
  echo CHtml::textField('days_required2',$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required2")); 
}

?> 
                                                        </div>
                                                        <div class="col-md-4">
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
                                                             if (isset($Reporting_officer_data)) 
                                                             {
                                                                for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                   $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].'?'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                }
                                                                   
                                                               }
                                                             }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::DropDownList('faculty_email_id2','faculty_email_id2',$Cadre_id,array('disabled' => 'disabled','class'=>'form-control faculty_email_id2','empty'=>'Select','options' => $faculty,$set_flag));
}
else
{
  echo CHtml::DropDownList('faculty_email_id2','faculty_email_id2',$Cadre_id,array('class'=>'form-control faculty_email_id2','empty'=>'Select','options' => $faculty,$set_flag));
}
                                                            ?>
                                                        </div>
                                                    </div>

                                                <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec1"  style="color: red;float: right;"></lable></div>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div></div>
                                    <!-- END PORTLET-->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit error_row_chk1">
                                        <div class="portlet-body form">
                                            <form action="#" id="form-username" class="form-horizontal form-bordered">
                                                      <div class="form-group">
                                                      <div class="col-md-12">

                                                        <label class="col-md-12 control-label" style="text-align:left;"><span class="bold" style="color:#337ab7;font-size: 14px;float: left;">
                                                    Note: Part B and Part C are to be filled by only AGM and above employees.     
                                                          </span>
                                                        </label>
                                                      </div>
<div style="height: 43px;background-color: #4f7ab7;margin-top: 63px;
width: 100%;">&nbsp;&nbsp;
<span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part B: Development through developmental relationships</span><br>
</div>
                                                   </div>
                                                   <div class="form-group">                                                        
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Relationship</label>
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Name of leader</label>
                                                        <label class="control-label col-md-2 bold" style="text-align: left;">Number of Meetings planned
                                                        </label>
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Target date</label>
                                                        
                                                    </div>
 <div class="form-group">
                                                       
                                                        <label class="control-label col-md-3"  style="text-align: left;">Coaching through leader in own function for functional inputs</label>
                                                        <div class="col-md-3">
                                                           <?php 
                                                            $faculty3 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[0])) {
                                                                $faculty3 = $faclty[0];
                                                              }
                                                              //$faculty3[$faclty[0]] = array('selected' => 'selected');
                                                            }
                                if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 faculty_email_id3",'id'=>'faculty_email_id3'));
}
else
{
 echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('class'=>"form-control col-md-4 faculty_email_id3",'id'=>'faculty_email_id3'));
}
                                                             
                                                            ?>
                                                          </div>
                                                       <div class="col-md-2">
                                                             <?php 
                                                              $meet = '';
                                                              if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                                                                $meet = explode(';',$IDP_data['0']['meeting_planned']);
                                                                $meet = $meet[0];
                                                              }
                                                              else
                                                              {
                                                                $meet = '';
                                                              }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 number_of_meetings3",'id'=>'number_of_meetings3'));
}
else
{
 echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('class'=>"form-control col-md-4 number_of_meetings3",'id'=>'number_of_meetings3'));
}
                                                               ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <?php 
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date3" type="text" value="<?php echo $rel2[0]; ?>" id="target_date3" <?php echo $set_flag1; ?>>
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date3" type="text"  id="target_date3" >
                                                                 <?php   }
                                                                ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">                                                       
                                                        <label class="control-label col-md-3"  style="text-align: left;">Mentoring through leader from different function for behavioural inputs</label>
                                                        <div class="col-md-3">
                                                            <?php 
                                                            $faculty4 = '';
                                                            if (isset($IDP_data['0']['leader_name'])) {
                                                              $faclty = explode(';',$IDP_data['0']['leader_name']);
                                                              if (isset($faclty[1])) {
                                                                $faculty4 = $faclty[1];
                                                              }
                                                              //$faculty4[$faclty[1]] = array('selected' => 'selected');
                                                            }
                                                            //  $reporting_list = new EmployeeForm();
                                                            //  $records = $reporting_list->get_appraiser_list1();
                                                            //  for ($k=0; $k < count($records); $k++) { 
                                                            //     $where = 'where Email_id = :Email_id';
                                                            //     $list = array('Email_id');
                                                            //     $data = array($records[$k]['Email_id']);
                                                            //     $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                                            //  }
                                                            //  $Cadre_id = array(); 
                                                            //  if (isset($Reporting_officer_data)) 
                                                            //  {
                                                            //     for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                            //     if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                            //        $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].'?'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                            //     }
                                                                   
                                                            //    }
                                                            //  }
                                                            // echo CHtml::DropDownList('faculty_email_id4','faculty_email_id4',$Cadre_id,array('class'=>'form-control faculty_email_id4','empty'=>'Select','options' => $faculty4));
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 faculty_email_id4",'id'=>'faculty_email_id4'));
}
else
{
 echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('class'=>"form-control col-md-4 faculty_email_id4",'id'=>'faculty_email_id4'));
}
                                                            
                                                             ?>
                                                          </div>
                                                       <div class="col-md-2">
                                                           <?php 
                                                           $meet = '';
                                                          if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                                                            $meet = explode(';',$IDP_data['0']['meeting_planned']);
                                                            $meet = $meet[1];
                                                          }
                                                          else
                                                          {
                                                            $meet = '';
                                                          }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 number_of_meetings4",'id'=>'number_of_meetings4',$set_flag));
}
else
{
 echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('class'=>"form-control col-md-4 number_of_meetings4",'id'=>'number_of_meetings4'));
}
                                                           ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <?php 
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control target_date4" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" <?php echo $set_flag1; ?>>
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date4" type="text"  id="target_date4">
                                                                 <?php   }
                                                                ?>
                                                        </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec2"  style="color: red;float: right;"></lable></div>
                                                    </div>
                                                    </div>
                                                  <div class="form-group">                                                      
                                                    <div style="height: 43px;background-color: #4f7ab7;margin-top: 63px;
                                                    width: 100%;">&nbsp;&nbsp;
                                                    <span class="caption-subject  bold uppercase" style="color:white;font-size: 12px;">Part C: Development through action learning projects</span><br>
                                                    </div>
                                                   </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Project Title</label>
                                                    <div class="col-md-9">
                                                     <?php 
                                                     $project_title = '';
                                                        if (isset($IDP_data['0']['project_title'])) {
                                                          $project_title = $IDP_data['0']['project_title'];
                                                        }
                                                        else
                                                        {
                                                          $project_title = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('disabled' => 'disabled','maxlength'=>80,'class'=>"form-control col-md-4 project_title1"));
}
else
{
 echo CHtml::textField('project_title1',$project_title,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 project_title1"));
}
                                                         ?>    
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold">Review date</label>
                                                    <div class="col-md-2">                                                        
                                                         <?php
                                                                  if (isset($IDP_data['0']['project_review_date'])) { ?>
                                                                       <input class="form-control" <?php echo $set_flag1; ?>  type="text" value="<?php echo $IDP_data['0']['project_review_date']; ?>" id="review_date">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control" type="text" id="review_date">
                                                                 <?php   }
                                                                ?>
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Target end date</label>
                                                    <div class="col-md-2">
                                                        
                                                                <?php
                                                                  if (isset($IDP_data['0']['project_end_date'])) {  ?>
                                                                       <input class="form-control" <?php echo $set_flag1; ?>  type="text" value="<?php echo $IDP_data['0']['project_end_date']; ?>" id="target_end_date">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control" type="text" id="target_end_date">
                                                                 <?php   }
                                                                ?>
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold">Project scope</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_scope = '';
                                                        if (isset($IDP_data['0']['project_scope'])) {
                                                          $project_scope = $IDP_data['0']['project_scope'];
                                                        }
                                                        else
                                                        {
                                                          $project_scope = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_scope"));
}
else
{
 echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('class'=>"form-control col-md-4 project_scope"));
}
                                                         ?> 
                                                    </div>
                                                </div>

                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold ">Project exclusions</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $project_exclusion = '';
                                                        if (isset($IDP_data['0']['project_exclusion'])) {
                                                          $project_exclusion = $IDP_data['0']['project_exclusion'];
                                                        }
                                                        else
                                                        {
                                                          $project_exclusion = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_exclusion"));
}
else
{
 echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('class'=>"form-control col-md-4 project_exclusion"));
}
                                                         ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="col-md-12 bold"><lable id="error_spec3"  style="color: red;float: right;"></lable></div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                    <!-- END PORTLET-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit ">                                        
                                        <div class="portlet-body form">
                                            <form action="#" id="form-username" class="form-horizontal form-bordered">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Project deliverables (Target at rating 3: good solid performance)</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                         $Project_deliverables = '';
                                                        if (isset($IDP_data['0']['Project_deliverables'])) {
                                                          $Project_deliverables = $IDP_data['0']['Project_deliverables'];
                                                        }
                                                        else
                                                        {
                                                          $Project_deliverables = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_deliverables",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;'));
}
else
{
 echo CHtml::textArea('deliverables',$Project_deliverables,$htmlOptions=array('class'=>"form-control col-md-4 project_deliverables",'style'=>'max-width: 827px;width: 936px;height: 214px;max-height: 67px;'));
}
                                                         ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold">What is the employee expected to learn from this project</label>
                                                    <div class="col-md-9">
                                                       <?php 
                                                       $expected = '';
                                                        if (isset($IDP_data['0']['learn_from_project'])) {
                                                          $expected = $IDP_data['0']['learn_from_project'];
                                                        }
                                                        else
                                                        {
                                                          $expected = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textArea('exp',$expected,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 learn_from"));
}
else
{
 echo CHtml::textArea('exp',$expected,$htmlOptions=array('class'=>"form-control col-md-4 learn_from"));
}
                                                        ?>  
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Reviewer(s) name</label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                        $review_name = '';
                                                        if (isset($IDP_data['0']['Reviewer'])) {
                                                          $review_name = $IDP_data['0']['Reviewer'];
                                                        }
                                                        else
                                                        {
                                                          $review_name = '';
                                                        }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('disabled' => 'disabled','maxlength'=>80,'class'=>"form-control col-md-4 reviewvers_name"));
}
else
{
 echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('maxlength'=>80,'class'=>"form-control col-md-4 reviewvers_name"));
}
                                                         ?> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 bold"><lable id="error_spec4"  style="color: red;float: right;"></lable></div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- END PORTLET-->
                                </div>
                            </div>
                            
                            <div class="row">                             
                                <div class="col-md-offset-3 col-md-9">

                                 <button type="button" class="btn btn-primary save_data1" style="float: right;">
                                    Send IDP for approval</button>
                                
</div>
                            </div>
                                        <!-- END SAMPLE TABLE PORTLET-->      
                                       <?php 
                                        echo CHtml::button('Send to manager for approval',array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>'send_for_appraisal','onclick'=>'js:send_notification();'));
                                            if (isset($kpi_data) && count($kpi_data)>0) { ?>
                                          <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>     
                                         <div class="btn-group col-md-6" style="float:left">
                    <?php if((isset($kpi_data['0']['KRA_status_flag']) && !($kpi_data['0']['KRA_status_flag']>0) || $emp_data[0]['new_kra_create'] == 'on')) { ?>
                                        <?php echo CHtml::button('Send to manager for approval',array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>'send_for_appraisal','onclick'=>'js:send_notification();')); ?><?php } ?>
                                       
                                    </div>                        
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                
                <style type="text/css">
                .background_color
                {
                    background-color : white;
                }
                </style>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script type="text/javascript">
                     $(function(){
                $("#kpi_update_data").click(function(){                    
                    var kra_des = $("#KRA_description").val();
                    var string = /^(0[1-9]|[0-3][0-3])([/]{1})(0[1-9]|1[0-2])([/]{1})((19|20)[0-9]{2})$/;
                    var string_num = /^([0-9])*$/;
                     var data_length = kra_des.length;
                     //alert(data_length);
                    if (data_length==0)
                    {
                        error = 'Please enter KRA description';
                    }
                    else if(data_length>2000)
                    {
                        error = 'Maximum 2000 characters are allowed in KRA description';
                    }
                    else
                    {
                        error = '';
                    }
                    //alert("in");
                        if(error == '')
                    {
                        //alert("proceed");
                        var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';
                        var selected_unit = $(".format_list").find(':selected').val();
                        var wtg_value = $("#Weightage").find(':selected').val();
                        var catergory = $("#target_value").find(':selected').val();
                        if(catergory == '--Select--')
                        {
                            error = 'Please select KRA Category.';
                        }
                        else if(wtg_value == '0')
                        {
                            error = 'Please select Weightage.';
                        }
                        else
                        {

                            var kpi_list_data = 0;var add_value = 0;final_kpi_total = 0;var final_kpi_wt = '';
                            for (var i = 0; i < kra_num; i++) {
                            
                                if ($("#kpilistyii_"+i).val()!= '' && $("#mask_number-"+i).find(':selected').val()!='Select') 
                                {
                                    kpi_list_data = parseInt(kpi_list_data)+parseInt(1);
                                }
                                
                                if ($("#kpi_target_value-"+i).val() != '' && $.isNumeric($("#kpi_target_value-"+i).val())) 
                                {
                                    if (final_kpi_wt == '') 
                                    {
                                        final_kpi_wt = $("#kpi_target_value-"+i).val();
                                        final_kpi_total = $("#kpi_target_value-"+i).val();
                                    }
                                    else
                                    {
                                       final_kpi_wt = final_kpi_wt+';'+$("#kpi_target_value-"+i).val();
                                        final_kpi_total = parseFloat(final_kpi_total)+parseFloat($("#kpi_target_value-"+i).val());
                                    }
                                   
                                }
                                else if(!$.isNumeric($("#kpi_target_value-"+i).val()) && $("#kpi_target_value-"+i).val() != '')
                                {                                     
                                    error = "Please enter only numbers in KPI Weightage field.";break;
                                }
                                
                            }
                            
                            if(error == '')
                            {                                
                                if (kpi_list_data <  $("#min_kpi").text()) 
                                {                                
                                    error = 'Please Fill minimum '+$("#min_kpi").text()+' KPI';                                   
                                }
                                else
                                {                             
                                    for (var i = 0; i < kra_num; i++) {
                                   if ($("#mask_number-"+i).find(':selected').val() != 'Select' && $("#kpilistyii_"+i).val() != '') 
                                    {
                                        
                                        var selected_value = $("#mask_number-"+i).find(':selected').val();
                                         var chk1 = /[;]/;
                                        if(chk1.test($("#kpilistyii_"+i).val()))
                                        {
                                            error = "The KPI description field should not contain ; special character.";break;
                                        }
                                        else
                                        {
                        error = '';
                        if (kpi_list == '')
                                            {
                                                kpi_list = $("#kpilistyii_"+i).val();
                                                kpi_unit = $("#mask_number-"+i).find(':selected').val();
                                                
                                            }
                                            else
                                            {
                                                kpi_list = kpi_list+';'+$("#kpilistyii_"+i).val();
                                                kpi_unit = kpi_unit+';'+$("#mask_number-"+i).find(':selected').val();
                                                
                                            }
                                          
                                        }
                                        if (selected_value != 'Units' && selected_value != 'Weight' && selected_value != 'Value') 
                                        {
                                            if(selected_value == 'Percentage' || selected_value == 'Days')
                                            {
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !$.isNumeric($(".target_value1"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !$.isNumeric($(".target_value2"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !$.isNumeric($(".target_value3"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !$.isNumeric($(".target_value4"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !$.isNumeric($(".target_value5"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else
                                                {
                                                    error = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Date')
                                            {
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }                                               
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }                                                
                                                else
                                                {
                                                    error = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Text')
                                            {
                                                
                                                var chk = /[;-]/;
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($(".target_value1"+i).val()!='' && chk.test($(".target_value1"+i).val())) || ($(".target_value1"+i).val()!='' && $(".target_value1"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                               else if(($(".target_value2"+i).val()!='' && chk.test($(".target_value2"+i).val())) || ($(".target_value2"+i).val()!='' && $(".target_value2"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($(".target_value3"+i).val()!='' && chk.test($("#target_need3").text())) || ($(".target_value3"+i).val()!='' && $("#target_need3").text().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value4"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value4"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                               else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value5"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value5"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else
                                                {
                                                    error = '';var chk1 = /[;]/;
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }
                                                }
                                            }
                                            else if(selected_value == 'Ratio')
                                            {
                                                var ratio_chk = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !ratio_chk.test($(".target_value1"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !ratio_chk.test($(".target_value2"+i).val()))
                                                {
                                                    error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !ratio_chk.test($(".target_value3"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !ratio_chk.test($(".target_value4"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !ratio_chk.test($(".target_value5"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else
                                                {
                                                    error = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                            }
                                            
                                        }
                                        else if(selected_value == 'Units' || selected_value == 'Weight' || selected_value == 'Value')
                                        {
                                            
                                            if ($("#unit_value-"+i).val()==''  || $("#unit_value-"+i).val() === undefined) 
                                            {
                                                error = 'Please Fill unit value';break;
                                            }
                    else if ($("#unit_value-"+i).val() == 0 || $("#unit_value-"+i).val().length>6)
                                            {
                                                error = 'Minimum 1 and maximum 6 digits are allowed.';break;
                                            }                       
                                            else if (!$.isNumeric($("#unit_value-"+i).val())) 
                                            {
                                                error = 'Only numbers are allowed for Units/Weight/Value field.';break;
                                            }
                                            else
                                            {
                                                error = '';
                                                if (kpi_value == '')
                                                {
                                                    kpi_value = $("#unit_value-"+i).val();
                                                }
                                                else
                                                {
                                                    kpi_value = kpi_value+';'+$("#unit_value-"+i).val();
                                                }
                                                
                                            }
                                        }
                                        if (final_kpi_total != '' && final_kpi_total != 100) 
                                        {
                                            error = 'The Total for kpi score should be 100';break;
                                        }
                                        else
                                        {                                                    
                                           error = '';
                                        }

                                    }                                   
                                    else
                                    {
                                        error = '';
                                        if ($("#mask_number-"+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+i).val() != '' || $("#unit_value-"+i).val() != '')) 
                                        {
                                             error = 'Please Fill Correct KPI Details';break;
                                        }
                                        else  if ($("#mask_number-"+i).find(':selected').val() != 'Select' && ($("#kpilistyii_"+i).val() == '' || $("#unit_value-"+i).val() == '')) 
                                        {
                                            error = 'Please Fill Correct KPI Details';break;
                                        }
                                        else if(($("#mask_number-"+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+i).val() != '' || $("#unit_value-"+i).val() != '')) || ($("#kpilistyii_"+i).val() == '' && $("#mask_number-"+i).find(':selected').val() != 'Select'))
                                            {
                                                error = 'Please Fill Correct KPI Details';break;
                                            }
                                            else
                                            {
                                                error = '';
                                                // if (final_kpi_total != 100) 
                                                // {
                                                //     error = 'The Total for kpi score should be 100';break;
                                                // }
                                                // else
                                                // {                                                    
                                                //    error = '';
                                                // }
                                            }                                         
                                    }       
                            }
                                                              
                                } 
                            }
                            
                        }
                        
                        var data = {
                            'KRA_category' : $("#target_value").find(':selected').val(),
                            'KRA_description' : $("#KRA_description").val(),
                            'target' : $("#Weightage").find(':selected').val(),
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                            'KPI_target_value' : final_kpi_wt,
                            'KPI_id' : $("#kpi_edit_id").text(),
                        };
                        console.log(data);
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                        if(error != '')
                        {
                             $("#err").show();  
                             //$("#err").fadeOut(6000);
                             $("#error_value").text(error);
                            $("#err").addClass("alert-danger");
                        }
                        else
                        {
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Setgoals1/update_kpi',
                                success : function(data)
                                {                                   
                                    if (data == "success")
                                    {
                                        //alert(data);
                                        //get_notify("KRA Updated successfully");
                                        $(".output_div1").load(location.href + " .output_div1");
                                        $("#err").show();  
                                         $("#err").fadeOut(6000);
                                         $("#error_value").text("Successfully updated");
                                         $("#err").removeClass("alert-danger");
                                        $("#err").addClass("alert-success");
                                    }
                                    
                                }
                            });
                        }
                        
                        console.log(data);
                    }
                    else
                    {
                        $("#err").show();  
                        //$("#err").fadeOut(6000);
                        $("#err").text(error);
                        $("#err").addClass("alert-danger");
                    }
                });
               });
                </script>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script type="text/javascript">

                 //var error = '';
                 var kpi_id_value = Math.random().toString(16).slice(2);
                 var updated_kpi_value = '';
                // $(function(){

                function kpi_save_data_new()
                {
                    var kra_des = $("#KRA_description").val();
                    var kra_data_target = ''; var kra_data_value_details = {};$cnt = 0;$kra_description_data='';$kra_wt_data='';
                    var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';var kra_complete_flag = 0;var final_kpi_wt = '';
                        var selected_unit = $(".format_list").find(':selected').val();
                        var wtg_value = $("#Weightage").find(':selected').val();
                        var catergory = $("#target_value").find(':selected').val();
                    var string = /^(0[1-9]|[0-3][0-3])([/]{1})([a-zA-Z]{3})([/]{1})((19|20)[0-9]{2})$/;
                    
                     var data_length = kra_des.length;
                     //alert(data_length);
                    if ($("#target_value").find(':selected').val() != '--Select--')
                    {
                        kra_data_target = $("#target_value").find(':selected').val();
                    }
                    if($("#KRA_description").val()!='' && !(data_length>150))
                    {
                       kra_description_data = $("#KRA_description").val();                     
                    }
                    if($("#Weightage").find(':selected').val() != '0')
                    {
                       kra_wt_data = $("#Weightage").find(':selected').val();                     
                    }
                    if (kra_num>0) 
                    {
                        var t1,t2,t3,t4,t5;
                        var string_num = /^([0-9])$/;
                         for (var i = 0; i < kra_num; i++) {                            
                                
                                    var selected_unit = $("#mask_number-"+i).find(':selected').val();
                                    if (kpi_unit == '')
                                    {
                                        kpi_unit = $("#mask_number-"+i).find(':selected').val();
                                    }
                                    else
                                    {
                                        kpi_unit = kpi_unit+';'+$("#mask_number-"+i).find(':selected').val();
                                    }
                                    if (final_kpi_wt == '') 
                                    {
                                        final_kpi_wt = $("#kpi_target_value-"+i).val();
                                    }
                                    else
                                    {
                                       final_kpi_wt = final_kpi_wt+';'+$("#kpi_target_value-"+i).val();
                                    } 
                                    if(selected_unit == 'Units' || selected_unit == 'Weight' || selected_unit == 'Value')
                                    {
                                       if (kpi_value == '')
                                        {
                                            kpi_value = $("#unit_value-"+i).val();
                                        }
                                        else
                                        {
                                            kpi_value = kpi_value+';'+$("#unit_value-"+i).val();
                                        } 
                                    }
                                    else if (selected_unit == 'Percentage' || selected_unit == 'Ratio' || selected_unit == 'Days' || selected_unit == 'Date' || selected_unit == 'Text') 
                                    {
                                        var chk = /[;-]/;

                                         if (($(".target_value1"+i).val()!='' && !chk.test($(".target_value1"+i).val())) && ($(".target_value2"+i).val()!='' && !chk.test($(".target_value2"+i).val())) && ($(".target_value3"+i).val()!='' && !chk.test($(".target_value3"+i).val())) && ($(".target_value4"+i).val()!='' && !chk.test($(".target_value4"+i).val())) && ($(".target_value5"+i).val()!='' && !chk.test($(".target_value5"+i).val()))) 
                                        {
                                        var date_data = '';
                                        t1 = $(".target_value1"+i).val();
                                        t2 = $(".target_value2"+i).val();
                                        t3 = $(".target_value3"+i).val();
                                        t4 = $(".target_value4"+i).val();
                                        t5 = $(".target_value5"+i).val();
                                        if (selected_unit == 'Date') 
                                        { 
                                            if (string.test(t1)) 
                                             {
                                                date_data = t1+'-'+''+'-'+''+'-'+''+'-'+'';
                                             }
                                             if (string.test(t2)) 
                                             {
                                                date_data = ''+'-'+t2+'-'+''+'-'+''+'-'+'';
                                             }
                                             if (string.test(t3)) 
                                             {
                                                date_data = ''+'-'+''+'-'+t3+'-'+''+'-'+'';
                                             }
                                             if (string.test(t4)) 
                                             {
                                                date_data = ''+'-'+''+'-'+''+'-'+t4+'-'+'';
                                             }
                                             if (string.test(t5)) 
                                             {
                                                date_data = ''+'-'+''+'-'+''+'-'+''+'-'+t5;
                                             }
                                             //////////////////// 2 ///////////////////////////
                                             if (string.test(t1) && string.test(t2)) 
                                             {
                                                date_data = t1+'-'+t2+'-'+''+'-'+''+'-'+'';
                                             }
                                             if (string.test(t1) && string.test(t3)) 
                                             {
                                                date_data = t1+'-'+''+'-'+t3+'-'+''+'-'+'';
                                             }
                                             if (string.test(t1) && string.test(t4)) 
                                             {
                                                date_data = t1+'-'+''+'-'+''+'-'+t4+'-'+'';
                                             }
                                            if (string.test(t1) && string.test(t5)) 
                                             {
                                                date_data = t1+'-'+''+'-'+''+'-'+''+'-'+t5;
                                             }
                                             if (string.test(t2) && string.test(t3)) 
                                             {
                                                date_data = ''+'-'+t2+'-'+t3+'-'+''+'-'+'';
                                             }
                                             if (string.test(t2) && string.test(t4)) 
                                             {
                                                date_data = ''+'-'+t2+'-'+''+'-'+t4+'-'+'';
                                             }
                                             if (string.test(t2) && string.test(t5)) 
                                             {
                                                date_data = ''+'-'+t2+'-'+''+'-'+''+'-'+t5;
                                             }
                                             if (string.test(t3) && string.test(t4)) 
                                             {
                                                date_data = ''+'-'+''+'-'+t3+'-'+t4+'-'+'';
                                             }
                                             if (string.test(t3) && string.test(t5)) 
                                             {
                                                date_data = ''+'-'+''+'-'+t3+'-'+''+'-'+t5;
                                             }
                                             if (string.test(t4) && string.test(t5)) 
                                             {
                                                date_data = ''+'-'+''+'-'+''+'-'+t4+'-'+t5;
                                             }                                            
                                             /////////////////////// 3/////////////////////
                                             if (string.test(t1) && string.test(t2) && string.test(t3)) 
                                             {
                                                date_data = t1+'-'+t2+'-'+t3+'-'+''+'-'+'';
                                             }
                                             if (string.test(t1) && string.test(t2) && string.test(t4)) 
                                             {
                                                date_data = t1+'-'+t2+'-'+''+'-'+t4+'-'+'';
                                             }
                                             if (string.test(t1) && string.test(t2) && string.test(t5)) 
                                             {
                                                date_data = t1+'-'+t2+'-'+''+'-'+''+'-'+t5;
                                             }
                                             if (string.test(t2) && string.test(t3) && string.test(t4)) 
                                             {
                                                date_data = ''+'-'+t2+'-'+t3+'-'+t4+'-'+'';
                                             }
                                             if (string.test(t2) && string.test(t4) && string.test(t5)) 
                                             {
                                                date_data = ''+'-'+t2+'-'+''+'-'+t4+'-'+t5;
                                             }
                                             if (string.test(t3) && string.test(t4) && string.test(t5)) 
                                             {
                                                date_data = ''+'-'+''+'-'+t3+'-'+t4+'-'+t5;
                                             }
                                             if (string.test(t4) && string.test(t5) && string.test(t1)) 
                                             {
                                                date_data = t1+'-'+''+'-'+''+'-'+t4+'-'+t5;
                                             }
                                             //////////////// 3 /////////////////////////////////////
                                             if (string.test(t1) && string.test(t2) && string.test(t3) && string.test(t4)) 
                                             {
                                                date_data = t1+'-'+t2+'-'+t3+'-'+t4+'-'+'';
                                             }
                                             if (string.test(t1) && string.test(t2) && string.test(t3) && string.test(t5)) 
                                             {
                                                date_data = t1+'-'+t2+'-'+t3+'-'+''+'-'+t5;
                                             }
                                             //////////////// 5 ////////////////////////////////
                                             if (string.test(t1) && string.test(t2) && string.test(t3) && string.test(t4) && string.test(t5)) 
                                             {
                                                date_data = t1+'-'+t2+'-'+t3+'-'+t4+'-'+t5;
                                             }
                                             if (kpi_value == '') 
                                            {
                                                kpi_value = date_data;
                                            }
                                            else
                                            {
                                                kpi_value = kpi_value+';'+date_data;
                                            } 
                                        }
                                        else
                                        {
                                            if (kpi_value == '') 
                                            {
                                                kpi_value = t1+'-'+t2+'-'+t3+'-'+t4+'-'+t5;
                                            }
                                            else
                                            {
                                                kpi_value = kpi_value+';'+t1+'-'+t2+'-'+t3+'-'+t4+'-'+t5;
                                            }
                                        }                                        
                                    }
                                    
                                    var chk1 = /[;]/;
                                    if(!chk1.test($("#kpilistyii_"+i).val()))
                                    {
                                        if (kpi_list == '')
                                        {
                                            kpi_list = $("#kpilistyii_"+i).val();
                                            
                                        }
                                        else
                                        {
                                            kpi_list = kpi_list+';'+$("#kpilistyii_"+i).val();
                                            
                                        }
                                    }

                                  }  
                            }
                    }
                    var kpi_total_number = 0;
                    if (data_length==0)
                    {
                        kra_complete_flag = 0;
                    }
                    else if(data_length>150)
                    {
                        kra_complete_flag = 0;
                    }
                    else
                    {
                        kra_complete_flag = 0;
                    }
                    if(error == '')
                    {
                        //alert($("#kpi_list_number").text());
                        var kra_num = $("#kpi_list_number").text();
                        var wtg_value = $("#Weightage").find(':selected').val();
                        var catergory = $("#target_value").find(':selected').val();
                        if(catergory == '--Select--')
                        {
                            kpi_total_number = 0;
                        }
                        else if(wtg_value == '0')
                        {
                            kpi_total_number = 0;
                        }
                        else
                        {

                            var kpi_list_data = 0;var add_value = 0;var final_kpi_total = 0;
                            for (var i = 0; i < kra_num; i++) {
                            var chk1 = /[;]/;
                                if ((!chk1.test($("#kpilistyii_"+i).val()) && $("#kpilistyii_"+i).val()!= '') && $("#mask_number-"+i).find(':selected').val()!='Select' && $("#kpi_target_value-"+i).val()!='') 
                                {
                                    kpi_list_data = parseInt(kpi_list_data)+parseInt(1);
                                }  
                                if ($("#kpi_target_value-"+i).val() == '') 
                                {
                                    add_value = 0;
                                }
                                else
                                {
                                    add_value = $("#kpi_target_value-"+i).val();
                                }
                                final_kpi_total = parseInt(final_kpi_total)+parseInt(add_value);      
                                                
                            }
                            
                                if (kpi_list_data <  $("#min_kpi").text()) 
                                {                                
                                    kra_complete_flag = 0;                                   
                                }
                                else
                                {                        
                                    for (var i = 0; i < kra_num; i++) {
                                    if ($("#mask_number-"+i).find(':selected').val() != 'Select' && $("#kpilistyii_"+i).val() != '' && $("#kpi_target_value-"+i).val() != '') 
                                    {                                        
                                        var selected_value = $("#mask_number-"+i).find(':selected').val();
                                        
                                        if (selected_value != 'Units' && selected_value != 'Weight' && selected_value != 'Value') 
                                        {
                                            if (selected_value == 'Date') 
                                            {
                                               
                                                    if (string.test($(".target_value1"+i).val()) && string.test($(".target_value2"+i).val()) && string.test($(".target_value3"+i).val()) && string.test($(".target_value4"+i).val()) && string.test($(".target_value5"+i).val())) 
                                                    {
                                                        kpi_total_number++;
                                                    } 
                                                  
                                            }
                                            else
                                            {
                                                var chk = /[;-]/;

                                                 if (($(".target_value1"+i).val()!='' && !chk.test($(".target_value1"+i).val())) && ($(".target_value2"+i).val()!='' && !chk.test($(".target_value2"+i).val())) && ($(".target_value3"+i).val()!='' && !chk.test($(".target_value3"+i).val())) && ($(".target_value4"+i).val()!='' && !chk.test($(".target_value4"+i).val())) && ($(".target_value5"+i).val()!='' && !chk.test($(".target_value5"+i).val()))) 
                                                {
                                                    kpi_total_number++;
                                                }
                                                
                                            } 

                                        }
                                        else if(selected_value == 'Units' || selected_value == 'Weight' || selected_value == 'Value')
                                        {
                                            
                                            if ($("#unit_value-"+i).val()!=''  && $("#unit_value-"+i).val() != "undefined") 
                                            {
                                                kpi_total_number++;
                                            } 
                                            
                                        }
                                         
                                    }                              
                                } 
                            }
                            
                        }
                    }

                    //alert(kpi_total_number);
                    if (kpi_total_number < kpi_list_data) 
                    {
                        kra_complete_flag = 0;
                    }
                    else if(!kpi_total_number < kpi_list_data)
                    {
                        kra_complete_flag = 1;
                    }

                        var data = {
                            'KRA_category' : kra_data_target,
                            'KRA_description' : kra_description_data,
                            'target' : kra_wt_data,
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                            'kpi_id_value' : kpi_id_value,
                            'KPI_target_value' : final_kpi_wt,
                            'kra_complete_flag' : kra_complete_flag,
                            'apr_id' : $("#new_apr").text()
                        };
                        console.log(data);
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                        
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Setgoals1/save_kpi',
                                success : function(data)
                                {
                                    // if (data != '') 
                                    // {
                                    //     alert(data); 
                                    // }
                                   //alert(data);
                                    if (data == "Success")
                                    {
                                         //alert(data);
                                        updated_kpi_value = kpi_id_value;
                                        // alert(kpi_id_value);
                                        //get_notify("KRA added successfully");
                                       $(".output_div1").load(location.href + " .output_div1");
                                        //location.reload();
                                    }
                                    // else if(data == 1)
                                    // {
                                    //     $('#user-form')[0].reset();
                                    // }
                                    
                                }
                            });
                        
                        console.log(data);
                   
                }

                function kpi_save_data()
                {
                    //alert("jhjk");
                    var kra_des = $("#KRA_description").val();
                    var final_kpi_total = 0;
                    //var string = /^(0[1-9]|[0-3][0-3])([/]{1})(0[1-9]|1[0-2])([/]{1})((19|20)[0-9]{2})$/;
                    var string_num = /^([0-9])*$/;
                     var data_length = kra_des.length;
                     //alert(data_length);
                    if (data_length==0)
                    {
                        error = 'Please enter KRA description';
                    }
                    else if(data_length>1000)
                    {
                        error = 'Maximum 1000 characters are allowed in KRA description';
                    }
                    else
                    {
                        error = '';
                    }
                    //alert("in");
                    if(error == '')
                    {
                        //alert("proceed");
                        var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';
                        var selected_unit = $(".format_list").find(':selected').val();
                        var wtg_value = $("#Weightage").find(':selected').val();
                        var catergory = $("#target_value").find(':selected').val();
                        if(catergory == '--Select--')
                        {
                            error = 'Please select KRA Category.';
                        }
                        else if(wtg_value == '0')
                        {
                            error = 'Please select Weightage.';
                        }
                        
 //else if($(".faculty_email_id").find(':selected').val() == 'Select' || $(".faculty_email_id").find(':selected').val() == '')
                       // {
                           // error = 'Please select Reporting Head.';
                       // }
                        else
                        {

                            var kpi_list_data = 0;var add_value = 0;final_kpi_total = 0;var final_kpi_wt = '';
                            for (var i = 0; i < kra_num; i++) {
                            
                                if ($("#kpilistyii_"+i).val()!= '' && $("#mask_number-"+i).find(':selected').val()!='Select') 
                                {
                                    kpi_list_data = parseInt(kpi_list_data)+parseInt(1);
                                }
                                 if ($("#kpi_target_value-"+i).val() != '' && $.isNumeric($("#kpi_target_value-"+i).val())) 
                                {
                                    if (final_kpi_wt == '') 
                                    {
                                        final_kpi_wt = $("#kpi_target_value-"+i).val();
                                        final_kpi_total = $("#kpi_target_value-"+i).val();
                                    }
                                    else
                                    {
                                       final_kpi_wt = final_kpi_wt+';'+$("#kpi_target_value-"+i).val();
                                        final_kpi_total = parseFloat(final_kpi_total)+parseFloat($("#kpi_target_value-"+i).val());
                                    }
                                   
                                }
                                else if(!$.isNumeric($("#kpi_target_value-"+i).val()) && $("#kpi_target_value-"+i).val() != '')
                                {                                     
                                    error = "Please enter only numbers in KPI Weightage field.";break;
                                }
                            }
                            
                            if(error == '')
                            {                                
                                if (kpi_list_data <  $("#min_kpi").text()) 
                                {                                
                                    error = 'Please Fill minimum '+$("#min_kpi").text()+' KPI';                                   
                                }
                                else
                                {                             
                                    for (var i = 0; i < kra_num; i++) {
                                   if ($("#mask_number-"+i).find(':selected').val() != 'Select' && $("#kpilistyii_"+i).val() != '') 
                                    {
                                        
                                        var selected_value = $("#mask_number-"+i).find(':selected').val();
                                         var chk1 = /[;]/;
                                        if(chk1.test($("#kpilistyii_"+i).val()))
                                        {
                                            error = "The KPI description field should not contain ; special character.";break;
                                        }
                                        else
                                        {
                        error = '';
                        if (kpi_list == '')
                                            {
                                                kpi_list = $("#kpilistyii_"+i).val();
                                                kpi_unit = $("#mask_number-"+i).find(':selected').val();
                                                
                                            }
                                            else
                                            {
                                                kpi_list = kpi_list+';'+$("#kpilistyii_"+i).val();
                                                kpi_unit = kpi_unit+';'+$("#mask_number-"+i).find(':selected').val();
                                                
                                            }
                                          
                                        }
                                        if (selected_value != 'Units' && selected_value != 'Weight' && selected_value != 'Value') 
                                        {
                                            if(selected_value == 'Percentage' || selected_value == 'Days')
                                            {
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !$.isNumeric($(".target_value1"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !$.isNumeric($(".target_value2"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !$.isNumeric($(".target_value3"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !$.isNumeric($(".target_value4"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !$.isNumeric($(".target_value5"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else
                                                {
                                                    error = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Date')
                                            {
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }                                               
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }                                                
                                                else
                                                {
                                                    error = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Text')
                                            {
                                                
                                                var chk = /[;-]/;
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($(".target_value1"+i).val()!='' && chk.test($(".target_value1"+i).val())) || ($(".target_value1"+i).val()!='' && $(".target_value1"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                               else if(($(".target_value2"+i).val()!='' && chk.test($(".target_value2"+i).val())) || ($(".target_value2"+i).val()!='' && $(".target_value2"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($(".target_value3"+i).val()!='' && chk.test($("#target_need3").text())) || ($(".target_value3"+i).val()!='' && $("#target_need3").text().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value4"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value4"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                               else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value5"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value5"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else
                                                {
                                                    error = '';var chk1 = /[;]/;
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }
                                                }
                                            }
                                            else if(selected_value == 'Ratio')
                                            {
                                                var ratio_chk = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !ratio_chk.test($(".target_value1"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !ratio_chk.test($(".target_value2"+i).val()))
                                                {
                                                    error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !ratio_chk.test($(".target_value3"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !ratio_chk.test($(".target_value4"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !ratio_chk.test($(".target_value5"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else
                                                {
                                                    error = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                            }
                                            
                                        }
                                        else if(selected_value == 'Units' || selected_value == 'Weight' || selected_value == 'Value')
                                        {
                                            
                                            if ($("#unit_value-"+i).val()==''  || $("#unit_value-"+i).val() === undefined) 
                                            {
                                                error = 'Please Fill unit value';break;
                                            }
                    else if ($("#unit_value-"+i).val() == 0 || $("#unit_value-"+i).val().length>6)
                                            {
                                                error = 'Minimum 1 and maximum 6 digits are allowed.';break;
                                            }                       
                                            else if (!$.isNumeric($("#unit_value-"+i).val())) 
                                            {
                                                error = 'Only numbers are allowed for Units/Weight/Value field.';break;
                                            }
                                            else
                                            {
                                                error = '';
                                                if (kpi_value == '')
                                                {
                                                    kpi_value = $("#unit_value-"+i).val();
                                                }
                                                else
                                                {
                                                    kpi_value = kpi_value+';'+$("#unit_value-"+i).val();
                                                }
                                                
                                            }
                                        }
                                        if (final_kpi_total != '' && final_kpi_total != 100) 
                                        {
                                            error = 'The Total for kpi score should be 100';break;
                                        }
                                        else
                                        {                                                    
                                           error = '';
                                        }

                                    }                                   
                                    else
                                    {
                                        error = '';
                                        if ($("#mask_number-"+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+i).val() != '' || $("#unit_value-"+i).val() != '')) 
                                        {
                                             error = 'Please Fill Correct KPI Details';break;
                                        }
                                        else  if ($("#mask_number-"+i).find(':selected').val() != 'Select' && ($("#kpilistyii_"+i).val() == '' || $("#unit_value-"+i).val() == '')) 
                                        {
                                            error = 'Please Fill Correct KPI Details';break;
                                        }
                                        else if(($("#mask_number-"+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+i).val() != '' || $("#unit_value-"+i).val() != '')) || ($("#kpilistyii_"+i).val() == '' && $("#mask_number-"+i).find(':selected').val() != 'Select'))
                                            {
                                                error = 'Please Fill Correct KPI Details';break;
                                            }
                                            else
                                            {
                                                error = '';
                                                // if (final_kpi_total != 100) 
                                                // {
                                                //     error = 'The Total for kpi score should be 100';break;
                                                // }
                                                // else
                                                // {                                                    
                                                //    error = '';
                                                // }
                                            }                                         
                                    }       
                            }
                                                              
                                } 
                            }
                            
                        }
                        
                        if (updated_kpi_value != '') 
                        {
                            kpi_id_value = updated_kpi_value;
                        }
                        //alert(error);
                        var data = {
                            'KRA_category' : $("#target_value").find(':selected').val(),
                            'KRA_description' : $("#KRA_description").val(),
                            'target' : $("#Weightage").find(':selected').val(),
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                            'KPI_target_value' : final_kpi_wt,
                            'kpi_id_value' : kpi_id_value,
                            'submit_kra_click' : 'yes',
                            'reoprting_to' : $("#new_apr").text(),
                            'new_goalsheet_state' : $("#gaolsheet_type").text()
                        };
                        console.log(data);
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                        if(error != '')
                        {
                             $("#err").show();  
                             //$("#err").fadeOut(6000);
                             $("#error_value").text(error);
                            $("#err").addClass("alert-danger");
                        }
                        else
                         { 
                            $("#err").hide(); 
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Setgoals1/savekpi',
                                success : function(data)
                                {
                                    //alert(data);
                                    if (data == "Success")
                                    {
                                        updated_kpi_value = kpi_id_value;
                                       $(".output_div1").load(location.href + " .output_div1");
                                        location.reload();
                                       
                                    }
                                    
                                }
                            });
                        }
                        
                        console.log(data);
                    }
                    else
                    {

                        $("#err").show();  
                        //$("#err").fadeOut(6000);
                        $("#error_value").text(error);
                        $("#err").addClass("alert-danger");
                    }
                }
                 
                $(function(){
                    $("body").on('click','.send_for_appraisal',function(){
            $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger");
                     var total = 0;
                    var total_goal = $("#count_goal").text();
                  //alert(total_goal);
                    var j = jQuery.noConflict();
                    console.log(total_goal);
                    $(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
                    if(total_goal < 4)
                    {
                        $("#err").show();  
                        $("#err").fadeOut(6000);
                        $("#error_value").text("Minimum 4 KRA Required.");
                        $("#err").addClass("alert-danger");
                    }                    
                    else
                    {
                        for (var i = 1; i <= total_goal; i++) 
                        {
                            
                                if(total != 0)
                                {
                                    total = parseInt(total)+parseInt($("#total_"+i).text());
                                } 
                                else
                                {
                                    total = $("#total_"+i).text();
                                }
                        }
                            //alert(total);
                        if (total!=100) 
                        {
                            $("#err").show();  
                            $("#err").fadeOut(6000);
                            $("#error_value").text("Total of KRA should be 100 only.");
                            $("#err").addClass("alert-danger");
                           
                        }
                        else
                        { 
                             var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;var chk_compl = 0;var chk_compl1 = 0;
                                var get_list = $("#compulsory_id").text();
                                var get_list_value = get_list.split(';');
                                var prgrm_cmd = ''; var chk = /[;]/; var topic = '';var date_value = '';var faculty_value = '';var development_data = '';var number_of_meetings = '';var faculty_value1 = '';
                                for (var i = 0; i < $("#total_prog").text(); i++) {
                                    if (get_list != '') 
                                    {
                                        for (var j = 0; j < get_list_value.length; j++) {                                
                                                if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() === undefined || $("#program_cmd-"+get_list_value[j]).val() == '' || chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                                {
                                                    chk_cmnts = 0;chk_compl = 0;
                                                    $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                                   
                                                } 
                                                else if($("#program_cmd-"+get_list_value[j]).val().length>500)
                                                {
                                                chk_cmnts = 0;chk_compl = 0;chk_compl1 = 1;
                                                                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                                }
                                                else if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() != 'undefined' && $("#program_cmd-"+get_list_value[j]).val() != '' || !chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                                {chk_compl1 = 0;
                                                    $("#program_cmd-"+get_list_value[j]).css('border-color','');chk_compl++;
                                                }         
                                        }
                                    }
                                   if ($("#complusory_prg"+i).text() != '' && $("#complusory_prg"+i).text() != 'undefined')
                                    {
                                       var comp_loc = $("#complusory_prg"+i).text();
                                                var comp_loc_list = comp_loc.split(';');
                                              for (var k = 0; k < comp_loc_list.length; k++) { 
                                                  if (comp_loc_list[k] == $("#company_loc").text() && ($("#program_cmd-"+i).val() === undefined || $("#program_cmd-"+i).val() == '' || chk.test($("#program_cmd-"+i).val())))
                                                    {  
                                                      //alert(comp_loc_list[k]);
                                                        chk_cmnts = 0;chk_compl = 0;
                                                        $("#program_cmd-"+i).css('border-color','red');break;
                                                       
                                                    }  
                                                    else if (comp_loc_list[k] != $("#company_loc").text() && ($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' || !chk.test($("#program_cmd-"+i).val())))
                                                    {chk_compl1 = 0;
                                                        $("#program_cmd-"+i).css('border-color','');chk_compl++;
                                                    }   
                                               }  
                                    }
                                    
                                    if (!($("#program_cmd-"+i).val() === undefined || $("#program_cmd-"+i).val() == '' || chk.test($("#program_cmd-"+i).val())))
                                    {
                                        if (prgrm_cmd == '') 
                                        {
                                            prgrm_cmd = i+'?'+$("#program_cmd-"+i).val();
                                        }
                                        else
                                        {
                                            prgrm_cmd = prgrm_cmd+';'+i+'?'+$("#program_cmd-"+i).val();
                                        }
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','');
                                        $("#program_cmd-"+i).css('border-color','');
                                         chk_cmnts++;
                                    }                
                                }
                                for (var i = 0; i < 2; i++) {
                                   if (!($(".topic"+i).val() === undefined && $("#days_required"+i).val() === undefined && $("#faculty_email_id"+i).find(":selected").val() === undefined)) 
                                   {
                                    
                                        if (($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select') && ($("#days_required"+i).val()!='' && !$.isNumeric($("#days_required"+i).val()))))
                                            {
                                                $(".topic"+i).css('border-color','red');
                                                $("#days_required"+i).css('border-color','red');
                                                $("#faculty_email_id"+i).css('border-color','red');
                                                chk_cmnts1++;
                                            }
                                            else
                                            { chk_cmnts1== 0;
                                                if (topic == '') 
                                                {
                                                    topic = $(".topic"+i).val();
                                                    date_value = $("#days_required"+i).val();
                                                    faculty_value = $("#faculty_email_id"+i).find(":selected").val();
                                                }
                                                else
                                                {
                                                    topic = topic+';'+$(".topic"+i).val();
                                                    date_value = date_value+';'+$("#days_required"+i).val();
                                                    faculty_value = faculty_value+';'+$("#faculty_email_id"+i).find(":selected").val();
                                                }
                                                $(".topic"+i).css('border-color','');
                                                $("#days_required"+i).css('border-color','');
                                                $("#faculty_email_id"+i).css('border-color','');
                                                $("#error_spec1").text("");
                                            }
                                   }  
                                   else
                                   {
                                    chk_cmnts1 = 0;
                                   }                                 
                                }
                                for (var i = 3; i <= 4; i++) {
                                   if (($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()!='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()===undefined))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()!='' && !$.isNumeric($("#number_of_meetings"+i).val()) && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()=='undefined'))))
                                    {
                                        $(".target_date"+i).css('border-color','red');
                                        $("#number_of_meetings"+i).css('border-color','red');
                                        $("#faculty_email_id"+i).css('border-color','red');
                                        chk_cmnts2++;
                                    }
                                    else
                                    {
                                        chk_cmnts2== 0;
                                        if (development_data == '') 
                                        {
                                            development_data = $("#target_date"+i).val();
                                            number_of_meetings = $("#number_of_meetings"+i).val();
                                            faculty_value1 = $("#faculty_email_id"+i).val();
                                        }
                                        else
                                        {
                                            development_data = development_data+';'+$("#target_date"+i).val();
                                            number_of_meetings = number_of_meetings+';'+$("#number_of_meetings"+i).val();
                                            faculty_value1 = faculty_value1+';'+$("#faculty_email_id"+i).val();
                                        }
                                        $(".target_date"+i).css('border-color','');
                                        $("#number_of_meetings"+i).css('border-color','');
                                        $("#faculty_email_id"+i).css('border-color','');
                                        $("#error_spec2").text("");
                                    }
                                }
                    
                   str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                                            str1 = $("#emp_code").text().replace(/\s+/g, '');
                                            var base_url = window.location.origin;
                                             var detail_data = {
                                                prgrm_cmd: prgrm_cmd,
                                                topic: topic,
                                                date_value: date_value,
                                                faculty_value: faculty_value,
                                                development_data: development_data,
                                                number_of_meetings: number_of_meetings,
                                                faculty_value1: faculty_value1,
                                                project_title: $("#project_title1").val(),
                                                review_date: $("#review_date").val(),
                                                target_end_date: $("#target_end_date").val(),
                                                project_scope: $("#project_scope").val(),
                                                project_exclusion: $("#project_exclusion").val(),
                                                Project_deliverables: $(".project_deliverables").val(),
                                                learn_from_project: $(".learn_from").val(),
                                                Reviewer: $(".reviewvers_name").val(),
                                                emp_code : str1,
                                                Reporting_officer1_id: str
                                            };

                                           if (chk_cmnts == 0 || chk_compl<get_list_value.length) 
                                    {
                                         $('body').animate({
                                            scrollTop: ($(".error_row_chk").first().offset().top)
                                        },500);
                                          $("#error_spec1").text("Please fill all required fields for program comments(Note : special character ';' not allowed).");                          
                                    }
                                    else if(chk_cmnts1 != 0)
                                    {
                                         $('body').animate({
                                            scrollTop: ($(".error_row_chk").first().offset().top)
                                        },500);
                                          $("#error_spec1").text("Please provide all the details if you need other program.");   
                                    }
                                    //else if(chk_cmnts2 != 0)
                                    //{
                                         //$('body').animate({
                                          //  scrollTop: ($(".error_row_chk2").first().offset().top)
                                       // },500);
                                       //   $("#error_spec2").text("Please provide all the details for Development through developmental relationships.");   
                                    //}
                                    else
                                    {
                                        $("#error_spec1").text("");
                                        $("#error_spec2").text("");
                                        if($("#project_title1").val() == '' || $("#project_title1").val().length>500)
                                        {
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#project_title1").css('border-color','red');
                                                $("#error_spec4").text("Please provide project title(Note: 500characters are maximum limit).");   
                                        }
                                        else if($("#review_date").val() == '')
                                        {
                                             $("#project_title1").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#review_date").css('border-color','red');
                                                $("#error_spec4").text("Please provide project review date.");
                                        }
                                        else if($("#target_end_date").val() == '')
                                        {
                                           $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#target_end_date").css('border-color','red');
                                                $("#error_spec4").text("Please provide project target end date.");
                                        }
                                        else if($("#project_scope").val() == '' || $("#project_scope").val().length>500)
                                        {
                                            $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#project_scope").css('border-color','red');
                                                $("#error_spec4").text("Please provide project scope(Note: 500characters are maximum limit).");   
                                        }
                                        else if($("#project_exclusion").val() == '' || $("#project_exclusion").val().length>500)
                                        {
                                            $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $("#project_scope").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#project_exclusion").css('border-color','red');
                                                $("#error_spec4").text("Please provide project exclusion(Note: 500characters are maximum limit).");   
                                        }
                                         else if($(".project_deliverables").val() == '' || $(".project_deliverables").val().length>500)
                                        {
                                            $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $("#project_scope").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $(".project_deliverables").css('border-color','red');
                                                $("#error_spec4").text("Please provide comments in project deliverables field(Note: 500 characters are maximum limit).");   
                                        }
                                        else if($(".learn_from").val() == '' || $(".learn_from").val().length>300)
                                        {
                                          $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $("#project_scope").css('border-color','');
                                             $(".project_deliverables").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $(".learn_from").css('border-color','red');
                                                $("#error_spec4").text("Please provide comments in what is expected to learn from this project(Note: 300 characters are maximum limit).");   
                                        }
                                        else if($(".reviewvers_name").val() == '' || $(".reviewvers_name").val().length>50)
                                        {
                                          $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $("#project_scope").css('border-color','');
                                             $(".project_deliverables").css('border-color','');
                                             $(".learn_from").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $(".reviewvers_name").css('border-color','red');
                                                $("#error_spec4").text("Please provide reviewer(s) name(Note: 50 characters are maximum limit).");   
                                        }
                                        else
                                        {
                                             str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                                            str1 = $("#emp_code").text().replace(/\s+/g, '');
                                            var base_url = window.location.origin;
                                             var detail_data = {
                                                prgrm_cmd: prgrm_cmd,
                                                topic: topic,
                                                date_value: date_value,
                                                faculty_value: faculty_value,
                                                development_data: development_data,
                                                number_of_meetings: number_of_meetings,
                                                faculty_value1: faculty_value1,
                                                project_title: $("#project_title1").val(),
                                                review_date: $("#review_date").val(),
                                                target_end_date: $("#target_end_date").val(),
                                                project_scope: $("#project_scope").val(),
                                                project_exclusion: $("#project_exclusion").val(),
                                                Project_deliverables: $(".project_deliverables").val(),
                                                learn_from_project: $(".learn_from").val(),
                                                Reviewer: $(".reviewvers_name").val(),
                                                emp_code : str1,
                                                Reporting_officer1_id: str
                                            };

                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'html',
                                                'data' : detail_data,
                                                'url' : base_url+'/index.php?r=IDP/save_data1',
                                                success : function(data)
                                                {
                                                    $("#project_title1").css('border-color','');
                                                    $("#review_date").css('border-color','');
                                                    $("#target_end_date").css('border-color','');
                                                    $("#project_scope").css('border-color','');
                                                    $("#project_exclusion").css('border-color','');
                                                    $("#error_spec1").text("");
                                                    $("#error_spec2").text("");
                                                    $("#error_spec3").text("");
                                                    $("#error_spec4").text("");
                                                    jQuery("#static").modal('show');
                                                    $("#continue_goal_set").click(function(){
                                                        $("#show_spin").show();
                                                         var base_url = window.location.origin;
                                                            $.ajax({
                                                                type : 'post',
                                                                datatype : 'html',
                                                                url : base_url+'/index.php?r=Setgoals1/sendmail',
                                                                success : function(data)
                                                                {
                                                                    //alert(data);
                                                                    $("#show_spin").hide(); 
                                                                    $("#send_for_appraisal").hide();
                                                                    $("#err").show();  
                                                                    $("#err").fadeOut(6000);
                                                                    $("#error_value").text("Notification Sent to appraiser");
                                                                    $("#err").addClass("alert-success");                       
                                                                }
                                                            });
                                                    });
                                                }
                                            });
                                        }
                                        
                                    }                    
                            
                          
                        }
                    }
                    });
                });
                {
                    

                }
               
          
                function get_target_value()
                {
                    //alert($('.target_value').find(':selected').val());
                     var selected_unit = {
                            'kra_category' : $('.target_value').find(':selected').val(),
                    }
                    $("#get_target_value").css('display','none');
                    
                    var base_url = window.location.origin;
                     $.ajax({
                            type : 'post',
                            datatype : 'json',
                            data : selected_unit,
                            url : base_url+'/index.php?r=Setgoals1/gettarget_value',
                            success : function(data)
                            { 
                                //alert(detail[2]);
                                var detail = jQuery.parseJSON(data);
                                $("#kpi_record").html(detail[0]);
                                $("#kpi_list_number").html(detail[1]);
                                $("#min_kpi").text(detail[2]);
                                $("#max_kpi").text(detail[3]);
                                var target_value_need = detail[4].split(';');
                                $("#target_need1").text(target_value_need[0]);
                                $("#target_need2").text(target_value_need[1]);
                                $("#target_need3").text(target_value_need[2]);
                                $("#target_need4").text(target_value_need[3]);
                                $("#target_need5").text(target_value_need[4]);
                            }
                        });
                }
                $(function(){
                ////////////
                })
                </script>

                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->

       <label id = 'company_loc'><?php if(isset($emp_data['0']['company_location'])) { echo $emp_data['0']['company_location']; } ?></label>
         <script type="text/javascript">
             $(function(){
$(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
               $(".save_data").click(function(){
                    var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_compl = 0;var chk_compl1 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                    var prgrm_cmd = ''; var topic = '';var date_value = '';var faculty_value = '';var chk = /[;]/;
                    for (var i = 0; i < $("#total_prog").text(); i++) {
                        if (get_list != '') 
                        {
                            for (var j = 0; j < get_list_value.length; j++) {                                
                                    if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() === undefined || $("#program_cmd-"+get_list_value[j]).val() == '' || chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {
                                        chk_cmnts = 0;chk_compl = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                       
                                    } 
else if($("#program_cmd-"+get_list_value[j]).val().length>500)
{
chk_cmnts = 0;chk_compl = 0;chk_compl1 = 1;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
} 
                                    else if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() != 'undefined' && $("#program_cmd-"+get_list_value[j]).val() != '' || !chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {chk_compl1 = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','');chk_compl++;
                                    }         
                            }
                        }
if($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' && $("#program_cmd-"+i).val().length>500)
{
chk_compl1 = 1;
 $("#program_cmd-"+i).css('border-color','red');break;

}
else if ($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' && !chk.test($("#program_cmd-"+i).val()))
                        {chk_compl1 = 0;
                            if (prgrm_cmd == '') 
                            {
                                prgrm_cmd = i+'?'+$("#program_cmd-"+i).val();
                            }
                            else
                            {
                                prgrm_cmd = prgrm_cmd+';'+i+'?'+$("#program_cmd-"+i).val();
                            }
                            $("#program_cmd-"+get_list_value[j]).css('border-color','');
                             chk_cmnts++;
                        }
                        // else
                        // {
                        //   chk_cmnts = 0;
                        // }                         
                    }
                    //alert(chk_compl);
                    for (var i = 1; i <= 2; i++) {
                       if (($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select') && ($("#days_required"+i).val()!='' && !$.isNumeric($("#days_required"+i).val()))))
                        {
                            $(".topic"+i).css('border-color','red');
                            $("#days_required"+i).css('border-color','red');
                            $("#faculty_email_id"+i).css('border-color','red');
                            chk_cmnts1++;
                        }
                        else
                        { chk_cmnts1== 0;
                            if (topic == '') 
                            {
                                topic = $(".topic"+i).val();
                                date_value = $("#days_required"+i).val();
                                faculty_value = $("#faculty_email_id"+i).find(":selected").val();
                            }
                            else
                            {
                                topic = topic+';'+$(".topic"+i).val();
                                date_value = date_value+';'+$("#days_required"+i).val();
                                faculty_value = faculty_value+';'+$("#faculty_email_id"+i).find(":selected").val();
                            }
                            $(".topic"+i).css('border-color','');
                            $("#days_required"+i).css('border-color','');
                            $("#faculty_email_id"+i).css('border-color','');
                            $("#error_spec1").text("");
                        }
                    }
                    
if (chk_compl1 == 1) 
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                          $("#error_spec1").text("Maximum 500 characters are allowed for program comments.");                          
                    }
else if (chk_cmnts == 0 || chk_compl<get_list_value.length) 
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                          $("#error_spec1").text("Please fill all required fields for program comments(Note : special character ';' not allowed).");                          
                    }
                    else if(chk_cmnts1 != 0)
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                          $("#error_spec1").text("Please provide all the details if you need other program.");   
                    }                    
                    else
                    {
                        var base_url = window.location.origin;
                        str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                        str1 = $("#emp_code").text().replace(/\s+/g, '');
                        $("#error_spec1").text("");
                        var detail_data = {
                            prgrm_cmd: prgrm_cmd,
                            topic: topic,
                            date_value: date_value,
                            faculty_value: faculty_value,
                            emp_code : str1,
                            Reporting_officer1_id: str
                        };                       
                        $.ajax({
                            'type' : 'post',
                            'datatype' : 'html',
                            'data' : detail_data,
                            'url' : base_url+'/index.php?r=IDP/save_data',
                            success : function(data)
                            {
                              jQuery("#static").modal('show');
                              $("#continue_IDP_set").click(function(){
                                $("#updation_spinner").css('display','block');
                                     $.ajax({
                                    'type' : 'post',
                                    'datatype' : 'html',
                                    'data' : detail_data,
                                    'url' : base_url+'/index.php?r=IDP/send_for_approval',
                                    success : function(data)
                                    {
                                      jQuery("#static").modal('toggle');
                                      $("#updation_spinner").css('display','none');
                                        $("#err").show();  
                                        $("#err").fadeOut(6000);
                                        $("#err").text("Notification Send to appraiser Successfully.");
                                        $("#err").addClass("alert-success");  

                                    }
                                  });
                                  });
                            }
                        });
                        //alert(chk_cmnts);
                    }
                    
                });


                $(".save_data1").click(function(){
                    var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;var chk_compl = 0;var chk_compl1 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                    var prgrm_cmd = ''; var chk = /[;]/; var topic = '';var date_value = '';var faculty_value = '';var development_data = '';var number_of_meetings = '';var faculty_value1 = '';
                    for (var i = 0; i < $("#total_prog").text(); i++) {
                        if (get_list != '') 
                        {
                            for (var j = 0; j < get_list_value.length; j++) {                                
                                    if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() === undefined || $("#program_cmd-"+get_list_value[j]).val() == '' || chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {
                                        chk_cmnts = 0;chk_compl = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                       
                                    } 
                                    else if($("#program_cmd-"+get_list_value[j]).val().length>500)
                                    {
                                    chk_cmnts = 0;chk_compl = 0;chk_compl1 = 1;
                                                                            $("#program_cmd-"+get_list_value[j]).css('border-color','red');break;
                                    }
                                    else if (get_list_value[j] == i && ($("#program_cmd-"+get_list_value[j]).val() != 'undefined' && $("#program_cmd-"+get_list_value[j]).val() != '' || !chk.test($("#program_cmd-"+get_list_value[j]).val())))
                                    {chk_compl1 = 0;
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','');chk_compl++;
                                    }         
                            }
                        }
                       if ($("#complusory_prg"+i).text() != '' && $("#complusory_prg"+i).text() != 'undefined')
                        {
                           var comp_loc = $("#complusory_prg"+i).text();
                                    var comp_loc_list = comp_loc.split(';');
                                  for (var k = 0; k < comp_loc_list.length; k++) { 
                                      if (comp_loc_list[k] == $("#company_loc").text() && ($("#program_cmd-"+i).val() === undefined || $("#program_cmd-"+i).val() == '' || chk.test($("#program_cmd-"+i).val())))
                                        {  
                                          //alert(comp_loc_list[k]);
                                            chk_cmnts = 0;chk_compl = 0;
                                            $("#program_cmd-"+i).css('border-color','red');break;
                                           
                                        }  
                                        else if (comp_loc_list[k] != $("#company_loc").text() && ($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' || !chk.test($("#program_cmd-"+i).val())))
                                        {chk_compl1 = 0;
                                            $("#program_cmd-"+i).css('border-color','');chk_compl++;
                                        }   
                                   }  
                        }
                        
                        if (!($("#program_cmd-"+i).val() === undefined || $("#program_cmd-"+i).val() == '' || chk.test($("#program_cmd-"+i).val())))
                        {
                            if (prgrm_cmd == '') 
                            {
                                prgrm_cmd = i+'?'+$("#program_cmd-"+i).val();
                            }
                            else
                            {
                                prgrm_cmd = prgrm_cmd+';'+i+'?'+$("#program_cmd-"+i).val();
                            }
                            $("#program_cmd-"+get_list_value[j]).css('border-color','');
                            $("#program_cmd-"+i).css('border-color','');
                             chk_cmnts++;
                        }                
                    }
                    for (var i = 1; i <= 2; i++) {
                       if (($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select') && ($("#days_required"+i).val()!='' && !$.isNumeric($("#days_required"+i).val()))))
                        {
                            $(".topic"+i).css('border-color','red');
                            $("#days_required"+i).css('border-color','red');
                            $("#faculty_email_id"+i).css('border-color','red');
                            chk_cmnts1++;
                        }
                        else
                        { chk_cmnts1== 0;
                            if (topic == '') 
                            {
                                topic = $(".topic"+i).val();
                                date_value = $("#days_required"+i).val();
                                faculty_value = $("#faculty_email_id"+i).find(":selected").val();
                            }
                            else
                            {
                                topic = topic+';'+$(".topic"+i).val();
                                date_value = date_value+';'+$("#days_required"+i).val();
                                faculty_value = faculty_value+';'+$("#faculty_email_id"+i).find(":selected").val();
                            }
                            $(".topic"+i).css('border-color','');
                            $("#days_required"+i).css('border-color','');
                            $("#faculty_email_id"+i).css('border-color','');
                            $("#error_spec1").text("");
                        }
                    }
                    for (var i = 3; i <= 4; i++) {
                       if (($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()!='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()===undefined))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()!='' && !$.isNumeric($("#number_of_meetings"+i).val()) && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()=='undefined'))))
                        {
                            $(".target_date"+i).css('border-color','red');
                            $("#number_of_meetings"+i).css('border-color','red');
                            $("#faculty_email_id"+i).css('border-color','red');
                            chk_cmnts2++;
                        }
                        else
                        {
                            chk_cmnts2== 0;
                            if (development_data == '') 
                            {
                                development_data = $("#target_date"+i).val();
                                number_of_meetings = $("#number_of_meetings"+i).val();
                                faculty_value1 = $("#faculty_email_id"+i).val();
                            }
                            else
                            {
                                development_data = development_data+';'+$("#target_date"+i).val();
                                number_of_meetings = number_of_meetings+';'+$("#number_of_meetings"+i).val();
                                faculty_value1 = faculty_value1+';'+$("#faculty_email_id"+i).val();
                            }
                            $(".target_date"+i).css('border-color','');
                            $("#number_of_meetings"+i).css('border-color','');
                            $("#faculty_email_id"+i).css('border-color','');
                            $("#error_spec2").text("");
                        }
                    }
                    
   str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                            str1 = $("#emp_code").text().replace(/\s+/g, '');
                            var base_url = window.location.origin;
                             var detail_data = {
                                prgrm_cmd: prgrm_cmd,
                                topic: topic,
                                date_value: date_value,
                                faculty_value: faculty_value,
                                development_data: development_data,
                                number_of_meetings: number_of_meetings,
                                faculty_value1: faculty_value1,
                                project_title: $("#project_title1").val(),
                                review_date: $("#review_date").val(),
                                target_end_date: $("#target_end_date").val(),
                                project_scope: $("#project_scope").val(),
                                project_exclusion: $("#project_exclusion").val(),
                                Project_deliverables: $(".project_deliverables").val(),
                                learn_from_project: $(".learn_from").val(),
                                Reviewer: $(".reviewvers_name").val(),
                                emp_code : str1,
                                Reporting_officer1_id: str
                            };

                           if (chk_cmnts == 0 || chk_compl<get_list_value.length) 
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                          $("#error_spec1").text("Please fill all required fields for program comments(Note : special character ';' not allowed).");                          
                    }
               
                    
                    else
                    {
                        $("#error_spec1").text("");
                        $("#error_spec2").text("");
                        if($("#project_title1").val() == '' || $("#project_title1").val().length>500)
                        {
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_title1").css('border-color','red');
                                $("#error_spec3").text("Please provide project title(Note: 500characters are maximum limit).");   
                        }
                        else if($("#review_date").val() == '')
                        {
                             $("#project_title1").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#review_date").css('border-color','red');
                                $("#error_spec3").text("Please provide project review date.");
                        }
                        else if($("#target_end_date").val() == '')
                        {
                           $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#target_end_date").css('border-color','red');
                                $("#error_spec3").text("Please provide project target end date.");
                        }
                        else if($("#project_scope").val() == '' || $("#project_scope").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_scope").css('border-color','red');
                                $("#error_spec3").text("Please provide project scope(Note: 500characters are maximum limit).");   
                        }
                        else if($("#project_exclusion").val() == '' || $("#project_exclusion").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $("#project_exclusion").css('border-color','red');
                                $("#error_spec3").text("Please provide project exclusion(Note: 500characters are maximum limit).");   
                        }
                         else if($(".project_deliverables").val() == '' || $(".project_deliverables").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $(".project_deliverables").css('border-color','red');
                                $("#error_spec4").text("Please provide comments in project deliverables field(Note: 500 characters are maximum limit).");   
                        }
                        else if($(".learn_from").val() == '' || $(".learn_from").val().length>300)
                        {
                          $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $(".project_deliverables").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $(".learn_from").css('border-color','red');
                                $("#error_spec4").text("Please provide comments in what is expected to learn from this project(Note: 300 characters are maximum limit).");   
                        }
                        else if($(".reviewvers_name").val() == '' || $(".reviewvers_name").val().length>50)
                        {
                          $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $(".project_deliverables").css('border-color','');
                             $(".learn_from").css('border-color','');
                             $('body').animate({
                                scrollTop: ($(".error_row_chk1").first().offset().top)
                            },500);
                                $(".reviewvers_name").css('border-color','red');
                                $("#error_spec4").text("Please provide reviewer(s) name(Note: 50 characters are maximum limit).");   
                        }
                        else
                        {
                             str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                            str1 = $("#emp_code").text().replace(/\s+/g, '');
                            var base_url = window.location.origin;
                             var detail_data = {
                                prgrm_cmd: prgrm_cmd,
                                topic: topic,
                                date_value: date_value,
                                faculty_value: faculty_value,
                                development_data: development_data,
                                number_of_meetings: number_of_meetings,
                                faculty_value1: faculty_value1,
                                project_title: $("#project_title1").val(),
                                review_date: $("#review_date").val(),
                                target_end_date: $("#target_end_date").val(),
                                project_scope: $("#project_scope").val(),
                                project_exclusion: $("#project_exclusion").val(),
                                Project_deliverables: $(".project_deliverables").val(),
                                learn_from_project: $(".learn_from").val(),
                                Reviewer: $(".reviewvers_name").val(),
                                emp_code : str1,
                                Reporting_officer1_id: str
                            };
//alert(prgrm_cmd);
                            $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : detail_data,
                                'url' : base_url+'/index.php?r=IDP/save_data1',
                                success : function(data)
                                {
                                    alert(data);
                                   jQuery("#static").modal('show');
                              $("#continue_IDP_set").click(function(){
                                $("#updation_spinner").css('display','block');
                                     $.ajax({
                                    'type' : 'post',
                                    'datatype' : 'html',
                                    'data' : detail_data,
                                    'url' : base_url+'/index.php?r=IDP/send_for_approval',
                                    success : function(data)
                                    {
                                      jQuery("#static").modal('toggle');
                                      $("#updation_spinner").css('display','none');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $("#err").text("Notification Send to appraiser Successfully.");
                                      window.setTimeout(function() {
    window.location.href = base_url+'/index.php/User_dashboard';
}, 1000);  
                                    }
                                  });
                                  });
                                }
                            });

                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                            $("#project_scope").css('border-color','');
                            $("#project_exclusion").css('border-color','');
                            $("#error_spec1").text("");
                            $("#error_spec2").text("");
                            $("#error_spec3").text("");
                            $("#error_spec4").text("");
                            //alert(chk_cmnts);
                        }
                        
                    }
                    
                    
                });
             });
         </script>
