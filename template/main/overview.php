        <link href="static/css/main.css" rel="stylesheet">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <!-- <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"> -->
              <h4>Register User</h4>
              <span class="text-muted"><?php echo $_SESSION['sql_cache']['user_num'];?></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <!-- <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"> -->
              <h4>Job nums</h4>
              <span class="text-muted"><?php echo $_SESSION['sql_cache']['camp_num'];?></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <!-- <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail"> -->
              <h4>Company news nums</h4>
              <span class="text-muted"><?php echo $_SESSION['sql_cache']['camp_new_num'];?></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <!-- <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail"> -->
              <h4>News nums</h4>
              <span class="text-muted"><?php echo $_SESSION['sql_cache']['new_num'];?></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <!-- <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail"> -->
              <h4>Meet nums</h4>
              <span class="text-muted"><?php echo $_SESSION['sql_cache']['meet_num'];?></span>
            </div>        
          </div>

        </div>
