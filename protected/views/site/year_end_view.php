        <style>

html, body {
    height: 100%;
    width: 100%;
}
html {
    overflow: auto;
}
.page-content-row{
    overflow: auto;
}
table{


    border: 1px solid #dddddd;
}
table,td,tr{
    font-family: helvetica;
    text-align: center;
    
    background-color: white;
}
th{

    background-color:   #4C87B9;
    color:white;
    border:1px solid #ffffff;
}
.bold{
     
    font-weight: bold;
}
.color{
    color:#747272;

}

.italic{


    font-style: italic;
}
input , textarea{

    border: none;
    width: 100%;
    border: 1px solid #dddddd;

}

.bg{


    background-color: #f4f7f8;
}

.page-content-col{
    overflow: scroll;
}

      #err { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 226px;
height: 55px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
      
      }

</style>
       <script type="text/javascript">

$(document).ready(function(){
        var left = 400
        $('#text_counter').text('Characters left: ' + left);
 
            $('#target1').on( "keyup mouseover", function() {
 
            left = 400 - $(this).val().trim().length;
 
            $('#text_counter').text('Characters left: ' + left);
        });

        var left1 = 400
        $('#text_counter1').text('Characters left: ' + left);
 
            $('#target2').on( "keyup mouseover", function() {
 
            left1= 400 - $(this).val().trim().length;
 
            $('#text_counter1').text('Characters left: ' + left1);
        });
            var left2 = 200
        $('#text_counter2').text('Characters left: ' + left2);
 
            $('#text1').on( "keyup mouseover", function() {
 
            left2= 200 - $(this).val().trim().length;
            $('#text_counter2').text('Characters left: ' + left2);
        });
        var left3 = 200
        $('#text_counter3').text('Characters left: ' + left3);
 
            $('#text2').on( "keyup mouseover", function() {
 
            left3= 200 - $(this).val().trim().length;
  
            $('#text_counter3').text('Characters left: ' + left3);
        });


             var left4 = 200
        $('#text_counter4').text('Characters left: ' + left4);
 
            $('#text3').on( "keyup mouseover", function() {
 
            left4= 200 - $(this).val().trim().length;
 
            if(left4 < 0){
                $('#text_counter4').addClass("overlimit");
                 $('#posting').attr("disabled", true);
            }else{
                $('#text_counter4').removeClass("overlimit");
                $('#posting').attr("disabled", false);
            }
 
            $('#text_counter4').text('Characters left: ' + left4);
        });
            

             var left5 = 200
        $('#text_counter5').text('Characters left: ' + left5);

      
 
            $('#text4').on( "keyup mouseover", function() {
 
            left5= 200 - $(this).val().trim().length;
 
            
            $('#text_counter5').text('Characters left: ' + left5);
        });
            

    });

