<?php
/* @var $this LoginFormController */
/* @var $model LoginForm */
/* @var $form CActiveForm */
?>

<div class="form">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <?php 
        $form=$this->beginWidget('CActiveForm', array(
               'id'=>'user-form',
                // 'enableClientValidation'=>true,
                // 'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                // 'action' => $this->createUrl('Adminlogin/employee_login'),
               'enableAjaxValidation'=>false,                            
                'enableClientValidation' => true,
                'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'afterValidate' => 'js:checkErrors'

                ),
                'htmlOptions'=>array(
                    'class'=>'form-horizontal',
                    'enctype' => 'multipart/form-data'
                ),
            ));
            ?>           
<script type="text/javascript">
	function checkErrors(form, data, hasError)
	{
		//alert(hasError);
	}
</script>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<label id="error_msg" style="color:red"></label>
	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username',array('id'=>'username')); ?>
		<?php echo CHtml::error($model,'username',array('style'=>'color:red')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'password'); ?>
		<?php echo CHtml::activeTextField($model,'password',array('id'=>'password')); ?>
		<?php echo CHtml::error($model,'password',array('style'=>'color:red')); ?>
	</div>


	<div class="row">
		<?php echo CHtml::Button('Submit',array('id'=>'submit')); ?>
	</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
		$(function(){
			$("#submit").click(function(){
				var data = {
					'username': $("#username").val(),
					'password': $("#password").val(),
				};
				console.log(data);
				var base_url = window.location.origin;
				$.ajax({
					'type' : 'post',
                    'datatype' : 'json',
                    'data' : data,
                    'url' : base_url+'/pmsapp/index.php?r=Validation/check',
                    success : function(data)
                    { 
                    	if (data != '') 
                    	{
                    		var obj = jQuery.parseJSON(data);
                    	                   
		                       if (obj.username != undefined) 
		                       {
		                       	 $("#error_msg").text(obj.username);
		                       }
		                       else if(obj.password != undefined)
		                       {
		                       	 $("#error_msg").text(obj.password);
		                       }
		                       else
		                       {
		                       		$("#error_msg").text('');
		                       		alert('success');
		                       }
                    	}  
                    	else
                    	{
                    		$("#error_msg").text('');
                    		alert("no error");    
                    	}
                    	
                    }
				});
			});
		});
</script>

</div><!-- form -->