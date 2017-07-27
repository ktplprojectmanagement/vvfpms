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

.dataTables_wrapper .dt-buttons {

  float:left; 
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
#sample_editable_1_length
{
  display: none;
}
.panel .panel-title > a:hover {
    text-decoration: none;
    color: white;
}
</style>


<style type="text/css">
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
.page-header-fixed .page-container{
margin-top:0px;
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

<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<style type="text/css">
.time-frame {
width: 300px;
font-family: Arial;
}

.time-frame > div {
width: 100%;
text-align: center;
}

.mt-element-list .list-todo.mt-list-container ul > .mt-list-item {
    padding: 3px;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
 
  
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
 
if(goal_date=='' ){
     // $(".stepwizard").css("display","none"); 
     // $("#set_goal").css("display","none"); 
     // $("#mid_review").css("display","none"); 
     // $("#set_idp_goal").css("display","none");
     // $("#mid_idp_review").css("display","none");
}

else if(date<=process(goal_date)||(goal_date!='' && mid_date=='' && yearb_date=='')){
  $("#set-date").addClass("btn-primary");
  $("#mid_review").css("display","none"); 
  $("#mid_idp_review").css("display","none");
    
     
}
else if(date<=process(mid_date)||(goal_date!='' && mid_date!='' && yearb_date=='')){
     $("#mid-date").addClass("btn-primary");
     $("#set-date").text(""); 
     $("#set-date").addClass("fa fa-check");
     $("#set-date").addClass("btn-success");
     
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



    <div class="page-content-wrapper" >
                
                <div class="page-content">
                    <?php
                    $tot_emp = '';
                    if (isset($employee_data1) && count($employee_data1)>0) {
                    $tot_emp =count($employee_data1);
                    }
                    else
                    {
                    $tot_emp = 1;
                    }
                    ?>
<script type="text/javascript">
 $(function(){
        $(".chk_user_status").click(function(){
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
            url : base_url+'/index.php?r=Admin_Dashboard/statusget',
            success : function(data)
            {
                
               //alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show'); 
                $('#sample_1').DataTable();
               
            }
          });
        });
    });

 $(function(){
        $(".chk_user_status1").click(function(){
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
            url : base_url+'/index.php?r=Admin_Dashboard/statusgetMid',
            success : function(data)
            { 
                //alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show');
                $('#sample_1').DataTable();
            }
          });
        });
    });
   $(function(){
        $(".chk_user_idp_status").click(function(){
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
            url : base_url+'/index.php?r=Admin_Dashboard/statusgetIdp',
            success : function(data)
            { 
              //  alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show');
                $('#sample_1').DataTable();
            }
          });
        });
    });
    $(function(){
        $(".chk_user_Mididp_status").click(function(){
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
            url : base_url+'/index.php?r=Admin_Dashboard/getMidIdpStat',
            success : function(data)
            { 
                //alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show');
                $('#sample_1').DataTable();
            }
          });
        });
    });


 $(function(){
        $(".chk_user_year_end_status").click(function(){
            var id = $(this).attr('id');
           // alert(id);
           var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/index.php/Admin_Dashboard/getYearEndStat',
            success : function(data)
            { 
               alert(data);
                var table = $('#sample_2').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive1").modal('show');
                $('#sample_2').DataTable();
            }
          });
        });
    });



 $(function(){
        $(".chk_user_year_end_statusMgr").click(function(){
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
            url : base_url+'/index.php/Admin_Dashboard/getYearEndStat',
            success : function(data)
            { 
               // alert(data);
                var table = $('#sample_2').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive1").modal('show');
                $('#sample_2').DataTable();
            }
          });
        });
    });


 </script>


                             <div class="portlet-body tabs-below" >
                                <div class="tab-content" >
                                 <div class="row">
                                        <div class="col-md-12">
                                 <div id="progress_bar" style="margin-top:56px" >   
                                  
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
                                    <button type="button" value="<?php echo $new_date;?>" id="set-date" class="btn btn-default  btn-circle" name="<?php echo $new_date; ?>">1</button>
                                    <p>Set Goal <?php echo "[".$new_date."]"; ?></p>
                                </div>
                      
                                <div class="stepwizard-step">

                                    <button type="button" value="<?php echo $new_date1;?>" id="mid-date" class="btn btn-default btn-circle" >2</button>
                                    <p>Mid Year Review<?php echo "[".$new_date1."]"; ?></p>
                                </div> 
           
                                
                                 <div class="stepwizard-step">
                                    
                                    <button type="button" id="yearb-dt" value="<?php echo $new_date2;?>"class="btn btn-default btn-circle">3</button>
                                    <p>Year End Review <?php echo "[".$new_date2."]"; ?></p>
                                 </div> 
       



                                 
                            </div>
                        </div>
                    </div>   </div>       
  </div>       
      
 
                    <div class="row" style="min-height:100%">
            <!--Employee's set goal status-->





                                <div class="col-md-12 col-sm-12" style="margin-top: 22px;z-index:1">
