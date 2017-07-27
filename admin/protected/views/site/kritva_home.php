


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kritva.in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
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


</style>


<body> 
<script type="text/javascript">
  window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "http://kritva.com/";

    }, 1000);
</script>
<!-- <body>
 --><div class="col-md-12"  >



<div class="col-md-12 " >
  
      <div class="welcome">
         <img class="login-logo login-6"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/maintenance.jpg" style="height:50%;" />
          </div>  
        </div>
         <br>
          <div>
              <div class="col-md-12" style="text-align: center; ">
              Please wait while page is getting redirected...<i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;"></i>
             </div>
              
          </div>
      </div>
      
    </div>

 <div class="footer">2016 Copyright © Kritva Technology Pvt. Ltd.</div>
<!-- BEGIN CORE PLUGINS -->
        
        <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
       
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-buttons.min.js" type="text/javascript"></script>
       

</html>