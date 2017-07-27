       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <script type="text/javascript">
       var id,id_value;var sum_value = '';
       var str_chk = /^[0-9]{1}/;
            $(function(){
            $(window).scroll(function()
            {
                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
            });      
                $(".score").keyup(function() {
                    id = $(this).attr('id');
                    id_value = id.split('-');
                        if ($(this).val() == 0 || !$.isNumeric($(this).val()) || $(this).val()>5) 
                        {
                            //alert("jlkj")
                             $("#err").show();  
                             $("#appraiser_raiting-"+id_value[1]+"-"+id_value[2]).css('border','1px solid red');
                            //$("#err").fadeOut(6000);
                            $("#err").text("Please enter valid rating between 0-5.");
                            $("#err").addClass("alert-danger");
                        }
                        else
                        {
                            $("#err").hide();
                           sum_value = '';var val_new = 0;
                           $("#appraiser_raiting-"+id_value[1]+"-"+id_value[2]).css('border','1px solid #999');                         
                            //alert(id_value);
                            for (var i = 0; i < $("#kpi_count_list-"+id_value[2]).text(); i++) {
                                if (!str_chk.test($("#appraiser_raiting-"+i+"-"+id_value[2]).val()) || $("#appraiser_raiting-"+i+"-"+id_value[2]).val() == '') 
                                {
                                    val_new = 0;
                                }
                                else
                                {
                                    val_new = $("#appraiser_raiting-"+i+"-"+id_value[2]).val();
                                }
                                if(sum_value == '')
                                {
                                     sum_value = val_new;
                                }
                                else
                                {
                                    sum_value = parseFloat(sum_value)+parseFloat(val_new);
                                }                          
                            }

                            var avg_get = sum_value/$("#kpi_count_list-"+id_value[2]).text();
                            $("#sum-"+id_value[2]).attr('value',avg_get.toFixed(2));
                        }                       
                    // });
                });
            });
       </script>
       <style media="all" type="text/css">
      
      #err, #error { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 255px;
