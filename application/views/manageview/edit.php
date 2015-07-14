<link href="../../../static/css/manage/edit.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑 <?php echo $type?></div>
                <div class="panel-body">
                    <?php if($error){ ?>
                      <div clas="alter alter-danger">
                          <strong>Error</strong> There is something wrong with your input;
                          <br>
                          <br>
                      </div>
                    <?php } ?>
                    <form action="<?php echo current_url();?>" method="POST">
                        <?php
                            foreach($data as $subdata)
                                foreach($subdata as $key => $value){
                                    if ($key == "id")
                                        continue;
                                    echo "<div class=\"form-group\">";
                                    echo "<label>$key</label>";
                                    if (strlen($value) > 32){
                                        echo "<textarea name=\"$key\" class=\"form-control\" required=\"required\">$value</textarea>" . "<br>";
                                    } else {
                                        echo "<input name=\"$key\" class=\"form-control\" required=\"required\" value=\"$value\">" . "<br>";
                                    }
                                    echo "</div>";
                                }
                        ?>
                        <button class="btn btn-lg btn-primary">编辑 <?php echo $type?></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>