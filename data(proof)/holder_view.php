	<div class='main_buttons_contact_content1' style="margin-top: -9px;">
		<h3 id="create_user">Account Holder Details</h3>
		<div class="row">
		<form method="post">
		<div class="col-md-6">
		<?php for ($i=1; $i < $_POST['holder_number']; $i++) {?>
		<lable class="req_msg" style="float:left">*</lable>&nbsp<label><?php echo $i+1; ?> Holder Name</label>
		<input type="text" name="holder<?php echo $i+1; ?>" id="holder<?php echo $i+1; ?>" class="uniqe_full_name" <?php if(isset($edit_user_details) && count($edit_user_details) > 0) { echo 'value = '.$edit_user_details['0']['end_date']; } ?> <?php if(isset($flag) && $flag == 'view') { echo "disabled"; } ?> >
		<?php } ?>
		</div>		
		<div class="col-md-6">
		<?php for ($i=1; $i < $number; $i++) {?>
		<lable class="req_msg" style="float:left">*</lable>&nbsp<label><?php echo $i+1; ?> Holder PAN Number</label>
		<input type="text" name="holder_pan<?php echo $i+1; ?>" id="holder_pan<?php echo $i+1; ?>" class="pan" <?php if(isset($edit_user_details) && count($edit_user_details) > 0) { echo 'value = '.$edit_user_details['0']['nominee_pan']; } ?> <?php if(isset($flag) && $flag == 'view') { echo "disabled"; } ?> >
		<?php } ?>
		</div>
		</form>
		</div>
		</div>