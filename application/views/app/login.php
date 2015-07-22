<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <title><?php echo $title?></title>
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
  <h1 class="title"><strong>登录</strong></h1>
</header>
  <div class="bar bar-standard bar-footer-secondary" style="text-align:center;border-top:0;">
	 <a href="../app/register" class="btn btn-link">注册</a>
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
  <div class="content">
    <form class="input-group" method="post" action="<?php echo current_url();?>" >
      <div class="input-row">
        <label for="name">用户名</label>
        <input id="name" type="text" name="username" placeholder="your name" />
      </div>
      <div class="input-row">
        <label for="password">密码</label>
        <input id="password" type="password" name="password" placeholder="your password" />
      </div>
      <button class="btn btn-primary btn-block" style="width:96%;;margin:5px auto;">登录</button>
    </form>
  </div>
  <script>
    $(".icon-refresh").click(function() {
      location.reload();
    });
    $("#back").click(function() {
      history.go(-1);
    });
  </script>
</body>

</html>
