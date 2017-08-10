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
<img src="http://52.172.210.251/vvf.kritva.in/Logo.png" alt="Kritva" style="max-width: 8%;">
<hr >
  </div>
  Dear <label><?php if(Yii::app()->user->getState("Employee_name") && Yii::app()->user->getState("Employee_name")!='') { print_r(Yii::app()->user->getState("Employee_name")); }?></label>,<br/>
Thank you for completing the year-end review for <?php if(isset($mail_data['0']['Emp_fname']) && isset($mail_data['0']['Emp_lname'])) { echo $mail_data['0']['Emp_fname'].' '.$mail_data['0']['Emp_lname']; }?> for <?php echo date('Y',strtotime('-1 year')).'-'.date('Y'); ?><br>

Your comments and ratings have been saved. These will be shared with the normalisation panel during normalisation. The panel may contact you for any queries on this review.

<p style="text-align:left; line-height:15px; font-weight: bold">Best Regards,<br/>
Kritva Technologies Pvt Ltd
</div>

</body>
</html>

