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
?>
<script type="text/javascript">
$(document).ready(function(){
 
  var team= <?php echo $team_count;?>;
  //var team= 0;
 if(team==0){
   $("#team_set").css("display", "none");
   $("#team_mid").css("display", "none");  
   $("#team_yearA").css("display", "none");
   $("#team_yearB").css("display", "none");  
  s
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

          
         $(".chk_user_status").click(function(){
            var id = $(this).attr('id');
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/pmsuser/index.php?r=User_dashboard/statusget',
            success : function(data)
            {
                alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show'); 
                $('#sample_1').DataTable();
               
            }
          });
         });

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
            url : base_url+'/pmsuser/index.php?r=User_dashboard/teamSetgoalstatus',
            success : function(data)
            {
                alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show'); 
                $('#sample_1').DataTable();
               
            }
          });
         });

         $(".chk_mid_stat").click(function(){
            var id = $(this).attr('id');
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/pmsuser/index.php?r=User_dashboard/midstatusget',
            success : function(data)
            {
                alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show'); 
                $('#sample_1').DataTable();
               
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
            url : base_url+'/pmsuser/index.php?r=User_dashboard/teamMidstatusget',
            success : function(data)
            {
                alert(data);
                var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show'); 
                $('#sample_1').DataTable();
               
            }
          });
         });

         $(".chk_yerA_status").click(function(){
            var id = $(this).attr('id');
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/pmsuser/index.php?r=User_dashboard/yearAstatusget',
            success : function(data)
            {
               alert(data);
               var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show'); 
                $('#sample_1').DataTable();
               
            }
          });
         });

         $(".chk_yerB_status").click(function(){
            var id = $(this).attr('id');
            var data = {
                'status' : id,
            };
            var base_url = window.location.origin;
            $.ajax({
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/pmsuser/index.php?r=User_dashboard/yearBstatusget',
            success : function(data)
            {
               var table = $('#sample_1').DataTable();
                table.clear().draw();
                table.rows.add($(data)).draw();
                jQuery("#responsive").modal('show'); 
                $('#sample_1').DataTable();
               
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
                    <div class="portlet-body">
                        
                    <div class="profile">
                        <div class="portlet box red" style="border:1px solid #4C87B9;" >
                            <div class="portlet-title" style="background-color: #4C87B9;">
                                <div class="caption" ></i>Employee Dashboard </div>
                                <div class="tools"><a href="javascript:;" class="collapse"> </a></div>
                            </div>
                            <div class="portlet-body tabs-below" >
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
                    </div>                        
                    <div class="profile">
                                </div>

<!--Begin My Setgoal-->
<div class="portlet box blue" id="my_set">
<div class="portlet-title">
    <div class="caption">
        MY SET GOALS </div>
    <div class="tools">
        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
       
    </div>
</div>
<div class="portlet-body" style="display:none ; background-color:#d6dee9">
    
                                                
        <div class="row widget-row" id="Setgoal" style="background-color: rgb(214, 222, 233);">
        <div class="col-md-4" style="padding-top: 18px;">
            <!-- BEGIN WIDGET THUMB -->
            <?php
            if (isset($kra_data) && count($kra_data)>0){
                $kra_submitted=count($kra_data);
            }
            else{
                $kra_submitted=0;
            }

            ?>

            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
               
                <h4 class="widget-thumb-heading">My KRA Submitted</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green fa fa-check-square-o" style="font-size:40px"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-subtitle chk_user_status" id="kra_Submitted"><a href="#">Submitted</a></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $kra_submitted?>"><?php echo $kra_submitted?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-4"  style="padding-top: 18px;">
            <!-- BEGIN WIDGET THUMB -->
            <?php
            if (isset($kra_data_pending) && count($kra_data_pending)>0){
                $kra_pending=count($kra_data_pending);
            }
            else{
                $kra_pending=0;
            }


            ?>
           <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">My KRA Pending Approval</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red fa fa-times" style="font-size:40px"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle chk_user_status" id="kra_Pending"><a href="#">Pending Approval</a></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $kra_pending;?>"><?php echo $kra_pending;?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-4"  style="padding-top: 18px;">
            <!-- BEGIN WIDGET THUMB -->
            <?php
            if (isset($kra_data_appr) && count($kra_data_appr)>0){
                $kra_appr=count($kra_data_appr);
            }
            else{
                $kra_appr=0;
            }


            ?>
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">My KRA Approved</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle chk_user_status" id="kra_Approved"><a href="#">Approved</a></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $kra_appr;?>"><?php echo $kra_appr;?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
       
    </div>
    <!--End my Setgoal-->
</div>
</div>
<!--Begin my team members Setgoal-->
<div class="portlet box blue" id="team_set">
    <div class="portlet-title">
        <div class="caption">
            MY TEAM MEMBERS SET GOALS </div>
        <div class="tools">
            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
           
        </div>
    </div>
    <div class="portlet-body" style="display:none ; background-color:#d6dee9">
       <div class="row widget-row" id="Setgoal" style="background-color: rgb(214, 222, 233);">
        <div class="col-md-4" style="padding-top: 18px;">
            <!-- BEGIN WIDGET THUMB -->
            <?php
            if (isset($team_set) && count($team_set)>0){
                $kra_submitted=count($team_set);
            }
            else{
                $kra_submitted=0;
            }

            ?>

            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
               
                <h4 class="widget-thumb-heading">Team members Submitted kra</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green fa fa-check-square-o" style="font-size:40px"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-subtitle chk_team_setgol_status" id="teamkra_Submitted"><a href="#">Submitted</a></span>
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
               <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                    <h4 class="widget-thumb-heading">Team members kra approval pending</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-red fa fa-times" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chk_team_setgol_status" id="teamkra_Pending"><a href="#">Pending Approval</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $kra_pending;?>"><?php echo $kra_pending;?></span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4"  style="padding-top: 18px;">
                <!-- BEGIN WIDGET THUMB -->
               <?php if(isset($team_kra_appr) && count($team_kra_appr)>0 ) {
                $team_kra_appr=count($team_kra_appr);
              }
              else{
                $team_kra_appr=0;
              }
               


               ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                    <h4 class="widget-thumb-heading">Team members kra approval done </h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chk_team_setgol_status" id="teamkra_Approved"><a href="#">Approved</a></span>
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



<!--Begin  MY MID YEAR REVIEW-->
 <div class="portlet box blue" id="my_mid">  
    <div class="portlet-title">  
       <div class="caption"> 
     MY MID YEAR REVIEW </div>  
        <div class="tools"> 
            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
        </div>
     </div>
     <div class="portlet-body" style="display:none ; background-color:#d6dee9">
                                            
        <div class="row widget-row" id="Mid_review" style="background-color: rgb(214, 222, 233);">
        <div class="col-md-4"  style="padding-top: 18px;">
        <!-- BEGIN WIDGET THUMB -->
        <?php
        if (isset($kra_mid_appr) && count($kra_mid_appr)>0){
        $mid_appr=count($kra_mid_appr);
        }
        else{
        $mid_appr=0;
        }


        ?>
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
        <h4 class="widget-thumb-heading">My Mid year review Approved</h4>
        <div class="widget-thumb-wrap">
        <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
        <div class="widget-thumb-body">
        <span class="widget-thumb-subtitle chk_mid_stat" id="mid_Approved"><a href="#">Approved</a></span>
        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $mid_appr;?>"><?php echo $mid_appr;?></span>
        </div>
        </div>
        </div>  
        <!-- END WIDGET THUMB -->
        </div>
    </div>
</div>
</div>
<!--End  MY MID YEAR REVIEW-->
<!--Begin   MY TEAM MEMBERS MID YEAR REVIEW-->
<div class="portlet box blue" id="team_mid">  
            <div class="portlet-title">  
               <div class="caption"> 
             MY TEAM MEMBERS MID YEAR REVIEW </div>  
             <div class="tools"> 
             <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                       
            </div>
        </div>
        <div class="portlet-body" style="display:none ; background-color:#d6dee9">
        <div class="row widget-row" id="Mid_review" style="background-color: rgb(214, 222, 233);">
              <div class="col-md-4"  style="padding-top: 18px;">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($mid_kra_team_sub) && count($mid_kra_team_sub)>0){
                    $mid_appr=count($mid_kra_team_sub);
                }
                else{
                    $mid_appr=0;
                }


                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                    <h4 class="widget-thumb-heading">Team members Mid year review Submitted</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chkteam_mid_stat" id="taemmid_Submitted"><a href="#">Submitted</a></span>
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
                        $yerA_pending=count($mid_team_not_sub);
                    }
                    else{
                        $yerA_pending=0;
                    }


                    ?>
                  <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">Team members Mid year review not submitted</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-red fa fa-times" style="font-size:40px"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle chkteam_mid_stat" id="taemmid_Pending"><a href="#">Not Submitted</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerA_pending;?>"><?php echo $yerA_pending;?></span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>

        </div>
    </div>
</div>

<!--End MY TEAM MEMBERS MID YEAR REVIEW-->
<!--Begin My Year End A Review-->
 <div class="portlet box blue" id="my_yearA">  
    <div class="portlet-title">  
       <div class="caption"> 
        MY YEAR END(A) REVIEW </div>  
        <div class="tools"> 
        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                               
        </div>
        </div>
       <div class="portlet-body" style="display:none ; background-color:#d6dee9">
          <div class="row widget-row" id="YearA" style="background-color: rgb(214, 222, 233);">
            <div class="col-md-4"  style="padding-top: 18px;">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($kra_YerA_sub) && count($kra_YerA_sub)>0){
                    $yerA_submitted=count($kra_YerA_sub);
                }
                else{
                    $yerA_submitted=0;
                }

                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                    <h4 class="widget-thumb-heading">My Year end A Submitted</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-green fa fa-check-square-o" style="font-size:40px"></i>
                        <div class="widget-thumb-body">

                            <span class="widget-thumb-subtitle chk_yerA_status" id="yerA_Submitted"><a href="#">Submitted</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerA_submitted?>"><?php echo $yerA_submitted?></span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4" style="padding-top: 18px;">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($kra_YerA_pend) && count($kra_YerA_pend)>0){
                    $yerA_pending=count($kra_YerA_pend);
                }
                else{
                    $yerA_pending=0;
                }


                ?>
              <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                    <h4 class="widget-thumb-heading">My Year end A Pending Approval</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-red fa fa-times" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chk_yerA_status" id="yerA_Pending"><a href="#">Pending Approval</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerA_pending;?>"><?php echo $yerA_pending;?></span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-4" style="padding-top: 18px;">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($kra_YerA_appr) && count($kra_YerA_appr)>0){
                    $yerA_appr=count($kra_YerA_appr);
                }
                else{
                    $yerA_appr=0;
                }


                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                    <h4 class="widget-thumb-heading">My Year end A Approved</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle chk_yerA_status" id="yerA_Approved"><a href="#">Approved</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerA_appr;?>"><?php echo $yerA_appr;?></span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
        </div>
    </div> 
