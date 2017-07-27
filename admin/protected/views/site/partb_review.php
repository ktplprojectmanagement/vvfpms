<style media="all" type="text/css">
      
#err { 
     position: absolute; 
       top:20%; right: 20; 
       z-index: 10; 
    width: 226px;
height: 55px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
}
      
table,td,tr{
    border: 1px solid #dddddd;
    font-family: helvetica;
    text-align: center;
    background-color: white;
}
th,.final{

    background-color: #4C87B9;
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
input{

    border: none;
    width: 100%;
    border: 1px solid #dddddd;

}

.bg{


    background-color: #f4f7f8;
}
<style media="all" type="text/css">
      
      #err { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
    width: 226px;
height: 50px;
border: 1px solid #4C9ED9;
text-align: center;
padding-top: 10px;
      
      }
      
   </style>


</style>
<script type="text/javascript">
                
                  var error='';
                function submit_yer(){
                   
                    $("#err").text("");
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger"); 
                   var emp_rev1=$("#target1").val().trim().length;
                   var emp_rev2=$("#target2").val().trim().length;
                   var rev1_ex1=$("#text1").val().trim().length;
                   var rev1_ex2=$("#text2").val().trim().length;
                   var rev2_ex1=$("#text3").val().trim().length;
                   var rev2_ex2=$("#text4").val().trim().length;

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

                    if(error==''){
                         
                            
                                var data = {
                                    employee_review1 : $("#target1").val(),
                                    employee_review2 : $("#target2").val(),
                                    review1_example1 : $("#text1").val(),
                                    review1_example2 : $("#text2").val(),
                                    review2_example1 : $("#text3").val(),
                                    review2_example2 : $("#text4").val()
                                    
                                };
                                var base_url = window.location.origin;
                                
                                    $.ajax({
                                        type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/pmsapp/index.php?r=Register/savedata',
                                        success : function(data)
                                        {
                                            $("#err").text("Submit Successfully");
                                            $("#err").addClass("alert-success"); 

                                        }
                                    });
                          
                    }
                    else{

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
                                        url : base_url+'/pmsapp/index.php?r=Register/update_yer',
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


<script>
    $(document).ready(function(){

       
        $(".score").each(function() {

            $(this).keyup(function(){
                calculateSum();
            });
        });

    });

    function calculateSum() {

       
       var sum = 0;
       var err_msg='';
        $(".score").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {

                sum += parseFloat(this.value);
             
            }
        });
        $("#sum").html(sum.toFixed(2));
        
    }
    function nospaces(t){
        if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
        }
    }
    
    // function nospaces1(t){
    //   // str=t.value;
    //    //str=str.trim();
    //    alert($("#comment1").val().trim().length);
    // }
   var error='';
    function submit_pbr(){
                    $("#err").text("");
                    $("#err").removeClass("alert-success"); 
                    $("#err").removeClass("alert-danger"); 
                    $(window).scroll(function()
                    {
                        $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                    });
var kra_count = $('#min_kra').text();var error = '';var flag = true; var score_total = '';var score_comments = '';var kra_id_list = '';
for (var i = 0; i < kra_count; i++) {
   if((isNaN($("#score"+i).val())|| $("#score"+i).val() >25 || $("#score"+i).val() < 0) || $("#score"+i).val()==0)  {
       error = 'Please enter a number upto 25 in score '+i+' field';
       i =kra_count
    }
    else if($("#score"+i).val().length!=0 && $("#comment"+i).val().trim().length==0){
         error = "Please enter comment for score "+i;
         i =kra_count
    }
     else if($(".promotion").find(':selected').val() == 'Select'){
         error = "Please select career Planning";
    }
    else
    {
        error = '';
    }
    // if (!flag) 
    // {
    //     return false;
    // }
}
//alert(error);
if(error != '')
{
    $("#err").show();  
    //$("#err").fadeOut(6000);
    $("#err").text(error);
    $("#err").addClass("alert-danger");
}
else
{
    $("#updation_spinner").css('display','block');
   $("#err").hide();  
    for (var i = 0; i < kra_count; i++) {
        //alert($("#comment"+i).val());
        if (score_total == '') 
        {
            score_total = $("#score"+i).val();
        }
        else
        {
            score_total = score_total+';'+$("#score"+i).val();
        }
        if (score_comments == '') 
        {
            score_comments = $("#comment"+i).val();
        }
        else
        {
            score_comments = score_comments+';'+$("#comment"+i).val();
        }
        if (kra_id_list == '') 
        {
            kra_id_list = $("#kra_id"+i).val();
        }
        else
        {
            kra_id_list = kra_id_list+';'+$("#kra_id"+i).val();
        }
    }

    var record = {
        'KRA_score' : score_total,
        'Score_comment' : score_comments,
        'Employee_id' : $("#emp_id_value").text(),
        'Reporting_officer1_id' : $("#apr_id").text(),
        'Tota_score' : $("#sum").text(),
        'performance_rating' : $("#performance_rating").text(),
        'career_planning' : $(".promotion").find(':selected').val(),
        'KRA_id' : kra_id_list

    };
    //alert(score_comments);
    
    var base_url = window.location.origin;
    $.ajax({
        type : 'post',
        datatype : 'html',
        data : record,
        url : base_url+'/index.php?r=Manager_final_review/save_data',
        success : function(data)
        {
           $("#updation_spinner").css('display','none');
            if (data == 'Notification Send') 
            {
                $("#err").show();  
                $("#err").fadeOut(6000);
                $("#err").text("Year End Review Completed");
                $("#err").addClass("alert-success");
            }
            else if(data == 'error occured')
            {
                $("#err").show();  
                //$("#err").fadeOut(6000);
                $("#err").text("No Changes Done");
                $("#err").addClass("alert-danger");
            }
            
        }
    });
   
}

}
             
                   
</script>




            <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                         <div class="alert" id="err" style="display: none">
                        </div>
