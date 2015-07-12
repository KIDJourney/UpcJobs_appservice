<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><?php echo $tablename; ?></h1>
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
                $flag = 0;
                $id = NULL;
                foreach($subdata as $keys => $row){
                    if (!$flag++){
                        $id = $row;
                    }
                    echo "<td>" . $row . "</td>";
                }
                echo "<td>";
                echo "<a href=\"" . base_url("Manageview/edit/" . $edit_type . "/" . $id) ."\">Edit</a>";
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
