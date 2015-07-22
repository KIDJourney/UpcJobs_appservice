<html ng-app="myApp">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <script src="http://cdn.staticfile.org/angular.js/1.2.5/angular.min.js"></script>
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <title>detail</title>
  <style>
    .span {
      text-align: center;
    }
  </style>
</head>

<body>
<header class="bar bar-nav">
  <span id="back" title="back" class="icon icon-left-nav pull-left text-primary"></span>
  <a href="../app/login">
    <?php if (isset($username)){?>
      <button title="../app/user" class="btn btn-link pull-right"><?php echo $username?></button>
    <?php } else { ?>
      <button title="../app/login" class="btn btn-link pull-right">登录</button>
    <?php }?>
  </a>
  <h1 class="title"><strong><?php echo $title?></strong></h1>
</header>
<footer class="bar-tab">
  <a href="../app" data-ignore="push" class="tab-item">
    <span class="icon icon-home"></span>
    <span class="tab-label">主页</span>
  </a>
  <a href="../app/search" data-ignore="push" class="tab-item">
    <span class="icon icon-search"></span>
    <span class="tab-label">职位搜索</span>
  </a>
  <a href="../app/meeting" data-ignore="push" class="tab-item">
    <span class="icon icon-more"></span>
    <span class="tab-label">校园宣讲</span>
  </a>
  <a href="../app/info" data-ignore="push" class="tab-item">
    <span class="icon icon-info"></span>
    <span class="tab-label">就业资讯</span>
  </a>
</footer>
  <div id="content" ng-controller="tableCtrl" class="content container-fluid">
    <dl class="dl-horizontal">
      <dt>职位:</dt>
      <dd><?php echo $data->job_name;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>公司:</dt>
      <dd>Test<?php echo $data->job_company;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>薪水:</dt>
      <dd><?php echo $data->job_salary;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>地址:</dt>
      <dd><?php echo $data->job_position;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>学历要求:</dt>
      <dd><?php echo $data->job_degree;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>专业要求:</dt>
      <dd><?php echo $data->job_major;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>公司类别:</dt>
      <dd><?php echo $data->job_companytype;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>公司简介:</dt>
      <dd><?php echo $data->job_companyinfo;?></dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>职位描述:</dt>
      <dd><?php echo $data->job_description;?></dd>
    </dl>

  </div>
  <script>
    var app = angular.module("myApp", []);
    app.controller("tableCtrl", function($scope, $http) {
      $http.get("url").success(function(data) {
        $scope.job = data[0];
      });
    });
    $(".icon-refresh").click(function() {
      location.reload();
    });
    $("#back").click(function() {
      history.go(-1);
    });
  </script>
</body>

</html>
