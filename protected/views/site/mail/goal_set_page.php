<!DOCTYPE html>
<html lang="en">
<head>
  <title>Appraiser Email</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="http://kritvainvestments.com/pmsuser/css/email.css">
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
<img src="http://kritva.in/pms/Logo.png" alt="Kritva" style="max-width: 8%;">
<hr >
  </div>
  Dear <label><?php if(isset($mail_data['0']['Emp_fname'])) { echo $mail_data['0']['Emp_fname']; }?></label>,<br/>

 <?php if(isset($employee_data1['0']['Emp_fname']) && isset($employee_data1['0']['Emp_lname'])) { echo $employee_data1['0']['Emp_fname'].' '.$employee_data1['0']['Emp_lname']; }?> has submitted his/her IDP and goal sheet for your review.<br/>

<span> Please login to <a href="http://kritva.in/pms/index.php/Login">PMS Login</a>and approve them after you have reviewed them.</span>

 
<p style="text-align:left; line-height:15px; font-weight: bold">Best Regards,<br/>
 <?php if(isset($employee_data1['0']['Emp_fname']) && isset($employee_data1['0']['Emp_lname'])) { echo $employee_data1['0']['Emp_fname'].' '.$employee_data1['0']['Emp_lname']; }?></p></span> 
 <p style="color: #bbb;">
2016 &#169; Kritva Technology Pvt. Ltd.
</p>
</div>

</body>
</html>

