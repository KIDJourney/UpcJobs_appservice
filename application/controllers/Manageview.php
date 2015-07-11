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
            redirect("login");
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
        $data = $this->manageview_model->get_userinfo();
        $active_tag = array("user"=>true);
        $this->load->view("common/head",array('title'=>"Manage User"));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar',$active_tag);
        $this->load->view('manageview/data.php',array("data"=>$data,"tablename"=>"user"));
    }

    function manager()
    {
        $data = $this->manageview_model_get()->get_managerinfo();
        $active_tag = array("manager"=>true);
        $this->load->view("common/head",array('title'=>"Manage admin"));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar',$active_tag);
        $this->load->view('manageview/data.php',array("data"=>$data,"tablename"=>"Admin"));
    }

    function job()
    {
        $data = $this->manageview_model_get()->get_jobinfo();
        $active_tag = array("manager"=>true);
        $this->load->view("common/head",array('title'=>"Manage Jobs"));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar',$active_tag);
        $this->load->view('manageview/data.php',array("data"=>$data,"tablename"=>"Jobs"));

    }

    function meeting()
    {
        $data = $this->manageview_model_get()->get_meetinginfo();
        $active_tag = array("manager"=>true);
        $this->load->view("common/head",array('title'=>"Manage Meeting"));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar',$active_tag);
        $this->load->view('manageview/data.php',array("data"=>$data,"tablename"=>"Jobs"));
    }

    function guide()
    {
        echo "This is guide page";
    }

    function edit($type , $id)
    {
        echo "You are editing $type , with $id";
    }
    function debug()
    {
        $data = $this->manageview_model->get_userinfo();
        print_r($data);
    }

}