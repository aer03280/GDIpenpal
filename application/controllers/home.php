<?php
class Home extends CI_controller {
    public function index(){
        
        $data['main_view'] = "home_view";
        $this->load->view('layouts/main', $data);
    }
}