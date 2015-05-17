<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-16 23:50:41
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 17:14:54
 */
require_once("lib/http_common.php");

unset($_SESSION['sql_cache']);
unset($_SESSION['user_info']);
redirect();