<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet-theme-android.css">
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <title>search</title>
    <style>
      .form-group{
      			padding:0;
      }
      .glyphicon{
      			font-size:24px;
      }
    </style>
  </head>
  <body>
    <header class="bar bar-nav">
      <span id="back" title="back" class="icon icon-left-nav pull-left"></span>
      <span title="refresh" class="icon icon-refresh pull-right"></span>
      <h1 class="title">About Us</h1>
    </header>
    <foot class="bar bar-tab">
      <a href="/" title="home" data-ignore="push" class="tab-item">
        <span class="icon icon-home"></span><span class="tab-label">home</span>
      </a>
      <a href="/user" title="login" data-ignore="push" class="tab-item">
        <span class="icon icon-person"></span><span class="tab-label">profile</span>
      </a>
      <a href="/info" data-ignore="push" class="tab-item">
        <span class="icon icon-more"></span><span class="tab-label">Info</span>
      </a>
      <a href="/search" data-ignore="push" class="tab-item">
        <span class="icon icon-search"></span><span class="tab-label">search</span>
      </a>
    </foot>
    <div class="content">
      <ul class="table-view">
        <li class="table-view-cell meida"><a class="navigate-right"><span class="media-object pull-left glyphicon glyphicon-th-list"></span>
            <div class="media-body">新手帮助</div></a></li>
        <li class="table-view-cell meida"><a class="navigate-right"><span class="media-object pull-left glyphicon glyphicon-question-sign"></span>
            <div class="media-body">常见问题</div></a></li>
        <li class="table-view-cell meida"><a class="navigate-right"><span class="media-object pull-left glyphicon glyphicon-envelope"></span>
            <div class="media-body">体验反馈</div></a></li>
        <li class="table-view-cell meida"><a class="navigate-right"><span class="media-object pull-left glyphicon glyphicon-sunglasses"></span>
            <div class="media-body">关于我们</div></a></li>
      </ul>
    </div>
  </body>
  <script>
    $(".icon-refresh").click(function(){
          location.reload();
        });
    $("#back").click(function(){
    		history.go(-1);
    	});
  </script>
</html>