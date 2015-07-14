<?php
class Api extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
    }

    function job($keyword,$content)
    {
        $keywordlist = array("pos","major","name");
        if (!in_array($keyword,$keywordlist) | (!isset($content))){
            show_404();
        }
        $this->output->set_content_type("application/json");
        echo json_encode($this->api_model->get_job_info($keyword,$content));
    }

    function meeting($page = 1)
    {
        if ($page <= 0)
            show_404();
        $this->output->set_content_type('application/json');
        echo json_encode($this->api_model->get_meeting_info($page));
    }

    function news($page = 1)
    {
        if ($page <= 0)
            show_404();
        $this->output->set_content_type('application/json');
        echo json_encode($this->api_model->get_news_info($page));
    }

    function guide($page = 1)
    {
        if ($page <= 0)
            show_404();
        $this->output->set_content_type('application/json');
        echo json_encode($this->api_model->get_guide_info($page));
    }
}