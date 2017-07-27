  <?php 
    $form=$this->beginWidget('CActiveForm', array(
        // 'id'=>'submit_form',
        'enableClientValidation'=>true,
        'action' => array('Employee/saveimage'),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
            'class'=>'form-horizontal',
            'enctype' => 'multipart/form-data'
        ),
    ));
    ?>
    <?php echo CHtml::activeFileField($model, 'Image'); ?>
    <?php echo CHtml::submitButton('Submit'); ?>
<?php $this->endWidget();?>