<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Upc example</title>

    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <link href="static/css/dashboard.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">UPC JOB</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="#"><?php echo $_SESSION['user_info']['u_nick'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php echo INDEX;?>"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
            <li class="<?php echo USER;?>"><a href="user.php">User</a></li>
            <li class="<?php echo MANAGER;?>"><a href="manager.php">Manager</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php echo NEWS;?>"><a href="news.php">News</a></li>
            <li class="<?php echo COMPANY;?>"><a href="company.php">Company info</a></li>
            <li class="<?php echo HIRING;?>"><a href="hiring.php">Hiring News</a></li>
            <li class="<?php echo MEETING;?>"><a href="meet.php">Meeting info</a></li>
          </ul>
        </div>