<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller {
	public function index()
	{
		if(empty(check_token_cookies()))
			$this->load->view('auth/login');
		else
			redirect(base_url().'admin');
	}
	public function login()
	{
		if(empty($this->input->post('email')) && empty($this->input->post('password'))){
			redirect(base_url());
		}else{
			 $user = $this->User_Model->get_user_by_email($this->input->post('email'));
			 if(!empty($user)){
				 if($user->password === hash('sha256',$this->input->post('password'))){
					 $token_cookie = generate_access_token($user);
					 set_cookie('sig',$token_cookie['signature'],50000);
					 set_cookie('at',$token_cookie['payload'],50000);
					 redirect(base_url().'admin');
				 }else{
					$this->session->set_flashdata('auth_error','Wrong Password');
				 	redirect(base_url());
				 }
			 }else{
				 $this->session->set_flashdata('auth_error','There is no user with this email');
				 redirect(base_url());
			 }
		}
	}
	public function logout(){
		delete_cookie('sig');
		delete_cookie('at');
		redirect(base_url());
	}
}
