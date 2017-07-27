<?php
/* @var $this EmployeeFormController */
/* @var $model EmployeeForm */
/* @var $form CActiveForm */
?>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form-image_upload-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
    'class'=>'form-horizontal',
    'enctype' => 'multipart/form-data'
    ),
     //'action' => $this->createUrl('Newemployee/save'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Image'); ?>
		<?php echo CHtml::activeFileField($model, 'Image',array('class'=>'image_name','id'=>'UploadedFiles_image')); ?>
		<?php echo $form->error($model,'Image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::Button('Submit',array('class'=>'image_name')); ?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
	$(function(){
		$(".image_name").click(function(){			
			var e = document.getElementById("UploadedFiles_image");
			var file_data = $(e)[0].files[0];
			//console.log($(e)[0].files[0]);			
			var form_data = new FormData();
			
			 form_data.append("Image",$(e)[0].files[0]);
//console.log(form_data.get('Image'));
			 // var data = {
			 // 	'form_data' : 'form_data',
			 // };
			// var formData = new FormData($("#employee-form-image_upload-form")[0]);
			// form_data.append("file", file_data);
			// var data = {
			// 	'data' : formData,
			// };
			//console.log(form_data);
			var base_url = window.location.origin;
			$.ajax({
			type: 'POST',
       		url : base_url+'/pmsapp/index.php?r=Newemployee/save',           
            datatype: 'json',
            processData: false, 
            contentType: false,
            'enctype': 'multipart/form-data',
           	data: form_data,
            success : function (data) {
               console.log(data);
            },
        });
		});		
	});
</script>

</div><!-- form -->