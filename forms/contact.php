<?php
extract($_REQUEST);
$sql = "INSERT INTO tbl_contact(name,email,subject,message) 
VALUES(name='$name',email='$email',subject='$subject',message='$message')";
$result = $conn->query($sql);
if ($result) {
  //
} else {
  echo $conn->error;
}
