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
            $this->load->view('app/login',array('title'=>"登录"));
        } else {
            if ($this->auth_lib->login($this->input->post('username'),$this->input->post('password'))) {
                redirect("app/user");
            }
            else {
                $error = "Woops , there are something wrong with your input";
                $this->load->view('app/login',array('title'=>"登录"));
            }
        }
    }

    function detail($id)
    {
        $data = $this->app_model->get_job_with_id($id);
        if (!$data)
            show_404();
//        print_r($data);
        $this->load->view('app/detail',array('data'=>$data[0],'title'=>"详细信息"));
    }

    function index()
    {

        if ($this->auth_lib->check_login()){
            $this->load->view('app/index',array('username'=>$this->auth_lib->get_username(),'title'=>"首页"));
        }
        $this->load->view("app/index",array('title'=>"首页"));
    }

    function search()
    {
        $this->load->view("app/search",array('title'=>"职位搜索"));
    }

    function meeting()
    {
        $this->load->view('app/meeting',array('title'=>"校园宣讲"));
    }

    function info()
    {
        $this->load->view('app/info',array('title'=>"就业信息"));
    }

    function user()
    {

        if ($this->auth_lib->check_login()) {
            $this->load->view('app/user',array('title'=>"我的首页"));
        } else{
            redirect('app/login');
        }

    }

    function register()
    {
        $this->load->view('app/register',array('title'=>"注册"));
    }

    function about()
    {
        $this->load->view('app/about',array('title'=>"关于我们"));
    }

    function more()
    {
        $this->load->view('app/about',array('title'=>'更多内容'));
    }

    function debug()
    {
        print_r($this->session->userdata);
        echo $this->auth_lib->debug();
    }

}