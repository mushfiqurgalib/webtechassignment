<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password,'webtech');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username=mysqli_real_escape_string($conn,$_POST['user']);
$id=mysqli_real_escape_string($conn,$_POST['pass']);
$email=mysqli_real_escape_string($conn,$_POST['mail']);
$name=mysqli_real_escape_string($conn,$_POST['name']);

$sql1="SELECT * FROM reg where reg.UserName='$username'";
$result1=$conn->query($sql1);

if ($result1 ->num_rows > 0) {
  echo "username already exists.Change your username";}
else{
$sql = "INSERT INTO reg (FullName, UserName, email, password)
VALUES ('$name', '$username', '$email' , '$id')";
$result = $conn->query($sql);

echo "Account created Successfully"."<br>";
include ('loginform.html');

}


?>