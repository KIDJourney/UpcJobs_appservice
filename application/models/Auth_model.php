<?php
class Auth_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function test()
    {
        return $this->db->get('news')->result();
    }
}