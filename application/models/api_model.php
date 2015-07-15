<?php
class Api_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_job_info($type,$content)
    {
        $table_map = array( "pos"=>"job_position",
                            "major"=>"job_major",
                            "name"=>"job_name");
        if (!in_array($type,array_keys($table_map))){
            return false;
        }

        $this->db->like($table_map[$type],urldecode($content));
        return $this->db->get('job')->result();
    }

    function get_meeting_info($range)
    {
        return $this->db->get('meeting',$range*10 , ($range-1)*10)->result();
    }

    function get_guide_info($range)
    {
        return $this->db->get('guide',$range*10 , ($range-1)*10)->result();
    }

    function get_news_info($range)
    {
        return $this->db->get('news',$range*10 , ($range-1)*10)->result();
    }

}