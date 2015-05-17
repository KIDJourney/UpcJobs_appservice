<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 21:30:45
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 23:36:51
 */
    require_once("db_common.php");
    require_once("http_common.php");

    class user_class {

        private $mysqliworker;
        private $page;

        public function __construct()
        {
            if (checksession()){                
            }else{
                redirect();
            }

            $this->mysqliworker = sqliconnect();

            if (isset($_GET['method']) and $_GET['method']=='del' and isset($_GET['uid'])){
                $this->delrow($_GET['uid']);
                die();
            }
        }

        public function getuserinfo(){
            $res = $this->mysqliworker->query("SELECT * FROM user;");
            $result = array();
            while ($row=$res->fetch_assoc()){
                unset($row['pwd']);
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