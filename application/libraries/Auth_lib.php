<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  Class for authentication
 *
 * */
class Auth_lib {
    private $ci ;

    function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->model('Auth_model');
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
        $real_passwd = $this->ci->Auth_model->get_passwd($username);
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
        $this->ci->session->set_userdata(array('username'=>$username));
    }

    /*
     * return the login status
     *
     * @param NULL
     * @return Boolean
     * */
    public function check_login()
    {
        return $this->ci->session->userdata('username') or false;
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
}