
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">                            
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                               
                                <div>
                                    <?php 
    $form=$this->beginWidget('CActiveForm', array(
   'id'=>'user-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
    //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
));
?>
 <div class="portlet box " style='border:1px solid #337ab7'>
                                            <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                <div class="caption">
                                                    Settings</div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table" id="sample_1">
                                                        <thead>
                                                            <tr>
                                                                <th>Menu Name </th>
                                                                <th>Apply</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                            for ($i=0; $i < count($all_data); $i++) {
                                                        ?>
                                                            <tr>
                                                                <td><?php if(isset($all_data[$i]['content']) && $all_data[$i]['content'] != '') echo $all_data[$i]['content']; ?></td>
                                                                <td><input value="<?php echo $all_data[$i]['content']; ?>-1" name="test" type="checkbox" class="md-check" <?php if(isset($all_data[$i]['flag']) && $all_data[$i]['flag'] == '1') echo "checked='checked'"; ?>></td>                    
                                                             </tr>
                                                        <?php
                                                            }
                                                        ?>                                                           
                                                        </tbody>
                                                    </table>
                                                     <?php echo CHtml::button('Submit',array('class'=>'btn btn-primary ','id'=>'add_settings','style'=>'float: right;')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-4 col-md-9">
                                            
                                           <!--  <?php echo CHtml::button('Update',array('class'=>'btn  btn-primary ','id'=>'update_yer')); ?> -->
                        
                                           
                                           <!--  <?php echo CHtml::button('Reset',array('class'=>'btn btn-primary ','id'=>'posting1','type'=>'reset','value'=>'reset')); ?> -->
                                        </div>
 <?php $this->endWidget(); ?>
                                </div>

                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
               <!--  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script> -->
                <script type="text/javascript">
                var click = 0;
                var j = jQuery.noConflict();
                function get_notify(e)
                {  
                    click++;                  
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
                var value = 0;
                    $(function(){
                        $("#add_settings").click(function(){
                            var checkedValues = $('.md-check:checked').map(function() {
                                return this.value;
                            }).get();  
                            var checkedValues1 = $('.md-check:not(:checked)').map(function() {
                                return this.value;
                            }).get();                          
                            //var checkedValues_values = checkedValues.split(',');
                            console.log(checkedValues1);
                            for (var i = 0; i < checkedValues.length; i++) {
                                var data = checkedValues[i];
                                var data_split = data.split('-');
                                var content = '';
                                content = {
                                        'content_name' : data_split[0],
                                        'content_value' : data_split[1]
                                };
                                console.log(content);
                                var base_url = window.location.origin;                              
                                $.ajax({
                                dataType :'html',
                                 type :'post',
                                 data : content,
                                 url : base_url+'/pmsapp/index.php?r=Settingpage/save',
                                 'success' : function(data) {              
                                    if (click == 0) 
                                    {
                                        $("#sample_1").load(location.href + " #sample_1");
                                    }                                    
                                }
                            });
                            }
                            for (var i = 0; i < checkedValues1.length; i++) {
                                var data = checkedValues1[i];
                                var data_split = data.split('-');
                                var content = '';
                                content = {
                                        'content_name' : data_split[0],
                                        'content_value' : 0
                                };
                                console.log(content);
                                var base_url = window.location.origin;                              
                                $.ajax({
                                dataType :'html',
                                 type :'post',
                                 data : content,
                                 url : base_url+'/pmsapp/index.php?r=Settingpage/save',
                                 'success' : function(data) {              
                                    if (click == 0) 
                                    {
                                       $("#sample_1").load(location.href + " #sample_1");
                                    }                                    
                                }
                            });
                            }
                            if(value!=0)
                            {
                                window.location.reload(true);
                            }
                        });
                    });
                </script>