<!-- BEGIN ACCORDION PORTLET-->
                                        <div class="portlet box yellow" style="border:1px solid #031f4e;margin-left: 40px;margin-right: 43px;">
                                            <div class="portlet-title" style="height:56.4px;background-color:#031f4e">
                                                <div class="caption" style="font-size:24px;font-weight:unset;">
                                                    Status </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="panel-group accordion" id="accordion3">
                                                    <div class="panel panel-default" id="set_goal">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title" style="background-color:#005F68; color:#fff;font-weight:bold" >
                                                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"> GoalSheets Stats </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_1" class="panel-collapse in">
                                                            <div class="panel-body">
                                                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                   
                                                   <?php
                                                        $emp_not_sub=0;
                                                        if(isset($kpi_emp_not_sub)&& count($kpi_emp_not_sub)){
                                                          for($i=0;$i<count($kpi_emp_not_sub);$i++)
{
if(!(count($kpi_emp_not_sub[$i]) == 0))
{
$emp_not_sub++;
}
}
                                                        }
                                                        else{
                                                            $emp_not_sub=0;
                                                        }
                                                    ?>
                                                    <span style="color:red;font-size:45px;" data-counter="counterup" data-value="<?php echo $emp_not_sub;?>"><?php echo $emp_not_sub;?></span>
                                                   
                                                </h3>
                                                <small style="font-size:15px;font-weight: unset;" class="chk_user_status" id="kra_Pendingemp"><a style="color: red;" href="javascript:doSomething();">Goal Sheet Not Available</a></small>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef;">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <?php
                                                        $emp_appr_kra="0";
                                                        if(isset($kpi_appr_data)&& count($kpi_appr_data)){
                                                          for($i=0;$i<count($kpi_appr_data);$i++)
{
if(!(count($kpi_appr_data[$i]) == 0))
{
$emp_appr_kra++;
}
}
                                                        }
                                                        else{
                                                            $emp_appr_kra=0;
                                                        }

                                                    ?>
                                                    <span style="color:#6DA333;font-size:45px" data-counter="counterup" data-value='<?php echo $emp_appr_kra; ?>'><?php echo $emp_appr_kra; ?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px" id="kra_Approved" class="chk_user_status"><a style="color:#6DA333"href="javascript:doSomething();">Goal Sheet Approved</br></a></small>
                                            </div>
                                            <!-- <div class="icon">
                                                <i class="icon-basket"></i>
                                            </div> -->
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                    <span class="sr-only">56% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> grow </div>
                                                <div class="status-number" style="color: #686E72;"> 45% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                
                                </div>
                                
                                
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-blue-sharp">
                                                    <?php
                                                        $emp_pend_kra=0;
                                                        if(isset($kpi_pend)&& count($kpi_pend)){ 
                                                          for($i=0;$i<count($kpi_pend);$i++)
{
if($i == 0)
{
$emp_pend_kra++;
}
else if(!(count($kpi_pend[$i]) == 0))
{
$emp_pend_kra++;
}
}
                                                        }
                                                        else{
                                                            $emp_pend_kra=0;
                                                        }
                                                    ?>
                                                    <span style="color:#f36a5a; font-size:45px" data-counter="counterup" data-value="<?php echo $emp_pend_kra; ?>"><?php echo $emp_pend_kra; ?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72; font-size:15px" id="kra_Pending" class="chk_user_status"><a style="color:#f36a5a;" href="javascript:doSomething();">Goal Sheet Pending Approval</a></small>
                                            </div>
                                            <!-- <div class="icon">
                                                <i class="icon-basket"></i>
                                            </div> -->
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                    <span class="sr-only">45% grow</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> grow </div>
                                                <div class="status-number" style="color: #686E72;"> 45% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                 

                                
                                
                                
                                
                                
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 "style="background-color:#efefef;">
                                        <div class="display">
                                            <div class="number">
                                                    <?php
                                                        $emp_sub="";
                                                        if(isset($tot_count)&& count($tot_count)){
                                                          $emp_sub=count($tot_count);
                                                        }
                                                        else{
                                                            $emp_sub=0;
                                                        }
                                                    ?>
                                                <h3 class="font-red-haze">
                                                    <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_sub;?>"><?php echo $emp_sub;?></span>
                                                </h3>
                                                <small style="font-weight: unset;font-size:15px;"  id="kra_Submitted" class="chk_user_status"><a style="color: green;" href="javascript:doSomething();">Total Head Count</a></small>
                                            </div>
                                            
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only">85% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> change </div>
                                                <div class="status-number" style="color: #686E72;"> 85% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                

             
                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="set_idp_goal">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title" style="background-color:#005F68; color:#fff;font-weight:bold">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> IDP Stats </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_2" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                   
                                                   <?php
                                                        $emp_not_sub_idp=0;
                                                        if(isset($idp_not_sub)&& count($idp_not_sub)){
                                                          for($i=0;$i<count($idp_not_sub);$i++)
{
if(!(count($idp_not_sub[$i]) == 0))
{
$emp_not_sub_idp++;
}
}
                                                        }
                                                        else{
                                                            $emp_not_sub_idp=0;
                                                        }
                                                    ?>
                                                    <span style="color:red;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_not_sub_idp;?>"><?php echo $emp_not_sub_idp;?></span>
                                                   
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px" class="chk_user_idp_status" id="idp_Pendingemp"><a style="color:red" href="javascript:doSomething();">IDP not Available</a></small>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef;">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <?php
                                                        $emp_appr_idp="";
                                                        if(isset($idp_approved)&& count($idp_approved)){
                                                         for($i=0;$i<count($idp_approved);$i++)
{
if(!(count($idp_approved[$i]) == 0))
{
$emp_appr_idp++;
}
}
                                                        }
                                                        else{
                                                            $emp_appr_idp=0;
                                                        }

                                                    ?>
                                                    <span style="color:#6DA333;font-size:45px" data-counter="counterup" data-value="<?php echo  $emp_appr_idp;?>"><?php echo  $emp_appr_idp;?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72; font-size:15px" id="idp_Approved" class="chk_user_idp_status"><a style="color:#6DA333" href="javascript:doSomething();">IDP Approved</a></small>
                                            </div>
                                            <!-- <div class="icon">
                                                <i class="icon-basket"></i>
                                            </div> -->
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                    <span class="sr-only">56% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> grow </div>
                                                <div class="status-number" style="color: #686E72;"> 45% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-blue-sharp">
                                                    <?php
                                                        $emp_pend_idp="";
                                                        if(isset($idp_pending)&& count($idp_pending)){
                                                          $emp_pend_idp=count($idp_pending);
                                                        }
                                                        else{
                                                            $emp_pend_idp=0;
                                                        }
                                                    ?>
                                                    <span style="color:#f36a5a;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_pend_idp; ?>"><?php echo $emp_pend_idp; ?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px" id="idp_Pending" class="chk_user_idp_status"><a style="color:#f36a5a" href="javascript:doSomething();">IDP Pending Approval</a></small>
                                            </div>
                                            <!-- <div class="icon">
                                                <i class="icon-basket"></i>
                                            </div> -->
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                    <span class="sr-only">45% grow</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> grow </div>
                                                <div class="status-number" style="color: #686E72;"> 45% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                 


                               <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 "style="background-color:#efefef;">
                                        <div class="display">
                                            <div class="number">
                                                    <?php
                                                        $emp_sub_idp="";
                                                        if(isset($idp_sub)&& count($idp_sub)){
                                                          $emp_sub_idp=count($idp_sub);
                                                        }
                                                        else{
                                                            $emp_sub_idp=0;
                                                        }
                                                    ?>
                                                <h3 class="font-red-haze">
                                                    <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_sub_idp;?>"><?php echo $emp_sub_idp;?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px"  id="idp_Submitted" class="chk_user_idp_status"><a style="color:green" href="javascript:doSomething();">Submitted</a></small>
                                            </div>
                                            
                                        </div> -->
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only">85% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> change </div>
                                                <div class="status-number" style="color: #686E72;"> 85% </div>
                                            </div>
                                        </div> -->
                                    <!-- </div>
                                </div> -->
                                
                                
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 "style="background-color:#efefef;">
                                        <div class="display">
                                            <div class="number">
                                                    <?php
                                                        $emp_sub_idp="";
                                                        if(isset($tot_count)&& count($tot_count)){
                                                          $emp_sub_idp=count($tot_count);
                                                        }
                                                        else{
                                                            $emp_sub_idp=0;
                                                        }
                                                    ?>
                                                <h3 class="font-red-haze">
                                                    <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_sub_idp;?>"><?php echo $emp_sub_idp;?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px"  id="idp_Submitted" class="chk_user_idp_status"><a style="color:green" href="javascript:doSomething();">Total Head Count </a></small>
                                            </div>
                                            
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only">85% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> change </div>
                                                <div class="status-number" style="color: #686E72;"> 85% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                
                  
                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="mid_review mid_idp_review">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title" style="background-color:#005F68; color:#fff;font-weight:bold">
                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"> Mid Year Stats </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_3_3" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                               <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                    <?php
                                                        $emp_mid_notsub="";
                                                        if(isset($mid_not_sub)&& count($mid_not_sub)){
                                                          $emp_mid_notsub=count($mid_not_sub);
                                                        }
                                                        else{
                                                            $emp_mid_notsub=0;
                                                        }
                                                    ?>
                                                    <span style="color:red;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_mid_notsub; ?>"><?php echo $emp_mid_notsub; ?></span>
                                                   
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px" class="chk_user_status1" id="midIdp_Pendingemp"><a style="color:red" href="javascript:doSomething();">Incomplete goalsheet</a></small>
                                            </div>
                                            <!-- <div class="icon">
                                                <i class="icon-pie-chart"></i>
                                            </div> -->
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                    <span class="sr-only">76% progress</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> progress </div>
                                                <div class="status-number" style="color: #686E72;"> 76% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 "style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <?php
                                                        $emp_mid_sub="";
                                                        if(isset($mid_sub_data)&& count($mid_sub_data)){
                                                          $emp_mid_sub=($mid_sub_data);
                                                        }
                                                        else{
                                                            $emp_mid_sub=0;
                                                        }
                                                    ?>
                                                    <span style="color:green; font-size:45px" data-counter="counterup" data-value="<?php echo $emp_mid_sub; ?>"><?php echo $emp_mid_sub; ?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px"  id="midIdp_Submitted" class="chk_user_status1"><a style="color:green" href="javascript:doSomething();">Completed goalsheet</a></small>
                                            </div>
                                            
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only">85% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> change </div>
                                                <div class="status-number" style="color: #686E72;"> 85% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 "style="background-color:#efefef;">
                                        <div class="display">
                                            <div class="number">
                                                    <?php
                                                        $emp_sub_idp="";
                                                        if(isset($tot_count)&& count($tot_count)){
                                                          $emp_sub_idp=count($tot_count);
                                                        }
                                                        else{
                                                            $emp_sub_idp=0;
                                                        }
                                                    ?>
                                                <h3 class="font-red-haze">
                                                    <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_sub_idp;?>"><?php echo $emp_sub_idp;?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px"  id="idp_Submitted" class="chk_user_idp_status"><a style="color:green" href="javascript:doSomething();">Total Head Count(Goalsheet) </a></small>
                                            </div>
                                            
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only">85% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> change </div>
                                                <div class="status-number" style="color: #686E72;"> 85% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 " style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                    <?php
                                                        $emp_mid_idp_notsub="";
                                                        if(isset($mid_idp_not_sub)&& count($mid_idp_not_sub)){
                                                          for($i=0;$i<count($mid_idp_not_sub);$i++)
{
if(!(count($mid_idp_not_sub[$i]) == 0))
{
$emp_mid_idp_notsub++;
}
}
                                                        }
                                                        else{
                                                            $emp_mid_idp_notsub=0;
                                                        }
                                                    ?>
                                                    <span style="color:red;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_mid_idp_notsub; ?>"><?php echo $emp_mid_idp_notsub; ?></span>
                                                   
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px" class="chk_user_Mididp_status" id="mid_Pendingemp"><a style="color:red;" href="javascript:doSomething();">incomplete IDP</a></small>
                                            </div>
                                            <!-- <div class="icon">
                                                <i class="icon-pie-chart"></i>
                                            </div> -->
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                    <span class="sr-only">76% progress</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> progress </div>
                                                <div class="status-number" style="color: #686E72;"> 76% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 "style="background-color:#efefef">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <?php
                                                        $emp_mid_idp_sub="";
                                                        if(isset($mid_idp_sub)&& count($mid_idp_sub)){
                                                          for($i=0;$i<count($mid_idp_sub);$i++)
{
if(!(count($mid_idp_sub[$i]) == 0))
{
$emp_mid_idp_sub++;
}
}
                                                        }
                                                        else{
                                                            $emp_mid_idp_sub=0;
                                                        }
                                                    ?>
                                                    <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_mid_idp_sub; ?>"><?php echo $emp_mid_idp_sub; ?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px;"  id="mid_Submitted" class="chk_user_Mididp_status"><a style="color:green" href="javascript:doSomething();">Completed  idp </a></small>
                                            </div>
                                            
                                        </div>
                                        <!-- <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only">85% change</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title" style="color: #686E72;"> change </div>
                                                <div class="status-number" style="color: #686E72;"> 85% </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                    <div class="col-lg-3 col-md-3 col-sm- col-xs-12">
                                    <div class="dashboard-stat2 "style="background-color:#efefef;">
                                        <div class="display">
                                            <div class="number">
                                                    <?php
                                                        $emp_sub_idp="";
                                                        if(isset($tot_count)&& count($tot_count)){
                                                          $emp_sub_idp=count($tot_count);
                                                        }
                                                        else{
                                                            $emp_sub_idp=0;
                                                        }
                                                    ?>
                                                <h3 class="font-red-haze">
                                                    <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_sub_idp;?>"><?php echo $emp_sub_idp;?></span>
                                                </h3>
                                                <small style="font-weight: unset;color: #686E72;font-size:15px"  id="idp_Submitted" class="chk_user_idp_status"><a style="color:green" href="javascript:doSomething();">Total Head Count(IDP) </a></small>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                       




                            </div>
                                                            </div>
                                                        </div>
                                                    </div>








