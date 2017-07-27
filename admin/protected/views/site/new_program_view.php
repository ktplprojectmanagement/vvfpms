            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
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
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Create Program
                    </h3>
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
                            <table class="table table-striped table-hover table-bordered" >
                            <tbody>
                                <tr>
                                  <td> Program Name </td>
                                    <td>
                                     <?php
                                                                                                          
                                         echo CHtml::textField("program_name",'',$htmlOptions=array('class'=>"form-control",'id'=>'program_name','style'=>'width: 803px;'));
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                  <td> Data Type </td>
                                   <td>
                                     <div id="file_uploaded_success" style="float: right;margin-top: 16px;display: none">File Uploaded successfully : <i class="fa fa-check" aria-hidden="true" style="font-size: 22px;color:green"></i></div>
                                 <label  class="custom-file-input file-blue" id="file_change" style="float: right;color: rgb(76, 158, 217);margin-top: -52px;margin-right: 67px;">
                                   
                                    <input id="file-input" type="file"  name='employee_csv'/><label id='uploaded_file' style="margin-top: -23px;
margin-left: -105px;"></label>
                                    </td>
                                </tr>                     
                            </tbody>
                            </table>
                            <div id="error" style="display:none;color: red"></div>
                             <?php                                  
                        echo CHtml::button('Add',array('class'=>'btn green program_submit','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'program_submit')); ?>
                        </div>
                    </div>
                    </div>
                    <div class="portlet box new_kra" style='border:1px solid #337ab7;'  id='new_kra'>
                    <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                        <div class="caption">
                            Test Questions</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">                    
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" >
                            <thead>
                                <th>Enter Question</th>
                                <th>Answer 1 </th>
                                <th>Answer 2 </th>
                                <th>Answer 3 </th>
                                <th>Answer 4 </th>
                            </thead>
                            <tbody>
                                <tr>                                  
                                    <td>
                                     <?php                                                                                                          
                                         echo CHtml::textField("question_type",'',$htmlOptions=array('class'=>"form-control",'id'=>'question_type','style'=>'width: 500px;'));
                                     ?>
                                    </td>
                                    <td>
                                        <?php                                                                                                          
                                         echo CHtml::textField("question_ans1",'',$htmlOptions=array('class'=>"form-control",'id'=>'question_ans1','style'=>'width: 100px;'));
                                     ?> 
                                    </td>
                                    <td>
                                        <?php                                                                                                          
                                         echo CHtml::textField("question_ans2",'',$htmlOptions=array('class'=>"form-control",'id'=>'question_ans2','style'=>'width: 100px;'));
                                     ?> 
                                    </td>
                                    <td>
                                        <?php                                                                                                          
                                         echo CHtml::textField("question_ans3",'',$htmlOptions=array('class'=>"form-control",'id'=>'question_ans3','style'=>'width: 100px;'));
                                     ?> 
                                    </td>
                                    <td>
                                        <?php                                                                                                          
                                         echo CHtml::textField("question_ans4",'',$htmlOptions=array('class'=>"form-control",'id'=>'question_ans4','style'=>'width: 100px;'));
                                     ?> 
                                    </td>
                                </tr>                  
                            </tbody>
                            </table>
                            <div id="error" style="display:none;color: red"></div>
                             <?php                                  
                        echo CHtml::button('save',array('class'=>'btn green question_submit','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'question_submit')); ?>
                        </div>
                    </div>
                    </div>
                    <div class="portlet box new_kra" style='border:1px solid #337ab7;'  id='new_kra'>
                    <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                        <div class="caption">
                            Feedback Form</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <style type="text/css">
                    .ui-datepicker-title
                    {
                        color: rgb(86, 150, 196);
                    }
                    .ui-datepicker-trigger
                    {
                        width: 35px;
                    }
                    </style>
                       <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>     
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                        <script>
                        var j = jQuery.noConflict();
                        var base_url = window.location.origin;
                      $(function() {
                        //j(".datepicker").datepicker({dateFormat: 'dd/M/yy',changeMonth: true,changeYear: true,yearRange: '1900:2050',});
                        j(".datepicker").datepicker({
                            buttonImage: base_url+'/pmsuser/images/calendar-128.png',
                            buttonImageOnly: true,
                            changeMonth: true,
                            changeYear: true,
                            showOn: 'both'
                         });
                        j(".datepicker").css('width','35px');
                        // $(".datepicker").click(function(){
                        //     $("#ui-datepicker-div").css({'position': 'absolute', 'top': '853.833px', 'left': '1178.92px', 'z-index': '1', 'display': 'block'});
                        // });
                      } );
                      </script>
                    <div class="portlet-body">                    
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" >
                            <thead>
                                <th>Sr.No</th>
                                <th>Enter Detail</th>
                                <th>maximum Charaters allowed</th>
                                <th>Minimum Charaters allowed</th>
                            </thead>
                            <tbody>
                                <tr>                                  
                                   <td>
                                       <?php                                                                                                          
                                         echo CHtml::textField("sr_no",'',$htmlOptions=array('class'=>"form-control",'id'=>'sr_no','style'=>'width: 50px;'));
                                     ?> 
                                   </td>
                                    <td>
                                       <?php                                                                                                          
                                         echo CHtml::textField("data_detail",'',$htmlOptions=array('class'=>"form-control",'id'=>'data_detail','style'=>'width: 500px;'));
                                     ?> 
                                   </td>
                                    <td>
                                       <?php                                                                                                          
                                         echo CHtml::textField("min_length",'',$htmlOptions=array('class'=>"form-control",'id'=>'min_length','style'=>'width: 100px;'));
                                     ?> 
                                   </td>
                                    <td>
                                       <?php                                                                                                          
                                         echo CHtml::textField("max_length",'',$htmlOptions=array('class'=>"form-control",'id'=>'max_length','style'=>'width: 100px;'));
                                     ?> 
                                   </td>
                                </tr>  
                                <tr>                                  
                                   <td>
                                       <?php                                                                                                          
                                         echo CHtml::textField("sr_no1",'',$htmlOptions=array('class'=>"form-control",'id'=>'sr_no1','style'=>'width: 50px;'));
                                     ?> 
                                   </td>
                                    <td>
                                       <?php                                                                                                          
                                         echo CHtml::textField("data_detail",'',$htmlOptions=array('class'=>"form-control",'id'=>'data_detail','style'=>'width: 500px;'));
                                     ?> 
                                   </td>
                                    <td>
                                   <!--  <i class="fa fa-calendar datepicker" aria-hidden="true"></i> -->
                                   <input type="hidden" class='datepicker' id="dp" />
                                       <?php                                                                                                          
                                         // echo CHtml::textField("datepicker",'',$htmlOptions=array('class'=>"form-control datepicker",'id'=>'datepicker','style'=>'width: 100px;'));
                                     ?> 
                                   </td>
                                    <td>
                                       <?php                                                                                                          
                                         echo CHtml::RadioButton('calender','calender',array('value'=>'Yes','class'=>'calender','uncheckValue'=>null)).'Yes';
                                         echo CHtml::RadioButton('calender','calender',array('value'=>'No','class'=>'calender','uncheckValue'=>null)).'No';
                                     ?> 
                                   </td>
                                </tr> 
                                <tr>                                  
                                   <td>
                                       <?php                                                                                                          
                                         echo CHtml::textField("sr_no1",'',$htmlOptions=array('class'=>"form-control",'id'=>'sr_no1','style'=>'width: 50px;'));
                                     ?> 
                                   </td>
                                    <td>
                                       Activate Rating
                                   </td>                                    
                                    <td>
                                       <?php                                                                                                          
                                         echo CHtml::RadioButton('rating','calender',array('value'=>'Yes','class'=>'calender','uncheckValue'=>null)).'Yes';
                                         echo CHtml::RadioButton('calender','calender',array('value'=>'No','class'=>'calender','uncheckValue'=>null)).'No';
                                     ?> 
                                   </td>
                                </tr>                    
                            </tbody>
                            </table>
                            <div id="error" style="display:none;color: red"></div>
                             <?php                                  
                        echo CHtml::button('Create',array('class'=>'btn green create_form','style'=>'float:right;background-color: rgb(51, 122, 183);','id'=>'create_form')); ?>
                        </div>
                    </div>
                    </div>
                    <?php $this->endWidget();?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script type="text/javascript">
             $(function(){
                $("#file_change").change(function(){
                    $("#uploaded_file").text($('#file-input').val());
                     var e = document.getElementById("file-input");
                     var file_data = $(e)[0].files[0];
                     var formData = new FormData();            
                     formData.append("employee_csv",$('#file-input')[0].files[0]); 
                     //alert($(e)[0].files[0]);
                });
                     $("body").on('click','.program_submit',function(){
                        $("#uploaded_file").text($('#file-input').val());
                         var e = document.getElementById("file-input");
                         var file_data = $(e)[0].files[0];
                         var formData = new FormData();            
                         formData.append("employee_csv",$('#file-input')[0].files[0]); 
                         formData.append("program_name",$('#program_name').val());
                        var base_url = window.location.origin;
                        $.ajax({
                        'type' : 'post',
                        'datatype' : 'json',
                        'processData': false, 
                        'contentType': false,
                        'enctype': 'multipart/form-data',
                        'data' : formData,
                        'url' : base_url+'/pmsuser/index.php?r=Create_program/save',
                        success : function(data)
                        {
                            alert(data);                        
                        }
                     });
                 });

                     $("body").on('click','.question_submit',function(){
                        var data = {
                            'question' : $("#question_type").val(),
                            'ans1' : $("#question_ans1").val(),
                            'ans2' : $("#question_ans2").val(),
                            'ans3' : $("#question_ans3").val(),
                            'ans4' : $("#question_ans4").val(),
                        };
                        var base_url = window.location.origin;
                        $.ajax({
                        'type' : 'post',
                        'datatype' : 'html',
                        'data' : data,
                        'url' : base_url+'/pmsuser/index.php?r=Create_program/save_test',
                        success : function(data)
                        {
                            alert(data);                        
                        }
                     });
                 });
             });
         </script>