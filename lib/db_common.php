<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-08 11:51:57
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 23:26:38
 */
// require_once("db_info.php");

function sqliconnect(){
    $sqliworker = new mysqli(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
    return $sqliworker;
}