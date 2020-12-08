<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	


	public function login(){
	
		$this->form_validation->set_rules('signinemail','Username','required');
		$this->form_validation->set_rules('signinpassword','Password','required');

		if($this->form_validation->run() === FALSE){
			redirect('auth/index');
		}else{

			$email = $this->input->post('signinemail');
			$password = $this->input->post('signinpassword');
			$info = $this->Model_Auth->login($email,$password);

			if($info){

				$id = $info['id'];
				$isActive = $info['is_active'];
				$mac = $info['mac'];
				$getMac = $this->getMac();

				if(($isActive != 0) AND ($mac == $getMac)){
					$user_data = array(
						'user_id' => $id,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login_successfull','Welcome Back.');
					redirect('pages/index');
				}else{
					$this->session->set_flashdata('not_active','You are not authorized.');
					redirect('pages/index');
				}
			}else{
				$this->session->set_flashdata('wrong','Combination of username and password is not correct.');
				redirect('pages/index');

			}
		}	
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect('pages/index');
	}

	public function register(){
		$mac = $this->getMac();

		$this->form_validation->set_rules('signupname', 'Signupname', 'trim|required');
		$this->form_validation->set_rules('registeremail', 'Registeremail', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == TRUE){
			$data = array(
	        		'name' => $this->input->post('signupname'),
	        		'email' => $this->input->post('registeremail'),
	        		'mobile' => $this->input->post('mobile'),
	        		'password' => $this->input->post('password'),
	        		'mac' => $mac
	        	);
			$add = $this->Model_Auth->addRequest($data);
			if($add){
				$this->session->set_flashdata('requested','Your Requestion to Join Family is now pending for admin approval!');
				redirect('pages/index');
			}else{
				$this->session->set_flashdata('requested_not_added','Failed! Try again Later or Contact admin.');
				redirect('pages/index');
			}
		}else{
			$this->session->set_flashdata('validation_loss','Form Validation Failed!');
			redirect('pages/index');
		}
	}

	public function getMac(){
		ob_start();
		system('ipconfig/all');
		$mycom=ob_get_contents();
		ob_clean();
		$findme = "Physical";
		$pmac = strpos($mycom,$findme);
		$mac = substr($mycom, ($pmac+36),17);
		return $mac;
	}

	public function pending(){
		if(!$this->session->userdata('logged_in') || !in_array('viewUser', $this->permission)){
			redirect('pages/index');
		}else{
			$data['pendings'] = $this->Model_Auth->getPendings();
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/pendings',$data);
			$this->load->view('templates/footer');
		}
	}

	public function viewAll(){
		if(!$this->session->userdata('logged_in') || !in_array('viewUser', $this->permission)){
			redirect('pages/index');
		}else{
			$data['users'] = $this->Model_Auth->getUsers();
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/viewAllUsers',$data);
			$this->load->view('templates/footer');
		}
	}

	public function addAsUser(){
		if(!$this->session->userdata('logged_in') || !in_array('createUser', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$add = $this->Model_Auth->addAsUser($id);
			if($add){
				$this->session->set_flashdata('request_approved','This request added as a user.!');
				redirect('auth/pending');
			}else{
				$this->session->set_flashdata('request_not_approved','This request not approved.!');
				redirect('auth/pending');
			}
		}
	}

	public function deleteRequest($id){
		if(!$this->session->userdata('logged_in') || !in_array('deleteUser', $this->permission)){
			redirect('pages/index');
		}else{
			$delete = $this->Model_Auth->deleteRequest($id);
			if($add){
				$this->session->set_flashdata('request_deleted','This request is Deleted.!');
				redirect('auth/pending');
			}else{
				$this->session->set_flashdata('request_not_deleted','This request is not Deleted.!');
				redirect('auth/pending');
			}
		}
	}

	public function setAsDeactive(){
		if(!$this->session->userdata('logged_in') || !in_array('createUser', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$add = $this->Model_Auth->setAsDeactive($id);
			if($add){
				$this->session->set_flashdata('user_deactivated','This user deactived.!');
				redirect('auth/viewAll');
			}else{
				$this->session->set_flashdata('user_not_deactivated','Operation Failed.!');
				redirect('auth/viewAll');
			}
		}
	}

	public function setAsActive(){
		if(!$this->session->userdata('logged_in') || !in_array('createUser', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$add = $this->Model_Auth->setAsActive($id);
			if($add){
				$this->session->set_flashdata('user_actived','This user Activated.!');
				redirect('auth/viewAll');
			}else{
				$this->session->set_flashdata('user_not_actived','Operation Failed.!');
				redirect('auth/viewAll');
			}
		}
	}

	public function resetPassword(){
		if(!$this->session->userdata('logged_in') || !in_array('createUser', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$add = $this->Model_Auth->resetPassword($id);
			if($add){
				$this->session->set_flashdata('password_reseted','Password Reseted. Default Password is 123456!');
				redirect('auth/viewAll');
			}else{
				$this->session->set_flashdata('password_not_reseted','Operation Failed.!');
				redirect('auth/viewAll');
			}
		}
	}

	public function update(){
		if(!$this->session->userdata('logged_in') || !in_array('updateUser', $this->permission)){
			redirect('pages/index');
		}else{
			$updated = $this->Model_Auth->updateProfile();
			if($updated){
				$this->session->set_flashdata('profile_updated','Profile Updated');
				redirect('pages/index');
			}else{
				$this->session->set_flashdata('profile_not_updated','Profile not Updated');
				redirect('pages/index');
			}
		}
	}

	function check_email_avalibility(){

       if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

            echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Invalid Email</span></label>';  
       }else{
             
            if($this->Model_Auth->is_email_available($_POST["email"])){

                 echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Email Already registered</label>'; 

            }else{

                 echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';  
            }  
       }  
    } 



}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */