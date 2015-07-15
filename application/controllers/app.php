<?php
class App extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view("app/index");
    }

    function search()
    {
        $this->load->view("app/search");
    }

    function info()
    {
        $this->load->view('app/info');
    }

    function user()
    {
        $this->load->view('app/user');
    }

    function login()
    {
        $this->load->view('app/login');
    }

    function detail()
    {
        $this->load->view('app/detail');
    }

    function register()
    {
        $this->load->view('app/register');
    }

    function about()
    {
        $this->load->view('app/about');
    }
}