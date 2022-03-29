<?php
$servername = "localhost";
$username = "username";
$password = "password";

$name=$pass="";
// Create connection

$conn = new mysqli($servername, $username, $password,'webtech');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM webtech.reg";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "FullName: " . $row["FullName"]. " - Name: " . $row["UserName"]. " " . $row["email"]. " ".$row["password"]."<br>";
  }
} else {
  echo "0 results";}
  
$name=mysqli_real_escape_string($conn,$_POST['user']);
$id=mysqli_real_escape_string($conn,$_POST['password']);
 // echo $name;
 
  $sql2="SELECT * FROM reg where reg.UserName='$name' AND reg.password='$id'";
  $result1=$conn->query($sql2);

 

  if ($result1 ->num_rows > 0) {
    // output data of each row
    while($row = $result1 -> fetch_assoc()) {
      include('welcome.html');
    }
  } else {
    echo "wrong";
  }

?>