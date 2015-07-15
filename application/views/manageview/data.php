<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<style type="text/css">
    #edit {
        margin-left: 5%;
        margin-right: 10%;
    }
    #button-group{
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>
    <h1 class="page-header" style="display:inline-block;"><?php echo $tablename?></h1>
    <a href="<?php echo base_url('manageview/add/' . $edit_type);?>" class="btn btn-info btn-lg" style="float:right;">Add new <?php echo $edit_type;?></a>
    <div class="table-responsive">
         <table class="table table-striped">
            <?php
                echo '<dl class="dl-horizontal">';
                foreach($data as $subdata) {
                    echo "<div>";
                    foreach ($subdata as $keys => $row) {
                        echo "<dt>" . $keys . "</dt>";
                        echo "<dd>" . $row . "</dd>";
                    }
                    echo "<div id=\"button-group\">" ;
                    echo "<a class=\"btn btn-primary btn-sm\" id=\"edit\" style=\"display: inline-block;\" href=\"" . base_url("manageview/edit/" . $edit_type . "/" . $subdata->id) ."\">Edit</a>" ;
                    echo "<a class=\"btn btn-danger btn-sm\"href=\"" . base_url("manageview/delete/" . $edit_type . "/" . $subdata->id) ."\">Delete</a>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </table>
    </div>
</div>
</div>
</div>
