<?php
class Manage extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->library('Auth_lib');
        $this->load->helper('url');
    }

    public function index()
    {
        if (!$this->auth_lib->check_login()){
            redirect('Manage/login');
        }
        echo "This is index";

    }

    public function login()
    {
        if ($this->auth_lib->check_login()){
            redirect('Manage');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = "Admin Login";
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('passwd','Password','required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('common/head',$data);
            $this->load->view('manage/login');
            $this->load->view('common/footer');
        } else {
            if ($this->auth_lib->login($this->input->post('username'),$this->input->post('passwd')))
                redirect("manage");
            else {
                $data['login_failed'] = true;
                $this->load->view('common/head',$data);
                $this->load->view('manage/login',$data);
                $this->load->view('common/footer');
            }
        }
    }


    public function debug()
    {
        echo "Debuging" . "<br>";
        print_r($this->session->userdata('username'));
    }

    public function logoff()
    {
        $this->auth_lib->logoff();
        echo "Logoff success";
    }
}