<div class="panel panel-default" id="set_idp_goal">
    <div class="panel-heading">
        <h4 class="panel-title" style="background-color:#005F68; color:#fff;font-weight:bold">
        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4"> Self Input Status (Employee) </a>
        </h4>
    </div>
<div id="collapse_3_4" class="panel-collapse collapse">
    <div class="panel-body">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 " style="background-color:#efefef">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
<?php $yer_sub=0;
if(isset($yearEnd_rev) && count($yearEnd_rev)>0){
         
$yer_sub=count($yearEnd_rev);
}

?>
</span>
                            <span style="color:#f36a5a;font-size:45px" data-counter="counterup" data-value="<?php echo $yer_sub;?>"><?php echo $yer_sub;?> </span>

                            </h3>
                            <small style="font-weight: unset;color: #686E72;font-size:15px" id="yearEnd_allsub" class="chk_user_year_end_status">
                              <a style="color:#f36a5a" href="javascript:doSomething();">Submitted</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 " style="background-color:#efefef">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
<?php
                                                        $emp_sub_idp=0;$pending_year=0;

$yer_sub=0;
if(isset($yearEnd_rev) && count($yearEnd_rev)>0){
         
$yer_sub=count($yearEnd_rev);
}
                                                        if(isset($tot_count)&& count($tot_count)){
                                                          $emp_sub_idp=count($tot_count);
$pending_year=$emp_sub_idp-$yer_sub;
                                                        }
                                                        else{
                                                            $emp_sub_idp=0;
                                                        }
                                                    ?>
                                <span style="color:red;font-size:45px" data-counter="counterup" data-value="<?php echo $pending_year;?>"><?php echo $pending_year;?></span>
                            </h3>
                            <small style="font-weight: unset;color: #686E72;font-size:15px" class="chk_user_year_end_status" id="yearEnd_Pendingemp">
                              <a style="color:red" href="javascript:doSomething();">Submission Pending</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 " style="background-color:#efefef;">
                    <div class="display">
                        <div class="number">
                          <h3 class="font-red-haze">
                                                      <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_sub_idp;?>"><?php echo $emp_sub_idp;?></span>
                          </h3>
                          <small style="font-weight: unset;color: #686E72;font-size:15px" id="kra_Submitted1" class="chk_user_year_end_statusMgr"><a style="color:green" href="javascript:doSomething();">Total Head Count</a></small>
                        </div>
                    </div>
                </div>
            </div>
          
          
          
          
          
          
          
          
          
          
            
        </div>
    </div>
