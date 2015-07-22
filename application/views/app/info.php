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
  <title>就业资讯</title>
  <style></style>
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
<footer class="bar bar-tab">
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
      $http.get("http://upcexample.sinaapp.com/api/guide/").success(function(data) {
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
