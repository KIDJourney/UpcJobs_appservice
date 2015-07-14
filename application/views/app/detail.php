<html ng-app="myApp">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet-theme-android.css">
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <script src="http://cdn.staticfile.org/angular.js/1.2.5/angular.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <title>detail</title>
    <style>
      .span{
      	text-align:center;
      }
    </style>
  </head>
  <body>
    <header class="bar bar-nav"><span id="back" title="back" class="icon icon-left-nav pull-left"></span><span title="refresh" class="icon icon-refresh pull-right"></span>
      <h1 class="title">detail</h1>
    </header>
    <foot class="bar bar-tab"><a href="/" title="home" data-ignore="push" class="tab-item"><span class="icon icon-home"></span><span class="tab-label">home</span></a><a href="login" title="login" data-ignore="push" class="tab-item"><span class="icon icon-person"></span><span class="tab-label">profile</span></a><a href="/" data-ignore="push" class="tab-item"><span class="icon icon-more"></span><span class="tab-label">Info</span></a><a href="/search" data-ignore="push" class="tab-item"><span class="icon icon-search"></span><span class="tab-label">search</span></a></foot>
    <div id="content" ng-controller="tableCtrl" class="content container-fluid">
      <dl class="dl-horizontal">
        <dt>职位:</dt>
        <dd ng-bind="job.job_name"></dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>公司:</dt>
        <dd ng-bind="job.company"></dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>薪水:</dt>
        <dd ng-bind="job.salary"></dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>地址:</dt>
        <dd ng-bind="job.address"></dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Else:</dt>
        <dd>Something Else</dd>
      </dl>
    </div>
    <script>
      var app=angular.module("myApp",[]);
      app.controller("tableCtrl",function($scope,$http){
      $http.get("url").success(function(data){
      	$scope.job=data[0];
      	});
      });
      $(".icon-refresh").click(function(){
        location.reload();
      });
      $("#back").click(function(){
      		history.go(-1);
      	});
    </script>
  </body>
</html>