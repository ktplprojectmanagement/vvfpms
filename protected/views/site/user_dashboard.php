<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.dataTables_empty{
    colspan=3;
}
.time-frame {
width: 300px;
font-family: Arial;
}

.time-frame >div {
width: 100%;
text-align: center;
}

.dt-buttons{
    display:none;
}
.btn-success
{
    background-color: #6da333;
border-color: #6da333;
}
.btn-success:hover
{
    background-color: #6da333;
border-color: #6da333;
}
.caption{
    font-weight: bold;
}
</style>


<style type="text/css">
#sample_editable_1_length
{
display:none;
}
.stepwizard-step p {
    margin-top: 10px;    
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;     
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
    
}

.stepwizard-step {    
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}

/*#sample_1_info
{
display : none;
}*/
#sample_1_length
{
display : none;
}
.dataTables_empty{
  display: none;
}
</style>

<?php
  if(isset($team) && count($team)>0){
    $team_count=count($team);
  }
  else{
    $team_count=0;
  }
  if(isset($emp_sub) && count($emp_sub)>0){
    $is_emp=count($emp_sub);

  }
  else{
    $is_emp=0;
  }
  if(isset($is_my_gaol_pending) && count($is_my_gaol_pending)>0){
    $is_goal_pend=count($is_my_gaol_pending);
  }
  else{
    $is_goal_pend=0;
  }
 // print_r($is_goal_pend);die();
  if(isset($emp_sub_idp) && count($emp_sub_idp)>0){
    $is_emp_idp=count($emp_sub_idp);
    $emp_idp_status=$emp_sub_idp['0']['set_status'];
   // echo $emp_idp_status;die();
  }
  else{
    $is_emp_idp=0;
    $emp_idp_status='';
  }
  if(isset($mid_flag)&& count($mid_flag)>0){
    $mid_flag_val=$mid_flag;
  }
  else{
    $mid_flag_val=0;
  }
  if(isset($mid_idp_stat) && count($mid_idp_stat)>0){
    $mid_idp=1;
  }
  else{
    $mid_idp=0;
  }
if(isset($yearEnd_idp_stat) && count($yearEnd_idp_stat)>0){
    $yearEndIdpFlg=1;
   // echo $yearEndIdpFlg;die();
  }
  else{
    $yearEndIdpFlg=0;
    //echo $yearEndIdpFlg;die();
  }
  if(isset($yearEndStat) && count($yearEndStat)>0){
    $yearEndstats=1;

  }
  else{
    $yearEndstats=0;
  }

