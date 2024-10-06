<?php 
include('includes/header.php');
$user_id = $_SESSION['id'];
if($_SESSION['role'] == 1 && $_GET['id']) {
    $user_id = $_GET['id'];
}
?>
<div class="action d-flex justify-content-between">
    <h2>Expenses List</h2>
    <a href="add-expenses.php">
        <button type="button" class="btn btn-primary">New Expenses</button>
    </a>
</div>
<div class="success" style="color: green;">
    <?php 
    $msg= isset($_GET['msg']) ? $_GET['msg']: "";
    echo $msg;
?>
</div>
<div class="search-box row mt-4">
    <?php if($_SESSION['role'] == 1){ ?>
        <div class="input-group col-md-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Filter</label>
            </div>
            <select class="custom-select" id="filterId" onchange="filterExpensesByUser()">
                <option selected>Select User</option>
                <?php 
                    $sql = "SELECT id, role, name, email, password, phone, address, status FROM tbl_users where role = 2 ORDER BY id DESC";
                    $result= $conn->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_object()){
                            $selected = $user_id == $row->id ? "selected = 'selected'" : '';
                            echo "<option $selected value='$row->id'>$row->name</option>";
                        }
                    }        
                ?>
            </select>
            <button type="button" onclick="clearFilter()" class="btn btn-success ml-2">Clear</button>
        </div>
    <?php } ?>    
</div>
<div class="card mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">item</th>
                <th scope="col">amount</th>
                <th scope="col">comment</th>
                <th scope="col">date</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM tbl_expenses WHERE user_id=$user_id ORDER BY id DESC ";
            $result= $conn->query($sql);
            if($result->num_rows>0){
                while($row= $result->fetch_object()){
                    echo "<tr>
                        
                        <th>$row->item_name</th>
                        <th>$row->amount</th>
                        <th>$row->comment</th>
                        <th>$row->created_on</th>
                        <th><a href='add-expenses.php?id=$row->id'>
                        <img class='action-icon' src='assets/images/edit.png' alt='Edit' title='Edit'>
                        <img class='action-icon' src='assets/images/delete.png' alt='Delete' title='Delete'>
                        </th>
                    </tr>";
                }
            }
        ?>
    </table>
</div>
<script type="text/javascript">
    function filterExpensesByUser() {
        var id = document.getElementById('filterId').value;
        window.location.href = 'expenses.php?id=' + id;
    }
    function clearFilter() {
        window.location.href = 'expenses.php';
    }
</script>
<?php include('includes/footer.php') ?>