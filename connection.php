<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname="payment";
// Create connection

$conn = new mysqli("127.0.0.1:3307", "root", "", "payment");
if($conn->connect_error){
  die("connection failed:".$conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $id = uniqid();
  $full_name = $_POST["full_name"];
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];
  $amount = $_POST["amount"];
  $gender = $_POST["gender"];

  if (empty($full_name) || empty($email) || empty($mobile)|| empty($amount) || empty($gender)) {
    die("All fields are required!");
  }

  echo $full_name, $gender, $email, $mobile, $amount;

$sql = " INSERT INTO data( `full_name`, `email`, `mobile`, `amount`, `gender`) VALUES ('$full_name','$email','$mobile','$amount','$gender')";


if($conn->query($sql)===true){
  echo" new record created successfully";
}
else{
  echo"Error.".$sql."<br>".$conn->error;
}


$conn->close();








}
?>