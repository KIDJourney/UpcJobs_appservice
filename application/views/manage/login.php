<body>
<link href="../../../static/css/login.css" rel="stylesheet">
<div class="container">
    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Sign in Please</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input name="username" id="inputEmail" class="form-control" placeholder="Username" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="passwd" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input name="remember" type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <?php if(isset($login_failed)):?>
            <div class="alert alert-danger" role="alert">Username or Password is wrong , Please try again</div>
        <?php endif;?>
    </form>

</div> <!-- /container -->
