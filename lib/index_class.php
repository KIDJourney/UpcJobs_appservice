<?php
/**
 * @Author: kidjourney
 * @Date:   2015-05-06 11:38:55
 * @Last Modified by:   kidjourney
 * @Last Modified time: 2015-05-17 00:03:23
 */
require_once("http_common.php");

class index_class {

    public function statuscheck(){
        if (checksession()) {
            require_once("template/common/head.php");
            require_once("template/main/overview.php");
            require_once("template/common/footer.php");
        } else {
            redirect("login.php");
        }
    }
}