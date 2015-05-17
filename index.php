<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-16 23:50:04
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 23:48:05
 */
    require_once("lib/http_common.php");
    require_once("lib/index_class.php");

    define("INDEX",'active');

    $job = new index_class();
    $job->statuscheck();
    $job->initcache();