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



</style>



<script type="text/javascript">
$(document).ready(function(){
 
    var date1 = document.getElementById('set-date');
    var goal_date = $("#set-date").val();
    // alert(goal_date);
     

    var date2 = document.getElementById('mid-date');
    var mid_date = date2.getAttribute('value');
   //alert(mid_date);
var today = new Date();
    
    var date3 = document.getElementById('yearb-dt');
    var yearb_date = date3.getAttribute('value');
   //alert(yearb_date);
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
 //alert(mid_date) ;
if(goal_date=='' ){
     $("#set").css("display","none");
     $("#Setgoal").css("display","none");
     $("#mid").css("display","none");
     $("#Mid_review").css("display","none");
     $("#year").css("display","none");
     $("#YearA").css("display","none");
     $("#YearB").css("display","none");
     $(".stepwizard").css("display","none"); 

}

else if(today<=process(goal_date)||(goal_date!='' && mid_date=='' && yearb_date=='')){
  $("#set-date").addClass("btn-primary");
     $("#mid").css("display","none");
     $("#Mid_review").css("display","none");
     $("#year").css("display","none");
     $("#YearA").css("display","none");
     $("#YearB").css("display","none");
}
else if(today<=process(mid_date)||(goal_date!='' && mid_date!='' && yearb_date=='')){
     $("#mid-date").addClass("btn-primary");
     $("#set-date").text(""); 
     $("#set-date").addClass("fa fa-check");
     $("#set-date").addClass("btn-success");
     $("#year").css("display","none");
     $("#YearA").css("display","none");
     $("#YearB").css("display","none");
}
else if(today<=process(yearb_date))
{
  $("#yearb-dt").addClass("btn-primary"); 
     $("#mid-date").text("");  
     $("#mid-date").addClass("fa fa-check");
     $("#mid-date").addClass("btn-success");
     $("#set-date").text(""); 
     $("#set-date").addClass("fa fa-check");
     $("#set-date").addClass("btn-success");
}
else if(today>process(yearb_date)){
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

<style type="text/css">
#sample_2_info{
    display:none;
}
.dt-buttons{
    display:none;
}
.dataTables_length select { 
    display: none;
}
.dataTables_length label {
    display: none;
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
</style>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript">
</script>

<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    
<div class="container-fluid">
    <div class="page-container">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container">
                    <div class="portlet-body">
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
                                    <button type="button" value="<?php echo $new_date;?>" id="set-date" class="btn btn-default  btn-circle" name="<?php echo $new_date; ?>">1</button>
                                    <p>Set Goal <?php echo "[".$new_date."]"; ?></p>
                                </div>
                      
                                <div class="stepwizard-step">

                                    <button type="button" value="<?php echo $new_date1;?>" id="mid-date" class="btn btn-default btn-circle" >2</button>
                                    <p>Mid Year Review<?php echo "[".$new_date1."]"; ?></p>
                                </div> 
                        
                    <!--             <div class="stepwizard-step">
                                    <?php
                                     if (isset($set_dates) && count($set_dates)>0 ){
                                        for($i=0;$i<count($set_dates);$i++)
                                        {
                                           if($set_dates[$i]['setting_content']=='final_goal_set_tab_active-date') {
                                                $originalDate = $set_dates[$i]['setting_type'];
                                                $time_epoch = strtotime($originalDate); //Converts the string into an epoch time
                                                $new_date = date('d/m/Y', $time_epoch); //Creates a new string
                                                
                                            }
                                          }  
                                        }//echo $new_date;
                                    ?>
                                    <button type="button"  id="yeara-dt" data-date="<?php echo $new_date;?>" class="btn btn-default btn-circle" >3</button>
                                    <p>Year End Review A<?php echo "[".$new_date."]"; ?></p>
                                </div>  -->
                                
                                  <div class="stepwizard-step">
                                    
                                    <button type="button" id="yearb-dt" value="<?php echo $new_date2;?>"class="btn btn-default btn-circle">3</button>
                                    <p>Year End Review <?php echo "[".$new_date2."]"; ?></p>
                                </div> 
       



                                 
                            </div>
                        </div>
                    </div>                        
                    <div class="profile">
                        <div class="portlet box red" style="border:1px solid #4C87B9;" >
                            <div class="portlet-title" style="background-color: #4C87B9;">
                                <div class="caption" ></i>Employee Dashboard </div>
                                <div class="tools"><a href="javascript:;" class="collapse"> </a></div>
                            </div>
                            <div class="portlet-body tabs-below">
                                <div class="tab-content">
                                    <div class="tabbable-line tabbable-full-width">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                            <span class="caption-subject font-blue-madison bold uppercase">overview</span>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="portlet light profile-sidebar-portlet bordered">
                                                            <div class="profile-userpic">
                                                            <?php
                                                                    $img = '';
                                                                    if (isset($employee_data) && count($employee_data)>0 && isset($employee_data['0']['Image']) && $employee_data['0']['Image']!='') {

                                                                        $img = $employee_data['0']['Image'];
                                                                    }
                                                                    else
                                                                    {
                                                                        $img = 'user_profile.png';
                                                                    }
                                                                    
                                                            ?>
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $img ?>" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="profile-usertitle">
                                                                <div class="profile-usertitle-name" style="text-align:center; font-weight:bold;background-color:#4c87b9;color:white">
                                                                    <?php
                                                                        $emp_name = '';
                                                                        if (isset($employee_data) && count($employee_data)>0) {
                                                                            $emp_name = $employee_data['0']['Emp_fname']." ".$employee_data['0']['Emp_lname'];
                                                                        }
                                                                        else
                                                                        {
                                                                            $emp_name = '';
                                                                        }
                                                                         echo $emp_name;
                                                                    ?>
                                                                </div><br>
                                                                <ul class="list-inline" style="font-weight:bold">
                                                                <label style="color:#6b6b6b;">Employee Id:</label>
                                                                <li>
                                                                    <?php
                                                                        $emp_id = '';
                                                                        if (isset($employee_data) && count($employee_data)>0) {
                                                                            $emp_id = $employee_data['0']['Employee_id'];
                                                                        }
                                                                        else
                                                                        {
                                                                            $emp_id ='""';
                                                                        }
                                                                         echo $emp_id;
                                                                    ?>
                                                                </li><br/>
                                                                <label style="color:#6b6b6b;">Employee Status:</label>   
                                                                <li><?php
                                                                    $emp_stat = '';
                                                                    if (isset($employee_data) && count($employee_data)>0) {
                                                                        $emp_stat = $employee_data['0']['Employee_status'];
                                                                    }
                                                                    else
                                                                    {
                                                                        $emp_stat ="";
                                                                    }
                                                                     echo $emp_stat;
                                                                ?>
                                                                </li></li><br/>
                                                                <label style="color:#6b6b6b;">City:</label>
                                                                <li>
                                                                    <?php
                                                                    $emp_city = '';
                                                                    if (isset($employee_data) && count($employee_data)>0) {
                                                                        $emp_city = $employee_data['0']['city'];
                                                                    }
                                                                    else
                                                                    {
                                                                        $emp_city = '';
                                                                    }
                                                                     echo $emp_city;
                                                                ?>


                                                                 </li><br/>
                                                                <label style="color:#6b6b6b;">Date Of Birth:</label>
                                                                <li>
                                                                <?php
                                                                    $emp_dob = '';
                                                                    if (isset($employee_data) && count($employee_data)>0) {
                                                                        $emp_dob = $employee_data['0']['DOB'];
                                                                    }
                                                                    else
                                                                    {
                                                                        $emp_dob = '';
                                                                    }
                                                                     echo $emp_dob;
                                                                ?>    
                                                                 </li>
                                                                </ul>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div style="margin-right: 24px; margin-left: -6px;" class="col-md-6  portlet light bordered tasks-widget">
                                                                    <div class="portlet-title">
                                                                        <div class="caption caption-md">
                                                                            <i class="icon-bar-chart theme-font hide"></i>
                                                                            <span class="caption-subject font-blue-madison bold uppercase">Employee's details</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="task-content">
                                                                            <div style="position: relative; overflow: hidden; width: auto; " class="slimScrollDiv"><div data-initialized="1" class="scroller" style=" overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                                                <ul class="task-list">
                                                                                <li>
                                                                                <div class="task-title">
                                                                                   <label>Employee Email Id:</label>
                                                                                   <?php
                                                                                        $email = '';
                                                                                        if (isset($employee_data) && count($employee_data)>0) {
                                                                                        $email = $employee_data['0']['Email_id'];
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                        $email = '';
                                                                                        }
                                                                                        echo $email;
                                                                                    ?>  
                                                                                </div>
                                                                                </li>
                                                                            <li>
                                                                            <div class="task-title">
                                                                               <label>Employee Joining Date:</label>
                                                                                <?php
                                                                                    $doj = '';
                                                                                    if (isset($employee_data) && count($employee_data)>0) {
                                                                                    $doj = $employee_data['0']['joining_date'];
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    $doj = '';
                                                                                    }
                                                                                    echo $doj;
                                                                                ?>
                                                                            </div>
                                                                            </li>
                                                                            <li>
                                                                            <div class="task-title">
                                                                               <label>Employee Department:</label>
                                                                                <?php
                                                                                    $dept = '';
                                                                                    if (isset($employee_data) && count($employee_data)>0) {
                                                                                    $dept = $employee_data['0']['Department'];
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    $dept = '';
                                                                                    }
                                                                                    echo $dept;
                                                                                ?>
                                                                            </div>
                                                                            </li>
                                                                            <li>
                                                                            <div class="task-title">
                                                                               <label>Employee Designation:</label>
                                                                                <?php
                                                                                    $desg = '';
                                                                                    if (isset($employee_data) && count($employee_data)>0) {
                                                                                    $desg = $employee_data['0']['Designation'];
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    $doj = '';
                                                                                    }
                                                                                    echo $desg;
                                                                                ?>
                                                                            </div>
                                                                            </li>
                                                                            <li>
                                                                            <div class="task-title">
                                                                               <label>Employee Cluster Name:</label>
                                                                               <?php
                                                                                    $cluster = '';
                                                                                    if (isset($employee_data) && count($employee_data)>0) {
                                                                                    $cluster = $employee_data['0']['cluster_name'];
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    $cluster = '';
                                                                                    }
                                                                                    echo $cluster;
                                                                                ?>
                                                                            </div>
                                                                            </li>
                                                                            <li>
                                                                            <div class="task-title">
                                                                                <label>Employee Reporting Manager:</label>
                                                                                <?php
                                                                                    $mgr = '';
                                                                                    if (isset($report) && count($report)>0) {
                                                                                    $mgr = $report['0']['Emp_fname']." ".$report['0']['Emp_lname'];
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    $mgr = '';
                                                                                    }
                                                                                    echo $mgr;
                                                                                ?>
                                                                            </div>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tabbable-line tabbable-custom-profile"><br>
                                                                            <ul class="nav nav-tabs">
                                                                                <li class="active">
                                                                                    <span class="caption-subject font-blue-madison bold uppercase">EMPLOYEE ACTIVITY STATUS</span>
                                                                                   
                                                                                </li>
                                                                            </ul>
                                                                            <div class="tab-content">                                                    
                                                                                <div class="portlet-body flip-scroll">
                                                                                   <table class="table table-bordered table-striped table-condensed flip-content">
                                                                                        <thead class="flip-content">
                                                                                            <tr>
                                                                                                <th width="50%" style="background-color:#4c87b9;color:white; font-weight:bold"> Activity </th>
                                                                                                <th style="background-color:#4c87b9;color:white; font-weight:bold"> Status </th>
                                                                                                
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td> Set Goal </td>
                                                                                                <td>
                                                                                                    <?php
                                                                                                        $set_date = '';
                                                                                                        if (isset($kpi) && count($kpi)>0) {
                                                                                                        $set_date = $kpi['0']['KRA_date'];
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                        $set_date = '';
                                                                                                        }
                                                                                                        echo $set_date;
                                                                                                    ?>    


                                                                                                 </td>
                                                                                                
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td> Mid Year Review </td>
                                                                                                <td> 
                                                                                                <?php
                                                                                                        $set_date = '';
                                                                                                        if (isset($kpi) && count($kpi)>0) {
                                                                                                        $set_date = $kpi['0']['mid_review_by_employee_date'];
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                        $set_date = '';
                                                                                                        }
                                                                                                        echo $set_date;
                                                                                                    ?>  </td>
                                                                                                
                                                                                            </tr>
                                                                                           
                                                                                            <tr>
                                                                                                <td> Year End Review  Final Submission </td>
                                                                                                <td> 
                                                                                                <?php
                                                                                                        $set_date = '';
                                                                                                        if (isset($yerB) && count($yerB)>0) {
                                                                                                        $set_date = $yerB['0']['review_date'];
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                        $set_date = '';
                                                                                                        }
                                                                                                        echo $set_date;
                                                                                                    ?>  </td>
                                                                                                
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-5" style="border:1px solid #e7ecf1 ; "><br>            
                                                        <div class="portlet-body">
                                                           <ul class="nav nav-tabs">
                                                                <li class="active">
                                                                    <span class="caption-subject font-blue-madison bold uppercase">colleague details</span>
                                                                   
                                                                </li>
                                                            </ul>
                                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="all">Employee Name</th>
                                                                        <th class="none">Email Id</th>
                                                                        <th class="none">Mobile No.</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                     <?php
                                                                        for ($x = 0; $x < count($dept1); $x++) {
                                                                      ?>
                                                                      <tr>
                                                                      <th>
                                                                      </th>
                                                                      <td>
                                                                        <?php
                                                                            $name = '';
                                                                            if (isset($dept1) && count($dept1)>0) {
                                                                            $name = $dept1[$x]['Emp_fname']." ".$dept1[$x]['Emp_lname'];
                                                                            }
                                                                            else
                                                                            {
                                                                            $name = '';
                                                                            }
                                                                            echo $name;
                                                                        ?>
                                                                      </td>
                                                                      <td>
                                                                        <?php
                                                                            $mail = '';
                                                                            if (isset($dept1) && count($dept1)>0) {
                                                                            $mail = $dept1[$x]['Email_id'];
                                                                            }
                                                                            else
                                                                            {
                                                                            $mail = '';
                                                                            }
                                                                            echo $mail;
                                                                        ?>
                                                                      </td>
                                                                      <td>
                                                                        <?php
                                                                            $mob = '';
                                                                            if (isset($dept1) && count($dept1)>0) {
                                                                            $mob = $dept1[$x]['mobile_number'];
                                                                            }
                                                                            else
                                                                            {
                                                                            $mob = '';
                                                                            }
                                                                            echo $mob;
                                                                        ?>
                                                                      </td>
                                                                      </tr>
                                                                      <?php
                                                                        }
                                                                        ?>                                 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><br>
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
</div>
                             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>       
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/profile.min.js" type="text/javascript"></script>     
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>   
</div>
