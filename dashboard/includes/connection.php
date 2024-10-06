<?php 

$hostname= "localhost";
$username= "root";
$password= "";

$conn= new mysqli($hostname,$username,$password);

if($conn->connect_error) {
    echo "connection failed";
} else {
    //echo "connection build"."<br>";
}

$conn->select_db("my_expenses");

?>