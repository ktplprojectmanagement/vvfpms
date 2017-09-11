<div class='main_buttons_contact_content' style="border:2px solid red">
									<h3>Please feel free to contact us</h3>
<form action="http://web-rockstars.com/concord/wp-content/themes/concord/7league/ajax.php" id="contactFormWidget" method="post">

		<div style='height: 50px;display:none' id='error_id' class="alert alert-danger">
			<i class="fa fa-exclamation-triangle"></i>
			<lable id='error_lable'></lable>
		</div>
	<div style='height: 50px;display:none' id='success_id' class="alert alert-success">
		<i class="fa fa-check"></i>
		<lable id='success_lable'></lable>
	</div>
			<label for="contactName">Name fgdgdfg:</label>
			<input type="text" name="contactName" id="contactName" value="" class="uniqe_full_name">						
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="" class="  email_id">	
			<label for="contactName" >Contact No.:</label>
			<input type="text" name="contactNo" id="contactNo" value="" class="mobile_number">		
			<label for="message">Message:</label>
			<textarea name="message" id="message" class="bigdata"></textarea>							
			<input type="hidden" name="submitted" id="submitted" value="true">
			<input type="hidden" name="ajaxType" id="ajaxType" value="ajaxTrue">		
<input type="button" id="email_go" class="button sc_button custom" value=" GO! ">	
<input class="button email_button custom" name="send_email" value="send_email" style="float: right;margin-right: 55px;" id="save_cust" type="button">		
		</form>


		<div id="successWidget"></div>
<script type="text/javascript">

		$('#email_go').click(function(){
	
	var name= $('#contactName').val();
	var email=$('#email').val();
	var con_no=$('#contactNo').val();
	var message=$('#message').val();
	if(name==""){
		$("#error_lable").html("Please Enter Name").show();
        $("#error_id").show(); 
        $("#"+id).attr('title','Incorrect');
         $("#error_id").fadeOut(2000);
	}
	else if(email==""){
		$("#error_lable").html("Please Enter Email ID").show();
        $("#error_id").show(); 
        $("#"+id).attr('title','Incorrect');
         $("#error_id").fadeOut(2000);
	}
	else if(con_no==""){
		$("#error_lable").html("Please Enter Contact no").show();
        $("#error_id").show(); 
        $("#"+id).attr('title','Incorrect');
        $("#error_id").fadeOut(2000);
	}
	else if(message==""){
		$("#error_lable").html("Please Enter Message").show();
        $("#error_id").show(); 
        $("#"+id).attr('title','Incorrect');
        $("#error_id").fadeOut(2000);
	}
	else{
	var data={
		'name':name,
		'email':email,
		'con_no':con_no,
		'message':message
	};
	var base_url = window.location.origin;
   $.ajax({
    
            type : 'post',
            datatype : 'html',
            data : data,
            url : base_url+'/sales/index.php/Email_controller/htmlmail',
            success : function(data)
            {
              alert(data);
              $("#success_lable").html('Successfully submitted').show();
              $("#success_id").show();
			$("#success_id").fadeOut(2000);
			//alert("dddd");
              location.reload();

           
            }
          });
 }
});