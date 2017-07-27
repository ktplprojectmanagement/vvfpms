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
                            <h1>Goal </h1>
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
        width: 226px;
    height: 55px;
    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;
      
      }
      
   </style>
                    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>             
            <script type="text/javascript">
                $(function(){     
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger");               
                    $(".del_kpi").click(function(){
                        jQuery("#del_goal").modal('show');
                        var id = $(this).attr('id');
                        var id_value = id.split('-');                        
                        var data = {
                        'KPI_id' : id_value[1],
                        };
                        var base_url = window.location.origin;
                        $("#del_goal_set").click(function(){
                             $.ajax({                            
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=Setgoals/kpi_del',
                            success : function(data)
                            {
                                if(data == 'success')
                                {
                                    $("#output_div_"+id_value[1]).fadeOut(1000);
                                   //$("output_div_"+id_value[1]).load(location.href + " .output_div"); 
                                }

                            }
                        });
                        });                       
                    }); 
                    // if ($("#edit_flag_set").text() == 1) 
                    // {
                    //     setInterval(kpi_update_data,1000);
                    // } 
                    // else
                    // {
                    //     setInterval(kpi_save_data_new,1000);                        
                    // }          
                }); 
                
            </script>
            <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
                                        if ((data_value.length>0) && !str.test(data_value)) {
                                            $("#err").show();  
                                            $("#err").fadeOut(6000);
                                            $("#err").text("Only Numbers are allowed.");
                                            $("#err").addClass("alert-danger");
                                        }
                                        else
                                        {
                                            $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : selected_unit1,
                                            url : base_url+'/index.php?r=Setgoals/fetch_field',
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
                                            };
                                            var id = $(this).attr('id');
                                            var num = id.split('_');
                                            
                                            var base_url = window.location.origin;
                                            //alert(num);
                                            $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : kpi_value,
                                            url : base_url+'/index.php?r=Setgoals/kpi_list',
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
                                    for (var v = 0; v < 3; v++) {
                                        $(".target_value1"+v).removeAttr('id');
                                        $(".target_value2"+v).removeAttr('id');
                                        $(".target_value3"+v).removeAttr('id');
                                        $(".target_value4"+v).removeAttr('id');
                                        $(".target_value5"+v).removeAttr('id');
                                    }
                                    var selected_unit = $('#mask_number-'+id_value[1]).find(':selected').val();
                                    $("#unit_value-"+id_value[1]).attr('value','');
                                    $(".target_value1"+id_value[1]).attr('value','');
                                    $(".target_value2"+id_value[1]).attr('value','');
                                    $(".target_value3"+id_value[1]).attr('value','');
                                    $(".target_value4"+id_value[1]).attr('value','');
                                    $(".target_value5"+id_value[1]).attr('value','');
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
                                            // maskuse =  "99/99/9999";
                                            // $(".target_value1"+id_value[1]).inputmask("99/99/9999", { "mask": maskuse });
                                            $j(".target_value1"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value2"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value3"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value4"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                            $j(".target_value5"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                                                                       
                                           
                                            //$(".target_value1"+id_value[1]).addClass('input_custom_date');
                                            //$('.input_custom_date').css('display','block');
                                            $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                           
                                        }
                                        else if(selected_unit == 'Percentage' || selected_unit == 'Ratio' || selected_unit == 'Days')
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
                                                if ((data_value.length>0) && !str.test(data_value)) {
                                                    $("#validation_msg").css('display','block');
                                                }
                                                else
                                                {
                                                    $("#validation_msg").css('display','none');
                                                }
                                            });
                                        }                                      

                                    }  
                                });
                });                           
                       
            </script>            
            <div class="container-fluid">
            <label id="edit_flag_emp_id" style="display: none"><?php if(isset($kpi_data_edit['0']['Employee_id'])){ echo $kpi_data_edit['0']['Employee_id']; }?></label>
            <div class="col-md-4" style="float: left;"> 
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
                                        emp_id : $("#edit_flag_emp_id").text(),
                                    };
                                    if($('.get_year').find(':selected').val() == 'All')
                                    {
                                        $('#kpi_data_detail').html('');
                                        $(".kpi_year_content").css('display','none');
                                    }
                                    else
                                    {
                                        console.log(data1);
                                        var base_url = window.location.origin;
                                        $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : data1,
                                            url : base_url+'/index.php?r=Goal_history/getdata1',
                                            success : function(data)
                                            {
                                                //alert(data);
                                               $('#kpi_data_detail').html(data);
                                               $(".kpi_year_content").css('display','block');
                                               // $("#kpi_data_detail1").hide();
                                            }
                                        });
                                    }
                                    
                                });
                            });
                        </script>
            <a href="<?php echo $this->createUrl('Setgoals/approvegoal_list'); ?>"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right')); ?></a>
                <div class="page-content">
                 <div id="get_goal_list">
                  <div id="err" style="display: none"></div>
                            <div class="col-md-12">
                                <div id="validation_msg" class="alert alert-danger" style="display: none">
                                    Only Numbers are allowed.
                                </div>       
                                <div id="validation_chk" class="alert alert-danger" style="display: none">
                                </div>
                            </div>                     
                    </div> 
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                       
                    </div>   
                              
                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to send goals to appraiser? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn border-blue-soft" id="continue_goal_set">Submit Goal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                             <div id="del_goal" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Delete Goal</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to delete this goal? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn border-blue-soft" id="del_goal_set">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
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
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="note note-success popupbox" style="display: none">
                                    <p class="popupmsg"></p>
                                </div>
                                <div class="mt-bootstrap-tables" style="display: none">
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
                                            url : base_url+'/index.php?r=Newemployee/getlist',
                                            success : function(data)
                                            {
                                                $("#get_goal_list").html(data);
                                            }
                                        });
                                    }                                   
                                }
                                </script>

                                <div class="portlet box border-blue-soft bg-blue-soft">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Set Goals</div>
                                </div>                                     
                                <div class="portlet-body" style="border: 1px solid rgb(76, 135, 185);">
                                    <div class="row table-responsive" style="margin-top: -15px;">

                                    <label id="edit_flag_set" style="display: none"><?php if(isset($KRA_category_auto['0']['minimum_kpi']) && $KRA_category_auto['0']['minimum_kpi'] != ''){ echo $KRA_category_auto['0']['minimum_kpi']; }?></label>
                                        <table id="kpi_table" class="table" style="width: 100%;background-color: #EEF1F5;">
                                                    <tr>
                                                            <td style="width:310px;">
                                                                KRA Category
                                                             </td>
                                                             <td colspan= 7 align="center" style="width:100px;">                                                         
                                                            <?php
                                                             if (isset($kra_list) && count($kra_list)>0) {
                                                                $list_data = '';
                                                                $models = KRAStructureForm::model()->findAll();
                                                                $list = CHtml::listData($models,'KRA_category', 'KRA_category');
                                                             }
                                                            $kpi_category = '';$kpi_desc = '';$wtg = '';$kpi_count = '';$target_value1 = '';$target_unit = '';$kpi_id = '';$list_cnt = 0;
                                                           $format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value','Percentage' => 'Percentage');
                                                           $goal_status_list = array('Select' => 'Select','Pending' => 'Pending','Approved' => 'Approved');
                                                            $wtage = array('0'=>'0','15'=>'15','20'=>'20','30'=>'30','40'=>'40','50'=>'50');
                                                            if (isset($kpi_data_edit)) {
                                                               $kpi_category[$kpi_data_edit['0']['KRA_category']] = array('selected' => 'selected');
                                                               //print_r($kpi_category);die();
                                                               $kpi_desc = $kpi_data_edit['0']['KRA_description'];
                                                               $kpi_id = $kpi_data_edit['0']['KPI_id'];
                                                               $list_count = explode(';', $kpi_data_edit['0']['target_unit']);
                                                               $wtg[$kpi_data_edit['0']['target']] = array('selected' => 'selected');
                                                               $kpi_count = explode(';', $kpi_data_edit['0']['kpi_list']);
                                                               $target_unit = explode(';', $kpi_data_edit['0']['target_unit']);
                                                               //print_r($list_count);die();
                                                               $target_value1 = explode(';', $kpi_data_edit['0']['target_value1']);
                                                               $per_kpi_wt = explode(';', $kpi_data_edit['0']['KPI_target_value']);
                                                               $goal_status_flag = explode(';', $kpi_data_edit['0']['goal_status']);
                                                            }
                                                            else if(isset($kpi_auto_data) && count($kpi_auto_data)>0)
                                                            {
                                                                $kpi_category[$kpi_auto_data['0']['KRA_category']] = array('selected' => 'selected');
                                                               $kpi_desc = $kpi_auto_data['0']['KRA_description'];
                                                               $kpi_id = $kpi_auto_data['0']['KPI_id'];
                                                               $list_count = explode(';', $kpi_auto_data['0']['target_unit']);
                                                               $wtg[$kpi_auto_data['0']['target']] = array('selected' => 'selected');
                                                               $kpi_count = explode(';', $kpi_auto_data['0']['kpi_list']);
                                                               $target_unit = explode(';', $kpi_auto_data['0']['target_unit']);
                                                               $target_value1 = explode(';', $kpi_auto_data['0']['target_value1']);
                                                                $per_kpi_wt = explode(';', $kpi_auto_data['0']['KPI_target_value']);
                                                                $goal_status_flag = explode(';', $kpi_auto_data['0']['goal_status']);
                                                                 //print_r($per_kpi_wt);die();

                                                            }
                                                            if (count($list_count) == 1) {
                                                                $list_cnt = $KRA_category_auto['0']['minimum_kpi'];
                                                            }
                                                            else
                                                            {
                                                                $list_cnt = count($list_count);
                                                            }
                                                            //print_r($list_count);die();
                                                           $cities = array('Business'=>'Business','Process'=>'Process','People'=>'People','Customer'=>'Customer');
                                                             echo CHtml::dropDownList("target_value",'',$list,$htmlOptions=array('class'=>"form-control target_value",'style'=>"width: 186px;",'onchange'=>'js:get_target_value();','options' => $kpi_category,'disabled' => 'true'));
                                                            ?>
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                            <td style="width:310px;"><label id="kpi_edit_id" style="display: none"><?php echo $kpi_id; ?></label>
                                                                KRA Description
                                                             </td>
                                                             <td colspan=7 align="center" valign=bottom>                
                                                            <?php  echo CHtml::textArea('KRA_description',$kpi_desc,array('style'=>'max-width: 1101px;max-height: 67px;min-width: 1101px;min-height: 67px;','class'=>'form-control','disabled' => 'true')); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                            <td style="width:310px;">
                                                                Weightage
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php  
                                                           echo CHtml::dropDownList("target_value",'',$wtage,$htmlOptions=array('class'=>"form-control Weightage",'id'=>'Weightage','style'=>"width: 186px;",'options' => $wtg,'disabled' => 'true'));
                                                             ?>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                             <td style="text-align:center;" colspan=10>Target</td>
                                                             
                                                        </tr> 
                                                    <tr>
                                                     
                                                        <td style="width:206px;">KPI List</td>
                                                        <td style="width:207px;">KPI Unit</td>                                                    
                                                        <td style="width: 135px; text-align:center;">KPI Weigtage</td>
                                                        <td style="width: 135px; text-align:center;">KPI value</td>
                                                        <td align="center">(1) Unsatisfactory <br>Performance</td>
                                                        <td align="center">(2) Needs <br>Improvement</td>
                                                        <td align="center">(3) Good Solid <br>Performance</td>
                                                        <td align="center">(4) Superior <br>Performance</td>
                                                        <td align="center"  style="padding-right: 198px;">(5) Outstanding <br>Performance</td>
                                                        <td align="center">(6) KPI Status</td>

                                                    </tr> 

                                                   <tr id="other_format_text">
                                                   <label id="kpi_list_number" style="display: none"><?php  if($kpi_count != '')
                                                    {
                                                        echo count($kpi_count);
                                                    }?></label>
                                                   
                                                    <label id='min_kpi' style="display: none"><?php if(isset($KRA_category_auto['0']['minimum_kpi']) && $KRA_category_auto['0']['minimum_kpi'] != ''){ echo $KRA_category_auto['0']['minimum_kpi']; }?></label><label style="display: none" id='max_kpi'></label>
                                                    <table id="kpi_record" style="width: 100%;margin-top: -20px;">
                                                    
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
                                                            for ($i=0; $i < $list_cnt; $i++) {
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
                                                                else if ($unit=='Days' || $unit=='Date' || $unit=='Ratio' || $unit=='Percentage') { 
                                                                $disable_select = false; 
                                                                $disable_select1 = true;                                                                
                                                                    $unit_target = '';
                                                                     $unit_type[$unit] = array('selected' => 'selected');
                                                                    if (isset($target_value1[$i]) && ($target_value1[$i] != '' && $target_value1[$i] != 0)) {
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
                                                            echo '<tr><td id="kpilist_'.$i.'">
                            <input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list',$kpi_count[$i],array('class'=>'form-control kpi_list','id'=>'kpilistyii_'.$i.'','style'=>'width: 326px;')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;height: auto;max-height: 200px;overflow-y: scroll;"></div></td><td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i,'options' => $unit_type)).'</td><td>'.CHtml::textField('kpi_target_value',$per_kpi_wt[$i],array('class'=>'form-control fields','id'=>'kpi_target_value-'.$i)).'</td><td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control','id'=>'unit_value','style'=>'display:none')).CHtml::textField('unit_value',$unit_target,array('class'=>'form-control value_field','id'=>'unit_value-'.$i.'','disabled' => $disable_select1)).'</td><td>'.CHtml::textField('target_value1',$val[$i][0],array('class'=>'form-control fields target_value1'.$i.'','disabled' => $disable_select)).'</td><td>'.CHtml::textField('target_value2',$val[$i][1],array('class'=>'form-control fields target_value2'.$i.'','disabled' => $disable_select)).'</td><td>'.CHtml::textField('target_value3',$val[$i][2],array('class'=>'form-control fields target_value3'.$i.'','disabled' => $disable_select)).'</td><td>'.CHtml::textField('target_value4',$val[$i][3],array('class'=>'form-control fields target_value4'.$i.'','disabled' => $disable_select)).'</td><td>'.CHtml::textField('target_value5',$val[$i][4],array('class'=>'form-control fields target_value5'.$i.'','disabled' => $disable_select)).'</td><td style="width: 225px;">'.CHtml::dropDownList("goal_status",'',$goal_status_list,$htmlOptions=array('class'=>'form-control','id'=>'goal_status-'.$i,'options' => $goal_status_select)).'</td></tr>';   
                                 $unit_type='';
                                                       } } } 
                                                        
                                                    ?>                                                    
                                                </table>
                                                    </tr>                                             
                                                </table><br>
                                        <div class="col-md-7">
                                                     <?php if(isset($edit_flag) && $edit_flag!='')
                                             {?>
                                            <?php echo CHtml::button('Update',array('class'=>'btn border-blue-soft kpi_update_data','style'=>'float:right','id'=>'kpi_update_data')); ?>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/approvegoal_list"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a>
                                            <?php }else{ ?>
                                            <?php echo CHtml::button('Submit',array('class'=>'btn border-blue-soft','style'=>'float:right','id'=>'submit_kra','onclick'=>'js:kpi_save_data()')); ?>
                                            <?php } ?>
                                            <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                     
                                    </div>
                                    <?php $this->endWidget(); ?>
                                       
                                    </div> 
                                     
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#employee_table').DataTable();
                                                });
                                            </script>                                           
                                       
                                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                                        <div id="output_div" style="margin-top: 40px;">
                                        <?php
                                            if (isset($kpi_data_edit)) { $cnt_num = 1; ?>
                                            <label class='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
                                          <?php     
                                        foreach ($kpi_data_edit as $row) {   ?>
                                        <div class="portlet box border-blue-soft bg-blue-soft" id="output_div_<?php echo $row["KPI_id"]; ?>">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label id="total_<?php echo $cnt_num; ?>" style="display: none"><?php echo $row['target']; ?></label>
                                                   <?php echo $row['KRA_category']; ?><?php echo "(".$row['target'].")"; ?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status : ".$row['KRA_status']; ?><a href="javascript:;" class="collapse"></a>
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
                                                           <th class="numeric"> KPI Target Value </th>
                                                            <th>Unsatisfactory <br>Performance</th>
                                                            <th>Needs<br>Improvement</th>
                                                            <th>Good Solid <br>Performance</th>
                                                            <th>Superior <br>Performance</th> 
                                                            <th>Outstanding <br>Performance</th> 
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
                                                                                <td><?php echo $KPI_target_value[$i]; ?></td>
                                                                                <td><?php echo round($kpi_list_target[$i]*0.69,2);?></td>
                                                                                <td><?php echo round($kpi_list_target[$i]*0.70,2);?></td>
                                                                               
                                                                             <td><?php echo round($kpi_list_target[$i]*0.96,2);?></td>
                                                                                
                                                                             <td><?php echo round($kpi_list_target[$i]*1.06,2);?></td>
                                                                                
                                                                             <td><?php echo round($kpi_list_target[$i]*1.39,2);?></td>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>
                                                                                <td></td>
                                                                                <td><?php echo $KPI_target_value[$i]; ?></td>
                                                                                <?php

                                                                                $value_data = explode('-', $kpi_list_target[$i]);
                                                                                //print_r($value_data);die();
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
                                                                       <!--  <td class="numeric"><a href="<?php echo $this->createUrl('Setgoals/kpi_edit', array('KPI_id' => $row['KPI_id']));
     ?>"><i class="fa fa-pencil fa-fw" title="Delete" aria-hidden="true"></i></a><i class="fa fa-trash-o del_kpi" style="cursor: pointer;" id="KPI_id-<?php echo $row['KPI_id']; ?>" title="Delete" aria-hidden="true"></i></td> -->
                                                                </tr>
                                                                <?php
                                                                   } }
                                                            ?>                              
                                                    </tbody>
                                                     <a href="<?php echo $this->createUrl('Setgoals/emp_kpi_edit', array('KPI_id' => $row['KPI_id'],'emp_id' => $row['Employee_id']));
     ?>"><?php echo CHtml::button('Edit',array('class'=>'btn border-blue-soft','style'=>'float:right')); ?></a><?php echo CHtml::button('Delete',array('class'=>'btn border-blue-soft del_kpi','id'=>'KPI_id-'.$row["KPI_id"],'style'=>'float:right;margin-right: 14px;')); ?>

                                                </table>                                                
                                            </div>
                                        </div>
                                         <?php 
                                        $cnt_num++;  } }
                                        ?>
                                        </div>
                                        <!-- END SAMPLE TABLE PORTLET-->      
                                                           
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
                $("body").on('click','.kpi_update_data',function(){                 
                    var kra_des = $("#KRA_description").val();
                    var string = /^(0[1-9]|[0-3][0-3])([/]{1})(0[1-9]|1[0-2])([/]{1})((19|20)[0-9]{2})$/;
                    var string_num = /^([0-9])$/;
                     var data_length = kra_des.length;var final_kpi_wt = '';
                     //alert(data_length);
                    if (data_length==0)
                    {
                        error = 'Please enter KRA description';
                    }
                    else if(data_length>150)
                    {
                        error = 'Maximum 150 characters are allowed in KRA description';
                    }
                    else
                    {
                        error = '';
                    }
                    
                    //alert(error);
                    if(error == '')
                    {
                        //alert(error);
                        var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';var kpi_total = 0;var kpi_target_total = '';var goal_status = '';
                        var selected_unit = $(".format_list").find(':selected').val();
                        var wtg_value = $("#Weightage").find(':selected').val();
                        var catergory = $("#target_value").find(':selected').val();
                        if(catergory == '--Select--')
                        {
                            error = 'Please select KRA Category.';
                        }
                        else if(wtg_value == '0')
                        {
                            error = 'Please select target.';
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
                            
                                if (error == '') 
                                {
                                    if (kpi_list_data <  $("#min_kpi").text()) 
                                {                                
                                    error = 'Please Fill minimum '+$("#min_kpi").text()+' KPI';                                   
                                }
                                else
                                {                            
                                    for (var i = 0; i < kra_num; i++) {
                                    if ($("#mask_number-"+i).find(':selected').val() != 'Select' && $("#kpilistyii_"+i).val() != '' && $("#kpi_target_value-"+i).val() != '') 
                                    {
                                        var string_num = /^([0-9]{1,2})$/;
                                        if (!string_num.test($("#kpi_target_value-"+i).val())) 
                                        {                                            
                                            error = "Please enter only numbers in KPI Weightage field.";break;
                                        }
                                        else
                                        {                                  
                                            if (final_kpi_wt == '') 
                                            {
                                                final_kpi_wt = $("#kpi_target_value-"+i).val();
                                            }
                                            else
                                            {
                                               final_kpi_wt = final_kpi_wt+';'+$("#kpi_target_value-"+i).val();
                                            }
                                        }
                                         
                                        var selected_value = $("#mask_number-"+i).find(':selected').val();
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
                                        if (selected_value != 'Units' && selected_value != 'Weight' && selected_value != 'Value') 
                                        {
                                            if ($(".target_value1"+i).val()=='' || $(".target_value2"+i).val()=='' || $(".target_value3"+i).val()=='' || $(".target_value4"+i).val()=='' || $(".target_value5"+i).val()=='') 
                                            {
                                                error = 'Please Fill targer value';break;
                                            }
                                            else
                                            {
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
                                        else if(selected_value == 'Units' || selected_value == 'Weight' || selected_value == 'Value')
                                        {
                                             var string_num = /^([0-9.]{1,100})$/;
                                            if ($("#unit_value-"+i).val()=='' || $("#unit_value-"+i).val() === undefined || !string_num.test($("#unit_value-"+i).val())) 
                                            {
                                                error = 'Please Fill unit value';break;
                                            }
                                            else if($("#goal_status-"+i).val()=='Select')
                                            {
                                                 error = 'Please Select KPI Status';break;
                                            }
                                            else
                                            {
                                                if (kpi_value == '')
                                                {
                                                    kpi_value = $("#unit_value-"+i).val();
                                                }
                                                else
                                                {
                                                    kpi_value = kpi_value+';'+$("#unit_value-"+i).val();
                                                }

                                                if (goal_status == '')
                                                {
                                                    goal_status = $("#goal_status-"+i).val();
                                                }
                                                else
                                                {
                                                    goal_status = goal_status+';'+$("#goal_status-"+i).val();
                                                }
                                                
                                            }
                                        }
                                       
                                    }                                   
                                    else
                                    {
                                         if(($("#mask_number-"+i).find(':selected').val() == 'Select' && $("#kpilistyii_"+i).val() != '') || ($("#kpilistyii_"+i).val() == '' && $("#mask_number-"+i).find(':selected').val() != 'Select') || ($("#kpi_target_value-"+i).val() == '' && $("#mask_number-"+i).find(':selected').val() != 'Select') || ($("#kpi_target_value-"+i).val() != '' && $("#mask_number-"+i).find(':selected').val() == 'Select') || ($("#kpi_target_value-"+i).val() != '' && $("#kpilistyii_"+i).val() == '') || ($("#kpi_target_value-"+i).val() == '' && $("#kpilistyii_"+i).val() != ''))
                                            {
                                                error = 'Please Fill Correct KPI Details';break;
                                            }
                                            else
                                            {
                                                 if (final_kpi_total != 100) 
                                                {
                                                    error = 'The Total for kpi score should be 100';
                                                }
                                                else
                                                {
                                                   error = '';
                                                }
                                            }
                                                                                 
                                    }          
                                }                                                         
                                } 
                            }
                            
                        }

                       
                        
                        var data = {
                            'KRA_category' : $("#target_value").find(':selected').val(),
                            'KRA_description' : $("#KRA_description").val(),
                            'target' : $("#Weightage").find(':selected').val(),
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                            'KPI_target_value' : final_kpi_wt,
                            'KPI_id' : $("#kpi_edit_id").text(),
                            'goal_status' : goal_status
                        };
                        console.log(data);
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                        if(error != '')
                        {
                             $("#err").show();
                             $("#err").text(error);
                            $("#err").addClass("alert-danger");
                        }
                        else
                        {
                            //alert(error);
                            $("#show_spin").show();
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Setgoals/update_emp_kpi',
                                success : function(data)
                                {                          
                                    if (data == "success")
                                    {
                                        $("#show_spin").hide();
                                        $("#output_div").load(location.href + " #output_div");
                                        $("#err").show();  
                                         $("#err").fadeOut(6000);
                                         $("#err").text("Successfully updated");
                                         $("#err").removeClass("alert-danger");
                                        $("#err").addClass("alert-success");
                                    }
                                    else if (data == "Notification Send") 
                                    {
                                         $("#show_spin").hide();
                                        $("#output_div").load(location.href + " #output_div");
                                        $("#err").show();  
                                         $("#err").fadeOut(6000);
                                         $("#err").text("Notification Send");
                                         $("#err").removeClass("alert-danger");
                                        $("#err").addClass("alert-success");
                                    }
                                    
                                }
                            });
                        }
                        
                        console.log(data);
                    }
                    else
                    {
                        $("#err").show();
                        $("#err").text(error);
                        $("#err").addClass("alert-danger");
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
                    var string = /^(0[1-9]|[0-3][0-3])([/]{1})(0[1-9]|1[0-2])([/]{1})((19|20)[0-9]{2})$/;
                    
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
                                url : base_url+'/index.php?r=Setgoals/save_kpi',
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
                                        $("#output_div").load(location.href + " #output_div");
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
                    //var string = /^(0[1-9]|[0-3][0-3])([/]{1})(0[1-9]|1[0-2])([/]{1})((19|20)[0-9]{2})$/;
                    var string_num = /^([0-9])*$/;
                     var data_length = kra_des.length;
                     //alert(data_length);
                    if (data_length==0)
                    {
                        error = 'Please enter KRA description';
                    }
                    else if(data_length>150)
                    {
                        error = 'Maximum 150 characters are allowed in KRA description';
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
                            error = 'Please select target.';
                        }
                        else
                        {

                            var kpi_list_data = 0;var add_value = 0;var final_kpi_total = 0;var final_kpi_wt = '';
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
                                final_kpi_total = parseInt(final_kpi_total)+parseInt(add_value);
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
                                else
                                {                                     
                                    error = "Please enter only numbers in KPI Weightage field.";
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
                                   if ($("#mask_number-"+i).find(':selected').val() != 'Select' && $("#kpilistyii_"+i).val() != '' && $("#kpi_target_value-"+i).val() != '') 
                                    {
                                        
                                        var selected_value = $("#mask_number-"+i).find(':selected').val();
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
                                        if (selected_value != 'Units' && selected_value != 'Weight' && selected_value != 'Value') 
                                        {

                                             if ($(".target_value1"+i).val()=='' || $(".target_value2"+i).val()=='' || $(".target_value3"+i).val()=='' || $(".target_value4"+i).val()=='' || $(".target_value5"+i).val()=='') 
                                            {
                                                error = 'Please Fill targer value';break;
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
                                        else if(selected_value == 'Units' || selected_value == 'Weight' || selected_value == 'Value')
                                        {
                                            
                                            if ($("#unit_value-"+i).val()==''  || $("#unit_value-"+i).val() === undefined || !string_num.test($("#unit_value-"+i).val())) 
                                            {
                                                error = 'Please Fill unit value with only digits';break;
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

                                    }                                   
                                    else
                                    {
                                        error = '';
                                        if(($("#mask_number-"+i).find(':selected').val() == 'Select' && $("#kpilistyii_"+i).val() != '') || ($("#kpilistyii_"+i).val() == '' && $("#mask_number-"+i).find(':selected').val() != 'Select') || ($("#kpi_target_value-"+i).val() == '' && $("#mask_number-"+i).find(':selected').val() != 'Select') || ($("#kpi_target_value-"+i).val() != '' && $("#mask_number-"+i).find(':selected').val() == 'Select') || ($("#kpi_target_value-"+i).val() != '' && $("#kpilistyii_"+i).val() == '') || ($("#kpi_target_value-"+i).val() == '' && $("#kpilistyii_"+i).val() != ''))
                                            {
                                                error = 'Please Fill Correct KPI Details';break;
                                            }
                                            else
                                            {
                                                if (final_kpi_total != 100) 
                                                {
                                                    error = 'The Total for kpi score should be 100';break;
                                                }
                                                else
                                                {                                                    
                                                   error = '';
                                                }
                                            }                                           
                                    }       
                            }
                                                              
                                } 
                            }
                            
                        }
                        
                        if (updated_kpi_value != '') 
                        {
                            kpi_id_value = updated_kpi_value;
                        }

                        var data = {
                            'KRA_category' : $("#target_value").find(':selected').val(),
                            'KRA_description' : $("#KRA_description").val(),
                            'target' : $("#Weightage").find(':selected').val(),
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                            'KPI_target_value' : final_kpi_wt,
                            'kpi_id_value' : kpi_id_value,
                            'submit_kra_click' : 'yes'
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
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=Setgoals/savekpi',
                                success : function(data)
                                {
                                    //alert(data);
                                    if (data == "Success")
                                    {
                                        updated_kpi_value = kpi_id_value;
                                        $("#output_div").load(location.href + " #output_div");
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
                        $("#err").fadeOut(6000);
                        $("#err").text(error);
                        $("#err").addClass("alert-danger");
                    }
                }
                 
                function send_notification()
                {
                    var total = 0;
                    var total_goal = $(".count_goal").text();
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
                        $("#err").text("Minimum 4 KRA Required.");
                        $("#err").addClass("alert-danger");
                    }                    
                    else
                    {
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
                            //alert(total);
                        if (total!=100) 
                        {
                            $("#err").show();  
                            $("#err").fadeOut(6000);
                            $("#err").text("Total of KRA should be 100 only.");
                            $("#err").addClass("alert-danger");
                           
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
                                        url : base_url+'/index.php?r=Setgoals/sendmail',
                                        success : function(data)
                                        {
                                            //alert(data);
                                            $("#show_spin").hide(); 
                                            $("#err").show();  
                                            $("#err").fadeOut(6000);
                                            $("#err").text("Notification Send to appraiser");
                                            $("#err").addClass("alert-success");                       
                                        }
                                    });
                            });
                          
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
                            url : base_url+'/index.php?r=Setgoals/gettarget_value',
                            success : function(data)
                            { 
                                //alert(detail[2]);
                                var detail = jQuery.parseJSON(data);
                                $("#kpi_record").html(detail[0]);
                                $("#kpi_list_number").html(detail[1]);
                                $("#min_kpi").text(detail[2]);
                                $("#max_kpi").text(detail[3]);
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
              