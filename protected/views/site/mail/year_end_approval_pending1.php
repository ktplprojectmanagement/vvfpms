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
  Dear <label> <?php if(Yii::app()->user->getState("Employee_name") && Yii::app()->user->getState("Employee_name")!='') { print_r(Yii::app()->user->getState("Employee_name")); }?></label>,<br/>

Your team member <?php if(isset($mail_data1['0']['Emp_fname']) && isset($mail_data1['0']['Emp_lname'])) { echo $mail_data1['0']['Emp_fname'].' '.$mail_data1['0']['Emp_lname']; }?> has submitted a self-input of the year-end review. Please review this data and have a performance discussion with him/her at the earliest. After the performance discussion, please rate his/her performance on the Kritva PMS portal. Please do not share your rating with the team member as this rating may change during the normalisation process.

 
<p style="text-align:left; line-height:15px; font-weight: bold">Best Regards,<br/>
Kritva Technologies Pvt Ltd</p></span> 

</div>

</body>
</html>

