<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->Employee_id,
);

$this->menu=array(
	array('label'=>'List Employee', 'url'=>array('index')),
	array('label'=>'Create Employee', 'url'=>array('create')),
	array('label'=>'Update Employee', 'url'=>array('update', 'id'=>$model->Employee_id)),
	array('label'=>'Delete Employee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Employee_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employee', 'url'=>array('admin')),
);
?>

<h1>View Employee #<?php echo $model->Employee_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Employee_id',
		'Employee_atd_code',
		'Emp_fname',
		'Emp_mname',
		'Emp_lname',
		'Gender',
		'DOB',
		'Nationality',
		'Email_id',
		'mobile_number',
		'PAN_number',
		'Designation',
		'Cadre',
		'Reporting_officer1_id',
		'Reporting_officer2_id',
		'Employee_status',
		'Present_address',
		'Permanent_address',
		'Blood_group',
		'Image',
		'Department',
	),
)); ?>