?>
<label id="emp_status" style="display:none;"><?php echo $emp_idp_status; ?></label>
<script type="text/javascript">
$(document).ready(function(){
 
 var team= <?php echo $team_count;?>;
 var emp_sub=<?php echo $is_emp;?>;
 var is_my_goal_pend=<?php echo $is_goal_pend;?>;
 var is_idp_set=<?php echo $is_emp_idp ?>;
 var emp_status=$("#emp_status").text();
 var mid_flg=<?php echo $mid_flag_val; ?>;
 var mid_idp_stat=<?php echo $mid_idp;?>;
var yearEndIDPStat=<?php echo $yearEndIdpFlg; ?>;
 var yearEndstats=<?php echo $yearEndstats;?>;
 // var emp_status=
// alert(mid_flg);
if(emp_sub==0){
  $("#my_set").css("display", "none");
}
else{
  $("#goal_pending").css("display", "none");
}

if(is_idp_set==0){
 
   $("#my_idp").css("display","none");

}
else{
   $("#idp_pending").css("display","none");
}
 //$("#goal_appr").removeClass("fa-check");
 //$("#goal_appr").removeClass("fa-times");
//$("#idp_appr").removeClass("fa-check");
 //$("#idp_appr").removeClass("fa-times");


if(is_my_goal_pend==0){
 $("#goal_appr").text("Approved");
  //$("#goal_appr").removeClass("fa-times");
  //$("#goal_appr").addClass("fa-check");
$("#goal_appr").css("color","green");
  
}
else{
$("#goal_appr").text("Pending");
  //$("#goal_appr").removeClass("fa-check");
  //$("#goal_appr").addClass("fa-times");
  $("#goal_appr").css("color","#cd686b");
}

if(emp_status=='Pending'){
$("#idp_appr").text("Pending");
 //$("#idp_appr").removeClass("fa-check");
  //$("#idp_appr").addClass("fa-times");
  $("#idp_appr").css("color","#cd686b");

}
else{
$("#idp_appr").text("Approved");
$("#idp_appr").css("color","green");
  //$("#idp_appr").removeClass("fa-times");
  //$("#idp_appr").addClass("fa-check");
}

if(mid_flg==0){
  
//$("#mid_appr").removeClass("fa-check");
$("#mid_appr").text("Not Completed");
  //$("#mid_appr").addClass("fa-times");
 $("#mid_appr").css("color","#cd686b");
  
}
else{
$("#mid_appr").text("Completed");
$("#mid_appr").css("color","green");
  //$("#mid_appr").removeClass("fa-times");
  //$("#mid_appr").addClass("fa-check");
}
if(mid_idp_stat==0){
$("#mid_idp_appr").text("Not Completed");
  //$("#mid_idp_appr").removeClass("fa-check");
  //$("#mid_idp_appr").addClass("fa-times");
  $("#mid_idp_appr").css("color","#cd686b");
}
else{
$("#mid_idp_appr").text("Completed");
$("#mid_idp_appr").css("color","green");
 // $("#mid_idp_appr").removeClass("fa-times");
 // $("#mid_idp_appr").addClass("fa-check");
}
if(yearEndIDPStat==0){
  $("#yearEndIdp_appr").text("Not Completed");
  $("#yearEndIdp_appr").css("color","#cd686b");
}
else{
  $("#yearEndIdp_appr").text("Completed");
  $("#yearEndIdp_appr").css("color","green");
}
//alert(yearEndstats);
if(yearEndstats==0){
    $("#yearEnd_appr").text("Not Completed");
    $("#yearEnd_appr").css("color","#cd686b");
}
else{
   $("#yearEnd_appr").text("Completed");
   $("#yearEnd_appr").css("color","green");
}
 if(team==0){
   $("#team_set").css("display", "none");
   $("#team_mid").css("display", "none");  
   $("#team_yearA").css("display", "none");
   $("#team_yearB").css("display", "none");  
   $("#team_idp").css("display","none");
   $("#team_mid_idp").css("display","none");
   $("#team_yearEnd").css("display","none");
   $("#team_yearEndIDP").css("display","none");
  
 }

    var date1 = document.getElementById('set-date');
    var goal_date = $("#set-date").val();
    var date2 = document.getElementById('mid-date');
    var mid_date = date2.getAttribute('value');
    var date = new Date();
    date.setDate(date.getDate()-1);
    var today = new Date();
    var date3 = document.getElementById('yearb-dt');
    var yearb_date = date3.getAttribute('value');


    $("#set-date").removeClass("fa fa-check");
    $("#mid_date").removeClass("fa fa-check");
    $("#yearb-dt").removeClass("fa fa-check");
    $("#set-date").removeClass("btn-primary");
    $("#mid_date").removeClass("btn-primary");
    $("#yearb-dt").removeClass("btn-primary");
    $("#set-date").removeClass("btn-success");
    $("#set-date").text("1");
    $("#mid-date").removeClass("btn-success");
    $("#mid-date").text("2");
    $("#yearb-dt").removeClass("btn-success");
    $("#yearb-dt").text("3");
 
//alert(date);
//alert((goal_date));
//  alert(yearb-dt);
if(goal_date=='' ){
     $(".stepwizard").css("display","none"); 
     $("#my_mid").css("display","none"); 
     $("#team_mid").css("display","none"); 
     $("#my_set").css("display","none"); 
     $("#team_set").css("display","none"); 

}

else if(date<=process(goal_date)||(goal_date!='' && mid_date=='' && yearb_date=='')){
  
  $("#set-date").addClass("btn-primary");
  $("#my_mid").css("display","none"); 
  $("#team_mid").css("display","none");
  $("#team_mid_idp").css("display","none");
  $("#my_mid").css("display","none");
  $("#my_mid_idp").css("display","none");
 $('#my_yearEnd').css("display","none");
  $('#my_yearEndIdp').css("display","none");

}
else if(date<=process(mid_date)||(goal_date!='' && mid_date!='' && yearb_date=='')){
    //alert("hi");
     $("#mid-date").addClass("btn-primary");
     $("#set-date").text(""); 
     $("#set-date").addClass("fa fa-check");
     $("#set-date").addClass("btn-success");
     $("#my_set").css("display","none");
     $("#my_idp").css("display","none");
 $('#my_yearEnd').css("display","none");
     $('#my_yearEndIdp').css("display","none");
    
}
else if(date<=process(yearb_date))
{
  $("#yearb-dt").addClass("btn-primary"); 
     $("#mid-date").text("");  
     $("#mid-date").addClass("fa fa-check");
     $("#mid-date").addClass("btn-success");
     $("#set-date").text(""); 
     $("#set-date").addClass("fa fa-check");
     $("#set-date").addClass("btn-success");
     $("#my_set").css("display","none");
     $("#my_idp").css("display","none");
     $("#my_mid").css("display","none");
    $("#my_mid_idp").css("display","none");
}
else if(date>process(yearb_date)){
      $("#yearb-dt").text("");  
     $("#yearb-dt").addClass("fa fa-check");
     $("#yearb-dt").addClass("btn-success");
     $("#mid-date").text("");  
     $("#mid-date").addClass("fa fa-check");
     $("#mid-date").addClass("btn-success");
     $("#set-date").text(""); 
     $("#set-date").addClass("fa fa-check");
     $("#set-date").addClass("btn-success");
     $("#my_set").css("display","none");
     $("#my_idp").css("display","none");
$("#my_mid").css("display","none");
    $("#my_mid_idp").css("display","none");
}

    });

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
convert("Thu Jun 09 2011 00:00:00 GMT+0530 (India Standard Time)");
</script>
<script type="text/javascript">
        $(function(){
         $(".chk_team_setgol_status").click(function(){
            var id = $(this).attr('id');
            //alert(id);
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php?r=User_dashboard/teamSetgoalstatus',
            success : function(data)
            {
                //alert(data);
                var table = $('#sample_editable_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                $("#responsive1").modal('show'); 
                $('#sample_editable_1').DataTable();
               
            }
          });
         });


         $(".chk_team_idp_status").click(function(){
            var id = $(this).attr('id');
            //alert(id);
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php?r=User_dashboard/teamIdpstatus',
            success : function(data)
            {
               // alert(data);
                var table = $('#sample_editable_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive1").modal('show'); 
                $('#sample_editable_1').DataTable();
               
            }
          });
         });



          $(".chkteam_mid_stat").click(function(){
            var id = $(this).attr('id');
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php?r=User_dashboard/teamMidstatusget',
            success : function(data)
            {
                //alert(data);
                var table = $('#sample_editable_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive1").modal('show'); 
                $('#sample_editable_1').DataTable();
               
            }
          });
         });

      $("body").on('click','.get_list_data',function(){         
var data = {
                'emp_id' : $(this).prev('input').val(),
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php/Setgoals/emp_kpi_edit',
            success : function(data)
            {
                var base_url = window.location.origin;
                window.location.assign(base_url+$("#basepath").attr('value')+'/index.php/Setgoals/emp_kpi_edit');
            }
          });
         //$("#contact-form").submit();
        });

       $("body").on('click','.get_list_data1',function(){
var data = {
                'emp_id' : $(this).prev('input').val(),
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php/IDP/subordinate_idp',
            success : function(data)
            {
                var base_url = window.location.origin;
                window.location.assign(base_url+$("#basepath").attr('value')+'/index.php/IDP/subordinate_idp');
            }
          });        
        });

