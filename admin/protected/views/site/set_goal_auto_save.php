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
       
       table.mid-table td { border:1px solid red; height:55px;min-height: 55px;max-height: 55px}
       table.mid-table th { border:1px solid red; height:55px;min-height: 55px;max-height: 55px}
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
                            url : base_url+'/index.php?r=Setgoals/kpi_del',
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
                                            url : base_url+'/index.php?r=Setgoals/fetch_field',
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
                                            url : base_url+'/index.php?r=Setgoals/kpi_list',
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
                                   <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=IDP"> <button type="button"  class="btn dark btn-outline">OK</button>
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
                                    <p> Are you sure you want to send goals to appraiser? </p>
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
                                <div class="mt-bootstrap-tables" <?php if(isset($edit_flag) && $edit_flag == 1) { ?>style="display: block"<?php } else if(isset($kpi_data['0']['KRA_status_flag']) && $kpi_data['0']['KRA_status_flag']>0) { ?>style="display: none"<?php }else if(isset($kpi_data) && count($kpi_data)>=5) { ?>style="display: none"<?php } ?>>
                                    <div class="row">
                                     <?php 
                                        $form=$this->beginWidget('CActiveForm', array(
                                       'id'=>'user-form',
                                        'enableClientValidation'=>true,
                                        'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                        //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
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
                                                            <?php echo CHtml::textField('KRA_description',$kpi_desc,array('style'=>'float: left;','class'=>'form-control')); ?>
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
                                             {?>
                                            <?php echo CHtml::button('Update',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'kpi_update_data')); ?>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
                                            <?php }else{ ?>
                                            <?php echo CHtml::button('Submit',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'submit_kra','onclick'=>'js:kpi_save_data()')); ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                     
                                    </div>
                                    <?php $this->endWidget(); ?>
                                       
                                    </div> 
                                     
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#employee_table').DataTable();
                                                });
                                            </script>                                           
                                       
                                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                                        <div class="output_div1">
                                        <?php
                                            if (isset($kpi_data)) { $cnt_num = 1; ?>
                                            <label class='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
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
                                                                                   
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo$kpi_list_target[$i];  ?>">
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
                                                                       <!--  <td class="numeric"><a href="<?php echo $this->createUrl('Setgoals/kpi_edit', array('KPI_id' => $row['KPI_id']));
     ?>"><i class="fa fa-pencil fa-fw" title="Delete" aria-hidden="true"></i></a><i class="fa fa-trash-o del_kpi" style="cursor: pointer;" id="KPI_id-<?php echo $row['KPI_id']; ?>" title="Delete" aria-hidden="true"></i></td> -->
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>                              
                                                    </tbody>
                                                    <?php
                                                        if (isset($row['KRA_status']) && $row['KRA_status'] != 'Approved') {
                                                    ?>
                                                    <a href="<?php echo $this->createUrl('index.php/Setgoals/kpi_edit', array('KPI_id' => $row['KPI_id']));
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
                                        <!-- END SAMPLE TABLE PORTLET-->      
                                        <?php 
                                            if (isset($kpi_data) && count($kpi_data)>0) { ?>
                                          <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>     
                                         <div class="btn-group col-md-6" style="float:left">
                    <?php if(isset($kpi_data['0']['KRA_status_flag']) && !($kpi_data['0']['KRA_status_flag']>0)) { ?>
                                        <?php echo CHtml::button('Send to manager for approval',array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>'send_for_appraisal','onclick'=>'js:send_notification();')); ?><?php } ?>
                                        <?php } ?>
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
                                url : base_url+'/index.php?r=Setgoals/update_kpi',
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
                            'kra_complete_flag' : kra_complete_flag
                        };
                        console.log(data);
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                        
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Setgoals/save_kpi',
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
                            'submit_kra_click' : 'yes'
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
                                url : base_url+'/index.php?r=Setgoals/savekpi',
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
                    var total_goal = $(".count_goal").text();
                    var j = jQuery.noConflict();
                    console.log(total_goal);
                    $(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
                    if($("#prg_cnt").text() == 0)
                    {
                        jQuery("#static_prg").modal('show');
                    }   
                    else if(total_goal < 4)
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
                            jQuery("#static").modal('show');
                            $("#continue_goal_set").click(function(){
                                $("#show_spin").show();
                                 var base_url = window.location.origin;
                                    $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        url : base_url+'/index.php?r=Setgoals/sendmail',
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
                            url : base_url+'/index.php?r=Setgoals/gettarget_value',
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

