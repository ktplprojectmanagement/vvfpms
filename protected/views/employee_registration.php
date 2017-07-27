<?php
/* @var $this EmployeeFormController */
/* @var $model EmployeeForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form-employee_registration-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Employee_id'); ?>
		<?php echo $form->textField($model,'Employee_id'); ?>
		<?php echo $form->error($model,'Employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Emp_fname'); ?>
		<?php echo $form->textField($model,'Emp_fname'); ?>
		<?php echo $form->error($model,'Emp_fname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DOB'); ?>
		<?php echo $form->textField($model,'DOB'); ?>
		<?php echo $form->error($model,'DOB'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nationality'); ?>
		<?php echo $form->textField($model,'Nationality'); ?>
		<?php echo $form->error($model,'Nationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PAN_number'); ?>
		<?php echo $form->textField($model,'PAN_number'); ?>
		<?php echo $form->error($model,'PAN_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Designation'); ?>
		<?php echo $form->textField($model,'Designation'); ?>
		<?php echo $form->error($model,'Designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cadre'); ?>
		<?php echo $form->textField($model,'Cadre'); ?>
		<?php echo $form->error($model,'Cadre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Reporting_officer1_id'); ?>
		<?php echo $form->textField($model,'Reporting_officer1_id'); ?>
		<?php echo $form->error($model,'Reporting_officer1_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Employee_status'); ?>
		<?php echo $form->textField($model,'Employee_status'); ?>
		<?php echo $form->error($model,'Employee_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Employee_atd_code'); ?>
		<?php echo $form->textField($model,'Employee_atd_code'); ?>
		<?php echo $form->error($model,'Employee_atd_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Reporting_officer2_id'); ?>
		<?php echo $form->textField($model,'Reporting_officer2_id'); ?>
		<?php echo $form->error($model,'Reporting_officer2_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Reporting_officer3_id'); ?>
		<?php echo $form->textField($model,'Reporting_officer3_id'); ?>
		<?php echo $form->error($model,'Reporting_officer3_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Emp_mname'); ?>
		<?php echo $form->textField($model,'Emp_mname'); ?>
		<?php echo $form->error($model,'Emp_mname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Emp_lname'); ?>
		<?php echo $form->textField($model,'Emp_lname'); ?>
		<?php echo $form->error($model,'Emp_lname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email_id'); ?>
		<?php echo $form->textField($model,'Email_id'); ?>
		<?php echo $form->error($model,'Email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_number'); ?>
		<?php echo $form->textField($model,'mobile_number'); ?>
		<?php echo $form->error($model,'mobile_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Blood_group'); ?>
		<?php echo $form->textField($model,'Blood_group'); ?>
		<?php echo $form->error($model,'Blood_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Present_address'); ?>
		<?php echo $form->textField($model,'Present_address'); ?>
		<?php echo $form->error($model,'Present_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Permanent_address'); ?>
		<?php echo $form->textField($model,'Permanent_address'); ?>
		<?php echo $form->error($model,'Permanent_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Image'); ?>
		<?php echo $form->textField($model,'Image'); ?>
		<?php echo $form->error($model,'Image'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->