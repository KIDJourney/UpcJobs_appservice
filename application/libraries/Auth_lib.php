<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_lib {
    private $ci ;

    function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->library('session');
        $this->ci->load->model('Auth_model');
    }

    function login($username , $passwd)
    {
        $real_passwd = $this->ci->Auth_model->get_passwd($username);
        if ($real_passwd && $real_passwd == $passwd ){
            $this->set_session($username);
            return "Yes";
        } else {
            return "Fuck you";
        }
    }

    private function set_session($username)
    {
        $this->ci->session->set_userdata(array('username'=>$username));
    }

}