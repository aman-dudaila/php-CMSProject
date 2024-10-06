<?php include('includes/header.php'); ?>
<?php 
// total Users //////////////
$sql= "select count(id) as total_records from tbl_users";
$result = $conn->query($sql);
$row = $result->fetch_object();
$totalUsers = $row->total_records;
//////////Total Active User
$sql= "select count(id) as total_records from tbl_users where status = 1";
$result = $conn->query($sql);
$row = $result->fetch_object();
$totalActiveUsers = $row->total_records;
//////////Total Inactive User
$sql= "select count(id) as total_records from tbl_users where status = 0";
$result = $conn->query($sql);
$row = $result->fetch_object();
$totalInActiveUsers = $row->total_records;
?>

<?php 
$user_id= $_SESSION['id'];
$sql= "select sum(amount) as total_amount from tbl_expenses where user_id=$user_id";
$result = $conn->query($sql);
$row = $result->fetch_object();
$totalamount = $row->total_amount;

$start_date = firstDateOfCurrentMonth(); 
$end_date = lastDateOfCurrentMonth(); 
$sql= "SELECT sum(amount) as totalAmount FROM tbl_expenses where user_id=$user_id and created_on >= '$start_date' and created_on <= '$end_date'";
$result = $conn->query($sql);
$row = $result->fetch_object();
$currentMonthAmount = $row->totalAmount;

////////////Today Expenses//////////////
$start_date = getCurrentDate(); 
$end_date = getCurrentDate(); 
$sql= "SELECT sum(amount) as totalAmount FROM tbl_expenses where user_id=$user_id and created_on >= '$start_date' and created_on <= '$end_date'";
$result = $conn->query($sql);
$row = $result->fetch_object();
$currentDayAmount = $row->totalAmount;

?>

<div class="dashboard">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white text-center p-3">
                <div class="card-body">
                    <p>Total Users : <?php echo $totalUsers; ?> </p>
                    <p>Active Users : <?php echo $totalActiveUsers; ?></p>
                    <p>Inactive Users : <?php echo $totalInActiveUsers; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white text-center p-3">
                <div class="card-body">
                    <p>PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-danger text-white text-center p-3">
                <div class="card-body">
                    <p>Expenses Till Now : <?php echo $totalamount; ?></p>
                    <p>This Month Expense : <?php echo $currentMonthAmount; ?></p>
                    <p>Today Expense : <?php echo $currentDayAmount; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>