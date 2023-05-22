<?php
class User_model extends CI_Model {

    public function login($user, $pass)
    {
        $query = $this->db->get_where('tb_admin', array ( 'user' => $user, 'pass' => $pass ));   
        return $row = $query->row();                                      
    }
    
    public function cek_pass( $level, $user, $pass )
    {       
        return $this->db->get_where('tb_admin', array('user' => $user, 'pass' => $pass))->result();
    }
    
    public function update($data, $user)
    {
        $this->db->update( 'tb_admin', $data, array( 'user' => $user ) );                    
    }    
}