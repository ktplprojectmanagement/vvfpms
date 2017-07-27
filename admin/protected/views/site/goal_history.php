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
                            <h1>Goal History</h1>
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
                    <div class="col-md-4" style="float: right;"> 
                        <label class="control-label col-md-5">Select Year : </label>
                        <select class="form-control get_year" style="width: 186px;"name="get_cluster" id="get_cluster">
                                        <option value="All">All</option>
                                        <?php
                                            if (isset($KRA_date) && count($KRA_date)>0) {
                                                foreach ($KRA_date as $row) { 
                                                    $date_year = strtotime($row['KRA_date']);
                                                    $year_value = date('Y',$date_year);
                                        ?>
                                                    <option value="<?php echo $row['KRA_date'];?>"><?php echo $year_value;?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                        </select>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                 $('.get_year').change(function(){                                                    
                                    var data1 = {
                                        get_year : $('.get_year').find(':selected').val(),
                                    };

                                    console.log(data1);
                                    var base_url = window.location.origin;
                                    $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        data : data1,
                                        url : base_url+'/index.php?r=Goal_history/getdata',
                                        success : function(data)
                                        {
                                            //alert(data);
                                           $('#kpi_data_detail').html(data);
                                           $(".kpi_year_content").css('display','block');
                                           $("#kpi_data_detail1").hide();
                                        }
                                    });
                                });
                            });
                        </script>
                        
                         <div style="margin-top: 49px;">
                           
                                        <div class="portlet box box border-blue-soft bg-blue-soft kpi_year_content" style="display: none">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label style="display: none"></label>
                                                    KRA Data</div>
                                            </div>
                                            <div class="portlet-body flip-scroll">                         
                                                <table class="table table-striped table-hover table-bordered" style="margin-top: 45px;">
                                                    <thead>
                                                        <tr>
                                                          <!--   <th width="20%"> KRA Category </th> -->
                                                            <th>KRA Category</th>
                                                            <th>KPI List</th>
                                                            <th class="numeric"> KPI Unit Format </th>
                                                            <th class="numeric"> KPI value </th>
                                                            <th>KPI Discription</th>
                                                            <th>KRA target</th>
                                                            <th>Date</th>
                                                           <!--  <th class="numeric"> Action </th> -->      
                                                        </tr>
                                                    </thead>
                                                    <tbody id="kpi_data_detail">
                                                                 
                                                    </tbody>
                                                </table>                                                
                                            </div>
                                        </div>
                        </div>
                        <div style="margin-top: 49px;" id='kpi_data_detail1'>
                            <?php
                                            if (isset($kpi_data)) { $cnt = 1; ?>
                                            <label class='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
                                          <?php     
                                        foreach ($kpi_data as $row) {  ?>
                                        <div class="portlet box box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label style="display: none" id="total_<?php echo $cnt; ?>"><?php echo $row['target']; ?></label>
                                                    <?php echo $row['KRA_category']; ?><?php echo "(".$row['target'].")"; ?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status : ".$row['KRA_status']; ?>
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">                         
                                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1" style="margin-top: 45px;">
                                                    <thead>
                                                        <tr>
                                                          <!--   <th width="20%"> KRA Category </th> -->
                                                            <th> KPI List </th>
                                                            <th class="numeric"> KPI Unit Format </th>
                                                           <th class="numeric"> KPI value </th>
                                                            <th>Target 1</th>
                                                            <th>Target 2</th>
                                                            <th>Target 3</th>
                                                            <th>Target 4</th> 
                                                            <th>Target 5</th> 
                                                           <!--  <th class="numeric"> Action </th> -->      
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                                $kpi_list_data = '';
                                                                $kpi_list_data = explode(';',$row['kpi_list']);
                                                                $kpi_list_unit = explode(';',$row['target_unit']);
                                                                $kpi_list_target = explode(';',$row['target_value1']);            
                                                                $kpi_data_data = 0;
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { 
                                                                    if ($kpi_list_data[$i] != '') {
                                                                        if($kpi_data_data == '')
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
                                                                for ($i=0; $i < count($kpi_list_data); $i++) { if ($kpi_list_data[$i]!='') { $cnt++;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $kpi_list_data[$i]; ?></td>
                                                                    <td><?php echo $kpi_list_unit[$i]; ?></td>
                                                                        <?php
                                                                            if ($kpi_list_unit[$i] == 'Units' || $kpi_list_unit[$i] == 'Weight' || $kpi_list_unit[$i] == 'Value') {
                                                                                ?>
                                                                                <td><?php echo $kpi_list_target[$i]; ?></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <td></td>
                                                                                <?php
                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                                for ($j=0; $j < 5; $j++) { 
                                                                                    if (isset($value_data[$j])) {?>
                                                                                     <td><?php echo $value_data[$j]; ?></td>
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
                                                </table>                                                
                                            </div>
                                        </div>
                                         <?php 
                                           $cnt++; } }
                                        ?>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
                   </div>
        <!-- END CONTAINER -->
              
