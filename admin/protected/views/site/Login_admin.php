<?php
/* @var $this LoginFormController */
/* @var $model LoginForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form-Login_admin-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,                            
    'enableClientValidation' => true,
    'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:checkErrors'

    ),
    'htmlOptions'=>array(
        'class'=>'login-form',
    ),
)); ?>
<script type="text/javascript">
	function checkErrors(form, data, hasError)
	{
		if(!hasError)
		{
			if(!hasError)
			{
				var data = {
					'username' : $(".username").val(),
					'password' : $(".password").val(),
				};
				var base_url = window.location.origin;
				$.ajax({
					'type' : 'post',
					'datatype' : 'html',
					'data' : data,
					'url' : base_url+'/pmsapp/index.php?r=Login/check',
					success : function(data)
					{
						//alert(data);
						if (data == 'Valid')
						{
							window.location.href = base_url+"/pmsapp/index.php?r=Login/dashboard";
						}
					}
				});
			}
		}
		else
		{
			alert('hjghjgh');
		}
	}
</script>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'username')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('class'=>'password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->