$("body").on('click','.get_list_data2',function(){
var data = {
                'emp_id' : $(this).prev('input').val(),
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php/Midreview/midreview_emp_data',
            success : function(data)
            {
                var base_url = window.location.origin;
                window.location.assign(base_url+$("#basepath").attr('value')+'/index.php/Midreview/midreview_emp_data');
            }
          });   
        
        });

$("body").on('click','.get_list_data3',function(){
var data = {
                'emp_id' : $(this).prev('input').val(),
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php/IDP/Midyear_subordinate_idp',
            success : function(data)
            {
                var base_url = window.location.origin;
                window.location.assign(base_url+$("#basepath").attr('value')+'/index.php/IDP/Midyear_subordinate_idp');
            }
          });  
         
        });

        $(".chkteam_mididp_stat").click(function(){
            var id = $(this).attr('id');
            //alert(id);  
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php?r=User_dashboard/teamMidIdpstatusget',
            success : function(data)
            {
                //alert(data);
                var table = $('#sample_editable_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive1").modal('show'); 
                $('#sample_editable_1').DataTable();
               
            }
          });
         });

 $(".chk_team_yearEnd_status").click(function(){
            var id = $(this).attr('id');
            //alert(id);
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php/User_dashboard/TeamYearEndstatus',
            success : function(data)
            {
                //alert(data);
                var table = $('#sample_editable_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive1").modal('show'); 
                $('#sample_editable_1').DataTable();
               
            }
          });
         });


          $(".chk_team_yearEndIDP_status").click(function(){
            var id = $(this).attr('id');
            //alert(id);
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+$("#basepath").attr('value')+'/index.php/User_dashboard/TeamYearEndsIDPtatus',
            success : function(data)
            {
             // alert(data);
                var table = $('#sample_editable_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive1").modal('show'); 
                $('#sample_editable_1').DataTable();
               
            }
          });
         });
      
    });
</script>

<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
  