</div>
<!--End My Year end Review A-->

<!--Begin My Team members Year end Review A-->
 <div class="portlet box blue" id="team_yearA">  
    <div class="portlet-title">  
       <div class="caption"> 
     MY TEAM MEMBER'S YEAR END(A) REVIEW </div>  
        <div class="tools"> 
        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
        </div>
        </div>
              <div class="portlet-body" style="display:none ; background-color:#d6dee9">
              <div class="row widget-row" id="YearA" style="background-color: rgb(214, 222, 233);">
                <div class="col-md-4"  style="padding-top: 18px;">
                    <!-- BEGIN WIDGET THUMB -->
                    <?php
                    if (isset($kra_YerA_sub) && count($kra_YerA_sub)>0){
                        $yerA_submitted=count($kra_YerA_sub);
                    }
                    else{
                        $yerA_submitted=0;
                    }

                    ?>
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">My Year end A Submitted</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-green fa fa-check-square-o" style="font-size:40px"></i>
                            <div class="widget-thumb-body">

                                <span class="widget-thumb-subtitle chk_yerA_status" id="yerA_Submitted"><a href="#">Submitted</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerA_submitted?>"><?php echo $yerA_submitted?></span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-4" style="padding-top: 18px;">
                    <!-- BEGIN WIDGET THUMB -->
                    <?php
                    if (isset($kra_YerA_pend) && count($kra_YerA_pend)>0){
                        $yerA_pending=count($kra_YerA_pend);
                    }
                    else{
                        $yerA_pending=0;
                    }


                    ?>
                  <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">My Year end A Pending Approval</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-red fa fa-times" style="font-size:40px"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle chk_yerA_status" id="yerA_Pending"><a href="#">Pending Approval</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerA_pending;?>"><?php echo $yerA_pending;?></span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-4" style="padding-top: 18px;">
                    <!-- BEGIN WIDGET THUMB -->
                    <?php
                    if (isset($kra_YerA_appr) && count($kra_YerA_appr)>0){
                        $yerA_appr=count($kra_YerA_appr);
                    }
                    else{
                        $yerA_appr=0;
                    }


                    ?>
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">My Year end A Approved</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-purple fa fa-thumbs-up" style="font-size:40px"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle chk_yerA_status" id="yerA_Approved"><a href="#">Approved</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerA_appr;?>"><?php echo $yerA_appr;?></span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
            </div>
        </div>
    </div>
