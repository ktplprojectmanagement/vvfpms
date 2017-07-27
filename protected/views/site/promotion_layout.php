<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />


<style media="all" type="text/css">      
        #err { 
        position: absolute; 
        top: 0; right: 20; 
        z-index: 10; 
        width: 374px;
        height: 55px;
        border: 1px solid #4C9ED9;
        text-align: center;
        padding-top: 10px;
        right: 45%;
        background-color: #AB5454;
        color: #FFF;
        font-weight: bold;  
        }
</style> 
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
                            <h1>Promotion List </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
<div class="fade in" id="err" style="display: none">
                              <!-- <a href="#" class="close" data-dismiss="alert">&times;</a>      -->
                              <lable id="error_value"> A problem has been occurred while submitting your data.</lable>
                          </div>
                <div class="page-content">
                    <div class="container" style="width: 100%;">
                      <div class="" style="width: 100%;">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet box green" style="background-color: rgb(38, 70, 109);border: 1px solid rgb(38, 70, 109);">
                                            <div class="portlet-title" style="background-color: rgb(38, 70, 109);border: 1px solid rgb(38, 70, 109);">
                                                <div class="caption">
                                                   List</div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">





     
                  <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                    <thead>
                        <tr role="row" style="background-color: #154593;color: white;">
                            <th class="all">Employee ID</th>
                            <th class="all">Employee Name</th>
                            <th class="none">Department</th>
                            <th class="none">Designation</th>
                            <th class="none">Reporting Manager</th>
                            <th class="bu_access desktop">Promotion Recommendation</th>
                            <th class="min-tablet">Status</th>                                                    
                            <th class="desktop">Cluster Head Comments</th>
                            <th class="desktop">Plant Head Comments</th>
                            <th class="desktop">BU Head Comments</th>
                            <th class="desktop"> Promotion</th>
                            <th class="desktop"> Year End Review</th>
                        </tr>
                    </thead>
                    <tbody id="table_promo">
                    <?php //print_r($promotion_data);?>
                    <?php
                    $bu_promot_recommended = '';
                    if(isset($emp_promotion_data) && count($emp_promotion_data)>0)
                    {
                    for($i = 0;$i<count($emp_promotion_data);$i++)
                    {
                    $employee = new EmployeeForm;
                    $where = 'where Email_id = :Email_id';
                    $list = array('Email_id');
                    $data = array($emp_promotion_data[$i]['0']['Reporting_officer1_id']);
                    $apr_data = $employee->get_employee_data($where,$data,$list);
                   // echo "<pre>";
                   //  print_r(count($promotion_data));die();
                    //  
                    ?>

                        <tr>

                            <td><?php if(isset($emp_promotion_data[$i]['0']['Employee_id'])) { echo $emp_promotion_data[$i]['0']['Employee_id']; } ?></td>
                            <td><?php if(isset($emp_promotion_data[$i]['0']['Emp_fname'])) { echo $emp_promotion_data[$i]['0']['Emp_fname']." ".$emp_promotion_data[$i]['0']['Emp_lname']; } ?></td>
                            <td><?php if(isset($emp_promotion_data[$i]['0']['Department'])) { echo $emp_promotion_data[$i]['0']['Department']; } ?></td>
                            <td><?php if(isset($emp_promotion_data[$i]['0']['Designation'])) { echo $emp_promotion_data[$i]['0']['Designation']; } ?></td>
                            <td><?php if(isset($apr_data['0']['Emp_fname'])) { echo $apr_data['0']['Emp_fname']."  ".$apr_data['0']['Emp_lname']; } ?></td>
                            <td class="bu_access">
                            <div class="select<?php echo $i; ?>">
                            <input type="radio" class="prm_chk form-contro promot<?php echo $i; ?>" value="Yes" name="promot<?php echo $i; ?>" <?php if(isset($promotion_data[$i]['0']['flag']) && $promotion_data[$i]['0']['flag']=='Yes') { ?>checked='check'<?php } ?>>
                            Yes
                            <input type="radio" value="No" class="prm_chk form-contro promot<?php echo $i; ?>" name="promot<?php echo $i; ?>" <?php if(isset($promotion_data[$i]['0']['flag']) && $promotion_data[$i]['0']['flag']=='No') { ?>checked='check'<?php } ?>>
                            No
                            </div>
                            </td>
                            <td class="reflect_flag " id="reflect_flag-<?php echo $i;?>"><?php if(isset($promotion_data[$i]['0']['flag'])) { echo $promotion_data[$i]['0']['flag']; } ?></td>
                            <td><textarea class="form-control cluster_cmt" id="cluster_comment-<?php echo $i;?>" type="text" <?php if(isset($promotion_data)){?> value="<?php echo $promotion_data[$i]['0']['cluster_comments'];?>"  <?php } ?>><?php echo $promotion_data[$i]['0']['cluster_comments'];?></textarea></td>
                            <td><textarea class="form-control plant_cmt" id="plant_comment-<?php echo $i;?>" type="text" <?php if(isset($promotion_data)){?> value="<?php echo $promotion_data[$i]['0']['plant_comments'];?>"  <?php } ?>><?php echo $promotion_data[$i]['0']['plant_comments'];?></textarea></td>
                            <td><textarea class="form-control bu_cmt" id="bu_comment-<?php echo $i;?>" type="text" <?php if(isset($promotion_data)){?> value="<?php echo $promotion_data[$i]['0']['bu_comments'];?>"  <?php } ?>><?php echo $promotion_data[$i]['0']['bu_comments'];?></textarea></td>
                            <td><a href='<?php echo Yii::app()->createUrl("index.php/Promotion/promotion_form",array("Employee_id"=>$emp_promotion_data[$i]['0']['Employee_id'])); ?>' target="_blank"><input class="btn chk_profile" id="$emp_promotion_data[$i]['0']['Employee_id']" value="Check Promotion" type="button" style="border: 1px solid rgb(38, 70, 109);"></a></td>
                            <td><a href='<?php echo Yii::app()->createUrl("index.php/Year_endreview/appraiser_end_review",array("Employee_id"=>$emp_promotion_data[$i]['0']['Employee_id'],"apr_data"=>$emp_promotion_data[$i]['0']['Reporting_officer1_id']));?>' target="_blank"><input class="btn chk_profile" id="$emp_promotion_data[$i]['0']['Employee_id']" value="Check Year End Review" type="button" style="border: 1px solid rgb(38, 70, 109);"></a></td>

                        <!-- <td><a href='<?php echo Yii::app()->createUrl("index.php/Year_endreview/appraiser_end_review",array("Employee_id"=>$emp_promotion_data[$i]['0']['Employee_id'])); ?>' target="_blank"><input class="btn chk_profile" id="$emp_promotion_data[$i]['0']['Employee_id']" value="Check Goalsheet" type="button" style="border: 1px solid rgb(38, 70, 109);"></a></td> -->
                        </tr>
                    <?php
                    if($bu_promot_recommended == '')
                    {
                    $bu_promot_recommended = $emp_promotion_data[$i]['0']['Employee_id'];
                    }
                    else
                    {
                    $bu_promot_recommended = $bu_promot_recommended.';'.$emp_promotion_data[$i]['0']['Employee_id'];
                    }
                    }
                    }
                    ?>
                    <lable id="emp_list" style="display:none"><?php echo $bu_promot_recommended; ?></lable>
                    </tbody>
                </table>












                                            
