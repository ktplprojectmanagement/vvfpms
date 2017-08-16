<!DOCTYPE html>
<html lang="en">
<head>
  <title>Appraiser Email</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style type="text/css">

a:hover {
    color: red;
}
div{
  line-height: 40px;
}
hr
{
  border: 2px solid #747272;
}
a{
   text-decoration: underline;
}
label{
  font-weight: bold;
}

  </style>
</head>
<body>

<div class="container">
  <div class="logo">
<img src="http://52.172.210.251/pms/Logo.png" alt="Kritva" style="max-width: 8%;">
<hr >
  </div>
  Dear <label><?php if(isset($mail_data['0']['Emp_fname']) && isset($mail_data['0']['Emp_lname'])) { echo $mail_data['0']['Emp_fname'].' '.$mail_data['0']['Emp_lname']; }?></label>,<br/>
  Please check the goalsheet for year <label><?php echo date('Y').'-'.date('Y', strtotime('+1 year')); ?></label><br/>

  <span> click the link below to check status:<br>
  <a href="http://52.172.210.251/pms/index.php/Login">PMS Login</a>

 
<p style="text-align:left; line-height:15px; font-weight: bold">Best Regards,<br/>
 Appraiser</p></span> 
 <p style="color: #bbb;">
2016 &#169; Kritva Technology Pvt. Ltd.
</p>
</div>

</body>
</html>

