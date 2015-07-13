<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header" style="display:inline-block;"><?php echo $tablename?></h1>
    <a href="<?php echo base_url('Manageview/add/' . $edit_type);?>" class="btn btn-info btn-lg" style="float:right;">Add new <?php echo $edit_type;?></a>
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
                echo "<td>";
                echo "<a href=\"" . base_url("Manageview/edit/" . $edit_type . "/" . $subdata->id) ."\">Edit</a>";
                echo " | ";
                echo "<a href=\"" . base_url("Manageview/delete/" . $edit_type . "/" . $subdata->id) ."\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
