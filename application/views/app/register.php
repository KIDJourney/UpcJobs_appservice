<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <title>注册</title>
</head>

<body>
  <header class="bar bar-nav">
    <span id="back" title="back" class="icon icon-left-nav pull-left" style="color:#337ab7;"></span>
    <span title="refresh" class="icon icon-refresh pull-right" style="color:#337ab7;"></span>
    <h1 class="title"><strong>注册</strong></h1>
  </header>
  <div class="content">
    <form class="input-group">
      <div class="input-row">
        <label>用户名</label>
        <input type="text" placeholder="User Name" />
      </div>
      <div class="input-row">
        <label>密码</label>
        <input type="password" placeholder="Your password" />
      </div>
      <div class="input-row">
        <label>确认密码</label>
        <input type="password" placeholder="Confirm your password" />
      </div>
      <div class="input-row">
        <label>出生年月</label>
        <input type="date" />
      </div>
      <div class="input-row">
        <label>学号</label>
        <input type="text" placeholder="Student ID" />
      </div>
      <div class="input-row">
        <label>求职意向</label>
        <input type="text" />
      </div>
      <button class="btn btn-primary btn-block">注册</button>
    </form>
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
