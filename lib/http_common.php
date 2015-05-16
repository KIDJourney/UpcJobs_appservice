<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-08 11:32:39
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-09 20:25:55
 */
session_start();

function redirect($url="./"){
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}

function checksession(){
    if (isset($_SESSION['user_info']['status']) and $_SESSION['user_info']['status'])
        return True;
}
