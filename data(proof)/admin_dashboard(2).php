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
 <div id="standard_modal_mail1" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID1">
                                      <thead>
                                        <th>Sr.No</th>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($mail_recive_data1) && count($mail_recive_data1)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($mail_recive_data1); $i++) {
if(count($mail_recive_data1[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php echo $cnt; ?></td>
                                        				<td><?php if(isset($mail_recive_data1[$i]['0']['Vendor_id'])) { print_r($mail_recive_data1[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($mail_recive_data1[$i]['0']['Name'])) { print_r($mail_recive_data1[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($mail_recive_data1[$i]['0']['Purchaser_Name'])) { print_r($mail_recive_data1[$i]['0']['Purchaser_Name']); }  ?></td>
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
                                    <table class="table" id="tableID2">
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
 <div id="customer_modal_pend1" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">Approved List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID3">
                                      <thead>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php  
                                      $pending_customer1 = $customer_pending_data;
                                        	if (isset($customer_pending_data) && count($customer_pending_data)>0) {
                                        		$cnt = 1;
                                        		foreach($pending_customer1 as $pending_customer)
{
                                        			?>
                                        			<tr>
                                        				
                                        				<td><?php if(isset($pending_customer['Vendor_id'])) { print_r($pending_customer['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($pending_customer['Name'])) { print_r($pending_customer['Name']); }  ?></td>
                                        				<td><?php if(isset($pending_customer['Purchaser_Name'])) { print_r($pending_customer['Purchaser_Name']);   ?></td>
<td>
																<form method="post" target="_new" action="<?php echo base_url(); ?>index.php/Customerdetails">
																	<input type="text" name="vendor_id" style="display: none" value="<?php  if(isset($pending_customer['Vendor_id'])) { print_r($pending_customer['Vendor_id']); } ?>">
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
<div id="vendor_modal_pend1" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">Approved List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID4">
                                      <thead>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php  
                                      $pending_customer1 = $vendor_pending_data;
                                        	if (isset($vendor_pending_data) && count($vendor_pending_data)>0) {
                                        		$cnt = 1;
                                        		foreach($pending_customer1 as $pending_customer)
{
                                        			?>
                                        			<tr>
                                        				
                                        				<td><?php if(isset($pending_customer['Vendor_id'])) { print_r($pending_customer['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($pending_customer['Name'])) { print_r($pending_customer['Name']); }  ?></td>
                                        				<td><?php if(isset($pending_customer['Purchaser_Name'])) { print_r($pending_customer['Purchaser_Name']);   ?></td>
<td>
																<form method="post" target="_new" action="<?php echo base_url(); ?>index.php/Vendordata">
																	<input type="text" name="vendor_id" style="display: none" value="<?php  if(isset($pending_customer['Vendor_id'])) { print_r($pending_customer['Vendor_id']); } ?>">
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
    <div id="vendor_modal11" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">Approved List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID5">
                                      <thead>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($vendor_updated_data_aprv_list1) && count($vendor_updated_data_aprv_list1)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($vendor_updated_data_aprv_list1); $i++) {
if(count($vendor_updated_data_aprv_list1[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				
                                        				<td><?php if(isset($vendor_updated_data_aprv_list1[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_aprv_list1[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_aprv_list1[$i]['0']['Name'])) { print_r($vendor_updated_data_aprv_list1[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_aprv_list1[$i]['0']['Purchaser_Name'])) { print_r($vendor_updated_data_aprv_list1[$i]['0']['Purchaser_Name']); }  ?></td>
<td>
																<form method="post" target="_new" action="<?php echo base_url(); ?>index.php/Customerdetails">
																	<input type="text" name="vendor_id" style="display: none" value="<?php  if(isset($vendor_updated_data_aprv_list1[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_aprv_list1[$i]['0']['Vendor_id']); } ?>">
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
                                    <table class="table" id="tableID6">
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
         <div id="vendor_modal21" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID7">
                                      <thead>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($vendor_updated_data_list1) && count($vendor_updated_data_list1)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($vendor_updated_data_list1); $i++) {
if(count($vendor_updated_data_list1[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php if(isset($vendor_updated_data_list1[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_list1[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_list1[$i]['0']['Name'])) { print_r($vendor_updated_data_list1[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($vendor_updated_data_list1[$i]['0']['Purchaser_Name'])) { print_r($vendor_updated_data_list1[$i]['0']['Purchaser_Name']); }  ?></td>
<td>
																<form method="post" target="_new" action="<?php echo base_url(); ?>index.php/Customerdetails">
																	<input type="text" name="vendor_id" style="display: none" value="<?php if(isset($vendor_updated_data_list1[$i]['0']['Vendor_id'])) { print_r($vendor_updated_data_list1[$i]['0']['Vendor_id']); } ?>">
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
                                    <table class="table" id="tableID8">
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
 <div id="vendor_modal31" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">Rejected List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID9">
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
                                    <table class="table" id="tableID10">
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
	<div id="standard_modal_mail2" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID11">
                                      <thead>
                                        <th>Sr.No</th>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($mail_bounce_data1) && count($mail_bounce_data1)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($mail_bounce_data1); $i++) {
if(count($mail_bounce_data1[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php echo $cnt; ?></td>
                                        				<td><?php if(isset($mail_bounce_data1[$i]['0']['Vendor_id'])) { print_r($mail_bounce_data1[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($mail_bounce_data1[$i]['0']['Name'])) { print_r($mail_bounce_data1[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($mail_bounce_data1[$i]['0']['Purchaser_Name'])) { print_r($mail_bounce_data1[$i]['0']['Purchaser_Name']); }  ?></td>
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
                                    <table class="table" id="tableID12">
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
<div id="standard_modal_mail3" class="modal fade" tabindex="-1" data-backdrop="del_goal" data-keyboard="false">
                        <div class="modal-dialog" style="width: 45%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="get_head">List</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" id="tableID13">
                                      <thead>
                                        <th>Sr.No</th>
                                        <th>vendor ID</th>
                                        <th>Vendor Name</th>
                                        <th>Purchaser Name</th>
                                      </thead>
                                      <tbody id="cancl_body_part">
                                        <?php                                        
                                        	if (isset($total_recive_data1) && count($total_recive_data1)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($total_recive_data1); $i++) {
if(count($total_recive_data1[$i])>0)
{
                                        			?>
                                        			<tr>
                                        				<td><?php echo $cnt; ?></td>
                                        				<td><?php if(isset($total_recive_data1[$i]['0']['Vendor_id'])) { print_r($total_recive_data1[$i]['0']['Vendor_id']); }  ?></td>
                                        				<td><?php if(isset($total_recive_data1[$i]['0']['Name'])) { print_r($total_recive_data1[$i]['0']['Name']); }  ?></td>
                                        				<td><?php if(isset($total_recive_data1[$i]['0']['Purchaser_Name'])) { print_r($total_recive_data1[$i]['0']['Purchaser_Name']); }  ?></td>
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
							<h3 class="panel-title">Mail Related Update for vendor</h3>
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
									<h3 class="panel-title">Mail Related Update for customer</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
											<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download get_data_vendor_mail1" style="cursor: pointer;" title="Email Received" id="email_received"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_aprv_list1)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_aprv_list1);$i++)
{
if(count($vendor_updated_data_aprv_list1[$i]) > 0)
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
											<span class="title">Email Received</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag get_data_vendor_mail2"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_rej_list1)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_rej_list1);$i++)
{
if(count($vendor_updated_data_rej_list1[$i]) > 0)
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
											<span class="title">Email Bounced</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye get_data_vendor_mail3"></i></span>
										<p>
											<span class="number">
<?php 
$num_sent = 0;
if (isset($total_recive_data1) && count($total_recive_data1)>0) {
                                        		$cnt = 1;
                                        		for ($i=0; $i < count($total_recive_data1); $i++) {
if(count($total_recive_data1[$i])>0)
{
$num_sent++;
//print_r(count($vendor_updated_data_aprv_list1));
}
}
echo $num_sent; 
}
else
{
echo 0;
} ?>
</span>
											<span class="title">Email Sent
</span>
										</p>
									</div>
								</div>
							</div>
								</div>
								
							</div>
							<!-- END RECENT PURCHASES -->
		<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Vendor Updates</h3>
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
										<span class="icon"><i class="fa fa-eye get_data_vendor_pending11"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_pending_data)) 
{ 
echo count($vendor_pending_data); 
}
else
{
echo 0;
} ?></span>
											<span class="title">Pending</span>
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
	<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Customer Updates</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
											<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download get_data_vendor_1" style="cursor: pointer;" title="Email Received" id="email_received"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_aprv_list1)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_aprv_list1);$i++)
{
if(count($vendor_updated_data_aprv_list1[$i]) > 0)
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
											<span class="title">Customer Details Verified</span>
										</p>
									</div>
								</div>

								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag get_data_vendor31"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_rej_list1)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_rej_list1);$i++)
{
if(count($vendor_updated_data_rej_list1[$i]) > 0)
{
$num_sent++;
//print_r(count($vendor_updated_data_rej_list1));
}
}
echo $num_sent; 
}
else
{
echo 0;
} ?></span>
											<span class="title">Customer Details rejected</span>
										</p>
									</div>
								</div>
<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye get_data_vendor_pending1"></i></span>
										<p>
											<span class="number"><?php 
//print_r(count($customer_pending_data));die();
if(isset($customer_pending_data)) 
{ 
echo count($customer_pending_data); 
}
else
{
echo 0;
} ?></span>
											<span class="title">Pending</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye get_data_vendor11"></i></span>
										<p>
											<span class="number"><?php 
if(isset($vendor_updated_data_list1)) 
{ 
$num_sent = 0;
//print_r($mail_recive_data);die();
for($i=0;$i<count($vendor_updated_data_list1);$i++)
{
if(count($vendor_updated_data_list1[$i]) > 0)
{
$num_sent++;
//print_r(count($vendor_updated_data_list1));
}
}
echo $num_sent; 
}
else
{
echo 0;
} ?></span>
											<span class="title">Customer Updated Details</span>
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
j("body").on('click','.get_data_vendor_mail1',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal_mail1").modal('show');
					});
					j("body").on('click','.get_data1',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal1").modal('show');
					});
j("body").on('click','.get_data_vendor_mail2',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal_mail2").modal('show');
					});
					j("body").on('click','.get_data2',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal2").modal('show');
					});
j("body").on('click','.get_data_vendor_mail3',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#standard_modal_mail3").modal('show');
					});
j("body").on('click','.get_data_vendor_pending1',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#customer_modal_pend1").modal('show');
					});
j("body").on('click','.get_data_vendor_pending11',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal_pend1").modal('show');
					});
					j("body").on('click','.get_data_vendor',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal1").modal('show');
					});
j("body").on('click','.get_data_vendor_1',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal11").modal('show');
					});
					j("body").on('click','.get_data_vendor1',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal2").modal('show');
					});
j("body").on('click','.get_data_vendor11',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal21").modal('show');
					});
					j("body").on('click','.get_data_vendor3',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal3").modal('show');
					});
j("body").on('click','.get_data_vendor31',function(){
							j("#get_head").text(j(this).attr('title'));
						 j("#vendor_modal31").modal('show');
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<script type='text/javascript' src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script type='text/javascript' src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js'></script>
<script>
$(document).ready(function() {
    $('#tableID').DataTable();
$('#tableID1').DataTable();
$('#tableID12').DataTable();
$('#tableID3').DataTable();
$('#tableID4').DataTable();
$('#tableID5').DataTable();
$('#tableID2').DataTable();
$('#tableID6').DataTable();
$('#tableID7').DataTable();
$('#tableID8').DataTable();
$('#tableID9').DataTable();
$('#tableID10').DataTable();
} );
</script>

			<!-- END MAIN CONTENT