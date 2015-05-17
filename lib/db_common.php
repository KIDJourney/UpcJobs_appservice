<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-08 11:51:57
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 17:12:23
 */
// require_once("db_info.php");

function sqliconnect(){
    $sqliworker = new mysqli(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
    return $sqliworker;
}

function getsqlstatus(){
    $worker = sqliconnect();
    $query = "SELECT 
                    (SELECT COUNT(*) FROM job_tb) as job_num,
                    (SELECT COUNT(*) FROM profession_information) as camp_num ,
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