</div>
</div>







<div class="panel panel-default" id="set_idp_goal">
    <div class="panel-heading">
        <h4 class="panel-title" style="background-color:#005F68; color:#fff;font-weight:bold">
        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_5"> Year End Review(Manager) </a>
        </h4>
    </div>
<div id="collapse_3_5" class="panel-collapse collapse">
    <div class="panel-body">
        <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 " style="background-color:#efefef;">
                    <div class="display">
                        <div class="number">
                          <h3 class="font-purple-soft">
<?php 
$appr_yer=0;
if(isset($yearEnd_rev2) && count($yearEnd_rev2)>0){
$appr_yer=count($yearEnd_rev2);
}

?>
                          <span style="color:#6DA333;font-size:45px" data-counter="counterup" data-value="<?php echo $appr_yer;?>"><?php echo $appr_yer;?></span>
                          </h3>
                          <small style="font-weight: unset;color: #686E72; font-size:15px" id="yearEndMgr_Approved" class="chk_user_year_end_statusMgr"><a style="color:#6DA333" href="javascript:doSomething();">Approved</a></small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 " style="background-color:#efefef">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
<?php 
$pend_appr=0;
if(isset($yearEnd_rev1) && count($yearEnd_rev1)>0){
 $pend_appr=count($yearEnd_rev1);          

}


