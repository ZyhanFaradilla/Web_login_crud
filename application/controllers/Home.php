<?php
class Home extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index() 
    {
        $data['title'] = 'Home';                
        load_view('home', $data);        
    }
    
    public function tentang(){
        $data['title'] = 'Tentang Kami'; 
        load_view('tentang', $data);
    }
}