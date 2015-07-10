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
        $overview_data = $this->manageview_model->get_overview();
        $active_tag = array("overview" =>true);
        $this->load->view('common/head',array('title'=>'Overview'));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar',$active_tag);
        $this->load->view('manageview/overview',$overview_data);
        $this->load->view('common/footer');
    }

    function user()
    {
        $user_data = $this->manageview_model->get_userinfo();
        $active_tag = array("user"=>true);
        $this->load->view("common/head",array('title'=>"Manage User"));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar',$active_tag);
        $this->load->view('manageview/data.php',array("data"=>$user_data,"tablename"=>"user"));
    }

    function manager()
    {
        echo "This is manage page";
    }

    function job()
    {
        echo "This is job page";
    }

    function meeting()
    {
        echo "This is meeting page";
    }

    function guide()
    {
        echo "This is guide page";
    }

    function edit($type , $id)
    {

    }
    function debug()
    {
        $data = $this->manageview_model->get_userinfo();
        print_r($data);
    }

}