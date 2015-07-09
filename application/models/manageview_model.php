<?php

class manageview_model extends  CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * return the count that overview need */
    function get_overview(){
        $user_num = $this->db->count_all('user');
        $guide_num = $this->db->count_all('guide');
        $job_num = $this->db->count_all('job');
        $meeting_num = $this->db->count_all('meeting');
        return array(   "user_num" => $user_num ,
                        "guide_num" => $guide_num,
                        "job_num"   => $job_num ,
                        "meeting_num" => $meeting_num);
    }
}