</script>
<script type="text/javascript">
$(function(){
    $("#clr_form").click(function(){
       // $('#user-form')[0].reset();
        $('#user-form').clearForm();
    });
});
                
                  var error='';
                function submit_yer(){
                    $(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
                   
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger"); 
                   var emp_rev1=$("#target1").val().trim().length;
                   var emp_rev2=$("#target2").val().trim().length;
                   var rev1_ex1=$("#text1").val().trim().length;
                   var rev1_ex2=$("#text2").val().trim().length;
                   var rev2_ex1=$("#text3").val().trim().length;
                   var rev2_ex2=$("#text4").val().trim().length;
                   //alert($("#text2").val());
                   if(emp_rev1==0){

                    error='Please enter Employee Review1';

                }
                else  if(emp_rev2==0)
                    {

                        error='Please enter Employee Review2';
                    }
                    else  if(rev1_ex1==0)
                    {

                        error='Please enter VVF values Example 1';
                    }
                    //  else if(rev1_ex2==0)
                    // {

                    //     error='Please enter VVF values Example 2';
                    // }
                    else if(rev2_ex1==0){

                        error='Please enter VVF leadership competencies Example 1';

                    }                  
                   // else  if(rev2_ex2==0){

                   //      error='Please enter VVF leadership competencies Example 2';
                   //  }
                else
                    {
                        error = '';
                       
                    }

                    if(error==''){
                       $("#updation_spinner").css('display','block');
			$("#err").hide();
                                var data = {
                                    employee_review1 : $("#target1").val(),
                                    employee_review2 : $("#target2").val(),
                                    review1_example1 : $("#text1").val(),
                                    review1_example2 : $("#text2").val(),
                                    review2_example1 : $("#text3").val(),
                                    review2_example2 : $("#text4").val()
                                    
                                };
                                console.log(data);
                                var base_url = window.location.origin;
                                
                                    $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/index.php?r=Yearendreviewb/savedata',
                                        success : function(data)
                                        {                                           
                                            if ($.trim(data) == "Notification Send") 
                                            {
                                                $("#updation_spinner").css('display','none');
                                                $("#err").show();  
                                                $("#err").fadeOut(6000);
                                                $("#err").text("Notification Send");
                                                $("#err").addClass("alert-success");
                                            }
                                           
                                        }
                                    });
                          
                    }
                    else{$("#updation_spinner").css('display','none');
                        $("#err").show();  
                        //$("#err").fadeOut(6000);
                        $("#err").text(error);
                        $("#err").addClass("alert-danger");
                    }

                }

                
                function update_yer1(){
                  $("#err").text("");
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger"); 
                   var emp_rev1 = $("#target1").val().trim().length;
                   var emp_rev2 = $("#target2").val().length;
                   var rev1_ex1 = $("#text1").val().length;
                   var rev1_ex2 = $("#text2").val().length;
                   var rev2_ex1 = $("#text3").val().length;
                   var rev2_ex2 = $("#text4").val().length;
               
                    if(emp_rev1==0){

                    error='Please enter Employee Review1';

                }
                else  if(emp_rev2==0)
                    {

                        error='Please enter Employee Review2';
                    }
                    else  if(rev1_ex1==0)
                    {

                        error='Please enter VVF values Example 1';
                    }
                     else if(rev1_ex2==0)
                    {

                        error='Please enter VVF values Example 2';
                    }
                    else if(rev2_ex1==0){

                        error='Please enter VVF leadership competencies Example 1';

                    }
                  
                   else  if(rev2_ex2==0){

                        error='Please enter VVF leadership competencies Example 2';
                    }
                    
                else
                    {
                        error = '';

                       
                    }

                   if(error ==''){
                         
                          
                                var data = {
                                    employee_review1 : $("#target1").val(),
                                    employee_review2 : $("#target2").val(),
                                    review1_example1 : $("#text1").val(),
                                    review1_example2 : $("#text2").val(),
                                    review2_example1 : $("#text3").val(),
                                    review2_example2 : $("#text4").val()
                                    
                                };
                                console.log(data);
                                var base_url = window.location.origin;
                                
                                    $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/index.php?r=Yearendreviewb/update_yer',
                                        success : function(data)
                                        {
                                            $("#err").addClass("alert-success"); 
                                            $("#err").text("Update Successfully");

                                        }
                                    });
                        
                           
                        
                    }
                    else{

                        $("#err").text(error);
                        $("#err").addClass("alert-danger");

                    }
                }

                </script>
       <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Review(B)</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <label id='err' style="display: none"></label>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                    <div class='col-md-12' <?php if(isset($kpi_data) && count($kpi_data)>0){ ?>style="display: block"<?php }else { ?> style="display: none" <?php } ?>>
                    <?php if(isset($master_apr) && $master_apr == 1) {?><a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php?r=Midreview"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;width: 93px;')); ?></a><br><br><?php } ?>
                         <?php if(isset($master_apr) && $master_apr == 2) {?><a href="<?php echo Yii::app()->request->baseUrl; ?>/pmsuser/index.php?r=Subordinate/yearend_reviewb"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float:right;margin-right: 13px;width: 93px;')); ?></a><br><br><?php } ?>
                       <?php 
    $form=$this->beginWidget('CActiveForm', array(
   'id'=>'user-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
    //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
));
?>

                <table class="table table-fixed bg-blue-soft border-blue-soft table-condensed">
                <thead>
                    <tr>
                        <th colspan="2">
                                YEAR END REVIEW(B)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  class=" bold bg" colspan="2">
                            Year-End Review (Part B) - To be filled by appraisee
                        </td>
                                                
                    </tr>
                    <tr >
                        <td class="color" colspan="2">
                            This form captures the <span style="font-weight: bold; text-decoration: underline;"> HOW </span>of performance and will be used to differentiate between 3, 4 and 5 ratings on the performance scale when such differentiation is not normally possible i.e. all the employees have performed equally well and manager has to make a tough choice to fit the employees on a bell curve

                            
                        </td>
                    </tr>
                        
                    <tr>
                        <td  class=" bold bg" colspan="2">
                            1. I feel my goals were very challenging and stretched because:
                        </td>
                                                
                    <tr>
                        <td colspan="2">
                        <?php
                            if (isset($employee_review_data) && count($employee_review_data)>0) {
                                $employee_review1 = $employee_review_data['0']['employee_review1'];
                                $employee_review2 = $employee_review_data['0']['employee_review2']; 
                                $review1_example1 = $employee_review_data['0']['review1_example1'];
                                $review1_example2 = $employee_review_data['0']['review1_example2'];
                                $review2_example1 = $employee_review_data['0']['review2_example1'];                     
                                $review2_example2 = $employee_review_data['0']['review2_example2'];
                            }
                            else
                            {
                                $employee_review1 = '';
                                $employee_review2 = '';
                                $review1_example1 = '';
                                $review1_example2 = '';
                                $review2_example1 = '';                     
                                $review2_example2 = '';
                            }

                             if(isset($master_apr) && $master_apr==2)
                             {
                                echo CHtml::textArea('employee_review1',$employee_review1,array('style'=>'max-width: 1183px;max-height: 67px;min-width: 1183px;min-height: 67px;','class'=>'form-control','id'=>'target1','disabled'=>'true'));
                             }
                             else
                             {
                                echo CHtml::textArea('employee_review1',$employee_review1,array('style'=>'max-width: 1183px;max-height: 67px;min-width: 1183px;min-height: 67px;','class'=>'form-control','id'=>'target1'));
                             }
                               
                        ?>

                        </td>
                    </tr>
                
                    <tr>
                        <td  class=" bold bg" colspan="2">
                             2. I have gone the extra mile to help my colleagues/team/organization by:
                        </td>
                                                
                    <tr>
                        <td colspan="2">
                                <?php

                                if(isset($master_apr) && $master_apr==2)
                                 {
                                   echo CHtml::textArea('employee_review2',$employee_review2,array('style'=>'max-width: 1183px;max-height: 67px;min-width: 1183px;min-height: 67px;','class'=>'form-control','id'=>'target2','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('employee_review2',$employee_review2,array('style'=>'max-width: 1183px;max-height: 67px;min-width: 1183px;min-height: 67px;','class'=>'form-control','id'=>'target2'));
                                 }
                                     
                                ?>
                        </td>
                    </tr>
                
                    <tr>
                        <td  class=" bold bg" colspan="2" >
                            3. I have lived the VVF values (Openness, Integrity, Respect, Trust, Innovation, Agility) in an exemplary fashion in the following way:
                        </td>
                                                
                    <tr>
                    <tr>
                        <td  class="color " colspan="2">
                            Please give at least 1 example but not more than 2 examples that are meaningful. These examples can be of the same value or of different values. Not the number of examples that matter but the <span style="font-weight: bold; font-style: italic;"> impact </span> created by living that value that matters.
                        </td>
                                                
                    <tr>
                    <tr>
                        <td  class="color italic" colspan="2">
                            e.g. I proactively created a process for updating clients on weekly basis which increased client satisfaction (Innovation)
                        </td>
                                                
                    <tr>
                    <tr>
                    <td class=" bold">
                        Example:1
                    </td>
                    <td class="col-md-10">
                        <?php

                            if(isset($master_apr) && $master_apr==2)
                                 {
                                   echo CHtml::textArea('review1_example1',$review1_example1,array('class'=>'form-control','id'=>'text1','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('review1_example1',$review1_example1,array('class'=>'form-control','id'=>'text1'));
                                 }
                             
                        ?>
                        </td>
                    </td >
                    </tr>   
                    <tr>
                    <td class="bold">
                        Example:2
                    </td>
                    <td class="col-md-10">
                        <?php
                            if(isset($master_apr) && $master_apr==2)
                                 {
                                   echo CHtml::textArea('review1_example2',$review1_example2,array('class'=>'form-control','id'=>'text2','disabled'=>'true'));
                                 }
                                 else
                                 {
                                   echo CHtml::textArea('review1_example2',$review1_example2,array('class'=>'form-control','id'=>'text2'));
                                 }
                             
                        ?>
                        </td>
                    </td>
                    </tr>
                    
                        <td  class=" bold bg" colspan="2" >
                            4. I have demonstrated the VVF leadership competencies (Teamwork, Customer Orientation, Result Orientation, Developing self and team, Strategic thinking, Ownership and accountability)  in the following way:
                        </td>
                                                
                    </tr>
                    <tr>
                        <td  class="color " colspan="2">
                            Please give at least 1 example but not more than 2 examples that are meaningful. These examples can be of the same value or of different values. Not the number of examples that matter but the <span style="font-weight: bold; font-style: italic;"> impact </span> created by living that value that matters.
                        </td>
                                                
                    </tr>
                    <tr>
                        <td  class="color italic" colspan="2">
                            e.g. Successfully arranged a session between IT team and production team that increased practical knowledge of MM module, thus reducing time required for system related process (teamwork, developing self and team)
                        </td>
                                                
                    </tr>
                    <tr>
                    <td class=" bold">
                        Example:1
                    </td>
                    <td class="col-md-10">
                    <?php
                        if(isset($master_apr) && $master_apr==2)
                                 {
                                    echo CHtml::textArea('review2_example1',$review2_example1,array('class'=>'form-control','id'=>'text3','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('review2_example1',$review2_example1,array('class'=>'form-control','id'=>'text3'));
                                 }
                            
                    ?>
                        </td>
                    </td >
                    </tr>   
                    <tr>
                    <td class="bold">
                        Example:2
                    </td>
                    <td class="col-md-10">
                    <?php
                        if(isset($master_apr) && $master_apr==2)
                                 {
                                    echo CHtml::textArea('review2_example2',$review2_example2,array('class'=>'form-control','id'=>'text4','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textArea('review2_example2',$review2_example2,array('class'=>'form-control','id'=>'text4'));
                                 }
                             
                    ?>
                    </td>
                    </tr>
                </tbody>
            </table>

<div class="form-group">
         <div class="btn-group col-md-12" >
                      <!--  <?php echo CHtml::button('Reset',array('class'=>'btn  border-blue-soft','style'=>'float:left','id'=>'clr_form')); ?> -->
                      <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i>
                       <?php
                        if(!isset($master_apr))
                        { 
                            echo CHtml::button('Submit',array('class'=>'btn border-blue-soft','style'=>'float:right;width: 88px;','id'=>'posting1','onclick'=>'js:submit_yer();')); }?>
                        
                       
     </div>
    
    
  </div>

 <?php $this->endWidget(); ?>
                    </div>
<div class="note note-info" <?php if(isset($kpi_data) && count($kpi_data)>0){ ?>style="display: none"<?php }else { ?> style="display: block" <?php } ?>>
                                <p> No Record has been submitted Approved for final year submitted. </p>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
              
