<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 23:31:57
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-18 23:48:31
 */
require_once("lib/data_class.php");

define("MANAGER","active");
$job = new data_class("manager");
$data = $job->getinfo();
require_once("template/common/head.php");
require_once("template/common/data.php");
require_once("template/common/footer.php");