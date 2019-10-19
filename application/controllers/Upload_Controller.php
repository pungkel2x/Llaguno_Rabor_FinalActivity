<?php

class Upload_Controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
            if($this->session->users["username"] ){
                $this->load->library('pagination');
                $config['base_url'] = base_url('index.php/upload_controller/index');
                $config['total_rows'] = 200;
                $config['per_page'] = 10;
                $this->pagination->initialize($config);
                
                $this->load->view('upload_form', array('error' => ' ' ));
                
            }
            else{
                redirect(base_url("index.php/login_controller/"));
            }
               
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if(is_file($config['upload_path'])){
                    chmod($config['upload_path'], 777); 
                }

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}
?>