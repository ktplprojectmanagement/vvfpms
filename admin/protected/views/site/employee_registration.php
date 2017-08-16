                        <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">New Employee</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Employee Registration
                    </h3>
            <style media="all" type="text/css">
      
      #err { 
       position: absolute; 
       top: 0; right: 20; 
       z-index: 10; 
        width: 367px;
    height: 60px;
    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;
    right: 45%;
background-color: #AB5454;
color: #FFF;
font-weight: bold;   
      }
      
   </style>
   <input type="text" value="/pms" id="basepath" style="display:none">
<script type="text/javascript">
var basepath = $("#basepath").attr('value');
</script>
   <script type="text/javascript">
                $(function(){
                    $("body").on('keyup','.validate_field',function(){
                        $(window).scroll(function()
                        {
                            $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                        });
                        var id = $(this).attr('id');                        
                        if (id == 'fname' || id == 'mname' || id == 'lname') 
                        {
                            var string1 = /^([a-zA-Z0-9\s.]{1,40})*$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter only alphabhets in name field");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id == 'mask_number')
                        {
                            var string1 = /^[\d]{10}$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid mobile number");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id == 'PAN_number')
                        {
                            var string1 = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid PAN number");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id == 'Email_id')
                        {
                            var string1 = /^([A-Za-z0-9][A-Za-z0-9_\.]{1,})@([A-Za-z0-9][A-Za-z0-9\-]{1,}).([A-Za-z]{2,4})(\.[A-Za-z]{2,4})?$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid email ID");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id == 'other_city')
                        {
                            var string1 = /^([a-zA_Z]{1,80})$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid city name");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id == 'Blood_group')
                        {
                             var string1 = /^([a-zA_Z+-]{0,5})$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid blood group");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id == 'Present_address' || id == 'Permanent_address')
                        {
                             var string1 = $(this).val();
                            if (string1.length>150) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Maximum 150characters are allowed for address field");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                    });
                });
            </script> 
   
            <div class="container-fluid">
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="alert alert-danger fade in" id="err" style="display: none">
                                  <!-- <a href="#" class="close" data-dismiss="alert">&times;</a>      -->
                                  <lable id="error_value"> A problem has been occurred while submitting your data.</lable>
                              </div>
                               
                                <script type="text/javascript">                                    
                                    $(function(){
                                        $("#employee_submit").click(function(){                                        
                                           var mname = '',lname = '',blood_grp = '';var gender='';var nationality = '';var state='';var city = '';var other_city = '';
                                            if($(".emp_mname").val() != '')
                                            {
                                               mname = $(".emp_mname").val(); 
                                            }
                                            else
                                            {
                                                mname = '';
                                            }
                                            if($(".emp_lname").val() != '')
                                            {
                                               lname = $(".emp_lname").val(); 
                                            }
                                            else
                                            {
                                                lname = '';
                                            }
                                            if($(".blood_grp").val() != '')
                                            {
                                               blood_grp = $(".blood_grp").val(); 
                                            }
                                            else
                                            {
                                                blood_grp = '';
                                            }
                                            if ($(".gender:checked").val()===undefined) 
                                            {
                                                gender = '';
                                            }
                                            else
                                            {
                                                gender = $(".gender:checked").val();
                                            }
                                            if ($(".nationality:checked").val()===undefined) 
                                            {
                                                nationality = '';
                                            }
                                            else
                                            {
                                                nationality =$(".nationality:checked").val();
                                            }
                                            if ($(".state").find(':selected').val()==='--Select--') 
                                            {
                                                state = '';
                                            }
                                            else
                                            {
                                                state =$(".state").find(':selected').val();
                                            }
                                            if ($(".city").find(':selected').val() == '--Select--') 
                                            {
                                                city = '';
                                            }
                                            else
                                            {
                                                city =$(".city").find(':selected').val();
                                            }
                                            if ($(".other_city").val() == '') 
                                            {
                                                other_city = '';
                                            }
                                            else
                                            {
                                                other_city =$(".other_city").val();
                                            }

                                            var e = document.getElementById("UploadedFiles_image");
                                            var file_data = $(e)[0].files[0];
                                            var form_data = new FormData();            
                                            form_data.append("Image",$('#UploadedFiles_image')[0].files[0]);
                                            form_data.append("Employee_id",$(".emp_id").val());
                                            form_data.append("Employee_atd_code",$(".Employee_atd_code").val());
                                            form_data.append("Emp_fname",$(".emp_fname").val());
                                            form_data.append("Emp_mname",$(".emp_mname").val());
                                            form_data.append("Emp_lname",$(".emp_lname").val());
                                            form_data.append("Gender",gender);
                                            form_data.append("DOB",$(".dob_date_select").val());
                                            form_data.append("Nationality",nationality);
                                            form_data.append("Email_id",$(".email_id").val());
                                            form_data.append("joining_date",$(".joining_date_select").val());
                                            form_data.append("mobile_number",$(".mobile_number").val());
                                            form_data.append("PAN_number",$(".pan_number").val());
                                            form_data.append("Designation",$(".designation").find(':selected').text());
                                            form_data.append("Cadre",$(".cadre").find(':selected').text());
                                            form_data.append("Reporting_officer1_id",$(".repoting_officer").find(':selected').val());
                                            form_data.append("Employee_status",$(".emp_status").find(':selected').val());
                                            form_data.append("Present_address",$(".addr1").val());
                                            form_data.append("Permanent_address",$(".addr2").val());
                                            form_data.append("cluster_appraiser",$(".cluster_appraiser").find(':selected').val());
                                            form_data.append("cluster_name",$(".cluster_name").find(':selected').val());
                                            form_data.append("Blood_group",blood_grp);
                                            form_data.append("Department",$(".department").find(':selected').text());
                                            form_data.append("state",state);
                                            form_data.append("city",city);
                                            form_data.append("other_city",other_city);
                                            form_data.append("company_location",$(".location").find(':selected').text());
                                            form_data.append("BU",$(".bu").find(':selected').text());

                                            form_data.append("bu_head_name",$(".bu_head").find(':selected').text());
                                            form_data.append("bu_head_email",$(".bu_head").find(':selected').val());

                                            form_data.append("plant_head_name",$(".plant_head").find(':selected').text());
                                            form_data.append("plant_head_email",$(".plant_head").find(':selected').val()); 

                                            form_data.append("pms_status",$(".pms_stat").find(':selected').val());
                                            $("#updation_spinner").css('display','block');
                                           //  alert($(".cadre").find(':selected').text());
                                            var base_url = window.location.origin;
                                            //alert(base_url);
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                processData: false, 
                                                contentType: false,
                                                'enctype': 'multipart/form-data',
                                                'data' : form_data,
                                                'url' : base_url+$("#basepath").attr('value')+'/admin/index.php/Newemployee/save',
                                                success : function(data)
                                                {     
                                               // alert(data);

                                                   $("#error_value").text('');
                                                     $("#err").hide(); 

                                                        if(data == 'success')
                                                        {
                                                            $("#updation_spinner").css('display','none');
                                                            $("#err").show();
                                                            $("#err").fadeOut(10000);
                                                            $("#error_value").text("Successfully Added");
                                                            $("#err").addClass("alert-success");
                                                            $("#err").removeClass("alert-danger");
                                                            $("#ditable_1").load(location.href + " #ditable_1");
                                                            // }                                                         // }
                                                            } 
                                                            else if (data != 'success')
                                                            {  
                                                            $("#updation_spinner").css('display','none');
                                                            $("#err").removeClass("alert-success"); 
                                                            $("#err").addClass("alert-danger"); 
                                                            $("#err").show();                                                           
                                                            $(window).scroll(function()
                                                            {
                                                                $('#err').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
                                                            });
                                                            if(data == 'Please Select PMS status')
                                                            {
                                                                $("#err").show();
                                                                $("#error_value").text("Please Select PMS status");
                                                            }
                                                            else if(data == 'Please Select Employee Status')
                                                                {
                                                                     
                                                                     $("#err").show();
                                                                     $("#error_value").text("Please Select Employee Status");
                                                                } 
                                                            else if(data == 'Please Select State.')
                                                                {
                                                                     
                                                                     $("#err").show();
                                                                     $("#error_value").text("Please Select State");
                                                                } 
                                                                 else if(data== 'Please Select City.')
                                                                {
                                                                     $("#err").show();
                                                                     $("#error_value").text("Please Select City");
                                                                }
                                                                else if(data== 'Please Enter City.')
                                                                {
                                                                     $("#err").show();
                                                                     $("#error_value").text("Please Enter City");
                                                                }
                                                                else if($('#UploadedFiles_image')[0].files[0]!=undefined && ($('#UploadedFiles_image')[0].files[0].size>51200 || !($('#UploadedFiles_image')[0].files[0].type=='image/jpeg' || $('#UploadedFiles_image')[0].files[0].type=='image/jpe' || $('#UploadedFiles_image')[0].files[0].type=='image/jpg' || $('#UploadedFiles_image')[0].files[0].type=='image/png')))
                                                                {
                                                                    $("#err").show();
                                                                    $("#error_value").text("File jpg/Jpeg/png files with 50kb max size are allowed.");
                                                                }
                                                                else  
                                                                {
                                                                    var obj = jQuery.parseJSON(data); 
                                                                     $("#err").show();
                                                                    if (obj.Emp_fname != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Emp_fname);
                                                                    }                                 
                                                                    else if (obj.Emp_lname != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Emp_lname);
                                                                    }
                                                                    else if (obj.DOB != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text("Please enter date of birth");
                                                                    }
                                                                    else if (obj.joining_date != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.joining_date);
                                                                    }
                                                                    else if (obj.mobile_number != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.mobile_number);
                                                                    }
                                                                    else if (obj.PAN_number != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.PAN_number);
                                                                    }
                                                                    else if (obj.Email_id != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Email_id);
                                                                    }
                                                                    else if(obj.Gender != undefined)
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Gender);
                                                                    } 
                                                                    else if(obj.Nationality != undefined)
                                                                    { 
                                                                         $("#err").show();                                             
                                                                         $("#error_value").text(obj.Nationality);
                                                                    }                               
                                                                    else if (obj.Present_address != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Present_address);
                                                                    }
                                                                    else if (obj.cluster_name != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.cluster_name);
                                                                    }
                                                                    else if (obj.cluster_appraiser != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.cluster_appraiser);
                                                                    }
                                                                    else if (obj.Cadre != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Cadre);
                                                                    }
                                                                    else if (obj.Department != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Department);
                                                                    }
                                                                    else if (obj.Designation != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Designation);
                                                                    } 
                                                                    else if (obj.company_location != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.company_location);
                                                                    }                                                                   
                                                                    else if (obj.Reporting_officer1_id != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Reporting_officer1_id);
                                                                    }  
                                                                    else if (obj.BU != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.BU);
                                                                    }                                                                  
                                                                    else if (obj.Permanent_address != undefined) 
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Permanent_address);
                                                                    }
                                                                    else if(obj.Image != '')
                                                                    {
                                                                         $("#err").show();
                                                                         $("#error_value").text(obj.Image);
                                                                    } 
                                                                    else
                                                                    {
                                                                        $("#err").show();
                                                                        $("#error_value").text('Notification Sending');
                                                                    }       
                                                                }         
                                                                                                                     
                                                        }
                                                        
                                                }
                                            });
                                        });
                                        $(".cluster_name").change(function(){
                                            var cluster_value = {
                                                'cluster_value' : $(this).find(':selected').val(),
                                            };
                                            //alert(cluster_value);
                                            var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'json',
                                                'data' : cluster_value,
                                                'url' : base_url+$("#basepath").attr('value')+'/admin/index.php/Newemployee/cluster_head',
                                               
                                                success : function(data)
                                                {
                                                    //alert(data);
                                                    var detail = jQuery.parseJSON(data);
                                                   // $('#cluster_appraiser').html(detail[0]);
                                                     $('.department').html(detail[1]);
                                                }
                                            });
                                        });

                                         $(".cadre").change(function(){
                                            var grade = {
                                                'grade' :$(this).find(':selected').text(),
                                            };
                                            //alert($(this).find(':selected').text());
                                            var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'html',
                                                'data' : grade,
                                                'url' : base_url+$("#basepath").attr('value')+'/admin/index.php/Newemployee/Designation_change',
                                               
                                                success : function(data)
                                                {
                                                   // alert("tyrtyr");
                                                    $('.designation').html(data);
                                                }
                                            });
                                        });


                                        

                                    });                                    
                                </script>                               
                                <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                                <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                                <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                                  <script>
                                  var $j = jQuery.noConflict();///////// important//////////////
                                  jQuery(function() {
                                    $j( ".dob_date_select" ).datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
                                    $j( ".joining_date_select" ).datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
                                    $(".dob_date").keyup(function(){
                                        $(this).val("");
                                    });
                                    $(".joining_date").keyup(function(){
                                        $(this).val("");
                                    });
                                  });
                                  </script>
                                  <?php 
                                    $form=$this->beginWidget('CActiveForm', array(
                                       'id'=>'user-form',                                       
                                            'enableAjaxValidation' => false,
                                            'enableClientValidation' => true,
                                            'htmlOptions' => array(
                                                'class'=>'form-horizontal',
                                                'enctype' => 'multipart/form-data'
                                                ),
                                    ));
                                    ?>

                                <div class="row" id="ditable_1">
                                    <div class="col-md-12">
                                    <div  id="formResult"></div>
                                    <!-- <div class="errorMessage" id="formResult"></div> -->
                                    
                                        <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3">
                                             <?php echo CHtml::activeTextField($model,'Emp_fname',array('class'=>'form-control validate_field emp_fname','id'=>'fname')); ?>
                                        </div>
                                        <div class="col-md-3">
                                        <?php echo CHtml::activeTextField($model,'Emp_mname',array('class'=>'form-control validate_field emp_mname','id'=>'mname')); ?>
                                        </div>
                                        <div class="col-md-3">
                                        <?php echo CHtml::activeTextField($model,'Emp_lname',array('class'=>'form-control validate_field emp_lname','id'=>'lname')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="control-label col-md-3">Employee ID
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                       <?php 
                                       if ($prefix_value == 'manual') {
                                           $model->Employee_id = ''; 
                                       }
                                       else if (isset($prefix_value) && $prefix_value!='' && isset($post_value) && $post_value!='') {
                                            $model->Employee_id = $prefix_value.uniqid().$post_value; 
                                       }
                                       else if(isset($prefix_value) && $prefix_value!='' && isset($post_value) && $post_value=='')
                                       {
                                            $model->Employee_id = $prefix_value.uniqid();
                                       }
                                       else if(isset($prefix_value) && $prefix_value=='' && isset($post_value) && $post_value!='')
                                       {
                                            $model->Employee_id = uniqid().$post_value;
                                       }
                                       
                                        echo CHtml::activeTextField($model,'Employee_id',array('class'=>'form-control validate_field emp_id')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="control-label col-md-3">Employee Attendance Code
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php 
                                        if ($atd_prefix_value == 'manual') {
                                           $model->Employee_atd_code = ''; 
                                       }
                                       else if (isset($atd_prefix_value) && $atd_prefix_value!='' && isset($atd_post_value) && $atd_post_value!='') {
                                            $model->Employee_atd_code = $atd_prefix_value.uniqid().$atd_post_value; 
                                       }
                                       else if(isset($atd_prefix_value) && $atd_prefix_value!='' && isset($atd_post_value) && $atd_post_value=='')
                                       {
                                            $model->Employee_atd_code = $atd_prefix_value.uniqid();
                                       }
                                       else if(isset($atd_prefix_value) && $atd_prefix_value=='' && isset($atd_post_value) && $atd_post_value!='')
                                       {
                                            $model->Employee_atd_code = uniqid().$atd_post_value;
                                       } 
                                        echo CHtml::activeTextField($model,'Employee_atd_code',array('class'=>'form-control validate_field Employee_atd_code')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">        
                                         <label class="control-label col-md-3">Date Of Birth
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php echo CHtml::activeTextField($model,'DOB',array('class'=>'form-control validate_field dob_date_select','id'=>'mask_date2')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">        
                                        <label class="control-label col-md-3">Joining Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php echo CHtml::activeTextField($model,'joining_date',array('class'=>'form-control validate_field joining_date_select','id'=>"mask_date")); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">   
                                        <label class="control-label col-md-3">Mobile Number/Phone Number
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                        <?php echo CHtml::activeTextField($model,'mobile_number',array('class'=>'form-control validate_field mobile_number','id'=>"mask_number")); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">       
                                        <label class="control-label col-md-3">PAN Number
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php echo CHtml::activeTextField($model,'PAN_number',array('class'=>'form-control validate_field pan_number','id'=>'PAN_number')); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email ID
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                         <?php echo CHtml::activeTextField($model,'Email_id',array('class'=>'form-control validate_field email_id','id'=>'Email_id')); ?>
                                        </div>
                                    </div>  

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Gender
                                        <span class="required"> * </span>
                                    </label>
                                         <div class="col-md-4">
                                        <?php
                                        echo CHtml::activeRadioButton($model, 'Gender', array(
                                            'value'=>'Male','class'=>'gender','uncheckValue'=>null
                                        )).' Male '; echo CHtml::activeRadioButton($model, 'Gender', array(
                                            'value'=>'Female','class'=>'gender', 'uncheckValue'=>null
                                        )).' Female ';
                                        ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nationality
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                         <?php echo CHtml::activeRadioButton($model,'Nationality',array('value'=>'Indian','class'=>'nationality','uncheckValue'=>null)).'Indian'; ?>
                                         <?php echo CHtml::activeRadioButton($model,'Nationality',array('value'=>'Other','class'=>'nationality', 'uncheckValue'=>null)).'Other'; ?>
                                         </div>
                                    </div>
                                     <div class="form-group" id='other_city' style='display: none'>
                                       <label class="control-label col-md-3">Enter City<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                            echo CHtml::activeTextField($model,'other_city',array('class'=>'form-control validate_field other_city','id'=>'other_city')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group" id='emp_state' style='display: none'>
                                       <label class="control-label col-md-3">Select State<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new StateCityForm();
                                         $records = $cluster_name_models->get_list('state');
                                        $list = CHtml::listData($records,'state', 'state');                                        
                                        echo CHtml::activeDropDownList($cluster_name_models,'state',$list,array('class'=>'form-control state','empty'=>'Select')); ?>
                                        </div>
                                    </div>
                                     <div class="form-group" id='emp_city' style='display: none'>
                                       <label class="control-label col-md-3">Select City<span class="required"> * </span></label>
                                         <div class="col-md-4" id='city_list'>
                                         <?php echo CHtml::dropDownList("city",'',array('--Select--' => '--Select--'),$htmlOptions=array('class'=>'form-control format_list city'));?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3"> Present Address
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php echo CHtml::activeTextField($model,'Present_address',array('class'=>'form-control validate_field addr1','id'=>'Present_address')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Permanent Address
                                            <span class="required"> * </span>
                                        </label>
                                         <div class="col-md-4">
                                        <?php echo CHtml::activeTextField($model,'Permanent_address',array('class'=>'form-control validate_field addr2','id'=>'Permanent_address')); ?>
                                        </div>
                                    </div>
 
   <div class="form-group">
                                       <label class="control-label col-md-3">Select Cluster<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                          $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_cluster_list();
                                        // print_r($records);die();
                                        $list = CHtml::listData($records,'cluster_name', 'cluster_name'); 
                                        //print_r($records);die();   
                                        echo CHtml::activeDropDownList($cluster_name_model,'cluster_name',$list,array('class'=>'form-control cluster_name','empty'=>'Select')); ?>

                                        </div>
                                    </div>

                                    
<div class="form-group">
                                       <label class="control-label col-md-3">Select Cluster Appraiser<span class="required"> * </span></label>
                                          <div class="col-md-4" id="cluster_appraiser">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();
                                        // echo count($records);die();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id ';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data1($where,$data,$list);
                                         }
                                         
                                         $Report_id = array(); 
                                         
                                         for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                            $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
           
                                                }
                                                  echo CHtml::dropDownList('cluster_appraiser','',$Report_id,$htmlOptions=array('class'=>"form-control  cluster_appraiser",'empty'=>'Select'));     
                                       // echo CHtml::activeDropDownList($model,'cluster_appraiser',$Report_id,array('class'=>'form-control target_value','empty'=>'Select')); ?>
                                        </div>
                                    </div>    


                                   
                                     <div class="form-group">
                                       <label class="control-label col-md-3">Select Cadre/Grade<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       // $records = $cluster_name_models->get_list('cluster_name');
                                          //$list = array('cluster_name');
                                          $records=$cluster_name_model->get_cadre_list();
                                         // print_r($records);die();
                                         $list = CHtml::listData($records,'Cadre', 'Cadre'); 
                                         $arr_clus = array();
                                         if (isset($employee_data['0']['Cadre'])) {
                                             $arr_clus[$employee_data['0']['Cadre']] = array('selected' => true);  
                                         }
                                         
                                         if(isset($employee_data['0']['Cadre']) && $employee_data['0']['Cadre']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'Cadre',$list,array('class'=>'form-control cadre','empty'=>'Select')); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Cadre',$list,array('class'=>'form-control cadre','options'=>$arr_clus)); 
                                         }
                                         ?>
                                        </div>
                                    </div>
                                       
                                    <!--<div class="form-group">
                                        <label class="control-label col-md-3">Select Department<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                        $records1 = new ClusterForm();
                                        $records = $records1->get_department_list();
                                        $Department_id = array();                                 
                                        // foreach ($records as $row) {
                                        //   $Department_id[$row['department']] = $row['department'];
                                        // }
                                        $Department_id=array();
                                        echo CHtml::activeDropDownList($records1,'department',$Department_id,array('class'=>'form-control department','options'=>array('selected'=>true),'empty'=>'Select')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Designation<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                        $records1 = new ClusterForm();
                                       // $records1=array();
                    // $records = $records1->get_designation_list();
                    //                     $Designation_id = array();                                 
                    //                     foreach ($records as $row) {
                    //                       $Designation_id[$row['designation']] = $row['designation'];
                    //                     }
                                        $Designation_id=array();
                                        echo CHtml::activeDropDownList($records1,'designation',$Designation_id,array('class'=>'form-control designation','options'=>array('selected'=>true),'empty'=>'Select')); ?>
                                        </div>
                                    </div>-->
                                      <div class="form-group">
                                       <label class="control-label col-md-3">Select Department<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_department_list1();
                                          //print_r($records);die();
                                         $list = CHtml::listData($records,'Department', 'Department'); 
                                         $arr_clus = array();
                                         if (isset($employee_data['0']['Department'])) {
                                            $arr_clus[$employee_data['0']['Department']] = array('selected' => true); 
                                         }
                                          
                                         if(isset($employee_data['0']['Department']) && $employee_data['0']['Department']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('class'=>'form-control department','empty'=>'Select')); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('class'=>'form-control department','options'=>$arr_clus)); 
                                         }
                                         ?>
                                        </div>
                                    </div>
<div class="form-group">
                                       <label class="control-label col-md-3">Select Designation<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_designation_list1();
                                          //print_r($records);die();
                                         $list = CHtml::listData($records,'Designation', 'Designation'); 
                                         $arr_clus = array();
                                         if (isset($employee_data['0']['Designation'])) {
                                            $arr_clus[$employee_data['0']['Designation']] = array('selected' => true);  
                                         }
                                         
                                         if(isset($employee_data['0']['Designation']) && $employee_data['0']['Designation']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'Designation',$list,array('class'=>'form-control designation','empty'=>'Select')); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Designation',$list,array('class'=>'form-control designation','options'=>$arr_clus)); 
                                         }
                                         ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Location Working At <span class="required"> * </span></label>
                                        <div class="col-md-4">
                                        <?php 
                                        $records=array();
                                        $cluster_name_models = new ClusterForm();
                                        $records = $cluster_name_models->get_list('company_location');
                                        $location_details=$records['0']['company_location'];
                                        $location1=explode(';',$location_details);
                                        echo CHtml::dropDownList("location",'',$location1,$htmlOptions=array('class'=>"form-control location",'empty'=>'Select'));
                                       ?>

                                        </div>
                                    </div>


                                <div class="form-group">
                                       <label class="control-label col-md-3">Reporting Head<span class="required"> * </span></label>
                                         <div class="col-md-4" id="reporting_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();
                                        // echo count($records);die();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id ';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data1($where,$data,$list);
                                         }
                                         // echo "<pre>";
                                         //        print_r($Reporting_officer_data);
                                         //        echo "</pre>";
                                         $Report_id = array(); 
                                         // if (isset($Reporting_officer_data)) 
                                         // {
                                         //    for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                         //    if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Reporting_officer1_id']) {
                                         //       $Cadre_id[$Reporting_officer_data[$l]['0']['Reporting_officer1_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                         //    }
                                            
                                         //   } 
                                         // }    
                                         //print_r(count($Reporting_officer_data))                            ;die();
                                         for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                            $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
           
                                                }
                                                // echo "<pre>";
                                                // print_r($Report_id);
                                                // echo "</pre>";die();
                                                //  echo "<pre>";
                                                // print_r (count($Report_id));
                                                // echo "</pre>";die();
                                       
                                          //$lang = CHtml::listData($records,'Reporting_officer1_id', 'Reporting_officer1_id');
                                        //$lang = array('monica.sadafule@kritva.com'=>'Sawant', 'priyanka.mahadik@kritva.com'=>'New');
                                        echo CHtml::activeDropDownList($model,'Reporting_officer1_id',$Report_id,array('class'=>'form-control repoting_officer','empty'=>'Select')); ?>
                                        </div>
                                    </div>
                                      


                                   <div class="form-group">
                                       <label class="control-label col-md-3">Select BU<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                         <?php 
                                         $cluster_name_models = new ClusterForm();
                                         $cluster_name_model = new EmployeeForm();
                                       
                                          $records=$cluster_name_model->get_bu_list();
                                          //print_r($records);die();
                                         $list = CHtml::listData($records,'BU', 'BU'); 
                                         $arr_clus = array();
                                         if (isset($employee_data['0']['BU'])) {
                                             $arr_clus[$employee_data['0']['BU']] = array('selected' => true);  
                                         }                                         
                                         if(isset($employee_data['0']['BU']) && $employee_data['0']['BU']==""){
                                            echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('class'=>'form-control bu','empty'=>'Select')); 
                                         }
                                         else{
                                            echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('class'=>'form-control bu','options'=>$arr_clus)); 
                                         }
                                         ?>
                                        </div>
                                    </div> 
                                     
 <div class="form-group">
