<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 21:30:33
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-18 23:53:03
 */
require_once("lib/data_class.php");
define("HIRING","active");
$job = new data_class("profession_news");
$data = $job->getinfo();
require_once("template/common/head.php");
require_once("template/common/data.php");
require_once("template/common/footer.php");