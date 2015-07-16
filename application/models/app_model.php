<?php
    class App_model extends CI_Model{

        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        function get_job_with_id($id){
            return $this->db->get_where('job',array('id'=>$id))->result();
        }

    }