<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        if (($this->session->userdata('user_login') != '')):
            $data['product'] = $this->home_model->getproducts();
            $this->__display('dashboard',$data);
        else:
            $this->__display('home', '');
        endif;
    }

    public function logout() {
        $this->session->unset_userdata('user_login');
        redirect(base_url(), 'refresh');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            $user_info = $this->home_model->login($email, $password);
            $this->session->set_userdata('user_login', $user_info);
            redirect(base_url(), 'refresh');
        } else {
            $this->session->set_flashdata('login_message', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(base_url(), 'refresh');
        }
    }

    private function __display($view_name, $data) {
        $this->load->view('includes/header');
        $this->load->view($view_name, $data);
        $this->load->view('includes/footer');
    }

    public function signup() {
        $this->__display('signup', '');
    }

    public function verifyUser() {
      if (isset($_FILES))
            $image = $this->upload_image('./uploads/users');
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
            $signup_data = $this->home_model->signupUser($image['orig_name']);
            redirect(base_url(), 'refresh');
        } else {
            $this->session->set_flashdata('signup_message', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect('/home/signup', 'refresh');
        }
    }

    public function product() {
        $data['product'] = $this->home_model->getproducts();
        $this->__display('product', $data);
    }

    public function addproduct() {
        $this->__display('addproduct', '');
    }

    public function insertproduct() {

        if (isset($_FILES))
            $image = $this->upload_image('./uploads/products');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
        $this->form_validation->set_rules('sku', 'Enter SKU', 'trim|required|numeric');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'numeric|is_natural_no_zero');
        $this->form_validation->set_rules('course_type', 'Course Type', 'numeric|is_natural_no_zero');
        $this->form_validation->set_rules('serve_time', 'Serve Time', 'numeric|is_natural_no_zero');
        if ($this->form_validation->run()) {
            $prouct = $this->home_model->insertproduct($image['orig_name']);
            redirect(base_url() . 'home/product', 'refresh');
        } else {
            $this->session->set_flashdata('add_product', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(base_url() . 'home/addproduct', 'refresh');
        }
    }

    public function users() {
        if (($this->session->userdata('user_login') != '')):
            $data['users'] = $this->home_model->getusers();
            $this->__display('users', $data);
        endif;
    }

    public function orders() {
        if (($this->session->userdata('user_login') != '')):
            $data['orders'] = $this->home_model->getorders();
            $this->__display('orders', $data);
        else:
            redirect(base_url(), 'refresh');
        endif;
    }

    private function upload_image($path) {
        $config_arr = array(
            'upload_path' =>$path,
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '2048',
            'max_width' => '1024',
            'max_height' => '768'
        );
        $this->load->library('upload', $config_arr);
        if ($this->upload->do_upload()) {
            return $this->upload->data();
        } else {
            return $this->upload->display_errors();
        }
    }
    
    public function product_details($product_id) {
        $data['product'] = $this->home_model->getproductid($product_id);
        $this->__display('product_details',$data);
    }

}
