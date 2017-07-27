<?php
/* @var $this EmployeeFormController */
/* @var $model EmployeeForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
// $form=$this->beginWidget('CActiveForm', array(
// 	'id'=>'employee-form-newregistration-form',
// 	// Please note: When you enable ajax validation, make sure the corresponding
// 	// controller action is handling ajax validation correctly.
// 	// See class documentation of CActiveForm for details on this,
// 	// you need to use the performAjaxValidation()-method described there.
// 	'action' => $this->createUrl('Newemployee/saverecord'),
// 	'enableAjaxValidation'=>true,
// 	'enableClientValidation'=>true,
// 	'clientOptions'=>array(
//         'validateOnSubmit'=>true,
//         'afterValidate' => 'js:ajaxSubmitHappen'
//         ),
// )); 
?>
<?php
    $form = $this->beginWidget('CActiveForm', array(
            // 'id' => 'venue-liquor-form',
            //'action' => $this->createUrl('Newemployee/saverecord'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'afterValidate' => 'js:checkErrors'
            ),
            'stateful' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
 <script type="text/javascript">
    function checkErrors(form, data, hasError) 
    {
    	if (hasError==true)
    	{
    		alert("validation failed");
    	}
    	else
    	{
    		var data = {
    			'name' : $("#name_data").val(),
    		};
    		console.log(data);
    	}
        // alert(hasError);
    }
</script>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	 	<div class="col-md-3">
			<?php echo $form->labelEx($model,'Emp_fname'); ?>
			 <?php echo $form->textField($model,'Emp_fname',array('class'=>'form-control')); ?>
	         <span class="help-block"> First Name </span>
			<?php echo $form->error($model,'Emp_fname'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Emp_mname'); ?>
		<?php echo $form->textField($model,'Emp_mname',array('class'=>'form-control')); ?>
       <span class="help-block"> Middle Name </span>
		<?php echo $form->error($model,'Emp_mname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Emp_lname'); ?>
		<?php echo $form->textField($model,'Emp_lname',array('class'=>'form-control')); ?>
        <span class="help-block"> Last Name </span>
		<?php echo $form->error($model,'Emp_lname'); ?>
	</div>
	<div class="row">
		<?php $model->Employee_id = uniqid(); 
        echo $form->textField($model,'Employee_id',array('class'=>'form-control')); ?>
        <?php $model->Employee_atd_code = uniqid(); 
        echo $form->textField($model,'Employee_atd_code',array('class'=>'form-control')); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'DOB'); ?>
		<?php echo $form->textField($model,'DOB',array('class'=>'form-control','id'=>'dob_date')); ?>
		<?php echo $form->error($model,'DOB'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'joining_date'); ?>
		<?php echo $form->textField($model,'joining_date',array('class'=>'form-control','id'=>'joining_date')); ?>
		<?php echo $form->error($model,'joining_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_number'); ?>
		<?php echo $form->textField($model,'mobile_number'); ?>
		<?php echo $form->error($model,'mobile_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PAN_number'); ?>
		<?php echo $form->textField($model,'PAN_number'); ?>
		<?php echo $form->error($model,'PAN_number'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'Email_id'); ?>
		 <?php echo $form->textField($model,'Email_id',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Email_id'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'Department'); ?>
		<?php 
        $records = OrgStructure::model()->findAll();
        $Department_id = array();                                 
        foreach ($records as $row) {
          $Department_id[$row['Department']] = $row['Department'];
        }
        echo $form->dropDownList($model,'Department',$Department_id,array('class'=>'form-control','options'=>array('selected'=>true))); ?>
		<?php echo $form->error($model,'Department'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Designation'); ?>
		 <?php 
        $records = OrgStructure::model()->findAll();
        $Designation_id = array();                                 
        foreach ($records as $row) {
          $Designation_id[$row['Designation']] = $row['Designation'];
        }
        echo $form->dropDownList($model,'Designation',$Designation_id,array('class'=>'form-control','options'=>array('selected'=>true))); ?>
		<?php echo $form->error($model,'Designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php
        echo $form->radioButton($model, 'Gender', array(
            'value'=>'Male', 'uncheckValue'=>null
        )).' Male '; echo $form->radioButton($model, 'Gender', array(
            'value'=>'Female', 'uncheckValue'=>null
        )).' Female ';
        ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nationality'); ?>
		 <?php echo $form->radioButton($model,'Nationality',array('value'=>'Indian', 'uncheckValue'=>null)).'Indian'; ?>
         <?php echo $form->radioButton($model,'Nationality',array('value'=>'Other', 'uncheckValue'=>null)).'Other'; ?>
		<?php echo $form->error($model,'Nationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cadre'); ?>
		<?php 
        $records = OrgStructure::model()->findAll();
        $cnt = 0; $Cadre_id = array();                                 
        foreach ($records as $row) {
          $Cadre_id[$row['Cadre']] = $row['Cadre'];
        }
        echo $form->dropDownList($model,'Cadre',$Cadre_id,array('class'=>'form-control'));
         ?>
		<?php echo $form->error($model,'Cadre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Employee_status'); ?>
		<?php 
        $lang = array('Probation'=>'Probation', 'Permanent'=>'Permanent');
        echo $form->dropDownList($model,'Employee_status',$lang,array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Employee_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Blood_group'); ?>
		<?php echo $form->textField($model,'Blood_group',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Blood_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Present_address'); ?>
		<?php echo $form->textField($model,'Present_address',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Present_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Permanent_address'); ?>
		<?php echo $form->textField($model,'Permanent_address',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Permanent_address'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Reporting_officer1_id'); ?>
		 <?php 
        $lang = array('Sawant'=>'Sawant', 'New'=>'New', 'Someone'=>'Someone');
        echo $form->dropDownList($model,'Reporting_officer1_id',$lang,array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'Reporting_officer1_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Image'); ?>
		<span class="btn default btn-file">
            <span class="fileinput-new"> Select image </span>
            <span class="fileinput-exists"> Change </span>
            <?php echo CHtml::activeFileField($model, 'Image'); ?></span>
        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
		<?php echo $form->error($model,'Image'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::SubmitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->