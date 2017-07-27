            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
		<div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Admin_Dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
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
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type="text/javascript">
var $j = jQuery.noConflict();
               $j(function(){
                $("body").on('click','.change_priority',function(){
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart }); 
                var list = '';
                var total_count = $("#emp_list_data_count").text();var normalize_data = '';
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
                //alert(list);
               
                  var data = {
                    'array_data' : list,
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
                              $j("#large").modal('show'); 
                              // google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
                              setInterval(getchart,300);
                            }
                  });
                }); 
                // ("#get_normalized_curve").click(function(){  alert("fgfg");   
                //   //google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
                // });   
              });
            </script>
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
chartData[index][2] = 'fill-color: #5ac8d7;';
}
else if(i>3.2)
{
chartData[index][2] = 'fill-color: #f9a11c;';
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
        'height': 400,
        'width': '100%',
        'backgroundColor': 'none',
        hAxis: {
            //ticks: [1,2,3,4,5,6],            
            //gridlines:{ color: '#eee' },
            gridlines: {
              color:'#ddd',
              count:0
            },
            //ticks: [{v: 2, f:'Average'},{v:3, f:'Excellent'}]
        },
        vAxis: {
            baselineColor: '#ccc',
          //scaleType: 'mirrorLog',
          ticks: []
        },
        legend: {position: 'none'}
    };
var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));

chart.draw(data, options);

}

</script>

<div class="col-md-12">
                               <div class="col-md-3">
                                <label class="control-label ">Select Cluster : </label>                                            
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
                            <div class="col-md-3">
                                <label class="control-label ">Select Department : </label>
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
                    float: right;
                    margin-top: 17px;
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
                            <div class="col-md-6" style="float: right;padding-top: 26px;"><input type="button" role="button" class="btn change_priority" id="get_normalized" value="Get Chart" style="border: 1px solid rgb(76, 158, 217);float: right;"></div>
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
                                                            <th>Normalise Rating</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dept_based_emp">
                                                    <?php
                                                        if (isset($employee_list)) {?>
                                                        
                                                           <?php 
                                                           $cnt = 0;
                                                           foreach ($employee_list as $row) { ?>                                                           
                                                            <tr>                                                               
                                                                <td><?php echo $row['Employee_id']; ?></td>
                                                                <td><?php echo $row['Emp_fname']; ?></td>
                                                                <td><?php echo $row['cluster_name']; ?></td>
                                                                <td><?php echo $row['Department']; ?></td>
                                                                <td><?php echo $row['Reporting_officer1_id']; ?></td>
                                                                <td><?php if(isset($normalize_rating_data[$cnt]['0']['performance_rating'])){ echo $normalize_rating_data[$cnt]['0']['performance_rating']; }?></td>
                                                                <td><?php if(isset($normalize_rating_data[$cnt]['0']['Tota_score'])){ echo $normalize_rating_data[$cnt]['0']['Tota_score']; }?></td>
                                                                <td><input class="form-control chk_number normalize_rate-<?php echo $cnt; ?>" id="normalize_rate-<?php echo $cnt; ?>" placeholder="Enter text" type="text"></td>
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
                        <div class="col-md-12" style="height:auto;"><div id="chart_div"></div>
                         <div id='chart_legend' class="col-md-8" style="display: none;float: right;"><div class="col-md-2"><div style="background-color: #ef2f2e;width: 10px;height: 10px"></div>Below</div><div class="col-md-2"><div style="background-color: #5ac8d7;width: 10px;height: 10px"></div>Average</div><div class="col-md-2"><div style="background-color: #f9a11c;width: 10px;height: 10px"></div>Excellent</div></div>
                        </div>
                        </div>                        
                    </div>
                </div>
                </div>
                <!-- /.modal-content -->

            <script type="text/javascript">
            //var $j = jQuery.noConflict();
            function getchart()
            {
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
            }
            $(function(){
              $("#get_normalized_curve").click(function(){
                google.load('visualization', '1', { packages: ['corechart'], callback: drawChart });
              });
            });              
            </script>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->
