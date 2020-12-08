<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auth extends CI_Model {

	public function login($email,$password){

		$this->db->where('mobile',$email);
		$this->db->where('password',$password);
		$result = $this->db->get('users');

		if($result->num_rows() == 1){ 

			$data = array(
				'id' => $result->row(0)->id,
				'is_active' => $result->row(1)->is_active,
				'mac' => $result->row(2)->mac
			);
			return $data;
		}else{
			return false;
		}
	}

	public function addRequest($data){
		return $this->db->insert('requests',$data);
	}

	public function getPendings(){
		$query = $this->db->get('requests');
		return $query->result_array();
	}

	public function getUsers(){
		$sql = "SELECT * FROM users WHERE id <> ?";
		$query = $this->db->query($sql, array(1));	
		return $query->result_array();
	}

	public function addAsUser($id){
		$this->db->where('id',$id);
		$query = $this->db->get('requests');
		$get = $query->result_array();

		foreach($get as $data){
			$add = array(
				'name' => $data['name'],
				'email' => $data['email'],
				'mobile' => $data['mobile'],
				'password' => $data['password'],
				'is_active' => 1,
				'mac' => $data['mac']
			);
		}
		$this->db->insert('users',$add);
		$insertid = $this->db->insert_id();

		if($insertid != ""){
			$data = array(
				'user_id' => $insertid,
				'group_id' => 13
			);
			$result = $this->db->insert('user_group',$data);
			if($result){
				$sql = "DELETE FROM requests WHERE id = ?";
				return $this->db->query($sql, array($id));
			}
		}	
	}

	public function deleteRequest($id){
		$sql = "DELETE FROM requests WHERE id = ?";
		return $this->db->query($sql, array($id));
	}

	public function setAsDeactive($id){
		$data = array(
			'is_active' => 0
		);

		$this->db->where('id', $id);
		$update = $this->db->update('users',$data);
		return ($update == true) ? true : false;
	}

	public function setAsActive($id){
		$data = array(
			'is_active' => 1
		);

		$this->db->where('id', $id);
		$update = $this->db->update('users',$data);
		return ($update == true) ? true : false;
	}

	public function resetPassword($id){
		$data = array(
			'password' => '123456'
		);

		$this->db->where('id', $id);
		$update = $this->db->update('users',$data);
		return ($update == true) ? true : false;
	}

	function is_email_available($email){

       $this->db->where('email', $email);  
       $query = $this->db->get("users");  
       if($query->num_rows() > 0){  
            return true;  
       }else{  
            return false; 
       }  
  	}

  	public function updateProfile(){
  		$id = $this->input->post('id');
  		$data = array(
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'password' => $this->input->post('password')
		);
		$this->db->where('id', $id);
		$update = $this->db->update('users',$data);
		return ($update == true) ? true : false;
  	}













}

/* End of file Model_Auth.php */
/* Location: ./application/models/Model_Auth.php */