<!--End My Team members Year end Review A-->

<!-- Begin MY YEAR END(B) REVIEW-->
<div class="portlet box blue" id="my_yearB">  
    <div class="portlet-title">  
       <div class="caption"> 
     MY YEAR END(B) REVIEW </div>  
        <div class="tools"> 
            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body" style="display:none ; background-color:#d6dee9">
        <div class="row widget-row" id="Mid_review" style="background-color: rgb(214, 222, 233);">
            <div class="col-md-4"  style="padding-top: 18px;">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($yerB_data) && count($yerB_data)>0){
                    $yerB_sub=count($yerB_data);
                }
                else{
                    $yerB_sub=0;
                }

                ?>
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                    <h4 class="widget-thumb-heading">My Year end B Submitted</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-green fa fa-check-square-o" style="font-size:40px"></i>
                        <div class="widget-thumb-body">

                            <span class="widget-thumb-subtitle chk_yerB_status" id="yerB_Submitted"><a href="#">Submitted</a></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerB_sub?>"><?php echo $yerB_sub?></span>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($kra_mid_sub) && count($kra_mid_sub)>0){
                    $mid_kra_submitted=count($kra_mid_sub);
                }
                else{
                    $mid_kra_submitted=0;
                }

                ?>
            </div>
            <div class="col-md-4">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($kra_mid_pending) && count($kra_mid_pending)>0){
                    $mid_pending=count($kra_mid_pending);
                }
                else{
                    $mid_pending=0;
                }


                ?>
         
            </div>

        </div>
        <div class="row widget-row" id="YearB">
            <div class="col-md-4">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($yerB_data) && count($yerB_data)>0){
                    $yerB_sub=count($yerB_data);
                }
                else{
                    $yerB_sub=0;
                }

                ?>
       
            </div>
            <div class="col-md-4">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($yerB_pending) && count($yerB_pending)>0){
                    $yerB_pending1=count($yerB_pending);
                }
                else{
                    $yerB_pending1=0;
                }


                ?>

            </div>
            <div class="col-md-4">
                <!-- BEGIN WIDGET THUMB -->
                <?php
                if (isset($yerB_appr) && count($yerB_appr)>0){
                    $yerB_appr1=count($yerB_appr);
                }
                else{
                    $yerB_appr1=0;
                }


                ?>

            </div>
        </div>
  </div>  
