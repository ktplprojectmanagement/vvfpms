<?php
// Yii::app()->controller->renderPartial('//site/all_js');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
                        $("body").on('click','.getapprove',function(){  
                    var error_count = 0;var error_count1 = 0;var error_count2 = ''; 
                    var id_value = $(this).attr('id')+';'+0;
                    var kra_id_value1 = id_value.split(';');      
                    var kra_des = $("#KRA_description").val();
                    var string = /^(0[1-9]|[0-3][0-3])([/]{1})(0[1-9]|1[0-2])([/]{1})((19|20)[0-9]{2})$/;
                    var string_num = /^([0-9])$/;var checkwt = /[-]/;
                     var data_length = kra_des.length;var final_kpi_wt = '';
                    var error = [];
                    for (var j = 0; j < $("#total_kra_number").text(); j++) { error[kra_id_value1[j]] = [];
                        var kra_num = $("#kpi_list_number"+kra_id_value1[j]).text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';var goal_status = '';var final_kpi_total1 = 0;
                           
                            var kpi_list_data = 0;var add_value = 0;var final_kpi_total = 0;var final_kpi_wt1 =''; var final_kpi_wt2 =''; var final_kpi_wt3 = '';    
                            for (var i = 0; i < 1; i++) {
                                if ($("#Weightage"+kra_id_value1[j]+i).val() != 0 && $("#kpilistyii_"+kra_id_value1[j]+i).val()!= '' && $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val()!='Select') 
                                {
                                    kpi_list_data = parseInt(kpi_list_data)+parseInt(1);
                                    if (($("#kpi_target_value-"+kra_id_value1[j]+i).val() != '' && !checkwt.test($("#kpi_target_value-"+kra_id_value1[j]+i).val()) && $("#kpi_target_value-"+kra_id_value1[j]+i).val() != 0) && $.isNumeric($("#kpi_target_value-"+kra_id_value1[j]+i).val())) 
                                        {
                                            var kpi_wt = $("#kpi_target_value-"+kra_id_value1[j]+i).val(); 
                                            final_kpi_wt3 = 1;
                                            if (final_kpi_wt1 == '') 
                                                {
                                                    final_kpi_wt1 = $("#kpi_target_value-"+kra_id_value1[j]+i).val();
                        final_kpi_wt2 = $("#kpi_target_value-"+kra_id_value1[j]+i).val();
                                                }
                                                else
                                                {
                                                   final_kpi_wt1 = final_kpi_wt1+';'+$("#kpi_target_value-"+kra_id_value1[j]+i).val();
                        final_kpi_wt2 = parseFloat(final_kpi_wt2)+parseFloat($("#kpi_target_value-"+kra_id_value1[j]+i).val());
                                                }
                        
                                        }
                                         else if($("#kpi_target_value-"+kra_id_value1[j]+i).val() != '')
                                        {
                                            final_kpi_wt3 = 0;
                                        error[kra_id_value1[j]] = "Please enter valid numbers in KPI Weightage field.";error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                        }
                                }
                                else
                                {
                                    error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;                               
                                }
                            }
                                if($(".kra_category-"+kra_id_value1[j]).find(':selected').val() == '--Select--' || $(".kra_category-"+kra_id_value1[j]).find(':selected').val() == '' || $(".kra_category-"+kra_id_value1[j]).find(':selected').val() === undefined)
                                {
                                     error[kra_id_value1[j]] = 'Please Select KRA Category';error_count1 = kra_id_value1[j];error_count2 = kra_id_value1[j];break;       
                                }
else if($(".KRA_description-"+kra_id_value1[j]).val() == '' || $(".KRA_description-"+kra_id_value1[j]).val() === undefined)
                                {
                                     error[kra_id_value1[j]] = 'Please enter KRA description';error_count1 = kra_id_value1[j];error_count2 = kra_id_value1[j];break;       
                                } 
                              else if($("#Weightage"+kra_id_value1[j]).find(':selected').val() == '0')
                              {
                                 error[kra_id_value1[j]] = 'Please KRA select Weightage.';error_count1 = kra_id_value1[j];error_count2 = kra_id_value1[j];break;       
                              }    
                                else if (error[kra_id_value1[j]] == '') 
                                {
                                    
                 $(".KRA_description-"+kra_id_value1[j]).css('border-color','');                  
                                    for (var i = 0; i < kra_num; i++) {
                                    var selected_unit = $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                    if ($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() != 'Select' && $("#kpilistyii_"+kra_id_value1[j]+i).val() != '') 
                                    {
                                        var selected_value = $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                         if (kpi_list == '')
                                        {
                                            kpi_list = $("#kpilistyii_"+kra_id_value1[j]+i).val();
                                            kpi_unit = $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                            
                                        }
                                        else
                                        {
                                            kpi_list = kpi_list+';'+$("#kpilistyii_"+kra_id_value1[j]+i).val();
                                            kpi_unit = kpi_unit+';'+$("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                            
                                        }
                                        if (selected_value != 'Units' && selected_value != 'Weight' && selected_value != 'Value') 
                                        {var chk_per = /[-]/;
                                            if(selected_value == 'Percentage')
                                            {
                                               //alert($(".target_need1").text());               
//alert($(".target_value1"+kra_id_value1[j]+i).text());
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need1").text() != 'undefined' || $(".target_need1").text() === undefined) && (!$.isNumeric($(".target_value1"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value1"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_value1"+kra_id_value1[j]+i).text()>100 || $(".target_value1"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value1"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need2").text() != 'undefined' || $(".target_need2").text() === undefined) && (!$.isNumeric($(".target_value2"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value2"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value2"+kra_id_value1[j]+i).text()>100 || $(".target_value2"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value2"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need3").text() != 'undefined' || $(".target_need3").text() === undefined) && (!$.isNumeric($(".target_value3"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value3"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value3"+kra_id_value1[j]+i).text()>100 || $(".target_value3"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value3"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need4").text() != 'undefined' || $(".target_need4").text() === undefined) && (!$.isNumeric($(".target_value4"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value4"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value4"+kra_id_value1[j]+i).text()>100 || $(".target_value4"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value4"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need5").text() != 'undefined' || $(".target_need5").text() === undefined) && (!$.isNumeric($(".target_value5"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value5"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value5"+kra_id_value1[j]+i).text()>100 || $(".target_value5"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should contain maximum 100 value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value5"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
var val1 = '';var val2 = '';var val3 = '';var val4 = '';var val5 = '';
                                                    error[kra_id_value1[j]] = '';
if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }

                                                }
                                            }
                                            else  if(selected_value == 'Days')
                                            {
                                               //alert($(".target_need1").text());               
//alert($(".target_value1"+kra_id_value1[j]+i).text());
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need1").text() != 'undefined' || $(".target_need1").text() === undefined) && (!$.isNumeric($(".target_value1"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value1"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value1"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need2").text() != 'undefined' || $(".target_need2").text() === undefined) && (!$.isNumeric($(".target_value2"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value2"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value2"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need3").text() != 'undefined' || $(".target_need3").text() === undefined) && (!$.isNumeric($(".target_value3"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value3"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value3"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need4").text() != 'undefined' || $(".target_need4").text() === undefined) && (!$.isNumeric($(".target_value4"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value4"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value4"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need5").text() != 'undefined' || $(".target_need5").text() === undefined) && (!$.isNumeric($(".target_value5"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value5"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value5"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
                                                    var val1 = '';var val2 = '';var val3 = '';var val4 = '';var val5 = '';
                                                    error[kra_id_value1[j]] = '';
if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Date')
                                            {
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                               
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                else
                                                {
                                                    error[kra_id_value1[j]] = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =$(".target_value1"+kra_id_value1[j]+i).val()+'-'+$(".target_value2"+kra_id_value1[j]+i).val()+'-'+$(".target_value3"+kra_id_value1[j]+i).val()+'-'+$(".target_value4"+kra_id_value1[j]+i).val()+'-'+$(".target_value5"+kra_id_value1[j]+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+kra_id_value1[j]+i).val()+'-'+$(".target_value2"+kra_id_value1[j]+i).val()+'-'+$(".target_value3"+kra_id_value1[j]+i).val()+'-'+$(".target_value4"+kra_id_value1[j]+i).val()+'-'+$(".target_value5"+kra_id_value1[j]+i).val();                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Text')
                                            {
                                                
                                                var chk = /[;-]/;
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if((chk.test($(".target_value1"+kra_id_value1[1]+i).val()) || ($(".target_value1"+kra_id_value1[j]+i).val()!='' && $(".target_value1"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value1"+kra_id_value1[1]+i).attr('value')) || ($(".target_value1"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value1"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if((chk.test($(".target_value2"+kra_id_value1[1]+i).val()) || ($(".target_value2"+kra_id_value1[j]+i).val()!='' && $(".target_value2"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value2"+kra_id_value1[1]+i).attr('value')) || ($(".target_value2"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value2"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if((chk.test($(".target_value3"+kra_id_value1[1]+i).val()) || ($(".target_value3"+kra_id_value1[j]+i).val()!='' && $(".target_value3"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value3"+kra_id_value1[1]+i).attr('value')) || ($(".target_value3"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value3"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if((chk.test($(".target_value4"+kra_id_value1[1]+i).val()) || ($(".target_value4"+kra_id_value1[j]+i).val()!='' && $(".target_value4"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value4"+kra_id_value1[1]+i).attr('value')) || ($(".target_value4"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value4"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if((chk.test($(".target_value5"+kra_id_value1[1]+i).val()) || ($(".target_value5"+kra_id_value1[j]+i).val()!='' && $(".target_value5"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value5"+kra_id_value1[1]+i).attr('value')) || ($(".target_value5"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value5"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
//alert($(".target_value1"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value2"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value3"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value4"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value5"+kra_id_value1[j]+i).attr('value'));
                                                                                   error[kra_id_value1[j]] = '';
                                                   if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }


                                                }
                                            }
                                            else if(selected_value == 'Ratio')
                                            {
                                                var ratio_chk = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value1"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value1"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value2"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value2"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                    error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if(!ratio_chk.test($(".target_value3"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value3"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value4"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value4"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value5"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value5"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
                                                    error[kra_id_value1[j]] = '';
                                                   if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }

                                                }
                                            }
                                        }
                                        else if(selected_value == 'Units' || selected_value == 'Weight' || selected_value == 'Value')
                                        {

                                             var string_num = /^([0-9.]{1,100})$/;
                                            if ($("#unit_value-"+kra_id_value1[j]+i).val()=='' || $("#unit_value-"+kra_id_value1[j]+i).val() === undefined || !string_num.test($("#unit_value-"+kra_id_value1[j]+i).val())) 
                                            {
                                                error[kra_id_value1[j]] = 'Please Fill unit value';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }
                                             else if ($("#unit_value-"+kra_id_value1[j]+i).val() == 0 || $("#unit_value-"+kra_id_value1[j]+i).val().length>6)
                                            {
                                                error[kra_id_value1[j]] = 'Minimum 1 and maximum 6 digits are allwed.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }                                             
                                            else if (!$.isNumeric($("#unit_value-"+kra_id_value1[j]+i).val())) 
                                            {
                                                error[kra_id_value1[j]] = 'Only numbers are allowed for Units/Weight/Value field.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }
                                            else
                                            {
                                               
if($("#unit_value-"+kra_id_value1[j]+i).val() != '')
{
val1 = $("#unit_value-"+kra_id_value1[j]+i).val();
}
else if($("#unit_value-"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $("#unit_value-"+kra_id_value1[j]+i).attr('value');
}

                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1;                                   
                                                    }
                                                //alert(kpi_value);
                                            }
                                        }

                                        if($("#goal_status-"+kra_id_value1[j]).find(':selected').val() == 'Select')
                                            {
                                                 error[kra_id_value1[j]] = 'Please Select KRA Status';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }
                                        else
                                        {                                           
                                            error[kra_id_value1[j]] = '';                                         
                                            goal_status = $("#goal_status-"+kra_id_value1[j]).find(':selected').val();
                                        } 
                                        //alert(final_kpi_wt2);
                                        // if (final_kpi_wt2 !='' && final_kpi_wt2 != 100) 
                                        //     {
                                        //         error[kra_id_value1[j]] = 'The Total of the kpi score should be 100';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                        //     }   
                                  
                                      
                                    }
                                    else
                                    {
                                        if ($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+kra_id_value1[j]+i).val() != '' || $("#unit_value-"+kra_id_value1[j]+i).val() != '')) 
                                        {
                                             error[kra_id_value1[j]] = 'Please Fill Correct KPI Details';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                        }
                                        else  if ($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() != 'Select' && ($("#kpilistyii_"+kra_id_value1[j]+i).val() == '' || $("#unit_value-"+kra_id_value1[j]+i).val() == '')) 
                                        {
                                            error[kra_id_value1[j]] = 'Please Fill Correct KPI Details';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                        }
                                        else if(($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+kra_id_value1[j]+i).val() != '' || $("#unit_value-"+kra_id_value1[j]+i).val() != '')) || ($("#kpilistyii_"+kra_id_value1[j]+i).val() == '' && $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() != 'Select'))
                                            {
                                                error[kra_id_value1[j]] = 'Please Fill Correct KPI Details';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }                   
                                            else
                                            {
                                                 error[kra_id_value1[j]] = ''; 

                                            }                                 
                                    }          
                                }                                                         
                                } 
                        // alert("in0");
                       $("#show_spin2").css('display','block');
                        if(error[kra_id_value1[j]] == '')
                          { 
                                            //alert("good");
                                            var base_url = window.location.origin;
                                            var data = { 
                                                'target' : $("#Weightage"+kra_id_value1[j]).find(':selected').val(),                           
                                                'target_unit' : kpi_unit,
                                                'target_value1' : kpi_value,
                                                'kpi_list' : kpi_list,
                                                'KPI_target_value' : final_kpi_wt1,
                                                'KPI_id' : kra_id_value1[j],
                                                'goal_status' : goal_status,
                                                'KRA_category' : $(".kra_category-"+kra_id_value1[j]).find(':selected').val(),
                                                'KRA_description' : $(".KRA_description-"+kra_id_value1[j]).val(),
                                                'reoprting_to' : $(".faculty_email_id1"+kra_id_value1[j]).find(':selected').val(),
                                            };

                                            $.ajax({
                                                type : 'post',
                                                datatype : 'html',
                                                data : data,
                                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/update_emp_kpi',
                                                success : function(data)
                                                {
                                                    var kra_val = $("#kpi_record-"+data).parent().parent().parent().attr('id');
//var kra_val = $("."+kra_val1).closest('div').attr('id');
//alert(kra_val);
                                                   $("#"+kra_val).load(location.href + " #"+kra_val);
                                                   $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Changes saved successfully");
                                    $("#err").fadeOut(6000);
$("#"+data).parent().find('input').css('display','block');
                                                    
                                                }
                                            });
                            error_count++;
                          }
                          else
                          {
                            break; 
                          } 
                        }
            $("#err").hide();
                        //alert("in1");
                            $("#err").hide();$("#show_spin2").css('display','none');
                            if(error_count1 != '')
                            {
                                //alert(error_count2);
                                //alert(error[error_count2]);
                                $('body').animate({
                                    scrollTop: ($("#kra_sheet_"+error_count2).parent().offset().top)
                                },500);
                if($(".kra_category-"+error_count1).find(':selected').val() == '--Select--')
                                {
                                    $(".kra_category-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                else if(error[error_count2] == 'Please enter KRA description')
                                {
                                    $(".KRA_description-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if($("#Weightage"+error_count2).find(':selected').val() == 0)
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $("#Weightage"+error_count2).css('border-color','red');
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if($("#kpilistyii_"+error_count1).val() == '')
                                {
                                    $("#kpilistyii_"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if($("#mask_number-"+error_count1).find(':selected').val() == 'Select')
                                {
                                    $("#mask_number-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if(error[error_count2] == 'The Total for kpi score should be 100')
                                {
                                    $("#kpi_target_value-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if(error[error_count2] == 'Please Fill unit value')
                                {
                                    $("#unit_value-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if (error[error_count2] == 'Target 1 value is compulsory.') 
                                {
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $(".target_value1"+error_count1).css('border-color','red');
                                }
                                else if (error[error_count2] == 'Target 2 value is compulsory.') 
                                {
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $(".target_value2"+error_count1).css('border-color','red');
                                }
                                else if (error[error_count2] == 'Target 3 value is compulsory.') 
                                {
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $(".target_value3"+error_count1).css('border-color','red');
                                }
                                else if (error[error_count2] == 'Target 4 value is compulsory.') 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $(".target_value4"+error_count1).css('border-color','red');
                                }
                                 else if (error[error_count2] == 'Target 5 value is compulsory.') 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //$(".target_value5"+error_count1).css('border-color','red');
                                }
                                else
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $(".review_comment"+error_count1).css('border-color','red');
                                }                       
                          } 
                          
                });
                    });
</script>
            <style type="text/css">
        .page-header .page-header-menu .hor-menu .navbar-nav>li .dropdown-menu li>a:hover{
            background-color:#4B77BE; 
        }
        .page-footer{
            background-color: #154593;
            color:#fff;
        }
        .blink_me {
            -webkit-animation-name: blinker;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: infinite;

            -moz-animation-name: blinker;
            -moz-animation-duration: 1s;
            -moz-animation-timing-function: linear;
            -moz-animation-iteration-count: infinite;

            animation-name: blinker;
            animation-duration: 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @-moz-keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

        @-webkit-keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

        @keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
        }

        </style>

       <style type="text/css">
            #target
            {
                display: none;
            }
       </style>       
<!-- BEGIN CONTAINER -->
    <label id="flag_value" style="display: none"><?php if(isset($edit_flag_chk) && $edit_flag_chk == 1) { echo $edit_flag_chk; }?></label>
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <h4><?php if(isset($emp_data['0']['Emp_fname'])) { echo 'Employee Name : '.$emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?>
                             <lable style="float: right;"><?php if(isset($emp_data['0']['Department'])) { echo 'Department : '.$emp_data['0']['Department']; } ?></lable>
                        </h4>
                       
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
 #target_goal
                {
                   display: none; 
                }
                #target_idp
                {
                    display: none;
                }
                </style>
<style type="text/css">
                .popover-content{
   min-width:30px;
   max-width:400px;
   word-break: break-all;
}
            </style>
                <style media="all" type="text/css">      
      #err { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
        width: 374px;
    height: 55px;
    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;
    right: 45%;
background-color: #AB5454;
color: #FFF;
font-weight: bold;  
      }
      
   </style>
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
   <label id="correct_emp_id" style="display:none"><?php if(isset($emp_data['0']['Employee_id']) && $emp_data['0']['Employee_id'] !='') { echo $emp_data['0']['Employee_id']; } ?></label>
                    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>             
            <script type="text/javascript">

            var j = jQuery.noConflict();
                j(function(){     
                    j(".date_pickup").datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '2016:2017',minDate: '1/Apr/2016',maxDate: '31/Mar/2017',onSelect: function () {
           j(".date_pickup").attr('value',$(this).val());
        }});
                    j(".date_pickup").attr('onkeydown','return false');  
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger");               
                    $("body").on('click','.del_kpi',function(){
                        jQuery("#del_goal").modal('show');
                        var id = $(this).attr('id');
                        var id_value = id.split('-');                        
                        var data = {
                        'KPI_id' : id_value[1],
                        };                       
                        var base_url = window.location.origin;
                        $("body").on('click','#del_goal_set',function(){
                             $("#show_spin").css('display','block');
                             $.ajax({                            
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/kpi_del1',
                            success : function(data)
                            {
                                //alert(id_value[1]);
                                $("#show_spin").css('display','none');
                                jQuery('#del_goal').modal('toggle');
                                $("#err").show();  
                                $("#err").fadeOut(6000);
                                $("#err").text("Notification Sent to Employee");
                                $("#err").addClass("alert-success");  
                                $("#KPI_id-"+id_value[1]).parent().parent().parent().parent().fadeOut(1000);
                               
                                //$("#output_div_edit").load(location.href + " #output_div_edit");
                                $("#show_goal").show();  
                            };
                        });
                        });                       
                    }); 
                          
                }); 
                
            </script>
    <style type="text/css">
                .popover{
   min-width:30px;
   max-width:400px;
   overflow-wrap:break-word;
}
            </style>
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
        $("body").on('click','.add_kpi',function(){
                        //alert($(this).attr('id'));
                        var value = $(this).attr('id');
                        var get_id = value.split('-');
                        //alert(get_id);
$(this).css('display','none');
                        //alert($(this).attr('id'));
                         var selected_unit = {
                                'kra_category' : $("#kpi_cat_value-"+get_id[1]).text(),
                                'kra_id' : get_id[1],
                                'kpi_last_id' : get_id[2],
                                //'extra_kpi' : $("#no_ki_extra-"+get_id[1]).val(),
                'extra_kpi' : 1,
                        }
                        //alert($('.target_value').find(':selected').val());
                        var base_url = window.location.origin;
                         $.ajax({
                                type : 'post',
                                datatype : 'json',
                                data : selected_unit,
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/gettarget_value1',
                                success : function(data)
                                { 
var detail = jQuery.parseJSON(data);
                                  if(detail[0] == '<lable style="color:red">Maximum 7 KPI are allowed to add.</lable>')
{
 $("#err").css('display','block');
$("#err").fadeOut(6000);
$("#error_value").text("Maximum 7 KPI are allowed to add.");
$('#'+get_id[1]).css('display','none');
}
else
{
$("#extra_kpi"+get_id[1]).show(); 
$("#extra_kpi"+get_id[1]).html(detail[0]);
$("#kpi_list_number"+get_id[1]).text(detail[1]);
} 
                                
                                }
                            });
});
            $("body").on('click','.del_kra_kpi_extra',function(){
                        var value = $(this).attr('id');
                        var get_id = value.split('-');                        
                        var lastChar = get_id[1].substr(get_id[1].length - 1);
var ltr_str = get_id[1].substring(0,get_id[1].length - 1);
                        $("#kpilist_"+get_id[1]).closest('tr').css('display','none');
                                         $("#add_kpi-"+ltr_str+"-"+lastChar).css('display','block');
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
                                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/fetch_field',
                                            success : function(data)
                                            {
                                        
                                                var res = data.split(","); 
                                                $(".target_value1"+id_value[1]).attr('value',res[0]);
                                                $(".target_value2"+id_value[1]).attr('value',res[1]);
                                                $(".target_value3"+id_value[1]).attr('value',res[2]);
                                                $(".target_value4"+id_value[1]).attr('value',res[3]);
                                                $(".target_value5"+id_value[1]).attr('value',res[4]);
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
                                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/kpi_list',
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
                                    $(".target_value1"+id_value[1]).attr('value','');
                                    $(".target_value2"+id_value[1]).attr('value','');
                                    $(".target_value3"+id_value[1]).attr('value','');
                                    $(".target_value4"+id_value[1]).attr('value','');
                                    $(".target_value5"+id_value[1]).attr('value','');

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
                    if ($("#flag_value").text() == 1) 
                                        {
                                            $("#targetvalue1"+id_value[1]).css('display','none');
                                            $("#targetvalue11"+id_value[1]).css('display','');
                                            $("#targetvalue2"+id_value[1]).css('display','none');
                                            $("#targetvalue22"+id_value[1]).css('display','');
                                            $("#targetvalue3"+id_value[1]).css('display','none');
                                            $("#targetvalue33"+id_value[1]).css('display','');
                                            $("#targetvalue4"+id_value[1]).css('display','none');
                                            $("#targetvalue44"+id_value[1]).css('display','');
                                            $("#targetvalue5"+id_value[1]).css('display','none');
                                            $("#targetvalue55"+id_value[1]).css('display','');
                                        }
                                        else
                                        {
                                            $("#targetvalue1"+id_value[1]).css('display','');
                                            $("#targetvalue11"+id_value[1]).css('display','none'); 
                                            $("#targetvalue2"+id_value[1]).css('display','');
                                            $("#targetvalue22"+id_value[1]).css('display','none');  
                                            $("#targetvalue3"+id_value[1]).css('display','');
                                            $("#targetvalue33"+id_value[1]).css('display','none'); 
                                            $("#targetvalue4"+id_value[1]).css('display','');
                                            $("#targetvalue44"+id_value[1]).css('display','none'); 
                                            $("#targetvalue5"+id_value[1]).css('display','');
                                            $("#targetvalue55"+id_value[1]).css('display','none');                                            
                                        }
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
                                       
                                        j("#unit_value-"+id_value[1]).datepicker("destroy");      
                                        j(".target_value1"+id_value[1]).datepicker("destroy");
                                        j(".target_value2"+id_value[1]).datepicker("destroy");
                                        j(".target_value3"+id_value[1]).datepicker("destroy");
                                        j(".target_value4"+id_value[1]).datepicker("destroy");
                                        j(".target_value5"+id_value[1]).datepicker("destroy");
                                       
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
                                          j(".target_value1"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '2016:2017',minDate: '1/Apr/2016',maxDate: '31/Mar/2017',onSelect: function () {
           j(".target_value1"+id_value[1]).attr('value',$(this).val());
        }});
                                            j(".target_value2"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',yearRange: '2016:2017',minDate: '1/Apr/2016',maxDate: '31/Mar/2017',onSelect: function () {
           j(".target_value2"+id_value[1]).attr('value',$(this).val());
        }});
                                            j(".target_value3"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',yearRange: '2016:2017',minDate: '1/Apr/2016',maxDate: '31/Mar/2017',onSelect: function () {
           j(".target_value3"+id_value[1]).attr('value',$(this).val());
        }});
                                            j(".target_value4"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',yearRange: '2016:2017',minDate: '1/Apr/2016',maxDate: '31/Mar/2017',onSelect: function () {
           j(".target_value4"+id_value[1]).attr('value',$(this).val());
        }});
                                            j(".target_value5"+id_value[1]).datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',yearRange: '2016:2017',minDate: '1/Apr/2016',maxDate: '31/Mar/2017',onSelect: function () {
           j(".target_value5"+id_value[1]).attr('value',$(this).val());
        }});
                                                                                       
                                           
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
                                            j(".target_value1"+id_value[1]).datepicker("destroy");
                                            j(".target_value2"+id_value[1]).datepicker("destroy");
                                            j(".target_value3"+id_value[1]).datepicker("destroy");
                                            j(".target_value4"+id_value[1]).datepicker("destroy");
                                            j(".target_value5"+id_value[1]).datepicker("destroy");
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
<script>
$(document).ready(function(){
$('[data-toggle="popover"]').popover();
});
</script>
            <script type="text/javascript">
                 $(function(){
$("body").on('mouseover','.validate_field1',function(){
if($(this).val() == '')
{
$(this).popover('hide');
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
$("body").on('scroll','.validate_field1',function(){
 $(this).popover('hide');
});

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
                            var chk = /[;-]/;var chk_per = /[-]/;
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
                                        $("#error_value").text("KPI Text unit should contain maximum 150 characters.");
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
                                        $("#error_value").text("Please enter valid value in ratio field(Example 1:2)");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }
else if($("#mask_number-"+last_id_value).find(':selected').val() == 'Percentage')
                                {
                                    if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Percentage' && $(this).val()>100) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Percentage should contain maximum 100 value.");
                                    }
                                 else if (chk_per.test($(this).val())) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Please enter valid number in percentage");
                                }
                                    else if (!$.isNumeric($(this).val())) 
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
else if($("#mask_number-"+last_id_value).find(':selected').val() == 'Days')
                                {
                                    if (chk_per.test($(this).val())) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Please enter valid number in Days");
                                }
                                    else if (!$.isNumeric($(this).val())) 
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
                                else if (!$.isNumeric($(this).val())) 
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
                            var string1 = /^([0-9])*$/;var chk_per = /[-]/;
                            if ($(this).val() != '' && !$.isNumeric($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("KPI Weightage should contain only numbers.");
                            }
                            else if ($(this).val() != '' && chk_per.test($(this).val())) 
                                   {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid KPI Weightage");
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
                                    if ($("#mask_number-"+id_value[1]).find(':selected').val() == 'Select') 
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
                                    else if($.isNumeric($(this).val()))
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
                                var ratio_chk1 = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;var chk_per = /[-]/;
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
                                        $("#error_value").text("Please enter valid value in ratio field(Example 1:2)");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }
else if($("#mask_number-"+last_id_value).find(':selected').val() == 'Percentage')
                                {
                                    if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Percentage' && $(this).val()>100) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Percentage should contain maximum 100 value.");
                                    }
                                     else if (chk_per.test($(this).val())) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Please enter valid number in percentage");
                                }
                                    else if (!$.isNumeric($(this).val())) 
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
else if($("#mask_number-"+last_id_value).find(':selected').val() == 'Days')
                                {
                                    if (chk_per.test($(this).val())) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Please enter valid number in days");
                                }
                                    else if (!$.isNumeric($(this).val())) 
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
                                else if (!$.isNumeric($(this).val())) 
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
                    $("body").on('keyup','.validate_field1',function(){

                        $(this).attr('value',$(this).val());
                        $(this).text($(this).val());

                        if ($(this).attr('id') === undefined) 
                        {
                             var id = $(this).attr('id');
                           var class_name = $(this).attr('class');
                        var class_value = class_name.split(' ');var chk = /[;-]/;
                        var last_id_value1 = class_value[3].charAt(12);
                        var last_id_value = class_value[3].split("target_value"+last_id_value1);
                        var string1 = /^([0-9])([.]{1})([0-9])*$/;
                        var ratio_chk1 = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                        var last_id = class_value[3].length - 1;
                            if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text')
                                {

                                    if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text' && chk.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI with unit Text should not contain special characters like '-;'.");
                                    }
                                    else if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text' && $(this).val().length>2000) 
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
                                else if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Ratio')
                                {
                                    if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Ratio' && !ratio_chk1.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please enter valid value in ratio field(Example 1:2)");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }                                
                                else if (!$.isNumeric($(this).val())) 
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
                        if (id.charAt(0) == 'd' && id.charAt(1) == 'p') 
                        {
                            var class_name = $(this).attr('class');
                                var class_value = class_name.split(' ');var chk = /[;-]/;
                                var last_id_value1 = class_value[3].charAt(12);
                                var last_id_value = class_value[3].split("target_value"+last_id_value1);
                                var string1 = /^([0-9])([.]{1})([0-9])*$/;
                                var ratio_chk1 = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                                var last_id = class_value[3].length - 1;
                                if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text')
                                {
                                    if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text' && chk.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI with unit Text should not contain special characters like '-;'.");
                                    }
                                    else if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text' && $(this).val().length>2000) 
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
                                else if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Ratio')
                                {
                                    if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Ratio' && !ratio_chk1.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please enter valid value in ratio field(Example 1:2)");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                } 
                                else if (!$.isNumeric($(this).val())) 
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
                            else if($(this).val().length>2000)
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("KPI description should not contain only 2000 characters");
                            }
                            else if(!string1.test($(this).val()))
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }                        
                       else if(id_value_text[0] == 'kpi')
                        { 
                            var string1 = /^([0-9])*$/;var chk_per = /[-]/;
                            if ($(this).val() != '' && !$.isNumeric($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("KPI Weightage should contain only numbers.");
                            }
                            else if ($(this).val() != '' && chk_per.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid KPI Weightage");
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
                                    if ($("#mask_number-"+id_value[1]).find(':selected').val() == 'Select') 
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
                                    else if($.isNumeric($(this).val()))
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
                                var last_id_value1 = class_value[3].charAt(12);
                                var last_id_value = class_value[3].split("target_value"+last_id_value1);
                                var string1 = /^([0-9])([.]{1})([0-9])*$/;
                                var ratio_chk1 = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                                var last_id = class_value[3].length - 1;var chk_per = /[-]/;
                                if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text')
                                {
                                    if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text' && chk.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("KPI with unit Text should not contain special characters like '-;'.");
                                    }
                                    else if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Text' && $(this).val().length>2000) 
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
                                else if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Ratio')
                                {
                                    if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Ratio' && !ratio_chk1.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please enter valid value in ratio field(Example 1:2)");
                                    }
                                    else
                                    {
                                         $("#err").css('display','none');
                                        $(this).css('border','1px solid #999');
                                    }
                                }
      else if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Percentage')
                                {
                                    if ($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Percentage' && $(this).val()>100) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Percentage should contain maximum 100 value.");
                                    }
                                    else if (chk_per.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please enter valid number in percentage");
                                    }                                
                                    else if (!$.isNumeric($(this).val())) 
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
                                else if($("#mask_number-"+last_id_value[1]).find(':selected').val() == 'Days')
                                {
                                    if (chk_per.test($(this).val())) 
                                    {
                                        $("#err").css('display','block');
                                        $("#err").addClass("alert-danger"); 
                                        $(this).css('border','1px solid red');
                                        $("#error_value").text("Please enter valid number in days");
                                    }
                                        else if (!$.isNumeric($(this).val())) 
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
                                else if (!$.isNumeric($(this).val())) 
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
                                    <p> <i class="fa fa-check" style="color:green"></i> Goal Sheet submitted </p>
                                    <p> <i class="fa fa-times" style="color:red"></i> IDP not approved </p>
                                </div>
                                <div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/IDP/subordinate_idp'),
                                                                ));
                                                                 ?>
<?php if(isset($emp_data['0']['Employee_id'])) { echo CHtml::textField('emp_id',$emp_data['0']['Employee_id'],array('style'=>'display:none;')); } ?>
<?php echo CHtml::textField('chk_goalsheet_flag','1',array('style'=>'display:none;')); ?>
                                                                  <?php echo CHtml::submitButton('OK',array('style'=>'float:right','class'=>'btn dark btn-outline')); ?>
<?php 
                                        $this->endWidget(); 
                                        ?> 
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
                                    <p> Are you sure you want to approve <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?> goalsheet? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button><div id="show_spin1" style="display: none;margin-top: 10px;float: right;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                       <div id="agree_box" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> Please agree if discussion with this employee is completed.</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button"  data-dismiss="modal" class="btn border-blue-soft">OK</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div id="del_krakpi" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to delete this KPI? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_del_krakpi">Ok</button>
                                    <div id="show_spin_kpi" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
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
                                    <button type="button" class="btn border-blue-soft" id="del_goal_set">Delete</button>
                                    <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
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
                                <div class="mt-bootstrap-tables">
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
                                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Newemployee/getlist',
                                            success : function(data)
                                            {
                                                $("#get_goal_list").html(data);
                                            }
                                        });
                                    }                                   
                                }
                                </script>
                                <div class="col-md-12"><?php echo Yii::app()->user->getState('emp_id'); ?>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Assigndetails"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;margin-top: -64px;
}')); ?></a>
<?php 
                                    if ((isset($KRA_category_auto) && count($KRA_category_auto)<=6)) {  
//                                       echo CHtml::button('New KRA',array('class'=>'btn border-blue-soft','style'=>'float:left;margin-right: 13px;margin-top: -64px;
// ','id'=>'show_goal'));
 } ?>
</div>
 <div class="portlet box border-blue-soft bg-blue-soft" id="goal_emp_data" style="margin-top: 49px;display:none">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Set Goalsheet</div>
                                        <i class="fa fa-close" id="close_this" style="font-size: 24px;float: right;margin-top: 10px;cursor: pointer;"></i>
                                </div>                                     
                                <div class="portlet-body" style="border: 1px solid rgb(76, 135, 185);">
                                    <div class="row table-responsive" style="margin-top: -15px;">                                   
                                        <table id="kpi_table" class="table" style="background-color: #EEF1F5;">
                                                    <tr>
                                                            <td style="width:310px;">
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
                                                             echo CHtml::dropDownList("target_value",'',$list,$htmlOptions=array('class'=>"form-control target_value",'style'=>"width: 150px;",'onchange'=>'js:get_target_value();','id'=>'target_value_data1'));
                                                            ?>
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                            <td style="">
                                                                KRA Description
                                                             </td>
                                                             <td colspan=7 align="center" valign="bottom">                
                                                            <?php echo CHtml::textField('KRA_description',$kpi_desc,array('style'=>"float: left;",'class'=>'form-control')); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                            <td style="">
                                                                Weightage
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php
                                                           echo CHtml::dropDownList("target_value",'',$wtage,$htmlOptions=array('class'=>"form-control Weightage",'id'=>'Weightage1','style'=>"width: 150px;float: left;",'options' => $wtg));
                                                             ?>
                                                        </td>
                                                    </tr>
<tr>
                                                                                <td>
                                                                Reporting Manager
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php 
                                                           $reporting_list = new EmployeeForm();
$head_array = array();
                                            $where = 'where Employee_id = :Employee_id';
                                            $list = array('Employee_id');
                                            $data = array(Yii::app()->user->getState("emp_id1"));
                                            $emp_all_detail = $reporting_list->get_employee_data($where,$data,$list);
for($i=0;$i<4;$i++)
{
if(isset($emp_all_detail['0']['reporting_1_change']) && $emp_all_detail['0']['reporting_1_change'] != '')
{
$head_array[$i] = $emp_all_detail['0']['reporting_1_change'];
}
else if(isset($emp_all_detail['0']['reporting_2_change']) && $emp_all_detail['0']['reporting_2_change'] !='')
{
$head_array[$i] = $emp_all_detail['0']['reporting_2_change'];
}
else if(isset($emp_all_detail['0']['Reporting_officer2_id']) && $emp_all_detail['0']['Reporting_officer2_id'] !='')
{
$head_array[$i] = $emp_all_detail['0']['Reporting_officer2_id'];
}
else if(isset($emp_all_detail['0']['Reporting_officer1_id']) && $emp_all_detail['0']['Reporting_officer1_id'] !='')
{
$head_array[$i] = $emp_all_detail['0']['Reporting_officer1_id'];
}
}
$head_array['0'] = $emp_all_detail['0']['Reporting_officer1_id'];
if(isset($emp_all_detail['0']['Reporting_officer2_id']) && $emp_all_detail['0']['Reporting_officer2_id'] != '')
{
$head_array['1'] = $emp_all_detail['0']['Reporting_officer2_id'];
}


                                         $records = $reporting_list->get_appraiser_list1();
                                         for ($k=0; $k < count($head_array); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($head_array[$k]);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }
                                         $Cadre_id = array(); 
                                         if (isset($Reporting_officer_data)) 
                                         {
                                            for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                            if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                               $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
                                               
                                           }
                                         }

                                        echo CHtml::DropDownList('faculty_email_id','faculty_email_id',$Cadre_id,array('class'=>'form-control faculty_email_id2'.$kpi_id,'style'=>'width: 186px;float: left;','empty'=>'Select'));
                                                             ?>
                                                        </td>
                                                    </tr>                                 
                                                   <tr id="other_format_text">   
                                                   <label id="kpi_list_number" style="display: none"><?php  if(isset($kpi_count) && $kpi_count != '')
                                                    {
                                                        echo count($kpi_count);
                                                    }?></label>   
                                                     <label id='min_kpi' style="display:none"></label><label style="display: none" id='max_kpi'></label>                                             
                                                        <table id="kpi_record" style="margin-top: -20px;">
                                                        
                                                        </table>
                                                    </tr>                                             
                                                </table><br>
                                        <div class="col-md-7">
                                                     <?php if(isset($edit_flag) && $edit_flag!='')
                                             {?>
                                            <?php echo CHtml::button('Update',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-top: 15px;','id'=>'kpi_update_data')); ?>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php?r=Setgoals/"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
                                            <?php }else{ ?>
                                            <?php echo CHtml::button('Submit',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'submit_kra','onclick'=>'js:kpi_save_data()')); ?>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>                                                     
                           <!--  /////////////////////////////////////////////// -->
                           <div id="output_div_edit">
                            <label class='count_goal' style="display: none"><?php if(isset($KRA_category_auto) && count($KRA_category_auto)>0) { echo count($KRA_category_auto); } ?></label>
                                <?php
                                    if (isset($KRA_category_auto) && count($KRA_category_auto)>0) { $cnt_num = 1; $kpi_id_data = '';
                                        for ($a=0; $a < count($KRA_category_auto); $a++) { 
                                ?>
                                 <label id="total_kra_number" style="display: none"><?php echo count($KRA_category_auto); ?></label>
                                <div id="kpi_table<?php echo $a; ?>" class="portlet box border-blue-soft bg-blue-soft" style="margin-top: 46px;">
                                <div class="portlet-title">
                                    <div class="caption">
                                        KRA <?php echo $a+1; ?></div>
                                </div>                                     
                                <div class="portlet-body" style="border: 1px solid rgb(76, 135, 185);">
                                    <div class="row table-responsive" style="margin-top: -15px;">
                                    <label id="edit_flag_set" style="display: none"><?php if(isset($edit_flag)) { echo $edit_flag; }?></label>
                                        <table id="kpi_table" class="table" style="background-color: #EEF1F5;">
                                                    <tr>
                                                            <td style="">
                                                                KRA Category
                                                             </td>
                                                             <td colspan= 7 align="center" style="float: left;width: 150px;">                                                          
                                                            <?php
                                                             if (isset($kra_list) && count($kra_list)>0) {
                                                                $list_data = '';
                                                                $models = KRAStructureForm::model()->findAll();
                                                                $list = CHtml::listData($models,'KRA_category', 'KRA_category');
                                                             }
                                                            $kpi_category = '';$kpi_category1 = '';$kpi_desc = '';$wtg = '';$kpi_count = '';$target_value1 = '';$target_unit = '';$kpi_id = '';$list_cnt = 0;$KRA_status_flag = '';$faculty_select = '';
                                                           $format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value(In Lakhs)','Percentage' => 'Percentage','Text' => 'Text');
                                                           $goal_status_list = array('Select' => 'Select','Pending' => 'Pending','Approved' => 'Approved');
                                                            $wtage = array('0'=>'0','15'=>'15','20'=>'20','25'=>'25','30'=>'30','40'=>'40','50'=>'50');
                                                            //echo "fgfdg";die();
                                                           if (isset($kpi_data_edit) && count($kpi_data_edit)>0 && isset($kpi_data_edit[$a])) {
                                                             $kpi_target = $kpi_data_edit[$a]['target'];
                                                             $goal_status_flag1 = '';
                                                               $kpi_category[$kpi_data_edit[$a]['KRA_category']] = array('selected' => 'selected');
                                $kpi_category1 = $kpi_data_edit[$a]['KRA_category'];
                                                               //print_r($kpi_category);die();
                                                               $kpi_desc = $kpi_data_edit[$a]['KRA_description'];
                                                               $kpi_id = $kpi_data_edit[$a]['KPI_id'];
                                                               if (isset($kpi_data_edit[$a]['target_unit'])) {
                                                                   $list_count = explode(';', $kpi_data_edit[$a]['target_unit']);
                                                               }
                                                               if (isset($kpi_data_edit[$a]['kpi_list'])) {
                                                                   $kpi_count = explode(';', $kpi_data_edit[$a]['kpi_list']);
                                                               }
                                                               if (isset($kpi_data_edit[$a]['target_unit'])) {
                                                                  $target_unit = explode(';', $kpi_data_edit[$a]['target_unit']);
                                                               }
                                                               
                                                               $wtg[$kpi_data_edit[$a]['target']] = array('selected' => 'selected');
                                                               
                                                               
$faculty_select[$kpi_data_edit[$a]['appraisal_id1']] = array('selected' => 'selected');
                                                                $employee_id = $kpi_data_edit[$a]['Employee_id'];
                                                               //print_r($list_count);die();
                                                                if (isset($kpi_data_edit[$a]['target_value1'])) {
                                                                   $target_value1 = explode(';', $kpi_data_edit[$a]['target_value1']);
                                                                }
                                                                if (isset($kpi_data_edit[$a]['KPI_target_value'])) {
                                                                     $per_kpi_wt = explode(';', $kpi_data_edit[$a]['KPI_target_value']);
                                                                }
                                                              
$KRA_status_flag = $kpi_data_edit[$a]['KRA_status'];
                                                               $goal_status_flag = $kpi_data_edit[$a]['goal_status'];
                                                            }
                                                            else if(isset($kpi_auto_data) && count($kpi_auto_data)>0 && isset($kpi_auto_data[$a]['0']))
                                                            {
                                                                $kpi_target = $kpi_auto_data[$a]['0']['target'];
                                                                $kpi_category[$kpi_auto_data[$a]['0']['KRA_category']] = array('selected' => 'selected');
                                 $kpi_category1 = $kpi_auto_data[$a]['KRA_category'];
                                                               $kpi_desc = $kpi_auto_data[$a]['0']['KRA_description'];
                                                               $kpi_id = $kpi_auto_data[$a]['0']['KPI_id'];
                                                               $list_count = explode(';', $kpi_auto_data[$a]['0']['target_unit']);
                                                               $wtg[$kpi_auto_data[$a]['0']['target']] = array('selected' => 'selected');
                                                               $kpi_count = explode(';', $kpi_auto_data[$a]['0']['kpi_list']);
                                                               $target_unit = explode(';', $kpi_auto_data[$a]['0']['target_unit']);
                                                               $target_value1 = explode(';', $kpi_auto_data[$a]['0']['target_value1']);
                                                                $per_kpi_wt = explode(';', $kpi_auto_data[$a]['0']['KPI_target_value']);
 $faculty_select[$kpi_auto_data[$a]['0']['appraisal_id1']] = array('selected' => 'selected');
                                                                $goal_status_flag = $kpi_auto_data[$a]['0']['goal_status'];
                                                                $employee_id = $kpi_auto_data[$a]['0']['Employee_id'];
                                                                 //print_r($per_kpi_wt);die();
$KRA_status_flag = $kpi_auto_data[$a]['0']['KRA_status'];

                                                            }
                                                           
                                                            if (isset($KRA_category_auto[$a]['0']['minimum_kpi']) && isset($list_count) && count($list_count) == 1) {
                                                                $list_cnt = $KRA_category_auto[$a]['0']['minimum_kpi'];
                                                            }
                                                            else
                                                            {
                                                                if (isset($list_count)) {
                                                                    $list_cnt = count($list_count);
                                                                }
                                                                
                                                            }
                                                           
                                                            if (isset($kpi_id_data) && $kpi_id_data == '') {
                                                               $kpi_id_data = $kpi_id;
                                                            }
                                                            else
                                                            {
                                                                $kpi_id_data = $kpi_id_data.';'.$kpi_id;
                                                            }
                                                            
                                                           $cities = array('Business'=>'Business','Process'=>'Process','People'=>'People','Customer'=>'Customer');
                                                             echo CHtml::dropDownList("target_value",'',$list,$htmlOptions=array('class'=>"form-control target_value kra_category-".$kpi_id,'onchange'=>'js:get_target_value();','options' => $kpi_category));
                                                            ?><label id="kpi_cat_value-<?php echo $kpi_id; ?>" style="display:none"><?php echo $kpi_category1; ?></label>
                                                        </td>
                                                    </tr>  
                                                    <tr id="kra_sheet_<?php echo $kpi_id; ?>">
                                                            <td><label id="kpi_edit_id" style="display: none"><?php echo $kpi_id; ?></label>
                                                                KRA Description
                                                             </td>
                                                             <td colspan=7 align="center" valign=bottom>                
                                                            <?php  echo CHtml::textField('KRA_description',$kpi_desc,array('style'=>'float: left;','class'=>'form-control KRA_description-'.$kpi_id)); ?>
                                                        </td>
                                                        <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php if(isset($kpi_target)) { echo $kpi_target; } ?></label>
                                                    </tr>
                                                    <tr>
                                                            <td style="">
                                                                Weightage
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php  
                                                           echo CHtml::dropDownList("target_value",'',$wtage,$htmlOptions=array('class'=>"form-control Weightage",'id'=>'Weightage'.$kpi_id,'style'=>"width: 150px;float: left;",'options' => $wtg));
                                                             ?>
                                                        </td>
                                                    </tr>
<tr>
                                                                                <td>
                                                                Reporting Manager
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php
                                                           $reporting_list = new EmployeeForm();
$head_array = array();
                                            $where = 'where Employee_id = :Employee_id';
                                            $list = array('Employee_id');
                                            $data = array(Yii::app()->user->getState("emp_id1"));
                                            $emp_all_detail = $reporting_list->get_employee_data($where,$data,$list);
$head_array['0'] = $emp_all_detail['0']['Reporting_officer1_id'];
if ($emp_all_detail['0']['reporting_1_change'] !='' && strtotime(date('Y-m-d')) <= strtotime($emp_all_detail['0']['reporting_1_effective_date'])) {
               $head_array['1'] = $emp_all_detail['0']['reporting_1_change'];
}
else if($emp_all_detail['0']['reporting_1_change'] =='' && $emp_all_detail['0']['Reporting_officer2_id'] != '')
{
     $head_array['1'] = $emp_all_detail['0']['Reporting_officer2_id'];
}
if($emp_all_detail['0']['Reporting_officer2_id'] == '')
{
   if ($emp_all_detail['0']['reporting_2_change'] !='' && strtotime(date('Y-m-d')) <= strtotime($emp_all_detail['0']['reporting_2_effective_date'])) {
        $head_array['2'] = $emp_all_detail['0']['reporting_2_change'];
    } 
}
else if($emp_all_detail['0']['Reporting_officer2_id'] != '')
{
    $head_array['2'] = $emp_all_detail['0']['Reporting_officer2_id'];
    if ($emp_all_detail['0']['reporting_2_change'] !='' && strtotime(date('Y-m-d')) <= strtotime($emp_all_detail['0']['reporting_2_effective_date'])) {
        $head_array['3'] = $emp_all_detail['0']['reporting_2_change'];
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
                                         $Cadre_id = array(); 
                                         if (isset($Reporting_officer_data)) 
                                         {
                                            for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                            if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                               $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
                                               
                                           }
                                         }
                                        echo CHtml::DropDownList('faculty_email_id','faculty_email_id',$Cadre_id,array('class'=>'form-control faculty_email_id1'.$kpi_id,'style'=>'width: 186px;float: left;','options' => $faculty_select));
                                                             ?>
                                                        </td>
                                                    </tr>
                                                  
<div>                                                
                                                    <table id="kpi_record-<?php echo $kpi_id; ?>" class=" table table-striped" style="margin-top: -20px;"> 
                                                     <th style="font-weight:bold;text-align: center;"  rowspan="2"> Key Performance Indicator (KPI) description  </th>
                                                             <th style="font-weight:bold;text-align: center;width:130px" rowspan="2">
                                                                Unit
                                                             </th>
                                                              <th style="font-weight: bold; text-align: center;" rowspan="2">
                                                                KPI Weightage</td>
                                                            <th style="font-weight:bold;text-align: center;" rowspan="2">
                                                                Value</td>
                                                              <th style="font-weight: bold; text-align: center;" rowspan="2">
                                                                (1)<br>Unsatisfactory <br>Performance</td>
                                                              <th style="font-weight:bold;text-align: center;" rowspan="2">
                                                                (2)<br>Needs<br>Improvement</td>
                                                              <th style="font-weight: bold; text-align: center;" rowspan="2">
                                                                (3)<br>Good Solid <br>Performance</td>
                                                             <th style="font-weight:bold;text-align: center;" rowspan="2">
                                                                (4)<br>Superior <br>Performance</td>
                                                              <th style="font-weight: bold; text-align: center;" rowspan="2">
                                                                (5)<br>Outstanding <br>Performance</td>
                                                                <th style="font-weight:bold;text-align: center;" rowspan="2">
                                                                Delete</th>
                                                                <!-- <td style="font-weight:bold;text-align: center;" rowspan="2">
                                                                Action</td> -->
                                                    </tr>
                                                   <tr id="other_format_text">
                                                   <label id="kpi_list_number<?php echo $kpi_id; ?>" style="display: none"><?php  if($kpi_count != '')
                                                    {
                                                        echo count($kpi_count);
                                                    } ?></label>
                                                   
                                                   <label id='min_kpi<?php echo $kpi_id; ?>' style="display: none"><?php if(isset($list_count) && $list_count != ''){ echo count($list_count); }?></label><label style="display: none" id='max_kpi<?php echo $kpi_id; ?>'></label>
                                                    <label style="display: none" class='target_need1'>1</label>
                                                    <label style="display: none" class='target_need2'>1</label>
                                                    <label style="display: none" class='target_need3'>1</label>
                                                    <label style="display: none" class='target_need4'>1</label>
                                                    <label style="display: none" class='target_need5'>1</label>
                                                   
                                                    <?php 
                                                        $val = array();
                                                        $disable_select = true;
                                                        $disable_select1 = false;
                                                        //print_r($list_count);die();
                                                         if (isset($list_count) && $list_count!='') {
                                                            $cnt = 0;
                                                            
                                                            //print_r($list_count);die();
                                                            //print_r(count($list_cnt));die();
                                                           
                                                            //print_r($KRA_category_auto);die();
                                                            
                                                            for ($i=0; $i < $list_cnt; $i++) { $goal_status_select = '';
                                                                if (isset($goal_status_flag[$i])) {
                                                                     $goal_status_select[$goal_status_flag[$i]] = array('selected' => 'selected');
                                                                }
                                                                else
                                                                {
                                                                    $goal_status_select['Select'] = array('selected' => 'selected');
                                                                }
                                                           
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
                                                                else if ($unit=='Days' || $unit=='Date' || $unit=='Ratio' || $unit=='Percentage' || $unit=='Text') { 
                                                                $disable_select = false; 
                                                                $disable_select1 = true;                                                                
                                                                    $unit_target = '';
                                                                     $unit_type[$unit] = array('selected' => 'selected');
                                                                    if (isset($target_value1[$i]) && ($target_value1[$i] != '')) {
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
                                                           echo '<tr><td id="kpilist_'.$kpi_id.$i.'">
                            <input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list',$kpi_count[$i],array('class'=>'form-control kpi_list validate_field1','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$kpi_count[$i],'id'=>'kpilistyii_'.$kpi_id.$i.'')).'<div id="kpi_list_drop_'.$kpi_id.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;height: auto;max-height: 200px;overflow-y: scroll;"></div></td><td>'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$kpi_id.$i,'options' => $unit_type)).'</td><td>'.CHtml::textField('kpi_target_value',$per_kpi_wt[$i],array('class'=>'form-control fields validate_field1','id'=>'kpi_target_value-'.$kpi_id.$i)).'</td><td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control validate_field1','id'=>'unit_value','style'=>'display:none')).CHtml::textField('unit_value',$unit_target,array('class'=>'form-control validate_field1 value_field','id'=>'unit_value-'.$kpi_id.$i.'','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$unit_target,'disabled' => $disable_select1)).'</td><td id="targetvalue1'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][0],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field1 target_value1".$kpi_id.$i:"form-control fields validate_field1 target_value1".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][0],'disabled' => $disable_select)).'</td><td style="display:none" id="targetvalue11'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][0],array('class'=>"form-control fields validate_field1 target_value1".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][0],'disabled' => $disable_select)).'</td><td id="targetvalue2'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][1],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field1 target_value2".$kpi_id.$i:"form-control fields validate_field1 target_value2".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][1],'disabled' => $disable_select)).'</td><td style="display:none" id="targetvalue22'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][1],array('class'=>"form-control fields validate_field1 target_value2".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][1],'disabled' => $disable_select)).'</td><td id="targetvalue3'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][2],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field1 target_value3".$kpi_id.$i:"form-control fields validate_field1 target_value3".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][2],'disabled' => $disable_select)).'</td><td style="display:none" id="targetvalue33'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][2],array('class'=>"form-control fields validate_field1 target_value3".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][2],'disabled' => $disable_select)).'</td><td id="targetvalue4'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][3],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field1 target_value4".$kpi_id.$i:"form-control fields validate_field1 target_value4".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][3],'disabled' => $disable_select)).'</td><td style="display:none" id="targetvalue44'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][3],array('class'=>"form-control fields validate_field1 target_value4".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][3],'disabled' => $disable_select)).'</td><td id="targetvalue5'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][4],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field1 target_value5".$kpi_id.$i:"form-control fields validate_field1 target_value5".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][4],'disabled' => $disable_select)).'</td><td style="display:none" id="targetvalue55'.$kpi_id.$i.'">'.CHtml::textField('',$val[$i][4],array('class'=>"form-control fields validate_field1 target_value5".$kpi_id.$i,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','data-content'=>$val[$i][4],'disabled' => $disable_select)).'</td><td><i class="fa fa-trash-o del_kra_kpi" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="del_kra_kpi-'.$kpi_id.'-'.$i.'" title="Delete" aria-hidden="true"></i></td></tr>';   
                                 $unit_type='';  
                                 $unit_type='';
                                                       } } } 
                                                        
                                                    ?>  
<tr id="extra_kpi<?php echo $kpi_id; ?>">
                                                        
                                                    </tr>  
                                                
                                                </table>
                                                    </tr> 
                                                                       
                                                </table><br>
                                        <div class="col-md-7">
                    <style type="text/css">
                                                        .no_ki_extra
                                                        {
                                                            width: 87px;
                                                            float: left;
                                                            margin-left: 14px;
                                                        }
                                                </style> 
                                                <div id="extra_<?php echo $kpi_id; ?>">
                                             
                                                <?php
                                              
                                                //echo CHtml::button('Add KPI',array('class'=>'btn border-blue-soft add_kpi','style'=>'float:left;margin-left: 10px;','id'=>'add_kpi-'.$kpi_id.'-'.$list_cnt));
 ?>
                                            </div>       
                                            <div id="show_spin<?php echo $kpi_id; ?>" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                             <?php 

                                             echo CHtml::button('Update',array('class'=>'btn border-blue-soft getapprove','style'=>'float:right','id'=>$kpi_id)); 

                                             ?>
                                            <?php 

//echo CHtml::button('Delete',array('class'=>'btn border-blue-soft del_kpi','id'=>'KPI_id-'.$kpi_id,'style'=>'float:right;margin-right: 14px;'));
?>

                                        </div>
                                        <div class="col-md-5">
                                        <lable id="error_spec<?php echo $kpi_id; ?>" colspan="10" style="color:red;float: right;"></lable></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    $cnt_num++;
                                }
                                }
                                ?>   
                                </div>                                                 
                                    </div>
                                    <?php $this->endWidget(); ?>
                                       
                                    </div>       
                                </div>
                                <?php
                                $employee_name = '';
                                    if(isset($emp_data['0']['Emp_fname'])) {
                                    $employee_name = $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname'];
                                }
                                ?>
                                <label id="total_kra_id" style="display: none"><?php echo $kpi_id_data; ?></label>
<?php 
		$employee_email = '';$appriaser_1 = '';
    	//print_r($_POST['emp_id']);die();
    	$emploee_data =new EmployeeForm;
                $notification_data =new NotificationsForm;
    	$kra=new KpiAutoSaveForm;
    	$setting_date=new SettingsForm;
		

		if (isset($_POST['emp_id'])) {
			$emp_id = Yii::app()->user->setState('emp_id2',$_POST['emp_id']);
		}
		else
		{
			$emp_id = '';
		}
		$emp_id = Yii::app()->user->getState('emp_id2');

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date('Y'));             
        $settings_data = $setting_date->get_setting_data($where,$data,$list); 

        $where = 'where setting_content = :setting_content and year = :year';
        $list = array('setting_content','year');
        $data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
        $settings_data1 = $setting_date->get_setting_data($where,$data,$list);

        $Employee_id = Yii::app()->user->getState("employee_email");
        $appriaser_1 = Yii::app()->user->getState("appriaser_1");

        $where1 = 'where Employee_id = :Employee_id';
        $list1 = array('Employee_id');
        $data2 = array($emp_id);
        $employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);
        $mail_id = '';
        if (isset($employee_data1['0']['Email_id'])) {
             $mail_id = $employee_data1['0']['Email_id'];
        }
       
        //print_r(Yii::app()->user->getState("employee_email"));die();
        $where1 = 'where Email_id = :Email_id';
        $list1 = array('Email_id');
        $data2 = array($mail_id);
        $employee_data = $emploee_data->get_employee_data($where1,$data2,$list1);

        $where1 = 'where Email_id = :Email_id';
        $list1 = array('Email_id');
        $data2 = array(Yii::app()->user->getState("employee_email"));
        $employee_data1 = $emploee_data->get_employee_data($where1,$data2,$list1);

        if (isset($settings_data['0']['setting_type']) && count($settings_data)>0) {
            $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
            $list1 = array('Employee_id','goal_set_year');
            $data2 = array($emp_id,$settings_data['0']['setting_type']);
            $kra_data = $kra->get_kpi_list($where1,$data2,$list1);  
        }
        else if(isset($settings_data1['0']['setting_type']) && count($settings_data1)>0)
        {
            $year =  date("Y",strtotime("-1 year")).'-'.date('Y');
            if ($settings_data1['0']['setting_type'] == $year) {
                $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
                $list1 = array('Employee_id','goal_set_year');
                $data2 = array($emp_id,$settings_data1['0']['setting_type']);
                $kra_data = $kra->get_kpi_list($where1,$data2,$list1);
            } 
        }
        else
        {           
            $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
            $list1 = array('Employee_id','goal_set_year');
            $data2 = array($emp_id,date('Y'));
            $kra_data = $kra->get_kpi_list($where1,$data2,$list1);
        }
        
        
        if (isset($_POST['chk_goalsheet_flag']) && isset($kra_data) && count($kra_data)>0) {
            for ($i=0; $i < count($kra_data); $i++) { 
            $data = array(
            'KRA_status' => 'Approved',
            );
            if (isset($kra_data[$i]['KPI_id'])) {                
                $update = Yii::app()->db->createCommand()->update('kpi_auto_save',$data,'KPI_id=:KPI_id',array(':KPI_id'=>$kra_data[$i]['KPI_id']));
            }
        }
        
        if (isset($employee_data['0']['Employee_id'])) {
              $notification_data->notification_type = 'Updated Goalsheet';
              $notification_data->Employee_id = $employee_data['0']['Employee_id'];
              $notification_data->date = date('Y-m-d');
              $notification_data->save();   
        }       
        }
		
			$model = new LoginForm;	
			$model1 = new KpiAutoSaveForm;
			$program_data =new ProgramDataForm;
			$employee = new EmployeeForm;	
			$IDPForm =new IDPForm;	
			$Compare_Designation =new CompareDesignationForm;	
			$setting_date=new SettingsForm;	
			$program_data_result = $program_data->get_data();

		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date('Y'));             
		$settings_data = $setting_date->get_setting_data($where,$data,$list); 
		
		$where = 'where setting_content = :setting_content and year = :year';
		$list = array('setting_content','year');
		$data = array('PMS_display_format',date("Y",strtotime("-1 year")));             
		$settings_data1 = $setting_date->get_setting_data($where,$data,$list);
			
			$Employee_id = $emp_id;
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

			$where = 'where Employee_id = :Employee_id';
			$list = array('Employee_id');
			$data = array($Employee_id);
			$IDP_data = $IDPForm->get_idp_data($where,$data,$list);
			//print_r($IDP_data);die();
            if (isset($emp_data['0']['Reporting_officer1_id'])) {
                $where = 'where Email_id = :Email_id';
                $list = array('Email_id');
                $data = array($emp_data['0']['Reporting_officer1_id']);
                $mgr_data = $employee->get_employee_data($where,$data,$list);
            }
			
			
			if (isset($settings_data['0']['setting_type']) && count($settings_data)>0) {
				$where = 'where Employee_id = :Employee_id and KRA_status =:KRA_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status','goal_set_year');
				$data = array($Employee_id,'Approved',$settings_data['0']['setting_type']);
				$KRA_status = $model1->get_kpi_list($where,$data,$list);
				$prg_cnt = 0;
				if(isset($KRA_status) && count($KRA_status)>0)
				{
				$prg_cnt = 1;
				}
			}
			else if (isset($settings_data1['0']['setting_type']) && count($settings_data1)>0) {
			$year =  date("Y",strtotime("-1 year")).'-'.date('Y');
				if ($settings_data1['0']['setting_type'] == $year) {
					$where = 'where Employee_id = :Employee_id and KRA_status =:KRA_status and goal_set_year = :goal_set_year';
					$list = array('Employee_id','KRA_status','goal_set_year');
					$data = array($Employee_id,'Approved',$settings_data1['0']['setting_type']);
					$KRA_status = $model1->get_kpi_list($where,$data,$list);
					$prg_cnt = 0;
					if(isset($KRA_status) && count($KRA_status)>0)
					{
					$prg_cnt = 1;
					}
				} 
			}
			else
			{
				$where = 'where Employee_id = :Employee_id and KRA_status =:KRA_status and goal_set_year = :goal_set_year';
				$list = array('Employee_id','KRA_status','goal_set_year');
				$data = array($Employee_id,'Approved',date('Y'));
				$KRA_status = $model1->get_kpi_list($where,$data,$list);
				$prg_cnt = 0;
				if(isset($KRA_status) && count($KRA_status)>0)
				{
				$prg_cnt = 1;
				}
			} 

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
                        <div class="page-content-inner">
                        <div id="err" style="display: none"></div>
                        <div id="agree_box" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> Please agree if discussion with this employee is completed.</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button"  data-dismiss="modal" class="btn border-blue-soft">OK</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div id="redirect_page" class="modal fade" tabindex="-1" data-backdrop="redirect_page" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                         <div class="modal-body">
                                    <p> IDP updation done successfully. </p>
                                </div>
                                <div class="modal-footer">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/pms/index.php?r=IDP/IDP_approvegoal_list"><button type="button" class="btn border-blue-soft" id="redirect_to_master">OK</button></a>
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
                                    <p> Are you sure you want to approve IDP of <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?>? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button><div id="show_spin1" style="display: none;margin-top: 10px;float: right;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
<lable id="prg_cnt" style="display:none"><?php if(isset($prg_cnt)) { echo $prg_cnt; } ?> </lable>
<div id="static_prg" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p> <i class="fa fa-times" style="color:red"></i> Goal Sheet not approved </p>
                                    <p> <i class="fa fa-check" style="color:green"></i> IDP Approved </p>
                                </div>
                                <div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline" style="float:left">Cancel</button>
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    // 'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    'action' => array('index.php/Setgoals/emp_kpi_edit'),
                                                                ));
                                                           ?>
<?php if(isset($emp_data['0']['Employee_id'])) { echo CHtml::textField('emp_id',$emp_data['0']['Employee_id'],array('style'=>'display:none')); } ?>
                                                                  <?php echo CHtml::submitButton('OK',array('style'=>'float:right','class'=>'btn dark btn-outline'));  ?>
<?php 
                                        $this->endWidget(); 

                                        ?> 
                                  
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>  
<lable id="compare_designation" style="display: none"><?php if(isset($designation_flag)) { echo $designation_flag; } ?></lable>     
                            <div class="row" <?php if(isset($show_idp) && count($show_idp)>0 && $show_idp!= ''){ ?>style="display:block"<?php }else{ ?>style="display:none"<?php } ?>>
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
                                           <?php if(isset($emp_data[0])&& count($emp_data)>0){
                                           echo trim($emp_data[0]['Reporting_officer1_id']);   }?> 
                                        </lable>
                                         <lable id="emp_code" style="display: none">
                                           <?php  if(isset($emp_data[0])&& count($emp_data)>0){
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
                                                          if(isset($emp_data[0])&& count($emp_data)>0){
                                                                echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
                                                                }?>
                                                                                                           
                                                        
                                                        </div>
                                                        <div class="col-md-2"><label class="col-md-2">
                                                       <span class="bold">Manager’s name</span></label>
                                                      </div>
                                                        <div class="col-md-4">
                                                        <?php if(isset($mgr_data[0]) && count($mgr_data)>0){
                                                             echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <div class="col-md-2"><label class="col-md-2">
                                                        <span class="bold">Employee Code</span></label>
                                                  </div>
                                                        <div class="col-md-4">                                                        
                                                           <?php  if(isset($emp_data[0])&& count($emp_data)>0){
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
                                        <th <?php if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') { ?>style="display:none"<?php }?>>Action</th>
                                    </thead>
                                    <tbody>

                                    <?php
                                     $compulsory = '';$compulsory_cnt = 1;					
                                    if (isset($program_data_result) && count($program_data_result)>0) {
                                        for ($i=0; $i < count($program_data_result); $i++) {    
                                        if (isset($program_data_result[$i])) {
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
                                                    if (isset($cmt1[0]) && isset($cmt1[1]) && $i == $cmt1[0]) {                                                            
                                                         $cmnt = $cmt1[1];
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $cmnt = '';
                                            }
                                                                                
                                            if (isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] != 0) {
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
                                            <tr class="error_row_chk" id="show_this-<?php echo $i; ?>" <?php if ($cmnt == '' || $cmnt == 'undefined') { ?>style="display: none"<?php } ?>> 
                                               <!--  <td><?php echo $i; ?></td>   -->                 
                                                <td class="prog_name" id="<?php echo $i; ?>"> <?php echo $program_data_result[$i]['program_name']; ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?></td>
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
                                                 <td <?php if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') { ?>style="display:none"<?php } ?>>
                                                 <?php if($program_data_result[$i]['need'] == 1 || $program_data_result[$i]['need'] == 2) { ?><?php }else if($program_data_result[$i]['need'] == 0) { ?>
                                                     <i class="fa fa-trash-o del_extra_program_list" id="del_extra_program_list-<?php echo $i;?>"style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);" title="Delete" aria-hidden="true"></i>
                                                 <?php } ?>
                                                    
                                                </td>
                                            </tr>
                                            <?php 
                                    }
                                    } 
                                }
                                    ?>   
                                    <tr  <?php if(isset($IDP_data['0']['set_status']) && $IDP_data['0']['set_status']!='Approved')
                                                  { ?>style="display:block"<?php }else { ?>style="display:none"<?php } ?>>                                       
                                         <td <?php if(isset($IDP_data) && count($IDP_data)>0 && $IDP_data['0']['set_status']!='Approved')
                                                  { ?>style="display:block"<?php } ?>>
                                          <?php 
                                            $list_prog = ''; $list_prog1 = '';$list_prog2 = '';
                                             $ProgramDataForm = new ProgramDataForm();
                                             $list_of_program = $ProgramDataForm->get_data();                                             
                                             if (isset($IDP_data['0']) && count($IDP_data)>0 && $IDP_data['0']['program_comment']!='') 
                                             {
                                               $list_prog = explode(';',$IDP_data['0']['program_comment']);    
                                                    if (isset($list_of_program) && isset($list_prog) && count($list_of_program)>0) 
                                                    {
                                                        for ($ln=0; $ln < count($list_of_program); $ln++) { 
                                                            for ($li=0; $li < count($list_prog); $li++) {
                                                                if (isset($list_prog[$li])) {
                                                                    $list_prog2 = explode('?',$list_prog[$li]);
                                                                    if(isset($list_prog1[$ln]) && isset($list_prog2[0]) && $ln == $list_prog2[0]) 
                                                                    {
                                                                      $list_prog1[$ln] = '1'; 
                                                                      break;                                                       
                                                                    }
                                                                    else
                                                                    {
                                                                      $list_prog1[$ln] = '0';     
                                                                    }
                                                                }
                                                             } 
                                                       }                       # code...
                                                    }                           
                                              
                                             } 
                                             // print_r($list_prog1);die();
                                             $Cadre_id = array(); 
                                             if (isset($list_of_program) && count($list_of_program)>0) 
                                             {
                                                for ($l=0; $l < count($list_of_program); $l++) { 
                                                if (isset($list_of_program[$l]['program_name']) && isset($list_prog1[$l]) && $list_prog1[$l] == '0') {
                                                   $Cadre_id[$list_of_program[$l]['program_name'].'-'.$l] = $list_of_program[$l]['program_name'];
                                                }
                                                   
                                               }
                                             }
                                            echo CHtml::DropDownList('program_name_list','program_name_list',$Cadre_id,array('class'=>'form-control program_name_list','empty'=>'Select')); ?>
                                    </td>
                                     <td colspan="4">
                                               <?php
                                                  if(isset($IDP_data['0']) && count($IDP_data)>0 && $IDP_data['0']['set_status']!='Approved')
                                                  { ?>
                                                      <button type="button" class="btn btn-primary comp_add_program" id="<?php if(isset($cmt2) && count($cmt2)>0) { echo $compulsory_cnt; } ?>" style="float: left;">Add Program</button>
                                                <?php  }
                                                
                                                ?>
                                        </td>
                                    </tr>                               
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
                                                $count = '';$count_value = 0;
                                                 if (isset($IDP_data['0']) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
                                                                    $count = explode(';',$IDP_data['0']['extra_topic']);
                                                                   
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
                                                  <div class="row_rfrsh">
                                                 <?php 
                                                    if (isset($count) && $count !='') { 
                                                      for ($m=0; $m < count($count); $m++) {  die();
                                                        if (isset($IDP_data['0']) && $count[$m] != '' && $count[$m] != 'undefined') {
                                                        $count_value++;
                                                        $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                        $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                        $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                    ?>
                                                      <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-4">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                         $topic = $topic1[$m];                                                                
                                                         $day = $day1[$m];                         
                                                         $faculty[$faculty2[$m]] = array('selected' => 'selected');
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('topic'.$m,$topic,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic".$m));
}
else
{
echo CHtml::textField('topic'.$m,$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic".$m));
}
                                                         ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('days_required'.$m,$day,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 days_required".$m)); 
}
else
{
 echo CHtml::textField('days_required'.$m,$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required".$m));
}
 die();  
 ?> 
                                                        </div>
                                                        <div class="col-md-2">
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
                                                             if (isset($Reporting_officer_data['0'])) 
                                                             {
                                                                for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                   $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].'?'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                }
                                                                   
                                                               }
                                                             }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::DropDownList('faculty_email_id'.$m,'faculty_email_id1',$Cadre_id,array('disabled' => 'disabled','class'=>'form-control faculty_email_id'.$m,'empty'=>'Select','options' => $faculty)); 
}
else
{
 echo CHtml::DropDownList('faculty_email_id'.$m,'faculty_email_id1',$Cadre_id,array('class'=>'form-control faculty_email_id'.$m,'empty'=>'Select','options' => $faculty));
}
                                                            ?>
                                                        </div>
                                                        <div class="col-md-2" <?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['set_status']) && $IDP_data['0']['set_status'] == 'Pending') { ?>style="display: block;"<?php }else { ?> style="display: none;" <?php }?>>
                                                            <i class="fa fa-trash-o del_extra_program" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="<?php if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['Employee_id'])) { echo 'del_extra_program-'.$IDP_data['0']['Employee_id'].'-'.$m;
                                                        }?>" title="Delete" aria-hidden="true"></i>
                                                        </div>
                                                    </div>

                                                  <?php    }
                                                    }
                                                  }
                                                }
                                                 ?>
                                       
                                                  </div>
                                                    </div>
                                                     <div id="new_topic">
                                                     </div>
                                                <div class="form-group">
                                                <div class="col-md-12 bold">
                                                <?php
                                                  if(isset($IDP_data) && count($IDP_data)>0 && $IDP_data['0']['set_status']!='Approved')
                                                  { ?>
                                                      <button type="button" class="btn btn-primary add_program" id="<?php echo $count_value.'-'.$IDP_data['0']['Employee_id']; ?>" style="float: left;">Add Program</button>
                                                <?php  }
                                                ?>    
                                                <lable id="error_spec1"  style="color: red;float: right;"></lable></div>
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
                                                                       <input class="form-control target_date3 date_pickup" readonly="" type="text" value="<?php echo $rel2[0]; ?>" id="target_date3" <?php echo $set_flag1; ?>>
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date3 date_pickup" readonly="" type="text"  id="target_date3" >
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
                                                            if (isset($meet[1])) {
                                                                $meet = $meet[1];
                                                            }                                                            
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
                                                                       <input class="form-control target_date4 date_pickup" readonly="" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" <?php echo $set_flag1; ?>>
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control target_date4 date_pickup" readonly="" type="text"  id="target_date4">
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
                                                                       <input class="form-control date_pickup" <?php echo $set_flag1; ?> readonly=""  type="text" value="<?php echo $IDP_data['0']['project_review_date']; ?>" id="review_date">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control date_pickup" type="text" id="review_date">
                                                                 <?php   }
                                                                ?>
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Target end date</label>
                                                    <div class="col-md-2">
                                                        
                                                                <?php
                                                                  if (isset($IDP_data['0']['project_end_date'])) {  ?>
                                                                       <input class="form-control date_pickup" <?php echo $set_flag1; ?> readonly="" type="text" value="<?php echo $IDP_data['0']['project_end_date']; ?>" id="target_end_date">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control date_pickup" type="text" id="target_end_date">
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
                            <div class="row" <?php if(isset($show_idp) && count($show_idp)>0){ ?>style="display:block"<?php }else{ ?>style="display:none"<?php } ?>>
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
<lable id="term_condition_hide">
<?php 
    $header_menu =new SettingsForm;
      $menu_settings_data = '';$menu_settings_data1 = '';
      $menu_list = array('goal_sub_date','mid_goal_set_tab_active-date','final_goal_set_tab_active-date');
        for ($i=0; $i < count($menu_list); $i++) { 
          $where = 'where setting_content = :setting_content and year = :year and setting_content = :setting_content';
          $list = array('setting_content','year','setting_content');
          $data = array($menu_list[$i],date('Y'),'goal_sub_date');             
          $menu_settings_data[$i] = $header_menu->get_setting_data($where,$data,$list);
          if (isset($menu_settings_data[$i]['0']['setting_type']) && strtotime(date('Y-m-d'))<=strtotime($menu_settings_data[$i]['0']['setting_type'])) {
               $menu_settings_data1[$i] = '1';
          }
          else if(isset($menu_settings_data[$i]['0']['setting_type']) && strtotime(date('Y-m-d'))>strtotime($menu_settings_data[$i]['0']['setting_type']))
          {
                $menu_settings_data1[$i] = '0';
          }
        }
if (isset($menu_settings_data['0']['0']['setting_content']) && ($menu_settings_data['0']['0']['setting_content']=='goal_sub_date')  && count($menu_settings_data)>0 && $menu_settings_data1['0'] == 1) {
?>

<?php } ?>
<?php
                                                        
                                                    ?>
<input name="term_condition" type="checkbox" value="term_condition" id="term_condition"/><lable id="blink_me" style="color: red;"> I confirm this goal sheet is discussed and agreed
with <?php if(isset($emp_data['0']['Emp_fname'])) { echo $emp_data['0']['Emp_fname']." ".$emp_data['0']['Emp_lname']; } ?></lable>
                                <?php if(isset($employee_id)) { echo CHtml::button('Approve Goal Sheet of '.$employee_name,array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>$employee_id,'onclick'=>'js:send_notification();')); } ?>
</lable><div id="show_spin2" style="display: none;margin-top: 10px;float: right;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
<?php  ?>
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
                //var j = jQuery.noConflict();
                    
                     $(function(){
                       $("body").on('click','.del_kra_kpi',function(){
                            var this_id = $(this).attr('id');
                            var splited = this_id.split('-');
                            $("#del_krakpi").modal('show');
                            var data =  {
                                last_id : splited[2],
                                kra_id : splited[1],
                            };
                            var base_url = window.location.origin;
                            $("#continue_del_krakpi").unbind('click').click(function(){
                                $("#show_spin_kpi").css('display','block');
                                    $.ajax({
                                    type : 'post',
                                    data : data,
                                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/krakpi_del',
                                    success : function(data)
                                    {
                                       
                                        $("#show_spin_kpi").css('display','none');
                                        $("#del_krakpi").modal('toggle');
                                        if(data == 1)
                                        {
                                            $("#output_div_edit").load(location.href + " #output_div_edit");
                        $("#extra_"+splited[1]).css('display','block');
                                        }
                                    }
                                });
                            });
                        });
                        $("#show_goal").click(function(){
                            $("#goal_emp_data").show();
                        });
                        $("#close_this").click(function(){
                            $("#goal_emp_data").hide();
                        });
                $("body").on('click','.send_for_appraisal',function(){  
                    var error_count = 0;var error_count1 = 0;var error_count2 = ''; 
                    var id_value = $("#total_kra_id").text();
                    var kra_id_value1 = id_value.split(';');        
                    var kra_des = $("#KRA_description").val();
                    var string = /^(0[1-9]|[0-3][0-3])([/]{1})(0[1-9]|1[0-2])([/]{1})((19|20)[0-9]{2})$/;
                    var string_num = /^([0-9])$/;var checkwt = /[-]/;
                     var data_length = kra_des.length;var final_kpi_wt = '';
                    var error = [];
                    for (var j = 0; j < $("#total_kra_number").text(); j++) { error[kra_id_value1[j]] = [];
                        var kra_num = $("#kpi_list_number"+kra_id_value1[j]).text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';var goal_status = '';var final_kpi_total1 = 0;
                           
                            var kpi_list_data = 0;var add_value = 0;var final_kpi_total = 0;var final_kpi_wt1 =''; var final_kpi_wt2 =''; var final_kpi_wt3 = '';    
                            for (var i = 0; i < kra_num; i++) {
                                if ($("#Weightage"+kra_id_value1[j]+i).val() != 0 && $("#kpilistyii_"+kra_id_value1[j]+i).val()!= '' && $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val()!='Select') 
                                {
                                    kpi_list_data = parseInt(kpi_list_data)+parseInt(1);
                                    if (($("#kpi_target_value-"+kra_id_value1[j]+i).val() != '' && !checkwt.test($("#kpi_target_value-"+kra_id_value1[j]+i).val()) && $("#kpi_target_value-"+kra_id_value1[j]+i).val() != 0) && $.isNumeric($("#kpi_target_value-"+kra_id_value1[j]+i).val())) 
                                        {
                                            var kpi_wt = $("#kpi_target_value-"+kra_id_value1[j]+i).val(); 
                                            final_kpi_wt3 = 1;
                                            if (final_kpi_wt1 == '') 
                                                {
                                                    final_kpi_wt1 = $("#kpi_target_value-"+kra_id_value1[j]+i).val();
                        final_kpi_wt2 = $("#kpi_target_value-"+kra_id_value1[j]+i).val();
                                                }
                                                else
                                                {
                                                   final_kpi_wt1 = final_kpi_wt1+';'+$("#kpi_target_value-"+kra_id_value1[j]+i).val();
                        final_kpi_wt2 = parseFloat(final_kpi_wt2)+parseFloat($("#kpi_target_value-"+kra_id_value1[j]+i).val());
                                                }
                        
                                        }
                                         else if($("#kpi_target_value-"+kra_id_value1[j]+i).val() != '')
                                        {
                                            final_kpi_wt3 = 0;
                                        error[kra_id_value1[j]] = "Please enter valid numbers in KPI Weightage field.";error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                        }
                                }
                                else
                                {
                                    error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;                               
                                }
                            }
                                if($(".kra_category-"+kra_id_value1[j]).find(':selected').val() == '--Select--' || $(".kra_category-"+kra_id_value1[j]).find(':selected').val() == '' || $(".kra_category-"+kra_id_value1[j]).find(':selected').val() === undefined)
                                {
                                     error[kra_id_value1[j]] = 'Please Select KRA Category';error_count1 = kra_id_value1[j];error_count2 = kra_id_value1[j];break;       
                                }
else if($(".KRA_description-"+kra_id_value1[j]).val() == '' || $(".KRA_description-"+kra_id_value1[j]).val() === undefined)
                                {
                                     error[kra_id_value1[j]] = 'Please enter KRA description';error_count1 = kra_id_value1[j];error_count2 = kra_id_value1[j];break;       
                                } 
                              else if($("#Weightage"+kra_id_value1[j]).find(':selected').val() == '0')
                              {
                                 error[kra_id_value1[j]] = 'Please KRA select Weightage.';error_count1 = kra_id_value1[j];error_count2 = kra_id_value1[j];break;       
                              }    
                                else if (error[kra_id_value1[j]] == '') 
                                {
                                    if (kpi_list_data <  $("#min_kpi"+kra_id_value1[j]).text()) 
                                {
                                                           
                                    error[kra_id_value1[j]] = 'Please Fill minimum '+$("#min_kpi"+kra_id_value1[j]).text()+' KPI';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;                                  
                                }
                                else
                                { 
                 $(".KRA_description-"+kra_id_value1[j]).css('border-color','');                  
                                    for (var i = 0; i < kra_num; i++) {
                                    var selected_unit = $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                    if ($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() != 'Select' && $("#kpilistyii_"+kra_id_value1[j]+i).val() != '') 
                                    {
                                        var selected_value = $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                         if (kpi_list == '')
                                        {
                                            kpi_list = $("#kpilistyii_"+kra_id_value1[j]+i).val();
                                            kpi_unit = $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                            
                                        }
                                        else
                                        {
                                            kpi_list = kpi_list+';'+$("#kpilistyii_"+kra_id_value1[j]+i).val();
                                            kpi_unit = kpi_unit+';'+$("#mask_number-"+kra_id_value1[j]+i).find(':selected').val();
                                            
                                        }
                                        if (selected_value != 'Units' && selected_value != 'Weight' && selected_value != 'Value') 
                                        {var chk_per = /[-]/;
                                            if(selected_value == 'Percentage')
                                            {
                                               //alert($(".target_need1").text());               
//alert($(".target_value1"+kra_id_value1[j]+i).text());
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need1").text() != 'undefined' || $(".target_need1").text() === undefined) && (!$.isNumeric($(".target_value1"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value1"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_value1"+kra_id_value1[j]+i).text()>100 || $(".target_value1"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value1"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need2").text() != 'undefined' || $(".target_need2").text() === undefined) && (!$.isNumeric($(".target_value2"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value2"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value2"+kra_id_value1[j]+i).text()>100 || $(".target_value2"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value2"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need3").text() != 'undefined' || $(".target_need3").text() === undefined) && (!$.isNumeric($(".target_value3"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value3"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value3"+kra_id_value1[j]+i).text()>100 || $(".target_value3"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value3"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need4").text() != 'undefined' || $(".target_need4").text() === undefined) && (!$.isNumeric($(".target_value4"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value4"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value4"+kra_id_value1[j]+i).text()>100 || $(".target_value4"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage cannot exceed 100%';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value4"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need5").text() != 'undefined' || $(".target_need5").text() === undefined) && (!$.isNumeric($(".target_value5"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value5"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if($(".target_value5"+kra_id_value1[j]+i).text()>100 || $(".target_value5"+kra_id_value1[j]+i).attr('value')>100)
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should contain maximum 100 value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value5"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Percentage should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
var val1 = '';var val2 = '';var val3 = '';var val4 = '';var val5 = '';
                                                    error[kra_id_value1[j]] = '';
if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }

                                                }
                                            }
                                            else  if(selected_value == 'Days')
                                            {
                                               //alert($(".target_need1").text());               
//alert($(".target_value1"+kra_id_value1[j]+i).text());
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need1").text() != 'undefined' || $(".target_need1").text() === undefined) && (!$.isNumeric($(".target_value1"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value1"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value1"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need2").text() != 'undefined' || $(".target_need2").text() === undefined) && (!$.isNumeric($(".target_value2"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value2"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value2"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need3").text() != 'undefined' || $(".target_need3").text() === undefined) && (!$.isNumeric($(".target_value3"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value3"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value3"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need4").text() != 'undefined' || $(".target_need4").text() === undefined) && (!$.isNumeric($(".target_value4"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value4"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value4"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(($(".target_need5").text() != 'undefined' || $(".target_need5").text() === undefined) && (!$.isNumeric($(".target_value5"+kra_id_value1[j]+i).text()) && !$.isNumeric($(".target_value5"+kra_id_value1[j]+i).attr('value'))))
                                                {
                                                     error[kra_id_value1[j]] = 'Only numbers are allowed for Days/Percentage.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
else if(chk_per.test($(".target_value5"+kra_id_value1[j]+i).text()))
                                                {
                                                     error[kra_id_value1[j]] = 'Days should not contain negative value.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
                                                    var val1 = '';var val2 = '';var val3 = '';var val4 = '';var val5 = '';
                                                    error[kra_id_value1[j]] = '';
if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Date')
                                            {
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                               
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }                                                
                                                else
                                                {
                                                    error[kra_id_value1[j]] = '';
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =$(".target_value1"+kra_id_value1[j]+i).val()+'-'+$(".target_value2"+kra_id_value1[j]+i).val()+'-'+$(".target_value3"+kra_id_value1[j]+i).val()+'-'+$(".target_value4"+kra_id_value1[j]+i).val()+'-'+$(".target_value5"+kra_id_value1[j]+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+kra_id_value1[j]+i).val()+'-'+$(".target_value2"+kra_id_value1[j]+i).val()+'-'+$(".target_value3"+kra_id_value1[j]+i).val()+'-'+$(".target_value4"+kra_id_value1[j]+i).val()+'-'+$(".target_value5"+kra_id_value1[j]+i).val();                                   
                                                    }

                                                }
                                            }
                                            else if(selected_value == 'Text')
                                            {
                                                
                                                var chk = /[;-]/;
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if((chk.test($(".target_value1"+kra_id_value1[1]+i).val()) || ($(".target_value1"+kra_id_value1[j]+i).val()!='' && $(".target_value1"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value1"+kra_id_value1[1]+i).attr('value')) || ($(".target_value1"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value1"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if((chk.test($(".target_value2"+kra_id_value1[1]+i).val()) || ($(".target_value2"+kra_id_value1[j]+i).val()!='' && $(".target_value2"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value2"+kra_id_value1[1]+i).attr('value')) || ($(".target_value2"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value2"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if((chk.test($(".target_value3"+kra_id_value1[1]+i).val()) || ($(".target_value3"+kra_id_value1[j]+i).val()!='' && $(".target_value3"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value3"+kra_id_value1[1]+i).attr('value')) || ($(".target_value3"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value3"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if((chk.test($(".target_value4"+kra_id_value1[1]+i).val()) || ($(".target_value4"+kra_id_value1[j]+i).val()!='' && $(".target_value4"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value4"+kra_id_value1[1]+i).attr('value')) || ($(".target_value4"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value4"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if((chk.test($(".target_value5"+kra_id_value1[1]+i).val()) || ($(".target_value5"+kra_id_value1[j]+i).val()!='' && $(".target_value5"+kra_id_value1[j]+i).val().length>2000)) && (chk.test($(".target_value5"+kra_id_value1[1]+i).attr('value')) || ($(".target_value5"+kra_id_value1[j]+i).attr('value')!='' && $(".target_value5"+kra_id_value1[j]+i).attr('value').length>2000)))
                                                {
                                                     error[kra_id_value1[j]] = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
//alert($(".target_value1"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value2"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value3"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value4"+kra_id_value1[j]+i).attr('value'));
//alert($(".target_value5"+kra_id_value1[j]+i).attr('value'));
                                                                                   error[kra_id_value1[j]] = '';
                                                   if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }


                                                }
                                            }
                                            else if(selected_value == 'Ratio')
                                            {
                                                var ratio_chk = /^([0-9]{1,5}[:]{1}[0-9]{1,5})$/;
                                                if($(".target_need1").text() != 'undefined' && ($(".target_value1"+kra_id_value1[j]+i).text()=='' && $(".target_value1"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                    error[kra_id_value1[j]] = 'Target 1 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value1"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value1"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if($(".target_need2").text() != 'undefined' && ($(".target_value2"+kra_id_value1[j]+i).text()=='' && $(".target_value2"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 2 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value2"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value2"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                    error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need3").text() != 'undefined' && ($(".target_value3"+kra_id_value1[j]+i).text()=='' && $(".target_value3"+kra_id_value1[j]+i).attr('value')==''))
                                                
                                                {
                                                     error[kra_id_value1[j]] = 'Target 3 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                               else if(!ratio_chk.test($(".target_value3"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value3"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need4").text() != 'undefined' && ($(".target_value4"+kra_id_value1[j]+i).text()=='' && $(".target_value4"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 4 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value4"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value4"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if($(".target_need5").text() != 'undefined' && ($(".target_value5"+kra_id_value1[j]+i).text()=='' && $(".target_value5"+kra_id_value1[j]+i).attr('value')==''))
                                                {
                                                     error[kra_id_value1[j]] = 'Target 5 value is compulsory.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else if(!ratio_chk.test($(".target_value5"+kra_id_value1[j]+i).text()) && !ratio_chk.test($(".target_value5"+kra_id_value1[j]+i).attr('value')))
                                                {
                                                     error[kra_id_value1[j]] = 'Please enter valid value in ratio field(Example 1:2).';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                                }
                                                else
                                                {
                                                    error[kra_id_value1[j]] = '';
                                                   if($(".target_value1"+kra_id_value1[j]+i).val() != '')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).val();
}
else if($(".target_value1"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $(".target_value1"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value2"+kra_id_value1[j]+i).val() != '')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).val();
}
else if($(".target_value2"+kra_id_value1[j]+i).attr('value') !='')
{
val2 = $(".target_value2"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value3"+kra_id_value1[j]+i).val() != '')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).val();
}
else if($(".target_value3"+kra_id_value1[j]+i).attr('value') !='')
{
val3 = $(".target_value3"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value4"+kra_id_value1[j]+i).val() != '')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).val();
}
else if($(".target_value4"+kra_id_value1[j]+i).attr('value') !='')
{
val4 = $(".target_value4"+kra_id_value1[j]+i).attr('value');
}
if($(".target_value5"+kra_id_value1[j]+i).val() != '')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).val();
}
else if($(".target_value5"+kra_id_value1[j]+i).attr('value') !='')
{
val5 = $(".target_value5"+kra_id_value1[j]+i).attr('value');
}
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1+'-'+val2+'-'+val3+'-'+val4+'-'+val5;                                   
                                                    }

                                                }
                                            }
                                        }
                                        else if(selected_value == 'Units' || selected_value == 'Weight' || selected_value == 'Value')
                                        {

                                             var string_num = /^([0-9.]{1,100})$/;
                                            if ($("#unit_value-"+kra_id_value1[j]+i).val()=='' || $("#unit_value-"+kra_id_value1[j]+i).val() === undefined || !string_num.test($("#unit_value-"+kra_id_value1[j]+i).val())) 
                                            {
                                                error[kra_id_value1[j]] = 'Please Fill unit value';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }
                                             else if ($("#unit_value-"+kra_id_value1[j]+i).val() == 0 || $("#unit_value-"+kra_id_value1[j]+i).val().length>6)
                                            {
                                                error[kra_id_value1[j]] = 'Minimum 1 and maximum 6 digits are allwed.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }                                             
                                            else if (!$.isNumeric($("#unit_value-"+kra_id_value1[j]+i).val())) 
                                            {
                                                error[kra_id_value1[j]] = 'Only numbers are allowed for Units/Weight/Value field.';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }
                                            else
                                            {
                                               
if($("#unit_value-"+kra_id_value1[j]+i).val() != '')
{
val1 = $("#unit_value-"+kra_id_value1[j]+i).val();
}
else if($("#unit_value-"+kra_id_value1[j]+i).attr('value') !='')
{
val1 = $("#unit_value-"+kra_id_value1[j]+i).attr('value');
}

                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value =val1;
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+val1;                                   
                                                    }
                                                //alert(kpi_value);
                                            }
                                        }

                                        if($("#goal_status-"+kra_id_value1[j]).find(':selected').val() == 'Select')
                                            {
                                                 error[kra_id_value1[j]] = 'Please Select KRA Status';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }
                                        else
                                        {                                           
                                            error[kra_id_value1[j]] = '';                                         
                                            goal_status = $("#goal_status-"+kra_id_value1[j]).find(':selected').val();
                                        } 
                                        //alert(final_kpi_wt2);
                                        if (final_kpi_wt2 !='' && final_kpi_wt2 != 100) 
                                            {
                                                error[kra_id_value1[j]] = 'The Total for kpi score should be 100';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }   
                                  
                                      
                                    }
                                    else
                                    {
                                        if ($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+kra_id_value1[j]+i).val() != '' || $("#unit_value-"+kra_id_value1[j]+i).val() != '')) 
                                        {
                                             error[kra_id_value1[j]] = 'Please Fill Correct KPI Details';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                        }
                                        else  if ($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() != 'Select' && ($("#kpilistyii_"+kra_id_value1[j]+i).val() == '' || $("#unit_value-"+kra_id_value1[j]+i).val() == '')) 
                                        {
                                            error[kra_id_value1[j]] = 'Please Fill Correct KPI Details';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                        }
                                        else if(($("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() == 'Select' && ($("#kpilistyii_"+kra_id_value1[j]+i).val() != '' || $("#unit_value-"+kra_id_value1[j]+i).val() != '')) || ($("#kpilistyii_"+kra_id_value1[j]+i).val() == '' && $("#mask_number-"+kra_id_value1[j]+i).find(':selected').val() != 'Select'))
                                            {
                                                error[kra_id_value1[j]] = 'Please Fill Correct KPI Details';error_count1 = kra_id_value1[j]+i;error_count2 = kra_id_value1[j];break;
                                            }                   
                                            else
                                            {
                                                 error[kra_id_value1[j]] = ''; 

                                            }                                 
                                    }          
                                }                                                         
                                } 
                        
                        } 
                        
                       $("#show_spin2").css('display','block');
                        if(error[kra_id_value1[j]] == '')
                          { 
                                            //alert("good");
                                            var base_url = window.location.origin;
                                            var data = { 
                                                'target' : $("#Weightage"+kra_id_value1[j]).find(':selected').val(),                           
                                                'target_unit' : kpi_unit,
                                                'target_value1' : kpi_value,
                                                'kpi_list' : kpi_list,
                                                'KPI_target_value' : final_kpi_wt1,
                                                'KPI_id' : kra_id_value1[j],
                                                'goal_status' : goal_status,
                                                'KRA_category' : $(".kra_category-"+kra_id_value1[j]).find(':selected').val(),
                                                'KRA_description' : $(".KRA_description-"+kra_id_value1[j]).val(),
                                                'reoprting_to' : $(".faculty_email_id1"+kra_id_value1[j]).find(':selected').val(),
                                            };

                                            $.ajax({
                                                type : 'post',
                                                datatype : 'html',
                                                data : data,
                                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/update_emp_kpi',
                                                success : function(data)
                                                {
//alert(data);
                                                    var kra_val = $("#kpi_record-"+data).parent().parent().parent().attr('id');
//var kra_val = $("."+kra_val1).closest('div').attr('id');
//alert(kra_val);
                                                   //$("#"+kra_val).load(location.href + " #"+kra_val);
                                                    
                                                }
                                            });
                            error_count++;
                          }
                          else
                          {
                            break; 
                          } 
                        }
            $("#err").hide();
                        if(error_count != $("#total_kra_number").text())
                          {
                            $("#err").hide();$("#show_spin2").css('display','none');
                            if(error_count1 != '')
                            {
                                //alert(error_count2);
                                //alert(error[error_count2]);
                                $('body').animate({
                                    scrollTop: ($("#kra_sheet_"+error_count2).parent().offset().top)
                                },500);
                if($(".kra_category-"+error_count1).find(':selected').val() == '--Select--')
                                {
                                    $(".kra_category-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                else if(error[error_count2] == 'Please enter KRA description')
                                {
                                    $(".KRA_description-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if($("#Weightage"+error_count2).find(':selected').val() == 0)
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $("#Weightage"+error_count2).css('border-color','red');
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if($("#kpilistyii_"+error_count1).val() == '')
                                {
                                    $("#kpilistyii_"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if($("#mask_number-"+error_count1).find(':selected').val() == 'Select')
                                {
                                    $("#mask_number-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if(error[error_count2] == 'The Total for kpi score should be 100')
                                {
                                    $("#kpi_target_value-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if(error[error_count2] == 'Please Fill unit value')
                                {
                                    $("#unit_value-"+error_count1).css('border-color','red');
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //alert(error_count1);
                                }
                                else if (error[error_count2] == 'Target 1 value is compulsory.') 
                                {
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $(".target_value1"+error_count1).css('border-color','red');
                                }
                                else if (error[error_count2] == 'Target 2 value is compulsory.') 
                                {
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $(".target_value2"+error_count1).css('border-color','red');
                                }
                                else if (error[error_count2] == 'Target 3 value is compulsory.') 
                                {
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    $(".target_value3"+error_count1).css('border-color','red');
                                }
                                else if (error[error_count2] == 'Target 4 value is compulsory.') 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $(".target_value4"+error_count1).css('border-color','red');
                                }
                                 else if (error[error_count2] == 'Target 5 value is compulsory.') 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    //$(".target_value5"+error_count1).css('border-color','red');
                                }
                                else
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text(error[error_count2]);
                                    //$("#error_spec"+error_count2).text(error[error_count2]);
                                    $(".review_comment"+error_count1).css('border-color','red');
                                }
                                
                            }
                            
                            
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
                                    {
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','');chk_compl++;
                                    }         
                            }
                        }
                        //alert($("#program_cmd-"+i).val());
if($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' && $("#program_cmd-"+i).val().length>500)
{
chk_compl1 = 1;
 $("#program_cmd-"+i).css('border-color','red');break;

}
else if ($("#program_cmd-"+i).val() != 'undefined' && $("#program_cmd-"+i).val() != '' && !chk.test($("#program_cmd-"+i).val()))
                        {
                            if (prgrm_cmd == '') 
                            {
                                prgrm_cmd = i+'?'+$("#program_cmd-"+i).val();
                            }
                            else
                            {
                                prgrm_cmd = prgrm_cmd+';'+i+'?'+$("#program_cmd-"+i).val();
                            }
                            $("#program_cmd-"+i).css('border-color','');
                             chk_cmnts++;
                        }
                        else if($("#program_cmd-"+i).val() != '' && chk.test($("#program_cmd-"+i).val()))
                        {
                          chk_cmnts = 0;
                         $("#program_cmd-"+i).css('border-color','red');break;
                        }                         
                    }
                    //alert(chk_compl);
                    for (var i = 0; i <= 2; i++) {
if(!($("#days_required"+i).val()===undefined))
{
                       if (($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()=='' || $("#faculty_email_id"+i).find(":selected").val()=='Select')))  || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' || $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()=='' && ($("#days_required"+i).val()=='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select'))) || ($(".topic"+i).val()!='' && ($("#faculty_email_id"+i).find(":selected").val()!='' && $("#faculty_email_id"+i).find(":selected").val()!='Select') && ($("#days_required"+i).val()!='' && !$.isNumeric($("#days_required"+i).val()))))
                        {
                            $(".topic"+i).css('border-color','red');
                            $("#days_required"+i).css('border-color','red');
                            $("#faculty_email_id"+i).css('border-color','red');
                            chk_cmnts1++;break;
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
}
//alert(chk_cmnts1);
                    for (var i = 3; i <= 4; i++) {
                       if (($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()!='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()===undefined))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()!='' && !$.isNumeric($("#number_of_meetings"+i).val()) && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()!='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()!='' || $("#faculty_email_id"+i).val()!='undefined'))) || ($(".target_date"+i).val()=='' && ($("#number_of_meetings"+i).val()=='' && ($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()=='undefined'))))
                        {
                            $(".target_date"+i).css('border-color','red');
                            $("#number_of_meetings"+i).css('border-color','red');
                            $("#faculty_email_id"+i).css('border-color','red');
                            chk_cmnts2++;break;
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
                    //alert(faculty_value1);
if (chk_compl1 == 1) 
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                         $("#blink_me").removeClass('blink_me');
                          $("#error_spec1").text("Maximum 500 characters are allowed for program comments.");                          
                    }
                    else if(chk_cmnts1 != 0)
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                         $("#blink_me").removeClass('blink_me');
                          $("#error_spec1").text("Please provide all the details if you need other program.");   
                    }
                    else if($("#compare_designation").text() == 1 && chk_cmnts2 != 0)
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk").first().offset().top)
                        },500);
                         $("#blink_me").removeClass('blink_me');
                          $("#error_spec2").text("Please provide all the details for Development through developmental relationships.");   
                    }
                    else
                    {
                      $("#blink_me").removeClass('blink_me');
                        $("#error_spec1").text("");
                        $("#error_spec2").text("");
                      if($("#compare_designation").text() == 1 && $("#project_title1").val() == '' || $("#project_title1").val().length>500)
                        {
                             $('body').animate({
                                scrollTop: ($("#error_spec3").first().offset().top)
                            },500);
                                $("#project_title1").css('border-color','red');
                                $("#error_spec3").text("Please provide project title(Note: maximum limit is 500).");   
                        }
                        else if($("#compare_designation").text() == 1 && $("#review_date").val() == '')
                        {
                             $("#project_title1").css('border-color','');
                             $('body').animate({
                                scrollTop: ($("#error_spec3").first().offset().top)
                            },500);
                                $("#review_date").css('border-color','red');
                                $("#error_spec3").text("Please provide project review date.");
                        }
                        else if($("#compare_designation").text() == 1 && $("#target_end_date").val() == '')
                        {
                           $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($("#error_spec3").first().offset().top)
                            },500);
                                $("#target_end_date").css('border-color','red');
                                $("#error_spec3").text("Please provide project target end date.");
                        }
                        else if($("#compare_designation").text() == 1 && $("#project_scope").val() == '' || $("#project_scope").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $('body').animate({
                                scrollTop: ($("#error_spec3").first().offset().top)
                            },500);
                                $("#project_scope").css('border-color','red');
                                $("#error_spec3").text("Please provide project scope(Note: maximum limit is 500).");   
                        }
                        else if($("#compare_designation").text() == 1 && $("#project_exclusion").val() == '' || $("#project_exclusion").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $('body').animate({
                                scrollTop: ($("#error_spec3").first().offset().top)
                            },500);
                                $("#project_exclusion").css('border-color','red');
                                $("#error_spec3").text("Please provide project exclusion(Note: maximum limit is 500).");   
                        }
                         else if($("#compare_designation").text() == 1 && $(".project_deliverables").val() == '' || $(".project_deliverables").val().length>500)
                        {
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $('body').animate({
                                scrollTop: ($("#error_spec4").first().offset().top)
                            },500);
                                $(".project_deliverables").css('border-color','red');
                                $("#error_spec4").text("Please provide comments in project deliverables field(Note: maximum limit is 500).");   
                        }
                        else if($("#compare_designation").text() == 1 && $(".learn_from").val() == '' || $(".learn_from").val().length>700)
                        {
                          $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $(".project_deliverables").css('border-color','');
                             $('body').animate({
                                scrollTop: ($("#error_spec4").first().offset().top)
                            },500);
                                $(".learn_from").css('border-color','red');
                                $("#error_spec4").text("Please provide comments in what is expected to learn from this project(Note: maximum limit is 300).");   
                        }
                        else if($("#compare_designation").text() == 1 && $(".reviewvers_name").val() == '' || $(".reviewvers_name").val().length>50)
                        {
                          $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $(".project_deliverables").css('border-color','');
                             $(".learn_from").css('border-color','');
                             $('body').animate({
                                scrollTop: ($("#error_spec4").first().offset().top)
                            },500);
                                $(".reviewvers_name").css('border-color','red');
                                $("#error_spec4").text("Please provide reviewer(s) name(Note: maximum limit is 50).");   
                        }
                        else
                        {
                           $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                            $("#project_scope").css('border-color','');
                            $("#project_exclusion").css('border-color','');
                            $("#project_title1").css('border-color','');
                            $("#review_date").css('border-color','');
                            $("#target_end_date").css('border-color','');
                             $("#project_scope").css('border-color','');
                             $(".project_deliverables").css('border-color','');
                             $(".learn_from").css('border-color','');
                             $(".reviewvers_name").css('border-color','');
                            $("#error_spec1").text("");
                            $("#error_spec2").text("");
                            $("#error_spec3").text("");
                            $("#error_spec4").text("");
                            var base_url = window.location.origin;
                          str = $("#Reporting_officer1_id").text().replace(/\s+/g, '');
                          str1 = $("#emp_code").text().replace(/\s+/g, '');
                          $("#error_spec1").text("");
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
                              'url' : base_url+$("#basepath").attr('value')+'/index.php?r=IDP/save_data_final',
                            success : function(data)
                            {
                               $("#show_spin2").css('display','block');
                                var data = {
                                    emp_id : $(".send_for_appraisal").attr('id')
                                };
                                 var base_url = window.location.origin;
                                $.ajax({
                                    type : 'post',
                                    datatype : 'html',
                                    data : data,
                                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/final_goal_review1',
                                    success : function(data)
                                    {

                    $("#show_spin2").css('display','none');
                                        if (data == 1)  
                                        {
                                        
                                            if($("#term_condition:checked").val() != 'term_condition')
                                            {
                                                //jQuery("#agree_box").modal('show');
                                                $("#blink_me").addClass('blink_me');
                                            }
                                            else
                                            {

                                                $("#blink_me").removeClass('blink_me');
                                            var data = {
                                                    emp_id : $(".send_for_appraisal").attr('id')
                                                };
                                                $("#err").hide();
                                                jQuery("#static").modal('show');
                                                $("#continue_goal_set").click(function(){
                                                    $("#show_spin1").show();jQuery("#static").modal('hide');
                                                     var base_url = window.location.origin;
                                                        $.ajax({
                                                            type : 'post',
                                                            datatype : 'html',
                                                            data : data,
                                                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/goalapproved',
                                                            success : function(data)
                                                            {
                                                                //alert(data);
                                                                jQuery("#static").modal('hide');
                                                                $("#show_spin1").hide(); 
                                                                $("#err").show();  
                                                                $("#err").fadeOut(6000);
                                                                $("#err").text("Notification Sent to Employee");
                                                                $("#err").addClass("alert-success"); 
                                $("#term_condition_hide").css('display','none'); 
$(".add_kpi").css('display','none'); 
$(".getapprove").css('display','none'); 
$(".del_kpi").css('display','none');                      
                                                            }
                                                        });
                                                });
                                            } 
                                        }   
                                        else if(data == 2)
                                        {
                        $("#blink_me").removeClass('blink_me');
$("#show_spin2").css('display','none');
                                            $("#err").show();$("#err").fadeOut(6000);
                                            $("#err").text("The total of the KRA total should be 100");
                                            $("#err").addClass("alert-danger");
                                        }
                    else if(data == 3)
                                        {$("#blink_me").removeClass('blink_me');
$("#show_spin2").css('display','none');
                                            $("#err").show();$("#err").fadeOut(6000);
                                            $("#err").text("KRA Category cannot repeat 3 times.");
                                            $("#err").addClass("alert-danger");
                                        }                   
                                    }
                                });   
                            }
                        });
                        }
                        
                        //alert(chk_cmnts);
                    }
                    
               
                          } 
                });

               });
                </script>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script type="text/javascript">

                 var error = '';
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
                                    else if (selected_unit == 'Percentage' || selected_unit == 'Ratio' || selected_unit == 'Days' || selected_unit == 'Date') 
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
                            
                                if ($("#kpilistyii_"+i).val()!= '' && $("#mask_number-"+i).find(':selected').val()!='Select' && $("#kpi_target_value-"+i).val()!='') 
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
                                                 if ($(".target_value1"+i).val()!='' && $(".target_value2"+i).val()!='' && $(".target_value3"+i).val()!='' && $(".target_value4"+i).val()!='' && $(".target_value5"+i).val()!='') 
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
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/save_kpi',
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
            var wtg_value = $("#Weightage1").find(':selected').val();
                        var catergory = $("#target_value_data1").find(':selected').val();
                     //alert(wtg_value);
        if(catergory == '--Select--')
                        {
                            error = 'Please select KRA Category.';
                        }
                        else if(wtg_value == '0')
                        {
                            error = 'Please select KRA Weightage.';
                        }                               
                   else  if (data_length==0)
                    {
                        error = 'Please enter KRA description';
                    }
                 else if($(".faculty_email_id2").find(':selected').val() == 'Select' || $(".faculty_email_id2").find(':selected').val() == '')
                    {
                        error = 'Please select Reporting Head.';
                    }
                    else if(data_length>300)
                    {
                        error = 'Maximum 300 characters are allowed in KRA description';
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
                        //alert(catergory);
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
                                if ($("#kpi_target_value-"+i).val() == '') 
                                {
                                    add_value = 0;
                                }
                                else
                                {
                                    add_value = $("#kpi_target_value-"+i).val();
                                }
                                final_kpi_total = parseFloat(final_kpi_total)+parseFloat(add_value);
                                if (string_num.test($("#kpi_target_value-"+i).val())) 
                                {
                                    if (final_kpi_wt == '') 
                                    {
                                        final_kpi_wt = $("#kpi_target_value-"+i).val();
                                    }
                                    else
                                    {
                                       final_kpi_wt = final_kpi_wt+';'+$("#kpi_target_value-"+i).val();
                                    }
                                    error = '';
                                }
                                else if($("#kpi_target_value-"+i).val() != '')
                                {                                     
                                    error = "Please enter only numbers in KPI Weightage field.";
                                }
                                else if($("#kpi_target_value-"+i).val() == '')
                                {
                                    if (final_kpi_wt == '') 
                                    {
                                        final_kpi_wt = 0;
                                    }
                                    else
                                    {
                                       final_kpi_wt = final_kpi_wt+';'+ 0;
                                    }
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
                                                else if(($(".target_value1"+i).val()!='' && chk.test($(".target_value1"+i).val())) || ($(".target_value1"+i).val()!='' && $(".target_value1"+i).val().length>150))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                               else if(($(".target_value2"+i).val()!='' && chk.test($(".target_value2"+i).val())) || ($(".target_value2"+i).val()!='' && $(".target_value2"+i).val().length>150))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($(".target_value3"+i).val()!='' && chk.test($("#target_need3").text())) || ($(".target_value3"+i).val()!='' && $("#target_need3").text().length>150))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value4"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value4"+i).val().length>150))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                               else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value5"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value5"+i).val().length>150))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 150.';break;
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
                                                     error = 'Please enter valid value in ratio field(Example 1:2).';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !ratio_chk.test($(".target_value2"+i).val()))
                                                {
                                                    error = 'Please enter valid value in ratio field(Example 1:2).';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !ratio_chk.test($(".target_value3"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field(Example 1:2).';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !ratio_chk.test($(".target_value4"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field(Example 1:2).';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !ratio_chk.test($(".target_value5"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field(Example 1:2).';break;
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
                                                error = 'Minimum 1 and maximum 6 digits are allwed.';break;
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
                        //alert(error);
                        if (updated_kpi_value != '') 
                        {
                            kpi_id_value = updated_kpi_value;
                        }
                        //alert($("#correct_emp_id").text());
                        var data = {
                            'correct_emp_id' : $("#correct_emp_id").text(),
                            'KRA_category' : $("#target_value").find(':selected').val(),
                            'KRA_description' : $("#KRA_description").val(),
                            'target' : $("#Weightage1").find(':selected').val(),
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                            'KPI_target_value' : final_kpi_wt,
                            'kpi_id_value' : kpi_id_value,
                            'submit_kra_click' : 'yes',
                            'reoprting_to' : $(".faculty_email_id2").find(':selected').val()
                        };
                        console.log(data);
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                        if(error != '')
                        {
                             $("#err").show();  
                             //$("#err").fadeOut(6000);
                        $("#err").text(error);
                             
                            $("#err").addClass("alert-danger");
                        }
                        else
                         { 
                            $("#err").hide(); 
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/savekpi1',
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
                         $("#err").text(error);
                        $("#err").addClass("alert-danger");
                    }
                }
                 
                function send_notification()
                {
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
                }
               
          
                function get_target_value()
                {
                    //alert($('.target_value').find(':selected').val());
                     var selected_unit = {
                            'kra_category' : $('.target_value').find(':selected').val(),
                    }
                    //alert($('.target_value').find(':selected').val());
                    var base_url = window.location.origin;
                     $.ajax({
                            type : 'post',
                            datatype : 'json',
                            data : selected_unit,
                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/gettarget_value',
                            success : function(data)
                            { 
                                //alert(detail[2]);
                                var detail = jQuery.parseJSON(data);
                                $("#kpi_record").html(detail[0]);
                                $("#kpi_list_number").html(detail[1]);
                                $("#min_kpi").text(detail[2]);
                                $("#max_kpi").text(detail[3]);
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
              
