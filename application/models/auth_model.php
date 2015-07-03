<?php

class Auth_model extends  CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_passwd($username)
    {
        $result = $this->db->get_where('admin',
            array('admin_name'=>$username))->result();
        return $result?$result['0']->admin_passwd:array();
    }

}