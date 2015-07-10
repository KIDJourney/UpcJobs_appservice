<?php

class manageview_model extends  CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->driver('cache');
    }

    /*
     * return the count that overview need */
    function get_overview()
    {
        $overview_cache = $this->cache->memcached->get("overview");
        if ($overview_cache) {
            return $overview_cache;
        }
        $user_num = $this->db->count_all('user');
        $guide_num = $this->db->count_all('guide');
        $job_num = $this->db->count_all('job');
        $meeting_num = $this->db->count_all('meeting');
        $overview_data = array(   "user_num" => $user_num ,
            "guide_num" => $guide_num,
            "job_num"   => $job_num ,
            "meeting_num" => $meeting_num);
        $this->cache->memcached->save('overview',$overview_data,10*60);
        return $overview_data;
    }

    function get_userinfo()
    {
        $user_info = $this->db->get('user');
        return $user_info->result();
    }



}