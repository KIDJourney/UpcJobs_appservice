<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <script src="http://cdn.staticfile.org/angular.js/1.2.5/angular.min.js"></script>
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <title>Index</title>
  <style type="text/css">
    .red {
      color: rgb(255, 0, 0);
    }
  </style>
</head>

<body>
  <header class="bar bar-nav">
    <span id="back" title="back" class="icon icon-left-nav pull-left"></span>
    <a href="../app/login">
      <button title="../app/login" class="btn btn-link pull-right">登录</button>
    </a>
    <h1 class="title">首页</h1>
  </header>
  <div class="content">
    <div ng-app="myApp" ng-controller="newsController">
      <table class="table">
        <caption>
          <strong style="margin-left:5px;" class="text-info">最新消息</strong>
          <a href="../app/more" style="margin-right:5px;" class="pull-right text-info">More </a></caption>
        <thead>
          <tr></tr>
        </thead>
        <tbody>
          <tr ng-repeat="new in news">
            <td ng-bind="new.company"></td>
            <td ng-bind="new.job_name"></td>
            <td ng-bind="new.salary"></td>
            <td ng-bind="new.wanted_number"></td>
          </tr>
        </tbody>
      </table>
      <p class="text-center">......</p>
    </div>
    <div id="footer" style="position:fixed;bottom:0;left:0;right:0;">
      <div class="bar-tab">
        <a href="../app/search" data-ignore="push" class="tab-item">
          <span class="icon icon-search"></span>
          <span class="tab-label">职位搜索</span>
        </a>
        <a href="../app/meeting" databottom:0;-ignore="push" class="tab-item">
          <span class="icon icon-more"></span>
          <span class="tab-label">校园宣讲</span>
        </a>
        <a href="../app/info" data-ignore="push" class="tab-item">
          <span class="icon icon-info"></span>
          <span class="tab-label">更多资讯</span>
        </a>
      </div>
      <div style="border-top:0;" class="bar-tab">
        <a href="../app/user" data-ignore="push" class="tab-item">
          <span class="icon icon-person"></span>
          <span class="tab-label">My就业帮</span>
        </a>
        <a href="../app/about" data-ignore="push" class="tab-item">
          <span class="icon icon-forward"></span>
          <span class="tab-label">联系我们 </span>
        </a>
        <a href="#" class="tab-item"></a>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  $("#back").click(function() {
    history.go(-1);
  });
  var app = angular.module("myApp", []);
  app.controller("newsController", function($scope, $http) {
    $http.get("url").success(function(data) {
      $scope.news = data;
    });
  });
</script>

</html>
