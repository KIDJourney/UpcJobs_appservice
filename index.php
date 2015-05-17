<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-16 23:50:04
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 17:00:38
 */
    require_once("lib/http_common.php");
    require_once("lib/index_class.php");

    $job = new index_class();
    $job->statuscheck();
    $job->initcache();