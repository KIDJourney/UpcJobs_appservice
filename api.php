<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-22 15:26:38
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-23 13:08:54
 */
require_once("lib/db_common.php");
require_once("lib/api_class.php");
header('Content-type: application/json');

$job = new api_class();
$job->judge();