<div class="container-fluid">
    <div class="page-container">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container">
                    <div class="portlet-body"  style="min-height: 300px;">
                        
                    <div class="profile">
                        <div class="portlet box red" style="border:1px solid #4C87B9;" >
                            <div class="portlet-title" style="background-color: #4C87B9;">
                                <div class="caption" ></i>Employee Dashboard </div>
                                <div class="tools"><a href="javascript:;" class="collapse"> </a></div>
                            </div>
                            <div class="portlet-body tabs-below">
                                <div class="tab-content" >
                                 <div class="row">
                                        <div class="col-md-12">
                                 <div id="progress_bar" >   
                                  
                                  <div class="stepwizard">
                            <div class="stepwizard-row">
                                <div class="stepwizard-step">

                                    <?php
                                    $new_date = '';$new_date1 = '';$new_date2 = '';
                                    if (isset($set_dates) && count($set_dates)>0){
                                        for($i=0;$i<count($set_dates);$i++)
                                        {
                                            if($set_dates[$i]['setting_content']=='goal_sub_date'  ) {
                                                $originalDate = $set_dates[$i]['setting_type'];
                                                $time_epoch = strtotime($originalDate); //Converts the string into an epoch time
                                                $new_date = date('d/m/Y', $time_epoch); //Creates a new string
                                                //echo $new_date;
                                            }  
                                            if($set_dates[$i]['setting_content']=='mid_goal_set_tab_active-date') {
                                                $originalDate = $set_dates[$i]['setting_type'];
                                                $time_epoch = strtotime($originalDate); //Converts the string into an epoch time
                                                $new_date1= date('d/m/Y', $time_epoch); //Creates a new string
                                                //echo $new_date1;
                                            } 
                                            if($set_dates[$i]['setting_content']=='final_goal_set_tab_active-date') {
                                                $originalDate = $set_dates[$i]['setting_type'];
                                                $time_epoch = strtotime($originalDate); //Converts the string into an epoch time
                                                $new_date2= date('d/m/Y', $time_epoch); //Creates a new string
                                                
                                            }                                       
                                            
                                        }                                     

                                    }
                                    
                                    
                                    ?>
                                   <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Setgoals"> <button type="button" value="<?php echo $new_date;?>" id="set-date" class="btn btn-default  btn-circle" name="<?php echo $new_date; ?>">1</button></a>
                                    <p>Set Goal<?php $date = str_replace('/', '-',$new_date); echo ' ('.date('d-M-Y',strtotime($date)).')'; ?></p>
                                </div>
                      
                                <div class="stepwizard-step">

                                   <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Midreview/setbyemployee"> <button type="button" value="<?php echo $new_date1;?>" id="mid-date" class="btn btn-default btn-circle" >2</button></a>
                                    <p>Mid Year Review<?php $date = str_replace('/', '-',$new_date1); echo ' ('.date('d-M-Y',strtotime($date)).')'; ?></p>
                                </div> 
           
                                
                                 <div class="stepwizard-step">
                                    
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Year_endreview">  <button type="button" id="yearb-dt" value="<?php echo $new_date2;?>"class="btn btn-default btn-circle">3</button></a>
                                    <p>Year End Review <?php $date = str_replace('/', '-',$new_date2); echo ' ('.date('d-M-Y',strtotime($date)).')'; ?></p>
                                 </div> 
       



                                 
                            </div>
                        </div>
                    </div>                        
                 
<!--Pending-->
<?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                                    'id'=>'contact-form',
                                                                    'enableClientValidation'=>true,
                                                                    //'action' => array('/index.php/Setgoals/emp_kpi_edit'),
                                                                ));
            
                                                                 
echo CHtml::textField('emp_id','',array('style'=>'display:none','id'=>'chng_emp_id'));
                                                                  
?>
<div id="responsive1" style="top: 20%;"  class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
        <div class="modal-body">
            
            <table  class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_editable_1">
        <thead>
            <tr>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                    
            </tr>
        </thead>

        <tbody id="dept_based_emp">

          </tbody>
<?php 
                                        $this->endWidget(); 
                                        ?> 
    </table>

        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
            
        </div>
    </div>
                    <div style="color:#bf4040;font-size:20px;font-weight:bold;padding:23px" >
<div id="goal_pending" class="blink_me col-md-6">Your Goal Sheet And IDP is pending </div>
                         <div id="idp_pending" style="padding-bottom:10px;display:none" class="blink_me col-md-6">Your IDP is pending</div>
                         
                    </div>
<!--Pending-->
<!--My Goalsheet status-->
<div   style="background-color:#fff;">
    <div class="portlet-title col-md-6" id="my_set" >
        <div class="caption " style="">
            <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-user" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;My Goalsheet and IDP</span>
        </div>
  

