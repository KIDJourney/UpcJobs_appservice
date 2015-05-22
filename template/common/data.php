       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php echo TABLENAME; ?></h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <?php
                  echo "<tr>";
                  foreach($data[0] as $keys => $value){
                    echo "<th>" . $keys . "</th>";
                  }
                  echo "<th>Manage</th>";
                  echo "</tr>";
                ?>
              </thead>
              <tbody>
                <?php 
                  foreach($data as $subdata){
                    echo "<tr>";
                    foreach($subdata as $keys => $row){
                      echo "<td>" . $row . "</td>";
                    }
                    // echo "<td>" . "<a href=" . "\"http://upcexample.sinaapp.com/user.php?method=del&uid=" . 
                    //             $subdata['usernameID'] . "\">Del</a>" . "</td>";
                    echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>