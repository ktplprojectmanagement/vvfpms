<label id="yr" style="display:none"><?php echo Yii::app()->user->getState('financial_year_check');?></label>
<?php echo $edit_flag; ?>

<!--</script>-->
<?php 

$f_year=Yii::app()->user->getState('financial_year_check'); 


$f_year_comp=explode('-',$f_year);
// echo count($kpi_data);
if((((date('Y')== $f_year_comp['1'] && date('m')< 3) || (date('Y') == $f_year_comp['0'] && date('m') > 3))) && (count($kpi_data) < 5 || $edit_flag=="1")){?>
<script>
$(document).ready(function(){
    
       $('#set_goal_sheet').css('display','block');
    
});
</script>   
<?php }
else
{ ?>

<script>
$(document).ready(function(){
    
      //  alert("sssssssssssssssssssssssss");
   
    $('#set_goal_sheet').css('display','none');
});
</script>   

<?php
}
?>
        
<?php
$cnt_kra_cat_people1=0;$cnt_kra_cat_process1=0;$cnt_kra_cat_customer1=0;$cnt_kra_cat_business1=0;
$model= new KpiAutoSaveForm();
$Employee_id=Yii::app()->user->getState("Employee_id");

$year1=Yii::app()->user->getState('financial_year_check'); 

$kategory_cnt=$model->get_kra_category($Employee_id,$year1);

$counts = array_count_values(array_column($kategory_cnt, 'KRA_category'));
//print_r($counts);
$cnt=0;$cnt_cat=0;
if(isset($counts['People']) && $counts['People']>2){
    $cnt=1;
}
else if(isset($counts['Customer']) && $counts['Customer']>2){
    $cnt=1;
}
else if(isset($counts['Process']) && $counts['Process']>2){
    $cnt=1;
}
else if(isset($counts['Business']) && $counts['Business']>2){
    $cnt=1;
}
else{
    $cnt=0;
    
}

if(isset($counts['People']) && ($counts['People']>1 || $counts['People']==1)){
     $cnt_kra_cat_people1=1;
}
if(isset($counts['Customer']) && ($counts['Customer']>1 || $counts['Customer']==1)){
     $cnt_kra_cat_customer1=1;
}
if(isset($counts['Process']) && ($counts['Process']>1 || $counts['Process']==1)){
    $cnt_kra_cat_process1=1;
}
if(isset($counts['Business']) && ($counts['Business']>1 || $counts['Business']==1)){
    $cnt_kra_cat_business1=1;
}

if(isset($counts['People']) && $counts['People']>1){
    $cnt_cat=1;
}
else if(isset($counts['Customer']) && $counts['Customer']>1){
    $cnt_cat=1;
}
else if(isset($counts['Process']) && $counts['Process']>1){
    $cnt_cat=1;
}
else if(isset($counts['Business']) && $counts['Business']>1){
    $cnt_cat=1;
}
else{
    $cnt_cat=0;
    
}

$cnt_kra_cat_people=0;$cnt_kra_cat_process=0;$cnt_kra_cat_customer=0;$cnt_kra_cat_business=0;$total_ch_cat=4;$total_ch_cat1=4;
if(isset($counts['People']) && $counts['People']==1){
    $cnt_kra_cat_people=1;
    $total_ch_cat = $total_ch_cat-1;
}
if(isset($counts['Customer']) && $counts['Customer']==1){
    $cnt_kra_cat_customer=1;
    $total_ch_cat = $total_ch_cat-1;
}
if(isset($counts['Process']) && $counts['Process']==1){
    $cnt_kra_cat_process=1;
    $total_ch_cat = $total_ch_cat-1;
}
if(isset($counts['Business']) && $counts['Business']==1){
    $cnt_kra_cat_business=1;
    $total_ch_cat = $total_ch_cat-1;
}



$ppl=0;$buis=0;$cust=0;$proc=0;
if(isset($counts['People'])){
    $ppl=$counts['People'];
}
if(isset($counts['Customer'])){
    $cust=$counts['Customer'];
}
if(isset($counts['Process'])){
    $proc=$counts['Process'];
}
if(isset($counts['Business'])){
    $buis=$counts['Business'];
}

?>
    <lable id="kra_cat_cnt" style="display:none"><?php echo $cnt;?></lable>  
    <lable id="kra_cat_cnt1" style="display:none"><?php echo $cnt_cat;?></lable>  
    <lable id="kra_cat_cnt2" style="display:none"><?php echo $total_ch_cat;?></lable> 
    <lable id="kra_cat_cnt31" style="display:none"><?php echo $total_ch_cat;?></lable> 
    <lable id="cnt_kra_cat_people" style="display:none"><?php echo $cnt_kra_cat_people;?></lable> 
    <lable id="cnt_kra_cat_process" style="display:none"><?php echo $cnt_kra_cat_process;?></lable> 
    <lable id="cnt_kra_cat_customer" style="display:none"><?php echo $cnt_kra_cat_customer;?></lable> 
    <lable id="cnt_kra_cat_business" style="display:none"><?php echo $cnt_kra_cat_business;?></lable> 
    <lable id="cnt_kra_cat_people1" style="display:none"><?php echo $cnt_kra_cat_people1;?></lable> 
    <lable id="cnt_kra_cat_process1" style="display:none"><?php echo $cnt_kra_cat_process1;?></lable> 
    <lable id="cnt_kra_cat_customer1" style="display:none"><?php echo $cnt_kra_cat_customer1;?></lable> 
    <lable id="cnt_kra_cat_business1" style="display:none"><?php echo $cnt_kra_cat_business1;?></lable> 
        
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        

                                                           
<label id='edit1'  style="display:none" ><?php echo $edit_flag; ?></label>
       <label id='emp_dept_name' style="display:none"><?php if(isset($emp_data['0']['Department'])) { echo $emp_data['0']['Department']; } ?></label>
      <label id='emp_dept_name' style="display:none"><?php if(isset($emp_data['0']['Cadre'])) { echo $emp_data['0']['Cadre']; } ?></label>
      <script type="text/javascript">
      function process(date){
           var parts = date.split("/");
           return new Date(parts[2], parts[1] - 1, parts[0]);
        }
        function addDays(myDate,days) {
        return new Date(myDate.getTime() + days*24*60*60*1000);
        }
        function convert(str) {
            var date = new Date(str),
                mnth = ("0" + (date.getMonth()+1)).slice(-2),
                day  = ("0" + date.getDate()).slice(-2);
            return [day,mnth,date.getFullYear()].join("/");
        }
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
        width: 426px;
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
    $(function(){
       setInterval(save_idp_data,3000);  
    });
</script>

<script type="text/javascript">
                $(function(){
                   $("body").on('mouseover','.validate_field',function(){
$(this).attr('data-content',$(this).val());
$(this).popover('show');
});
});
</script>
   <script type="text/javascript">
                $(function(){
                   $("body").on('mouseout','.validate_field',function(){
$(this).attr('data-content',$(this).val());
$(this).popover('hide');
});
});
</script>


<script type="text/javascript">
                $(function(){
                   $("body").on('mouseover','.validate_field1',function(){
$(this).attr('data-content',$(this).val());
$(this).popover('show');
});
});
</script>
   <script type="text/javascript">
                $(function(){
                   $("body").on('mouseout','.validate_field1',function(){
$(this).attr('data-content',$(this).val());
$(this).popover('hide');
});
});
</script>


