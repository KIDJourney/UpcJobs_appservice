<div class="container-fluid">
    <link href="../../../static/css/sidebar.css" rel="stylesheet">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="<?php echo isset($overview)?"active":"";?>"><a href="overview">Overview <span class="sr-only">(current)</span></a></li>
                <li class="<?php echo isset($user)?"active":"";?>"><a href="user">User</a></li>
                <li class="<?php echo isset($admin)?"active":"";?>"><a href="admin">Manager</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="<?php echo isset($guide)?"active":"";?>"><a href="guide">Guide</a></li>
                <li class="<?php echo isset($job)?"active":"";?>"><a href="job">Job</a></li>
                <li class="<?php echo isset($meeting)?"active":"";?>"><a href="meeting">Meeting</a></li>
            </ul>
        </div>