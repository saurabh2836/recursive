<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        public function index()
        {
            if(($this->session->userdata('user_login') !='')):
                $this->__display('dashboard','');
            else:
                $this->__display('home','');
            endif;
                
        }
        
        public function logout(){
            $this->session->unset_userdata('user_login');
            redirect(base_url(),'refresh');
        }
        
        public function login(){
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            if ($this->form_validation->run()) {
              $email = $this->input->post('email',TRUE);
              $password = $this->input->post('password',TRUE);
              $user_info =  $this->home_model->login($email,$password);
              $this->session->set_userdata('user_login',$user_info);
                redirect(base_url(), 'refresh');
            }else {
                $this->session->set_flashdata('login_message', validation_errors('<p class="alert alert-danger">', '</p>'));
                redirect(base_url(), 'refresh');
            }
        }
        
        private function __display($view_name,$data){
            $this->load->view('includes/header');
            $this->load->view($view_name,$data);
            $this->load->view('includes/footer');
        }
        public function signup() 
        {
            $this->__display('signup','');
        }
        
          public function verifyUser() {
             
        $email_original = $this->session->userdata('email');
        $email_post = $this->input->post('email');
        $mobile_original = $this->session->userdata('mobile');
        $mobile_post = $this->input->post('mobile');
        $this->form_validation->set_rules('firstName', 'First Name', 'trim|required|alpha');
       $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|alpha');
        $is_unique = ($email_original == $email_post) ? '' : '|is_unique[users.email]';
        $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email' . $is_unique);
        $is_unique = ($mobile_original == $mobile_post) ? '' : '|is_unique[users.mobile]';
        $this->form_validation->set_message('is_unique', '{field} already exists.Please login.');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]' . $is_unique);
        $this->form_validation->set_rules('password', 'Passsword', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->session->set_userdata('signup_details', $_POST);
        if ($this->form_validation->run()) {
            $signup_data = $this->home_model->signupUser();
            redirect(base_url(),'refresh');
        } else {
            $this->session->set_flashdata('signup_message', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect('/home/signup','refresh');

        }
    }
    
    
    public function product(){
        $this->__display('product','');
    }
    
    public function addproduct(){
        $this->__display('addproduct', '');
        
    }
}
