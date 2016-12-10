<?php
class Users extends CI_controller{
    
    public function register(){
        $this->form_validation->set_rules('firstName','First Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('lastName','Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email','Email', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username','Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password','Confirm Password', 'trim|required|min_length[3]|matches[password]');
        
        if($this->form_validation->run() == FALSE){
        
        $data['main_view'] = "users/register_view";
        $this->load->view('layouts/main',$data);
            
        } else {
            
            if($this->user_model->create_user()){
            
            $this->session->set_flashdata('user_registered', 'User has been registered');    
                
            redirect('home/index');
            
            } else {
                
                
            }
        
        }
        
    }
    
    
    public function login(){
        
        $this->form_validation->set_rules('username','Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password','Confirm Password', 'trim|required|min_length[3]|matches[password]');
        
        if($this->form_validation->run() == FALSE){
            $data = array(
            
                'errors'=> validation_errors()
            
            );
            
        $this->session->set_flashdata($data);
            
        redirect('home');    
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $userId = $this->user_model->login_user($username,$password);
            
            if($userId){
                $user_data = array(
                    'userId' => $userId,
                    'username' => $username,    
                    'logged_in' => true,
                );
            $this->session->set_userdata($user_data);
            
            $this->session->set_flashdata('login_success', 'You are now logged in');
                
                $data['main_view'] = "users/posts";
                $this->load->view('layouts/main', $data);
                //redirect('home/index');
            } else {
                $this->session->set_flashdata('login_failed', 'Sorry you are not logged in');
                redirect('home/index');
            }
            
        }
        
        //$this->input->post('username');
    }
    
    public function logout (){
        $this->session->sess_destroy();
        redirect('home/index');
    }
    
    
}