<div class="row">
<div class="col-md-4">
<lable style="font-size: 17px;">Promotion Requested : <lable  style="color: #133b8c;"><?php if(isset($promotion_data) && count($promotion_data)>0) { echo count($promotion_data); } ?></lable></lable>
</div>
<div class="col-md-4">
<lable style="font-size: 17px;">

Total Promotion possible : <lable  id="total_promotion" style="color: #133b8c;">
<?php 
if(isset($bu_data) && count($bu_data)>0) { 
$cnt = count($bu_data)*0.05; 
$ratio = explode('.',$cnt);
if($ratio[0]==0) 
{
echo '1';
}
else
{
echo $cnt; 
}
} ?>
</lable>
</lable>
</div>
<?php
$granted_cnt = 0;
if(isset($promotion_data1) && count($promotion_data1)>0)
{
   // print_r($promotion_data1);die();
for($i=0;$i<count($promotion_data1);$i++)
{
if($promotion_data1[$i]['flag'] == "Yes")
{
$granted_cnt++;
}
}
}
?>
<div class="col-md-4">
<lable style="font-size: 17px;">
Total Promotion Granted : <lable style="color: #133b8c;"><?php echo $granted_cnt; ?></lable></lable>
</div>
</div>


                                            </div>
                                        </div>
