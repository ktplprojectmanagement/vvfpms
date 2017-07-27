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
                            <h1>Normalization</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="http://www.google.com/jsapi?ext.js"></script>
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
.col-sm-12
{
margin-left: 0px;
}
      
   </style>
<script>
function drawCharttarget() {

var data = new google.visualization.DataTable();

data.addColumn('number', 'X Value');

data.addColumn('number', 'Y Value');

function NormalDensityZx(x, Mean, StdDev) {

var a = x - Mean;

return Math.exp(-(a * a) / (2 * StdDev * StdDev)) / (Math.sqrt(2 * Math.PI) * StdDev);

}

var chartData = new Array([]);

var index = 0;

for (var i = -1; i < 6; i += 0.1) {

chartData[index] = new Array(2);

chartData[index][0] = i;

chartData[index][1] = NormalDensityZx(i, 3, 1);

index++;

}

data.addRows(chartData);

var options = {
'title': 'Performance Normalization',
        'height': 200,
        'width': '100%',
        'backgroundColor': 'none',
   legend: 'none',
          hAxis: { 
 gridlines: {
              //color:'#ddd',
              count:0
            },
},
vAxis: {
            baselineColor: '#ccc',
          //scaleType: 'mirrorLog',
          ticks: []
        },
          colors: ['#2CBB17'],

    };

var chart = new google.visualization.AreaChart(document.getElementById('chart_div_target'));

chart.draw(data, options);

}

google.load('visualization', '1', { packages: ['corechart'], callback: drawCharttarget });

function drawChart() {

var data = new google.visualization.DataTable();

//data.addColumn('string', 'X Value');
data.addColumn('number', 'X Value');

data.addColumn('number', 'Y Value');
data.addColumn({type:"string",role:"style"});

//data.addColumn('string', 'X Value');

function NormalDensityZx(x, Mean, StdDev) {

var a = x - Mean;
//alert('x :'+x+';'+'Mean :'+Mean+'a :'+a);
return Math.exp(-(a * a) / (2 * StdDev * StdDev)) / (Math.sqrt(2 * Math.PI) * StdDev);
//return a/StdDev;
}

var chartData = new Array([]);

var index = 0;
var result_get = $("#result_value").text();
var result_get1 = result_get.split(';');
var value = result_get1[0];
var array = ['3','2.8','2.9','3.5','5'];
var detail_data = [1,2.5,3,3.5,4,3.8,2];
for ( var i = -1; i < 6; i += 0.1 ) {

chartData[index] = new Array(2);
var n = i.toFixed(2); 
var b = detail_data[i] - 3;
var std_dev =  b/value;
chartData[index][0] = i;
//console.log(std_dev);console.log(NormalDensityZx(detail_data[i],2,3));
chartData[index][1] = NormalDensityZx(i,value,result_get1[1]);
if (i==-1 || i<1.8) 
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
else if(i>=1.8 && i<=3.2)
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
else if(i>3.2)
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
//chartData[index][2] = 'fill-color: #a52714;';
var y1 = 0.21969564473386083;
console.log(chartData[index][1]);
index++;
}
console.log(chartData);
//alert(chartData);
data.addRows(chartData);
var options = {
'title': 'Performance Normalization',
        'height': 200,
        'width': '100%',
        'backgroundColor': 'none',
   legend: 'none',
          hAxis: { 
 gridlines: {
              //color:'#ddd',
              count:0
            },
},
vAxis: {
            baselineColor: '#ccc',
          //scaleType: 'mirrorLog',
          ticks: []
        },
          colors: ['#795548'],

    };
var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
chart.draw(data, options);
}
function drawChart1() {

var data = new google.visualization.DataTable();

//data.addColumn('string', 'X Value');
data.addColumn('number', 'X Value');

data.addColumn('number', 'Y Value');
data.addColumn({type:"string",role:"style"});

//data.addColumn('string', 'X Value');

function NormalDensityZx(x, Mean, StdDev) {

var a = x - Mean;
//alert('x :'+x+';'+'Mean :'+Mean+'a :'+a);
return Math.exp(-(a * a) / (2 * StdDev * StdDev)) / (Math.sqrt(2 * Math.PI) * StdDev);
//return a/StdDev;
}

var chartData = new Array([]);

var index = 0;
var result_get = $("#result_value").text();
var result_get1 = result_get.split(';');
var value = result_get1[2];
var array = ['3','2.8','2.9','3.5','5'];
var detail_data = [1,2.5,3,3.5,4,3.8,2];
for ( var i = -1; i < 6; i += 0.1 ) {

chartData[index] = new Array(2);
var n = i.toFixed(2); 
var b = detail_data[i] - 3;
var std_dev =  b/value;
chartData[index][0] = i;
//console.log(std_dev);console.log(NormalDensityZx(detail_data[i],2,3));
chartData[index][1] = NormalDensityZx(i,value,result_get1[3]);
if (i==-1 || i<1.8) 
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
else if(i>=1.8 && i<=3.2)
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
else if(i>3.2)
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
var y1 = 0.21969564473386083;
console.log(chartData[index][1]);
index++;
}
console.log(chartData);
//alert(chartData);
data.addRows(chartData);
var options = {
'height': 200,
        'width': '100%',
        'backgroundColor': 'none',
   legend: 'none',
          hAxis: { 
gridlines: {
              //color:'#ddd',
              count:0
            },
 },
vAxis: {
            baselineColor: '#ccc',
          //scaleType: 'mirrorLog',
          ticks: []
        },
          colors: ['#15A0C8'],


    };

var chart1 = new google.visualization.AreaChart(document.getElementById('chart_div1'));
chart1.draw(data, options);
}

