<?php include('includes/header.php'); ?>
<div class="card mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">subject</th>
                <th scope="col">message</th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM tbl_contact    ORDER BY id DESC ";
            $result= $conn->query($sql);
            if($result->num_rows>0){
                while($row= $result->fetch_object()){
                    echo "<tr>
                        
                        <th>$row->name</th>
                        <th>$row->email</th>
                        <th>$row->subject</th>
                        <th>$row->message</th>
                    </tr>";
                }
            }
        ?>
    </table>
</div>
<?php include('includes/footer.php'); ?>