<?php

class Add_Family extends CI_Controller
{
	function __Construct()
	{
		parent::__construct();
		$this->load->model('common_model');
	}


	function index()
	{
		$data['family_details']=$this->common_model->get_all_data('add_family');
		if(isset($data['family_details']) && count($data['family_details'])>0){
			for ($i=0; $i < count($data['family_details']); $i++) { 
				$head_id[$i]=$data['family_details'][$i]['customer_id'] ;
			}
		
		
		foreach ($head_id as &$value){
		    $value = "'" . trim($value)."'";
		}
        $head_id= implode(', ',$head_id);
        $data['user_details']=$this->common_model->multiple_fetch_data('customer',$head_id);
        }
     	//	echo "<pre>"; print_r($data['user_details']);die();
		else{
			$data['user_details'] = $this->common_model->get_all_data('customer');
		}
		$data['state_list'] = $this->common_model->get_all_data_distinct('state_city','state');
		$data['family_details']=$this->common_model->get_all_data('add_family');
		
		$this->load->view('header');
		$this->load->view('family_view',$data);
		$this->load->view('footer');
	}

	function add_family_member($id)
	{
		// $view_flg=$_POST['view_flag'];
		// echo $view_flg;die();
		//setvalue('view','1');
		$table_name = 'customer';
		$where = 'where customer_id = ?';
		$data['user_member_details'] = $this->common_model->fetch_data('add_family',$where,$id);
		if(isset($data['user_member_details']) && count($data['user_member_details'])>0){
		$myString = $data['user_member_details']['0']['member_id'] ;
	    $myArray = explode('^', $myString);
        array_push($myArray, $id);
        foreach ($myArray as &$value){
		    $value = "'" . trim($value)."'";
		}
        $myArray= implode(', ',$myArray);
     	}
     	else{
     		$myArray="'" . trim($id)."'";
		   }
     
     	
		$data['family_details']=$this->common_model->get_all_data('add_family');
		$where = 'where cust_id = ?';
	    $data['uniq_user_details'] = $this->common_model->fetch_data('customer',$where,$id);
		$list = $myArray;
		$data['user_details']=$this->common_model->multiple_fetch_data('customer',$list);
		$this->load->view('header');
		$this->load->view('family_view',$data);
		$this->load->view('footer');

	}




	function add_family_members()
	{
		for($i=0;$i<count($_POST['selected_value']);$i++){
			$table_name='customer';
			$where = 'where cust_id = ?';
			$data['add_member'][$i]=$this->common_model->fetch_data('customer',$where,$_POST['selected_value'][$i]);
		}
		$members=$data['add_member'];
		$array=$_POST['selected_value'];
		$arr =$_POST['selected_value'];
        $family_member= implode("^",$arr);
        $names = array_map(function($v){return $v[0]['name'];}, $members);
        $names=implode('^', $names);
       	$data['data']= array(
			'head_name' => $_POST['head_name'],
			'head_id' => $_POST['cust_id'],
			'mem_name' => $names,
			'member_id' => $family_member
			
		);
		
		$table_name = 'add_family';
		$field_list = '(Head_name,customer_id,family_member_name,member_id)';
		$qry = '(?,?,?,?)';
		$data['user_member_details'] = $this->common_model->save_data_record($table_name,$field_list,$qry,$data['data']);
		echo "Family Added";
		
	}

	function delete($id)
	{
		$table_name = 'add_family';
		$data = $id;
		$this->common_model->delt_data_record($table_name,$data,'customer_id');
		redirect('index.php/Add_Family');
	}
	function edit($id){
		//echo $id;die();
		$table_name = 'customer';
		$where = 'where customer_id = ?';
		$data['user_member_details'] = $this->common_model->fetch_data('add_family',$where,$id);
		if(isset($data['user_member_details']) && count($data['user_member_details'])>0){
		$myString = $data['user_member_details']['0']['member_id'] ;
	    $myArray = explode('^', $myString);
        array_push($myArray, $id);
        foreach ($myArray as &$value){
		    $value = "'" . trim($value)."'";
		}
        $myArray= implode(', ',$myArray);
     	}
     	else{
     		$myArray="'" . trim($id)."'";
		   }
     
     	
		$data['family_details']=$this->common_model->get_all_data('add_family');
		$where = 'where cust_id = ?';
	    $data['uniq_user_details'] = $this->common_model->fetch_data('customer',$where,$id);
	    //print_r($data['uniq_user_details']);die();
		$list = $myArray;
		$data['user_details']=$this->common_model->multiple_fetch_data('customer',$list);
		$this->load->view('header');
		$this->load->view('family_view',$data);
		$this->load->view('footer');
	}
	function del_member(){
		$head_id=$_POST['head_id'];
		$member_id=$_POST['mem_id'];
		$where = 'where customer_id = ?';
		$data = $this->common_model->fetch_data('add_family',$where,$head_id);
		$member_list=$data['0']['member_id'];
		$member_list=explode('^', $member_list);
		// $member_name_list=$data['0']['family_member_name'];
		// $member_name_list=explode('^', $member_name_list);
		$updated_list = '';
		$updated_list1='';
		for ($i=0; $i < count($member_list); $i++) { 
			if ($member_list[$i] != $member_id) {
				if ($updated_list == '') {
					$updated_list = $member_list[$i];
				}
				else
				{
					$updated_list = $updated_list."^".$member_list[$i];
				}
			}
			
		}

		// $member_name_list=$data['0']['family_member_name'];
		// $member_name_list=explode('^', $member_name_list);

		// $updated_list1 = '';
		// for ($i=0; $i < count($member_name_list); $i++) { 
		// 	if ($member_list[$i] != $member_id) {
		// 		if ($updated_list == '') {
		// 			$updated_list = $member_list[$i];
		// 		}
		// 		else
		// 		{
		// 			$updated_list = $updated_list."^".$member_list[$i];
		// 		}
		// 	}
			
		// }
		
		print_r($updated_list);die();
		
	}
}?>