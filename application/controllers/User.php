<?php
class User extends CI_Controller {    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');               
    }
    
    public function login()
    {
        if($this->session->userdata('login'))
        {
            redirect();
        }
        
        $this->form_validation->set_rules( 'user', 'Username', 'required' );
        $this->form_validation->set_rules( 'pass', 'Password', 'required|callback_ceklogin' );
                          
        if ($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'Login';
            load_view('login', $data);        
        }
        else
        {                                  
            redirect();
        }    
    }
           
    function ceklogin()
    {        
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $level = $this->input->post('level');
        
        $row = $this->db->query("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'")->row();
        
        if($row)
        {   
            
            $this->session->set_userdata('login', TRUE);
            $this->session->set_userdata('user', $row->user);
            $this->session->set_userdata('level', $level);
            
            //var_dump($this->session->userdata('login'));
            
            return true;
        } 
        else 
        {
            $this->form_validation->set_message('ceklogin', 'Login gagal');
            return false;
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect();
    }
    
    function password()
    {
        $this->form_validation->set_rules('pass1', 'Password Lama', 'required|callback_cek_pass');
        $this->form_validation->set_rules('pass2', 'Password Baru', 'required|matches[pass3]');
        $this->form_validation->set_rules('pass3', 'Konfirmasi Password Baru', 'required');
        
        if($this->form_validation->run() === false)
        {
            $data['title'] = 'Ubah Password';
            load_view('password', $data);           
        }
        else
        {
            $user = $this->session->userdata('user');
            $pass = $this->input->post('pass2');
            
            $data = array( 'pass' => $this->input->post('pass2') );
            $this->db->query("UPDATE tb_admin SET pass='$pass' WHERE user='$user'");
            $data['title'] = 'Password Berhasil Diubah';
            set_msg('Password berhasil diubah', 'success');
            redirect('user/password', $data);     
        }
    }
    
    public function cek_pass()
    {             
        $user = $this->session->userdata('user');
        $pass = $this->input->post('pass1');
        $row = $this->db->query("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'")->row();
        if(!$row)
        {
            $this->form_validation->set_message('cek_pass', '%s salah');
            return false;
        }
        return true;
    }
}