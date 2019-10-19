<?php 
class Login_Model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function authenticate($data){
        $result = $this->db->get_where('users',$data);
        return $result->num_rows();
    }
}

?>