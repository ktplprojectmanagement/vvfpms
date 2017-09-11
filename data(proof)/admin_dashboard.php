		<div class="main">
			<!-- NAVBAR -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-btn">
						<button type="button" class="btn-toggle-fullwidth"></button>
					</div>
					
					<div id="navbar-menu" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
                                <a href="<?php echo base_url(); ?>index.php/Adminlogin" class="dropdown-toggle" data-toggle="dropdown"><span>Logout</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <!-- <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                    <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                    <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li> -->
                                    <li><a href="http://kritvainvestments.com/vendor/index.php/Adminlogin"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                                </ul>
                            </li>
						</ul>
					</div>
				</div>
			</nav>
			<script type="text/javascript" src="<?php echo base_url(); ?>tableExport.jquery.plugin-master/tableExport.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>tableExport.jquery.plugin-master/jquery.base64.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>tableExport.jquery.plugin-master/jspdf/libs/sprintf.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>tableExport.jquery.plugin-master/jspdf/jspdf.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>tableExport.jquery.plugin-master/jspdf/libs/base64.js"></script>
			         <div id="standard_modal" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID">
                                      <thead>
                                        <th>Sr.No</th>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($mail_recive_data) && count($mail_recive_data)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($mail_recive_data); $i++) {
if(count($mail_recive_data[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php echo $cnt; ?></td>
                                        				<td><?php if(isset($mail_recive_data[$i]['0']['Vendor_id'])) { print_r($mail_recive_data[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($mail_recive_data[$i]['0']['Name'])) { print_r($mail_recive_data[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($mail_recive_data[$i]['0']['Purchaser_Name'])) { print_r($mail_recive_data[$i]['0']['Purchaser_Name']); }  ?></td>
                                        			</tr>
                                        			<?php
                                        			$cnt++;
}
                                        		}
                                        	}
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="border-color: rgb(2, 183, 195);float: left;">Cancel</button>
                                   <!--  <a onClick ="alert("dfgdf");">XLS</a> -->
                                   <button type="button" class="btn border-blue-soft" id="del_goal_set"  style="border-color: rgb(2, 183, 195);">Export Excel</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="vendor_modal1" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">Approved List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID">
                                      <thead>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($vendor_updated_data_aprv_list) && count($vendor_updated_data_aprv_list)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($vendor_updated_data_aprv_list); $i++) {
if(count($vendor_updated_data_aprv_list[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				
                                        				<td><?php if(isset($vendor_updated_data_aprv_list[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_aprv_list[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_aprv_list[$i]['0']['Name'])) { print_r($vendor_updated_data_aprv_list[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_aprv_list[$i]['0']['Purchaser_Name'])) { print_r($vendor_updated_data_aprv_list[$i]['0']['Purchaser_Name']); }  ?></td>
<td>
																<form method="post" target="_new" action="<?php echo base_url(); ?>index.php/Vendordata">
																	<input type="text" name="vendor_id" style="display: none" value="<?php  if(isset($vendor_updated_data_aprv_list[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_aprv_list[$i]['0']['Vendor_id']); } ?>">
																	<input type="submit" name="submit"  value="Check">
																</form>
															
															</td>
                                        			</tr>
                                        			<?php
}
                                        			$cnt++;
                                        		}
                                        	}
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="border-color: rgb(2, 183, 195);float: left;">Cancel</button>
                                   <!--  <a onClick ="alert("dfgdf");">XLS</a> -->
                                   <button type="button" class="btn border-blue-soft" id="del_goal_set"  style="border-color: rgb(2, 183, 195);">Export Excel</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div id="vendor_modal2" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID">
                                      <thead>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($vendor_updated_data_list) && count($vendor_updated_data_list)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($vendor_updated_data_list); $i++) {
if(count($vendor_updated_data_list[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php if(isset($vendor_updated_data_list[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_list[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_list[$i]['0']['Name'])) { print_r($vendor_updated_data_list[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_list[$i]['0']['Purchaser_Name'])) { print_r($vendor_updated_data_list[$i]['0']['Purchaser_Name']); }  ?></td>
<td>
																<form method="post" target="_new" action="<?php echo base_url(); ?>index.php/Vendordata">
																	<input type="text" name="vendor_id" style="display: none" value="<?php if(isset($vendor_updated_data_list[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_list[$i]['0']['Vendor_id']); } ?>">
																	<input type="submit" name="submit"  value="Check">
																</form>
															
															</td>
                                        			</tr>
                                        			<?php
}
                                        			$cnt++;
                                        		}
                                        	}
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="border-color: rgb(2, 183, 195);float: left;">Cancel</button>
                                   <!--  <a onClick ="alert("dfgdf");">XLS</a> -->
                                   <button type="button" class="btn border-blue-soft" id="del_goal_set"  style="border-color: rgb(2, 183, 195);">Export Excel</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div id="vendor_modal3" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">Rejected List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID">
                                      <thead>
                                        <th>Sr.No</th>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($vendor_updated_data_rej_list) && count($vendor_updated_data_rej_list)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($vendor_updated_data_rej_list); $i++) {
if(count($vendor_updated_data_rej_list[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php echo $cnt; ?></td>
                                        				<td><?php if(isset($vendor_updated_data_rej_list[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_rej_list[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_rej_list[$i]['0']['Name'])) { print_r($vendor_updated_data_rej_list[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_rej_list[$i]['0']['Purchaser_Name'])) { print_r($vendor_updated_data_rej_list[$i]['0']['Purchaser_Name']); }  ?></td>
<td>
																<form method="post" target="_new" action="<?php echo base_url(); ?>index.php/Vendordata">
																	<input type="text" name="vendor_id" style="display: none" value="<?php if(isset($vendor_updated_data_rej_list[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_rej_list[$i]['0']['Vendor_id']); } ?>">
																	<input type="submit" name="submit"  value="Check">
																</form>
															
															</td>
                                        			</tr>
                                        			<?php
}
                                        			$cnt++;
                                        		}
                                        	}
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="border-color: rgb(2, 183, 195);float: left;">Cancel</button>
                                   <!--  <a onClick ="alert("dfgdf");">XLS</a> -->
                                   <button type="button" class="btn border-blue-soft" id="del_goal_set"  style="border-color: rgb(2, 183, 195);">Export Excel</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
                   	<div id="standard_modal1" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID">
                                      <thead>
                                        <th>Sr.No</th>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($mail_bounce_data) && count($mail_bounce_data)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($mail_bounce_data); $i++) {
if(count($mail_bounce_data[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php echo $cnt; ?></td>
                                        				<td><?php if(isset($mail_bounce_data[$i]['0']['Vendor_id'])) { print_r($mail_bounce_data[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($mail_bounce_data[$i]['0']['Name'])) { print_r($mail_bounce_data[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($mail_bounce_data[$i]['0']['Purchaser_Name'])) { print_r($mail_bounce_data[$i]['0']['Purchaser_Name']); }  ?></td>
                                        			</tr>
                                        			<?php
}
                                        			$cnt++;
                                        		}
                                        	}
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="border-color: rgb(2, 183, 195);float: left;">Cancel</button>
                                   <!--  <a onClick ="alert("dfgdf");">XLS</a> -->
                                   <button type="button" class="btn border-blue-soft" id="del_goal_set"  style="border-color: rgb(2, 183, 195);">Export Excel</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div id="standard_modal2" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID">
                                      <thead>
                                        <th>Sr.No</th>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($total_recive_data) && count($total_recive_data)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($total_recive_data); $i++) {
if(count($total_recive_data[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php echo $cnt; ?></td>
                                        				<td><?php if(isset($total_recive_data[$i]['0']['Vendor_id'])) { print_r($total_recive_data[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($total_recive_data[$i]['0']['Name'])) { print_r($total_recive_data[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($total_recive_data[$i]['0']['Purchaser_Name'])) { print_r($total_recive_data[$i]['0']['Purchaser_Name']); }  ?></td>
                                        			</tr>
                                        			<?php
}
                                        			$cnt++;
                                        		}
                                        	}
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline" style="border-color: rgb(2, 183, 195);float: left;">Cancel</button>
                                   <!--  <a onClick ="alert("dfgdf");">XLS</a> -->
                                   <button type="button" class="btn border-blue-soft" id="del_goal_set"  style="border-color: rgb(2, 183, 195);">Export Excel</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
			<!-- END NAVBAR -->
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Overview</h3>
							<p class="panel-subtitle"><?php echo date('d-M-Y'); ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download get_data" style="cursor: pointer;" title="Email Received" id="email_received"></i></span>
										<p>
											<span class="number">
<?php 
$num_sent = 0;
if (isset($mail_recive_data) && count($mail_recive_data)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($mail_recive_data); $i++) {
if(count($mail_recive_data[$i])>0)
{
$num_sent++;
}
}
echo $num_sent;
}
else
{
echo '0';
}
 ?></span>
											<span class="title">Email Received</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag get_data1"></i></span>
										<p>
											<span class="number">
<?php 
$num_sent = 0;
//print_r($mail_bounce_data);die();
if (isset($mail_bounce_data) && count($mail_bounce_data)>0) {

for ($i=0; $i < count($mail_bounce_data); $i++) {
if(count($mail_bounce_data[$i])>0)
{
$num_sent++;
}
}
echo $num_sent;
}
else
{
echo '0';
} ?>
</span>
											<span class="title">Email Bounced</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye get_data2"></i></span>
										<p>
											<span class="number">
<?php 
$num_sent = 0;
if (isset($total_recive_data) && count($total_recive_data)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($total_recive_data); $i++) {
if(count($total_recive_data[$i])>0)
{
$num_sent++;
//print_r(count($vendor_updated_data_aprv_list));
}
}
echo $num_sent; 
}
else
{
echo 0;
} ?>
</span>
											<span class="title">Email Sent</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Recent Updates</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
											<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download get_data_vendor" style="cursor: pointer;" title="Email Received" id="email_received"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_aprv_list)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_aprv_list);$i++)
{
if(count($vendor_updated_data_aprv_list[$i]) > 0)
{
$num_sent++;
//print_r(count($vendor_updated_data_aprv_list));
}
}
echo $num_sent; 
}
else
{
echo 0;
} ?></span>
											<span class="title">Vendor Details Verified</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag get_data_vendor3"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_rej_list)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_rej_list);$i++)
{
if(count($vendor_updated_data_rej_list[$i]) > 0)
{
$num_sent++;
//print_r(count($vendor_updated_data_rej_list));
}
}
echo $num_sent; 
}
else
{
echo 0;
} ?></span>
											<span class="title">Vendor Details rejected</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye get_data_vendor1"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_list)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_list);$i++)
{
if(count($vendor_updated_data_list[$i]) > 0)
{
$num_sent++;
//print_r(count($vendor_updated_data_list));
}
}
echo $num_sent; 
}
else
{
echo 0;
} ?></span>
											<span class="title">Vendors Updated Details</span>
										</p>
									</div>
								</div>
							</div>
								</div>
								
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
				
					</div>
			</div>				
			</div>
			</div>
			<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
			<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
				
			<script type="text/javascript">
			var j = jQuery.noConflict();
				j(function(){
					j("body").on('click','.get_data',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal").modal('show');
					});
					j("body").on('click','.get_data1',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal1").modal('show');
					});
					j("body").on('click','.get_data2',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal2").modal('show');
					});
					j("body").on('click','.get_data_vendor',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal1").modal('show');
					});
					j("body").on('click','.get_data_vendor1',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal2").modal('show');
					});
					j("body").on('click','.get_data_vendor3',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal3").modal('show');
					});
					j("#del_goal_set").click(function(){alert("hjhkj");
						$('#tableID').tableExport({type:'pdf',escape:'false'});
					});
					var base_url = window.location.origin;
					j("body").on('click','#logout',function(){
                    	j.ajax({
		                  'type' : 'post',		                  
		                  'url' : base_url+'/vendor/index.php/Admindashboard/logout',
		                  success : function(data)
		                  {
		                  	//alert("dfgdf");
		                     window.location.href = base_url+'/vendor/index.php/Adminlogin';
		                  }
		              });
                    });
				});
			</script>
			<script type="text/javascript">
                // $(function(){
                  
                // });
            </script>
			<!-- END MAIN CONTENT