?>
                            <span style="color:#f36a5a;font-size:45px" data-counter="counterup" data-value="<?php echo $pend_appr;?>"><?php echo $pend_appr;?></span>
                            </h3>
                            <small style="font-weight: unset;color: #686E72;font-size:15px" id="yearEndMgr_Pending" class="chk_user_year_end_statusMgr">
                              <a style="color:#f36a5a" href="javascript:doSomething();">Approval Pending</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
           




 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 " style="background-color:#efefef;">
                    <div class="display">
                        <div class="number">
                          <h3 class="font-red-haze">
<?php
                                                        $emp_sub_idp="";
                                                        if(isset($tot_count)&& count($tot_count)){
                                                          $emp_sub_idp=count($tot_count);
                                                        }
                                                        else{
                                                            $emp_sub_idp=0;
                                                        }
                                                    ?>
                                                      <span style="color:green;font-size:45px" data-counter="counterup" data-value="<?php echo $emp_sub_idp;?>"><?php echo $emp_sub_idp;?></span>
                          </h3>
                          <small style="font-weight: unset;color: #686E72;font-size:15px" id="kra_Submitted1" class="chk_user_year_end_statusMgr"><a style="color:green" href="javascript:doSomething();">Total Head Count</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>







                                                    
                                                </div>
                                            </div>
                                        </div>
                                        


                         










                                               </div>














                     <div class="col-md-12">
                      <div class="portlet light " style="border:1px solidgreen">
                                    <div class="portlet light portlet-fit border-blue-soft">                                        
                                        <div class="portlet-body">
                                            <div class="mt-element-list">
                                                <div class="mt-list-head list-todo red" style="background-color:#031f4e">
                                                    <div class="list-head-title-container">
                                                        <h3 class="list-title">Recent Activities
                                                        </h3>                                                        
                                                    </div>                                                    
                                                </div>
                                                <div class="mt-list-container list-todo" style="border: 1px solid rgb(3, 31, 78);">
                                                    <div class="list-todo-line"></div>                                                    
                                                    <ul>
                                                        <li class="mt-list-item">                                                            
                                                            <div class="list-todo-item dark">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#task-1" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase" style="background-color:#005F68">
                                                                        <div class="list-toggle-title bold">Goalsheet or Review settings</div>
                                                                     
                                                                    </div>
                                                                </a>
                                                                <div class="task-list panel-collapse collapse" id="task-1">

                                                                 <ul><marquee style="position: relative;" behavior="scroll" align="center" direction="up" scrollamount="2" scrolldelay="5" >
                                                                       
                                                                           <?php if (isset($recent_act3) && count($recent_act3)>0) { 
                                                                               
                                                                                $pending='';
                                                                                if(count($recent_act3)>5)
                                                                                {
                                                                                    $k=5;
                                                                                }
                                                                                else{
                                                                                    $k=count($recent_act3);
                                                                                }
                                                                               for($i=0;$i<$k;$i++)
                                                                               {
                                                                                ?>
                                                                                <li class="task-list-item done" style="border-bottom:1px solid #eee">
                                                                                 
                                                                                     <?php
                                                                                       
                                                                                        $emp_nm = '';
                                                                                        if (isset($recent_emp3) && count($recent_emp3)>0 && isset( $recent_emp3[$i]['0']['Emp_fname'])) {
                                                                                            //print_r($recent_emp);die();
                                                                                       $emp_nm =  $recent_emp3[$i]['0']['Emp_fname']."  ".$recent_emp3[$i]['0']['Emp_lname'];
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                        $emp_nm='';
                                                                                        }
                                                                                        echo $emp_nm."'s"."&nbsp;&nbsp;&nbsp;";
                                                                                        echo $recent_act3[$i]['notification_type']."&nbsp;&nbsp;&nbsp;";
                                                                                        ?>
                                                                                        <label style="float:right;color:#868080;font-style:italic" >
                                                                                        <?php
                                                                                        echo $recent_act3[$i]['date'];
                                                                                        ?></label>
                                                                                        <?php
                                                                                        }
                                                                                    }?>                                                                    
                                                                        </li></marquee>
                                                                        
                                                                    </ul>   
                                                                   
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mt-list-item">                                                            
                                                            <div class="list-todo-item dark">
                                                                <a class="list-toggle-container" data-toggle="collapse" href="#task-2" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase" style="background-color:#005F68">
                                                                        <div class="list-toggle-title bold">Goal or Review approved </div>
                                                      
                                                                    </div>
                                                                </a>
                                                                <div class="task-list panel-collapse collapse" id="task-2">
                                                                    <ul><marquee style="position: relative;" behavior="scroll" align="center" direction="up" scrollamount="2" scrolldelay="5" >
                                                                       
                                                                           <?php if (isset($recent_act2) && count($recent_act2)>0) { 
                                                                                //print_r($recent_act1);die();
                                                                                $pending='';
                                                                                if(count($recent_act2)>5)
                                                                                {
                                                                                    $k=5;
                                                                                }
                                                                                else{
                                                                                    $k=count($recent_act2);
                                                                                }
                                                                               for($i=0;$i<$k;$i++)
                                                                               {
                                                                                ?>
                                                                                <li class="task-list-item done" style="border-bottom:1px solid #eee">
                                                                                 
                                                                                     <?php
                                                                                       
                                                                                        $emp_nm = '';
                                                                                        if (isset($recent_emp2) && count($recent_emp2)>0 && isset($recent_emp2[$i]['0']['Emp_fname'])) {
                                                                                        $emp_nm =  $recent_emp2[$i]['0']['Emp_fname']."  ".$recent_emp2[$i]['0']['Emp_lname'];
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                        $emp_nm='';
                                                                                        }
                                                                                        echo $emp_nm."'s"."&nbsp;&nbsp;&nbsp;";
                                                                                        echo $recent_act2[$i]['notification_type']."&nbsp;&nbsp;&nbsp;";
                                                                                        ?>
                                                                                        <label style="float:right;color:#868080;font-style:italic" >
                                                                                        <?php
                                                                                        echo $recent_act2[$i]['date'];
                                                                                        ?></label>
                                                                                        <?php
                                                                                        }
                                                                                    }?>                                                                    
                                                                        </li></marquee>
                                                                        
                                                                    </ul>
                                                                    
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mt-list-item">                                                            
                                                            <div class="list-todo-item dark">
                                                                <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-3" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase" style="background-color:#005F68">
                                                                        <div class="list-toggle-title bold">Goal or review pending</div>
                                                  
                                                                    </div>
                                                                </a>
                                                                <div class="task-list panel-collapse collapse" id="task-3">
                                                                    <ul><marquee style="position: relative;" behavior="scroll" align="center" direction="up" scrollamount="2" scrolldelay="5" >
                                                                       
                                                                           <?php if (isset($recent_act1) && count($recent_act1)>0) { 
                                                                                //print_r($recent_act1);die();
                                                                                $pending='';
                                                                                if(count($recent_act1)>5)
                                                                                {
                                                                                    $k=5;
                                                                                }
                                                                                else{
                                                                                    $k=count($recent_act1);
                                                                                }
                                                                               for($i=0;$i<$k;$i++)
                                                                               {
                                                                                ?>
                                                                                <li class="task-list-item done" style="border-bottom:1px solid #eee">
                                                                                 
                                                                                     <?php
                                                                                       
                                                                                        $emp_nm = '';
                                                                                        //print_r($recent_emp1);die();
                                                                                        if (isset($recent_emp1[$i]['0']['Emp_fname']) && count($recent_emp1)>0) {
                                                                                        $emp_nm =  $recent_emp1[$i]['0']['Emp_fname']."  ".$recent_emp1[$i]['0']['Emp_lname'];
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                        $emp_nm='';
                                                                                        }
                                                                                        echo $emp_nm."'s"."&nbsp;&nbsp;&nbsp;";
                                                                                        echo $recent_act1[$i]['notification_type']."&nbsp;&nbsp;&nbsp;";
                                                                                        ?>
                                                                                        <label style="float:right;color:#868080;font-style:italic" >
                                                                                        <?php
                                                                                        echo $recent_act1[$i]['date'];
                                                                                        ?></label>
                                                                                        <?php
                                                                                        }
                                                                                    }?>                                                                    
                                                                        </li></ul></marquee></div></div></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                     </div>
                   </div>

                                           
