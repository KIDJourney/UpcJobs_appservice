<?php
class App extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('Auth_lib');
        $this->auth_lib->init_lib('User_model','username');

        $this->load->model('app_model');
        $this->load->helper('url');
    }

    function login()
    {
        if ($this->auth_lib->check_login()){
            redirect('app/user');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('app/login');
        } else {
            if ($this->auth_lib->login($this->input->post('username'),$this->input->post('password'))) {
                redirect("app/user");
            }
            else {
                $error = "Woops , there are something wrong with your input";
                $this->load->view('app/login');
            }
        }
    }

    function detail($id)
    {
        $data = $this->app_model->get_job_with_id($id);
        if (!$data)
            show_404();
//        print_r($data);
        $this->load->view('app/detail',array('data'=>$data[0]));
    }

    function index()
    {

        if ($this->auth_lib->check_login()){
            $this->load->view('app/index',array('username'=>$this->auth_lib->get_username()));
        }
        $this->load->view("app/index");
    }

    function search()
    {
        $this->load->view("app/search");
    }

    function meeting()
    {
        $this->load->view('app/meeting');
    }

    function info()
    {
        $this->load->view('app/info');
    }

    function user()
    {

        if ($this->auth_lib->check_login()) {
            $this->load->view('app/user');
        } else{
            redirect('app/login');
        }

    }

    function register()
    {
        $this->load->view('app/register');
    }

    function about()
    {
        $this->load->view('app/about');
    }

    function more()
    {
        $this->load->view('app/about');
    }

    function debug()
    {
        print_r($this->session->userdata);
        echo $this->auth_lib->debug();
    }

}