<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Expensis Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="assets/bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
<?php
$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    include('includes/connection.php');
    extract($_REQUEST);
    if($email == '') {
        $error = 'Please Fill Email Address <br>';
    }
    if($password == '') {
        
        $error = $error.'Please Fill Password';
    }
    if($error == '') {
        $sql = "SELECT * FROM tbl_users WHERE email='$email' AND password='$password' AND status=1"; // Using prepared statement
        $sql = $conn->query($sql);
        $result = $sql->fetch_object();
        if(isset($result->id)) {
            $_SESSION['id'] = $result->id;
            $_SESSION['name'] = $result->name;
            $_SESSION['email'] = $result->email;
            $_SESSION['role'] = $result->role;
            header('location:index.php');
        } else {
            $error = 'Your email OR password is incorrect OR your account is in-active. Please check.';
        }
    }
}    
?>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <img src="../assets/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                </div>
                <div class="error">
                    <p><?php echo $error; ?></p>
                </div>
                <form action="" method="POST">
                  <p>Please login to your account</p>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input name="email" type="email" id="form2Example11" class="form-control"
                      placeholder="Phone number or email address" />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>
                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                      in</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>