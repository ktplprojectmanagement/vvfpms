<?php
$form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',   
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),     
));
   ?>
        <div class="errorMessage" id="formResult"></div>
        <div id="AjaxLoader" style="display: none"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ajax-loader.gif"></img></div>
        <div class="row-user-single">
                <?php echo $form->labelEx($model,'Employee_id'); ?>
                <?php
                $model->Employee_id = uniqid();
                 echo $form->textField($model,'Employee_id',array('size'=>60,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'Employee_id'); ?>
        </div>
        <div class="row-user-single">
                <?php echo $form->labelEx($model,'Emp_fname'); ?>
                <?php echo $form->textField($model,'Emp_fname',array('size'=>60,'maxlength'=>5)); ?>
                <?php echo $form->error($model,'Emp_fname'); ?>
        </div>

        <div class="row-user-single">
                <?php echo $form->labelEx($model,'Emp_mname'); ?>
                <?php echo $form->textField($model,'Emp_mname',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'Emp_mname'); ?>
        </div>
        <div class="buttons">
                
         <?php echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('Employee/MyAction','render'=>true)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) {
                         $("#AjaxLoader").hide();  
                        if(data.status=="success"){
                         $("#formResult").html("form submitted successfully.");
                         $("#user-form")[0].reset();
                        }
                        else{
                        $.each(data, function(key, val) {
                        $("#user-form #"+key+"_em_").text(val);                                                    
                        $("#user-form #"+key+"_em_").show();
                        });
                        }       
                    }',                    
                     'beforeSend'=>'function(){                        
                           $("#AjaxLoader").show();
                      }'
                     ),array('id'=>'mybtn','class'=>'class1 class2')); ?>
<?php $this->endWidget();?>
