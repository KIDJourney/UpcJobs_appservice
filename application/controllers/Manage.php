<?php
class Manage extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->library('Auth_lib');
    }

    public function index()
    {
        echo "Fuck";
        print_r($this->Auth_model->get_passwd('KIDJourney'));
        print_r($this->auth_lib->login('KIDJourney','sb'));
    }
}