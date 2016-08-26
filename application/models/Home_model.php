<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home_model
 *
 * @author saurabh
 */
class Home_model  extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    public function signupUser() {
        $this->load->helper('string');
        $signup_details = $this->session->userdata('signup_details');
        $insert_data = array(
            'fname' => $signup_details['firstName'],
            'lname' => $signup_details['lastName'],
            'email' => $signup_details['email'],
            'mobile' => $signup_details['mobile'],
            'password' => md5($signup_details['password']),
            'added_on' => date('Y-m-d H:i:s', time()),
            'role'=>$signup_details['role']
        );
        
        $this->db->insert('users', $insert_data);
        $insert_data['Id'] = $this->db->insert_id();
        return $insert_data;
    }
    
    public function login($email,$password) {
        
        $sql = 'SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1';
       
        $query = $this->db->query($sql, array($email, md5($password)))->row_array();
      
        return $query;
        
    }
}
