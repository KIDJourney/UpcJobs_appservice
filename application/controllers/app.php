<?php
class App extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Auth_lib');
        $this->load->model('app_model');
        $this->auth_lib->init_lib('User_model','username');
    }

    function login()
    {
        if ($this->input->post()){

        }

        $this->load->view('app/login');
    }

    function detail($id)
    {
        $data = $this->app_model->get_job_with_id($id);
        if (!$data)
            show_404();
        $this->load->view('app/detail',array('data'=>$data[0]));
    }

    function index()
    {
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
        $this->load->view('app/user');
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
        $this->load->view('app/more');
    }

}