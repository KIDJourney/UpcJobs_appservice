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
        $this->_load_view_with_type('user');
    }

    function admin()
    {
        $this->_load_view_with_type('admin');
    }

    function job()
    {
        $this->_load_view_with_type('job');
    }

    function meeting()
    {
        $this->_load_view_with_type('meeting');
    }

    function guide()
    {
        $this->_load_view_with_type('guide');
    }

    function edit($type , $id)
    {
        $type_list = array("job","guide","meeting","user","admin");
        $error = false;
        if (!in_array($type,$type_list))
            show_404();
        $data = $this->manageview_model->get_type_with_id($type,$id);
        if ($this->input->post()){
            $post_data = array();
            foreach ($data as $subdata)
                foreach ($subdata as $keys => $value)
                    $post_data[$keys] = $this->input->post($keys);
            unset($post_data['id']);
//            print_r($post_data);
//            return;
            if ($this->manageview_model->update_type_with_id($type,$id,$post_data)){
                redirect("Manageview/".$type);
            } else {
                $error = true;
            }
        }

        $this->load->view("common/head",array('title'=>"Editing $type"));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/edit',array("type"=>$type,"data"=>$data,"error"=>$error));

    }

    function _load_view_with_type($type)
    {
        $data = $this->manageview_model->get_info_with_type($type);
        $active_tag = array($type=>true);
        $this->load->view("common/head",array('title'=>"Manage $type"));
        $this->load->view('manageview/topbar',array('username'=>$this->auth_lib->get_username()));
        $this->load->view('manageview/sidebar',$active_tag);
        $this->load->view('manageview/data.php',array("data"=>$data,"tablename"=>"$type","edit_type" =>"$type"));
    }

    function debug()
    {
        $data = $this->manageview_model->get_userinfo();
        print_r($data);
    }

}