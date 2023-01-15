<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration2";


//table name: userr

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * from userr where email='" . $_POST['email'] . "';";
$resultA = $conn->query($query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($conn), E_USER_ERROR);

//encrypt input password again then compare with database password values
$lpasswordForEncrypt = $_POST["password"];
$lencryptedPassword = md5($lpasswordForEncrypt);

$query = "SELECT * from userr where password='" . $lencryptedPassword . "';";
$resultB = $conn->query($query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($conn), E_USER_ERROR);


$loginFailErr = true;

if (mysqli_num_rows($resultA) > 0 && mysqli_num_rows($resultB) > 0) {
  //select username from row that has the entered email and password
  $query = "SELECT name FROM userr WHERE (email= '" . $_POST['email'] . "' && password= '" . $lencryptedPassword . "')";
  $resultC = $conn->query($query);
  while($row = $resultC->fetch_assoc()) {
    $stringName = $row['name'];
  }

  $_SESSION["username"] = $stringName; 
  header('Location: welcome.php');

  
} else {
  
$_SESSION["loginFailerror"] = "Invalid email or password."; 
  header('Location: newHomePage.php');

}

$conn->close();
