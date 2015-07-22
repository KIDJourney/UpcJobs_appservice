<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <title>我的就业帮</title>
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
          <span class="media-object pull-left glyphicon glyphicon-bell"></span>
          <div class="media-body">职位推送</div>
        </a>
      </li>
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-star"></span>
          <div class="media-body">职位收藏夹</div>
        </a>
      </li>
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-calendar"></span>
          <div class="media-body">浏览记录</div>
        </a>
      </li>
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-edit"></span>
          <div class="media-body">修改个人信息</div>
        </a>
      </li>
      <li class="table-view-cell meida">
        <a class="navigate-right">
          <span class="media-object pull-left glyphicon glyphicon-lock"></span>
          <div class="media-body">修改密码 </div>
        </a>
      </li>
    </ul>
  </div>
</body>
<script>
  $("#back").click(function() {
    history.go(-1);
  });
  $(".icon-refresh").click(function() {
    location.reload();
  });
</script>

</html>
