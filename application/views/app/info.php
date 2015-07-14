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
    <a href="../app/login" title="login" data-ignore="push" class="tab-item">
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
      <div class="form-group">
        <label for="order" style="text-align:center;" class="col-xs-4 control-label">选择排序依据</label>
        <div class="col-xs-8">
          <select id="order" ng-model="orderProp" class="form-control">
            <option value="publish_time">最新</option>
            <option value="salary">薪水</option>
            <option value="wanted_number">招收人数</option>
          </select>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table">
        <tr>
          <th>职位</th>
          <th>时间</th>
          <th>地址</th>
          <th>人数</th>
          <th>薪水</th>
        </tr>
        <tr ng-repeat="info in infos|filter:query|orderBy:orderProp">
          <td ng-bind="info.job_name"></td>
          <td ng-bind="info.publish_time"></td>
          <td ng-bind="info.address"></td>
          <td ng-bind="info.wanted_number"></td>
          <td ng-bind="info.salary"></td>
        </tr>
      </table>
    </div>
  </div>
  <script>
    var app = angular.module("myApp", []);
    app.controller("infoCtrl", function($scope, $http) {
      $http.get("url here").success(function(data) {
        $scope.infos = data;
      });
      $scope.orderProp = "publish_time";
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