</div>
 <!--End Year B goal-->
                       
 <!--Begin MY TEAM MEMBER'S YEAR END(B) REVIEW-->

<div class="portlet box blue" id="team_yearB">  
    <div class="portlet-title">  
       <div class="caption"> 
     MY TEAM MEMBER'S YEAR END(B) REVIEW </div>  
        <div class="tools"> 
            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
        </div>
        </div>
        <div class="portlet-body" style="display:none ; background-color:#d6dee9">
            <div class="row widget-row" id="Mid_review" style="background-color: rgb(214, 222, 233);">
                <div class="col-md-4"  style="padding-top: 18px;">
                    <!-- BEGIN WIDGET THUMB -->
                    <?php
                    if (isset($yerB_data) && count($yerB_data)>0){
                        $yerB_sub=count($yerB_data);
                    }
                    else{
                        $yerB_sub=0;
                    }

                    ?>
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">My Year end B Submitted</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-green fa fa-check-square-o" style="font-size:40px"></i>
                            <div class="widget-thumb-body">

                                <span class="widget-thumb-subtitle chk_yerB_status" id="yerB_Submitted"><a href="#">Submitted</a></span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $yerB_sub?>"><?php echo $yerB_sub?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($kra_mid_sub) && count($kra_mid_sub)>0){
                        $mid_kra_submitted=count($kra_mid_sub);
                    }
                    else{
                        $mid_kra_submitted=0;
                    }

                    ?>
                   
                    </div>
                    <div class="col-md-4">
                        <!-- BEGIN WIDGET THUMB -->
                        <?php
                        if (isset($kra_mid_pending) && count($kra_mid_pending)>0){
                            $mid_pending=count($kra_mid_pending);
                        }
                        else{
                            $mid_pending=0;
                        }


                        ?>
                 
                    </div>
                </div>
                <div class="row widget-row" id="YearB">
                    <div class="col-md-4">
                        <!-- BEGIN WIDGET THUMB -->
                        <?php
                        if (isset($yerB_data) && count($yerB_data)>0){
                            $yerB_sub=count($yerB_data);
                        }
                        else{
                            $yerB_sub=0;
                        }

                        ?>
               
                    </div>
                    <div class="col-md-4">
                        <!-- BEGIN WIDGET THUMB -->
                        <?php
                        if (isset($yerB_pending) && count($yerB_pending)>0){
                            $yerB_pending1=count($yerB_pending);
                        }
                        else{
                            $yerB_pending1=0;
                        }


                        ?>

                    </div>
                    <div class="col-md-4">
                        <!-- BEGIN WIDGET THUMB -->
                        <?php
                        if (isset($yerB_appr) && count($yerB_appr)>0){
                            $yerB_appr1=count($yerB_appr);
                        }
                        else{
                            $yerB_appr1=0;
                        }


                        ?>

                    </div>
                </div>
             </div>
       </div>

 <!--End MY TEAM MEMBER'S YEAR END(B) REVIEW-->