<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " >
              <div class="col-lg-12" style="font-weight:bold; padding-top:10px;padding-left:0px;padding-right:0px;padding-bottom: 15px;"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals">Goalsheet approval status : </a>&nbsp;&nbsp;
                <!--<i class="widget-thumb-icon  fa fa-check" style="font-size:20px;color:#6da333" id="goal_appr"></i>--><lable id="goal_appr"></lable>
              </div>  
            </div>
          </div> </div> 
<!--My Goalsheet status-->

<!--My IDP status-->
<div class="portlet-title col-md-6" id="my_idp"  style="display:none">
  <div class="caption " style="">
      <i class="icon-cursor font-dark hide"></i>
      <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-user" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp; My IDP</span>
  </div>
  


<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " >
              <div class="col-md-12" style="font-weight:bold; padding-top:10px;padding-bottom:40px;"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=IDP">Idp approval Status</a>&nbsp;&nbsp;
                <!--<i class="widget-thumb-icon  fa fa-check" style="font-size:20px;color:#6da333" id="idp_appr"></i>--> <lable id="idp_appr"></lable>
              </div>  
            </div>
          </div> </div> </div>
<!--My Idp status-->

<!--MyMid year review status-->
<div   style="background-color:#fff;">
    <div class="portlet-title col-md-6" id="my_mid" style="padding-left:0;display:none;" >
        <div class="caption " style="">
            <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-user" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;My Mid Year Review</span>
        </div>
  

<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " >
              <div class="col-lg-12" style="font-weight:bold; padding-top:10px;padding-left:0px;padding-right:0px;margin-bottom:20px"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/setbyemployee">Mid year review status : </a>&nbsp;&nbsp;
                <!--<i class="widget-thumb-icon  fa fa-check" style="font-size:20px;color:#6da333" id="mid_appr"></i>--><lable id="mid_appr"></lable>
              </div>  
            </div>
          </div> </div> 

<!--MyMid year review status-->

<!--My Mid IDP status-->
<!-- My Year end IDp status-->
<div style="background-color:#fff;">
<div class="portlet-title col-md-6" id="my_yearEnd" style="display:none">
<div class="caption " style="">
<span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-user" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;My Year End Review and Idp:</span>
</div>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
<div class="col-lg-12" style="font-weight:bold; padding-top:10px;padding-left:0px;padding-right:0px;padding-bottom:20px"><a href="/index.php/Year_endreview/">Year End review and Idp status : </a>&nbsp;&nbsp;
<!--<i class="widget-thumb-icon  fa fa-check" style="font-size:20px;color:#6da333" id="mid_appr"></i>--><lable id="yearEnd_appr" ></lable>
</div>  
</div>
</div> 
</div>
<div style="background-color:#fff;">
<div class="portlet-title col-md-6" id="my_yearEndIdp" style="display:none">
<div class="caption " style="">
<span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-user" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;My Year End IDP :</span>
</div>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
<div class="col-lg-12" style="font-weight:bold; padding-top:10px;padding-left:0px;padding-right:0px"><a href="/index.php/Year_endreview/">Year End IDP status : </a>&nbsp;&nbsp;
<!--<i class="widget-thumb-icon  fa fa-check" style="font-size:20px;color:#6da333" id="mid_appr"></i>--><lable id="yearEndIdp_appr" ></lable>
</div>  
</div>
</div> 
</div>
<!--Begin my team members Setgoal-->
<div class="portlet-title col-md-6" id="my_mid_idp" style="padding-right:0;display:none;">
  <div class="caption " style="">
      <i class="icon-cursor font-dark hide"></i>
      <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-user" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;My Mid year IDP</span>
  </div>
  


<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " >
              <div class="col-md-12" style="font-weight:bold; padding-top:10px;"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=IDP/Midyear_subordinate_idp1">My mid year Idp status : </a>&nbsp;&nbsp;
                <!--<i class="widget-thumb-icon  fa fa-check" style="font-size:20px;color:#6da333" id="mid_idp_appr"></i>--> <lable id="mid_idp_appr"></lable>
              </div>  
            </div>
          </div> </div> </div>
<!--My Mid status-->
<!--Begin my team members Setgoal-->
<div  id="team_set" style="background-color:#fff;">
    <div class="portlet-title col-md-12">
        <div class="caption " style="">
        <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-users" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;Team members Goalsheet Details</span>
        </div>

    </div>
    <div class="" style="display:block ; ">
        <div class="row widget-row" id="Setgoal" >
            <div class="col-md-4" style="padding-top: 18px;padding-left:30px">
