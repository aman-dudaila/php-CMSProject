<?php 
    include('includes/header.php'); 
    adminCanView(); 
?>
<?php 
$id = isset($_GET['id']) ? $_GET['id'] : '' ;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_REQUEST);
    $role=isset($_POST['role'])?$_POST['role'] : '2';
    $status=isset($_POST['status'])?$_POST['status'] : 'active';
    if($id > 0) {
        // update the record
        $sql= "UPDATE tbl_users SET name='$name',email='$email',phone='$phone',address='$address',status='$status' WHERE id='$id'";
        $result = $conn->query($sql);
        if($result){
            header('location:users.php?msg=Record updated successfully');
        } else {
            echo $conn->error;
        }
    } else {
        // insert new record
        $sql= "INSERT INTO tbl_users(role,name,email,password,phone,address,status)
        VALUES('$role','$name','$email','$password','$phone','$address','$status')";
        $result = $conn->query($sql);
        if($result){
            header('location:users.php?msg=New User Added successfully');
        } else {
            echo $conn->error;
        }
    }
    
}
?>

<?php 
if($id > 0) {
    $sql= "SELECT role,name,email,password,phone,address,status FROM tbl_users where id=$id";
    $result= $conn->query($sql);
    $row= $result->fetch_object();
}
?> 
<div class="m-4">
    <div class="action d-flex justify-content-between">
        <h2><?php echo ($id > 0) ? 'Update' :'Add New'; ?> User</h2>
        <a href="users.php">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
    <form action="" method="post"> 
        <div class="form-group">
            <label for="formGroupExampleInput2">Name : </label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput2"
                placeholder="enter your name" value="<?php echo $row->name; ?>" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Email : </label>
            <input type="text" name="email" class="form-control" id="formGroupExampleInput"
                placeholder="enter your email" value="<?php echo $row->email; ?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Password : </label>
            <input type="password" name="password" class="form-control" id="formGroupExampleInput"
                placeholder="enter your password">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Phone : </label>
            <input type="text" name="phone" class="form-control" id="formGroupExampleInput"
                placeholder="enter your number" value="<?php echo $row->phone; ?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">address : </label>
            <input type="text" name="address" class="form-control" id="formGroupExampleInput"
                placeholder="enter your address" value="<?php echo $row->address; ?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Status : </label>
            <label for="active"> <input type="radio" name="status" value="1" id="active" class="form-control"
                    id="formGroupExampleInput2">Active </label>
            <label for="inactive"> <input type="radio" name="status" value="0" id="inactive" class="form-control"
                    id="formGroupExampleInput2">inactive </label>
        </div>
        <div class="form-group">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
<?php include('includes/footer.php'); ?>