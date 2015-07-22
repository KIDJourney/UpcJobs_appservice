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
  <title><?php echo $title;?></title>
  <style>
      .bar-hide{
        display: none;
      }
  </style>
</head>

<body>
<header class="bar bar-nav">
  <span id="back" title="back" class="icon icon-left-nav pull-left text-primary"></span>
  <a href="../app/login">
    <?php if (isset($username)){?>
      <button title="../app/user" class="btn btn-link pull-right"><?php echo $username;?></button>
    <?php } else { ?>
      <button title="../app/login" class="btn btn-link pull-right">登录</button>
    <?php }?>
  </a>
  <h1 class="title"><strong><?php echo $title;?></strong></h1>
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
            <td>
              <a href="#" class="btn btn-link">详情</a>
            </td>
          </tr>
        </tbody>
      </table>
      <p class="text-center">......</p>
    </div>
    <div id="footer" style="position:fixed;bottom:0;left:0;right:0;">
      <div class="bar-tab" style="height:30px;border:0;">
        <a class="tab-item"></a>
        <a class="tab-item"></a>
        <a class="tab-item"></a>
        <a id="toogle" class="tab-item" style="height:30px;">
          <span class="icon icon-up-nav"></span>
        </a>
      </div>

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
      <div style="border-top:0;" class="bar-tab bar-hide">
        <a href="../app/about" data-ignore="push" class="tab-item">
          <span class="icon icon-forward"></span>
          <span class="tab-label">联系我们 </span>
        </a>
        <a href="" class="tab-item"></a>
        <a href="" class="tab-item"></a>
        <a href="" class="tab-item"></a>
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
  $("#toogle").click(function(){
        var span=$(this).children("span");
          if(span.hasClass("icon-up-nav")){
              span.removeClass("icon-up-nav");
              $(".bar-hide").fadeIn(0);
              span.addClass("icon-down-nav");
          }
          else{
            span.removeClass("icon-down-nav");
            $(".bar-hide").fadeOut(0);
            span.addClass("icon-up-nav");
          }
      });
</script>

</html>