<!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($team_set) && count($team_set)>0){
                $kra_submitted=count($team_set);
                }
                else{
                $kra_submitted=0;
                }

                ?>

                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">

                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-green fa fa-check" style="font-size:40px"></i>
                            <div class="widget-thumb-body">

                                <span class="widget-thumb-subtitle chk_team_setgol_status" id="teamkra_Submitted"><a href="#">Total Submitted Goalsheets</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $kra_submitted?>"><?php echo $kra_submitted?></span>
                            </div>
                    </div>
                </div>
<!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4"  style="padding-top: 18px;">
<!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($team_pend_appr) && count($team_pend_appr)>0){
                $kra_pending=count($team_pend_appr);
                }
                else{
                $kra_pending=0;
                }
                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon  fa fa-times" style="font-size:40px;background-color:#cd686b"></i>
                            <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chk_team_setgol_status" id="teamkra_Pending"><a href="#">Total Goalsheets Pending For Approval</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $kra_pending;?>"><?php echo $kra_pending;?></span>
                            </div>
                    </div>
                </div>
<!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4"  style="padding-top: 18px;padding-right:30px">
<!-- BEGIN WIDGET THUMB -->
                <?php if(isset($team_kra_appr) && count($team_kra_appr)>0 ) {
                $kra_appr=count($team_kra_appr);
                }
                else{
                $kra_appr=0;
                }

                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chk_team_setgol_status" id="teamkra_Approved"><a href="#">Total Goalsheets Approved</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $kra_appr;?>"><?php echo $kra_appr;?></span>
                        </div>
                    </div>
                </div>
<!-- END WIDGET THUMB -->
            </div>

        </div>

    </div>
</div>
<!--End My Team members Setgoal-->


<!--Begin my team members Idp-->
<div  id="team_idp" style="background-color:#fff;display: none;">
    <div class="portlet-title col-md-12">
        <div class="caption " style="">
            <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-users" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;Team members IDP Details</span>
        </div>

    </div>
    <div class="" style="display:block ; ">
        <div class="row widget-row" id="teamSetgoal" >
            <div class="col-md-4" style="padding-top: 18px;padding-left:30px">
            <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($team_sub_idp) && count($team_sub_idp)>0){
                $idp_submitted=count($team_sub_idp);
                }
                else{
                $idp_submitted=0;
                }

                ?>

                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-green fa fa-check" style="font-size:40px"></i>
                        <div class="widget-thumb-body">

                            <span class="widget-thumb-subtitle chk_team_idp_status" id="teamkra_Submitted"><a href="#">Total Submitted IDP</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $idp_submitted?>"><?php echo $idp_submitted?></span>
                        </div>
                    </div>
                </div>
<!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4"  style="padding-top: 18px;">
<!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($team_idp_pending) && count($team_idp_pending)>0){
                $idp_pending=count($team_idp_pending);
                }
                else{
                $idp_pending=0;
                }


                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon  fa fa-times" style="font-size:40px;background-color:#cd686b"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chk_team_idp_status" id="teamidp_Pending"><a href="#">Total IDP Pending Approval</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $idp_pending;?>"><?php echo $idp_pending;?></span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4"  style="padding-top: 18px;padding-right:30px">
<!-- BEGIN WIDGET THUMB -->
            <?php if(isset($team_idp_aprroved) && count($team_idp_aprroved)>0 ) {
            $idp_appr=count($team_idp_aprroved);
            // echo $idp_appr;die();
            }
            else{
            $idp_appr=0;
            }
            ?>
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                <div class="widget-thumb-body">
                <span class="widget-thumb-subtitle chk_team_idp_status" id="teamid_Approved"><a href="#">Total IDP Approved</a></span>
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $idp_appr;?>"><?php echo $idp_appr;?></span>
            </div>
        </div>
    </div>
<!-- END WIDGET THUMB -->
</div>

</div>

</div>
    </div>
<!--End My Team members Idp-->


<!--Begin my team members Idp-->
<div  id="team_mid" style="background-color:#fff;display: none;">
    <div class="portlet-title col-md-12">
  <div class="caption " style="">
      <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-users" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;My Team Mid Year Review Status</span>
  </div>
  