<script>
function save_idp_data()
{
//alert("hi");
  var chk_cmnts = 0;var chk_cmnts1 = 0;var chk_cmnts2 = 0;var chk_compl = 0;var chk_compl1 = 0;
                    var get_list = $("#compulsory_id").text();
                    var get_list_value = get_list.split(';');
                   
                    var prgrm_cmd = ''; var chk = /[;]/; var topic = '';var date_value = '';var faculty_value = '';var development_data = '';var number_of_meetings = '';var faculty_value1 = '';var topic_diss1 = '';
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
                                topic_diss1 = $("#topic_to_be_diss"+i).val();
                            }
                            else
                            {
                                development_data = development_data+';'+$("#target_date"+i).val();
                                number_of_meetings = number_of_meetings+';'+$("#number_of_meetings"+i).val();
                                faculty_value1 = faculty_value1+';'+$("#faculty_email_id"+i).val();
                                topic_diss1 = topic_diss1+';'+$("#topic_to_be_diss"+i).val();
                            }
                    }
            //alert(number_of_meetings);        
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
                                topic_diss1: topic_diss1,
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
                                topic_diss1: topic_diss1,
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
                  // alert($("#emp_code").text());
                            $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : detail_data,
                                'url' : base_url+$("#basepath").attr('value')+'/index.php?r=IDP/save_data1',
                                success : function(data)
                                {
                             //alert(data);
                                }
                            });
}
</script>  
<label id="start_date" style="display:none" >01/Apr/<?php if(isset($f_year_comp['0'])) { echo $f_year_comp['0']; } ?></label>
<label id="end_date" style="display:none" >31/Mar/<?php if(isset($f_year_comp['1'])) { echo $f_year_comp['1']; } ?></label>


            <script type="text/javascript">
            var error = '';
         var j = jQuery.noConflict();
                j(function(){   
                    var fSDate=$('#start_date').text();
                    var fEDate=$('#end_date').text();
                //j(".date_pickup11").datepicker({dateFormat: 'dd/M/yy', changeMonth: true,changeYear: true ,minDate: fSDate, maxDate: fEDate});   
                j(".date_pickup").datepicker({dateFormat: 'dd/M/yy', changeMonth: true,changeYear: true ,minDate: fSDate, maxDate: fEDate});
        j(".date_pickup").attr('onkeydown','return false');  
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger");               
                    $("body").on('click','.del_kpi',function(){
                        $("#del_goal").modal('show');                         
                        var id = $(this).attr('id');
                        var id_value = id.split('-');                        
                        var data = {
                        'KPI_id' : id_value[1],
                        };
                        var base_url = window.location.origin;
                        $("#del_goal_set").click(function(){
                            $("#del_goal_set_kra").modal('show');
                             $.ajax({                            
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/kpi_del1',
                            success : function(data)
                            {
                               //alert(data);
                                $(".count_goal").text(data);
                                if(data != '')
                                {
                                    $("#output_div_"+id_value[1]).fadeOut(1000);
                                   $("output_div_"+id_value[1]).load(location.href + " .output_div"); 
                                   $("#del_goal").modal('hide');
                                   $("#del_goal_set_kra").modal('hide');
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
                            var letter_chk = /([a-zA-Z]{1,})([0-9]{1,})*$/;
                            var chk = /[;-]/;
                            if($("#mask_number-"+last_id_value).find(':selected').val() == 'Text')
                                {
                                   //alert($(this).val()); 
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
                                else if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Days' && $(this).val() == '0' ) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("Please fill correct days number");
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
                                        $("#error_value").text("Minimum 1 number and maximum 6 digits are allowed.");
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
                                else if ($("#mask_number-"+last_id_value).find(':selected').val() == 'Days' && $(this).val() == '0' ) 
                                {
                                    $("#err").css('display','block');
                                    $("#err").addClass("alert-danger"); 
                                    $(this).css('border','1px solid red');
                                    $("#error_value").text("0 number is not allowed");
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
                                            url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/fetch_field',
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
                                        $(".target_value2"+id_value[1]).css('updateground-color','');
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
                                            
                                          $j(".target_value1"+id_value[1]).datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'dd/M/yy',
    numberOfMonths: 1,
    changeMonth: true,changeYear: true,minDate: '01/Apr/2017', maxDate: '31/Mar/2018',
   
    
});
                                            $j(".target_value2"+id_value[1]).datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'dd/M/yy',
    numberOfMonths: 1,
    changeMonth: true,changeYear: true,minDate: '01/Apr/2017', maxDate: '31/Mar/2018',
   
    
});
                                            $j(".target_value3"+id_value[1]).datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'dd/M/yy',
    numberOfMonths: 1,
    changeMonth: true,changeYear: true,minDate: '01/Apr/2017', maxDate: '31/Mar/2018',
   
    
});
                                            $j(".target_value4"+id_value[1]).datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'dd/M/yy',
    numberOfMonths: 1,
    changeMonth: true,changeYear: true,minDate: '01/Apr/2017', maxDate: '31/Mar/2018',
   
    
});
                                            $j(".target_value5"+id_value[1]).datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'dd/M/yy',
    numberOfMonths: 1,
    changeMonth: true,changeYear: true,minDate: '01/Apr/2017', maxDate: '31/Mar/2018',
   
    
});
                                                                                       
                                           
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
                                    <p> Are you sure you want to send goalsheet & IDP to your manager? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn border-blue-soft" id="continue_goal_set">Submit</button>
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
                                    <div id="del_goal_set_kra" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="del_goal_set">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- END PAGE SIDEBAR -->
                           <label id="edit_flag_set" style="display:none"><?php if(isset($edit_flag) && $edit_flag!="") { echo $edit_flag; }?></label> 
                           <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Rules1" target="_blank"><button type="button" data-dismiss="modal" class="btn border-blue-soft" style="float:right">Rules For Goalsheet & IDP</button></a>
                               <div class="form-group col-xs-3" <?php if(isset($edit_flag) && $edit_flag!="") { ?> style="display:none"<?php }?>>
                                      <label>Select Year</label>
                                        <select class="form-control " name="financial_year" id="financial_year">
                                            <option>--Select--</option>
                                            <option <?php if(Yii::app()->user->getState('financial_year_check') == "2016-2017") { echo "selected"; } ?>>2016-2017</option>
                                            <option <?php if(Yii::app()->user->getState('financial_year_check') == "2017-2018") { echo "selected"; } ?>>2017-2018</option>
                                        </select>
                                    </div>
                            <div class="page-content-col">

                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="note note-success popupbox" style="display: none">
                                    <p class="popupmsg"></p>
                                </div>
<lable id="gaolsheet_type" style="display:none"><?php if(isset($emp_data['0']['new_kra_create']) && $emp_data['0']['new_kra_create'] == "on") { echo '1'; }else{ echo '0'; } ?></lable>
                                <div class="mt-bootstrap-tables" style="display: block">
<?php
//if(isset($emp_data['0']['new_kra_create']) && $emp_data['0']['new_kra_create'] == "on") {
?>
<lable id="new_apr" style="display:none"><?php if(isset($emp_data['0']['new_kra_till_date']) && $emp_data['0']['new_kra_till_date'] != "" && $emp_data['0']['new_kra_till_date'] != 0) { echo $emp_data['0']['new_kra_till_date']; }else { echo Yii::app()->user->getState("appriaser_1"); } ?></lable>
<?php
//}
?>
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
                                        <?php echo CHtml::textField('No_of_KPI','',array('class'=>'form-control','id'=>'kra_num',"maxlength"=>"1000")); ?>
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
                             
                                <div class="portlet box border-blue-soft bg-blue-soft" id="set_goal_sheet" style="margin-top: 70px;">
                                <div class="portlet-title">
                                                                 
                                    <div class="caption">
                                        Set Goalsheet</div>
                                </div>                                     
                                <div class="portlet-body" style="border: 1px solid rgb(76, 135, 185);">
                                    <div class="row table-responsive" style="margin-top: -15px;">
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
                                    
                                        <table id="kpi_table" class="table table-striped table-bordered table-hover" style="background-color: #EEF1F5;">
                                                    <tr>
                                                            <td>
                                                                KRA Category
                                                             </td>
                                                             <td colspan= 7 align="center" style="float: left;">                                                         
                                                            <?php 
                                                            //print_r($kpi_auto_data);die();
                                                             if (isset($kra_list) && count($kra_list)>0) {
                                                                $list_data = '';
                                                                $models = new KRAStructureForm();
                                                                 $models1 = $models->findAll();
                                                                $list = CHtml::listData($models1,'KRA_category', 'KRA_category');
                                                             }
                                                            $kpi_category = '';$kpi_desc = '';$wtg = '';$kpi_count = '';$target_value1 = '';$target_unit = '';$kpi_id = '';
                                                           $format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value','Percentage' => 'Percentage','Text' => 'Text');
                                                            $wtage = array('15'=>'15','20'=>'20','25'=>'25','30'=>'30','40'=>'40','50'=>'50');
                                                            if (isset($kpi_data_edit) && count($kpi_data_edit)>0) {
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
                                                               $kpi_category1 = $kpi_data_edit['0']['KRA_category'];
                                                            }
                                                           
                                                           $cities = array('Business'=>'Business','Process'=>'Process','People'=>'People','Customer'=>'Customer');
                                                             echo CHtml::dropDownList("target_value",'',$list,$htmlOptions=array('class'=>"form-control target_value",'style'=>"width: 186px;",'onchange'=>'js:get_target_value();','options' => $kpi_category));
                                                            ?><label id="kpi_cat_value-<?php echo $kpi_id; ?>" style="display:none"><?php if(isset($kpi_category1)) { echo $kpi_category1; } ?></label>
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                            <td style=""><label id="kpi_edit_id" style="display: none"><?php echo $kpi_id; ?></label>
                                                                KRA Description
                                                             </td>
                                                             <td colspan=7 align="center" valign=bottom>                
                                                            <?php  echo CHtml::textField('KRA_description',$kpi_desc,array('style'=>'float: left;','class'=>'form-control',"maxlength"=>"1000")); ?>
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


if (isset($emp_all_detail['0']['Reporting_officer1_id'])) {
    $head_array['0'] = $emp_all_detail['0']['Reporting_officer1_id'];
}

if (isset($emp_all_detail['0']['Reporting_officer2_id']) && $emp_all_detail['0']['Reporting_officer2_id'] == '') {
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
//print_r($KRA_category_auto);die();


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
                                                        <?php if(isset($edit_flag) && $edit_flag=='1')
                                             {?>
                                                        <th style="text-align:center;">Delete </th>
                                                        <?php } ?>
                                                    </tr>
                                                    </thead>
                                                   <tr id="other_format_text">
                                                   <label id="kpi_list_number" style="display:none"><?php if(isset($kpi_count) && $kpi_count != '' && count($kpi_count) != 1)
                                                    {
                                                        echo count($kpi_count);
                                                    }else if(isset($KRA_category_auto['0']['minimum_kpi'])) { echo $KRA_category_auto['0']['minimum_kpi']; } ?></label>
                                                    <label id='min_kpiwt' style="display: none"><?php if(isset($KRA_category_auto['0']['min_kpi_wt']) && $KRA_category_auto['0']['min_kpi_wt'] != ''){ echo $KRA_category_auto['0']['min_kpi_wt']; }?></label>
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
                                                            //print_r(count($list_count));die();
                                                            if (isset($KRA_category_auto['0']['minimum_kpi']) && count($list_count) == 1) {
                                                                $list_cnt = $KRA_category_auto['0']['minimum_kpi'];
                                                            }
                                                            else
                                                            {
                                                                $list_cnt = count($list_count);
                                                            }
                                                            
                                                            //print_r($KRA_category_auto['0']['minimum_kpi']);die();
                                                           
                                                            for ($i=0; $i < $list_cnt; $i++) {
                                                                
                                                                if(isset($target_unit[$cnt]))
                                                                {
                                                                    $unit = $target_unit[$cnt];
                                                                }                   
                                                                
                                                                
                                                                if (isset($unit) && $unit=='Select') {
                                                                    $unit_type[$unit] = array('selected' => 'selected');
                                                                    $unit_target = '';
                                                                    for ($j=0; $j < 5; $j++) { 
                                                                        $val[$i][$j] = '';
                                                                    }
                                                                    $disable_select = true;

                                                                }
                                                                else if (isset($unit) && $unit=='Days' || $unit=='Text' || $unit=='Ratio' || $unit=='Percentage' || $unit=='Date') { 

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
                                                                            if(isset($val_data[$j]))
                                                                            {
                                                                                $val[$i][$j] = $val_data[$j];
                                                                            }                                                                            
                                                                        }
                                                                        
                                                                    }
                                                                    else
                                                                    {
                                                                         for ($j=0; $j < 5; $j++) { 
                                                                            $val[$i][$j] = '';
                                                                        }
                                                                    }

                                                                    
                                                                   
                                                                }
                                                                else if(isset($unit) && $unit=='Units' || $unit=='Weight' || $unit=='Value')
                                                                {
                                                                    $disable_select = true;
                                                                    $disable_select1 = false;
                                                                    $unit_type[$unit] = array('selected' => 'selected');
                                                                   if (isset($target_value1[$cnt]) && isset($target_value1[$i]) && count($target_unit[$cnt])>0 && ($target_value1[$i]!='' || $target_value1[$i]!=0)) {
                                                                       $unit_target = $target_value1[$i];
                                                                           for ($j=0; $j < 5; $j++) { 
                                                                            if ($j==0) {
                                                                                $val[$i][$j] = '< '.round($unit_target*0.69,2);
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
                                                                 if (isset($format_list)) {
                                                 $format_list = $format_list;
                                             }
                                             else
                                             {
                                                $format_list = '';
                                             }
                                              if (isset($per_kpi_wt[$i])) {
                                                 $per_kpi_wt[$i] = $per_kpi_wt[$i];
                                             }
                                             else
                                             {
                                                $per_kpi_wt[$i] = '';
                                             }
                                             if (isset($kpi_count[$i])) {
                                                 $kpi_count[$i] = $kpi_count[$i];
                                             }
                                             else
                                             {
                                                $kpi_count[$i] = '';
                                             }
                                              if (isset($unit_type)) {
                                                 $unit_type = $unit_type;
                                             }
                                             else
                                             {
                                                $unit_type = '';
                                             }
                                             if (isset($unit_target)) {
                                                 $unit_target = $unit_target;
                                             }
                                             else
                                             {
                                                $unit_target = '';
                                             }
                                              if (isset($disable_select)) {
                                                 $disable_select = $disable_select;
                                             }
                                             else
                                             {
                                                $disable_select = '';
                                             }
                                             if (isset($disable_select1)) {
                                                 $disable_select1 = $disable_select1;
                                             }
                                             else
                                             {
                                                $disable_select1 = '';
                                             }
                                             if (isset($val[$i][0])) {
                                                 $val[$i][0] = $val[$i][0];
                                             }
                                             else
                                             {
                                                $val[$i][0] = '';
                                             }
                                             if (isset($val[$i][1])) {
                                                 $val[$i][1] = $val[$i][1];
                                             }
                                             else
                                             {
                                                $val[$i][1] = '';
                                             }
                                             if (isset($val[$i][2])) {
                                                 $val[$i][2] = $val[$i][2];
                                             }
                                             else
                                             {
                                                $val[$i][2] = '';
                                             }
                                             if (isset($val[$i][3])) {
                                                 $val[$i][3] = $val[$i][3];
                                             }
                                             else
                                             {
                                                $val[$i][3] = '';
                                             }
                                             if (isset($val[$i][4])) {
                                                 $val[$i][4] = $val[$i][4];
                                             }
                                             else
                                             {
                                                $val[$i][4] = '';
                                             }
                                             
                                                             if(isset($edit_flag) && $edit_flag!='')
                                             {
 echo '<tr>
<td id="kpilist_'.$i.'"  style="width: 10px;"><input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list',$kpi_count[$i],array('maxlength'=>'1000','class'=>'form-control kpi_list validate_field','id'=>'kpilistyii_'.$i.'','style'=>'width: 326px;','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;height: auto;max-height: 200px;overflow-y: scroll;"></div></td>
<td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i,'options' => $unit_type)).'</td>
<td>'.CHtml::textField('kpi_target_value',$per_kpi_wt[$i],array('class'=>'form-control fields ','id'=>'kpi_target_value-'.$i,"maxlength"=>"1000")).'</td>
<td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control validate_field','id'=>'unit_value','style'=>'display:none',"maxlength"=>"1000")).CHtml::textField('unit_value',$unit_target,array('class'=>'form-control validate_field value_field','id'=>'unit_value-'.$i.'','disabled' => $disable_select1,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','style'=>'width:89px')).'</td>
<td>'.CHtml::textField('target_value1',$val[$i][0],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value1".$i:"form-control fields validate_field target_value1".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value2',$val[$i][1],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value2".$i:"form-control fields validate_field target_value2".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value3',$val[$i][2],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value3".$i:"form-control fields validate_field target_value3".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td><td>'.CHtml::textField('target_value4',$val[$i][3],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value4".$i:"form-control fields validate_field target_value4".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value5',$val[$i][4],array('class'=> ($unit=='Date') ? "form-control fields date_pickup validate_field target_value5".$i:"form-control fields validate_field target_value5".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td><i class="fa fa-trash-o del_kra_kpi" style="cursor: pointer;font-size:24px;color: rgb(51, 122, 183);padding-left: 3px;padding-right: 8px;" id="del_kra_kpi-'.$kpi_id.'-'.$i.'" title="Delete" aria-hidden="true"></i></td>
</tr>';   
                                 $unit_type='';
                                             }
                                             else{
                                             
                                         echo '<tr>
<td id="kpilist_'.$i.'"  style="width: 10px;"><input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list',$kpi_count[$i],array('maxlength'=>'1000','class'=>'form-control kpi_list validate_field','id'=>'kpilistyii_'.$i.'','style'=>'width: 326px;','data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;height: auto;max-height: 200px;overflow-y: scroll;"></div></td>
<td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i,'options' => $unit_type)).'</td>
<td>'.CHtml::textField('kpi_target_value',$per_kpi_wt[$i],array('class'=>'form-control fields ','id'=>'kpi_target_value-'.$i,"maxlength"=>"1000")).'</td>
<td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control validate_field','id'=>'unit_value','style'=>'display:none',"maxlength"=>"1000")).CHtml::textField('unit_value',$unit_target,array('class'=>'form-control validate_field value_field','id'=>'unit_value-'.$i.'','disabled' => $disable_select1,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom','style'=>'width:89px')).'</td>
<td>'.CHtml::textField('target_value1',$val[$i][0],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value1".$i:"form-control fields validate_field target_value1".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value2',$val[$i][1],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value2".$i:"form-control fields validate_field target_value2".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value3',$val[$i][2],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value3".$i:"form-control fields validate_field target_value3".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td><td>'.CHtml::textField('target_value4',$val[$i][3],array('class'=>($unit=='Date') ? "form-control fields date_pickup validate_field target_value4".$i:"form-control fields validate_field target_value4".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>
<td>'.CHtml::textField('target_value5',$val[$i][4],array('class'=> ($unit=='Date') ? "form-control fields date_pickup validate_field target_value5".$i:"form-control fields validate_field target_value5".$i,'disabled' => $disable_select,'data-toggle'=>'popover','data-trigger'=>'hover','data-placement'=>'bottom')).'</td>

</tr>';   
                                 $unit_type='';
                  
                                                 
                                                 
                                            // print_r("fdgfdgf");die();
                                                       } } } 
                                                       
                                                    ?>   
                                                    <tr id="extra_kpi<?php echo $kpi_id; ?>">
                                                        
                                                    </tr> 
                                                </table>
                                                    </tr>                                             
                                                </table><br>
                                        <div class="col-md-7">
                                                     <?php if(isset($edit_flag) && $edit_flag!='')
                                             {?>
                                            <?php echo CHtml::button('Update',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'kpi_update_data')); ?>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
                                             <?php
                                                if(isset($list_cnt))
                                                {
                                                  $list_cnt = $list_cnt;
                                                }
                                                else
                                                {
                                                  $list_cnt = '';
                                                }
                                                echo CHtml::button('Add KPI',array('class'=>'btn border-blue-soft add_kpi','style'=>'float:left;margin-left: 10px;','id'=>'add_kpi-'.$kpi_id.'-'.$list_cnt));
 ?>
                                            <?php }else{ ?>
                                            <?php echo CHtml::button('Save',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'submit_kra','onclick'=>'js:kpi_save_data()')); ?>
                                            <?php } ?>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>                                                     
                                    </div>
                                    <?php  $this->endWidget(); ?>
                                       
                                    </div> 
                                     
                                            <script type="text/javascript">
                                                $(function(){
                                                     $("body").on('change','#financial_year',function(){
                                                          //alert($(this).val());
                                                          var data = {
                                                              getyear : $(this).val()
                                                          };
                                                          var base_url = window.location.origin;
                                                           $.ajax({
                                                                type : 'post',
                                                                datatype : 'html',
                                                                data : data,
                                                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Login/set_new',
                                                                success : function(data)
                                                                { 
                                                                    //alert(data);
                                                                    location.reload();
                                                                }
                                                           });
                                                      });
                                                    $('#employee_table').DataTable();
                                                });
                                            </script>                                           
                         <script>
 var j = jQuery.noConflict();
    j(function(){
        //alert("sadsa");   
         //var j = jQuery.noConflict();
              var fSDate=$('#start_date').text();
                    var fEDate=$('#end_date').text();
                j(".date_pickup11").datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'dd/M/yy',
    numberOfMonths: 1,
    changeMonth: true,changeYear: true,minDate: '01/Apr/2017', maxDate: '31/Mar/2018',
   
    
});   
                   
    });
</script>       
                                        <!-- BEGIN SAMPLE TABLE PORTLET-->
<?php
//$errors = array_filter($kpi_data2);

