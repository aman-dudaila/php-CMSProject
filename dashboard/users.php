<?php
 include('includes/header.php');
 adminCanView();
 ?>
<div class="action d-flex justify-content-between">
    <h2>Users List</h2>
    <a href="addnew-users.php">
        <button type="button" class="btn btn-primary">New User</button>
    </a>
</div>
<div class="success" style="color: green;">
    <?php 
    $msg= isset($_GET['msg']) ? $_GET['msg']: "";
    echo $msg;
    ?>
</div>
<div class="card mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <?php 
            $sql = "SELECT id, role, name, email, password, phone, address, status FROM tbl_users WHERE role = 2 AND status=1 ORDER BY id DESC";
            $result= $conn->query($sql);
            if($result->num_rows>0){
                while($row= $result->fetch_object()){
                    $status = ($row->status == 1) ? 'Active' : 'In-active';
                    echo "<tr>
                        
                        <th>$row->name</th>
                        <th>$row->email</th>
                        <th>$row->phone</th>
                        <th>$row->address</th>
                        <th>$status</th>
                        <th><a href='addnew-users.php?id=$row->id'>
                            <img class='action-icon' src='assets/images/edit.png' alt='Edit' title='Edit'>
                            <img class='action-icon' src='assets/images/delete.png' alt='Delete' title='Delete'>
                        </th>
                    </tr>";
                }
            }
        ?>
    </table>
</div>
<?php include('includes/footer.php') ?>