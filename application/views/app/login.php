<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <title>Login</title>
  <style></style>
</head>

<body>
  <header class="bar bar-nav">
    <span id="back" class="icon icon-left-nav pull-left"></span>
    <span class="icon icon-refresh pull-right"></span>
    <h1 class="title">登录</h1>
  </header>
  <foot class="bar bar-tab">
    <a href="../app" data-ignore="push" class="tab-item">
      <span class="icon icon-home"></span>
      <span class="tab-label">home</span>
    </a>
    <a href="../app/login" data-ignore="push" class="tab-item">
      <span class="icon icon-person"></span>
      <span class="tab-label">profile</span>
    </a>
    <a href="../app/info" data-ignore="push" class="tab-item">
      <span class="icon icon-more"></span>
      <span class="tab-label">info</span>
    </a>
    <a href="../app/search" data-ignore="push" class="tab-item">
      <span class="icon icon-search"></span>
      <span class="tab-label">search</span>
    </a>
  </foot>
  <div class="content">
    <form class="input-group">
      <div class="input-row">
        <label for="name">username:</label>
        <input id="name" type="text" name="name" placeholder="your name" />
      </div>
      <div class="input-row">
        <label for="password">password:</label>
        <input id="password" type="text" password="password" placeholder="your password" />
      </div>
      <button class="btn btn-primary btn-block" style="margin-top:5px;">login</button>
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
