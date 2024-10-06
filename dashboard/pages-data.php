<?php include('includes/header.php'); ?>
<div class="action d-flex justify-content-between">
    <h2>Pages List</h2>
    <a href="add-pages.php">
        <button type="button" class="btn btn-primary">Add New Page</button>
    </a>
</div>
<div class="card mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">Page</th>
                <th scope="col">Status</th>
                <th scope="col">Template</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT id, name,template, status FROM tbl_pages  ORDER BY page_order asc ";
            $result= $conn->query($sql);
            if($result->num_rows>0){
                while($row= $result->fetch_object()){
                    $status = ($row->status == 1) ? 'Active' : 'In-active';
                    echo "<tr>
                        <th>$row->name</th>
                        <th>$status</th>
                        <th>$row->template</th>
                        <th><a href='add-pages.php?id=$row->id'>
                            <img class='action-icon' src='assets/images/edit.png' alt='Edit' title='Edit'>
                            <img class='action-icon' src='assets/images/delete.png' alt='Delete' title='Delete'>
                        </th>
                    </tr>";
                }
            }
        ?>
    </table>
</div>
<?php include('includes/footer.php'); ?>