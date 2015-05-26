<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-06 11:38:55
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-26 23:38:30
 */
require_once("http_common.php");
require_once("db_common.php");

class index_class {

    public function statuscheck(){
        if (checksession()){
                require_once("template/common/head.php");
                require_once("template/main/overview.php");
                require_once("template/common/footer.php");
        } else {
            redirect("login.php");
        }
    }

    public function initcache(){
        if (isset($_SESSION['sql_cache'])){
            return ;
        } else {
            $_SESSION['sql_cache'] = $this->getsqlstatus();
        }
    }

    function getsqlstatus(){
        $worker = sqliconnect();
        $query = "SELECT 
                        (SELECT COUNT(*) FROM news) as new_num ,
                        (SELECT COUNT(*) FROM profession_information) as camp_num ,
                        (SELECT COUNT(*) FROM profession_news) as camp_new_num , 
                        (SELECT COUNT(*) FROM user) as user_num ,
                        (SELECT COUNT(*) FROM xuanjiang) as meet_num;";

        $row = array();
        $result = $worker->query($query);
        if ($result){
            $row = $result->fetch_assoc();
        }
        $worker->close();
        return $row;
    }
}