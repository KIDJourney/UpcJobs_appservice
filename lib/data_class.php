<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 21:30:45
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-18 23:44:49
 */
    require_once("db_common.php");
    require_once("http_common.php");

    class data_class {

        private $mysqliworker;
        private $page;
        private $db_name;
        public function __construct($db_name)
        {
            if (checksession()){                
            }else{
                redirect();
            }
            $this->db_name = $db_name;
            $this->mysqliworker = sqliconnect();

            // if (isset($_GET['method']) and $_GET['method']=='del' and isset($_GET['uid'])){
            //     $this->delrow($_GET['uid']);
            //     die();
            // }
        }

        public function getinfo(){
            $res = $this->mysqliworker->query("SELECT * FROM " . $this->db_name . ";");
            $result = array();
            while ($row=$res->fetch_assoc()){
                $result[] = $row;
            }
            return $result;
        }

        public function delrow($usernameID){
            if ($reslut = $this->mysqliworker->query("DELETE FROM user where usernameID=" . $usernameID)){
                redirect("user.php");
            } else {
                die("Delete failed ! " . $this->mysqliworker->error);
            }
        }
            
}