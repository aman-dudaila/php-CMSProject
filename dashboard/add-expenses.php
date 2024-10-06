<?php include('includes/header.php'); ?>
<?php 
$id = isset($_GET['id']) ? $_GET['id'] : '' ; //
if($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_REQUEST);

    if(!$id>0) {
        $user_id= $_SESSION['id']; 
        $sql= "INSERT INTO tbl_expenses(item_name,user_id,amount,comment,created_on) 
            VALUES('$item_name',$user_id,$amount,'$comment','$date')";
        $result= $conn->query($sql);
        if($result) {
            header('location:expenses.php');
            echo "inserted";
        } else {
            echo $conn->error;
        }
    } else {
        $sql= "UPDATE tbl_expenses SET item_name='$item_name', amount='$amount', comment='$comment', created_on='$date' WHERE id='$id'";
        $result= $conn->query($sql);
        if($result) {
            header('Location:expenses.php');
        } else {
            echo $conn->error;
        }
    }
}
?>
<?php 
$sql= "SELECT item_name,amount,comment,created_on FROM tbl_expenses WHERE id='$id'";
$result= $conn->query($sql);
$row= $result->fetch_object();
?>
<!-- Add new expenses form -->
<div>
    <!-- button for add new expenses and back -->
    <div class="action d-flex justify-content-between">
        <h2><?php echo ($id>0)? 'Update' : 'Add New' ?> Expenses</h2>
        <a href="expenses.php">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>

    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label for="item_name" class="form-label">Item Name :</label>
            <input type="text" class="form-control" id="item_name" placeholder="Enter item name" name="item_name" value="<?php echo $row->item_name; ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="amount" class="form-label">Amount:</label>
            <input type="number" class="form-control" id="amount" placeholder="Enter amount" name="amount" value="<?php echo $row->amount; ?>">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment :</label>
            <input type="text" class="form-control" id="comment" placeholder="Enter comment" name="comment" value="<?php echo $row->comment; ?>">
            <!--<textarea class="form-control"></textarea> -->
        </div>
        <div class="mb-3 mt-3">
            <label for="date" class="form-label">Date : </label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $row->created_on; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>