<script>
    $(document).ready(function(){
      //   alert("hi");
if ($('.faculty_type:checked').val() == 'External') 
                          {
                                //alert("External");
                                //$("#ext_faculty").show();
                                $("#ext_faculty1").show();
                                $("#fal_list").hide();
                          }
                          else if($('.faculty_type:checked').val() == 'Internal')
                          {    // alert("hi");
                                $("#ext_faculty").hide();
                                $("#ext_faculty1").hide();
                                $("#fal_list").show();
                          }
});
    
</script>
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Blank Page</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Page Layouts</span>
                            </li>
                        </ul>                       
                    </div>
                    <script type="text/javascript">
                    $(function(){
                        $('input[type="radio"]').click(function(){
                            if ($('.faculty_type:checked').val() == 'External') 
                          {
                                //$("#ext_faculty").show();
                                $("#ext_faculty1").show();
                                $("#fal_list").hide();
                          }
                          else if($('.faculty_type:checked').val() == 'Internal')
                          {
                                $("#ext_faculty").hide();
                                $("#ext_faculty1").hide();
                                $("#fal_list").show();
                          }
                        });
                    });
                    </script>
                    <style media="all" type="text/css">
      
     /* #err, #error { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 226px;
height: 50px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;*/
      
      }
      
   </style>
                    <?php $form=$this->beginWidget('CActiveForm', array(
                       'id'=>'user-form',                                                            
                        // 'action' => $this->createUrl('KRA/save_kra'),
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                                'validateOnSubmit' => true,
                                'afterValidate' => 'js:chk_kradata'

                        ),
                        'htmlOptions'=>array(
                            'class'=>'form-horizontal',
                            'enctype' => 'multipart/form-data'
                        ),
                    ));?>  
                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p> Delete this record? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                    <button type="button" class="btn border-blue-soft" id="continue_goal_set">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="portlet box new_kra" style='border:1px solid #337ab7;'  id='new_kra'>
                    <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                        <div class="caption">
                            Add Program</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">                    
                        <div class="table-responsive">
                 <lable id="program_id" style="display:none" ><?php echo $idp_progdata['0']['id']; ?></lable>
                            <table class="table table-striped table-hover table-bordered" >
                            <tbody>
                                <tr>
                                  <td> Program Name </td>
                                    <td>
                                     <?php
                                    //print_r($idp_progdata);
                                          if( isset($idp_progdata)){       
                                             // echo $idp_progdata['0']['program_name'];die();
                                         echo CHtml::textField("program_name",$idp_progdata['0']['program_name'],$htmlOptions=array('class'=>"form-control",'id'=>'program_name','style'=>'width: 803px;'));
                                          }
                                         else{
                                             echo CHtml::textField("program_name",'',$htmlOptions=array('class'=>"form-control",'id'=>'program_name','style'=>'width: 803px;'));
                                         }
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                  <td> Faculty Type </td>
                                    <!--<td>-->
                                   
                                             
                                     <?php
                                        // echo CHtml::RadioButton('faculty_type', 'faculty_type', array(
                                        //     'value'=>'External','class'=>'faculty_type', 'uncheckValue'=>null
                                        // )).' External ';
                                        // echo CHtml::RadioButton('faculty_type', 'faculty_type', array(
                                        //     'value'=>'Internal','class'=>'faculty_type','uncheckValue'=>null
                                        // )).' Internal '; 
                                        ?>
                                    <!--</td>-->
                                    
                                    <td>
                              
                                     <input value="External" class="faculty_type" <?php if(isset($idp_progdata) && $idp_progdata['0']['faculty_type']=="External") { ?> checked="checked" <?php } ?> name="faculty_type" id="faculty_type" type="radio"> External 
                                     <input value="Internal" class="faculty_type" <?php if(isset($idp_progdata) && $idp_progdata['0']['faculty_type']=="Internal") { ?> checked="checked" <?php } ?> name="faculty_type" id="faculty_type" type="radio"> Internal</td>
                                </tr>
                                 <tr id="ext_faculty1" style="display: none">
                                  <td> External Faculty name </td>
                                    <td>
                                     <?php
                                               if( isset($idp_progdata)){                                                                  
                                                    echo CHtml::textField("external_name",$idp_progdata['0']['external_name'],$htmlOptions=array('class'=>"form-control",'id'=>'external_name','style'=>'width: 803px;'));
                                               }
                                               else{
                                                    echo CHtml::textField("external_name",'',$htmlOptions=array('class'=>"form-control",'id'=>'external_name','style'=>'width: 803px;'));
                                               }
                                    ?>
                                    </td>
                                </tr>
                                <tr id="ext_faculty" style="display: none">
                                  <td> Amount To Pay </td>
                                    <td>
                                     <?php
                                             if( isset($idp_progdata)){                                                                  
                                                    echo CHtml::textField("amount",$idp_progdata['0']['amount'],$htmlOptions=array('class'=>"form-control",'id'=>'amount','style'=>'width: 803px;'));
                                               }
                                               else{                                                                 
                                         echo CHtml::textField("amount",'',$htmlOptions=array('class'=>"form-control",'id'=>'amount','style'=>'width: 803px;'));
                                               }
                                    ?>
                                    </td>
                                </tr>
                                <tr id="fal_list">
                                  <td> Select Faculty </td>
                                    <td>
                                         <div class="col-md-3" style="padding-left:0px">
                                      <?php 
                                         $reporting_list = new EmployeeForm();
                                         $Cadre_id = array(); 
                                        
                                        $records = $reporting_list->get_appraiser_list1();
                                          for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Email_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                         }
                                         
                                            if (isset($Reporting_officer_data) && count($Reporting_officer_data)>0) 
                                             {
                                                for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                   $Cadre_id[$Reporting_officer_data[$l]['0']['Email_id'].';'.$Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                }
                                                   
                                               }
                                             }
                                        
                                        //print_r($Cadre_id);die();
                                          
                                      
                                         if(isset($idp_progdata['0']['faculty_email_id']) && $idp_progdata['0']['faculty_email_id'] != '')
                                         {
                                             
                                           $Cadre_id1['TBD'] = 'TBD';
                                             //print_r($Cadre_id);die();
                                             $Cadre_id = array_merge($Cadre_id,$Cadre_id1);
                                            if($idp_progdata['0']['faculty_email_id'] == 'TBD')
                                            {
                                                $arr_clus['TBD'] = array('selected' => true);  
                                                // print_r($Cadre_id);die();
                                            }
                                            else
                                            {
                                                $where = 'where Email_id = :Email_id';
                                                $list = array('Email_id');
                                                $data = array($idp_progdata['0']['faculty_email_id']);
                                                $Reporting_officer_data = $reporting_list->get_employee_data($where,$data,$list);
                                            
                                                $drop_val = $idp_progdata['0']['faculty_email_id'].';'.$Reporting_officer_data['0']['Emp_fname'].' '.$Reporting_officer_data['0']['Emp_lname'];
                                                $arr_clus[$drop_val] = array('selected' => true);  
                                            }
                                            
                                            //print_r($arr_clus);die();
                                             
                                             //print_r($arr_clus);die();
                                                 echo CHtml::dropDownList('faculty_email_id','faculty_email_id',$Cadre_id,array('class'=>'form-control faculty_email_id','options'=>$arr_clus,'style'=>'width: 803px;')); 
                                         }
                                         else
                                         {
                                             $Cadre_id1['TBD'] = 'TBD';
                                             //print_r($Cadre_id);die();
                                             $Cadre_id = array_merge($Cadre_id,$Cadre_id1);
                                             //print_r($Cadre_id);die();
                                             echo CHtml::dropDownList('faculty_email_id','faculty_email_id',$Cadre_id,array('class'=>'form-control faculty_email_id','empty'=>'Select','style'=>'width: 803px;')); 
                                         }
                                         
                 
                                        
                                ?>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                  <td> Training Days </td>
                                    <td>
                                     <?php
                                           if( isset($idp_progdata)){                                                                  
                                                    echo CHtml::textField("training_days",$idp_progdata['0']['training_days'],$htmlOptions=array('class'=>"form-control",'id'=>'training_days','style'=>'width: 803px;'));
                                               }
                                               else{
                                         echo CHtml::textField("training_days",'',$htmlOptions=array('class'=>"form-control",'id'=>'training_days','style'=>'width: 803px;'));
                                               }
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mandetory Selecton:
                                    </td>
                                    <td>
                                        <div class="col-md-3"  style="padding-left:0px">
                                         <select class="form-control" id="mandet">
                                                                <option value="0" <?php if(isset($idp_progdata['0']['need'])  && $idp_progdata['0']['need']== '0') {?> selected <?php } ?> >Select</option>
                                                                <option value="1" <?php if(isset($idp_progdata['0']['need'])  && $idp_progdata['0']['need']== '1') {?> selected <?php } ?>>Mandetory To all</option>
                                                                <option value="2" <?php if(isset($idp_progdata['0']['need'])  && $idp_progdata['0']['need']== '2') {?> selected <?php } ?>>Mandatory if covered by certification</option>
                                                                
                                                            </select>
                                                            </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Location Names:</td>
                                    <td>
                                       <div class="mt-checkbox-inline">
                                           <?php 
                                                $loc=array();
                                                if(isset($idp_progdata)){
                                                    $loc=explode(';',$idp_progdata['0']['location']);
                                                   // print_r($loc);
                                                }
                                           ?>
                                    
                                                                <label class="mt-checkbox">
                                                                    <input id="Corporate" value="Corporate" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Corporate'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Corporate
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Sion" value="Sion" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Sion'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    
                                                                    > Sion
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Sewree" value="Sewree" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Sewree'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Sewree
                                                                    <span></span>
                                                                </label>
                                                                
                                                                <label class="mt-checkbox">
                                                                    <input id="Taloja" value="Taloja" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Taloja'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Taloja
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Raipur" value="Raipur" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Raipur'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Raipur
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Kolkata" value="Kolkata" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Kolkata'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Kolkata
                                                                    <span></span>
                                                                </label>
                                                                
                                                                <label class="mt-checkbox">
                                                                    <input id="Baddi" value="Baddi" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Baddi'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Baddi
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Kutch-II" value="Kutch-II" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Kolkata'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Kutch-II
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Palanpur" value="Palanpur" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Palanpur'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Palanpur
                                                                    <span></span>
                                                                </label>
                                                                
                                                                <label class="mt-checkbox">
                                                                    <input id="Tiljala" value="Tiljala" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Tiljala'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Tiljala
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Daman" value="Daman" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Daman'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Daman
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="Chennai" value="Chennai" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Chennai'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Chennai
                                                                    <span></span>
                                                                </label>
                                                                 <label class="mt-checkbox">
                                                                    <input id="Alibaug" value="Alibaug" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='Alibaug'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > Alibaug
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-checkbox">
                                                                    <input id="New Delhi" value="New Delhi" type="checkbox" name="location"
                                                                    <?php if(isset($loc) && count($loc) >0 ){
                                                                        for($i=0;$i< count($loc); $i++){
                                                                            if($loc[$i]=='New Delhi'){ ?>
                                                                                checked
                                                                          <?php   }
                                                                        }
                                                                    }?>
                                                                    > New Delhi
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                        
                                        
                                        
                                    </td>
                                        
                                        
                                        
                                    </td>
                                    
                                    
                                </tr>
                                <tr>
                                    <td>Note(If any):</td>
                                    
                                    <td> 
                                    <input name="name" class="form-control" <?php if(isset($idpprog_data)){?>value=<?php echo $idpprog_data['0']['note']; ?> <?php } ?>id="note1" type="text">  
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        Year:
                                    </td>
                                    <td>
                                           <div class="col-md-3"  style="padding-left:0px">
                                         <select class="form-control" id="year1">
                                                                <option value=" ">Select</option>
                                                                <option value="2016-2017" <?php if(isset($idp_progdata['0']['goal_set_year'])  && $idp_progdata['0']['goal_set_year']== '2016-2017') {?> selected <?php } ?> >2016-2017</option>
                                                                <option value="2017-2018" <?php if(isset($idp_progdata['0']['goal_set_year'])  && $idp_progdata['0']['goal_set_year']== '2017-2018') {?> selected <?php } ?>>2017-2018</option>
                                                                
                                                            </select>
                                                            </div>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                            <div id="error" style="display:none;color: red"></div>
                             <?php    
                             if(isset($edit_flag) && $edit_flag==1){
                                 echo CHtml::button('Update',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'program_update'));?>
                             <a href='<?php echo Yii::app()->createUrl("index.php/IDP_master"); ?>'><button class="btn border-blue-soft">Back</button></a>    
                        <?php
                             }
                             else
                             {
                             echo CHtml::button('Add',array('class'=>'btn green','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'program_submit'));
                             } ?>
                             
                        </div>
                    </div>
                    </div>
                    <?php $this->endWidget();?>
                    <div class="portlet-body tabs-below">
                    <div class="tab-content">                         
                        <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="output_div_edit"   <?php if(isset($edit_flag) && $edit_flag=='1'){ ?> style="display:none;" <?} ?>>
                            <thead>
                                <tr>                                                                        
                                    <th>Program Name</th>
                                    <th>Faculty Type</th>
                                    <th>Faculty Name</th>
                                    <th> Days </th>
                                    <th colspan="2"> Action </th>
                                    <!--<th> Edit </th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($program_data_result) && count($program_data_result)>0) {
                                        for ($i=0; $i < count($program_data_result); $i++) { ?>
                                             <tr>                    
                                                <td> <?php echo $program_data_result[$i]['program_name']; ?> <br>
                                                <label style="color:red;font-size:10px"><?php echo $program_data_result[$i]['Note']; ?></label></td>
                                                <td> <?php echo $program_data_result[$i]['faculty_type']; ?> </td> 
                                                <?php if($program_data_result[$i]['faculty_email_id'] == "TBD") { ?>
                                                <td <?php if($program_data_result[$i]['faculty_email_id'] == "TBD") { ?>style="color:red"<?php }?>> <?php echo $program_data_result[$i]['faculty_email_id']; ?> </td>
                                                <?php } else { ?>
                                                <td <?php if($program_data_result[$i]['faculty_email_id'] == "TBD") { ?>style="color:red"<?php }?>> <?php echo $program_data_result[$i]['faculty_name']; ?> </td>
                                                <?php } ?>
                                                <td> <?php echo $program_data_result[$i]['training_days']; ?> </td>
                                                <td> <?php echo CHtml::button('Delete',array('class'=>'btn border-blue-soft send_for_appraisal','id'=>$program_data_result[$i]['id'],'onclick'=>'js:send_notification();')); ?></td>
                                                <td> <a href='<?php echo Yii::app()->createUrl("index.php/IDP_master/edit",array("num"=>$program_data_result[$i]['id'])); ?>'><button class="btn border-blue-soft">Edit</button></a></td>
                                            </tr>
                                <?php 
                                       }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>                   
                                                <td colspan="5">No Programs Found</td>                                              
                                        </tr>
                                        <?php
                                    }
                                ?>                                                       
                            </tbody>
                    </table>
                    </div>
                     </div> </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>     
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
        <script type="text/javascript">
            $(function(){
                $("body").on('click','.send_for_appraisal',function(){
                    jQuery("#static").modal('show');
                    var data = {
                        id : $(this).attr('id'),
                    };
                    $("#continue_goal_set").click(function(){
                        $("#show_spin").show();
                         var base_url = window.location.origin;
                            $.ajax({
                                type : 'post',
                                datatype : 'html',
                                data : data,
                                url : base_url+'/index.php?r=IDP_master/del_record',
                                success : function(data)
                                {
                                    //alert(data);
                                   jQuery("#static").modal('toggle');
                                    if (data == 1) 
                                    {
                                        $("#error").show();  
                                        $("#error").fadeOut(6000);
                                        $("#error").text("Successfully Deleted");
                                        $("#error").css('color','#1B741B');
                                        $("#user-form").load(location.href + " #user-form");
                                        $("#output_div_edit").load(location.href + " #output_div_edit");  
                                    }
                                                       
                                }
                            });
                    });
                });
                $("#program_submit").click(function(){
                 //alert($("#note1").val());
                     var favorite = [];
            $.each($("input[name='location']:checked"), function(){            
                favorite.push($(this).val());
            });
            //alert( favorite.join(";"));
            var location_list=favorite.join(";");
                    if($("#program_name").val() == '')
                    {
                        $("#error").show();
                        $("#error").text("Please enter program name.");
                        $("#error").css('color','red');
                    } 
                    else if($(".faculty_type:checked").val() === undefined)
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select Faculty type.");
                        $("#error").css('color','red');
                    }    
                    else if($(".faculty_type:checked").val() != 'External' && ($("#faculty_email_id").find(':selected').val() == 'Select' || $("#faculty_email_id").find(':selected').val() == ''))
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select Faculty name.");
                        $("#error").css('color','red');
                    }
                    else if($(".faculty_type:checked").val() == 'External' && $("#external_name").val() == '')
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please enter name for external faculty");
                        $("#error").css('color','red');
                    }
                    else if($("#training_days").val() == '')
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please enter valid number of days for training.");
                        $("#error").css('color','red');
                    } 
                    else
                    {
                        
                        var data = {
                            'program_name' : $("#program_name").val(),
                            'faculty_type' : $(".faculty_type:checked").val(),
                            'faculty_email_id' : $("#faculty_email_id").find(':selected').val(),
                            'amount' : $("#amount").val(),
                            'external_name' : $("#external_name").val(),
                            'training_days' : $("#training_days").val(),
                            'location':location_list,
                            'need': $("#mandet").find(':selected').val(),
                            'Note':$('#note1').val(),
                            'goal_set_year': $("#year1").find(':selected').val(),
                            
                        
                        };
                        var base_url = window.location.origin;
                        $.ajax({
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=IDP_master/add',
                            success : function(data)
                            {
                                //alert(data);
                               if (data) 
                               {
                                    $("#error").show();  
                                    $("#error").fadeOut(6000);
                                    $("#error").text(data);
                                    $("#error").css('color','#1B741B');
                                    $("#user-form").load(location.href + " #user-form");
                                    $("#output_div_edit").load(location.href + " #output_div_edit"); 
                                    location.reload();
                                    //$("#error").addClass("alert-success");
                               }
                            }
                        });      
                    } 
                    
                });
            });
        </script>
