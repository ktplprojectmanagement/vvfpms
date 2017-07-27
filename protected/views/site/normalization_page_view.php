            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                <style media="all" type="text/css">
      
      #err, #error { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 226px;
height: 52px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
      
      }
      
   </style>
                   <div id="err" style="display:none"></div>
                    <h3 class="page-title">Normalization
                    </h3>
                   
                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="http://www.google.com/jsapi?ext.js"></script>

<script>

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
chartData[index][2] = 'fill-color: #ef2f2e;';
}
else if(i>=1.8 && i<=3.2)
{
chartData[index][2] = 'fill-color: #ef2f2e;';
}
else if(i>3.2)
{
chartData[index][2] = 'fill-color: #ef2f2e;';
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
              color:'#ddd',
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
chartData[index][2] = 'fill-color: #ef2f2e;';
}
else if(i>=1.8 && i<=3.2)
{
chartData[index][2] = 'fill-color: #ef2f2e;';
}
else if(i>3.2)
{
chartData[index][2] = 'fill-color: #ef2f2e;';
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
              color:'#ddd',
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
</script>

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
             <style type="text/css">
                #example_filter
                {
                    //display: none;
                }
                #example_length
                {
                    display: none;
                }
                #example_info
                {
                    display: none;
                }
            </style>
                            <div class="col-md-6" style="float: right;padding-top: 26px;"><input type="button" role="button" class="btn change_priority" id="get_normalized" value="Get Chart" style="border: 1px solid rgb(76, 158, 217);float: right;display:none"></div>
<label id="emp_list_data_count" style="display: none"><?php echo count($employee_list); ?></label>
                                <table class="table table-striped table-bordered table-hover table-fixedheader scroll" id='example' style="height: auto">
                                              <thead class="thead-default">
 
                                                       <tr> 
                                                            <th>Emp Id</th>
                                                            <th>Emp Name</th>
                                                            <th>Cluster</th>
                                                            <th>Department</th>
                                                            <th>Reporting Officer</th>
                                                            <th>Performance Rating</th>
                                                            <th>Qualitative Rating</th>
<th>Cluster Head Rating</th>
                                                            <th>Cluster Head Comment</th>
<th>Plant Head Rating</th>
                                                            <th>Plant Head Comment</th>
<th>BU Rating</th>
                                                            <th>BU Comment</th>
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
						$normalize_rating_data = $normalize_rating->get_setting_data($where1,$data2,$list1); ?>                                                           
                                                            <tr>                                                             
                                                                <td><?php echo $row['Employee_id']; ?></td>
                                                                <td><?php echo $row['Emp_fname']; ?></td>
                                                                <td><?php echo $row['cluster_name']; ?></td>
                                                                <td><?php echo $row['Department']; ?></td>
                                                                <td><?php echo $row['Reporting_officer1_id']; ?></td>
                                                                <td><?php if(isset($normalize_rating_data['0']['performance_rating'])){ echo $normalize_rating_data['0']['performance_rating']; }?></td>
                                                                <td><?php if(isset($normalize_rating_data['0']['Tota_score'])){ echo $normalize_rating_data['0']['Tota_score']; }?></td>
                                                                <td><?php if(isset($normalize_rating_data['0']['rating'])) { echo $normalize_rating_data['0']['rating']; } ?></td>
<td><?php if(isset($normalize_rating_data[$cnt]['cluster_head_comments'])) { echo $normalize_rating_data[$cnt]['cluster_head_comments']; } ?></td>
<td><?php if(isset($normalize_rating_data[$cnt]['plant_head_rating'])) { echo $normalize_rating_data[$cnt]['plant_head_rating']; } ?></td>
<td><?php if(isset($normalize_rating_data[$cnt]['plant_head_comment'])) { echo $normalize_rating_data[$cnt]['plant_head_comment']; } ?></td>
<td><?php if(isset($normalize_rating_data[$cnt]['bu_rating'])) { echo $normalize_rating_data[$cnt]['bu_rating']; } ?></td>
<td><?php if(isset($normalize_rating_data[$cnt]['bu_comments'])) { echo $normalize_rating_data[$cnt]['bu_comments']; } ?></td>
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
<div class="row">
                        <div class="col-md-12" style="height:auto;"><div id="chart_div"></div><div id="chart_div1" style="margin-top: -201px;"></div>
                         <div id='chart_legend' class="col-md-8" style="display: none;float: right;"><div class="col-md-2"><div style="background-color: #ef2f2e;width: 10px;height: 10px"></div>BU Rating</div><div class="col-md-2"><div style="background-color: #5ac8d7;width: 10px;height: 10px"></div>Normalized Rating</div><div class="col-md-2"><div style="background-color: #f9a11c;width: 10px;height: 10px"></div>Excellent</div></div>
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
                              jQuery("#large").modal('show');              
                              google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
google.load('visualization', '1', { packages: ['corechart'], callback: drawChart1 });
                            }
                  });
                }); 
$("body").on('change','.chk_number',function(){
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
google.load('visualization', '1', { packages: ['corechart'], callback: drawChart1 });
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
                // ("#get_normalized_curve").click(function(){  alert("fgfg");   
                //   //google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
                // });   
              });
            </script>
            <script type="text/javascript">
            //var $j = jQuery.noConflict();
            function getchart()
            {
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
            }
function getchart1()
            {
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart1 });
            }
            $(function(){
              $("#get_normalized_curve").click(function(){
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
              });
            });              
            </script>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <label id='result_value'></label>
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                <span class="badge badge-success">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-speech"></i> Activities </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-settings"></i> Settings </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                <h3 class="list-heading">Staff</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">8</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ella Wong</h4>
                                            <div class="media-heading-sub"> CEO </div>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="list-heading">Customers</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">2</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lara Kunis</h4>
                                            <div class="media-heading-sub"> CEO, Loop Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="label label-sm label-success">new</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lisa Stone</h4>
                                            <div class="media-heading-sub"> CTO, Keort Inc </div>
                                            <div class="media-heading-small"> Last seen 13:10 PM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">7</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Maria Gomez</h4>
                                            <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="page-quick-sidebar-item">
                                <div class="page-quick-sidebar-chat-user">
                                    <div class="page-quick-sidebar-nav">
                                        <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                            <i class="icon-arrow-left"></i>Back</a>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn green">
                                                    <i class="icon-paper-clip"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                            <div class="page-quick-sidebar-alerts-list">
                                <h3 class="list-heading">General</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-warning"> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="list-heading">System</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                            <div class="page-quick-sidebar-settings-list">
                                <h3 class="list-heading">General Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Enable Notifications
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Allow Tracking
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Log Errors
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Auto Sumbit Issues
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Enable SMS Alerts
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <h3 class="list-heading">System Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Security Level
                                        <select class="form-control input-inline input-sm input-small">
                                            <option value="1">Normal</option>
                                            <option value="2" selected>Medium</option>
                                            <option value="e">High</option>
                                        </select>
                                    </li>
                                    <li> Failed Email Attempts
                                        <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                    <li> Secondary SMTP Port
                                        <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                    <li> Notify On System Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Notify On SMTP Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <div class="inner-content">
                                    <button class="btn btn-success">
                                        <i class="icon-settings"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->