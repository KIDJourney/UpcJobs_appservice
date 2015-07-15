<?php
    class User_model extends  CI_Model{

        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function get_passwd($username)
        {
            $result = $this->db->get_where('user',
                array('user_name'=>$username))->result();
            return $result?$result['0']->user_passwd:array();
        }

    }