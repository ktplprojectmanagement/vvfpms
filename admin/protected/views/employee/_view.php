<?php
/* @var $this EmployeeController */
/* @var $data Employee */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Employee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Employee_id), array('view', 'id'=>$data->Employee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Employee_atd_code')); ?>:</b>
	<?php echo CHtml::encode($data->Employee_atd_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Emp_fname')); ?>:</b>
	<?php echo CHtml::encode($data->Emp_fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Emp_mname')); ?>:</b>
	<?php echo CHtml::encode($data->Emp_mname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Emp_lname')); ?>:</b>
	<?php echo CHtml::encode($data->Emp_lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gender')); ?>:</b>
	<?php echo CHtml::encode($data->Gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOB')); ?>:</b>
	<?php echo CHtml::encode($data->DOB); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Nationality')); ?>:</b>
	<?php echo CHtml::encode($data->Nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email_id')); ?>:</b>
	<?php echo CHtml::encode($data->Email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile_number')); ?>:</b>
	<?php echo CHtml::encode($data->mobile_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAN_number')); ?>:</b>
	<?php echo CHtml::encode($data->PAN_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Designation')); ?>:</b>
	<?php echo CHtml::encode($data->Designation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cadre')); ?>:</b>
	<?php echo CHtml::encode($data->Cadre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Reporting_officer1_id')); ?>:</b>
	<?php echo CHtml::encode($data->Reporting_officer1_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Reporting_officer2_id')); ?>:</b>
	<?php echo CHtml::encode($data->Reporting_officer2_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Employee_status')); ?>:</b>
	<?php echo CHtml::encode($data->Employee_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Present_address')); ?>:</b>
	<?php echo CHtml::encode($data->Present_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Permanent_address')); ?>:</b>
	<?php echo CHtml::encode($data->Permanent_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Blood_group')); ?>:</b>
	<?php echo CHtml::encode($data->Blood_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Image')); ?>:</b>
	<?php echo CHtml::encode($data->Image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Department')); ?>:</b>
	<?php echo CHtml::encode($data->Department); ?>
	<br />

	*/ ?>

</div>