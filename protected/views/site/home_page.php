<!DOCTYPE html>
<html lang="en">
<head>
  <title>PMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <!-- <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" /> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script>
$(document).ready(function(){
    $("#button1").mouseover(function(){
        $("#button1").css("background-color", "#fff");
    });
    $("#button1").mouseout(function(){
        $("#button1").css("background-color", "#e7f1f2");
    });
    $("#button2").mouseover(function(){
        $("#button2").css("background-color", "#fff");
    });
    $("#button2").mouseout(function(){
        $("#button2").css("background-color", "#e7f1f2");
    });
});
</script>
</head>

<style type ="text/css" >

   .footer{ 
       position: fixed;     
      
       bottom: 0px; 
       width: 100%;
   }  
   img.login-logo {
    display: block;
    margin-left: auto;
    margin-right: auto }
   
body{
  
  margin:0;
  background:url('<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/img/login/performance.jpg') no-repeat 50% 50% fixed;
  background-size: cover;
}



.btn3d {
    position:relative;
    top: -6px;
    border:0;
     transition: all 40ms linear;
     margin-top:10px;
     margin-bottom:10px;
     margin-left:2px;
     margin-right:2px;
}


.btn3d.btn-default {
    color: #666666;
    box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #BEBEBE, 0 8px 8px 1px rgba(0,0,0,.2);
    background-color:#f9f9f9;
}


</style>
<body style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/img/login/img1.png); background-repeat: no-repeat; 100% 100%" > 
<div class="col-md-12 box" >
  <div class="img1" style="padding-bottom:45px">
    <img class="login-logo login-6"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_VVF-Logo.png" style="height:20%;" /></div>  
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

              <div class="col-md-12" style="text-align: center; border:1px solid rgb(0, 162, 174);height:340px;"><div style="text-align:center;font-size:40px;font-family: Arial,Helvetica Neue,Helvetica,sans-serif;padding-top:40px;padding-bottom:25px"></div>
          <button id="button1" style="background-color:#e7f1f2;font-size:20px; color:black" type="button"  class="btn btn-default btn-lg btn3d" onclick="window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/Adminlogin'">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
               &nbsp;&nbsp;Administrator Login</button><br><br>
               <button id="button2" style="font-size:20px;background-color:#e7f1f2;color:black" type="button"  class="btn btn-default btn-lg btn3d"  onclick="window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/login/'"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Employee Login&nbsp;&nbsp;&nbsp;&nbsp;</button><br>
             </div>
        </div>
        <div class="col-md-4">

        </div>

    </div>


</div>
</body>
</html>
