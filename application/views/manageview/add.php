<link href="../../../static/css/edit.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增 <?php echo $type?></div>
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
                        $block_list = array('id','guide_createtime','meeting_createtime','job_createtime');
                        foreach ($field_metadata as $field){
                            if (in_array($field->name,$block_list))
                                continue;
                            echo "<div class=\"form-group\">";
                            echo "<label>$field->name</label>";
                            if ($field->type == "text"){
                                echo "<textarea name=\"$field->name\" class=\"form-control\" required=\"required\"></textarea>" . "<br>";
                            }else if ($field->type == "timestamp") {
                                //placeholder="Username"
                                $current_date = date("o-m-d G:i");
                                echo "<input name=\"$field->name\" class=\"form-control\" required=\"required\" placeholder=\"$current_date\">" . "<br>";
                            } else {
                                    echo "<input name=\"$field->name\" class=\"form-control\" required=\"required\">" . "<br>";
                            }

                            echo "</div>";
                        }
                        ?>
                        <button class="btn btn-lg btn-primary">新增 <?php echo $type?></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>