function drawChart2() {

var data = new google.visualization.DataTable();

//data.addColumn('string', 'X Value');
data.addColumn('number', 'X Value');

data.addColumn('number', 'Y Value');
data.addColumn({type:"string",role:"style"});

//data.addColumn('string', 'X Value');

function NormalDensityZx(x, Mean, StdDev) {

var a = x - Mean;
//alert('x :'+x+';'+'Mean :'+Mean+'a :'+a);
return Math.exp(-(a * a) / (2 * StdDev * StdDev)) / (Math.sqrt(2 * Math.PI) * StdDev);
//return a/StdDev;
}

var chartData = new Array([]);

var index = 0;
var result_get = $("#result_value").text();
var result_get1 = result_get.split(';');
var value = result_get1[4];
var array = ['3','2.8','2.9','3.5','5'];
var detail_data = [1,2.5,3,3.5,4,3.8,2];
for ( var i = -1; i < 6; i += 0.1 ) {

chartData[index] = new Array(2);
var n = i.toFixed(2); 
var b = detail_data[i] - 3;
var std_dev =  b/value;
chartData[index][0] = i;
//console.log(std_dev);console.log(NormalDensityZx(detail_data[i],2,3));
chartData[index][1] = NormalDensityZx(i,value,result_get1[5]);
if (i==-1 || i<1.8) 
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
else if(i>=1.8 && i<=3.2)
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
else if(i>3.2)
{
chartData[index][2] = 'fill-color: #eff3f8;';
}
var y1 = 0.21969564473386083;
console.log(chartData[index][1]);
index++;
}
console.log(chartData);
//alert(chartData);
data.addRows(chartData);
var options = {
'height': 200,
        'width': '100%',
        'backgroundColor': 'none',
   legend: 'none',
          hAxis: { 
gridlines: {
              //color:'#ddd',
              count:0
            },
 },
vAxis: {
            baselineColor: '#ccc',
          //scaleType: 'mirrorLog',
          ticks: []
        },
          colors: ['#F9A11C'],
fillOpacity: .3,

    };

var chart2 = new google.visualization.AreaChart(document.getElementById('chart_div2'));
chart2.draw(data, options);
}
</script>
<div class="alert alert-danger fade in" id="err" style="display: none"></div>
<div class="col-md-12">   
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
            <script type="text/javascript"> 
            $(document).ready(function() {
    $('#example').DataTable();
   
 
    // #myInput is a <input type="text"> element
    // $('#search_this_table').on( 'keyup', function () {
    //     table.search( this.value ).draw();
    // } );
    $("#example").parent().css({
    // 'height' : '334px',
    // 'max-height' : '334px',
    // 'overflow-y' : 'scroll'
    });
    $("body").on('keyup','.chk_number',function(){
        $("#err").removeClass("alert-success"); 
        $("#err").removeClass("alert-danger"); 
        var str = /^([1-5]{1})$/;
        var data = $(this).val();
        if (!str.test(data)) 
        {
            $("#err").show();  
            $("#err").fadeOut(6000);
            $("#err").text("Only numbers are allwed for normalization rating");
            $("#err").addClass("alert-danger");
        }
    });
    // $("#example").prev().css("height", "334px");
    // $("#example").prev().css("max-height", "334px");
    // $("#example").prev().css("overflow-y", "scroll");
} );
            </script>
            <script type="text/javascript">
    $(function(){
                $('.get_dept').change(function(){                                           
                var dept_name = {
                    Department : $(this).find(':selected').val(),
                    cluster_name : $('.get_cluster').find(':selected').val(),
                    reporting_head_name :$('.get_reporting_manager').find(':selected').val(),
                    BU_name : $('.get_BU').find(':selected').val(),
                };
                console.log(dept_name);
                var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : dept_name,
                    url : base_url+'/index.php?r=Normalization/getdata',
                    success : function(data)
                    {
                        //alert(data);
                        var splited_data = data.split(';');                       
                       var table = $('#example').DataTable();
                     table.clear().draw();
                    table.rows.add($(splited_data[0])).draw();
                       $("#emp_list_data_count").text(splited_data[1]);
                        $('#example').DataTable();          
                    }
                });
            });

            $('.get_BU').change(function(){                                           
                var dept_name = {
                    Department : $(this).find(':selected').val(),
                    cluster_name : $('.get_cluster').find(':selected').val(),
                    reporting_head_name :$('.get_reporting_manager').find(':selected').val(),
                    BU_name : $(this).find(':selected').val(),
                };
                console.log(dept_name);
                var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : dept_name,
                    url : base_url+'/index.php?r=Normalization/getdata',
                    success : function(data)
                    {
                        //alert(data);
                        var splited_data = data.split(';');                       
                       var table = $('#example').DataTable();
                     table.clear().draw();
                    table.rows.add($(splited_data[0])).draw();
                       $("#emp_list_data_count").text(splited_data[1]);
                        $('#example').DataTable();          
                    }
                });
            });

            $('.get_reporting_manager').change(function(){                                           
                var dept_name = {
                    Department : $('.get_dept').find(':selected').val(),
                    cluster_name : $('.get_cluster').find(':selected').val(),
                    reporting_head_name : $(this).find(':selected').val(),
                    BU_name : $('.get_BU').find(':selected').val(),
                };
                console.log(dept_name);
                var base_url = window.location.origin;
                $.ajax({
                    type : 'post',
                    datatype : 'html',
                    data : dept_name,
                    url : base_url+'/index.php?r=Normalization/getdata',
                    success : function(data)
                    {
                        //alert(data);
                        var splited_data = data.split(';');                       
                       var table = $('#example').DataTable();
                     table.clear().draw();
                    table.rows.add($(splited_data[0])).draw();
                       $("#emp_list_data_count").text(splited_data[1]);
                        $('#example').DataTable();          
                    }
                });
            });
            
            $('.get_cluster').change(function(){
            var dept_name = {
                Department : $('.get_dept').find(':selected').val(),
                cluster_name : $(this).find(':selected').val(),
                reporting_head_name :$('.get_reporting_manager').find(':selected').val(),
                BU_name : $('.get_BU').find(':selected').val(),
            };
            console.log(dept_name);
            var base_url = window.location.origin;
            $.ajax({
                type : 'post',
                datatype : 'html',
                data : dept_name,
                url : base_url+'/index.php?r=Normalization/getdata',
                success : function(data)
                {
                    //$('#dept_based_emp').html()
                    var splited_data = data.split(';');
                    // alert(splited_data[0]);
                     var table = $('#example').DataTable();
                     table.clear().draw();
                    table.rows.add($(splited_data[0])).draw();
                   //$('#dept_based_emp').html(splited_data[0]);
                   $("#emp_list_data_count").text(splited_data[1]);
                   $('#example').DataTable();          
                }
            });
        });
        });
