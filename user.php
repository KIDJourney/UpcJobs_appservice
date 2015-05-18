<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-17 21:30:33
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-18 23:36:42
 */
require_once("lib/user_class.php");
define("USER","active");
$job = new user_class();
$data = $job->getinfo();
require_once("template/common/head.php");
require_once("template/user/user.php");
require_once("template/common/footer.php");