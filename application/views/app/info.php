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
  <style></style>
</head>

<body>
  <header class="bar bar-nav">
    <span id="back" title="back" class="icon icon-left-nav pull-left"></span>
    <span title="refresh" class="icon icon-refresh pull-right"></span>
    <h1 class="title">信息</h1>
  </header>
  <foot class="bar bar-tab">
    <a href="../app" title="home" data-ignore="push" class="tab-item">
      <span class="icon icon-home"></span>
      <span class="tab-label">home</span>
    </a>
    <a href="../app/user" title="login" data-ignore="push" class="tab-item">
      <span class="icon icon-person"></span>
      <span class="tab-label">profile</span>
    </a>
    <a href="../app/info" data-ignore="push" class="tab-item">
      <span class="icon icon-more"></span>
      <span class="tab-label">Info</span>
    </a>
    <a href="../app/search" data-ignore="push" class="tab-item">
      <span class="icon icon-search"></span>
      <span class="tab-label">search</span>
    </a>
  </foot>
  <div id="content" ng-controller="infoCtrl" class="content">
    <div style="margin-top:5px;" class="form-horizontal container-fluid">
      <div class="form-group">
        <label for="filter" style="text-align:center;" class="col-xs-4 control-label">通过关键词过滤</label>
        <div class="col-xs-8">
          <input type="text" ng-model="query" id="fliter" placeholder="关键词" class="form-control" />
        </div>
      </div>
    </div>
    <div>
      <table class="table">
        <tr>
          <th>标题</th>
          <th>内容</th>
        </tr>
        <tr ng-repeat="info in infos|filter:query|orderBy:orderProp">
          <td ng-bind="info.guide_title"></td>
          <td ng-bind="info.guide_content"></td>
        </tr>
      </table>
    </div>
  </div>
  <script>
    var app = angular.module("myApp", []);
    app.controller("infoCtrl", function($scope, $http) {
      $http.get("http://2.upcexample.sinaapp.com/api/guide/").success(function(data) {
        $scope.infos = data;
      });
        $scope.orderProp="guide_createtime";
    });
    $("#back").click(function() {
      history.go(-1);
    });
    $(".icon-refresh").click(function() {
      location.reload();
    });
  </script>
</body>

</html>