?>
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
                                                <div class="caption"> New Goalsheet (Reporting Manager : <?php if(isset($new_kra_till_date['0']['Emp_fname']) && isset($new_kra_till_date['0']['Emp_lname'])) { echo $new_kra_till_date['0']['Emp_fname']." ".$new_kra_till_date['0']['Emp_lname']." / "; } ?> From : <?php if(isset($emp_data['0']['reporting_1_effective_date'])) { echo date('d-M-Y', strtotime($emp_data['0']['reporting_1_effective_date']))." To : ".date('d-M-Y', strtotime('Dec 31')); } ?>)                                                   
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
 <?php
  //print_r($kpi_data2);
 //print_r($kpi_data2);die();

                                            if (isset($kpi_data2) && count($kpi_data2)>0) { $cnt_num = 1;  ?>
                                            <label class='count_goal'  style="display: none"><?php if(isset($kpi_data)) { echo count($kpi_data); } ?></label>                                            
                                          <?php     
                                        foreach ($kpi_data2 as $row) {  ?>
                                       <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label id="total1_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   <?php echo "KRA Category 2: ".$row['KRA_category']; ?><?php echo ' / '."KRA Weightage : ".$row['target']; ?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status 2: ".$row['KRA_status']; ?><a href="javascript:;" class="collapse"></a>
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
                                                                if(isset($kpi_list_data) && count($kpi_list_data)>0)
                                                                {
                                                                    for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                      if (isset($kpi_list_data) && $kpi_list_data[$i] != '') {
                                                                          if(isset($kpi_data_data) && $kpi_data_data == '')
                                                                          {
                                                                              $kpi_data_data = 1;
                                                                          }
                                                                          else
                                                                          {
                                                                              $kpi_data_data = 2;
                                                                          }                                                                        
                                                                      }
                                                                  }
                                                                }
                                                                
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if (isset($kpi_list_data[$i]) && $kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td class="validate_field1"><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i]; } ?></td>
                                                                    <td class="validate_field1"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                        <?php 
                                                                            if (isset($kpi_list_unit[$i]) && $kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
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
                                                                                        '< '.round($kpi_list_target[$i]*0.69,2);  ?>
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
</div>

                                        <div class="output_div1">
<?php

//print_r("fdgfdgf");die();
if(isset($emp_data['0']['Reporting_officer1_id']) && $emp_data['0']['Reporting_officer1_id'] != '') {
$emp_data1 = new EmployeeForm;
$where = 'where Email_id = :Email_id';
$list = array('Email_id');
$data = array($emp_data['0']['Reporting_officer1_id']);
$new_kra_till_date = $emp_data1->get_employee_data($where,$data,$list);
//print_r($kpi_data);die();
}
?>
                                        <?php 
                                            if (isset($kpi_data) && count($kpi_data)>0) { $cnt_num = 1; ?>
                                            <label class='count_goal' id="count_goal1" style="display:none"><?php echo count($kpi_data); ?></label>
                                            <div class="portlet box border-blue-soft bg-blue-soft">
                                            <div class="portlet-title">
                                                <!--<div class="caption"> Goalsheet (Reporting Manager : <?php if(isset($new_kra_till_date['0']['Emp_fname'])) { echo $new_kra_till_date['0']['Emp_fname']." ".$new_kra_till_date['0']['Emp_lname']." / "; } ?> Till : <?php if(isset($emp_data['0']['reporting_1_effective_date']) && $emp_data['0']['reporting_1_effective_date']!= '0000-00-00') { echo date('d-M-Y', strtotime($emp_data['0']['reporting_1_effective_date']. ' -1 day')); }else{ echo date('d-M-Y', strtotime('Dec 31')); } ?>)                                                    -->
                                                <!--</div>-->
                                                <div class="caption"> Goalsheet (Reporting Manager : <?php if(isset($new_kra_till_date['0']['Emp_fname'])) { echo $new_kra_till_date['0']['Emp_fname']." ".$new_kra_till_date['0']['Emp_lname']; } ?>   )                                           
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                          <?php  
                                          $ch_cnt = 0;
                                        foreach ($kpi_data as $row) { $ch_cnt++; ?>
                                       <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   <?php echo "KRA Category ".$ch_cnt." : ".$row['KRA_category']; ?><?php echo ' / '."KRA Weightage : ".$row['target']; ?></div>
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
                                                           <th class="numeric"> KPI Weightage </th>
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
                                                                if(isset($kpi_list_data) && count($kpi_list_data)>0)
                                                                {
                                                                    for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                      if (isset($kpi_list_data[$i]) && $kpi_list_data[$i] != '') {
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
                                                                }
                                                                
                                                            ?>
                                                           <?php 
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if (isset($kpi_list_data[$i]) && $kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td class="validate_field1"><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i]; } ?></td>
                                                                    <td class="validate_field1"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                        <?php
                                                                            if (isset($kpi_list_unit[$i]) && ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value')) {
                                                                                ?>
                                                                               
                                                                                <td class="validate_field1">
                                                                                   
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $kpi_list_target[$i];  ?>">
                                                                                        <?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?>
                                                                                        </lable>
                                                                                </td>
                                                                                 <td class="validate_field1" >

                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo $kpi_list_target[$i];  ?>">
                                                                                        <?php echo strlen($kpi_list_target[$i]) >= 20 ? 
                                                                                        substr($kpi_list_target[$i] , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $kpi_list_target[$i];  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                 
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.69,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.69,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.69,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        '< '.round($kpi_list_target[$i]*0.69,2);  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                    <?php
                                                                                        //echo round($kpi_list_target[$i]*0.70,2);
                                                                                    ?>
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.70,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.70,2)) >= 20 ?  '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*0.70,2)." to ".round($kpi_list_target[$i]*0.95,2);  ?>
                                                                                        </lable>
                                                                                </td>
                                                                               
                                                                             <td class="validate_field1">
                                                                               
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*0.96,2);?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*0.96,2) ) >= 20 ? 
                                                                                        round($kpi_list_target[$i]*0.96,2)." to ".round($kpi_list_target[$i]*1.05,2) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                       round($kpi_list_target[$i]*0.96,2)." to ".round($kpi_list_target[$i]*1.05,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                             
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*1.06,2);  ?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*1.06,2) ) >= 20 ? 
                                                                                        round($kpi_list_target[$i]*1.06,2)." to ".round($kpi_list_target[$i]*1.29,2). '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*1.06,2)." to ".round($kpi_list_target[$i]*1.29,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                           
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo round($kpi_list_target[$i]*1.39,2);  ?>">
                                                                                        <?php echo strlen(round($kpi_list_target[$i]*1.39,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*1.39,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        '> '.round($kpi_list_target[$i]*1.39,2);  ?>
                                                                                        </lable>
                                                                             </td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                 <td><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <td class="validate_field1"></td>
                                                                                <?php
                                                                                if(isset($kpi_list_target[$i]))
                                                                                {
                                                                                    $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }                                                                                
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) { ?>
                                                                                     <td class="validate_field1">
                                                                                        <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if(isset($value_data[$j])) { echo $value_data[$j]; } ?>">
                                                                                        <?php echo strlen($value_data[$j]) >= 20 ? 
                                                                                        substr($value_data[$j], 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $value_data[$j];  ?>
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
</div>

                                     
  <div class="output_div1" style="display:none">
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
                                            if (isset($kpi_data) && count($kpi_data)) { $cnt_num = 1; ?>
                                            <label class='count_goal' id='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
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
                                                    <label id="total1_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
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
                                                                if(isset($kpi_list_data) && count($kpi_list_data)>0)
                                                                {
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
                                                                }
                                                                
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if (isset($kpi_list_data[$i]) && $kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td class="validate_field1"><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i]; } ?></td>
                                                                    <td class="validate_field1"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                        <?php
                                                                            if (isset($kpi_list_unit[$i]) && ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value')) {
                                                                                ?>
                                                                                <td class="validate_field1" >

                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if(isset($kpi_list_target[$i])) { echo $kpi_list_target[$i]; } ?>">
                                                                                        <?php echo strlen($kpi_list_target[$i]) >= 20 ? 
                                                                                        substr($kpi_list_target[$i] , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        $kpi_list_target[$i];  ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                   
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if(isset($kpi_list_target[$i])) { echo $kpi_list_target[$i]; } ?>">
                                                                                        <?php 
                                                                                        if(isset($KPI_target_value[$i]))
                                                                                        {
                                                                                           echo strlen($KPI_target_value[$i] ) >= 20 ? 
                                                                                            substr($KPI_target_value[$i] , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                            $KPI_target_value[$i]; 
                                                                                        }
                                                                                        ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">                                                                                 
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.69,2); } ?>">
                                                                                        <?php 
                                                                                        if(isset($kpi_list_target[$i]))
                                                                                        {
                                                                                           echo strlen(round($kpi_list_target[$i]*0.69,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.69,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        '< '.round($kpi_list_target[$i]*0.69,2);
                                                                                        }
                                                                                         ?>
                                                                                        </lable>
                                                                                </td>
                                                                                <td class="validate_field1">
                                                                                    <?php echo round($kpi_list_target[$i]*0.70,2);?>
                                                                                    <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if($kpi_list_target[$i]) { echo round($kpi_list_target[$i]*0.70,2); } ?>">
                                                                                        <?php 
                                                                                          if(isset($kpi_list_target[$i]))
                                                                                          {
                                                                                              echo strlen(round($kpi_list_target[$i]*0.70,2)) >= 20 ? 
                                                                                        substr(round($kpi_list_target[$i]*0.70,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                        round($kpi_list_target[$i]*0.70,2); 
                                                                                          }
                                                                                         ?>
                                                                                        </lable>
                                                                                </td>
                                                                               
                                                                             <td class="validate_field1">
                                                                               
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if($kpi_list_target[$i]) { echo round($kpi_list_target[$i]*0.96,2); } ?>">
                                                                                        <?php 
                                                                                        if(isset($kpi_list_target[$i]))
                                                                                        {
                                                                                            echo strlen(round($kpi_list_target[$i]*0.96,2) ) >= 20 ? 
                                                                                            substr(round($kpi_list_target[$i]*0.96,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                           round($kpi_list_target[$i]*0.96,2); 
                                                                                        }
                                                                                        ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                             
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.06,2); } ?>">
                                                                                        <?php 
                                                                                        if(isset($kpi_list_target[$i]))
                                                                                        {
                                                                                            echo strlen(round($kpi_list_target[$i]*1.06,2) ) >= 20 ? 
                                                                                            substr(round($kpi_list_target[$i]*1.06,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                            round($kpi_list_target[$i]*1.06,2); 
                                                                                        }
                                                                                        ?>
                                                                                        </lable>
                                                                             </td>
                                                                                
                                                                             <td class="validate_field1">
                                                                           
                                                                                <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.39,2); } ?>">
                                                                                        <?php 
                                                                                        if(isset($kpi_list_target[$i]))
                                                                                        {
                                                                                            echo strlen(round($kpi_list_target[$i]*1.39,2)) >= 20 ? 
                                                                                            substr(round($kpi_list_target[$i]*1.39,2) , 0, 20) . '<lable style="cursor:pointer;color:blue"> >></lable>' : 
                                                                                            round($kpi_list_target[$i]*1.39,2);  
                                                                                        }                                                                                        
                                                                                        ?>
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
                                                                                if(isset($kpi_list_target[$i]))
                                                                                {
                                                                                    $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }
                                                                                
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td class="validate_field1">
                                                                                        <lable data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?php if(isset($value_data[$j])) { echo $value_data[$j]; } ?>">
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
                                                                </tr>
                                                                <?php
                                                                   } }
                                                                   //die();
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
</div>
                                        </div>
                                        <?php
                        $model = new LoginForm; 
            $program_data =new ProgramDataForm;
            $employee = new EmployeeForm;   
            $IDPForm =new IDPForm;  
            $Compare_Designation =new CompareDesignationForm;       
            $where = 'where  goal_set_year =:goal_set_year';
                                    $list = array('goal_set_year');
                                    $data = array(Yii::app()->user->getState('financial_year_check'));
                                    $program_data_result = $program_data->get_kpi_data($where,$data,$list);
            
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
            $where = 'where Employee_id = :Employee_id AND goal_set_year =:goal_set_year';
            $list = array('Employee_id','goal_set_year');
            $data = array($Employee_id,Yii::app()->user->getState('financial_year_check'));
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
                                            <lable id="compare_designation" style="display:none"><?php if(isset($designation_flag)) { echo $designation_flag; } ?></lable>
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
                                                         echo Yii::app()->user->getState('financial_year_check'); ?>
                                                            
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
                                    $where = 'where  goal_set_year =:goal_set_year';
                                    $list = array('goal_set_year');
                                    $data = array(Yii::app()->user->getState('financial_year_check'));
                                    $program_data_result = $program_data->get_kpi_data($where,$data,$list);
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
                                                    if(isset($cmt2[$j]))
                                                    {
                                                        $cmt1 = explode('?', $cmt2[$j]);
                                                    }
                                                    
                                                    if (isset($cmt1[0]) && isset($cmt1[1]) && $i == $cmt1[0]) {                                                            
                                                         $cmnt = $cmt1[1];
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $cmnt = '';
                                            }
                                                                             
                                            if (isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2) {
                                                if ($compulsory == '') {
                                                   $compulsory = $i;
                                                }
                                                else
                                                {
                                                    $compulsory = $compulsory.';'.$i;
                                                }
                                            }
                                            else if (isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) {
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
                                                <td class="prog_name" id="<?php echo $i; ?>"> <?php  if(isset($program_data_result[$i]['program_name'])) { echo $program_data_result[$i]['program_name']; } ?> <?php if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
                                                <?php if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2 && isset($program_data_result[$i]['location']) && $program_data_result[$i]['location'] != '' && $program_data_result[$i]['location'] != 'undefined') { ?><label id = 'complusory_prg<?php echo $i; ?>' style="color: red;display: none"><?php if(isset($program_data_result[$i]['location'])) { echo $program_data_result[$i]['location']; } ?></label><?php } ?>
                                                </td>
                                                <td> <?php if(isset($program_data_result[$i]['faculty_name'])) { echo $program_data_result[$i]['faculty_name']; } ?> </td>
                                                <td> <?php if(isset($program_data_result[$i]['training_days'])) { echo $program_data_result[$i]['training_days']; } ?> </td>
                                                <td class="col-md-4">
<?php if(isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 2 || $program_data_result[$i]['need']==1) {
    $cmnt='This is mandatory';
    if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,"maxlength"=>"1000" ));
}
else
{
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,"maxlength"=>"1000"));
}

}

else {?>        
                                    
                                                <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,"maxlength"=>"1000"));
}
else
{
echo CHtml::textField('program_cmd',$cmnt,$htmlOptions=array('class'=>"form-control col-md-4 program_cmd",'id'=>'program_cmd-'.$i,"maxlength"=>"1000"));
}
                                                    
                                            }    ?> </td>
                                              
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
                                                             Faculty name
                                                            </div>
                                                  </div>
                           
                                                    <div class="form-group">
                                                        <!-- <div class="col-md-2"><label class="control-label col-md-2">1</label></div> -->
                                                        <div class="col-md-4">
                                                         <?php 
                                                         $topic = '';$day = '';$faculty = '';
                                                         if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
                                                                $topic1 = explode(';',$IDP_data['0']['extra_topic']);
                                                                if(isset($topic1[0]))
                                                                {
                                                                    $topic = $topic1[0];
                                                                }
                                                                if(isset($IDP_data['0']['extra_days']))
                                                                {
                                                                     $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                                }
                                                                if(isset($day1[0]))
                                                                {
                                                                   $day = $day1[0];
                                                                }
                                                                if(isset($IDP_data['0']['extra_faculty']))
                                                                {
                                                                   $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                                }
                                                                if(isset($faculty2[0]))
                                                                {
                                                                   $faculty[$faculty2[0]] = array('selected' => 'selected');
                                                                }
                                                               
                                                                
                                                                
                                                                // $faculty1 = explode('?',$faculty2[0]);                           
                                                                
                                                                
                                                                 //print_r($faculty);die();
                                                         }
                                                        if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('topic1',$topic,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic1","maxlength"=>"1000"));
}
else
{
  echo CHtml::textField('topic1',$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic1","maxlength"=>"1000"));
} 
                                                         ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('days_required1',$day,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 days_required1","maxlength"=>"1000")); 
}
else
{
 echo CHtml::textField('days_required1',$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required1","maxlength"=>"1000")); 
} 

?> 
                                                        </div>

                                                        <div class="col-md-4">
                                                         <?php 
                                                             $reporting_list = new EmployeeForm();
                                                             //$records = $reporting_list->get_appraiser_list1();
                                                             $where = 'where Email_id != :Email_id';
                                                                $list = array('Email_id');
                                                                $data = array($emp_data['0']['Email_id']);
                                                             $records = $reporting_list->get_reporting_data($where,$data,$list);
                                                           //  print_r($records);die();
                                                             for ($k=0; $k < count($records); $k++) { 
                                                               //  echo $emp_data['0']['Email_id'];
                                                                $where = 'where Email_id = :Email_id';
                                                                $list = array('Email_id');
                                                                $data = array($records[$k]['Reporting_officer1_id']);
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
                                                              $Cadre_id1['External Faculty'] = 'External Faculty';
                                             //print_r($Cadre_id);die();
                                             $Cadre_id = array_merge($Cadre_id,$Cadre_id1);
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
                                                                        if (isset($topic1[1])) {
                                                                            $topic = $topic1[1];
                                                                        }
                                                                        if (isset($IDP_data['0']['extra_days'])) {
                                                                            $day1 = explode(';',$IDP_data['0']['extra_days']);
                                                                        }
                                                                        if (isset($day1[1])) {
                                                                            $day = $day1[1];
                                                                        }
                                                                        if (isset($IDP_data['0']['extra_faculty'])) {
                                                                            $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
                                                                        }
                                                                        if (isset($faculty2[1])) {
                                                                           $faculty[$faculty2[1]] = array('selected' => 'selected');
                                                                        }
                                                                        
                                                                        // $faculty1 = explode('?',$faculty2[0]);                           
                                                                        
                                                                    }
                                                             }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
 echo CHtml::textField('topic2',$topic,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic2","maxlength"=>"1000"));
}
else
{
 echo CHtml::textField('topic2',$topic,$htmlOptions=array('class'=>"form-control col-md-4 topic2","maxlength"=>"1000"));
}
                                                             ?> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php 
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('days_required2',$day,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 days_required2","maxlength"=>"1000"));
}
else
{
  echo CHtml::textField('days_required2',$day,$htmlOptions=array('class'=>"form-control col-md-4 days_required2","maxlength"=>"1000")); 
}

?> 
                                                        </div>
                                                        <div class="col-md-4">
                                                          <?php 
                                                             $reporting_list = new EmployeeForm();
                                                             //$records = $reporting_list->get_appraiser_list1();
                                                             $where = 'where Email_id != :Email_id';
                                                                $list = array('Email_id');
                                                                $data = array($emp_data['0']['Email_id']);
                                                             $records = $reporting_list->get_reporting_data($where,$data,$list);
                                                             for ($k=0; $k < count($records); $k++) { 
                                                                $where = 'where Email_id = :Email_id';
                                                                $list = array('Email_id');
                                                                $data = array($records[$k]['Reporting_officer1_id']);
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
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Relationship<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
                                                        <label class="control-label col-md-3 bold" style="text-align: left;">Name of leader<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
                                                         <label class="control-label col-md-2 bold" style="text-align: left;">Number of Meetings planned
                                                        <?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
                                                        <label class="control-label col-md-2 bold" style="text-align: left;">Topic To be disscussed <?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
                                                       
                                                        <label class="control-label col-md-2 bold" style="text-align: left;">Due date<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
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
echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 faculty_email_id3",'id'=>'faculty_email_id3',"maxlength"=>"1000"));
}
else
{
 echo CHtml::textField('faculty_email_id3',$faculty3,$htmlOptions=array('class'=>"form-control col-md-4 faculty_email_id3",'id'=>'faculty_email_id3',"maxlength"=>"1000"));
}
                                                             
                                                            ?>
                                                          </div>
                                                                <div class="col-md-2">
                                                            <?php 
                                                              $meet = '';
                                                              if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                                                                $meet = explode(';',$IDP_data['0']['meeting_planned']);
                                                                if(isset($meet[0]))
                                                                {
                                                                    $meet = $meet[0];
                                                                }                                                                
                                                              }
                                                              else
                                                              {
                                                                $meet = '';
                                                              }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 number_of_meetings3",'id'=>'number_of_meetings3',"maxlength"=>"1000"));
}
else
{
 echo CHtml::textField('number_of_meetings3',$meet,$htmlOptions=array('class'=>"form-control col-md-4 number_of_meetings3",'id'=>'number_of_meetings3',"maxlength"=>"1000"));
}
                                                             ?> 
                                                          </div>
                                                       <div class="col-md-2">
                                                             <?php 
                                                              $meet = '';
                                                              if (isset($IDP_data['0']['topic_to_be_diss']) && $IDP_data['0']['topic_to_be_diss']!='') {
                                                                $meet = explode(';',$IDP_data['0']['topic_to_be_diss']);
                                                                if(isset($meet[0]))
                                                                {
                                                                    $meet = $meet[0];
                                                                }  
                                                              }
                                                              else
                                                              {
                                                                $meet = '';
                                                              }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textArea('topic_to_be_diss3',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic_to_be_diss3",'id'=>'topic_to_be_diss3',"maxlength"=>"1000"));
}
else
{
 echo CHtml::textArea('topic_to_be_diss3',$meet,$htmlOptions=array('class'=>"form-control col-md-4 topic_to_be_diss3",'id'=>'topic_to_be_diss3',"maxlength"=>"1000"));
}
                                                               ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <?php 
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                       <input class="form-control fields date_pickup11   target_date3" type="text" value="<?php echo $rel2[0]; ?>" id="target_date3" <?php echo $set_flag1; ?> style="width: 130px;" >
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                        <input class="form-control fields date_pickup11  target_date3"  type="text"  id="target_date3" style="width: 130px;"  >
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
 echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 faculty_email_id4",'id'=>'faculty_email_id4',"maxlength"=>"1000"));
}
else
{
 echo CHtml::textField('faculty_email_id4',$faculty4,$htmlOptions=array('class'=>"form-control col-md-4 faculty_email_id4",'id'=>'faculty_email_id4',"maxlength"=>"1000"));
}
                                                            
                                                             ?>
                                                          </div>
                                                        <div class="col-md-2">
                                                           <?php 
                                                           
                                                           //print_r($IDP_data['0']['meeting_planned']);die();
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
                                                          //print_r($meet);die();
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 number_of_meetings4",'id'=>'number_of_meetings4',"maxlength"=>"1000",$set_flag));
}
else
{
 echo CHtml::textField('number_of_meetings4',$meet,$htmlOptions=array('class'=>"form-control col-md-4 number_of_meetings4",'id'=>'number_of_meetings4',"maxlength"=>"1000"));
}
                                                           ?> 
                                                          </div>
                                                       <div class="col-md-2">
                                                           <?php 
                                                           $meet = '';
                                                          if (isset($IDP_data['0']['topic_to_be_diss']) && $IDP_data['0']['topic_to_be_diss']!='') {
                                                            $meet = explode(';',$IDP_data['0']['topic_to_be_diss']);
                                                            if (isset($meet[1])) {
                                                               $meet = $meet[1];
                                                            }
                                                          }
                                                          else
                                                          {
                                                            $meet = '';
                                                          }
