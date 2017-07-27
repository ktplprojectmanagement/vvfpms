            
            <script type="text/javascript">
                $(function(){
                    $(".del_kpi").click(function(){
                        var id = $(this).attr('id');
                        var id_value = id.split('-');                        
                        var data = {
                        'KPI_id' : id_value[1],
                        };
                        var base_url = window.location.origin;
                        $.ajax({                            
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/pmsuser/index.php?r=Setgoals/kpi_del',
                            success : function(data)
                            {
                                if(data == 'success')
                                {
                                    location.reload();  
                                }

                            }
                        });
                    });                    
                }); 
            </script>
            <script type="text/javascript">  
             
                $(function(){                    
                    $('.value_field').keyup(function(e){
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
                                            $("#validation_msg").css('display','block');
                                        }
                                        else
                                        {
                                            $("#validation_msg").css('display','none');
                                            $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : selected_unit1,
                                            url : base_url+'/pmsuser/index.php?r=Setgoals/fetch_field',
                                            success : function(data)
                                            {
                                                //alert(data);
                                                var res = data.split(","); 
                                                $(".target_value1"+id_value[1]).attr('value',res[0]);
                                                $(".target_value2"+id_value[1]).attr('value',res[1]);
                                                $(".target_value3"+id_value[1]).attr('value',res[2]);
                                                $(".target_value4"+id_value[1]).attr('value',res[3]);
                                                $(".target_value5"+id_value[1]).attr('value',res[4]);
                                                //alert(data);
                                                //$("#value_field").html(data);
                                                //$("#unit_value").datepicker();
                                            }
                                            });
                                        }
                                });
                                $('.kpi_list').keyup(function(){
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
                                            url : base_url+'/pmsuser/index.php?r=Setgoals/kpi_list',
                                            success : function(data)
                                            {
                                                $("#kpi_list_drop_"+num[1]).show();
                                                $("#kpi_list_drop_"+num[1]).html(data);
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
                                                //$("#value_field").html(data);
                                                //$("#unit_value").datepicker();
                                                //  $("#kpi_list_drop_"+num[1]).hover(function(){
                                                //     $("#kpi_list_drop_"+num[1]).show();
                                                // });
                                               
                                            }
                                        });
                                        });
                                $('.format_detail').change(function(){
                                    var value = $(this).val();
                                     var id = $(this).prop('id');
                                     var id_value = id.split('-');
                                     //get_value(value,id_value[1]);
                                    // var selected_unit = $('.format_list').find(':selected').val();
                                    // var target_value = '';
                                    var selected_unit = $('#mask_number-'+id_value[1]).find(':selected').val();
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
                                       
                                        $("#unit_value-"+id_value[1]).datepicker("destroy");      
                                        $(".target_value1"+id_value[1]).datepicker("destroy");
                                        $(".target_value2"+id_value[1]).datepicker("destroy");
                                        $(".target_value3"+id_value[1]).datepicker("destroy");
                                        $(".target_value4"+id_value[1]).datepicker("destroy");
                                        $(".target_value5"+id_value[1]).datepicker("destroy");
                                       
                                    }
                                    else if(selected_unit == 'Date')
                                    {
                                        //$("#unit_value-"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value1"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value2"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value3"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value4"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value5"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $("#unit_value-"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value1"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value1"+id_value[1]).css('background-color','white');
                                        $(".target_value2"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value2"+id_value[1]).css('background-color','white');
                                        $(".target_value3"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value3"+id_value[1]).css('background-color','white');
                                        $(".target_value4"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value4"+id_value[1]).css('background-color','white');
                                        $(".target_value5"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value5"+id_value[1]).css('background-color','white');
                                        $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                        $(".target_value1"+id_value[1]).removeAttr('disabled');
                                        $(".target_value2"+id_value[1]).removeAttr('disabled');
                                        $(".target_value3"+id_value[1]).removeAttr('disabled');
                                        $(".target_value4"+id_value[1]).removeAttr('disabled');
                                        $(".target_value5"+id_value[1]).removeAttr('disabled');
                                    }
                                    else if(selected_unit == 'Percentage' || selected_unit == 'Ratio' || selected_unit == 'Days')
                                    {
                                       $("#unit_value-"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value1"+id_value[1]).removeAttr('readonly');
                                        $(".target_value2"+id_value[1]).removeAttr('readonly');
                                        $(".target_value3"+id_value[1]).removeAttr('readonly');
                                        $(".target_value4"+id_value[1]).removeAttr('readonly');
                                        $(".target_value5"+id_value[1]).removeAttr('readonly');  
                                        $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                        $(".target_value1"+id_value[1]).removeAttr('disabled');
                                        $(".target_value2"+id_value[1]).removeAttr('disabled');
                                        $(".target_value3"+id_value[1]).removeAttr('disabled');
                                        $(".target_value4"+id_value[1]).removeAttr('disabled');
                                        $(".target_value5"+id_value[1]).removeAttr('disabled');
                                        $("#unit_value-"+id_value[1]).datepicker("destroy");      
                                        $(".target_value1"+id_value[1]).datepicker("destroy");
                                        $(".target_value2"+id_value[1]).datepicker("destroy");
                                        $(".target_value3"+id_value[1]).datepicker("destroy");
                                        $(".target_value4"+id_value[1]).datepicker("destroy");
                                        $(".target_value5"+id_value[1]).datepicker("destroy");
                                        $(".fields").keyup(function(){
                                            var data_value = $(this).val();
                                            var str = /^([0-9]{1,})$/;
                                            if ((data_value.length>0) && !str.test(data_value)) {
                                                $("#validation_msg").css('display','block');
                                            }
                                            else
                                            {
                                                $("#validation_msg").css('display','none');
                                            }
                                        });

                                    }                       
                                });
                });                           
                       
            </script>

            <script type="text/javascript">
                var j = jQuery.noConflict();
                function get_notify(e)
                {                    
                    var settings = {
                            theme: 'teal',
                            horizontalEdge: 'top',
                            verticalEdge: 'right'
                        },
                        $button = $(this);
                    
                    if ($.trim($('#notific8_heading').val()) != '') {
                        settings.heading = $.trim($('#notific8_heading').val());
                    }
                    
                    if (!settings.sticky) {
                        settings.life = '10000';
                    }

                    j.notific8('zindex', 11500);
                    j.notific8($.trim(e), settings);
                    
                    $button.attr('disabled', 'disabled');
                    
                    setTimeout(function() {
                        $button.removeAttr('disabled');
                    }, 1000);
                }        
            </script>
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Set Goals</h1>                        
                        
                        <!-- Sidebar Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                        </button>
                        <!-- Sidebar Toggle Button -->
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
                                    <button type="button" data-dismiss="modal" class="btn green" id="continue_goal_set">Continue Task</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                  <script>
                      $(function() {
                        // $("#unit_value").datepicker({
                        //     onSelect: function(date) {
                        //         //alert(date)
                        //          var selected_unit1 = {
                        //             unit_type : $('.format_list').find(':selected').val(),
                        //             'unit_value' : date,
                        //         };
                        //         alert(selected_unit1);
                        //         var base_url = window.location.origin;
                        //         $.ajax({
                        //             type : 'post',
                        //             datatype : 'html',
                        //             data : selected_unit1,
                        //             url : base_url+'/pmsapp/index.php?r=Setgoals/fetch_field',
                        //             success : function(data)
                        //             {
                        //                 var res = data.split(","); 
                        //                 $("#field1").attr('value',res[0]);
                        //                 $("#field2").attr('value',res[1]);
                        //                 $("#field3").attr('value',res[2]);
                        //                 $("#field4").attr('value',res[3]);
                        //                 $("#field5").attr('value',res[4]);
                        //                 alert(data);
                        //                 //$("#value_field").html(data);
                        //                 //$("#unit_value").datepicker();
                        //             }
                        //         });
                        //      },
                        // });                        
                      });
                </script>
                
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->
                            
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <!-- <ul class="nav navbar-nav margin-bottom-35">
                                        <li class="active">                                            
                                                <?php  if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='3') { ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/">Set Goals</a><?php }else if(Yii::app()->user->getState("role_id")=='1'){ ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Newemployee/employee_master">Employee Master</a><?php }else{ ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Setgoals/approvegoals">Approve Goals</a><?php } ?>
                                        </li>
                                        <li>                                            
                                                <?php  if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='3') { ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/setbyemployee">Mid Review</a><?php } ?>
                                        </li>
                                        <li>
                                                <?php if(Yii::app()->user->getState("role_id") && Yii::app()->user->getState("role_id")=='2') { ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Midreview/">Mid Review</a><?php }else{ ?><a hre="">Elevation</a><?php } ?>
                                        </li>
                                           <?php if(Yii::app()->user->getState("role_id")=='1'){ ?>
                                            <li><a href="#">Organization Structure</a></li>
                                            <?php }?>  
                                             <?php if(Yii::app()->user->getState("role_id")=='1'){ ?>
                                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=KRA/kra_create">KRA</a></li>
                                            <?php }?>
                                    </ul>
                                    <ul class="nav navbar-nav margin-bottom-35">
                                        <li class="active">
                                            <a href="index.html">
                                                <i class="icon-home"></i> Home </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-note "></i> Task </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> Projects </a>
                                        </li>                                                                             
                                    </ul>    -->
                                
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="note note-success popupbox" style="display: none">
                                    <p class="popupmsg"></p>
                                </div>
                                <div class="mt-bootstrap-tables">
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
                                            url : base_url+'/pmsuser/index.php?r=Newemployee/getlist',
                                            success : function(data)
                                            {
                                                $("#get_goal_list").html(data);
                                            }
                                        });
                                    }                                   
                                }
                                </script>
                                    <div id="get_goal_list">
                                       <div class="col-md-12">
                                           <div id="validation_msg" class="alert alert-danger" style="display: none">
                                          Only Numbers are allowed.
                                        </div>       
                                        <div id="validation_chk" class="alert alert-danger" style="display: none">
                                          
                                        </div>                                   
                                            <div class="portlet light bordered">                                                
                                                <div class="portlet-body">
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
                                                            $kpi_category = '';$kpi_desc = '';$wtg = '';$kpi_count = '';$target_value1 = '';$target_unit = '';$kpi_id = '';
                                                           $format_list = array('Select' => 'Select','Days' => 'Days','Date' => 'Date','Units' => 'Units','Weight' => 'Weight','Ratio' => 'Ratio','Value' => 'Value','Percentage' => 'Percentage');
                                                            $wtage = array('0'=>'0','15'=>'15','20'=>'20','30'=>'30','40'=>'40','50'=>'50');
                                                            if (isset($kpi_data_edit)) {
                                                               $kpi_category[$kpi_data_edit['0']['KRA_category']] = array('selected' => 'selected');
                                                               $kpi_desc = $kpi_data_edit['0']['KRA_description'];
                                                               $kpi_id = $kpi_data_edit['0']['KPI_id'];
                                                               $wtg[$kpi_data_edit['0']['target']] = array('selected' => 'selected');
                                                               $kpi_count = explode(';', $kpi_data_edit['0']['kpi_list']);
                                                               $target_unit = explode(';', $kpi_data_edit['0']['target_unit']);
                                                               $target_value1 = explode(';', $kpi_data_edit['0']['target_value1']);
                                                            }
                                                           $cities = array('Business'=>'Business','Process'=>'Process','People'=>'People','Customer'=>'Customer');
                                                             echo CHtml::dropDownList("target_value",'',$list,$htmlOptions=array('class'=>"form-control target_value",'style'=>"width: 186px;",'onchange'=>'js:get_target_value();'),array('options' => $kpi_category));
                                                            ?>
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                            <td style="width:310px;"><label id="kpi_edit_id" style="display: none"><?php echo $kpi_id; ?></label>
                                                                KRA Description
                                                             </td>
                                                             <td colspan=7 align="center" valign=bottom>                
                                                            <?php echo CHtml::textArea('KRA_description',$kpi_desc,array('style'=>'max-width: 1101px;max-height: 67px;min-width: 1101px;min-height: 67px;','class'=>'form-control')); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                            <td style="width:310px;">
                                                                Weightage
                                                             </td>
                                                             <td colspan=7 align="center" id="Weightage_list">
                                                           <?php
                                                           
                                                            echo CHtml::dropDownList("Weightage",'',$wtage,$htmlOptions=array('class'=>"form-control Weightage",'style'=>"width: 186px;"),array('option'=>$wtg)); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                            <td style="width:310px;" rowspan=2>
                                                               Key Performance Indicator (KPI) description
                                                             </td>
                                                             <td style="text-align:center; width:206px;">
                                                                Unit
                                                             </td>
                                                             <td style="width:135px; text-align:center;">Value</td>
                                                           
                                                             <td style="text-align:center; background-color: rgb(177, 178, 178);" colspan=6>Target</td>
                                                             
                                                        </tr> 
                                                    <tr>
                                                        <td style="width:206px;">
                                                                
                                                     </td>
                                                     <td style="width:135px;"></td>
                                                        <td align="center" style="background-color: rgb(177, 178, 178);">1</td>
                                                        <td align="center" style="background-color: rgb(177, 178, 178);">2</td>
                                                        <td align="center" style="background-color: rgb(177, 178, 178);">3</td>
                                                        <td align="center" style="background-color: rgb(177, 178, 178);">4</td>
                                                        <td align="center" style="background-color: rgb(177, 178, 178);">5</td>
                                                    </tr> 
                                                   <tr id="other_format_text">
                                                   <label id="kpi_list_number" style="display: none"><?php if($kpi_count != '')
                                                    {
                                                        echo count($kpi_count);
                                                    }?></label>
                                                    <table id="kpi_record">
                                                    <?php 
                                                        if (isset($kpi_count) && $kpi_count!='') { 
                                                            for ($i=0; $i < count($kpi_count); $i++) {
                                                            $unit = $target_unit[$i];
                                                            $unit_type[$unit] = array('selected' => 'selected');
                                                            //print_r($unit_type);die();
                                                            //$value = $target_value1[$i];
                                                            echo '<tr><td id="kpilist_'.$i.'">
                            <input type="text" class="form-control kpi_list"  style="display: none">'.CHtml::textField('kpi_list',$kpi_count[$i],array('class'=>'form-control kpi_list','id'=>'kpilistyii_'.$i.'','style'=>'width: 326px;')).'<div id="kpi_list_drop_'.$i.'" style="position: absolute;border: 1px solid rgb(177, 178, 178);padding: 15px;display: none;background-color: rgb(177, 178, 178);opacity: 0.8;width: 326px;"></div></td><td style="width: 225px;">'.CHtml::dropDownList("format_list",'',$format_list,$htmlOptions=array('class'=>'form-control format_list format_detail','id'=>'mask_number-'.$i),array('options' => $unit_type)).'</td><td id="value_field">'.CHtml::textField('unit_value','',array('class'=>'form-control','id'=>'unit_value','style'=>'display:none')).CHtml::textField('unit_value',$target_value1[$i],array('class'=>'form-control value_field','id'=>'unit_value-'.$i.'')).'</td><td>'.CHtml::textField('target_value1','',array('class'=>'form-control fields target_value1'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value2','',array('class'=>'form-control fields target_value2'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value3','',array('class'=>'form-control fields target_value3'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value4','',array('class'=>'form-control fields target_value4'.$i.'','disabled' => true)).'</td><td>'.CHtml::textField('target_value5','',array('class'=>'form-control fields target_value5'.$i.'','disabled' => true)).'</td></tr>';    
                                                        } }
                                                    ?>                                                    
                                                </table>
                                                    </tr>                                             
                                                </table>
                                                </div>                                                
                                            </div>
                                          
                                        </div>                     
                                    </div>                                                            
                                    </div>
                                    <?php $this->endWidget(); ?>
                                    </div> 
                                     <div class="btn-group" style="float:right">
                                        <?php if(isset($edit_flag) && $edit_flag!='')
                                         {?>
                                        <?php echo CHtml::button('Update',array('class'=>'btn green','style'=>'float:right','id'=>'update_kra','onclick'=>'js:update_kra();')); ?>
                                        <?php }else{ ?>
                                        <?php echo CHtml::button('Submit',array('class'=>'btn green','style'=>'float:right','id'=>'submit_kra','onclick'=>'js:submit_kra();')); ?>
                                        <?php } ?>
                                    </div>
                                     <div class="portlet light bordered">
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#employee_table').DataTable();
                                                });
                                            </script>
                                            <div class="portlet-body">
                                                <!-- <table class="table table-striped table-bordered table-hover order-column" id="employee_table">
                                                    <thead>
                                                        <tr>  
                                                            <th>Sr.No</th>                                                          
                                                            <th>KRA Category</th>
                                                            <th>KRA Description</th>
                                                            <th>Weightage</th>
                                                            <th>KPI List</th>
                                                            <th>Goal Set Date</th>
                                                            <th>KRA Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <style type="text/css">
                                                        .label-success {
                                                            background-color: #5CB85C;
                                                        }
                                                    </style>
                                                    <?php
                                                        $kra_list=$model->getdata(); 
                                                        if (isset($kra_list)) {
                                                           foreach ($kra_list as $row) { ?>
                                                            <tr>
                                                                <td><input id="checkbox1" class="md-check" type="checkbox"></td>
                                                                <td><?php echo $row['KRA_category']; ?></td>
                                                                <td><?php echo $row['KRA_description']; ?></td>
                                                                <td><?php echo $row['target']; ?></td>
                                                                <td><?php echo $row['kpi_list']; ?></td>
                                                                <td><?php echo $row['KRA_date']; ?></td>  
                                                                <td><?php if($row['KRA_status'] == 'approved') { ?><span class="label label-sm label-success"> Approved </span><?php } else { ?><span class="label label-sm label-danger"> Pending </span><?php } ?></td>             
                                                            </tr>
                                                       
                                                        <?php    }
                                                        }
                                                    ?>                        
                                                    </tbody>
                                                </table> -->                                                
                                            </div>
                                        </div>   
                                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                                        <?php
                                            if (isset($kpi_data)) { $cnt = 1; ?>
                                            <label class='count_goal' style="display: none"><?php echo count($kpi_data); ?></label>
                                          <?php     
                                        foreach ($kpi_data as $row) {  ?>
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">                                                    
                                                    <label style="display: none" id="total_<?php echo $cnt; ?>"><?php echo $row['target']; ?></label>
                                                    <i class="fa fa-cogs"></i><?php echo $row['KRA_category']; ?><?php echo "(".$row['target'].")"; ?></div>
                                                <div class="tools">
                                                    <?php echo "KRA Approval Status : ".$row['KRA_status']; ?>
                                                    <a href="javascript:;" class="collapse"> </a>                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body flip-scroll">
                                                <table class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content">
                                                        <tr>
                                                            <th width="20%"> KRA Category </th>
                                                            <th> KPI List </th>
                                                            <th class="numeric"> KPI Unit Format </th>
                                                            <th class="numeric"> KPI value </th>                                                            
                                                            <th class="numeric"> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
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
                                                            <td rowspan="<?php echo count($kpi_list_data); ?>"><?php echo $row['KRA_description']; ?></td>
                                                            <td>
                                                            <table class="table">
                                                                <?php
                                                                for ($i=0; $i < count($kpi_data_data); $i++) { 
                                                            ?>
                                                            <tr><td><?php echo $kpi_list_data[$i];echo""; ?></td></tr>
                                                            <?php
                                                                }
                                                            ?>   
                                                            </table>                                                         
                                                            </td>                                                            
                                                            <td class="numeric">
                                                                <table class="table">
                                                                <?php
                                                                for ($i=0; $i < count($kpi_data_data); $i++) { 
                                                                ?>
                                                                <tr><td><?php echo $kpi_list_unit[$i];echo""; ?></td></tr>
                                                                <?php
                                                                    }
                                                            ?>  
                                                            </table>  
                                                            </td>
                                                            <td class="numeric">
                                                                 <table class="table">
                                                                <?php
                                                                for ($i=0; $i < count($kpi_data_data); $i++) { 
                                                                    $value_data = explode('-', $kpi_list_target[$i]);
                                                                    //print_r($value_data);die();
                                                                ?>
                                                                <tr><td>
                                                                <table>
                                                                    <tr>
                                                                    <?php
                                                                        for ($i=0; $i < count($value_data); $i++) { 
                                                                    ?>
                                                                        <td><?php echo $value_data[$i]; ?></td>
                                                                    <?php } ?>
                                                                    </tr>
                                                                </table>
                                                                </td></tr>
                                                                <?php
                                                                    }
                                                            ?>  
                                                            </table>  
                                                            </td>                                                            
                                                            <td class="numeric"><a href="<?php echo $this->createUrl('Setgoals/kpi_edit', array('KPI_id' => $row['KPI_id']));
     ?>"><i class="fa fa-pencil fa-fw" title="Delete" aria-hidden="true"></i></a><i class="fa fa-trash-o del_kpi" style="cursor: pointer;" id="KPI_id-<?php echo $row['KPI_id']; ?>" title="Delete" aria-hidden="true"></i></td>                                                           
                                                        </tr>                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                         <?php 
                                           $cnt++; } }
                                        ?>
                                        <!-- END SAMPLE TABLE PORTLET-->      
                                        <?php 
                                            if (isset($kpi_data) && count($kpi_data)>0) { ?>
                                          <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>     
                                         <div class="btn-group col-md-6" style="float:left">
                                        <?php echo CHtml::button('Final Submission',array('class'=>'btn green','style'=>'float:right','id'=>'send_for_appraisal','onclick'=>'js:send_notification();')); ?>
                                        <?php } ?>
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
                
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script type="text/javascript">
                 
                function send_notification()
                {
                    var total = 0;
                    var total_goal = $(".count_goal").text();
                    var j = jQuery.noConflict();
                    console.log(total_goal);
                    if(total_goal < 4)
                    {
                        get_notify("Minimum 4 KRA Required.");
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
                             $("#validation_chk").text("Total of KRA should be 100 only.");
                            $("#validation_chk").css('display','block');
                        }
                        else
                        { 
                            $("#validation_chk").css('display','none');                           
                            jQuery("#static").modal('show');
                            $("#continue_goal_set").click(function(){
                                $("#show_spin").show();
                                 var base_url = window.location.origin;
                                    $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        url : base_url+'/pmsuser/index.php?r=Setgoals/sendmail',
                                        success : function(data)
                                        {
                                            //alert(data);
                                            $("#show_spin").hide();
                                           get_notify("Notification send to appraiser.");                                     
                                        }
                                    });
                            });
                          
                        }
                    }

                }
                var error = '';
                // $(function(){
                function submit_kra()
                {
                     var kra_des = $("#KRA_description").val();
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
                        var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';
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
                        else if(selected_unit != 'Select')
                        {
                            if (selected_unit != 'Units' && selected_unit != 'Weight' && selected_unit != 'Value') 
                        { 
                            
                            for(var i = 0;i < kra_num; i++)
                            {
                                var list_data = $("#mask_number-"+i).find(':selected').val();
                                if ($(".target_value1"+i).val()!='' && $("#kpilistyii_"+i).val() == '') 
                                {
                                     error = 'Please Fill KPI  List';
                                     break;
                                }
                                else if($("#kpilistyii_"+i).val()=='' && list_data != 'Select')
                                {
                                    error = 'Please Fill KPI  List';
                                     break;
                                } 
                                else if($("#kpilistyii_"+i).val()!='' && list_data != 'Select' && ($(".target_value1"+i).val()=='' || $(".target_value1"+i).val()=='' || $(".target_value1"+i).val()=='' || $(".target_value1"+i).val()==''))
                                {
                                     error = 'Please enter unit value.';
                                     break;
                                }  
                                else
                                {
                                    error = '';
                                }                             
                            }                            
                                                         
                                
                            for(var i = 0;i < kra_num; i++)
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
                        else
                        {
                            for (var i = 0; i < kra_num; i++) 
                            {
                                var list_data = $("#mask_number-"+i).find(':selected').val();
                                if ($("#unit_value-"+i).val()!='' && $("#kpilistyii_"+i).val() == '') 
                                {
                                    error = 'Please Fill KPI List';
                                    break;
                                }
                                else if($("#unit_value-"+i).val()=='' && $("#mask_number-"+i).find(':selected').val() != 'Select')
                                {
                                     error = 'Please enter unit value.';
                                     break;
                                } 
                                else
                                {
                                    error = '';
                                }                          
                             }                               
                                                   
                            for (var i = 0; i < kra_num; i++) {                               
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
                            error = 'Please Fill KPI Details';
                        }
                        
                        for (var i = 0; i < kra_num; i++) {
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
                        //alert(error);
                        var data = {
                            'KRA_category' : $("#target_value").find(':selected').val(),
                            'KRA_description' : $("#KRA_description").val(),
                            'target' : $("#Weightage").find(':selected').val(),
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                        };
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                        if(error != '')
                        {
                            //alert(error);
                            $("#validation_chk").text(error);
                           $("#validation_chk").css('display','block');
                        }
                        else
                        {
                             $("#validation_chk").css('display','none');
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/pmsuser/index.php?r=Setgoals/save_kpi',
                                success : function(data)
                                {
                                    //alert(data);
                                    if (data = "Success")
                                    {
                                        get_notify("KRA added successfully");
                                        location.reload();
                                    }
                                    
                                }
                            });
                        }
                        
                        console.log(data);
                    }
                    else
                    {
                        $("#validation_chk").text(error);
                        $("#validation_chk").css('display','block');
                        //alert(error);
                    }

                //     var total_target_value = '';
                //     var no_of_kra = {
                //         'no_of_kra' : $("#no_of_kra").val(),
                //     }
                //     for (var i = 0; i < $("#no_of_kra").val(); i++) {
                //         if (total_target_value == '') 
                //         {
                //             total_target_value = parseInt($(".Weightage"+i).find(':selected').val());
                //         }
                //         else
                //         {
                //             total_target_value = total_target_value+parseInt($(".Weightage"+i).find(':selected').val());
                //         }
                //         alert(total_target_value);
                //         if(total_target_value>100)
                //         {
                //             $(".popupmsg").text("Target total should be eual to 100 only");
                //             $(".popupbox").show();
                //             $(".popupbox").fadeOut(5000);
                //             //alert("Target total should be eual to 100 only")
                //         }
                //         // else
                //         // {

                //         // }
                //     }
                // });
                // });
            }
            function update_kra()
                {
                     var kra_des = $("#KRA_description").val();
                     var data_length = kra_des.length;
                     //alert(data_length);
                    if (data_length==0)
                    {
                        error = 'Please enter kra description';
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
                        var kra_num = $("#kpi_list_number").text();var kpi_list = '';var kpi_unit = '';var kpi_value = '';                        
                        for (var i = 0; i < kra_num; i++) {
                            if (kpi_list == '')
                            {
                                kpi_list = $("#kpilistyii_"+i).val();
                                kpi_unit = $("#mask_number-"+i).find(':selected').val();
                                kpi_value = $("#unit_value-"+i).val();
                            }
                            else
                            {
                                kpi_list = kpi_list+';'+$("#kpilistyii_"+i).val();
                                kpi_unit = kpi_unit+';'+$("#mask_number-"+i).find(':selected').val();
                                kpi_value = kpi_value+';'+$("#unit_value-"+i).val();
                            }
                        }
                        var data = {
                            'KPI_id' : $("#kpi_edit_id").text(),
                            'KRA_category' : $("#target_value").find(':selected').val(),
                            'KRA_description' : $("#KRA_description").val(),
                            'target' : $("#Weightage").find(':selected').val(),
                            'target_unit' : kpi_unit,
                            'target_value1' : kpi_value,
                            'kpi_list' : kpi_list,
                        };
                        var base_url = window.location.origin;
                        $.ajax({
                        type : 'post',
                        datatype : 'html',
                        data : data,
                        url : base_url+'/pmsuser/index.php?r=Setgoals/update_kpi',
                        success : function(data)
                        { 
                                            
                            if (data = "success")
                            {
                                get_notify("KRA Updated Successfully");
                                location.reload();
                            }
                            
                        }
                    });
                        console.log(data);
                    }
                    else
                    {
                        get_notify(error);
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
                            url : base_url+'/pmsuser/index.php?r=Setgoals/gettarget_value',
                            success : function(data)
                            { 
                                var detail = jQuery.parseJSON(data);
                                $("#kpi_record").html(detail[0]);
                                $("#kpi_list_number").html(detail[1]);
                                $('.format_detail').change(function(){
                                    //alert("jkhjk");
                                    var value = $(this).val();
                                     var id = $(this).prop('id');
                                     var id_value = id.split('-');
                                    // $("#unit_value-"+id_value[1]).val('');
                                    // $(".target_value1"+id_value[1]).val('');
                                    // $(".target_value2"+id_value[1]).val('');
                                    // $(".target_value3"+id_value[1]).val('');
                                    // $(".target_value4"+id_value[1]).val('');
                                    // $(".target_value5"+id_value[1]).val('');
                                     //get_value(value,id_value[1]);
                                    // var selected_unit = $('.format_list').find(':selected').val();
                                    // var target_value = '';
                                    var selected_unit = $('#mask_number-'+id_value[1]).find(':selected').val();
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
                                       
                                        $("#unit_value-"+id_value[1]).datepicker("destroy");      
                                        $(".target_value1"+id_value[1]).datepicker("destroy");
                                        $(".target_value2"+id_value[1]).datepicker("destroy");
                                        $(".target_value3"+id_value[1]).datepicker("destroy");
                                        $(".target_value4"+id_value[1]).datepicker("destroy");
                                        $(".target_value5"+id_value[1]).datepicker("destroy");
                                       
                                    }
                                    else if(selected_unit == 'Date')
                                    {
                                        //$("#unit_value-"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value1"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value2"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value3"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value4"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $(".target_value5"+id_value[1]).datepicker({changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                                        $("#unit_value-"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value1"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value1"+id_value[1]).css('background-color','white');
                                        $(".target_value2"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value2"+id_value[1]).css('background-color','white');
                                        $(".target_value3"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value3"+id_value[1]).css('background-color','white');
                                        $(".target_value4"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value4"+id_value[1]).css('background-color','white');
                                        $(".target_value5"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value5"+id_value[1]).css('background-color','white');
                                        $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                        $(".target_value1"+id_value[1]).removeAttr('disabled');
                                        $(".target_value2"+id_value[1]).removeAttr('disabled');
                                        $(".target_value3"+id_value[1]).removeAttr('disabled');
                                        $(".target_value4"+id_value[1]).removeAttr('disabled');
                                        $(".target_value5"+id_value[1]).removeAttr('disabled');
                                    }
                                    else if(selected_unit == 'Percentage' || selected_unit == 'Ratio' || selected_unit == 'Days')
                                    {
                                       $("#unit_value-"+id_value[1]).attr('readonly','readonly');
                                        $(".target_value1"+id_value[1]).removeAttr('readonly');
                                        $(".target_value2"+id_value[1]).removeAttr('readonly');
                                        $(".target_value3"+id_value[1]).removeAttr('readonly');
                                        $(".target_value4"+id_value[1]).removeAttr('readonly');
                                        $(".target_value5"+id_value[1]).removeAttr('readonly');  
                                        $("#unit_value-"+id_value[1]).removeAttr('disabled');
                                        $(".target_value1"+id_value[1]).removeAttr('disabled');
                                        $(".target_value2"+id_value[1]).removeAttr('disabled');
                                        $(".target_value3"+id_value[1]).removeAttr('disabled');
                                        $(".target_value4"+id_value[1]).removeAttr('disabled');
                                        $(".target_value5"+id_value[1]).removeAttr('disabled');
                                        $("#unit_value-"+id_value[1]).datepicker("destroy");      
                                        $(".target_value1"+id_value[1]).datepicker("destroy");
                                        $(".target_value2"+id_value[1]).datepicker("destroy");
                                        $(".target_value3"+id_value[1]).datepicker("destroy");
                                        $(".target_value4"+id_value[1]).datepicker("destroy");
                                        $(".target_value5"+id_value[1]).datepicker("destroy");
                                        $(".fields").keyup(function(){
                                            var data_value = $(this).val();
                                            var str = /^([0-9]{1,})$/;
                                            if ((data_value.length>0) && !str.test(data_value)) {
                                                $("#validation_msg").css('display','block');
                                            }
                                            else
                                            {
                                                $("#validation_msg").css('display','none');
                                            }
                                        });

                                    }
                                          
                                });
                                $('.value_field').keyup(function(e){
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
                                            $("#validation_msg").css('display','block');
                                        }
                                        else
                                        {
                                            $("#validation_msg").css('display','none');
                                            $.ajax({
                                            type : 'post',
                                            datatype : 'html',
                                            data : selected_unit1,
                                            url : base_url+'/pmsuser/index.php?r=Setgoals/fetch_field',
                                            success : function(data)
                                            {
                                                //alert(data);
                                                var res = data.split(","); 
                                                $(".target_value1"+id_value[1]).attr('value',res[0]);
                                                $(".target_value2"+id_value[1]).attr('value',res[1]);
                                                $(".target_value3"+id_value[1]).attr('value',res[2]);
                                                $(".target_value4"+id_value[1]).attr('value',res[3]);
                                                $(".target_value5"+id_value[1]).attr('value',res[4]);
                                                //alert(data);
                                                //$("#value_field").html(data);
                                                //$("#unit_value").datepicker();
                                            }
                                            });
                                        }
                                });
                                $('.kpi_list').keyup(function(){
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
                                            url : base_url+'/pmsuser/index.php?r=Setgoals/kpi_list',
                                            success : function(data)
                                            {
                                                $("#kpi_list_drop_"+num[1]).show();
                                                $("#kpi_list_drop_"+num[1]).html(data);
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
                                                //$("#value_field").html(data);
                                                //$("#unit_value").datepicker();
                                                //  $("#kpi_list_drop_"+num[1]).hover(function(){
                                                //     $("#kpi_list_drop_"+num[1]).show();
                                                // });
                                               
                                            }
                                        });
                                        });
                                
                            }
                        });
                }
                </script>
