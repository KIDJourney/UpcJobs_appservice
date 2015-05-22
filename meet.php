<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 21:30:33
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-19 00:04:04
 */
require_once("lib/data_class.php");
define("TABLENAME","Meetings");

define("MEETING","active");
$job = new data_class('xuanjiang');
$data = $job->getinfo();
require_once("template/common/head.php");
require_once("template/common/data.php");
require_once("template/common/footer.php");