<label class="control-label col-md-3">Select BU Head<span class="required"> * </span></label>
<div class="col-md-4" id="bu_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();
                                        // echo count($records);die();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id ';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data1($where,$data,$list);
                                         }
                                         
                                         $Report_id = array(); 
                                         
                                         for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                            $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
           
                                                }
                                                
                                        echo CHtml::activeDropDownList($model,'Reporting_officer1_id',$Report_id,array('class'=>'form-control bu_head','empty'=>'Select')); ?>
                                        </div>
                                    </div> 

                               

                                     <div class="form-group">
                                        <label class="control-label col-md-3">Select Plant Head<span class="required"> * </span></label>
                        
                                        <div class="col-md-4" id="plant_head">
                                         <?php 
                                         $reporting_list = new EmployeeForm();
                                         $records = $reporting_list->get_appraiser_list();
                                        // echo count($records);die();
                                         for ($k=0; $k < count($records); $k++) { 
                                            $where = 'where Email_id = :Email_id ';
                                            $list = array('Email_id');
                                            $data = array($records[$k]['Reporting_officer1_id']);
                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data1($where,$data,$list);
                                         }
                                         
                                         $Report_id = array(); 
                                         
                                         for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                        if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                            $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                            }
           
                                                }
                                                
                                        echo CHtml::activeDropDownList($model,'Reporting_officer1_id',$Report_id,array('class'=>'form-control plant_head','empty'=>'Select')); ?>
                                        </div>
                                    </div> 

                                    
                                   


                                   

                                    <div class="form-group">
                                       <label class="control-label col-md-3">Employee Status<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                        $lang = array('Select'=>'Select','Probation'=>'Probation', 'Permanent'=>'Permanent','Left'=>'Left');
                                        echo CHtml::activeDropDownList($model,'Employee_status',$lang,array('class'=>'form-control emp_status')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3">PMS Status<span class="required"> * </span></label>
                                         <div class="col-md-4">
                                        <?php 
                                        $lang = array('Select'=>'Select','Active'=>'Active', 'Inactive'=>'Inactive');
                                        echo CHtml::activeDropDownList($model,'pms_status',$lang,array('class'=>'form-control pms_stat')); ?>
                                        </div>
                                    </div>
                                     

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Blood Group</label>
                                         <div class="col-md-4">
                                        <?php echo CHtml::activeTextField($model,'Blood_group',array('class'=>'form-control validate_field blood_grp','id'=>'Blood_group')); ?>
                                        </div>
                                    </div>

                                    
                                    
                                                                                          
                                    </div>
                                    <div class="col-md-2">
                                        <div id="AjaxLoader" style="display: none"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ajax-loader.gif"></img></div>
                                         <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <?php echo CHtml::activeFileField($model, 'Image',array('class'=>'image_name','id'=>'UploadedFiles_image')); ?></span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        </div>
                                <div class="form-actions">
                                <div class="row">               
                                    <div class="col-md-offset-3 col-md-9">     
                                        <?php echo CHtml::resetButton('Reset',array('class'=>'btn default','style'=>'float:left')); ?> 
                                        <?php echo CHtml::Button('Submit',array('class'=>'btn green','style'=>'float:right','id'=>'employee_submit')); ?>
                    <i id="updation_spinner" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 22px;float: right;display:none"></i>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                <script type="text/javascript">
                    $(function(){
                        $('input[type="radio"]').click(function(){
                            if ($('.nationality:checked').val() == 'Other') 
                          {
                                $("#other_city").show();
                                $("#emp_state").hide();
                                $("#emp_city").hide();
                          }
                          else if($('.nationality:checked').val() == 'Indian')
                          {
                                $("#other_city").hide();
                                $("#emp_state").show();
                                $("#emp_city").show();
                          }
                        });
                        $('.state').change(function(){
                            var state_name = {
                                'state_name' : $('.state').find(':selected').val()
                            }
                            var base_url = window.location.origin;  
                            $.ajax({
                                 dataType :'html',
                                 type :'post',
                                 data : state_name,
                                 url : base_url+$("#basepath").attr('value')+'/admin/index.php/Newemployee/city_list',
                                 success : function(data) {              
                                    $('#city_list').html(data);                              
                                }
                            });
                        });
                    });
                </script>
<script>


                                  var $j = jQuery.noConflict();///////// important//////////////
                                  jQuery(function() {
                                  



                                        

                                  
                             



                                    $j( ".DOB" ).datepicker({dateFormat: 'dd-M-yy'});
                                    $j( ".joining_date" ).datepicker({dateFormat: 'dd-M-yy'});
                                    $(".DOB").keyup(function(){

                                        $(this).val("");
                                    });
                                    $(".joining_date").keyup(function(){
                                        //alert("hi");
                                        $(this).val("");
                                    });
                                  });
                                  </script>
