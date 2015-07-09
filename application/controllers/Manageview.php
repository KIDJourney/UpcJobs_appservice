<?php
class Manageview extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('Auth_lib');
        $this->load->helper('url');
        $this->load->model('manageview_model');
        if (!$this->auth_lib->check_login()) {
            redirect("Manage/login");
        }
    }

    function index()
    {
        redirect("Manageview/overview");
    }

    function overview()
    {
        $overviewdata = $this->manageview_model->get_overview();
        $this->load->view('common/head',array('title'=>'Overview'));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar');
        $this->load->view('manageview/overview',$overviewdata);
        $this->load->view('common/footer');
    }

    function user()
    {

    }

    function manager()
    {

    }

    function news()
    {

    }

    function company()
    {

    }

    function debug()
    {
        $data = $this->manageview_model->get_overview();
        print_r($data);
    }

}