height: 60px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
      
      }
      
   </style>
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
                            <h1>Year End Review(A)</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                        <div id="err" style="display: none"></div>
            <div class="container-fluid"> 
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Year_endreview/year_end_reviewlist/"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;')); ?></a><br><br>                  
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->                           
                            <!-- END PAGE SIDEBAR -->

                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->                                
                                <div>                                               
                                   <!-- </div>
                                </div> -->
                                <?php
                                    if (isset($kpi_data) && count($kpi_data)>0) {
                                ?>

                                <div class="portlet box bg-blue-soft border-blue-soft">
                                    <div class="portlet-title">
                                        <div class="caption">
                                           Review</div>
                                    </div>
                                    <div class="portlet-body tabs-below">
                                        <div class="tab-content table-responsive">
                                <?php    
                                for ($k=0; $k < count($kpi_data); $k++) { 
                                ?>
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                    <div style="border: 1px solid rgb(76, 135, 185);margin-top: 20px;padding-left: 10px;">
                                        <table class="table table-bordered" cellspacing="0" border="0" style="margin-top: 21px;">
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Description</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_description'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Category</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_category'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>Weightage</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdnum="16393;0;0"><?php echo $kpi_data[$k]['target'];?></td>
                                                </tr>
                                            <tr>
                                                <td align="left" valign=middle><b><font face="Calibri" size=3>Key Performance Indicators (KPI) Description</font></b></td>
                                                <td align="left" valign=middle ><font face="Calibri" size=3>Unit & Value</font></td>
                                                <!-- <td align="left" valign=middle ><font face="Calibri" size=3>Value</font></td> -->
                                                <td align="left" valign=middle><b><font face="Calibri" size=3>Actual achievement of year end</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraisee comment on actual achievement</font></b></td>
                                                 <td style="font-weight:bold;text-align: center;">
                                                                Appraisee <br>Rating</td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraiser Comment on actual achievement</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraiser Rating</font></b></td>
                                               <!--  <td style="font-weight:bold;text-align: center;">
                                                                KPI <br>Status</td> -->
                                               <!--  <td align="left" valign=middle ><b><font face="Calibri" size=3>Average rating for KRA</font></b></td> -->
                                            </tr>
                                            <?php 
                                                $form=$this->beginWidget('CActiveForm', array(
                                               'id'=>'user-form',
                                                'enableClientValidation'=>true,
                                                'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                                //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
                                            ));
                                            ?>
                                                <?php
                                                        $kpi_list = explode(';',$kpi_data[$k]['kpi_list']);
                                                        $kpi_unit = explode(';',$kpi_data[$k]['target_unit']);
                                                        $kpi_value = explode(';',$kpi_data[$k]['target_value1']);
                                                        $goal_status_flag = explode(';', $kpi_data[$k]['final_year_kra_status']);
                                                        if ($kpi_data[$k]['year_end_achieve'] != '') {
                                                           $year_end_achieve = explode(';',$kpi_data[$k]['year_end_achieve']);
                                                        }
                                                        else
                                                        {
                                                            $year_end_achieve = '';
                                                        }                                                        
                                                        if ($kpi_data[$k]['year_end_reviewa'] != '') {
                                                           $year_end_reviewa = explode(';',$kpi_data[$k]['year_end_reviewa']);
                                                        }
                                                        else
                                                        {
                                                            $year_end_reviewa = '';
                                                        }
                                                        if ($kpi_data[$k]['appraiser_end_review'] != '') {
                                                           $apr_comment_values = explode(';',$kpi_data[$k]['appraiser_end_review']);
                                                           //print_r($apr_comment_values);die();
                                                        }
                                                        else
                                                        {
                                                            $apr_comment_values = '';
                                                        }
                                                         if ($kpi_data[$k]['rating_by_emp'] != '') {
                                                           $rating_by_emp = explode(';',$kpi_data[$k]['rating_by_emp']);
                                                           //print_r($apr_comment_values);die();
                                                        }
                                                        else
                                                        {
                                                            $rating_by_emp = '';
                                                        }
							$appraiser_end_rating1 = '';
							if ($kpi_data[$k]['appraiser_end_rating'] != '') {
                                                           $appraiser_end_rating1 = explode(';',$kpi_data[$k]['appraiser_end_rating']);
							$avg_rating = $kpi_data[$k]['appraiser_avrage_end'];
                                                           //print_r($appraiser_end_rating1);die();
                                                        }
                                                        else
                                                        {
                                                            $appraiser_end_rating1 = '';$avg_rating ='';
                                                        }
                                                        // if ($kpi_data[$k]['appraiser_end_rating'] != '') {
                                                        //    $appraiser_end_rating = explode(';',$kpi_data[$k]['appraiser_end_rating']);
                                                        // }
                                                        // else
                                                        // {                                                            
                                                        //     $appraiser_end_rating = '';
                                                        // }

                                                        
                                                        
                                                ?>
                                                 
                                                <?php

                                                   for ($i=0; $i < count($kpi_list); $i++) { $appraiser_end_rating[$k][$i] = 0;
                                                    if ($kpi_unit[$i] == 'Units' || $kpi_unit[$i] == 'Weight' || $kpi_unit[$i] == 'Value') 
                                                    {
                                                        //print_r($year_end_achieve[$i]);
                                                        if ($year_end_achieve[$i]<=round($kpi_value[$i]*0.69,2)) {
                                                            $appraiser_end_rating[$k][$i] = 1;
                                                        }
                                                        else if ($year_end_achieve[$i]>round($kpi_value[$i]*0.69,2) && $year_end_achieve[$i]<=round($kpi_value[$i]*0.70,2)) {
                                                            $appraiser_end_rating[$k][$i] = 2;
                                                        }
                                                        else if ($year_end_achieve[$i]<=round($kpi_value[$i]*0.96,2) && $year_end_achieve[$i]>round($kpi_value[$i]*0.70,2)) {
                                                            $appraiser_end_rating[$k][$i] = 3;
                                                        }
                                                        else if ($year_end_achieve[$i]>round($kpi_value[$i]*0.96,2) && $year_end_achieve[$i]<=round($kpi_value[$i]*1.06,2)) {
                                                            $appraiser_end_rating[$k][$i] = 4;
                                                        }
                                                        else if ($year_end_achieve[$i]>=round($kpi_value[$i]*1.39,2)) {
                                                            $appraiser_end_rating[$k][$i] = 5;
                                                        }                                                        
                                                    }
                                                    //print_r($appraiser_end_rating[$k][$i]);

                                                    if ($kpi_unit[$i] != 'Select') {
                                                ?>
                                                <tr>
                                                    <label id='kpi_count_list-<?php echo $kpi_data[$k]['KPI_id']; ?>' style="display: none"><?php echo count($kpi_list); ?></label>
                                                    <td><?php echo $kpi_list[$i]; ?></td>
                                                    <?php
                                                        $emp_id = Yii::app()->user->getState("role_id");
                                                         ?>                                                    
                                                       <td>
                                                      <?php
                                                            if ($kpi_unit[$i] == 'Date' || $kpi_unit[$i] == 'Percentage' || $kpi_unit[$i] == 'Days' || $kpi_unit[$i] == 'Ratio' || $kpi_unit[$i] == 'Text') {
                                                               $value = explode('-',$kpi_value[$i]);
                                                               for ($l=0; $l < count($value); $l++) {
                                                                  ?>
                                                                  <table class="table table-bordered" cellspacing="0" border="0">
                                                               <tr>
                                                                  <td colspan="3"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                   <td colspan="2"><?php echo $kpi_unit[$i]; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                   <td>1</td>
                                                                   <td>2</td>
                                                                   <td>3</td>
                                                                   <td>4</td>
                                                                   <td>5</td>
                                                                 </tr>
                                                                   <tr>                                                                    
                                                               <?php
                                                               for ($l=0; $l < count($value); $l++) { 
                                                                   echo "<td>".$value[$l]."</td>";
                                                               } ?>
                                                               </tr>
                                                               </table>
                                                                <?php
                                                               }
                                                               if($kpi_unit[$i] == 'Date')
                                                               {
                                                                    $actual_year_string = str_replace('/', '-',$year_end_achieve[$i]);
                                                                   $actual_year_string0 = str_replace('/', '-',$value[0]);
                                                                   $actual_year_string1 = str_replace('/', '-',$value[1]);
                                                                   $actual_year_string2 = str_replace('/', '-',$value[2]);
                                                                   $actual_year_string3 = str_replace('/', '-',$value[3]);
                                                                   $actual_year_string4 = str_replace('/', '-',$value[4]);
                                                                   //print_r(strtotime($date_year));echo "<br>";print_r(strtotime($value[0]));die();
                                                                    if (strtotime($actual_year_string)<=strtotime($actual_year_string0)) {
                                                                        $appraiser_end_rating[$k][$i] = 1;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string0) && strtotime($actual_year_string)<=strtotime($actual_year_string1)) {
                                                                        $appraiser_end_rating[$k][$i] = 2;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string1) && strtotime($actual_year_string)<=strtotime($actual_year_string2)) {
                                                                        $appraiser_end_rating[$k][$i] = 3;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string2) && strtotime($actual_year_string)<=strtotime($actual_year_string3)) {
                                                                        $appraiser_end_rating[$k][$i] = 4;
                                                                    }
                                                                    else if (strtotime($actual_year_string)>strtotime($actual_year_string3)) {
                                                                        $appraiser_end_rating[$k][$i] = 5;
                                                                    }
                                                               }
                                                               else
                                                               {
                                                                    if ($year_end_achieve[$i]==$value[0] || ($year_end_achieve[$i]>$value[0] && $year_end_achieve[$i]<$value[1])) {
                                                                        $appraiser_end_rating[$k][$i] = 1;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[1] || ($year_end_achieve[$i]>$value[1] && $year_end_achieve[$i]<$value[2])) {
                                                                        $appraiser_end_rating[$k][$i] = 2;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[2] || ($year_end_achieve[$i]>$value[2] && $year_end_achieve[$i]<$value[3])) {
                                                                        $appraiser_end_rating[$k][$i] = 3;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[3] || ($year_end_achieve[$i]>$value[3] && $year_end_achieve[$i]<$value[4])) {
                                                                        $appraiser_end_rating[$k][$i] = 4;
                                                                    }
                                                                    else if ($year_end_achieve[$i]==$value[4]) {
                                                                        $appraiser_end_rating[$k][$i] = 5;
                                                                    }
                                                               }
                                                              
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                     <table class="table table-bordered" cellspacing="0" border="0">
                                                                 <tr>
                                                                 <td colspan="2"><b><font face="Calibri" size=3>Unit</font></b></td>
                                                                  <td colspan="1"><?php echo $kpi_unit[$i]; ?></td>
                                                                  <td colspan="1"><b><font face="Calibri" size=3>Unit value</font></b></td>
                                                                  <td colspan="1"><?php echo $kpi_value[$i]; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                   <td>1</td>
                                                                   <td>2</td>
                                                                   <td>3</td>
                                                                   <td>4</td>
                                                                   <td>5</td>
                                                                 </tr>
                                                                   <tr>
                                                                    <td><?php echo round($kpi_value[$i]*0.69,2); ?></td>
                                                                    <td><?php echo round($kpi_value[$i]*0.70,2); ?></td>
                                                                       
                                                                     <td><?php echo round($kpi_value[$i]*0.96,2); ?></td>
                                                                        
                                                                    <td><?php echo round($kpi_value[$i]*1.06,2); ?></td>
                                                                        
                                                                     <td><?php echo round($kpi_value[$i]*1.39,2); ?></td>
                                                                   </tr>
                                                                 </table>
                                                                <?php
                                                            }
                                                        ?>
                                                      </td>
                                                            <?php
                                                            if ($year_end_achieve != '' && count($year_end_achieve)>0) {
                                                            ?>
                                                            <td><?php echo CHtml::textField('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control','id'=>'emp_actual_achieve'.$kpi_data[$k]['KPI_id'],'disabled'=> "true")); ?></td>
                                                            <?php
                                                            }
                                                            else
                                                            {?>
                                                           <td><?php echo CHtml::textField('emp_actual_achieve','',array('class'=>'form-control','id'=>'emp_actual_achieve'.$kpi_data[$k]['KPI_id'],'disabled'=> "true")); ?></td>
                                                            <?php } ?>
                                                            <?php
                                                            if ($year_end_reviewa != '' && count($year_end_reviewa)>0) {
                                                            ?>
                                                           <td><?php echo CHtml::textField('appraisee_comment',$year_end_reviewa[$i],array('class'=>'form-control','id'=>'appraisee_comment','disabled'=> "true")); ?></td>
                                                            <td>
                                                            <?php 
                                                            if ($rating_by_emp !='') {
                                                                 echo CHtml::textField('rating_by_emp',$rating_by_emp[$i],array('class'=>'form-control','id'=>'rating_by_emp-'.$i.'-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textField('rating_by_emp','',array('class'=>'form-control','id'=>'rating_by_emp-'.$i.'-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            ?>
                                                                <?php
                                                                    //$goal_status_select = '';
                                                                    // if (isset($goal_status_flag[$i])) {
                                                                    //      $goal_status_select[$goal_status_flag[$i]] = array('selected' => 'selected');
                                                                    // }
                                                                    // else
                                                                    // {
                                                                    //     $goal_status_select['Select'] = array('selected' => 'selected');
                                                                    // }
                                                                    
                                                                    // $goal_status_list = array('Select' => 'Select','Pending' => 'Pending','Approved' => 'Approved');
                                                                    // echo CHtml::dropDownList("goal_status",'',$goal_status_list,$htmlOptions=array('class'=>'form-control','id'=>'goal_status-'.$i.'-'.$kpi_data[$k]['KPI_id'],'options' => $goal_status_select))
                                                                ?>
                                                            </td>
                                                            <td>
                                                            <?php
                                                            }
                                                            else
                                                            {?>
                                                           <td><?php echo CHtml::textField('appraisee_comment','',array('class'=>'form-control','id'=>'appraisee_comment','disabled'=> "true")); ?></td>
                                                            <td>
                                                            <?php } ?>
                                                            <?php 
                                                            if ($apr_comment_values != '' && count($apr_comment_values)>0) {
                                                                echo CHtml::textField('appraiser_comment',$apr_comment_values[$i],array('class'=>'form-control','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textField('appraiser_comment','',array('class'=>'form-control','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            ?></td> 
                                                            <td><?php 
                                                            if (isset($appraiser_end_rating1[$i]) && count($appraiser_end_rating1)>0) {
                                                                 echo CHtml::textField('appraiser_raiting',$appraiser_end_rating1[$i],array('class'=>'form-control score','id'=>'appraiser_raiting-'.$i.'-'.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textField('appraiser_raiting','',array('class'=>'form-control score','id'=>'appraiser_raiting-'.$i.'-'.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            ?></td>  
                                                            
                                                    <?php 
                                                            }
                                                        } ?>   
                                                        </div>
                                                   
                                                </tr>
                                                <tr>
                                                <td colspan=8><b><font face="Calibri" size=3>
                                                <div class='col-md-4'>Average rating for KRA : <?php                                                 
                                                echo CHtml::textField('average_rating',$avg_rating,array('class'=>'form-control','id'=>'sum-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true",'style'=>'width:218px')); 
                                                ?></div>
						<?php 
                                                    if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { ?>
                                                    <a href='<?php echo Yii::app()->request->baseUrl; ?>/data(proof)/<?php if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { echo $kpi_data[$k]['document_proof']; }?>' target="_blank"><?php if(isset($kpi_data[$k]['document_proof']) && $kpi_data[$k]['document_proof']!='') { echo CHtml::button('Open File',array('class'=>'btn border-blue-soft','style'=>'float: right;')); }?></a>
                                                    <?php } ?>
                                                <?php if (isset($as_apr_data) && count($as_apr_data)>0) {  
                                                    echo CHtml::button('Review',array('id'=>$kpi_data[$k]['KPI_id'],'class'=>'btn border-blue-soft year_end_rew_by_apraiser','style'=>'margin-left: 243px;')); 
                                                }
                                                else
                                                { 
                                                    echo CHtml::button('Submit',array('id'=>$kpi_data[$k]['KPI_id'],'class'=>'btn border-blue-soft year_end_rew','style'=>'float: right;'));    
                                                }
                                                ?><i id="updation_spinner-<?php echo $kpi_data[$k]['KPI_id']; ?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i></td>
                                                </tr>

                                            <?php $this->endWidget(); ?>   
                                    </table>                                   
                                    </div>                                    
                                    <?php
                                        } ?>
                                         </div>
                                         </div> 
                                     <?php   }
                                        else
                                        { ?>
                                            <div class="note note-info">
                                                <p> No Data Found </p>
                                            </div>
                                    <?php    }
                                    ?>
                                </div>
                                 <?php if(isset($kpi_data) && count($kpi_data)>0) { ?>
                                        <?php echo CHtml::button('Approve',array('class'=>'btn border-blue-soft send_for_appraisal','style'=>'float:right','id'=>$kpi_data['0']['Employee_id'],'onclick'=>'js:send_notification();')); ?>
                                <?php } ?>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Are you sure you want to send year end review(A) to employee? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button>
                                     <div id="show_spin" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:24px;float: left;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                    <script type="text/javascript">
                    $(function(){
                    $("body").on('click','.send_for_appraisal',function(){
                    $("#err").removeClass("alert-success"); 
                            $("#err").removeClass("alert-danger");
                             var emp_id = {
                              emp_id : $(this).attr('id'),
                            };
                            $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
                            //alert($(this).attr('id'));
                             var base_url = window.location.origin;
                              $.ajax({
                                  type : 'post',
                                  datatype : 'html',
                                  data : emp_id,
                                  url : base_url+'/index.php?r=Year_endreview/final_goal_review1',
                                  success : function(data)
                                  {
                                      if (data == 1) 
                                      {
                                        $("#err").hide(); 
                                          jQuery("#static").modal('show');
                                          $("#continue_goal_set").click(function(){
                                              $("#show_spin").show();
                                                  $.ajax({
                                                      type : 'post',
                                                      datatype : 'html',
                                                      data : emp_id,
                                                      url : base_url+'/index.php?r=Year_endreview/goalnotification',
                                                      success : function(data)
                                                      {
                                                        //alert(data);
                                                          jQuery("#static").modal('toggle');
                                                          $("#show_spin").hide(); 
                                                          $("#err").show();  
                                                          $("#err").fadeOut(6000);
                                                          $("#err").text("Notification Sent to employee");
                                                          $("#err").addClass("alert-success");                       
                                                      }
                                                  });
                                          });
                                      } 
                                      else
                                      {
                                            $("#err").show(); 
                                            $("#err").text("Please submit final year review for all KRA before final Submission");
                                            $("#err").addClass("alert-danger");
                                      }             
                                  }
                              });                          
                            
                            });
                        });
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
                    <script type="text/javascript">
                        $(function(){
                            var str_chk = /^[0-9]{1}/;
                            $("body").on('click','.year_end_rew_by_apraiser',function(){
                                $("#err").removeClass("alert-success"); 
                                $("#err").removeClass("alert-danger"); 
                                var id = $(this).attr('id');
                                var kpi_total = $("#kpi_count_list-"+id).text();
                                
                                var apr_comment = '';var apr_kpi_rating = '';
                                for (var i = 0; i < kpi_total; i++) {
                                    if ($('#appraiser_raiting-'+i+'-'+id).val()<$('#rating_by_emp-'+i+'-'+id).val() && $('#appraiser_comment-'+i+id).val().length == 0) 
                                      {
                                          error = "Please enter final year review comment.";                                  
                                      }
                                      else if ($('#appraiser_raiting-'+i+'-'+id).val()<$('#rating_by_emp-'+i+'-'+id).val() && $('#appraiser_comment-'+i+id).val().length>100) 
                                      {
                                          error = "Maximum 100 charaters are allowed to write comment for review.";                                  
                                      }
                                      else if(!str_chk.test($('#appraiser_raiting-'+i+'-'+id).val()))
                                      {
                                        error = "Please enter rating for KPI's.";
                                      }
                                      else if ($('#appraiser_raiting-'+i+'-'+id).val()>5) 
                                      {
                                          error = "Maximum 5 rating allowed for each kpi.";                                  
                                      }
                                      else if($("#goal_status-"+i+"-"+id).find(":selected").val()=='Select')
                                        {
                                             error = 'Please Select KPI Status';break;
                                        }
                                      else
                                      {
                                        error = '';
                                        if (apr_comment == '') 
                                        {
                                            apr_comment = $('#appraiser_comment-'+i+id).val();
                                        }
                                        else
                                        {
                                            apr_comment = apr_comment+';'+$('#appraiser_comment-'+i+id).val();
                                        }

                                        if (apr_kpi_rating == '') 
                                        {
                                            apr_kpi_rating = $('#appraiser_raiting-'+i+'-'+id).val();
                                        }
                                        else
                                        {
                                            apr_kpi_rating = apr_kpi_rating+';'+$('#appraiser_raiting-'+i+'-'+id).val();
                                        }
                                      }
                                    
                                    
                                }
                         
                              if(error != '')
                              {
                                $("#err").show();
                                $("#err").text(error);
                                $("#err").addClass("alert-danger");
                              }
                              else
                              {
                                var final_year_kra_status = '';
                                for (var i = 0; i < $("#kpi_count_list-"+id).text(); i++) {
                                   if (final_year_kra_status == '')
                                    {
                                        final_year_kra_status = $("#goal_status-"+i+"-"+id).find(":selected").val();
                                        
                                    }
                                    else
                                    {
                                        final_year_kra_status = final_year_kra_status+';'+$("#goal_status-"+i+"-"+id).find(":selected").val();
                                        
                                    }
                                }
                                //alert(final_year_kra_status);
                                 $("#updation_spinner-"+id).css('display','block');
                                  $("#err").hide();  
                                 var data = {
                                    'KPI_id' : $(this).attr('id'),
                                    'appraiser_comment' : apr_comment,
                                    'appraiser_raiting' : apr_kpi_rating,
                                    'average_rating' : $('#sum-'+id).val(),
                                    //'final_year_kra_status' : final_year_kra_status
                                };
                               
                                var base_url = window.location.origin;
                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/index.php?r=Year_endreview/updatereview_appraiser',
                                        success : function(data)
                                        {
                                            //alert(data);
                                            $("#updation_spinner-"+id).css('display','none');
                                            if (data == "Notification Send") 
                                            {
                                                $("#err").show();  
                                                $("#err").fadeOut(6000);
                                                $("#err").addClass("alert-success");
                                                $("#err").text("Year end review updated succesfully");                                                
                                            }
                                            else if(data == "success")
                                            {
                                                $("#err").show();  
                                                $("#err").fadeOut(6000);
                                                $("#err").addClass("alert-success");
                                                $("#err").text("Year end review updated succesfully");
                                            }
                                            else if(data == "error occured")
                                            {
                                                $("#err").show();  
                                                $("#err").fadeOut(6000);
                                                $("#err").addClass("alert-danger");
                                                $("#err").text("No Changes Done");
                                            }
                                                                                                                        
                                        }
                                });
                              }
                               
                            });
                            $(".year_end_rew").click(function(){
                                var id = $(this).attr('id');
                                var data = {
                                    'KPI_id' : $(this).attr('id'),
                                    'year_end_reviewa' : $('#emp_actual_achieve-'+id).val(),
                                };
                                console.log(data);
                                var base_url = window.location.origin;
                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/index.php?r=Year_endreview/updatereview',
                                        success : function(data)
                                        {
                                            get_notify('Year end review updated succesfully');                                   
                                        }
                                });
                            });
                        });
                    </script>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
           
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