</script>
<?php
        $BU_form = new BUHeadForm;
        $plant_head = new PlantHeadForm;
        $employee = new EmployeeForm;

        $where = 'where cluster_appraiser = :cluster_appraiser';
	$list = array('cluster_appraiser');
	$data = array(Yii::app()->user->getState("employee_email"));
	$cluster_head = $employee->get_employee_data($where,$data,$list);

        $where = 'where email_id = :email_id';
        $list = array('email_id');
        $data = array(Yii::app()->user->getState("employee_email"));
        $is_bu = $BU_form->get_bu_data($where,$data,$list);

        $where = 'where email_id = :email_id';
        $list = array('email_id');
        $data = array(Yii::app()->user->getState("employee_email"));
        $is_plant_head = $plant_head->get_plant_head_data($where,$data,$list);
//print_r($is_plant_head);die();
?>
             <style type="text/css">
                #example_filter
                {
                    display: none;
                }
                #example_length
                {
                    display: none;
                }
                #example_info
                {
                    display: none;
                }
.col-sm-12
{
margin-left: 0px;
}
            </style>

<input type="button" value="Confirm" class="final_normalize btn border-blue-soft" style="float:right" <?php if(isset($cluster_head) && count($cluster_head)>0) {?>id="cluster_head"<?php }else if(isset($is_bu) && count($is_bu)>0) { ?>id="bu"<?php }else if(isset($is_plant_head) && count($is_plant_head)>0) { ?>id="plant_head"<?php } ?>>
<div style="overflow-x:auto;">                            
<label id="emp_list_data_count" style="display: none"><?php echo count($employee_list); ?></label>

                                <table class="table table-striped table-bordered table-hover table-fixedheader scroll" id='example' style="height: auto">
                                              <thead class="thead-default">
                                                        <tr> 
                                                            <th></th>
                                                            <th></th>
                                                            <th>

                               <div class="col-md-3">                                 
                                <select class="form-control get_cluster" style="width: 186px;"name="get_cluster" id="get_cluster">
                                                <option value="All">All</option>
                                                <?php
                                                    if (isset($diff_cluster) && count($diff_cluster)>0) {
                                                        foreach ($diff_cluster as $row) { ?>
                                                            <option value="<?php echo $row['cluster_name'];?>"><?php echo $row['cluster_name'];?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                </select>
                            </div>
</th>
                                                            <th>
<div class="col-md-3">
                                    <select class="form-control get_dept" style="width: 186px;"name="get_dept" id="get_dept">
                                            <option value="All">All</option>
                                            <?php
                                                if (isset($diff_Department) && count($diff_Department)>0) {
                                                    foreach ($diff_Department as $row) { ?>
                                                        <option value="<?php echo $row['Department'];?>"><?php echo $row['Department'];?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                    </select><br>
                            </div>
</th>

                                                            <th>
<div class="col-md-3">
                                    <select class="form-control get_reporting_manager" style="width: 186px;"name="get_reporting_manager" id="get_reporting_manager">
                                            <option value="All">All</option>
                                            <?php
                                                if (isset($dep_head_data) && count($dep_head_data)>0) {
                                                    foreach ($dep_head_data as $row) { ?>
                                                        <option value="<?php echo $row['0']['Reporting_officer1_id'];?>"><?php echo $row['0']['Emp_fname']." ".$row['0']['Emp_lname'];?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                    </select><br>
                            </div>
</th>
                                                            <th></th>
                                                            <th></th>
<th> </th>
<th> </th>
                                                            <th>
<div class="col-md-3">
                              
                                    <select class="form-control get_BU" style="width: 186px;"name="get_BU" id="get_BU">
                                            <option value="All">All</option>
                                            <?php
                                                if (isset($dep_head_data) && count($dep_head_data)>0) {
                                                    foreach ($dep_head_data as $row) { ?>
                                                        <option value="<?php echo $row['0']['BU'];?>"><?php echo $row['0']['BU'];?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                    </select><br>
                            </div>
</th>
                                                        </tr>
                                                       <tr style="background-color: RGBA(21, 69, 147, 0.32);"> 
                                                            <th style="width: 152px;position: fixed;height: 57px;left: 243px;background-color: rgb(168, 187, 215);min-width: 152px;">Emp Id</th>
                                                            <th>Emp Name</th>
                                                            <th>Cluster</th>
                                                            <th>Promotion</th>
                                                            <th>Department</th>
                                                            <th>Reporting Officer</th>
                                                            <th>Performance Rating</th>
                                                            <th>Qualitative Rating</th>
<?php if((isset($cluster_head) && count($cluster_head)>0) || (isset($is_plant_head) && count($is_plant_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
<th>Cluster Head Rating</th>
<th>Cluster Head Comments</th>
<?php } ?>
<?php if((isset($is_plant_head) && count($is_plant_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
<th >Plant Head Rating</th>
<th >Plant Head Comments</th>
<?php } ?>
<?php if(isset($is_bu) && count($is_bu)>0) { ?>
                                                            <th >BU Rating</th>
<th >BU Head Comments</th>
<?php } ?>
<th >Check</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dept_based_emp">
                                                    <?php
                                                        if (isset($employee_list)) { ?>                                                        
                                                           <?php 
                                                

                                                           $cnt = 0;
                                                           foreach ($employee_list as $row) {
                                                $normalize_rating =new NormalizeRatingForm;
	                                        $where1 = 'where Employee_id = :Employee_id';
						$list1 = array('Employee_id');
						$data2 = array($row['Employee_id']);
						$normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1); 
//print_r($IDPForm_data);die();
?>                                                           
                                                            <tr>                                                             
                                                                <td style="width: 152px;position: fixed;height: 51px;left: 243px;left: 243px;
background-color: rgb(168, 187, 215);" id="emp_id-<?php echo $cnt; ?>"><?php echo $row['Employee_id']; ?></td>
                                                                <td><?php echo $row['Emp_fname']; ?></td>
                                                                <td><?php echo $row['cluster_name']; ?></td>
<td><?php if(isset($IDPForm_data[$cnt]['0']['career_plan']) && $IDPForm_data[$cnt]['0']['career_plan'] == "Promotion") { ?><a href='<?php echo Yii::app()->createUrl("index.php/Year_endreview/appraiser_end_review1",array("Employee_id"=>$row['Employee_id'])); ?>' style="color: green;" target="_blank"><?php if(isset($IDPForm_data[$cnt]['0']['career_plan'])){ echo $IDPForm_data[$cnt]['0']['career_plan']; } ?></a><?php } ?></td>
                                                                <td><?php echo $row['Department']; ?></td>
                                                                <td><?php echo $row['Reporting_officer1_id']; ?></td>
                                                                <td><?php if(isset($normalize_rating_data['0']['performance_rating'])){ echo $normalize_rating_data['0']['performance_rating']; }?></td>
                                                                <td><?php if(isset($normalize_rating_data['0']['Tota_score'])){ echo $normalize_rating_data['0']['Tota_score']; }?></td>
<?php if((isset($cluster_head) && count($cluster_head)>0) || (isset($is_plant_head) && count($is_plant_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
<td><input class="form-control chk_number cluster_head_data-<?php echo $cnt; ?>" id="cluster_head_data-<?php echo $cnt; ?>" placeholder="Enter text" type="text"></td>
<td><input class="form-control cluster_head_comment" id="cluster_head_comment-<?php echo $cnt; ?>" placeholder="Enter text" type="text"></td>
<?php } ?>
<?php if((isset($is_plant_head) && count($is_plant_head)>0) || (isset($is_bu) && count($is_bu)>0)) { ?>
                                                                <td><input class="form-control chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" placeholder="Enter text" type="text"></td>
<td><input class="form-control plant_head_comments" id="plant_head_comments-<?php echo $cnt; ?>" placeholder="Enter text" type="text"></td>
<?php } ?>
<?php if(isset($is_bu) && count($is_bu)>0) { ?>
<td><input class="form-control chk_number performance_data-<?php echo $cnt; ?>" id="performance_data-<?php echo $cnt; ?>" placeholder="Enter text" type="text"></td>
<td><input class="form-control bu_head_comments" id="bu_head_comments-<?php echo $cnt; ?>" placeholder="Enter text" type="text"></td>
<td><a href='<?php echo Yii::app()->createUrl("index.php/Year_endreview/appraiser_end_review",array("Employee_id"=>$row['Employee_id'])); ?>' target="_blank"><input class="btn chk_profile" id="$row['Employee_id']" value="Check" type="button"></a></td>
<?php } ?>
                                                            </tr>                                                       
                                                        <?php $cnt++;   }
                                                        }
                                                        else
                                                        { ?>
                                                            <tr>
                                                                <td colspan='6'>No Record Found</td>
                                                            </tr>
                                                    <?php    }
                                                    ?>                        
                                                    </tbody>
                                                </table>
</div>
<div class="row">
                        <div class="col-md-12" style="height:auto;"><div id="chart_div_target"></div><div style="margin-top: -200px;" id="chart_div"></div><div id="chart_div1" style="margin-top: -201px;"></div><div id="chart_div2" style="margin-top: -201px;"></div>
                         <div id='chart_legend' class="col-md-8" style="display: none;float: right;"><div class="col-md-2"><div style="background-color: #ef2f2e;width: 10px;height: 10px"></div>Plant Head Rating</div><div class="col-md-2"><div style="background-color: #5ac8d7;width: 10px;height: 10px"></div>BU Head Rating</div><div class="col-md-2"><div style="background-color: #f9a11c;width: 10px;height: 10px"></div>Cluster Head</div></div>
                        </div>
                            </div>
                                
                                                <!-- <input type='text' id="num1"> -->
                                                
                                            </div>
                                        </div>
                                         
                </div>
                <!-- END CONTENT BODY -->
            </div>

         <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Employee List</h4>

                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                        <div class="col-md-12" style="height:auto;"><div id="chart_div"></div><div id="chart_div1" style="margin-top: -400px;"></div>
                         <div id='chart_legend' class="col-md-8" style="display: none;float: right;"><div class="col-md-2"><div style="background-color: #ef2f2e;width: 10px;height: 10px"></div>Below</div><div class="col-md-2"><div style="background-color: #5ac8d7;width: 10px;height: 10px"></div>Average</div><div class="col-md-2"><div style="background-color: #f9a11c;width: 10px;height: 10px"></div>Excellent</div></div>
                        </div>
                        </div>                        
                    </div>
                </div>
                </div>
                <!-- /.modal-content -->
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type="text/javascript">
               $(function(){
$( "#example" ).parent().closest('div').css( "margin-left", "-208px" );
                $("#get_normalized").click(function(){
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
                var list = '';var list1 = '';
                var total_count = $("#emp_list_data_count").text();var normalize_data = '';var performance_data = '';
                for (var i = 0; i < total_count; i++) {
                    if ($(".normalize_rate-"+i).val() == '' || $(".normalize_rate-"+i).val() === undefined) 
                    {
                        normalize_data = 0;
                    }
                    else
                    {
                        normalize_data = $(".normalize_rate-"+i).val();
                    }

                    if (list == '') 
                    {
                        list = normalize_data;
                    }   
                    else
                    {
                        list = list+','+normalize_data;
                    }
                }
for (var i = 0; i < total_count; i++) {
                    if ($(".cluster_head_data-"+i).val() == '' || $(".performance_data-"+i).val() === undefined) 
                    {
                        performance_data = 0;
                    }
                    else
                    {
                        performance_data = $(".performance_data-"+i).val();
                    }

                    if (list1 == '') 
                    {
                        list1 = performance_data;
                    }   
                    else
                    {
                        list1 = list1+','+performance_data;
                    }
                }
                //alert(list);
               
                  var data = {
                    'array_data' : list,
                    'array_data1' : list1,
                  };
                  var base_url = window.location.origin;
                  $.ajax({
                    type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/pmsuser/standard_dev.php',
                            success : function(data)
                            {
                              $('#result_value').text(data);                              
                              $("#chart_legend").css('display','block');
                             // jQuery("#large").modal('show');              
                              google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
google.load('visualization', '1', { packages: ['corechart'], callback: drawChart1 });
                            }
                  });
                }); 
$("body").on('click','.final_normalize',function(){
                var emp_id_list = '';var rating = '';var comments = '';var error = '';
                var total_count = $("#emp_list_data_count").text();var normalize_data = '';var performance_data = '';var cluster_head_data = '';
                for (var i = 0; i < total_count; i++) {
if($(this).attr('id') == "cluster_head")
{
if($(".cluster_head_data-"+i).val() == '')
{
error ="Please enter the ratings";break;
}
else if($(".cluster_head_data-"+i).val() !='' && $("#cluster_head_comment-"+i).val() =='')
{
   error ="Please enter the comments to justify the ratings";break;
}
else
{
   error = '';
  if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".cluster_head_data-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".cluster_head_data-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#cluster_head_comment-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#cluster_head_comment-"+i).val();
  }
}  
}
else if($(this).attr('id') == "plant_head")
{
if($(".normalize_rate-"+i).val() == '')
{
error ="Please enter the ratings";break;
}
else if($(".normalize_rate-"+i).val() !='' && $("#plant_head_comments-"+i).val() =='')
{
   error ="Please enter the comments to justify the ratings";break;
}
else
{
  error = '';
  if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".normalize_rate-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".normalize_rate-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#plant_head_comments-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#plant_head_comments-"+i).val();
  }
}
}
else if($(this).attr('id') == "bu")
{
if($(".performance_data-"+i).val() == '')
{
error ="Please enter the ratings";break;
}
else if($(".performance_data-"+i).val() !='' && $("#bu_head_comments-"+i).val() =='')
{
   error ="Please enter the comments to justify the ratings";break;
}
else
{
   error = '';
  if(emp_id_list == '')
  {
    emp_id_list = $("#emp_id-"+i).text();
  }
  else
  {
    emp_id_list = emp_id_list+';'+$("#emp_id-"+i).text();
  }
  if(rating == '')
  {
    rating = $(".performance_data-"+i).val();
  }
  else
  {
    rating = rating+';'+$(".performance_data-"+i).val();
  }
  if(comments == '')
  {
    comments = $("#bu_head_comments-"+i).val();
  }
  else
  {
    comments = comments+';'+$("#bu_head_comments-"+i).val();
  }
}
}
}
//alert(error);
if(error != "")
{
   $("#err").show();
   $("#err").text(error);
}
else
{
//alert(comments);
$("#err").hide();
$("#err").text("");
              var data = {
                    'emp_id_list' : emp_id_list,
                    'rating' : rating,
                    'comments' : comments,
                    'user' : $(this).attr('id')
                  };
                  var base_url = window.location.origin;
                  $.ajax({
                    type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Normalization_process/normalize',
                            success : function(data)
                            {
                              //alert(data);
                            }
                  });
}
});
$("body").on('keyup','.chk_number',function(){

                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
google.load('visualization', '1', { packages: ['corechart'], callback: drawChart1 });
google.load('visualization', '1', { packages: ['corechart'], callback: drawChart2 });
                var list = '';var list1 = '';var list2 = '';
                var total_count = $("#emp_list_data_count").text();var normalize_data = '';var performance_data = '';var cluster_head_data = '';
                for (var i = 0; i < total_count; i++) {
                    if ($(".normalize_rate-"+i).val() == '' || $(".normalize_rate-"+i).val() === undefined) 
                    {
                        normalize_data = 0;
                    }
                    else
                    {
                        normalize_data = $(".normalize_rate-"+i).val();
                    }

                    if (list == '') 
                    {
                        list = normalize_data;
                    }   
                    else
                    {
                        list = list+','+normalize_data;
                    }

if($("#cluster_head_comment-"+i).val() =='')
{
            $("#err").show();
            $("#err").text("Please enter the comments to justify the ratings");
}
else
{
            $("#err").hide();
            $("#err").text("");
}
                }
for (var i = 0; i < total_count; i++) {
                    if ($(".performance_data-"+i).val() == '' || $(".performance_data-"+i).val() === undefined) 
                    {
                        performance_data = 0;
                    }
                    else
                    {
                        performance_data = $(".performance_data-"+i).val();
                    }

                    if (list1 == '') 
                    {
                        list1 = performance_data;
                    }   
                    else
                    {
                        list1 = list1+','+performance_data;
                    }
if ($(".cluster_head_data-"+i).val() == '' || $(".cluster_head_data-"+i).val() === undefined) 
                    {
                        cluster_head_data = 0;
                    }
                    else
                    {
                        cluster_head_data = $(".cluster_head_data-"+i).val();
                    }

                    if (list2 == '') 
                    {
                        list2 = cluster_head_data;
                    }   
                    else
                    {
                        list2 = list2+','+cluster_head_data;
                    }
                }
                //alert(list);
               
                  var data = {
                    'array_data' : list,
                    'array_data1' : list1,
                    'array_data2' : list2,
                  };
                  var base_url = window.location.origin;
                  $.ajax({
                    type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/pmsuser/standard_dev.php',
                            success : function(data)
                            {
                              $('#result_value').text(data);                              
                              $("#chart_legend").css('display','block');
                             // jQuery("#large").modal('show');              
                              google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
google.load('visualization', '1', { packages: ['corechart'], callback: drawChart1 });
google.load('visualization', '1', { packages: ['corechart'], callback: drawChart2 });
                            }
                  });
                }); 
                // ("#get_normalized_curve").click(function(){  alert("fgfg");   
                //   //google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
                // });   
              });
            </script>
            <script type="text/javascript">
            //var $j = jQuery.noConflict();
            function getchart()
            {
                //google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
            }
function getchart1()
            {
                //google.load('visualization', '1', { packages: ['corechart'], callback: drawChart1 });
            }
            $(function(){
              $("#get_normalized_curve").click(function(){
                //google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
              });
            });              
            </script>
<script>
$(function(){
$("#example").parent().closest('div').css('margin-left','0px');
});
</script>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <label id='result_value'></label>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
              