</div>
    <div class="" style="display:block ; ">
       <div class="row widget-row" id="teamSetgoal" >
        <div class="col-md-4" style="padding-top: 18px;padding-left:30px">
            <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($mid_kra_team_sub) && count($mid_kra_team_sub)>0){
                    $mid_appr=count($mid_kra_team_sub);
                }
                else{
                    $mid_appr=0;
                }


                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chkteam_mid_stat" id="taemmid_Submitted"><a href="#">Total Midyear Review Completed</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $mid_appr;?>"><?php echo $mid_appr;?></span>
                        </div>
                    </div>
                </div>  
                    <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4" style="padding-top: 18px;">
                    <!-- BEGIN WIDGET THUMB -->
                    <?php
                    if (isset($mid_team_not_sub) && count($mid_team_not_sub)>0){
                        $mid_pending=count($mid_team_not_sub);
                    }
                    else{
                        $mid_pending=0;
                    }


                    ?>
                  <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon  fa fa-times" style="font-size:40px;background-color:#cd686b;"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle chkteam_mid_stat" id="taemmid_Pending"><a href="#">Total Midyear Review Not Completed</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $mid_pending;?>"><?php echo $mid_pending;?></span>
                            </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            
      
        </div>
              
        </div>
    </div>
        </div>
<!--End My Team members Idp-->


<!--Begin my team members Idp-->
<div  id="team_mid_idp" style="background-color:#fff;display: none;">
    <div class="portlet-title col-md-12">
  <div class="caption " style="">
     <span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-users" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;My Team Mid Year IDP Status</span>
  </div>
  
</div>
    <div class="" style="display:block ; ">
       <div class="row widget-row" id="teamSetgoal" >
        <div class="col-md-4"  style="padding-top: 18px;padding-left:30px">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($team_sub_mididp) && count($team_sub_mididp)>0){
                    $midIdp_appr=count($team_sub_mididp);
                   
                }
                else{
                    $midIdp_appr=0;
                }


                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chkteam_mididp_stat" id="taemmidIdp_Submitted"><a href="#">Total Midyear IDP Completed</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $midIdp_appr;?>"><?php echo $midIdp_appr;?></span>
                        </div>
                    </div>
                </div>  
                    <!-- END WIDGET THUMB -->

            </div>
             <div class="col-md-4" style="padding-top: 18px;">
                    <!-- BEGIN WIDGET THUMB -->
                    <?php
                    if (isset($team_notsub_mididp) && count($team_notsub_mididp)>0){
                        $mid_idp_notsub=count($team_notsub_mididp);
                    }
                    else{
                        $mid_idp_notsub=0;
                    }


                    ?>
                  <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;height:126px;">
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon  fa fa-times" style="font-size:40px;background-color:#cd686b;"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle chkteam_mididp_stat" id="taemmidIdp_Pending"><a href="#">Total Midyear IDP Not Completed</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $mid_idp_notsub;?>"><?php echo $mid_idp_notsub;?></span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
              </div>

              
        </div> </div> </div>
<!--Begin my team members year end-->
<div  id="team_yearEnd" style="background-color:#fff;display:none">
<div class="portlet-title col-md-12">
<div class="caption " style="">
<span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-users" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;Team members Year End Review And Idp Details</span>
</div>
</div>
<div class="" style="display:block ; ">
<div class="row widget-row" id="teamYearEnd" >
<div class="col-md-4" style="padding-top: 18px;padding-left: 30px;">
<!-- BEGIN WIDGET THUMB -->
<?php
if (isset($team_sub_yearEnd) && count($team_sub_yearEnd)>0){
$yearEnd_submitted=count($team_sub_yearEnd);
}
else{
$yearEnd_submitted=0;
}
?>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;">
<div class="widget-thumb-wrap">
<i class="widget-thumb-icon bg-green fa fa-check" style="font-size:40px"></i>
<div class="widget-thumb-body">

<span class="widget-thumb-subtitle chk_team_yearEnd_status" id="teamYearEnd_Submitted"><a href="#">Total Submitted Year End Review and idp</a></span>
<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yearEnd_submitted?>"><?php echo $yearEnd_submitted?></span>
</div>
</div>
</div>
<!-- END WIDGET THUMB -->
</div>
<div class="col-md-4"  style="padding-top: 18px;">
<!-- BEGIN WIDGET THUMB -->
<?php
if (isset($team_pendingAppr_yearEnd) && count($team_pendingAppr_yearEnd)>0){
$yearEnd_pending=count($team_pendingAppr_yearEnd);
}
else{
$yearEnd_pending=0;
}
?>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;">
<div class="widget-thumb-wrap">
<i class="widget-thumb-icon  fa fa-times" style="font-size:40px;background-color:#cd686b"></i>
<div class="widget-thumb-body">
<span class="widget-thumb-subtitle chk_team_yearEnd_status" id="teamYearEnd_Pending"><a href="#">Total Year End Review Pending Approval and idp</a></span>
<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yearEnd_pending;?>"><?php echo $yearEnd_pending;?></span>
</div>
</div>
</div>
<!-- END WIDGET THUMB -->
</div>
<div class="col-md-4"  style="padding-top: 18px;padding-right: 30px;">
<!-- BEGIN WIDGET THUMB -->
<?php if(isset($team_Approved_yearEnd) && count($team_Approved_yearEnd)>0 ) {
$yearEnd_appr=count($team_Approved_yearEnd);
// echo $idp_appr;die();
}
else{
$yearEnd_appr=0;
}
?>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;">
<div class="widget-thumb-wrap">
<i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
<div class="widget-thumb-body">
<span class="widget-thumb-subtitle chk_team_yearEnd_status" id="teamYearEnd_Approved"><a href="#">Total Year End Review Approved and idp</a></span>
<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yearEnd_appr;?>"><?php echo $yearEnd_appr;?></span>
</div>
</div>
</div>
<!-- END WIDGET THUMB -->
</div>

