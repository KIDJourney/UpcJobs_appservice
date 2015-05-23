<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-22 15:26:59
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-23 21:49:33
 */
require_once("lib/db_common.php");
class api_class {
    private $sqlworker;
                                
    public function __construct(){
        if (!isset($_GET['type']))
            die("No direct access right");
        $this->sqlworker = sqliconnect();
    }

    public function  judge(){
        $request_type = $_GET['type'];
        if ($request_type == "job"){
            $this->get_job();
            die();
        }
        if ($request_type == "meeting"){
            $this->get_meeting();
            die();
        }
        if ($request_type == "guide"){
            $this->get_guide();
            die();
        }
        if ($request_type == "login"){
            $this->user_login();
            die();
        }
        if ($request_type == "collect"){
            $this->collect();
            die();
        }
        if ($request_type == "getcollect"){
            $this->get_collect();
            die();
        }
    }

    public function collect(){
        //type=collect&keyword=(job|meet|guide)&user=userid&goal=(jobid|meetid|guideid)
        if (isset($_GET['keyword']) and isset($_GET['user']) and isset($_GET['goal'])){
        }else{
            die("No direct access right");
        }

        $keyword = mysql_escape_string(trim($_GET['keyword']));
        $user = mysql_escape_string(trim($_GET['user']));
        $goal = mysql_escape_string(trim($_GET['goal']));
        

        if ($keyword == "job"){
            if($this->sqlworker->query("INSERT INTO collect_job (u_id,job_id) VALUES($user,$goal)")){
                print(json_encode(array("status"=>1)));
            } else {
                print(json_encode(array("status"=>0)));
            }
        }
        if ($keyword =="meet"){
           if($this->sqlworker->query("INSERT INTO collect_meet (u_id,meet_id) VALUES($user,$goal)")){
                print(json_encode(array("status"=>1)));
            } else {
                print(json_encode(array("status"=>0)));
            }
        }
        if ($keyword == "guide"){
           if($this->sqlworker->query("INSERT INTO collect_guide (u_id,guide_id) VALUES($user,$goal)")){
                print(json_encode(array("status"=>1)));
            } else {
                print(json_encode(array("status"=>0)));
            }
        }
    }


    public function get_collect(){
        // upcexample.sinaapp.com/api.php?type=getcollect&keyword=(job|meet|guide)&user=1
        if (isset($_GET['user'])and isset($_GET['keyword'])){
        } else {
            die("No direct access right");
        }
        $user = mysql_escape_string($_GET['user']);
        $keyword = trim($_GET['keyword']);
        if ($keyword == "job"){
            $query = "SELECT * FROM profession_information WHERE jobID IN (SELECT job_id FROM collect_job WHERE u_id='$user')";
            $res = $this->sqlworker->query($query);
            $result = array();
            while ($row = $res->fetch_assoc()){
                $result[] = $row;
            }
            $result = json_encode($result);
            $result = $this->parse($result);
            print($result);
        }
        if ($keyword =="guide"){
            $query = "SELECT * FROM profession_news WHERE newsID IN (SELECT guide_id FROM collect_guide WHERE u_id='$user')";
            $res = $this->sqlworker->query($query);
            $result = array();
            while ($row = $res->fetch_assoc()){
                $result[] = $row;
            }
            $result = json_encode($result);
            $result = $this->parse($result);
            print($result);    
        }
        if ($keyword =="meet"){
            $query = "SELECT * FROM xuanjiang WHERE TitleID IN (SELECT meet_id FROM collect_meet WHERE u_id='$user')";
            $res = $this->sqlworker->query($query);
            $result = array();
            while ($row = $res->fetch_assoc()){
                $result[] = $row;
            }
            $result = json_encode($result);
            $result = $this->parse($result);
            print($result);  
        }
    }

    public function user_login(){
        if (isset($_POST['username']) and isset($_POST['password'])){
        } else {
            die("No direct access Right");
        }

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $data['user'] = $this->db_search($username);
        if ($data['user']['pwd'] == $password){
            $data['status'] = 1;
            unset($data['user']['pwd']);
        } else {
            $data['status'] = 0;
            unset($data['user']);
        }
        $data = json_encode($data);
        print($data);
    }

    public function get_guide(){
        if (isset($_GET['content'])){
            $content = mysql_escape_string($_GET['content']);
        } else {
            $content = 10;
        }
        $res = $this->sqlworker->query("SELECT * FROM  `profession_news` order by publish_time LIMIT 0 , $content");
        while ($row = $res->fetch_assoc()){
            $result[] = $row;
        }
        $result = json_encode($result);
        $result = $this->parse($result);
        print($result);
    }
    public function get_meeting(){
        if (isset($_GET['content'])){
            $content = mysql_escape_string($_GET['content']);
        } else {
            $content = date('Y-m-d');
        }
        $res = $this->sqlworker->query("SELECT * FROM xuanjiang WHERE time < '$content'");
        while ($row = $res->fetch_assoc()){
            $result[] = $row;
        }
        $result = json_encode($result);
        $result = $this->parse($result);
        print($result);
    }


    public function get_job(){
        if (isset($_GET['keyword']) and isset($_GET['content'])){
        } else {
            die("No direct access right");
        }
        $key_word = mysql_escape_string($_GET['keyword']);
        $content = mysql_escape_string($_GET['content']);
        if ($key_word == "pos"){
            $res = $this->sqlworker->query("SELECT * FROM profession_information
                                            WHERE address like '%$content%'");
            $reslut = array();
            while ($row = $res->fetch_assoc()){
                $result[] = $row;
            }
            $result = json_encode($result);
            $result = $this->parse($result);
            print($result);
        }
        if ($key_word == "major"){
            $res = $this->sqlworker->query("SELECT * FROM profession_information
                                            WHERE job_description like '%$content%'");
            $reslut = array();
            while ($row = $res->fetch_assoc()){
                $result[] = $row;
            }
            $result = json_encode($result);
            $result = $this->parse($result);
            print($result);
        }
        if ($key_word == "date"){
            $res = $this->sqlworker->query("SELECT * FROM profession_information
                                            WHERE publish_time = '$content'");
            $result = array();
            while ($row = $res->fetch_assoc()){
                $result[] = $row;
            }
            $result = json_encode($result);
            $result = $this->parse($result);
            print($result);
        }
        if ($key_word == "jobid"){
            $res = $this->sqlworker->query("SELECT * FROM profession_information
                                            WHERE jobID = '$content'");
            $result = array();
            while ($row = $res->fetch_assoc()){
                $result[] = $row;
            }
            $result = json_encode($result);
            $result = $this->parse($result);
            print($result);
        }
    }

    public function parse($text) {
        $text = str_replace("\r\n", "\n", $text);
        $text = str_replace("\r", "\n", $text);
        $text = str_replace("\n", "\\n", $text);
        if ($text == "null"){
            return "[]";
        }
        return $text;
    }

    public function db_search($mail){
        $mail = trim($mail);

        if ($p_query=$this->sqlworker->prepare("SELECT * FROM user WHERE username=?")){
            $p_query->bind_param("s",$mail);
            $p_query->execute();

            $meta = $p_query->result_metadata();
            $temp = array();
            $tempResult = array();
            while($field = $meta->fetch_field()){
                $temp[] = &$tempResult[$field->name];
            }

            call_user_func_array(array($p_query,"bind_result"),$temp);
            $p_query->fetch();
            $result = $tempResult;
            $p_query->close();

            return $result;
        }
    }

}