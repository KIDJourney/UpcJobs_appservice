<link href="static/css/login.css" rel="stylesheet">
<div class="container">
  <form class="form-signin" action="login.php" method="POST">
    <h2 class="form-signin-heading">Sign in Please</h2>
    <label for="inputEmail" class="sr-only">Email</label>
    <input name="mail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input name="remember" type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div> <!-- /container -->