<div class="col-md-6">
<input type="button" class="btn" value="Save" id="save_promot_data" style="float:right;border: 1px solid rgb(38, 70, 109);">
</div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                                    </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function(){
$("#save_promot_data").click(function(){


var bu_comments=""; var plant_comments="";var cluster_comments="";
var list= $("#emp_list").text(); 
var ids = list.split(';');




var bu=<?php echo $bu_flag;?>;
var plant=<?php echo $plant_flag;?>;
var cluster=<?php echo $cluster_flag;?>;
for(var i = 0;i<ids.length;i++){

    if(bu_comments==""){
        
        bu_comments = $('#bu_comment-'+i).val();
    }
    else{
        bu_comments=bu_comments+"^"+$('#bu_comment-'+i).val();
    }

    if(plant_comments==""){
        
        plant_comments = $('#plant_comment-'+i).val();
    }
    else{
        plant_comments=plant_comments+"^"+$('#plant_comment-'+i).val();
    }

    if(cluster_comments==""){
            cluster_comments = $('#cluster_comment-'+i).val();
    }
    else
    {
        cluster_comments=cluster_comments+"^"+$('#cluster_comment-'+i).val();
    }

    if(bu==1){
    if(flag=== undefined){

        var flag = $('input[name=promot'+i+']:checked').val();
    
    }
    else{
       var flag=flag+"^"+$('input[name=promot'+i+']:checked').val();
    }
    }
    else{
        if(flag===undefined){
           var flag= $('#reflect_flag-'+i).text();
        }
        else{
           var flag=flag+"^"+$('#reflect_flag-'+i).text();
        }
    }
//alert(flag);
};


            



            var base_url = window.location.origin;
            var data={
            'emp_list':list,
            'bu_comments':bu_comments,
            'plant_comments':plant_comments,
            'cluster_comments':cluster_comments,
            'flag':flag,
            'bu':bu,
            'plant':plant,
            'cluster':cluster,
            };

            $.ajax({                            
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/index.php/Promotion/updatepromo',
            success : function(data)
            {
             // alert(data);
               location.reload();
              

            }
            });


    

});
});
</script>
 
         
        <!-- END CONTAINER -->
        <!-- BEGIN CORE PLUGINS -->
       
        <!-- END CORE PLUGINS -->
       
       <script type="text/javascript"> 
            $(function() {
  
$('#search-empid').on('keyup', function(){
    
    table
    .column(0)
    .search(this.value)
    .draw();

  });
$('#search-empname').on('keyup', function(){
    
    table
    .column(1)
    .search(this.value)
    .draw();

  });
$('#search-dept').on('keyup', function(){
    
    table
    .column(2)
    .search(this.value)
    .draw();

  });
$('#search-design').on('keyup', function(){
    
    table
    .column(3)
    .search(this.value)
    .draw();

  });
$('#search-mainmanager').on('keyup', function(){
    
    table
    .column(4)
    .search(this.value)
    .draw();

  });
$('#search-promot').on('keyup', function(){

   //alert(this.value); 
    table
    .column(6)
    .search(this.value)
    .draw();

  });

} );
            </script>
   <style>
