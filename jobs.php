<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 21:30:33
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-26 23:35:45
 */
require_once("lib/data_class.php");
define("TABLENAME","Jobs");

define("JOBS","active");
$job = new data_class("profession_information");
$data = $job->getinfo();
require_once("template/common/head.php");
require_once("template/common/data.php");
require_once("template/common/footer.php");