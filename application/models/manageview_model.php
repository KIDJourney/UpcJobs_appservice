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

    function get_info_with_type($type)
    {
        $data_info = $this->db->get($type);
        return $data_info->result();
    }

    function get_type_with_id($type , $id)
    {
        $data = $this->db->get_where($type,array("id"=>$id));
        return $data->result();
    }

    function update_type_with_id($type,$id,$data)
    {
        $this->db->where('id',$id);
        $result = $this->db->update($type , $data);
        return $result;
    }

    function delete_with_type_id($type,$id)
    {
        return $this->db->delete($type,array('id'=>$id));
    }

    function get_field_metadata($type)
    {
        $fielddata = $this->db->field_data($type);
        return $fielddata;
    }

    function add_type($type,$data)
    {
        return $this->db->insert($type,$data);
    }
}