.dt-buttons
{
margin-top: -25px;
}
</style>
              <script type="text/javascript">
$(document).ready(function(){
var bu=<?php echo $bu_flag;?>;
var plant=<?php echo $plant_flag;?>;
var cluster=<?php echo $cluster_flag;?>;
var list= $("#emp_list").text(); 
var ids = list.split(';');
for(var i = 0;i<ids.length;i++)
{
if(bu===1){
    // alert("bu");
   $('.cluster_cmt').attr("disabled", true);
   $('.plant_cmt').attr("disabled",true);
}
else{
   $('input[name=promot'+i+']').attr("disabled",true);
    $('.bu_access').removeClass('sorting desktop');
    $('.bu_access').css('display','none');
}
if(plant===1){
    // alert("plant");
   $('.cluster_cmt').attr("disabled", true);
   $('.bu_cmt').attr("disabled",true);
   //$('.bu_access').css('display','none');
}
if(cluster===1){
    // alert("cluster");
   $('.plant_cmt').attr("disabled", true);
   $('.bu_cmt').attr("disabled",true);
   //$('.bu_access').css('display','none');
}
}
}); 
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>

<script>
$(function(){
    $("#save_promot_data").click(function(){
      
    var bu_comments=""; var plant_comments="";var cluster_comments="";
    var list= $("#emp_list").text(); 
    var ids = list.split(';');
    var bu=<?php echo $bu_flag;?>;
    var cluster=<?php echo $cluster_flag;?>;
    var plant=<?php echo $plant_flag;?>;
    var error="";
    $(window).scroll(function()
                            {
                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                            });
    for(var i = 0;i<ids.length;i++){
        
        if(bu==1){
             bu_comments = $('#bu_comment-'+i).val();
             
             if(bu_comments == ""){
                error="BU comments can not be blank";
                $('#err').show();
                $('#err').text(error);
                $('#bu_comment-'+i).css("border","2px solid red");break;
             }
             else if(bu_comments.length > 1000 || bu_comments.length<10){
                error="Minimum 10 and Maximum 1000 characters are allowed";
                $('#err').show();
                $('#err').text(error);
                $('#bu_comment-'+i).css("border","2px solid red");break;
             }
             else if($(".promot"+i+':checked').val()===undefined)
            {
                error="Please select promotion status";
                $('#err').show();
                $('#err').text(error);
                $('.select'+i).css("border","2px solid red");break;

            }
        }
        else if(cluster==1){
           cluster_comments=$('#cluster_comment-'+i).val();
           if(cluster_comments == ""){
                error="Cluster head comments can not be blank";
                $('#err').show();
                $('#err').text(error);
                $('#cluster_comments-'+i).css("border","2px solid red");break;
             }
             else if(cluster_comments.length > 1000 || cluster_comments.length<10){
                error="Minimum 10 and Maximum 1000 characters are allowed";
                $('#err').show();
                $('#err').text(error);
                $('#cluster_comments-'+i).css("border","2px solid red");break;
             }
             
        }
        else if(plant==1){
           plant_comments=$('#plant_comment-'+i).val();
           if(plant_comments == ""){
                error="Plant head comments can not be blank";
                $('#err').show();
                $('#err').text(error);
                $('#plant_comment-'+i).css("border","2px solid red");break;
             }
             else if(plant_comments.length > 1000 || plant_comment.length<10){
                error="Minimum 10 and Maximum 1000 characters are allowed";
                $('#err').show();
                $('#err').text(error);
                $('#plant_comment-'+i).css("border","2px solid red");break;
             }
             
        }

    }
});
});
</script>