<script>
    $('.edit_program').click(function(){
    var  id1=$(this).attr("id")
    var edt_id=id1.split('-');
    var id=edt_id[1];
    var edit_flag='1';
    //alert(id);
    
    var data={
        'id':id,
        'edit_flag':edit_flag
    };

        var base_url = window.location.origin;
     //alert(base_url);
        $.ajax({
          type:'post',
          datatype:'html',
          data:data,
          url:base_url+'/index.php/IDP_master/edit',
          success:function(data)
          {
              alert(data);
          }
        });
    });
    
    
</script>
<script>
    $("#program_update").click(function(){
               //alert($('#program_id').text());
                     var favorite = [];
            $.each($("input[name='location']:checked"), function(){            
                favorite.push($(this).val());
            });
            //alert( favorite.join(";"));
            var location_list=favorite.join(";");
                    if($("#program_name").val() == '')
                    {
                        $("#error").show();
                        $("#error").text("Please enter program name.");
                        $("#error").css('color','red');
                    } 
                    else if($(".faculty_type:checked").val() === undefined)
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select Faculty type.");
                        $("#error").css('color','red');
                    }    
                    else if($(".faculty_type:checked").val() != 'External' && ($("#faculty_email_id").find(':selected').val() == 'Select' || $("#faculty_email_id").find(':selected').val() == ''))
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select Faculty name.");
                        $("#error").css('color','red');
                    } 
                    else if($(".faculty_type:checked").val() == 'External' && ($("#amount").val() == '' || !$.isNumeric($("#amount").val())))
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please Select amount in numbers only.");
                        $("#error").css('color','red');
                    }
                    else if($(".faculty_type:checked").val() == 'External' && $("#external_name").val() == '')
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please enter name for external faculty");
                        $("#error").css('color','red');
                    }
                    else if($("#training_days").val() == '')
                    {
                        $("#error").show();  
                        //$("#error").fadeOut(6000);
                        $("#error").text("Please enter valid number of days for training.");
                        $("#error").css('color','red');
                    } 
                    else
                    {
                        
                        var data = {
                            'program_name' : $("#program_name").val(),
                            'faculty_type' : $(".faculty_type:checked").val(),
                            'faculty_email_id' : $("#faculty_email_id").find(':selected').val(),
                            'amount' : $("#amount").val(),
                            'external_name' : $("#external_name").val(),
                            'training_days' : $("#training_days").val(),
                            'location':location_list,
                            'need': $("#mandet").find(':selected').val(),
                            'Note':$('#note1').val(),
                            'id':$('#program_id').text(),
                            'goal_set_year': $("#year1").find(':selected').val(),
                            
                        
                        };
                        var base_url = window.location.origin;
                        $.ajax({
                            type : 'post',
                            datatype : 'html',
                            data : data,
                            url : base_url+'/index.php?r=IDP_master/update',
                            success : function(data)
                            {
                                //alert(data);
                               if (data) 
                               {
                                    $("#error").show();  
                                    $("#error").fadeOut(6000);
                                    $("#error").text(data);
                                    $("#error").css('color','#1B741B');
                                    $("#user-form").load(location.href + " #user-form");
                                    $("#output_div_edit").load(location.href + " #output_div_edit"); 
                                    location.reload();
                                    //$("#error").addClass("alert-success");
                               }
                            }
                        });      
                    } 
                    
                });
             
</script>