<div>
<div class="col-md-12" style="margin-top: 18px;">
    <div class="row">
       <!--  <div class="col-md-6">  
                         
                                  

 <div id="cluster_name"  >   


<div class="portlet-body">
                <div class="mt-element-list">
                    <?php

                       if(isset($cluster_head['0']['Emp_fname'])&& isset($cluster_head['0']['Emp_lname'])){
                        $cluster_head_nm=$cluster_head['0']['Emp_fname']." ".$cluster_head['0']['Emp_lname'];
                       }
                       else{
                        $cluster_head_nm="";
                       }
                    ?>
                    <div class="mt-list-head list-todo red" style="background-color:#031f4e">
                        <div class="list-head-title-container">
                            <h3 class="list-title">Cluster Head:-<?php echo $cluster_head_nm; ?>
                            
                        </div>
                       
                    </div>
                    <div class="mt-list-container list-todo">
                        <div class="list-todo-line"></div>
                        <ul>
                            
                            <li class="mt-list-item">
                                 <div class="list-todo-item dark">
                                    <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-3" aria-expanded="false">
                                        <div class="list-toggle done uppercase" style="background-color:#005F68">
                                            <div class="list-toggle-title bold">Cluster Data</div>
                                            
                                        </div>
                                    </a>
                                    <div class="task-list panel-collapse collapse" id="task-3">
                                        <ul>


                                             <?php
                                            if (isset($emp_data_desc) && count($emp_data_desc)>0) {
                                            
                                            for ($i=0; $i < count($emp_data_desc); $i++) { 
                                            
                                            ?>
                                            <li class="task-list-item done" style="border-bottom: 1px solid #e7ecf1">
                                            <?php  echo $emp_data_desc[$i]['department'];?>                                          
                                             
                                            </li>

                                           
                                         <?php
                                            }
                                            }
                                            ?>
                                         


                                            

                                          
                                        </ul>
                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
 





</div>    
</div>  
 -->







 <div class="col-md-12">    
 
            <div class="portlet-body">
                                            <div class="mt-element-list">
                                                <div class="mt-list-head list-todo dark">
                                                    <div class="list-head-title-container">
                                                        <h3 class="list-title">My Activities</h3>
                                                        
                                                    </div>
                                                    <a href="javascript:;">
                                                        
                                                    </a>
                                                </div>
                                                <div class="mt-list-container list-todo">
                                                   
                                                    <ul>
                                                        <li class="mt-list-item">
                                                            <div class="list-todo-icon bg-white font-blue-steel">
                                                                
                                                            </div>
                                                            <div class="list-todo-item blue-steel">
                                                                <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-1-2" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase">
                                                                        <div class="list-toggle-title bold">Check Activies</div>
                                                                        
                                                                    </div>
                                                                </a>
                                                                <div class="task-list panel-collapse collapse " id="task-1-2">
                                                                    <ul>
                                                                        <li class="task-list-item done" >
                                                                                                                <marquee style="position: relative;" behavior="scroll" align="center" direction="up" scrollamount="2" scrolldelay="5">
                                           <?php
                                           if(isset($my_recent_act)&& count($my_recent_act)>0){
                                            if(count($my_recent_act)>5){
                                                $k=5;
                                            }
                                            else{
                                                $k=count($my_recent_act);
                                            }
                                            for($i=0;$i<$k;$i++) 
                                           { 
                                            ?>
                                            <li class="task-list-item done">
                                            <?php  echo $my_recent_act[$i]['notification_type']?>                                          
                                              <span style="float:ri"><?php  echo $my_recent_act[$i]['date']?></span> 
                                            </li>

                                           
                                         <?php
                                            }
                                            }
                                            ?>
                                              </marquee>
                                                                        
                                                                    </ul>
                                                                    
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

 
</div>
</div>
  </div>

<div>


                                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
       
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
          

<div id="responsive" style="top: 20%;"  class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">KRA List</h4>
        </div>
        <div class="modal-body">
            
            <table  class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
        <thead>
            <tr>
                    <th>KRA Name</th>
                    <th>Weightage</th>
                    <th>Status</th>
                    
                    
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


 </div>
                <!-- END CONTENT BODY -->
            </div>



                           
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>       
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/profile.min.js" type="text/javascript"></script>     
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>   

