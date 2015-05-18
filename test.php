<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 16:50:01
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 21:49:21
 */
require_once("lib/db_common.php");
require_once("lib/http_common.php");

print_r($_SESSION);
print_r($_COOKIE);
echo "<br>";
$num = isset($_GET['num'])?$_GET['num']:0;
echo $num * 100;