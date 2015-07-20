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
  <title>资讯</title>
  <style></style>
</head>

<body>
  <header class="bar bar-nav">
    <span id="back" title="back" class="icon icon-left-nav pull-left text-primary"></span>
    <span title="refresh" class="icon icon-refresh pull-right text-primary"></span>
    <h1 class="title"><strong>更多资讯</strong></h1>
  </header>
  <foot class="bar bar-tab">
    <a href="../app" title="home" data-ignore="push" class="tab-item">
      <span class="icon icon-home"></span>
      <span class="tab-label">主页</span>
    </a>
    <a href="../app/login" title="login" data-ignore="push" class="tab-item">
      <span class="icon icon-person"></span>
      <span class="tab-label">个人</span>
    </a>
    <a href="../app/info" data-ignore="push" class="tab-item">
      <span class="icon icon-more"></span>
      <span class="tab-label">宣讲会</span>
    </a>
    <a href="../app/search" data-ignore="push" class="tab-item">
      <span class="icon icon-search"></span>
      <span class="tab-label">搜索</span>
    </a>
  </foot>
  <div id="content" ng-controller="infoCtrl" class="content">
    <div style="margin-top:5px;" class="form-horizontal container-fluid">
      <div class="form-group">
        <label for="filter" style="text-align:center;" class="col-xs-4 control-label text-danger">关键词过滤</label>
        <div class="col-xs-8">
          <input type="text" ng-model="query" id="fliter" placeholder="关键词" class="form-control" />
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div ng-repeat="info in infos|filter:query|orderBy:orderProp" style="border-top: 1px solid #ddd;">
        <dl class="dl-horizontal">
          <dd>标题</dd>
          <dt class="text-warning" ng-bind="info.guide_title"></dt>
        </dl>
        <dl class="dl-horizontal">
          <dd>内容</dd>          
          <dt class="text-info" ng-bind="info.guide_content"></dt>
        </dl>
        <footer class="text_right">
          <cite class="text-muted" ng-bind="info.guide_createtime"></cite>
        </footer>
      </div>
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