<?php 
    $form=$this->beginWidget('CActiveForm', array(
   'id'=>'user-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
    //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
));
?>

                <table class="table  table-condensed "><label id='min_kra' style="display: none"><?php if(isset($emp_kra_data) and count($emp_kra_data)>0){ echo count($emp_kra_data); }?></label>
                <thead>
                    <tr>
                        <th colspan="3">
                                SECTION 4 :Manager comments on part B
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  class=" bold bg" colspan="3">
                            Year-End Review (Part B) - To be filled by appraiser
                        </td>
                                                
                    </tr>
                    <tr >
                        <td class="color" colspan="3">
                            Each field carries 25 points. Please refer Part B filled by the employee and give your score and responses on the qualitative aspects of performance. This sheet will be used by the normalization panel to differentiate between equally good performers and the manager will be called upon to substantiate the comments made in this sheet.
                            
                        </td>
                    </tr>
                        
                    <tr>
                        <td  class=" bold bg" >
                            Sr. No
                        </td>
                        <td  class=" bold bg" >
                            Score on 25
                        </td>
                        <td  class=" bold bg" >
                           Rationale (Please comment with data w.r.t. employee responses above your reasons for giving the particular score on a scale of 20)
                        </td>
                       
                         <?php
                         if (isset($emp_kra_data) && count($emp_kra_data)>0) {
                            ?>
                            <label id="emp_id_value" style="display: none"><?php echo $emp_kra_data['0']['Employee_id']; ?></label><label id="apr_id" style="display: none"><?php echo $emp_kra_data['0']['appraisal_id1']; ?></label>
                            <?php
                             for ($i=0; $i < count($emp_kra_data); $i++) { ?>
                        <tr>
                            <td ><?php echo $i; ?></td>
                            <td>
                                <?php
                                if (isset($normalize_data) && count($normalize_data)>0) {
                                   $score = explode(';',$normalize_data['0']['KRA_score']);$total_value = '';
                                   for ($k=0; $k < count($score); $k++) { 
                                      if ($total_value == '') {
                                         $total_value = $score[$k];
                                      }
                                      else
                                      {
                                        $total_value = $total_value+$score[$k];
                                      }
                                   }
                                    echo CHtml::textField('score'.$i,$score[$i],array('class'=>'form-control score','id'=>'score'.$i,'style'=>'text-align: center','placeholder'=>'score'));
                                }
                                else
                                {
                                    $score = '';
                                     echo CHtml::textField('score'.$i,$score,array('class'=>'form-control score','id'=>'score'.$i,'style'=>'text-align: center','placeholder'=>'score'));
                                }
                                echo CHtml::textField('kra_id'.$i,$emp_kra_data[$i]['KPI_id'],array('class'=>'form-control','id'=>'kra_id'.$i,'style'=>'text-align: center;display:none','placeholder'=>'score'));

                                ?>
                            </td>
                            <td>
                                <?php
                                if (isset($normalize_data) && count($normalize_data)>0) {
                                   $Score_comment = explode(';',$normalize_data['0']['Score_comment']);
                                    echo CHtml::textField('comment'.$i,$Score_comment[$i],array('class'=>'form-control','id'=>'comment'.$i,'style'=>'text-align: center','placeholder'=>'comment'));
                                }
                                else
                                {
                                    $Score_comment = '';
                                     echo CHtml::textField('comment'.$i,$Score_comment,array('class'=>'form-control','id'=>'comment'.$i,'style'=>'text-align: center','placeholder'=>'comment'));
                                }
                                   // echo CHtml::textField('comment'.$i,'',array('class'=>'form-control','id'=>'comment'.$i,'style'=>'text-align: center','placeholder'=>'comment'));
                                ?>
                            </td>
                        </tr>
                        <?php    }
                         }                            
                         ?> 
                    <tr>
                        <td class="bold">
                            TOTAL
                        </td>
                        <td><span class="bold" id="sum"><?php if(isset($total_value) && $total_value>0) { echo $total_value; }else{ echo 0;}?></span></td>
                    </tr>
                    <tr >
                        <td class="bold">
                            PERFORMANCE RATING
                        </td>
                        <td><label id="performance_rating"><?php if(isset($apr_end_rating)) { echo $apr_end_rating; }?></label></td>
                    </tr>
                    <tr>
                        <td class="bold" colspan='2'>
                            Career Planning
                        </td>
                        <td>
                            <div class="col-md-7" style="float: right;">
                                <?php
                                $cluster_name_models = new ClusterForm();
                                         $records = $cluster_name_models->get_list('cluster_name');
                                         $promotion_category = '';
                                         if (isset($normalize_data['0']['career_planning'])) {
                                             $promotion_category[$normalize_data['0']['career_planning']] = array('selected' => 'selected');
                                         }
                                         else
                                         {
                                            $promotion_category['Select'] = array('selected' => 'selected');
                                         }
                                        
                                        $list = array('Select' => 'Select','Promotion' => 'Promotion','Role change' => 'Role change','Enhance current role' => 'Enhance current role');                                        
                                        echo CHtml::activeDropDownList($cluster_name_models,'cluster_name',$list,array('class'=>'form-control promotion','style'=>'width: 204px','options' => $promotion_category));
                            ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12">
                <?php echo CHtml::button('Submit',array('class'=>'btn blue-soft ','style'=>'float:right;width: 81px;','id'=>'postdata','onclick'=>'js:submit_pbr();')); ?>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Subordinate/yearendlist" class="nav-link "><?php echo CHtml::button('Back',array('class'=>'btn blue-soft ','style'=>'float:left;width: 81px;')); ?></a>
                <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;margin-top: 10px;display: none"></i>
            </div>

 <?php $this->endWidget(); ?>










                        
                    </div>
                </div>
               
            </div>
   
        </div>






