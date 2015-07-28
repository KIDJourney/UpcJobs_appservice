<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  Class for authentication
 *
 * */
class Auth_lib {
    private $ci ;
    private $session_name;
    private $load_model;
    function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->library('session');
    }

    function init_lib($model_load,$session_name)
    {
        $this->load_model = $model_load;
        $this->ci->load->model($model_load);
        $this->session_name = $session_name;
    }

    /*
     * check if the account in database and set session
     *
     * @param string string
     * @return boolean
     * */
    public function login($username , $passwd)
    {
        if ($this->check_login()){
            return true;
        }
        $load_model = $this->load_model;
        $real_passwd = $this->ci->$load_model->get_passwd($username);
        if ($real_passwd && $real_passwd == $passwd ){
            $this->set_session($username);
            return true;
        } else {
            return false;
        }
    }
    /*
     * set session function
     *
     * @param string
     * @return NULL
     * */
    private function set_session($username)
    {
        return $this->ci->session->set_userdata(array($this->session_name=>$username));
    }

    /*
     * return the login status
     *
     * @param NULL
     * @return Boolean
     * */
    public function check_login()
    {
        return $this->ci->session->userdata($this->session_name) or false;
    }

    public function get_username()
    {
        if (!$this->check_login()){
            return False;
        } else {
            return $this->ci->session->userdata($this->session_name);
        }
    }

    /*
     * destroy the session
     *
     * @param NULL
     * @return NULL
     * */
    public function logoff()
    {
        $this->ci->session->sess_destroy();
    }

    public function debug()
    {
        return $this->session_name;
    }
}