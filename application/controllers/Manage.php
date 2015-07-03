<?php
class Manage extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Auth_model');
    }

    public function index()
    {
        print_r($this->Auth_model->test());
    }
}