<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <title>关于我们</title>
  <style>
    .form-group {
      padding: 0;
    }

    .glyphicon {
      font-size: 24px;
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
  <div class="content">
    <ul class="table-view">
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-th-list"></span>
          <div class="media-body">新手帮助</div>
        </a>
      </li>
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-question-sign"></span>
          <div class="media-body">常见问题</div>
        </a>
      </li>
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-envelope"></span>
          <div class="media-body">体验反馈</div>
        </a>
      </li>
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-sunglasses"></span>
          <div class="media-body">关于我们</div>
        </a>
      </li>
    </ul>
  </div>
</body>
<script>
  $(".icon-refresh").click(function() {
    location.reload();
  });
  $("#back").click(function() {
    history.go(-1);
  });
</script>

</html>