<div id="responsive"  class="modal fade" tabindex="-1" data-width="1058px" data-backdrop="static" data-keyboard="false" style="width: 1058px;margin-left: -485px;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Self Input Of Employee</h4>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <table  class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                <thead>
                                                    <tr>
                                                            <th >Employee Id</th>
                                                            <th>Employee Name</th>
                                                            <th>Gender</th>
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Cadre</th>
                                                            <th>Joining Date</th>
                                                            <th>Date Of Birth</th>
                                                            <th>Present Address</th>
                                                            <th>State</th>
                                                            <th>PAN Number</th>
                                                            <th>Email Id</th>
                                                            <th>Normalisation Cluster</th>
                                                            <th>BU</th>
                                                            <th>Reporting Manager</th>
                                                            <th>Location Working At</th>
                                                            
                                                            
                                                    </tr>
                                                </thead>

                                                <tbody id="dept_based_emp">

                                                    </tbody>
                                            </table>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
                                                    
                                                </div>
                                            </div>
                                            <!-- stackable -->
<div id="responsive1" class="modal fade" tabindex="-1" data-width="1200px" data-backdrop="static" data-keyboard="false" style="width: 1521px; margin-left: -812px; " >


                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Employee List</h4>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <table  class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                                <thead>
                                                    <tr>
                                                            <th >SAP Code</th>
                                                            <th>Employee Name</th>
                                                            <!--<th>Gender</th>-->
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Cadre</th>
                                                            <th>Joining Date</th>
                                                            <!--<th>Date Of Birth</th>
                                                            <th>Present Address</th>
                                                            <th>State</th>
                                                            <th>PAN Number</th>
                                                            <th>Email Id</th>-->
                                                            <th>Normalisation Cluster</th>
                                                            <th>BU</th>
                                                            <th>Reporting Manager</th>
                                                            <th>Company Location</th>
                                                            <th>BU Head</th>
                                                            <th>Dotted Line Manager</th>
                                                            <th>Cluster head</th>
                                                            
                                                    </tr>
                                                </thead>

                                                <tbody id="dept_based_emp1">

                                                    </tbody>
                                            </table>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
                                                    
                                                </div>
                                            </div>
                                            <!-- stackable -->



 </div>
                <!-- END CONTENT BODY -->
            </div>
<style type="text/css">
  .dataTables_wrapper .dt-buttons {
  float:left; 
}
.dt-buttons{
display:block;
}
</style>


             <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
       
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
      
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-extended-modals.min.js" type="text/javascript"></script>
         
        
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        
    
               