if(isset($IDP_data['0']['set_status']) && count($IDP_data)>0 && $IDP_data['0']['set_status']=='Approved') {
echo CHtml::textArea('topic_to_be_diss4',$meet,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 topic_to_be_diss4",'id'=>'topic_to_be_diss4',"maxlength"=>"1000",$set_flag));
}
else
{
 echo CHtml::textArea('topic_to_be_diss4',$meet,$htmlOptions=array('class'=>"form-control col-md-4 topic_to_be_diss4",'id'=>'topic_to_be_diss4',"maxlength"=>"1000"));
}
                                                           ?> 
                                                          </div>
                                                        <div class="col-md-2">
                                                            <?php 
                                                                  if (isset($IDP_data['0']['rel_target_date']) && $IDP_data['0']['rel_target_date']!='') { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                                                                      <input class="form-control fields date_pickup11   target_date4" type="text" value="<?php echo $rel2[1]; ?>" id="target_date4" <?php echo $set_flag1; ?> style="width: 130px;">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input class="form-control fields date_pickup11   target_date4" type="text"  id="target_date4" style="width: 130px;">
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
                                                    <label class="col-md-3 control-label bold">Project Title<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
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
                                                    <label class="col-md-3 control-label bold">Review date<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
                                                    <div class="col-md-2">                                                        
                                                         <?php
                                                                  if (isset($IDP_data['0']['project_review_date'])) { ?>
                                                                       <input class="form-control fields date_pickup11 validate_field " <?php echo $set_flag1; ?>  type="text" value="<?php echo $IDP_data['0']['project_review_date']; ?>" id="review_date" maxlength="20">
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input  class="form-control fields date_pickup11 validate_field " type="text" id="review_date" maxlength="20">
                                                                 <?php   } 
                                                                ?>
                                                    </div>
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label bold">Due Date<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
                                                   <div class="col-md-2">
                                                        
                                                                <?php
                                                                  if (isset($IDP_data['0']['project_end_date'])) {  ?>
                                                                  <input class="form-control fields date_pickup11 validate_field " <?php echo $set_flag1; ?>  type="text" value="<?php echo $IDP_data['0']['project_end_date']; ?>" id="target_end_date" maxlength="20" >
                                                                       
                                                                   <?php }
                                                                    else
                                                                    { ?>
                                                                       <input  class="form-control fields date_pickup11 validate_field " type="text" id="target_end_date" maxlength="20">
                                                                 <?php   }
                                                                ?>
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold">Project scope<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
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
echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_scope","maxlength"=>"1000"));
}
else
{
 echo CHtml::textField('project_scope',$project_scope,$htmlOptions=array('class'=>"form-control col-md-4 project_scope","maxlength"=>"1000"));
}
                                                         ?> 
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

                                                <div class="form-group last">
                                                    <label class="col-md-3 control-label bold ">Project exclusions<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
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
echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('disabled' => 'disabled','class'=>"form-control col-md-4 project_exclusion","maxlength"=>"1000","maxlength"=>"1000"));
}
else
{
 echo CHtml::textField('project_exclusion',$project_exclusion,$htmlOptions=array('class'=>"form-control col-md-4 project_exclusion","maxlength"=>"1000"));
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
                                                    <label class="col-md-3 control-label bold">Project deliverables (Target at rating 3: good solid performance)<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
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
                                                    <label class="col-md-3 control-label bold">Learning Goals<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
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
                                                    <label class="col-md-3 control-label bold">Reviewer(s) name<?php if(isset($designation_flag) && $designation_flag >0 ) { ?><label style="color:red">*</label><?php } ?></label>
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
 echo CHtml::textField('reviewer_nm',$review_name,$htmlOptions=array('disabled' => 'disabled','maxlength'=>80,'class'=>"form-control col-md-4 reviewvers_name",'maxlength'=>80,));
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
                            
                                        <!-- END SAMPLE TABLE PORTLET-->      
                                        <?php 
                                        //print_r($kpi_data);die();
                                            if (isset($kpi_data) && count($kpi_data)>0) { ?>
                                          <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>     
                                         <div class="btn-group col-md-12" style="float:left">
                    <?php if((isset($kpi_data['0']['kra_complete_flag']) && $kpi_data['0']['kra_complete_flag']==0) || (isset($emp_data[0]['new_kra_create']) && $emp_data[0]['new_kra_create'] == 'on')) { ?>
                    <input name="term_condition" value="term_condition" id="term_condition" type="checkbox">
                    <lable id="blink_me" style="color: red;"> I agree to the goals and IDP filled above
</lable>
                                        <?php echo CHtml::button('Send to manager for approval',array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>'send_for_appraisal')); ?><?php } ?>
                                        <?php } ?>
                                        <?php echo CHtml::button('Download PDF',array('class'=>'btn border-blue-soft download_goal','style'=>'float:right;margin-right:20px','id'=>'getdata')); ?>
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
                     var data_length = kra_des.length;var tot_kpi_wt1 = 0;var tot_kpi_wt = 0;var tot_kpi_wt_final = 0;var final_kpi_wt = '';
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
                        }
                        else
                        {

                            var kpi_list_data = 0;var add_value = 0;final_kpi_total = 0;var final_kpi_wt = '';var er = '';
                            for (var i = 0; i < kra_num; i++) {
                            
                                if ($("#kpilistyii_"+i).val()!= '' && $("#mask_number-"+i).find(':selected').val()!='Select') 
                                {tot_kpi_wt1++;
                                    kpi_list_data = parseInt(kpi_list_data)+parseInt(1);
                                }
                                 
                                
                               if ($("#kpi_target_value-"+i).val() != 0 && $("#kpi_target_value-"+i).val() != '' && $.isNumeric($("#kpi_target_value-"+i).val())) 
                                {tot_kpi_wt++;
                                    if(parseInt($("#kpi_target_value-"+i).val()) < parseInt($("#min_kpiwt").text()))
                                    {                      
                                        error = "Minimum KPI Weightage allowed is "+$("#min_kpiwt").text();break;
                                    }
                                    else
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
                                }
                                else if(!$.isNumeric($("#kpi_target_value-"+i).val()) && $("#kpi_target_value-"+i).val() != '')
                                {                                     
                                    error = "Please enter only numbers in KPI Weightage field.";break;
                                }
                                else if($("#kpilistyii_"+i).val()!= '' && i>0 && (($("#kpi_target_value-"+i).val() != '' && $("#kpi_target_value-"+(i-1)).val() == '') || ($("#kpi_target_value-"+i).val() == '' && $("#kpi_target_value-"+(i-1)).val() != '')))
                                {                      
                                    error = "Please enter KPI Weightage for all KPI field.";break;
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
                                    //alert(i);
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
                                            if(selected_value == 'Days')
                                            {
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                   $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !$.isNumeric($(".target_value1"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                    error = 'Target 2 value is compulsory.';break; 
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !$.isNumeric($(".target_value2"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !$.isNumeric($(".target_value3"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                    $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !$.isNumeric($(".target_value4"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !$.isNumeric($(".target_value5"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else
                                                {
                                                     for(var ch = 5;ch>0;ch--)
                                                    {
                                                    
                                                        var d= parseInt(ch)-parseInt(1);
                                                        if(d>0)
                                                        {
                                                        //alert(parseInt($(".target_value"+ch+i).val())<parseInt($(".target_value"+d+i).val()));
                                                        if((parseInt($(".target_value"+ch+i).val())>parseInt($(".target_value"+d+i).val())) || (parseInt($(".target_value"+ch+i).val())==parseInt($(".target_value"+d+i).val())))
                                                          {
                                                             er = "Days should be in descending order and repetition is not allowed";
                                                            // alert(parseInt($(".target_value"+ch+i).val()));alert(parseInt($(".target_value"+d+i).val()));
                                                          }
                                                          //alert($(".target_value"+ch+i).val());alert(parseInt($(".target_value"+d+i).val()));
                                                        }
                                                    }
                                                   
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                                //alert(er);
                                            }
                                            else if(selected_value == 'Percentage')
                                            {
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                   $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !$.isNumeric($(".target_value1"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                    $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                    error = 'Target 2 value is compulsory.';break; 
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !$.isNumeric($(".target_value2"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !$.isNumeric($(".target_value3"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !$.isNumeric($(".target_value4"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !$.isNumeric($(".target_value5"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else
                                                {
                                                    var er = '';
                                                    for(var ch = 5;ch>0;ch--)
                                                    {
                                                    //alert($(".target_value"+ch+i).val());alert($(".target_value"+d+i).val());
                                                        //var d= parseInt(ch)-parseInt(1);
                                                        for(var d = ch-1;d>0;d--)
                                                        {
                                                          if($(".target_value"+ch+i).val()==$(".target_value"+d+i).val())
                                                          {
                                                             er = "Repetition is not allowed";
                                                          }
                                                        }
                                                    }
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
                                                   $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }                                               
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                    $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                    error = 'Target 2 value is compulsory.';break; 
                                                }                                                
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                    $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }                                                
                                                else
                                                {
                                                    var er = '';var asc = 0;var desc = 0;
                                                    for(var ch = 5;ch>0;ch--)
                                                    {   
                                                        var date1 =  $(".target_value"+ch+i).val().split("/");
                                                        var date_pos = '';
                                                        if(date1[1] == "Jan")
                                                        {
                                                         date_pos = '01';
                                                        }
                                                        else if(date1[1] == "Feb")
                                                        {
                                                         date_pos = '02';
                                                        }
                                                        else if(date1[1] == "Mar")
                                                        {
                                                         date_pos = '03';
                                                        }
                                                        else if(date1[1] == "Apr")
                                                        {
                                                         date_pos = '04';
                                                        }
                                                        else if(date1[1] == "May")
                                                        {
                                                         date_pos = '05';
                                                        }
                                                        else if(date1[1] == "Jun")
                                                        {
                                                         date_pos = '06';
                                                        }
                                                        else if(date1[1] == "Jul")
                                                        {
                                                         date_pos = '07';
                                                        }
                                                        else if(date1[1] == "Aug")
                                                        {
                                                         date_pos = '08';
                                                        }
                                                        else if(date1[1] == "Sep")
                                                        {
                                                         date_pos = '09';
                                                        }
                                                        else if(date1[1] == "Oct")
                                                        {
                                                         date_pos = '10';
                                                        }
                                                        else if(date1[1] == "Nov")
                                                        {
                                                         date_pos = '11';
                                                        }
                                                        else if(date1[1] == "Dec")
                                                        {
                                                         date_pos = '12';
                                                        }
                                                        var date11 = date1[0]+'/'+date_pos+'/'+date1[2];
                                                        var d= parseInt(ch)-parseInt(1);
                                                        if(d != 0)
                                                        {
                                                           var date2 =  $(".target_value"+d+i).val().split("/");
                                                            var date_pos = '';
                                                        if(date2[1] == "Jan")
                                                        {
                                                         date_pos = '01';
                                                        }
                                                        else if(date2[1] == "Feb")
                                                        {
                                                         date_pos = '02';
                                                        }
                                                        else if(date2[1] == "Mar")
                                                        {
                                                         date_pos = '03';
                                                        }
                                                        else if(date2[1] == "Apr")
                                                        {
                                                         date_pos = '04';
                                                        }
                                                        else if(date2[1] == "May")
                                                        {
                                                         date_pos = '05';
                                                        }
                                                        else if(date2[1] == "Jun")
                                                        {
                                                         date_pos = '06';
                                                        }
                                                        else if(date2[1] == "Jul")
                                                        {
                                                         date_pos = '07';
                                                        }
                                                        else if(date2[1] == "Aug")
                                                        {
                                                         date_pos = '08';
                                                        }
                                                        else if(date2[1] == "Sep")
                                                        {
                                                         date_pos = '09';
                                                        }
                                                        else if(date2[1] == "Oct")
                                                        {
                                                         date_pos = '10';
                                                        }
                                                        else if(date2[1] == "Nov")
                                                        {
                                                         date_pos = '11';
                                                        }
                                                        else if(date2[1] == "Dec")
                                                        {
                                                         date_pos = '12';
                                                        }
                                                        var date12 = date2[0]+'/'+date_pos+'/'+date2[2];
                                                        if(process(date11) < process(date12))
                                                            { 
                                                              asc = parseInt(asc)+parseInt(1);
                                                            }
                                                            if(process(date11) > process(date12))
                                                            { 
                                                              desc = parseInt(desc)+parseInt(1);
                                                            }
                                                        }
                                                    }
                                                    //alert(asc);alert(desc);
                                                    if(desc!=4 && asc !=4)
                                                    { 
                                                      er = "Date should be either in ascending or descending order and repetition is not allowed.";
                                                    }
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                        kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }
                                                        //alert(er); 
                                                }
                                            }
                                            else if(selected_value == 'Text')
                                            {
                                                
                                                var chk = /[;-]/;
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($(".target_value1"+i).val()!='' && chk.test($(".target_value1"+i).val())) || ($(".target_value1"+i).val()!='' && $(".target_value1"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                               else if(($(".target_value2"+i).val()!='' && chk.test($(".target_value2"+i).val())) || ($(".target_value2"+i).val()!='' && $(".target_value2"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($(".target_value3"+i).val()!='' && chk.test($("#target_need3").text())) || ($(".target_value3"+i).val()!='' && $("#target_need3").text().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value4"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value4"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
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
                                                  $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !ratio_chk.test($(".target_value1"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                    $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !ratio_chk.test($(".target_value2"+i).val()))
                                                {
                                                    error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !ratio_chk.test($(".target_value3"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !ratio_chk.test($(".target_value4"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !ratio_chk.test($(".target_value5"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else
                                                {
                                                    var er = '';
                                                    for(var ch = 5;ch>0;ch--)
                                                    {
                                                    //alert($(".target_value"+ch+i).val());alert($(".target_value"+d+i).val());
                                                        //var d= parseInt(ch)-parseInt(1);
                                                        for(var d = ch-1;d>0;d--)
                                                        {
                                                          if($(".target_value"+ch+i).val()==$(".target_value"+d+i).val())
                                                          {
                                                             er = "Repetition is not allowed";
                                                          }
                                                        }
                                                    }
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
                                            error = 'The Total for KPI score should be 100';break;
                                        }
                                        else
                                        {                                                    
                                           error = '';
                                        }

                                    }                                   
                                    else
                                    { 
                                        //error = '';
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
                                            else if(er != '')
                                            {
                                                 error = er;break;
                                            }
                                            else
                                            {
                                                error = '';er = '';
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
                                    if(er != '')
                                    {
                                         error = er;break;
                                    }
                                    else if(tot_kpi_wt !=0 && tot_kpi_wt1 != tot_kpi_wt)
                                    {
                                        error = "Please enter KPI Weightage for all KPI field.";break;
                                    }
                                    else
                                    {
                                        error = '';er = '';
                                    }
                                    
                            }
                                                              
                                } 
                            }
                            
                        }
                        $(window).scroll(function()
                        {
                            $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                        });  
                        //alert(final_kpi_wt);
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
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/update_kpi',
                                success : function(data)
                                {                              
                                    if (data == "success")
                                    {
                                        //alert(data);
                                        //get_notify("KRA Updated successfully");
                                        
                                        $("#err").show();  
                                         $("#err").fadeOut(6000);
                                         $("#error_value").text("Successfully updated");
                                         $("#err").removeClass("alert-danger");
                                        $("#err").addClass("alert-success");
                                        window.location.href = base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals';
                                        //location.reload();
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
                //alert($("#new_apr").text());
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
                   //alert("fddfgfd");
                    var kra_des = $("#KRA_description").val();
                    var kra_data_target = ''; var kra_data_value_details = {};$cnt = 0;$kra_description_data='';$kra_wt_data='';
                    var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';var kra_complete_flag = 0;var final_kpi_wt = 0;
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
                    else
                    {
                        kra_description_data = '';
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
                                //alert(i);
                                if($("#kpilistyii_"+i).val() != '')
                                {
                                    if(final_kpi_wt == '0')
                                    {
                                        final_kpi_wt = $("#kpi_target_value-"+i).val();
                                    }
                                    else
                                    {
                                        final_kpi_wt = final_kpi_wt+';'+$("#kpi_target_value-"+i).val();
                                    }
                                }
                                    
                                            
                                    var selected_unit = $("#mask_number-"+i).find(':selected').val();
                                    if (kpi_unit == '')
                                    {
                                        kpi_unit = $("#mask_number-"+i).find(':selected').val();
                                    }
                                    else
                                    {
                                        kpi_unit = kpi_unit+';'+$("#mask_number-"+i).find(':selected').val();
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

                                         
                                        var date_data = '';
                                        if(t1 == '')
                                        {
                                            t1 = 0;
                                        }
                                        else
                                        {
                                            t1 = $(".target_value1"+i).val();
                                        }
                                        
                                        if(t2 == '')
                                        {
                                            t2 = 0;
                                        }
                                        else
                                        {
                                            t2 = $(".target_value2"+i).val();
                                        }
                                        
                                        if(t3 == '')
                                        {
                                            t3 = 0;
                                        }
                                        else
                                        {
                                            t3 = $(".target_value3"+i).val();
                                        }
                                        
                                        if(t4 == '')
                                        {
                                            t4 = 0;
                                        }
                                        else
                                        {
                                            t4 = $(".target_value4"+i).val();
                                        }
                                        
                                        if(t5 == '')
                                        {
                                            t5 = 0;
                                        }
                                        else
                                        {
                                            t5 = $(".target_value5"+i).val();
                                        }
                                        
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
                    }
                    //alert(final_kpi_wt);
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

                    //alert(kpi_value);
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
                               url : base_url+$("#basepath").attr('value')+'/index.php?r=setgoals/save_kpi',
                                success : function(data)
                                {
                                    // if (data != '') 
                                    // {
                                    //     alert(data); 
                                    // }
                                   //alert(data);
                                    if (data == "Success")
                                    {
                                       // $("#err").show();  
                                        // $("#err").fadeOut(6000);
                                         //$("#error_value").text("Successfully Save");
                                        
                                         //alert(data);
                                        updated_kpi_value = kpi_id_value;
                                        // alert(kpi_id_value);
                                        //get_notify("KRA added successfully");
                                       $(".output_div1").load(location.href + " .output_div1");
                                      //  $('#user-form')[0].reset();
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
                $(window).scroll(function()
                        {
                        var tp = parseInt($(window).scrollTop()+"px");
                        if($(window).scrollTop() == '590')
                        {
                        tp = parseInt($(window).scrollTop()+"px")+parseInt($(window).scrollTop()+"px");
                        }
                            $('#err').animate({top:tp },{queue: false, duration: 350});  
                        });  
                 //alert($("#min_kpiwt").text());
                    //alert("jhjk");
                    var kra_des = $("#KRA_description").val();
                    var final_kpi_total = 0;var er = '';
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
                        var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';var tot_kpi_wt1 = 0;var tot_kpi_wt = 0;
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
                            //alert($("#min_kpiwt").text());
                                if ($("#kpilistyii_"+i).val()!= '' && $("#mask_number-"+i).find(':selected').val()!='Select') 
                                {
                                    kpi_list_data = parseInt(kpi_list_data)+parseInt(1);
                                }
                                 if ($("#kpi_target_value-"+i).val() != '' && $.isNumeric($("#kpi_target_value-"+i).val())) 
                                {tot_kpi_wt++;
                                    if(parseInt($("#kpi_target_value-"+i).val()) < parseInt($("#min_kpiwt").text()))
                                    {                      
                                        error = "Minimum KPI Weightage allowed is "+$("#min_kpiwt").text();break;
                                    }
                                    else
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
                                }
                                else if(!$.isNumeric($("#kpi_target_value-"+i).val()) && $("#kpi_target_value-"+i).val() != '')
                                {                                     
                                    error = "Please enter only numbers in KPI Weightage field.";break;
                                }
                                else if($("#kpilistyii_"+i).val()!= '' && i>0 && (($("#kpi_target_value-"+i).val() != '' && $("#kpi_target_value-"+(i-1)).val() == '') || ($("#kpi_target_value-"+i).val() == '' && $("#kpi_target_value-"+(i-1)).val() != '')))
                                {                      
                                    error = "Please enter KPI Weightage for all KPI field.";break;
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
                                        var selected_value = $("#mask_number-"+i).find(':selected').val();tot_kpi_wt1++;
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
                                            if(selected_value == 'Days')
                                            {
                                                <!--var target1=$("#target_need1").text();-->
                                                <!--var target2=$("#target_need2").text();-->
                                                <!--var target3=$("#target_need3").text();-->
                                                <!--var target4=$("#target_need4").text();-->
                                                <!--var target5=$("#target_need5").text();-->
                                                <!--if(target1 <= target2){-->
                                                <!--    error = 'Target 1 greater.';break;-->
                                                <!--}-->
                                                <!--else -->
                                                
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !$.isNumeric($(".target_value1"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                    $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                     error = 'Target 2 value is compulsory.';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !$.isNumeric($(".target_value2"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !$.isNumeric($(".target_value3"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !$.isNumeric($(".target_value4"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                    $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !$.isNumeric($(".target_value5"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else
                                                {
                                                  
                                                
                                                    for(var ch = 5;ch>0;ch--)
                                                    {
                                                    
                                                        var d= parseInt(ch)-parseInt(1);
                                                        if(d>0)
                                                        {
                                                        //alert(parseInt($(".target_value"+ch+i).val())<parseInt($(".target_value"+d+i).val()));
                                                        if((parseInt($(".target_value"+ch+i).val())>parseInt($(".target_value"+d+i).val())) || (parseInt($(".target_value"+ch+i).val())==parseInt($(".target_value"+d+i).val())))
                                                          {
                                                             er = "Days should be in descending order and repetition is not allowed";
                                                            // alert(parseInt($(".target_value"+ch+i).val()));alert(parseInt($(".target_value"+d+i).val()));
                                                          }
                                                          //alert($(".target_value"+ch+i).val());alert(parseInt($(".target_value"+d+i).val()));
                                                        }
                                                    }
                                                   
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }

                                                }
                                                //alert(er);
                                               
                                            }
                                           else if(selected_value == 'Percentage' )
                                            {
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if($(".target_value1"+i).val()=='0')
                                                {
                                                    $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = '0 value is not allowed';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !$.isNumeric($(".target_value1"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     $(".target_value2"+i).css('border','1px solid red');
                                                     $(".target_value2"+i).focus();
                                                     error = 'Target 2 value is compulsory.';break; 
                                                }
                                                else if($(".target_value2"+i).val()=='0')
                                                {
                                                     $(".target_value2"+i).css('border','1px solid red');
                                                     $(".target_value2"+i).focus();
                                                      error = '0 value is not allowed';break;
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !$.isNumeric($(".target_value2"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if($(".target_value3"+i).val()=='0')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !$.isNumeric($(".target_value3"+i).val()))
                                                {
                                                     $(".target_value3"+i).css('border','1px solid red');
                                                     $(".target_value3"+i).focus();
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                    $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if($(".target_value4"+i).val()=='0')
                                                {
                                                    $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !$.isNumeric($(".target_value4"+i).val()))
                                                {
                                                     $(".target_value4"+i).css('border','1px solid red');
                                                     $(".target_value4"+i).focus(); 
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                     $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if($(".target_value5"+i).val()=='0')
                                                {
                                                     $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !$.isNumeric($(".target_value5"+i).val()))
                                                {
                                                     error = 'Only numbers are allowed for Days/Percentage.';break;
                                                }
                                                
                                                else
                                                {
                                                   
                                                    for(var ch = 5;ch>0;ch--)
                                                    {
                                                    //alert($(".target_value"+ch+i).val());alert($(".target_value"+d+i).val());
                                                        //var d= parseInt(ch)-parseInt(1);
                                                        for(var d = ch-1;d>0;d--)
                                                        {
                                                          if($(".target_value"+ch+i).val()==$(".target_value"+d+i).val())
                                                          {
                                                             er = "Repetition is not allowed";
                                                          }
                                                        }
                                                    }
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
                                                var asc = 0;var desc = 0;
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }                                               
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                     error = 'Target 2 value is compulsory.';break; 
                                                }                                                
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                    $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }                                                
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                    $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }                                                
                                                else
                                                {
                                                   var asc = 0;var desc = 0;
                                                    for(var ch = 5;ch>0;ch--)
                                                    {   
                                                        var date1 =  $(".target_value"+ch+i).val().split("/");
                                                        var date_pos = '';
                                                        if(date1[1] == "Jan")
                                                        {
                                                         date_pos = '01';
                                                        }
                                                        else if(date1[1] == "Feb")
                                                        {
                                                         date_pos = '02';
                                                        }
                                                        else if(date1[1] == "Mar")
                                                        {
                                                         date_pos = '03';
                                                        }
                                                        else if(date1[1] == "Apr")
                                                        {
                                                         date_pos = '04';
                                                        }
                                                        else if(date1[1] == "May")
                                                        {
                                                         date_pos = '05';
                                                        }
                                                        else if(date1[1] == "Jun")
                                                        {
                                                         date_pos = '06';
                                                        }
                                                        else if(date1[1] == "Jul")
                                                        {
                                                         date_pos = '07';
                                                        }
                                                        else if(date1[1] == "Aug")
                                                        {
                                                         date_pos = '08';
                                                        }
                                                        else if(date1[1] == "Sep")
                                                        {
                                                         date_pos = '09';
                                                        }
                                                        else if(date1[1] == "Oct")
                                                        {
                                                         date_pos = '10';
                                                        }
                                                        else if(date1[1] == "Nov")
                                                        {
                                                         date_pos = '11';
                                                        }
                                                        else if(date1[1] == "Dec")
                                                        {
                                                         date_pos = '12';
                                                        }
                                                        var date11 = date1[0]+'/'+date_pos+'/'+date1[2];
                                                        var d= parseInt(ch)-parseInt(1);
                                                        if(d != 0)
                                                        {
                                                           var date2 =  $(".target_value"+d+i).val().split("/");
                                                            var date_pos = '';
                                                        if(date2[1] == "Jan")
                                                        {
                                                         date_pos = '01';
                                                        }
                                                        else if(date2[1] == "Feb")
                                                        {
                                                         date_pos = '02';
                                                        }
                                                        else if(date2[1] == "Mar")
                                                        {
                                                         date_pos = '03';
                                                        }
                                                        else if(date2[1] == "Apr")
                                                        {
                                                         date_pos = '04';
                                                        }
                                                        else if(date2[1] == "May")
                                                        {
                                                         date_pos = '05';
                                                        }
                                                        else if(date2[1] == "Jun")
                                                        {
                                                         date_pos = '06';
                                                        }
                                                        else if(date2[1] == "Jul")
                                                        {
                                                         date_pos = '07';
                                                        }
                                                        else if(date2[1] == "Aug")
                                                        {
                                                         date_pos = '08';
                                                        }
                                                        else if(date2[1] == "Sep")
                                                        {
                                                         date_pos = '09';
                                                        }
                                                        else if(date2[1] == "Oct")
                                                        {
                                                         date_pos = '10';
                                                        }
                                                        else if(date2[1] == "Nov")
                                                        {
                                                         date_pos = '11';
                                                        }
                                                        else if(date2[1] == "Dec")
                                                        {
                                                         date_pos = '12';
                                                        }
                                                        var date12 = date2[0]+'/'+date_pos+'/'+date2[2];
                                                            if(process(date11) < process(date12))
                                                            { 
                                                              asc = parseInt(asc)+parseInt(1);
                                                            }
                                                            if(process(date11) > process(date12))
                                                            { 
                                                              desc = parseInt(desc)+parseInt(1);
                                                            }
                                                           //alert(desc);
                                                        }
                                                     
                                                    }
                                                    //alert(asc);alert(desc);
                                                      if(desc!=4 && asc !=4)
                                                      { 
                                                         er = "Date should be either in ascending or descending order and repetition is not allowed.";
                                                      }
                                                    if (kpi_value == '')
                                                    {
                                                        kpi_value = $(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();
                                                    }
                                                    else
                                                    {                                    
                                                            kpi_value = kpi_value+';'+$(".target_value1"+i).val()+'-'+$(".target_value2"+i).val()+'-'+$(".target_value3"+i).val()+'-'+$(".target_value4"+i).val()+'-'+$(".target_value5"+i).val();                                   
                                                    }
                                                }
                                               //alert(er);
                                            }
                                            else if(selected_value == 'Text')
                                            {
                                                
                                                var chk = /[;-]/;
                                                if($("#target_need1").text() != 'undefined' && $(".target_value1"+i).val()=='')
                                                {
                                                    $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($(".target_value1"+i).val()!='' && chk.test($(".target_value1"+i).val())) || ($(".target_value1"+i).val()!='' && $(".target_value1"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                     $(".target_value2"+i).css('border','1px solid red');
                                                     $(".target_value2"+i).focus();
                                                     error = 'Target 2 value is compulsory.';break; 
                                                }
                                               else if(($(".target_value2"+i).val()!='' && chk.test($(".target_value2"+i).val())) || ($(".target_value2"+i).val()!='' && $(".target_value2"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                     $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($(".target_value3"+i).val()!='' && chk.test($("#target_need3").text())) || ($(".target_value3"+i).val()!='' && $("#target_need3").text().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                     $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($(".target_value4"+i).val()!='' && chk.test($(".target_value4"+i).val())) || ($(".target_value4"+i).val()!='' && $(".target_value4"+i).val().length>2000))
                                                {
                                                     error = 'For the free text field ;- special characters are not allowed and maximum characters allowed are 2000.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                       $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
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
                                                   $(".target_value1"+i).css('border','1px solid red');
                                                    $(".target_value1"+i).focus();
                                                    error = 'Target 1 value is compulsory.';break;
                                                }
                                                else if(($("#target_need1").text() != 'undefined' || $("#target_need1").text() === undefined) && $(".target_value1"+i).val()!='' && !ratio_chk.test($(".target_value1"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need2").text() != 'undefined' && $(".target_value2"+i).val()=='')
                                                {
                                                    $(".target_value2"+i).css('border','1px solid red');
                                                    $(".target_value2"+i).focus();
                                                    error = 'Target 2 value is compulsory.';break; 
                                                }
                                                else if(($("#target_need2").text() != 'undefined' || $("#target_need2").text() === undefined) && $(".target_value2"+i).val()!='' && !ratio_chk.test($(".target_value2"+i).val()))
                                                {
                                                    error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need3").text() != 'undefined' && $(".target_value3"+i).val()=='')
                                                {
                                                    $(".target_value3"+i).css('border','1px solid red');
                                                    $(".target_value3"+i).focus();
                                                    error = 'Target 3 value is compulsory.';break;
                                                }
                                                else if(($("#target_need3").text() != 'undefined' || $("#target_need3").text() === undefined) && $(".target_value3"+i).val()!='' && !ratio_chk.test($(".target_value3"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need4").text() != 'undefined' && $(".target_value4"+i).val()=='')
                                                {
                                                    $(".target_value4"+i).css('border','1px solid red');
                                                    $(".target_value4"+i).focus(); 
                                                    error = 'Target 4 value is compulsory.';break;
                                                }
                                                else if(($("#target_need4").text() != 'undefined' || $("#target_need4").text() === undefined) && $(".target_value4"+i).val()!='' && !ratio_chk.test($(".target_value4"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else if($("#target_need5").text() != 'undefined' && $(".target_value5"+i).val()=='')
                                                {
                                                    $(".target_value5"+i).css('border','1px solid red');
                                                    $(".target_value5"+i).focus(); 
                                                    error = 'Target 5 value is compulsory.';break;
                                                }
                                                else if(($("#target_need5").text() != 'undefined' || $("#target_need5").text() === undefined) && $(".target_value5"+i).val()!='' && !ratio_chk.test($(".target_value5"+i).val()))
                                                {
                                                     error = 'Please enter valid value in ratio field.';break;
                                                }
                                                else
                                                {
                                                   
                                                    for(var ch = 5;ch>0;ch--)
                                                    {
                                                    //alert($(".target_value"+ch+i).val());alert($(".target_value"+d+i).val());
                                                        //var d= parseInt(ch)-parseInt(1);
                                                        for(var d = ch-1;d>0;d--)
                                                        {
                                                          if($(".target_value"+ch+i).val()==$(".target_value"+d+i).val())
                                                          {
                                                             er = "Repetition is not allowed";
                                                          }
                                                        }
                                                    }
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
                                                error = 'Minimum 1 number and maximum 6 digits are allowed.';break;
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
                                        else if(er != '')
                                        {
                                             error = er;break;
                                        }
                                        else if(tot_kpi_wt !=0 && tot_kpi_wt1 != tot_kpi_wt)
                                        {
                                            error = "Please enter KPI Weightage for all KPI field.";break;
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
                            if(er != '')
                            {
                                 error = er;
                            }
                            else
                            {
                                er = '';
                            }
                            //alert(er);
                                                
                                } 
                            }
                            
                            
                        }
                        
                        if (updated_kpi_value != '') 
                        {
                            kpi_id_value = updated_kpi_value;
                        }
                        //alert(tot_kpi_wt1);alert(tot_kpi_wt);
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
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/savekpi',
                                success : function(data)
                                {
                                   // alert(data);
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
                    var total_goal = $("#count_goal1").text();
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
                         $("html, body").animate({ scrollTop: 0 }, "slow");
                    }                    
                    else
                    {
                        for (var i = 1; i <= total_goal; i++) 
                        {
                            
                                if(total != 0)
                                {
                                    //alert(i);
                                    total = parseInt(total)+parseInt($("#total_"+i).text());
                                } 
                                else
                                {
                                    total = $("#total_"+i).text();
                                }
                        }
                            //alert($('#cnt_kra_cat_people1').text()); alert($('#cnt_kra_cat_process1').text()); alert($('#cnt_kra_cat_customer1').text()); alert($('#cnt_kra_cat_business1').text());
                            var kra_cat=parseInt($('#kra_cat_cnt').text());
                        if(!($('#cnt_kra_cat_people1').text() == 1 && $('#cnt_kra_cat_process1').text() == 1 && $('#cnt_kra_cat_customer1').text() == 1 && $('#cnt_kra_cat_business1').text() == 1))
                        {
                             $("#err").show();  
                            $("#err").fadeOut(6000);
                            $("#error_value").text("Selection of all KRA category is mandatory");
                            $("#err").addClass("alert-danger");
                             $("html, body").animate({ scrollTop: 0 }, "slow");
                        }
                       else if(kra_cat!= 0){
                            $("#err").show();  
                            $("#err").fadeOut(6000);
                            $("#error_value").text(" KRA category should not repeat more than 2 times.");
                            $("#err").addClass("alert-danger");
                             $("html, body").animate({ scrollTop: 0 }, "slow");
                       }
                       else if (total!=100) 
                        {
                            $("#err").show();  
                            $("#err").fadeOut(6000);
                            $("#error_value").text("Total of KRA should be 100 only.");
                            $("#err").addClass("alert-danger");
                             $("html, body").animate({ scrollTop: 0 }, "slow");
                           
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
                                                    $("#program_cmd-"+get_list_value[j]).css('border-color','red');$("#program_cmd"+i).focus();break;
                                                   
                                                } 
                                                else if($("#program_cmd-"+get_list_value[j]).val().length>500)
                                                {
                                                chk_cmnts = 0;chk_compl = 0;chk_compl1 = 1;
                                                                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');$("#program_cmd"+i).focus();break;
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
                                                        $("#program_cmd-"+i).css('border-color','red'); $("#program_cmd"+i).focus();
                                                        break;
                                                       
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
                                for (var i = 1; i < 3; i++) {
                                   
                                   if (!($(".topic"+i).val() === undefined && $("#days_required"+i).val() === undefined || $("#faculty_email_id"+i).find(":selected").val() === undefined || $("#faculty_email_id"+i).find(":selected").val()=='Select')) 
                                   {
                                     
                                        if(($('.topic'+i).val()=="" || $('.topic'+i).val()=== undefined) && ( ($("#days_required"+i).val()!="" || !($("#days_required"+i).val()) === undefined || $("#faculty_email_id"+i).find(":selected").val()!='')))
                        {
                            $(".topic"+i).css('border-color','red');
                            $(".topic"+i).focus();
                            <!--$("#days_required"+i).css('border-color','red');-->
                            <!--$("#faculty_email_id"+i).css('border-color','red');-->
                            chk_cmnts1++;
                        }
                        else if(($("#days_required"+i).val()=='' ||$("#days_required"+i).val()=== undefined ) && ($(".topic"+i).val()!="" || !($(".topic"+i).val()) === undefined || $("#faculty_email_id"+i).find(":selected").val()!='')){
                            $(".topic"+i).css('border-color','');
                            $("#days_required"+i).css('border-color','red');
                            $("#days_required"+i).focus();
                            <!--$("#faculty_email_id"+i).css('border-color','red');-->
                            chk_cmnts1++;
                        }
                        else if(($("#faculty_email_id"+i).find(":selected").val()=='Select' || $("#faculty_email_id"+i).find(":selected").val()=='' ) && ($(".topic"+i).val()!="" || !($(".topic"+i).val()) === undefined ||$(".topic"+i).val()!="" || !($(".topic"+i).val()) === undefined) ){
                            $(".topic"+i).css('border-color','');
                            $("#days_required"+i).css('border-color','');
                            $("#faculty_email_id"+i).css('border-color','red');
                            $("#faculty_email_id"+i).focus();
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
                                var comp_desg=parseInt($("#compare_designation").text());
                                if(comp_desg == 1){
                                for (var i = 3; i <= 4; i++) {
                                   if($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()===undefined)
                                    {
                                        <!--$(".target_date"+i).css('border-color','red');-->
                                        <!--$("#number_of_meetings"+i).css('border-color','red');-->
                                        $("#faculty_email_id"+i).css('border-color','red');
                                        chk_cmnts2++;
                                    }
                                     else if($('#number_of_meetings'+i).val()=="" || $('#number_of_meetings'+i).val()=== undefined || !$.isNumeric($("#number_of_meetings"+i).val())){
                                        $("#number_of_meetings"+i).css('border-color','red');
                                        $("#faculty_email_id"+i).css('border-color','');
                                         chk_cmnts2++;
                                    }
                                    else if($(".target_date"+i).val()=='' || $(".target_date"+i).val()=== undefined){
                                       $(".target_date"+i).css('border-color','red');
                                        $("#number_of_meetings"+i).css('border-color','');
                                        $("#faculty_email_id"+i).css('border-color','');
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
                                            scrollTop: ($(".program_cmd").first().offset().top)
                                        },500);
                                          $("#error_spec1").text("Please fill all required fields for program comments(Note : special character ';' not allowed).");                          
                                    }
                                    else if(chk_cmnts1 != 0)
                                    {
                                        <!-- $('body').animate({-->
                                        <!--    scrollTop: ($(".error_row_chk").first().offset().top)-->
                                        <!--},500);-->
                                          $("#error_spec1").text("Please provide all the details if you need other program.");   
                                    }
                                    else if(chk_cmnts2 != 0)
                                    {
              
                                          $("#error_spec2").text("Please provide all the details for Development through developmental relationships.");   
                                    }
                                    else
                                    {
                                        $("#error_spec1").text("");
                                        $("#error_spec2").text("");
                                        var comp_desg=parseInt($('#compare_designation').text());
                                        if(comp_desg == 1 && ($("#project_title1").val() == '' || $("#project_title1").val().length>500))
                                        {
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#project_title1").css('border-color','red');
                                                $("#project_title1").focus();
                                                $("#error_spec4").text("Please provide project title(Note: 50characters are maximum limit).");   
                                        }
                                        else if(comp_desg == 1 &&($("#review_date").val() == ''))
                                        {
                                             $("#project_title1").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#review_date").css('border-color','red');
                                                $("#review_date").focus();
                                                $("#error_spec4").text("Please provide project review date.");
                                        }
                                        else if(comp_desg == 1 &&($("#target_end_date").val() == ''))
                                        {
                                           $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#target_end_date").css('border-color','red');
                                                $("#target_end_date").focus();
                                                $("#error_spec4").text("Please provide project target end date.");
                                        }
                                        else if(comp_desg == 1 && ($("#project_scope").val() == '' || $("#project_scope").val().length>500))
                                        {
                                            $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#project_scope").css('border-color','red');
                                                $("#project_scope").focus();
                                                $("#error_spec4").text("Please provide project scope(Note: 500characters are maximum limit).");   
                                        }
                                        else if(comp_desg == 1 &&($("#project_exclusion").val() == '' || $("#project_exclusion").val().length>500))
                                        {
                                            $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $("#project_scope").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $("#project_exclusion").css('border-color','red');
                                                $("#project_exclusion").focus();
                                                $("#error_spec4").text("Please provide project exclusion(Note: 500characters are maximum limit).");   
                                        }
                                         else if(comp_desg == 1 &&($(".project_deliverables").val() == '' || $(".project_deliverables").val().length>500))
                                        {
                                            $("#project_title1").css('border-color','');
                                            $("#review_date").css('border-color','');
                                            $("#target_end_date").css('border-color','');
                                             $("#project_scope").css('border-color','');
                                             $('body').animate({
                                                scrollTop: ($(".error_row_chk1").first().offset().top)
                                            },500);
                                                $(".project_deliverables").css('border-color','red');
                                                $(".project_deliverables").focus();
                                                $("#error_spec4").text("Please provide comments in project deliverables field(Note: 500 characters are maximum limit).");   
                                        }
                                        else if(comp_desg == 1 &&($(".learn_from").val() == '' || $(".learn_from").val().length>300))
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
                                                $(".learn_form").focus();
                                                $("#error_spec4").text("Please provide comments in what is expected to learn from this project(Note: 300 characters are maximum limit).");   
                                        }
                                        else if(comp_desg == 1 && ($(".reviewvers_name").val() == '' || $(".reviewvers_name").val().length>50))
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
                                                 $(".reviewvers_name").focus();
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
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php?r=IDP/save_data1',
                                                success : function(data)
                                                {
                                                    $("#project_title1").css('border-color','');
                                                    $("#review_date").css('border-color','');
                                                    $("#target_end_date").css('border-color','');
                                                    $("#project_scope").css('border-color','');
                                                    $("#project_exclusion").css('border-color','');
                                                    $(".project_deliverables").css('border-color','');
                                                    $(".learn_from").css('border-color','');
                                                    $(".reviewvers_name").css('border-color','');
                                                    $("#error_spec1").text("");
                                                    $("#error_spec2").text("");
                                                    $("#error_spec3").text("");
                                                    $("#error_spec4").text("");
                                                    if($("#term_condition:checked").val() != 'term_condition')
                                                    {
                                                        
                                                        $("#blink_me").addClass('blink_me');
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
                                                                        url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/sendmail',
                                                                        success : function(data)
                                                                        {
                                                                            //alert(data);
                                                                            $("#show_spin").hide(); 
                                                                            $("#send_for_appraisal").hide();
                                                                            $("#err").show();  
                                                                            $("#err").fadeOut(6000);
                                                                            $("#error_value").text("Notification Sent to your manager");
                                                                            $("#err").addClass("alert-success");                       
                                                                        }
                                                                    });
                                                            });
                                                    }
                                                    
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
                    var business=0;var people=0;var customer=0;var process=0;
                    
                    var kar_cat=$('.target_value').find(':selected').val();
                   
                    process=<?php echo $proc ?>;
                    business=<?php echo $buis ?>;
                    people=<?php  echo $ppl ?>;
                    customer=<?php echo $cust ?>;
                    var edt =$('#edit1').text();
                    if(edt == ""){
                        var edt_flg=0;
                    }
                    else{
                        var edt_flg=1;
                    }
                    $("#kra_cat_cnt31").text(0);
                    //alert($('#kra_cat_cnt2').text());
                    if($('#kra_cat_cnt2').text() != 0 && (($('#cnt_kra_cat_people').text() == 1 && kar_cat=="People") || ($('#cnt_kra_cat_customer').text() == 1 && kar_cat=="Customer") || ($('#cnt_kra_cat_process').text() == 1 && kar_cat=="Process") || ($('#cnt_kra_cat_business').text() == 1 && kar_cat=="Business")))
                    {
                        $("#err").show();  
                        $("#err").fadeOut(6000);
                        $("#error_value").text("Selection of all KRA category is mandatory");
                        $("#err").addClass("alert-danger");
                         $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                    else if($('#kra_cat_cnt1').text() == 1 && ($('#cnt_kra_cat_people').text() > 1 || $('#cnt_kra_cat_process').text() > 1 || $('#cnt_kra_cat_customer').text() > 1 || $('#cnt_kra_cat_business').text() > 1))
                    {
                         $("#err").show();  
                        $("#err").fadeOut(6000);
                        $("#error_value").text("Selection of all KRA category is mandatory");
                        $("#err").addClass("alert-danger");
                         $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                    else if(parseInt(process) >= 2 && kar_cat=="Process"){
                              
             
                     $("#err").show();  
                     $("#err").fadeOut(6000);
                    $("#error_value").text("Please select another KRA category");
               
                     
                    }
                    else if(parseInt(business) >= 2 && kar_cat=="Business"){
                        $("#err").show();  
                     $("#err").fadeOut(6000);
                    $("#error_value").text("Please select another KRA category");
                    
                    }
                   else if(parseInt(people) >= 2 && kar_cat=="People"){
                        $("#err").show();  
                     $("#err").fadeOut(6000);
                    $("#error_value").text("Please select another KRA category");
                     
                    }
                    else if(parseInt(customer) >= 2 && kar_cat=="Customer"){
                         $("#err").show();  
                     $("#err").fadeOut(6000);
                    $("#error_value").text("Please select another KRA category");
                    
                    }
                    else if(edt_flg == 0) {

                     var selected_unit = {
                            'kra_category' : $('.target_value').find(':selected').val(),
                    }
                    $("#get_target_value").css('display','none');
                    
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
                                //alert(detail[5]);
                                $("#kpi_record").html(detail[0]);
                                $("#kpi_list_number").html(detail[1]);
                                $("#min_kpi").text(detail[2]);
                                $("#max_kpi").text(detail[3]);
                                $("#min_kpiwt").text(detail[5]);
                                var target_value_need = detail[4].split(';');
                                $("#target_need1").text(target_value_need[0]);
                                $("#target_need2").text(target_value_need[1]);
                                $("#target_need3").text(target_value_need[2]);
                                $("#target_need4").text(target_value_need[3]);
                                $("#target_need5").text(target_value_need[4]);
                            }
                        });
                        }
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
        
        <script>
            
             $(".send_for_appraisal").click(function(){
                    //alert("hello");
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
                                        $("#program_cmd-"+get_list_value[j]).css('border-color','red');$("#program_cmd"+i).focus();break;
                                       
                                    } 
                                     if($("#program_cmd-"+get_list_value[j]).val().length>500)
                                    {
                                    chk_cmnts = 0;chk_compl = 0;chk_compl1 = 1;
                                                                            $("#program_cmd-"+get_list_value[j]).css('border-color','red');$("#program_cmd"+i).focus();break;
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
                                            $("#program_cmd-"+i).css('border-color','red');$("#program_cmd"+i).focus();break;
                                           
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
                       if($('.topic'+i).val()=="" || $('.topic'+i).val()=== undefined )
                        {
                            $(".topic"+i).css('border-color','red');
                            <!--$("#days_required"+i).css('border-color','red');-->
                            <!--$("#faculty_email_id"+i).css('border-color','red');-->
                            chk_cmnts1++;
                        }
                        else if($("#days_required"+i).val()=='' ||$("#days_required"+i).val()=== undefined ){
                            <!--$(".topic"+i).css('border-color','red');-->
                            $("#days_required"+i).css('border-color','red');
                            <!--$("#faculty_email_id"+i).css('border-color','red');-->
                            chk_cmnts1++;
                        }
                        else if($("#faculty_email_id"+i).find(":selected").val()=='Select' ||$("#faculty_email_id"+i).find(":selected").val()=='' ){
                            <!--$(".topic"+i).css('border-color','red');-->
                            <!--$("#days_required"+i).css('border-color','red');-->
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
                    
                    var comp_desg=parseInt($('#compare_designation').text());
                    if(comp_desg == 1){
                    for (var i = 3; i <= 4; i++) {
                       if($("#faculty_email_id"+i).val()=='' || $("#faculty_email_id"+i).val()===undefined)
                                    {
                                        <!--$(".target_date"+i).css('border-color','red');-->
                                        <!--$("#number_of_meetings"+i).css('border-color','red');-->
                                        $("#faculty_email_id"+i).css('border-color','red');
                                         $("#faculty_email_id"+i).focus();
                                        chk_cmnts2++;
                                    }
                                    else if($('#topic_to_be_diss'+i).val() == "" || $('#topic_to_be_diss'+i).val() === undefined){
                                        $('#topic_to_be_diss'+i).css('border-color','red');
                                        $('#topic_to_be_diss'+i).focus();chk_cmnts2++;
                                    }
                                     else if($('#number_of_meetings'+i).val()=="" || $('#number_of_meetings'+i).val()=== undefined || !$.isNumeric($("#number_of_meetings"+i).val())){
                                        $("#number_of_meetings"+i).css('border-color','red');
                                        $("#number_of_meetings"+i).focus();
                                        $("#faculty_email_id"+i).css('border-color','');
                                         chk_cmnts2++;
                                    }
                                    else if($(".target_date"+i).val()=='' || $(".target_date"+i).val()=== undefined){
                                       $(".target_date"+i).css('border-color','red');
                                       $(".target_date"+i).focus();
                                        $("#number_of_meetings"+i).css('border-color','');
                                        $("#faculty_email_id"+i).css('border-color','');
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
                        
                          $("#error_spec1").text("Please fill all required fields for program comments(Note : special character ';' not allowed).");                          
                    }
                     if(chk_cmnts1 != 0)
                    {
                        <!-- $('body').animate({-->
                        <!--    scrollTop: ($(".error_row_chk").first().offset().top)-->
                        <!--},500);-->
                          $("#error_spec1").text("Please provide all the details if you need other program.");   
                    }
                    
                  
                    
                    
                    
                    
                    
                     if(chk_cmnts2 != 0)
                    {
                         $('body').animate({
                            scrollTop: ($(".error_row_chk2").first().offset().top)
                        },500);
                          $("#error_spec2").text("Please provide all the details for Development through developmental relationships.");   
                    }
                    
                    
                    
                      var comp_desg=parseInt($('#compare_designation').text());
           
                   if(comp_desg == 1 && ($("#project_title1").val() == '' || $("#project_title1").val().length>500))
                        {

                                $("#project_title1").css('border-color','red');
                                //$("#error_spec3").text("Please provide project title(Note: 500characters are maximum limit).");   
                        }
                         if(comp_desg == 1 && ($("#review_date").val() == ''))
                        {

                                $("#review_date").css('border-color','red');
                                //$("#error_spec3").text("Please provide project review date.");
                        }
                         if(comp_desg == 1 && ($("#target_end_date").val() == ''))
                        {

                                $("#target_end_date").css('border-color','red');
                               // $("#error_spec3").text("Please provide project target end date.");
                        }
                         if(comp_desg == 1 && ($("#project_scope").val() == '' || $("#project_scope").val().length>500))
                        {

                                $("#project_scope").css('border-color','red');
                               // $("#error_spec3").text("Please provide project scope(Note: 500characters are maximum limit).");   
                        }
                         if(comp_desg == 1 && ($("#project_exclusion").val() == '' || $("#project_exclusion").val().length>500))
                        {

                                $("#project_exclusion").css('border-color','red');
                                //$("#error_spec3").text("Please provide project exclusion(Note: 500characters are maximum limit).");   
                        }
                         if(comp_desg == 1 && ($(".project_deliverables").val() == '' || $(".project_deliverables").val().length>500))
                        {

                                $(".project_deliverables").css('border-color','red');
                               // $("#error_spec4").text("Please provide comments in project deliverables field(Note: 500 characters are maximum limit).");   
                        }
                         if(comp_desg == 1 && ($(".learn_from").val() == '' || $(".learn_from").val().length>300))
                        {

                   
                                $(".learn_from").css('border-color','red');
                               // $("#error_spec4").text("Please provide comments in what is expected to learn from this project(Note: 300 characters are maximum limit).");   
                        }
                         if(comp_desg == 1 && ($(".reviewvers_name").val() == '' || $(".reviewvers_name").val().length>50))
                        {

                                $(".reviewvers_name").css('border-color','red');
                               // $("#error_spec4").text("Please provide reviewer(s) name(Note: 50 characters are maximum limit).");   
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
                    
                    
                });

        </script>
        <!-- END CONTAINER -->
<script>
<!--$("#submit_kra").click(function(){-->
<!--$("#target_value").val($("#target_value option:first").val());-->
<!--$("#Weightage").val($("#Weightage option:first").val());-->
<!--$(".format_detail").val($(".format_detail option:first").val());-->
<!--$("#KRA_description").val("");-->
<!--$(".kpi_list").val("");-->
<!--$('.fields').val("");-->
<!--});-->
</script>

<script>
    
    $("body").on('click','.add_kpi',function(){
                       // alert($(this).attr('id'));
                        var value = $(this).attr('id');
                        var get_id = value.split('-');
                        //alert(get_id);
$(this).css('display','none');
                        //alert($(this).attr('id'));
                        //alert($("#kpi_cat_value-"+get_id[1]).text());
                         var selected_unit = {
                                'kra_category' : $("#kpi_cat_value-"+get_id[1]).text(),
                                'kra_id' : get_id[1],
                                'kpi_last_id' : get_id[2],
                                //'extra_kpi' : $("#no_ki_extra-"+get_id[1]).val(),
                'extra_kpi' : 1,
                        }
                       // alert($('.target_value').find(':selected').val());
                        var base_url = window.location.origin;
                         $.ajax({
                                type : 'post',
                                datatype : 'json',
                                data : selected_unit,
                                url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/gettarget_value2',
                                success : function(data)
                                { 
                                    //alert(data);
var detail = jQuery.parseJSON(data);
//alert(detail);
                                  if(detail[0] == '<lable style="color:red">Maximum 7 KPI are allowed to add.</lable>')
{
 $("#err").css('display','block');
$("#err").fadeOut(6000);
$("#error_value").text("Maximum 7 KPI are allowed to add.");
$('#'+get_id[1]).css('display','none');
}
else
{
   // alert("get_id[1]");
$("#extra_kpi"+get_id[1]).show(); 
$("#extra_kpi"+get_id[1]).html(detail[0]);
//$("#kpi_list_number"+get_id[1]).text(detail[1]);
var cnt=parseInt($('#kpi_list_number').text());

var newcnt=cnt+1;
//alert(newcnt);
$("#kpi_list_number").text(newcnt);
} 
                                
                                }
                            });
});

$("body").on('click','.del_kra_kpi',function(){

                        var this_id = $(this).attr('id');
                       var splited = this_id.split('-');
                       $("#del_krakpi").modal('show');

                        var data =  {
                                last_id : splited[2],
                                kra_id : splited[1],
                            };
                            $("#continue_del_krakpi").click(function(){
                                $("#show_spin_kpi").css('display','block');
                                    $.ajax({
                                    type : 'post',
                                    data : data,
                                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Setgoals/krakpi_del',
                                    success : function(data)
                                    {
                                        //alert(data);
                                        $("#show_spin_kpi").css('display','none');
                                        $("#del_krakpi").modal('toggle');
                                        if(data == 1)
                                        {
                                            $("#output_div_edit").load(location.href + " #output_div_edit");
                        $("#extra_"+splited[1]).css('display','block');
                        location.reload();
                                        }
                                    }
                                });
                            });
                      
                          });
</script>



<script>


$('.form-control-inline').keypress(function(e) {
    e.preventDefault();
});



</script>

<script>
$(function(){
$("#getdata").click(function(){
var base_url = window.location.origin;
save_detail_pdf();
});
});
function save_detail_pdf()
                { 
                    var base_url = window.location.origin;
                    var data = {
                        doc : $('#year_end_emppdf').html(),
                        emp_id : $('#emp_id').text(),
                        year1:$('#yr').text(),
                    };
                    $.ajax({                            
                    type : 'post',
                    datatype : 'html',
                    data : data,
                    url : base_url+$("#basepath").attr('value')+'/index.php?r=Checkattach/check_goal_idp',
                    success : function(data)
                    {

                        location.href = base_url+$("#basepath").attr('value')+'/Goalsheet_docs/goalsheet'+'_'+$("#femp_name").text()+'_'+$("#lemp_name").text()+$('#yr').text()+'.pdf'; 
                    }
                    });                 
                }
</script>

<style>
.hide_this
{
display:none;
}
</style>
<?php 
//echo Yii::app()->request->baseUrl; 
?>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        
        
<lable id='emp_id' class="hide_this" style="display: none"><?php echo $emp_data['0']['Employee_id']; ?></lable>
<lable id='femp_name' class="hide_this" style="display: none"><?php echo $emp_data['0']['Emp_fname']; ?></lable>
<lable id='lemp_name' class="hide_this" style="display: none"><?php echo $emp_data['0']['Emp_lname']; ?></lable>        
 <style>
 th
 {
     font-size: 14px;
 }
 td
 {
     font-size: 14px;
 }
 </style>          
        

         <div id="year_end_emppdf" style="display:none">
<?php 
$notification_data =new NotificationsForm;
        $emploee_data =new EmployeeForm;
        $kra=new KpiAutoSaveForm;
        $where = 'where Employee_id = :Employee_id';
        $list = array('Employee_id');
        $data = array(Yii::app()->user->getState("Employee_id"));
        $employee_data = $emploee_data->get_employee_data($where,$data,$list);

        $where1 = 'where  Employee_id = :Employee_id and goal_set_year = :goal_set_year';
        $list1 = array('Employee_id','goal_set_year');
        $data2 = array(Yii::app()->user->getState("Employee_id"),Yii::app()->user->getState('financial_year_check'));
        $kpi_data = $kra->get_kpi_list($where1,$data2,$list1);  
        

$where = 'where Email_id = :Email_id';
      $list = array('Email_id');
      $data = array($employee_data['0']['Reporting_officer1_id']);
      $mgr_data = $emploee_data->get_employee_data($where,$data,$list);

?>

<div id="target_goal" download>
<style type="text/css">

</style>
<label style="font-size:8px;">Employee Name :  <?php if(isset($employee_data['0']['Emp_fname'])) { echo $employee_data['0']['Emp_fname'].' '.$employee_data['0']['Emp_lname']; }?></label><br><label style="float: right;font-size:8px;">Manager's Name :  <?php if(isset($mgr_data) && count($mgr_data)>0){
                     echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                ?></label><br/>
<label style="font-size:8px;">Goalsheet Of Year:  <?php echo Yii::app()->user->getState('financial_year_check'); ?></label>
<?php                                            if (isset($kpi_data) && count($kpi_data)>0) { $cnt_num = 1;    ?>
                                            <label class='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
                                          <?php     
                                        foreach ($kpi_data as $row) {  ?>
                                        <div  style="margin-top:-79px">
                                        <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption" style="font-weight:bold; font-size:8px; color: black;">                                                  
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   </div>
                                                <div class="tools" style="font-weight:bold; font-size:8px; color: black;">
                                                    <?php echo "KRA Category : ".$row['KRA_category']; ?><br>
                                                    <?php echo "KRA Weightage : ".$row['target']; ?><br>
                                                    <?php echo "KRA Description : ".$row['KRA_description']; ?>
                                                </div>
                                            </div>
                                           
                                            <div class="portlet-body flip-scroll expand_goal<?php echo $cnt_num; ?>">    
                                            
                                                <table  class="table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top:20px;border-collapse: collapse;color:black;border: 1px solid black;">
                                                    <thead>
                                                         <tr id="get_target_value">
                                                        <th style="background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> Key Performance Indicator (KPI) description  </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> Unit </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> KPI Weightage </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;">  Value </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (1)<br>Unsatisfactory <br>Performance </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (2)<br>Needs<br>Improvement </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (3)<br>Good Solid <br>Performance </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;"> (4)<br>Superior <br>Performance </th>
                                                        <th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;">(5)<br>Outstanding <br>Performance </th>
 
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']); 
 $year_end_achive = explode(';',$row['year_end_achieve']); 
 $year_end_achive1 = explode(';',$row['year_end_reviewa']); 
                                if($row['KPI_target_value']=='')
                                {
                                 $KPI_target_value = '';
                                }
                                else
                                {
                                $KPI_target_value = explode(';',$row['KPI_target_value']); 
                                }

                                                                
                                                                $kpi_data_data = 0;
                                                                if(isset($kpi_list_data) && count($kpi_list_data)>0)
                                                                {
                                                                    for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if (isset($kpi_list_data[$i]) && $kpi_list_data[$i] != '') {
                                                                        if(isset($kpi_data_data) && $kpi_data_data == '')
                                                                        {
                                                                            $kpi_data_data = 1;
                                                                        }
                                                                        else
                                                                        {
                                                                            $kpi_data_data = $kpi_data_data+1;
                                                                        }                                                                        
                                                                    }
                                                                }                                                               
                                
                                                            ?>
                                                           <?php
                                                                $cnt = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if (isset($kpi_list_data[$i]) && $kpi_list_data[$i]!='') { $cnt++;
                                if (!isset($KPI_target_value[$i])) {
                                                                        $KPI_target_value[$i] = '';                                                                       
                                                                    }
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td style="height: 30px;border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_data[$i])) { echo $kpi_list_data[$i]; } ?></td>
                                                                    <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_unit[$i])) { echo $kpi_list_unit[$i]; } ?></td>
                                                                        <?php      
                                                                            if (isset($kpi_list_unit[$i]) && $kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo $kpi_list_target[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo '< '.round($kpi_list_target[$i]*0.69,2); } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.70,2)." to ".round($kpi_list_target[$i]*0.95,2); }?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*0.96,2)." to ".round($kpi_list_target[$i]*1.05,2); }?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.06,2)." to ".round($kpi_list_target[$i]*1.29,2); }?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($kpi_list_target[$i])) { echo round($kpi_list_target[$i]*1.39,2); }?></td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($KPI_target_value[$i])) { echo $KPI_target_value[$i]; } ?></td>
                                                                                <td style="border: 1px solid black;font-size: 5px;"></td>
                                                                                <?php
                                                                                if(isset($kpi_list_target[$i]))
                                                                                {
                                                                                    $value_data = explode('-', $kpi_list_target[$i]);
                                                                                }
                                                                                
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td style="border: 1px solid black;font-size: 5px;"><?php if(isset($value_data[$j])) { echo $value_data[$j]; } ?></td>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                   ?>
                                                                                   <td style="border: 1px solid black;font-size: 5px;"><?php echo ""; ?></td>
                                                                                   <?php 
                                                                                }
                                                                    }
                                                                        ?>
                                                                        <?php
                                                                            }
                                                                        ?>

                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>                              
                                                    </tbody>
                                                                                              
                                                </table>   
                                               </div>                                           
                                            </div>
                                        </div>
                                         <?php 
                                        $cnt_num++; } }
                                        ?>
                                        </div>
                                        </body>
                                       
                                       </html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <title></title>
  <meta name="generator" content="LibreOffice 5.0.2.2 (Linux)"/>
  <meta name="author" content="Charles Carvalho"/>
  <meta name="created" content="2016-04-26T10:03:00"/>
  <meta name="changedby" content="Charles Carvalho"/>
  <meta name="changed" content="2016-05-17T10:25:00"/>
  <meta name="AppVersion" content="14.0000"/>
  <meta name="DocSecurity" content="0"/>
  <meta name="HyperlinksChanged" content="false"/>
  <meta name="LinksUpToDate" content="false"/>
  <meta name="ScaleCrop" content="false"/>
  <meta name="ShareDoc" content="false"/>
  <style type="text/css">
    @page { margin-left: 1.27cm; margin-right: 1.27cm; margin-top: 1.25cm; margin-bottom: 1.27cm }
    p { margin-bottom: 0.25cm; direction: ltr; line-height: 120%; text-align: left; orphans: 2; widows: 2 }
  </style>
</head>
<body lang="en-IN" dir="ltr">
<?php
$emp_id_goal1 = '';
if(isset($emp_data['0']['Employee_id']) && $emp_data['0']['Employee_id'] !='') 
{ 
$emp_id_goal1 = $emp_data['0']['Employee_id']; 
} 

      $model = new LoginForm; 
      $program_data =new ProgramDataForm;
      $employee = new EmployeeForm; 
      $IDPForm =new IDPForm;  
      $Compare_Designation =new CompareDesignationForm;   
      $where = 'where  goal_set_year =:goal_set_year';
                                    $list = array('goal_set_year');
                                    $data = array(Yii::app()->user->getState('financial_year_check'));
                                    $program_data_result = $program_data->get_kpi_data($where,$data,$list);
      //$program_data_result = $program_data->get_data();
    // print_r($program_data_result);die();
      //$Employee_id = Yii::app()->user->getState("Employee_id");
      $where = 'where Employee_id = :Employee_id';
      $list = array('Employee_id');
      $data = array(Yii::app()->user->getState("Employee_id"));
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
      $where = 'where Employee_id = :Employee_id and goal_set_year = :goal_set_year';
      $list = array('Employee_id','goal_set_year');
      $data = array(Yii::app()->user->getState("Employee_id"),Yii::app()->user->getState('financial_year_check'));
      $IDP_data = $IDPForm->get_idp_data($where,$data,$list);
      //print_r($IDP_data);die();
      //print_r(Yii::app()->user->getState('emp_id1'));die();
      $where = 'where Email_id = :Email_id';
      $list = array('Email_id');
      $data = array($emp_data['0']['Reporting_officer1_id']);
      $mgr_data = $employee->get_employee_data($where,$data,$list);
//print_r($emp_data);die();
   ?>
   <lable id='emp_id' style="display: none"><?php echo 'vvf57e264fd8d3ef'; ?></lable>
<div id="target_idp" >
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js
"></script>
<script type="text/javascript" src="libs/Blob.js/BlobBuilder.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>
<div>
    
  <label >Individual Development Plan (WI.CHR.03 F.NO. 1)</label>
</div><br>
<table cellpadding="3" cellspacing="0" >
<thead>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b> Employee Name </b></th>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b> Manager’s name </b></th>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b>Employee ID </b></th>
<th style="text-align:center;background-color: #4C87B9;font-size: 7px;border: 1px solid black;padding:10px"><b>Year </b></th>
</thead>
<tbody>
<tr>
<td style="border: 1px solid #00000a;">
 <?php 
                if(isset($emp_data)&& count($emp_data)>0){
                      echo $emp_data[0]['Emp_fname']." ".$emp_data[0]['Emp_lname'];
}?>
</td>
<td style="border: 1px solid #00000a;">
 <?php if(isset($mgr_data) && count($mgr_data)>0){
                     echo $mgr_data[0]['Emp_fname']." ".$mgr_data[0]['Emp_lname'];}
                ?>
</td>
<td style="border: 1px solid #00000a;">
<?php  if(isset($emp_data)&& count($emp_data)>0){
                   echo $emp_data[0]['Employee_id'];   }?> 
</td>
<td style="border: 1px solid #00000a;">
<?php 
                   $today = date('d-m-Y'); 
                 echo Yii::app()->user->getState('financial_year_check');?>
</td>
</tr>
</tbody>
  
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><span lang="en-US"><i><b>Please
discuss your strengths and work related weaknesses with your manager
and identify your training needs. Your development will happen
through the following ways:</b></i></span></font></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><span lang="en-US"><b>Part
A: Development through Instructor led training in Classroom</b></span></font></p>
<table cellpadding="3" cellspacing="0" >
  <col width="17">
  <col width="207">
  <col width="71">
  <col width="33">
  <col width="306">
  <tr>
    <td height="23" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">No</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b>Name of program</b>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b>Faculty</b>
    </td>
    <td  style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b><font face="Cambria, serif">Days</b>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <b>Please explain why the training is
      needed</b></td>
<!--<td width="50" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--<p><font face="Cambria, serif">Program completed</font></p></td><td width="100" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--<p><font face="Cambria, serif">Comments</font></p></td>-->
    </td>
  </tr>
  <?php 
     $compulsory = '';
    if (isset($program_data_result) && count($program_data_result)>0) {
        for ($i=0; $i < count($program_data_result); $i++) {                                            
            if (isset($program_data_result[$i]['need']) && $program_data_result[$i]['need'] == 1) {
                if ($compulsory == '') {
                   $compulsory = $i;
                }
                else
                {
                    $compulsory = $compulsory.';'.$i;
                }
            }

            ?>   
  <tr valign="top"> 
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php echo $i+1; ?> </td> 
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm" class="prog_name" id="nm<?php echo $i; ?>"> <?php if(isset($program_data_result[$i]['program_name'])) { echo $program_data_result[$i]['program_name']; } ?> <?php if($program_data_result[$i]['need'] == 1) { ?><label style="color: red">*</label><?php }else if($program_data_result[$i]['need'] == 2) { ?><label style="color: red">**</label><?php } ?>
            
            </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php if(isset($program_data_result[$i]['faculty_name'])) { echo $program_data_result[$i]['faculty_name']; } ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm"> <?php if(isset($program_data_result[$i]['training_days'])) { echo $program_data_result[$i]['training_days']; } ?> </td>
            <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
            <?php 
            $cmnt = '';$prg_state1 = '';$prg_state_com1 = '';
            if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['program_comment']) && isset($IDP_data['0']['Year_end_prg_status']) && isset($IDP_data['0']['Year_end_prg_comments'])) {
                $cmt2 = explode(';', $IDP_data['0']['program_comment']);
                $prg_state = explode('^', $IDP_data['0']['Year_end_prg_status']);
                $prg_state_com = explode('^', $IDP_data['0']['Year_end_prg_comments']);
                if(isset($cmt2) && count($cmt2)>0)
                {
                  for ($j=0; $j < count($cmt2); $j++) {
                        $cmt1 = explode('?', $cmt2[$j]);
                        if (isset($cmt1[1]) && isset($cmt1[0]) && $i == $cmt1[0]) {                                                            
                             $cmnt = $cmt1[1];
                             if(isset($prg_state[$j]))
                             {
                                $prg_state1 = $prg_state[$j];
                             }
                             if(isset($prg_state_com[$j]))
                             {
                                $prg_state_com1 = $prg_state_com[$j];
                             }                             
                             
                        }
                    }
                }
                
            }
            else
            {
                $cmnt = '';
            }

                echo $cmnt;
            ?> </td>
      </tr>
      <?php      

      } }
      //print_r("gfdgfd");die();
      ?>
</table>
<p style="margin-bottom: 0cm; line-height: 100%"><font face="Cambria, serif"><lable style="color: red">*</lable>Mandatory
for all employees to attend this program</font></p>
<p style="margin-bottom: 0cm; line-height: 100%"><font face="Cambria, serif"><lable style="color: red">**</lable>Mandatory
for employees working at locations covered by the certifications</font></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><br/>
</p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><i>If
you need a program that is not mentioned above, please use the space
below. Please note this program may be offered if at least 20 people
request for it. </i></font>
</p>
<table cellpadding="3" cellspacing="0">
  <tr valign="top">
    <td  style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>No</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Topics required</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>No. of Days</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Internal faculty name</b></font></p>
    </td>
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><font face="Cambria, serif"><b>Program Completed</b></font></p>-->
<!--    </td>-->
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><font face="Cambria, serif"><b>Reviews</b></font></p>-->
<!--    </td>-->
  </tr>
  <?php
    $topic = '';$day = '';$faculty = '';
       if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {
              $topic1 = explode(';',$IDP_data['0']['extra_topic']);
              if(isset($topic1[0]))
              {
                $topic = $topic1[0];
              }
              if(isset($IDP_data['0']['extra_days']))
              {
                $day1 = explode(';',$IDP_data['0']['extra_days']);
              }
              if(isset($IDP_data['0']['Extra_year_end_prg_status']))
              {
                $finaltopic = explode('^',$IDP_data['0']['Extra_year_end_prg_status']);
              }
              if(isset($IDP_data['0']['Extra_year_end_prg_comments']))
              {
                $finaltopic_cmt = explode('^',$IDP_data['0']['Extra_year_end_prg_comments']);
              }

if(isset($day1[0]))
{
$day = $day1[0];
}
if(isset($IDP_data['0']['extra_faculty']))
              {
                $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
              }
              
              
              // $faculty1 = explode('?',$faculty2[0]); 
if(isset($faculty2[0]))
{
$faculty[$faculty2[0]] = array('selected' => 'selected');
 $reporting_list = new EmployeeForm();
             $records = $reporting_list->get_appraiser_list1();
             
                $where = 'where Email_id = :Email_id';
                $list = array('Email_id');
                $data = array($faculty2[0]);
                $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
}                         
                          
             
             
       }
  ?>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">1</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php echo $topic; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php echo $day; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($faculty2[0])) { echo $faculty2[0]; } ?>
      </p>
    </td>
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><br/>-->
<!--      <?php if(isset($finaltopic[0])) { echo $finaltopic[0]; } ?>-->
<!--      </p>-->
<!--    </td>-->
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><br/>-->
<!--      <?php if(isset($finaltopic_cmt[0])) { echo $finaltopic_cmt[0]; } ?>-->
<!--      </p>-->
<!--    </td>-->
  </tr>
  <?php
    $topic = '';$day = '';$faculty = '';$finaltopic1 = '';$finaltopic_cmt1 = '';
    if (isset($IDP_data) && count($IDP_data)>0 && isset($IDP_data['0']['extra_topic'])) {

    if(isset($IDP_data['0']['extra_topic']))
              {
                $topic1 = explode(';',$IDP_data['0']['extra_topic']);
              }
              if(isset($IDP_data['0']['Extra_year_end_prg_status']))
              {
                $finaltopic = explode('^',$IDP_data['0']['Extra_year_end_prg_status']);
              }
              if(isset($IDP_data['0']['Extra_year_end_prg_comments']))
              {
                $finaltopic_cmt = explode('^',$IDP_data['0']['Extra_year_end_prg_comments']);
              }
//print_r($IDP_data);die();
        if (isset($topic1[1])) {
           $topic = $topic1[1];
            $day1 = explode(';',$IDP_data['0']['extra_days']);
if(isset($day1[1]))
{
$day = $day1[1];
}
            
            $faculty2 = explode(';',$IDP_data['0']['extra_faculty']);
            // $faculty1 = explode('?',$faculty2[0]);  
if(isset($faculty2[1]))
{
$faculty[$faculty2[1]] = array('selected' => 'selected');
 $reporting_list = new EmployeeForm();
             $records = $reporting_list->get_appraiser_list1();
             
                $where = 'where Email_id = :Email_id';
                $list = array('Email_id');
                $data = array($faculty2[1]);
                $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
}                         
            
        }
       
    }
  ?>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">2</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php echo $topic; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php echo $day; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($faculty2[1])) { echo $faculty2[1]; } ?>
      </p>
    </td>
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><br/>-->
<!--      <?php if(isset($finaltopic[1])) { echo $finaltopic[1]; } ?>-->
<!--      </p>-->
<!--    </td>-->
<!--<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">-->
<!--      <p><br/>-->
<!--      <?php if(isset($finaltopic_cmt[1])) { echo $finaltopic_cmt[1]; } ?>-->
<!--      </p>-->
<!--    </td>-->
  </tr>
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><i><u><b>Note:
Part B and Part C are to be filled by only AGM and above employees.</b></u></i></font></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><b>Part
B: Development through developmental relationships</b></font></p>
<table cellpadding="3" cellspacing="0">
  <?php
    $faculty3 = '';
        if (isset($IDP_data['0']['leader_name'])) {
                if(isset($IDP_data['0']['leader_name']))
              {
                $faclty = explode(';',$IDP_data['0']['leader_name']);
              }
              if(isset($IDP_data['0']['Relationship_year_end_status']))
              {
                $relfinaltopic = explode('^',$IDP_data['0']['Relationship_year_end_status']);
              }
              if(isset($IDP_data['0']['Relationship_year_end_comments']))
              {
                $relfinaltopic_cmt = explode('^',$IDP_data['0']['Relationship_year_end_comments']);
              }
          

          if (isset($faclty[0])) {
            $faculty3 = $faclty[0];
          }
          //$faculty3[$faclty[0]] = array('selected' => 'selected');
        }
  ?>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>No</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Relationship</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Name of leader</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Number of Meetings planned</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Target date</b></font></p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Program Completed</b></font></p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Reviews</b></font></p>
    </td>
  </tr>
  <tr valign="top">
    <td height="43" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">1</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Coaching</b></font><font face="Cambria, serif">
      through leader in own function for </font><font face="Cambria, serif"><b>functional</b></font><font face="Cambria, serif">
      inputs</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php echo $faculty3; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php
        $meet = '';
              if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                $meet = explode(';',$IDP_data['0']['meeting_planned']);
                if(isset($meet[0]))
{
$meet = $meet[0];
}
                
              }
              else
              {
                $meet = '';
              }
      ?>
      <?php echo $meet; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                     <?php if(isset($rel2[0])) { echo $rel2[0]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($relfinaltopic[0])) { echo $relfinaltopic[0]; } ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($relfinaltopic_cmt[0])) { echo $relfinaltopic_cmt[0]; } ?>
      </p>
    </td>
  </tr>
  <?php 
    $faculty4 = '';
    if (isset($IDP_data['0']['leader_name'])) {
      $faclty = explode(';',$IDP_data['0']['leader_name']);
      if (isset($faclty[1])) {
        $faculty4 = $faclty[1];
      }
    }
    ?>
  <tr valign="top">
    <td height="42" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif">2</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Coaching</b></font><font face="Cambria, serif">
      through leader in own function for </font><font face="Cambria, serif"><b>functional</b></font><font face="Cambria, serif">
      inputs</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php echo $faculty4; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php
        $meet = '';
              if (isset($IDP_data['0']['meeting_planned']) && $IDP_data['0']['meeting_planned']!='') {
                $meet = explode(';',$IDP_data['0']['meeting_planned']);
                if(isset($meet[1]))
{
$meet = $meet[1];
}
              }
              else
              {
                $meet = '';
              }
      ?>
      <?php echo $meet; ?>
      </p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        
        <?php
                if (isset($IDP_data['0']['rel_target_date'])) { $rel2 = explode(';',$IDP_data['0']['rel_target_date']); ?>
                     <?php if(isset($rel2[1])) { echo $rel2[1]; } ?>
                 <?php }
                  else
                  { ?>
                     <?php echo ''; ?>
               <?php   }
              ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($relfinaltopic[1])) { echo $relfinaltopic[1]; } ?>
      </p>
    </td>
<td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php if(isset($relfinaltopic_cmt[1])) { echo $relfinaltopic_cmt[1]; } ?>
      </p>
    </td>
  </tr>

</table>
 <?php 
 $project_title = '';
    if (isset($IDP_data['0']['project_title'])) {
      $project_title = $IDP_data['0']['project_title'];
    }
    else
    {
      $project_title = '';
    }
    ?>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font face="Cambria, serif"><b>Part
C: Development through action learning projects</b></font></p>
<table cellpadding="3" cellspacing="0">
    <td height="42" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Title</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
      <?php echo $project_title; ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td height="14" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Review date</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php
                  if (isset($IDP_data['0']['project_review_date'])) { ?>
                      <?php echo $IDP_data['0']['project_review_date']; ?>
                   <?php }
                    else
                    { ?>
                       <?php echo ""; ?>
                 <?php   }
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Target end date</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
         <?php
                  if (isset($IDP_data['0']['project_end_date'])) { ?>
                      <?php echo $IDP_data['0']['project_end_date']; ?>
                   <?php }
                    else
                    { ?>
                       <?php echo ""; ?>
                 <?php   }
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project scope</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
         <?php 
                  $project_scope = '';
                  if (isset($IDP_data['0']['project_scope'])) {
                    $project_scope = $IDP_data['0']['project_scope'];
                  }
                  else
                  {
                    $project_scope = '';
                  }
                  echo $project_scope;
                  ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td height="47" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project exclusions</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $project_exclusion = '';
                if (isset($IDP_data['0']['project_exclusion'])) {
                  $project_exclusion = $IDP_data['0']['project_exclusion'];
                }
                else
                {
                  $project_exclusion = '';
                }
                 echo $project_exclusion;
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project deliverables </b></font><font face="Cambria, serif">(Target
      at rating 3: good solid performance)</font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                 $Project_deliverables = '';
                if (isset($IDP_data['0']['Project_deliverables'])) {
                  $Project_deliverables = $IDP_data['0']['Project_deliverables'];
                }
                else
                {
                  $Project_deliverables = '';
                }
                echo $Project_deliverables;
                ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>What is the employee expected to
      learn from this project</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
               $expected = '';
                if (isset($IDP_data['0']['learn_from_project'])) {
                  $expected = $IDP_data['0']['learn_from_project'];
                }
                else
                {
                  $expected = '';
                }
                echo $expected;
            ?>
      </p>
    </td>
  </tr>
  <tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Reviewer(s) name</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><br/>
        <?php 
                $review_name = '';
                if (isset($IDP_data['0']['Reviewer'])) {
                  $review_name = $IDP_data['0']['Reviewer'];
                }
                else
                {
                  $review_name = '';
                }
                echo $review_name;
                ?>
      </p>
    </td>
  </tr>
<tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Status
</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><?php if (isset($IDP_data['0']['Year_end_prog_status'])) { echo $IDP_data['0']['Year_end_prog_status']; } ?></p>
    </td>
  </tr>
<tr valign="top">
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cmda; padding-right: 0.19cm">
      <p><font face="Cambria, serif"><b>Project Status Comments</b></font></p>
    </td>
    <td style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
      <p><?php if (isset($IDP_data['0']['Year_end_prog_comments'])) { echo $IDP_data['0']['Year_end_prog_comments']; } ?></p>
    </td>
  </tr>
</table>
<p style="margin-bottom: 0.35cm; line-height: 115%"><br/>
<br/>

</p>
</div>




                                       </body>
                                       
                                       </html>


 