</div>
<!-- 'team_sub_yearEndIDP'=>$team_sub_yearEndIDP,
'team_pendingAppr_yearEndIDP'=>$team_pendingAppr_yearEndIDP,
'team_Approved_yearEndIDP'=>$team_Approved_yearEndIDP  -->
<!--Begin my team members year end-->
<div  id="team_yearEndIDP" style="background-color:#fff;display:none">
<div class="portlet-title col-md-12">
<div class="caption " style="">
<span class="caption-subject  bold uppercase col-md-12" style="font-size:23px;color:#fff;background-color:#4c9ed9"><i class="fa fa-users" aria-hidden="true" style="font-size:25px"></i>&nbsp;&nbsp;Team members Year End IDP Detail</span>
</div>
</div>
<div class="" style="display:block ; ">
<div class="row widget-row" id="teamYearEndIdp" >
<div class="col-md-4" style="padding-top: 18px;">
<!-- BEGIN WIDGET THUMB -->
<?php
if (isset($team_sub_yearEndIDP) && count($team_sub_yearEndIDP)>0){
$yearEndidp_submitted=count($team_sub_yearEndIDP);
}
else{
$yearEndidp_submitted=0;
}

?>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;">
<div class="widget-thumb-wrap">
<i class="widget-thumb-icon bg-green fa fa-check" style="font-size:40px"></i>
<div class="widget-thumb-body">
<span class="widget-thumb-subtitle chk_team_yearEndIDP_status" id="teamYearEndIDP_Submitted"><a href="#">Total Submitted Year End IDP</a></span>
<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yearEndidp_submitted?>"><?php echo $yearEndidp_submitted?></span>
</div>
</div>
</div>
<!-- END WIDGET THUMB -->
</div>
<div class="col-md-4"  style="padding-top: 18px;">
<!-- BEGIN WIDGET THUMB -->
<?php
if (isset($team_pendingAppr_yearEndIDP) && count($team_pendingAppr_yearEndIDP)>0){
$yearEndidp_pending=count($team_pendingAppr_yearEndIDP);
}
else{
$yearEndidp_pending=0;
}
?>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;">
<div class="widget-thumb-wrap">
<i class="widget-thumb-icon  fa fa-times" style="font-size:40px;background-color:#cd686b"></i>
<div class="widget-thumb-body">
<span class="widget-thumb-subtitle chk_team_yearEndIDP_status" id="teamYearEndIDP_Pending"><a href="#">Total Year End IDP Pending Approval</a></span>
<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yearEndidp_pending;?>"><?php echo $yearEndidp_pending;?></span>
</div>
</div>
</div>
<!-- END WIDGET THUMB -->
</div>
<div class="col-md-4"  style="padding-top: 18px;">
<!-- BEGIN WIDGET THUMB -->
<?php if(isset($team_Approved_yearEndIDP) && count($team_Approved_yearEndIDP)>0 ) {
$yearEndidp_appr=count($team_Approved_yearEndIDP);
//echo $yearEndidp_appr;die();
}
else{
$yearEndidp_appr=0;
}
?>
<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 " style="background-color: #efefef;">
<div class="widget-thumb-wrap">
<i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
<div class="widget-thumb-body">
<span class="widget-thumb-subtitle chk_team_yearEndIDP_status" id="teamYearEndIDP_Approved"><a href="#">Total Year End IDP Approved</a></span>
<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yearEndidp_appr;?>"><?php echo $yearEndidp_appr;?></span>
</div>
</div>
</div>
<!-- END WIDGET THUMB -->
</div>
</div>
</div>
 </div>
                <!-- END CONTENT BODY -->
            </div>


</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           




<!--     </div> -->
<!--End My Team members Idp-->
<!--recent activities-->
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
 
    <!-- stackable -->



                           
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>       
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/profile.min.js" type="text/javascript"></script>     
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>   

