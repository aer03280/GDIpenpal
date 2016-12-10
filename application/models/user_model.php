<?php
class User_model extends CI_Model {
    
    public function get_users($userId, $username){
        
        $this->db->where([         
            
        'userId'   => $userId,
        'username' => $username    
            
        
        ]);
        
        $query = $this->db->get('user');
    return $query->result();
        
    }
    
    public function create_user(){
        
        $options = ['cost' => 12];
        
        $encritped_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
        
        $data = array(
        
        'firstName'    => $this->input->post('firstName'),
        'lastName'     => $this->input->post('lastName'),
        'email'         => $this->input->post('email'),
        'username'      => $this->input->post('username'),
        'password'      => $encritped_pass
        );
        
        $insert_data = $this->db->insert('user', $data);
        return $insert_data;
        
    }
    
    
    public function update_users($data, $userId){
        $this->db->where(['userId' => $userId]);
        $this->db->update('user', $data);
        
    }
    
    public function delete_users($userId){
        
        $this->db->where(['userId'=>$userId]);
        $this->db->delete('user');
    }
    
    public function login_user($username,$password){
        $this->db->where('username', $username);

        $result = $this->db->get('user');
        
        $db_password = $result->row(2)->password;
        
        if(password_verify($password, $db_password)){
           return $result->row(0)->userId; 
        }else {
            return false;
        }
    }
}