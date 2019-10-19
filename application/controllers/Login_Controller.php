<?php
class Login_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Login_Model", "lm");
    }

    public function index(){
        if(isset($this->session->users["username"] )){
            redirect(base_url("index.php/upload_controller/"));
        } 
        else {  
                $data['title'] = "LOGIN";
                $this->load->view("login_form", $data);
            
        }
    }

    public function login(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('password', 'Password', 'required',array('required' => 'You must provide a %s.'));
       
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();

        }else
        {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            "username" =>$username,
            "password" =>$password
        );

        $result = $this->lm->authenticate($data);
        
            if($result > 0){

                $this->session->users = array(
                    "username" => $username,
                );
                    redirect(base_url("index.php/upload_controller/"));
            }

            else{
                // echo "<script>alert('INVALID USERNAME OR PASSWORD !!');</script>";
                // redirect(base_url("index.php/login_controller/"));
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect(base_url("index.php/login_controller/"));

            }
        }
    }


    public function logout(){
        $this->session->sess_destroy("users");
        redirect(base_url("index.php/login_controller/"));
    }

}
?>