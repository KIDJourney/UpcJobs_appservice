<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/ratchet/2.0.2/css/ratchet.css">
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <title>搜索</title>
  <style>
    .form-group {
      padding: 0;
    }
  </style>
</head>

<body>
  <header class="bar bar-nav">
    <span id="back" title="back" class="icon icon-left-nav pull-left text-primary"></span>
    <span title="refresh" class="icon icon-refresh pull-right text-primary"></span>
    <h1 class="title"><strong>职位查找</strong></h1>
  </header>
  <foot class="bar bar-tab">
    <a href="../app" title="home" data-ignore="push" class="tab-item">
      <span class="icon icon-home"></span>
      <span class="tab-label">回到主页</span>
    </a>
    <a href="../app/user" title="login" data-ignore="push" class="tab-item">
      <span class="icon icon-person"></span>
      <span class="tab-label">个人主页</span>
    </a>
    <a href="../app/more" data-ignore="push" class="tab-item">
      <span class="icon icon-more"></span>
      <span class="tab-label">校园宣讲</span>
    </a>
    <a href="../app/info" data-ignore="push" class="tab-item">
      <span class="icon icon-info"></span>
      <span class="tab-label">就业资讯</span>
    </a>
  </foot>
  <div class="content">
    <div id="searchForm" class="form-horizontal container-fluid">
      <div style="margin-top:5px;" class="form-group">
        <label for="selectTypes" style="text-align:center;" class="col-xs-4 control-label">查找方式</label>
        <div class="col-xs-8">
          <select id="selectTypes" class="form-control">
            <option value="position">地区</option>
            <option value="name">职位</option>
            <option value="major">专业</option>
            <option value="jobId">jobID</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="keyword" style="text-align:center;" class="col-xs-4 control-label">关键字</label>
        <div class="col-xs-8">
          <input id="keyword" type="text" placeholder="keyword" class="form-control" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-12">
          <button id="get" class="form-control btn btn-primary">
            <span class="icon icon-search"></span>
            查找
          </button>
        </div>
      </div>
    </div>
    <div style="position:static;display:none;height:30px;" id="slideDown" class="bar bar-tab">
      <a style="height:30px;" class="tab-item">
        <span id="down" class="icon icon-down-nav"></span>
      </a>
    </div>
    <div id="content"></div>
  </div>
</body>
<script>
  $(".icon-refresh").click(function() {
    location.reload();
  });
  $("#back").click(function() {
    history.go(-1);
  });
  if($.cookie("url")){
    get($.cookie("url"));
  }
  //ajax函数
  function get(url){
    $.get(url, function(data, status, xhr) {
      var getContent;
      if(!data.length){
        getContent="<p class='text-center text-danger'>未搜索到相关结果</p>"
      }
      else{
        getContent = "<table class='table'>";
        getContent += "<tr><th>职位</th><th>地点</th><th>公司</th><th>工资</th><th>详细</th></tr>";
        $.each(data, function(i, v) {
          getContent += "<tr class='text-muted'><td>" + v.job_name + "</td><td>" + v.job_position + "</td><td>" + v.job_company + "</td><td>" + v.job_salary + "</td><td><a href='/detail' data-ignore='push'><button class='btn btn-link' id=" + i +">查看</button></a></td></tr>";
        });
        getContent += "</table>";
      }
      $("#content").html(getContent);
    });    
  }
  $("#get").click(function() {
    var key = document.getElementById("keyword").value;
    var selectType = $("#selectTypes").val();
    var urls = new Array();
    urls[0] = "http://2.upcexample.sinaapp.com/api/job/pos/";
    urls[1] = "http://2.upcexample.sinaapp.com/api/job/major/";
    urls[2] = "http://2.upcexample.sinaapp.com/api/job/name/";
    urls[3] = "http://upcexample.sinaapp.com/api.php?type=job&keyword=jobid&content";
    var url;
    switch (selectType) {
      case "position":
        url = urls[0];
        break;
      case "major":
        url = urls[1];
        break;
      case "name":
        url = urls[2];
        break;
      case "jobId":
        url = urls[3];
        break;
      default:
        alert("Something goes wrong");
    }
    url += key;
    get(url);
    $.cookie("url",url,{expires:1/24/60});
    $.cookie("keyword",$("#keyword").val(),{expires:1/24/60});
    $.cookie("type",$("#selectTypes").val(),{expires:1/24/60});
    $("#searchForm").slideUp();
    $("#slideDown").slideDown();
    //- $("#down").show();
  });
  $("#down").click(function() {
    $("#slideDown").slideUp();
    $("#searchForm").slideDown();
  });
</script>

</html>
