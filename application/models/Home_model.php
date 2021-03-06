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
    public function signupUser($image) {
        $signup_details = $this->session->userdata('signup_details');
        $insert_data = array(
            'fname' => $signup_details['firstName'],
            'lname' => $signup_details['lastName'],
            'email' => $signup_details['email'],
            'mobile' => $signup_details['mobile'],
            'password' => md5($signup_details['password']),
            'added_on' => date('Y-m-d H:i:s', time()),
            'role'=>$signup_details['role'],
            'image'=>$image
        );
        $this->db->insert('users', $insert_data);
      
    }
    
    public function login($email,$password) {
        
        $sql = 'SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1';
       
        $query = $this->db->query($sql, array($email, md5($password)))->row_array();
      
        return $query;
        
    }
    
    public function insertproduct($image){
      
        $insert_product = array(
            'name' => $this->input->post('name',TRUE),
            'sku' => $this->input->post('sku',TRUE),
            'description' => $this->input->post('description',TRUE),
            'price' =>$this->input->post('price',TRUE),
            'course_type' =>$this->input->post('course_type',TRUE),
            'serve_time' => $this->input->post('serve_time',TRUE),
            'image'=>$image
        );
        
        $this->db->insert('product', $insert_product);
    }
    
    public function getproducts(){
        
        $products = $this->db->get('product')->result_array();
        
        return $products;
    }
    
    public function getusers(){
          $users = $this->db->get('users')->result_array();
        
        return $users;
    }
    public function getorders(){
          $orders = $this->db->get('orders')->result_array();
        
        return $orders;
    }
    public function getproductid($id) {
        
        $sql ='SELECT p.id,p.name,p.sku,p.description,p.price,p.quantity,p.image,c.name as course_type,s.name as serve_type from product as p left join course_type as c on p.course_type = c.c_id left join serve_type as s on s.s_id =p.serve_time where p.id = ?';
        $products = $this->db->query($sql,$id)->row_array();
        return $products;
    }
}
